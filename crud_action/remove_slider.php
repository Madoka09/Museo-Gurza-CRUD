<?php 
session_start();
require_once 'dbConfig.php'; 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
} else {
    header('Location: http://localhost/Gurza-Current-php/phpLogin/error.php');
    exit;
}

$now = time();

if($now > $_SESSION['expire']){
    session_destroy();

    header('Location: http://localhost/Gurza-Current-php/phpLogin/error_expired.php');
    exit;
}
?>
<?php 
define ('SITE_ROOT', realpath(dirname('C:/AppServ/www/Gurza-Current-php/img/slider/x')));
require_once 'dbConfig.php';

if($_POST) {
    $id_slider = $_POST['id'];
    $slide_name = $_POST['slider_img'];
    $sql = "DELETE FROM slideshow WHERE id = {$id_slider}";
    $sql2 = "SELECT slide_img FROM slideshow WHERE id = {$id_slider}";
    $result = $db->query($sql2) or die($db->error);
    $data_row = $result->fetch_assoc();
    $exploded_img_route = explode("/", $data_row['slide_img']);
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