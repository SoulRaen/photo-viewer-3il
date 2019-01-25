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
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Adresse mail" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                <!--div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div-->
                <button class="submit-btn" type="submit">Sign in</button>
            </form>
        </section>
    </body>
</html>