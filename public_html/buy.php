<?php
//alerts the seller of a users interest in the book
require_once "accessdatabase.php";
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
or die("Unable to select database : " . mysql_error());
$postnumber = "";
session_start();
if(!isset($_SESSION['email']))
{
session_destroy();
die(header('Location: login.php'));
}else{
	$sessionemail = $_SESSION['email'];
	$sessionpassword = $_SESSION['password'];
}
if(isset($_POST['postnumber']))
	$postnumber = ($_POST['postnumber']);
//get the necessary information about the book
$bookdataquery = mysql_query("SELECT*FROM Books WHERE PostNumber = '$postnumber'");
if (!$bookdataquery) die ("Can't Get book data " . mysql_error());
$bookdataarray = mysql_fetch_array($bookdataquery);
$booktitle = $bookdataarray['Title'];
$PosterID = $bookdataarray['PosterID'];

//get the seller data
$sellerdataquery = mysql_query("SELECT * FROM user WHERE UserID = '$PosterID'");
if(!$sellerdataquery) die ("Can't get seller data" . mysql_error());
$sellerdataarray = mysql_fetch_array($sellerdataquery);
$selleremail = $sellerdataarray['Email'];

//get the buyer data (to add to pending transactions
$buyerdataquery = mysql_query("SELECT * FROM user WHERE Email = '$sessionemail'");
if(!$buyerdataquery) die ("Can't get buyer data" .mysql_error());
$buyerdataarray = mysql_fetch_array($buyerdataquery);
$buyername = $buyerdataarray['Name'];
$buyerphonenumber = $buyerdataarray['Phone_Number'];
$buyeruserid = $buyerdataarray['UserID'];







?>


<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Buy</title>
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
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="menu">
						<div id="menu-wrapper">
							<nav class="mobileUI-site-nav">
								<ul>
								 	
									<li><a href="search">Search</a></li>
									<li  class="current_page_item"><a href="browse">Browse</a></li>
									<li><a href="sell">Sell</a></li>
									<li><a href="account">Account</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<div id="page-wrapper" class="5grid-layout">
		<div class="row titlebg">
			<h2>Buy</h2>
		</div>
		<div class="row" id="content">
			<div class="12u">
				<section>
					<div class="post" align = "center">
<?php
//sends an email to the buyer

if(isset($_POST['buy']))
require '/home/usaleo5/public_html/PHPMailer-master/class.phpmailer.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'localhost';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'donotreply@usaleonline.com';                            // SMTP username
$mail->Password = 'yard5@13';                           // SMTP password


$mail->From = 'donotreply@usaleonline.com';
$mail->FromName = 'U Sale';
$mail->AddAddress($selleremail);  // Add a recipient


$mail->WordWrap = 75;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Someone wants to buy your book!';
$mail->Body    = 'A user is interested in your listing of '.$booktitle.'! They can be reached at email: '.$sessionemail.' or phone number: '.$buyerphonenumber.'';
$mail->AltBody = 'A user is interested in your listing of '.$booktitle. 'They can be reached at email: '.$sessionemail.' or phone number: '.$buyerphonenumber.'';;

if(!$mail->Send()) {
   echo 'Something went wrong.';
   //echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{ echo "The seller has been notified of your interest. <a href = 'browse' class='darker'>Search for another book</a>";}
$addtotransactions = mysql_query("INSERT INTO pendingtransactions VALUES ('$buyeruserid','$postnumber','BUYING')");
if(!$addtotransactions) die ("Can't add to transactions " . mysql_error());


?>
					</div>
				</section>
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