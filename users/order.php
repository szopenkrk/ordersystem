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
<?php



//----------Function add Order to database----------
function addOrder($content, $order_user, $date_m, $manager, $user_mail) {



		//########################### DODAWANIE PLIKU NA SERWER#############################################
								$Nname = uniqid();
								$N2name = "{$Nname}.xls";
								$target_path = "uploads/{$N2name}";

								if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
									echo "The file " . $N2name . " has been uploaded";
									
								} else {
									echo "There was an error uploading the file, please try again!";
								}
								
								//########################### END DODAWANIE PLIKU NA SERWER#############################################

	/*Date to mailing */
	
	//################## MANAGER MAIL ####################################
	//$manager = 'bkasperczyk@almamarket.pl';
	//$manager = 'grzegorz.adamczyk@hcseurope.pl';
	$manager = 'karolkochanski@gmail.com';
	//$mail_to = $_POST['mail'];
	$email_subject = "ZAMOWIENIE HCS nr: ";
	$link = "ordersystem/users/show_order.php";
	$timezone = date_default_timezone_get();
	$date_m = date('m/d/Y h:i:s a', time());
	$content = secureInput($content);
	$order_user = secureInput($order_user);
	$date_m = secureInput($date_m);
	$user_mail = $getuser[0]['email'];

	$kod = uniqid();
	
	if (isset($_POST['send'])) {
		$get2value1 = mysql_query("SELECT * FROM users WHERE username='$order_user'", $connect);
		$row3 = mysql_fetch_array($get2value1);
		
		$user_mail1 = $row3['email'];
		$sql = "INSERT INTO zamownienie (`content`, `order_user`, `date_m`, `manager`, `user_mail`,`token`,`file`) VALUES 
			                   ('" . $content . "', '" . $order_user . "', '" . $date_m . "', '" . $manager . "', '" . $user_mail1 . "', '" . $kod . "','".$N2name."')";

		$res = mysql_query($sql) or die(mysql_error());

		if ($sql) {
					
							


			$content = $_POST['content'];

			$headers = 'E mail z systemu zamówień HCS';
			$bodytext = 'Link do zatwierdzenia zamówienia http://hcs.mkgstudio.pl/' . $link . '/' . $kod . '/  
			Zamówienie z maila :'. $user_mail1 .'
			Zamówienie dostępne pod adresem http://hcs.mkgstudio.pl/ordersystem/users/uploads/'.$N2name;
						
			
			@mail($manager, $email_subject, $bodytext, $headers);

			echo "
				<script>
				alert('Element został dodany w systemie  Zapytanie do managera zostało wysłane!');
				</script>
				";

		} else {

			echo "
				<script>
				alert(' Wystąpił Błąd !');
				</script>
				";
		}
	}

}


?>
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
						<a href="order_list.php" class="list-group-item">Lista zamówień</a>
						<a href="change_pass.php" class="list-group-item">Zmień Hasło</a>
						<a href="edit_profile.php" class="list-group-item">Edytuj profil</a>
						<a href="log_off.php?action=logoff" class="list-group-item">Wyloguj się</a>

					</div>
				</div>
				<div class="col-md-9">

					<div class="thumbnail">

						<div class="caption-full">

							<div style="width:100px; height:100px;">
								<?php
								// SHOWING WHAT USER IT IS							
								
								if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {echo $getuser[0]['username'];
								} else {echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
								}
								
								displayUserImg($getuser[0]['id']); 

								?>
							</div>

							<br />
							<div style="float:left; width:50%; height:15%;">
								Witaj w systemie zamówień do HCS
								<br />
								Poniższy formularz jest formularzem zamówień
								<br />
								
							</div>

							<div style="width:100%; margin-top:20px;">
								<h3>Dane do zamówienia</h3>

							</div>

							<?php

							$order_user = $_POST['order_user'];
							
							$order_user = $getuser[0]['username'];
							


							//################## MANAGER MAIL ####################################
							//$manager = 'bkasperczyk@almamarket.pl';
							//$manager = 'grzegorz.adamczyk@hcseurope.pl';
							$manager = 'karolkochanski@gmail.com';
							$user_mail = $getuser[0]['email'];
							
							if (!$conn) {
								die('Could not connect: ' . mysql_error());
							}
									
					
							if (isset($_POST['send'])) {
								

								//####################################### DODANIE DO BAZY DANYCH #######################################
								$res = addOrder($_POST['content'], $getuser[0]['username'], $manager);
								//####################################### END DODANIE DO BAZY DANYCH #######################################

							}
							?>

							<form action="" method="post" enctype="multipart/form-data">

								<div id="send">

									<div class="kolumna">

										<div class="nazwaform">
											<b>Użytkownik :</b> <?=$getuser[0]['username']; ?>
										</div>
										<br />

										<?php
										
										echo "<b>Data zamówienia :</b>";
										$timezone = date_default_timezone_get();

										$date_m = date('m/d/Y h:i:s a', time());
										echo $date_m;
										?>
										<br/>
										<input name="order_user" type="hidden" value="<?php echo $getuser[0]['username']; ?>">
										<br />
																				
										<b>User E-mail:</b> <?=$getuser[0]['email']; ?>
										<br/><br/>
										<b> Manager</b>
										<?php 
											echo "<br />".$manager;
										?>
										<br /><br />
										<a href="http://hcs.mkgstudio.pl/ordersystem/users/uploads/Alma.xls">Link do arkusza zamówień - Pobierz</a>
										</br/>
										<input name="date" type="hidden" value="<?php echo $date ?>" />
										<br />
										Dodaj zamówienie w wersji plikowej:
										<br/>
										<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
										<br />
										<b>Wybierz plik zamówienia:</b>
										<input name="uploadedfile" type="file" />
										<br />
										<br/>
										<h3>Dodatkowe informacje do zamówienia :</h3>
										<br/>
										<textarea name="content" style="height:115px; width:90%; margin: 20px 50px;" > </textarea>
										<br />
										<br />
										<input type="hidden" name="token" value="<?php echo $newToken; ?>">
										<input type="submit" name='send' id="send"/>

									</div>

								</div>

							</form>
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



