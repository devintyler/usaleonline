<?php
//deletes a book from the user's wishlist
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
	$sessionemail = $_SESSION['email'];
	$sessionpassword = $_SESSION['password'];
if(!isset($_SESSION['email']))
{
header('Location: login.php');
}

if(isset($_POST['userid']))
$userID = ($_POST['userid']);
if(isset($_POST['purchasedpostnumber']))
$postnumber = ($_POST['purchasedpostnumber']);



$deletequery = mysql_query("DELETE FROM purchased WHERE UserID = '$userID' AND PostNumber = '$postnumber'");
if(!$deletequery) die ("Couldn't delete " . mysql_error());
header('Location: account.php');

?>