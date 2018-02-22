<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Failed!</title>
</head>
<body>
<div class="error-fail">
    <h1>Error!</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: admin.php" );
    endif;
    ?>
    </p>     
</div>
</body>
</html>