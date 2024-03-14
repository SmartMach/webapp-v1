<style type="text/css">
    /*CSS for Calender dropdown*/
/*.ui-datepicker {
    text-align: center;
    z-index: 1000;
}*/

.ui-datepicker-trigger {
    margin: 0 0 0 5px;
    vertical-align: text-top;
}

.ui-datepicker {
    font-family: Open Sans, Arial, sans-serif;
    margin-top: 2px;
    background-color: white;
  border-radius: 6px 6px 6px 6px;
  padding: 3px;
  width: 256px;
  /* border: 1px solid #dddddd; */
  text-align: center;
  z-index: 100 !important;

}

.openemr-calendar .ui-datepicker {
    width: 191px;
}

.ui-datepicker table {
    width: 15rem;
    margin-left: 8px;
    z-index: 1000;
}

.ui-datepicker table thead{
    font-size: 13;
}
.ui-datepicker table td{
    color: #cacccf;
    background: #f6f6f6;
    border:1px solid #c5c5c5;
}

.ui-datepicker table td:hover{
    color: white;
    background: #c6c6c6;
    border:1px solid #c5c5c5;
}

.ui-datepicker table tr{
  text-align: center;
}

.ui-datepicker-prev{
  float: left;
  cursor: pointer;
  text-decoration: none;
}
.ui-datepicker-next{
  float: right;
  cursor: pointer;
  text-decoration: none;
}

.ui-datepicker-month{
  margin-left:0.5rem;
  padding: 0.1rem;
}
.ui-datepicker-year{
  margin-left:0.5rem;
  padding: 0.1rem;
}
.ui-datepicker-header{
  background-color: #e9e9e9;
  padding: 0.6rem;
  border-radius: 0.2rem;
}

.ui-state-default{
  text-decoration: none;
  font-size: 12px;
}
a{
  color: black; 
}

#shiftDate:onclick{
    
}


/* production correction mobile responsive table alignment css */
    /* table header css alignment mobile responsive work starting */
    .txt_header_align{
        white-space: break-spaces;
        overflow:hidden;

    }
    .res_h{
        display:inline;
    }
    .res_d{
        display:flex;
        flex-direction:row;


    }
    .res_baswidth{
        width:92%;
        display:flex;
        flex-direction:row;
        padding:0;
        margin:0;
    }
    .res_basewidth1{
        width:8%;
        display:flex;
        flex-direction:row;
        padding:0;
        margin:0;
    }

    .resfw{
        padding-left:1rem;
    }
   
    .tb_res_header{
        color:#979a9a;
        font-size:0.8rem;
        margin:0;
        padding:0;
        display:none;
    }
   
    .padding_bottom_mr{
        padding-bottom:0rem;
    }
    .lg_record_alignment{
        padding-left:0.9rem;
        display:flex;
        align-items:center;
    }
    .lg_record_alignprice{
        padding-right:1rem;
        display:flex;
        align-items:center;
        justify-content:end;
    }
    .textr{
        text-align:right;
    }
    .count_fnts{
        font-size:1.5rem !important;
    }

    .count_dv_fnts{
        font-size:1rem !important;
    }

    /* global filter */
    .lg_filter_res{
        display:inline;
    }
    .mb_filter_res{
        display:none;
    }
    .icon_align{
        width:100%;
        float:right;
        justify-content:center;
        text-align:center;
        margin:auto;
    }
    .editicon_align{
        justify-content:center;
    }
    /* media query  */
    @media only screen and (max-width:1000px){
        .h_mar_l{
            margin-left:0rem;
        }
    }

    /* mobile screen for machine settings  */
    /* this media query is comfortale for 576 to 768 px this media query working */
    @media only screen and (max-width:768px){
        .res_h{
            display:none;
        }
        .editicon_align{
            justify-content:end;
        }
        .mr_left_content_sec{
            margin-left:0rem !important;
            top:0rem !important;
            position:inherit !important;
        }

        .res_d{
            flex-direction:column-reverse;
            padding:1rem;

        }
        .res_baswidth{
            display:flex;
            width:100%;
            flex-direction:row;
            align-items:center;
            justify-content:space-around;
            flex-wrap:wrap;
        }
        .res_basewidth1{
            display:flex;
            width:100%;
            flex-direction:row;
            align-items:center;
            justify-content:space-between;
        }
       
        .justify_content_end_res{
            justify-content:end !important;
        }
        .resfw{
           padding-left:0rem;
        }
        .res_width{
            width:33% !important;
            justify-content:flex-start;
            flex-direction:column;
            align-items:start !important;
            padding-left:0rem !important;


        }
        .tb_res_header{
            display:inline;
        }
       
        .padding_bottom_mr{
            padding-bottom:0.5em;
            width:100% !important;
        }
        .count_fnts{
            font-size:1.2rem !important;
        }
        .count_dv_fnts{
            font-size:0.9rem !important;
            padding:8px;
        }
    
        .mdl_header{
            margin-left:0.4rem !important;
        }
        .notes_res{
            display:flex !important;
            flex-direction:column !important;
            align-items:start !important;
        }

        .mr_0{
            margin-left:0rem !important;
        }
        .align_top{
            align-items:start !important;
        }
        .textr{
            text-align:left;
        }

        /* global filter */
        .lg_filter_res{
            display:inline;
        }
        .mb_filter_res{
            display:none;
        }
    }


    /* gloabl filter css responsive  */
    @media only screen and (max-width:520px){
         /* global filter */
        .lg_filter_res{
            display:none;
        }
        .mb_filter_res{
            display:inline;
        }
        .ui-datepicker {
            
            z-index: 2000 !important;
        }
        .rejection_flex{
            flex-direction:column-reverse !important;
        }
        .response_width{
            width:100% !important;
        }
        .icon_align{
            text-align:end !important;
            padding-right:1rem;
        }
    }
