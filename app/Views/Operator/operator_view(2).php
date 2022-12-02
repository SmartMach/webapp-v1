<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/operator1.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
     <!--Link For CSS-->
     <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model_size.css">
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
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/financial_metrics_new.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<style>
/* .field_lbl{
    margin-top: -1rem;
    padding-left: 2rem;
    font-size: 1rem;
    background-color: rgb(1,171,78);
    width: 10%;
    font-family: 'Roboto' , sans-serif;
} */
.target_bar{
    top:2px;
    height: 15rem;
    color: white;
    margin-right:1.5rem; 
    width: max-content;
    float:right;
    margin-top:1rem;
    margin-left:2rem;
       
}
.fdflex{
    display: flex;
}
.fz{
    font-size:1rem;
    color:white;
    margin:auto;

}
.text-small{
    font-size:1rem;
    color:white;
    text-align:center;
    justify-content:center;
    align-items:center;
    margin-bottom:0;
}
.text2{
    font-size:1.6rem;
    color:white;
    text-align:center;
    justify-content:center;
    align-items:center;
    
}
.margin-top{
    margin-top:1rem;
}
.cr-text{
    font-size:1rem;
    text-align:center;
    margin-top:1.6rem;
    color:white;
    font-weight:bold;
}
.bar-tex{
    font-size:1rem;
    font-weight:bold;
    color:white;

}
.row1{
    display:flex;
}
/* .field_set{
    /* margin-left: 1rem; *
   display:grid;
    border: 2px solid black;
    border-radius: 0.5rem;
    height: fit-content;
    width: 40%;
    margin-left: 2rem;
} */
.center-align{
    display:flex;
    align-items:center;
    justify-content:center;
}
.col3{
    width:35%;
    height:15rem;
    border:2px solid grey;
    
}
.col6f{
    float:left;
    width:65%;
    /* border:2px solid grey; */
}
.margin-fieldset{
    /* margin-top:-0.8rem; */
    color:white;
    width:fit-content;
    margin-left:0.4rem;
    background-color:green;
    /* position: relative; */
}
.goal{
    margin-top:-0.8rem;
    background-color:rgb(1,171,78);
    margin-left:1rem;
    width:fit-content;
    height:fit-content;
    position:absolute;
    color:white;
}

.alingCenter{
    display: flex;
    align-items: center;
    justify-content: center;
}
.cssDiv{
    background: #007a37;
    font-weight: bold;
    color: #fff;
    height: 2rem;
}
.endDiv{
    height: 3rem;
    background: #009a4a;
    color: #fff;
    height: 5rem;
    font-weight: bold;
}

/*Fieldset*/
.outer{
    height: 8rem;
    width: 100%;
    border: 1px solid #06a149;
}
.outer .div-box {
  position: relative;
}

.outer  .div-box label {
    position: absolute;
    top: -8px;
    left: 15px;
    color: #fff;
    pointer-events: none;
    font-family: 'Roboto', sans-serif;
    font-size:12px;
    font-weight: bold;
    margin-bottom: 0px;
    margin-top: 0px;
}
.flexDiv{
    display: flex;
}
.titleTag
{
    font-family: 'Roboto', sans-serif;
    font-size:12px;
}
.marginTop{
    margin-top: 0.1rem;
}

.KeyboardBtn{
    background: black;
    padding: 2px 20px;
    margin: 5px;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    font-size: 20px;
}

</style>

