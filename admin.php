<?php 

include "header.php";
session_start();
if(isset($_SESSION["login_status"]) ){
	if($_SESSION["role"] != 1){
		header("Location: index.php");
	}
}else{
	header("Location: index.php");
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<script src="script.js"></script>
</head>
<body>
	<div>
		<?php echo $nav; ?>
	</div>
<form id="add_product_form" action="files/action.php" method="POST" enctype="multipart/form-data">
		
		<input type="text" placeholder="Product Name" name="pname">
		<select name="category">
			<option value="SHIRT">Shirt</option>
			<option value="SHOES">Shoe</option>
			<option value="JACKET">Jacket</option>
		</select>
		<select name="size">
			<option value="XS">XS</option>
			<option value="S">S</option>
			<option value="M">M</option>
			<option value="L">L</option>
			<option value="XL">XL</option>
		</select>
		<input type="text" name="color" placeholder="color">
		<input type="text" placeholder="Price" name="pprice">
		<input type="file" name="image">
		<input type="hidden" name="add_product" value="1">
		<div style="margin-top:20px;">
					<input id="add_product_btn" type="button" value="Add Product">

		</div>
		<div class="res_msg"></div>
	
	<ul>

	</ul>
		
</form>


</body>
</html>