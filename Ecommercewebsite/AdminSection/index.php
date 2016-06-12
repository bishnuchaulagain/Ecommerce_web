<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: alogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/forms.css">
	<link rel="stylesheet" href="../css/account.css">
</head>
<body>
	<div id="wrapper">
                          <?php include ("../include/Admin/menu.txt"); ?>
                          <?php include ("../include/category.txt"); ?>
		<aside id="left_side">
                       <div id="generalform1">
			<h4>Menu</h4>
				<?php include ("../include/Admin/lmenus.txt"); ?>
			</div>
		</aside>
		
		<section id="right_side">
			<div id="inner" class="container" >
				welcome admin . What would you like to to today?
                                <ol>
                                    <li><a href="additem.php">Add new items to store</a></li>
                                    <li><a href="update.php">Update details of the products</a></li>
                                    <li><a href="viewitems.php">View all the products</a></li>
									<li><a href="aprofile.php">View your profile</a></li>
									<li><a href="editprofile.php">Edit your profile</a></li>
									<li><a href="viewusers.php">Customer's Information</a></li>
                                </ol>

			</div>
				

		</section>
		<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>