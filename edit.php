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
if($_GET['id']){
    $id = intval($_GET['id']);    

    $sql = "SELECT * FROM expo WHERE id=$id";
    $result = $db->query($sql) or die($db->error);

    $data = $result->fetch_assoc();

    $db->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="icon" type="image/png" href="img/favico.png">
    <title>Editar</title>
</head>

<body>

    <div class="uk-navbar-container" id="start" uk-navbar>
        <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">EDITANDO REGISTRO</a>
        </div>
    </div>

    <div class="uk-container">
        <form action="crud_action/update.php" method="POST">
            <table class="uk-table uk-table-divider">
                 <thead>
                    <tr>
                        <th>Nombre de la Exposicion</th>
                        <th>Descripcion de la Exposicion</th>
                        <th>Identificador de la Galeria</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="uk-input" type="text" name="nombre_expo" placeholder="Nombre de la Exposicion" value="<?php echo $data['nombre_expo']?>"></td>
                        <td><input class="uk-input" type="text" name="descripcion_expo" placeholder="Descripcion de la Exposicion" value="<?php echo $data['descripcion_expo']?>"></td>
                        <td><input class="uk-input" type="text" name="galeria" placeholder="Numero de la Galeria" value="<?php echo $data['galeria']?>"></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $data['id']?>"/>
                    </tr>
                </tbody>
            </table>
            <button class="uk-button uk-button-primary" type="submit">Guardar Cambios</button>
            <a class="uk-button uk-button-default" href="admon.php">Volver</a>
        </form>
    </div>
    
</body>
</html>
<?php
} else {
    echo "Ocurrió alguna clase de error :c";
    echo $result = $db->query($sql) or die($db->error);
}
?>