<?php 

include "config.php";

if(isset($_GET["err"])){
	$error_msg = $_GET["err"];
}
else {
	$error_msg = '';
}


$user_query = "SELECT * FROM users";

$result = mysqli_query($conn,$user_query);

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Trendy</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<div><?php echo $error_msg; ?></div>

	<form id="signup-form" action="files/signup.php" method="POST">
		
		<div>
			<label>Name:</label>
			<input type="text" placeholder="Name" name="username">
		</div>
		<div>
			<label>Email:</label>
			<input type="email" placeholder="Email" name="useremail">
		</div>
		<div>
			<label>Phone:</label>
			<input type="phone" placeholder="Phone" name="userphone">
		</div>
		<div>
			<label>Address:</label>
			<textarea type="text" placeholder="Address" name="useraddress"></textarea>
		</div>
		<div>
			<input type="submit">
		</div>

	</form>

	<div>
		<table>
			<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
			</thead>
			<tbody>
				<?php 

			while($row = mysqli_fetch_assoc($result)){
					// print_r($row);
				echo "<tr>";
				echo "<td>".$row["Name"]."</td>";
				echo "<td>".$row["Email"]."</td>";
				echo "<td>".$row["Phone"]."</td>";
				echo "<td>".$row["Address"]."</td>";
				echo "</tr>";
			}
	

		 ?>
			</tbody>
		</table>
	</div>
	
</body>
</html>