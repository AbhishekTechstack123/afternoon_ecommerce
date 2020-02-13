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

	$("#categories ul li").click(function(){

		var cat = $(this).attr("category");

		.ajax({
            type: "POST",
            url: "your url with method that accpects the data",
            dataType: "json",
            data: {
                o: objectDataString
            },
            success: function (data) {
               alert('Success');

            },
            error: function () {
             alert('Error');
            }
        });
        


	});




});