<?php 
 // Connects to my Database 
 	$server = "localhost";
 	$username = "root";
 	$password = "";
 	$db = "tracking";
 	$conn = mysqli_connect($server, $username, $password, $db);
 	mysqli_select_db($conn,"tracking"); //set the database name


 	//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

	$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
	$tbl_members = $tbl_prefix."members";
	$tbl_attempts = $tbl_prefix."loginAttempts";


 ?>
