<?php
session_start();
//checks to be sure the user is logged in
if(!isset($_SESSION['email'])) {
session_destroy();
die(header('Location: login.php'));
}else{
$sessionemail = ($_SESSION['email']);
}
if ($_SESSION['postlimit'] == 10) die(header('Location: addfail.php'));
require_once "accessdatabase.php";
$_SESSION['postlimit']++;
$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if(!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
or die("Unable to select database : " . mysql_error());
$isbn = $title = $author = $class = $school = $price = $posterid = "";
//gets the necessary variables
if(isset($_POST['ISBN']))
	$isbn = mysql_real_escape_string($_POST['ISBN']);
if(isset($_POST['Title']))
	$title = mysql_real_escape_string($_POST['Title']);
if(isset($_POST['Author']))
	$author = mysql_real_escape_string($_POST['Author']);
if(isset($_POST['Course']))
	$class = mysql_real_escape_string($_POST['Course']);
if(isset($_POST['Price']))
	$price = mysql_real_escape_string($_POST['Price']);
if(isset($_POST['Condition']))
	$condition = ($_POST['Condition']);
if(isset($_POST['Year']))
	$year = mysql_real_escape_string($_POST['Year']);


//gets the user id for use in future queries
$posteridquery = mysql_query("SELECT UserID FROM user WHERE email = '$sessionemail'");
$posteridarray = mysql_fetch_array($posteridquery);	
$posterid = $posteridarray['UserID'];

$error = validate_all($isbn, $title, $author, $class);
$error .= validate_price($price);
$error .= validate_isbn($isbn);
//if (($isbn == "")&&($title == "")&&($author=="")&&($class =="")&&($price=="")) echo "Enter at least 1 value!";
if($error == ""){
	//check to see if this is part of anyone's wishlist and if it is then send them an email
$querywishlist = mysql_query("SELECT * FROM wishlist WHERE MATCH (isbn, Title) AGAINST ('$isbn $title')");
if(!$querywishlist) die("Can't get wishlist " . mysql_error());
while($wishlistarray = mysql_fetch_array($querywishlist))
{
	$wishlistemail = $wishlistarray['Email'];
	$wishlisttitle = $wishlistarray['Title'];
	
require '/home/usaleo5/public_html/PHPMailer-master/class.phpmailer.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'localhost';  // Specify main and backup server
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'donotreply@usaleonline.com';                            // SMTP username
$mail->Password = 'yard5@13';                           // SMTP password


$mail->From = 'donotreply@usaleonline.com';
$mail->FromName = 'U Sale';
$mail->AddAddress($wishlistemail);  // Add a recipient


$mail->WordWrap = 75;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'A book on your Wishlist has been posted!';
$mail->Body    = 'A user has posted a listing of ' .$wishlisttitle. ' at '.$price. ' dollars! They can be reached at email: '.$sessionemail;
$mail->AltBody = 'A user has posted a listing of ' .$wishlisttitle. ' at '.$price. ' dollars! They can be reached at email: '.$sessionemail;

if(!$mail->Send()) 
   echo 'Something went wrong.';
   //echo 'Mailer Error: ' . $mail->ErrorInfo;
}
//insert the listing into the books database
$querysell = mysql_query("INSERT INTO Books VALUES ('$isbn','$title','$author','$class','','$price','$condition','$year','$posterid','')");
if(!$querysell) die ("INSERT failed: " .mysql_error());

}else{ 
}
$getpostnumber = mysql_query("SELECT * FROM Books WHERE isbn = '$isbn' AND Title = '$title' AND PosterID = '$posterid'");
if(!$getpostnumber) die ("Cant get info ". mysql_error());
$postarray = mysql_fetch_array($getpostnumber);
$postnumber = $postarray['PostNumber'];
$getuserid = mysql_query("SELECT * FROM user WHERE Email = '$sessionemail'");
if(!$getuserid) die ("Can't get userid " .mysql_error());
$userarray = mysql_fetch_array($getuserid);
$userid = $userarray['UserID'];
//add it to the users pending transactions
$addtransaction = mysql_query("INSERT INTO pendingtransactions VALUES ('$userid','$postnumber','Selling')");
if(!$addtransaction) die ("Can't add transaction " . mysql_error());

header('Location: browse.php');
?>


<!DOCTYPE HTML>
<html>
<head>
<title>U Sale | Sell</title>
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
									<li><a href="browse">Browse</a></li>
									<li class="current_page_item"><a href="sell">Sell</a></li>
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
			<h2>Sell</h2>
		</div>
		<div class="row" id="content">
			<div class="12u">
				<section>
					<div class="post" align = "center">
						<h2>Sell A Book</h2>
						<?php echo $error; ?>
						<form method="POST" action="addbook.php" >
<table class="signup" border="0" cellpadding="2" cellspacing = "0" >
<th colspan = "2" align = "center"></th>
<tr><td><br>Title   </td><td><br><input type = "text" maxlength = "32"
name = "Title" value = "<?php echo $title ?>"/></tr></td>
<tr><td><br>Author</td><td><br><input type = "text" maxlength = "32"
name = "Author" value = "<?php echo $author ?>"/></td></tr>
<tr><td><br>Course</td><td><br><input type = "text" maxlength = "32"
name = "Course" value = "<?php echo $price ?>"/></tr></td>
<tr><td><br>Year</td><td><br><input type = "text" maxlength = "4"
name = "Year" value = "<?php echo $year ?>"/></tr></td>
<tr><td><br>ISBN</td><td><br><input type = "text" maxlength = "13"
name = "ISBN" value = "<?php echo $isbn ?>"/></tr></td>
<tr><td><br>Price</td><td><br><input type = "text" maxlength = "6"
name = "Price" value = "<?php echo $price ?>"/></tr></td>



<tr><td><br>Condition &nbsp;&nbsp;&nbsp;</td><td><br><select name= "School" /> <option value = "">- choose one -</option><option value = "Brand New">Brand New</option><option value = "Used - Excellent">Used - Excellent</option><option value = "Used - Good">Used - Good</option><option value = "Used - Decent">Used - Decent</option><option value = "Used - Poor">Used - Poor</option></select> </td></tr>
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
<?php
//validation functions
function validate_isbn($field){
if ($field == "") return "";
if (preg_match("/[^0-9{13}]/", $field)) return "Invalid ISBN number. <br />";
if (strlen($field)<13) return "Invalid ISBN Number. <br />";
else return "";
}
function validate_price($field){
	if ($field =="") return "Please enter a price for your book <br />";
	if (preg_match("/[^0-9]/", $field)) return "Invalid Price <br />";
	else return"";
}

function validate_all($field1, $field2, $field3, $field4){
if (($field1 == "")&&($field2 == "")&&($field3 == "")&&($field4 == "")) return "Enter at least 1 value besides price!<br />";
else return ""; 
}
?>