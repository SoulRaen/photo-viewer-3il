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
                /* */
                alert("ok");
                var content = document.getElementById("text-window").value;
                console.log(content);
            }

        </script>
    </body>
</html>