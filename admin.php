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
<form id="add_product_form" action="files/action.php" method="POST">
		
		<input type="text" placeholder="Product Name" name="pname">
		<input type="text" placeholder="Price" name="pprice">
		<input id="add_product_btn" type="button" value="Add Product">
		<div class="res_msg"></div>
</form>


</body>
</html>