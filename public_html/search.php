<?php
/*
A form that prompts the user to do an advanced search. Here the user can enter
specific things that they know about the book for a more specific search
*/
session_start();
if(!isset($_SESSION['email']))
{
echo "<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Search</title>
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
								 	
									<li class='current_page_item'><a href='search'>Search</a></li>
									<li><a href='browse'>Browse</a></li>
									<li><a href='sell'>Sell</a></li>
									<li><a href='account'>Account</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div><br><br>";
}else{
$sessionemail = $_SESSION['email'];
echo"<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Search</title>
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
								 	
									<li class = 'current_page_item'><a href='search'>Search</a></li>
									<li><a href='browse'>Browse</a></li>
									<li><a href='sell'>Sell</a></li>
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
			<h2>Advanced Search</h2>
			
			



		</div>
		<div class="row" id="content">
			<div class="12u">
				<section>
					<div class="post"><br>
						
						
						
						
						
						<p>Title</p>
						<form method="post" action="searchresults.php"> 
<table cellpadding="0px" cellspacing="0px"> 
<tr> 
<td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px;">
<input type="text" name="title" style="width:400px; border:0px solid; height: 40px; padding:0px 2px; position:relative; font-family: 'Abel', sans-serif; font-size: 17pt;"> 
</td>
<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 

</td>
</tr>
</table>



<br>

<p>Author</p>

<table cellpadding="0px" cellspacing="0px"> 
<tr> 
<td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px;">
<input type="text" name="author" style="width:400px; border:0px solid; height: 40px; padding:0px 2px; position:relative; font-family: 'Abel', sans-serif; font-size: 17pt;"> 
</td>
<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 

</td>
</tr>
</table>



<br>
<p>ISBN</p>



<table cellpadding="0px" cellspacing="0px"> 
<tr> 
<td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px;">
<input type="text" name="isbn" style="width:400px; border:0px solid; height: 40px; padding:0px 2px; position:relative; font-family: 'Abel', sans-serif; font-size: 17pt;"> 
</td>
<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 

</td>
</tr>
</table>



<br>
<p>Course</p>


<table cellpadding="0px" cellspacing="0px"> 
<tr> 
<td style="border-style:solid none solid solid;border-color:#4B7B9F;border-width:1px;">
<input type="text" name="course" style="width:400px; border:0px solid; height: 40px; padding:0px 2px; position:relative; font-family: 'Abel', sans-serif; font-size: 17pt;"> 
</td>
<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 

</td>
</tr>
</table>

						
						
						<br><br>
						<td style="border-style:solid;border-color:#4B7B9F;border-width:1px;"> 
<input type="submit" value="" style="border-style: solid; border-color:#4B7B9F;border-width:1px; background: url('images/searchbutton2.png') no-repeat; width: 100px; height: 40px;">
</form>
</td>

						
						
					</div>
				</section>
			</div>
		</div>
</div></div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy; 2013 U Sale   |   <a href="about">About Us</a>   |   <a href="privacy">Privacy Policy</a>   |   <a href="terms">Terms of Use</a></p>
	</section>
</div>

</body>
</html>