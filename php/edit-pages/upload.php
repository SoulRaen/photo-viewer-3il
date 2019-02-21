<?php

require_once("../include/verif-connect.php");
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
    header('Location: ../../index.php'); 
}
header("Content-Type: application/json");

// Check if image file is a actual image or fake image
$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$source_file = $_FILES["file"]["tmp_name"];
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    $coderesultat = array("code resultat" => "fichier existe deja");
    echo json_encode($coderesultat,JSON_FORCE_OBJECT);
}else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp" ) {
    $coderesultat = array("code resultat" => "mauvais type image");
    echo json_encode($coderesultat,JSON_FORCE_OBJECT);
}else{
    if(rename($source_file, $target_file)){
        $coderesultat = array("code resultat" => "upload OK");
        echo json_encode($coderesultat,JSON_FORCE_OBJECT);
    }
}
?>