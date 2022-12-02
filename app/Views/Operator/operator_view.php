<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/css/operatorcss.css">
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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    height: 15rem;
    background: #009644;       
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
}
.text2{
    font-size:1.6rem;
    color:white;
    margin-left: 1rem;
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
.smallDivs{
    width: 8rem;
    margin: 0.5rem;
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
    width: 100%;
    border: 1px solid #06a149;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
}

.outer-bottom{
    display: flex;
    justify-content: center;

}

.outer-bottom-con{
    display: flex;
    justify-content: space-between;
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
    width: 5rem;
    height: 3rem;
    margin: 0.7rem;
    border-radius: 5px;
    color: white;
    font-weight: bold;
    font-size: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}
.KeyboardBtnEmt{
    width: 5rem;
    height: 3rem;
    margin: 0.7rem;
}

.inputBox{
    height: 3.5rem;
    width: 18rem;
}

.unit-sign{
    position: absolute; 
    display: block; 
    left: 8px; 
    top: 1rem; 
    z-index: 9; 
}
.titleRes{
    box-shadow: 3px 3px 4px 0px #e6e6e6;
}
.subDiveReason{
    margin-top: 0.5rem;
}
.okBtn{
    background: #005bbc;
}
.paddingOUI{
    margin-top: 1rem;
}


    #chart{
      max-height: 8rem;
      width: 100%;
      margin: auto;
      padding: 10px;
    } 
    .marginlr{
      margin-left: 0.2rem;
      margin-right: 0.2rem;
    }
    .ICONDiv{
      display: flex;
      justify-content: space-around;
    }
    .ICON{
      font-size: 1.2rem;
      color: #595959;
    }
    .doth {
      height: 2rem;
      width: 2rem;
      border-radius: 50%;
      display: flex;
      text-align: center;
      align-items: center;
      justify-content: center;
    }
    .doth:hover{
      cursor: pointer;
      background: #cccccc;
    }

    .edit-split {
      position: relative;
    }
    .edit-split .edit-Subsplit {
      display: none;
      position: absolute;
      border-radius: 6px 6px 6px 6px;
      border:1px solid #d9d9d9;
      background: #fff;
      color: #595959;
      font-size: 12px;
      right:2.5rem;
      top: 0px;
      z-index: 1000;
      width: 22rem;
      height: 10rem;
    }
    .pvalue{
      font-family: 'Roboto', sans-serif;
      margin-top: 1rem;
      margin-bottom: 1rem;
    }

    .tableContentDown{
        margin-top: 1rem;
    }
    .floatLeft{
        margin-left: 2rem;
        margin-top: 2rem;
    }
    .DowntimeReasonBtn{
        background: #262626;
        border-radius: 10px 10px 10px 10px;
        width: 12rem;
        height: 3.5rem;
        margin-left: 2rem;
        display: flex;
        align-items: center;
    }
    .DowntimeReasonTag{
        background: #262626;
        border-radius: 10px 10px 10px 10px;
        width: 18rem;
        height: 2.5rem;
        margin-top: 1.5rem;
        /*margin-left: 2rem;*/
        display: flex;
        align-items: center;
    }
    .DowntimeReasonTile{
        margin-right: 2rem;
    }
    .DowntimeReasonTag p{
        margin-left: 1rem;
        color: white;
    }
    .innerDiv{
        float: left;
        width: 30%;
    }
    .DowntimeReasonBtn p{
        margin-left: 1rem;
    }
    .txtDown{
        color: white;
    }
    .txtDesign{
        color: #00b0f0;
        font-weight: bold;
    }
    .fieldDown{
        height: 3.5rem;
        width: 12rem;
    }
    .txtDesignUn{
        font-weight: bold;
        color: red;
    }

    .selectDown{
        align-items: center;
        justify-content: end;
        margin-top: 1rem;
        margin-bottom: 2rem;
    }
    .reason-boxDown{
        border: 1px solid rgb(232,232,232,232);
        border-radius: 10px;
        margin: 10px;
        position: relative;
    }
    .PartADive{
        padding: 10px;
        border-right: 1px solid rgb(232,232,232,232);
    }



    /*Circular Bar*/

    .skill{
        width: 100%;
        position: relative;  
        height: 16rem;   
    }
    .inner{
        width: 12rem;
        height: 12rem;
        border: 2px solid #bfbfbf;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center ;
        background-color: transparent;
    }
    .circle{
        fill: none;
        stroke: url(#GradientColor);
        stroke-width: 1.3rem;
        stroke-dasharray: 472;
        stroke-dashoffset: 472;
        animation: anim 2s linear forwards;
        transform-origin: center;
        transform: rotate(-90deg);
    
    }
    .svg{
        position: absolute;
        display: block;
        margin: auto;
        height: 16rem;
    }
    @keyframes anim{
        100%{
            stroke-dashoffset: 158;
        }
    }
    #number{
        font-weight: 600;
        color: #FFF;
        font-size: 2rem;
    }

    .hw{
        width: 100%;
        height: 10rem;
        /* background-color: aqua; */
    } 

</style>

</head>
<?php 
$session = \Config\Services::session();
$machine_id =  $session->get('machine_id');
$part_id = $session->get('part_id');
$part_name = $session->get('part_name');

