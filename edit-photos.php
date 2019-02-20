<!DOCTYPE html>
<html lang="fr">
<?php 
    require_once("php/include/layout.php");
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
            <textarea spellcheck="false" class="edit" id ="text-window"><?= $results[0]['contenu'] ?></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left" onclick="abortChanges()"><img class ="img-in-text" src="assets/red-cross-error.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right" onclick="updateContent('photos.php')"><img class ="img-in-text" src="assets/green-check-mark.png"> Accepter</button>
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
            <button onclick="getImages()">Charger les images</button>
            <div id="carrousel"></div>
            <!-- style dans l'élément pour pouvoir utiliser les fonctions jQuery hide() et show()-->
            <button class="bouton-carrousel" id="bouton-carrousel-gauche" style="display:none">&lt;</button>
            <button class="bouton-carrousel" id="bouton-carrousel-droite" style="display:none">&gt;</button>
            <div id="compteur-images" style="display:none"></div>
            <input type="button" onclick="supprimerImage()" value="Supprimer" class="submit-btn"/>
        </section>
<?= getScriptsCommuns() ?>
        <script src="./js/carrousel.js"></script>
        <script src="./js/upload.js"></script>
        <script type="text/javascript">
            $("input[name=mode]").on("change", function () {
                $("section").hide();
                $("#choix-mode, #" + this.value + "-photos").show();
            });
        </script>
    </body>
</html>