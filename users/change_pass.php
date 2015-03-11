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
<script type="text/javascript">
			$(document).ready(function(){
		
				$('#updatepassForm').submit(function(e) {
					updatepass();
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
						<li>
							<a href="index.php">Strona Główna</a>
						</li>
						<li>
							<a href="order.php" >Zamówienie</a>
						</li>
						<!-- <?
						if (!empty($getuser[0]['thumb_path'])) {echo "<li><a href='manage_photo.php' >Manage My Photo</a></li>";
						} else {echo "<li><a href='upload_photo.php' >Upload Photo</a> </li> ";
						}
						?> -->
						<li>
							<a href="change_pass.php" >Zmień Hasło</a>
						</li>
						<li><a href="files.php" >Lista Plików</a></li>
						<li>
							<a href="edit_profile.php" >Edit Profile</a>
						</li>
						<li>
							<a href="log_off.php?action=logoff" >Wyloguj się</a>
						</li>

						
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
<a href="admin/login.php" class="list-group-item">Administracja</a>
						<a href="order.php" class="list-group-item">Zamówienie</a>
						<!-- <?
						if (!empty($getuser[0]['thumb_path'])) {echo "<a href='manage_photo.php' class='list-group-item' >Manage My Photo</a>  ";
						} else {echo "<a href='upload_photo.php' class='list-group-item'>Upload Photo</a>  ";
						}
						?> -->
						<a href="change_pass.php" class="list-group-item">Zmień Hasło</a>
						<a href="edit_profile.php" class="list-group-item">Edytuj profil</a>
						<a href="log_off.php?action=logoff" class="list-group-item">Wyloguj się</a>

					</div>
				</div>
				<div class="col-md-9">

					<div class="thumbnail">

						<div class="caption-full">

							
							<p><?php if(empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])){echo $getuser[0]['username'];} else {echo $getuser[0]['first_name']." ".$getuser[0]['last_name'];} ?>, change your password.</p>
								<p class="done">Password successfully changed.</p><!--close done-->
									<div class="form">
									<h3>Change Password</h3>
									<hr/>
										<table class="searchForm" border="0" align="center">
											<form id="updatepassForm" action="change_pass_submit.php" method="post">
											<tr>
												<td><label for="old password">Old Password:</label></td><td><input name="oldpassword" type="password"/></td>
											</tr>
											<tr>
												<td><label for="new password">New Password:</label></td><td><input name="newpassword" type="password"/></td>
											</tr>
											<tr>
												<td colspan="2" align="center"><input type="submit" name="submit" value="Change Password" /><img id="loading" src="../images/loading.gif" alt="Updating.." /></td>
											</tr>
											<tr>
												<td colspan="2"><div id="error">&nbsp;</div></td>
											</tr>
											</form>
										</table>
									</div><!--close form-->
							
							
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
							Copyright &copy; Your Website 2014
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



