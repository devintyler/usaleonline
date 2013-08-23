<?php
session_start();
if(isset($_SESSION['email']))
{
header('Location: browse.php');
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
						
						<form method="POST" action="validatenewaccount.php" >
<table class="signup" border="0" cellpadding="2" cellspacing = "0" >
<th colspan = "2" align = "center">(* indicates required field)<br></th>
<tr><td><br>First Name *</td><td><br><input type = "text" maxlength = "32"
name = "FirstName" /></tr></td>
<tr><td><br>Last Name *</td><td><br><input type = "text" maxlength = "32"
name = "LastName" /></td></tr>
<tr><td><br>Password *</td><td><br><input type = "password" maxlength = "24"
name = "Password" /></tr></td>
<tr><td><br>Confirm Password *</td><td><br><input type = "password" maxlength = "24"
name = "ConfirmPassword" /></tr></td>
<tr><td><br>Email *<br /> (must end in .edu)</td><td><br><input type = "text" maxlength = "64"
name = "Email" /></tr></td>
<tr><td><br>Phone Number </td><td><br><input type = "text" maxlength = "10"name = "PhoneNumber"  /></td></tr>
<tr><td><br>Select Your School *</td><td><br><select name= "School" /> <option> New York University</option></select> </td></tr>
<tr><br><td colspan = "2" align = "center"><br><br><input type = "submit" value="Sign Up" /></td></tr></table></form><br><br>
By clicking "Signup", you aknowledge that you have read <br>and agree to the <a href = 'terms' class = 'darker' target='_blank'> Terms of Use</a> and <a href = 'privacy' class = 'darker' target='_blank'> Privacy Policy</a>
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