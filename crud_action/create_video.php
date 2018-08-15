<?php 

require_once 'dbConfig.php';

if($_POST){
    $link_vid = $_POST['vid_link'];

    $sql = "INSERT INTO videos (vid_link) VALUES ('$link_vid')";
    if($db->query($sql) === TRUE){
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    } else {
        echo "FATAL, MATANDO VACAS...". $sql.' '.$db->error;
    }
    $db->close();
}

?>