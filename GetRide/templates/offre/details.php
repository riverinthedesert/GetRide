<html>

<style>
    hr {
        border-top: 1px solid gray;
    }
</style>

<h1 class="text-center font-weight-bold"> Détails de l'offre</h1>

<?php
// DATE EN TITRE

if (sizeof($offre) == 0) {
    die("Il y a eu une erreur dans cette offre !");
}

$date_depart = $offre[0]["horaireDepart"];
$date_depart_string = ucwords(utf8_encode(strftime("%A %d %B", strtotime(($date_depart)))));
$heure_depart_string = strftime("%Hh%M", strtotime(($date_depart)));

$date_arrivee = $offre[0]["horaireArrivee"];
$date_arrivee_string = ucwords(utf8_encode(strftime("%A %d %B", strtotime(($date_arrivee)))));
$heure_arrivee_string = strftime("%Hh%M", strtotime(($date_arrivee)));

//Heure

echo "<h2 class = 'text-center'>" . $date_depart_string . "</h2>";
echo "</br>"
?>

<body>
    <div class="row">
        <div class="col-md-6">

            <h3>Départ</h3>

            <p class="font-weight-bold">
                De
                <strong><?php echo (ucfirst($offre[0]["nomVilleDepart"])); ?></strong>
                le
                <strong><?php echo ($date_depart_string); ?></strong>
                à
                <strong><?php echo ($heure_depart_string); ?></strong>
            </p>

        </div>

        <br>

        <div class="col-md-2">

            <?php

            if (sizeof($etape) > 0) { // 1 étape ou plus

                $etape_horaire = strftime("%Hh%M", strtotime(($etape[0]["horaire"])));

                echo "<h3>Étapes</h3>";

            }

            if (sizeof($etape) > 1) { // 2 étapes ou plus

                for ($i = 0; $i < sizeof($etape); $i++) {

                    echo "<div>";

                    echo "<strong>" . ucfirst($etape[$i]["nomVille"]) . "</strong>";

                    echo " à <strong>" . $etape_horaire . "</strong>";

                    echo "</br>";

                    if ($i != sizeof($etape) - 1) echo "<p style='margin-left:2.5em;'class='glyphicon glyphicon-arrow-down '></p>";

                    echo "</div>";
                }
            }
            ?>


        </div>
    </div>

    <br>

    <div>

        <h3>Arrivée</h3>

        <p class="font-weight-bold">
            À
            <strong><?php echo (ucfirst($offre[0]["nomVilleArrivee"])); ?></strong>
            le
            <strong><?php echo ($date_arrivee_string); ?></strong>
            à environ
            <strong><?php echo ($heure_arrivee_string); ?></strong>
        </p>

    </div>


    <hr>

    <div>
        <div class="row">
            <div class="col-md-4">
                <h3>Prix</h3>

                <p>

                    <?php echo ("<strong>" . $offre[0]["prix"] . "€" . "</strong>" . " pour 1 personne"); ?>

                </p>
            </div>

            <div class="col-md-4">
                <h3>Passagers autorisés</h3>

                <p>

                    <?php echo ("<strong>" . $offre[0]["nbPassagersMax"] . "</strong>"); ?>

                </p>
            </div>
        </div>


    </div>

    <hr>

    <div>

        <h3>Conducteur</h3>

        <strong>

            <?php

            echo (ucfirst($offre[0]["nom"]));
            echo " ";
            echo (ucfirst($offre[0]["prenom"]));

            ?>

        </strong>

    </div>

    <div>

        <?php

        if ($offre[0]["note"] != "") {
            echo ("Note : ");
            echo " ";
            echo (ucfirst($offre[0]["note"]));
            echo ("/5");
        }

        ?>


    </div>

    <hr>

    <div>

      <a href="../offre" class="btn btn-info" role="button">Retour</a>


    </div>

    

    </br>


</body>

</html>