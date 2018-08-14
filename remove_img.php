<?php 
session_start();

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
if($_GET['id_img']){
    $id_img = intval($_GET['id_img']);    

    $sql = "SELECT * FROM images WHERE id_img=$id_img";
    $result = $db->query($sql) or die($db->error);

    $data = $result->fetch_assoc();

    $db->close();
?>

<!DOCTYPE html>
<html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="icon" type="image/png" href="img/favico.png">
    <title>Eliminar</title>
</head>
<body>

    <div class="uk-navbar-container" id="start" uk-navbar>
        <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">ELIMINAR REGISTRO</a>
        </div>
    </div>
    
    <br>

    <div class="uk-container">
    <h2 class="uk-text-muted">Está seguro que desea eliminar el registro: <?php echo $data['file_name'];?> perteneciente a la galeria <?php echo $data['galeria'];?> ?</h2>
    <h3 class="uk-text-muted">Los cambios no podrán deshacerse</h3>
        <form action="crud_action/remove_img.php" method="post">
            <input type="hidden" name="id_img" value="<?php echo $data['id_img'] ?>" />
            <button class="uk-button uk-button-danger" type="submit">ELIMINAR</button>
            <a class="uk-button uk-button-primary" href="admon.php">VOLVER</a>
        </form>
    </div>

</body>
</html>
 
<?php
}
?>