<?php
/* Displays all error messages */
    session_start();
    require 'scripts/connect.php';
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['type'] == 0){ 
    } else {
        header('location: index.php');
        exit();
    }
    if (isset($_COOKIE['key'])) {
        unset($_COOKIE['key']);
        setcookie('key', "", 1);// empty value and old timestamp
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <p>Sorry na! Faculty lang</p>
        <a href="scripts/logout.php"><button class="btn btn-primary btn-block btn-large admin-tab" name="logout">Logout</button></a>
    </body>
</html>