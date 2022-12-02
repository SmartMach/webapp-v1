<!DOCTYPE html>
<html>
<head>
	<title>Create Password</title>
	<!--Link For Bootstrap -->
    <link href="<?php echo base_url()?>/bootstrap_5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.min.js"></script>
    
    <!--Link For CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/production.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management_sub.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_size.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/sidemenubar.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings_sub.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_sub.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/main.css">

    <!--Link For FONTS-->
    <link href="<?php echo base_url()?>/assets/fonts/Roboto/Roboto-Black.ttf" rel="stylesheet">

    <!--Script For Menu-Ellipsis Vertical Icon-->
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUC"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style type="text/css">

</style>
<body>
	<div class="container main-container">
		<div class="img-div">
			<img id="" src="<?php echo base_url()?>/assets/img/logo.png" alt="SmartTech Logo">
		</div>
		<br>
		<div class="innner-div">
			<div class="card main-card">
				<h2 class="fieldsetName">Create Password</h2>
				<form method="post" class="addMachineForm" action="<?= base_url('Login/creation_password/')?>" >
					<div class="box " style="margin-bottom:2rem;">
	                <div class="input-box fieldStyle" >
	                    <input type="password" class="form-control input" id="newPassword" name="newPassword" oninput="this.value=this.value.trim()" style="padding-right:2rem;">
	                    <label for="input" class="input-padding">New Password<span class="paddingm validate">*</span></label>
	                    <span class="unit"><i class="fa fa-eye-slash clip showpass" id="new_pass_change" style="font-size: 20px;" aria-hidden="true"></i></span>
                        <span class="paddingm float-start validate" id="new_pass_err" ></span> 
                    </div>
		            </div>
		            <div class="box" style="margin-bottom:2rem;">
		                <div class="input-box fieldStyle">
		                    <input type="password" class="form-control input" id="confirmPassword" name="confirmPassword" oninput="this.value=this.value.trim();" style="padding-right:2rem;">
		                    <label for="input" class="input-padding">Confirm Password<span class="paddingm validate">*</span></label>
                            <span class="unit"><i class="fa fa-eye-slash clip showrepass" id="re_pass_change" style="font-size: 20px;" aria-hidden="true"></i></span>
                            <span class="paddingm float-start validate" id="confirm_pass_err" ></span> 
                        </div>
		            </div>
		            <button type="submit" name="submit" class="btn submit btn-primary savebtn float-end" id="submit_pass" style="">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
        // new password
        $(document).on('blur','#newPassword',function(){
            var password_check = $('#newPassword').val();
            password_check = password_check.trim();
            if (password_check == "") {
                $('#new_pass_err').html("Required field");
                $('.submit').attr("disabled",true);
            }else{
                var pass_leng = password_check.length;
                if (parseInt(pass_leng)>5) {
                    $('#new_pass_err').html(" ");
                    $('.submit').removeAttr("disabled");
                }else{
                    $('#new_pass_err').html("*Password must be atleast 5 characters long");
                    $('.submit').removeAttr("disabled");
                }
               
            }
        });

        // validation
        $(document).on('blur','#confirmPassword',function(){
            var password_check = $('#confirmPassword').val();
            if (password_check == "") {
                $('#confirm_pass_err').html("Required field");
                $('.submit').attr("disabled",true);
            }else{
                password_check = password_check.trim();
                var pass_leng = password_check.length;
                if (pass_leng>5) {
                    $('#confirm_pass_err').html(" ");
                    $('.submit').removeAttr("disabled");
                }else{
                    $('#confirm_pass_err').html("*Password must be atleast 5 characters long");
                    $('.submit').attr("disabled",true);
                }
               
            }
        });

        // password icon
		$(document).on('click','.showpass',function(){
           // alert();
            var pass = $("#newPassword").prop('type');
            var icon = document.getElementById('new_pass_change');
            if(pass == 'password'){
               $("#newPassword").prop('type','text');
               icon.classList.add('fa-eye');
               icon.classList.remove('fa-eye-slash');
            //    $('#confirmPassword').prop('type','text');
            }
            else{
                // $('#confirmPassword').prop('type','password');
                $("#newPassword").prop('type','password');
                icon.classList.add('fa-eye-slash');
               icon.classList.remove('fa-eye');
            }
        });
        // new retype password
        $(document).on('click','.showrepass',function(){
            var pass = $("#confirmPassword").prop('type');
            var icon = document.getElementById('re_pass_change');
            if(pass == 'password'){
            //    $("#newPassword").prop('type','text'); 
               $('#confirmPassword').prop('type','text');
               icon.classList.remove('fa-eye-slash');
               icon.classList.add('fa-eye');
            }
            else{
                $('#confirmPassword').prop('type','password');
                icon.classList.remove('fa-eye');
               icon.classList.add('fa-eye-slash');
                // $("#newPassword").prop('type','password');
            }
        });
		$(document).on('click','.submit',function(){
			var newPass = $('#newPassword').val();
			var confirmPass = $('#confirmPassword').val();
            newPass = newPass.trim();
            confirmPass = confirmPass.trim();
            if ((newPass!="") && (confirmPass!="")) {
                var pass_leng = newPass.length;
                var pass_leng1 = confirmPass.length;
                if ((newPass === confirmPass) && (parseInt(pass_leng)>5) && (parseInt(pass_leng1)>5)) {
				    // 
                    var condition = $('.submit').val();
                    if(condition == "disabled"){
                        document.getElementById("submit_pass").submit();
                        // $.ajax({
                        //     url: "<?php echo base_url('Login/creation_password'); ?>",
                        //     type: "POST",
                        //     data: {
                        //     	newPass:newPass,
                        //     },
                        //     success:function(res){
                        //     	alert(res);
                        //         //location.reload();
                        //         //alert("Data has been updated successfully!");
                        //     },
                        //     error:function(res){
                        //         alert("Sorry!Try Agian!!");
                        //     }
                        // });
                    }
                }
                else{
                    // alert("Password Mismatch"); 
                    $('#new_pass_err').html("*Password Mismatch");
                    $('#confirm_pass_err').html("*Password Mismatch");
                    $('.submit').attr("disabled",true);
                } 
            }else{
                $('#new_pass_err').html("*Required field");
                $('#confirm_pass_err').html("*Required field");
                $('.submit').attr("disabled",true);
            }
			
		});
	});
</script>