<?php 
define ('SITE_ROOT', realpath(dirname('C:/AppServ/www/Gurza-Current-php/img/resources/x')));
require_once 'dbConfig.php';

if($_POST) {
    $id_img = $_POST['id_img'];
    $file_name = $_POST['file_name'];
    $sql = "DELETE FROM images WHERE id_img = {$id_img}";
    $sql2 = "SELECT file_name FROM images WHERE id_img = {$id_img}";
    $result = $db->query($sql2) or die($db->error);
    $data_row = $result->fetch_assoc();
    $exploded_img_route = explode("/", $data_row['file_name']);
        $file_location = new DirectoryIterator(SITE_ROOT);
        foreach ($file_location as $fileinfo){
        $fileinfo->getFilename();
            if($fileinfo == $exploded_img_route[2]){
                $full_file_path = SITE_ROOT.'/'.$fileinfo;
                if(unlink($full_file_path)){
                    header('Location: http://localhost/Gurza-Current-php/admon.php');
                } else{
                    echo "Problemas con los archivos y/o con la base de datos";
                }
            }
        }
    
    if($db->query($sql) === TRUE) {
        echo $file_name;
    }
    $db->close();

    
} else {
        echo "FATAL, MATANDO VACAS... " . $db->error;
    }        
?>