<?php
	session_start();
	include("../include/connect.php");
	if (!isset($_SESSION["id"])) {
		header("location: alogin.php");
		exit();
	}
	$aid = $_SESSION["id"];
	//echo $aid;
	
	//getting the changed value from editprofile page for updating the database
	$userid = $_POST["username"];
	$name = $_POST["title"];
	$email = $_POST["email"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];
	//sql code for updating the database
	$sql = mysql_query("UPDATE admin SET username= '$userid', full_name= '$name' , email='$email', contact=$contact, address='$address' where id=$aid;  ") or die (mysql_error());
	
	//redirecting to the profile page upon successful completion of the updation of profile
	header("Location:aprofile.php");
	

?>