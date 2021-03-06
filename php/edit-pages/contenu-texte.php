<?php
    require_once("../include/verif-connect.php");
    if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
        header('Location: ../../index.php'); 
    }

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname="siteweb";

    $uID=$_POST["uid"];
    if(isset($_SESSION["login"])) {
        header("Content-Type: application/json");
        try {
            /* Paramétrage connexion */
            $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
            /* Paramétrage requête */
            $stmt = $conn->prepare("UPDATE `sections` SET `date_modification`=:currentdate,`contenu` = :contenu WHERE uID = :uID ;");
            $currentdate=date("Y-m-d H:i:s");
            $stmt->bindValue(":contenu", $_POST["contenu"], PDO::PARAM_STR);
            $stmt->bindValue(":uID", $uID, PDO::PARAM_INT);
            $stmt->bindValue(":currentdate", $currentdate, PDO::PARAM_STR);
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