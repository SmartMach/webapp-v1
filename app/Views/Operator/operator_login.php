<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Login</title>
    
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
<style></style>

</head>
<body>
<?php $validation =  \Config\Services::validation(); ?>
<div class="container main-container">
        <div class="img-div">
            <img id="" src="<?php echo base_url()?>/assets/img/logo.png" alt="SmartTech Logo">
        </div>
        <br>
        <div class="innner-div">
            <div class="card main-card">
                <h2 class="fieldsetName">Sign in Operator</h2>
                <form method="post" action="<?= base_url('Operator/');?>" >
                    <div class="box">
                    <div class="input-box">
                        <input type="text" class="form-control input" id="userName" name="UserName">
                        <label for="input" class="input-padding">User Id</label>
                        <span class="text-danger"><?= $validation->getError('UserName'); ?></span>

                    </div>
                    </div>
                    <div class="box">
                        <div class="input-box">
                            <input type="password" class="form-control input" id="UserPassword" name="UserPassword">
                            <label for="input" class="input-padding">Password</label>
                            <span class="unit"><i class="fa fa-eye-slash clip showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                            <span class="text-danger"><?= $validation->getError('UserPassword'); ?></span>

                        </div>
                    </div>
                    <input type="submit" name="Login_Verify" class="btn submit savebtn float-end" value="Login">
                </form>
            </div>
        </div>
    </div>
    <script>
         $(document).ready(function(){
        $(document).on('click','.showpass',function(){
            var pass = $("#UserPassword").prop('type');
            if(pass == 'password'){
               $("#UserPassword").prop('type','text'); 
            }
            else{
                $("#UserPassword").prop('type','password');
            }
        });
    </script>
</body>
</html>