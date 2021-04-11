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


