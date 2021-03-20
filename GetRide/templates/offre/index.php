<html>

<h1> Filtres recherche de offres </h1>

<form action="offre/view" method="GET">
  <h2>Trier par</h2>
  <div>
    <label for="depart">Départ le plus tôt</label>
    <input type="radio" id="depart"
     name="tri" value="2">

    <label for="prix">Prix le plus bas</label>
    <input type="radio" id="prix"
     name="tri" value="1">

  </div>

  <h2>Heure de départ</h2>
    <label for="heure6">06:00-12:00</label>
    <input type="radio" id="6heures"
     name="depart" value="6">

    <label for="heure12">12:01-18:00</label>
    <input type="radio" id="12heures"
     name="depart" value="12">

    <label for="heure18">Après 18:00</label>
    <input type="radio" id="18heures"
     name="depart" value="18">

    <h2>Services et équipements (TODO)</h2>

    <label for="eau1">Bouteille d'eau Evian offerte</label>
    <input type="radio" id="service1"
     name="eau" value="eau1">

    <label for="eau2">Bouteille d'eau Fuji offerte</label>
    <input type="radio" id="service2"
     name="eau" value="eau2">
  <div>
    <button action="view.php" type="submit">Rechercher</button>
  </div>
</form>

<form action="offre/view" method="get">
<input type="submit" value="Annuler">
</form>

</html>