<?php
	
	session_start(); 	
	
	unset($_SESSION['adminName']);
	 
	header("Location:adminLog.html");
	
	exit；

?>