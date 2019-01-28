<?php

$files = array_diff(scandir("../img"), [".",".."]);
sort($files);
echo json_encode($files);