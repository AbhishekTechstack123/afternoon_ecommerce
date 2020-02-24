<?php 

include "config.php";

session_start();

if(isset($_GET["err"])){
	$error_msg = $_GET["err"];
}
else {
	$error_msg = '';
}

$category_query = "SELECT DISTINCT category FROM `products`";
$result = mysqli_query($conn,$category_query);



 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

    <title>Trendy</title>

  </head>
  <body>

  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-12">
  				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					  <a class="navbar-brand" href="#">Trendy</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarNav">
					    <ul class="navbar-nav">
					      <li class="nav-item active">
					        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="#">Contact</a>
					      </li>
					      
					      	<?php 
						if(isset($_SESSION["role"]) && $_SESSION["role"] == 1){
								echo '<li>
									<a class="nav-link" href="admin.php">Admin</a>
					      			</li>';
								}

					      	 ?>
					      	
					      	
					      <li class="nav-item">
					      	<?php 

					      	if(isset($_SESSION["login_status"]) ){
					      		$uname = $_SESSION["username"];
					      		echo 'Welcome '."$uname";
					      		echo '<a href="files/logout.php">Logout</a>';
					      	}
					      	else{
					      		echo '<button class="nav-link" data-toggle="modal" data-target="#signup-modal">Signup</button>';
					      	}

					      	 ?>
					      </li>
					    </ul>
					  </div>
					</nav>
  			</div>
  		</div> <!-- row -->
  		<div class="row mt-5">
			<div id="categories" class="col-sm-2 border border-right">
				<ul>
				<?php 
					
					if($result){
						while($row = mysqli_fetch_assoc($result)){
			
	echo '<li class="showcat" category="'.$row["category"].'">'.$row["category"].'</li>';
						}
					}
				 ?>
				</ul>
				<!-- <form id="productexample" action="xyz.php" method="POST">
					<input type="checkbox" name="products" value="SHIRTS">Shirts
					<input type="checkbox" name="products" value="SHOES">Shoes
					<input type="checkbox" name="products" value="JACKETS">Jackets
					<input type="checkbox" name="products">Ties
					<input type="submit">
				</form> -->
			</div>

			<div class="col-sm-10">
				<div id="catproducts" class="row">
					
				</div>
			<!-- 	<div class="product-box">
					<img src="images/shirt1.jpg" alt="">
					<p class="pname">Black Shirt</p>
					<p class="psize">M</p>
					<p class="pprice">2000</p>
				</div> -->
				
			</div>
<!-- 			<div class="col-sm-8 showproducts"></div>
 -->  		</div> <!-- row -->
  	</div>


  <div id="signup-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Signup Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="signup-form" action="files/signup.php" method="POST">
		
		<div>
			<label>Name:</label>
			<input type="text" placeholder="Name" name="username" required>
		</div>
		<div>
			<label>Email:</label>
			<input type="email" placeholder="Email" name="useremail" required>
		</div>
		<div>
			<label>Phone:</label>
			<input type="phone" placeholder="Phone" name="userphone">
		</div>
		<div>
			<label>Password:</label>
			<input type="password" name="pass" required>
		</div>
		<div>
			<label>Re-type Password:</label>
			<input type="password" name="repass" required>
		</div>
		<div>
			<label>Address:</label>
			<textarea type="text" placeholder="Address" name="useraddress"></textarea>
		</div>
		<div>
			<p class="signup-err"></p>
			<input id="signup-btn" type="button" value="Signup">
		</div>
		<span class="form-toggle">Already a user? Login instead</span>
		</form>
      </div>
    </div>

     <div class="modal-content" style="display: none;">
      <div class="modal-header">
        <h5 class="modal-title">Login Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
  			<form action="files/action.php" method="POST">
  				<div>
  					<label>Email:</label>
					<input type="email" placeholder="Email" name="loginemail">
  				</div>
  				<div>
  					<label>Password:</label>
					<input type="password" placeholder="Password" name="loginpassword">
  				</div>
  				<div>
  					<input type="submit" value="login" name="loginsubmit">
  				</div>
  				<span class="form-toggle">New user? signup instead</span>

  			</form>
      </div>
    </div>



  </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
       <script defer type="text/JavaScript" src="script.js"></script>

  </body>
</html>