?>
<body class="parallax">  
  <?php require_once 'operator_header.php'; ?>
    <div class="grid-header container-fluid" style="">
       <div class="mid">
            <p class="left_margin paddingm textid" ><?php echo $machine_id; ?></p>
            <P class="left_margin paddingm part-text"><?php echo $part_name; ?></P>
        </div>
        <div class="mid1">
            <span class="right_margin paddingm">
                <i class="fa fa-circle" style="font-size: 10px;color: white;"></i>
                <span class="textp paddingm" style="margin-right: 1rem;">30m</span>
                <span class="textp paddingm">Active</span>
            </span>
        </div> 
    </div>

    <div class="group-btn">
        <div class="btng" data-bs-toggle="modal" data-bs-target="#CorrectionPartsModal"><p class="paddingm">CORRECTIONS</p></div>
        <div class="btng active" data-bs-toggle="modal" data-bs-target="#DowntimePartsModal"><p class="paddingm">DOWNTIME</p></div>
        <div class="btng" data-bs-toggle="modal" data-bs-target="#RejectPartsModal"><p class="paddingm">REJECT PART</p></div>
    </div>
    <br>

    <div id="DowntimeChart1"></div>

    <div class="mainOpCss">
        <div class="flexDiv">
            <div class="outer" style="width: 35%;">
                <div class="div-box">
                    <label>GOALS</label>
                    <div class="flexDiv">
                        <div class="" style="width: 65%;margin-top: 1rem;">
                            <div class="skill">
                                <div class="inner">
                                    <div id="number">
                                        Part Completion    
                                    </div>
                                </div>
                                <svg version="1.1" class="svg">
                                    <defs>
                                        <linearGradient id="GradientColor">
                                            <stop offset="0%" stop-color="#ffbf00" />
                                            <stop offset="100%" stop-color="#ffbf00"/>
                                        </linearGradient>
                                    </defs>
                                    <circle class="circle" cx="167" cy="110" r="95" stroke-linecap="round"/>
                                </svg>
                            </div>
                        </div>
                        <div class="center-align" style="width: 35%;margin-top: 1rem;">
                            <div class="">
                                <p class="paddingm" style="">
                                    <span class="text-small">Target</span>
                                    <span class="text2">320</span>
                                </p>
                                <div class="target_bar target_outline" style="width: 100%;">
                                    <div class="target_inline">
                                        <p class="paddingm target_inline_Cont">240</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="center-align">
                        <p class="text-small paddingm" style="margin: 1rem">
                            <span></span>
                            <span>1h 52m</span>
                            <span>31 Jan 22, 02:01 PM</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="outer" style="width: 65%;">
                <div class="div-box">
                    <label>TIMELINE</label>
                    <div>
                        <!-- Downtime Graph -->
                            <div id="chartOp"></div>
                        <!--  -->
                    </div>
                    <div>
                        <div id="chartBarLive" class="hw"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flexDiv">
            <div class="outer-bottom" style="width: 35%;">
                <div class="outer-bottom-con">
                    <div style="float:left;" class="smallDivs">
                        <div class="alingCenter cssDiv"><p class="paddingm">Downtime</p></div>
                        <div class="alingCenter endDiv"><p>4h 33m</p></div>
                    </div>
                    <div style="float:left;" class="smallDivs">
                        <div class="alingCenter cssDiv"><p class="paddingm">Cycle Time</p></div>
                        <div class="alingCenter endDiv"><p>40s</p></div>
                    </div>
                    <div style="float:left;" class="smallDivs">
                        <div class="alingCenter cssDiv"><p class="paddingm">Reject Counts</p></div>
                        <div class="alingCenter endDiv"><p>25</p></div>
                    </div>
                </div>
            </div>
            <div class="outer" style="width: 65%;">
                <div class="div-box">
                    <label>EFFICIENCY</label>
                    <div class="center-align">
                        <div style="flex: left;width: 20%;">
                            
                        </div>
                        <div style="flex: left;width: 20%;">
                            <p class="text-small"><b>A</b>vailability</p>
                            <p class="text-small">92%</p>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <p class="text-small"><b>P</b>erformance</p>
                            <p class="text-small">80%</p>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <p class="text-small"><b>Q</b>uality</p>
                            <p class="text-small">88%</p>
                        </div>
                        <div style="flex: left;width: 20%;margin-right: 2rem;margin-left: 5rem;" class="smallDivs">
                            <div class="alingCenter cssDiv"><p class="paddingm">Reject Counts</p></div>
                            <div class="alingCenter endDiv"><p>25</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="CorrectionPartsModal" tabindex="-1" aria-labelledby="CorrectionPartsModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <div class="modal-title settings-machineAdd-model alingCenter" id="" style="">
                    <span id="CorrectBack" style="display: none;"><span class="dot dot-css"><i class="fa fa-arrow-left dot-cont"></i></span></span>
                    <span style="margin-left: 0.5rem;">CORRECTIONS</span>
                </div>
            </div>
            <div class="modal-body">
                <div id="CorrectMainModelCont">    
                    <div class="flexDiv">
                        <div style="float: left;width: 40%;border-right: 1px solid #f2f2f2;margin-right: 1rem;">
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
                            <div class="flexDiv alingCenter paddingOUI" style="height: 4rem;">
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
                                    <p class="paddingm titleTag">Min Counts</p>
                                    <p class="paddingm marginTop">-89</p>
                                </div>
                                <div style="float: left;width: 25%">
                                    <p class="paddingm titleTag">Total Counts</p>
                                    <p class="paddingm marginTop">0</p>
                                </div>
                            </div>
                            <div class="flexDiv alingCenter paddingOUI">
                                <div id="settings_div" class="titleRes" style="width: 90%;">
                                    <div class="row paddingm">
                                        <div class="col marleft" ><p class="title paddingm">NOTES</p></div>
                                        <div class="col marright" ><p class="title paddingm">COUNT</p></div>
                                    </div>
                                </div>
                                <div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">
                                    <div class="dotUser flexDiv CorrectAdd" style="align-items: center;justify-content: center;"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="content flexDiv subDiveReason">
                                <div id="settings_div" style="width: 90%;" class="subDiveReason">
                                    <div class="row paddingm">
                                        <div class="col marleft" >
                                            <div class="flexDiv" style="align-content: center;width: 100%;">
                                                    <div class="dotUser" style="background:lightgrey;color:white;"><p></p>
                                                    </div>
                                                <div style="align-items: center;justify-content: center;" class="flexDiv">
                                                    <p class="paddingm">Notes 1</p>             
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col marright" ><p class="title paddingm">12</p></div>
                                    </div>
                                </div>

                                <div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">
                                    <div class="flexDiv" style="align-items: center;justify-content: center;font-size:1.5rem;"><i class="fa fa-trash"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="display: none;" id="CorrectAddCont">
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
                                <form name = "form1">
                                    <input id="CorrectCount" type ="text" class="form-control inputBox paddingin" name ="answer" required minlength="0" value="" maxlength="0" >
                                    <span class="unit-sign">
                                        <span id="sign">+</span>
                                    </span>
                                    <label for="" class="input-padding">Correction Count</label> 
                                </form>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-box fieldStyle">   
                                <input type="text" class="form-control inputBox" id="CorrectionNotes" name="" value="">
                                <label for="inputMachineName" class="input-padding">Notes</label>                  
                            </div>
                        </div>
                    </div>
                    <div class="flex-container paddingm">
                        <div class="paddingm dividercss" style="width: 25%;">
                            <p class="font alignmargin float-end titleDiv">Input Keyboard</p>  
                        </div>
                        <div class="float-start dividercss" style="width: 75%;">
                            <hr class="paddingm" style="width: 100%;">
                        </div>
                    </div>
                <div class="flexDiv" style="justify-content: flex-end;" id="KeyboardCor">
                    <div>
                        <div class="flexDiv">      
                            <div class="KeyboardBtnEmt"></div>
                            <div class="KeyboardBtn keyCor" value="1"><p class="paddingm">1</p></div>
                            <div class="KeyboardBtn keyCor" value="2"><p class="paddingm">2</p></div>
                            <div class="KeyboardBtn keyCor" value="3"><p class="paddingm">3</p></div>
                        </div>
                        <div class="flexDiv">
                            <div class="KeyboardBtnEmt"></div>
                            <div class="KeyboardBtn keyCor" value="4"><p class="paddingm">4</p></div>
                            <div class="KeyboardBtn keyCor" value="5"><p class="paddingm">5</p></div>
                            <div class="KeyboardBtn keyCor" value="6"><p class="paddingm">6</p></div>
                        </div> 
                        <div class="flexDiv"> 
                            <div class="KeyboardBtnEmt"></div>
                            <div class="KeyboardBtn keyCor" value="7"><p class="paddingm">7</p></div>
                            <div class="KeyboardBtn keyCor" value="8"><p class="paddingm">8</p></div>
                            <div class="KeyboardBtn keyCor" value="9"><p class="paddingm">9</p></div>
                        </div>
                        <div class="flexDiv">
                            <div class="KeyboardBtn signChange"><p class="paddingm">+/-</p></div>
                            <div class="KeyboardBtn" id="backSpaceCor">
                                <i class="material-icons" style="font-size: 30px;">&#xe14a;</i>
                            </div>
                            <div class="KeyboardBtn keyCor" value="0"><p class="paddingm">0</p></div>
                            <div class="KeyboardBtn okBtn">
                                <li class="fa fa-arrow-right"></li>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="RejectPartsModal" tabindex="-1" aria-labelledby="RejectPartsModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <div class="modal-title settings-machineAdd-model alingCenter" id="" style="">
                    <span id="ReasonBack" style="display: none;"><span class="dot dot-css"><i class="fa fa-arrow-left dot-cont"></i></span></span>
                    <span style="margin-left: 0.5rem;">REJECT PARTS</span>
                </div>
            </div>
            <div class="modal-body">
                <div id="ReasonMainModelCont">    
                    <div class="flexDiv">
                        <div style="float: left;width: 40%;border-right: 1px solid #f2f2f2;margin-right: 1rem;">
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
                            <div class="flexDiv paddingOUI" style="height: 4rem;">
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
                            <div class="flexDiv paddingOUI">
                                <div id="settings_div" class="titleRes" style="width: 90%;">
                                    <div class="row paddingm">
                                        <div class="col marleft" ><p class="title paddingm">REASON</p></div>
                                        <div class="col marright" ><p class="title paddingm">COUNT</p></div>
                                    </div>
                                </div>
                                <div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">
                                    <div class="dotUser flexDiv ReasonAdd" style="align-items: center;justify-content: center;"><i class="fa fa-plus"></i></div>
                                </div>
                            </div>
                            <div class="content flexDiv subDiveReason">
                                <div id="settings_div" style="width: 90%;" class="subDiveReason">
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
                                        <div class="col marright" ><p class="title paddingm">12</p></div>
                                    </div>
                                </div>

                                <div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">
                                    <div class="flexDiv" style="align-items: center;justify-content: center;font-size:1.5rem;"><i class="fa fa-trash"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="display: none;" id="ReasonAddCont">
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
                                <form name = "form1">
                                    <input id="RejectCount" type ="text" class="form-control inputBox paddingin" name ="answer" required minlength="0" value="" maxlength="0" >
                                    <label for="" class="input-padding">Reject Count</label> 
                                </form>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-box fieldStyle">   
                                <input type="text" class="form-control inputBox" id="RejectionReason" name="" minlength="0" value="" maxlength="0">
                                <label for="inputMachineName" class="input-padding">Reject Reason</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex-container paddingm">
                        <div class="paddingm dividercss" style="width: 25%;">
                            <p class="font alignmargin float-end titleDiv"></p>  
                        </div>
                        <div class="float-start dividercss" style="width: 75%;">
                            <hr class="paddingm" style="width: 100%;">
                        </div>
                    </div>
                <div class="flexDiv" style="justify-content: flex-end;" id="KeyboardMan">
                    <div>
                        <div class="flexDiv">      
                            <div class="KeyboardBtn key" value="1"><p class="paddingm">1</p></div>
                            <div class="KeyboardBtn key" value="2"><p class="paddingm">2</p></div>
                            <div class="KeyboardBtn key" value="3"><p class="paddingm">3</p></div>
                        </div>
                        <div class="flexDiv">
                            <div class="KeyboardBtn key" value="4"><p class="paddingm">4</p></div>
                            <div class="KeyboardBtn key" value="5"><p class="paddingm">5</p></div>
                            <div class="KeyboardBtn key" value="6"><p class="paddingm">6</p></div>
                        </div> 
                        <div class="flexDiv"> 
                            <div class="KeyboardBtn key" value="7"><p class="paddingm">7</p></div>
                            <div class="KeyboardBtn key" value="8"><p class="paddingm">8</p></div>
                            <div class="KeyboardBtn key" value="9"><p class="paddingm">9</p></div>
                        </div>
                        <div class="flexDiv">
                            <div class="KeyboardBtn" id="backSpace">
                                <i class="material-icons" style="font-size: 30px;">&#xe14a;</i>
                            </div>
                            <div class="KeyboardBtn key" value="0"><p class="paddingm">0</p></div>
                            <div class="KeyboardBtn okBtn">
                                <li class="fa fa-arrow-right"></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flexDiv" style="width: 100%;flex-wrap: wrap;display: none;" id="ReasonsReject">
                    <div style="width: 15rem;float: left;">
                        <div class="reason-box flexDiv" style="align-content: center;">
                            <div style="width: 30%">
                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                            </div>
                            <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                <p class="paddingm">Reason 1</p>             
                            </div>
                        </div>
                    </div>
                    <div style="width: 15rem;float: left;">
                        <div class="reason-box flexDiv" style="align-content: center;">
                            <div style="width: 30%">
                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                            </div>
                            <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                <p class="paddingm">Reason 2</p>             
                            </div>
                        </div>
                    </div>
                    <div style="width: 15rem;float: left;">
                        <div class="reason-box flexDiv" style="align-content: center;">
                            <div style="width: 30%">
                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                            </div>
                            <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                <p class="paddingm">Reason 3</p>             
                            </div>
                        </div>
                    </div>
                    <div style="width: 15rem;float: left;">
                        <div class="reason-box flexDiv" style="align-content: center;">
                            <div style="width: 30%">
                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                            </div>
                            <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                <p class="paddingm">Reason 4</p>             
                            </div>
                        </div>
                    </div>
                    <div style="width: 15rem;float: left;">
                        <div class="reason-box flexDiv" style="align-content: center;">
                            <div style="width: 30%">
                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                            </div>
                            <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                <p class="paddingm">Reason 5</p>             
                            </div>
                        </div>
                    </div>       
                </div>
                
            </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" id="DowntimePartsModal" tabindex="-1" aria-labelledby="DowntimePartsModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <div class="modal-title settings-machineAdd-model alingCenter" id="" style="">
                    <span id="DownBack" style="display: none;"><span class="dot dot-css"><i class="fa fa-arrow-left dot-cont"></i></span></span>
                    <span id="ToolDownBack" style="display: none;"><span class="dot dot-css"><i class="fa fa-arrow-left dot-cont"></i></span></span>
                    <span style="margin-left: 0.5rem;" id="titleChange">MANAGE DOWNTIME REASONS</span>
                </div>
            </div>
            <div class="modal-body">
                <div id="DowntimeMainModelCont">    
                    <div class="flexDiv">
                        <div style="float: left;width: 10%">
                            <p class="paddingm titleTag">Machine Name</p>
                            <p class="paddingm marginTop">MC1001</p>
                        </div>
                        <div style="float: left;width: 10%">
                            <p class="paddingm titleTag">Shift Date</p>
                            <p class="paddingm marginTop">29 Jan 2022</p>
                        </div>
                        <div style="float: left;width: 10%">
                            <p class="paddingm titleTag">Shift</p>
                            <p class="paddingm marginTop">Shift 1</p>
                        </div>
                        <div style="float: left;width: 10%">
                            <p class="paddingm titleTag">Start</p>
                            <p class="paddingm marginTop">06:00 AM</p>
                        </div>
                        <div style="float: left;width: 5%" class="alingCenter">
                            <i class="fa fa-arrow-right" style="font-size: 2rem;"></i>
                        </div>
                        <div style="float: left;width: 10%">
                            <p class="paddingm titleTag">End</p>
                            <p class="paddingm marginTop">02:00PM</p>
                        </div>
                    </div>
                    <div class="flexDiv">
                        <div id="DowntimeChart"></div>
                    </div>
                    <div class="tableContentDown">
                      <div class="settings_machine_header sticky-top fixtabletitle">
                          <div class="row paddingm">
                              <div class="col-sm-2 p1 paddingm">
                                <p>START TIME</p>
                              </div>
                              <div class="col-sm-1 p1 paddingm">
                                <p>DURATION</p>
                              </div>
                              <div class="col-sm-1 p1 paddingm">
                                <p>END TIME</p>
                              </div>
                              <div class="col-sm-1 p1 paddingm">
                                <p>CATEGORY</p>
                              </div>
                              <div class="col-sm-2 p1 paddingm">
                                <p>REASON</p>
                              </div>
                              <div class="col-sm-2 p1 paddingm">
                                <p>TOOL NAME</p>
                              </div>
                              <div class="col-sm-2 p1 paddingm">
                                <p>PART NAME</p>
                              </div>
                              <div class="col-sm-1 p1 paddingm" style="justify-content: center;">
                                <p>ACTION</p>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="contentMachine paddingm ">
                          <div id="settings_div">
                            <div class="row paddingm">
                                <div class="col-sm-1 col marleft" ><p>09:45 AM</p></div>
                                <div class="col-sm-1 col marleft" ><p>18m</p></div>        
                                <div class="col-sm-1 col marleft" >
                                    <p>10:03 AM</p>
                                </div>
                                <div class="col-sm-1 col marleft" >
                                    <select class="form-select marginlr">
                                      <option>Planned</option>
                                      <option>Unplanned</option>
                                    </select>
                                </div>
                                <div class="col-sm-2 col marleft" >
                                  <select class="form-select marginlr">
                                      <option>Tool Changeover</option>
                                      <option>Break Down</option>
                                  </select>
                                </div>
                                <div class="col-sm-2 col marleft" >
                                  <select class="form-select marginlr">
                                      <option>Tool Name1</option>
                                      <option>Tool Name2</option>
                                  </select>
                                </div>
                                <div class="col-sm-2 col marleft" >
                                  <select class="form-select marginlr">
                                      <option>Part Name1</option>
                                      <option>Part Name2</option>
                                  </select>
                                </div>
                                <div class="col-sm-2 col marleft ICONDiv">
                                    <span class="doth"><i class="fas fa-bezier-curve ICON"></i></span>
                                    <span class="doth addNotes"><i class="fa fa-pencil ICON"></i></span>
                                    <span class="doth edit-split">
                                      <i class="fa fa-info ICON"></i>
                                      <div class="edit-Subsplit">
                                          <div style="display: flex;width: 100%;">
                                            <div style="width: 50%;float: left;height: 100%;">
                                              <p class="marleft p1 pvalue">Last Updated by</p>
                                            </div>
                                            <div style="width: 50%;float: left;height: 100%;">
                                              <p class="marleft pvalue"><b>User 1</b></p>
                                            </div>
                                          </div>
                                          <div style="display: flex;width: 100%;">
                                            <div style="width: 50%;float: left;height: 100%;">
                                              <p class="marleft p1 pvalue">Last Updated on</p>
                                            </div>
                                            <div style="width: 50%;float: left;height: 100%;">
                                              <p class="marleft pvalue"><b>30 Jan 22</b></p>
                                            </div>
                                          </div>
                                          <div style="display: flex;width: 100%;">
                                            <div style="width: 50%;float: left;height: 100%;">
                                              <p class="marleft p1 pvalue">Notes</p>
                                            </div>
                                            <div style="width: 50%;float: left;height: 100%;">
                                              <p class="marleft pvalue">Any Notes</p>
                                            </div>
                                          </div> 
                                      </div>
                                    </span>
                                    <span class="doth delete-split"><i class="fa fa-trash ICON"></i></span>          
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Select-Down" style="display: none;">
                    <div class="flexDiv selectDown">
                        <div class="box">
                            <div class="input-box">   
                                <input type="number" class="form-control fieldDown" id="" name="" value=""\>
                                <label for="" class="input-padding">Duration</label>                  
                            </div>
                        </div>
                        <div class="" >
                            <div class="DowntimeReasonBtn">   
                                <p class="paddingm txtDown">Tool Changeover</p>
                                <p class="paddingm txtDesign">Planned</p>
                            </div>
                        </div>
                        <div class="" id="UnplannedChange">
                            <div class="DowntimeReasonBtn">   
                                <p class="paddingm txtDown">Tool Changeover</p>
                                <p class="paddingm txtDesignUn">Unplanned</p>
                            </div>
                        </div>
                    </div>
                    <div class="row paddingm">
                        <div class="col-lg-3 reason-boxDown flexDiv">
                            <div style="width: 90%;border-right: 1px solid rgb(232,232,232,232);padding: 10px;" class="partADiv">
                                <div class="dot col float-start" style="background: lightblue;">k</div>
                                <div class="col.float-start down d-flex fontheight"><p class="alignCenter">Downtime Reason1</p></div>
                            </div>
                            <div style="width: 10%;" class="alingCenter partBDiv">
                                <p class="paddingm txtDesign">P</p>
                            </div>
                        </div>
                        <div class="col-lg-3 reason-boxDown flexDiv">
                            <div style="width: 90%;border-right: 1px solid rgb(232,232,232,232);padding: 10px;" class="partADiv">
                                <div class="dot col float-start" style="background: lightgreen;">k</div>
                                <div class="col.float-start down d-flex fontheight"><p class="alignCenter">Downtime Reason2</p></div>
                            </div>
                            <div style="width: 10%;" class="alingCenter partBDiv">
                                <p class="paddingm txtDesignUn">U</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ToolChangeDown" style="margin-top: 1rem;display: none;">
                    <div class="paddingm row">
                        <div class="flexDiv">
                            <div class="box">
                                <div class="input-box fieldStyle DowntimeReasonTile">   
                                    <input type="text" class="form-control inputBox" id="ToolNameDown" name="" minlength="0" value="" maxlength="0">
                                    <label for="inputMachineName" class="input-padding">Tool Name</label>
                                </div>
                            </div>
                            <div class="box">
                                <div class="input-box fieldStyle DowntimeReasonTile">   
                                    <input type="text" class="form-control inputBox" id="PartNameDown" name="" minlength="0" value="" maxlength="0">
                                    <label for="inputMachineName" class="input-padding">Part Name</label>
                                </div>
                            </div>
                            <div class="box">
                                <div class="input-box fieldStyle DowntimeReasonTile">   
                                    <input type="text" class="form-control inputBox" id="ProductionTarget" name="" minlength="0" value="" maxlength="0">
                                    <label for="inputMachineName" class="input-padding">Production Target</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flexDiv">
                        <div class="paddingm dividercss" style="width: 20%;">
                            <p class="font alignmargin float-end" id="ChangeoverTitle">Frequantly Used Tools</p>  
                        </div>
                        <div class="float-start dividercss" style="width: 80%;">
                            <hr class="paddingm" style="width: 100%;">
                        </div>
                    </div>
                    <div id="ToolPartCont">
                        <div class="paddingm row">
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 1</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 2</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 3</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 4</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 5</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 6</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Tool Name 7</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="PartCont" style="display: none;">
                        <div class="paddingm row">
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Part Name 1</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Part Name 2</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Part Name 3</p>
                                </div>
                            </div>
                            <div class="innerDiv">
                                <div class="DowntimeReasonTag">   
                                    <p class="paddingm txtDesignUn">Part Name 4</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="KeyboardUTool" style="display: none;">
                        <div class="flexDiv" style="justify-content: flex-end;">
                            <div>
                                <div class="flexDiv">      
                                    <div class="KeyboardBtn keyUT" value="1"><p class="paddingm">1</p></div>
                                    <div class="KeyboardBtn keyUT" value="2"><p class="paddingm">2</p></div>
                                    <div class="KeyboardBtn keyUT" value="3"><p class="paddingm">3</p></div>
                                </div>
                                <div class="flexDiv">
                                    <div class="KeyboardBtn keyUT" value="4"><p class="paddingm">4</p></div>
                                    <div class="KeyboardBtn keyUT" value="5"><p class="paddingm">5</p></div>
                                    <div class="KeyboardBtn keyUT" value="6"><p class="paddingm">6</p></div>
                                </div> 
                                <div class="flexDiv"> 
                                    <div class="KeyboardBtn keyUT" value="7"><p class="paddingm">7</p></div>
                                    <div class="KeyboardBtn keyUT" value="8"><p class="paddingm">8</p></div>
                                    <div class="KeyboardBtn keyUT" value="9"><p class="paddingm">9</p></div>
                                </div>
                                <div class="flexDiv">
                                    <div class="KeyboardBtn" id="backSpaceUT">
                                        <i class="material-icons" style="font-size: 30px;">&#xe14a;</i>
                                    </div>
                                    <div class="KeyboardBtn keyUT" value="0"><p class="paddingm">0</p></div>
                                    <div class="KeyboardBtn okBtn">
                                        <li class="fa fa-arrow-right"></li>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DeleteSPlit" tabindex="-1" aria-labelledby="DeleteSPlit1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeleteSPlit1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this machine record?</label>
                    <p class="settings-machineAdd-model">Downtime duration will merge with its parent record</p>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn " name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditSPlit" tabindex="-1" aria-labelledby="EditSPlit1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditSPlit1" style="">EDIT NOTES</h5>
            </div>
                <div class="modal-body">
                    <div class="box">
                      <div class="input-box fieldStyle">  
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>    
                          <br>
                          <!-- <input type="text" class="form-control" id="" name=""> -->
                          <label for="inputMachineName" class="input-padding">Notes</label>
                      </div>
                    </div>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn" name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    $(document).on("click", ".delete-split", function(){
      $('#DeleteSPlit').modal('show');
    });
    $(document).on("click", ".addNotes", function(){
        $("#DowntimeMainModelCont").css("display", "none");
        $('#titleChange').html("SELECT DOWNTIME REASONS");
        $("#Select-Down").css("display", "block");
        $("#DownBack").css("display", "block");
        
    });
    $(document).on("click", "#DownBack", function(){
        $("#Select-Down").css("display", "none");
        $("#DownBack").css("display", "none");
        $('#titleChange').html("MANAGE DOWNTIME REASONS");
        $("#DowntimeMainModelCont").css("display", "block");
    });
    $(document).on("click", "#UnplannedChange", function(){
        $("#DownBack").css("display", "none");
        $("#ToolDownBack").css("display", "block");
        $("#Select-Down").css("display", "none");
        $('#titleChange').html("TOOL CHANGEOVER");
        $("#ToolChangeDown").css("display", "block");
        
    });

    $(document).on("click", "#ToolDownBack", function(){
        $("#ToolChangeDown").css("display", "none");
        $("#DownBack").css("display", "block");
        $("#Select-Down").css("display", "block");
        $("#ToolDownBack").css("display", "none");
        $('#titleChange').html("SELECT DOWNTIME REASONS");
    });
    
     $(document).on("click", "#PartNameDown", function(){
        $('#ToolPartCont').css("display","none");
        $('#PartCont').css("display","block");
        $('#ChangeoverTitle').html("Frequantly Used Parts");
        $('#KeyboardUTool').css("display","none");
    });
    $(document).on("click", "#ToolNameDown", function(){
        $('#ToolPartCont').css("display","block");
        $('#PartCont').css("display","none");
        $('#ChangeoverTitle').html("Frequantly Used Tools");
        $('#KeyboardUTool').css("display","none");
        
    });
    $(document).on("click", "#ProductionTarget", function(){
        $('#ToolPartCont').css("display","none");
        $('#PartCont').css("display","none");
        $('#ChangeoverTitle').html("Input Keyboard");
        $('#KeyboardUTool').css("display","block");
        
        
    });
    

    

    $(document).on("click", ".edit-split", function(){
        if($(this).children(".edit-Subsplit").css('display').toLowerCase() == 'none'){
            // $(".edit-subMenu").css("display","block");
            $(this).children(".edit-Subsplit").css("display","block");
        }
        else{
            $(this).children(".edit-Subsplit").css("display","none");
        }
        $(document).mouseup(function(e) 
        { 
            var container = $(".edit-Subsplit");
            if (!container.is(e.target) && container.has(e.target).length === 0) 
            {
                container.hide();
            }
        });
    });


    $(".key").click(function(){
        var x = ($(this).attr("value"));
        var y = $("#RejectCount").val();
        var z = y+x.toString();
        $("#RejectCount").val(z);    
    });

    $(".keyUT").click(function(){
        var x = ($(this).attr("value"));
        var y = $("#ProductionTarget").val();
        var z = y+x.toString();
        $("#ProductionTarget").val(z);    
    });
    $(document).on("click", "#backSpaceUT", function(){
        const uTBox=document.getElementById('ProductionTarget');
        uTBox.value = uTBox.value.substring(0, uTBox.value.length-1);
    });


    $(document).on("click", "#RejectionReason", function(){
        $('#KeyboardMan').css("display","none"); 
        $('#ReasonsReject').css("display","block");
        $('.titleDiv').html("Select Reason");
    });
    $(document).on("click", "#RejectCount", function(){
        $('#ReasonsReject').css("display","none");
        $('#KeyboardMan').css({"display":"block","float":"right"});
        $('.titleDiv').html("Input Keyboard");
    });
    $(document).on("click", ".ReasonAdd", function(){
        $('#ReasonBack').css("display","block");
        $('#ReasonMainModelCont').css("display","none");
        $('#ReasonAddCont').css("display","block");
    });
    $(document).on("click", "#ReasonBack", function(){
        $('#ReasonMainModelCont').css("display","block");
        $('#ReasonAddCont').css("display","none");
        $('#ReasonBack').css("display","none");
    });
    
   
    
    

    $(".keyCor").click(function(){
        var x = ($(this).attr("value"));
        var y = $("#CorrectCount").val();
        var z = y+x.toString();
        $("#CorrectCount").val(z);    
    });
    $(document).on("click", "#CorrectionNotes", function(){
        $('#KeyboardCor').css("display","none"); 
        $('.titleDiv').html("Input Notes");
    });
    $(document).on("click", "#CorrectCount", function(){
        $('#KeyboardCor').css({"display":"block","float":"right"});
        $('.titleDiv').html("Input Keyboard");
    });
    $(document).on("click", "#backSpaceCor", function(){
        const correctBox=document.getElementById('CorrectCount');
        correctBox.value = correctBox.value.substring(0, correctBox.value.length-1);
    });
    $(document).on("click", ".CorrectAdd", function(){
        $('#CorrectBack').css("display","block");
        $('#CorrectMainModelCont').css("display","none");
        $('#CorrectAddCont').css("display","block");
    });
    $(document).on("click", "#CorrectBack", function(){
        $('#CorrectMainModelCont').css("display","block");
        $('#CorrectAddCont').css("display","none");
        $('#CorrectBack').css("display","none");
    });
    $(document).on("click", ".signChange", function(){
        var x = $('#sign').text();
        if (x =="+") {
            $('#sign').text("-");
        }
        else{
            $('#sign').text("+");
        }
    });

    
