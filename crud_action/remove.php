<?php 
 
require_once 'dbConfig.php';
 
if($_POST) {
    $id = $_POST['id'];
 
    $sql = "DELETE FROM expo WHERE id = {$id}";
    if($db->query($sql) === TRUE) {
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    } else {
        echo "FATAL, MATANDO VACAS... " . $db->error;
    }
 
    $db->close();
}
 
?>