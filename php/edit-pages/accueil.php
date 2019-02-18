<?php
    require_once("../verif-connect.php");

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname="siteweb";

    $page="index.php";
    if(isset($_SESSION["login"])){
        //header("Content-Type: application/json");
        try {
            /* Paramétrage connexion */
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            /* Paramétrage requête */
            $stmt = $conn->prepare("UPDATE `sections` SET `contenu` = :contenu WHERE page_id = (SELECT uID FROM pages WHERE nom = :page) ORDER BY date_creation DESC;");
            $stmt->bindValue(":contenu", $_POST["contenu"], PDO::PARAM_STR);
            $stmt->bindValue(":page", $page, PDO::PARAM_STR);
            /* Execution requête */
            $stmt->execute();
            /* Traitement des infos */
            $results = $stmt->fetchAll();
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>