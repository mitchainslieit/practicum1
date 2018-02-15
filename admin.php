<?php
/* Displays all error messages */
    session_start();
    require 'scripts/connect.php';
?>
<!DOCTYPE html>
<html>
    <head>
    
    </head>
    <?php
        if (isset($_POST['adduser'])) { //user logging in
            require 'scripts/newfaculty.php';
        }
    ?>
    <body>
        <p>AKO ANG ADMIN NG PAGE NA TO!</p>
		<div class="form-container">
		<h1>New Employee</h1>
			<form method="post" action="admin.php" class="modal-content animate">
				<input type="text" name="idno" placeholder="Username" required="required" />
				<input type="password" name="password" placeholder="Password" required="required" />
				<button type="Add" class="btn btn-primary btn-block btn-large" name="adduser">Finish!</button>
			</form>
		</div>
    </body>
</html>