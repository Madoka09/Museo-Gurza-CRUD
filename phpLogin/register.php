<?php
include_once('dbConfig.php');
$table_name = "user";

$password_form = $_POST['password'];

$hash = password_hash($password_form, PASSWORD_BCRYPT);

$lookfor_user = "SELECT * FROM $table_name WHERE username = '$_POST[username]' ";

$result = $db->query($lookfor_user);

$count = mysqli_num_rows($result);

if($count == 1){
    echo "<br />"."El nombre ya está ue"."<br />";

    echo "<a href='index.html'>Escoga otro plox</a>";
}else{
    $query = "INSERT INTO user (username, password) VALUES ('$_POST[username]', '$hash')";
    
    if($db->query($query) === TRUE){
        echo "<br />"."<h2>"."USUARIO CREADO UE"."</h2>";
        echo "<h4>"."BIENVENIDO: ".$_POST['username']."</h4>";
        echo "<h5>"."INICIA SESION UE: "."<a href='login.html'>Login ue</a>"."</h5>";
    }else{
        echo "Error al crear tu shingadera >c".$query."<br>".$db->error;
    }
}
mysqli_close($db);
?>