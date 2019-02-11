<?php

const HOST = "127.0.0.1";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE ="siteweb";

function getContenuAccueil() {
    try {
        /* Paramétrage connexion */
        $conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USERNAME, PASSWORD);
        /* Paramétrage requête */
        $stmt = $conn->prepare("SELECT contenu FROM sections WHERE page_id = (SELECT uID FROM pages WHERE nom = 'index.php');");
        /* Execution requête */
        if ($stmt->execute()) {
            /* Traitement des infos */
            $results = $stmt->fetchAll();
            if (!empty($results)) {
                return $results[0]['contenu'];
            }
            return "<p>Cette page est vide !</p>";
        } else { //erreur à l'exécution de la requête
            $erreur = $stmt->errorInfo();
            return "<span class=\"erreur-bdd\">Error: SQLSTATE[{$erreur[0]}] [{$erreur[1]}] " . utf8_encode($erreur[2]) . "</span>";
        }
    } catch(PDOException $e) {
        return "<span class=\"erreur-bdd\">Error: " . utf8_encode($e->getMessage()) . "</span>";
    }
}

?>