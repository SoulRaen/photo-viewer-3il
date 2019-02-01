<!DOCTYPE html>
<html lang="fr">
<?php require_once("php/layout.php"); ?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Upload photos") ?>
		<div class ="file-upload">
			<h1 class="centered-title">Ajout de photos au carrousel</h1>
			<input type="file" id="filename" class="form-control" placeholder="Fichier à envoyer" required autofocus>
		</div>
<?= getJQuery() ?>
        <script src="./js/carrousel.js"></script>
    </body>
</html>