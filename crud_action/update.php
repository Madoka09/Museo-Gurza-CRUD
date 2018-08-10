<?php 

require_once 'dbConfig.php';

if ($_POST){
    $nombre_expo = $_POST['nombre_expo'];
    $descripcion_expo = $_POST['descripcion_expo'];
    $galeria = $_POST['galeria'];

    $id = $_POST['id'];

$sql = "UPDATE expo SET nombre_expo = '$nombre_expo', descripcion_expo = '$descripcion_expo', galeria = '$galeria' WHERE id = {$id}";
    if($db->query($sql) === TRUE){
        echo "<p>ACTUALIZADO CORRECTAMENTE</p>";
        echo "<a href='../admon.php'><button type='button'>Volver!</button></a>";
    }
} else {
    echo "FATAL, MATANDO VACAS... ".$id->error;
}

$db->close();

?>