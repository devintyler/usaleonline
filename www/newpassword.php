<?php
/*
This form validates a user's new password and if there are any errors
will return the form notifying hte user of the errors. If not, it queries
the data base to change and encrypt the user's new password
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
						<p><a href="login">Login</a> / <a href="signup.php">Sign Up</a></p>
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

$newpassword = $confirmnewpassword = $email = "";
if(isset($_POST['newpassword']))
$newpassword = ($_POST['newpassword']);
if(isset($_POST['confirmnewpassword']))
$confirmnewpassword = ($_POST['confirmnewpassword']);
if(isset($_POST['email']))
$email = mysql_real_escape_string($_POST['email']);

//$fail = validate_email($email);
$fail = validate_password($newpassword);
$fail .= validate_confirmpassword($confirmnewpassword);
$fail .= validate_passwordmatch($newpassword, $confirmnewpassword);

if($fail == "")
{
	//changes user's password
	$newpasswordencrypt = mysql_real_escape_string(hash('sha256', $newpassword));
	$queryupdatepassword = mysql_query("UPDATE user SET Password ='$newpasswordencrypt' WHERE Email = '$email'");
	if(!$queryupdatepassword) die ("can't access database :" . mysql_error());
	else echo("Password Successfully Reset! <a href = 'login'>Login</a>");

}else {
echo "
						
<br><br>$fail<br> 

<form method = 'POST' action = 'newpassword.php'>
<table class = 'resetpassword' border = 0 cellpadding = '2'>
<tr><td>New Password  </td><td><input type = 'password' maxlength = '32' name = 'newpassword'  /></td></tr>
<tr><td>Confirm New Password &nbsp;&nbsp;&nbsp; </td><td><input type = 'password' maxlength = '32' name = 'confirmnewpassword' /><br><br></td></tr>
</table>
<tr><td colspan = '1' align = 'center'><input type = 'Submit' name = 'Submit' value = 'Submit' /></td></form></tr>
</table>
</form>
";
}

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
<?php
function validate_password($field){
	if($field == "") return "Please enter a password! <br />";
	else return "";
}
function validate_confirmpassword($field){
	if($field == "") return "Please enter your password a second time to confirm it <br />";
	else return "";
}
function validate_passwordmatch($field1, $field2){
	if($field1!=$field2) return "The passwords do not match! <br/>";
	else return "";
}
?>
