<?php 

require_once 'dbConfig.php';

if ($_POST){
    $file_name = $_POST['file_name'];
    $galeria = $_POST['galeria'];

    $id_img = $_POST['id_img'];

$sql = "UPDATE images SET file_name = '$file_name', galeria = '$galeria' WHERE id_img = {$id_img}";
    if($db->query($sql) === TRUE){
        echo "<p>ACTUALIZADO CORRECTAMENTE</p>";
        echo "<a href='../admon.php'><button type='button'>Volver!</button></a>";
    }
} else {
    echo "FATAL, MATANDO VACAS... ".$id->error;
}

$db->close();

?>