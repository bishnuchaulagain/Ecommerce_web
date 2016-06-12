<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: alogin.php");
    exit();
}
include("../include/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin View Products</title>
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
			<div id="inner" class="container" >
				<table>
					<tr ><td><b class="i">Products</b></td><td><b class="i">Price</b></td><td><b class="i">Information</b></td></td></tr>

				<?php	
						$sql = "SELECT id,product_name,price,currency,detail,category FROM product order by `date_added` desc LIMIT 0, 30  ";
						$query = mysql_query($sql);
					if($query){
  
						while($row = mysql_fetch_array($query)){
							$pid = $row["id"];
							$product_name=  $row["product_name"];
							$currency=$row["currency"];
							$price=$row["price"];
							$details=$row["detail"];
							$category=$row["category"];
							
							echo "<tr><td><b><img src=\"../Product_Image/$pid.jpg \" width=\"142\" height=\"188\" alt=\"$product_name\" /><br>$product_name</b><br>$category</td><td><b>$currency $price</b></td><td align=\"left\"><b>$details</b></td></tr>";
							
						//	echo "<tr ><td colspan=\"5\"><hr></td></tr>";
  
						}

					} 
				?>
				</table>

			</div>
				

		</section>
		<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>