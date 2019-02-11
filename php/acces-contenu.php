<?php

const HOST = "127.0.0.1";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE ="siteweb";

function getContenu($page) {
    try {
        /* Paramétrage connexion */
        $conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
        /* Paramétrage requête */
        $stmt = $conn->prepare("SELECT contenu FROM sections WHERE page_id = (SELECT uID FROM pages WHERE nom = :page) ORDER BY date_creation DESC;");
        $stmt->bindValue(":page", $page, PDO::PARAM_STR);
        /* Execution requête */
        if ($stmt->execute()) {
            /* Récupération du contenu */
            $results = $stmt->fetchAll();
            if (!empty($results)) {
                $contenu = "";
                foreach ($results as $ligne) {
                    $contenu .= <<<EOT
        <section>
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

?>