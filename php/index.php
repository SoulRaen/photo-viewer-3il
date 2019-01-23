<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="siteweb";

$layout="";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT contenu FROM pages WHERE nom='layout'"); 
    $stmt->execute();

    /* Récupération de toutes les lignes d'un jeu de résultats */
    //print("Récupération de toutes les lignes d'un jeu de résultats :\n");
    $result = $stmt->fetchAll();
    //echo $result[0];
    print_r($result[0]["contenu"]);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;