</script>
<script type="text/javascript">
    $('#RejectPartsModal').modal('show');
</script>

<script>
    <?php include "circularscripts.php"; ?>
</script>


<script>
    const backSpace=document.getElementById('backSpace');
    const textBox=document.getElementById('RejectCount');
    backSpace.addEventListener('click',function(){
        textBox.value = textBox.value.substring(0, textBox.value.length-1)
    });
    
    function getdetails()
    {
        var a = document.forms["form1"]["answer"].value;
        alert("Answer is "+a);
    }
</script>
</body>
</html>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
        var url = "<?php echo base_url()?>/test_demo/Data.json";
        $.ajax({
             method: 'GET',
             url: url,
        }).then(function(response){
              var month = [];
              var machine_on_count=[];
              var machine_off_count=[];
              var tool_change_count=[];
              var i=0;
              var preview ="";
              var val;
              $.each(response,function(key,model){
               var colordemo = "";
                  if(key == 0){
                    preview = model.name;
                    val = model.data;
                  }
                  else if(preview == model.name){
                      val = val + model.data;
                    //alert(preview +""+ val);
                  }else{
                    colordemo = color_bar(preview);
                    month.push({name:preview,data:[val],color:colordemo});
                    preview = model.name;
                    val = model.data;                  
                  }
              });  
              var colordemo = color_bar(preview);
              month.push({name:preview,data:[val],color:colordemo});              
              var options = {

                  series: month,
                  chart: {
                  type: 'bar',
                  height: 70,
                  stacked: true,
                  sparkline: {
                    enabled: true
                  },
                },
                plotOptions: {
                  bar: {
                    horizontal: true,
                  },
                },
                grid: {
                  padding: {
                    left: 0,
                  },
                },
                stroke: {
                  width: 1,
                  colors: ['#fff']
                },
                xaxis: {
                  // categories: ["Downtime"],
                  tickPlacement: 'on',
                  labels: {
                    show:false,
                    formatter: function (val) {
                      return val + "K"
                    }
                  }
                },
                yaxis: {
                  title: {
                    text: undefined
                  },
                },
                tooltip: {
                  y: {
                    formatter: function (val) {
                      return val + "K"
                    }
                  }
                },
                fill: {
                  opacity: 1               
                },
                legend: {
                  // position: 'top',
                  // horizontalAlign: 'left',
                  // // offsetX: 10,
                  // offsetY: -10,
                  show:false  
                },
                annotations: {
                    points:[
                      {
                        x: 30,
                        y: 300,
                        marker: {
                          fillColor: "#FFF",
                          size:6
                        }
                      },
                      {
                        x: "tool change",
                        y: 10,
                        marker: {
                          fillColor: "#FFF",
                          size:6
                        }
                      },{
                        x: 300,
                        y: 300,
                        marker: {
                          fillColor: "#FFF",
                          size:6
                        }
                      }
                    ]
              },
            };
            var chart = new ApexCharts(document.querySelector("#chartOp"), options);
            chart.render();
      }); 
      
      function color_bar(color){
        var colordemo = "";
        if(color == "Machine OFF"){
          colordemo = "#595959";
         
        }
        else if(color == "Active"){
          colordemo= "#01bb55";
          
        }
        else{
          colordemo = "#005bbc";
          
        }
        return colordemo;
      }
  </script>

