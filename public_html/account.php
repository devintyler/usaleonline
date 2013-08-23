<?php
/*
this page contains all of the necessary account information based on
the email of the user's session. this email is used to query the database
and obtain all necessary data. from here the user can see their purchased, transactions,
and wishlist. and can add and delete from the wishlist. 
*/
require_once "accessdatabase.php";
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
or die("Unable to select database : " . mysql_error());
$postnumber = "";

session_start();

if(!isset($_SESSION['email'])) {
header('Location: login');
}else{
$sessionemail = ($_SESSION['email']);
}

$userquery = mysql_query("SELECT * FROM user WHERE Email = '$sessionemail'");
if(!$userquery) die ("Can't get user information" .mysql_error());
$userarray = mysql_fetch_array($userquery);
$userID = $userarray['UserID'];
?>

<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Account</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<noscript>
<link rel="stylesheet" href="css/5grid/core.css" />
<link rel="stylesheet" href="css/5grid/core-desktop.css" />
<link rel="stylesheet" href="css/5grid/core-1200px.css" />
<link rel="stylesheet" href="css/5grid/core-noscript.css" />
<link rel="stylesheet" href="../css/style.css" />
<link rel="stylesheet" href="css/style-desktop.css" />
</noscript>
<script src="css/5grid/jquery.js"></script>
<script src="css/5grid/init.js?use=mobile,desktop,1000px&mobileUI=1&mobileUI.theme=none"></script>
<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
</head><body>
<div id="wrapper">
	<div id="header-wrapper">
		<header id="header">
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="logo"> <!-- Logo -->
						<h1><a href="."><img src = "../images/logo.png"></a></h1>
						<p><a href="logout">Log Out</a>
					</div>
				</div>
			</div>
			<div class="5grid-layout"> 			<div class="row">
					<div class="12u" id="menu">
						<div id="menu-wrapper">
							<nav class="mobileUI-site-nav">
								<ul>
								 	
									<li><a href="search">Search</a></li>
									<li><a href="browse">Browse</a></li>
									<li><a href="sell">Sell</a></li>
									<li class="current_page_item"><a href="account">Account</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<div id="page-wrapper" class="5grid-layout">
		<div id="featured" class="5grid-layout">
			<div class="titlebg">
				<!--<h2>WELCOME, FIRST NAME HERE</h2>-->
			</div>
			<div class="row">
				<div class="3u">
					<section>
						<p><a href="browse"><img src="images/pics03.jpg" alt="Buy Books"></a></p>
					</section>
				</div>
				<div class="3u">
					<section>
						<p><a href="sell"><img src="images/pics04.jpg" alt="Sell Books"></a></p>
					</section>
				</div>
				<div class="3u">
					<section>
						<p><a href="add"><img src="images/pics06.jpg" alt="Add To Wish List"></a></p>
					</section>
				</div>
			</div>
			
		</div>
		<div class="5grid-layout">
			<div class="row">
				
				<div class="3u" id="sidebar1">
					<section>
						<h2>Transactions</h2>
						<ul class="style1">
<?php
//query the database to get the users current transactions and return them in the style of the list
$getpendingtransactionsquery = ("SELECT * FROM pendingtransactions WHERE UserID = '$userID'");
$getpendingtransactions = mysql_query($getpendingtransactionsquery);
if(!$getpendingtransactions) die ("Can't connect to pendingtransactions: " .mysql_error());

while ($getpendingtransactionsarray = mysql_fetch_array($getpendingtransactions)){

$postnumber = $getpendingtransactionsarray['PostNumber'];
$getbookquery = mysql_query("SELECT * FROM Books WHERE PostNumber = '$postnumber'");
if(!$getbookquery) die ("Can't get books " .mysql_error());
$getbooksarray = mysql_fetch_array($getbookquery);
$type = $getpendingtransactionsarray['Type'];
echo "<li> ".$getbooksarray['Title']  . "&nbsp;&nbsp;&nbsp;&nbsp;". $getpendingtransactionsarray['Type'] . "<form method = 'post' action = 'addtocompleted.php' style = 'display:inline'><input type = 'hidden' value = '$userID' name = 
'userid' > <input type = 'hidden' value = '$postnumber' name = 'postnumber'><input type = 'hidden' value = '$type' name = 'type'> 
<div style='text-align: right; position:relative; top:-15px;'><input type = 'submit' value = 'Completed' name = 'complete'></form><form action = 'deletependingtransaction.php' method = 'POST'><input type = 'hidden' value = '$postnumber' name = 'postnumber'><input type = 'hidden' value = '$type' name = 'type'> <input type = 'submit' value = 'Delete' name = 'delete'>
</div>
</form></style></li>";
}
?>
							
							<li><a href="browse">Find more books ></a></li>
						</ul>
					</section>
				</div>
				<div class="3u" id="sidebar1">
					<section>
						<h2>Purchased</h2>
						<ul class="style1">
<?php
//gets the users completed transactions and returns the titel in the proper style					
mysql_select_db($db_database)
or die("Unable to select database: " . mysql_error());

$getpurchasedquery = ("SELECT * FROM purchased WHERE UserID = '$userID'");
$getpurchased = mysql_query($getpurchasedquery);
if(!$getpurchased) die ("Can't connect to purchased: " .mysql_error());

while ($getpurchasedarray = mysql_fetch_array($getpurchased)){
$purchasedpostnumber = $getpurchasedarray['PostNumber'];
echo "<li>" . $getpurchasedarray['Title'] ." 

<form method = 'post' action = 'deletepurchased.php'><input type = 'hidden' value = '$userID' name = 'userid' > <input type = 'hidden' value = '$purchasedpostnumber' name = 'purchasedpostnumber'><div style='text-align: right; position:relative; top:-15px;'> <input type = 'submit' value = 'Delete' name = 'delete from purchased'> </div></form></li>";

}


?>
							
							<li><a href="browse">Shop for more books ></a></li>
						</ul>
					</section>
				</div>
				<div class="3u" id="sidebar1">
					<section>
						<h2>Wish List</h2>
						<ul class="style1">
<?php
//gets the users wishlist and returns the title in the proper style with options to delete the item. 
$getwishlistquery = ("SELECT * FROM wishlist WHERE UserID = '$userID'");
$getwishlist = mysql_query($getwishlistquery);
if(!$getwishlist) die ("Can't connect to wishlist: " .mysql_error());
while ($getwishlistarray = mysql_fetch_array($getwishlist)){
$isbn = $getwishlistarray['isbn'];
$title = $getwishlistarray['Title'];
echo "<li> " .$getwishlistarray['Title']  . "<form method = 'post' action = 'deletefromwishlist.php' style = 'display:inline'><input type = 'hidden' value = '$userID' name = 
'userid' > <input type = 'hidden' value = '$isbn' name = 'isbn'> <input type = 'hidden' value = '$title' name = 'title'>
<div style='text-align: right; position:relative; top:-15px;'>
<input type = 'submit' value = 'Remove' name = 'delete'></div> </form></li>";
}

?>
							
							<li><a href="add">Add a book ></a></li>
						</ul>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy; 2013 U Sale   |   <a href="about">About Us</a>   |   <a href="privacy">Privacy Policy</a>   |   <a href="terms">Terms of Use</a></p>
	</section>
</div>
</body>
</html>