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

 	// var frm = document.getElementById("add_product_form");
 	var frm = $("#add_product_form");
 	// console.log(frm);
 	var formData = new FormData(frm[0]);

 	$.ajax({
 		type:frm.attr("method"),
		url:frm.attr("action"),
		cache:false,
        contentType: false,
        processData: false,
        data:formData,
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
		url:"files/action.php",
		data:{"target":cat,"action_type":"category"},
		success:function(data){
						 	console.log(data);

			 	data = JSON.parse(data);
			 	console.log(data);
			 	$("#catproducts").html("");
			 	data.forEach(function(val){
			 		$("#catproducts").append('<div class="col-sm-4"><div class="product-box mb-4"><img src="images/'+val.image+'" alt=""><p class="pname">'+val.Name+'</p><p class="psize">'+val.size+'</p><p class="pprice">'+val.price+'</p><button class="addtocart" product_id="'+val.id+'">Add to cart</button></div></div>');
			 	});

		}
 	});

 });

	
	// $("#productexample input").on("change",function(){


	// 	alert("hello");

	// });


	$(document).on("click",".addtocart",function(){

		var pro = $(this).attr("product_id");

		$.ajax({
 		type:"POST",
		url:"files/action.php",
        data:{"cart_product":pro},
		success:function(data){
			 	console.log(data);
			 	
		}
 		});

		
	});




});