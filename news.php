<!DOCTYPE html>
<html lang="fr">
<?php require_once("php/layout.php");
      require_once("php/acces-contenu.php"); ?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("News") ?>
<?= getContenu("news.php") ?>
<?= getScriptsCommuns() ?>
    </body>
</html>