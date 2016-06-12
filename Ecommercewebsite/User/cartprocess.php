<?php
	session_start();
	include("../include/connect.php");
	if (!isset($_SESSION["id"])) {
		header("location:../ulogin.php");
		exit();
	}
	echo $_POST["pid"];
	//echo $aid;
	
	//getting the changed value from editprofile page for updating the database

	//$sql = mysql_query("UPDATE user SET user_id= '$userid', full_name= '$name' , email='$email', contact=$contact, address='$address' where id=$aid;  ") or die (mysql_error());
	
	//redirecting to the profile page upon successful completion of the updation of profile
	//header("Location:cart.php");
	

?>