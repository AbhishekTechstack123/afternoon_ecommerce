<?php 

	include "../config.php";
	session_start();
	
	$name = $_POST["username"];
	$email = $_POST["useremail"];
	$phone = $_POST["userphone"];
	$address = $_POST["useraddress"];
	$pass = $_POST["pass"];
	$repass = $_POST["repass"];
	$hashpass = md5($pass);

	$query = "INSERT INTO `users`(`Name`, `Email`, `Phone`, `Address`, `password`,`role`) VALUES ('$name', '$email', '$phone','$address','$hashpass',2)";
	if(mysqli_query($conn,$query)){
		$_SESSION["login_status"] = 1;
		$_SESSION["username"] = $name;
		$_SESSION["role"] = 2;
		$_SESSION["user_id"] = mysqli_insert_id($conn);
		header("Location: ../index.php?err=Signup successful!");
	}
	else{

		header("Location: ../index.php?err=Something went wrong, please try again!");
	}




 ?>