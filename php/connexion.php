<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="siteweb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "user email : ".$_POST["user_email"];
    $stmt = $conn->prepare("SELECT uID,login,mdp FROM users WHERE email='".$_POST["user_email"]."'"); 
    echo "<BR>user pw : ".$_POST["user_pw"];
    $stmt->execute();
    echo "<BR>user pw : ".$_POST["user_pw"];
    /* Récupération de toutes les lignes d'un jeu de résultats */
    //print("Récupération de toutes les lignes d'un jeu de résultats :\n");
    $results = $stmt->fetchAll();
    echo "<BR>user pw : ".$_POST["user_pw"];
    echo "<br>uID : ".$results[0]["uID"];
    echo "<br>login : ".$results[0]["login"];
    echo "<br>mdp : ".$results[0]["mdp"];
    /*foreach ($results as $i => $result) {
        //echo "\$results[$k] => $v.\n";
        foreach ($result as $j => $value) {
            echo "<br>value : ".$value;
        }
    }*/
    //print_r($result[0]["contenu"]);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>