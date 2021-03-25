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
        }
    }