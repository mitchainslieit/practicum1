<?php
/* Displays all error messages */
    session_start();
    require 'scripts/connect.php';
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['type'] == 0){
    } else {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/admin-style.css"/>
        <link rel="shorcut icon" href="styles/img/logo.png" />
        <link rel="stylesheet" href="bs/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="bs/css/bootstrap.min.css"/>
        <script defer src="bs/js/fontawesome-all.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
        <script src="bs/js/bootstrap.min.js"></script>
        <script src="scripts/jss/sitescripts.js"></script>
    </head>
    <?php
        if (isset($_POST['submit'])) {
            require 'scripts/adminfunctions.php';  
        }
        if (isset($_POST['cp'])) {
            require 'scripts/chngepasswd.php';
        }
    ?>
    <body>
        <nav class="navbar navbar-expand-md bg-secondary navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><img src="logo/logo_son.png" id="son-logo">SON</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#newfact">Add a Faculty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#passwd">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="scripts/logout.php">Logout</a>
                </li>
                </ul>
                <form class="form-inline ml-auto">
                    <input class="form-control mr-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <div class="py-5 text-center topsticky cover" id="top-container">
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
        <div class="container">
    	<div class="row">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Database
                            <span id="h3-sub">
                                (<i class="fas fa-download"></i> - Download&emsp;
                                <i class="fas fa-print"></i> - Print&emsp;
                                <i class="fas fa-eye"></i> - View)
                            </span>
                        </h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="fas fa-search" style="font-size: 4vh"></i>
							</span>
						</div>
					</div>
					<div class="panel-body">
						<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="ID Number / Name" />
					</div>
					<table class="table table-hover text-center" id="dev-table">
						<thead>
							<tr>
								<th>ID No</th>
								<th class="w-75">Name</th>
								<th></th>
								<th></th>
                                <th></th>
							</tr>
						</thead>
                        <?php
                            $result = $mysqli->query("select * from acc_data natural join accounts order by acc_name") or die($mysqli->error());
                            while($row = mysqli_fetch_array($result)) {
                                echo '<tbody>';
                                echo "<td class='text-uppercase'>$row[idno]</td>";
                                echo "<td>$row[acc_name]</td>";
                                echo '<td><i class="fas fa-download"></i></td>';
                                echo '<td><i class="fas fa-print"></i></td>';
                                echo '<td><i class="fas fa-eye"></i></td>';
                                echo '</tbody>';
                            }
                        ?>
					</table>
				</div>
			</div>
		</div>
	</div>
    <div class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="p-4 col-md-4">
                    <h2 class="mb-4 text-secondary">School of Nursing</h2>
                    <p class="text-white">A paragraph will be placed here, an information about the school and services </p>
                </div>
                <div class="p-4 col-md-4">
                    <h2 class="mb-4 text-secondary">Mapsite</h2>
                    <ul class="list-unstyled">
                    <a href="#" class="text-white">Home</a>
                    <br>
                    <a href="#" class="text-white">Show Profile</a>
                    <br>
                    <a href="#" class="text-white">Edit Profile</a>
                    <br>
                    <a href="#" class="text-white">Add a Faculty</a>
                    </ul>
                </div>
                <div class="p-4 col-md-4">
                    <h2 class="mb-4">Contact Us!</h2>
                    <p>
                    <a href="tel:+246 - 542 550 5462" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>(+63) 906 792 2016</a>
                    </p>
                    <p>
                    <a href="mailto:2162752@slu.edu.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>2162752@slu.edu.ph</a>
                    </p>
                    <p>
                    <a href="https://goo.gl/maps/AUq7b9W7yYJ2" class="text-white" target="_blank"><i class="fa d-inline mr-3 fa-map-marker text-secondary"></i>Valenzuela St., Salud Mitra, Baguio City</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <p class="text-center text-white">© TeamDomantay 2018 SCIS - All rights reserved. </p>
                </div>
            </div>
        </div>
    </div>
<!------------------------------------------------MODALS------------------------------------------------>
    <div id="newfact" class="modal fade py-5" role="newpassword">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Add a faculty</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group"><label class="text-white">Faculty Name</label>
                            <input type="text" class="form-control" placeholder="Enter his/her name" name="facultyname" size="100" required></div>
                            <div class="form-group"><label class="text-white">ID number</label>
                            <input type="text" class="form-control" placeholder="Enter his/her ID Number" name="idno" required></div>
                            <div class="form-group"><label class="text-white">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" required></div>
                            <div class="form-group"><label class="text-white">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="conf_password" required></div>
                            <div class="form-group"><label class="text-white">Employee Type</label>&emsp;&emsp;
                                <select name="type" class="bg-light btn">
                                    <option value="0">Admin</option>
                                    <option value="1">Faculty</option>
                                </select> 
                            </div>
                            <div class="form-group"><label class="text-white">Curriculum Vitae</label>
                            <input type="file" class="form-control" name="cvfile" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="passwd" class="modal fade py-5" role="newpassword">
        <div class="modal-dialog">
            <div class="modal-content add-faculty bg-dark">
                <form class="" method="post" action="admin.php" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">Change Password</h4>
                        <button type="button" class="close text-danger" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="form-group"><label class="text-white">ID number</label>
                            <input type="text" class="form-control" placeholder="Enter his/her ID Number" name="idno" required></div>
                            <div class="form-group"><label class="text-white">Old Password</label>
                            <input type="password" class="form-control" placeholder="Enter your old password" name="old_password" required></div>
                            <div class="form-group"><label class="text-white">Enter your new password</label>
                            <input type="password" class="form-control" placeholder="New Password" name="new_password" required></div>
                            <div class="form-group"><label class="text-white">Confirm new password</label>
                            <input type="password" class="form-control" placeholder="Confirm your new password" name="conf_password" required></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="cp">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal" id="finally">
        <div class="modal-dialog" role="message" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body">
                    <p>your text goes here</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>