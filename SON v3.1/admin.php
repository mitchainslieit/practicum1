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
        $result = $mysqli->query("SELECT * FROM accounts") or die($mysqli->error());
        if (isset($_POST['submit'])) {
            require 'scripts/adminfunctions.php';  
        }
        if (isset($_POST['cp'])) {
            require 'scripts/chngepasswd.php';
        }
        if (isset($_POST['gosearch'])) {
            require 'scripts/search.php';
            echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#search-result').modal('show');
                });
            </script>";
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
                    <a class="nav-link" href="admin.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#newfact">Add a Faculty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#passwd">Change My/Others Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="scripts/logout.php">Logout</a>
                </li>
                </ul>
                <form class="form-inline ml-auto" method="post" action="admin.php">
                    <input class="form-control mr-2" type="text" placeholder="Search" name="search-value">
                    <button class="btn btn-primary" type="submit" name="gosearch">Search</button>
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
                        <?php
                            $name = $_SESSION['facultyname'];
                            echo "<p class='lead mb-4'>Hello $name Welcome to the Administator's page!</p>";
                        ?>
                        <form id="search" method="post" action="admin.php">
                            <p class="display-4">Search the database</p>
                            <input type="text" name="search-value" placeholder="Search.." class="search-bar" />
                            <input type="submit" style="display: none;" name="gosearch"/>
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
                                <i class="fas fa-upload"></i> - Upload&emsp;
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
								<th class="w-75">Name</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
							</tr>
						</thead>
                        <?php
                            $result = $mysqli->query("select * from acc_data natural join accounts order by acc_name") or die($mysqli->error());
                            while($row = mysqli_fetch_array($result)) {
                                echo '<tbody>';
                                echo "<td>$row[acc_name]</td>";
                                echo '<td><i class="fas fa-download"></i></td>';
                                echo '<td><i class="fas fa-upload"></i></td>';
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
                    <h2 class="mb-4 text-secondary">SCIS</h2>
                    <p class="text-white">Incase of any errors Just contact us. We provided our contact information, just email or call us! </p>
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
                    <a href="tel: +63 906 792 2016" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>(+63) 906 792 2016 ~ Mitch</a><br>
                    <a href="tel: +63 975 450 9265" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>(+63) 975 450 9265 ~ Dean</a><br>
                    <a href="tel: +63 926 614 2109" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>(+63) 926 614 2109 ~ Nikki</a><br>
                    <a href="tel: +63 935 345 6238" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-phone"></i>(+63) 935 345 6238 ~ Jerome</a>    
                    </p>
                    <p>
                    <a href="mailto:2162752@slu.edu.com" class="text-white"><i class="fa d-inline mr-3 text-secondary fa-envelope-o"></i>2162752@slu.edu.ph</a>
                    </p>
                    <p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <p class="text-center text-white">© DJMN 2018 SCIS - All rights reserved. </p>
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
                            <div class="form-group"><label class="text-white">Email Address</label>
                            <input type="email" class="form-control" placeholder="Enter his/her Email" name="idno" required></div>
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
                            <div class="form-group"><label class="text-white">Curriculum Vitae <span class="text-warning">(Document files only!)</span></label>
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
                            <div class="form-group"><label class="text-white">Email</label>
                            <input type="email" class="form-control" placeholder="Enter his/her Email" name="idno" required></div>
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
    <div class="modal py-5 my-5" id="search-result">
        <div class="modal-dialog" role="message" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $_SESSION['search_fact_name'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body text-center">
                    <span id="h1-sub">
                        <i class="fas fa-download"></i>&emsp;&emsp;&emsp;
                        <i class="fas fa-upload"></i>&emsp;&emsp;&emsp;
                        <i class="fas fa-print"></i>&emsp;&emsp;&emsp;
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div class="modal-footer">
                    <span id="h3-sub">
                        (<i class="fas fa-download"></i> - Download&emsp;
                        <i class="fas fa-upload"></i> - Upload&emsp;
                        <i class="fas fa-print"></i> - Print&emsp;
                        <i class="fas fa-eye"></i> - View)
                    </span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>    
    </body>
</html>