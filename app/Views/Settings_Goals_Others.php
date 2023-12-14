
<style type="text/css">
    .hrColor{
        color:#848484;
    }
    .img_validate{
        color:red;
        font-size:12px;
    }
    .grey_label{
        color:#848484;
        font-size:0.7rem;   
    }
    .img_font_wh{
        width: 1.2rem;
        height: 1.2rem;
    }
    /*downtime reasons font weight color*/
    .dm-font{
        font-weight: 498;
        color: #595959;
    }
    .general_header{
        font-size: 0.9rem;
        font-weight: 400;
        color: #A6A6A6;
        font-family: 'Roboto' sans-serif;
       /* opacity: 10%;*/
    }
    .general_header_model{
        font-size: 1rem;
        /* font-weight: 400; */
        color: #A6A6A6;
        font-family: 'Roboto' sans-serif;
        opacity: 70%;
    }

    .no_img_circle{
        background-color:rgb(0, 90, 188);
        height:2.5rem;
        width:2.5rem;
        border-radius:50%;

    }
    /* workshift management new custom css */

    .form_custome_design{
        width:100%;
        height:2.3rem;
        border-radius:4px;
        border:1px solid #ced4da;
        position: relative;
        display:inline-block;
    }

    .form_custome_design:focus{
        color: #495057;
        background-color: #fff;
        border-color:	#00BFFF ; 
        border:2px;
        outline: 0;
        box-shadow: 0 0 0 0.3rem rgba(0, 123, 255, 0.25);

    }

    .click_tooltip{
            visibility: hidden;
            width: 10rem;
            height: 2rem;
            background-color: white;
            border: 1px solid #ced4da;
            color: black;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            top: 60%;
            left:50%;
            margin-left: -200px;
            height: max-content;
        }

        .input-box_new{
            height:2.7rem;
        }

        
.col_align_6{
    width: 45%;
    display: flex;
    flex-direction: column;
}
.incre_div{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    color:#989fac;
}
.hour_dis{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 2.5rem;
    background-color:var(--save_btn_background_color);
    color:var(--save_btn_font_color);
    border:1px solid;
    border-radius:7px;
}
.decre_div{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color:#989fac;
    cursor: pointer;
}
.col_align_6_1{
    width: 10%;
    font-size: xx-large;
    justify-content: center;
    align-items: center;
    align-self: center;
    color:#989fac;
}


.col_align_6_2{
    width: 45%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

}

.custome_lable{
    position: absolute;
    top:0.5rem;
    left:1.6rem;
    font-size:12px;
    background-color:white;
    color:#8c8c8c;
    padding-left:3px;
    padding-right:3px;
}

#set_hour_minute option{
    padding: 0.3rem;
}
#set_hour_minute option:hover{
    background-color: var(--save_btn_background_color);
    color: white;
}

.OEECalcStyle{
    padding-top: 0.5rem;
    margin-left: 1rem;
    padding-left: 0.2rem;
    z-index: 1000;
    font-weight: 500;
    font-size: 1rem;
}

.ellipse{
    white-space: initial;
    line-height: 1rem;
}


/* three dots css 2023-09-27 */
.three_dots_css{
    overflow:hidden;
    text-overflow:ellipsis;
    white-space:nowrap;
    width:100%;
    margin:auto;
    padding-left:1rem;
    text-align:start;
}

</style>

