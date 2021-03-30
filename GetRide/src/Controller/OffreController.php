<?php

namespace App\Controller;

use Cake\Datasource\ConnectionManager;

class OffreController extends AppController{


    public function offre()
    {

    }

    public function view2()
    {

    }

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
        INNER JOIN users ON users.idMembre=offre.idConducteur 
        INNER JOIN conducteur ON conducteur.idMembre=offre.idConducteur
        INNER JOIN notation ON notation.idUtilisateur=offre.idConducteur  
        LEFT OUTER JOIN villes_france_free ville_depart ON offre.idVilleDepart=ville_depart.idVille 
        LEFT OUTER JOIN villes_france_free ville_arrivee ON offre.idVilleArrivee=ville_arrivee.idVille
        WHERE offre.idOffre=";

        $requete2 = "SELECT * FROM etape,villes_france_free WHERE etape.idVille=Ville.idVille AND idOffre=";

        
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



    public function add(){
            $offre = $this->Offre->newEmptyEntity();
            //session_start();
            // Récupération des informations du formulaire
            if ($this->request->is('post')) {
                $offre = $this->Offre->patchEntity($offre, $this->request->getData());
                $horaireDepart = $offre->get('horaireDepart') . " " . $offre->get('horaireDepart');
                $horaireArrivee = $offre->get('horaireArrivee');
                $nombrePassagers = $offre->get('nbPassagersMax');
                //Sauvegarde dans la base de données
                if ($this->Offre->save($offre)) {
                    $this->Flash->success(__('Votre offre a bien été crée.'));
                   
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('Les informations rentrées ne sont pas correctes. Veuillez réessayer.'));
            }
            $this->set(compact('offre'));
    }

    public function index(){

        
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');  

        $string_filtre = "";

        // SELECT ALL UTILISATEUR
        $ville = $conn->execute('SELECT * FROM villes_france_free')->fetchAll('assoc');
        $conducteur = $conn->execute('SELECT * FROM conducteur')->fetchAll('assoc');
        $test_depart=$this->request->getQuery("depart");
        $test_tri=$this->request->getQuery("tri");

        // On teste si l'un des champs obligatoires de view2 a été rempli
        $test_view2 = $this->request->getQuery("villeDepart");
        

        // BASE DE LA REQUETE
        $requete = "SELECT idOffre,horaireDepart,horaireArrivee,nbPassagersMax,
        ville_depart.nomVille as nomVilleDepart,ville_arrivee.nomVille as nomVilleArrivee,nom,prenom
        ,prix 
        FROM offre
        INNER JOIN users ON users.idMembre=offre.idConducteur 
        LEFT OUTER JOIN villes_france_free ville_depart ON offre.idVilleDepart=ville_depart.idVille 
        LEFT OUTER JOIN villes_france_free ville_arrivee ON offre.idVilleArrivee=ville_arrivee.idVille
        WHERE idOffre>=0";
        
        if(!isset($test_view2))
        {    
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

        }
        else
        {


            $requete .= " AND  ville_depart.nomVille LIKE '%".$this->request->getQuery("villeDepart")."%' AND ville_arrivee.nomVille LIKE '%".$this->request->getQuery("villeDarrivee")."%'";
            echo "($requete)";
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

    
            echo "B";
        }           
    

     

       /* $offre = $this->Paginator->paginate($this->Offre->find());

        $offre_prix_bas = 
        $this->Paginator->paginate($this->Offre->find('all', array(
            'order' => "prix ASC"
        )));
        */
    }
}