<?php
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
    header('Location: ../../index.php'); 
}
header("Content-Type: application/json");
error_reporting(0);
$chemin = $_POST["chemin"][0] == "/" ? $_POST["chemin"] : "../../" . $_POST["chemin"];
if (unlink($chemin)) {
    echo json_encode(["code resultat" => "ok"], JSON_FORCE_OBJECT);
} else {
    echo json_encode(["code resultat" => "nok"], JSON_FORCE_OBJECT);
}
?>