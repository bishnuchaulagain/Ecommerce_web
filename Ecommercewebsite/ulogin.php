<?php
session_start();
include "include/connect.php"; 
//checking whether the user is in session or not 
if(isset($_SESSION['id'])){
	header('Location:User/uindex.php');
}


// Parse the log in form if the user has filled it out and pressed "Log In"
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$manager = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]); // filter everything but numbers and letters
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]); // filter everything but numbers and letters
    // Connect to the MySQL database  

    $sql = mysql_query("SELECT id FROM user WHERE user_id='$manager' AND password='$password' LIMIT 1"); // query the person
    // ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
    $existCount = mysql_num_rows($sql); // counting the row nums
    if ($existCount == 1) { // evaluate the count
	     while($row = mysql_fetch_array($sql)){ 
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["username"] = $manager;
		 $_SESSION["password"] = $password;

		 header("location:User/uindex.php");
         exit();
    }
	
	else{
			$error_message='<span class="error">Username and or Password is incorrect.</span>';
			
			
	}
	}
	
 else{
		$error_message='<span class="error">';
			$error_message='';
		$error_message.="</span><br>";	
}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div id="wrapper">
		                          <?php include ("include/menu.txt"); ?>
                          <?php include ("include/category.txt"); ?>
	<aside id="left_side">
			<img src="Images/logs.jpg" width="490" height="454" />
		</aside>
		
		<section id="right_side">
			<form id="generalform" class="container" method="post" action="">
				<h3>User Log In</h3>
					<?php echo "$error_message" ; ?>
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20"/>
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Login"/>
			</form>
		</section>
		<?php include("include/footer.txt");?>
	</div>
</body>
</html>