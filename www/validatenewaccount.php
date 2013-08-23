<?php
/*
Validates the user's account based on what they entered on the previous form.
if htey pass they will be added to the database. if not, they will be returned the signup form
and notified or encounterd errors
*/
session_start();
if(isset($_SESSION['email'])) {
die(header('Location: browse.php'));
}
require_once "accessdatabase.php";

$db_server = mysql_connect($db_hostname, $db_username, $db_password);

//ends program if can't connect to server. after a production server is up and running add a user friendly error message
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database)
or die("Unable to select database: " . mysql_error());
$firstname = $lastname = $password = $confirmpassword = $email = $phonenumber = $school = $fail = "";

if(isset($_POST['FirstName']))
	$firstname = mysql_real_escape_string($_POST['FirstName']);
if(isset($_POST['LastName']))
	$lastname = mysql_real_escape_string($_POST['LastName']);
if(isset($_POST['Password']))
	$password = mysql_real_escape_string($_POST['Password']);
if(isset($_POST['ConfirmPassword']))
	$confirmpassword = mysql_real_escape_string($_POST['ConfirmPassword']);
if(isset($_POST['Email']))
	$email = mysql_real_escape_string($_POST['Email']);
if(isset($_POST['PhoneNumber']))
	$phonenumber = mysql_real_escape_string($_POST['PhoneNumber']);
if(isset($_POST['School']))
	$school = mysql_real_escape_string($_POST['School']);

$passwordsecure = hash('sha256', $password);



$fail = validate_firstname($firstname);
$fail .= validate_lastname($lastname);
$fail .= validate_confirmpassword($confirmpassword);
$fail .= validate_password($password);
$fail .= validate_passwordmatch($password, $confirmpassword);
$fail .= validate_email($email);
$fail .= validate_phonenumber($phonenumber);


if ($fail == ""){
	$queryaddtousers = "INSERT INTO user VALUES ('','$firstname$lastname', '$passwordsecure', '$email', '$phonenumber','$school')"; 
if (!mysql_query($queryaddtousers, $db_server))echo ("INSERT failed: $queryaddtousers<br />" . mysql_error());

	header('Location: validateaccountsuccess.php');
}else{
	
}
//add friendlier error when ready for production if can't add to server
function validate_firstname($field){
	if ($field == "") return "Please enter your first name! <br />";
	else return"";
}
function validate_lastname($field){
	if ($field == "") return "Please enter your last name! <br />";
	else return"";
}
function validate_password($field){
	if($field == "") return "Please enter a password! <br />";
	else return "";
}
function validate_confirmpassword($field){
	if($field == "") return "Please enter your password a second time to confirm it <br />";
	else return "";
}
function validate_passwordmatch($field1, $field2){
	if($field1!==$field2) return "The passwords do not match! <br/>";
	else return "";
}
function validate_email($field){
	if($field == "") return "Please enter a .edu email addresss. <br/>";
	if ((strpos($field, ".edu")>0) &&(filter_var($field, FILTER_VALIDATE_EMAIL)))
	{
		$queryemail = "SELECT * FROM user WHERE Email = '$field'";
		$emailresult = mysql_query($queryemail);
		$emailarray = mysql_fetch_array($emailresult);
			if($emailarray['Email'] =="") return"";
			else return "Email address already exists! <br />";
	}
	
	
	else return "The Email address is invalid <br /> Please enter a valid email address ending in .edu";
		
}
function validate_phonenumber($field){
if ($field == "") return "";
elseif (preg_match("/[^0-9]/", $field)) return "Invalid Phone Number. <br />";
elseif (strlen($field)<10) return "Invalid Phone Number. <br>";
else return "";
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Sign Up</title>
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
						<h2>Sign up</h2>
						<?php echo $fail?>
						<form method="POST" action="validatenewaccount.php" >
<table class="signup" border="0" cellpadding="2" cellspacing = "0" >
<th colspan = "2" align = "center">(* indicates required field)<br></th>
<tr><td><br>First Name *</td><td><br><input type = "text" maxlength = "32"
name = "FirstName" value = "<?php echo $firstname?>"/></tr></td>
<tr><td><br>Last Name *</td><td><br><input type = "text" maxlength = "32"
name = "LastName" value = "<?php echo $lastname?>"/></td></tr>
<tr><td><br>Password *</td><td><br><input type = "password" maxlength = "24"
name = "Password" value = "<?php echo $password?>"/></tr></td>
<tr><td><br>Confirm Password *</td><td><br><input type = "password" maxlength = "24"
name = "ConfirmPassword" /></tr></td>
<tr><td><br>Email *<br /> (must end in .edu)</td><td><br><input type = "text" maxlength = "64"
name = "Email" value = "<?php echo $email?>"/></tr></td>
<tr><td><br>Phone Number </td><td><br><input type = "text" maxlength = "10"name = "PhoneNumber"  value = "<?php echo $phonenumber?>"/></td></tr>
<tr><td><br>Select Your School *</td><td><br><select name= "School" /> <option value = "New York Universtiy"/> New York University</option></select> </td></tr>
<tr><br><td colspan = "2" align = "center"><br><br><input type = "submit" value="Sign Up" /></td></tr></table></form><br><br>
By clicking "Signup", you aknowledge that you have read <br>and agree to the <a href = 'terms' target='_blank' class = 'darker'> Terms of Use</a> and <a href = 'privacy' class = 'darker' target='_blank'> Privacy Policy</a>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div id="footer-content-wrapper">
		<div class="5grid-layout">
			<div class="row" id="footer-content">
				<div class="6u" id="box1">
					<section>
						<h2 align = "left"><a href="login">Already have an account? Log In Here!</a></h2>
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