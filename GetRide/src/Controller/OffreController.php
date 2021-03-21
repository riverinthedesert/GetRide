<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class OffreController extends AppController{


    public function index(){

       
    }


    public function view(){

        
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');  

        $string_filtre = "";

        // SELECT ALL UTILISATEUR
        $conducteur = $conn->execute('SELECT * FROM conducteur')->fetchAll('assoc');
        $ville = $conn->execute('SELECT * FROM ville')->fetchAll('assoc');
        $conducteur = $conn->execute('SELECT * FROM conducteur')->fetchAll('assoc');

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
        
        // FILTRE HEURE_DEPART
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

        // FILTRE CONCERNANT LE ORDER BY
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