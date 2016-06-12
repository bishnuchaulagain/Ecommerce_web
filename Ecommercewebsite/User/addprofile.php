<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:../alogin.php");
    exit();
}
	$aid = $_SESSION["id"];
		 $_SESSION["username"];
		$_SESSION["password"] ;
include("../include/connect.php");

//validating the name, contact and password
if(isset($_POST["fullname"]) && isset($_POST["contact"]) && isset($_POST["address"])){
	$fullname = preg_replace('#[^A-Za-z]#i', '', $_POST["fullname"]); // filter everything but numbers and letters
	$contact = preg_replace('#[^0-9]#i', '', $_POST["contact"]); // filters only the number
	$address = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["address"]); // filter everything but numbers and letters
	
	// adding details to the database
	$sql = mysql_query("UPDATE user SET full_name= '$fullname' ,  contact='$contact', address='$address', profile_added='1' where id=$aid;  ") or die (mysql_error());
	
	//redirecting to the profile page upon successful completion of the updation of profile
	header("Location:uprofile.php");
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Add Profile</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/forms.css">
	<link rel="stylesheet" href="../css/account.css">
</head>
<body>
	<div id="wrapper">
                          <?php include ("../include/umenu.txt"); ?>
                          <?php include ("../include/categoryuser.txt"); ?>
		<aside id="left_side">
                       <div id="generalform1">
				<h4>Menu</h4>
			<?php include ("../include/sidemenu.txt"); ?>
		     </div>

		</aside>
		
		<section id="right_side">
					<form id="generalform"  enctype="multipart/form-data" class="container" method="post" action="addprofile.php">
				<h4>Add Details for Profile</h4><hr><br/>
				
				<div class="field">
					<label for="title">Full Name:</label>
					<input type="text" class="input" id="title" name="fullname" />
					<p class="hint">Enter your full name.</p>
				</div>
				<div class="field">
					<label for="contact">Contact:</label>
					<input type="text" class="input" id="subtitle" name="contact" />
					<p class="hint">Contact should contain only number.</p>
					
				</div>
 				<div class="field">
					<label for="Address">Address:</label>
				        <textarea rows="8" cols="5" class="input" id="description" name="address" maxlength="5000"></textarea>
						<p class="hint">Enter your address</p>
					
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Add Detail"/><br/><br/>
				</form><br/>
		</section>
        	<?php include("../include/footer.txt");?>
	</div>
</body>
</html>