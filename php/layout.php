<?php
require_once("verif_connect.php");
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
    $nom=$_SESSION["nom"] ?? "";
    $prenom=$_SESSION["prenom"] ?? "";
    return <<<EOT
        <header><h1 id="mainTitle">Mon titre</h1><div id="connectionLabel">{$nom} {$prenom}</div></header>
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
        "Espace Pro" => "",
        "Upload images" =>""
    ];
    $pages[$nomPage] = ' id="menu-item-selected"';
    $menuHtml = <<<EOT
        <nav>
            <a href="index.php" class="menu-item"{$pages["Accueil"]}>Accueil</a>
            <a href="photos.php" class="menu-item"{$pages["Photos"]}>Photos</a>
            <a href="contact.php" class="menu-item"{$pages["Contact"]}>Contact</a>
            <a href="espace-pro.php" class="menu-item"{$pages["Espace Pro"]}>Espace Pro</a>
            
EOT;
    if(isset($_SESSION["login"])){
        $menuHtml .= <<<EOT
            <a href="upload-images.php" class="menu-item"{$pages["Upload images"]}>Upload</a>
        
EOT;
    }
    $menuHtml .= <<<EOT
        </nav>
        
EOT;
    return $menuHtml;
}
/*
 * Fournie l'appel à jQuery
 */
function getJQuery() {
    return <<<EOT
        <script
			  src="./js/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous"></script>
              
EOT;
}