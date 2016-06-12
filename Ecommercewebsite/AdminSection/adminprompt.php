<?php
session_start();
include("../include/connect.php");
$x = $_GET['x'];
function createMessage($x){
	//Process only if x is integer and this also prevents from sql injection and other hacking
	if(is_numeric($x)){
		switch($x){
			case 0:
				$message = "You've successfully added a new item.<br> To add more new item  <a href=\"additem.php\">Click here!</a><br>To view the products<a href=\"viewitems.php\">Click here</a><br>To update items <a href=\"update.php\">Click here</a>";
				break;
			case 1:
				$message = "Sorry you try to add duplicate item <a href=\"additem.php\">Click here to go back!</a>";
				break;
			case 2:

				$z=$_COOKIE['productID'];
				$message = "Please confirm your deletion of the product. Yes to remove the product and No not to remove the product form store.<a href=\"del.php?yesdelete=$z\">Yes </a>| <a href=\"update.php\">No</a><br/>Be sure to perform this task within 10 seconds ";
				$tim = time();
				break;
			case 3:
				$message = "Item updated successfully.";
				header("location:viewitems.php");
				break;
			case 4:
				$message = "Sorry that item doesn't exist.<a href=\"update.php\">Click here to go back</a>";
				break;
			case 6:
				$message = "Message has been sent!";
				break;
			case 7:
				$message = "That is not your item.";
				break;
		}
		echo $message;

	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Prompt</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/prompt.css">
	</head>
<body>
	<div id="wrapper">
		      <hr color="blue"/> <?php //include ("../include/Admin/menu.txt"); ?>
                       <?php //include ("../include/category.txt"); ?>
		<div id="outer">
			<div id="inner" align="left">
				<?php createMessage($x);?><br/><br/><br/><br/><br/><br/>
			</div>
		</div>
			<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>