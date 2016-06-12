<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:../alogin.php");
    exit();
}
	$aid = $_SESSION["id"];
$user = $_SESSION["username"];
include("../include/connect.php");


 $sql = mysql_query("SELECT * FROM user WHERE id=$aid LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
	if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
			
			$username = $row["user_id"];
			$full_name = $row["full_name"];
			$email = $row["email"];
			$contact = $row["contact"];
			$address = $row["address"];
			
		
			
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Edit Profile</title>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/forms.css">
	<link rel="stylesheet" href="../css/account.css">
</head>
<body>
	<div id="wrapper">
                 	           <?php 

		$check = mysql_query("SELECT * FROM user where user_id='$user' AND profile_added=1 ");
		$productCount = mysql_num_rows($check);
		if($productCount>0){
			include ("../include/umenu1.txt");
		}
		else{	include ("../include/umenu.txt"); }
		?>
                          <?php include ("../include/categoryuser.txt"); ?>
		<aside id="left_side">
                       <div id="generalform1">
				<h4>Menu</h4>
			<?php include ("../include/sidemenu.txt"); ?>
		     </div>

		</aside>
		
		<section id="right_side">
					<form id="generalform"  enctype="multipart/form-data" class="container" method="post" action="editp.php">
				<h4>Edit Profile</h4><hr><br/>
				<div class="field">
					<label for="userid">User ID:</label>
					<input type="text" class="input" id="title" name="username" value="<?php echo $username; ?>"/>
					
				</div>					
				<div class="field">
					<label for="title">Name:</label>
					<input type="text" class="input" id="title" name="title" value="<?php echo $full_name; ?>"/>
					
				</div>
				<div class="field">
					<label for="email">Email:</label>
					<input type="text" class="input" id="title" name="email" value="<?php echo $email; ?>"/>
					
				</div>
				<div class="field">
					<label for="contact">Contact:</label>
					<input type="text" class="input" id="subtitle" name="contact" value="<?php echo $contact; ?>"/>
					
				</div>
 				<div class="field">
					<label for="Address">Address:</label>
				        <textarea rows="8" cols="5" class="input" id="description" name="address" maxlength="5000"><?php echo $address; ?></textarea>
					
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Make Change"/><br/><br/>
				</form><br/>
		</section>
        	<?php include("../include/footer.txt");?>
	</div>
</body>
</html>