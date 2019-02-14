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
            <textarea spellcheck="false" class ="edit"><?= getContenu("index.php",true)[0]["contenu"] ?></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left"><img class ="img-in-text" src="https://storage.needpix.com/rsynced_images/cross-mark-304374_1280.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right"><img class ="img-in-text" src="http://www.clker.com/cliparts/2/k/n/l/C/Q/transparent-green-checkmark-md.png"> Accepter</button>
            </div>
        </section>
<?= getScriptsCommuns() ?>
    </body>
</html>