<?php
    namespace App\Controller;

    use Cake\Event\EventInterface;
    use Cake\Datasource\ConnectionManager;

    class DetailOffreController extends AppController
    {
		
		
		public function editer()
		{

		}
		
		public function confirmEdit()
		{

		}

        public function index()
        {
            setlocale(LC_TIME, 'fr_FR');
            date_default_timezone_set('Europe/Paris');
    
            $conn = ConnectionManager::get('default');
            $this->loadComponent('Paginator');
    
    
            $test_offre = $this->request->getQuery("idOffre");
    
            $id_utilisateur=$this->Authentication->getIdentity()->idMembre;
    
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
                die("");
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
    
            if ($id_utilisateur>=0){
                $historique="INSERT INTO historiquerecherche VALUES (".$id_utilisateur.",".$test_offre.",NOW())";
                $hist = $conn->execute($historique);
            }
        }

    }