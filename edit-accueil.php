<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/include/layout.php");
    if (!isset($_SESSION["login"])) {//redirige vers l'accueil si non connecté
        header('Location: index.php');
    }
?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
<?php $results = getContenu("index.php", true); ?>
        <section>
            <h2 class="centered-title">Édition de la page Accueil</h2>
            <textarea spellcheck="false" class ="edit" id ="text-window-<?= $results[0]['uID'] ?>"><?= $results[0]["contenu"] ?></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left" onclick="abortChanges('index.php')"><img class ="img-in-text" src="assets/red-cross-error.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right" onclick="updateContent('<?= $results[0]['uID'] ?>')"><img class ="img-in-text" src="assets/green-check-mark.png"> Accepter</button>
            </div>
        </section>
<?= getScriptsCommuns() ?>
        <script src="./js/upload.js"></script>
    </body>
</html>