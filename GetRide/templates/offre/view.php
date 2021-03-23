<html>

<style>
  button {
    height: auto;
    font-style: normal;
    text-transform: unset !important;

  }

  label {
    font-size: medium;
    font-weight: normal;
    display: inline;
  }
</style>



<h1> Filtres recherche de offres </h1>

<form action="../offre" method="GET">
  <h2>Trier par</h2>
  <div class="form-group">
    <input type="radio" id="depart" name="tri" value="2">
    <label class="label_filtre" for="depart">Départ le plus tôt</label>

    </br>

    <input type="radio" id="prix" name="tri" value="1">
    <label for="prix">Prix le plus bas</label>

  </div>

  <div class="form-group">
    <h2>Heure de départ</h2>

    <input type="radio" id="6heures" name="depart" value="6">
    <label for="heure6">06:00-12:00</label>

    </br>

    <input type="radio" id="12heures" name="depart" value="12">
    <label for="heure12">12:01-18:00</label>

    </br>

    <input type="radio" id="18heures" name="depart" value="18">
    <label for="heure18">Après 18:00</label>

  </div>

  <div class="form-group">

    <h2>Services et équipements (TODO)</h2>

    <input type="radio" id="service1" name="eau" value="eau1">
    <label for="eau1">Bouteille d'eau Evian offerte</label>

    </br>

    <input type="radio" id="service2" name="eau" value="eau2">
    <label for="eau2">Bouteille d'eau Fuji offerte</label>

  </div>

  <div>
    <button class="btn btn-info" type="submit">Rechercher</button>
    <a href="../offre" class="btn btn-info" role="button">Annuler</a>
  </div>

</form>

</html>
