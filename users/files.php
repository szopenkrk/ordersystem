<?PHP
require_once ('../lib/connections/db.php');
include ('../lib/functions/functions.php');

checkLogin('2');

$getuser = getUserRecords($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?=$getuser[0]['username']; ?>'
			s Home Page.</title>

		<!-- Bootstrap Core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen" />
		<!-- Custom CSS -->
		<link href="../css/shop-item.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery-1.6.2.js"></script>
		<script type="text/javascript" src="../js/script.js"></script>

	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">HCS</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>
						<li><a href="order.php" >Zamówienie</a></li>
						<li><a href="order_list.php" >Lista zamówień</a></li>
						<li><a href="files.php" >Lista Plików</a></li>
						<li><a href="change_pass.php" >Zmień Hasło</a></li>
						<li><a href="edit_profile.php" >Edytuj Profil</a></li>
						<li><a href="log_off.php?action=logoff" >Wyloguj się</a></li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Page Content -->
		<div class="container">

			<div class="row">

				<div class="col-md-3">
					<p class="lead">
						HCS
					</p>
					<div class="list-group">
						<a href="index.php" class="list-group-item active">Strona Główna</a>
						<a href="order.php" class="list-group-item">Zamówienie</a>
						<!-- <?
						if (!empty($getuser[0]['thumb_path'])) {echo "<a href='manage_photo.php' class='list-group-item' >Manage My Photo</a>  ";
						} else {echo "<a href='upload_photo.php' class='list-group-item'>Upload Photo</a>  ";
						}
						?> -->
						<a href="order_list.php" class="list-group-item">Lista zamówień</a>
						<a href="change_pass.php" class="list-group-item">Zmień Hasło</a>
						<a href="edit_profile.php" class="list-group-item">Edytuj profil</a>
						<a href="log_off.php?action=logoff" class="list-group-item">Wyloguj się</a>

					</div>
				</div>
				<div class="col-md-9">

					<div class="thumbnail">

						<div class="caption-full">

							<div style="width:100px; height:100px; margin-bottom:30px;">
								<?php
								// SHOWING WHAT USER IT IS							
								
								if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {echo $getuser[0]['username'];
								} else {echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
								}
								
								displayUserImg($getuser[0]['id']); 

								?>
							</div>

							<br />
							
						</div>

					</div>
					<div style="float:left; width:50%; height:15%;">
								Witaj w systemie zamówień do HCS
								<br />
								Lista plików alma:<br>

								<ul>
									<li></li>

								</ul>
								<?php
									$rootPath = "/files";
									$files = glob("./files/*");
echo '<ul>'.implode('', array_map('sprintf', array_fill(0, count($files), '<li><a href="%s">%s</a></li>'), $files, $files)).'</ul>';
								?>

								
							</div>

				</div>

			</div>


		</div>
		<!-- /.container -->

		<div class="container">

			<hr>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<p>
							Copyright &copy; HCS Website 2014
						</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>


	</body>

</html>



