$(document).ready(function(){


	$("#signup-btn").click(function(){
		
		$(".signup-err").html("");


		var pass = $('input[name="pass"]').val();
		var repass = $('input[name="repass"]').val();
		if(pass == repass && pass != ''){
			$(".signup-err").html("Processing...");
			$("#signup-form").submit();
		}
		else{
			$(".signup-err").html("Password does not match!");
		}

	});

	$(".form-toggle").click(function(){


		$("#signup-modal .modal-content").toggle();


	});

	// $("#categories ul li").click(function(){

	// 	var cat = $(this).attr("category");

	
 //      	});


 $("#add_product_btn").click(function(){
 	var frm = $("#add_product_form");
 	// var custom_data = {"name":"Kundan","price":1000}
 	$.ajax({
 		type:frm.attr("method"),
		url:frm.attr("action"),
		data:frm.serialize(),
		success:function(data){
			 	console.log(data);
			 	$(".res_msg").html(data);
		}
 	});


 });


 $(".showcat").click(function(){
 	var cat  = $(this).attr("category");
 	// alert(cat);
 	$.ajax({
 		type:"POST",
		url:"files/category.php",
		data:{"target":cat},
		success:function(data){
			 	// console.log(data);
			 	$(".showproducts").html(data);
		}
 	});

 });

	




});