</head>
<body class="parallax" style="background-color:rgb(1,171,78);">
    
    <!-- <div class="flex_container_operator">
        <div class="client_logo"><p>Client Logo</p></div>
        <div class="text_flex">Powered By</div>
        <img src="<?php echo base_url(); ?>/assets/img/smartories_logo.png" class="img_logo" alt="">
        <div class="dropdown">dropdown</div>
        <div class="shft">Sift Date <br><p class="text">29/03/2022</p></div>
        <div class="shft">Shift<br> <p class="text">ShiftA</p></div>
        <div class="shft_time">Start <br> <p class="text">6:00Am</p></div>
        <div class="shft_icon"><i class="fas fa-arrow-right fa-2x "></i></div>
        <div class="shft_etime">End<br> <p class="text">2:00PM</p></div>
        <div class="info"><img src="<?php echo base_url(); ?>/assets/img/nav_settings_user.png" class="img_right" alt=""></div>
    </div>
   <br>
   <div class="flex-header2"></div>
   <!-- NEXT LINE machine id and part id --
    <div class="flex_container">
        <div class="item1">
            <p>IMO1 <br> <span class="bold">PartName 1</span></p>
            
        </div>
        <div class="item2">
            <span class="fl">.</span><span class="float-right"> 30m  &nbsp; Active</span> 
            <br>
            <div class="flex-btn">
                <div class="btn-op">CORRECTIONS</div>
                <div class="btn-op">DOWNTIME</div>
                <div class="btn-op">REJECT PART</div>
            </div>
        </div>
    
        <!-- graph entering --
        <div class="goal">
            <div class="legend1">GOALS</div>
            <fieldset class="fieldset1">
                <!-- <h2>welcome to graph</h2> --
                <br>
                <div class="box">
                    <div class="skill">
                        <div class="inner">
                            <span class="text-small">parts completion<span>
                            <div id="number" class="text-center"></div>
                        </div>               
                        <svg  version="1.1" width="200px" height="200px">
                            <defs>
                                <linearGradient id="GradientColor">
                                    <stop offset="0%" stop-color="yellow" />
                                    <stop offset="100%" stop-color="yellow"/>
                                </linearGradient>
                            </defs>
                            <circle cx="90" cy="80" r="75" stroke-linecap="round"/>    
                        </svg>
                    </div>
                </div>
            </fieldset>
        </div>
  
    </div>    -->
  
  
  <?php require_once 'operator_header.php'; ?>
    <div class="grid-header container-fluid" style="">
       <div class="mid">
            <p class="left_margin paddingm textid" >IM01</p>
            <P class="left_margin paddingm part-text">PartName01</P>
        </div>
        <div class="mid1">
            <p class="paddingm right_margin textp"><i class="fa fa-circle fa-size"></i> 30m &nbsp; Active</span></p>
        </div> 
    </div>

    <div class="group-btn">
       
       
        <div class="btng ">CORRECTIONS</div>
        <div class="btng" data-bs-toggle="modal" data-bs-target="#RejectPartsModal">REJECT PART</div>
        <div class="btng active">DOWNTIME</div>
    </div>
    <br>
    <div class="" style="height:content-height;margin-left: 2rem;margin-right: 2rem;">
            <div class="flexDiv">
                    <div class="outer" style="width: 35%;height:18rem;">
                        <div class="div-box">
                            <label>GOALS</label>
                        </div>
                        <div class="flexDiv">
                            <div class="" style="width: 65%;">
                                Circular Bar
                            </div>
                            <div class="" style="width: 35%;">
                                <div class="center-align" style="">
                                    <div class="target_bar" style=""> 
                                        <p class="text-small">Target &nbsp;&nbsp; <span class="text2">320</span></p>
                                        <div class="target_outline">
                                            <div class="target_inline">40%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="outer" style="width: 65%;">
                        <div class="div-box">
                            <label>TIMELINE</label>
                        </div>
                    </div>
            </div>
        </div>
        <div style="display:flex;margin-top: 1rem;height: 10rem;">
            <div style="width:35%">
                <div style="display: flex;">
                    <div style="float:left;width: 30%">
                        <div class="alingCenter cssDiv"><p class="paddingm">Downtime</p></div>
                        <div class="alingCenter endDiv"><p>4h 33m</p></div>
                    </div>
                    <div style="float:left;width: 30%;margin-left: 1rem;">
                        <div class="alingCenter cssDiv"><p class="paddingm">Cycle Time</p></div>
                        <div class="alingCenter endDiv"><p>40s</p></div>
                    </div>
                    <div style="float:left;width: 30%;margin-left: 1rem;">
                        <div class="alingCenter cssDiv"><p class="paddingm">Reject Counts</p></div>
                        <div class="alingCenter endDiv"><p>25</p></div>
                    </div>
                </div>
            </div>
            <div style="width:65%">
                <div class="outer">
                    <div class="div-box">
                        <label>EFFICIENCY</label>
                    </div>
                    <div style="display: flex;">
                        <div style="flex: left;width: 20%;">
                            
                        </div>
                        <div style="flex: left;width: 20%;">
                            <div><b>A</b>vailability</div>
                            <div>92%</div>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <div><b>P</b>erformance</div>
                            <div>80%</div>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <div><b>Q</b>uality</div>
                            <div>88%</div>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <div class="alingCenter cssDiv"><p class="paddingm">Reject Counts</p></div>
                            <div class="alingCenter endDiv"><p>25</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- <div class="modal fade" id="RejectPartsModal" tabindex="-1" aria-labelledby="RejectPartsModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="RejectPartsModal1" style="">REJECT PARTS</h5>
            </div> 

            <div class="modal-body">
                <div class="flexDiv">
                    <div style="float: left;width: 40%;">
                        <div class="flexDiv">
                            <div style="float: left;width: 50%">
                                <p class="paddingm titleTag">Shift Date</p>
                                <p class="paddingm marginTop">29 jan 2022</p>
                            </div>
                            <div style="float: left;width: 50%">
                                <p class="paddingm titleTag">Shift</p>
                                <p class="paddingm marginTop">Shift 1</p>
                            </div>
                        </div>
                        <div class="flexDiv" style="display:flex;align-items: center;height: 4rem;">
                            <div style="float: left;width: 50%">
                                <p class="paddingm titleTag">From Time</p>
                                <p class="paddingm marginTop">10.00AM</p>
                            </div>
                            <div style="float: left;width: 50%">
                                <p class="paddingm titleTag">To Time</p>
                                <p class="paddingm marginTop">4.30PM</p>
                            </div>
                        </div>
                        <div class="alingCenter">
                            <div style="width: 13rem;height: 13rem;background: red;border-radius: 50%;">
                                
                            </div>
                        </div>
                        <div class="alingCenter" style="margin-top: 1rem;">
                            <div class="alingCenter flexDiv" style="border-radius: 5px 5px 5px 5px;border: 1px solid  #d9d9d9">
                                <div style="padding: 0px 20px;border-radius: 5px 5px 5px 5px;background: #e1efff;"><p class="paddingm" style="color: #005bbc;">AM</p></div>
                                <div style="padding: 0px 20px;border-radius: 5px 5px 5px 5px;"><p class="paddingm">PM</p></div>
                            </div>
                        </div>

                    </div>
                    <div style="float: left;width: 60%;">
                        <div class="flexDiv">
                            <div style="float: left;width: 40%">
                                <p class="paddingm titleTag">Part Name</p>
                                <p class="paddingm marginTop">Part Name1</p>
                            </div>
                            <div style="float: left;width: 25%">
                                <p class="paddingm titleTag">Max Rejects</p>
                                <p class="paddingm marginTop">89</p>
                            </div>
                            <div style="float: left;width: 25%">
                                <p class="paddingm titleTag">Total Rejects</p>
                                <p class="paddingm marginTop">0</p>
                            </div>
                        </div>
                        <div class="flexDiv">
                            <div id="settings_div" style="width: 90%;">
                                <div class="row paddingm">
                                    <div class="col marleft" ><p class="title paddingm">REASON</p></div>
                                    <div class="col marright" ><p class="title paddingm">COUNT</p></div>
                                </div>
                            </div>
                            <div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">
                                <div class="dotUser flexDiv" style="align-items: center;justify-content: center;"><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                        <div class="content flexDiv">
                            <div id="settings_div" style="width: 90%;">
                                <div class="row paddingm">
                                    <div class="col marleft" >
                                        <div class="flexDiv" style="align-content: center;width: 100%;">
                                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p>
                                                </div>
                                            <div style="align-items: center;justify-content: center;" class="flexDiv">
                                                <p class="paddingm">Reason 1</p>             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col marright" ><p class="title paddingm">COUNT</p></div>
                                </div>
                            </div>

                            <div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">
                                <div class="flexDiv" style="align-items: center;justify-content: center;font-size: 2rem;"><i class="fa fa-trash"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <input type="submit" class="btn fo bn" name="" value="SAVE" style="color: white;background: #005abc;">
                <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
            </div>
        </div>
    </div>
