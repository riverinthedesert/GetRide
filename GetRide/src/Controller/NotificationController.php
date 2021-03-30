<?php
    namespace App\Controller;

    use Cake\Datasource\ConnectionManager;

    class NotificationController extends AppController
    {
        public function index(){
            
            setlocale(LC_TIME, 'fr_FR');
            date_default_timezone_set('Europe/Paris');
           
            $conn = ConnectionManager::get('default');
            $this->loadComponent('Paginator');

            $id_utilisateur=$this->Authentication->getIdentity()->idMembre;  // A CHANGE AVEC SESSION

            $requete="SELECT * FROM notification 
            LEFT OUTER JOIN offre ON offre.idOffre=notification.idOffre 
            LEFT OUTER JOIN villes_france_free ON villes_france_free.ville_id=offre.idVilleDepart
            WHERE idMembre=".$id_utilisateur." ORDER BY DateCreation DESC";

            $not = $conn->execute($requete)->fetchAll('assoc');
            $this->set(compact('not'));

            $requete="UPDATE notification SET estLue='1' WHERE idMembre=".$id_utilisateur;
            $conn->execute($requete);
        }

        public function delete(){

            $conn = ConnectionManager::get('default');
            $this->loadComponent('Paginator');

            $id_utilisateur=$this->Authentication->getIdentity()->idMembre; // A CHANGE AVEC SESSION
            
            $url_id = $this->request->getQuery("id"); // GET message

            $requete="DELETE FROM notification WHERE idMembre=".$id_utilisateur." AND idNotification='".$url_id."'";

            $not = $conn->execute($requete);

            echo 1;

        }
    }