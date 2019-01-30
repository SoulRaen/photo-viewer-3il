<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="siteweb";

try {
    /* Paramétrage connexion */
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    /* Paramétrage requête */
    $stmt = $conn->prepare("SELECT uID,email,mdp FROM users WHERE login='".$_POST["user_login"]."'");
    /* Execution requête */
    $stmt->execute();
    /* Traitement des infos */
    $results = $stmt->fetchAll();
    /* Si plusieurs résultats, erreur */
    if (isset($results[1])){
        echo "multiple results";
    }else if(isset($results[0])){       /* Si un résultat présent, traiter */
        if($results[0]["mdp"]==$_POST["user_pw"]){
            echo "connect ok";
            session_start();
            $_SESSION['connected_login']=$_POST["user_login"];
        }else{
            echo "wrong pw";
        }
    }else {     /* Si 0 résultat */
        echo "no result";
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>