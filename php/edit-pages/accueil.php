<?php
    require_once("../verif-connect.php");

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname="siteweb";

    $page="index.php";
    if(isset($_SESSION["login"])){
        header("Content-Type: application/json");
        try {
            /* Paramétrage connexion */
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            /* Paramétrage requête */
            $stmt = $conn->prepare("UPDATE `sections` SET `contenu` = :contenu WHERE page_id = (SELECT uID FROM pages WHERE nom = :page) ORDER BY date_creation DESC;");
            $stmt->bindValue(":contenu", $_POST["contenu"], PDO::PARAM_STR);
            $stmt->bindValue(":page", $page, PDO::PARAM_STR);
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