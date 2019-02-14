<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/layout.php");?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
        <section>
            <h1 class="centered-title">Mise à jour du contenu de la page d'accueil</h1>
            <textarea id ="edit-accueil"><?=?></textarea>
            <div>
                <button class="submit-btn send-accueil-info-btn align-left"><img class ="img-in-text" src="https://storage.needpix.com/rsynced_images/cross-mark-304374_1280.png"> Annuler</button>
                <button class="submit-btn send-accueil-info-btn align-right"><img class ="img-in-text" src="http://www.clker.com/cliparts/2/k/n/l/C/Q/transparent-green-checkmark-md.png"> Accepter</button>
            </div>
        </section>
        <?= getScriptsCommuns() ?>
        <script type="text/javascript">
            window.onload=function(e){
                var xmlhttp;
                if(window.XMLHttpRequest){          /* Si XMLHttpRequest supporté */
                    xmlhttp= new XMLHttpRequest();

                    /* Paramètre le type de connexion + la destination + type de contenu + contenu */
                    xmlhttp.open("GET","./php/connexion.php",true);
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
        </script>
    </body>
</html>