<?php  

require_once 'dbConfig.php';
if($_GET['id']){
    $id = intval($_GET['id']);    

    $sql = "SELECT * FROM expo WHERE id=$id";
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
    <h2 class="uk-text-muted">Está seguro que desea eliminar el registro: <?php echo $data['nombre_expo'];?> ?</h2>
    <h3 class="uk-text-muted">Los cambios no podrán deshacerse</h3>
        <form action="crud_action/remove.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
            <button class="uk-button uk-button-danger" type="submit">ELIMINAR</button>
            <a class="uk-button uk-button-primary" href="admon.php">VOLVER</a>
        </form>
    </div>

</body>
</html>
 
<?php
}
?>