<?php 

include "../config.php";

session_start();

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

if(isset($_FILES["image"])){
	$name = $_POST["pname"];
	$price = $_POST["pprice"];
   $cat = $_POST["category"];
   $size= $_POST["size"];
   $color = $_POST["color"];








      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $tmp = explode('.',$_FILES['image']['name']);
      $file_ext=strtolower(end($tmp));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }


         $query = 'INSERT INTO `products`(`Name`, `category`, `size`, `color`, `price`, `image`) VALUES ("'.$name.'","'.$cat.'","'.$size.'","'.$color.'","'.$price.'","'.$file_name.'")';

         mysqli_query($conn,$query) or die();
}




if(isset($_POST["loginsubmit"])){

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

}


if(isset($_POST["cart_product"])){

   $pro_id = $_POST["cart_product"];
   $user_id = $_SESSION["user_id"];
   // echo $pro_id,$user_id;

   $add_query = "INSERT INTO `cart`(`product_id`, `user_id`, `quantity`) VALUES ($pro_id,$user_id,1)";

   mysqli_query($conn,$add_query) or die();


}




 ?>