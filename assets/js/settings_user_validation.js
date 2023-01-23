var positive = "*Positive values only allowed";
var numerical = "*Numerical values only";
var len = "*Invalid length";
var required = "*Required field";
var success="";
var greaterZero="*Should be greater than 0";
var alphabets = "*Alphabets only";
var alphaNum = "*Alphanumeric only"
        // Fields Validation for Add User Model
        //Select role;
        $('#inputRoleAdd').on('blur',function(){
            var sname = $('#inputRoleAdd').val();
            if (sname == "null") {
                $("#validate_role").css("display","block");
                $('#validate_role').html(required);
                
            }
            else{
                $('#validate_role').html(success);
            }
         });
        
        //Email Validation
        /*
        function inputUserEMail(){
			var val = $("#inputUserEMail").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return "User Email**";
			}
			else{
				var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val)) {
					$(".CreateUser").attr("disabled", true);
					var user = $('#inputUserEMail').val();
					//alert(user);
		            $.ajax({
		                url: "<?php echo base_url('User_controller/checkUser'); ?>",
		                type: "POST",
		                // dataType:"json",
		                data:{
		                    user_name:user,
		                },
		                success:function(res){
		                	alert(res);
		                	console.log(res);

		                    // if (res != 0) {
		                    //     alert('User Email Already Exists');
		                    //     $(".CreateUser").attr("disabled", true);
		                    //     $('#inputUserFirstName').val("");
		                    //     $('#inputUserLastName').val("");
		                    //     $('#inputUserPhone').val("");
		                    //     $('#inputUserDesignation').val("");
		                    //     $("#inputUserFirstName").attr("disabled", true);
		                    //     $("#inputUserLastName").attr("disabled", true);
		                    //     $("#inputUserPhone").attr("disabled", true);
		                    //     $("#inputUserDesignation").attr("disabled", true);
		                    // }
		                    // else{
		                    //     $(".CreateUser").removeAttr("disabled");
		                    //     $("#inputUserFirstName").removeAttr("disabled");
		                    //     $("#inputUserLastName").removeAttr("disabled");
		                    //     $("#inputUserPhone").removeAttr("disabled");
		                    //     $("#inputUserDesignation").removeAttr("disabled");
		                    // }
		                },
		                error:function(res){
		                    //alert(res);
		                    alert("Sorry!Try Agian!!");
		                }
		            });
					return "";
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "Invalid Email**";
				}
			}
		}
		*/
		// function inputOpUserID(){
		// 	var val = $("#inputOpUserID").val();
		// 	if (!val) {
		// 		$(".CreateUser").attr("disabled", true);
		// 		return required;
		// 	}
		// 	else{
		// 		var num = /^[1-9][0-9]*$/;
		// 		if (num.test(val)) {
		// 			$(".CreateUser").removeAttr("disabled");
		// 			var id = $('#inputOpUserID').val();
		//             $.ajax({
		//                 url: "<?php echo base_url('Home/checkOperator'); ?>",
		//                 type: "POST",
		//                 dataType: "json",
		//                 data: {
		//                     User_ID : id
		//                 },
		//                 success:function(res){
		//                     if (!res.length) {
		//                         $(".CreateUser").removeAttr("disabled");
		//                     }
		//                     else{
		//                         alert("User Exist, Try another User ID!");
		//                         $(".CreateUser").attr("disabled", true);
		//                     }
		//                 },
		//                 error:function(res){
		//                     alert("Sorry!Try Agian!!");
		//                 }
		//             });
		// 			return success
		// 		}
		// 		else{
		// 			$(".CreateUser").attr("disabled", true);
		// 			return "Invalid*";
		// 		}
		// 	}
		// }

		function inputUserFirstName(){
			var val = $("#inputUserFirstName").val();
			val = val.trim();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				$("#inputUserFirstName").val(val);
				return required;
			}
			else{
				var letters = /^[a-z][A-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".CreateUser").attr("disabled", true);
					$("#inputUserFirstNameCunt").css("display","none");
					return "Invalid length*";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".CreateUser").removeAttr("disabled");
					$("#inputUserFirstNameCunt").css("display","block");
					var val_data = $("#inputUserFirstName").val();
					val_data = val_data.trimStart().trimEnd();
					$("#inputUserFirstName").val(val_data);
					return success
				}
				else{
					$(".CreateUser").attr("disabled", true);
					return alphabets;
				}
			}
		}


		function inputUserLastName(){
			var val = $("#inputUserLastName").val();
			val = val.trim();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				$("#inputUserLastName").val(val);
				return required;
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				//var letters = /[^a-zA-Z]/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".CreateUser").attr("disabled", true);
					$("#inputUserLastNameCunt").css("display","none");
					return "Invalid length*";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".CreateUser").removeAttr("disabled");
					$("#inputUserLastNameCunt").css("display","block");

					var val_data = $("#inputUserLastName").val();
					val_data = val_data.trimStart().trimEnd();
					$("#inputUserLastName").val(val_data);
					return success;
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return alphabets;
				}
			}
		}

		function inputUserPhone(){
			var val = $("#inputUserPhone").val();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				return required;
			}
			else{
				var letters = /^\(?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val)) {
					$(".CreateUser").removeAttr("disabled");
					//$("#inputNewToolNameCunt").css("display","none");
					return success;
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "*Invalid phone number";
				}
			}
		}

		function inputUserDesignation(){
			var val = $("#inputUserDesignation").val();
			val = val.trim();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				$("#inputUserDesignation").val(val);
				return required;
			}
			else{
				var letters = /^[a-z][A-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 50) {
					$(".CreateUser").attr("disabled", true);
					$("#inputUserDesignationCunt").css("display","none");
					return "Invalid length*";
				}
				else if (letters.test(val) && val.length<=50) {
					$(".CreateUser").removeAttr("disabled");
					$("#inputUserDesignationCunt").css("display","block");

					var val_data = $("#inputUserDesignation").val();
					val_data = val_data.trimStart().trimEnd();
					$("#inputUserDesignation").val(val_data);
					return success;
				}
				else{
					$(".CreateUser").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "*Alphabets only allowed";
				}
			}
		}

