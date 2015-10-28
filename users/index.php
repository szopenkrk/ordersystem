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
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
		<!-- Custom CSS -->
		<link href="css/shop-item.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-1.6.2.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script type="text/javascript">
			$(document).ready(function() {

				$('#loginForm').submit(function(e) {
					login();
					e.preventDefault();
				});
			});

		</script>
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
						<a href="index.php" class="list-group-item active">Home</a>
						<a href="order.php" class="list-group-item">Zamówienie</a>
						<a href="order_list.php" class="list-group-item">Lista zamówień</a>
						<a href="files.php" class="list-group-item">Lista Plików</a>
						<a href="change_pass.php" class="list-group-item">Zmień Hasło</a>
						<a href="edit_profile.php" class="list-group-item">Edytuj Profil</a>
						<a href="log_off.php?action=logoff" class="list-group-item">Wyloguj się</a>

					</div>
				</div>

				<div class="col-md-9">

					<div class="thumbnail">
						<img class="img-responsive" src="../images/800x300.jpg" alt="">
						<div class="caption-full">

							<div align="right">

							</div></td>
							<p>
								WITAJ <?php
								if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {echo $getuser[0]['username'];
								} else {echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
								}
								?>
							</p>
							
						</div>

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
