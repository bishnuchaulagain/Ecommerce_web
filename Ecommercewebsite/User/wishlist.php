<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location:../ulogin.php");
    exit();
}
$user = $_SESSION["username"];
include("../include/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wishlist</title>
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
			<form id="generalform"  enctype="multipart/form-data" class="container" method="post" action="cart.php">
			<h4>Wishlist</h4><hr/>
			<table border="0" id="wishtab">
						
							<?php	
						$ids=$_SESSION["id"];
						
						$sql = "SELECT product.id,product.product_name,product.category,product.currency,product.price FROM `product`,`wishlist` WHERE product.id=wishlist.pid AND wishlist.uid=$ids ";
						$productCount = mysql_num_rows($sql);
						echo $productCount;
						if($productCount>0){
							echo	"<tr><td id=\"prof\">Product_Information</td><td id=\"prof\">Price</td><td id=\"prof\"></td></tr>";	
							while($row = mysql_fetch_array($sql)){
								$pid = $row["id"];
								$product_name=  $row["product_name"];
								$currency=$row["currency"];
								$price=$row["price"];
								//$details=$row["detail"];
								$category=$row["category"];
						
								echo "<tr><td id=\"prof\"><b>$product_name</b><br>$category<td id=\"prof\"><b>$currency $price</b></td><td id=\"prof\"><b><a href=\"cart.php?transactions=$pid\"><input type=\"submit\" name=\"submit\" id=\"submit\" class=\"button\" id=\"button\" value=\"Add to Cart\" /></a></b></td></tr>";
							}
					
						}
						else
						{
							echo "<tr><td colspan=\"3\" id=\"prof\" align=\"center\">No items added to the wishlist yet...</td></tr>";
						}
		
					?>
			</table>
				<br/><br/>
			</form> <br/>
		</section>
        	<?php include("../include/footer.txt");?>
	</div>
</body>
</html>