<?php
	include("../includes/functions.php");
	session_start();
	destroySession();
	redirect_to("login.php");
	
?>