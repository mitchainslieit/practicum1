<?php
	require 'scripts/connect.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="styles/style.css">
		<meta charset="UTF-8">
		<title>School of Nursing</title>
	</head>
    <!-- Script -->
    <?php
    if (isset($_POST['login'])) { //user logging in
        require 'scripts/signin.php';
    }
    /*if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        if($_SESSION['type'] == 1) {
            header ("location: admincp/admin.php");
        } else {
            header ("location: employee/employee.php");
        }
    }*/
    ?>
	<body>
		<center>
			<div id="banner">
				<img src="styles/img/logo.png" alt="SON Logo" height="150" width="150">
			</div>
			<div id = "loginpage">
			<h1 class="login-head"> Saint Louis University </h1>
			<h1 class="login-head"> School of Nursing </h1>
				<div id = "login-form">
					  <form method="post" action="login.php">
							<div id = "username">
								<input type="text" name="user" placeholder="Username"><br>
							</div>
							<div id="password">
								<input type="password" name="pass" placeholder="Password"><br>
							</div>
							<div id="login">
								<input type="submit" name="login" class="login login-submit" value="Login">
							</div>
					  </form>					
				</div>
			</div>
		</center>
		
	</body>
	
</html>