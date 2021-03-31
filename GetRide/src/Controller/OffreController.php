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

    public function noParticiper(){
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');
        
        $id_utilisateur=$this->Authentication->getIdentity()->idMembre; // A CHANGE (à remplacer par $_session['id'])

        $offre_id = $this->request->getQuery("id"); // GET message
        
        // On cherche l'id du créateur de cette offre
        $requete="SELECT * FROM conducteur,offre WHERE conducteur.idMembre=idConducteur AND offre.idOffre=".$offre_id;
        $requete_offre = $conn->execute($requete)->fetchAll('assoc');

        $id_createur_offre = $requete_offre[0]["idMembre"]; // ID CREATEUR OFFRE

        $requete="SELECT MAX(idNotification+1) as id FROM notification";
        $notif2 = $conn->execute($requete)->fetchAll('assoc');
        $id=$notif2[0]["id"];

        if ($id=="") $id="0"; // ID NEW NOTIF

        $requete="DELETE FROM notification WHERE idOffre=".$offre_id." AND idMembre=".$id_createur_offre." AND idExpediteur=".$id_utilisateur;
        $notif = $conn->execute($requete);

        $requete="INSERT INTO notification VALUES (".$id_utilisateur.",'Vous avez annulé votre demande de participation !',0,0,".$id.",".$offre_id.",NOW(),NULL)";
        $notif = $conn->execute($requete);

        echo 1;
    }

    public function participer(){
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');
        
        $id_utilisateur=$this->Authentication->getIdentity()->idMembre; // A CHANGE ()

        $requete="SELECT * FROM users WHERE idMembre=".$id_utilisateur;
        $requete_id = $conn->execute($requete)->fetchAll('assoc');

        $prenom = $requete_id[0]["prenom"];
        $nom = $requete_id[0]["nom"];

        $offre_id = $this->request->getQuery("id"); // GET message
        
        // Id nouvelle notif
        $requete="SELECT MAX(idNotification+1) as id FROM notification";
        $notif2 = $conn->execute($requete)->fetchAll('assoc');
        $id=$notif2[0]["id"];
        if ($id=="") $id="0";

        // On cherche l'id du créateur de cette offre
        $requete="SELECT * FROM conducteur,offre WHERE conducteur.idMembre=idConducteur AND offre.idOffre=".$offre_id;
        $requete_offre = $conn->execute($requete)->fetchAll('assoc');

        $id_createur_offre = $requete_offre[0]["idMembre"];
        
        $requete="INSERT INTO notification VALUES (".$id_utilisateur.", 'Vous avez fait une demande de participation',0,0,".$id.",".$offre_id.",NOW(),NULL)";
        $notif = $conn->execute($requete);

        // Id nouvelle notif
        $requete="SELECT MAX(idNotification+1) as id FROM notification";
        $notif2 = $conn->execute($requete)->fetchAll('assoc');
        $id=$notif2[0]["id"];
        if ($id=="") $id="0";

        $requete="INSERT INTO notification VALUES (".$id_createur_offre.", 'L\'utilisateur ".ucfirst($nom)." ".ucfirst($prenom)." veut rejoindre votre trajet',0,1,".$id.",".$offre_id.",NOW(),".$id_utilisateur.")";
        $notif = $conn->execute($requete);

        echo 1;
    }

    public function details()
    {

        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');

        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');


        $test_offre = $this->request->getQuery("idOffre");

        $id_utilisateur=$this->Authentication->getIdentity()->idMembre; // A CHANGE

        // BASE DE LA REQUETE
        $requete = "SELECT offre.idOffre,horaireDepart,horaireArrivee,nbPassagersMax,
        ville_depart.ville_nom_simple as nomVilleDepart,ville_arrivee.ville_nom_simple as nomVilleArrivee,nom,prenom
        ,prix,users.noteMoyenne as note,idConducteur
        FROM offre
        INNER JOIN users ON users.idMembre=offre.idConducteur 
        INNER JOIN conducteur ON conducteur.idMembre=offre.idConducteur
        LEFT OUTER JOIN villes_france_free ville_depart ON offre.idVilleDepart=ville_depart.ville_id
        LEFT OUTER JOIN villes_france_free ville_arrivee ON offre.idVilleArrivee=ville_arrivee.ville_id
        WHERE offre.idOffre=";

        $requete2 = "SELECT * FROM etape,villes_france_free WHERE etape.idVille=villes_france_free.ville_id AND idOffre=";


        if ($test_offre != "") { // On rajoute l'id dans le where
            $requete .= $test_offre;
            $requete2 .= $test_offre;
        } else {
            die("T'es mort mon pote");
        }

        // On execute la requête
        $offre = $conn->execute($requete)->fetchAll('assoc');
        $etape = $conn->execute($requete2)->fetchAll('assoc');

        $requete3 = "SELECT * FROM notification WHERE idOffre=".$test_offre." AND idExpediteur=".$id_utilisateur;

        $notif = $conn->execute($requete3)->fetchAll('assoc');

        if (empty($notif)){
            $notif_test=0;
        }else $notif_test=1;
        


        // On transmet les variables à la vue.
        $this->set(compact('offre'));
        $this->set(compact('etape'));
        $this->set(compact('notif_test'));
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
                $offre->set('idConducteur',$_SESSION['Auth']['idMembre']);


                //Sauvegarde dans la base de données
                if ($this->Offre->save($offre)) {
                    $this->Flash->success(__('Votre offre a bien été crée.'));
                }
                else
                {	
                $this->Flash->error(__('Les informations rentrées ne sont pas correctes. Veuillez réessayer.'));
            	}
            }
            $this->set(compact('offre'));
    }

    public function index(){

<<<<<<< HEAD
=======
        
        setlocale(LC_TIME, 'fr_FR');
        date_default_timezone_set('Europe/Paris');

>>>>>>> 18ac43cc1b4950b0a1e36aeec108d7c0ec09e044
        $conn = ConnectionManager::get('default');
        $this->loadComponent('Paginator');

        $string_filtre = "";

        // SELECT ALL UTILISATEUR
        $conducteur = $conn->execute('SELECT * FROM conducteur')->fetchAll('assoc');
        $test_depart=$this->request->getQuery("depart");
        $test_tri=$this->request->getQuery("tri");

        // On teste si l'un des champs obligatoires de view2 a été rempli
        $test_view2 = $this->request->getQuery("villeDepart");
        

          // BASE DE LA REQUETE
          $requete = "SELECT idOffre,horaireDepart,horaireArrivee,nbPassagersMax,
          ville_depart.ville_nom_simple as nomVilleDepart,ville_arrivee.ville_nom_simple as nomVilleArrivee,nom,prenom
          ,prix 
          FROM offre
          INNER JOIN users ON users.idMembre=offre.idConducteur 
          LEFT OUTER JOIN villes_france_free ville_depart ON offre.idVilleDepart=ville_depart.ville_id 
          LEFT OUTER JOIN villes_france_free ville_arrivee ON offre.idVilleArrivee=ville_arrivee.ville_id
          WHERE idOffre>=0";
        
        if(!isset($test_view2))
        {    
            // FILTRE HEURE_DEPART
            if ($test_depart == "6") {
                $string_filtre .= " Départ de 6h à 12h |";
                $requete .= " AND (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '06:00:00' 
                AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '12:00:00')";
            } else if ($test_depart == "12") {
                $string_filtre .= " Départ de 12h à 18h |";
                $requete .= " AND (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '12:00:01' 
                AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '18:00:00')";
            } else if ($test_depart == "18") {
                $string_filtre .= " Départ à 18h ou plus |";
                $requete .= " AND (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '18:00:01' 
                AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '23:59:59') 
                OR (DATE_FORMAT(horaireDepart ,'%H:%i:%s')>= '00:00:00' 
                AND DATE_FORMAT(horaireDepart ,'%H:%i:%s') <= '05:59:59')";
            }
    
            // FILTRE CONCERNANT LE ORDER BY (on test les paramètres URL)
            if ($test_tri == "1") { // A FAIRE APRES LES FILTRES AND
                $string_filtre .= " Trié par prix le plus bas |";
                $requete .= " ORDER BY prix ASC";
            } else if ($test_tri == "2") {
                $string_filtre .= " Trié par horaire de départ le plus tôt |";
                $requete .= " ORDER BY DATE_FORMAT(horaireDepart,'%H:%i:%s') ASC";
            }
            // On execute la requête
            $offre_filtres_applied = $conn->execute($requete)->fetchAll('assoc');
    
            if ($string_filtre == "") { // Si il n'y a aucune filtre : Aucun
                $string_filtre = " Aucun";
            }
            // On transmet les variables à la vue.
            $this->set(compact('string_filtre'));
            $this->set(compact('offre_filtres_applied'));
            $this->set(compact('conducteur'));
    

        }
        else
        {


            $requete .= " AND  ville_depart.ville_nom_simple LIKE '%".$this->request->getQuery("villeDepart")."%' AND ville_arrivee.ville_nom_simple LIKE '%".$this->request->getQuery("villeDarrivee")."%'";
            // On execute la requête
            $offre_filtres_applied = $conn->execute($requete)->fetchAll('assoc');

            if ($string_filtre==""){ // Si il n'y a aucune filtre : Aucun
                $string_filtre=" Aucun";
            }
            // On transmet les variables à la vue.
            $this->set(compact('string_filtre'));
            $this->set(compact('offre_filtres_applied'));
            $this->set(compact('conducteur'));
        }           
    

     

       /* $offre = $this->Paginator->paginate($this->Offre->find());

        $offre_prix_bas = 
        $this->Paginator->paginate($this->Offre->find('all', array(
            'order' => "prix ASC"
        )));
        */
    }
}