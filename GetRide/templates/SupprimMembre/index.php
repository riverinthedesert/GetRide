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

if(isset($_GET['idMembre'])){    

    //Supprimer le membre du groupe
    $query = "DELETE FROM `groupemembre` WHERE idUtilisateur='".$_GET['idMembre']."' AND idGroupe='".$_GET['idGroupe']."'";
    
    //Lancer la requete sur la bdd
    $res = mysqli_query($conn, $query);
    
    if($res){
        echo "<div class='alert alert-success'>
            L'utilisateur a été retiré du groupe avec <strong>Succes</strong>
        </div>";
    }
    else{
        echo "<div class='alert alert-danger'>
        L'utilisateur n'a pas été retiré du groupe... Un problème est survenu, veuillez recommencer !
    </div>";
    }
}


if(!empty($_SESSION['mail'] && !empty($_GET['idGroupe']))){
        $groupe = $conn->query("SELECT * FROM `groupe` WHERE idGroupe='".$_GET['idGroupe']."'");
        $group= $groupe->fetch_assoc();

        $groupeMembre = $conn->query("SELECT * FROM `groupemembre` WHERE idGroupe='".$_GET['idGroupe']."'");
    ?>

    <div class="container">
        <div class="text-center">
            <h1>Supprimer un membre du groupe : <br><b><?php echo $group['nom'];  ?></b></h1>
        </div>
        <h4>Qui souhaitez-vous retirer de votre groupe privé ?</h4>
                
    </div>



<?php
    $i = 0;
    while($groupM = $groupeMembre->fetch_assoc()){
        $membre = $conn->query("SELECT * FROM `membre` WHERE idMembre ='".$groupM['idUtilisateur']."'");
        
        while($m = $membre->fetch_assoc()){
            if($m['mail'] != $_SESSION['mail']){
                $idG = $_GET['idGroupe'];
                $idM = $m['idMembre'];
    
                if($i == 0){
                    $i++;
?>              <div class="row">
                        <div class="col-sm-4">
                            <label for="nom" ><?php echo $m['nom']; echo ' '; echo $m['prenom']; ?></label>
                            <a <?php echo "href='SupprimMembre/confirmation?idGroupe=$idG&idMembre=$idM' "; ?> role="button" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Supprimer</a>
                        </div>
<?php
                }
                else if($i == 3){
                    $i = 0;
?>                  <div class="col-sm-4">
                        <label for="nom" ><?php echo $m['nom']; echo ' '; echo $m['prenom']; ?></label>
                            <a <?php echo "href='SupprimMembre/confirmation?idGroupe=$idG&idMembre=$idM' "; ?> role="button" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Supprimer</a>
                        </div>
                    </div>
                    <br>
                    <br>
<?php       }
                else{
                    $i++;
?>
                    <div class="col-sm-4">
                        <label for="nom" ><?php echo $m['nom']; echo ' '; echo $m['prenom']; ?></label>
                        <a <?php echo "href='SupprimMembre/confirmation?idGroupe=$idG&idMembre=$idM' "; ?> role="button" class="btn btn-danger "><span class="glyphicon glyphicon-trash"></span> Supprimer </a>
                    </div>
<?php
                }
            }
        }
    }
    ?>
<?php
    }
?>


