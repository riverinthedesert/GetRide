<h1 class="text-center font-weight-bold"> Historique des recherches </h1>

<table>
    <tr>
        <th>Date de recherche</th>
        <th>Ville départ</th>
        <th>Ville arrivée</th>
        <th>Conducteur</th>
        <th>Date de départ</th>
        <th></th>
    </tr>
<?php
    foreach ($historique as $item){
        echo "<tr>";
        echo "<td>"; echo $item["dateRecherche"]; echo "</td>";
        echo "<td>"; echo ucfirst($item["nomVilleDepart"]); echo "</td>";
        echo "<td>"; echo ucfirst($item["nomVilleArrivee"]); echo "</td>";
        echo "<td>"; echo ucfirst($item["nom"])." ".ucfirst($item["prenom"]); echo "</td>";
        echo "<td>"; echo $item["horaireDepart"]; echo "</td>";
        $idOffre = $item["idOffre"];
        echo "<td>";echo "<a role='button' class='btn btn-info' href = '/GetRide/GetRide/offre/details?idOffre=$idOffre'>Détails</a>"; echo"</td>";
        echo "</tr>";
    }
  /*  foreach ($utilisateur as $user){
        echo $user["idMembre"];
    }*/
?>

</table>
</br>
<div>
<?php

if ($this->request->getQuery("date")=="1"){
    echo '<a href="/GetRide/GetRide/offre/historique   " class="btn btn-danger" role="button">Affichage sans tri</a>';
}else{
    echo'<a href="/GetRide/GetRide/offre/historique?date=1   " class="btn btn-danger" role="button">Trier par le plus récent</a>';
}

?>
</div>