<?php 
define ('SITE_ROOT', realpath(dirname('C:/AppServ/www/Gurza-Current-php/img/resources/x')));
require_once 'dbConfig.php';

$image_var = ($_FILES["file_name"]["name"]);
$target_file = SITE_ROOT."/".($_FILES["file_name"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if($_POST){
    $database_reference_img = "img/resources/".$image_var;
    $file_name = $_POST['file_name'];
    $galeria = $_POST['galeria'];

    $sql = "INSERT INTO images (file_name, galeria) VALUES ('$database_reference_img', '$galeria')";
    if($db->query($sql) === TRUE){
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    } else {
        echo "FATAL, MATANDO VACAS...". $sql.' '.$db->error;
    }
    $db->close();
}

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file_name"]["tmp_name"]);
    if($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no tiene un formato valido.";
        $uploadOk = 0;
    }
}
// Comprobar si el archivo existe
if (file_exists($target_file)) {
    echo "El archivo ya existe.";
    $uploadOk = 0;
}
// Comprobar tamaño del archivo a subir
if ($_FILES["file_name"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Permitir algunos formatos de archivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Comprobar la variable uploadOK para ver si es posible subirlo
if ($uploadOk == 0) {
    echo "FATAL: El archivo no ha podido ser subido";
// Si todo OK, subir plox
} else {
    if (move_uploaded_file($_FILES["file_name"]["tmp_name"], $target_file)) {
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    } else {
        echo "FATAL: Ha ocurrido un erro subiendo el archivo";
    }
}
?>
