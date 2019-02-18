<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/layout.php");
    if (!isset($_SESSION["login"])) {//redirige vers l'accueil si non connecté
        header('Location: index.php');
    }
?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
        <section>
            <h2 class="centered-title">Édition de la page Accueil</h2>
            <textarea spellcheck="false" class ="edit" id ="text-window"><?= getContenu("index.php",true)[0]["contenu"] ?></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left" onclick="abortChanges()"><img class ="img-in-text" src="assets/red-cross-error.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right" onclick="updateContent()"><img class ="img-in-text" src="assets/green-check-mark.png"> Accepter</button>
            </div>
        </section>
<?= getScriptsCommuns() ?>
        <script>
            function abortChanges(){
                /* Redirige vers l'accueil */
                window.location.replace("/");
            }

            function updateContent(){
                /* Envoie le contenu */
                var content = document.getElementById("text-window").value;
                console.log(content);

                xmlhttp= new XMLHttpRequest();
                xmlhttp.open('POST', 'php/edit-pages/accueil.php', true);
                xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                xmlhttp.send("contenu="+content);
                /* Quand l'état change */
                xmlhttp.onreadystatechange = function (){
                    /* Chargement de la réponse finie + status HTTP OK */
                    if (xmlhttp.readyState ==4 && xmlhttp.status ==200){
                        //var jsonobj = JSON.parse(xmlhttp.responseText);

                        alert(xmlhttp.responseText);

                        /* Réaction à la réponse */
                        /*switch (jsonobj["code resultat"]) {
                            case "fichier existe deja" :
                                alert("Cette image existe déjà sur le serveur.");
                                break;
                            case "mauvais type image" :
                                alert("Type de fichier non autorisé.");
                                break;
                            case "upload OK" :
                                alert("L'envoi s'est déroulé avec succès.");
                                break;
                        }*/
                    }
                }
            }

        </script>
    </body>
</html>