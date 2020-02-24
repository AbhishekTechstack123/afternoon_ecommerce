<?php 

// print_r($_POST);

include "../config.php";
$target = $_POST["target"];

$query = 'SELECT * FROM products WHERE category = "'.$target.'"';
$result = mysqli_query($conn,$query);

$response = array();

while($row = mysqli_fetch_assoc($result)){
	array_push($response,$row);
}

echo json_encode($response);


 ?>