<?php
session_start();
include("include/connect.php");
$x = $_GET['x'];
function createMessage($x){
	//Process only if x is integer and this also prevents from sql injection and other hacking
	if(is_numeric($x)){
		switch($x){
			case 0:
				$message = "Your account is now active. You may proceed to <a href=\"ulogin.php\">Login!</a>";
				break;
			case 1:
				$message = "Your account is now ready. You may proceed to <a href=\"ulogin.php\">Login!</a>";
				break;
			case 2:
				$message = "This email address or user id is already registered.";
				break;
			case 3:
				$message = "Sorry but that item has already been traded.";
				break;
			case 4:
				$message = "Item updated successfully.";
				break;
			case 5:
				$message = "Item deleted successfully.";
				break;
			case 6:
				$message = "Sorry you have already added this item to the wishlist.<a href=\"uindex.php\">Click here to go back.</a>";
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
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/prompt.css">
	</head>
<body>
	<div id="wrapper">
		       <?php include ("include/menu.txt"); ?>
                       <?php include ("include/category.txt"); ?>
		<div id="outer">
			<div id="inner">
				<?php createMessage($x);?>
			</div>
		</div>
			<?php include("include/footer.txt");?>
	</div>
</body>
</html>