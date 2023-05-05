<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OEE Monitoring</title>
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/img/Myproject.png" type="image/x-icon">

    
    <!--Link For Bootstrap -->
    <link href="<?php echo base_url()?>/bootstrap_5.1.3/dist/css/bootstrap.min.css?version=<?php echo rand(); ?>" rel="stylesheet">
    <script src="<?php echo base_url() ?>/bootstrap_5.1.3/dist/js/bootstrap.min.js?version=<?php echo rand(); ?>"></script>
    
    <!--Link For CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/login.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/production.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management_sub.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_size.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/user_management.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/sidemenubar.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings_sub.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/general_settings.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_sub.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css?version=<?php echo rand(); ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/main.css?version=<?php echo rand(); ?>">

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
        color:red;
        margin-bottom:100px;
        padding-left:1px;
    }

    #login-mach{
       height: 3rem;
       width: 12rem;
    }
    #alert_msg{
        padding: 0;
        margin: 0;
    }
    /* for microsoft edge pasword field default icon remove */
    input::-ms-reveal,
    input::-ms-clear {
        display: none;
    }
    .savebtn:hover{
        color:black;
        font-weight:495;
    }
</style>

</head>
<body>
<?php $validation =  \Config\Services::validation(); ?>

<div class="container main-container">
        <div class="img-div">
            <img id="login-mach" src="<?php echo base_url()?>/assets/img/logo.png?version=<?php echo rand(); ?>" alt="SmartTech Logo">
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
                <form method="post" id="login_form_submit" action="<?= base_url('Operator/verify_login')?>" >
                    <div class="box">
                        <div class="input-box fieldStyle">
                            <input type="text" class="form-control input" id="op_username" name="op_username" autocomplete="off" oninput="this.value=this.value.trim();" >
                            <label for="input" class="input-padding">User ID <span class="required_design">*</span>     </label>
                            <span class="text-danger user_validate" style="letter-spacing:0.8px;font-size:15px;" id="op_userid_err"><?= $validation->getError('username'); ?></span> 
                        </div>
                    </div>
                    <div class="box">
                        <div class="input-box fieldStyle">
                            <input type="password" class="form-control input" id="op_pass" name="op_pass" oninput="this.value=this.value.trim();" autocomplete="off" style="padding-right:2rem;">
                            <label for="input" class="input-padding">Password <span class="required_design">*</span></label>
                            <span class="unit"><i id="eye-pass" class="fa fa-eye-slash clip showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                            <span class="text-danger" style="letter-spacing:0.8px;font-size:15px;" id="ou_pass_err"><?= $validation->getError('userpassword'); ?></span>
                        </div>
                    </div>
                    <div class="" style="display:flex;padding:1rem;padding-left:1.5rem;font-family:'Roboto', sans-serif';">
                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Remember me
                            </label>
                        </div> -->
                    </div>
                    <input type="submit" name="Login_Verify" class="btn submit savebtn float-end" value="Login" id="operator_login">  
                </form>
            </div>
        </div>
    </div>
    <script>

        // header javascript title 
        let doc_title = document.title;
        window.addEventListener("blur",()=>{
            document.title="SmartMach";
        });

        window.addEventListener("focus",()=>{
            document.title = doc_title;
        });


        // password validation function definition
        function login_pass(){
            var required="*Required field";
            var valid_pass = "*Password must be atleast 5 character long";
            var success= "";
            var val = $('#op_pass').val();
            console.log("operator_login");
            console.log(val);
            val = val.trim();
            if (!val) {
                $('#operator_login').attr("disabled",true);
                $('#op_pass').val(val);
                return required;
            }else{
                var pass_leng = val.length;
                if (parseInt(pass_leng) > 5) {
                    $('#operator_login').removeAttr("disabled");
                    var val_data= $('#op_pass').val();
                    val_data = val_data.trimStart().trimEnd();
                    $('#op_pass').val(val_data);

                    return success;
                }else{
                    $('#operator_login').attr("disabled",true);
                    return valid_pass;
                }
            }
        }

        // user id function
        function userid_ou(){
            var required="Required Field";
            var valid_userid = "Password must be atleast 10 character long"
            var success = "";
            var value_ou = $('#op_username').val();
            console.log("operator login");
            console.log(value_ou);
            if (!value_ou) {
                $('#operator_login').attr("disabled",true);
                $('#op_username').val(value_ou);
                return required;
            }else{
                var userid_leng = value_ou.length;
                if (parseInt(userid_leng)>=10) {
                    $('#operator_login').removeAttr("disabled");
                    var val_data = $('#op_username').val();
                    val_data = val_data.trimStart().trimEnd();
                    $('#op_username').val(val_data);
                    return success;
                }else{
                    $('#operator_login').attr("disabled",true);
                    return valid_userid;
                }
            }
        }

        // password onblur function
        $(document).on('blur','#op_pass',function(event){
            event.preventDefault();
            var x = login_pass();
            $('#ou_pass_err').text(x);

        });

        // user id onblur function
        $(document).on('blur','#op_username',function(event){
            event.preventDefault();
            // alert('ji');
            var x = userid_ou();
            $('#op_userid_err').text(x);
        });

        $(document).ready(function(){
            var demo = "<?php echo  $result; ?>";
            demo = demo.trim();
            console.log("opertor alert msg");
            console.log(demo);
            if (demo!="") {
                if (demo === "method_error") {
                    $('#alert_check').removeClass('d-inline');
                    $('#alert_check').addClass('d-none');
                }else{
                    $('#alert_check').removeClass('d-none');
                    $('#alert_check').addClass('d-inline');
                    var err ="";
                    if (demo === "new_user") {
                        err = "New User Please Register";
                    }
                    else if(demo === "password_mismatched"){
                        err = "Password Mismatched";
                    }
                    else if(demo === "method_error"){
                    
                    }
                    else if (demo === "inactive_user") {
                        err = "Inactive User Please conduct your Site user";
                    }

                    $('#alert_msg').html(err);
                } 
            }else{
                $('#alert_check').removeClass('d-inline');
                $('#alert_check').addClass('d-none'); 
            }
           
            // alert(demo);
            $(document).on('click','.showpass',function(){
                var pass = $("#op_pass").prop('type');
                if(pass === 'password'){
                    $("#op_pass").prop('type','text'); 
                    $('#eye-pass').attr('class','fa fa-eye showpass clip');
                }
                else{
                    $("#op_pass").prop('type','password');
                    $('#eye-pass').attr('class','fa fa-eye-slash showpass clip');
                }
            });
        });
    </script>
</body>
</html>