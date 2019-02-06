<?php

// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
    $file = $_FILES["fileToUpload"]["tmp_name"];
    if (file_exists("C:/xampp/htdocs/photo-viewer-3il/img/".$_FILES["fileToUpload"]["name"])) {
        echo "Sorry, file already exists.";
    }
    rename("$file", "C:/xampp/htdocs/photo-viewer-3il/img/".$_FILES["fileToUpload"]["name"]);
}*/
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo getcwd();

$target_dir = "../img";
$target_file = $target_dir . basename($_FILES[0]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

echo "target file : ".$target_file;
// Check if file already exists
//if (file_exists($target_file)) {
//    echo "fichier existe deja";
//    $uploadOk = 0;
//}else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "bmp" ) {
//    echo "mauvais type image";
//    $uploadOk = 0;
//}
?>