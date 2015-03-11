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
						<li>
							<a href="edit_profile.php" >Edit Profile</a>
						</li>
						<li>
							<a href="order_list.php" >Lista zamówień</a>
						</li>
						<li><a href="files.php" >Lista Plików</a></li>
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
				<div class="" style="float:left; width:100%;">

					<div class="thumbnail">

						<div class="" style="min-height: 600px;">

							
						<?php
						
						if ($getuser[0]['username'] == 'user1' || $getuser[0]['username'] == 'hcs'){
						
						$localhost = 'localhost';
							//name of server. Usually localhost
							$db_host = 'c22ordersystem';
							//database name.
							$db_user = 'c22admin_user';
							//database username.
							$db_pwd = '2edebqcRHFFD_';
							//database password.
							$table = 'zamownienie';
						$connect = mysql_connect("$localhost", "$username", "$password") OR die(mysql_error());
							
							if (!mysql_connect($db_host, $db_user, $db_pwd))
								    die("Can't connect to database");
								
								if (!mysql_select_db($database))
								    die("Can't select database");
								
								// sending query
								$result = mysql_query("SELECT * FROM {$table}");
								if (!$result) {
								    die("Query to show fields from table failed");
								}
								
								$fields_num = mysql_num_fields($result);
								
								
								echo "<table border='1' style='width:80%; height:80%; font-size:90%; margin: 10px auto;'><tr>";
								// printing table headers
								for($i=0; $i<$fields_num; $i++)
								{
								    $field = mysql_fetch_field($result);
								    echo "<td>{$field->name}</td>";
								}
								
								echo "</tr>\n";
								// printing table rows
								while($row = mysql_fetch_row($result))
								{
								    echo "<tr>";
								
								    // $row is array... foreach( .. ) puts every element
								    // of $row to $cell variable
								    foreach($row as $cell)
								        echo "<td>$cell</td>";
										
								    echo "</tr>";

								}
								mysql_free_result($result);
							
							
							
							}else{
								echo'Nie masz dostępu do zakładki';
							}
						?>
						</div>
					</div>

				</div>

			</div>

		</div>
		</div>
		<!-- /.container -->

		<div class="container">

			

			<!-- Footer -->
			

		</div>
		<!-- /.container -->

		<!-- jQuery -->


		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
	

		<script>
			
			$( "td:nth-child(10)" ).each(function() {
					var h3tag = $(this);
				
				var txt = h3tag.text();
				h3tag.text(''); //Remove default text
				$("<a />", {
				   "href" : "http://hcs.mkgstudio.pl/ordersystem/users/uploads/" + txt, //grab the link from somewhere
				   "text" : txt
				}).appendTo(h3tag);
			});
			$( "td:nth-child(11)" ).each(function() {
					var h3tag = $(this);
				
				var txt = h3tag.text();
				h3tag.text(''); //Remove default text
				$("<a />", {
				   "href" : "http://hcs.mkgstudio.pl/ordersystem/users/uploadchange/" + txt, //grab the link from somewhere
				   "text" : txt
				}).appendTo(h3tag);
			});

			

			$( "td:nth-child(7)" ).each(function() {
					var h3tag = $(this);
				
				var txt = h3tag.text();
				h3tag.text(''); //Remove default text
				$("<a />", {
				   "href" : "http://hcs.mkgstudio.pl/ordersystem/users/show_order.php/" + txt + '/', //grab the link from somewhere
				   "text" : "Link zamówienia" + txt
				}).appendTo(h3tag);
			});


				$( "td:contains('filechange')").text("Zmienione");
				$( "td:contains('file')").text("Zamówienie");
				$( "td:contains('Link zamówieniatoken')").text("Link zamówienia");
				
			


		</script>
	</body>

</html>



