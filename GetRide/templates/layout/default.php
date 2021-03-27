<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'Co-Voiturage';

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<style>
    footer {
        position: static;
        bottom: 0;
        width: 100%;
        padding-top: 100px;
        height: 100px;
    }
</style>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Accueil">Co-Voiturages</a>
            </div>
            <ul class="nav navbar-nav">
                <form class="navbar-form navbar-left" action="/action_page.php">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Rechercher personne">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
                <li><a href="offre"><span class="glyphicon glyphicon-list-alt"></span> Afficher les offres</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter une offre de trajet</a></li>
                <!-- Notifications : -->

                <?php

                if (empty($_SESSION['mail'])) { // A CHANGE

                    define('SERVER', 'localhost');
                    define('USERNAME', 'root');
                    define('PASSWORD', '');
                    define('NAME', 'getride');

                    $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, NAME);

                    $id_utilisateur=0; // 0 A REMPLACER AVEC VARIABLE SESSION ID UTILISATEUR
                    
                    $notifications = $conn->query("SELECT * FROM notification WHERE idMembre =".$id_utilisateur." AND estLue=0");
                    $not = $notifications->fetch_all();

                    echo '<li><a href="#" class="glyphicon glyphicon-bell dropdown" data-toggle="dropdown">';
                    if (sizeof($not)!=0) echo'<span style="margin-top:-2em;background-color:red;"class="badge">'.sizeof($not).'</span>';
                    echo'</a> <ul class="dropdown-menu">';
                    if (sizeof($not) != 0) {
                        if (sizeof($not) > 5) $limite = 5;
                        else $limite = sizeof($not);
                        for ($i = 0; $i < $limite; $i++) {
                            echo '<li class="text-center"><a href="notification#'.$not[$i][1].'">' . $not[$i][1] . '</a></ </li>';
                        }
                    }
               
                    echo '<li role="separator" class="divider"></li>';
                    echo '<li><a href="notification"><strong>Voir le reste</strong></a></li>'; // Path a changé plus tard !
                    echo '</ul> </li>';
                }

                ?>

                <!-- Afficher que si il y a quelqu'un de connecté -->
                <?php
                if (!empty($_SESSION['mail'])) {
                ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon Profil<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="VisuProfil">Visualiser son profil</a></li>
                            <li><a href="VisuGroupe">Afficher les groupes d'amis</a></li>
                            <li><a href="#">Visualiser mes offres</a></li>
                            <li><a href="#">Visualiser mes offres en cours</a></li>
                        </ul>
                    </li>
                    <li><a href="Menu">Menu</a></li>
                <?php
                }
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">


                <?php
                if (!empty($_SESSION['mail'])) {
                ?>
                    <!--Affiche que si une personne est connecté -->
                    <button class="btn btn-danger navbar-btn">Deconnexion</button>
                <?php
                } else {
                ?>
                    <!--afficher s'il n'y personne de connecté-->
                    <li><a href="/GetRide/GetRide/membre/add"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                    <li><a href="/GetRide/connexion.php"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
                <?php
                }
                ?>

            </ul>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>


    <footer>
        <div class="text-center" style="background-color:#cecece;">
            <br>
            <label><a href="Comment_ca_marche.html" style="color:#000000;">Comment ça marche ?</a></label>
            <label><a href="Comment_ca_marche.html" style="color:#000000;">Nous contacter</a></label>
            <label>Langue : Française</label>
            <br>
        </div>

        <div style="background-color:#c1c1c1;">
            <div class="container">
                <font size="2pt">
                    <p>Le site a été réalisé par des étudiant en informatique pour un premier pas vers l'ingénérie du logicielle. Ce site est accessible à tous et permet d'organiser des déplacement de ville en ville sans frais suplémentaire.</p>
                </font>
            </div>
        </div>
    </footer>
</body>

</html>