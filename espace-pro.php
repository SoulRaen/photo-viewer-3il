<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/include/layout.php");?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
    <?php
    /* Si personne n'est connecté, afficher la page de connexion */
    if(!isset($_SESSION["login"])){
    ?>
        <section>
            <form class="form-signin">
                <h2 class="centered-title">Page de connexion</h2>
                <input type="login" name="user_login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
                <input type="password" name="user_pw" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                <button class="submit-btn" type="button" onclick="connect()">Se connecter</button>
            </form>
        </section>
        <?= getScriptsCommuns() ?>
        <script src="./js/connexion.js"></script>
    </body>
    <?php
    /* Si quelqu'un est connecté, afficher la page d'upload */
    }else{
        ?>
        <section>
            <h2 class="centered-title">Choisissez une page à éditer</h2>
            <div class="centered-title">
                <a href="./edit-accueil.php" class="bouton-carre">Accueil</a>
                <a href="./edit-news.php" class="bouton-carre">News</a>
                <a href="./edit-photos.php" class="bouton-carre">Photos</a>
                <a href="./edit-contact.php" class="bouton-carre">Contact</a>
            </div>
        </section>
<?= getScriptsCommuns() ?>
        <script src="./js/upload.js"> </script>
        </body>
    <?php
    }
    ?>
</html>