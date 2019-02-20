<?php
header("Content-Type: application/json");
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
    header('Location: ../../index.php'); 
}
$files = array_diff(scandir("../../img"), [".","..","Thumbs.db"]);
sort($files);
echo json_encode($files);