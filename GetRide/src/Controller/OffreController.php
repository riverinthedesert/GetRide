<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class OffreController extends AppController{


    public function details(){

        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');

        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');  


        $test_offre=$this->request->getQuery("idOffre");

        // BASE DE LA REQUETE
        $requete = "SELECT offre.idOffre,horaireDepart,horaireArrivee,nbPassagersMax,
        ville_depart.nomVille as nomVilleDepart,ville_arrivee.nomVille as nomVilleArrivee,nom,prenom
        ,prix,note 
        FROM offre
        INNER JOIN membre ON membre.idMembre=offre.idConducteur 
        INNER JOIN conducteur ON conducteur.idMembre=offre.idConducteur
        INNER JOIN notation ON notation.idUtilisateur=offre.idConducteur  
        LEFT OUTER JOIN ville ville_depart ON offre.idVilleDepart=ville_depart.idVille 
        LEFT OUTER JOIN ville ville_arrivee ON offre.idVilleArrivee=ville_arrivee.idVille
        WHERE offre.idOffre=";

        $requete2 = "SELECT * FROM etape,ville WHERE etape.idVille=Ville.idVille AND idOffre=";

        
        if ($test_offre!=""){ // On rajoute l'id dans le where
            $requete.= $test_offre;
            $requete2.= $test_offre;
        }else{
            die("T'es mort mon pote");
        }

        // On execute la requête
        $offre = $conn->execute($requete)->fetchAll('assoc');
        $etape = $conn->execute($requete2)->fetchAll('assoc');
    
        // On transmet les variables à la vue.
        $this->set(compact('offre'));
        $this->set(compact('etape'));

    }

    public function view(){

       
    }


    public function index(){

        
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');

        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');  

        $string_filtre = "";

        // SELECT ALL UTILISATEUR
        $ville = $conn->execute('SELECT * FROM ville')->fetchAll('assoc');
        $conducteur = $conn->execute('SELECT * FROM conducteur')->fetchAll('assoc');

        // Ici on a les paramètres qui sont passés par l'url, donc &depart et &tri sous forme de String
        $test_depart=$this->request->getQuery("depart");
        $test_tri=$this->request->getQuery("tri");

        // BASE DE LA REQUETE
        $requete = "SELECT idOffre,horaireDepart,horaireArrivee,nbPassagersMax,
        ville_depart.nomVille as nomVilleDepart,ville_arrivee.nomVille as nomVilleArrivee,nom,prenom
        ,prix 
        FROM offre
        INNER JOIN membre ON membre.idMembre=offre.idConducteur 
        LEFT OUTER JOIN ville ville_depart ON offre.idVilleDepart=ville_depart.idVille 
        LEFT OUTER JOIN ville ville_arrivee ON offre.idVilleArrivee=ville_arrivee.idVille
        WHERE idOffre>=0";
        
        // FILTRE HEURE_DEPART (on test les paramètres URL)
        if ($test_depart=="6"){
            $string_filtre.=" Départ de 6h à 12h |";
            $requete.= " AND (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '06:00:00' 
            AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '12:00:00')";

        }else if($test_depart=="12"){
            $string_filtre.=" Départ de 12h à 18h |";
            $requete.= " AND (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '12:00:01' 
            AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '18:00:00')";
            
        }else if($test_depart=="18"){
            $string_filtre.=" Départ à 18h ou plus |";
            $requete.= " AND (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '18:00:01' 
            AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '23:59:59') 
            OR (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '00:00:00' 
            AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '05:59:59')";
        }

        // FILTRE CONCERNANT LE ORDER BY (on test les paramètres URL)
        if ($test_tri=="1"){ // A FAIRE APRES LES FILTRES AND
            $string_filtre.=" Trié par prix le plus bas |";
            $requete.= " ORDER BY prix ASC";
        }else if ($test_tri=="2"){
            $string_filtre.=" Trié par horaire de départ le plus tôt |";
            $requete.= " ORDER BY DATE_FORMAT(horaireDepart,'%H:%i:%s') ASC";
        }
        // On execute la requête
        $offre_filtres_applied = $conn->execute($requete)->fetchAll('assoc');

        if ($string_filtre==""){ // Si il n'y a aucune filtre : Aucun
            $string_filtre=" Aucun";
        }
        // On transmet les variables à la vue.
        $this->set(compact('string_filtre'));
        $this->set(compact('offre_filtres_applied'));
        $this->set(compact('conducteur'));
        $this->set(compact('ville'));

    

        /*
        $stmt = $conn->execute('SELECT * FROM offre');
        $offre_filtres_applied = $stmt ->fetchAll('assoc');


        // SELECT ALL OFFRES
        $offre = $this->Paginator->paginate($this->Offre->find());

        // SELECT PRIX LE PLUS BAS
        $offre_prix_bas = 
        $this->Paginator->paginate($this->Offre->find('all', array(
            'order' => "prix ASC"
        )));
        */
    }
}