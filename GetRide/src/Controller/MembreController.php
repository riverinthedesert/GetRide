<?php
declare(strict_types=1);

namespace App\Controller;


class MembreController extends AppController
{

    public function index()
    {
    }



    public function add()
    {
        $membre = $this->Membre->newEmptyEntity();

        // Récupération des informations du formulaire
        if ($this->request->is('post')) {
            $membre = $this->Membre->patchEntity($membre, $this->request->getData());
            $nom_user = $membre->get('nom') . " " . $membre->get('prenom');
            $mail_user = $membre->get('mail');
            $id_user = $membre->get('idMembre');
            //Sauvegarde dans la base de données
            if ($this->Membre->save($membre)) {
                $this->Flash->success(__('Votre compte a bien été crée.'));
                session_start();
                $_SESSION['connect'] = true;
                $_SESSION['login'] = $nom_user;
                $_SESSION['mail'] = $mail_user;
                $_SESSION['idMembre'] = $id_user;
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Les informations rentrées ne sont pas correctes. Veuillez réessayer.'));
        }
        $this->set(compact('membre'));
    }

}