<div class="mr_left_content_sec">
    <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
      <div class="container-fluid paddingm display_f justify_sb align_c">
        <p class="float-start fnt_fam mdl_header" style="">General Settings</p>
      </div> <!-----top left side------>
    </nav>
    <div>
        <div class="contentGeneralSettings">
            <div style="margin:2.5rem;">
                    <div class="card bodercss">
                        <p class="fieldTitle input-padding">GOALS</p>
                        <div class="content-container">
                            <div class="row paddingm"> 
                                <div class="col paddingm">
                                    <!-----financial metrics starting point------>
                                    <p class="card-subtitle float-start title  general_header">FINANCIAL METRICS</p>
                                    <!----edit option for financial metrices----->
                                    <?php
                                        $control = $this->data['access'][0]['settings_general'];
                                     if($control >= 2){ ?>
                                    <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen" style="margin-top: 20px;" id="show_edit_financial_metrics">
                                <?php } ?>
                                </div>
                            </div>
                        </div>     
                        <div class="container genmtop">
                            <div class="row paddingm">
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall TEEP % Target</label>
                                        <!----over all TEEP id is OTEEP------->
                                        <p class="paddingm"><span id="OTEEP" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall OOE % Target</label>
                                        <!----over all TEEP id is OOOE------->
                                        <p class="paddingm"><span id="OOOE" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm FMalign">
                                        <label class="headTitle">Overall OEE % Target</label>
                                        <!----over all TEEP id is OOEE------->
                                        <p class="paddingm"><span id="OOEE" class="font_weight"></span>%</p>
                                </div>
                            </div>
                        </div>
                        <div class="container genmtop">
                            <div class="row paddingm">
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Availability % Target</label>
                                        <!-------Availability--------->
                                        <p class="paddingm"><span id="Availability" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Performance % Target</label>
                                           <!-------------Performance----------->
                                        <p class="paddingm"><span id="Performance" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm">
                                        <label class="headTitle">Quality % Target</label>
                                          <!-----Quality------>
                                        <p class="paddingm"><span id="Quality" class="font_weight"></span>%</p>
                                </div>
                                <div class="float-start col-lg-3 paddingm ">
                                        <label class="headTitle">OEE % Target</label>
                                        <!----OEE------>
                                        <p class="paddingm"><span id="OEE" class="font_weight"></span>%</p>
                                </div>
                            </div>
                        </div>
                        <!----financial metrics ending-------->
                        <!---------Operator User Interface------>
                        <div class="container-fluid" style="margin-bottom:1px;"><hr class="hrColor"></div>
                        <div class="content-container">
                            <div class="row paddingm">
                                <div class="paddingm">
                                    <p class="card-subtitle float-start title general_header">OPERATOR USER INTERFACE (OUI)</p>
                                </div>
                            </div>
                            <div class="genmtop">
                                <div class="flex-container paddingm">
                                    <div class="" style="width: 97%;">
                                        <div class="container">
                                            <label class="headTitle" style="margin-left: 18px;">Downtime Threshold<span id="range" style="color:#C00000;"></span></label>
                                            <p class="paddingm" style="margin-left: 18px;"><span id="ODT" class="font_weight"></span></p>
                                        </div>
                                    </div>
                                    <div style="width: 3%;">
                                        <?php $control_oui = $this->data['access'][0]['settings_general'];
                                        if($control_oui >= 2){ ?>
                                        <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen" id="click_thresh_hold">
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="genmtop">
                                <div class="subtitlecss">
                                    <div class="flex-container paddingm">
                                        <div class="paddingm dividercss" style="width: 15%;">
                                            <p class="font alignmargin float-end p3 dm-font">Downtime Reasons</p>  
                                        </div>
                                        <div class="float-start dividercss" style="width: 85%;">
                                            <hr class="paddingm" style="width: 100%;color: #848484;">
                                        </div>
                                        <div class="paddingm dividercss " style="width: 5%;">
                                           <?php $control_dreason = $this->data['access'][0]['settings_general'];
                                           if ($control_dreason >= 2) { ?>
                                            <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" style="width:4rem;height:3rem; padding-left:1rem;" alt="" srcset="" id="add_downtime_reason">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container genmtop">
                                        <div class="row paddingm" id="DTReasonContent">
                                            <!-- Reasons -->
                                        </div>
                                </div>
                                <div class="genmtop">
                                    <div class="flex-container">
                                        <div class="paddingm dividercss" style="width: 15%;">
                                            <p class="font alignmargin p3 dm-font">Quality Reasons</p>  
                                        </div>
                                        <div class="float-start dividercss" style="width: 85%;">
                                            <hr class="paddingm" style="width: 100%;color: #848484;">
                                        </div>
                                        <div class="paddingm dividercss" style="width: 5%;">
                                            <!-- <div class="dot dot-css"><i class="fa fa-plus dot-cont fa-2x"  data-bs-toggle="modal" data-bs-target="#EditQRModal"></i></div> -->
                                            <!-- <i class="fa fa-pencil edit-pen" style="margin-left: 1rem;" data-bs-toggle="modal" data-bs-target="#EditQRModal"></i> -->
                                            <?php $control_qreason = $this->data['access'][0]['settings_general'];
                                           if ($control_qreason >= 2) { ?>
                                            <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" style="width:4rem;height:3rem; padding-left:1rem;"  alt="" srcset=""  id="add_quality_reasons">
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="container genmtop" style="margin-bottom: 20px;">
                                        <div class="row paddingm" id="QReasonContent">
                                            <!-- Quality Reasons -->
                                        </div>
                                </div>
                                <!-- strategy code  -->
                                  <div class="mb-4">
                                    <div class="genmtop">
                                        <div class="flex-container">
                                        <div class="float-start dividercss" style="width: 98%;">
                                            <hr class="paddingm" style="width: 100%;color: #848484;">
                                        </div>
                                            <div class="paddingm dividercss" style="width:2%;">
                                                <?php $control_dreason = $this->data['access'][0]['settings_general'];
                                           if ($control_dreason >= 2) { ?>
                                                <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen fa-1x " id="current_shift_click_pencil" style="margin-top: 0px;">
                                            <?php } ?>
                                            </div>
                                        </div><!-----------operator user interface ending-------->
                                        <!----current shift performance------>
                                        <div class="flex-container">
                                            <div class="paddingm dividercss" style="width:40%;">
                                                <p class="modal-title settings-machineAdd-model general_header" style="" >CURRENT SHIFT PERFORMANCE</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="genmtop" >
                                        <div class="flex-container" style="padding:0.4rem;justify-content:space-around;align-item:center;">
                                            <div class="float-start paddingm FMalign" style="width:20%;">
                                                <label class="headTitle">OEE%   Target</label>
                                                <p class="paddingm"><span class="target_val font_weight"></span></p>
                                            </div>
                                            <div class="reason-box-cf" >
                                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                                    <div class="" style="color: #00B050;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Green</p></div>
                                                    <div class="" style="color: #00B050;width:20%;">
                                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                                    </div>
                                                    <div class="" style="color:grey;width:20%;">
                                                        <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                                    </div>
                                                    <div class="" style="width:20%;">
                                                        <p style="text-align:center;justify-content:center;margin:auto;" class="green_val font_weight"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reason-box-cf" >
                                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                                    <div class="" style="color:#FFC000;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Yellow</p></div>
                                                    <div class="" style="color:#FFC000;width:20%;">
                                                        <i class="fa fa-circle" style="font-size:1.5rem;"></i>
                                                    </div>
                                                    <div class="" style="color:grey;width:20%;">
                                                    <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                                    </div>
                                                    <div class="" style="width:20%;">
                                                        <p style="text-align:center;justify-content:center;margin:auto;" class="yellow_val font_weight"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="reason-box-cf" >
                                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                                    <div class="" style="color:#D60800;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Red</p></div>
                                                    <div class="" style="color:#D60800;width:30%;">
                                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                                    </div>
                                                    <div class="" style="font-size:0.8rem;color:grey;font-weight:bold;">
                                                        <p style="text-align:center;justify-content:center;margin:auto;">any other values</p>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!----current shift performance ending------>
                     <!----work shift performance starting------>
                    <div class="card genmtop bodercss">
                        <p class="fieldTitle input-padding">WORK SHIFT MANAGEMENT</p>   
                        <div class="container genmtop" style="margin-bottom: 20px;margin-top: 20px;">
                            <div class="flex-container paddingm">
                                <div class="float-start col-lg-3">
                                    <div>
                                        <label class="headTitle">No.of Hours / shift</label>
                                        <p class="paddingm"><span id="NoOfHourShift" class="font_weight"></span></p>
                                    </div>
                                </div>
                                <div class="float-start col-lg-3">
                                    <div>
                                        <label class="headTitle">1<sup>st</sup> Shift Start Time</label>
                                        <p class="paddingm"><span id="ShiftStart" class="font_weight"></span></p>                                    
                                    </div>
                                </div>
                                <div class="float-start col-lg-5">
                                    <div>
                                        <label class="headTitle" style="line-height:45px;">Shift Timings :</label>
                                        <br>
                                    
                                        <table class="table table-bordered">
                                            <thead>    
                                                <tr class="table-secondary" >
                                                  <th>Shift Name</th>
                                                  <th>Start</th>
                                                  <th>End</th>
                                                </tr>
                                            </thead>
                                          <tbody id="shift">
                                          </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-lg-1 paddingm">
                                    <?php $control_dreason = $this->data['access'][0]['settings_general'];
                                           if ($control_dreason >= 2) { ?>
                                    <img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh float-end edit-pen"  id="click_work_shift">
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
            </div>
        </div>
    </div>
</div>

<!-----Work shift management ending-------->
<div class="modal fade" id="EditFMModal" tabindex="-1" aria-labelledby="EditFMModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="EditFMModal1" style="">FINANCIAL METRICS</h5>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EOTEEP" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label class="input-padding">Overall TEEP % Target <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="EOTEEPErr"></span>
                            </div>
                        </div>
                        <div class="box float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EOOOE" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label class="input-padding">Overall OOE % Target <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="EOOOEErr"></span>
                            </div>
                        </div>
                        <div class="box float-start col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="EOOEE" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label class="input-padding">Overall OEE % Target <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="EOOEEErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                                
                         </div>
                    </div>
                    <div class="row">
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EAvailability" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <label class="input-padding">Availability % Target <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="EAvailabilityErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3 ">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EPerformance" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <label class="input-padding">Performance % Target <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="EPerformanceErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EQuality" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <label class="input-padding">Quality % Target <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="EQualityErr"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-3">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" id="EOEE" value="" style="display: none;">
                                    <label class="input-padding">OEE % Target</label>

                                    <p class="paddingm OEECalcStyle"><span id="OEECalc">70</span>%</p>
                                    <!-- <span class="paddingm float-start validate" id="EOEEErr"></span> -->
                                </div>
                            </div>
                        </div>             
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_GFM saveBtnStyle" name="Update_GFM" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<!-- downtime threshold start -->
<div class="modal fade" id="EditDTModal" tabindex="-1" aria-labelledby="EditDTModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="EditDTModal1" style="">DOWNTIME THRESHOLD</h5>
            </div>
            <!-- <form > -->
                <div class="modal-body">
                    <div class="row">
                        <div class="box float-start col-lg-3">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" name="Update_DThreshold" id="Update_DThreshold" required="" style="padding-right:2.1rem;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label class="input-padding">Downtime Threshold <span class="paddingm validate">*</span></label>
                                <span class="unit clip">min</span>
                                <span class="paddingm float-start validate" id="Update_DThresholdErr"></span>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <button type="button" class="btn fo bn Update_DT saveBtnStyle" name="" value="Save">Save</button>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>
<!-- downtime thresh hold end -->

<!-- Add downtime reasons -->
<div class="modal fade" id="EditDRModal" tabindex="-1" aria-labelledby="EditDRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="EditDRModal1" style="">DOWNTIME REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data"  id="EditDRModalSubmit" class="addMachineForm" >
            <!-- temporary hidding for strategy -->  
            <!-- <div class="">
                    <div class="row"> 
                        <div class="col">
                            <div class="dot float-end DRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                    action="<?= base_url('Settings_controller/UploadDowntime/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>"
                    $('#form').serialize(),
                </div> -->
                <div class="modal-body DRModal" style="max-height: 400px;overflow: auto;">
                    
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="DTName" id="DTName" required="">
                                    <label class="input-padding">Reason Name <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="DTNameErr"></span>
                                    <span class="float-end charCount" id="DTNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <select class="form-select font_weight" name="DTRCategory" id="DTRCategory">
                                    <option value="select" selected="true" disabled>Select</option>
                                        <option value="Planned">Planned</option>
                                        <option value="Unplanned">Unplanned</option>
                                    </select>
                                    <label class="input-padding">Downtime Category <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="DTCategoryErr"></span>
                                </div>
                            </div>
                            <div class="row paddingm">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight paddinginright" id="DTReasonVal" name="" value="" class="DTReason" required="" autocomplete="off" onkeydown="return false" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" >
                                    <label class="input-padding">Reason Image <span class="paddingm validate">*</span></label>
                                    <input type="file" style="display: none;" class="downtime_img form-control form-control-md" id="attach_file" name="DTReasonimg" required="true" >
                                    <span class="unit"><i class="fa fa-paperclip clip DTI " style="font-size: 20px;" aria-hidden="true"></i></span>

                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="add_img_err img_validate float-start"></span> -->
                                </div>
                            </div>
                        </div>
                        </div> 
                        
                    </div>          
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn submit_downtime_reason saveBtnStyle" id="submit_downtime_reason" name="Upload_Downtime_Reason" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- downtime reasons add modal end -->

<!-- downtime reasons edit modal -->
<div class="modal fade" id="updateDRModal" tabindex="-1" aria-labelledby="updateDRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="updateDRModal1" style="">EDIT DOWNTIME REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" id="updateDRModalForm" class="addMachineForm" >
                <div class="modal-body DRModal" style="max-height: 400px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="UDTName" id="UDTName" value="" required="">
                                    <label class="input-padding">Reason Name <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="UDTNameErr"></span>
                                    <span class="float-end charCount" id="UDTNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <select class="form-select font_weight" name="UDTRCategory" id="UDTRCategory" >
                                       
                                    </select>
                                    <label class="input-padding">Downtime Category <span class="paddingm validate">*</span></label>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control UDTReason font_weight paddinginright" name="" value="" id="UDTReason" required="" autocomplete="off" onkeydown="return false" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" >
                                    <label class="input-padding">Reason Image <span class="paddingm validate">*</span></label>
                                    <input type="file" style="display: none;" id="update_attach_file" name="UDTReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip UDTI " style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="edit_img_err float-end img_validate"></span> -->
                                    <br>
                                    <a href="" id="download_link_downtime" download >
                                        <span id="img_name_for_download_downtime" style="font-size:10px;float:right;"></span><i class="fa fa-download" style="font-size:smaller;float:right;"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <input type="text" name="UDTRRecord" id="UDTRRecord" value="" style="display: none;">
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Update_Downtime_Reason saveBtnStyle" id="Update_Downtime_Reason" name="Update_Downtime_Reason" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- downtime reasons edit modal end -->

<!-- quality reasons ADD -->
<div class="modal fade" id="EditQRModal" tabindex="-1" aria-labelledby="EditQRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:100;border-bottom:0; ">
                <h5 class="modal-title general_header_model" id="EditQRModal1" style="">QUALITY REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" id="EditQRModalForm" class="addMachineForm"  >
                <!-- temporary hidding for strategy -->
            <!-- <div class="">
                    <div class="row">
                        action="<?= base_url('Settings_controller/UploadQuality/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>"
                        <div class="col">
                            <div class="dot float-end QRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-body QRModal" style="max-height: 200px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="QReasonName" id="QReasonName" required="">
                                    <label class="input-padding">Reason Name <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="QReasonNameErr"></span>
                                    <span class="float-end charCount" id="QReasonNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight paddinginright" name="" id="Qreason" value="" required="" autocomplete="off" onkeydown="return false" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" >
                                    <label class="input-padding">Reason Image <span class="paddingm validate">*</span></label>
                                    <input type="file" style="display: none;" id="attach_file_Quality" name="QReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip QRI" style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="qr_img_err float-start  img_validate"></span> -->
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn submit_quality_reason saveBtnStyle" id="submit_quality_reasons" name="" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- quality reasons add end -->

<!-- quality reasons edit modal -->
<div class="modal fade" id="updateQRModal" tabindex="-1" aria-labelledby="UpdateQRModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="UpdateQRModal1" style="">QUALITY REASONS</h5>
            </div>
            <form method="post" enctype="multipart/form-data" id="updateQRModalForm" class="addMachineForm"  >
                <!-- <div class="">
                    <div class="row">
                        <div class="col">
                            action="<?= base_url('Settings_controller/UpdateQuality/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>"
                            <div class="dot float-end QRAdd dot-css"><i class="fa fa-plus dot-cont"></i></div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-body QRModal" style="max-height: 200px;overflow: auto;">
                    <div class="">
                        <div class="row">
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight" name="UQReasonName" value id="UQReasonName" required="">
                                    <label class="input-padding">Reason Name <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="UQReasonNameErr"></span>
                                    <span class="float-end charCount" id="UQReasonNameCunt"></span>
                                </div>
                            </div>
                            <div class="box float-start col-lg-6">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control font_weight paddinginright" name="" id="UQReasonImg" value="" required="" autocomplete="off" onkeydown="return false" onchange="if(parseInt(this.value,10)<10)this.value='0'+this.value;" >
                                    <label class="input-padding">Reason Image <span class="paddingm validate">*</span></label>
                                    <input type="file" style="display: none;" id="update_file_Quality" name="UQReasonImg">
                                    <span class="unit"><i class="fa fa-paperclip clip UQRI" style="font-size: 20px;" aria-hidden="true"></i></span>
                                    <span class="grey_label float-end">(100 px x 100 px), preferably JPG, WEBP format</span>
                                    <!-- <span class="edit_qr_img img_validate float-end"></span> -->
                                    <br>
                                    <a href="" id="download_link" download>
                                        <span id="img_name_for_download" style="font-size:10px;float:right;"></span><i class="fa fa-download" style="font-size:smaller;float:right;"></i>
                                    </a>
                                </div>
                                <div>
                                    <input type="text" name="UQRRecord" id="UQRRecord" value="" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn submit_qualityup_reason saveBtnStyle" id="edit_quality_reasons" name="" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<!-- quality reasons edit modal end -->

<!-- work shift management edit modal -->
<div class="modal fade" id="EditWSM" tabindex="-1" aria-labelledby="EditWSM1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="EditWSM1" style="">WORK SHIFT MANAGEMENT</h5>
            </div>
            <!-- <form method="post" class="addMachineForm" action="" > -->
                <div class="modal-body">
                    <div class="">
                        <div style="display:flex;flex-direction:row;">
                            <div style="width:50%;">
                                <div class="box">
                                    <div class="input-box fieldStyle">
                                        <select class="form-select font_weight" onfocus='this.size=10;' onblur='this.size=1;' onchange='this.size=1; this.blur();' name="set_hour_minute" id="set_hour_minute">
                                            <option value="00:00">00:00</option>
                                            <option value="00:30">00:30</option>
                                            <option value="01:00">01:00</option>
                                            <option value="01:30">01:30</option>
                                            <option value="02:00">02:00</option>
                                            <option value="02:30">02:30</option>
                                            <option value="03:00">03:00</option>
                                            <option value="03:30">03:30</option>
                                            <option value="04:00">04:00</option>
                                            <option value="04:30">04:30</option>
                                            <option value="05:00">05:00</option>
                                            <option value="05:30">05:30</option>
                                            <option value="06:00">06:00</option>
                                            <option value="06:30">06:30</option>
                                            <option value="07:00">07:00</option>
                                            <option value="07:30">07:30</option>
                                            <option value="08:00">08:00</option>
                                            <option value="08:30">08:30</option>
                                            <option value="09:00">09:00</option>
                                            <option value="09:30">09:30</option>
                                            <option value="10:00">10:00</option>
                                            <option value="10:30">10:30</option>
                                            <option value="11:00">11:00</option>
                                            <option value="11:30">11:30</option>
                                            <option value="12:00">12:00</option>
                                            <option value="12:30">12:30</option>
                                            <option value="13:00">13:00</option>
                                            <option value="13:30">13:30</option>
                                            <option value="14:00">14:00</option>
                                            <option value="14:30">14:30</option>
                                            <option value="15:00">15:00</option>
                                            <option value="15:30">15:30</option>
                                            <option value="16:00">16:00</option>
                                            <option value="16:30">16:30</option>
                                            <option value="17:00">17:00</option>
                                            <option value="17:30">17:30</option>
                                            <option value="18:00">18:00</option>
                                            <option value="18:30">18:30</option>
                                            <option value="19:00">19:00</option>
                                            <option value="19:30">19:30</option>
                                            <option value="20:00">20:00</option>
                                            <option value="20:30">20:30</option>
                                            <option value="21:00">21:00</option>
                                            <option value="21:30">21:30</option>
                                            <option value="22:00">22:00</option>
                                            <option value="22:30">22:30</option>
                                            <option value="23:00">23:00</option>
                                            <option value="23:30">23:30</option>
                                        </select>
                                        <label class="input-padding">No.of Hours / Shift<span class="paddingm validate">*</span></label>
                                    </div>
                                </div>
                                        <!-- <input type="text" name="" onclick="open_tooltip();" class=" font_weight form_custome_design" id="set_hour_minute" required="true" style="padding-left:1rem;">
                                        <label class="custome_lable">No.of Hours / Shift<span class="paddingm validate">*</span></label>
                                        <div class="click_tooltip">
                                            <div class="" style="display:flex;padding:5px;">
                                               
                                                <div class="col_align_6">
                                                    <div class="incre_div">
                                                        <i class="fa fa-angle-up fa-2x"></i>
                                                    </div>
                                                    <div class="hour_dis">
                                                        <span class="shift_out" id="get_hour_val">00</span>
                                                    </div>
                                                    <div class="decre_div">
                                                        <i class="fa fa-angle-down fa-2x"></i>
                                                    </div>
                                                </div>
                                                
                                                <div class="col_align_6_1">
                                                    <span style="padding-bottom:4px;">:</span>
                                                </div>
                                                
                                                <div class="col_align_6_2">
                                                    <div class="incre_div">
                                                        <i class="fa fa-angle-up fa-2x"></i>
                                                    </div>
                                                    <div class="hour_dis">
                                                        <span class="shift_out" id="get_minute_val">00</span>
                                                    </div>
                                                    <div class="decre_div">
                                                        <i class="fa fa-angle-down fa-2x"></i>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                        </div>-->
                            </div> 
                            <div style="width:10%;"></div>
                            <div class="" style="width:50%;">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="time" class="form-control font_weight" id="SSTime" required="" onfocus="$('.click_tooltip').css('visibility','hidden');">
                                    <label class="input-padding">1<sup>st</sup> Shift Start Time<span class="paddingm validate">*</span></label>
                                </div>
                            </div>
                               
                            </div>
                        </div>
                    </div>            
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn updateSST saveBtnStyle" name="" value="Save">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>

<!-- work shift management end modal -->

<div class="modal fade" id="DeactiveReasonModal" tabindex="-1" aria-labelledby="DeactiveReasonModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveReasonModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this reason record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Update_RReason saveBtnStyle" name="Edit_Machine" value="Save">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveQReasonModal" tabindex="-1" aria-labelledby="DeactiveQReasonModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveQReasonModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this reason record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Update_QReason saveBtnStyle" name="" value="Save">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<!-- strategy model for current_shift_performance -->
<div class="modal fade" id="current_shit_performance" tabindex="-1" aria-labelledby="current_shit_performance" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title general_header_model" id="current_shit_performance" style="">CURRENT SHIFT PERFORMANCE</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="box " style="text-align:end;">
                                <div class="input-box fieldStyle" sytle="text-align:end;">
                                    
                                    <input type="text" class="form-control form-control-lg target_value_edit font_weight" style="font-size:0.9rem;text-align:end;padding-right:1.5rem;position:relative;" name="targetvalue" id="targetvalue" value="" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <span style="position:absolute;top:0.5rem;font-size:1rem;margin-left:-1.4rem;">%</span>
                                    <label class="input-padding">OEE% Target <span class="paddingm validate">*</span></label>
                                    <span class="add_target_data" style="color:red;font-size:0.8rem;"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 fieldStyle">
                            <div class="reason-box-cf1" >
                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem; height:3rem;">
                                    <div class="" style="color:#00B050;font-weight:600;font-size:0.9rem;"><p style="margin:auto;margin-left:10px;">Green</p></div>
                                    <div class="" style="color:#00B050;width:20%;">
                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                    </div>
                                    <div class="" style="color:grey;width:20%;">
                                       <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                    </div>
                                    <div class="" style="width:25%;">
                                        <input type="text" class="form-control form-control-md green_value_edit font_weight" value="" name="green" id="green" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="" style="width:9%;font-weight:bolder;">
                                            <span>%</span>
                                    </div>
                                </div>
                            </div>
                            <span class="add_green_data" style="color:red;font-size:0.8rem;"></span>
                        </div>
                        <div class="col-lg-4 fieldStyle">
                            <div class="reason-box-cf1" >
                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center; height:3rem;">
                                    <div class="" style="color:#ffc000;font-weight:600;font-size:0.9rem;"><p style="margin:auto;margin-left:10px;">Yellow</p></div>
                                    <div class="" style="color:#ffc000;width:15%;">
                                        <i class="fa fa-circle " style="font-size:1.5rem;"></i>
                                    </div>
                                    <div class="" style="color:grey;width:20%;">
                                    <img src="<?php echo base_url('assets/img/greater.png'); ?>" class=" " style="font-weight: 550;width:1.3rem;height:1.3rem;"></i>
                                    </div>
                                    <div class="" style="width:25%;">
                                        <!-- <p style="text-align:center;justify-content:center;margin:auto;">85%</p> -->
                                        <input type="text" class="form-control form-control-md yellow_value_edit font_weight" id="yellow" name="yellow" value="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    </div>
                                    <div class="" style="width:9%;font-weight:bolder;">
                                            <span>%</span>
                                    </div>
                                </div>
                            </div>
                            <span class="add_yellow_data" style="color:red;font-size:0.8rem;"></span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="reason-box-cf1" >
                                <div class="flex-container" style="justify-content:space-evenly;text-align:center;align-items:center;padding:0rem;height:3rem;">
                                    <div class="" style="color:#d60800;font-weight:600;font-size:0.9rem;"><p style="margin:auto;">Red</p></div>
                                    <div class="" style="color:#d60800;width:20%;">
                                        <i class="fa fa-circle" style="font-size:1.5rem;"></i>
                                    </div>
                                   
                                    <div class="" style="color:grey;font-size:0.8rem; width:50%;">
                                        <p style="text-align:center;justify-content:center;margin:auto;font-weight:bold;">any other values</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn btn_current_shift saveBtnStyle" name="" id="btn_current_shift" value="Save">Save</a>
                <a class="btn fo bn cancel_modal cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
            </div>
        </div>
    </div>
</div>
<!-- current_shift_performance end -->


<!-- preloader -->
<!-- preloader -->
<div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
      </div>
</div>
<!-- preloader end -->



<!-----add of operator user interface script function-----> 
<script src="<?php echo base_url(); ?>/assets/js/Settings_Goals_Others_Validation.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript">

// date time picker for hour and minutes only
// $(function () {
// $('#cusotme_date_picker').datetimepicker({
//     format: 'HH:mm',
//     stepping: 30
//     // stepMinute: 0
// });
// });

    var shift_management_data = new Array();
    // Work Shift Management Model Show ..........
    $(document).on('click','#click_work_shift',function(event){
        event.preventDefault();
        $('#set_hour_minute').empty();
        var elements = $();
        var i=0;
        var elements=$();
        while(i<=23){
            elements = elements.add('<option value="'+("0" + i).slice(-2)+":00"+'">'+("0" + i).slice(-2)+":00"+'</option>');
            elements = elements.add('<option value="'+("0" + i).slice(-2)+":30"+'">'+("0" + i).slice(-2)+":30"+'</option>');
            i++;
        }
        $('#set_hour_minute').append(elements);

        $('#set_hour_minute').val(shift_management_data[0]);
        $('#SSTime').val(shift_management_data[1]);
        
        if(shift_management_data.length > 0){
            var split_data = shift_management_data[0].split(":");
            $('#get_hour_val').html(split_data[0]);
            $('#get_minute_val').html(split_data[1]);
        }else{
            $('#get_hour_val').html("");
            $('#get_minute_val').html("");
        }
        $('.click_tooltip').css("visibility","hidden");
        $('#EditWSM').modal('show');
    });

function set_hour_shift(shift_hour,start_time){
    shift_management_data.push(shift_hour,start_time);
}

// Financial metrics Model Show .............
$(document).on('click','#show_edit_financial_metrics',function(){

    $('#EOTEEP').empty();
    $('#EOOOE').empty();
    $('#EOOEE').empty();
    $('#EAvailability').empty();
    $('#EPerformance').empty();
    $('#EQuality').empty();
    $('#EOEE').empty();
    // Reset Value ..........
    $('#EOTEEP').val(success);
    $('#EOOOE').val(success);
    $('#EOOEE').val(success);
    $('#EPerformance').val(success);
    $('#EQuality').val(success);
    $('#EAvailability').val(success);
    $('#EOEE').val(success);

    $.ajax({
        url: "<?php echo base_url('Settings_controller/getGoalsFinancialData'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        success:function(res){
            $('#EOTEEP').val(res[0].overall_teep);
            $('#EOOOE').val(res[0].overall_ooe);
            $('#EOOEE').val(res[0].overall_oee);
            $('#EPerformance').val(res[0].performance);
            $('#EQuality').val(res[0].quality);
            $('#EAvailability').val(res[0].availability);
            $('#EOEE').val(res[0].oee_target);
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
    var financial_data = "financial_metrics";
    error_show_remove(financial_data)
    $('#EditFMModal').modal('show');
});

// Add Downtime Reason Model Show .............
$(document).on('click','#add_downtime_reason',function(event){
    event.preventDefault();
    $('#DTNameCunt').html('0 / ' + text_max1);
    $('#DTName').val(success);
    $('#DTRCategory').val('select');
    $('#DTReasonVal').val(success);
    // $('.add_img_err').html(success);
    $("#DTNameErr").html(success);
    $("#DTCategoryErr").html(success);
    $(".submit_downtime_reason").removeAttr("disabled");
    $('#EditDRModal').modal('show');
});

// Add Quality Reason Model Show ............
$(document).on('click','#add_quality_reasons',function(event){
    event.preventDefault();
    $('#QReasonNameCunt').html('0 / ' + text_max);
    $('#QReasonName').val(success);
    $('#Qreason').val(success);
    $("#QReasonNameErr").html(success);
    // $('.qr_img_err').html(success);
    $(".submit_quality_reason").removeAttr("disabled");
    $('#EditQRModal').modal('show');
});

// Retrive Downtime Threshold Model show ...........
$(document).on('click','#click_thresh_hold',function(){
    $('#Update_DThreshold').empty();
    $('#Update_DThreshold').val(success);
    $.ajax({
        url: "<?php echo base_url('Settings_controller/getDowntimeTData'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        success:function(res){
            if (res.length >0) {
                $('#Update_DThreshold').val(res[0].downtime_threshold);
            }
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
    var thresh_hold_data = "downtime_thresh_hold";
    error_show_remove(thresh_hold_data);
    $('#EditDTModal').modal('show');
});

// Edit Current shift Performance ...................
$(document).on('click','#current_shift_click_pencil',function(){
    // edit time remove cache
    $('.target_value_edit').val(success);
    $('.yellow_value_edit').val(success);
    $('.green_value_edit').val(success);
    $.ajax({
       url : "<?php echo base_url('Settings_controller/current_shift_retrive') ?>",
       method:'post',
       dataType:'json',
       cache: false,
       // data:{work:work},
       success:function(res){
            if (res.length > 0) {
                var green_val = res[0].green;
                var yellow_val = res[0].yellow;
                var oee_val = res[0].oee ;
                $('.target_value_edit').val(oee_val);
                $('.yellow_value_edit').val(yellow_val);
                $('.green_value_edit').val(green_val);
            }
            var current_shift_performance_data = "current_shift_performance";
            error_show_remove(current_shift_performance_data);
            $('#current_shit_performance').modal('show');

       },
       error:function(err){
        // alert('something went wrong, try again !!');
       }
   });
});  

// Add Downtime-Reason ..................
$('#submit_downtime_reason').on('click',function(event){
    event.preventDefault();
    var sname = $('#DTName').val();
    var category = $('#DTRCategory').val();
    var formData = new FormData();
    formData.append('reason_name', sname);
    formData.append('reason_category',category);
    $("#overlay").fadeIn(300);    
    var a = DTName();
    var b = DTCategoryErrFun();
    //var c = downtime_img_fun();
    if (a !="" || b!="" ) {
        $("#DTNameErr").html(a);
        $("#DTCategoryErr").html(b);
        $("#overlay").fadeOut(300);    
       // $('.add_img_err').html(c);

    }
    else{
        sname = sname.trim();
        category = category.trim();

        sname = sname.toLowerCase();
        category = category.toLowerCase();

        sname = sname.replaceAll(' ', '');
        category = category.replaceAll(' ', '');
        if (category == "unplanned" && sname == "machineoff") {
            $("#DTNameErr").html("*Machine OFF reason not allowed in Unplanned category");
        }
        else{
            if (document.getElementById("attach_file").files[0]) {
                formData.append('file', document.getElementById("attach_file").files[0]);
                // formData.append("file_check","true");
                $.ajax({
                    url : "<?php echo base_url('Settings_controller/add_downtime_reasons') ?>",
                    method: "POST",
                    data: formData,  
                    contentType: false,  
                    cache: false,  
                    processData:false,
                    success:function(data){
                        // alert(data);
                        if (data == true) {
                            // close the modal 
                            $('#attach_file').val('');
                            $('#EditDRModal').modal('hide');
                             // retrive all downtime reasons data
                            get_downtime_data();
                            $("#overlay").fadeOut(300);    
                        }
                    },
                    error:function(er){
                        // alert("Something went wrong");
                        $("#overlay").fadeOut(300);    
                    }
                });   
            }else{
                //alert("image not found");
                //formData.append('file_check',"false");
                $.ajax({
                    url : "<?php echo base_url('Settings_controller/add_downtime_reason_noimg') ?>",
                    method: "POST",
                    data: formData,  
                    contentType: false,  
                    cache: false,  
                    processData:false,
                    success:function(data){
                        // alert(data);
                        if (data == true) {
                            // close the modal 
                            $('#EditDRModal').modal('hide');
                             // retrive all downtime reasons data
                            get_downtime_data();
                            $("#overlay").fadeOut(300);    
                        }
                    },
                    error:function(er){
                        // alert("Something went wrong");
                        $("#overlay").fadeOut(300);    
                    }
                });   
            } 
        }   
    }
});

// Update Downtime Reason Model .............
$('#Update_Downtime_Reason').on('click',function(event){
    event.preventDefault();

    var sname = $('#UDTName').val();
    var category = $('#UDTRCategory').val();
    var record_no = $('#Update_Downtime_Reason').attr('record_no');
    var img_name = $('#Update_Downtime_Reason').attr('image_name');
    img_name = img_name.trim();
    var file_data = document.getElementById("update_attach_file").files[0];
    var formData = new FormData();
    
    formData.append('edit_reason_name', sname);
    formData.append('edit_reason_category',category);
    formData.append('edit_record_no',record_no);
    formData.append('edit_file', file_data);
    $("#overlay").fadeIn(300);    

    var a = UDTName();
    $.ajax({
        url : "<?php echo base_url('Settings_controller/edit_downtime_reasons') ?>",
        method: "POST",
        //data: {sname:sname},
        data: formData,  
        contentType: false,  
        cache: false,  
        processData:false,
        success:function(data){
            if (data == true) {
                // close the modal 
                $('#updateDRModal').modal('hide');
                 // retrive all downtime reasons data
                get_downtime_data();
                $("#overlay").fadeOut(300);    
            }
        },
        error:function(er){
            $("#overlay").fadeOut(300);    
        }
    }); 
});

// Add Quality Reason Model .............
$(document).on('click','#submit_quality_reasons',function(event){
    event.preventDefault();
    $("#EditQRModalForm").submit(false);
    var a = QReasonName();
    // var b = Qimg_func();
    if (a != "" ){
        $("#QReasonNameErr").html(a);
        // $('.qr_img_err').html(b);
    }
    else{
        $("#overlay").fadeIn(300);    
        event.preventDefault();
        var sname = $('#QReasonName').val();
        var formData = new FormData();
        formData.append('reason_name', sname);

        if (document.getElementById("attach_file_Quality").files[0]) {
            formData.append('quality_file', document.getElementById("attach_file_Quality").files[0]);
            $.ajax({
                url : "<?php echo base_url('Settings_controller/add_quality_reasons') ?>",
                method: "POST",
                //data: {sname:sname},
                data: formData,  
                contentType: false,  
                cache: false,  
                processData:false,
                success:function(data){
                    if (data == true) {
                        // close the modal 
                        $('#attach_file_Quality').val('');
                        $('#EditQRModal').modal('hide');
                        // Retrive all quality reasons data
                        get_quality_reasons();
                        $("#overlay").fadeOut(300);    
                    }
                },
                error:function(er){
                    // alert("Something went wrong!");
                    $("#overlay").fadeOut(300);    
                }
            });
        }else{
            // alert("image not found");
            $.ajax({
                url : "<?php echo base_url('Settings_controller/add_quality_reasons_noimg') ?>",
                method: "POST",
                //data: {sname:sname},
                data: formData,  
                contentType: false,  
                cache: false,  
                processData:false,
                success:function(data){
                    if (data == true) {
                        // close the modal 
                        $('#attach_file_Quality').val('');
                        $('#EditQRModal').modal('hide');
                        // Retrive all quality reasons data
                        get_quality_reasons();
                        $("#overlay").fadeOut(300);    
                    }
                },
                error:function(er){
                    // alert("Something went wrong!");
                    $("#overlay").fadeOut(300);    
                }
            });
        }
    }
});

// Edit Quality Reason Model .............
$(document).on('click','#edit_quality_reasons',function(event){
    event.preventDefault();
    $("#updateQRModalForm").submit(false);
    var a = UQReasonName();
    if (a != ""){
        $("#UQReasonNameErr").html(a);
    }
    else{
        $("#overlay").fadeIn(300);    
        var sname = $('#UQReasonName').val();
        var record_no = $('#edit_quality_reasons').attr('record_id');
        var img_name = $('#edit_quality_reasons').attr('image_name');
        var file_data = document.getElementById("update_file_Quality").files[0];
        var formData = new FormData();
        formData.append('edit_quality_reason', sname);
        formData.append('edit_file_quality', file_data);
        formData.append('edit_quality_img_id', record_no);

        $.ajax({
            url : "<?php echo base_url('Settings_controller/edit_quality_reasons_fun') ?>",
            method: "POST",
            data: formData,  
            contentType: false,  
            cache: false,  
            processData:false,
            success:function(data){
                if (data == true) {
                    // Close the modal 
                    $('#updateQRModal').modal('hide');
                    // Retrive all quality reasons data
                    get_quality_reasons();
                    $("#overlay").fadeOut(300);    
                }
            },
            error:function(er){
                // alert("Sorry Try again!");
                $("#overlay").fadeOut(300);    
            }
        }); 
    }
});

function calcoee(){
    var p = $('#EPerformance').val();
    var q = $('#EQuality').val();
    var a = $('#EAvailability').val();
    var oee = ((parseFloat(p)/100)*(parseFloat(q)/100)*(parseFloat(a)/100))*100;
    $('#OEECalc').html(parseFloat(oee).toFixed(1));
    $('#EOEE').val(parseFloat(oee).toFixed(1));
}
    
// Financial Metrics Data Retrive ..............
function get_financial_metrics(){
    $.ajax({
        url: "<?php echo base_url('Settings_controller/getGoalsFinancialData'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            $('#OTEEP').html(res[0].overall_teep);
            $('#OOOE').html(res[0].overall_ooe);
            $('#OOEE').html(res[0].overall_oee);
            $('#Availability').html(res[0].availability);
            $('#Performance').html(res[0].performance);
            $('#Quality').html(res[0].quality );
            $('#OEE').html( res[0].oee_target);

            $('#EOTEEP').val(res[0].overall_teep);
            $('#EOOOE').val(res[0].overall_ooe);
            $('#EOOEE').val(res[0].overall_oee);
            $('#EPerformance').val(res[0].performance);
            $('#EQuality').val(res[0].quality);
            $('#EAvailability').val(res[0].availability);
            $('#EOEE').val(res[0].oee_target);
            $('#OEECalc').html(res[0].oee_target);
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}
    
// Downtime Reason Image Validations .............
$(document).on("click", ".DTI", function(event){
    event.preventDefault();
    $("#attach_file").click();
    $('#attach_file').on('change', function(event) {
        event.preventDefault();
        var file_input = document.getElementById('attach_file').value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
        if (!allowedExtensions.exec(file_input)) {
            alert('Invalid File Extension....');
            $('#attach_file').val(null);
            // $('.add_img_err').html('Valid formats are jpg , jpeg , png , gif ,tif  ,webp.');
        }
        else
        {
            // $('.add_img_err').html(success);
            $('#DTReasonVal').val(this.files[0].name);
        }
    });
}); 

// Quality Reason Image Validation ..............
$(document).on("click", ".QRI", function(event){
    event.preventDefault();
    $("#attach_file_Quality").click();
    $('#attach_file_Quality').on('change', function(event) {
        event.preventDefault();
        var input_file = document.getElementById('attach_file_Quality').value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
        if (!allowedExtensions.exec(input_file)) {
            alert('Invalid File Extension....');
            $('#attach_file_Quality').val(null);
            // $('.qr_img_err').html('Valid formats are jpg , jpeg , png , gif ,tif  ,webp.');
        }
        else
        {
            // $('.qr_img_err').html(success);
            $('#Qreason').val(this.files[0].name);
        }
    });
});

// Update Downtime Reason Image Validation ......................
$(document).on("click", ".UDTI", function(event){
    event.preventDefault();
    $("#update_attach_file").click();
    $('#update_attach_file').on('change', function(event) {
        event.preventDefault();
        var file_input = document.getElementById('update_attach_file').value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
        if (!allowedExtensions.exec(file_input)) {
            alert('Invalid File Extension.....');
            $('#update_attach_file').val(null);
            // $('.edit_img_err').html('Valid formats are  jpg , jpeg , png , gif ,tif  ,webp.');
        }else{
            // $('.edit_img_err').html(success);
            $('.UDTReason').val(this.files[0].name);
        }
    });
});

// Quality Reason Update Image Validations .................
$(document).on("click", ".UQRI", function(event){
    event.preventDefault();
    $("#update_file_Quality").click();
    $('#update_file_Quality').on('change', function(event) {
        event.preventDefault();
        var file_input = document.getElementById('update_file_Quality').value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.tif|\.webp)$/i;
        if (!allowedExtensions.exec(file_input)) {
            alert('Invalid File Extension.....');
            $('#update_file_Quality').val(null);
            // $('.edit_qr_img').html('Valid Image jpg , jpeg , png , gif ,tif  ,webp.'); 
        }else{
            // $('.edit_qr_img').html(success); 
            $('#UQReasonImg').val(this.files[0].name);
        }
      
    });

});

// Update Shift Management ..........
$(document).on("click", ".updateSST", function(event){
    event.preventDefault();
    var hours = $('#set_hour_minute').val();
    var staringTime = $('#SSTime').val();
    $("#overlay").fadeIn(300);    
    $.ajax({    
        url: "<?php echo base_url('Settings_controller/updateShift'); ?>",
        method: "POST",
        cache: false,
        data: {
            hours : hours,
            startingTime: staringTime,
        },
        dataType: "json",
        success:function(res){
            // Display updation shift data
            $('#shift').empty();
            shift_management_data = [];
            get_shift_data();
            $('#EditWSM').modal('hide');    
            $("#overlay").fadeOut(300);    
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
            $("#overlay").fadeOut(300);    
        }
    });
});

// Retrive Shift Management Records ..................
function get_shift_data(){
    $.ajax({
        url: "<?php echo base_url('Settings_controller/getShiftData'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        success:function(res){
            res['shift'].forEach(function(item){
                var elements = $();
                var temp = item.shifts.split("");
                elements = elements.add('<tr>'
                    +'<td>'+'Shift '+temp[0]+'</td>'
                    +'<td>'+item.start_time+'</td>'
                    +'<td>'+item.end_time+'</td>'
                    +'</tr>');
                $('#shift').append(elements);
            });
            const split_hour_shift = res['duration'][0]['duration'].split(':');
            var tmp = res['shift'][0]['start_time'].split(":");   
            var x = tmp[0]+":"+tmp[1];     
            $('#SSTime').val(x);                  
            $('#NoOfHourShift').html(
                res['duration'][0]['duration']
            );
            $('#ShiftStart').html(
                res['shift'][0]['start_time']
            );
            set_hour_shift(res['duration'][0]['duration'],x);
            // customize input for no of shift hour
            $('#set_hour_minute').val( res['duration'][0]['duration']);

            $('#get_minute_val').html(split_hour_shift[1]);
            $('#get_hour_val').html(split_hour_shift[0]);
        },
        error:function(res){
            // alert("No current shift data*!!");
        }
    }); 
} 
    
    // Update Financial Metrics Records ..............
    $('.Update_GFM').on('click',function(){
        var a = EOTEEP();
        var b = EOOOE();
        var c = EOOEE();
        var d = EAvailability();
        var e = EPerformance();
        var f = EQuality();
        // var g = EOEE();
        if (a != "" || b!="" || c!="" || d!="" || e!="" || f!=""){
            $("#EOTEEPErr").html(a);
            $("#EOOOEErr").html(b);            
            $("#EOOEEErr").html(c);
            $("#EAvailabilityErr").html(d);        
            $("#EPerformanceErr").html(e);            
            $("#EQualityErr").html(f);
            // $("#EOEEErr").html(g);
        }
        else{
            calcoee();
            $("#overlay").fadeIn(300);    
            var  VEOTEEP = $('#EOTEEP').val();
            var  VEOOOE = $('#EOOOE').val();
            var  VEOOEE = $('#EOOEE').val();
            var  VEPerformance = $('#EPerformance').val();
            var  VEQuality = $('#EQuality').val();
            var  VEAvailability = $('#EAvailability').val();
            var  VEOEE = $('#EOEE').val();
            $.ajax({
                url: "<?php echo base_url('Settings_controller/editGFMData'); ?>",
                type: "POST",
                cache: false,
                data: {
                    EOTEEP : VEOTEEP,
                    EOOOE: VEOOOE,
                    EOOEE : VEOOEE,
                    EPerformance: VEPerformance,
                    EQuality : VEQuality,
                    EAvailability: VEAvailability,
                    EOEE : VEOEE,
                },
                dataType: "json",
                success:function(res){
                    // Retrive Financial Metrics Records ..............
                    get_financial_metrics();
                    $('#EditFMModal').modal('hide');
                    $("#overlay").fadeOut(300);    
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                    $("#overlay").fadeOut(300);    
                }
            });
        }
    });

    // Update Downtime Threshold function 
    $(document).on("click", ".Update_DT", function(){
        var a = Update_DThreshold();
        if (a != ""){
            $("#Update_DThresholdErr").html(a);
        }
        else{
            var  DT = $('#Update_DThreshold').val();
            $("#overlay").fadeIn(300);    
            $.ajax({
                url: "<?php echo base_url('Settings_controller/editDTData'); ?>",
                type: "POST",
                cache: false,
                data: {
                    DT : DT
                },
                dataType: "json",
                success:function(res){
                    if (res == true) {
                        get_downtime_thres_hold();
                        $('#EditDTModal').modal('hide'); 
                        $("#overlay").fadeOut(300);    
                    }
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                    $("#overlay").fadeOut(300);    
                }
            });
        }
    });
    // Retrive Downtime Threshold Data .............
    function get_downtime_thres_hold(){
        $.ajax({
            url: "<?php echo base_url('Settings_controller/getDowntimeTData'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            success:function(res){
                if(res.length>0){
                    $('#ODT').html(res[0].downtime_threshold+" "+"min");
                    $('#range').html('-RED');
                    $("#range").css("color","#C00000");
                    $("#range").css("font-weight","1000");
                }
            },
            error:function(res){
                //alert("Sorry!Try Agian!!");
            }
        });
    }
    // Access Control ...............
    var control_edit_display = <?php echo($this->data['access'][0]['settings_general']); ?>;
    var control_edit_display_dreason = " ";
    var control_edit_display_qreason = " ";
    if (control_edit_display < 2) {
        control_edit_display_dreason = "none";
        control_edit_display_qreason = "none";
    }else{
        control_edit_display_dreason = "inline";
        control_edit_display_qreason = "inline";
    }

    // Retrive Downtime Reason Records................
    function get_downtime_data(){
        $.ajax({
            url: "<?php echo base_url('Settings_controller/getDowntimeRData'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            success:function(res){
                $('#DTReasonContent').empty();
                var elements = $();
                res.forEach(function(item){
                    var file_name = item.uploaded_file_location+item.uploaded_file_name+'.'+item.original_file_extension;
                    if (imgError(file_name) == true) {
                        // if image is found in the location execute the block
                        if (item.downtime_category == "Planned") {
                            elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                            +'<div class="dot col float-start" style="overflow:hidden"><img src="'+item.uploaded_file_location+item.uploaded_file_name+'.'+item.original_file_extension+'" alt="" width="100%" height="100%"></div>'
                            +'<div class="col.float-start down d-flex fontheight fontbox"><p  title="'+item.downtime_reason+'" class="three_dots_css font_weight " >'+item.downtime_reason+'</p></div>'
                            +'<div class="dotHover dclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh  reason-pen" style="color:grey; "></i></div>'
                            +'<div class="dotHover1 drclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh reason-pen" ></i></div>'
                            +'</div>');
                        } 
                        else{
                            elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                            +'<div class="dot col float-start" style="overflow:hidden"><img src="'+item.uploaded_file_location+item.uploaded_file_name+'.'+item.original_file_extension+'" alt="" width="100%" height="100%"></div>'
                            +'<div class="col.float-start down d-flex fontheight fontbox"><p class="three_dots_css font_weight " title="'+item.downtime_reason+'">'+item.downtime_reason+'</p></div>'
                            +'<div class="dotHover dclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh reason-pen" style="color:grey;"></div>'
                            +'<div class="dotHover1 drclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh reason-pen"></i></div>'
                            +'</div>');
                        }    
                    }else{
                        // if image not found the location execute the block
                        if (item.downtime_category == "Planned") {
                            elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                            +'<div class="dot col float-start" style="overflow:hidden"><div class="no_img_circle" width="100%" height="100%"></div></div>'
                            +'<div class="col.float-start down d-flex fontheight fontbox"><p class="three_dots_css font_weight" title="'+item.downtime_reason+'">'+item.downtime_reason+'</p></div>'
                            +'<div class="dotHover dclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh  reason-pen" style="color:grey; "></i></div>'
                            +'<div class="dotHover1 drclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh reason-pen" ></i></div>'
                            +'</div>');
                        } 
                        else{
                            elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                            +'<div class="dot col float-start" style="overflow:hidden"><div class="no_img_circle" width="100%" height="100%"></div></div>'
                            +'<div class="col.float-start down d-flex fontheight fontbox"><p class=" font_weight three_dots_css" title="'+item.downtime_reason+'">'+item.downtime_reason+'</p></div>'
                            +'<div class="dotHover dclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh reason-pen" style="color:grey;"></div>'
                            +'<div class="dotHover1 drclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_dreason+'"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh reason-pen"></i></div>'
                            +'</div>');
                        }   
                    }
                        $('#DTReasonContent').append(elements);
                });
            },
            statusCode: {
               
               500: function(){
                // console.log("Record Issue 500 in based on images");
               },
               404:function(){
                
                 // console.log("Data Passing Issue 404  image found the particular location ");
               }
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    }
    

    // Retrive Quality Reason Records ..................
    function get_quality_reasons(){
        $.ajax({
            url: "<?php echo base_url('Settings_controller/getQualityData'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            success:function(res){
                $('#QReasonContent').empty();
                var elements = $();
                res.forEach(function(item){  
                    var file_name = item.uploaded_file_location+item.uploaded_file_name+'.'+item.uploaded_file_extension;
                    if (quality_imgError(file_name) == true) {
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><img src="'+item.uploaded_file_location+item.uploaded_file_name+'.'+item.uploaded_file_extension+'" alt="" width="100%" height="100%"></div>'
                        +'<div class="col.float-start down d-flex fontheight fontbox" style="padding:unset;"><p class="font_weight three_dots_css" title="'+item.quality_reason_name+'">'+item.quality_reason_name+'</p></div>'
                        +'<div class="dotHover qclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_qreason+'"><img src="<?php echo base_url('assets/img/pencil.png') ?>" class="reason-pen img_font_wh"></i></div>'
                        +'<div class="dotHover1 qrclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_qreason+'"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh reason-pen"></i></div>'
                        +'</div>');   
                    }else{
                        elements = elements.add('<div class="col-lg-3 reason-box" style="position:relative;">'
                        +'<div class="dot col float-start" style="overflow:hidden"><div class="no_img_circle" width="100%" height="100%"></div></div>'
                        +'<div class="col.float-start down d-flex fontheight fontbox"><p class=" font_weight three_dots_css" title="'+item.quality_reason_name+'">'+item.quality_reason_name+'</p></div>'
                        +'<div class="dotHover qclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_qreason+'"><img src="<?php echo base_url('assets/img/pencil.png') ?>" class="reason-pen img_font_wh"></i></div>'
                        +'<div class="dotHover1 qrclick" rvalue="'+item.image_id+'" style="display:'+control_edit_display_qreason+'"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh reason-pen"></i></div>'
                        +'</div>');  
                    }
                    $('#QReasonContent').append(elements);
                });
            },
            statusCode: {
               
               500: function(){
                // console.log("Record Issue 500 in based on images");
               },
               404:function(){
                
                 // console.log("Data Passing Issue 404  image found the particular location ");
               }
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    }
    
    // Downtime Reason Delete .............
    $(document).on("click", ".drclick", function(){
        $('#DeactiveReasonModal').modal('show');
        var rvalue = $(this).attr("rvalue");
        $('.Update_RReason').attr('rvalue',rvalue); 
    });

    // Update Downtime Reason .............
    $(document).on("click", ".Update_RReason", function(){
        var rvalue = $(this).attr('rvalue');
        $("#overlay").fadeIn(300);    
        $.ajax({
            url: "<?php echo base_url('Settings_controller/deleteDownReason'); ?>",
            type: "POST",
            data: {
                Record_No : rvalue,
            },
            dataType: "json",
            cache: false,
            success:function(res){
                if (res == true) {
                    get_downtime_data();
                    $('#DeactiveReasonModal').modal('hide');
                    $("#overlay").fadeOut(300);    
                }
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
                $("#overlay").fadeOut(300);    
            }
        });
    });
    // Retrive Downtime Reasons ...................
    $(document).on("click", ".dclick", function(){
        // $("#overlay").fadeIn(300);    
        $('#UDTName').val(success);
        $('#UDTReason').val(success);
        $('#UDTNameErr').html(success);
        $('#Update_Downtime_Reason').removeAttr("disabled");
        var id = $(this).attr("rvalue");
        $.ajax({
            url: "<?php echo base_url('Settings_controller/getDownReason'); ?>",
            type: "POST",
            data: {
                Record_No :id ,
            },
            cache: false,
            dataType: "json",
            success:function(res){
                var download_file = res[0].uploaded_file_location+''+res[0].uploaded_file_name+'.'+res[0].uploaded_file_extension;

                $('#UDTName').val(res[0].downtime_reason);
                $('#UDTRCategory').empty();
                var elements = $();
                if (res[0].downtime_category == "Planned") {
                    elements = elements.add('<option value="'+res[0].downtime_category+'" selected>'+res[0].downtime_category+'</option>'
                        +'<option value="Unplanned">Unplanned</option>');         
                }
                else{
                    elements = elements.add('<option value="'+res[0].downtime_category+'" selected>'+res[0].downtime_category+'</option>'
                    +'<option value="Planned">Planned</option>');
                }            
                $('#UDTRCategory').append(elements);
                $('#UDTReason').val(res[0].original_file_name);  
                $('#UDTRRecord').val(res[0].image_id); 
                $('#Update_Downtime_Reason').attr('image_name',res[0].original_file_name);
                $('#Update_Downtime_Reason').attr('record_no',res[0].image_id); 
                $('#download_link_downtime').attr("href",download_file);
                if (res[0].original_file_name==="no_image") {
                    $('#download_link_downtime').attr("disabled",true);
                    $('#download_link_downtime').css("pointer-events","none");
                    // $('#download_link_downtime').css("display","inline-block");
                }else{
                    $('#download_link_downtime').css("pointer-events","auto");
                    $('#download_link_downtime').removeAttr("disabled");
                }
                $('#img_name_for_download_downtime').html(res[0].original_file_name);

                $('#UDTNameCunt').html(res[0].downtime_reason.length + ' / ' + text_max);

                $('#updateDRModal').modal('show');
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    });
    // Retrive Quality Reason Data for Particular Record ...............
    $(document).on("click", ".qclick", function(){
        var id = $(this).attr("rvalue");
        $('#UQReasonName').val(success);
        $('#UQReasonImg').val(success);
        $.ajax({
            url: "<?php echo base_url('Settings_controller/getQualiyReason'); ?>",
            type: "POST",
            data: {
                Record_No : id,
            },
            dataType: "json",
            cache: false,
            success:function(res){
                var download_file = res[0].uploaded_file_location+''+res[0].uploaded_file_name+'.'+res[0].uploaded_file_extension;
                $('#UQReasonName').val(res[0].quality_reason_name);
                $('#UQReasonImg').val(res[0].original_file_name);  
                $('#UQRRecord').val(res[0].image_id); 
                $('#edit_quality_reasons').attr('record_id',res[0].image_id);   

                $('#edit_quality_reasons').attr('image_name',res[0].original_file_name);  
                $("#UQReasonNameErr").html(success);
                $(".submit_qualityup_reason").removeAttr("disabled");
                $('#UQReasonNameCunt').html($('#UQReasonName').val().length + ' / ' + text_max);

                $('#edit_quality_reasons').attr('image_name',res[0].original_file_name); 
                if (res[0].original_file_name === "no_img") {
                    $('#download_link').attr("disabled",true);
                    $('#download_link').css("pointer-events","none");
                }else{
                    $('#download_link').css("pointer-events","auto");
                    $('#download_link').removeAttr("disabled");
                }
                $('#download_link').attr("href",download_file);
                $('#img_name_for_download').html(res[0].original_file_name);       
                $('#updateQRModal').modal('show');
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    });

    // Delete Quality Reason ..................
    $(document).on("click", ".qrclick", function(){
        var id = $(this).attr("rvalue");
        $('.Update_QReason').attr('rvalue',id);
        $('#DeactiveQReasonModal').modal('show');
    });
    $(document).on("click", ".Update_QReason", function(){
        var id = $(this).attr('rvalue');
        $("#overlay").fadeIn(300);    
        $.ajax({
            url: "<?php echo base_url('Settings_controller/deleteQualityReason'); ?>",
            type: "POST",
            data: {
                Record_No : id,
            },
            cache: false,
            dataType: "json",
            success:function(res){
                if (res == true) {
                    // get quality reasons
                    get_quality_reasons();                    
                    // after updation close the modal
                    $('#DeactiveQReasonModal').modal('hide');
                    $("#overlay").fadeOut(300);    
                }
                
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
                $("#overlay").fadeOut(300);    
            }
        });
    });

// Current Shift Performance ................   
$(document).on('click','#btn_current_shift',function(){
    var condition = $('#btn_current_shift').attr("disabled");
    if (condition == "disabled") {
        $('#btn_current_shift').css("border","none");
    }else{
        $("#overlay").fadeIn(300);    
        var green = document.getElementById("green").value;
        var yellow = document.getElementById("yellow").value;
        var target = document.getElementById("targetvalue").value;
        if (parseInt(target) < 100) {
            if (parseInt(green) > parseInt(yellow)) {
                if (parseInt(yellow) < parseInt(green)) {
                    $.ajax({
                        url: '<?php echo base_url('Settings_controller/current_shift_performance'); ?>',
                        method:'post',
                        data:{green:green,yellow:yellow,target:target},
                        dataType: 'json',
                        cache: false,
                        success:function(data){
                            if(data == true){
                                get_current_shift_data();
                                $('#current_shit_performance').modal('hide');
                                $("#overlay").fadeOut(300);    
                            }
                        },
                        error:function(err){
                            // alert("something went wrong");
                            $("#overlay").fadeOut(300);    
                        }
                    });
                }else{
                    $('.add_yellow_data').html('yellow should be lesser than green');
                    $('.btn_current_shift').attr("disabled",true);
                }
            }else{
                    $('.add_green_data').html('yellow should be lesser than green');
                    $('.btn_current_shift').attr("disabled",true);
            }   
        }else{
            $('.add_target_data').html(' Valid Number');
            $('.btn_current_shift').attr("disabled",true);
        }
   
    }      
    
});

// Retrive Current Shift Performance ...................
function get_current_shift_data(){
    $.ajax({
       url : "<?php echo base_url('Settings_controller/current_shift_retrive') ?>",
       method:'post',
       dataType:'json',
       cache: false,
       // data:{work:work},
        success:function(res){
            if (res.length>0) {
                var green_val = res[0].green+"%";
                var yellow_val = res[0].yellow+"%";
                var oee_val = res[0].oee+"%";
                $('.green_val').html(green_val);
                $('.yellow_val').html(yellow_val);
                $('.target_val').html(oee_val);
                $('.target_value_edit').val(oee_val);
                $('.yellow_value_edit').val(yellow_val);
                $('.green_value_edit').val(green_val);
            }
        },
        error:function(err){
            // alert('something went wrong, try again !!');
        }
    });
}

$(document).ready(function(){

    // Retrive Financial Metrics Data .............
    get_financial_metrics();

    // Retrive Downtime Threshold Data ................
    get_downtime_thres_hold();

    // Retrive Current Shift Performance Data ...........
    get_current_shift_data();

    // Retrive Shift Data ................. 
    get_shift_data();

    // Retrive Downtime Reason Data ...........
    get_downtime_data();

    // Retrive Quality Reason Data .............
    get_quality_reasons();   
});

$(document).on('blur','#green',function(){
     var num = /^([0-9][0-9]*)?$/;
     var green = document.getElementById("green").value;
     var yellow = document.getElementById("yellow").value;
     var err_msg = " ";
    green = green.replace("%", "");
    green = green.trim();
    if (!green) {
        err_msg = required;
        $(".btn_current_shift").removeAttr("disabled");
    }
    else{
         if (num.test(green)) {
             if ((parseInt(green) > parseInt(yellow))) {
                 if ((parseInt(green) < 100) && (parseInt(yellow) < 100)) {
                     err_msg = " ";
                     $('.add_yellow_data').html(err_msg);
                    $(".btn_current_shift").removeAttr("disabled");
                 }else{
                    err_msg = "Value should be less than 100";
                    $(".btn_current_shift").attr("disabled", true);
                 }
             }else{
                 err_msg = "Value should be greater than Yellow";
                    $(".btn_current_shift").attr("disabled", true);
             }
         }
         else if (green <0) {
            err_msg = positive;
            $(".btn_current_shift").attr("disabled", true);
         }
         else if (green ==0) {
            err_msg = greaterZero;
            $(".btn_current_shift").attr("disabled", true);
         }
         else{
             err_msg = numerical;
            $(".btn_current_shift").attr("disabled", true);
         } 
    }
    $('.add_green_data').html(err_msg);
});

// Current Shift Performance Validation ............
$(document).on('change','#yellow',function(){
    var num =  /^([1-9][0-9]*)?$/;
    var yellow = document.getElementById("yellow").value;
    var green = document.getElementById('green').value;
    yellow = yellow.replace("%", "");
    yellow = yellow.trim();
    var err_msg = " ";
    if (!yellow) {
        err_msg = required;
        $(".btn_current_shift").removeAttr("disabled");
    }
    else{
         if (num.test(yellow)) {
             if (parseInt(yellow) < parseInt(green)) {
                 if ((parseInt(yellow) < 100) && (parseInt(green) < 100)) {
                    err_msg = " ";
                    $('.add_green_data').html(err_msg);
                    $(".btn_current_shift").removeAttr("disabled");
                 }else{
                     err_msg = "Value should be less than 100";
                    $(".btn_current_shift").attr("disabled", true);
                 }
             }else{
                 err_msg = "Value should be less than Green";
               $(".btn_current_shift").attr("disabled", true);
             }    
         } else if (yellow < 0) {
            err_msg = positive;
            $(".btn_current_shift").attr("disabled", true);
         }
         else if (yellow ==0) {
            err_msg = greaterZero;
            $(".btn_current_shift").attr("disabled", true);
         }
         else{
             err_msg = numerical;
            $(".btn_current_shift").attr("disabled", true);
         }
    } 
     $('.add_yellow_data').html(err_msg);
});

// Reset Error Messages ..............
function error_show_remove(data){
    if (data == "financial_metrics") {
        $('#EOTEEPErr').html(success);
        $('#EOOOEErr').html(success);
        $('#EOOEEErr').html(success);
        $('#EAvailabilityErr').html(success);
        $('#EPerformanceErr').html(success);
        $('#EQualityErr').html(success);
        // $('#EOEEErr').html(success);

        $('.Update_GFM').removeAttr('disabled');
    }
    else if(data == "downtime_thresh_hold"){
        $('#Update_DThresholdErr').html(success);
        $('.Update_DT').removeAttr('disabled');
    }
    else if (data == "current_shift_performance") {
        $('.add_target_data').html(success);
        $('.add_green_data').html(success);
        $('.add_yellow_data').html(success);
    }

}

function imgError(file_name){
    var xhr = new XMLHttpRequest();
    xhr.open('HEAD', file_name, false);
    xhr.send();
            
    if (xhr.status  === 404 ) {
        return false;
    } else {
        return true;
    }
}

function quality_imgError(urlToFile) {
    var obj = new XMLHttpRequest();
    obj.open('HEAD', urlToFile, false);
    obj.send();
     
    if (obj.readyState == 4 && obj.status == 404 ) {
        return false;
    } else {
        return true;
    }
}

// Downtime Image Validation ........
/* downtime reasons image validation function temporary hide for this function
function downtime_img_fun(){
    var required = "*Required field";
    var success = "";

	var val = $('#attach_file').val();
	val = val.trim();
	if (!val) {
		$('#submit_downtime_reason').attr("disabled",true);
		return required;
	}else{
		var val_leng = $('#submit_downtime_reason').val();
		val_leng = val_leng.length;
		if(parseInt(val_leng) > 0){
			$('#submit_downtime_reason').removeAttr("disabled");
			return success;
		}else{
			return required;
		}
	}
}
*/
/* temporary hide for this function
$('#DTReasonVal').on('blur',function(){
	var x = downtime_img_fun();
	$('.add_img_err').html(x);
});
*/

// Add Quality Reason ............
/* temporary hide this function
function Qimg_func(){
    var required = "*Required field";
    var success = "";
    var val = $('#attach_file_Quality').val();
    val  = val.trim();
    if (!val) {
        $('#submit_quality_reasons').attr("disabled",true);
        return required;
    }else{
        var val_leng = $('#attach_file_Quality').val();
        val_leng = val_leng.length;
        if (parseInt(val_leng)>0) {
            $('#submit_quality_reasons').removeAttr("disabled");
            return success;
        }else{
            return required;
        }
    }
}
*/
/*
$('#Qreason').on('blur',function(){
    var x = Qimg_func();
    $('.qr_img_err').html(x);
});
*/

// Work Shift Management UI ............
function open_tooltip(){
    $('.click_tooltip').css("visibility","visible");
}

$(document).on('click','.incre_div',function(event){
            event.preventDefault();
            var find_index_incre = $('.incre_div').index(this);
            // hour increment condition
            if (find_index_incre == "0") {
                var get_val = $('#get_hour_val').text();
                if (parseInt(get_val) == 23) {
                    get_val = 0;
                }
                else{
                    get_val = parseInt(get_val) + 1;
                }
                get_val_h  = parseInt(get_val) <= 9? "0"+get_val:get_val;
                $('#get_hour_val').html(get_val_h);
                // minute increment condition
            }else if(find_index_incre == "1"){
                var get_minute_val = $('#get_minute_val').text();
                if (parseInt(get_minute_val) == 30) {
                    get_minute_val = 0;
                }else{
                    get_minute_val = 30;
                }
                get_minute_val = parseInt(get_minute_val) <=9? "0"+get_minute_val:get_minute_val;
                $('#get_minute_val').html(get_minute_val);
            }

        });

        $(document).on('click','.decre_div',function(event){
            event.preventDefault();
            var find_index_decre = $('.decre_div').index(this); 
            // decrement function condition for hour and minute
            if (parseInt(find_index_decre) == 0) {
                var get_hour_val = $('#get_hour_val').text();
                if (parseInt(get_hour_val) == 0) {
                    get_hour_val = 23;
                }else{
                    get_hour_val = parseInt(get_hour_val) -1;
                }
                get_hour_val = parseInt(get_hour_val) <= 9? "0"+get_hour_val:get_hour_val;
                    
                $('#get_hour_val').html(get_hour_val);
            }
            else if(parseInt(find_index_decre) == 1){
                var get_minute_val = $('#get_minute_val').text();
                if (parseInt(get_minute_val) == 30) {
                    get_minute_val = 0;
                }else{
                    get_minute_val = 30;
                }
                get_minute_val = parseInt(get_minute_val) <=9? "0"+get_minute_val:get_minute_val;
                $('#get_minute_val').html(get_minute_val);
            }
        });

    $('.click_tooltip').mouseleave(function(event){
        event.preventDefault();
        $('.click_tooltip').css("visibility","hidden");
        var hour  = $('#get_hour_val').text();
        var minute = $('#get_minute_val').text();
        var all_val = hour+":"+minute;
        $('#set_hour_minute').val(all_val);
    });
</script>
