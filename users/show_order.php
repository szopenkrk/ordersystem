
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

		<title><?=$getuser[0]['username']; ?>'s Home Page.</title>

		<!-- Bootstrap Core CSS -->
		<link href="../../../css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../../../css/style.css" media="screen" />
		<!-- Custom CSS -->
		<link href="../../../css/shop-item.css" rel="stylesheet">
		<script type="text/javascript" src="../../../js/jquery-1.6.2.js"></script>
		<script type="text/javascript" src="../../../js/script.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
	</head>

	<body>

		<!-- Navigation -->
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="http://hcs.mkgstudio.pl/ordersystem/users/index.php">Home</a>
						</li>
						<li>
							<a href="http://hcs.mkgstudio.pl/ordersystem/users/order.php" >Zamówienie</a>
						</li>
						
						<li>
							<a href="http://hcs.mkgstudio.pl/ordersystem/edit_profile.php" >Edit Profile</a>
						</li>
						<li>
							<a href="http://hcs.mkgstudio.pl/ordersystem/users/order_list.php" >Lista zamówień</a>
						</li>
						<li><a href="http://hcs.mkgstudio.pl/ordersystem/users/files.php" >Lista Plików</a></li>
						<li>
							<a href="http://hcs.mkgstudio.pl/ordersystem/users/contact_us.php">Kontakt</a>
						</li>
						<li>
							<a href="http://hcs.mkgstudio.pl/ordersystem/users/log_off.php">Wyloguj się</a>
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
						
					</p>
					<div class="list-group">
						 <a href="http://hcs.mkgstudio.pl/ordersystem/users/index.php" class="list-group-item active">Home</a>
						<a href="http://hcs.mkgstudio.pl/ordersystem/users/order.php" class="list-group-item">Zamówienie</a>
						<!-- <?
						if (!empty($getuser[0]['thumb_path'])) {echo "<a href='http://hcs.mkgstudio.pl/ordersystem/users/manage_photo.php' class='list-group-item' >Manage My Photo</a>  ";
						} else {echo "<a href='upload_photo.php' class='list-group-item'>Upload Photo</a>  ";
						}
						?> -->
						<a href="http://hcs.mkgstudio.pl/ordersystem/users/order_list.php" class="list-group-item">Lista zamówień</a>
						<a href="http://hcs.mkgstudio.pl/ordersystem/users/change_pass.php" class="list-group-item">Zmień Hasło</a>
						<a href="http://hcs.mkgstudio.pl/ordersystem/users/edit_profile.php" class="list-group-item">Edytuj profil</a>
						<a href="http://hcs.mkgstudio.pl/ordersystem/users/log_off.php">Wyloguj się</a>
						
					</div>
				</div>

				<div class="col-md-9">

					<div class="thumbnail">
						
						<div class="caption-full" style="margin: 0 auto; width:550px; height:500px;
								    border-width: 2px; padding-left:40px;">

							<div style="width:100px; height:100px;">
								Witaj <?php
								if (empty($getuser[0]['first_name']) || empty($getuser[0]['last_name'])) {echo $getuser[0]['username'];
								} else {echo $getuser[0]['first_name'] . " " . $getuser[0]['last_name'];
								}
								?>
							</div>

							Podgląd zamówienia:

							<?php
							
							$pageURL = 'http';
							if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";
							}
							$pageURL .= "://";
							if ($_SERVER["SERVER_PORT"] != "80") {
								$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
							} else {
								$pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
							}
				
							$u1 = basename($pageURL);
							$end = preg_replace('%^(.+)/%', '', $pageURL);

							echo "ORDER TOKEN:     " . $u1;

							$localhost = 'localhost';
							//name of server. Usually localhost
							$database = 'c22ordersystem';
							//database name.
							$username = 'c22admin_user';
							//database username.
							$password = '2edebqcRHFFD_';
							//database password.

							//CONNECT TO DATABASE
							$connect = mysql_connect("$localhost", "$username", "$password") OR die(mysql_error());
							mysql_select_db("$database", $connect);
							//ALWAYS ESCAPE STRINGS IF YOU HAVE RECEIVED THEM FROM USERS

							//FIND AND GET THE ROW
							$getit = mysql_query("SELECT * FROM zamownienie WHERE token='$u1'", $connect);
							$row = mysql_fetch_array($getit);
								
							$u2 = $row['order_user'];
							
							$get2value = mysql_query("SELECT * FROM users WHERE username='$u2'", $connect);
						
							$row2 = mysql_fetch_array($get2value);
							
							$usermail = $row2['email'];

							$file_changed = $row['filechange'];
							
							echo "<br />";
							echo "ID zamówienia : " . $row['id'] . "<br/>";
							echo "Link do zamówienia <a href='http://hcs.mkgstudio.pl/ordersystem/users/uploads/".$row['file'] . "'/>LINK</a><br/>";
							if($file_changed){
								echo"<br />";
								echo "<b>Zamówienie wraz z modyfikacjami <a href='".$row['filechange'] . "'/>LINK</a><br/></b>";
								echo"<br />";

							}


							echo "Uwagi do zamówienia zamówienia : " . $row['content'] . "<br/>";
							echo "Zamawiający : " . $row['order_user'] . "<br/>";
							echo "Data zamówienia : " . $row['date_m'] . "<br/>";
							echo "Manager : " . $row['manager'] . "<br/>";
							echo "E-mail zamawiającego : " . $usermail . "<br/>";
							echo "Status : " . $row['status'] . "</br>";
							echo "Czy widoczne : " . $row['visibility'] . "</br>";
							echo "Status Zamówienia HCS : " . $row['hcs_status'] . "</br>";
							?>
							
							<br />
							<?php if(!$row['status']){
								echo'
							<form action="" method="post" enctype="multipart/form-data">
								<b>Dodaj modyfikacje zamówienia :</b>
								<input type="file" name="fileToUpload" id="fileToUpload"><br /><br />
								
								<input type="submit" name="akceptacja" value="akceptacja"  />
								<input type="submit" name="odrzucenie" value="odrzucenie"  />
								
							</form>
							';}
							//################ ZMIANA STATUSU ZAMÓWIENIA #####################################/
							if ($getuser[0]['username'] == 'user1' || $getuser[0]['username'] == 'hcs'){
								echo 'Możesz zmienić status zamówienia';
								echo '
									<form action="" method="post" enctype="multipart/form-data">
										<input type="submit" name="wrealizacji" value="w realizacji"  />
										<input type="submit" name="zrealizowane" value="zrealizowane"  />
									</form>
								';

							}
							
							//#################### END ZMIANA STATUSU ZAMÓWIENIA ###############################################/




							//################################ MAIL ODBIORCY  ZAMÓWIENIA ################################
								$N2name = "{$Nname}.xls";
								$target_path = "uploads/{$N2name}";


								$target_dir = "uploadchange/";
								$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
								$uploadOk = 1;
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								$nn = basename( $_FILES["fileToUpload"]["name"]);
							


//######################## ZMIANA STATUSU W BAZIE DANYCH ############################################//
							if ($_POST['wrealizacji'] and $_SERVER['REQUEST_METHOD'] == "POST") {

								mysql_select_db("$database", $connect);
								$update = "UPDATE zamownienie SET hcs_status='w realizacji' WHERE token='$u1'";

								$res = mysql_query($update) or die(mysql_error());
								header("refresh: 3;");
							}

//######################## ZMIANA STATUSU W BAZIE DANYCH ############################################//
							if ($_POST['zrealizowane'] and $_SERVER['REQUEST_METHOD'] == "POST") {

								mysql_select_db("$database", $connect);
								$update = "UPDATE zamownienie SET hcs_status='zrealizowane'  WHERE token='$u1'";

								$res = mysql_query($update) or die(mysql_error());
								header("refresh: 3;");
							}


//#############################################################################################################								
							if ($_POST['akceptacja'] and $_SERVER['REQUEST_METHOD'] == "POST") {
										
									if ($_FILES["fileToUpload"]["size"] > 500000) {
									    echo "Plik jest za duży.";
									    $uploadOk = 0;
									}
									
								if ($uploadOk == 0) {
								    // echo "Sorry, your file was not uploaded.";
								// if everything is ok, try to upload file
								} else {
									$Nname = uniqid();
								$N2name = "{$Nname}.xls";
								$target_path = "uploads/{$N2name}";
								    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								        echo "Plik ". basename( $_FILES["fileToUpload"]["name"]). " został dodany poprawnie.";
								    } else {
								        echo "Przepraszamy wystąpił problem podczas dodawania pliku.";
								    }
								}
								$uploadfile = $_FILES["fileToUpload"]["name"];
								
								if($uploadfile){
									$zam = 'http://hcs.mkgstudio.pl/ordersystem/users/uploadchange/'.$uploadfile;
								}else{
									$zam = '';
								}

								mysql_select_db("$database", $connect);
								$update = "UPDATE zamownienie SET status='akceptacja', visibility='none', filechange='$zam'  WHERE token='$u1'";

								$res = mysql_query($update) or die(mysql_error());



							$hcs = 'grzegorz.adamczyk@hcseurope.pl';
							$hcs2 = 'magdalena.baginska@hcseurope.pl';
							//$hcs = 'karolkochanski@gmail.com';
							
							
							$uploadfile = $_FILES["fileToUpload"]["name"];
							$email_subject = "Potwierdzenie ## Zamówienie z systemu HCS - ZAAKCEPTOWANE";
							
							
							$zawartość = "Zamówienie z systemu HCS - ZAAKCEPTOWANE  \r\n Treść zamówienia    :" . $row['content'] . " \r\nZamówienie pochodzi od " . $row['order_user']."\r\n E-mail zamawiajacego ". $row['user_mail']."
							\r\nZamówienie dostępne pod adresem http://hcs.mkgstudio.pl/ordersystem/users/uploads/".$row['file']." ";
							
							if($uploadfile){
								$zawartość .="\r\nZamówienie może zawierać zmiany jeźli tak to plik zmian: http://hcs.mkgstudio.pl/ordersystem/users/uploadchange/" . $uploadfile ." ";
							}	

							$headers = "Zamówienie z systemu HCS - ZAAKCEPTOWANE PRZEZ MANAGERA";

								//######################## MAIL DO SKLEPU ##########################################
								@mail($usermail, $email_subject, $zawartość, $headers);
																
								//############################# Zamówienie do HCS ######################################
								@mail($hcs, $email_subject2, $zawartość, $headers);
								@mail($hcs2, $email_subject2, $zawartość, $headers);
								 header("refresh: 3;");

							}


							//##########################################################################################################

							if ($_POST['odrzucenie'] and $_SERVER['REQUEST_METHOD'] == "POST") {

								if ($_FILES["fileToUpload"]["size"] > 500000) {
									    echo "Plik jest za duży.";
									    $uploadOk = 0;
									}
									
								if ($uploadOk == 0) {
								    // echo "Plik nie został dodany.";
								// if everything is ok, try to upload file
								} else {
									$Nname = uniqid();
								$N2name = "{$Nname}.xls";
								$target_path = "uploads/{$N2name}";
								    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								        echo "Plik ". basename( $_FILES["fileToUpload"]["name"]). " został dodany poprawnie.";
								    } else {
								        
								    }
								}
								$uploadfile = $_FILES["fileToUpload"]["name"];
								
								if($uploadfile){
									$zam = 'http://hcs.mkgstudio.pl/ordersystem/users/uploadchange/'.$uploadfile;
								}else{
									$zam = '';
								}



								mysql_select_db("$database", $connect);
								$update = "UPDATE zamownienie SET status='odrzucenie', visibility='none', filechange='$zam'  WHERE token='$u1'";
								
								$res = mysql_query($update) or die(mysql_error());
								

								$uploadfile = $_FILES["fileToUpload"]["name"];

								$hcs = 'grzegorz.adamczyk@hcseurope.pl';
								$hcs2 = 'magdalena.baginska@hcseurope.pl';
								//$hcs = 'karolkochanski@gmail.com';
						
							$email_subject3 = "Potwierdzenie ## Zamówienie z systemu HCS - ODRZUCONE";

			$headers = "Zamówienie z systemu HCS - ODRZUCONE PRZEZ MANAGERA";
			
			$zaw = "Zamówienie z systemu HCS - ODRZUCONE  \r\n Dodatkowa treść zamówienia    :" . $row['content'] . " 
			\r\nZamówienie pochodzi od " . $row['order_user']."\r\n E-mail zamawiajacego ". $row['user_mail']."
			\r\nZamówienie dostępne pod adresem http://hcs.mkgstudio.pl/ordersystem/users/uploads/".$uploadfile." ";  
			if($uploadfile){
				$zawartość .="\r\nZamówienie może zawierać zmiany jeźli tak to plik zmian: http://hcs.mkgstudio.pl/ordersystem/users/uploadchange/" . $uploadfile ." ";
			}	
			


								@mail($usermail, $email_subject3, $zaw, $headers);
 									header("refresh: 3;");
							}
							?>
						</div>

					</div>

				</div>

			</div>

		</div>
		<!-- /.container -->

		<div class="container">

			

		</div>
		<!-- /.container -->

		<!-- jQuery -->
		<script src=".../js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src=".../js/bootstrap.min.js"></script>

	</body>

</html>
