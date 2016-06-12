<?php
	session_start();
	include("../include/connect.php");
	if (!isset($_SESSION["id"])) {
		header("location:../ulogin.php");
		exit();
	}
	$aid = $_SESSION["id"];
	$wid = $_GET["wishid"];
	$user = $_SESSION["username"];
	
	$check = mysql_query("SELECT uid FROM wishlist where uid='$aid' AND pid='$wid'");
	$productCount = mysql_num_rows($check);
	if($productCount>0){
		header("Location:prompt.php?x=6");
		exit();
	}
	// otherwise the item is unique i.e user hasn't added to the wishlist so add it to the wishlist
		$sql = mysql_query("INSERT INTO wishlist (uid,user_id, wish_id,pid)VALUES('$aid','$user','1','$wid')") or die (mysql_error());
	


	//redirecting to the profile page upon successful completion of the updation of profile
	header("Location:wishlist.php");
	

?>