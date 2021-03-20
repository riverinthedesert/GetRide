<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="inscription.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            <!--<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mon Profil<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Visualiser son profil</a></li>
                    <li><a href="#">Afficher les groupes d'amis</a></li>
                    <li><a href="#">Visualiser mes offres</a></li>
                    <li><a href="#">Visualiser mes offres en cours</a></li>
                </ul>
            </li>-->
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>S'inscrire</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a></li>
        </ul>
    <!-- <button class="btn btn-danger navbar-btn">Deconnexion</button> -->
         </div>
        </nav>

        <div id="test">
    	<form method="post" action="donnees.php">
            <h1 align="center">Inscription</h1>
            <!-- Création du formulaire d'inscription au site -->
            <fieldset id="coord">

                <legend>Coordonnées</legend>


                    <label for="nom"><b>Nom*</b></label>
                    <input type="text" name="nom" id="nom"/>

                    <label for="prenom"><b>Prénom*</b></label>
                    <input type="text" name="prenom" id="prenom"/>
                    <br/>
                    <br/>
                    <p><label for="mail"><b>Adresse éléctronique*</b></label>
                    <input type="email" placeholder="example@xyz.com" name="mail" id="mail"></p>
                    <br/>
                    <p><label for="code"><b>Mot de passe*</b></label> 
                    <input type="password" name="code" id="code" required/></p>
                    <br/>
                    <label for="code"><b>Confirmer le mot de passe*</b></label> 
                    <input type="password" name="Confcode" id="Confcode" required/>
                    <br/><br/>
                    <p><b>Genre :</b></p>
                    <label for="homme">Homme</label>
                    <input type="radio" name="genre" id="homme" value="Homme">
                    <label for="femme">Femme</label>
                    <input type="radio" name="genre" id="femme" value="Femme">
                    <br/><br/>
                    <p><label for="naissance"><b>Date de naissance*</b></label>
                    <input type="Date" name="naissance" id="naissance" required/>

                    <label for="tel"><b>Téléphone*</b></label>
                    <input type="text" name="tel" id="tel" maxlength="10"/></p>
                    <br/>
                    <p><b>Possédez-vous une voiture ? : </b></p>
                    <label for="oui">Oui</label>
                    <input type="radio" name="voiture" id="oui" value="Oui">
                    <label for="non">Non</label>
                    <input type="radio" name="voiture" id="non" value="Non">
                    <br/><br/>
                    <p><b>Votre Photo :</b></p>
                    <input type="file"  id="photo" accept="image/*">
                    <br/>
            <p>* champs obligatoires</p>

    		<p align="center">
          
            <!-- Envoi des données du formulaire -->
            <input type="submit" value="S'inscrire" id="formSign" name="formSign"/>

            </p>

            <?php

                //Affichage d'une erreur lorque le nom ou le mot de passe saisi est incorrect
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1)
                        echo "<p style='color:red'>Le nom est déjà utilisé";
                }
            ?>

    	</form>
    </div>
        

    </body>
</html>