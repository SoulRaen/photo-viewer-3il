<?php
header("Content-Type: application/json");
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest' ) {
    header('Location: ../../index.php'); 
}
$files = array_diff(scandir("../../img"), [".","..","Thumbs.db"]);
sort($files);
for ($i = 0 ; $i < count($files) ; $i++) {
    $files[$i] = utf8_encode($files[$i]);
}
echo json_encode($files);