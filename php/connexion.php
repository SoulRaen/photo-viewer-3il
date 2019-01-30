<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="siteweb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
<<<<<<< HEAD
    /* Paramétrage requête */
    $stmt = $conn->prepare("SELECT uID,email,mdp,nom,prenom FROM users WHERE login='".$_POST["user_login"]."'");
    /* Execution requête */
=======
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "user email : ".$_POST["user_email"];
    $stmt = $conn->prepare("SELECT uID,login,mdp FROM users WHERE email='".$_POST["user_email"]."'"); 
    echo "<BR>user pw : ".$_POST["user_pw"];
>>>>>>> f2446b06b6ae00822972a595cdc52db7b77e14cd
    $stmt->execute();
    echo "<BR>user pw : ".$_POST["user_pw"];
    /* Récupération de toutes les lignes d'un jeu de résultats */
    //print("Récupération de toutes les lignes d'un jeu de résultats :\n");
    $results = $stmt->fetchAll();
<<<<<<< HEAD
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
=======
    echo "<BR>user pw : ".$_POST["user_pw"];
    echo "<br>uID : ".$results[0]["uID"];
    echo "<br>login : ".$results[0]["login"];
    echo "<br>mdp : ".$results[0]["mdp"];
    /*foreach ($results as $i => $result) {
        //echo "\$results[$k] => $v.\n";
        foreach ($result as $j => $value) {
            echo "<br>value : ".$value;
>>>>>>> f2446b06b6ae00822972a595cdc52db7b77e14cd
        }
    }*/
    //print_r($result[0]["contenu"]);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>