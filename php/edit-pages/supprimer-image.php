<?php
header("Content-Type: application/json");
$chemin = $_POST["chemin"][0] == "/" ? $_POST["chemin"] : "../" . $_POST["chemin"];
if (unlink($chemin)) {
    echo json_encode(["code resultat" => "ok"], JSON_FORCE_OBJECT);
} else {
    echo json_encode(["code resultat" => "nok"], JSON_FORCE_OBJECT);
}
?>