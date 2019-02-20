<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/include/layout.php");
    if (!isset($_SESSION["login"])) {   //redirige vers l'accueil si non connecté
        header('Location: index.php');
    }
?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
        <section>
            <h2 class="centered-title">Édition de la page Contact</h2>
            <textarea spellcheck="false" class ="edit" id ="text-window"><?= getContenu("contact.php",true)[0]["contenu"] ?></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left" onclick="abortChanges()"><img class ="img-in-text" src="assets/red-cross-error.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right" onclick="updateContent('contact.php')"><img class ="img-in-text" src="assets/green-check-mark.png"> Accepter</button>
            </div>
        </section>
<?= getScriptsCommuns() ?>
        <script>
            function abortChanges(){
                /* Redirige vers la page contact (hors edit) */
                window.location.replace("photo-viewer-3iL/contact.php");
            }
        </script>
        <script src="./js/upload.js"></script>
    </body>
</html>