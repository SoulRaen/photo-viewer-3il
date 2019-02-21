<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname="siteweb";

try {
    /* Paramétrage connexion */
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    /* Paramétrage requête */
    $stmt = $conn->prepare("SELECT uID,email,mdp,nom,prenom FROM users WHERE login='".$_POST["user_login"]."'");
    /* Execution requête */
    $stmt->execute();
    /* Traitement des infos */
    $results = $stmt->fetchAll();

    header("Content-Type: application/json");

    /* Si plusieurs résultats, erreur */
    if (isset($results[1])){
        $coderesultat = array("code resultat" => "resultats mutiples");
        echo json_encode($coderesultat,JSON_FORCE_OBJECT);
    }else if(isset($results[0])){       /* Si un résultat présent, traiter */
        if($results[0]["mdp"]==$_POST["user_pw"]){
            session_start();
            $_SESSION['login']=$_POST["user_login"];
            $_SESSION['nom']=$results[0]["nom"];
            $_SESSION['prenom']=$results[0]["prenom"];
            $_SESSION['date-heure-login']=time();
            $_SESSION['duree-session-min']=120;
            $coderesultat = array("code resultat" => "connexion OK","nom" => $results[0]["nom"],"prenom" => $results[0]["prenom"],"duree-session-min"=>$_SESSION['duree-session-min']);
            echo json_encode($coderesultat,JSON_FORCE_OBJECT);
        }else{
            $coderesultat = array("code resultat" => "mauvais mdp");
            echo json_encode($coderesultat,JSON_FORCE_OBJECT);
        }
    }else {     /* Si 0 résultat */
        $coderesultat = array("code resultat" => "pas de resultats");
        echo json_encode($coderesultat,JSON_FORCE_OBJECT);
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>