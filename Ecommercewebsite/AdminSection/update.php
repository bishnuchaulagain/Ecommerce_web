<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: alogin.php");
    exit();
}
include("../include/connect.php");
//for deleting  the items
if (isset($_GET['x'])) {	
	header("location:adminprompt.php?x=2");
	$y= $_GET['x']; 
	setcookie('productID',$y,time()+10000); //creating cookie to pass the productID for deletion
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Update Products</title>
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
			<h3 align="left"><font color="green">Products:</font></h3><hr/>
				<table>
					<tr ><td><b class="i">Products</b></td><td><b class="i">Price</b></td><td><b class="i">Information</b></td><td></td><td></td></tr>

				<?php	
						$sql = "SELECT id, product_name,price,currency,detail,category FROM product order by `date_added` desc LIMIT 0, 30  ";
						
						$query = mysql_query($sql);
					if($query){
  
						while($row = mysql_fetch_array($query)){
							$id = $row["id"];
							$pid=$row["id"];
							$product_name=  $row["product_name"];
							$currency=$row["currency"];
							$price=$row["price"];
							$details=$row["detail"];
							$category=$row["category"];
							
							echo "<tr><td><b><img src=\"../Product_Image/$pid.jpg \" width=\"142\" height=\"188\" alt=\"$product_name\" /><br>$product_name</b><br>$category </td><td><b>$currency $price</b></td><td align=\"left\"><b>$details</b></td><td><b><a href=\"edit.php?pids=$id\">Edit</a></b></td><td><b><a href=\"update.php?x=$id\">Delete</a></b></td></tr>";
							
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