function inputSiteNameAdd(){
	var val = $("#new_site_name").val();
	val = val.trim();
	if (!val) {
		$(".CreateUser").attr("disabled", true);
		$('#new_site_name').val(val);
		return required;
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 50) {
			$(".CreateUser").attr("disabled", true);
			//This condition will not occur
			return "*Length should less than 50";
		}
		else if (val.length<=50) {
			$(".CreateUser").removeAttr("disabled");
			var val_data = $("#new_site_name").val();
			val_data = val_data.trimStart().trimEnd();
			$('#new_site_name').val(val_data);
			return success;
		}
		else{
			$(".CreateUser").attr("disabled", true);
			//Error message should update based on the Input validation
			return "Invalid*";
		}
	}
}

function inputLocationAdd(){
	var val = $("#location_name").val();
	val = val.trim();
	if (!val) {
		$(".CreateUser").attr("disabled", true);
		$('#location_name').val(val);
		return required;
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 50) {
			$(".CreateUser").attr("disabled", true);
			//This condition will not occur
			return "*Length should less than 50";
		}
		else if (val.length<=50) {
			$(".CreateUser").removeAttr("disabled");
			var val_data = $('#location_name').val();
			val_data = val_data.trimStart().trimEnd();
			$('#location_name').val(val_data);
			return success;
		}
		else{
			$(".CreateUser").attr("disabled", true);
			//Error message should update based on the Input validation
			return "Invalid*";
		}
	}
}


$('#inputUserEMail').on('blur',function(){
    var x =inputUserEMail();
   $("#inputUserEMailErr").html(x);
});
$('#new_site_name').on('blur',function(){
    var x =inputSiteNameAdd();
   $("#inputUsernew_site_err").html(x);
});
$('#location_name').on('blur',function(){
    var x =inputLocationAdd();
   $("#location_name_err").html(x);
});

$('#inputUserFirstName').on('blur',function(){
    var x =inputUserFirstName();
   $("#inputUserFirstNameErr").html(x);
});

$('#inputUserLastName').on('blur',function(){
    var x =inputUserLastName();
   $("#inputUserLastNameErr").html(x);
});

$('#inputUserPhone').on('blur',function(){
    var x =inputUserPhone();
   $("#inputUserPhoneErr").html(x);
});
$('#inputUserDesignation').on('blur',function(){
    var x =inputUserDesignation();
   $("#inputUserDesignationErr").html(x);
});
$('#inputOpUserID').on('blur',function(){
    var x =inputOpUserID();
   $("#inputOpUserIDErr").html(x);
});

