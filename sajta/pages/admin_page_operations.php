<?php
	session_start();
	header("refresh:1; url=" . $_SESSION['previous_page']); 
	include("../libs/admin.php");
	include("../libs/debug.php");
    
	if ($_GET['mode'] == "login")
		login($_POST["login"], $_POST["password"]);
	if ($_GET['mode'] == "logout")
		logout();		
?>

Za chwile zostaniesz przekierowany.
