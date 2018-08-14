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

<?php require_once 'dbConfig.php';
define ('SITE_ROOT', realpath(dirname('C:/AppServ/www/Gurza-Current-php/img/resources/x')));
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admon_Landing</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/uikit.min.css">
    <link rel="stylesheet" href="css/custom.css">
 
    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="icon" type="image/png" href="img/favico.png">
</head>

<body>
    <div class="uk-navbar-container" id="start"uk-navbar>
        <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">ADMINISTRACIÓN</a>
        </div>
    </div>

    <br>
    
    <div class="uk-container">
    <h2 class="uk-text-muted">Administrador de Exposiciones</h2>
        <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Nombre de la Expo</th>
                    <th>Descripcion de la Expo</th>
                    <th>Identificador de la Galeria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM expo";
                    $query_admon = $db->query($sql);

                if($query_admon->num_rows > 0){
                    while($row = $query_admon->fetch_assoc()){
                        echo "<tr>
                            <td>".$row['nombre_expo']."</td>
                            <td>".$row['descripcion_expo']."</td>
                            <td>".$row['galeria']."</td>
                            <td>
                                <a href='edit.php?id=".$row['id']."'><button type='button'>Editar</button></a>
                                <a href='remove.php?id=".$row['id']."'><button type='button'>Remover</button></a>
                            </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'><center>Sin informacion disponible</center></td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="uk-button uk-button-primary" href="create.php">Crear Galeria</a>
        <br>
        <br>
    </div>

    <br>

    <div class="uk-container">
    <h2 class="uk-text-muted">Administrador de Imagenes</h2>
    <table class="uk-table uk-table-striped">
            <thead>
                <tr>
                    <th>Nombre de la Imagen</th>
                    <th>Identificador de la Galeria</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM images";
                    $query_admon_img = $db->query($sql);

                if($query_admon_img->num_rows > 0){
                    while($row_img = $query_admon_img->fetch_assoc()){
                        echo "<tr>
                            <td>".$row_img['file_name']."</td>
                            <td>".$row_img['galeria']."</td>
                            <td>
                                <a href='edit_img.php?id_img=".$row_img['id_img']."'><button type='button'>Editar</button></a>
                                <a href='remove_img.php?id_img=".$row_img['id_img']." name='delete_file''><button type='button'>Remover</button></a>
                            </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'><center>Sin informacion disponible</center></td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a class="uk-button uk-button-primary" href="create_img.php">Subir Imagen</a>
        <br>
        <br>
        <br>
        <hr class="uk-nav-divider">
        <a class="uk-button uk-button-danger" href="phpLogin/logout.php">Salir</a>
        <br>
        <br>
    </div>


</body>
