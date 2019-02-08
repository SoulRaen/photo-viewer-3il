var nbconnect = 0;

/* Permet d'envoyer le formulaire en appuyant sur la touche Entrée */
$('form').bind("keypress", function(e) {
    if (e.keyCode == 13) {               
        e.preventDefault();
        connect();
        return false;
    }
});

function connect(){
    if(nbconnect<=0){
        var login = $("#inputLogin")[0].value;
        var mdp = $("#inputPassword")[0].value;
        var xmlhttp;
        if(window.XMLHttpRequest){          /* Si XMLHttpRequest supporté */
            xmlhttp= new XMLHttpRequest();

            /* Paramètre le type de connexion + la destination + type de contenu + contenu */
            xmlhttp.open("POST","./php/connexion.php",true);
            xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xmlhttp.send("user_login="+login+"&user_pw="+mdp);
            /* Quand l'état change */
            xmlhttp.onreadystatechange = function (){
                /* Chargement de la réponse finie + status HTTP OK */
                if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
                    var jsonobj = JSON.parse(xmlhttp.responseText);

                    /* Réaction à la réponse */
                    switch (jsonobj["code resultat"]) {
                        case "pas de resultats" :
                            alert("Mauvais login ! : Pas de résultat");
                            break;
                        case "mauvais mdp" :
                            alert("Mauvais mot de passe !");
                            break;
                        case "resultats mutiples" :
                            alert("Mauvais login ! : plusieurs résultat");
                            break;
                        case "connexion OK" :
                            /* Empêche de se reconnecter une fois connecté */
                            nbconnect++;

                            alert("Connecté pour "+jsonobj["duree-session-min"]+" minute(s)");
                            
                            /* Rafraîchis la page */
                            window.location.replace("./espace-pro.php");
                    }
                }
            }
        }else{
            alert("Navigateur obsolète, veuillez le mettre à jour");
        }
    }
}