</style>

<div class="mr_left_content_sec">
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">Corrections</p>
              <div class="d-flex">
                    <div class="float-end stcode count_dv_fnts" style="color: #005CBC;">
                        <span  id="corrects" class="count_fnts"></span><span style="font-size: 1rem;">Correction Counts</span>
                    </div>
              </div>
          </div>
        </nav>
        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
            <div class="lg_filter_res" style="width:100%">
                <div class="container-fluid paddingm display_f justify_sb align_c">
                    <p class="float-start"></p>
                    <div class="d-flex innerNav">
                        <div class="box">
                            <div class="input-box" style="margin-right: 0.5rem;">
                                <select class="form-select font_weight select_input_width input_padd" name="" id="correctionPart" style="width: 10rem;padding-right:1.8rem;">
                                </select>
                                <label for="inputSiteNameAdd" class="input-padding font_weight">Parts</label>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-box" style="margin-right: 0.5rem;">
                                <input type="datepicker" class="form-control select_input_width input_padd font_weight datepicker" name="" id="shiftDate" style="width: 10rem;" placeholder="dd-mm-yyyy" autocomplete="off">
                                 
                                <label for="inputSiteNameAdd" class="input-padding ">Shift Date</label>
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-box" style="margin-right: 0.5rem;">
                                <select class="form-select font_weight select_input_width input_padd" name="" id="shiftName" style="width: 10rem;">
                                </select>
                                <label for="inputSiteNameAdd" class="input-padding ">Shifts</label>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <div class="mb_filter_res" style="width:100%">
                <div class="d-flex justify-content-end align-items-center p-2">
                    <img src="<?php echo base_url() ?>/assets/img/global_filter.png?version=<?= rand() ?>" alt="" class="click_global_filter" style="height:1.5rem;width:1.5rem;">
                </div>
            </div>
            
        </nav>
            <div class="data_section">
                <div class="res_h">
                    <div class="table_header table_header_p">
                        <div class="row paddingm">
                            <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                            <p class="h_mar_l paddingm">FROM TIME</p>
                            </div>
                            <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                            <p class="h_mar_l paddingm">TO TIME</p>
                            </div>
                            <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                            <p class="h_mar_l paddingm">PART NAME</p>
                            </div>
                            <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                            <p class="h_mar_l paddingm">MIN COUNTS <i class="fa fa-info-circle"></i></p>
                            </div>
                            <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                            <p class="h_mar_l paddingm">CORRECTION COUNTS</p>
                            </div>
                            <div class="col-sm-3 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                            <p class="h_mar_l paddingm">NOTES</p>
                            </div>
                            <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_c align_c text_align_c txt_header_align">
                            <p class="paddingm">ACTION</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contentCorrection paddingm ">
                   
                   
                </div>
        </div>
