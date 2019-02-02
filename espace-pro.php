<!DOCTYPE html>
<html lang="fr">
<?php require_once("php/layout.php"); ?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
        <section>
            <form class="form-signin">
                <h1 class="h3 signin-title">Page de connexion</h1>
                <input type="login" name="user_login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
                <input type="password" name="user_pw" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                <button class="submit-btn" type="button" onclick="connect()">Se connecter</button>
            </form>
        </section>
<?= getJQuery() ?>
    </body>
    <script>
        var nbconnect = 0;

        $('form').bind("keypress", function(e) {
            if (e.keyCode == 13) {               
                e.preventDefault();
                //alert("touche entree");
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
                }else {                             /* Si XMLHttpRequest n'est pas supporté */
                    xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                /* Paramètre le type de connexion + la destination + type de contenu + contenu */
                xmlhttp.open("POST","./php/connexion.php",true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("user_login="+login+"&user_pw="+mdp);
                /* Quand l'état change */
                xmlhttp.onreadystatechange = function (){
                    /* Chargement de la réponse finie + status HTTP OK */
                    if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
                        /* Réaction à la réponse */
                        switch (xmlhttp.responseText) {
                            case "no result" :
                                alert("Mauvais login ! : Pas de résultat");
                                break;
                            case "wrong pw" :
                                alert("Mauvais mot de passe !");
                                break;
                            case "multiple results" :
                                alert("Mauvais login ! : plusieurs résultat");
                                break;
                            case "connect ok" :
                                nbconnect++;
                                alert("Connecté !");
                        }
                    }
                }
            }
        }
    </script>
</html>