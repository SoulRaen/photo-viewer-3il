<?php
require_once("../include/verif-connect.php");
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
    header('Location: ../../index.php'); 
}
header("Content-Type: application/json");

$uID=$_POST["uid"];
if(isset($_SESSION["login"])) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname="siteweb";
    try {
        /* Paramétrage connexion */
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        /* Paramétrage requête */
        $stmt = $conn->prepare("DELETE FROM `sections` WHERE uID = :uid AND page_id = (SELECT uID FROM pages WHERE nom = 'news.php')");
        $stmt->bindValue(":uid", $uID, PDO::PARAM_INT);
        /* Execution requête */
        $stmt->execute();
        $rowcount=$stmt->rowCount();
       if($rowcount==0 || $rowcount==1){
            $coderesultat = array("code resultat" => "OK");
            echo json_encode($coderesultat,JSON_FORCE_OBJECT);
       }else{
            $coderesultat = array("code resultat" => "KO");
            echo json_encode($coderesultat,JSON_FORCE_OBJECT); 
       }
    }catch(PDOException $e) {
        $coderesultat = array("code resultat" => "exception","contenuErr" => $e->getMessage());
        echo json_encode($coderesultat,JSON_FORCE_OBJECT);
    }
}else{
    $coderesultat = array("code resultat" => "deco");
    echo json_encode($coderesultat,JSON_FORCE_OBJECT);
}

?>