<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'getride');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

if(!empty($_SESSION['mail']) && !empty($_GET['idGroupe']) && !empty($_GET['idMembre'])){
    $idg = $_GET['idGroupe'];
    $idm = $_GET['idMembre'];
        $groupe = $conn->query("SELECT * FROM `groupe` WHERE idGroupe='".$_GET['idGroupe']."'");
        $group= $groupe->fetch_assoc();

        $groupeMembre = $conn->query("SELECT * FROM `membre` WHERE idMembre='".$_GET['idMembre']."'");
        $groupM = $groupeMembre->fetch_assoc();
    ?>

    <div class="container">
        <div class="text-center">
            <h1>Supprimer un membre du groupe : <br><b><?php echo $group['nom'];  ?></b></h1>
        </div>
        <h4>Êtes-vous sûre de vouloir supprimer <b><?php 
            if($groupM['genre'] == "m"){
                echo 'Monsieur ';
            }
            else if($groupM['genre'] == "f"){
                echo 'Madame ';
            }
            echo $groupM['nom'];
            echo ' ';
            echo $groupM['prenom'];
           ?></b> de votre groupe ? </h4>

        <div class="row">
            <div class="col-sm-6"> 
                <div class="text-center">    
                    <a <?php echo "href='../SupprimMembre?idGroupe=$idg&idMembre=$idm' "; ?> role="button" class="btn btn-success "><span class="glyphicon glyphicon-trash"></span> Oui</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-center">
                    <a <?php echo "href='../SupprimMembre?idGroupe=$idg' "; ?> role="button" class="btn btn-danger "><span class="glyphicon glyphicon-repeat"></span> Non</a>
                </div>
            </div>
        </div>
    </div>

<?php
    }
?>
