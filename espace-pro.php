<!DOCTYPE html>
<html lang="fr">
<?php require_once("php/layout.php"); ?>
<?= getHead() ?>
<link rel="stylesheet" type="text/css" href="./css/test.css" />
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
        <section>
            <form class="form-signin">
                <h1 class="h3 signin-title">Page de connexion</h1>
                <input type="email" id="inputEmail" class="form-control" placeholder="Adresse mail" required autofocus>
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                <button class="submit-btn" type="submit">Se connecter</button>
            </form>
        </section>
    </body>
</html>