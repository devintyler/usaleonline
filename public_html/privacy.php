<?php
//terms of use. php script is used to determine headers based on sessions
session_start();
if(!isset($_SESSION['email']))
{
	echo "<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Privacy Policy</title>
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

}else{
	$sessionemail = $_SESSION['email'];
	$sessionpassword = $_SESSION['password'];
echo "<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Privacy Policy</title>
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
			<h2>Legal</h2>
		</div>
		<div class="row" id="content">
			<div class="12u">
				<section>
					<div class="post">
						<h2>Privacy Policy</h2>
						<p>USALEONLINE.COM is maintained by USALEONLINE.COM and all information is stored on the servers of a trusted webhost. Protecting your information is important to us. The purpose of this document is to inform you of how we use your information. The policy may change, so please check back frequently.</p>
                        &nbsp;
                        <p>SCOPE OF THE PRIVACY POLICY<br/>
This privacy policy applies only to the collection and use of information collected online at USALEONLINE.COM. Other websites affiliated with USALEONLINE.COM may have different privacy policies.
</p>
                        &nbsp;
                        <p>INFORMATION<br/>
We may collect your personal information when you visit USALEONLINE.COM. Personal information is not collected unless you provide it to us. When using the features of this site such as buying a book, selling a book, etc. We may ask you to provide certain information including but not limited to: a name, email address, school and phone number. If you are at a part of the site that requires your personal information it will be clear to you. We may also collect information provided to us by your web browser including but not limited to: what browser your using, the site you’ve visited previous to this site, search terms entered, and your internet protocol (IP) address. 
</p>
                        &nbsp;
                        <p>USE OF YOUR INFORMATION<br/>
Information we collect from you may be used in a variety of different ways on USALEONLINE.COM and is used to better serve our customers. History of your browsing, purchases, and completed/pending transactions will be kept by our web admins and used to better our services, and for you to easier keep track of your use of the site. Should you chose, your personal information will be collected and used in peer to peer transactions. Your name, email address, and phone number will be sent to a potential seller so that they can get in contact with you to buy their item. Your email address will be sent to a user who has a book you posted on their “Wishlist” so that they can easily get in contact with you. These features of the site require you to provide your personal information and upon giving your personal information, you agree to have it be used in this manner.
</p>
                        &nbsp;
                        <p>COOKIES<br/>
A “cookie” is a small data file that a website can send to your browser, which may be then stored on your system. We use cookies for uses such as session storing to better your experience when you return to the site. Use of cookies is entirely optional and all features of the site can be accessed without the use of cookies.  USALEONLINE.COM, however, will provide no warning when a cookie will be used. Depending on your web browser, you may be notified when a cookie is about to be used. 
</p>
                        &nbsp;
                        <p>PROTECTING YOUR PERSONAL INFORMATION<br/>
USALEONLINE.COM does not guarantee that unauthorized access will never occur. However, USALEONLINE.COM and the trusted webhost, take care in maintain the security of your information and any unauthorized access to it. 
</p>
                        &nbsp;
                        <p>LINKS TO OTHER WEBSITES<br/>
Parts of our site may contain links to our subsidiaries, affiliates, and/or third party websites for your convenience and information. If you use these links, you will leave USALEONLINE.COM when you access these other sites even ones that may contain branding related to USALEONLINE.COM. Understand that we do not control the content and are not responsible for the privacy practices of that website. Please carefully review the privacy practices of each website you visit. This Privacy Statement does not cover the information practices of those websites linked to our site. Other sites may send their own cookies to users, collect data, or solicit personal information.
</p>
                        &nbsp;
                        <p>CHANGES TO THE STATEMENT<br/>
USALEONLINE.COM reserves the right to change this Privacy Statement at any time without warning to the user and any such changes will be posted to this Privacy Statement
</p>
                        &nbsp;
                        <p>APPLICABLE LAWS<br/>
USALEONLINE.COM will protect your personal information in according with the laws of the United States and the state of New York.
.</p>
                        &nbsp;
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy; 2013 U Sale   |   <a href="about">About Us</a>   |   Privacy Policy   |   <a href="terms">Terms of Use</a></p>
	</section>
</div>
</body>
</html>