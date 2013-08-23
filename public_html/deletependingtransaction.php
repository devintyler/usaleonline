<?php
//deletes a user's pending transaction
session_start();
if(!isset($_SESSION['email'])) {
die(header('Location: login.php'));
}
require_once "accessdatabase.php";
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
or die("Unable to select database : " . mysql_error());
$postnumber = "";
session_start();
	$sessionemail = $_SESSION['email'];
	$sessionpassword = $_SESSION['password'];
if(!isset($_SESSION['email']))
{
echo "Login or signup to view your wishlist";
header('Location: login.php');
}

$userquery = mysql_query("SELECT * FROM user WHERE Email = '$sessionemail'");
if(!$userquery) die ("Can't get user information" .mysql_error());
$userarray = mysql_fetch_array($userquery);
$userID = $userarray['UserID'];

if(isset($_POST['postnumber']))
$postnumber = ($_POST['postnumber']);
if(isset($_POST['type']))
$type = ($_POST['type']);

$deletequery = mysql_query("DELETE FROM pendingtransactions WHERE postnumber = '$postnumber'");
if(!$deletequery) die ("Can't delete from pending transactions" . mysql_error());
if($type == 'Selling'){
$deletebookquery = mysql_query("DELETE FROM Books WHERE PostNumber = '$postnumber'");
if(!$deletebookquery) die ("Couldn't delete form books " . mysql_error());
}
header('Location: account.php');

?>