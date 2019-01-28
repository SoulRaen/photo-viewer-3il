<?php

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
 
 
/*
 * Fournie le <header> du site
 */
function getHeader(){
    return <<<EOT
        <header><h1>Mon titre</h1></header>

EOT;
}

/*
 * Fournie le menu du site
 * @param $nomPage le nom de la page sélectionnée dans le menu. 
 *        Si la page n'existe pas aucune n'est sélectionnée.
 */
function getMenu($nomPage = ""){
    $pages = [
        "Accueil" => "",
        "Photos" => "",
        "Contact" => "",
        "Espace Pro" => ""
    ];
    $pages[$nomPage] = ' id="menu-item-selected"';
    return <<<EOT
        <nav>
            <a href="index.php" class="menu-item"{$pages["Accueil"]}>Accueil</a>
            <a href="photos.php" class="menu-item"{$pages["Photos"]}>Photos</a>
            <a href="contact.php" class="menu-item"{$pages["Contact"]}>Contact</a>
            <a href="espace-pro.php" class="menu-item"{$pages["Espace Pro"]}>Espace Pro</a>
        </nav>

EOT;
}

/*
 * Fournie l'appel à jQuery
 */
function getJQuery() {
    return <<<EOT
        <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
              
EOT;
}
