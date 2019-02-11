<!DOCTYPE html>
<html lang="fr">
<?php require_once("php/layout.php");
      require_once("php/acces-contenu.php"); ?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Photos") ?>
        <section>
            <button onclick="getImages()">Charger les images</button>
            <div id="carrousel"></div>
            <!-- style dans l'élément pour pouvoir utiliser les fonctions jQuery hide() et show()-->
            <button class="bouton-carrousel" id="bouton-carrousel-gauche" style="display:none">&lt;</button>
            <button class="bouton-carrousel" id="bouton-carrousel-droite" style="display:none">&gt;</button>
            <div id="compteur-images" style="display:none"></div>
        </section>
<?= getContenu("photos.php") ?>
<?= getScriptsCommuns() ?>
        <script src="./js/carrousel.js"></script>
    </body>
</html>