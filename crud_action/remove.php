<?php 
 
require_once 'dbConfig.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM expo WHERE id = {$id}";
    if($db->query($sql) === TRUE) {
        echo "<p>DATOS ELIMINADOS</p>";
        echo "<a href='../admon.php'><button type='button'>VOLVER!</button></a>";
    } else {
        echo "FATAL, MATANDO VACAS... " . $db->error;
    }
 
    $db->close();
}
 
?>