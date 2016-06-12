<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: alogin.php");
    exit();
}
include("../include/connect.php");
//variable declarations
if (isset($_GET['pids'])) {
$targetID = $_GET['pids'];

//code for gathering the information for automatically filling the fields
 $sql = mysql_query("SELECT * FROM product WHERE id='$targetID' LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
	if ($productCount > 0) {
	    while($row = mysql_fetch_array($sql)){ 
			
			$product_name = $row["product_name"];
			$category = $row["category"];
			$currency = $row["currency"];
			$subcategory = $row["subcategory"];
			$details = $row["detail"];
			$location = $row["location"];
			$price=$row['price'];
			
		}
	}
}
// code for updating the items
if (isset($_POST['title'])) {
	$pid = mysql_real_escape_string($_POST['thisID']);
     $product_name = mysql_real_escape_string($_POST['title']);
	$price = mysql_real_escape_string($_POST['price']);
	$category = mysql_real_escape_string($_POST['category']);
	$currency = mysql_real_escape_string($_POST['currencyformat']);
	$subcategory = mysql_real_escape_string($_POST['subtitle']);
	$details = mysql_real_escape_string($_POST['description']);
	$location = mysql_real_escape_string($_POST['location']);
	
	// updating  this product into the database now
	$sql = mysql_query("UPDATE product SET  product_name='$product_name',category='$category', subcategory='$subcategory',currency='$currency', price=$price, detail='$details',location='$location', date_added=now() WHERE id=$pid ") or die (mysql_error());
	// Place image in the folder 
	$newname = "$pid.jpg";
	move_uploaded_file( $_FILES['image1']['tmp_name'], "../Product_Image/$newname");
	
	header("location:adminprompt.php?x=3");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Items</title>
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
		
		<section id="right_side" >
			<form id="generalform"  enctype="multipart/form-data" class="container" method="post" action="edit.php">
				<h3>Edit the Items</h3>
					
				<div class="field">
					<label for="title">Name:</label>
					<input type="text" class="input" id="title" name="title" value="<?php echo $product_name; ?>"/>
					<p class="hint">Provide the name of the product.</p>
				</div>
				<div class="field">
					<label for="category">Category:</label>
					<?php include ("../include/Admin/categorys.txt"); ?>
					<p class="hint">Choose your product category.</p>
				</div>
				<div class="field">
					<label for="subtitle">SubCategory:</label>
					<input type="text" class="input" id="subtitle" name="subtitle" value="<?php echo $subcategory; ?>"/>
					<p class="hint">Provide the subcategory of product.</p>
				</div>
 				<div class="field">
					<label for="currencyformat">Currency</label>
				        <?php include ("../include/Admin/currencyformats.txt"); ?>
					<p class="hint">Choose the currency format.</p>
				</div>
				<div class="field">
					<label for="price">Price</label>
					<input type="text" class="input" id="price" name="price" value="<?php echo $price; ?>"/>
					<p class="hint">Specify the price of the product.</p>
				</div>
				<div class="field">
					<label for="description">Description:</label>
					<textarea rows="8" cols="5" class="input" id="description" name="description" maxlength="5000"><?php echo $details;?></textarea>
					<p class="hint">Provide the detail description about the product you want to trade.</p>
				</div>


				<div class="field">
					<label for="image1">Image:</label>
					<input type="file" id="image1" name="image1" />
					<p class="hint">Choose image of the product you want to trade, only JPEG format.</p>
				</div>
				<div class="field">
					<label for="itemlocation">Item Location:</label>
					 <?php include ("../include/Admin/locations.txt"); ?>
					<p class="hint">Choose your location.</p>
				</div>
				<input name="thisID" type="hidden" value="<?php echo $targetID; ?>" />
				<input type="submit" name="submit" id="submit" class="button" value="Update Items"/><br/><br/>
			</form> <br/>
		</section>
        	<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>