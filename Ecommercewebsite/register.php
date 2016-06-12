<?php
session_start();
include("include/connect.php");

$error_message='';
if(isset($_POST['submit'])){
	
	$error = array();
	
	//checking the username
	if(empty($_POST['username'])){
		$error[] = 'Please enter a username. ';
	}else if( ctype_alnum($_POST['username']) ){
		$username = $_POST['username'];
	}else{
		$error[] = 'Username must consist of letters and numbers only. ';
	}
	
	//checking whether the email is valid or not
    if(empty($_POST['email'])){
        $error[] = 'Please enter your email. ';
    }else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])){
		$email = mysql_real_escape_string($_POST['email']);
    }else{
		$error[] = 'Your e-mail address is invalid. ';
    }

	//password validation
	if(empty($_POST['password'])){
		$error[] = 'Please enter a password. ';
	}else{
		$password = mysql_real_escape_string($_POST['password']);
	}
	if(empty($error)){
		//everything goood
		$result = mysql_query("SELECT * FROM user WHERE email='$email' OR user_id='$username'") or die(mysql_error());
		if(mysql_num_rows($result)==0){
			//no one is registered with this

				$result2 = mysql_query("INSERT INTO user(id,user_id,password,email)VALUES('','$username','$password','$email')") or die(mysql_error());
				if(!$result2){
					die('Could not insert into database'.mysql_error());
				}
				header('Location: prompt.php?x=1');
			}
		else{
			header('Location: prompt.php?x=2');	//header used for redirection
		}

	}
	else{

		$error_message='<span class="error">';
		foreach($error as $key => $value){
				$error_message.= "$value";
		}
		$error_message.="</span><br>";


	}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/register.css">
</head>
<body>
	<div id="wrapper">
                       <?php include ("include/menu.txt"); ?>
		       <?php include ("include/category.txt"); ?>
		<aside id="left_side">
			<img src="Images/registerbanner.png" />
		</aside>

		<section id="right_side">
			<form id="generalform" class="container" method="post" action="">
				<h3>Register</h3>
					<?php echo $error_message;?><br/>
				<div class="field">
					<label for="username">Username:</label>
					<input type="text" class="input" id="username" name="username" maxlength="20" placeholder="Alex997" />
					<p class="hint">20 characters maximum (letters and numbers only)</p>
				</div>
				<div class="field">
					<label for="email">Email:</label>
					<input type="text" class="input" id="email" name="email" maxlength="80" placeholder="abc@xyz.com" />
					<p class="hint">should be of standard format name@domain</p>
				</div>
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" class="input" id="password" name="password" maxlength="20" placeholder="********" />
					<p class="hint">20 characters maximum</p>
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Submit"/>
			</form>
		</section>
		<?php include("include/footer.txt");?>
	</div>
</body>
</html>