<?PHP
$localhost = 'localhost'; //name of server. Usually localhost
$database = 'c22ordersystem'; //database name.
$username = 'c22admin_user'; //database username.
$password = '2edebqcRHFFD_'; //database password.

// connect to db  
$conn = mysql_connect($localhost, $username, $password) or die('Error connecting to mysql');   
$db = mysql_select_db($database,$conn) or die('Unable to select database!');    

?>