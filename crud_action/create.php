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

if($_POST){
    $nombre_expo = $_POST['nombre_expo'];
    $descripcion_expo = $_POST['descripcion_expo'];
    $galeria = $_POST['galeria'];

    $sql = "INSERT INTO expo (nombre_expo, descripcion_expo, galeria) VALUES ('$nombre_expo', '$descripcion_expo', '$galeria')";
    if($db->query($sql) === TRUE){
        header('Location: http://localhost/Gurza-Current-php/admon.php');
    } else {
        echo "FATAL, MATANDO VACAS...". $sql.' '.$db->error;
    }
    $db->close();
}

?>