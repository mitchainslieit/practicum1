<?php
    if (isset($_COOKIE['key'])) {
        unset($_COOKIE['key']);
        setcookie('key', "", 1);// empty value and old timestamp
    }
	require 'scripts/connect.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type= "text/css" href="styles/style"/>
        <link rel="shorcut icon" href="styles/img/logo.png" />
		<meta charset="UTF-8">
		<title>SLU SON</title>
	</head>
    <!-- Script -->
    <?php
    if (isset($_POST['login'])) { //user logging in
        require 'scripts/signin.php';
    }
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
        if($_SESSION['type'] == 0) {
            header ("location: admin.php");
            exit();
        } else {
            header ("location: faculty.php");
            exit();
        }
    }
    ?>
	<body>
        <div class="center">
            <img src="styles/img/logo.png" alt="SON Logo" id="son-logo">
			<div id = "login-cont">
			<h1 class="login-head"> Saint Louis University </h1>
			<h1 class="login-head"> School of Nursing </h1>
				<div id = "login-form">
					  <form method="post" action="index.php">
							<div id = "username">
								<input type="text" name="user" placeholder="Username" required><br>
							</div>
							<div id="password">
								<input type="password" name="pass" placeholder="Password" required><br>
							</div>
							<div id="login">
								<input type="submit" name="login" class="login login-submit" value="Login">
							</div>
					  </form>					
				</div>
			</div>
        </div>
	</body>
</html>