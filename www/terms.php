<?php
//terms of use. php script is used to determine headers based on sessions
session_start();
if(!isset($_SESSION['email']))
{
	echo "<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Terms of Use</title>
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
<title>U Sale | Terms of Use</title>
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
						<h2>Terms of Use</h2>
						<p>The following Terms of Use outline your obligations when using the website, usaleonline.com. Our Privacy Policy outlines our responsibilities towards handling your personal information that you provide to us.  </p>
                        &nbsp;
	<p>YOUR RELATIONSHIP WITH USALEONLINE.COM<br/>
Your use of USALEONLINE.COM’s service and websites (referred to as the “service”) is subject to the following Terms of Use (referred to as “Terms”), which may be updated at the discretion of the website owner without warning to the user.
 </p>
  &nbsp;
	<p>ACCEPTING THE TERMS<br/>
In order to use the Service, you must first agree to the Terms. You may not use the Service if you do not acknowledge that you have read and agree to the Terms. You acknowledge that you accept the terms when you Sign up for an account by entering your personal information on the Sign Up page and click the button titled “Sign Up!” You may not use the service if you are not a student currently enrolled in a University that the Service has registered or you are a person barred from receiving the Service under the laws of the United States or other countries including the country in which you are a resident from which you use the Service.
 </p>
  &nbsp;
	<p>TERMINATION OF SERVICE<br/>
You acknowledge and agree that USALEONLINE.COM may stop (permanently or temporarily) providing the Service to you or other users a the sole discretion of USALEONLINE.COM without warning to the user. You acknowledge and agree that if you account is disabled you may be prevented from accessing the Service or any other content related to your account on the Service. You may stop using the Service at any time. You do not need to notify USALEONLINE.COM if you wish to stop using the Service.

 </p>
  &nbsp;
	<p>USE OF THE SERVICE<br/>
In order to access the Service, you may be required to provide information about yourself as part of the registration process for the Service or as part of your continued use of the Service.  You agree that any registration information you give to USALEONLINE.COM will always be accurate, correct and up to date. You agree to use the Service only for purposes that are permitted by the Terms and any applicable law. You agree not to access (or attempt to access) any of the Services by any means other than through the interface that is provided by USALEONLINE.COM. You agree not to access (or attempt to access) any part of the Service through automated means (including but not limited to the use of scripts, web crawlers, etc.). You agree that you will not engage in any activity that interferes with or disrupts the Service (or any of the servers or networks which are connected to the Service) unless you have been specifically permitted to do so in a separate agreement with USALEONLINE.COM. You agree that you are solely responsible for any breach of your obligations to the Terms and for the consequences. 

 </p>
  &nbsp;
	<p>ACCOUNT INFORMATION<br/>
You are responsible for maintaining the confidentiality of any information associated with your account that you wish to keep confidential. You are fully responsible for any activities on the Service associated with any information pertaining to your account. You agree to immediately notify USALEONLINE.COM of any unauthorized use of your account or any other breach of security and that you exit form you account at the end of each session. USALEONLINE.COM will not be liable for any loss or damages arising from your failure to comply with the Terms. 
 </p>
  &nbsp;
	<p>USER CONTRIBUTIONS AND INTERACTION<br/>	
All user contributions including but not limited to Listings and Forum posts must be done in a manner that is respectful and non abusive to the Service and other users of the Service. You grant USALEONLINE.COM to right to use all user contributions on the Service how they see fit.

 </p>
 &nbsp;
	<p>CONTENT<br/>
All information or content (referred to as “content”) which you may access as part of the Service are the sole responsibility of the person from which the content originated, NOT USALEONLINE.COM. USALEONLINE.COM reserves the right, but shall have no obligation to modify or remove any or all Content from any User or Service. By using the Service you may be exposed to Content that you may find objectionable. Your use of the Service is proved to you at your own risk.

 </p>
 &nbsp;
	<p>ADVERTISERS AND LINKS<br/>
Your correspondence or business dealings with, or participation in promotions of, advertisers found on or through the Service, including payment and delivery of related goods or services, and any other terms, conditions, warranties or representations associated with such dealings, are solely between you and such advertiser. You agree that USALEONLINE.COM shall not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings or as the result of the presence of such advertises on the Service. The Service or third parties may provide links to other web sites or resources. Because USALEONLINE.COM has no control over such sites and resources, you acknowledge and agree that USALEONLINE.COM is not for the availability of such external sites or resources, and does not endorse and is not responsible or liable for any Content, advertising, products, or other materials on or available from such sites or resources. You further acknowledge and agree that USALEONLINE.COM shall not be responsible or liable, directly or indirectly, for any damage or loss caused by or in connection with use of or reliance on any such Content, goods or services available on or through any such site or resource.

 </p>
 &nbsp;
	<p>INTELLECTUAL PROPERTY RIGHTS<br/> 
The Service and any necessary software used in connection with the Service contain proprietary and confidential information that is protected by applicable intellectual property and other laws. You agree not to modify, rent, lease, loan, sell, distribute or create derivative works based on the Service.

 </p>
 &nbsp;
	<p>NO WARRANTIES<br/>
You expressly understand and agree that your use of the services is at your sole risk that that the Service is provided “as is” and “as available”. USALEONLINE.COM do not represent or warrant to you that: Your use of the services will meet your requirements, your use of the services will be uninterrupted, timely, secure, or free form error, any information obtained by you as a result of your use of the services will be accurate and reliable, and that defects in the operation or functionality of any software provided to you as part of the Service will be corrected. Any material downloaded or otherwise obtained through the use of the Service is done at your discretion and risk. You will be solely responsible for any damage to your computer system or other dvice or loss of data that results from the download of any such material. USALEONLINE.COM further expressly disclaims all warranties and conditions of any kind, whether express or implied, including, but not limited to the implied warranties and conditions of merchantability, fitness for a particular purpose and not-infringement. A small percentage of users may experience epileptic seizures when exposed to certain light patterns or backgrounds on a computer screen or while using the service. Certain conditions may induce previously undetected epileptic symptoms even in users who have no history of prior seizures or epilepsy. If you, or anyone in your family have an epileptic condition, consult your physician prior to using the service. Immediately discontinue use of the Service and consult your physician if you experience any of the following symptoms while using the service: dizziness, altered vision, eye or muscle twitches, loss of awareness, disorientation, any involuntary movement, or convulsions.

 </p>
 &nbsp;
	<p>LIMITATION OF LIABILITY<br/>
You expressly understand and agree that USALEONLINE.COM shall not be liable to you for any direct, indirect, incidental, special, consequential, or exemplary damages, including, but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses resulting from the use or the inability to use the Service, the cost of procurement of substitute goods and services resulting from any goods, data, information or services purchased or obtained or transactions entered into through or from the service, unauthorized access to or alteration of your transmissions or data, statements or conduct of any third party on the service, or any other matter relating to the service. USALEONLINE.COM does not, in any meaning of the word, act as a Middleman for any transactions done through the Service. It is merely a means of connection between students to buy and sell goods. 

 </p>
 &nbsp;
	<p>MISCELLANEOUS<br/> 
You agree that there shall be not third-party beneficiaries to this agreement. The Terms constitutes the entire agreement between you and USALEONLINE.COM and governs your use of the Service, superseding any prior agreements between you and USALEONLINE.COM with respect to the service. You may also be subject to additional terms and conditions that may apply when you use the Service, affiliated services, third party content, or third party software. The terms and the relationship between you and USALEONLINE.COM shall be governed by the laws of the state of New York without regard to its conflict of law provisions. You and USALEONLINE.COM agree to submit to the personal and exclusive jurisdiction of the courts located within the county of New York, New York. The failure of USALEONLINE.COM to exercise or enforce any right or provision of the Terms shall not constitute a waiver of such right or provision. If any provision of the Terms is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect the parties’ intentions as reflected in the provision, and the other provisions of the Terms remain in full force and effect.

 </p>
 &nbsp;

					</div>
				</section>
			</div>
		</div>
	</div>
</div>
<div id="copyright" class="5grid-layout">
	<section>
		<p>&copy; 2013 U Sale   |   <a href="about">About Us</a>   |   <a href="privacy">Privacy Policy</a>   |   Terms of Use</p>
	</section>
</div>
</body>
</html>