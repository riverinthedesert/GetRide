
<h1>Offres filtrées </h1>

<h2>Offres</h2>
<table>
    <tr>
        <th>idOffre</th>
        <th>horaireDepart</th>
        <th>horaireArrivee</th>
        <th>nbPassagersMax</th>
        <th>idVilleDepart</th>
        <th>idVilleArrive</th>
        <th>idConducteur</th>
        <th>prix</th>
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
        echo "<td>"; echo $item["prix"];
        echo "</td>";
        echo "</tr>";
    }
  /*  foreach ($utilisateur as $user){
        echo $user["idMembre"];
    }*/
?>
</table></br>
<div>
    <form action="../offre" method="get">
        <input type="submit" value="Filtres">
    </form>
</div>
