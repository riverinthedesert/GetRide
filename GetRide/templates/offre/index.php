<h1>Offres filtrées </h1>
<table>
    <tr>
        <th>N°</th>
        <th>Horaire départ</th>
        <th>Horaire arrivée</th>
        <th>Nb passager maximum</th>
        <th>Ville départ</th>
        <th>Ville arrivée</th>
        <th>Conducteur</th>
        <th>Prix</th>
        <th></th>
    </tr>
<?php
    foreach ($offre_filtres_applied as $item){
        echo "<tr>";
        echo "<td>"; echo $item["idOffre"]; echo "</td>";
        echo "<td>"; echo $item["horaireDepart"]; echo "</td>";
        echo "<td>"; echo $item["horaireArrivee"]; echo "</td>";
        echo "<td>"; echo $item["nbPassagersMax"]; echo "</td>";
        echo "<td>"; echo ucfirst($item["nomVilleDepart"]); echo "</td>";
        echo "<td>"; echo ucfirst($item["nomVilleArrivee"]); echo "</td>";
        echo "<td>"; echo ucfirst($item["nom"])." ".ucfirst($item["prenom"]); echo "</td>";
        echo "<td>"; echo $item["prix"];echo "</td>";
        $idOffre = $item["idOffre"];
        echo "<td>";echo "<a role='button' class='btn btn-info' href = 'VisuOffre?idOffre=$idOffre'>Détails</a>"; echo"</td>";
        echo "</tr>";
    }
  /*  foreach ($utilisateur as $user){
        echo $user["idMembre"];
    }*/
?>
</table></br>
<div>
    <form action="offre/view" method="get" class="pull-left">
        <input type="submit" value="Filtres">
    </form>
</div>

<div class="pull-right"><strong>Filtres appliqués :  </strong> <?php echo $string_filtre; ?></div>
