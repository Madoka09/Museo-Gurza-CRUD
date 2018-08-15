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

require_once 'dbConfig.php';

if ($_POST){
    $file_name = $_POST['file_name'];
    $galeria = $_POST['galeria'];

    $id_img = $_POST['id_img'];

$sql = "UPDATE images SET file_name = '$file_name', galeria = '$galeria' WHERE id_img = {$id_img}";
    if($db->query($sql) === TRUE){
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    }
} else {
    echo "FATAL, MATANDO VACAS... ".$id->error;
}

$db->close();

?>