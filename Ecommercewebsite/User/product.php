<?php
session_start();
include("../include/connect.php");
if(!isset($_SESSION['id'])){
	header('Location:../ulogin.php');
}
$user = $_SESSION["username"];
$id=$_GET['pid'];
$error_message='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
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
		else{	include ("../include/umenu.txt");
				$error_message='<span class="error"><a href="addprofile.php">Please complete your profile.</a></span>';
		}
		?>
                          <?php include ("../include/categoryuser.txt"); ?>
		<aside id="left_side">
		     <div id="generalform1">
			<h4>Menu</h4>
		<?php include ("../include/sidemenu.txt"); ?>
		     </div>
		</aside>
		
		<section id="right_side">
		  <?php echo $error_message;?>
			<div id="inner" class="container" >
      
				<table>
					<tr ><td><b class="i">Products</b></td><td><b class="i">Information</b></td><td><b class="i">Buy</b></td></tr>

				<?php	
						$sql = "SELECT id,product_name,price,currency,detail,category FROM product where id=$id  ";
						$query = mysql_query($sql);
					if($query){
  
						while($row = mysql_fetch_array($query)){
							$pid = $row["id"];
							$product_name=  $row["product_name"];
							$currency=$row["currency"];
							$price=$row["price"];
							$details=$row["detail"];
							$category=$row["category"];
											

						}

					} 
				?>
				
					 							<tr><td><b><img src="../Product_Image/<?php echo $pid;?>.jpg" width="142" height="188" alt="<?php echo $product_nam?>" /><br><?php echo $product_name?></b><br><?php echo $category ?> <br/><b>$<?php echo $price?><br><a href="awishlist.php?wishid=$pid">Add to Wishlist</a></b></td><td align="left"><b><?php echo $details?></b></td><td><b>
	<form id="form1" name="form1" method="post" action="cart.php">
        <input type="hidden" name="pid" id="pid" value="<?php echo $pid?>" />
        <input type="submit" name="button" id="button" class="button" value="Add to Shopping Cart" />
      </form></b></td></tr>
				</table>
			</div>
				

		</section>
		<?php include("../include/footer.txt");?>
	</div>
</body>
</html>