<?php 
include "../config.php";

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
	$_SESSION["user_id"] = $row["id"];
	header("Location: ../index.php?err=Login successful");
}
else{
	header("Location: ../index.php?err=Invalid Credentials");
}


?>


