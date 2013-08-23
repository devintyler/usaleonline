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
if(isset($_POST['isbn']))
$isbn = ($_POST['isbn']);
if(isset($_POST['title']))
$title = ($_POST['title']);


$deletequery = mysql_query("DELETE FROM wishlist WHERE UserID = '$userID' AND isbn = '$isbn' AND Title = '$title'");
if(!$deletequery) die ("Couldn't delete " . mysql_error());
header('Location: account.php');

?>