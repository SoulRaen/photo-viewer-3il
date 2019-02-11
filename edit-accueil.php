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
                <button class="submit-btn" id ="send-accueil-info-btn">Annuler</button>
                <button></button>
            </div>
        </section>
        <?= getScriptsCommuns() ?>
    </body>
</html>