<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/layout.php");
    if (!isset($_SESSION["login"])) {//redirige vers l'accueil si non connecté
        header('Location: index.php');
    }
?>
<?= getHead() ?>
    <body>
<?= getHeader() ?>
<?= getMenu("Espace Pro") ?>
<?php $results = getContenu("photos.php", true); ?>
        <section id="choix-mode"><!-- Choix des modifs à faire -->
            <h2 class="centered-title">Édition de la page Photos</h2>
            <label><input name="mode" type="radio" value="modif" checked />Modifier le texte</label>
            <label><input name="mode" type="radio" value="ajout" />Ajouter des images</label>
            <label><input name="mode" type="radio" value="suppr" />Supprimer des images</label>
        </section>
        <!-- PARTIE MODIF -->
        <section id="modif-photos">
            <h3 class="centered-title">Modification du texte</h3>
            <textarea spellcheck="false" class="edit"><?= $results[0]['contenu'] ?? "" ?></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left"><img class ="img-in-text" src="https://storage.needpix.com/rsynced_images/cross-mark-304374_1280.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right"><img class ="img-in-text" src="http://www.clker.com/cliparts/2/k/n/l/C/Q/transparent-green-checkmark-md.png"> Accepter</button>
            </div>
        </section>
        <!-- PARTIE AJOUT -->
        <section id="ajout-photos" style="display: none">
            <h3 class="centered-title">Ajout d'images</h3>
                <form class ="file-upload" enctype="multipart/form-data">
                    <input type="file" id="filename" class="form-control" accept="image/*"/>
                    <input type="button" onclick="upload()" value="Upload" class="submit-btn"/>
                </form>
        </section>
        <!-- PARTIE SUPPRESSION -->
        <section id="suppr-photos" style="display: none">
            <h3 class="centered-title">Suppression d'images</h3>
        </section>
<?= getScriptsCommuns() ?>
        <script src="./js/upload.js"></script>
        <script type="text/javascript">
            $("input[name=mode]").on("change", function () {
                $("section").hide();
                $("#choix-mode, #" + this.value + "-photos").show();
            });
        </script>
    </body>
</html>