<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Smartories Login Page</title> -->
    <title>OEE Monitoring!</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/img/Myproject.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Link For Bootstrap -->
    <link href="<?php echo base_url()?>/bootstrap_5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.min.js"></script>
    
    <!--Link For CSS-->
    
    <!-- CSS STANDARDS START-->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/config.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/template.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/standard/layout.css?version=<?php echo rand() ; ?>">
    <!-- CSS STANDARDS END-->

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

    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/config.css?version=<?php echo rand(); ?>">

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
<style>
     .required_design{
        color:var(--required_font_color);
        margin-bottom:100px;
        padding-left:1px;
     }

     /* for microsoft edge pasword field default icon remove */
     input::-ms-reveal,
      input::-ms-clear {
        display: none;
      }

      #login-mach{
        height: 3rem;
        width: 12rem;
      }
      #alert_msg{
        padding: 0;
        margin: 0;
      }
</style>
</head>
<body>

    <?php $validation =  \Config\Services::validation(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-3"></div>
            <div class="col-lg-4 col-md-6 col-sm-12">                
                <div class="img-div">
                    <img id="login-mach" src="<?php echo base_url()?>/assets/img/logo.png?version=<?php echo rand() ; ?>" alt="SmartMach Logo">
                </div>

                <br>
                <div id="alert_check" class="d-none">
                    <div class="alert alert-danger" id="alert_change" role="alter">
                        <p id="alert_msg" class="text-center"></p>
                    </div>
                </div>
  
                <br>
                <div class="innner-div">
                    <div class="card main-card">
                        <h2 class="fieldsetName">Sign in</h2>
                        <form method="post" id="login_form_submit" action="<?= base_url('Login/verifyUser/')?>" >
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="email" class="form-control input" id="username" name="username" autocomplete="off" oninput="this.value=this.value.trim();" >
                                    <label for="input" class="input-padding">User ID <span class="required_design">*</span>     </label>
                                    <span class="text-danger user_validate" style="letter-spacing:0.8px;font-size:15px;" id="user_mail_err"><?= $validation->getError('username'); ?></span>
                                    
                                </div>
                            </div>
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="password" class="form-control input" id="userpassword" name="userpassword" oninput="this.value=this.value.trim();" autocomplete="off" style="padding-right:2rem;">
                                    <label for="input" class="input-padding">Password <span class="required_design">*</span></label>
                                    <span class="unit"><i id="eye-pass" class="fa fa-eye-slash clip showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="text-danger" style="letter-spacing:0.8px;font-size:15px;" id="pass_err"><?= $validation->getError('userpassword'); ?></span>
                                </div>
                            </div>
                            <div class="" style="display:flex;padding:1rem;padding-left:1.5rem;font-family:'Roboto', sans-serif';">
                            </div>
                            <input type="submit" name="Login_Verify" class="btn fnt_fam btn_fnt_size btn_padd btn_save mr_login submit float-end" value="Login" id="login_submit">  
                        </form>
                    </div>
                </div>
                <div class="" style="display:flex;flex-wrap;flex-direction:row-reverse; color:blue;font-weight:450;padding-right:2.5rem;padding-top:1.2rem; " >
                    <a href="javascript:void(0)" style="font-family:'Roboto', sans-serif;text-decoration: none;color:#659FFF;" class="click_forgot" id="forgot_link_disabled">Forgot Password?</a>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 "></div>
        </div>
    </div>
    
</body>
</html>

<script type="text/javascript">
    // document title

    let doc_title = document.title;
    window.addEventListener("blur",()=>{
        document.title="SmartMach!";
    });

    window.addEventListener("focus",()=>{
        document.title = doc_title;
    });

    



     $(document).ready(function(){

        var user_status = "<?php echo $inactive;?>";
        user_status = user_status.trim();
        if(user_status!=""){
            $('#alert_check').removeClass('d-none');
            $('#alert_check').addClass('d-inline');
            var err ="";
            if(user_status == "inactive_user"){
                err = "*Inactive user, Please contact the admin";
            }
            else if (user_status == "Invalid_password") {
                err = "*Invalid Password"
            }else if(user_status == "new_user"){
                err = "*User doesn't exist"
            }
            $('#alert_msg').html(err);
        }

        // $('.display_forgot').css("display","none");
        $(document).on('click','.showpass',function(event){
            event.preventDefault();
            // alert('ok');
            var pass = $("#userpassword").prop('type');
           
            var element = document.getElementById("eye-pass");
            if(pass == 'password'){
               $("#userpassword").prop('type','text'); 
                element.classList.remove("fa-eye-slash");
                element.classList.add("fa-eye");
            }
            else{
                $("#userpassword").prop('type','password');
                element.classList.remove("fa-eye");
                element.classList.add("fa-eye-slash");
            }
        });



        $('#login_submit').submit(function(event){
            event.preventDefault();
            // $('#login_form_submit').submit(false);
            // $('#login_form_submit').attr('onsubmit','return false;');
            var a = login_mail_check();
            var b = login_pass();

            if (a!="" || b!="") {
                $('#user_mail_err').html(a);
                $('#pass_err').html(b);
            }else{
                // $('#login_form_submit').submit();
                
                return;
                // $('#login_form_submit').attr('onsubmit','return true;');
            }
            

        });
       
        function login_pass(){
            var required="*Required field";
            var valid_pass = "*Password must be atleast 5 character long";
            var success= "";
            var val = $('#userpassword').val();
            val = val.trim();
            if (!val) {
                $('#login_submit').attr("disabled",true);
                $('#userpassword').val(val);
                return required;
            }else{
                var pass_leng = val.length;
                if (parseInt(pass_leng) > 5) {
                    $('#login_submit').removeAttr("disabled");
                    var val_data= $('#userpassword').val();
                    val_data = val_data.trimStart().trimEnd();
                    $('#userpassword').val(val_data);

                    return success;
                }else{
                    $('#login_submit').attr("disabled",true);
                    return valid_pass;
                }
            }
        }
        
        function login_mail_check(){
            var required="*Required field";
            var valid_mail = "*Invalid User ID";
            var success = "";
            var val_mail = $('#username').val();

            val_mail = val_mail.trim();
            if (!val_mail) {
                $('#username').val(val_mail);
                $('#login_submit').attr("disabled",true);
                $('#forgot_link_disabled').attr("disabled",true);
                return required;

            }else{
                var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                val_mail = val_mail.trim();
                if(letters.test(val_mail)){
                    $('#login_submit').removeAttr("disabled");
                    $('#forgot_link_disabled').removeAttr("disabled");

                    var val_data = $('#username').val();
                    val_data = val_data.trimStart().trimEnd();
                    $('#username').val(val_data);
                    return success;
                }else{
                    $('#login_submit').attr("disabled",true);
                    $('#forgot_link_disabled').attr("disabled",true);
                    return valid_mail;
                }
            }
        }

        $('#username').on('blur',function(){
            var x =login_mail_check();
            $("#user_mail_err").html(x);
        });

        $('#userpassword').on('blur',function(){
            var x = login_pass();
            $('#pass_err').html(x);
        });

       


            // $("form").validate({
            //     rules: {
            //         name : {
            //             required: true,
            //             minlength: 3
            //         },
            //         age: {
            //             required: true,
            //             number: true,
            //             min: 18
            //         },
            //         email: {
            //             required: true,
            //             email: true
            //         }
            //     }
            // });



     });

    //  forgot password
    $(document).on('click','.click_forgot',function(){

        var username = $('#username').val();
       if (username) {

            $.ajax({
                url:"<?php echo base_url('Login/forgot_password_link') ?>",
                method:"POST",
                data:{username:username},
                success:function(res){
                    // alert(res);
                    // if (res !== "output") {
                    //     //alert('new user');
                    //     $('#alert_check').removeClass('d-none');
                    //     $('#alert_check').addClass('d-inline');
                    //     $('#alert_change').removeClass('alert-success');
                    //     $('#alert_change').addClass('alert-danger');
                    //     $('#alert_msg').html('Please Register its New User....!');


                    // }else{
                    //     //alert('existing user');
                    //     $('#alert_check').removeClass('d-none');
                    //     $('#alert_check').addClass('d-inline');
                    //     $('#alert_change').removeClass('alert-danger');
                    //     $('#alert_change').addClass('alert-success');
                    //     $('#alert_msg').html('Please Check Your Mail ID....!');
                  
                    // }

                    checking_function(res);
                        
                   
                       
                    // alert(res);
                   
                },
                error:function(err){
                    alert('Pleasr try again.');
                }
            });
           
            
       }else{
            $('#alert_check').removeClass('d-none');
            $('#alert_check').addClass('d-inline');
            $('#alert_msg').html("*User ID is required");
       }

    });

    // checking function
    function checking_function(res){
        var text = res.trim();
        $('#back_end_msg').css("display","none");
        var color = "";
        if (text == "output") {
            // alert('existing user');
            $('#alert_check').removeClass('d-none');
            $('#alert_check').addClass('d-inline');
            $('#alert_change').removeClass('alert-success');
            $('#alert_change').removeClass('alert-danger');
            // $('#alert_change').addClass('alert-success');
            color = "alert-success";
            $('#alert_msg').html('*Reset password link has been send to your registered mail address. Kindly check your mail.');
        }
        else if(text === "inactiveforgot"){
            $('#alert_check').removeClass('d-none');
            $('#alert_check').addClass('d-inline');
            $('#alert_change').removeClass('alert-success');
            $('#alert_change').removeClass('alert-danger');
            // $('#alert_change').addClass('alert-success');
            color = "alert-danger";
            $('#alert_msg').html('*Inactive user, Please contact the admin');
        }
        else if(text === "password"){
            $('#alert_check').removeClass('d-none');
            $('#alert_check').addClass('d-inline');
            $('#alert_change').removeClass('alert-danger');
            $('#alert_change').removeClass('alert-success');
            // $('#alert_change').addClass('alert-success');
            color = "alert-success";
            $('#alert_msg').html('*Kindly set the password. Password generation link has been send to your registered mail id.');
        }
       else if(text === "false"){
            // alert('new user');
            $('#alert_check').removeClass('d-none');
            $('#alert_check').addClass('d-inline');
            $('#alert_change').removeClass('alert-danger');
            $('#alert_change').removeClass('alert-success');
            // $('#alert_change').addClass('alert-danger');
            color = "alert-danger";
            $('#alert_msg').html("*User doesn't exist"); 
       }

       $('#alert_change').addClass(color);

    }


</script>