</div>

<div class="modal fade" id="EditCorrectModal" tabindex="-1" aria-labelledby="EditCorrectModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <form method="" class="addMachineForm" action="" >
                <div class="modal-body">
                    <h5 class="modal-title settings-machineAdd-model mt-2 p-1"  id="EditCorrectModal1" style="margin-bottom: 0;margin-left: 0.7rem;">EDIT CORRECTION DATA</h5>
                    <div class="flex-container row">
                        <div  class="flex-container col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Part Name</label>
                                <p id="QPID" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Machine Name</label>
                                <p id="QMName" class="font_weight_modal"></p>
                            </div>
                        </div>
                        <div style="" class="flex-container col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Shift Date</label>
                                <p id="QShiftDate" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Shift</label>
                                <p id="QShift" class="font_weight_modal"></p>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container row">
                        <!-- temporary hide for this code -->
                        <div style="" class="flex-container col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Last Updated By</label>
                                <p id="QLUDate" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Last Updated On</label>
                                <p id="QLUOn" class="font_weight_modal"></p>
                            </div>
                        </div>
                        <div style="" class="flex-container col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">From Time</label>
                                <p id="QFromTime" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">To Time</label>
                                <p id="QToTime" class="font_weight_modal"></p>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container row ">
                        <div style="" class="flex-container col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 50%;" class="carddiv ">
                                <label class="headTitle">Min Counts</label>
                                <p id="MinCounts" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Total Correction Counts</label>
                                <p id="TotalCorrection" class="font_weight_modal"></p>
                            </div>
                        </div>   
                    </div>
                    <div class="flex-container row ">
                        <div style="" class="flex-container divbox fieldStyle col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="CorrectionCount" class="font_weight_modal">
                                <label class="input-padding">Correction Count <span class="paddingm validate">*</span></label>
                                <span class="correction_count_err validate"></span>
                            </div>
                        </div>
                        <div style="" class="flex-container divbox fieldStyle col-lg-6 col-md-12 col-sm-12">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="Notes" class="font_weight_modal">
                                <label class="input-padding">Notes <span class="paddingm validate">*</span></label>
                                <span class="correction_reason_err validate"></span>
                            </div>
                        </div>     
                    </div>                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditCorrection btn fo bn saveBtnStyle" name="" value="SAVE">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close" >Cancel</a>   
                </div>
            </form>
    </div>
  </div>
</div>




<!-- global filter modal mobile responsive -->
<div class="modal fade" id="filter_ftdate_responsive" tabindex="-1" aria-labelledby="filter_ftdate_responsive12" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
      <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
          <h5 class="modal-title header_popup fnt_fam" id="filter_ftdate_responsive12" style="">Global Filter</h5>
        </div>
        <div class="modal-body">
            <div class="d-flex  justify-content-center align-items-center row">
                <div class="box rightmar m-3" style="margin-right: 0.5rem;width:max-content;">
                    <div class="input-box">
                        <select class="form-select font_weight select_input_width input_padd " name="" id="correctionPartgf" style="width: 10rem;padding-right:1.8rem;">
                        </select>
                        <label for="" class="input-padding ">Parts</label>
                    </div>
                </div>
                <div class="box rightmar m-3" style="margin-right: 0.5rem;width:max-content;">
                    <div class="input-box">
                        <input type="datepicker" class="form-control select_input_width input_padd font_weight datepickergf " name="" id="shiftDategf" style="width: 10rem;" placeholder="dd-mm-yyyy" autocomplete="off">                         
                        <label for="inputSiteNameAdd" class="input-padding font_weight">Shift Date</label>
                    </div>
                </div>
            </div>  
            <div class="d-flex justify-content-center align-items-center row">
                <div class="box rightmar m-3" style="margin-right: 0.5rem;width:max-content;">
                    <div class="input-box">
                        <select class="form-select select_input_width input_padd font_weight" name="" id="shiftNamegf" style="width: 10rem;">
                        </select>
                        <label for="inputSiteNameAdd" class="input-padding ">Shifts</label>
                    </div>
                </div> 
            </div>
        </div>
        <div class="modal-footer" style="border:none;">
          <a class="btn fnt_fam btn_fnt_size btn_padd btn_save drp_filter_btn"  value="Apply Filter" >Apply Filter</a>
          <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
        </div>
      </div>
    </div>
