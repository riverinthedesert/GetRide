<!DOCTYPE html>
<html>
<body>
	
	<?php
		
		//Accès à la base de données getride
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=getride','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(PDOException $e){
          echo $e ;
        }
		global $bdd;

		//Création d'un nouveau membre dans la base de données avec tous les champs qui ont été remplis
		if(isset($_POST['formSign'])){
            echo "Merci ";
            echo $_POST['nom'];
            echo " ";
            echo $_POST['prenom'];
            echo ", votre compte a bien été créé !";
    		extract($_POST);

    		if(!empty($nom)){

                //On regarde si le nom correspondant se trouve déjà dans la BDD
    			$requete = $bdd->query("SELECT count(*) FROM membre WHERE nom = '".$nom."' ");
    			$result = $requete->fetch();
                $count = $result['count(*)'];
    			if($count==0){

                        //Si on ne trouve pas de correspondance, on ajoute les données de l'utilisateur à la BDD
                        $result = $bdd->query("INSERT INTO membre VALUES ('13', '".$_POST['nom']."', '".$_POST['prenom']."', '".password_hash($_POST['Confcode'], PASSWORD_DEFAULT)."', '".$_POST['mail']."', '".$_POST['tel']."', '".$_POST['genre']."', 'NULL', '".$_POST['voiture']."', '0', '0', '0', '0', 'NULL')");
    				
                }else{

                    //Si le nom est déjà pris on affiche une erreur
                    header('Location: inscription.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }

    		}

    	}

	?>

    <!-- Redirection vers la page d'acceuil -->
    <p align="center">
        <a href="site.html" align="center">Revenir à la page d'acceuil</a>
    </p>
	
</body>
</html>


