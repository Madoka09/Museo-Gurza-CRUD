<?php 
define ('SITE_ROOT', realpath(dirname('C:/AppServ/www/Gurza-Current-php/img/resources/x')));
require_once 'dbConfig.php';

$file_location = SITE_ROOT;
$file_name = $file_location."/";

if($_POST) {
    $id_img = $_POST['id_img'];
    $sql = "DELETE FROM images WHERE id_img = {$id_img}";
    if($db->query($sql) === TRUE) {
        echo "<p>DATOS ELIMINADOS</p>";
        echo "<a href='../admon.php'><button type='button'>VOLVER!</button></a>";
    } else {
        echo "FATAL, MATANDO VACAS... " . $db->error;
    }
 
    $db->close();
}
 
if(!unlink($image_var = ($_FILES["file_name"]["name"]))){
    echo "no borrao";
    echo $file_location;
} else{
    echo "borrao";
}

if(file_exists($image_var)){
    echo "sistoi we";
}else{
    echo $file_location;
}

?>