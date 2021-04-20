<!-- Visu d'un groupe, calqué sur les détails d'une offre -->

<html>

<style>
    hr {
        border-top: 1px solid gray;
    }
</style>

<h1 class="text-center font-weight-bold"> Détails du groupe</h1>

<body>
    <div class="row">
        <div class="col-md-11">

            <h3 class="text-center font-weight-bold"><?= "\"$nomGroupe\"" ?></h3>


            <table>
                <tr>
                    <td>
                        <h3>Membres</h3>
                    </td>

                    <!-- bouton pour créer un trajet privé -->
                    <td style="margin-left:60%; text-align:right">
                        <?= "<a role='button' class='btn btn-danger' 
                        href = '../ajouter-offre-privee?idGroupe=$idGroupe'>Créer un trajet privé</a>" ?>
                    </td>


                </tr>

            </table>

            <div style="height:40%; width:50%; overflow: auto">

                <?php

                $idMembre = $this->request->getAttribute('identity')->idMembre;

                // affichage des informations des différents membres
                foreach ($membresGroupe as $membre) {

                    $nomComplet = $membre['prenom'] . ' ' . $membre['nom'];
                    $id =   $membre['id'];

                    if ($id == $idAdmin)
                        $nomComplet .= ' (admin)';

                    if ($id == $idMembre)
                        echo "<a href='../visu-profil'><strong>$nomComplet</strong></a>";

                    else
                        echo "<a href='../profile?id=$id'>$nomComplet</a>";

                    echo "<br/><br/>";
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>