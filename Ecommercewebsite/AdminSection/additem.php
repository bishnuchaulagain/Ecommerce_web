<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("location: alogin.php");
    exit();
}
include("../include/connect.php");

if (isset($_POST['title'])) {
	
        $product_name = mysql_real_escape_string($_POST['title']);
	$price = mysql_real_escape_string($_POST['price']);
	$category = mysql_real_escape_string($_POST['category']);
	$currency = mysql_real_escape_string($_POST['currencyformat']);
	$subcategory = mysql_real_escape_string($_POST['subtitle']);
	$details = mysql_real_escape_string($_POST['description']);
	$location = mysql_real_escape_string($_POST['location']);
	// See if that product name is an identical match to another product in the system
	$sql = mysql_query("SELECT id FROM product WHERE product_name='$product_name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
                header('Location: adminprompt.php?x=1');
		exit();
	}
	// Add this product into the database now
	$sql = mysql_query("INSERT INTO product (product_name,category, subcategory,currency,price,detail,location, date_added)
        VALUES('$product_name','$category','$subcategory','$currency',$price,'$details','$location',now())") or die (mysql_error());
	$pidx = mysql_insert_id();
	// Place image in the folder 
	$newname = "$pidx.jpg";
	move_uploaded_file( $_FILES['image1']['tmp_name'], "../Product_Image/$newname");
	header("location: adminprompt.php?x=0");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Items</title>
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
			<form id="generalform"  enctype="multipart/form-data" class="container" method="post" action="additem.php">
				<h3>Add The New Items</h3>
					
				<div class="field">
					<label for="title">Name:</label>
					<input type="text" class="input" id="title" name="title" maxlength="30"/>
					<p class="hint">Provide the name of the product.</p>
				</div>
				<div class="field">
					<label for="category">Category:</label>
					<?php include ("../include/Admin/category.txt"); ?>
					<p class="hint">Choose your product category.</p>
				</div>
				<div class="field">
					<label for="subtitle">SubCategory:</label>
					<input type="text" class="input" id="subtitle" name="subtitle" maxlength="50"/>
					<p class="hint">Provide the subcategory of product.</p>
				</div>
 				<div class="field">
					<label for="currencyformat">Currency</label>
				        <?php include ("../include/Admin/currencyformat.txt"); ?>
					<p class="hint">Choose the currency format.</p>
				</div>
				<div class="field">
					<label for="price">Price</label>
					<input type="text" class="input" id="price" name="price" maxlength="30"/>
					<p class="hint">Specify the price of the product.</p>
				</div>
				<div class="field">
					<label for="description">Description:</label>
					<textarea rows="8" cols="5" class="input" id="description" name="description" maxlength="5000"></textarea>
					<p class="hint">Provide the detail description about the product you want to trade.</p>
				</div>


				<div class="field">
					<label for="image1">Image:</label>
					<input type="file" id="image1" name="image1" />
					<p class="hint">Choose image of the product you want to trade, only JPEG format.</p>
				</div>
				<div class="field">
					<label for="itemlocation">Item Location:</label>
					<?php include ("../include/Admin/location.txt") ;?>
					<p class="hint">Choose your location.</p>
				</div>
				<input type="submit" name="submit" id="submit" class="button" value="Add Items to List"/><br/><br/>
			</form> <br/>
		</section>
        	<?php include("../include/Admin/footer.txt");?>
	</div>
</body>
</html>