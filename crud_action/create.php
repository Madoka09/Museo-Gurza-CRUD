<?php 

require_once 'dbConfig.php';

if($_POST){
    $nombre_expo = $_POST['nombre_expo'];
    $descripcion_expo = $_POST['descripcion_expo'];
    $galeria = $_POST['galeria'];

    $sql = "INSERT INTO expo (nombre_expo, descripcion_expo, galeria) VALUES ('$nombre_expo', '$descripcion_expo', '$galeria')";
    if($db->query($sql) === TRUE){
        echo "<p>ELEMENTOS INSERTADOS CORRECTAMENTE!</p>";
        echo "<a href='../admon.php'><button type='button'>Volver!</button></a>";
    } else {
        echo "FATAL, MATANDO VACAS...". $sql.' '.$db->error;
    }
    $db->close();
}

?>