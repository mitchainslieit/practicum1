<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Escape all $_POST variables to protect against SQL injections
$username = $mysqli->escape_string($_POST['idno']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM accounts WHERE idno='$username'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO accounts (idno, password, type) " 
            . "VALUES ('$username', '$password', '0')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] ="A user has been added!";
		header ("location: admin.php");
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }
}
?>
