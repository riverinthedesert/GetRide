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
session_start();
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
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="#">Co-Voiturages</a>
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
                <li><a href="#"><span class="glyphicon glyphicon-list-alt"></span> Afficher les offres</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-plus-sign"></span> Ajouter une offre de trajet</a></li>
                <!-- Notifications : -->
                <li><a href="#" class="glyphicon glyphicon-bell"></a></li>
                    <!-- Afficher que si il y a quelqu'un de connecté -->
                    <?php
                    if(!empty($_SESSION['email'])){
                ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon Profil<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Visualiser son profil</a></li>
                                <li><a href="#">Afficher les groupes d'amis</a></li>
                                <li><a href="#">Visualiser mes offres</a></li>
                                <li><a href="#">Visualiser mes offres en cours</a></li>
                            </ul>
                        </li>
                <?php
                    }
                ?>
                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                
                <?php
                    if(!empty($_SESSION['email'])){
                ?><!--Affiche que si une personne est connecté -->
                        <button class="btn btn-danger navbar-btn">Deconnexion</button>
                <?php
                    }else{
                        ?>
                        <!--afficher s'il n'y personne de connecté-->
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>-->
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
</body>
</html>
