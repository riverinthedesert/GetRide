<div style="margin-left:-1em;">
<div class="row"> 
<h1 class="col-md-12">Offres filtrées </h1>
<a style="height:2.5em;margin-top:1em;"href="HistoriqueOffre" class="btn btn-info col" role="button">Historique de recherche</a>
</div>
<?php 

if (sizeof($offre_filtres_applied)<=0){
    echo "<h3> Pas d'offres trouvées ! </h3>";
}else{
    
echo'<table style="margin-left:-2em;">
    <tr>
        <th>N°</th>
        <th>Horaire départ</th>
        <th>Horaire arrivée</th>
        <th>Nb passager maximum</th>
        <th>Ville départ</th>
        <th>Ville arrivée</th>
        <th>Conducteur</th>
        <th>Note conducteur</th>
        <th>Prix</th>
        <th></th>
    </tr>';

    foreach ($offre_filtres_applied as $item){
        echo "<tr>";
        echo "<td>"; echo $item["idOffre"]; echo "</td>";
        echo "<td>"; echo $item["horaireDepart"]; echo "</td>";
        echo "<td>"; echo $item["horaireArrivee"]; echo "</td>";
        echo "<td>"; echo $item["nbPassagersMax"]; echo "</td>";
        echo "<td>"; echo ucfirst($item["nomVilleDepart"]); echo "</td>";
        echo "<td>"; echo ucfirst($item["nomVilleArrivee"]); echo "</td>";
        echo "<td>"; echo ucfirst($item["nom"])." ".ucfirst($item["prenom"]); echo "</td>";
        echo "<td>"; 
        if ($item["noteMoyenne"]!="")echo $item["noteMoyenne"]; 
        else echo "Aucune note";
        echo "</td>";
        echo "<td>"; echo $item["prix"]."€";echo "</td>";
        $idOffre = $item["idOffre"];
        echo "<td>";echo "<a role='button' class='btn btn-info' href = 'DetailOffre?idOffre=$idOffre'>Détails</a>"; echo"</td>";
        echo "</tr>";
    }
  /*  foreach ($utilisateur as $user){
        echo $user["idMembre"];
    }*/
}
?>
</table></br>
<div>
    <form style="margin-right:1em;" action="offre/view" method="get" class="pull-left">
        <input type="submit" value="Filtres">
    </form>
    <form action="offre/view2" method="get" class="pull-left">
        <input type="submit" value="Filtres Avancés">
    </form>
    <?php
    if(isset($test_filtre)){
    if ($test_filtre=="1")
    echo'<form style="margin-left:1em;"  action="/GetRide/GetRide/Offre" method="get" class="pull-left">
        <input style="background-color:cornflowerblue; border-color:cornflowerblue;" type="submit" value="Enlever les filtres actuels">
    </form>';
    }else{
        echo'<form style="margin-left:1em;"  action="/GetRide/GetRide/Offre" method="get" class="pull-left">
        <input style="background-color:cornflowerblue; border-color:cornflowerblue;" type="submit" value="Enlever les filtres actuels">
    </form>';
    }
    ?>
</div>
<div class="pull-right"><strong>Filtres appliqués :  </strong> <?php echo $string_filtre?></div>
</div>
