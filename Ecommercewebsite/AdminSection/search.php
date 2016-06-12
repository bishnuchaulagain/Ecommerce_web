<?php
session_start();
include("../include/connect.php");
$key = $_GET['keywords'];
$types = $_GET['category'];    
if(!isset($_SESSION['id'])){
	header('Location:../ulogin.php');
}
$user = $_SESSION["username"];
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
					<tr><td><b>Items</b></td><td><b>Information</b></td><td><b></b></td></tr>
									<?php	
						$sql = "SELECT id,product_name,price,currency,detail,category FROM product where product_name like '%$key%' AND category='$types' order by `date_added` desc LIMIT 0, 30  ";
						$query = mysql_query($sql);
					if($query){
  
						while($row = mysql_fetch_array($query)){
							$pid = $row["id"];
							$product_name=  $row["product_name"];
							$currency=$row["currency"];
							$price=$row["price"];
							$details=$row["detail"];
							$category=$row["category"];
											
					 							echo "<tr><td><b><img src=\"../Product_Image/$pid.jpg \" width=\"142\" height=\"188\" alt=\"$product_name\" /><br>$product_name</b><br>$category <br/><b>$$price<br></b></td><td align=\"left\"><b>$details</b></td><td><b>
												<form id=\"form1\" name=\"form1\" method=\"post\" action=\"cart.php\">


      </form></b></td></tr>";
						}

					}
					else{
						echo "<tr><td><b>Sorry no match found for your search.</b></td></tr>";
					}	
				?>
				</table>
			</div>
				

		</section>
		<?php include("../include/footer.txt");?>
	</div>
</body>
</html>