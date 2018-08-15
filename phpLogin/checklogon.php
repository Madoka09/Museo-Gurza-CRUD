<?php
session_start();
?>

<?php 
include_once('dbConfig.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username = '$username'";

$result = $db->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $hash = $row['password'];
}
    
    if(password_verify($password, $hash)){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (7 * 60);

        header('Location: http://localhost/Gurza-Current-php/admon.php');
    }else{
        header('Location: http://localhost/Gurza-Current-php/phpLogin/error.php');
    }
mysqli_close($db);
?>
