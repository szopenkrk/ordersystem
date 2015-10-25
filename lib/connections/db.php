<?PHP
$localhost = 'localhost'; //name of server. Usually localhost
$database = ''; //database name.
$username = ''; //database username.
$password = ''; //database password.

// connect to db  
$conn = mysql_connect($localhost, $username, $password) or die('Error connecting to mysql');   
$db = mysql_select_db($database,$conn) or die('Unable to select database!');    

?>
