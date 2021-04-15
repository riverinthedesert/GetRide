function Afficher(){ 
    var mdp = document.getElementById("mdp"); 
    var img = document.getElementById("imageOeil");
    if (mdp.type === "password"){ 
        mdp.type = "text"; 
        img.src = "/GetRide/GetRide/webroot/img/eye_hide.png";
    }else{ 
        mdp.type = "password";
        img.src = "/GetRide/GetRide/webroot/img/eye_show.png";
    } 
} 

function conf_Afficher(){ 
    var mdp = document.getElementById("cmdp"); 
    var img = document.getElementById("cimg");
    if (mdp.type === "password"){ 
        mdp.type = "text"; 
        img.src = "/GetRide/GetRide/webroot/img/eye_hide.png";
    } 
    else{ 
        mdp.type = "password";
        img.src = "/GetRide/GetRide/webroot/img/eye_show.png";
    } 
}


function montrerChamp(){
    if(document.getElementById("estconducteur-oui").checked){
        document.getElementById("voiture").style.display="block";
        document.getElementById("immatriculation").style.display="block";
        document.getElementById("labelVoiture").style.display="block";
        document.getElementById("labelImmatriculation").style.display="block";
        document.getElementById("aide-immatriculation").style.display="block";
        document.getElementById("voiture").required= true;
        document.getElementById("immatriculation").required= true;
    }else{
        document.getElementById("voiture").style.display="none";
        document.getElementById("immatriculation").style.display="none";
        document.getElementById("labelVoiture").style.display="none";
        document.getElementById("labelImmatriculation").style.display="none";
        document.getElementById("aide-immatriculation").style.display="none";
        document.getElementById("voiture").required= false;
        document.getElementById("immatriculation").required= false;
    }
}
