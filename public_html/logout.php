<?php
//ends the user's session and logs them out
session_start();

unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['postlimit']); 
session_destroy();
header("Location: browse");
?>
