<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/layout.php");?>
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
                <h1 class="centered-title">Page de connexion</h1>
                <input type="login" name="user_login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
                <input type="password" name="user_pw" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
                <button class="submit-btn" type="button" onclick="connect()">Se connecter</button>
            </form>
        </section>
        <script src="./js/connexion.js"></script>
        <?= getScriptsCommuns() ?>
    </body>
    <?php
    /* Si quelqu'un est connecté, afficher la page d'upload */
    }else{ ?>
        <section>
                <form class ="file-upload" enctype="multipart/form-data">
                    <h1 class="centered-title">Ajout d'images au carrousel</h1>
                    <input type="file" id="filename" class="form-control" accept="image/*"/>
                    <input type="button" onclick="upload()" value="Upload" class="submit-btn"/>
                </form>
            </section>
        <script src="./js/upload.js"> </script>
        <?= getScriptsCommuns() ?>
        </body>
    <?php
    }
    ?>
</html>