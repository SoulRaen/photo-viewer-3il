<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $file = $_FILES["fileToUpload"]["tmp_name"];
    if (file_exists("C:/xampp/htdocs/photo-viewer-3il/img/".$_FILES["fileToUpload"]["name"])) {
        echo "Sorry, file already exists.";
    }
    rename("$file", "C:/xampp/htdocs/photo-viewer-3il/img/".$_FILES["fileToUpload"]["name"]);
}
?>