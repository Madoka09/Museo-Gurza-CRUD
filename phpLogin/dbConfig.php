<?php

$dbHost = 'localhost';

$dbUsername = 'root';

$dbPassword = 'Ikaros2009';

$dbName = "gurza";


$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);



if ($db->connect_error){

    die("Error conectando a la base de datos: ". $db->connect_error);

}