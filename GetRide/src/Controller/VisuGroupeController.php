<?php
    namespace App\Controller;
    use Cake\Datasource\ConnectionManager;

    class VisuGroupeController extends AppController
    {
        public function index()
        {
            $conn = ConnectionManager::get('default');
            $this->loadComponent('Paginator');
            
            $session_active = $this->request->getAttribute('identity');
            if (!is_null($session_active)){
                // affichage du prénom
                $mail=$session_active->mail;
                
                $idMembre=$session_active->idMembre;


                $requete="SELECT * FROM `groupemembre` WHERE idUtilisateur=".$idMembre;
                $donnees = $conn->execute($requete)->fetchAll('assoc');
                
                //Transmission de la variable à la vue.
                $this->set(compact('donnees'));
                
            }
            
        }


        public function quitterGroupe($idGroupe)
        {
            // on récupère l'id de l'utilisateur a supprimé
            $session_active = $this->request->getAttribute('identity');
            $idUser = $session_active->idMembre;

            //si l'utilisateur a bien confirmé qu'il voulait quitter le groupe
            if (isset($_POST['Oui'])) {
                //on supprime l'utilisateur dans le groupe choisi
                $conn = ConnectionManager::get('default');
                $requete="DELETE FROM `groupemembre` WHERE idUtilisateur=".$idUser." AND idGroupe=".$idGroupe;
                $donnees = $conn->execute($requete);
                $this->Flash->success(__('Vous avez bien quitté le groupe.'));
                 //on redirige l'utilisateur sur sa page de groupe
                return $this->redirect(['controller' => 'VisuGroupe', 'action' => 'index']);
            }else if(isset($_POST['Non'])){
                
                //Si il ne veut pas quitter le groupe, on le renvoit juste sur la page des groupes
                return $this->redirect(['controller' => 'VisuGroupe', 'action' => 'index']);
            }

            
        }
    }

    