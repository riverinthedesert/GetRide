<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'getride');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

if(!empty($_SESSION['mail'])){
        $offre = $conn->query("SELECT * FROM `offre` WHERE idOffre='".$_GET['idOffre']."'");
        $of= $offre->fetch_assoc();
?>

<div class="container">
	<div class="text-center">
		<h1>Détail de l'offre</h1>
	</div>
	<!-- Recherche dans la BDD-->
	<div class="input-group">
       <h3>Le : <?php
                $timestamp = strtotime($of['horaireDepart']); 
                $newDate = date("N-m-d-Y", $timestamp);
                list($jour, $day, $month, $year) = explode("-", $newDate);
                $months = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
                $jours = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
                echo $jours[$jour-1]. " $day ".$months[$month-1]." $year";
            ?>
        </h3>
        <p>Départ de : <?php
                            $villeD = $conn->query("SELECT * FROM `ville` WHERE idVille='".$of['idVilleDepart']."'");
                            $villeA = $conn->query("SELECT * FROM `ville` WHERE idVille='".$of['idVilleArrivee']."'");

                            $vd = $villeD->fetch_assoc();
                            $va = $villeA->fetch_assoc();
                            $heureD = date("G:i", $timestamp);
                            echo "<b>".$vd['nomVille']."</b>". " à <span style='color:DarkOrange'>".$heureD. "</span><br>" ; 

                            //Si il y a des Etapes :
                            $i = 0;
                            $e =  $conn->query("SELECT * FROM `etape` WHERE idEtape='".$of['idEtape']."' AND idOffre='".$of['idOffre']."'");
                            while($etape = $e->fetch_assoc()){
                                $i++;
                                $vEtape = $conn->query("SELECT * FROM `ville` WHERE idVille='".$etape['idVille']."'");
                                $ve = $vEtape->fetch_assoc();

                                $timestamp = strtotime($etape['horaire']); 
                                $heureE = date("G:i", $timestamp);
                                echo "<br> &emsp;Etape ".$i." : <b>".$ve['nomVille']."</b>". " à <span style='color:Tomato'>".$heureE."</span>" ;

                            }
                        ?>
            
            &emsp;
            <br><br>Arrivée à : <?php 
                $timestamp = strtotime($of['horaireArrivee']); 
                $heureA = date("G:i", $timestamp);
                echo "<b>".$va['nomVille']."</b>". " à <span style='color:DarkOrange'>".$heureA."</span>" ; ?>
        </p>

        
        
	</div>
    <div class="input-group">
        <h3><br>Le prix : </h3>
        <div class="well"><?php echo $of['prix'];?></div>
    </div>

            
</div>

<?php
    }
?>
