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
    $link_vid = $_POST['vid_link'];
    $id = $_POST['id'];

    $sql = "UPDATE videos SET vid_link = '$link_vid' WHERE id = {$id}";
    if($db->query($sql) === TRUE){
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    }
} else {
    echo "FATAL, MATANDO VACAS... ".$id->error;
}

$db->close();

?>