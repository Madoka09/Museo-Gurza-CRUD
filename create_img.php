<?php require_once 'dbConfig.php';?>

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
        <a class="uk-navbar-item uk-logo">AÑADIR IMAGEN A GALERIA</a>
        </div>
    </div>

    <br>

    <div class="uk-container">
        <form action="crud_action/create_img.php" method="POST" enctype="multipart/form-data">
            <fieldset class="uk-fieldset">
                <table class="uk-table uk-table-divider">
                    <thead>
                        <tr>
                            <th>Archivo a Subir</th>
                            <th>Identificador de la Galeria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <div uk-form-custom>
                            <td><input type="file" name="file_name" id="file_name" ></td>
                        </div>
                            <td><input class="uk-input" type="text" name="galeria" placeholder="Identificador de la Galeria" id="galeria"></td>
                        </tr>
                    </tbody>
                </table>
            </fieldset>
            <button class="uk-button uk-button-primary" type="submit" name="submit">Guardar Cambios</button>
            <a class="uk-button uk-button-default" href="admon.php">Volver a Inicio</a>
        </form>
    </div>
</body>