// Charecter Count
var text_max = 25;
$('#inputUserFirstNameCunt').html('0 / ' + text_max);
$('#inputUserFirstName').keyup(function() {
  var text_length = $('#inputUserFirstName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputUserFirstNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputUserFirstName').val($('#inputUserFirstName').val().substring(0,25));

		var text_remaining = $('#inputUserFirstName').val().length;
	 	$('#inputUserFirstNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

$('#inputUserLastNameCunt').html('0 / ' + text_max);
$('#inputUserLastName').keyup(function() {
  var text_length = $('#inputUserLastName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#inputUserLastNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputUserLastName').val($('#inputUserLastName').val().substring(0,25));

		var text_remaining = $('#inputUserLastName').val().length;
	 	$('#inputUserLastNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

var text_max_val = 50;
$('#inputUserDesignationCunt').html('0 / ' + text_max_val);
$('#inputUserDesignation').keyup(function() {
  var text_length = $('#inputUserDesignation').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#inputUserDesignationCunt').html(text_remaining + ' / ' + text_max_val);
	}
	else{
		$('#inputUserDesignation').val($('#inputUserDesignation').val().substring(0,50));

		var text_remaining = $('#inputUserDesignation').val().length;
	 	$('#inputUserDesignationCunt').html(text_remaining + ' / ' + text_max_val);
	}
});



$('#EditUserFName').on('blur',function(){
    var x =EditUserFName();
   $("#EditUserFNameErr").html(x);
});

$('#EditUserLName').on('blur',function(){
    var x =EditUserLName();
   $("#EditUserLNameErr").html(x);
});

$('#EditUserPhone').on('blur',function(){
    var x =EditUserPhone();
   $("#EditUserPhoneErr").html(x);
});
$('#EditUserDesignation').on('blur',function(){
    var x =EditUserDesignation();
   $("#EditUserDesignationErr").html(x);
});


function EditUserFName(){
			var val = $("#EditUserFName").val();
			val = val.trim();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				$("#EditUserFName").val(val);
				return required;
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".EditUserData").attr("disabled", true);
					$("#inputUserFirstNameCunt").css("display","none");
					return "Invalid length*";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".EditUserData").removeAttr("disabled");
					$("#inputUserFirstNameCunt").css("display","block");

					var val_data = $("#EditUserFName").val();
					val_data = val_data.trimStart().trimEnd();
					$("#EditUserFName").val(val_data);
					return success;
				}
				else{
					$(".EditUserData").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return alphabets;
				}
			}
		}

		function EditUserLName(){
			var val = $("#EditUserLName").val();
			val = val.trim();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				$("#EditUserLName").val(val);
				return required;
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 25) {
					$(".EditUserData").attr("disabled", true);
					$("#inputUserLastNameCunt").css("display","none");
					return "Invalid length**";
				}
				else if (letters.test(val) && val.length<=25) {
					$(".EditUserData").removeAttr("disabled");
					$("#inputUserLastNameCunt").css("display","block");

					var val_data = $("#EditUserLName").val();
					val_data = val_data.trimStart().trimEnd();
					$("#EditUserLName").val(val_data);
					return success;
				}
				else{
					$(".EditUserData").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return alphabets;
				}
			}
		}

		function EditUserPhone(){
			var val = $("#EditUserPhone").val();
			val = val.trim();
			if (!val) {
				$(".EditUserData").attr("disabled", true);
				// $("#EditUserPhone").val(val);
				return required;
			}
			else{
				var letters = /^\(?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val)) {
					$(".EditUserData").removeAttr("disabled");
					//$("#inputNewToolNameCunt").css("display","none");

					// var val_data = $("#EditUserPhone").val();
					// val_data = val_data.trimStart().trimEnd();
					// $("#EditUserPhone").val(val_data);
					return success;
				}
				else{
					$(".EditUserData").attr("disabled", true);
					//$("#inputNewToolNameCunt").css("display","none");
					return "*Invalid phone number";
				}
			}
		}

		function EditUserDesignation(){
			var val = $("#EditUserDesignation").val();
			val = val.trim();
			if (!val) {
				$(".CreateUser").attr("disabled", true);
				$("#EditUserDesignation").val(val);
				return required;
			}
			else{
				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();

				var letters = /^[a-z][a-z\s]*$/;
				val = val.trim();
				val = val.toLowerCase();
				if (letters.test(val) && val.length > 50) {
					$(".EditUserData").attr("disabled", true);
					$("#EditUserDesignationCunt").css("display","none");
					return "Invalid length*";
				}
				else if (letters.test(val) && val.length<=50) {
					$(".EditUserData").removeAttr("disabled");
					$("#EditUserDesignationCunt").css("display","block");

					var val_data = $("#EditUserDesignation").val();
					val_data = val_data.trimStart().trimEnd();
					$("#EditUserDesignation").val(val_data);
					return success;
				}
				else{
					$(".EditUserData").attr("disabled", true);
					$("#EditUserDesignationCunt").css("display","none");
					return "*Alphabets only allowed";
				}
			}
		}


