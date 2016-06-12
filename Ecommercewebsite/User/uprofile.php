<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:../ulogin.php");
    exit();
}
$user = $_SESSION["username"];
	$aid = $_SESSION["id"];
		 
		$_SESSION["password"] ;
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
	<title>User  Profile</title>
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
			<div id="generalform" >
			<h4>My Profile<div align="right"><a href="ueditprofile.php">Edit</a></div></h4><hr/>
			<table border="0">
			<tr><td id="prof">User ID:</td><td id="prof"><?php echo $username; ?></td></tr>
				<tr><td id="prof">Name:</td><td id="prof"><?php echo $full_name; ?></td></tr>
				<tr><td id="prof">Email:</td><td id="prof"><?php echo $email; ?></td></tr>
				<tr><td id="prof">Contact:</td><td id="prof"><?php echo $contact; ?></td></tr>
				<tr><td id="prof">Address:</td><td id="prof"><?php echo $address; ?></td></tr>
				
			</table>
			</div><br/>
		</section>
        	<?php include("../include/footer.txt");?>
	</div>
</body>
</html>