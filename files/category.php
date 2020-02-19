<?php 

// print_r($_POST);

include "../config.php";
$target = $_POST["target"];

$query = 'SELECT * FROM products WHERE category = "'.$target.'"';
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){

	print_r($row);
}


 ?>