// Charecter Count
var text_max = 25;
$('#EditUserFNameCunt').html('0 / ' + text_max);
$('#EditUserFName').keyup(function() {
  var text_length = $('#EditUserFName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#EditUserFNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#EditUserFName').val($('#EditUserFName').val().substring(0,25));

		var text_remaining = $('#EditUserFName').val().length;
	 	$('#EditUserFNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

$('#EditUserLNameCunt').html('0 / ' + text_max);
$('#EditUserLName').keyup(function() {
  var text_length = $('#EditUserLName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 25) {
	 	var text_remaining = text_length;
	 	$('#EditUserLNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#EditUserLName').val($('#EditUserLName').val().substring(0,25));

		var text_remaining = $('#EditUserLName').val().length;
	 	$('#EditUserLNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

var text_max_val = 50;
$('#EditUserDesignationCunt').html('0 / ' + text_max_val);
$('#EditUserDesignation').keyup(function() {
  var text_length = $('#EditUserDesignation').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#EditUserDesignationCunt').html(text_remaining + ' / ' + text_max_val);
	}
	else{
		$('#EditUserDesignation').val($('#EditUserDesignation').val().substring(0,50));

		var text_remaining = $('#EditUserDesignation').val().length;
	 	$('#EditUserDesignationCunt').html(text_remaining + ' / ' + text_max_val);
	}
});


// opertor forgot password

function operator__forgot_password(){
	var pass_leng = "*Password must be atleast 5 characters long";
	var val = $('#forgot_pass').val();
	val = val.trim();
	if (!val) {
		$('.forgot_pass_siteadmin').attr("disabled",true);
		$('#forgot_pass').html(val);
		return required;
	}else{
		val_leng = val.length;
		var pattern = /^[0-9a-zA-Z]{5,}$/;
		if (pattern.test(val)) {
			var val_data = $('#forgot_pass').val();
			val_data = val_data.trimStart().trimEnd();
			$('#forgot_pass').val(val_data);
			$('.forgot_pass_siteadmin').removeAttr("disabled");
			return success;
			
			
		}else{
			$('.forgot_pass_siteadmin').attr("disabled",true);
			return pass_leng;			
		}
	}
}

$('#forgot_pass').on('blur',function(){
    var x =operator__forgot_password();
   $("#op_new_pass_err").html(x);
});

function operator__forgot_confirm_password(){
	var pass_leng = "*Password must be	 atleast 5 characters long";
	var val = $('#forgot_confirm_pass').val();
	val = val.trim();
	if (!val) {
		$('.forgot_pass_siteadmin').attr("disabled",true);
		$('#forgot_confirm_pass').html(val);
		return required;
	}else{
		val_len = val.length;
		var pattern = /^[0-9a-zA-Z]{5,}$/;
		if (pattern.test(val)) {
			var val_data = $('#forgot_confirm_pass').val();
			val_data = val_data.trimStart().trimEnd();
			$('#forgot_confirm_pass').html(val_data);
			$('.forgot_pass_siteadmin').removeAttr("disabled");
			return success;
		}else{
			$('.forgot_pass_siteadmin').attr("disabled",true);
			return pass_leng;
		}
	}
}


$('#forgot_confirm_pass').on('blur',function(){
    var x = operator__forgot_confirm_password();
   $("#op_confirm_pass_err").html(x);
});