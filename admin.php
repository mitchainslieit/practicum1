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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"  href="styles/admin-style.css"/>
        <link rel="stylesheet" href="bs/css/bootstrap.min.css"/>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="bs/js/bootstrap.min.js"></script>
    </head>
    <?php
        if (isset($_POST['adduser'])) { //user logging in
            require 'scripts/newfaculty.php';
        }
    ?>
    <script>
    $(function(){
        $('.navbar').affix({
            offset: {
            /* Affix the navbar after scroll below header */
            top: $(".stickytop").outerHeight(true)}
        });
    });
    </script>
    <body>
        <nav class="navbar navbar-expand-md bg-secondary navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">SON</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Show Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="scripts/logout.php">Logout</a>
                </li>
                </ul>
                <form class="form-inline ml-auto">
                    <input class="form-control mr-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <div class="py-5 text-center h-100 topsticky" id="top-container">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-2 mb-1 text-primary">School of Nursing</h1>
                        <h1 class="display-4 mb-1 text-primary">Saint Louis University</h1>
                        <p class="lead mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
                        <form id="search">
                            <p class="display-4">Search the database</p>
                            <input type="text" name="search" placeholder="Search.." class="search-bar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>