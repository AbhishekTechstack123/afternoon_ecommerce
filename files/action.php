<?php 

include "../config.php";


if(isset($_POST["action_type"])){

$target = $_POST["target"];

$query = 'SELECT * FROM products WHERE category = "'.$target.'"';
$result = mysqli_query($conn,$query);

$response = array();

while($row = mysqli_fetch_assoc($result)){
	array_push($response,$row);
}

echo json_encode($response);


}

if(isset($_POST["add_product"])){

	echo "product added";


}




if(isset($_POST["loginsubmit"])){
session_start();

$uemail = $_POST["loginemail"];
$upass = md5($_POST["loginpassword"]);

$query = 'SELECT * FROM users WHERE Email="'.$uemail.'" AND password = "'.$upass.'"';


$result = mysqli_query($conn,$query);
if($result){
	$row = mysqli_fetch_assoc($result);
	$name = $row["Name"];
	$_SESSION["login_status"] = 1;
	$_SESSION["username"] = $name;
	$_SESSION["role"] = $row["role"];
	header("Location: ../index.php?err=Login successful");
}
else{
	header("Location: ../index.php?err=Invalid Credentials");
}

}




 ?>