<script>
    $('#DowntimePartsModal').on('shown.bs.modal', function (e) {
        var url = "<?php echo base_url()?>/test_demo/Data.json";
        $.ajax({
             method: 'GET',
             url: url,
        }).then(function(response){
              var month = [];
              var machine_on_count=[];
              var machine_off_count=[];
              var tool_change_count=[];
              var i=0;
              var preview ="";
              var val;
              $.each(response,function(key,model){
               var colordemo = "";
                  if(key == 0){
                    preview = model.name;
                    val = model.data;
                  }
                  else if(preview == model.name){
                      val = val + model.data;
                    //alert(preview +""+ val);
                  }else{
                    colordemo = color_bar(preview);
                    month.push({name:preview,data:[val],color:colordemo});
                    preview = model.name;
                    val = model.data;                  
                  }
              });  
              var colordemo = color_bar(preview);
              month.push({name:preview,data:[val],color:colordemo}); 

              //alert(month);

              var options = {
                  series: month,
                  // series:[{
                  //   name:preview,
                  //   data:[20,20,20,20,20,20],
                  // },{
                  //   name:preview,
                  //   data:[20,30,30,30,30,30],
                  // }],
                  chart: {
                  type: 'bar',
                  height: 70,
                  stacked: true,
                  sparkline: {
                    enabled: true
                  },
                },
                plotOptions: {
                  bar: {
                    horizontal: true,
                  },
                },
                grid: {
                  padding: {
                    left: 0,
                  },
                },
                stroke: {
                  width: 1,
                  colors: ['#fff']
                },
                xaxis: {
                  // categories: ["Downtime"],
                  tickPlacement: 'on',
                  labels: {
                    show:false,
                    formatter: function (val) {
                      return val + "K"
                    }
                  }
                },
                yaxis: {
                  title: {
                    text: undefined
                  },
                },
                tooltip: {
                  y: {
                    formatter: function (val) {
                      return val + "K"
                    }
                  }
                },
                fill: {
                  opacity: 1               
                },
                legend: {
                  // position: 'top',
                  // horizontalAlign: 'left',
                  // // offsetX: 10,
                  // offsetY: -10,
                  show:false  
                },
                annotations: {
                    points:[
                      {
                        x: 30,
                        y: 300,
                        marker: {
                          fillColor: "#FFF",
                          size:6
                        }
                      },
                      {
                        x: "tool change",
                        y: 10,
                        marker: {
                          fillColor: "#FFF",
                          size:6
                        }
                      },{
                        x: 300,
                        y: 300,
                        marker: {
                          fillColor: "#FFF",
                          size:6
                        }
                      }
                    ]
              },
            };
            var chartDown = new ApexCharts(document.querySelector("#DowntimeChart"), options);
            chartDown.render();
      }); 
      
      function color_bar(color){
        var colordemo = "";
        if(color == "Machine OFF"){
          colordemo = "#595959";
         
        }
        else if(color == "Active"){
          colordemo= "#01bb55";
          
        }
        else{
          colordemo = "#005bbc";
          
        }
        return colordemo;
      }
    });
