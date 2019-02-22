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
<?php $results = getContenu("news.php", true); ?>
        <section id="choix-mode"><!-- Choix des modifs à faire -->
            <h2 class="centered-title">Édition de la page News</h2>
            <label><input name="mode" type="radio" value="ajout" checked />Ajouter des news</label>
            <label><input name="mode" type="radio" value="modif" />Modifier des news</label>
            <label><input name="mode" type="radio" value="suppr" />Supprimer des news</label>
        </section>
        <!-- PARTIE AJOUT -->
        <section id="ajout-news">
            <h3 class="centered-title">Ajout de news</h3>
            <textarea spellcheck="false" class="edit" id ="text-window-ajout"></textarea>
            <div>
                <button class="submit-btn send-info-btn align-left" onclick="abortChanges('news.php')"><img class ="img-in-text" src="assets/red-cross-error.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right" onclick="ajouterNews()"><img class ="img-in-text" src="assets/green-check-mark.png"> Accepter</button>
            </div>
        </section>
        <!-- PARTIE MODIF -->
        <section id="modif-news" style="display: none">
            <h3 class="centered-title">Modification de news</h3>
            <?php 
            if (count($results) == 0) {
                echo "Aucune news existante.";
            }
            foreach ($results as $result) { ?>
            <p class="date-section">Créé le <?= $result['date_creation'] ?> (dernière modification le <?= $result['date_modification'] ?>)</p>
            <textarea spellcheck="false" class="edit" id ="text-window-<?= $result['uID'] ?>"><?= $result['contenu'] ?></textarea>
            <div style="overflow:auto">
                <button class="submit-btn send-info-btn align-left" onclick="abortChanges('news.php')"><img class ="img-in-text" src="assets/red-cross-error.png"> Annuler</button>
                <button class="submit-btn send-info-btn align-right" onclick="updateContent(<?= $result['uID'] ?>)"><img class ="img-in-text" src="assets/green-check-mark.png"> Accepter</button>
            </div>
            <?php } ?>
        </section>
        <!-- PARTIE SUPPRESSION -->
        <section id="suppr-news" style="display: none">
            <h3 class="centered-title">Suppression de news</h3>
            <?php 
            if (count($results) == 0) {
                echo "Aucune news existante.";
            }
            foreach ($results as $result) { ?>
            <article id="news-<?= $result['uID'] ?>">
                <p class="date-section">Créé le <?= $result['date_creation'] ?> (dernière modification le <?= $result['date_modification'] ?>)</p>
                <?= $result['contenu'] ?>
                <input type="button" onclick="supprimerNews(<?= $result['uID'] ?>)" value="Supprimer" class="submit-btn"/>
            </article>
            <?php } ?>
        </section>
<?= getScriptsCommuns() ?>
        <script src="./js/upload.js"></script>
        <script type="text/javascript">
            $("input[name=mode]").on("change", function () {
                $("section").hide();
                $("#choix-mode, #" + this.value + "-news").show();
            });
        </script>
    </body>
</html>