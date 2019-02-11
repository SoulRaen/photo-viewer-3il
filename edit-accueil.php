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
            <textarea id ="edit-accueil"></textarea>
            <div>
                <button class="submit-btn send-accueil-info-btn align-left"><img class ="img-in-text" src="https://storage.needpix.com/rsynced_images/cross-mark-304374_1280.png"> Annuler</button>
                <button class="submit-btn send-accueil-info-btn align-right"><span style="text-color : green"> &#x2714;</span> test</button>
            </div>
        </section>
        <?= getScriptsCommuns() ?>
    </body>
</html>