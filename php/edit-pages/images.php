<?php
header("Content-Type: application/json");
$files = array_diff(scandir("../../img"), [".","..","Thumbs.db"]);
sort($files);
echo json_encode($files);