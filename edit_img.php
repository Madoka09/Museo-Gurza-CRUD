<?php  

require_once 'dbConfig.php';
if($_GET['id_img'])
    $id_img = intval($_GET['id_img']);    

    $sql = "SELECT * FROM images WHERE id_img=$id_img";
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
        <form action="crud_action/update_img.php" method="POST">
            <table class="uk-table uk-table-divider">
                 <thead>
                    <tr>
                        <th>Nombre de la Imagen</th>
                        <th>Identificador de la Galeria</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input class="uk-input" type="text" name="file_name" placeholder="Nombre del Archivo" value="<?php echo $data['file_name']?>"></td>
                        <td><input class="uk-input" type="text" name="galeria" placeholder="Numero de la Galeria" value="<?php echo $data['galeria']?>"></td>
                    </tr>
                    <tr>
                        <input type="hidden" name="id_img" value="<?php echo $data['id_img']?>"/>
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
/*} else {
    echo "Ocurrió alguna clase de error :c";
    echo $result = $db->query($sql) or die($db->error);
}
?>*/