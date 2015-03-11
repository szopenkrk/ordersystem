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
			$(document).ready(function() {

				$('#editprofileForm').submit(function(e) {
					editprofile();
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
		<p align="center" class="done">
			Profile updated successfully.
		</p><!--close done-->
		<div class="form">
			<form id="editprofileForm" action="edit_profile_submit.php" method="post">
				<table width="80%" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td><label for="first_name">First Name:</label></td><td>
						<input type="text" name="first_name" value="<?
							if (isset($getuser[0]['first_name'])) {echo $getuser[0]['first_name'];
							}
						?>"/>
						</td>
					</tr>
					<tr>
						<td><label for="last_name"><label>Last Name:</label></td><td>
						<input type="text" name="last_name" value="<?
							if (isset($getuser[0]['last_name'])) {echo $getuser[0]['last_name'];
							}
						?>" />
						</td>
					</tr>
					<tr>
						<td><label for="email"><label>Email:</label></td><td>
						<input type="text" name="email" value="" />
						<span class="label" style="color:#000000 ;">Obecny: <?=$getuser[0]['email']; ?></span></td>
					</tr>
					<tr>
						<td><label for="dialing_code"><label>Dialing Code:</label></td><td><?= get_dialing_code($_SESSION['user_id']); ?></td>
					</tr>
					<tr>
						<td><label for="phone"><label>Phone:</label></td><td>
						<input type="text" name="phone" value="<?
							if (isset($getuser[0]['phone'])) {echo $getuser[0]['phone'];
							}
						?>" />
						</td>
					</tr>
					<tr>
						<td><label for="city"><label>City/Town:</label></td><td>
						<input type="text" name="city" value="<?
							if (isset($getuser[0]['city'])) {echo $getuser[0]['city'];
							}
						?>" />
						</td>
					</tr>
					<tr>
						<td><label for="country"><label>Country:</label></td><td><?= get_select_countries($_SESSION['user_id']); ?></td>
					</tr>
					<tr>
						<td>&nbsp;</td><td>
						<input type="submit" name="editprofile" value="Update" />
						<img id="loading" src="../images/loading.gif" alt="Updating.." /></td>
					</tr>
					<tr>
						<td colspan="2">
						<div id="error">
							&nbsp;
						</div></td>
					</tr>
				</table>
			</form>
		</div><!--close form-->
	</body>
</html>