</div>

<!-- preloader -->
<!-- preloader -->
<div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
      </div>
</div>
<!-- preloader end -->


<!-- link for calendar date  -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

 var control = <?php echo($this->data['access'][0]['production_data_management']); ?>;
       var control_display = " ";
       if (control < 2) {
            control_display = "none";
       }else{
        control_display = "inline";
       }
// get correction data function
function  gedt_correction_data(){

    var screenWidth = window.innerWidth;
    var pdrpclassname = "";
    var sdateclassname = "";
    var sidclassname = "";

    if (screenWidth<=520) {
        pdrpclassname = "correctionPartgf";
        sdateclassname="shiftDategf";
        sidclassname = "shiftNamegf";
    }else if(screenWidth>520){
        pdrpclassname = "correctionPart";
        sdateclassname="shiftDate";
        sidclassname = "shiftName";
    }

    var partname = $('#'+pdrpclassname).val();
    var shift_date = $('#'+sdateclassname).val();
    const date_arr = shift_date.split('/');
    var shift_date_edit = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
    var shift = $('#'+sidclassname).val();
    var s = shift.split("");
    $.ajax({
        url: "<?php echo base_url('PDM_controller/getCorrectionData'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            partname:partname,
            shift_date:shift_date_edit,
            shift:s[0],
        },
        success:function(res){
            var elements = $();
            var count =0;
            var startTime = "";
            var i=0;
           
            $('.contentCorrection').empty();
            res.forEach(function(item){
                if (item.corrections != null) {
                    count = parseInt(count)+parseInt(item.corrections);
                }
                var correction_min_count = (item.correction_min_counts != null ? item.correction_min_counts:"");
                var correction_count = (item.corrections != null ? item.corrections:"");
                var notes = (item.correction_notes != null ? item.correction_notes:"");

                if(parseInt(item.corrections) < 0){
                    elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm res_d">'
                            +'<div class="res_baswidth">'
                                +'<div class="d-flex flex-row flex-wrap justify-content-center align-items-stretch padding_bottom_mr" style="width:36%;">'
                                    +'<div class="tb_res_header fnt-fam res_width">From Time</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">To Time</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">Part Name</div>'

                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:25%;"><p class="paddingm">'+item.start_time+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:25%;"><p class="paddingm">'+item.end_time+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:50%;"><p class="paddingm">'+item.part_name+'</p></div>'
  
                                +'</div>'
                                +'<div class="d-flex flex-row flex-wrap justify-content-center align-items-stretch padding_bottom_mr" style="width:64%;">'
                                    +'<div class="tb_res_header fnt-fam res_width">Min Counts</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">Correction Counts</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">Notes</div>'

                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:29%;"><p class="paddingm">'+correction_min_count+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:28%;"><p class="paddingm" style="color: #e2062c;font-weight:bold;">'+correction_count+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:43%;"><p class="paddingm">'+notes+'</p></div>'

                                +'</div>'
                            +'</div>'
                            +'<div class="res_basewidth1">'
                                +'<div class="col-1 col d-flex justify_content_end_res fasdiv " style="width:100%;">'
                                    +'<ul class="edit-menu">'
                                        +'<li class="d-flex justify-content-center" >'
                                            +'<a href="#">'
                                                +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects  pen-product" style="font-size: 20px;color: #d9d9d9;height:1.2rem;width:1.2rem;display:'+control_display+'" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                                            +'</a>'
                                        +'</li>'
                                    +'</ul>'
                                +'</div>'
                            +'<div>'
                        +'</div>'
                    +'</div>');
                }
                else if (item.corrections>=0) {
                    elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm res_d">'
                            +'<div class="res_baswidth">'
                                +'<div class="d-flex flex-row flex-wrap justify-content-center align-items-stretch padding_bottom_mr" style="width:36%;">'
                                    +'<div class="tb_res_header fnt-fam res_width">From Time</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">To Time</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">Part Name</div>'

                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:25%;"><p class="paddingm">'+item.start_time+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:25%;"><p class="paddingm">'+item.end_time+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:50%;"><p class="paddingm">'+item.part_name+'</p></div>'
                                +'</div>'
                                +'<div class="d-flex flex-row flex-wrap justify-content-center align-items-stretch padding_bottom_mr" style="width:64%;">'
                                    +'<div class="tb_res_header fnt-fam res_width">Min Counts</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">Correction Counts</div>'
                                    +'<div class="tb_res_header fnt-fam res_width">Notes</div>'

                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:29%;"><p class="paddingm">'+correction_min_count+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:28%;"><p class="paddingm" style="color: #004795;font-weight:bold;">'+correction_count+'</p></div>'
                                    +'<div class="table_data_element res_width lg_record_alignment" style="width:43%;"><p class="paddingm">'+notes+'</p></div>'
                                +'</div>'
                            +'</div>'
                            +'<div class="res_basewidth1">'
                                +'<div class="col-1 col d-flex justify_content_end_res fasdiv" style="width:100%;">'
                                    +'<ul class="edit-menu">'
                                        +'<li class="d-flex justify-content-center">'
                                            +'<a href="#">'
                                                +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects  pen-product" style="font-size: 20px;color: #d9d9d9;height:1.2rem;width:1.2rem;display:'+control_display+'" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                                            +'</a>'
                                        +'</li>'
                                    +'</ul>'               
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div>');
                }       
                $('.contentCorrection').append(elements);
            });
            
            const absNumber = Math.abs(count);
            const convertedNumber = absNumber.toString().padStart(2, '0');
            count < 0 ? $('#corrects').html('-' + convertedNumber) : $('#corrects').html(convertedNumber);
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}

//script for Shift Date calender
function datePick(date_shift){

  var enableDays=[];
  date_shift.forEach(function(item){
    enableDays.push(item.shift_date);
  });
}
     $(document).ready(function(){
        
    //    this is access control for the user privilage
       var control = <?php echo($this->data['access'][0]['production_data_management']); ?>;
       var control_display = " ";
       if (control < 2) {
            control_display = "none";
       }else{
        control_display = "inline";
       }
    //    this ajax function retrive all tool changeover parts
       $('#correctionPart').empty();
       $('#correctionPartgf').empty();
        $.ajax({
            url: "<?php echo base_url('PDM_controller/getCorrectionPart'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                var elements = $();
                var gfelement = $();

                $('#correctionPart').append('<option value="all" selected="true" disabled>Select</option>');
                $('#correctionPartgf').append('<option value="all" selected="true" disabled>Select</option>');

                res.forEach(function(item){
                    elements = elements.add('<option value="'+item.part_id+'">'+item.part_name+'-'+item.part_id+'</option>');
                    $('#correctionPart').append(elements);

                    gfelement = gfelement.add('<option value="'+item.part_id+'">'+item.part_name+'-'+item.part_id+'</option>');
                    $('#correctionPartgf').append(gfelement);
                });
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });

        $("#shiftDate").attr("readonly", true); 
        $("#shiftName").attr("readonly", true);
        $("#shiftName").attr("disabled", true);
        $("#shiftDate").attr("disabled", true);

        // global filter dropdowns
        $('#shiftDategf').attr("readonly",true);
        $('#shiftDategf').attr("disabled",true);
        $('#shiftNamegf').attr("readonly",true);
        $('#shiftNamegf').attr("disabled",true);
        
        // this function if you change part dropdown then retrive the shift date for the dropdown and enable the shifts

        $(document).on("change", "#correctionPart", function(){

            $('#corrects').html("");

            $('#shiftDate').prop('selectedIndex',0);
            var part = $('#correctionPart').val();
            $('.contentCorrection').empty();
            $('#shiftDate').val('');
            $.ajax({
                url:"<?php echo base_url('PDM_controller/correction_shift_date'); ?>",
                type:"POST",
                dataType:"json",
                data:{
                    part_id:part,
                },
                success:function(data){
                    enableDays = [];
                    data.forEach(item=>{
                        enableDays.push(item.shift_date);
                    });

                    $(".datepicker").datepicker({beforeShowDay: function(dt) {
                        var datestring = $.datepicker.formatDate('yy-mm-dd', dt);
                        if($.inArray(datestring, enableDays) != -1) {
                            return [true];
                        }
                        else{
                            // return [dt.getDay() == 1 || dt.getDay() == 2 ? false : true && vakantie.indexOf(datestring) == -1 ];
                            // return [vakantie.indexOf(datestring) == -1 ];
                            return [false];
                        }   
                    },
                        changeMonth: true,
                        changeYear: true,
                        maxDate: new Date()
                    });
                }

                
            }); 
            $('.fixtabletitle').css("z-index","1");
            $("#shiftDate").removeAttr("disabled");
            $("#shiftDate").removeAttr("readonly");
            $('.contentMachine').empty();
            $('#shiftName').prop('selectedIndex',0);
            $('#shiftName').attr('disabled',true);
        });
        // onclick time shift date design for border adding  [the error for shift border align for table design]
        $(document).on('click','#shiftDate',function(){
            $( "#ui-datepicker-div" ).css( "border","1px solid #dddddd" );
        });

        // after select shift date retrive that particular date  shifts retrive funciton
        $(document).on("change", "#shiftDate", function(){

            $('#corrects').html("");
            
            var sdate = $('#shiftDate').val();
            var part_name = $('#correctionPart').val();
            const date_arr = sdate.split('/');
            var shift_date = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
            $('#shiftName').empty();
            $('#shiftName').prop('selectedIndex',0);
            $('.contentCorrection').empty();
           
            $.ajax({
                url: "<?php echo base_url('PDM_controller/getCorrectShift'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    sdate:shift_date,
                },
                success:function(shift_res){
                    var elements = $();
                    $('#shiftName').append('<option value=" " selected="true" disabled>Select</option>');
                   
                    shift_res['shift'].forEach(function(item){
                            var temp = item.shifts.split("");
                            $.ajax({
                                url:"<?php echo base_url('PDM_controller/correction_rejection_exactshift'); ?>",
                                method:"post",
                                cache: false,
                                async: false,
                                data:{
                                    part_name:part_name,
                                    shift_date:shift_date,
                                    shift:temp[0]
                                },
                                dataType:"json",
                                success:function(shift){
                                    if(shift.length > 0){
                                    elements = elements.add('<option value="'+item.shifts+'">Shift '+temp[0]+'</option>');
                                    }
                                }
                            });
                            //elements = elements.add('<option value="'+item.shifts+'">Shift '+temp[0]+'</option>');
                            $('#shiftName').append(elements);
                    });
                    $("#shiftName").removeAttr("readonly");
                    $("#shiftName").removeAttr("disabled");
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
        });


    // select shift to display table row 
    $(document).on('change','#shiftName',function(){
            gedt_correction_data();
    });

    $(document).on("click", ".editCorrects", function(){

        var screenWidth = window.innerWidth;
        var sdateclassname = "";
        var sidclassname = "";

        if (screenWidth<=520) {
            sdateclassname="shiftDategf";
            sidclassname = "shiftNamegf";
        }else if(screenWidth>520){
            sdateclassname="shiftDate";
            sidclassname = "shiftName";
        }

        var partid = $(this).attr("pIdValue");
        var from_time = $(this).attr("fdate");
        var shift_date = $('#'+sdateclassname).val();
        const date_arr = shift_date.split('/');
        var shift_date_edit = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
        var shift = $('#'+sidclassname).val();
        var machine_id = $(this).attr('rvalue');
        var s = shift.split("");

        // frist remove the before values
        $('#QPID').html('');
        $('#QMName').html('');
        $('#QShiftDate').html('');
        $('#QShift').html('');
        $('#QLUDate').html('');
        $('#QLUOn').html('');
        $('#QFromTime').html('');
        $('#QToTime').html('');
        $('#MinCounts').html('');
        $('#TotalCorrection').html('');
        $('#Notes').val('');
        $('#CorrectionCount').val('');

        $.ajax({
            url: "<?php echo base_url('PDM_controller/getCorrectData_con'); ?>",
            type: "POST",
            dataType: "json",
            data:{
                partid:partid,
                from_time:from_time,
                shift_date:shift_date_edit,
                shift:s[0],
                machine_id:machine_id,
            },
            success:function(res){
                var datetime = getdate_time(res['correction'][0].last_updated_on);
                $('#QPID').html(res['part_name']);
                $('#QPID').attr("part_data",res['correction'][0].part_id);
                $('#QMName').html(res['machine_name']);
                $('#QMName').attr("machine_data",res['correction'][0].machine_id);
                $('#QShiftDate').html(res['correction'][0].shift_date);
                $('#QShift').html('Shift'+' '+res['correction'][0].shift_id);

                if(res['last_updated_by'] !=null){
                    $('#QLUDate').html(res['last_updated_by'][0].first_name+ " " +res['last_updated_by'][0].last_name);
                }else{
                    $('#QLUDate').html('');
                }
                var correction_min_count_edit = 0;
                if (parseInt(res['correction'][0].correction_min_counts)>0) {
                    correction_min_count_edit = -res['correction'][0].correction_min_counts
                }
                else{
                    correction_min_count_edit = res['correction'][0].correction_min_counts;
                }
                
                $('#QLUOn').html(datetime);
                $('#QFromTime').html(res['correction'][0].start_time);
                $('#QToTime').html(res['correction'][0].end_time);
                $('#MinCounts').html(correction_min_count_edit);
                $('#TotalCorrection').html(res['correction'][0].corrections);
                if (res['correction'][0].correction_notes != " ") {
                    $('#Notes').val(res['correction'][0].correction_notes);
                }else{
                    $('#Notes').val('');
                }
                
                $('#CorrectionCount').val(res['correction'][0].corrections); 
                $('.correction_reason_err').html('');
                $('.correction_count_err').html('');
                $('#EditCorrectModal').modal('show');
                var production_count = parseInt(res['correction'][0].production);
                $('.EditCorrection').attr('production_count',production_count);
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    });


    });

    // AFTER edit submit the corrections function
    $(document).on("click", ".EditCorrection", function(event){
        event.preventDefault();

        var screenWidth = window.innerWidth;
        var pdrpclassname = "";
        
        if (screenWidth<=520) {
            pdrpclassname = "correctionPartgf";
            
        }else if(screenWidth>520){
            pdrpclassname = "correctionPart";
        }
        var x = correctionCount();
        var y = correctionNotes();
        if (x!='' || y!='') {
            $('.correction_count_err').html(x);
            $('.correction_reason_err').html(y);
        }else{
            $('.correction_count_err').html(x);
            $('.correction_reason_err').html(y);


            $("#overlay").fadeIn(300);
            var note = $('#Notes').val();
            var start_time = $('#QFromTime').text();
            var shift_date = $('#QShiftDate').text();
            var machine_id = $('#QMName').attr("machine_data");
            var shift = $('#QShift').text();
            var shift_arr = shift.split(' ');
            var min_count = $('#MinCounts').text();
            var production_count = $('.EditCorrection').attr('production_count');
            var correction_value = $('#CorrectionCount').val();
            var correction_count = parseInt(correction_value);
            var max_reject = parseInt(production_count) + parseInt(correction_count);
            var partid=$('#'+pdrpclassname).val();
            $('.EditCorrection').removeAttr("disabled");
            $.ajax({
                url: "<?php echo base_url('PDM_controller/updateCorrectData'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    note:note,
                    total_correction_value:correction_count,
                    max_count:max_reject,
                    start_time:start_time,
                    shift:shift_arr[1],
                    shift_date:shift_date,
                    machine_id:machine_id,
                    partid:partid
                },
                success:function(res){
                    gedt_correction_data();
                    $('#EditCorrectModal').modal('hide');
                    $("#overlay").fadeOut(300);                      
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                    $("#overlay").fadeOut(300);
                }
            });
        }
    });

// correction count validation
$(document).on('change','#CorrectionCount',function(){
    x= correctionCount();
    $('.correction_count_err').html(x);
});
function correctionCount(){
    var cval = $('#CorrectionCount').val();
    cval = cval.trim();
    var mincount = $('#MinCounts').text();

    mincount = mincount.trim();

    var msg = "";
    var pattern = Number(cval);
    if (cval == "") {
        
        msg = "*Required field";
    }else{
        
        msg = "";

        var first_element = pattern.toString().charAt(0);

        if (parseInt(cval) >= 0) {
            msg = "";
            cval = Math.trunc(cval);
            $('#CorrectionCount').val(cval);
            $("#TotalCorrection").html(cval);
            $('.EditCorrection').removeAttr("disabled");
        }
        else if(parseInt(cval)>= parseInt(mincount)){
            msg = "";
            cval = Math.trunc(cval);
            $('#CorrectionCount').val(cval);
            $("#TotalCorrection").html(cval);
            $('.EditCorrection').removeAttr("disabled");
        }
        else if (parseInt(cval) < parseInt(mincount)) {
            msg = "*Value should be greater than Min Counts";
            $('.EditCorrection').attr("disabled",true);
        }
        else{
            msg = "*Numerical values only allowed";
            $('.EditCorrection').attr("disabled",true);
        }
    }
    return msg;
};

// correction reason validation
$(document).on('blur','#Notes',function(){
    x=correctionNotes();
    $('.correction_reason_err').html(x);
});
function correctionNotes(){
    var cval = $('#Notes').val();
    cval = cval.trim();
    var msg = "";
    
    if (cval) {
        msg = "";
        $('.EditCorrection').removeAttr("disabled");
    }else{
        msg = "*Required field";
       $('.EditCorrection').attr("disabled",true);
    }
    return msg;
};



// global filter functions

// global filter onclick function
$(document).on('click','.click_global_filter',function(event){
    event.preventDefault();
    $('#filter_ftdate_responsive').modal('show');
});

$(document).on("change", "#correctionPartgf", function(){

    $('#corrects').html("");

    $('#shiftDategf').prop('selectedIndex',0);
    var part = $('#correctionPartgf').val();
    $('.contentCorrection').empty();
    $('#shiftDategf').val('');
    $.ajax({
        url:"<?php echo base_url('PDM_controller/correction_shift_date'); ?>",
        type:"POST",
        dataType:"json",
        data:{
            part_id:part,
        },
        success:function(data){
            enableDays = [];
            data.forEach(item=>{
                enableDays.push(item.shift_date);
            });

            $(".datepickergf").datepicker({beforeShowDay: function(dt) {
                var datestring = $.datepicker.formatDate('yy-mm-dd', dt);
                if($.inArray(datestring, enableDays) != -1) {
                    return [true];
                }
                else{
                    // return [dt.getDay() == 1 || dt.getDay() == 2 ? false : true && vakantie.indexOf(datestring) == -1 ];
                    // return [vakantie.indexOf(datestring) == -1 ];
                    return [false];
                }   
            },
                changeMonth: true,
                changeYear: true,
                maxDate: new Date()
            });
        }        
    }); 
    $('.fixtabletitle').css("z-index","1");
    $("#shiftDategf").removeAttr("disabled");
    $("#shiftDategf").removeAttr("readonly");
    $('.contentMachine').empty();
    $('#shiftNamegf').prop('selectedIndex',0);
    $('#shiftNamegf').attr('disabled',true);
});


$(document).on("change", "#shiftDategf", function(){

    $('#corrects').html("");

    var sdate = $('#shiftDategf').val();
    var part_name = $('#correctionPartgf').val();
    const date_arr = sdate.split('/');
    var shift_date = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
    $('#shiftNamegf').empty();
    $('#shiftNamegf').prop('selectedIndex',0);
    $('.contentCorrection').empty();

    $.ajax({
        url: "<?php echo base_url('PDM_controller/getCorrectShift'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            sdate:shift_date,
        },
        success:function(shift_res){
            var elements = $();
            $('#shiftNamegf').append('<option value=" " selected="true" disabled>Select</option>');
        
            shift_res['shift'].forEach(function(item){
                var temp = item.shifts.split("");
                $.ajax({
                    url:"<?php echo base_url('PDM_controller/correction_rejection_exactshift'); ?>",
                    method:"post",
                    cache: false,
                    async: false,
                    data:{
                        part_name:part_name,
                        shift_date:shift_date,
                        shift:temp[0]
                    },
                    dataType:"json",
                    success:function(shift){
                        if(shift.length > 0){
                            elements = elements.add('<option value="'+item.shifts+'">Shift '+temp[0]+'</option>');
                        }
                    }
                });
                $('#shiftNamegf').append(elements);
            });

            $("#shiftNamegf").removeAttr("readonly");
            $("#shiftNamegf").removeAttr("disabled");
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
});


$(document).on('click','.drp_filter_btn',function(){
    var screenWidth = window.innerWidth;
    screenWidth <=520 ? (function() { gedt_correction_data(); })() : null;
    $('#filter_ftdate_responsive').modal('hide');
    
});
</script> 