</div> -->

<div class="modal fade" id="RejectPartsModal" tabindex="-1" aria-labelledby="RejectPartsModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="RejectPartsModal1" style="">REJECT PARTS</h5>
            </div> 

            <div class="modal-body">
                <div class="flexDiv">
                    <div style="float: left;width: 100%;">
                        <div class="flexDiv">
                            <div style="float: left;width: 20%">
                                <p class="paddingm titleTag">Shift Date</p>
                                <p class="paddingm marginTop">29 jan 2022</p>
                            </div>
                            <div style="float: left;width: 20%">
                                <p class="paddingm titleTag">Shift</p>
                                <p class="paddingm marginTop">Shift 1</p>
                            </div>
                            <div style="float: left;width: 20%">
                                <p class="paddingm titleTag">Shift</p>
                                <p class="paddingm marginTop">Shift 1</p>
                            </div>
                        </div>
                        <div class="container flexDiv" style="justify-content: space-between;margin-top: 1rem;">
                            <div class="box">
                                <div class="input-box fieldStyle">      
                                    <input type="text" class="form-control" id="" name="">
                                    <label for="" class="input-padding">Reject Count</label> 
                                </div>
                            </div>
                            <div class="box">
                                <div class="input-box fieldStyle">      
                                    <input type="text" class="form-control" id="inputMachineName" name="inputMachineName">
                                    <label for="inputMachineName" class="input-padding">Reject Reason</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex-container paddingm">
                            <div class="paddingm dividercss" style="width: 25%;">
                                <p class="font alignmargin float-end">Input Keyboard</p>  
                            </div>
                            <div class="float-start dividercss" style="width: 75%;">
                                <hr class="paddingm" style="width: 100%;">
                            </div>
                        </div>

                        <div class="flexDiv" style="justify-content: flex-end;">
                            <div>
                                <div class="flexDiv">
                                    <div class="KeyboardBtn"><p class="paddingm">1</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">2</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">3</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm"></p></div>
                                </div>
                                <div class="flexDiv">
                                    <div class="KeyboardBtn"><p class="paddingm">4</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">5</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">6</p></div>
                                    <div class="KeyboardBtn" style="background:rgb(0,90,188);"><p class="paddingm"></p></div>
                                </div>
                                <div class="flexDiv">
                                    <div class="KeyboardBtn"><p class="paddingm">7</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">8</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">9</p></div>
                                    <div class="KeyboardBtn"><p class="paddingm">0</p></div>
                                </div>
                            </div>
                        </div>
                       <!--  <div class="flexDiv">
                            <div style="width: 10%;float: left;">
                                
                            </div>
                            <div style="width: 30%;float: left;min-width: 12rem;">
                                <div class="reason-box flexDiv" style="align-content: center;">
                                    <div style="width: 30%">
                                        <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                                    </div>
                                    <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                        <p class="paddingm">Reason 1</p>             
                                    </div>
                                </div>
                            </div>
                            <div style="width: 30%;float: left;min-width: 12rem;">
                                <div class="reason-box flexDiv" style="align-content: center;">
                                    <div style="width: 30%">
                                        <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                                    </div>
                                    <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                        <p class="paddingm">Reason 2</p>             
                                    </div>
                                </div>
                            </div>
                            <div style="width: 30%;float: left;min-width: 12rem;">
                                <div class="reason-box flexDiv" style="align-content: center;">
                                    <div style="width: 30%">
                                        <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                                    </div>
                                    <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                        <p class="paddingm">Reason 3</p>             
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="flexDiv">
                            <div style="width: 10%;float: left;">
                                
                            </div>
                            <div style="width: 30%;float: left;min-width: 12rem;">
                                <div class="reason-box flexDiv" style="align-content: center;">
                                    <div style="width: 30%">
                                        <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                                    </div>
                                    <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                        <p class="paddingm">Reason 4</p>             
                                    </div>
                                </div>
                            </div>
                            <div style="width: 30%;float: left;min-width: 12rem;">
                                <div class="reason-box flexDiv" style="align-content: center;">
                                    <div style="width: 30%">
                                        <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                                    </div>
                                    <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                        <p class="paddingm">Reason 5</p>             
                                    </div>
                                </div>
                            </div>
                            <div style="width: 30%;float: left;min-width: 12rem;">
                                <div class="reason-box flexDiv" style="align-content: center;">
                                    <div style="width: 30%">
                                        <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                                    </div>
                                    <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                        <p class="paddingm">Reason 6</p>             
                                    </div>
                                </div>
                            </div>
                            
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
            </div>
        </div>
    </div>
</div>

  

<script type="text/javascript">
    $('#RejectPartsModal').modal('show');
</script>

<script>
    <?php include "circularscripts.php"; ?>
</script>


</body>
</html>