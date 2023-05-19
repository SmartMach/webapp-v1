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
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/css_general.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/config.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>
    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chartjs-plugin-datalabels.min.js?version=<?php echo rand() ; ?>"></script>

<style>
    :root {
      --foo: 471;
      --ref_graph :url("#GradientColor");
    }

.labelGraph {
    height: 10px;
    width: 10px;
    margin-right: 0.5rem;
}
.labelAlign {
    margin-left: 1rem;
    margin-right: 1rem;
}

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
    /*margin: 0.5rem;*/
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
    /*width: 100%;*/
    border: 1px solid #06a149;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
    border-radius: 0.5rem;
    margin-bottom: 1rem;
}

#chartOp{
    padding-left: 1rem;
    padding-right: 1rem;
}
#chartOp svg{
    top: 0;
    left: 0;
}

.outer-graph{
    /*width: 100%;*/
    /*border: 1px solid #06a149;*/
    /*margin-left: 0.5rem;*/
    margin-right: 0.5rem;
    /*border-radius: 0.5rem;*/
    /*margin-bottom: 1rem;*/
}

.outer-bottom{
    display: flex;
    justify-content: center;
    margin-left: 0.5rem;
    margin-right: 0.5rem;
}

.outer-bottom-con{
    display: flex;
    justify-content: space-between;
    width: 100%;
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
    .doth-add{
        cursor: pointer;
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
        stroke: var(--ref_graph);
        stroke-width: 1.2rem;
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
            /*stroke-dashoffset: var(--foo);*/
            stroke-dashoffset: 470;
        }
    }
    #number_completion{
        font-weight: 600;
        color: #FFF;
        font-size: 2rem;
    }

    .hw{
        width: 100%;
        height: 10rem;
        /* background-color: aqua; */
    } 


    .item-production{
        height: 10rem;
        /*border-radius: 0 0 6px 6px;*/
        position: relative;
        overflow: hidden;
    }
    .item-production-s{
        position: relative;
        height: 10rem;
        background-color: rgba(255, 255, 255,0.1);
    }
    .graph-content-div{
        position: relative;
        margin-top: -10rem;
        overflow: hidden;
        height: 100%;
    }
    .production-graph-area{
        height: 10rem;
        padding-left: 1rem;
        padding-right: 1rem;
        margin-top: 1rem;
    }
    .icons_duration_oui{
        height: 1.5rem;
    }

    .icons_dot_oui{
        font-size:9px;
        margin-right:2px;
    }
    .icons_space_oui{
        margin-left: 2rem;
    }

    .text-bold{
        font-weight: bold;
    }
    .font_weight_modal {
        font-family: 'Roboto' sans-serif;
        font-weight: 550;
    }
    .body_div{
        height: 30rem;
    }
    .img_font_wh1 {
        width: 1.8rem;
        height: 1.2rem;
        padding-right: 0.6rem;
        color: #a6a6a6;
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
            <p class="left_margin paddingm textid" id="machine_name_oui"> </p>
            <P class="left_margin paddingm part-text" id="part_name_oui" part_id=""></P>
        </div>
        <div class="mid1">
            <span class="right_margin paddingm">
                <i class="fa fa-circle" style="font-size: 10px;color: white;"></i>
                <span class="textp paddingm" style="margin-right: 1rem;" id="event_duration_machine"></span>
                <span class="textp paddingm" onclick="fullscreen()" id="latest_event_machine"></span>
            </span>
        </div> 
    </div>

    <div class="group-btn">
        <div class="btng open_correction"><p class="paddingm">CORRECTIONS</p></div>
        <div class="btng active" data-bs-toggle="modal" data-bs-target="#DowntimePartsModal"><p class="paddingm">DOWNTIME</p></div>
        <div class="btng open_rejection"><p class="paddingm">REJECT PART</p></div>
    </div>
    <br>

    <div class="mainOpCss">
        <div class="flexDiv">
            <div class="outer" style="width: 35%;">
                <div class="div-box">
                    <label>GOALS</label>
                    <div class="flexDiv">
                        <div class="" style="width: 65%;margin-top: 1rem;">
                            <div class="skill">
                                <div class="inner">
                                    <div id="number_completion">
                                        60%    
                                    </div>
                                </div>
                                <svg version="1.1" class="svg">
                                    <defs>
                                        <linearGradient id="GradientColor">
                                            <stop id="circle_graph_colors" stop-color="#ffffff" />
                                        </linearGradient>
                                    </defs>
                                    <circle class="circle" id="" cx="167" cy="120" r="95" stroke-linecap="round"/>
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
                        <p class="text-small text-bold paddingm" style="margin: 1rem">
                            <span>
                                <img src="<?php echo base_url(); ?>/assets/icons/duration_logo.png" alt="" class="icons_duration_oui">
                            </span>
                            <span id="remaining_time_duration"></span>
                            <span class="icons_space_oui">
                                <i class="fa fa-circle icons_dot_oui"></i>
                            </span>
                            <span id="estimated_time_target"></span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="outer-graph" style="width: 65%;">
                <div class="outer" style="height: 35%;">
                    <div class="div-box" style="height: 100%;">
                        <label>TIMELINE</label>
                        <div style="height: 100%;display: flex;flex-direction: column;justify-content: space-around;">
                            <div id="chartOp"></div>
                            <div class="" style="margin-top: 0.5rem;">
                                <span class="float-start paddingm labelAlign center-align p4"><div class="labelGraph" style="background: #01bb55"></div><p class="paddingm">ACTIVE</p></span>
                                <span class="float-start paddingm labelAlign center-align  p4"><div class="labelGraph" style="background: #005abc"></div><p class="paddingm">INACTIVE</p></span>
                                <span class="float-start paddingm labelAlign center-align p4"><div class="labelGraph" style="background: #595959"></div><p class="paddingm">MACHINE OFF</p></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="outer" style="height: 56%;">
                    <div class="div-box">
                        <label>PARTS BY HOUR</label>
                        <div style="height: 100%;display: flex;flex-direction: column;justify-content: space-around;">
                            <div class="production-graph-area">
                                <div class="item-production">
                                    <div class="item-production-s" id="" style="background-color: rgba(255, 255, 255, 0.05);width: 78%;"></div>
                                    <div class="graph-content-div production-graph-prod">
                                        <canvas id="production-graph" style="padding-top: 5px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="" style="margin-top: 0.5rem;">
                                <span class="float-start paddingm labelAlign center-align p4"><div class="labelGraph" style="background: #01bb55"></div><p class="paddingm">GOOD PARTS</p></span>
                                <span class="float-start paddingm labelAlign center-align  p4"><div class="labelGraph" style="background: #005abc"></div><p class="paddingm">REJECTED PARTS</p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flexDiv">
            <div class="outer-bottom" style="width: 35%;">
                <div class="outer-bottom-con">
                    <div style="float:left;" class="smallDivs">
                        <div class="alingCenter cssDiv"><p class="paddingm">Downtime</p></div>
                        <div class="alingCenter endDiv"><p id="downtime_duration"></p></div>
                    </div>
                    <div style="float:left;" class="smallDivs">
                        <div class="alingCenter cssDiv"><p class="paddingm">Cycle Time</p></div>
                        <div class="alingCenter endDiv"><p id="part_cycle_time"></p></div>
                    </div>
                    <div style="float:left;" class="smallDivs">
                        <div class="alingCenter cssDiv"><p class="paddingm">Reject Counts</p></div>
                        <div class="alingCenter endDiv"><p id="liveRejectCount"></p></div>
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
                            <p class="text-small" id="oui_availability"></p>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <p class="text-small"><b>P</b>erformance</p>
                            <p class="text-small" id="oui_performance"></p>
                        </div>
                        <div style="flex: left;width: 20%;">
                            <p class="text-small"><b>Q</b>uality</p>
                            <p class="text-small" id="oui_quality"></p>
                        </div>
                        <div style="flex: left;width: 20%;margin-right: 2rem;margin-left: 5rem;" class="smallDivs">
                            <div class="alingCenter cssDiv"><p class="paddingm">SHIFT OEE</p></div>
                            <div class="alingCenter endDiv"><p id="oui_oee"></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal fade" id="CorrectionPartsModal" tabindex="-1" aria-labelledby="CorrectionPartsModal1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none;">
                <div class="modal-title settings-machineAdd-model alingCenter" id="" style="">
                    <span id="CorrectBack" style="display: none;"><span class="dot dot-css"><i class="fa fa-arrow-left dot-cont"></i></span></span>
                    <span style="margin-left: 0.5rem;">CORRECTIONS</span>
                </div>
            </div>
            <div class="modal-body body_div">
                <div id="CorrectMainModelCont">    
                    <div class="flexDiv">
                        <div style="float: left;width: 40%;border-right: 1px solid #f2f2f2;margin-right: 1rem;">
                            <div class="flexDiv">
                                <div style="float: left;width: 50%">
                                    <label class="headTitle">Shift Date</label>
                                    <p class="paddingm marginTop font_weight_modal" id="shift_date_correction"></p>
                                </div>
                                <div style="float: left;width: 50%">
                                    <label class="headTitle">Shift</label>
                                    <p class="paddingm marginTop font_weight_modal" id="shift_id_correction"></p>
                                </div>
                            </div>
                            <div class="flexDiv alingCenter paddingOUI" style="height: 4rem;">
                                <div class="box rightmar" style="width: 100%;">
                                    <div class="input-box">
                                        <select class="form-select font_weight font_weight_modal" name="" id="time_range_correction" style="width: 100%;">
                                        </select>
                                        <label for="inputSiteNameAdd" class="input-padding">Select Time Range</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div style="float: left;width: 60%;">
                            <div class="flexDiv">
                                <div style="float: left;width: 40%">
                                    <label class="headTitle">Part Name</label>
                                    <p class="paddingm marginTop font_weight_modal" id="part_name_correction"></p>
                                </div>
                                <div style="float: left;width: 25%">
                                    <label class="headTitle">Min Counts</label>
                                    <p class="paddingm marginTop font_weight_modal" id="min_counts_correction"></p>
                                </div>
                                <div style="float: left;width: 25%">
                                    <label class="headTitle">Total Counts</label>
                                    <p class="paddingm marginTop font_weight_modal" id="total_counts_correction"></p>
                                    <input type="text" name="" value="" style="display: none;" id="total_counts_correction_val">
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
                                </div>
                            </div>
                            <div class="content flexDiv subDiveReason subDiveReasonCorrection" style="height: 20rem;">
                                <div style="height: 100%;width: 100%;display: flex;justify-content: center;align-items: center;" class="CorrectAddDiv" id="CorrectAddDivId">
                                    <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" class="icon_img_wh ICON CorrectAdd doth-add">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="" style="display: none;" id="CorrectAddCont">
                    <div class="flexDiv">
                        <div style="float: left;width: 20%">
                            <label class="headTitle">Shift Date</label>
                            <p class="paddingm marginTop font_weight_modal" id="shift_date_correction_count"></p>
                        </div>
                        <div style="float: left;width: 20%">
                            <label class="headTitle">Shift</label>
                            <p class="paddingm marginTop font_weight_modal" id="shift_id_correction_count"></p>
                        </div>
                        <!-- <div style="float: left;width: 20%">
                            <p class="paddingm titleTag">Shift</p>
                            <p class="paddingm marginTop">Shift 1</p>
                        </div> -->
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
                            <div class="KeyboardBtn okBtn okBtnCorrection">
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
                                    <label class="headTitle">Shift Date</label>
                                    <p class="paddingm marginTop font_weight_modal" id="shift_date_rejection"></p>
                                </div>
                                <div style="float: left;width: 50%">
                                    <label class="headTitle">Shift Date</label>
                                    <p class="paddingm marginTop font_weight_modal" id="shift_id_rejection"></p>
                                </div>
                            </div>
                            <div class="flexDiv alingCenter paddingOUI" style="height: 4rem;">
                                <div class="box rightmar" style="width: 100%;">
                                    <div class="input-box">
                                        <select class="form-select font_weight font_weight_modal" name="" id="time_range_rejection" style="width: 100%;">
                                        </select>
                                        <label for="inputSiteNameAdd" class="input-padding">Select Time Range</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="float: left;width: 60%;">
                            <div class="flexDiv">
                                <div style="float: left;width: 40%">
                                    <label class="headTitle">Part Name</label>
                                    <p class="paddingm marginTop font_weight_modal" id="part_name_rejection"></p>
                                </div>
                                <div style="float: left;width: 25%">
                                    <label class="headTitle">Max Rejects</label>
                                    <p class="paddingm marginTop font_weight_modal" id="max_rejects_rejection"></p>
                                </div>
                                <div style="float: left;width: 25%">
                                    <label class="headTitle">Total Rejects</label>
                                    <p class="paddingm marginTop font_weight_modal" id="total_counts_rejection"></p>
                                    <input type="text" name="" value="" style="display: none;" id="total_production_rejection">
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
                                    <div class="dotUser flexDiv RejectAdd add_rejection ReasonAdd" style="align-items: center;justify-content: center;display: none;">
                                        <img src="<?php echo base_url(); ?>/assets/img/plus-icon.png" class="icon_img_wh ICON doth-add" style="height: 3rem;width: 3rem;margin-left: 0.5rem;"> 
                                    </div>
                                </div>
                            </div>
                            <div class="content subDiveReason subDiveReasonRejection" style="height: 20rem;overflow: auto;">
                                <div style="height: 100%;width: 100%;display: flex;justify-content: center;align-items: center;" class="RejectAddDiv">
                                    <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" class="icon_img_wh ICON RejectAdd doth-add">
                                </div>
                                <!-- <div style="width: 100%;display: flex;height: 3.5rem;margin-top: 5px;">
                                    <div id="settings_div" style="width: 90%;margin-top:0;" class="">
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
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="" style="display: none;" id="ReasonAddCont">
                    <div class="flexDiv">
                        <div style="float: left;width: 20%">
                            <label class="headTitle">Shift Date</label>
                            <p class="paddingm marginTop font_weight_modal" id="shift_date_rejection1"></p>
                        </div>
                        <div style="float: left;width: 20%">
                            <label class="headTitle">Shift</label>
                            <p class="paddingm marginTop font_weight_modal" id="shift_id_rejection1"></p>
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
                                <input type="text" class="form-control inputBox" id="RejectionReason" name="" minlength="0" id_ref="" value="" maxlength="0">
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
                            <div class="KeyboardBtn okBtn KeyboardBtnRejection">
                                <li class="fa fa-arrow-right"></li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flexDiv ReasonsRejectDiv" style="width: 100%;flex-wrap: wrap;display: none;height: 20rem;overflow: scroll;" id="ReasonsReject">
                    <!-- <div style="width: 15rem;float: left;">
                        <div class="reason-box flexDiv" style="align-content: center;">
                            <div style="width: 30%">
                                <div class="dotUser" style="background:lightgrey;color:white;"><p></p></div>
                            </div>
                            <div style="width: 70%;align-items: center;align-content: center;justify-content: center;" class="flexDiv">
                                <p class="paddingm">Reason 1</p>             
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

<!-- Correction Delete Confirmation -->
<div class="modal fade" id="DeleteCorrection" tabindex="-1" aria-labelledby="DeleteCorrection1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
            <h5 class="modal-title settings-machineAdd-model" id="DeleteCorrection1" style="">CONFIRMATION MESSAGE</h5>
        </div>
        <div class="modal-body">
            <label style="color: black;">Are you sure you want to delete this correction record?</label>
        </div>
        <div class="modal-footer" style="border:none;">
            <a class="btn fo bn deleteCorrectionRec saveBtnStyle" name="" indx="" value="SAVE" >Save</a>
            <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close" >Cancel</a>   
        </div>
    </div>
  </div>
</div>

</body>
</html>

<!-- apexcharts js local -->
<script src="<?php echo base_url(); ?>/assets/apexchart/dist/apexcharts.js"></script>
<script type="text/javascript">

    var down_part = new Array();
    var part_collection = new Array();
    var event_ref= new Array();
    var machine_Name = "";
    var myChartList = "";


    DownPart();
    getMachineRecords();
    getMachineDataLive();
    getPartCompletion();

    getDownTimeGraph();
    getProductionGraph();
    getDowntimeDuration();
    getPartCycleTime();
    getRejectCounts();
    getLiveOEE();
    getLiveProduction();

    $(document).on('change','#op_machine_drp',function(event){
        getDownTimeGraph();
        getProductionGraph();
        getDowntimeDuration();
        getPartCycleTime();
        getRejectCounts();
        getLiveOEE();
        getLiveProduction();
    });

    $(document).on('click','.okBtnCorrection',function(event){
        var correction_count = $('#CorrectCount').val().trim();
        var correction_notes = $('#CorrectionNotes').val().trim();
        var production_event_id = $('#time_range_correction').val().trim();
        var production_count = $('#total_counts_correction_val').val().trim();

        var sign = $('#sign').text().trim();
        if (!correction_count || !correction_notes) {

        }else{

            var max_reject = parseInt(production_count) + parseInt(correction_count);

            $.ajax({
                url: "<?php echo base_url('Operator/updateCorrectionData'); ?>",
                type: "POST",
                dataType: "json",
                async:false,
                data:{
                    correction_count:correction_count,
                    correction_notes:correction_notes,
                    production_id : production_event_id,
                    max_reject : max_reject,
                },
                success:function(res){
                    if (res){
                        $('#CorrectMainModelCont').css("display","block");
                        $('#CorrectAddCont').css("display","none");
                        $('#CorrectBack').css("display","none");

                        $('.CorrectAddDiv').css("display","none");

                        $('.subDiveReasonCorrection').append('<div id="settings_div" style="width: 90%;height:3.5rem;" class="subDiveReason correction-list">'
                            +'<div class="row paddingm">'
                                +'<div class="col marleft">'
                                    +'<div class="flexDiv" style="align-content: center;width: 100%;">'
                                        +'<div style="align-items: center;justify-content: center;" class="flexDiv">'
                                            +'<p class="paddingm">'+correction_notes+'</p>'
                                            +'<input type="input" value="'+correction_notes+'" class="corrections_notes_val" style="display:none;">'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="col marright" >'
                                +'<p class="title paddingm">'+sign+" "+correction_count+'</p></div>'
                                +'<input type="input" value="'+sign+" "+correction_count+'" class="corrections_counts_val" style="display:none;">'
                            +'</div>'
                        +'</div>'
                        +'<div style="width: 10%;align-items: center;justify-content: center;margin-top:5px;height:3.5rem;" class="flexDiv correction-list">'
                            +'<div class="flexDiv" style="align-items: center;justify-content: center;font-size:1.5rem;">'
                            +'<div class="doth addNotes delete-correction">'
                                +'<img src="<?php echo base_url(); ?>/assets/img/delete.png" class="img_font_wh1" style="margin-left:10px;">'
                            +'</div>'
                            +'</div>'
                        +'</div>');
                    }
                },
                error:function(err){
                  // alert("Sorry!Try Agian!!");
                }
            });
        }
    });

    $(document).on('click','.delete-correction',function(event){
        var count = $('.delete-correction');
        var index_val = count.index($(this));
        $('.deleteCorrectionRec').attr('indx',index_val);
        $('#DeleteCorrection').modal('show');
    });

    $(document).on('click','.delete-rejection',function(event){
        var count = $('.delete-rejection');
        var index_val = count.index($(this));
        $('.rejection-list:eq('+index_val+')').remove();
        count = $('.delete-rejection');
        if(count.length < 1){
            $('.RejectAddDiv').css('display','block');
            $('.RejectAddDiv').css('display','flex');
            $('.add_rejection').css('display','none');
        }

        var total=0;
        $(".rejection-count-total").each(function(idx,ele) {
            total = total+ parseInt($('.rejection-count-total:eq('+idx+')').text());
        });
        $("#total_counts_rejection").text(total);
    });

    
    $(document).on('click','.deleteCorrectionRec',function(event){
        var indx = $('.deleteCorrectionRec').attr('indx');
        var notes = $('.corrections_notes_val:eq('+indx+')').val();
        var corrections_counts = $('.corrections_counts_val:eq('+indx+')').val();
        var production_event_id = $('#time_range_correction').val().trim();
        var production_count = $('#total_counts_correction_val').val().trim();

        var max_reject = parseInt(production_count) + parseInt(corrections_counts);

        $.ajax({
                url: "<?php echo base_url('Operator/updateCorrectionData'); ?>",
                type: "POST",
                dataType: "json",
                async:false,
                data:{
                    correction_count:null,
                    correction_notes:null,
                    production_id : production_event_id,
                    max_reject : max_reject,
                },
                success:function(res){
                    if (res){
                        $('#DeleteCorrection').modal('hide');
                        $('.correction-list').css("display","none");

                        $('.CorrectAddDiv').css("display","block");
                        $('.CorrectAddDiv').css("display","flex");
                        var x = $('#time_range_correction').val();
                        getData(x);
                    }
                },
                error:function(err){
                  // alert("Sorry!Try Agian!!");
                }
            });
    });

    function getData(x) {
        $.ajax({
            url: "<?php echo base_url('Operator/getProductionDetails'); ?>",
            type: "POST",
            dataType: "json",
            async:false,
            data:{
                production_id : x,
            },
            success:function(res){
                $('#min_counts_correction').text(res[0]['correction_min_counts']);
                $('#total_counts_correction').val(res[0]['corrections']);
                $('#total_counts_correction_val').text(res[0]['production']);

                if (res[0]['rejection_max_counts'] >= 0) {
                    $('#max_rejects_rejection').text(res[0]['rejection_max_counts']);
                }
                 
                $('.correction-list').remove();

                if (res[0]['corrections'].trim() != null && res[0]['corrections'].trim() != "") {

                    $('.CorrectAddDiv').css("display","none");

                    $('.subDiveReasonCorrection').append('<div id="settings_div" style="width: 90%;height:3.5rem;" class="subDiveReason correction-list">'
                        +'<div class="row paddingm">'
                            +'<div class="col marleft">'
                                +'<div class="flexDiv" style="align-content: center;width: 100%;">'
                                    +'<div style="align-items: center;justify-content: center;" class="flexDiv">'
                                        +'<p class="paddingm">'+res[0]['correction_notes']+'</p>'
                                        +'<input type="input" value="'+res[0]['correction_notes']+'" class="corrections_notes_val" style="display:none;">'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                            +'<div class="col marright" >'
                                +'<p class="title paddingm">'+res[0]['corrections']+'</p>'
                                +'<input type="input" value="'+res[0]['corrections']+'" class="corrections_counts_val" style="display:none;">'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                    +'<div style="width: 10%;align-items: center;justify-content: center;margin-top:5px;height:3.5rem;" class="flexDiv correction-list">'
                        +'<div class="flexDiv" style="align-items: center;justify-content: center;font-size:1.5rem;">'
                        +'<div class="doth addNotes delete-correction">'
                            +'<img src="<?php echo base_url(); ?>/assets/img/delete.png" class="img_font_wh1" style="margin-left:10px;">'
                        +'</div>'
                        +'</div>'
                    +'</div>');
                }

                var rejection_total = 0;
                if (res[0]['rejections'].trim() != null && res[0]['rejections'].trim() != "") {
                    $('.RejectAddDiv').css("display","none");
                    $('.add_rejection').css("display","block");
                    $('.add_rejection').css("display","flex");

                    var x = res[0]['rejections'].trim().split("&&");
                    x.forEach(function(arg) {
                        var t = arg.split("&");
                        rejection_total = rejection_total + t[1];
                        var q_reason="";
                        var temp_log = "";
                        res[0]['reasons'].forEach(function(reason) {
                            if (reason['quality_reason_id'] == t[0]) {
                                q_reason = reason['quality_reason_name'];
                                temp_log = q_reason.trim().slice(0,1).toUpperCase();
                            }
                        });
                        $('.subDiveReasonRejection').append('<div style="width: 100%;display: flex;height: 3.5rem;margin-top: 5px;" class="rejection-list">'
                                +'<div id="settings_div" style="width: 90%;margin-top:0;">'
                                    +'<div class="row paddingm">'
                                        +'<div class="col marleft" >'
                                            +'<div class="flexDiv" style="align-content: center;width: 100%;">'
                                                    +'<div class="dotUser" style="background:'+"color_code"+';color:white;"><p class="paddingm" style="text-align:center;margin:0;">'+temp_log+'</p>'
                                                    +'</div>'
                                                +'<div style="align-items: center;justify-content: center;" class="flexDiv">'
                                                    +'<p class="paddingm rejection-reason-id" id_ref="'+t[0]+'">'+q_reason+'</p>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col marright" ><p class="title paddingm rejection-count-total">'+t[1]+'</p></div>'
                                    +'</div>'
                                +'</div>'

                                +'<div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">'
                                    +'<div class="doth addNotes delete-rejection">'
                                        +'<img src="<?php echo base_url(); ?>/assets/img/delete.png" class="img_font_wh1" style="margin-left:10px;">'
                                    +'</div>'
                                +'</div>'
                            +'</div>');
                    });
                }

                $('#total_counts_rejection').text(rejection_total); 
                          
                $('#total_production_rejection').val(res[0]['production']);
            },
            error:function(err){
              // alert("Sorry!Try Agian!!");
            }
        });
    }

    $(document).on('change','#time_range_correction',function(event){
        var x = $('#time_range_correction').val();
        getData(x);
    });

    $(document).on('change','#time_range_rejection',function(event){
        var x = $('#time_range_rejection').val();
        getData(x);
    });

    function getPartCompletion(){
        var production_percent = 170;
        var production_percent_val = 470 - (2.4 * production_percent);
        var iterate = document.getElementsByClassName("circle");
        var refcolor = 'url(#GradientColor)';

        // 230
        for (val of iterate) {
            val.style.setProperty("--foo", production_percent_val);
            val.style.setProperty("--ref_graph", refcolor);
        }

        var color_code = "";
        if (production_percent > 75) {
            color_code = "#c2fb05";
        } else if (production_percent > 50) {
            color_code = "#fae910";
        } else if (production_percent > 25) {
            color_code = "#c55911";
        } else {
            color_code = "#d10527";
        }

        document.getElementById('circle_graph_colors')
            .attributes['stop-color'].value = color_code;
    }

    function addDownPart(part,part_id){
        down_part.push(part_id,part);
    }
    function DownPart(){
        $.ajax({
            url: "<?php echo base_url('PDM_controller/getPart'); ?>",
            type: "POST",
            dataType: "json",
            async:false,
            success:function(res_Site){  
                $('.checkboxes').empty();
                var elements = $();
                down_part = [];
                res_Site.forEach(function(item){
                    addDownPart(item.part_name,item.part_id);
                    if (item.status == 1) {
                        part_collection.push(Object.values(item));
                        elements = elements.add('<div class="option_multi"><div class="multi-check "><input type="checkbox" id="one" value="'+item.part_id+'" name="multi_part[]" class="checkboxIn"></div><div class="multi-lable check_dis"><span>'+item.part_id+'-'+item.part_name+'</span></div></div>');
                    }
                });
                $('.checkboxes').append(elements);
            },
            error:function(res){
              // alert("Sorry!Try Agian!!");
            }
        });
    }

    $(document).on('click','.open_correction',function(event){
        
        $('#CorrectMainModelCont').css("display","block");
        $('#CorrectAddCont').css("display","none");
        $('#CorrectBack').css("display","none");

        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));
        var part_id = $('#part_name_oui').attr("part_id");
        getProductionHours(machine_id,shift,shift_date,part_id);
        $('#CorrectionPartsModal').modal('show');
    });

    $(document).on('click','.open_rejection',function(event){
        
        // $('#CorrectMainModelCont').css("display","block");
        // $('#CorrectAddCont').css("display","none");
        // $('#CorrectBack').css("display","none");

        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));
        var part_id = $('#part_name_oui').attr("part_id");
        getProductionHours(machine_id,shift,shift_date,part_id);
        getQualityReasons();

        $('#RejectPartsModal').modal('show');
    });

    function getQualityReasons() {
        $.ajax({
            url: "<?php echo base_url('Operator/Reject_retrive'); ?>",
            method:"post",
            dataType:"json",
            async:false,
            success:function(result){
                $(".ReasonsRejectDiv").empty();
                result.forEach(function(item) {
                    var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    var randomColor = color[Math.floor(Math.random()*color.length)];
                    var x = item['quality_reason_name'].trim().slice(0,1).toUpperCase();

                    $(".ReasonsRejectDiv").append('<div style="width: 15rem;float: left;" class="select_quality_reason doth-add" id_ref="'+item['quality_reason_id']+'" reason="'+item['quality_reason_name']+'" color_code="'+randomColor+'">'
                        +'<div class="reason-box flexDiv" style="align-content: center;">'
                            +'<div style="width: 30%;">'
                                +'<div class="dotUser" style="background:'+randomColor+';color:white;display:flex;justify-content:center;align-items:center;">'
                                +'<p class="paddingm">'+x+'</p></div>'
                            +'</div>'
                            +'<div style="width: 70%;align-items: center;align-content: center;" class="flexDiv">'
                                +'<p class="paddingm">'+item['quality_reason_name']+'</p>'
                            +'</div>'
                        +'</div>'
                    +'</div>');
                })
            },
            error:function(err){
              // alert("Error while receiving machine records!");
            }
        });
    }

    $(document).on("click", ".select_quality_reason", function(){
        var count = $('.select_quality_reason');
        var index = count.index($(this));
        var id = $('.select_quality_reason:eq('+index+')').attr('id_ref');
        var reason = $('.select_quality_reason:eq('+index+')').attr('reason');
        var color_code = $('.select_quality_reason:eq('+index+')').attr('color_code');
        
        $('#RejectionReason').attr('id_ref',id);
        $('#RejectionReason').attr('index_ref',index);
        $('#RejectionReason').attr('color_code',color_code);
        $('#RejectionReason').val(reason);
    });

    $(document).on("click", ".KeyboardBtnRejection", function(){
        var rejection_count = $('#RejectCount').val().trim();
        var rejection_reason_id = $('#RejectionReason').attr('id_ref').trim();
        var production_event_id = $('#time_range_rejection').val().trim();
        var rejection_reason = $('#RejectionReason').val().trim();
        var color_code = $('#RejectionReason').attr('color_code');

        var x = rejection_reason.trim().slice(0,1).toUpperCase();
        
        $('.add_rejection').css("display","block");
        $('.add_rejection').css("display","flex");

        var total=0;
        $(".rejection-count-total").each(function(idx,ele) {
            total = total+ parseInt($('.rejection-count-total:eq('+idx+')').text());
        });
        total = total + parseInt(rejection_count);
        $("#total_counts_rejection").text(total);

        var reason ="";
        $(".rejection-reason-id").each(function(idx,ele) {
            reason =reason+($('.rejection-reason-id:eq('+idx+')').attr('id_ref'))+"&"+parseInt($('.rejection-count-total:eq('+idx+')').text())+"&&";
        });
        reason= reason+rejection_reason_id+"&"+rejection_count;

        var production_count = $('#total_production_rejection').val().trim();

        if (!rejection_count) {

        }else{

            var min_count = parseInt(production_count) - parseInt(total);

            $.ajax({
                url: "<?php echo base_url('Operator/updateRejectionData'); ?>",
                type: "POST",
                dataType: "json",
                async:false,
                data:{
                    rejection_count:reason,
                    production_id : production_event_id,
                    min_count : min_count,
                },
                success:function(res){
                    if (res){
                        $('#ReasonMainModelCont').css("display","block");
                        $('#ReasonAddCont').css("display","none");
                        $('#ReasonBack').css("display","none");

                        $('.RejectAddDiv').css("display","none");
                            $('.subDiveReasonRejection').append('<div style="width: 100%;display: flex;height: 3.5rem;margin-top: 5px;" class="rejection-list">'
                                +'<div id="settings_div" style="width: 90%;margin-top:0;">'
                                    +'<div class="row paddingm">'
                                        +'<div class="col marleft" >'
                                            +'<div class="flexDiv" style="align-content: center;width: 100%;">'
                                                    +'<div class="dotUser" style="background:'+color_code+';color:white;"><p class="paddingm" style="text-align:center;margin:0;">'+x+'</p>'
                                                    +'</div>'
                                                +'<div style="align-items: center;justify-content: center;" class="flexDiv">'
                                                    +'<p class="paddingm rejection-reason-id" id_ref="'+rejection_reason_id+'">'+rejection_reason+'</p>'
                                                +'</div>'
                                            +'</div>'
                                        +'</div>'
                                        +'<div class="col marright" ><p class="title paddingm rejection-count-total">'+rejection_count+'</p></div>'
                                    +'</div>'
                                +'</div>'

                                +'<div style="width: 10%;align-items: center;justify-content: center;" class="flexDiv">'
                                    +'<div class="doth addNotes delete-rejection">'
                                        +'<img src="<?php echo base_url(); ?>/assets/img/delete.png" class="img_font_wh1" style="margin-left:10px;">'
                                    +'</div>'
                                +'</div>'
                            +'</div>');
                            }
                },
                error:function(err){
                  // alert("Sorry!Try Agian!!");
                }
            });
        }
    });

    function getProductionHours(machine_id,shift,shift_date,part_id){
        $('#time_range_correction').empty();
        $('#time_range_rejection').empty();
        
        $.ajax({
            url: "<?php echo base_url('Operator/retirve_production_hours'); ?>",
            method:"post",
            dataType:"json",
            async:false,
            data:{
                machine_id:machine_id,
                shift:shift,
                shift_date:shift_date,
                part_id:part_id,
            },
            success:function(result){

                $('#time_range_correction').append('<option value="0">Select range</option>');
                $('#time_range_rejection').append('<option value="0">Select range</option>');
                result.forEach(function(item){
                    var elements = $();
                    var elements1 = $();
                    elements = elements.add('<option value="'+item.production_event_id+'">'+item.start_time+'-'+item.end_time+'</option>');
                    elements1 = elements1.add('<option value="'+item.production_event_id+'">'+item.start_time+'-'+item.end_time+'</option>');
                    $('#time_range_correction').append(elements);
                    $('#time_range_rejection').append(elements1);
                });
            },
            error:function(err){
              // alert("Error while receiving machine records!");
            }
        });
    }

    function getMachineRecords(){
        $('#op_machine_drp').empty();
        $.ajax({
            url: "<?php echo base_url('Operator/retirve_machine_data'); ?>",
            method:"post",
            dataType:"json",
            async:false,
            success:function(result_machine){
                var elements = $();
                result_machine.forEach(function(item){
                    elements = elements.add('<option value="'+item.machine_id+'" mname="'+item.machine_name+'">'+item.machine_name+'-'+item.machine_id+'</option>');
                    $('#op_machine_drp').append(elements);
                });
                $("#op_machine_drp option:first").attr('selected','selected');
            },
            error:function(err){
              // alert("Error while receiving machine records!");
            }
        });
    }

    function getMachineDataLive() {
        $.ajax({
            url: "<?php echo base_url('Operator/getLive'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            async: false,
            contentType: "application/json; charset=utf-8",
            success: function(res) {
                var date = new Date(res[0]['shift_date'])
                date = date.getDate() + " " + date.toLocaleString([], {
                    month: 'short'
                }) + " " + date.getFullYear();

                $("#shift_date").html(date);
                $("#shift_date_correction").html(date);
                $("#shift_date_correction_count").html(date);
                $('#shift_date').attr('sdate_format', res[0]['shift_date']);
                $("#shift_id").html("Shift " + res[0]['shift_id']);
                $("#shift_id_correction").html("Shift " + res[0]['shift_id']);
                $("#shift_id_correction_count").html("Shift " + res[0]['shift_id']);
                var s_time = res[0]['start_time'].split(":");
                var e_time = res[0]['end_time'].split(":");
                $("#start_time").html(s_time[0] + ":" + s_time[1]);
                $("#end_time").html(e_time[0] + ":" + e_time[1]);

                $("#s_time_val").val(s_time[0] + ":" + s_time[1] + ":" + s_time[2]);
                $("#e_time_val").val(e_time[0] + ":" + e_time[1] + ":" + s_time[2]);

                $("#s_date_ref").val(res[0]['shift_date']);
                $("#s_id_ref").val(res[0]['shift_id']);

                $("#shift_date_rejection").html(date);
                $("#shift_id_rejection").html("Shift " + res[0]['shift_id']);

                $("#shift_date_rejection1").html(date);
                $("#shift_id_rejection1").html("Shift " + res[0]['shift_id']);
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function fullscreen(){
        const element = document.documentElement;
        if (element.requestFullscreen) {
          element.requestFullscreen();
        } else if (element.webkitRequestFullscreen) {
          element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
          element.msRequestFullscreen();
        }
    }

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
    $(document).on("click", ".RejectAdd", function(){
        var x = $('#time_range_rejection').val();

        $('#RejectCount').val("");
        $('#RejectionReason').val("");

        if (x !=0) {
            $('#ReasonBack').css("display","block");
            $('#ReasonMainModelCont').css("display","none");
            $('#ReasonAddCont').css("display","block");
        }
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
        var x = $('#time_range_correction').val();

        $('#CorrectCount').val("");
        $('#CorrectionNotes').val("");

        if (x !=0) {
            $('#CorrectBack').css("display","block");
            $('#CorrectMainModelCont').css("display","none");
            $('#CorrectAddCont').css("display","block");
        }
    });
    $(document).on("click", ".RejectAdd", function(){
        var x = $('#time_range_rejection').val();
        // $('#CorrectCount').val("");
        // $('#CorrectionNotes').val("");
        if (x !=0) {
            $('#ReasonBack').css("display","block");
            $('#ReasonMainModelCont').css("display","none");
            $('#ReasonAddCont').css("display","block");
        }
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

    function getLiveOEE(){
        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var s = shift.split("");
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

        $.ajax({
            url: "<?php echo base_url('Current_Shift_Performance/getLiveMode');?>",
            type: "POST",
            dataType: "json",
            data:{
                shift_date: shift_date,
                shift_id: shift,
                filter:2,
            },
            success: function(res){
                res['oee'].forEach(function(machine) {
                    if (machine['Machine_Id'] == machine_id) {
                        $('#oui_availability').text(parseInt(machine['Availability'])+"%");
                        $('#oui_performance').text(parseInt(machine['Performance'])+"%");
                        $('#oui_quality').text(parseInt(machine['Quality'])+"%");
                        $('#oui_oee').text(parseInt(machine['OEE'])+"%");
                    }
                });

                res['machine_name'].forEach(function(machine) {
                    if (machine['machine_id'] == machine_id) {
                        $('#machine_name_oui').text(machine['machine_name']);
                    }
                });


                res['latest_event'].forEach(function(machine) {
                    if (machine[0]['machine_id'] == machine_id) {
                        $('#latest_event_machine').text(machine[0]['event']);
                        var t = machine[0]['duration'].split(".");
                        $('#event_duration_machine').text(t[0]+"m");
                    }
                });
            },
            error: function(err) {
                // 
            }
        });
    }
    function getDowntimeDuration(){
        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));
        $.ajax({
            url: "<?php echo base_url('Operator/getLiveDowntime'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_ref : machine_id,
                shift_ref : shift,
                shift_date_ref : shift_date
            },
            success: function(res) {
                if (res['h'] > 0) {
                    $('#downtime_duration').text(res['h']+"h"+" "+res['m']+"m");
                }else{
                    $('#downtime_duration').text(res['m']+"m");
                }
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getLiveProduction(){
        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

        $.ajax({
            url: "<?php echo base_url('Operator/getLiveProduction'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_id_ref : machine_id,
                shift_id_ref : shift,
                shift_date_ref : shift_date, 
            },
            success: function(res) {
                $('#remaining_time_duration').text(res['duration_min']+" "+"min");

                var date = new Date();
                date.setMinutes (date.getMinutes() + parseInt(res['duration_min']));

                var x_date = ("0" +date.getDate()).slice(-2)+" "+(date.toLocaleString([], { month: 'short' })+" "+(date.getFullYear()))+", "+("0" +date.getHours()).slice(-2)+":"+("0" +date.getMinutes()).slice(-2);

                $('#estimated_time_target').text(x_date);
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getPartCycleTime(){
        var machine_id = $('#op_machine_drp').val();
        $.ajax({
            url: "<?php echo base_url('Operator/getPartCycleTime'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_ref : machine_id,
            },
            success: function(res) {
                $('#part_cycle_time').text(res[0]['NICT']+"S");
                $('#part_name_oui').text(res[0]['part_name']);
                $('#part_name_correction').text(res[0]['part_name']);
                $('#part_name_oui').attr("part_id",""+res[0]['part_id']+"");

                $('#part_name_rejection').text(res[0]['part_name']);
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getRejectCounts(){
        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var s = shift.split("");
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));
        $.ajax({
            url: "<?php echo base_url('Operator/getLiveRejectCount'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_ref : machine_id,
                shift_ref : shift,
                shift_date_ref : shift_date
            },
            success: function(res) {
                $('#liveRejectCount').text(res[0]['rejections']); 
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getDownTimeGraph(){
        var machine_id = $('#op_machine_drp').val();
        var shift_date_1 = $('#s_date_ref').val();
        var shift = $('#s_id_ref').val();
        var s = shift.split("");
        var dateShift = new Date(shift_date_1);
        shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

        var url = "<?php echo base_url('PDM_controller/getDownGraph'); ?>";
        $.ajax({
            method: 'POST',
            url: url,
            dataType:'json',
            data:{
                machine_id:machine_id,  
                shift_date:shift_date,
                shift:s[0],
            }
        }).then(function(response){
            response['shift']['shift'].forEach(function(item){
                var x = item.shifts.split("");
                if (x[0] == s[0]) {
                    const downtime_start_time_split = item.start_time.split(':');
                    const downtime_end_time_split = item.end_time.split(':');
                    $('.startTimeVal').html(downtime_start_time_split[0]+':'+downtime_start_time_split[1]);
                    $('.endTimeVal').html(downtime_end_time_split[0]+':'+downtime_end_time_split[1]);
                    // graph load time set the input value
                    $('#start_time_from').val(downtime_start_time_split[0]+':'+downtime_start_time_split[1]);
                    $('#start_time_till').val(downtime_end_time_split[0]+':'+downtime_end_time_split[1]);

                    shift_stime = item.start_time;
                    shift_etime = item.end_time;
                }
            });
            $('#chartOp').empty();
            var graph_Data = [];
            var machine_on_count=[];
            var machine_off_count=[];
            var tool_change_count=[];
            var i=0;
            var preview ="";
            var val;
            var x=0;
            var noDataArray=[];

            if (response['machineData'].length >0)
            {
                $.each(response['machineData'],function(key,model){
                    if(parseInt(model.duration) >= 0){

                        if (model.event== "No Data") {
                          noDataArray.push('slantedLines');
                        }
                        else{
                          if (key == 0) {
                            st = new Date(model.calendar_date+" "+shift_stime);
                            et = new Date(model.calendar_date+" "+model.start_time);
                            if (st.getTime() !== et.getTime()) {
                              noDataArray.push('slantedLines');
                            }
                            else{
                              noDataArray.push(undefined);
                            }
                          }else{
                            noDataArray.push(undefined);
                          }
                        }
                        // down_notes.push(model.notes);
                        // data_duration.push(model.start_time);
                        // data_duration.push(model.end_time);
                        part_name_arr_pass = getpartnames_graph(model.part_id);
                        
                        var colordemo = "";
                        machineID_ref = model.machine_id;
                        shift_date_ref = model.shift_date;
                        shift_Ref = model.shift_id;
                        var duration = model.duration;

                        colordemo = color_bar(model.event,model.reason_mapped);
                        var machineEvent =model.machine_event_id;
                        event_ref.push(model.machine_event_id);

                        colordemo = color_bar(model.event,model.reason_mapped);

                        if (key == 0) {
                            st = new Date(model.calendar_date+" "+shift_stime);
                            et = new Date(model.calendar_date+" "+model.start_time);
                            if (st.getTime() !== et.getTime()) {
                              var res = Math.abs(et - st) / 1000;
                              duration=(Math.floor(res / 60))+"."+(Math.floor(res % 60));

                              colordemo = color_bar("No Data",model.reason_mapped);
                              graph_Data.push({name:"No Data",data:[duration],color:colordemo,start:shift_stime,end:model.start_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:"No Part",duration:duration});
                            }
                            else if (key == (response['machineData'].length -1)) {
                              st = new Date(model.calendar_date+" "+shift_etime);
                              et = new Date(model.calendar_date+" "+model.end_time);
                              if (st.getTime() !== et.getTime()) {
                                et_x = new Date();
                                et = et_x;
                                st = new Date(model.calendar_date+" "+model.start_time);
                                var res_tmp = Math.abs(et - st) / 1000;
                                duration_tmp=(Math.floor(res_tmp / 60))+"."+(Math.floor(res_tmp % 60));
                                x_time = (et_x.getHours() > 9 ? et_x.getHours(): "0" + et_x.getHours())+":"+(et_x.getMinutes() > 9 ? et_x.getMinutes(): "0" + et_x.getMinutes())+":"+(et_x.getSeconds() > 9 ? et_x.getSeconds(): "0" + et_x.getSeconds());

                                graph_Data.push({name:model.event,data:[duration_tmp],color:colordemo,start:model.start_time,end:x_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:duration_tmp});

                                noDataArray.push('slantedLines');
                                st = new Date(model.calendar_date+" "+shift_etime);
                                var res = Math.abs(et - st) / 1000;
                                duration=(Math.floor(res / 60))+"."+(Math.floor(res % 60));
                                colordemo = color_bar("No Data",model.reason_mapped);
                                graph_Data.push({name:"No Data",data:[duration],color:colordemo,start:model.end_time,end:shift_etime,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:duration});
                              }
                              else{
                                graph_Data.push({name:model.event,data:[model.duration],color:colordemo,start:model.start_time,end:model.end_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:model.duration});
                              }
                            } 
                            else{
                              graph_Data.push({name:model.event,data:[model.duration],color:colordemo,start:model.start_time,end:model.end_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:model.duration});
                            }
                        }
                        else if (key == (response['machineData'].length -1)) {
                          st = new Date(model.calendar_date+" "+shift_etime);
                          et = new Date(model.calendar_date+" "+model.end_time);
                          if (st.getTime() !== et.getTime()) {
                            et_x = new Date();
                            et = et_x;
                            st = new Date(model.calendar_date+" "+model.start_time);
                            var res_tmp = Math.abs(et - st) / 1000;
                            duration_tmp=(Math.floor(res_tmp / 60))+"."+(Math.floor(res_tmp % 60));
                            x_time = (et_x.getHours() > 9 ? et_x.getHours(): "0" + et_x.getHours())+":"+(et_x.getMinutes() > 9 ? et_x.getMinutes(): "0" + et_x.getMinutes())+":"+(et_x.getSeconds() > 9 ? et_x.getSeconds(): "0" + et_x.getSeconds());

                            graph_Data.push({name:model.event,data:[duration_tmp],color:colordemo,start:model.start_time,end:x_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:duration_tmp});

                            noDataArray.push('slantedLines');
                            st = new Date(model.calendar_date+" "+shift_etime);
                            var res = Math.abs(et - st) / 1000;
                            duration=(Math.floor(res / 60))+"."+(Math.floor(res % 60));
                            colordemo = color_bar("No Data",model.reason_mapped);
                            graph_Data.push({name:"No Data",data:[duration],color:colordemo,start:model.end_time,end:shift_etime,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:duration});
                          }
                          else{
                            graph_Data.push({name:model.event,data:[model.duration],color:colordemo,start:model.start_time,end:model.end_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:model.duration});
                          }
                        }  
                        else{
                            graph_Data.push({name:model.event,data:[model.duration],color:colordemo,start:model.start_time,end:model.end_time,machineEvent:machineEvent,down_notes:model.notes,machine_Name:machine_Name,part_Name:part_name_arr_pass,duration:model.duration});
                        }
                    }
                });
            }
            else{
                noDataArray.push('slantedLines');
                var colordemo = "";
                colordemo = color_bar("No Data",0);
                var du = response['shift']['duration'][0]['duration'].split(":");
                var d = parseFloat((parseInt(du[0])*60)+parseInt(du[1]));
                colordemo = color_bar("No Data",0);

                graph_Data.push({name:"No Data",data:[(d).toFixed(2)],color:colordemo,start:shift_stime,end:shift_etime,machineEvent:"No Event",down_notes:"No Notes",machine_Name:machine_Name,part_Name:"No Part",duration:d});
            }

            var options = {
                    series: graph_Data,
                    chart: {
                    type: 'bar',
                    height: 70,
                    stacked: true,
                    stackType: '100%',
                    sparkline: {
                      enabled: true
                    },
                    stroke: {
                      width: 0,
                      colors: ['#fff']
                    },
                  },
                  plotOptions: {
                    bar: {
                      horizontal: true,
                       barHeight: '100%',
                    },
                  },
                  xaxis: {
                    tickPlacement: 'on',
                    labels: {
                      show:false,
                      formatter: function (val) {
                        return val + "M"
                      }
                    }
                  },
                  yaxis: {
                    title: {
                      text: undefined
                    },
                  },
                  tooltip: {
                    custom: function({series, seriesIndex, dataPointIndex, w}) {
                      var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
                      var sname = w.globals.initialSeries[seriesIndex].name;
                      var start_time = w.globals.initialSeries[seriesIndex].start;
                      var end_time = w.globals.initialSeries[seriesIndex].end;
                      var part_id = w.globals.initialSeries[seriesIndex].part_id;
                      var machine_Name_Tooltip = w.globals.initialSeries[seriesIndex].machine_Name;
                      var part_name_tooltip = w.globals.initialSeries[seriesIndex].part_Name;
                      
                      return ('<div class="Tooltip_Container">'+'<div>'
                            +'<p class="paddingm nameHeader">'+sname+'</p>'
                            +'<p class="paddingm contentName">'+part_name_tooltip+'</p>'
                            +'<p class="paddingm contentName leftAllign"><span>'+start_time+' to </span><span>'+end_time+'</span></p>'
                            +'<p class="paddingm durationVal leftAllign">'+data+'m</p>'
                          +'</div>'
                        +'</div>'
                              
                      );
                    },
                  },
                  fill: {
                    opacity: 1,
                    type: 'pattern',
                    pattern: {
                      style: noDataArray,
                    }
                  },
                  legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetY: -10,
                    show:false
                  },
                  annotations: {
                    points:[
                        {
                            x: 30,
                            y: 300,
                            marker: {
                                size: 8,
                                fillColor: '#fff',
                                strokeColor: 'red',
                                radius: 2
                            }
                        }
                    ]
                },
            };
            var chart = new ApexCharts(document.querySelector("#chartOp"), options);
            chart.render();
        });
    }
function getProductionGraph(){
    var machine_id = $('#op_machine_drp').val();
    var shift_date_1 = $('#s_date_ref').val();
    var shift = $('#s_id_ref').val();
    var dateShift = new Date(shift_date_1);
    shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

    $('#production-graph').remove();
    $('.production-graph-prod').append('<canvas id="production-graph"><canvas>');
    // $('.chartjs-hidden-iframe').remove();

    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getLiveMode');?>",
        type: "POST",
        dataType: "json",
        async:false,
        data:{
            shift_date: shift_date,
            shift_id: shift,
            filter:2,
        },
        success: function(res){

            var hours_list=[];
            var production_count = [];
            var production_target =[];
            var rejection_count =[];

            res['hours'].forEach(function(item){
                hours_list.push(item);
            });

            res['data'].forEach(function(item){
                if (item['machine'] == machine_id) {
                    item['production'].forEach(function(p){
                        production_count.push(parseInt(p['production']));
                    });
                }
            });

            res['data'].forEach(function(item){
                if (item['machine'] == machine_id) {
                    item['production'].forEach(function(p){
                        rejection_count.push(parseInt(p['rejections']));
                    });
                }
            });

            res['data'].forEach(function(item){
                if (item['machine'] == machine_id) {
                    item['targets'].forEach(function(p){
                        production_target.push(p);
                    });
                }
            });

                ChartDataLabels.defaults.color = "#ffffff";
                ChartDataLabels.defaults.font.size=16;
                ChartDataLabels.defaults.font.family = "Roboto, sans-serif";

                var ctx = document.getElementById('production-graph').getContext('2d');
                myChartList = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: hours_list,
                        datasets: [{
                                label: "Total Parts",
                                type: "bar",
                                backgroundColor: "#007a37",
                                borderWidth: 1,
                                fill: true,
                                data:production_count,
                                // part_name: part_name_list,
                                // rejections: rejections_list,
                                categoryPercentage: 1.0,
                                barPercentage: 0.8,
                            },
                            {
                                label: "Total Rejection",
                                type: "bar",
                                backgroundColor: "#595959",
                                borderWidth: 1,
                                fill: true,
                                data:rejection_count,
                                // part_name: part_name_list,
                                // rejections: rejections_list,
                                categoryPercentage: 1.0,
                                barPercentage: 0.8,
                            },
                            {
                                label: "Production Target",
                                type: "line",
                                backgroundColor: "#ffffff",
                                borderColor: "#ffffff",
                                borderWidth: 1,
                                fill: false,
                                data:production_target,
                                // part_name: part_name_list,
                                pointRadius: 0,
                                stepped: 'before',
                            },
                        ],
                    },
                    options: {
                        scalebeginAtZero: false,
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                display: false,
                                beginAtZero: true,
                                grid: {
                                    display: false,
                                    color:"#01a149",
                                },
                                stacked: true,
                            },
                            x: {
                                display: true,
                                grid: {
                                    display: true,
                                    color:"#01a149",
                                },
                                stacked: true,
                                ticks:{
                                    crossAlign: 'far',
                                    padding:5,
                                    color:"#ffffff",
                                }
                            },
                        },
                        plugins: {
                            datalabels: {
                                anchor: "start",
                                align: "end",
                                offset: 6,
                                color: "white",
                                font: {
                                    size: 12,
                                },
                                formatter: (value, context) => context.datasetIndex === 0 ?
                                    value : '',
                            },
                            legend: {
                                display: false,
                                labels: {
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                // enabled: false,
                                // external: productionTooltip,
                            },
                        },
                    },
                    plugins: [ChartDataLabels],
                });
        },
        error: function(err){
            // error......
        }
    });
}

function color_bar(color,reason){
    var colordemo = "";
    if(color == "Machine OFF"){
        if (reason == 1) {
            colordemo = "#686868";
        }
        else{
            colordemo = "#888888";
        }
    }
    else if(color == "Inactive"){
        if (reason == 1) {
            colordemo = "#4F8DF2";
        }
        else{
            colordemo = "#015BBC";
        }
    }
    else if(color == "Active"){
        colordemo= "#01bb55";
    }
    else if(color == "Offline"){
        colordemo="#f2f2f2";
    }
    else{
        colordemo="#f2f2f2";
    }
    return colordemo;
}

// graph and records part id to change part name 
function getpartnames_graph(tmp_part_id_arr){
  var part_id_a = tmp_part_id_arr.split(",");
  var part_len = parseInt(part_id_a.length);
  var partname_arr = new Array();
  if (parseInt(part_len)>1) {
    for(var i=0;i<parseInt(part_len);i++){
  
      for(let j=0;j<parseInt(down_part.length)/2;j++){
        if (part_id_a[i] === down_part[2*j]) {
            partname_arr.push(" "+down_part[(2*j)+1]);
        }
      }
    }
  }else{
    if (part_id_a[0] === "PT1001") {
        partname_arr.push(""+"No Part");
    }else{
      for(var i=0;i<parseInt(part_len);i++){
  
        for(let j=0;j<parseInt(down_part.length)/2;j++){
            if (part_id_a[i] === down_part[2*j]) {
                partname_arr.push(" "+down_part[(2*j)+1]);
            }
        }
      }
    }
  }
  return partname_arr.toString();
}

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

