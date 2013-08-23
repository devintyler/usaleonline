<?php
//gives the user a form to sell a book. Although the user does not have to enter
//all criteria, they must enter at least 1 or an error will return on validation.

//header check
session_start();
if(!isset($_SESSION['email']))
{
	echo "<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Sell</title>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<meta name='description' content='' />
<meta name='keywords' content='' />
<noscript>
<link rel='stylesheet' href='css/5grid/core.css' />
<link rel='stylesheet' href='css/5grid/core-desktop.css' />
<link rel='stylesheet' href='css/5grid/core-1200px.css' />
<link rel='stylesheet' href='css/5grid/core-noscript.css' />
<link rel='stylesheet' href='css/style.css' />
<link rel='stylesheet' href='css/style-desktop.css' />
</noscript>
<script src='css/5grid/jquery.js'></script>
<script src='css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.openerWidth=52'></script>
<!--[if IE 9]><link rel='stylesheet' href='css/style-ie9.css' /><![endif]-->
</head><body class='twocolumn2'>
<div id='wrapper'>
	<div id='header-wrapper'>
		<header id='header'>
			<div class='5grid-layout'>
				<div class='row'>
					<div class='12u' id='logo'> <!-- Logo -->
						<h1><a href='.'><img src = 'images/logo.png'></a></h1>
						<p><a href='login'>Login</a> / <a href='signup'>Sign Up</a></p>
					</div>
				</div>
			</div>
			<div class='5grid-layout'>
				<div class='row'>
					<div class='12u' id='menu'>
						<div id='menu-wrapper'>
							<nav class='mobileUI-site-nav'>
								<ul>
								 	
									<li><a href='search'>Search</a></li>
									<li><a href='browse'>Browse</a></li>
									<li class='current_page_item'><a href='sell'>Sell</a></li>
									<li><a href='account'>Account</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>";

}else{
	$sessionemail = $_SESSION['email'];
	$sessionpassword = $_SESSION['password'];
echo "<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Sell</title>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<meta name='description' content='' />
<meta name='keywords' content='' />
<noscript>
<link rel='stylesheet' href='css/5grid/core.css' />
<link rel='stylesheet' href='css/5grid/core-desktop.css' />
<link rel='stylesheet' href='css/5grid/core-1200px.css' />
<link rel='stylesheet' href='css/5grid/core-noscript.css' />
<link rel='stylesheet' href='css/style.css' />
<link rel='stylesheet' href='css/style-desktop.css' />
</noscript>
<script src='css/5grid/jquery.js'></script>
<script src='css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.openerWidth=52'></script>
<!--[if IE 9]><link rel='stylesheet' href='css/style-ie9.css' /><![endif]-->
</head><body class='onecolumn'>
<div id='wrapper'>
	<div id='header-wrapper'>
		<header id='header'>
			<div class='5grid-layout'>
				<div class='row'>
					<div class='12u' id='logo'> <!-- Logo -->
						<h1><a href='.'><img src = 'images/logo.png'></a></h1>
						<p><a href='logout'>Log Out</a>
					</div>
				</div>
			</div>
			<div class='5grid-layout'>
				<div class='row'>
					<div class='12u' id='menu'>
						<div id='menu-wrapper'>
							<nav class='mobileUI-site-nav'>
								<ul>
								 	
									<li><a href='search'>Search</a></li>
									<li><a href='browse'>Browse</a></li>
									<li class='current_page_item'><a href='sell'>Sell</a></li>
									<li><a href='account'>Account</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>";
}
?>
	<div id="page-wrapper" class="5grid-layout">
		<div class="row titlebg">
			<h2>Sell</h2>
		</div>
		<div class="row" id="content">
			<div class="12u">
				<section>
					<div class="post" align = "center">
						<h2>Sell A Book</h2>
						
						<form method="POST" action="addbook.php" >
<table class="signup" border="0" cellpadding="2" cellspacing = "0" >
<th colspan = "2" align = "center"></th>
<tr><td><br>Title   </td><td><br><input type = "text" maxlength = "32"
name = "Title" /></tr></td>
<tr><td><br>Author</td><td><br><input type = "text" maxlength = "32"
name = "Author" /></td></tr>
<tr><td><br>Course</td><td><br><input type = "text" maxlength = "32"
name = "Course" /></tr></td>
<tr><td><br>Year</td><td><br><input type = "text" maxlength = "4"
name = "Year" /></tr></td>
<tr><td><br>ISBN</td><td><br><input type = "text" maxlength = "13"
name = "ISBN" /></tr></td>
<tr><td><br>Price</td><td><br><input type = "text" maxlength = "32"
name = "Price" /></tr></td>



<tr><td><br>Condition &nbsp;<a href='conditionguide.html' class='darker' target='_blank'>(?)</a>&nbsp;&nbsp;&nbsp;</td><td><br><select name= "Condition" /> <option>- choose one -</option><option>Brand New</option><option>Used - Excellent</option><option>Used - Good</option><option>Used - Decent</option><option>Used - Poor</option></select> </td></tr>
<tr><br><td colspan = "2" align = "center"><br><input type = "submit" value="Post Listing" /></td></tr></table></form>
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