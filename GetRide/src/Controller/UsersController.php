<?php

declare(strict_types=1);

namespace App\Controller;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\Datasource\ConnectionManager;
use Cake\Event\EventInterface;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Validation\Validator;

use App\Controller\NotificationController;

/* Gestion des utilisateurs et des autorisations d'accès aux pages.
   Remplace la table Membre dans la modélisation par souci de convention 
   avec le plugin utilisé (Authentication) */

class UsersController extends AppController
{

    public function index()
    {
    }


    /* Permet d'autoriser l'accès à la connexion et à l'inscription 
       pour les utilisateurs non connectés */
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        /* Redirection d'un utilisateur connecté vers l'accueil 
           si celui-ci tente d'accéder à la connexion, l'inscription 
           ou la récupération via leur URL */

        // test d'une connexion active
        $session_active = $this->Authentication->getIdentity();

        if (!is_null($session_active))
            $this->redirect(['controller' => 'Accueil', 'action' => 'index']);

        else
            // Exceptions à l'authentification nécessaire (seulement pour ce contrôleur)
            $this->Authentication->addUnauthenticatedActions(['connexion', 'add', 'recuperation']);
    }


    public function add()
    {
        $user = $this->Users->newEmptyEntity();

        // Récupération des informations du formulaire
        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            //Récupération de la photo de l'utilisateur
            if (!$user->getErrors()) {
                $pathPhoto = $this->request->getData('pathPhoto_file');

                $nomPhoto = $pathPhoto->getClientFileName();

                //Création du dossier photoProfil si il n'existe pas
                if (!is_dir(WWW_ROOT . 'img' . DS . 'photoProfil'))
                    mkdir(WWW_ROOT . 'img' . DS . 'photoProfil', 0775);

                //Déplacement de la photo dans le répertoire
                $chemin = WWW_ROOT . 'img' . DS . 'photoProfil' . DS . $nomPhoto;
                if ($nomPhoto != "") {
                    $pathPhoto->moveTo($chemin);
                    $user->pathPhoto = 'webroot\img\photoProfil\\' . $nomPhoto;
                }
            }
            //Sauvegarde dans la base de données
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Votre compte a bien été créé.'));

                // connecte automatiquement l'utilisateur
                $this->Authentication->setIdentity($user);

                // redirection vers l'accueil
                return $this->redirect(['controller' => 'Accueil', 'action' => 'index']);
            }
        }
        $this->set(compact('user'));
    }






    /**
     * Gère la connexion à un compte déjà créé
     */
    public function connexion()
    {
        $this->request->allowMethod(['get', 'post']);

        // gestion de la connexion par le plugin Authentication
        $resultat = $this->Authentication->getResult();

        // si le compte existe et que la connexion s'est bien passée...
        if ($resultat->isValid()) {

            // ... on redirige l'utilisateur vers la page d'accueil du site
            $redirection = $this->request->getQuery('redirect', [
                'controller' => 'Accueil',
                'action' => 'index',
            ]);

            $this->Flash->success(__('Connexion réussie !'));

            return $this->redirect($redirection);
        }

        // si une erreur s'est produite, la page ne change pas et un mesage d'erreur s'affiche
        if ($this->request->is('post') && !$resultat->isValid()) {
            /*debug($resultat->getData());
            debug($resultat->getErrors());*/
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }



    /**
     * Gère la déconnexion pour un utilisateur connecté
     */
    public function deconnexion()
    {
        // on vérifie que la session de l'utilisateur est toujours active
        $session_active = $this->request->getAttribute('identity');

        if (!is_null($session_active)) {

            $prenom = $session_active->prenom;

            // déconnexion
            $this->Authentication->logout();

            // message de confirmation de la déconnexion
            $this->Flash->success(__('À bientôt ' . $prenom . ' !'));

            // redirection vers la page d'accueil
            return $this->redirect(['controller' => 'Accueil', 'action' => 'index']);
        }
    }


    /* Récupération du mot de passe pour un utlisateur non connecté mais disposant d'un compte */
    public function recuperation()
    {

        if ($this->request->is('post')) {

            // mail entré dans le formulaire
            $mail = $this->request->getData('mail');

            // connexion à la base de données
            $connexion = ConnectionManager::get('default');

            // on cherche si le mail est rattaché à un compte
            $res = $connexion->query("SELECT count(*) FROM users 
                                      WHERE mail = '$mail'");
            foreach ($res as $r)
                $nb = $r[0];

            if ($nb != 1)
                $this->Flash->error(__('Cette adresse mail n\'existe pas'));

            else {

                /* Création d'un nouveau mot de passe aléatoire */

                $minuscules = 'abcdefghijklmnopqrstuvwxyz';
                $majuscules = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $chiffres = '0123456789';
                $speciaux = '@[]!"#()*/:;';

                $nouveau = '';


                /* On utilise random_int() pour définir la position d'un caractère 
                   à insérer dans le mot de passe.
                   C'est la fonction recommandée par la documentation officielle
                   de php pour la gestion d'évènements aléatoires fiables.
                   https://www.php.net/manual/fr/function.random-int.php */

                // cinq minuscules
                for ($i = 0; $i < 5; $i++) {

                    $pos = random_int(0, strlen($minuscules) - 1);
                    $nouveau .= $minuscules[$pos];
                }

                // un chiffre
                $pos = random_int(0, strlen($chiffres) - 1);
                $nouveau .= $chiffres[$pos];

                // une majuscule
                $pos = random_int(0, strlen($majuscules) - 1);
                $nouveau .= $majuscules[$pos];

                // un caractère spécial
                $pos = random_int(0, strlen($speciaux) - 1);
                $nouveau .= $speciaux[$pos];


                /* Envoi par mail */

                // on cherche le prénom de la personne
                $res = $connexion->query("SELECT prenom FROM users 
                                         WHERE mail = '$mail'");

                foreach ($res as $r)
                    $prenom = $r['prenom'];

                // champs du mail
                $origine = 'From: getride.noreply@gmail.com';

                $objet = 'Récupération de votre mot de passe GetRide';

                $contenu = "Bonjour " . $prenom . " !\n\n";
                $contenu .= "Voici votre nouveau mot de passe : $nouveau\n\n";
                $contenu .= "Par mesure de sécurité, il vous est conseillé de le changer ";
                $contenu .= "dès votre prochaine connexion (Mon profil/Visualiser son profil/";
                $contenu .= "Modifier votre mot de passe).\n\n";
                $contenu .= "À bientôt !";

                $envoi = mail($mail, $objet, $contenu, $origine);

                if (!$envoi)
                    $this->Flash->error(__('Echec de l\'envoi du mail'));

                // si le mail a pu être envoyé, on change le mot passe dans la base de données
                else {

                    $hash = (new DefaultPasswordHasher)->hash($nouveau);

                    // on met à jour le mot de passe
                    $res = $connexion->query("UPDATE users SET motdePasse = '$hash'
                                            WHERE mail = '$mail'");

                    $this->Flash->success(__('Un mail de récupération vous a été envoyé'));

                    // on redirige vers le formulaire de connexion
                    return $this->redirect(['controller' => 'Users', 'action' => 'connexion']);
                }
            }
        }
    }
}
