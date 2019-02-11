<!DOCTYPE html>
<html lang="fr">
<?php require_once("php/layout.php");
      require_once("php/acces-contenu.php"); ?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Accueil") ?>
<?= getContenu("index.php") ?>
<?= getScriptsCommuns() ?>
    </body>
</html>