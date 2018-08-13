<?php 
define ('SITE_ROOT', realpath(dirname('C:/AppServ/www/Gurza-Current-php/img/resources/x')));
require_once 'dbConfig.php';

$file_location = SITE_ROOT;
$file_name = $file_location."/";
$sql2 = ("SELECT file_name FROM images WHERE id_img = {$id_img}");

if($_POST) {
    $id_img = $_POST['id_img'];
    $file_name = $_POST['file_name'];
    $sql = "DELETE FROM images WHERE id_img = {$id_img}";
    $sql2 = "SELECT file_name FROM images WHERE id_img = {$id_img}";
    if($db->query($sql2) === TRUE){
        unlink($file_location."/".$file_name);
        echo $file_name;
    } else {
        echo "falló el segundo query we";
    }
    if($db->query($sql) === TRUE) {
        echo "<p>DATOS ELIMINADOS</p>";
        echo "<a href='../admon.php'><button type='button'>VOLVER!</button></a>";
    } else {
        echo "FATAL, MATANDO VACAS... " . $db->error;
    }
 
    $db->close();
}

?>