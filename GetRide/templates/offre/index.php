<html>

<style>

button{
  height: auto;
}
label{
  font-size:small; 
  font-weight:normal;
}

</style>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<h1> Filtres recherche de offres </h1>

<form action="offre/view" method="GET" >
  <h2>Trier par</h2>
  <div class = "form-group">
    <input type="radio" id="depart"
     name="tri" value="2">  
    <label class="label_filtre" for="depart">Départ le plus tôt</label>

     </br>

    <input type="radio" id="prix"
     name="tri" value="1">
     <label for="prix">Prix le plus bas</label>

  </div>
  
  <hr>

  <div class = "form-group">
    <h2>Heure de départ</h2>

    <input type="radio" id="6heures"
     name="depart" value="6">
    <label for="heure6">06:00-12:00</label>

     </br>

     <input type="radio" id="12heures"
     name="depart" value="12">
     <label for="heure12">12:01-18:00</label>

     </br>

    <input type="radio" id="18heures"
     name="depart" value="18">
    <label for="heure18">Après 18:00</label>
  
  </div>

  <hr>

  <div class = "form-group">

    <h2>Services et équipements (TODO)</h2>

    <input type="radio" id="service1"
     name="eau" value="eau1">
     <label for="eau1">Bouteille d'eau Evian offerte</label>

     </br>

    <input type="radio" id="service2"
     name="eau" value="eau2">
     <label for="eau2">Bouteille d'eau Fuji offerte</label>
  
  </div>

  <hr>

  <div>
    <button class="btn btn-info" action="view.php" type="submit">Rechercher</button>
    <a href="offre/view" class="btn btn-info" role="button">Annuler</a>
  </div>
  
</form>

</br>


</html>