</script>


 <script>
    const arr = ['chartBarLive'];
    var options = {
    series: [{
        name: 'Hours',
        type: 'column',
        data: [440, 505, 414, 671, 227],
        color: "#007a37",
    }, {
        name: 'Tool Changeover',
        type: 'line',
        data: [25,22,25,22,22]
      }],
    chart: {
        height:300,
        type: 'line',
        toolbar: {
            show: false,
        },
    },
    stroke: {
        width: [0, 4],
        curve:'stepline'
    },
    title: {
    //   text: 'Traffic Sources'
    },
    dataLabels: {
        enabled: false,
        enabledOnSeries: [1]
    },
    legend: {
        show: false,
    },
    labels: ['01 Jan 2001', '02 Jan 2001', '03 Jan 2001', '04 Jan 2001', '05 Jan 2001'],
    xaxis: {
        labels: {
            show: false,
        },
    //   type: 'datetime'
    },
    yaxis: [{
        labels:{
            show:false
        },
        title: {
        // text: 'Website Blog',
        },
        lines: {
            show: false
        }
    },    
    {opposite: false,
        title: {
            // text: 'Social Media'
        },
        labels:{
            show:false
        },
    }]
};
var chart = new ApexCharts(document.querySelector("#chartBarLive"), options);
chart.render();
</script>