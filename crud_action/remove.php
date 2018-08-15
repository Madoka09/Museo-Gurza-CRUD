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