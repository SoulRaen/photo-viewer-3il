<?php
require_once("verif-connect.php");

const HOST = "127.0.0.1";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE ="siteweb";

/*
 * Parties réutilisées des pages
 */

 /**
  * Fournie le <head> du site
 * @param $titre le titre de la page. ("Viewer" par défaut)
  */
function getHead($titre = "Viewer") {
    return <<<EOT
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="./css/style.css" />
        <title>Viewer</title>
    </head>

EOT;
 }
 
 
/**
 * Fournie le <header> du site
 */
function getHeader(){
    return <<<EOT
        <header><h1>Mon titre</h1></header>

EOT;
}

/**
 * Fournie le menu du site
 * @param $nomPage le nom de la page sélectionnée dans le menu. 
 *        Si la page n'existe pas aucune n'est sélectionnée.
 */
function getMenu($nomPage = ""){
    $pages = [
        "Accueil" => "",
        "News" => "",
        "Photos" => "",
        "Contact" => "",
        "Espace Pro" => ""
    ];
    $pages[$nomPage] = ' id="menu-item-selected"';
    $nom = $_SESSION["nom"] ?? "";
    $prenom = $_SESSION["prenom"] ?? "";
    $menuHtml = <<<EOT
        <nav>
            <a href="index.php" class="menu-item"{$pages["Accueil"]}>Accueil</a>
            <a href="news.php" class="menu-item"{$pages["News"]}>News</a>
            <a href="photos.php" class="menu-item"{$pages["Photos"]}>Photos</a>
            <a href="contact.php" class="menu-item"{$pages["Contact"]}>Contact</a>
            <a href="espace-pro.php" class="menu-item"{$pages["Espace Pro"]}>Espace Pro</a>

EOT;
    if (isset($_SESSION["login"])) {
        $menuHtml .= <<<EOT
            <a href="php/deconnexion.php" class="menu-item" id="connectionLabel">{$nom} {$prenom} (Déconnexion)</a>

EOT;
        if (in_array($nomPage, ["Accueil", "News", "Photos", "Contact"])) {
            $slug = strtolower($nomPage);
            $menuHtml .= <<<EOT
            <a href="edit-{$slug}.php" class="menu-item" id="edit-page">Éditer</a>

EOT;
        }
    }
    $menuHtml .= <<<EOT
        </nav>
        <div id="expand-button" onclick="toggleExpand()">...</div>

EOT;
    return $menuHtml;
}

/**
 * Fournie le contenu de la page en paramètre
 * @param $page le nom de la page dont on veut le contenu. 
 */
function getContenu($page, $array = false) {
    try {
        /* Paramétrage connexion */
        $conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
        /* Paramétrage requête */
        $stmt = $conn->prepare("SELECT contenu, date_creation, date_modification FROM sections WHERE page_id = (SELECT uID FROM pages WHERE nom = :page) ORDER BY date_creation DESC;");
        $stmt->bindValue(":page", $page, PDO::PARAM_STR);
        /* Execution requête */
        if ($stmt->execute()) {
            /* Récupération du contenu */
            $results = $stmt->fetchAll();
            if ($array) {//renvoie directement le tableau si demandé
                return $results;
            }
            if (!empty($results)) {
                $contenu = "";
                foreach ($results as $ligne) {
                    $contenu .= <<<EOT
        <section>
            <p class="date-section">Créé le {$ligne['date_creation']} (dernière modification le {$ligne['date_modification']})</p>
{$ligne['contenu']}
        </section>
EOT;
                }
                return $contenu;
            }
            return "<section><p>Cette page est vide !</p><section>";
        } else { //erreur à l'exécution de la requête
            $erreur = $stmt->errorInfo();
            return "<span class=\"erreur-bdd\">Error: SQLSTATE[{$erreur[0]}] [{$erreur[1]}] " . utf8_encode($erreur[2]) . "</span>";
        }
    } catch(PDOException $e) {
        return "<span class=\"erreur-bdd\">Error: " . utf8_encode($e->getMessage()) . "</span>";
    }
}

/**
 * Fournie l'appel à jQuery
 */
function getScriptsCommuns() {
    return <<<EOT
        <script
			  src="./js/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
        <script src="./js/menu.js"></script>

EOT;
}