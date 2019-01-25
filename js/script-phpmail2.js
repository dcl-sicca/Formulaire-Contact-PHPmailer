// changement couleur de fond si saisie incorrect
function surligne(champ, erreur) {
    if(erreur){
       champ.style.backgroundColor = "#fba";
       champ.style.color = "#712727";
     } else {
       champ.style.backgroundColor = "";
       champ.style.color = "white";
     }
 }

 // verification email
function verifMail(champ){
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value)){
     surligne(champ, true);
     return false;
    } else {
     surligne(champ, false);
     return true;
    }
 } ; 

 // vérification du select au moment du submit
var activite = document.getElementById('activite');

function verifForm(){
    
        if(activite.value == 0){
            surligne(activite, true);
            return false;
        } else {
            surligne(activite, false);
            return true;
        }
};