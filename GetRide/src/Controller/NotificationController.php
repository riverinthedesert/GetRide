<?php
    namespace App\Controller;

    use Cake\Datasource\ConnectionManager;

    class NotificationController extends AppController
    {
        public function index(){
           
            $conn = ConnectionManager::get('default');
            $this->loadComponent('Paginator');
            $id_utilisateur=0;
            $requete="SELECT * FROM notification WHERE idMembre=".$id_utilisateur;

            $not = $conn->execute($requete)->fetchAll('assoc');
            $this->set(compact('not'));

            $requete="UPDATE notification SET estLue='1'";
            $conn->execute($requete);
        }

        public function delete(){

            $conn = ConnectionManager::get('default');
            $this->loadComponent('Paginator');
            $id_utilisateur=0;
            $url_message = $this->request->getQuery("message"); // GET message

            $requete="DELETE FROM notification WHERE idMembre=".$id_utilisateur." AND message='".$url_message."'";

            $not = $conn->execute($requete);

            echo 1;

        }
    }