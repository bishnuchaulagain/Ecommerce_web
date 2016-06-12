<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: alogin.php");
    exit();
}
	$aid = $_SESSION["id"];
		 $_SESSION["username"];
		$_SESSION["password"] ;
include("../include/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin View All Users</title>
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
			<div id="generalform" >
			<h4>Registered User Details<div align="right"></div></h4><hr/>
			<table>
				<tr><td><h4>User_ID</h4></td><td><h4>Full Name</h4></td><td><h4>Email</h4></td><td><h4>Contact</h4></td></tr>
						<?php 
			$sql = mysql_query("SELECT * FROM user ");
			$productCount = mysql_num_rows($sql); // count the output amount
			if ($productCount > 0) {
				while($row = mysql_fetch_array($sql)){ 
					$username = $row["user_id"];
					$full_name = $row["full_name"];
					$email = $row["email"];
					$contact = $row["contact"];
					
					echo "<tr><td><b>$username</b></td><td><b>$full_name </b></td><td><b>$email</b></td><td><b>$contact</b></td></tr>";
							
					
				}
			}
		?>
			</table>
		</div><br/>
		</section>
        	<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>