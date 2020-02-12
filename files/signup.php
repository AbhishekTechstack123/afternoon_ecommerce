<?php 

	include "../config.php";

	$name = $_POST["username"];
	$email = $_POST["useremail"];
	$phone = $_POST["userphone"];
	$address = $_POST["useraddress"];

	$query = "INSERT INTO `users`(`Name`, `Email`, `Phone`, `Address`) VALUES ('$name', '$email', '$phone','$address')";
	if(mysqli_query($conn,$query)){
		header("Location: ../index.php?err=Signup successful!");
	}
	else{

		header("Location: ../index.php?err=Something went wrong, please try again!");
	}




 ?>