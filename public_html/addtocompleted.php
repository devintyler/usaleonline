<?php
session_start();
/*
This page adds a book to a user's completed transactions database
*/
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

$getbooksquery = mysql_query("SELECT * FROM Books WHERE PostNumber = '$postnumber'");
if(!$getbooksquery) die ("Can't get books " . mysql_error());
$getbooksarray = mysql_fetch_array($getbooksquery);
$isbn = $getbooksarray['isbn'];
$title = $getbooksarray['Title'];
if($type == 'SELLING') $type = 'SOLD';
if($type == 'BUYING') $type = 'PURCHASED';

$addcompletedquery = mysql_query("INSERT INTO completedtransactions VALUES('$userID','$postnumber','$type','$isbn','$title')");
if(!$addcompletedquery) die ("Couldn't add to completed transactions " . mysql_error());
if($type == 'SOLD'){
$deletebookquery = mysql_query("DELETE FROM Books WHERE PostNumber = '$postnumber'");
if(!$deletebookquery) die ("Couldn't delete form books " . mysql_error());
$deletependingquery = mysql_query("DELETE FROM pendingtransactions WHERE PostNumber = '$postnumber'");
if(!$deletependingquery) die("Couldn't delete pending " . mysql_error());
}
if($type == 'PURCHASED'){
$addpurchasedquery = mysql_query("INSERT INTO purchased VALUES('$userID','$postnumber','$isbn','$title')");
if(!$addcompletedquery) die ("Can't add to purchased" . mysql_error());
$deletependingquery = mysql_query("DELETE FROM pendingtransactions WHERE UserID = '$userID' AND PostNumber = '$postnumber'");
if(!$deletependingquery) die ("Can't delete pending" . mysql_error());
}
header('Location: account.php');
?>