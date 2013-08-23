<?php
/*
This page validates the user's temporary password to be sure that it matches the email
they entered so that they can change the given temporary password to a permanent custom one.
If it is incorrect, they will be directed to enter the temporary password again.
If it is correct the will be returned a form to create a new password.
*/
session_start();
if(isset($_SESSION['email'])) {
die(header('Location: browse.php'));
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Reset Password</title>
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
<script src="css/5grid/init.js?use=mobile,desktop,1000px&mobileUI=1&mobileUI.theme=none&mobileUI.openerWidth=52"></script>
<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
</head><body class="onecolumn">
<div id="wrapper">
	<div id="header-wrapper">
		<header id="header">
			<div class="5grid-layout">
				<div class="row">
					<div class="12u" id="logo"> <!-- Logo -->
						<h1><a href="."><img src = "../images/logo.png"></a></h1>
						<p><a href="login">Login</a> / <a href="signup">Sign Up</a></p>
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
		<div class="row titlebg">
			<h2>Account</h2>
		</div>
		<div class="row" id="content">
			<div class="12u">
				<section>
					<div class="post" align = "center">
						<h2>Reset Password</h2>
                        <?php
require_once "accessdatabase.php";
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database)
or die("Unable to select database: " . mysql_error());

$email = $password="";
if(isset($_POST['email']))
$email = mysql_real_escape_string($_POST ['email']);
if(isset($_POST['password']))
$password = mysql_real_escape_string($_POST['password']);

$passwordcheck = hash('sha256', $password);


$queryuser = "SELECT * FROM user WHERE Email = '$email' AND Password = '$passwordcheck'";
if(!$queryuser) die ("Couldn't get email: ". mysql_error());
$userresult = mysql_query($queryuser);	
$userarray = mysql_fetch_array($userresult);

if($userarray['Password'] == "") 
{
	echo ("Your Email or Password is incorrect. Please <a hfref = 'resetpassword'> Try Again </a>");
}
else 
echo "
						Enter your new Password
<br><br><br> 

<form method = 'POST' action = 'newpassword.php'>
<table class = 'resetpassword' border = 0 cellpadding = '2'>
<tr><td>New Password  </td><td><input type = 'password' maxlength = '32' name = 'newpassword'  /></td></tr>
<tr><td>Confirm New Password &nbsp;&nbsp;&nbsp; </td><td><input type = 'password' maxlength = '32' name = 'confirmnewpassword' /><br><br></td></tr>
</table>
<tr><td colspan = '1' align = 'center'><input type = 'hidden' value = '$email' name = 'email'/><input type = 'Submit' name = 'Submit' value = 'Submit' /></td></form></tr>
</table>
</form>
";

?>


					</div>
				</section>
			</div>
		</div>
	</div>
	
</div>
<div id='copyright' class='5grid-layout'>
	<section>
		<p>&copy; 2013 U Sale   |   <a href="about">About Us</a>   |   <a href="privacy">Privacy Policy</a>   |   <a href="terms">Terms of Use</a></p>
	</section>
</div>
</body>
</html>

						
	