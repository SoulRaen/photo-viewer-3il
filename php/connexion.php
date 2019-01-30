<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="siteweb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /* Paramétrage requête */
    $stmt = $conn->prepare("SELECT uID,email,mdp,nom,prenom FROM users WHERE login='".$_POST["user_login"]."'");
    /* Execution requête */
    $stmt->execute();
    echo "<BR>user pw : ".$_POST["user_pw"];
    /* Récupération de toutes les lignes d'un jeu de résultats */
    $results = $stmt->fetchAll();
    /* Si plusieurs résultats, erreur */
    if (isset($results[1])){
        echo "multiple results";
    }else if(isset($results[0])){       /* Si un résultat présent, traiter */
        if($results[0]["mdp"]==$_POST["user_pw"]){
            echo "connect ok";
            session_start();
            $_SESSION['login']=$_POST["user_login"];
            $_SESSION['nom']=$results[0]["nom"];
            $_SESSION['prenom']=$results[0]["prenom"];
        }else{
            echo "wrong pw";
        }
    }*/
    //print_r($result[0]["contenu"]);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>