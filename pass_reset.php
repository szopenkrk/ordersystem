<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Shop Item - Start Bootstrap Template</title>

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
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="login.php">Log in</a>
						</li>
						<li>
							<a href="register.php">Register</a>
						</li>
						<li>
							<a href="pass_reset.php">Odzyskanie Hasla</a>
						</li>
						<li>
							<a href="contact_us.php">Kontakt</a>
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
						Shop Name
					</p>
					<div class="list-group">
						<a href="index.php" class="list-group-item active">Home</a>
						<a href="login.php" class="list-group-item">Log in</a>
						<a href="register.php" class="list-group-item">Register</a>
						<a href="pass_reset.php" class="list-group-item">Odzyskanie Hasla</a>
						<a href="contact_us.php" class="list-group-item">Kontakt</a>
						
					</div>
				</div>

				<div class="col-md-9">

					<div class="thumbnail">
						<img class="img-responsive" src="http://placehold.it/800x300" alt="">
						<div class="caption-full">

							<p>
								Enter your email address below.
							</p>
							<hr/>
							<div class="done">
								<H3>New password sent.</H3>
								<p>
									Check your inbox / junk mail folder for a link to reset your password.
								</p>
							</div><!--close done-->
							<div class="form">
								<form id="passreset" action="pass_reset_submit.php" method="post">
									<table align="center" width="50%" cellspacing="1" cellpadding="1" border="0">
										<tr>
											<td><label for="email">Your Email:</label></td>
											<td>
											<input onclick="this.value='';" name="email" type="text" size="25" maxlength="30" value="<?php
												if (isset($_POST['email'])) {echo $_POST['email'];
												}
											?>" />
											</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>
											<input type="submit" value="Submit" />
											<img id="loading" src="images/loading.gif" alt="Sending.." /></td>
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

						</div>

					</div>

					<div class="well">

						<div class="text-right">
							<a class="btn btn-success">Leave a Review</a>
						</div>

						<hr>

						<hr>

						<div class="row">
							<div class="col-md-12">

							</div>
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
