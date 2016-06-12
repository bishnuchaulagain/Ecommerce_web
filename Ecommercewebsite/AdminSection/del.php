<?php
session_start();
include("../include/connect.php");
$x = $_GET['yesdelete'];

	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
	$sql = mysql_query("DELETE FROM product WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
    $pictodelete = ("../product_images/$id_to_delete.jpg");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: update.php"); 
    exit();
