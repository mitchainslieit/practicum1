<?php
    $result = $mysqli->query("SELECT * FROM accounts WHERE idno='$username'") or die($mysqli->error());

    //This are the variables for "Add a faculty" Function
    $facultyname =  $mysqli->escape_string($_POST["facultyname"]);
    $facultytype =  $mysqli->escape_string($_POST["type"]);
    $username = $mysqli->escape_string($_POST["idno"]);
    $password = $mysqli->escape_string(password_hash($_POST["password"], PASSWORD_BCRYPT));

    //This are the variables for "Uploading a file" Function
    $folder_path = "cv/";
    $filename = "$username." . pathinfo($_FILES["cvfile"]["name"],PATHINFO_EXTENSION);
    $newname = $folder_path . $filename;
    $FileType = pathinfo($newname,PATHINFO_EXTENSION);
    
    //This block of code are resposible for adding a new faculty
    
    if ( $result->num_rows > 0 ) {
        $_SESSION["message"] = "User with this email already exists!";
        header("location: scripts/error.php");
    } else {
        if ($_POST["password"] === $_POST["conf_password"]) {
           $sql = "INSERT INTO accounts (idno, password, type) " . "VALUES ('$username', '$password', '$facultytype')";
            $filesql = "INSERT INTO acc_data (idno, acc_name, acc_cv) " . "VALUES ('$username', '$facultyname', '$filename')";
            if ($FileType == "pdf" || $FileType == "doc" || $FileType == "docx") {
                if (move_uploaded_file($_FILES["cvfile"]["tmp_name"], $newname)) {
                    $_SESSION["logged_in"] = true; // So we know the user has logged in
                    $_SESSION["message"] ="A user has been added!";
                    if ($mysqli->query($filesql) && $mysqli->query($sql)) {
                        header ("location: admin.php");
                    } else {
                        $_SESSION["message"] = "Something went wrong!";
                        header("location: scripts/error.php");
                    }
                } else {
                    $_SESSION["message"] = "Upload Failed!";
                    header("location: scripts/error.php");
                }
            } else {
                $_SESSION["message"] = "Registration failed!";
                header("location: scripts/error.php");
            }  
        } else {
            $_SESSION["message"] = "Passwords are not the same!";
            header("location: scripts/error.php");
        }      
    }
    
    //This block of code is responsible for owners change password
?>
