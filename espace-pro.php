<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/layout.php");?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
    <?php
    if(!isset($_SESSION["login"])){
    ?>
        <section>
            <form class="form-signin">
                <h1 class="centered-title">Page de connexion</h1>
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
                                /* Ajout de l'étiquette avec nom + prénom dès la fermeture de la fenêtre d'Alert */
                                document.getElementById("connectionLabel").innerText = jsonobj["nom"]+" "+jsonobj["prenom"];
                                alert("Connecté !");
                                
                                /* Ajout du nouvel onglet */
                                /*var x = document.getElementsByTagName("nav");
                                var last_link = x.item(  (x.length) -1  );
                                var newText = document.createElement("a");
                                newText.href=jsonobj["nouvel onglet"]["href"];
                                newText.classList.add(jsonobj["nouvel onglet"]["class"]);
                                newText.innerText=jsonobj["nouvel onglet"]["innerText"];
                                last_link.appendChild(newText);*/
                                window.location.replace("./espace-pro.php");
                        }
                    }
                }
            }
        }
    </script>
    <?php
    }else{ ?>
        <div class ="file-upload">
			<h1 class="centered-title">Ajout d'images au carrousel</h1>
			<input type="file" id="filename" class="form-control" placeholder="Fichier à envoyer" required autofocus>
		</div>
    <?php
    }
    ?>
</html>