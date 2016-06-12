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


 $sql = mysql_query("SELECT * FROM admin WHERE id=$aid LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
	if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
			$username = $row["username"];
			$full_name = $row["full_name"];
			$email = $row["email"];
			$contact = $row["contact"];
			$address = $row["address"];
			$last_login_date = $row["last_login_date"];
		
			
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin My Profile</title>
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
			<h4>My Profile<div align="right"><a href="editprofile.php">Edit</a></div></h4><hr/>
			<table border="0">
			<tr><td id="prof">User ID:</td><td id="prof"><?php echo $username; ?></td></tr>
				<tr><td id="prof">Name:</td><td id="prof"><?php echo $full_name; ?></td></tr>
				<tr><td id="prof">Email:</td><td id="prof"><?php echo $email; ?></td></tr>
				<tr><td id="prof">Contact:</td><td id="prof"><?php echo $contact; ?></td></tr>
				<tr><td id="prof">Address:</td><td id="prof"><?php echo $address; ?></td></tr>
				<tr><td id="prof">Last Login:</td><td id="prof"><?php echo $last_login_date; ?></td></tr>
			</table>
			</div><br/>
		</section>
        	<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>