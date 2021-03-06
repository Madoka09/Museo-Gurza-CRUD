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

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admon_Landing</title>

    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-" crossorigin="anonymous">
    <link rel="stylesheet" href="css/uikit.min.css">

    <link rel="stylesheet" href="css/layouts/side-menu.css">
    <link rel="icon" type="image/png" href="img/favico.png">
</head>

<body>
    <div class="uk-navbar-container" id="start" uk-navbar>
        <div class="uk-navbar-left">
        <a class="uk-navbar-item uk-logo">AÑADIR NUEVO VIDEO</a>
        </div>
    </div>

    <br>

    <div class="uk-container">
        <form action="crud_action/create_video.php" method="POST">
            <fieldset class="uk-fieldset">
                <table class="uk-table uk-table-divider">
                    <thead>
                        <tr>
                            <th>Link del Video</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="uk-input" type="text" name="vid_link" placeholder="Pegar link del Video"></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <button class="uk-button uk-button-primary" type="submit">Guardar Cambios</button>
            <a class="uk-button uk-button-default" href="admon.php">Volver a Inicio</a>
        </form>
    </div>
</body>
