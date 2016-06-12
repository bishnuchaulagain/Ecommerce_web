<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:../ulogin.php");
    exit();
}
$error="";

$user = $_SESSION["username"];
$id = $_SESSION["id"];
$oid = "OD876432$id";
include("../include/connect.php");
 if( isset($_POST['submit'])){
 
	// validating and storing value in the variable
	if( (preg_replace('#[^A-Za-z]#i', '', $_POST["username"])) && (preg_replace('#[^0-9]#i', '', $_POST["tel"])) && ( preg_replace('#[^A-Za-z0-9]#i', '', $_POST["address"])) && (preg_replace('#[^0-9]#i', '', $_POST["pin"])) && (preg_replace('#[^A-Za-z]#i', '', $_POST["city"])) && (preg_replace('#[^A-Za-z]#i', '', $_POST["state"])) && (preg_replace('#[^A-Za-z]#i', '', $_POST["country"])) ){
		$name = preg_replace('#[^A-Za-z]#i', '', $_POST["username"]);
		$tel =  preg_replace('#[^0-9]#i', '', $_POST["tel"]);
		$add =   preg_replace('#[^A-Za-z0-9]#i', '', $_POST["address"]);
		$pin =   preg_replace('#[^0-9]#i', '', $_POST["pin"]);
		$city =  preg_replace('#[^A-Za-z]#i', '', $_POST["city"]);
		$state =  preg_replace('#[^A-Za-z]#i', '', $_POST["state"]);
		$count =  preg_replace('#[^A-Za-z]#i', '', $_POST["country"]);
		//checking whether user has alreay inserted shipping address or not
	
		$sql = mysql_query("select * from shipping where uid = '$id'");
		$ck = mysql_num_rows($sql);
		if($ck){
			//already inserted
			$error= "<font color=\"white\">SHIPPING ADDRESS IS ALREADY PROVIDED. JUST CLICK FOR PAYMENT</font>";
			
		}else{
			$add = mysql_query( "INSERT INTO `shipping` (`name`, `tel`, `address`, `pin`, `country`, `state`, `city`, `uid`) VALUES ('$name', '$tel', '$add', '$pin', '$count', '$state', '$city', '$id')");
			
			if($add ){
				echo "Success";
			}
		}
	}
	else{
		$error= "<font color=\"white\">ERROR DUE TO IMPROPER VALUE</font>";
	}
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout</title>
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

	
			<div id="wrappers" class="container" >
			<h4>Shipping Details</h4><hr/>
<br/>

			<form method="post" aciton="checkout.php">
				<div class="field">
					<label for="userid">Name:</label>
					<input type="text" class="input" id="title" name="username" placeholder="name"/>
					<font color="red">*</font><font color="white"> Enter your full name.</font>
					
				</div>					
				<div class="field">
					<label for="title">Mobile No:</label>
					<input type="text" class="input" id="title" name="tel" placeholder="856742684"/>
					<font color="red">*</font><font color="white"> Enter 10 digit mobile number.</font>
					
				</div>
 				<div class="field">
					<label for="Address">Address:</label>
				        <textarea rows="8" cols="5" class="input" id="description" name="address" maxlength="5000" placeholder="shipping address"></textarea>
					<font color="red">*</font><font color="white"> Enter your full address.</font>
				</div>
				<div class="field">
					<label for="email">Zip/PIN Code:</label>
					<input type="text" class="input" id="title" name="pin" placeholder="pin code"/>
					<font color="red">*</font><font color="white"> Enter 6 digit pin code.</font>
					
				</div>
				<div class="field">
					<label for="contact">City:</label>
					<input type="text" class="input" id="subtitle" name="city" placeholder="city"/>
					<font color="red">*</font><font color="white"> Enter city name.</font>
					
				</div>
				<div class="field">
					<label for="contact">State:</label>
					<input type="text" class="input" id="subtitle" name="state" placeholder="state"/>
					<font color="red">*</font><font color="white"> Enter state name.</font>
					
				</div>
				<div class="field">
					<label for="contact">Country:</label>
					<input type="text" class="input" id="subtitle" name="country" placeholder="country"/>
					<font color="red">*</font><font color="white"> Enter country name.</font>
				</div>
				<font color="white"> Note: * indicates the mandatory fields</font><br/>
				<input type="submit" name="submit" id="submit" class="button" value="Make Payment"/><br/><br/>
				<div><?php echo $error; ?></div>
				</form><br/>
  </div> <br/>
  <br/>
	<div class="footer">
        	<?php include("../include/footer.txt");?>
	</div>
</body>
</html>