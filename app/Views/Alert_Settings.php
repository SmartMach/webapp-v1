<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/alert_settings.css?version=<?php echo rand(); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> 
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">


</head>
<style>
    /* select 3 */
/* .select3 {
  position: relative;
  margin-bottom: 15px;
  width: 250px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
} */


.email_che.checked{
    z-index: -1;
}

/* edit priority dropdown */


/* assignee dropdown */
.assignee_drp {
    /* margin-top: 10px; */
    margin: auto;
    width: 100%;
    max-width: 350px;
    height: 2.5rem;
    border-radius: 5px;
    background-color: #fff;
    border: 1px solid #ccc;
    display: flex;
    flex-direction: row;
    justify-content: start;
    align-items: center;
    padding-left: 2px;
}
.assignee_drp:hover {
    background-color: #F4F3F3;
    border: 1px solid transparent;
    box-shadow: inset 0 0px 0px 1px #ccc;
}
.assigne_drp_btn br{
    display: none;
}
.assignee_drp .assigne_drp_btn {
  background: var(--bg1);
  padding: 10px;
  box-sizing: border-box;
  border-radius: 3px;
  width: 100%;
  cursor: pointer;
  position: relative;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  /* background: #fff; */
  display:flex;
  flex-direction:row;
}

.assignee_drp .assigne_drp_btn:after {
  content: "";
  position: absolute;
  top: 45%;
  right: 15px;
  width: 6px;
  height: 6px;
  -webkit-transform: translateY(-50%) rotate(45deg);
          transform: translateY(-50%) rotate(45deg);
  border-right: 2px solid #666;
  border-bottom: 2px solid #666;
  transition: 0.2s ease;
}

.assignee_drp .assignee_drp_fill {
  position: absolute;
  top: 100%;
  /* width: 100%; */
  border-radius: 0 0 3px 3px;
  overflow: hidden;
  background: var(--bg1);
  border-top: 1px solid #eee;
  z-index: 1;
  background: #fff;
  -webkit-transform: scale(1, 0);
          transform: scale(1, 0);
  -webkit-transform-origin: top center;
          transform-origin: top center;
  visibility: hidden;
  transition: 0.2s ease;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2);
}
.assignee_drp .assignee_drp_fill .assignee_drp_flex {
  padding: 10px;
  box-sizing: border-box;
  cursor: pointer;
  float: left;
    width: 100%;
    overflow: hidden;
    display: flex;
    height: 45px;
}
.assignee_drp .assignee_drp_fill .assignee_drp_flex .letter3 {
    margin-top: 0px;
    margin-left: 10px;
}


.assignee_drp .assignee_drp_fill .assignee_drp_flex:hover {
  background: #f8f8f8;
}
.assignee_drp .assignee_drp_fill .new_4 {
  visibility: visible;
  -webkit-transform: scale(1, 1);
          transform: scale(1, 1);
}
.assignee_drp_fill .new_4{
    display:block
}
.assignee_drp_fill{
    display: none;
}
.assignee_drp .assignee_drp_btn .letter3{
    margin-top: 0px;
    margin-left: 10px;
}
.assigne_drp_btn i{
    width: 20px;
}
.filter_multiselect_lable{
    width: 10rem;
    min-height: 2.6rem;
    max-height: 10rem;
    border: 1px solid #ced4da;
    border-radius: 0.3rem;
}
.lable-div{
    display: flex;
    /*min-height: 2.3rem !important;*/
    max-height: 10rem !important;
    margin-top:10px;
    overflow: auto;
    flex-wrap: wrap;
}
.input-field-lable{
    width: 100px;
    height: 28px;
    margin: 0.4rem;
    border: 0.1rem solid #faf7f7;
}
.lable-bg{
    background-color:black;
    color:white;
    margin-left:5px;
    margin-top:5px;
    border-radius:3px;
}
.item-remove{
    margin:2px 2.5px; 
}
.lable_items{
    margin:2px 2.5px;
}
</style>
<br>
<br>
<div style="margin-left: 4.5rem;">
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
        <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Alert Settings</p>

        </div>
    </nav>
    <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
        <div class="container-fluid paddingm " style="display:flex;flex-direction:row-reverse;">

            <!-- <p class="float-start"></p> -->
            <div class="d-flex innerNav">

                <div class="filter_div" style="padding-right:2rem;">
                    
                    <!-- search keyword -->
                    <!-- <div class="box rightmar" style="margin-right:0.5rem;">
                        <div class="fieldStyle input-box" style="height:2rem;">
                            <input type="text" class="form-control font_weight" id="filterkeyword"
                                style="font-size:12px;height:2.1rem;margin-top:0.5rem;" name="filterkeyword"
                                placeholder="Search by Keyword">
                            <label for="filterkeyword" class="input-padding">Search</label>
                        </div>
                    </div> -->
                    
                    <!-- part -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="margin-top:0.1rem;">Part</label>
                            <div class="filter_selectBox_categorygp" onclick="alert_filter_part()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="filter_txt_part" style="">All Parts</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp alert_file_part_div" style="overflow-y:auto;">
                                <!-- options in progress -->
                               
                            </div>
                        </div>
                    </div>
                    
                    <!-- Machine -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="margin-top:0.1rem;">Machine</label>
                            <div class="filter_selectBox_categorygp" onclick="alert_filter_machine()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="filter_txt_machine" style="">All Machine</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp  alert_filter_machine_div" style="overflow-y:auto;">
                               
                            </div>
                        </div>
                    </div>

                    <!-- Criteria -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="margin-top:0.1rem;">Work Order Type</label>
                            <div class="filter_selectBox_categorygp" onclick="alert_filter_work()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="text_filter_work" style="">All </option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp alert_filter_work_order_dive" style="">
                                <!-- options in progress -->
                                <div class="add_alert_box_flex alert_filter_work_click" style="position: relative;">
                                    <div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">
                                        <input type="checkbox" id="one" class="filter_alert_work_checkbox" value="all" style="margin-right:100px;margin-top:12px"/>
                                    </div>
                                    <div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">
                                        <p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">All </p>
                                    </div>
                                </div>

                                <div class="add_alert_box_flex alert_filter_work_click" style="position: relative;">
                                    <div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">
                                        <input type="checkbox" id="one" class="filter_alert_work_checkbox" value="issue" style="margin-right:100px;margin-top:12px"/>
                                    </div>
                                    <div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">
                                        <p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">Issue </p>
                                    </div>
                                </div>

                                <div class="add_alert_box_flex alert_filter_work_click" style="position: relative;">
                                    <div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">
                                        <input type="checkbox" id="one" class="filter_alert_work_checkbox" value="task" style="margin-right:100px;margin-top:12px"/>
                                    </div>
                                    <div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">
                                        <p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">Work </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- updated by -->
                    <div class="inner_div_align">
                        <div class="box rightmar" style="margin-right: 0.5rem;">
                            <label class="multi_select_label" style="margin-top:0.1rem;">LastUpdated By</label>
                            <div class="filter_selectBox_categorygp" onclick="alert_filter_assignee()">
                                <select class="multi_select_categorygp" style="">
                                    <option id="txt_filter_last_updated_by" style="">All Users</option>
                                </select>
                                <div class="filter_overSelect_categorygp"></div>
                            </div>
                            <div class="filter_checkboxes_categorygp filter_alert_assignee_div" style="overflow-y:auto;">
                               
                            </div>
                        </div>
                    </div>

                    <!-- apply button -->
                    <div class="inner_div_align">
                        <a style="" class="settings_nav_anchor float-end apply_btn_style"
                            id="apply_filter_btn">APPLY</a>
                    </div>

                    <!-- filter reset button -->
                    <div class="inner_div_align">
                        <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" onclick="alert_settings_filter_reset()" class="filter_reset_style"
                            style="" alt="">
                    </div>

                </div>
                <a style="background: #005abc;color: white;width:max-content;" class="settings_nav_anchor float-end"
                    id="add_alert_button" onclick="show_modal_add_alert()">
                    <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD ALERT
                </a>
            </div>
            <div class="pagination_div" style="">
                <input type="text" class="pagination_input_div pagination_onchange" value="" style="">
                <span class="pagination_text_div" style="">of <span id="pagination_val">0</span> Pages</span>
            </div>
        </div>
    </nav>
    <div class="tableContent">
        <div class="settings_machine_header sticky-top fixtabletitle" style="margin-top:1rem;">
            <div class="row paddingm">
                <div class="col-sm-1 p3 paddingm" style="width:6%;">
                    <p class="basic_header">ID</p>
                </div>
                <div class="col-sm-2 p3 paddingm" style="width:12%;">
                    <p class="basic_header">ALERT NAME</p>
                </div>
                <div class="col-sm-2 p3 paddingm mar_right" style="width:12%;">
                    <p class="basic_header">MACHINES</p>
                </div>
                <div class="col-sm-2 p3 paddingm " style="width:13%;">
                    <p class="basic_header">PARTS</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="width:22%;">
                    <p class="basic_header">CRITERIA</p>
                </div>
                <div class="col-sm-2 p3 paddingm" style="width:9%;">
                    <p class="basic_header">NOTIFY AS</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="width:17%;">
                    <p class="basic_header">LAST UPDATED BY</p>
                </div>
                <div class="col-sm-1 p3 paddingm" style="justify-content: center;width:8.9%;">
                    <p class="basic_header">ACTION</p>
                </div>
            </div>
        </div>

        <div class="contentMachine contentContainer paddingm content_alert_settings" style="margin-bottom:0rem;">
            

          
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

<!-- add lert model -->

<div class="modal fade" id="addAlert_modal" tabindex="-1" aria-labelledby="addAlert_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="addAlert" style="">ADD ALERT</h5>
            </div>
            <div class="modal-body" style="padding:0;">
                <div class="scroll_div" style="height:30rem;overflow:hidden;overflow-y:scroll;padding:0.8rem;">
                    <div class="row mb-2 " style="margin-top:3rem;">
                        <div class="box" style="">
                            <div class="input-box" >
                                <input type="text" class="form-control alert_font_css" id="add_alert_name"    name="add_alert_name">
                                <label for="add_alert_name" class="input-padding">Alert Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputAlertNameErr"></span> 
                            </div>
                        </div>
                    </div>
                    <div class=" row d-flex flex-row mb-2">
                        <div class="" style="width:9.5%;padding:0;display:flex;flex-direction:row;align-items:center;"><span style="font-size:12px;">Alert Criteria</span></div>
                        <div class="" style="width:90.4%;padding:0;"><hr></div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="box" >
                                <div class="input-box">
                                    <select class="form-select alert_font_css" name="add_alert_metrics" id="add_alert_metrics" style="width: 100%;">
                                        <option value="" disabled selected>Choose Metrics</option>
                                        <option value="planned_downtime">Planned Downtime</option>    
                                        <option value="unplanned_downtime">Unplanned Downtime</option>
                                        <option value="planned_machine_off">Planned Machine Off</option>
                                        <option value="unplanned_machine_off">Unplanned Machine Off</option>
                                        <option value="total_downtime">Total Downtime</option>
                                        <option value="total_unamed">Total Unamed</option>
                                        <option value="total_rejection">No Of Rejection</option>
                                        <option value="oee">OEE</option>
                                        <option value="teep">TEEP</option>
                                        <option value="ooe">OOE</option>
                                        
                                    </select>
                                    <label for="add_alert_metrics" class="input-padding ">Metrics  <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputAlertmetricsErr"></span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-3">
                            <div class="box rightmar" style="margin-right: 0.5rem;">
                                <div class="input-box">
                                    <select class="form-select alert_font_css" name="add_alert_relation" id="add_alert_relation" style="width: 10rem;">
                                        <option value="" disabled selected>Choose Relation</option>
                                        <option value="<"><</option>
                                        <option value=">">></option>
                                        <option value="<="><=</option>
                                        <option value=">=">>=</option>
                                        <option value="==">==</option>
                                    </select>
                                    <label for="add_alert_relation" class="input-padding ">Relation  <span class="paddingm validate">*</span></label>
                                </div>
                                <span class="paddingm float-start validate" id="inputAlertrelationsErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="box" style="padding:0;">
                                <div class="input-box" >
                                    <input type="text" class="form-control alert_font_css" id="add_alert_val" name="add_alert_val" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <label for="add_alert_val" class="input-padding">Value <span class="paddingm validate">*</span></label>
                                </div>
                                <span class="paddingm float-start validate" id="inputAlertValueErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-1" style="display:flex;flex-direction:row;padding:0;justify-content:center;align-items:end;font-size:12px">
                            <span style="font-size:12px;">Units</span>
                        </div>
                    
                    </div>

                    <div class="row mb-2">

                        <div class="col-lg-4">
                            <!-- <label for="">In the Past</label> -->
                            <div class="input-group mb-3">
                                <span class="label_txt_hour" style="">In The Past <span class="paddingm validate">*</span></span>
                                <input type="text" class="form-control alert_font_css"  aria-label="Recipient's username" id="add_alert_past_hour" name="add_alert_past_hour" aria-describedby="basic-addon2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <div class="input-group-append  bg-white text-primary">
                                    <span class="input-group-text bg-white" style="font-size:12px;height:2.4rem;" id="basic-addon2">Hours</span>
                                </div>
                            </div>
                            <span class="paddingm float-start validate" id="inputAlertpastHourErr"></span>
                        </div>
                    </div>
                
                    <div class="row mb-4">
                        <span style="font-size:12px;">Apply this Alert criteria in any of selected </span>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="box rightmar" style="margin-right: 0.5rem;position:relative;">
                                <label class="multi_select_model_drp_label" style="">Machine <span class="paddingm validate">*</span></label>
                                <div class="filter_select_box_add_alert" onclick="add_alert_machine()">
                                    <select class="multi_select_drp_model" style="">
                                        <option id="add_alert_machine_txt" style="">All Machines</option>
                                    </select>
                                    <div class="filter_overselect_add_alert"></div>
                                </div>
                                <div class="filter_checkbox_option_div add_alert_machine_drp" style="">
                                   <!-- machine options -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 d-flex align-content-end flex-wrap" >
                            <span class="text-muted" style="font-size:12px;">and</span>
                        </div>
                        <div class="col-lg-3">
                            <div class="box rightmar" style="margin-right: 0.5rem;position:relative;">
                                <label class="multi_select_model_drp_label" style="">Part <span class="paddingm validate">*</span></label>
                                <div class="filter_select_box_add_alert" onclick="add_alert_part()">
                                    <select class="multi_select_drp_model" style="">
                                        <option id="add_alert_part_txt" style="">All Parts</option>
                                    </select>
                                    <div class="filter_overselect_add_alert"></div>
                                </div>
                                <div class="filter_checkbox_option_div add_alert_part_drp" style="">
                                   <!-- part options -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" row d-flex flex-row mb-2">
                        <div class="" style="width:8%;padding:0;display:flex;flex-direction:row;align-items:center;"><span style="font-size:12px;">Notify as</span></div>
                        <div class="" style="width:91.4%;padding:0;"><hr></div>
                    </div>
                
                    <div class="row mb-4">
                    <span class="paddingm float-start validate" id="input_toggle_Err"></span>
                        <div class="col-lg-6" style="display:flex;justify-content:start;align-items:center;flex-direction:row;"> 
                            <span style="font-size:12px;margin-right:1rem;">Work</span>                         
                            <label class="switch">
                                <input type="checkbox" class="toggle_btn_check" id="work_check_toggle">
                                <div class="slider"></div>
                            </label>
                        </div>
                    </div>
                    <div class="toggle_work_div">                    
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="box rightmar" style="margin-right: 0.5rem;">
                                    <div class="input-box">
                                        <select class="form-select alert_font_css" name="add_alert_work_type" id="add_alert_work_type" style="font-size:15px;">
                                            <option value="" disabled selected>Choose Work Type</option>
                                            <option value="issue">Issue</option>
                                            <option value="task">Task</option>
                                        </select>
                                        <label for="inputSiteNameAdd" class="input-padding ">Work Type  <span class="paddingm validate">*</span></label>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputAlertworktypeErr"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box" style="">
                                    <div class="input-box" >
                                        <input type="text" class="form-control alert_font_css" id="add_alert_work_title"   name="add_alert_work_title">
                                        <label for="add_alert_work_title" class="input-padding">Title <span class="paddingm validate">*</span></label>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputAlertworktitleErr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3" style="margin:auto;">
                              
                                <!-- temporary hide  -->
                                <!-- <select class="vodiapicker">
                                    <option value="low" id="low_default" data-thumbnail="<?php echo base_url('assets/img/low.png'); ?>">Low</option>
                                    <option value="medium" data-thumbnail="<?php echo base_url('assets/img/medium.png'); ?>">Medium</option>
                                    <option value="high" data-thumbnail="<?php echo base_url('assets/img/high.png'); ?>">High</option>                    
                                </select>
                                <div class="lang-select">
                                    <span class="priority_label_txt" style="">Priority  <span class="paddingm validate">*</span></span>
                                    <div class="btn-select" value="">
                                        <!-- <div style="display:flex;flex-direction:row;width:20%;justify-cotnent:center;align-items:center;">
                                            <i class="fa-solid fa-angle-down"></i>
                                        </div> --
                                    </div>
                                    <div class="b">
                                        <ul id="a"></ul>
                                    </div>
                                </div> -->
                                <div class="lang-select">
                                    <span class="priority_label_txt" style="">Priority  <span class="paddingm validate">*</span></span>
                                    <div class="select3">
                                        <div class="selectBtn3 priority_get_data_add" data-type="firstOption"></div>
                                        <div class="selectDropdown3">
                                            <div class="option3" data-type="firstOption" onclick="icon_drop(this)"><i class='fas fa-angle-double-down' style='font: size 18px;; width:20px; margin-top: 5px; color: #2196F3;'></i>&nbsp;Low</div>
                                            <div class="option3" data-type="secondOption" onclick="icon_drop(this)"><i style='font: size 18px;; color:#FBB80F; margin-top: 5px;' class='fas'>&#xf52c;</i>&nbsp;Medium</div>
                                            <div class="option3" data-type="thirdOption" onclick="icon_drop(this)"><i class='fas fa-angle-double-up' style='font: size 18px;; color:#E4021B; margin-top: 5px;'></i>&nbsp;High</div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <!-- <div class="box rightmar" style="margin-right: 0.5rem;">
                                    <div class="input-box wrapper_label">
                                    
                                        <div class="content_label">
                                        
                                            <ul class="parent_div_input_check_label"><input type="text" class="input_check_label" id="input_check_label" placeholder="Label" spellcheck="false"></ul>
                                        </div>
                                        <label for="inputSiteNameAdd" class="input-padding ">Label  <span class="paddingm validate">*</span></label>
                                        <span class="paddingm float-start validate" id="inputlabelErr"></span>
                                        
                                    </div>
                                </div> -->
                                <div class="input-box indexing">
                                  <div class="filter_multiselect_lable filter_multiselect_input">
                                    <span class="multi_select_label" style="">Lable <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                            <div class="lable-div lable-div-add">
                                            </div>
                                            <input type="text" class="form-control alert_font_css input-field-lable input-field-lable-add" id="input_field_label" name="" >
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                    <span class="paddingm float-start validate" id="label_action_Err"></span> 
                                  </div>
                                </div>
                                <!-- Drop down Suggestion -->
                                <div class="filter_checkboxes_issue suggestion" id="dropdown-list-lables" style="position:relative;">
                                </div>
                            </div>
                            <div class="col-lg-3" style="margin:auto;">
                                <!-- <div class="box rightmar" style="margin-right: 0.5rem;">
                                    <div class="input-box">
                                        <select class="form-select font_weight" name="add_alert_assignee" class="add_alert_assignee" id="add_alert_assignee" style="width: 10rem;">
                                            <option value="Unassigned" selected disabled>Unassigned</option>
                                        </select>
                                        <label for="inputSiteNameAdd" class="input-padding ">Assignee  <span class="paddingm validate">*</span></label>
                                        <span class="paddingm float-start validate" id="input_alert_assign_Err"></span>
                                    </div>
                                </div> -->
                                <div class="box inbox-top" style="position:relative;">
                                    <div class="input-box indexing">
                                        <div class="filter_multiselect filter_multiselect_input">
                                            <span class="multi_select_label" style="margin-top:-0.7rem;">Assignee <span class="paddingm validate">*</span></span>
                                            <div class="filter_selectBox" onclick="add_assignee(this)">
                                                <div class="inbox-span fontStyle search_style dropdown-arrow">
                                                    <div style="width: 80% !important">
                                                    <p class="paddingm input-index" id="assignee_val" data-assignee-val="Unassigned">
                                                        Unassigned
                                                    </p>
                                                    </div>
                                                    <div class="dropdown-div" style=" width: 20% !important">
                                                    <i class="fa fa-angle-down icon-style"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter_checkboxes_issue add_record_assignee display_hide filter_assignee">
                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2" style="margin:auto;">
                                <div class="box" style="">
                                    <div class="input-box" >
                                        <input type="text" class="form-control alert_font_css" id="add_alert_deu_days"
                                            name="add_alert_deu_days" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                        <label for="add_alert_deu_days" class="input-padding">Due Days </label>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputAlertdeudaysErr"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- email row -->
                    <div class="row mb-4">
                        <div class="col-lg-6" style="display:flex;justify-content:start;align-items:center;flex-direction:row;"> 
                            <span style="font-size:12px;margin-right:1rem;">Email</span>                         
                            <label class="switch">
                                <input type="checkbox" class="toggle_btn_check" id="email_check_toggle">
                                <div class="slider email_che"></div>
                            </label>
                        </div>
                    </div>
                    <div class="email_div_visibility">
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="wrapper">
                                    <div class="content">
                                        <ul class="parent_div_input_check" style="position:relative;"><input type="email" class="input_check_to alert_font_css" id="input_check_to" placeholder="TO" spellcheck="false"><span style="position:absolute;margin-top:-1rem;font-size:12px;color:#8c8c8c;background:white;padding:1px;margin-left:1rem;">To Email</span></ul>
                                    </div>
                                    <span class="paddingm float-start validate" id="input_check_to_Err"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                               
                                <div class="wrapper_cc">
                                    <div class="content_cc">
                                        <ul class="parent_div_input_check_cc" style="position:relative;"><input type="email" class="input_check_cc alert_font_css" id="input_check_cc" placeholder="CC" spellcheck="false"><span style="position:absolute;margin-top:-1rem;font-size:12px;color:#8c8c8c;background:white;padding:1px;margin-left:1rem;">Cc Email</span></ul>
                                    </div>
                                    <span class="paddingm float-start validate" id="input_check_cc_Err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                
                                <div class="input-group">
                                    <span class="label_txt_font" style="">Subject <span class="paddingm validate">*</span></span>
                                    <span class="input-group-text bg-white text-muted" style="font-size:13px;">SmartMach Alert! </span>
                                    <input type="text" class="form-control alert_font_css" id="add_alert_mail_subject" name="add_alert_mail_subject">
                                </div>
                                <span class="paddingm float-start validate" id="input_email_sub_Err"></span>
                            </div>

                            <div class="col-lg-6">
                                <div class="box" style="">
                                    <div class="input-box" >
                                        <input type="text" class="form-control alert_font_css" id="add_alert_mail_notes"
                                            name="add_alert_mail_notes">
                                        <label for="add_alert_mail_notes" class="input-padding">Notes</label>
                                    </div>
                                    <span class="paddingm float-start validate" id="input_email_note_Err"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="border:none;padding:0;padding-bottom:1rem;">
                <input type="submit" class="btn fo bn add_alert_btn saveBtnStyle " name="add_alert" value="Save">
                <a class="btn fo bn cancelBtnStyle " data-bs-dismiss="modal" aria-label="Close">Cancel</a>
            </div>
        </div>
    </div>
</div>



<!-- edit modal -->

<div class="modal fade" id="edit_alert" tabindex="-1" aria-labelledby="edit_alert" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
        <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="addAlert" style="">ALERT / <span id="title_alert_id"></span></h5>
            </div>
            <div class="modal-body" style="padding:0;">
                <div class="scroll_div" style="height:30rem;overflow:hidden;overflow-y:scroll;padding:0.8rem;">
                    <div class="row mb-2 " style="margin-top:3rem;">
                        <div class="box" style="">
                            <div class="input-box" >
                                <input type="text" class="form-control alert_font_css" id="edit_alert_name"    name="edit_alert_name">
                                <label for="edit_alert_name" class="input-padding">Alert Name <span class="paddingm validate">*</span></label>
                            </div>
                            <span class="paddingm float-start validate" id="inputedit_alertNameErr"></span> 
                        </div>
                    </div>

                    <div class=" row d-flex flex-row mb-2">
                        <div class="" style="width:9.5%;padding:0;display:flex;flex-direction:row;align-items:center;"><span style="font-size:12px;">Alert Criteria</span></div>
                        <div class="" style="width:90.4%;padding:0;"><hr></div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <div class="box" >
                                <div class="input-box">
                                    <select class="form-select alert_font_css" name="edit_alert_metrics" id="edit_alert_metrics" style="width: 100%;">
                                        <option value="" disabled selected>Choose Metrics</option>
                                        <option value="planned_downtime">Planned Downtime</option>    
                                        <option value="unplanned_downtime">Unplanned Downtime</option>
                                        <option value="planned_machine_off">Planned Machine Off</option>
                                        <option value="unplanned_machine_off">Unplanned Machine Off</option>
                                        <option value="total_downtime">Total Downtime</option>
                                        <option value="total_unamed">Total Unamed</option>
                                        <option value="total_rejection">No Of Rejection</option>
                                        <option value="oee">OEE</option>
                                        <option value="teep">TEEP</option>
                                        <option value="ooe">OOE</option>
                                    </select>
                                    <label for="edit_alert_metrics" class="input-padding ">Metrics  <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputAlertEditmetricserr"></span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-3">
                            <div class="box rightmar" style="margin-right: 0.5rem;">
                                <div class="input-box">
                                    <select class="form-select alert_font_css" name="edit_alert_relation" id="edit_alert_relation" style="width: 10rem;">
                                        <option value="" disabled selected>Choose Relation</option>
                                        <option value="<"><</option>
                                        <option value=">">></option>
                                        <option value="<="><=</option>
                                        <option value=">=">>=</option>
                                        <option value="==">==</option>
                                    </select>
                                    <label for="edit_alert_relation" class="input-padding ">Relation  <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputeditAlertrelationerr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="box" style="padding:0;">
                                <div class="input-box" >
                                    <input type="text" class="form-control alert_font_css" id="edit_alert_val" name="edit_alert_val">
                                    <label for="" class="input-padding">Value <span class="paddingm validate">*</span></label>
                                </div>
                                <span class="paddingm float-start validate" id="inputAlert_edit_ValueErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-1" style="display:flex;flex-direction:row;padding:0;justify-content:center;align-items:end;font-size:12px">
                            <span style="font-size:12px;">Units</span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <!-- <label for="">In the Past</label> -->
                            <div class="input-group mb-3">
                                <span class="label_txt_hour" style="">In The Past <span class="paddingm validate">*</span></span>
                                <input type="text" class="form-control alert_font_css"  aria-label="Recipient's username" id="edit_alert_past_hour" name="edit_alert_past_hour" aria-describedby="basic-addon2">
                                <div class="input-group-append  bg-white text-primary">
                                    <span class="input-group-text bg-white" style="font-size:12px;height:2.4rem;" id="basic-addon2">Hours</span>
                                </div>
                            </div>
                            <span class="paddingm float-start validate" id="inputAlert_edit_pastHourErr"></span>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <span style="font-size:12px;">Apply this Alert criteria in any of selected </span>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="box rightmar" style="margin-right: 0.5rem;position:relative;">
                                <label class="multi_select_model_drp_label" style="">Machine <span class="paddingm validate">*</span></label>
                                <div class="filter_select_box_add_alert" onclick="edit_alert_machine()">
                                    <select class="multi_select_drp_model" style="">
                                        <option id="edit_alert_machine_txt" style="">All Machines</option>
                                    </select>
                                    <div class="filter_overselect_add_alert"></div>
                                </div>
                                <div class="filter_checkbox_option_div edit_alert_machine_drp" style="">
                                   <!-- machine options -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 d-flex align-content-end flex-wrap" >
                            <span class="text-muted" style="font-size:12px;">and</span>
                        </div>
                        <div class="col-lg-3">
                            <div class="box rightmar" style="margin-right: 0.5rem;position:relative;">
                                <label class="multi_select_model_drp_label" style="">Part <span class="paddingm validate">*</span></label>
                                <div class="filter_select_box_add_alert" onclick="edit_alert_part()">
                                    <select class="multi_select_drp_model" style="">
                                        <option id="edit_alert_part_txt" style="">All Parts</option>
                                    </select>
                                    <div class="filter_overselect_add_alert"></div>
                                </div>
                                <div class="filter_checkbox_option_div edit_alert_part_drp" style="">
                                   <!-- part options -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" row d-flex flex-row mb-2">
                        <div class="" style="width:8%;padding:0;display:flex;flex-direction:row;align-items:center;"><span style="font-size:12px;">Notify as</span></div>
                        <div class="" style="width:91.4%;padding:0;"><hr></div>
                    </div>
                
                    <div class="row mb-4">
                        <div class="col-lg-6" style="display:flex;justify-content:start;align-items:center;flex-direction:row;"> 
                            <span style="font-size:12px;margin-right:1rem;">Work</span>                         
                            <label class="switch">
                                <input type="checkbox" class="toggle_btn_check" id="work_edit_check_toggle">
                                <div class="slider "></div>
                            </label>
                        </div>
                    </div>

                    <div class="edit_toggle_work_div">                    
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="box rightmar" style="margin-right: 0.5rem;">
                                    <div class="input-box">
                                        <select class="form-select alert_font_css" name="edit_alert_work_type" id="edit_alert_work_type" style="font-size:15px;">
                                            <option value=" " disabled selected>Choose Work Type</option>
                                            <option value="issue">Issue</option>
                                            <option value="task">Task</option>
                                        </select>
                                        <label for="edit_alert_work_type" class="input-padding ">Work Type  <span class="paddingm validate">*</span></label>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputAlert_edit_worktypeErr"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="box" style="">
                                    <div class="input-box" >
                                        <input type="text" class="form-control alert_font_css" id="edit_alert_work_title"   name="edit_alert_work_title">
                                        <label for="edit_alert_work_title" class="input-padding">Title <span class="paddingm validate">*</span></label>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputAlert_edit_worktitleErr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-3" style="margin:auto;">
                              
                                <!-- <select class="vodiapicker_edit">
                                    <option value="low" id="low_default" data-thumbnail-edit="<?php echo base_url('assets/img/low.png'); ?>">Low</option>
                                    <option value="medium" ata-thumbnail-edit="<?php echo base_url('assets/img/medium.png'); ?>">Medium</option>
                                    <option value="high" ata-thumbnail-edit="<?php echo base_url('assets/img/high.png'); ?>">High</option>                    
                                </select>
                                
                                <div class="lang-select_edit">
                                    <span class="priority_label_txt_edit" style="">Priority  <span class="paddingm validate">*</span></span>
                                    <div class="btn-select_edit" value="">
                                        <!-- <div style="display:flex;flex-direction:row;width:20%;justify-cotnent:center;align-items:center;">
                                            <i class="fa-solid fa-angle-down"></i>
                                        </div> --
                                    </div>
                                    <div class="b_edit">
                                        <ul id="a_edit"></ul>
                                    </div>
                                </div> -->

                                <div class="lang-select">
                                    <span class="priority_label_txt" style="">Priority  <span class="paddingm validate">*</span></span>
                                    <div class="select_edit_priority">
                                        <div class="select_edit_priority_btn priority_get_data_add" data-type="firstOption"> <i class='fas fa-angle-double-down' style='font: size 18px; width:18px; color: #2196F3; margin-top: 5px;'></i>&nbsp;Low</div>
                                        <div class="select_edit_drp_priority">
                                            <div class="select_edit_priority_option" data-type="firstOption" onclick="icon_drop_edit_priority(this)"><i class='fas fa-angle-double-down' style='font: size 18px;; width:20px; margin-top: 5px; color: #2196F3;'></i>&nbsp;Low</div>
                                            <div class="select_edit_priority_option" data-type="secondOption" onclick="icon_drop_edit_priority(this)"><i style='font: size 18px;; color:#FBB80F; margin-top: 5px;' class='fas'>&#xf52c;</i>&nbsp;Medium</div>
                                            <div class="select_edit_priority_option" data-type="thirdOption" onclick="icon_drop_edit_priority(this)"><i class='fas fa-angle-double-up' style='font: size 18px;; color:#E4021B; margin-top: 5px;'></i>&nbsp;High</div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                            <div class="col-lg-4">
                                <!-- <div class="edit_wrapper_label">
                                    <div class="edit_content_label">
                                        <ul class="edit_parent_div_input_check_label"><input type="text" class="edit_input_check_label" placeholder="Label" spellcheck="false"></ul>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputlabel_edit_Err"></span>
                                </div> -->
                                <div class="input-box indexing">
                                  <div class="filter_multiselect_lable filter_multiselect_input">
                                    <span class="multi_select_label" style="">Lable <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                            <div class="lable-div lable-div-edit">
                                            </div>
                                            <input type="text" class="form-control alert_font_css input-field-lable input-field-lable-edit" id="input-field-lable-edit" name="" >
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                    <span class="paddingm float-start validate" id="label_edit_Err"></span> 

                                  </div>
                                </div>
                                <!-- Drop down Suggestion -->
                                <div class="filter_checkboxes_issue suggestion" id="dropdown-list-lables-edit" style="position:relative;">
                                </div>
                            </div>
                            <div class="col-lg-3" style="margin:auto;">
                                <!-- <div class="box rightmar" style="margin-right: 0.5rem;">
                                    <div class="input-box">
                                        <select class="form-select font_weight" name="edit_alert_assignee" class="edit_alert_assignee" id="edit_alert_assignee" style="width: 10rem;">
                                            <option value="Unassigned" selected disabled>Unassigned</option>
                                        </select>
                                        <label for="edit_alert_assignee" class="input-padding ">Assignee  <span class="paddingm validate">*</span></label>
                                    </div>
                                </div> -->
                                <div class="box inbox-top" style="position:relative;">
                                    <div class="input-box indexing">
                                        <div class="filter_multiselect filter_multiselect_input">
                                            <span class="multi_select_label" style="margin-top:-0.7rem;">Assignee <span class="paddingm validate">*</span></span>
                                            <div class="filter_selectBox" onclick="add_assignee(this)">
                                                <div class="inbox-span fontStyle search_style dropdown-arrow">
                                                    <div style="width: 80% !important">
                                                    <p class="paddingm input-index" id="edit_assignee_val" data-assignee-val="Unassigned">
                                                        Unassigned
                                                    </p>
                                                    </div>
                                                    <div class="dropdown-div" style=" width: 20% !important">
                                                    <i class="fa fa-angle-down icon-style"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter_checkboxes_issue edit_record_assignee display_hide filter_assignee">
                    
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2" style="margin:auto;">
                                <div class="box" style="">
                                    <div class="input-box" >
                                        <input type="text" class="form-control alert_font_css" id="edit_alert_deu_days"
                                            name="edit_alert_deu_days">
                                        <label for="edit_alert_deu_days" class="input-padding">Due Days </label>
                                    </div>
                                    <span class="paddingm float-start validate" id="inputAlert_edit_deudaysErr"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- email row -->
                    <div class="row mb-4">
                        <div class="col-lg-6" style="display:flex;justify-content:start;align-items:center;flex-direction:row;"> 
                            <span style="font-size:12px;margin-right:1rem;">Email</span>                         
                            <label class="switch">
                                <input type="checkbox" class="toggle_btn_check" id="edit_email_check_toggle">
                                <div class="slider email_checkeck_edit"></div>
                            </label>
                        </div>
                    </div>

                    <div class="edit_email_div_visibility">
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <div class="wrapper_edit">
                                    <div class="content_edit">
                                        <ul class="edit_parent_div_input_check"><input type="text" class="input_check_to_edit alert_font_css" placeholder="TO" spellcheck="false"></ul>
                                    </div>
                                    <span class="paddingm float-start validate" id="input_check_to_edit_Err"></span>
                                </div>
                            </div>

                            <div class="col-lg-6">
                               
                                <div class="wrapper_cc_edit">
                                    <div class="content_cc_edit">
                                        <ul class="edit_parent_div_input_check_cc"><input type="text" class="input_check_cc_edit alert_font_css" placeholder="CC" spellcheck="false"></ul>
                                    </div>
                                    <span class="paddingm float-start validate" id="input_check_cc_edit_Err"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                
                                <div class="input-group">
                                    <span class="label_txt_font" style="">Subject <span class="paddingm validate">*</span></span>
                                    <span class="input-group-text bg-white text-muted" style="font-size:13px;">SmartMach Alert! </span>
                                    <input type="text" class="form-control alert_font_css" id="edit_alert_mail_subject" name="edit_alert_mail_subject">
                                </div>
                                <span class="paddingm float-start validate" id="input_email_edit_sub_Err"></span>
                            </div>

                            <div class="col-lg-6">
                                <div class="box" style="">
                                    <div class="input-box" >
                                        <input type="text" class="form-control alert_font_css" id="edit_alert_mail_notes"
                                            name="edit_alert_mail_notes">
                                        <label for="edit_alert_mail_notes" class="input-padding">Notes</label>
                                    </div>
                                    <span class="paddingm float-start validate" id="input_email_edit_note_Err"></span>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="modal-footer" style="border:none;padding:0;padding-bottom:1rem;">
                <input type="submit" class="btn fo bn edit_alert_btn_submit saveBtnStyle " name="edit_alert" value="Save">
                <a class="btn fo bn cancelBtnStyle " data-bs-dismiss="modal" aria-label="Close">Cancel</a>
            </div>
        </div>
    </div>
</div>
<!-- edit modal end -->


<!-- delete modal start -->

<div class="modal fade" id="alert_delete_confirmation_box" tabindex="-1" aria-labelledby="alert_delete_confirmation_box" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
        <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="alert_delete_confirmation_box" style="">CONFIRMATION MESSAGE</h5>
            </div>
            <div class="modal-body alert_font_css" style="max-width:max-content;">
                <label style="" class="alert_font_css" >Are you sure you want to delete this Alert record?</label>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn  alert_delete_confirmation_submit saveBtnStyle" name="alert_delete_confirmation_submit" value="SAVE" >Confirm</a>
                <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
            </div>
        </div>
    </div>
</div>

<!-- delete modal end -->

<script src="<?php echo base_url(); ?>/assets/js/add_input_tags_js.js?version=<?php echo rand(); ?>"></script>
<script src="<?php echo base_url(); ?>/assets/js/alert_settings.js?version=<?php echo rand(); ?>"></script>
<script src="<?php echo base_url(); ?>/assets/js/alert_setting_validation.js?version=<?php echo rand(); ?>"></script>

<script type="text/javascript">



function add_assignee(t) {
    console.log("ok");
      $(".filter_checkboxes_issue").addClass("display_hide");
      console.log($('.filter_assignee').css("display"));
      if ($('.filter_assignee').css("display") === "none") {
        console.log("select");
          $(".filter_assignee").removeClass("display_hide");
          $(".filter_assignee").addClass("display_visible");
      } else {
        console.log("non select");
          $(".filter_assignee").removeClass("display_visible");
          $(".filter_assignee").addClass("display_hide");
      }
    }

    // add modal click function 
    function show_modal_add_alert(){
       
        // $('.selectDropdown3').toggleClass('new_4');
        var data_txt = "insert";
        reset_all_input(data_txt);
        $('#addAlert_modal').modal('show');
    }


    $(".default_option").click(function(){
        $(this).parent().toggleClass("active");
    });

	$(".select_ul li").click(function(){
	    var currentele = $(this).html();
		$(".default_option li").html(currentele);
		$(this).parents(".select_wrap").removeClass("active");
    });
   
    // add alert modal toggle default visibility styles using js
    $('.toggle_work_div').css('display','none');
    $('.email_div_visibility').css('display','none');
    // toggle onclick div visbility function 
    document.addEventListener('DOMContentLoaded', function () {
        // work toggle button
        var checkbox = document.querySelector('#work_check_toggle');
        checkbox.addEventListener('change', function () {
            if (checkbox.checked) {
            // do this
            // console.log('Checked');
                $('.toggle_work_div').css('display','block');

            } else {
            // do that
            // console.log('Not checked');
            $('.toggle_work_div').css('display','none');
            }
        });

        // email toggle button
        var email_toggle = document.querySelector('#email_check_toggle');
        email_toggle.addEventListener('change',function(){
            if (email_toggle.checked) {
                $('.email_div_visibility').css('display','block');
              
                // console.log("email  checked");

            }else{
                $('.email_div_visibility').css('display','none');
                // console.log("unchecked email");
            }
        });


        // edit modal toggle button work
        var work_edit = document.querySelector('#work_edit_check_toggle');
        work_edit.addEventListener('change',function(){
            if (work_edit.checked) {
                $('.edit_toggle_work_div').css('display','block');
            }else{
                $('.edit_toggle_work_div').css('display','none');
            }
        });

        // edit modal toggle button edit
        var email_edit = document.querySelector('#edit_email_check_toggle');
        email_edit.addEventListener('change',function(){
            if (email_edit.checked) {
                $('.edit_email_div_visibility').css('display','block');
            }else{
                $('.edit_email_div_visibility').css('display','none');
            }
        });

    });

    // $(document).on('click','#work_click',function(event){
    //     // var getindex = $('.switch');
    //     // var final_index = getindex.index($(this));
    //     // alert(final_index);
    //     var checked_or_not = $('#work_toggle_click').is(':checked');
    //     if (checked_or_not == true) {
    //         alert('already checked');
    //     }else{
    //         alert('off');
    //     }
    //     // alert(checked_or_not);
    // });

    // add alert machine dropdown
    var add_alert_machine_txt = false;
    function add_alert_machine(){
        // alert('ko');
        if (!add_alert_machine_txt) {
            $('.add_alert_machine_drp').css('display','block');
            add_alert_machine_txt = true;
        }else{
            $('.add_alert_machine_drp').css('display','none');
            add_alert_machine_txt = false;
        }
    }

    // add alert parts dropdown
    var add_alert_part_drp = false;
    function add_alert_part(){
        if (!add_alert_part_drp) {
            $('.add_alert_part_drp').css('display','block');
            add_alert_part_drp = true;
            
        }else{
            add_alert_part_drp = false;
            $('.add_alert_part_drp').css('display','none');
        }
    }

    // this function fill all dropdown values using ajax function
    fill_machine_drp();
    function fill_machine_drp(){
        // console.log("function ok");
        $('.add_alert_machine_drp').empty();
        $('#add_alert_assignee').empty();
        $('.alert_file_part_div').empty();
        $('.alert_filter_machine_div').empty();
        $('.filter_alert_assignee_div').empty();
        $('.edit_alert_machine_drp').empty();
        $('#edit_alert_assignee').empty();
        $('.edit_alert_part_drp').empty();

        $.ajax({
            url:"<?php echo base_url('Alert_Settings_Controller/machine_drp'); ?>",
            type:"POST",
            dataType:"json",
            success:function(res){
                console.log(res);

                var element = $();

                var ele_part = $();

                var filter_drp_part = $();
                var filter_drp_machine = $();
                var filter_drp_assignee = $();
                var ele_assignee = $();

                var edit_machine_drp_ele = $();
                var edit_part_drp_ele = $();
                var edit_alert_assignee = $();

                $('.add_alert_machine_drp').append('<div class="add_alert_box_flex add_alert_machine_click" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                        +'<input type="checkbox" id="one" class="add_alert_machine1" value="all"/>'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                        +'<p class="font_multi_drp" style="margin-left:27px">All Machines</p>'
                    +'</div>'
                    +'</div>');


                $('.add_alert_part_drp').append('<div class="add_alert_box_flex add_alert_part_click" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                        +'<input type="checkbox" id="one" class="add_alert_part1" value="all" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                        +'<p class="font_multi_drp" style="margin-left:27px">All Parts</p>'
                    +'</div>'
                +'</div>');


                $('#add_alert_assignee').append('<option value="unassigned" selected>Unassigned</option>');

                $('#edit_alert_assignee').append('<option value="unassigned" selected>Unassigned</option>');

                $('.alert_file_part_div').append('<div class="add_alert_box_flex filter_drp_part" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="filter_Drp_part_checkbox" value="all" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:27px">All Parts</p>'
                    +'</div>'
                    +'</div>');

                $('.alert_filter_machine_div').append('<div class="add_alert_box_flex filter_drp_machine_click" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="filter_drp_machine_checkbox" value="all" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:27px">All Machines</p>'
                    +'</div>'
                    +'</div>');


                $('.edit_alert_machine_drp').append('<div class="add_alert_box_flex edit_drp_machine_click" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="edit_drp_machine_checkbox" value="all" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:27px">All Machines</p>'
                    +'</div>'
                    +'</div>');
                
                $('.filter_alert_assignee_div').append('<div class="add_alert_box_flex filter_drp_last_updated_click" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="filter_drp_last_updated_checkbox" value="all" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:27px">All Users</p>'
                    +'</div>'
                    +'</div>');


                $('.edit_alert_part_drp').append('<div class="add_alert_box_flex edit_part_drp_click" style="position: relative;padding: 12px 0;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="editpart_drp_checkbox" value="all" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:27px">All Parts</p>'
                    +'</div>'
                +'</div>');

                res['machine_arr'].forEach(function(item){
                    element = element.add('<div class="add_alert_box_flex add_alert_machine_click" style="position: relative;margin:0;top:50%;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;top:30%;">'
                        +'<input type="checkbox" id="one" class="add_alert_machine1" value="'+item.machine_id+'" />'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                        +'<p class="font_multi_drp" style="margin-left:27px;margin-bottom:0px;">'+item.machine_name+'</p>'
                    +'</div>'
                    +'</div>');

                    filter_drp_machine = filter_drp_machine.add('<div class="add_alert_box_flex filter_drp_machine_click" style="position: relative;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="filter_drp_machine_checkbox" value="'+item.machine_id+'" style="margin-right:100px;margin-top:12px"/>'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">'+item.machine_name+'</p>'
                    +'</div>'
                    +'</div>');

                    edit_machine_drp_ele = edit_machine_drp_ele.add('<div class="add_alert_box_flex edit_drp_machine_click" style="position: relative;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="edit_drp_machine_checkbox" value="'+item.machine_id+'" style="margin-right:100px;margin-top:12px"/>'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp edit_txt_machine_drp" style="margin-left:25px;margin-top:11px;">'+item.machine_name+'</p>'
                    +'</div>'
                    +'</div>');

                    $('.edit_alert_machine_drp').append(edit_machine_drp_ele);
                    $('.alert_filter_machine_div').append(filter_drp_machine);
                    $('.add_alert_machine_drp').append(element);
                    
                });


                res['part_arr'].forEach(function(item){
                    ele_part = ele_part.add('<div class="add_alert_box_flex  add_alert_part_click" style="position: relative;">'
                        +'<div class="add_alert_checkbox_div " style="z-index:1;position: absolute;">'
                            +'<input type="checkbox" id="one" class="add_alert_part1" value="'+item.part_id+'" style="margin-right:100px;margin-top:12px"/>'
                        +'</div>'
                        +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                            +'<p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">'+item.part_name+'</p>'
                        +'</div>'
                    +'</div>');

                    filter_drp_part = filter_drp_part.add('<div class="add_alert_box_flex filter_drp_part" style="position: relative;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="filter_Drp_part_checkbox" value="'+item.part_id+'" style="margin-right:100px;margin-top:12px"/>'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">'+item.part_name+'</p>'
                    +'</div>'
                    +'</div>');


                    edit_part_drp_ele = edit_part_drp_ele.add('<div class="add_alert_box_flex edit_part_drp_click" style="position: relative;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="editpart_drp_checkbox" value="'+item.part_id+'" style="margin-right:100px;margin-top:12px"/>'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">'+item.part_name+'</p>'
                    +'</div>'
                    +'</div>');

                    $('.edit_alert_part_drp').append(edit_part_drp_ele);
                    $('.alert_file_part_div').append(filter_drp_part);
                    $('.add_alert_part_drp').append(ele_part);
                });


                // assigneer array 
                $('.add_record_assignee').empty();
                $('.edit_record_assignee').empty();

                res['assignee_arr'].forEach(function(item) {
                   
                    var elements = $();
                    var edit_elements = $();
                    elements = elements.add('<div class="inbox inbox_assignee" data-assignee-val="'+item.user_id+'" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                            +'<div class="circle-div" style="background:#7f7f7f;color:white;">'
                                +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                            +'</div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="assignee_add radio-visible" name="assignee_val" value="'+item['user_id']+'">'
                    +'</div>');


                    edit_elements = edit_elements.add('<div class="inbox inbox_edit_assignee" data-assignee-val="'+item.user_id+'" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                            +'<div class="circle-div" style="background:#7f7f7f;color:white;">'
                                +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                            +'</div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="assignee_add radio-visible" name="assignee_edit_val" value="'+item['user_id']+'">'
                    +'</div>');

                    $('.add_record_assignee').append(elements);
                    $('.edit_record_assignee').append(edit_elements);


                    // console.log(item);
                    ele_assignee = ele_assignee.add('<option value="'+item.user_id+'">'+item.first_name+' '+item.last_name+'</option>');
                    // console.log(ele_assignee);

                   

                    edit_alert_assignee = edit_alert_assignee.add('<option value="'+item.user_id+'">'+item.first_name+' '+item.last_name+'</option>');
                    $('#edit_alert_assignee').append(edit_alert_assignee);

                    
                    $('#add_alert_assignee').append(ele_assignee);
                   
                });

                // last updated by filter array
                res['last_updated_by_arr'].forEach(function(item) {
                    filter_drp_assignee = filter_drp_assignee.add('<div class="add_alert_box_flex filter_drp_last_updated_click" style="position: relative;">'
                    +'<div class="add_alert_checkbox_div" style="z-index:1;position: absolute;">'
                    +'<input type="checkbox" id="one" class="filter_drp_last_updated_checkbox" value="'+item.user_id+'" style="margin-right:100px;margin-top:12px"/>'
                    +'</div>'
                    +'<div class="add_alert_text_div" style="background-color:rgb(0, 255, 255,0);z-index:2;position: absolute;">'
                    +'<p class="font_multi_drp" style="margin-left:25px;margin-top:11px;">'+item.first_name+' '+item.last_name+'</p>'
                    +'</div>'
                    +'</div>');

                    $('.filter_alert_assignee_div').append(filter_drp_assignee);
                });

                $( ".option1" ).each(function( index ) {
                        var str = $( this ).text();
                // console.log($( this ).text() );
                    var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
                    var acronym = matches.join(''); // JSON
                    $('.option1').eq(index).prepend("<div class='circle-div1' style='background:#7f7f7f;color:white;  width:24px;'><p class='paddingm'>"+acronym+"</p></div>");
                    
                });

                reset_filter_last_updated_by();
                reset_filter_machine_alert();
                reset_add_alert_machine();
                reset_add_alert_part();
                reset_filter_part();
                reset_work_order_drp();
                var start_index = 0;
                var end_index = 50;
                $('.pagination_onchange').val('1');
                retrive_alert_data(start_index,end_index);
            },
            error:function(er){
                console.log("Machine Dropdown error");
            }
        });
    }


    // multi select dropdown checkbox reset
    function reset_add_alert_machine(){
        var machine_gparr = $('.add_alert_machine1');
        jQuery('.add_alert_machine1').each(function(index){
            machine_gparr[index].checked=true;
        });
        $('#add_alert_machine_txt').text('All Machines');
    }


    // multi select dropdown checkbox part
    function reset_add_alert_part(){
        var part_arr = $('.add_alert_part1');
        jQuery('.add_alert_part1').each(function(index){
            part_arr[index].checked=true;
        });
        $('#add_alert_part_txt').text('All Parts');
    }


    // onclick flex using multi select dropdown
    $(document).on('click','.add_alert_machine_click',function(event){
        event.preventDefault();
        var count_machine_gp1  = $('.add_alert_machine_click');
        var index_machine_gp1 = count_machine_gp1.index($(this));
        var check_if1 = $('.add_alert_machine1');
        if (index_machine_gp1 === 0) {
            if (check_if1[0].checked==false) {
                reset_add_alert_machine();

            }else{
                $('.add_alert_machine1').removeAttr('checked');
            }
        }else{
            if (check_if1[index_machine_gp1].checked==false) {
                check_if1[index_machine_gp1].checked=true;
                $('.add_alert_machine1:eq('+index_machine_gp1+')').attr('checked','checked');
            }else{
                $('.add_alert_machine1:eq('+index_machine_gp1+')').removeAttr('checked');
                check_if1[0].checked=false;
            }
        }

        var machine_gp_select_count1 = 0;
        jQuery('.add_alert_machine1').each(function(index){
        if (check_if1[index].checked===true) {
            machine_gp_select_count1 = parseInt(machine_gp_select_count1)+1;
        }
        });
        var machine_gp_len1 = $('.add_alert_machine1').length;
        machine_gp_len1 = parseInt(machine_gp_len1)-1;
        if (parseInt(machine_gp_select_count1)>=parseInt(machine_gp_len1)) {
            if(check_if1[0].checked===true){
                check_if1[0].checked=true;
                $('#add_alert_machine_txt').text(parseInt(machine_gp_select_count1)-1+' Selected');
            }else{
                // check_if[0].checked=true;
                reset_add_alert_machine();
                $('#add_alert_machine_txt').text('All');
            }
        }else if(((parseInt(machine_gp_select_count1)<parseInt(machine_gp_len1))) && (parseInt(machine_gp_select_count1)>0)){
            $('#add_alert_machine_txt').text(parseInt(machine_gp_select_count1)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#add_alert_machine_txt').text('No Machines');
        }
    });
    
    
    // onclick flex using multi select dropdown part
    $(document).on('click','.add_alert_part_click',function(event){
        event.preventDefault();
        var count_machine_gp1  = $('.add_alert_part_click');
        var index_machine_gp1 = count_machine_gp1.index($(this));
        var check_if1 = $('.add_alert_part1');
        if (index_machine_gp1 === 0) {
            if (check_if1[0].checked==false) {
                reset_add_alert_part();

            }else{
                $('.add_alert_part1').removeAttr('checked');
            }
        }else{
            if (check_if1[index_machine_gp1].checked==false) {
                check_if1[index_machine_gp1].checked=true;
                $('.add_alert_part1:eq('+index_machine_gp1+')').attr('checked','checked');
            }else{
                $('.add_alert_part1:eq('+index_machine_gp1+')').removeAttr('checked');
                check_if1[0].checked=false;
            }
        }

        var machine_gp_select_count1 = 0;
        jQuery('.add_alert_part1').each(function(index){
        if (check_if1[index].checked===true) {
            machine_gp_select_count1 = parseInt(machine_gp_select_count1)+1;
        }
        });
        var machine_gp_len1 = $('.add_alert_part1').length;
        machine_gp_len1 = parseInt(machine_gp_len1)-1;
        if (parseInt(machine_gp_select_count1)>=parseInt(machine_gp_len1)) {
            if(check_if1[0].checked===true){
                check_if1[0].checked=true;
                $('#add_alert_part_txt').text(parseInt(machine_gp_select_count1)-1+' Selected');
            }else{
                // check_if[0].checked=true;
                reset_add_alert_machine();
                $('#add_alert_part_txt').text('All');
            }
        }else if(((parseInt(machine_gp_select_count1)<parseInt(machine_gp_len1))) && (parseInt(machine_gp_select_count1)>0)){
            $('#add_alert_part_txt').text(parseInt(machine_gp_select_count1)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#add_alert_part_txt').text('No Parts');
        }
    });


        // on mouse up function this function for dropdown outside click close dropdown function
    $(document).mouseup(function(event){

        // machine multi select dropdown add alert
        var machine_reason = $('.add_alert_machine_drp');
        if (!machine_reason.is(event.target) && machine_reason.has(event.target).length==0) {
            machine_reason.hide();
        }


        // part multi select dropdown add alert
        var part_add_alert = $('.add_alert_part_drp');
        if (!part_add_alert.is(event.target) && part_add_alert.has(event.target).length==0) {
            part_add_alert.hide();
        }


        // table filter dropdown closing
        var machine_filter = $('.alert_filter_machine_div');
        if (!machine_filter.is(event.target) && machine_filter.has(event.target).length==0) {
            machine_filter.hide();
        }


        // part filter
        var part_filter = $('.alert_file_part_div');
        if (!part_filter.is(event.target) && part_filter.has(event.target).length==0) {
            part_filter.hide();
        }

        // work order type
        var work_order_type = $('.alert_filter_work_order_dive');
        if (!work_order_type.is(event.target) && work_order_type.has(event.target).length==0) {
            work_order_type.hide();
        }

        // last_updated_by dropdown
        var last_updated_by = $('.filter_alert_assignee_div');
        if (!last_updated_by.is(event.target) && last_updated_by.has(event.target).length==0) {
            last_updated_by.hide();
        }

        // assigne
        
        var assignee_check = $('.filter_assignee');
        if (!assignee_check.is(event.target) && assignee_check.has(event.target).length==0) {
            $(".filter_assignee").removeClass("display_visible");
            $(".filter_assignee").addClass("display_hide");
        }


    });

    $(document).ready(function(){

        reset_work_order_drp();

        var langArray = [];
        var langArray1 = [];
        $('.vodiapicker option').each(function(){
            var img = $(this).attr("data-thumbnail");
            var text = this.innerText;
            var value = $(this).val();
            var item = '<li style="width:100%;"><img src="'+ img +'" alt="" value="'+value+'"/><span class="priority_txt">'+ text +'</span></li>';
            langArray.push(item);
            //   alert('kkk');
        })

        // edit drp priority
        $('.vodiapicker_edit option').each(function(){
            var img1 = $(this).attr("ata-thumbnail-edit");
            var text1 = this.innerText;
            var value1 = $(this).val();
            var item2 = '<li style="width:100%;"><img src="'+ img1 +'" alt="" value="'+value1+'"/><span class="priority_txt_edit">'+ text1 +'</span></li>';
            langArray1.push(item2);
        })

        $('#a').html(langArray);
        $('#a_edit').html(langArray1);

        //Set the button value to the first el of the array
        var img_drp = $('#low_default').attr("data-thumbnail");
        $('.btn-select').html('<li style="width:80%;"><img src="'+img_drp+'" alt="" value="low"> <span style="font-size:14px;" class="priority_txt">LOW</span></li><div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:20%;"><i class="fa-solid fa-angle-down"></li></div>');
        // console.log(langArray[0]);
        $('.btn-select').attr('value', 'en');

        //change button stuff on click
        $('#a li').click(function(){
            var img = $(this).find('img').attr("src");
            var value = $(this).find('img').attr('value');
            var text = this.innerText;
            var item = '<li style="width:80%;"><img src="'+ img +'" alt="" value="'+value+'"/><span class="priority_txt">'+ text +'</span></li><div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:20%;"><i class="fa-solid fa-angle-down"></i></div>';
            $('.btn-select').html(item);
            $('.btn-select').attr('value', value);
            $(".b").toggle();
            //   alert('ji');
            //console.log(value);
        });

        $('#a_edit li').click(function(){
            var img1= $(this).find('img').attr("src");
            var value1 = $(this).find('img').attr('value');
            var text1 = this.innerText;
            var item1 = '<li style="width:80%;"><img src="'+ img1 +'" alt="" value="'+value1+'"/><span class="priority_txt_edit">'+ text1 +'</span></li><div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:20%;"><i class="fa-solid fa-angle-down"></i></div>';
            $('.btn-select_edit').html(item1);
            $('.btn-select_edit').attr('value', value1);
            $(".b_edit").toggle();
            //   alert('ji');
            //console.log(value);
        });


        $(".btn-select").click(function(){
                $(".b").toggle();
        });

        $(".btn-select_edit").click(function(){
                $(".b_edit").toggle();
        });

        //check local storage for the lang
        var sessionLang = localStorage.getItem('lang');
        if (sessionLang){
            //find an item with value of sessionLang
            var langIndex = langArray.indexOf(sessionLang);
            // console.log(langArray[langIndex]);
            $('.btn-select').html(langArray[langIndex]);
            $('.btn-select').attr('value', sessionLang);
        } else {
            var langIndex = langArray.indexOf('ch');
            // console.log("dropdown index");
            // console.log(langIndex);
            // console.log(langArray[langIndex]);
            $('.btn-select').html(langArray[langIndex]);
        }


        var sessionLang_edit = localStorage.getItem('lang_edit');
        if (sessionLang_edit) {
            var langIndex_edit = langArray1.indexOf(sessionLang_edit);
            $('.btn-select_edit').html(langArray1[langIndex_edit]);
            $('.btn-select_edit').attr('value', sessionLang_edit);
        }else{
            var langIndex_edit = langArray1.indexOf('ch');
            $('.btn-select_edit').html(langArray1[langIndex_edit]);
        }

    });


    // alert settings insertion function
    $(document).on('click','.add_alert_btn',function(event){
        event.preventDefault();
       
        $("#overlay").fadeIn(300);
        var alert_name = $('#add_alert_name').val();
        var metrics = $('#add_alert_metrics').val();
        var relation = $('#add_alert_relation').val();
        var value_val = $('#add_alert_val').val();
        var past_hour = $('#add_alert_past_hour').val();
            
        const machine_arr = [];
        $('.add_alert_machine1').each(function(){
            if ($(this).is(':checked')) {
                machine_arr.push($(this).val());
            }
        });

        const part_arr = [];
        $('.add_alert_part1').each(function(){
            if ($(this).is(':checked')) {
                part_arr.push($(this).val());
            }
        });
        var lable_list = [];
        const to_email_arr = [];
        const cc_email_arr = [];

        var checkbox_work = document.querySelector('#work_check_toggle');
        var checkbox_email = document.querySelector('#email_check_toggle');
        var a = inputAlertName(alert_name);
        var b = inputAlertRateHour(past_hour);
        // console.log(value_val);
        var c = inputAlertValue(value_val);
        var d = inputAlertmetrics(metrics);
        var e = inputAlertrelation(relation);
        var x = input_work_check(checkbox_work);
        var y = input_work_check(checkbox_email);


        if (a!="" || b!="" || c!="" || d!="" || e!="" || x!="" || y!="") {
            $('#inputAlertNameErr').html(a);
            $('#inputAlertmetricsErr').html(d);
            $('#inputAlertrelationsErr').html(e);
            $('#inputAlertValueErr').html(c);
            $('#inputAlertpastHourErr').html(b);
            $('#input_toggle_Err').html(x); 
            $('#input_toggle_Err').html(y); 
        }else{
            var notify_as = " ";
            if ((checkbox_work.checked===true) && (checkbox_email.checked===true)) {
                
                notify_as = "all";
            
                // $('.label_input_tags_txt').each(function(){
                //     if ($(this).text()) {
                //         label_txt_arr.push($(this).text());
                //     }
                // });
                var lable = $('.lable-div-add').children('.lable-bg').children('.lable_items');
                $.each(lable, function(key,valueObj){
                    lable_list.push(valueObj.getAttribute('lable_list_id'));
                });
            
                $('.to_email_txt_tags_arr').each(function(){
                    if ($(this).text()) {
                        to_email_arr.push($(this).text());
                    }
                });

                $('.cc_email_txt_arr').each(function(){
                    if ($(this).text()) {
                        cc_email_arr.push($(this).text());
                    }
                });

                var work_type = $('#add_alert_work_type').val();
                var work_title = $('#add_alert_work_title').val();
                // var assignee = $('#add_alert_assignee').val();
                var assignee = $('#assignee_val').attr('data-assignee-val');
                var deu_days = $('#add_alert_deu_days').val();
                var add_alert_subject = $('#add_alert_mail_subject').val();
                var add_alert_notes = $('#add_alert_mail_notes').val();
                // var priority = $('.btn-select .priority_txt').text().toLowerCase();

                var priority = $('.selectBtn3').attr('data-val');
                // var n = m.split(/\s(.+)/)[1]
                // var priority = n.split(/\s(.+)/)[1];
                // console.log(m);
                // console.log("priority text");

                
            }
            else if(checkbox_work.checked===true){
                notify_as = "work";
            
                // const label_txt_arr = [];
                // $('.label_input_tags_txt').each(function(){
                //     if ($(this).text()) {
                //         label_txt_arr.push($(this).text());
                //     }
                // });
                var lable = $('.lable-div-add').children('.lable-bg').children('.lable_items');
                $.each(lable, function(key,valueObj){
                    lable_list.push(valueObj.getAttribute('lable_list_id'));
                });
                // var priority = $('.btn-select .priority_txt').text().toLowerCase();
                var priority = $('.selectBtn3').attr('data-val');
                // var n = m.split(/\s(.+)/)[1];
                // var priority = n.split(/\s(.+)/)[1];
                // console.log(m);
                // console.log("priority");


                var work_type = $('#add_alert_work_type').val();
                var work_title = $('#add_alert_work_title').val();
                var assignee = $('#assignee_val').attr('data-assignee-val');
                // console.log(assignee);
                var deu_days = $('#add_alert_deu_days').val();
                to_email_arr.push("empty");
                cc_email_arr.push("empty");
                var add_alert_subject = null;
                var add_alert_notes = null;


            }
            else if(checkbox_email.checked===true){
                notify_as = "email";
                

                // const to_email_arr = [];
                $('.to_email_txt_tags_arr').each(function(){
                    if ($(this).text()) {
                        to_email_arr.push($(this).text());
                    }
                });

                // const cc_email_arr = [];
                $('.cc_email_txt_arr').each(function(){
                    if ($(this).text()) {
                        cc_email_arr.push($(this).text());
                    }
                });

                var add_alert_subject = $('#add_alert_mail_subject').val();
                var add_alert_notes = $('#add_alert_mail_notes').val();
                lable_list.push("empty");
                var work_type = null;
                var work_title = null;
                var assignee = null;
                var priority = null;
                var deu_days = null;

            }else{
                notify_as = "no";
            
                var work_type = null;
                var work_title = null;
                var assignee = null;
                var priority = null;
                var deu_days = null;
                lable_list.push("empty");
                to_email_arr.push("empty");
                cc_email_arr.push("empty");
                var add_alert_subject = null;
                var add_alert_notes = null;

            }
            console.log(notify_as);
            console.log(priority);
            console.log("assignee");
            console.log(assignee);

            // work
            var f = inputAlertworktype(work_type);
            var g = inputAlertworktitle(work_title);
            var h = inputAlertdue_days(deu_days);
            console.log("add alert submit");
            console.log(deu_days);
            var add_label = $('.lable-div-add .lable-bg').length;
            // var la = inputlabel(add_label);
            console.log(add_label+"...label length...");

            // email
            var i = inputAlert_mail_sub(add_alert_subject);
            var j = inputAlert_email_note(add_alert_notes);
            // var work_label_tmp = $('.parent_div_input_check_label li').length;
            var to_tmp_email = $('.parent_div_input_check li').length;
            var cc_tmp_email = $('.parent_div_input_check_cc li').length;
            // var ml = inputAlertlabel(work_label_tmp);
            var nt = inputAlertto(to_tmp_email);
            var pc = inputAlertcc(cc_tmp_email);
            var note_error = 0; 
            if (notify_as==="all") { 
                if (f!="" || g!="" || h!="" || i!="" || j!="" || nt!="" || pc!="") {
                    $('#inputAlertworktypeErr').html(f);
                    $('#inputAlertworktitleErr').html(g);
                    $('#inputAlertdeudaysErr').html(h);
                    $('#input_email_sub_Err').html(i);
                    $('#input_email_note_Err').html(j);
                    // $('#label_action_Err').html(ml);
                    $('#input_check_cc_Err').html(pc);
                    $('#input_check_to_Err').html(nt);
                    // $('#label_action_Err').html(la);

                }else{
                    console.log("email and work");
                    note_error = 1;
                }
            }
            else if(notify_as==="email"){
                if (i!="" || j!="" || nt!="" || pc!="") {
                    $('#input_email_sub_Err').html(i);
                    $('#input_email_note_Err').html(j);
                    $('#input_check_cc_Err').html(pc);
                    $('#input_check_to_Err').html(nt);
                }else{
                    console.log("email");
                    note_error = 1;
                }
            }
            else if(notify_as==="work"){
                console.log(h);
                if (f!="" || g!="" || h!="") {
                    $('#inputAlertworktypeErr').html(f);
                    $('#inputAlertworktitleErr').html(g);
                    $('#inputAlertdeudaysErr').html(h);
                    // $('#label_action_Err').html(la);
                }else{
                    console.log("email");
                    note_error = 1;
                }
            }

            // after no label input fill submit empty
            if (parseInt(lable_list.length)<=0) {
                lable_list.push("empty");
            }
            
            console.log("priority");
            console.log(priority);
            console.log(note_error);
            console.log(notify_as); 
            console.log(lable_list+"...list name ")
            if (parseInt(note_error)>=1) {
                console.log("ok");
                $.ajax({
                        url:"<?php echo base_url('Alert_Settings_Controller/add_alert'); ?>",
                        method:"POST",
                        data:{
                            alert_name:alert_name,
                            metrics:metrics,
                            relation:relation,
                            value_val:value_val,
                            past_hour:past_hour,
                            machine_arr:machine_arr,
                            part_arr:part_arr,
                            lable_list:lable_list,
                            to_email_arr:to_email_arr,
                            cc_email_arr:cc_email_arr,
                            work_type:work_type,
                            work_title:work_title,
                            assignee:assignee,
                            deu_days:deu_days,
                            add_alert_subject:add_alert_subject,
                            add_alert_notes:add_alert_notes,
                            priority:priority,
                            notify_as:notify_as,
                        },
                        dataType:"json",
                        success:function(res){
                            console.log("alert settings success message");
                            console.log(res);
                            if (res) {
                                alert('Alert Insertion SuccessFully');
                                var start_index = 0;
                                var end_index = 50;
                                $('.pagination_onchange').val('1');
                                retrive_alert_data(start_index,end_index);
                                $('#addAlert_modal').modal('hide');
                                $("#overlay").fadeOut(300);
                                console.log(res);
                            }
                        
                            
                        },
                        error:function(er){
                            console.log("Alert Settings Error message");
                            console.log(er);
                        }
                });
            }      
        }
        

      
        
            $('#overlay').fadeOut(300);

    });


    function alert_ajax_func(){
        console.log("ajax calling");
    }

    // retrive function records display function
    function retrive_alert_data(start_index,end_index){

        $('.content_alert_settings').empty();

        // machine array  getting
        var machine_arr = [];
        $('.filter_drp_machine_checkbox').each(function(){
            if ($(this).is(':checked')) {
                machine_arr.push($(this).val());
            }
        });

        // part array getting
        var part_arr = [];
        $('.filter_Drp_part_checkbox').each(function(){
            if ($(this).is(':checked')) {
                part_arr.push($(this).val());
            }
        });

        // work order array
        var work_order_arr = [];
        $('.filter_alert_work_checkbox').each(function(){
            if ($(this).is(':checked')) {
                work_order_arr.push($(this).val());
            }
        });

        // last_updated_by
        var last_updated_arr = [];
        $('.filter_drp_last_updated_checkbox').each(function(){
            if ($(this).is(':checked')) {
                last_updated_arr.push($(this).val());
            }
        });

        console.log("filter arrays");
        console.log(machine_arr);
        console.log(part_arr);
        console.log(work_order_arr);
        console.log(last_updated_arr);

        $.ajax({
            url:"<?php echo base_url('Alert_Settings_Controller/retrive_data'); ?>",
            method:"POST",
            dataType:"json",
            data:{
                machine_arr:machine_arr,
                part_arr:part_arr,
                work_order_arr:work_order_arr,
                last_updated_arr:last_updated_arr,
            },
            success:function(res){
                console.log("Alert Data retrive");
                console.log(res);
                // console.log(res.length);
                var total_page = parseInt(res.length)/50;
                total_page = Math.ceil(total_page);
                $('#pagination_val').html(total_page);
                if (parseInt(res.length)>0) {
                    res.forEach(function(item,key) {
                        console.log("alert data keys");
                        if ((parseInt(key)<parseInt(end_index)) && (parseInt(key)>=parseInt(start_index))) {  
                            var element = $();
                            var mail_img = " ";
                            var work_img = " ";
                            if (item.notify_as === "all") {
                                mail_img = "inline";
                                work_img = "inline";
                            }else if(item.notify_as === "email"){
                                mail_img = "inline";
                                work_img = "none";
                            }
                            else if(item.notify_as === "work"){
                                mail_img = "none";
                                work_img = "inline";
                            }else{
                                mail_img = "none";
                                work_img = "none";
                            }
                            var chnage_letter_sm_up = item.user_data.fl_split;
                            element = element.add('<div id="settings_div">'
                                +'<div class="row paddingm">'
                                +' <div class="col-sm-1 col marleft" style="width:6%;">'
                                +'<p>'+item.alert_id+'</p>'
                                +'</div>'
                                +'<div class="col-sm-2 col marleft" style="width:12%;">'
                                +'<p title='+item.alert_name+'>'+item.alert_name+'</p>'
                                +'</div>'
                                +'<div class="col-sm-2 col marleft" style="width:12%;">'
                                +'<p>'+item.machine_count+' Machines</p>'
                                +'</div>'
                                +'<div class="col-sm-2 col marleft" style="width:13%">'
                                +'<p>'+item.part_count+' Parts</p>'
                                +'</div>'
                                +' <div class="col-sm-1 col marleft" style="width:22%;">'
                                +'<p>'+item.metrics+' '+item.relation+' '+item.value_val+' In Past '+item.past_hour+' Hours</p>'
                                +'</div>'
                                +' <div class="col-sm-1 col marleft img_div_out" style="">'
                                +'<img src="<?php echo base_url('assets/img/mail_demo.png'); ?>" alt="" class="img_div_css" style="display:'+mail_img+'"> <img src="<?php echo base_url('assets/img/issue.png'); ?>" alt="" class="img_div_Css1" style="display:'+work_img+'"> </div>'
                                +' <div class="col-sm-2 col marleft" style="">'
                                +'<div class="circle_div_out" style="">'+chnage_letter_sm_up.toUpperCase()+'</div><span class="small_txt_out" style="">'+item.user_data.full_name+'</span>'
                                +'</div>'
                                +'<div class="col-sm-1 col marleft img_action_out" style="width:9%;">'
                                +'<div class="action_hover"> <img src="<?php echo base_url('assets/img/pencil.png'); ?>" alt="" class="img_action_icon edit_click" style="" data_id="'+item.alert_id+'" data_notify="'+item.notify_as+'"></div>'
                                +'<div class="action_hover"><img src="<?php echo base_url('assets/img/delete.png'); ?>" alt="" class="img_action_icon del_click alert_del_modal"  data_id="'+item.alert_id+'"style=""></div>'
                                +'</div>'
                                +'</div>'
                            +'</div>');
                            $('.content_alert_settings').append(element);
                        }
                    });   
                }else{
                    $('.content_alert_settings').append('No Records');
                }
                

            },
            error:function(er){
                console.log("alert data retrvie error");
                console.log(er);
            }
        });
    }

   
    // reset filter click function
    function alert_settings_filter_reset(){
        var start_index = 0;
        var end_index = 50;
        $('.pagination_onchange').val('1');
        retrive_alert_data(start_index,end_index);
        reset_filter_last_updated_by();
        reset_work_order_drp();
        reset_filter_machine_alert();
        reset_filter_part();
    }

    // apply filter button onclick function
    $(document).on('click','#apply_filter_btn',function(event){
        event.preventDefault();
        var start_index = 0;
        var end_index = 50;
        $('.pagination_onchange').val('1');
        retrive_alert_data(start_index,end_index);
    });


    // pagination onchange function
    $(document).on('change','.pagination_onchange',function(event){
        event.preventDefault();
        // alert('ji');
        var value_input = $('.pagination_onchange').val();
        var limit_val = $('#pagination_val').text();
        var start_index =0;
        var end_index = 0;

        if (parseInt(value_input)>0) {
            if (parseInt(value_input)<=parseInt(limit_val)) {
                end_index = parseInt(value_input)*50;
                start_index = parseInt(end_index)-50;
              
            }else{
                
                $('.pagination_onchange').val('1');
                start_index = 0;
                end_index = 50;
             
            }
        }else{
            $('.pagination_onchange').val('1');
            start_index = 0;
            end_index = 50;
        }

        retrive_alert_data(start_index,end_index);
    });

    // edit click
    $(document).on('click','.edit_click',function(event){
        event.preventDefault();
        var get_tmp_index = $('.edit_click');
        var find_tmp_index = get_tmp_index.index($(this));
        // alert(find_tmp_index);
        var get_alert_id = $('.edit_click:eq('+find_tmp_index+')').attr('data_id');
        var get_notify = $('.edit_click:eq('+find_tmp_index+')').attr('data_notify');
        console.log(get_alert_id);
        console.log("alert id");
        // alert(get_alert_id);
        reset_all_input("edit");
        $.ajax({
            url:"<?php echo base_url('Alert_Settings_Controller/get_particular_record'); ?>",
            method:"POST",
            dataType:"json",    
            data:{
                alert_id:get_alert_id,
                get_notify:get_notify,
            },
            success:function(res){
                console.log("Alert settings");
                console.log(res);
                // alert(res);
               
                $('#title_alert_id').text(res[0]['alert_id']);
                $('#edit_alert_name').val(res[0]['alert_name']);
                $('#edit_alert_metrics').val(res[0]['metrics']);
                $('#edit_alert_relation').val(res[0]['relation']);
                $('#edit_alert_val').val(res[0]['value_val']);
                $('#edit_alert_past_hour').val(res[0]['past_hour']);
                edit_machine_drp_set(res[0]['machine_arr']);
                edit_part_drp_set(res[0]['part_arr']);
              
                var checkbox_work = document.querySelector('#work_edit_check_toggle');
                var checkbox_email = document.querySelector('#edit_email_check_toggle');
                
                if (res[0]['notify_as']==="all") {
                    
                    checkbox_work.checked=true;
                    checkbox_email.checked=true;
                    $('#edit_alert_work_type').val(res[0]['work_type']);
                    $('#edit_alert_work_title').val(res[0]['work_title']);
                    $('.edit_toggle_work_div').css('display','inline');
                    $('.edit_email_div_visibility').css('display','inline');
                    // var label_arr = res[0]['label_txt_arr'].split(',');
                    // console.log(label_arr);
                    // label_get_arr(label_arr);
                    $(".lable-div-edit").empty();
                    const value_lable = res[0]['lable_id'].split(',');
                    // console.log(value_lable);
                    value_lable.forEach(function(lable){
                        lable_list_globle.forEach(function(lable_item){
                            var itemsContainerlable = $();
                            if (lable_item['lable_id'] == lable) {
                                itemsContainerlable = itemsContainerlable.add('<div class="lable-bg">'
                                    +'<span lable_list_id="'+lable_item['lable_id']+'" class="lable_items">'+lable_item['lable']+'</span>'
                                    +'<span class="item-remove item-remove-lable-edit marleftalign">'
                                        +'<i class="fa fa-times" aria-hidden="true"></i>'
                                    +'</span>'
                                +'</div>');
                                $(".lable-div-edit").append(itemsContainerlable);
                            }
                        });
                    });
                    $(".lable-div-edit").addClass("margtop");


                    // $('#edit_alert_assignee').val(res[0]['assignee']);
                    $('#edit_alert_deu_days').val(res[0]['deu_days']);
                    var to_email_arr = res[0]['to_email_arr'].split(',');
                    var cc_email_arr = res[0]['cc_email_arr'].split(',');
                    console.log(to_email_arr);
                    console.log(cc_email_arr);
                    to_email_get_arr(to_email_arr);
                    cc_email_get_arr(cc_email_arr);
                    $('#edit_alert_mail_subject').val(res[0]['add_alert_subject']);
                    $('#edit_alert_mail_notes').val(res[0]['alert_notes']);

                    // assignee
                    if (res[0]['assignee']==="Unassigned") {
                        $('#edit_assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
                        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
                            +'<p class="paddingm">UA</p>'
                        +'</div>'
                        +'<span style="color: #7f7f7f">Unassigned</span>'
                        +'</div>');
                        
                        $('#edit_assignee_val').attr('data-assignee-val','Unassigned');
                    }else{
                        $('#edit_assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
                        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
                            +'<p class="paddingm">'+res[0]['user_name']['fl_split']+'</p>'
                        +'</div>'
                        +'<span style="color: #7f7f7f">'+res[0]['user_name']['full_name']+'</span>'
                        +'</div>');
                        
                        $('#edit_assignee_val').attr('data-assignee-val',res[0]['assignee']);
                    }
                    
                }
                else if(res[0]['notify_as']==="work"){
                    checkbox_work.checked=true;
                    checkbox_email.checked=false;
                    $('#edit_alert_work_type').val(res[0]['work_type']);
                    $('#edit_alert_work_title').val(res[0]['work_title']);
                    $('.edit_toggle_work_div').css('display','inline');
                    $('.edit_email_div_visibility').css('display','none');
                    // var label_arr = res[0]['label_txt_arr'].split(',');
                    // label_get_arr(label_arr);
                    // $('#edit_alert_assignee').val(res[0]['assignee']);


                    $(".lable-div-edit").empty();
                    const value_lable = res[0]['lable_id'].split(',');
                    // console.log(value_lable);
                    value_lable.forEach(function(lable){
                        lable_list_globle.forEach(function(lable_item){
                            var itemsContainerlable = $();
                            if (lable_item['lable_id'] == lable) {
                                itemsContainerlable = itemsContainerlable.add('<div class="lable-bg">'
                                    +'<span lable_list_id="'+lable_item['lable_id']+'" class="lable_items">'+lable_item['lable']+'</span>'
                                    +'<span class="item-remove item-remove-lable-edit marleftalign">'
                                        +'<i class="fa fa-times" aria-hidden="true"></i>'
                                    +'</span>'
                                +'</div>');
                                $(".lable-div-edit").append(itemsContainerlable);
                            }
                        });
                    });
                    $(".lable-div-edit").addClass("margtop");

                    $('#edit_alert_deu_days').val(res[0]['deu_days']);

                    // assginee
                    if (res[0]['assignee']==="Unassigned") {
                        $('#edit_assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
                        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
                            +'<p class="paddingm">UA</p>'
                        +'</div>'
                        +'<span style="color: #7f7f7f">Unassigned</span>'
                        +'</div>');
                        
                        $('#edit_assignee_val').attr('data-assignee-val','Unassigned');
                    }else{
                        $('#edit_assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
                        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
                            +'<p class="paddingm">'+res[0]['user_name']['fl_split']+'</p>'
                        +'</div>'
                        +'<span style="color: #7f7f7f">'+res[0]['user_name']['full_name']+'</span>'
                        +'</div>');
                        
                        $('#edit_assignee_val').attr('data-assignee-val',res[0]['assignee']);
                    }
                }
                else if(res[0]['notify_as']==="email"){
                    checkbox_email.checked=true;
                    checkbox_work.checked=false;
                    $('.edit_toggle_work_div').css('display','none');
                    $('.edit_email_div_visibility').css('display','inline');
                    console.log(res[0]['to_email_arr']);
                    console.log(res[0]['cc_email_arr']);
                    $('#edit_alert_mail_subject').val(res[0]['add_alert_subject']);
                    $('#edit_alert_mail_notes').val(res[0]['alert_notes']);
                    var to_email_arr = res[0]['to_email_arr'].split(',');
                    var cc_email_arr = res[0]['cc_email_arr'].split(',');
                    to_email_get_arr(to_email_arr);
                       cc_email_get_arr(cc_email_arr);
                }
                else{
                    checkbox_work.checked=false;
                    checkbox_email.checked=false;
                    $('.edit_toggle_work_div').css('display','none');
                    $('.edit_email_div_visibility').css('display','none');
                }
               
                if ((res[0]['priority']!=null) && (res[0]['priority']!="")) {
                    var img_drp = "";
                    var color_tmp = "";
                    if (res[0]['priority'] === "Low") {
                        img_drp = "fa-angle-double-down";
                        color_tmp = "#2196F3";
                    }else if(res[0]['priority']==="Medium"){
                        img_drp = "fa-equals";
                        color_tmp="#FBB80F";
                    }else if(res[0]['priority']==="High"){
                        img_drp = "fa-angle-double-up";
                        color_tmp="#E4021B";
                    }
                    $('.select_edit_priority_btn').html('<div class="select_edit_priority_option" data-type="secondOption" onclick="icon_drop_edit_priority(this)"><i class="fas '+img_drp+'" style="font: size 18px;; width:20px; margin-top: 5px; color:'+color_tmp+';"></i>&nbsp;'+res[0]['priority']+'</div>');
                    // console.log(langArray[0]);
                    $('.select_edit_priority_btn').attr('data-val', res[0]['priority_id']);
                }else{
                    $('.select_edit_priority_btn').html('<div class="select_edit_priority_option" data-type="secondOption" onclick="icon_drop_edit_priority(this)"><i class="fas fa-angle-double-down" style="font: size 18px;; width:20px; margin-top: 5px; color:#2196F3;"></i>&nbsp;Low</div>');
                    $('.select_edit_priority_btn').attr('data-val', '0');
                }

                $('.edit_alert_btn_submit').attr('alert_data_id',res[0]['alert_id']);

                $('#edit_alert').modal('show');
            },
            error:function(er){
                console.log("Alert Settings Particular record get error");
                console.log(res);
            }
        });

    });


    // edit modal submission function 
    $(document).on('click','.edit_alert_btn_submit',function(event){
        event.preventDefault();
        $("#overlay").fadeIn(300);
        var alert_id = $('.edit_alert_btn_submit').attr('alert_data_id');
        var alert_title = $('#edit_alert_name').val();
        var alert_metrics = $('#edit_alert_metrics').val();
        var alert_relation = $('#edit_alert_relation').val();
        var alert_value = $('#edit_alert_val').val();
        var alert_past_hour = $('#edit_alert_past_hour').val();
             
        const machine_arr = [];
        $('.edit_drp_machine_checkbox').each(function(){
            if ($(this).is(':checked')) {
                machine_arr.push($(this).val());
            }
        });

        const part_arr = [];
        $('.editpart_drp_checkbox').each(function(){
            if ($(this).is(':checked')) {
                part_arr.push($(this).val());
            }
        });

        const label_txt_arr = [];
        const to_email_arr = [];
        const cc_email_arr = [];
        var lable_list = [];

        var checkbox_work = document.querySelector('#work_edit_check_toggle');
        var checkbox_email = document.querySelector('#edit_email_check_toggle');
        var a = inputAlertName(alert_title);
        var b = inputAlertRateHour(alert_past_hour);
        // console.log(alert_value);
        var c = inputAlertValue(alert_value);
        var d = inputAlertmetrics(alert_metrics);
        var e = inputAlertrelation(alert_relation);

        if (a!="" || b!="" || c!="" || d!="" || e!="") {
            // console.log('for all check');
            $('#inputedit_alertNameErr').html(a);
            $('#inputAlertEditmetricserr').html(d);
            $('#inputeditAlertrelationerr').html(e);
            $('#inputAlert_edit_ValueErr').html(c);
            $('#inputAlert_edit_pastHourErr').html(b);
          
        }else{

            var notify_as = " ";
            if ((checkbox_work.checked===true) && (checkbox_email.checked===true)) {
                notify_as = "all";
                // $('.label_input_tags_txt_edit').each(function(){
                //     if ($(this).text()) {
                //         label_txt_arr.push($(this).text());
                //     }
                // });
                var lable = $('.lable-div-edit').children('.lable-bg').children('.lable_items');
                $.each(lable, function(key,valueObj){
                    lable_list.push(valueObj.getAttribute('lable_list_id'));
                });

            
                $('.to_email_input_tags_txt_edit').each(function(){
                    if ($(this).text()) {
                        to_email_arr.push($(this).text());
                    }
                });

            
                $('.cc_email_input_tags_txt_edit').each(function(){
                    if ($(this).text()) {
                        cc_email_arr.push($(this).text());
                    }
                });

                var work_type = $('#edit_alert_work_type').val();
                var work_title = $('#edit_alert_work_title').val();
                // var assignee = $('#edit_alert_assignee').val();
                var assignee = $('#edit_assignee_val').attr('data-assignee-val');
                var deu_days = $('#edit_alert_deu_days').val();
                var add_alert_subject = $('#edit_alert_mail_subject').val();
                var add_alert_notes = $('#edit_alert_mail_notes').val();

                // var priority = $('.btn-select_edit .priority_txt_edit').text().toLowerCase();
                var priority = $('.select_edit_priority_btn').attr('data-val');

                
            }
            else if(checkbox_work.checked===true){
                notify_as = "work";
            
                // const label_txt_arr = [];
                // $('.label_input_tags_txt_edit').each(function(){
                //     if ($(this).text()) {
                //         label_txt_arr.push($(this).text());
                //     }
                // });
                var lable = $('.lable-div-edit').children('.lable-bg').children('.lable_items');
                $.each(lable, function(key,valueObj){
                    lable_list.push(valueObj.getAttribute('lable_list_id'));
                });
                // var priority = $('.btn-select_edit .priority_txt_edit').text().toLowerCase();
                var priority = $('.select_edit_priority_btn').attr('data-val');
                var work_type = $('#edit_alert_work_type').val();
                var work_title = $('#edit_alert_work_title').val();
                // var assignee = $('#edit_alert_assignee').val();
                var assignee = $('#edit_assignee_val').attr('data-assignee-val');
                var deu_days = $('#edit_alert_deu_days').val();
                to_email_arr.push("empty");
                cc_email_arr.push("empty");
                var add_alert_subject = null;
                var add_alert_notes = null;


            }
            else if(checkbox_email.checked===true){
                notify_as = "email";
                

                // const to_email_arr = [];
                $('.to_email_input_tags_txt_edit').each(function(){
                    if ($(this).text()) {
                        to_email_arr.push($(this).text());
                    }
                });

                // const cc_email_arr = [];
                $('.cc_email_input_tags_txt_edit').each(function(){
                    if ($(this).text()) {
                        cc_email_arr.push($(this).text());
                    }
                });

                var add_alert_subject = $('#edit_alert_mail_subject').val();
                var add_alert_notes = $('#edit_alert_mail_notes').val();
                label_txt_arr.push("empty");
                var work_type = null;
                var work_title = null;
                var assignee = null;
                var priority = null;
                var deu_days = null;

            }else{
                notify_as = "no";
            
                var work_type = null;
                var work_title = null;
                var assignee = null;
                var priority = null;
                var deu_days = null;
                label_txt_arr.push("empty");
                to_email_arr.push("empty");
                cc_email_arr.push("empty");
                var add_alert_subject = null;
                var add_alert_notes = null;

            }

             // work
            // var work_label = $('.edit_parent_div_input_check_label li').length;
            var add_label = $('.lable-div-edit .lable-bg').length;
            var f = inputAlertworktype(work_type);
            var g = inputAlertworktitle(work_title);
            var h = inputAlertdue_days(deu_days);
            
            // var m = inputAlertlabel(work_label);
            // var lae = inputlabel(add_label);


            console.log(deu_days);

            // email
            var input_check_to = $('.edit_parent_div_input_check li').length;
            var input_check_cc = $('.edit_parent_div_input_check_cc li').length;
            var i = inputAlert_mail_sub(add_alert_subject);
            var j = inputAlert_email_note(add_alert_notes);
            var k = inputAlertto(input_check_to);
            var l = inputAlertcc(input_check_cc);

            var note_error = 0; 
            if (notify_as==="all") { 
                if (f!="" || g!="" || h!="" || i!="" || j!="" || k!="" || l!="") {
                    $('#inputAlert_edit_worktypeErr').html(f);
                    $('#inputAlert_edit_worktitleErr').html(g);
                    $('#inputAlert_edit_deudaysErr').html(h);
                    $('#input_email_edit_sub_Err').html(i);
                    $('#input_email_edit_note_Err').html(j);
                    $('#input_check_to_edit_Err').html(k);
                    $('#input_check_cc_edit_Err').html(l);
                    // $('#label_edit_Err').html(lae);
                }else{
                  
                    note_error = 1;
                }
            }
            else if(notify_as==="email"){
                console.log('only for email');
                if (i!="" || j!="" || k!="" || l!="") {
                    $('#input_email_edit_sub_Err').html(i);
                    $('#input_email_edit_note_Err').html(j);
                    $('#input_check_to_edit_Err').html(k);
                    $('#input_check_cc_edit_Err').html(l);
                }else{
                    console.log("email");
                    note_error = 1;
                }
            }
            else if(notify_as==="work"){
                console.log(h);
                if (f!="" || g!="" || h!="") {
                    console.log('only for work');
                    $('#inputAlert_edit_worktypeErr').html(f);
                    $('#inputAlert_edit_worktitleErr').html(g);
                    $('#inputAlert_edit_deudaysErr').html(h);
                    // $('#label_edit_Err').html(lae);

                }else{
                    console.log("email");
                    note_error = 1;
                }
            }

            console.log("edit alert modal notify as status");
            console.log(notify_as);
            console.log(note_error);
            console.log("priority");
            console.log(priority);
            console.log(assignee);
            if (parseInt(lable_list.length)<=0) {
                lable_list.push("empty");
            }
            // console.log(lable_list+"...edit");
            // alert('ji');
           
            if (parseInt(note_error)>=1) {
                console.log("ok");
                $.ajax({
                    url:"<?php  echo base_url('Alert_Settings_Controller/edit_alert_submission'); ?>",
                    method:"POST",
                    dataType:"json",
                    data:{
                        alert_id:alert_id,
                        alert_title:alert_title,
                        alert_metrics:alert_metrics,
                        alert_relation:alert_relation,
                        alert_value:alert_value,
                        alert_past_hour:alert_past_hour,
                        machine_arr:machine_arr,
                        part_arr:part_arr,
                        lable_list:lable_list,
                        to_email_arr:to_email_arr,
                        cc_email_arr:cc_email_arr,
                        work_type:work_type,
                        work_title:work_title,
                        assignee:assignee,
                        deu_days:deu_days,
                        add_alert_subject:add_alert_subject,
                        add_alert_notes:add_alert_notes,
                        notify_as:notify_as,
                        priority:priority,
                    },
                    success:function(datasss){
                        console.log("Edit alert Settings module success ");
                        // console.log(datasss);
                        if (datasss == true) {
                            alert('Updation SuccessFully');
                            var start_index = 0;
                            var end_index = 50;
                            $('.pagination_onchange').val('1');
                            retrive_alert_data(start_index,end_index);
                            $('#edit_alert').modal('hide');
                            $("#overlay").fadeOut(300);

                        }
                    },
                    error:function(er){
                        console.log("Edit alert Settings submission error");
                        console.log(er);
                    }
                });
            }
            $('#overlay').fadeOut(300);
        }
    });


    // delete modal confirmation click function
    $(document).on('click','.alert_del_modal',function(event){
        event.preventDefault();
        // alert('this is delete alert');
        var del_class = $('.alert_del_modal');
        var find_index = del_class.index($(this));
        // alert(find_index);
        var alert_id = $('.alert_del_modal:eq('+find_index+')').attr('data_id');
        $('.alert_delete_confirmation_submit').attr('alert_id',alert_id);
        $('#alert_delete_confirmation_box').modal('show');

        
    });

    // delete submission function
    $(document).on('click','.alert_delete_confirmation_submit',function(event){
        event.preventDefault();

        var get_id = $('.alert_delete_confirmation_submit').attr('alert_id');
        $.ajax({
            url:"<?php echo base_url('Alert_Settings_Controller/delete_alert'); ?>",
            method:"POST",
            dataType:"json",
            data:{
                get_id:get_id,
            },
            success:function(res){
                console.log("Delete click function final result");
                console.log(res);
                if (res) {
                    alert('Deletion Successfully');
                    var start_index = 0;
                    var end_index = 50;
                    $('.pagination_onchange').val('1');
                    retrive_alert_data(start_index,end_index);
                    $('#alert_delete_confirmation_box').modal('hide');
                    $("#overlay").fadeOut(300);
                }

            },
            error:function(er){
                console.log("Alert Settings Delete Operation Error");
                console.log(er);
            }
        
        })
    });


// priority dropdown
// for select2 priority dropdown
$(".selectBtn3").click(function(){
    // console.log('selectbtn3');
    $('.selectDropdown3').toggleClass('new_4');
    $('.email_che').toggleClass('checked');
});


// edit priority dropdown
$(".select_edit_priority_btn").click(function(){
    // console.log('selectbtn3');
    $('.select_edit_drp_priority').toggleClass('select_new_edit_priority');
    $('.email_checkeck_edit').toggleClass('checked');
});




// priority dropdown
function icon_drop(elem){
    // console.log('icons');
    // console.log(elem);
    var das = $(elem).html();
    $(".selectBtn3").html(das);
    var tmp_arr = das.split('&nbsp;')
    // console.log(tmp_arr[1]);
    if (tmp_arr[1]==="Low") {
        $('.selectBtn3').attr('data-val','1');
    }
    else if(tmp_arr[1]==="Medium"){
        $('.selectBtn3').attr('data-val','2');
    }
    else if(tmp_arr[1]==="High"){
        $('.selectBtn3').attr('data-val','3');
    }
    $('.selectDropdown3').toggleClass('new_4');
    $('.email_che').toggleClass('checked');
}

// edit priority dropdown
function icon_drop_edit_priority(elem){
    // console.log('icons');
    // console.log(elem);
    var das = $(elem).html();
    $(".select_edit_priority_btn").html(das);
    var tmp_arr = das.split('&nbsp;')
    // console.log(tmp_arr[1]);
    if (tmp_arr[1]==="Low") {
        $('.select_edit_priority_btn').attr('data-val','3');
    }
    else if(tmp_arr[1]==="Medium"){
        $('.select_edit_priority_btn').attr('data-val','2');
    }
    else if(tmp_arr[1]==="High"){
        $('.select_edit_priority_btn').attr('data-val','1');
    }
    $('.select_edit_drp_priority').toggleClass('select_new_edit_priority');
    $('.email_checkeck_edit').toggleClass('checked');
}

// onclick assignee

$(document).on('click','.inbox_assignee',function(event){
    var index = $('.inbox_assignee').index(this);
    // console.log("check box index");
    // console.log(index);
    $('.inbox_assignee').children("input[name=assignee_val]").attr('checked', false);
    $('.inbox_assignee:eq('+index+')').children("input[name=assignee_val]").attr('checked', true);

    var tmpassignee_id = $('.inbox_assignee:eq('+index+')').attr('data-assignee-val');
    // $('#assignee_val').empty();
    $('#assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
            +'<p class="paddingm">'+$('.inbox_assignee:eq('+index+')').children('.circle-div-root').children('.circle-div').children('p').text()+'</p>'
        +'</div>'
        +'<span style="color: #7f7f7f">'+$('.inbox_assignee:eq('+index+')').children('.assignee_name_class').children('p').text()+'</span>'
        +'</div>');
        // console.log("assignee");
        // console.log(tmpassignee_id);
    $('#assignee_val').attr('data-assignee-val',tmpassignee_id);
});


// edit assignee

$(document).on('click','.inbox_edit_assignee',function(event){
    var index = $('.inbox_edit_assignee').index(this);
    // console.log("check box index");
    // console.log(index);
    $('.inbox_edit_assignee').children("input[name=assignee_val]").attr('checked', false);
    $('.inbox_edit_assignee:eq('+index+')').children("input[name=assignee_val]").attr('checked', true);

    var tmpassignee_id = $('.inbox_edit_assignee:eq('+index+')').attr('data-assignee-val');
    $('#edit_assignee_val').empty();
    $('#edit_assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
            +'<p class="paddingm">'+$('.inbox_edit_assignee:eq('+index+')').children('.circle-div-root').children('.circle-div').children('p').text()+'</p>'
        +'</div>'
        +'<span style="color: #7f7f7f">'+$('.inbox_edit_assignee:eq('+index+')').children('.assignee_name_class').children('p').text()+'</span>'
        +'</div>');
        
    $('#edit_assignee_val').attr('data-assignee-val',tmpassignee_id);
});

$(document).on('click','.suggession-lable-items',function(event){
    var countr = $('.suggession-lable-items');
    var indx = countr.index($(this));
    var value = $('.lable-input-suggession:eq('+indx+')').val();
    const itemsContainerlables = document.getElementsByClassName("lable-div-add")[0];

    const item = document.createElement("div");

    const itemText = document.createElement("span");
    getLableID(itemText,value);
    item.appendChild(itemText);
    itemText.classList.add("lable_items");

    const itemRemove = document.createElement("span");
    itemRemove.classList.add("item-remove");
    itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    itemRemove.classList.add("marleftalign");
    item.appendChild(itemRemove);

    item.classList.add("lable-bg");
    
    itemsContainerlables.classList.add("margtop");
    itemsContainerlables.appendChild(item);

    inputFieldlables.value = "";

    itemRemove.addEventListener("click", function () {
        itemsContainerlables.removeChild(item);
    });

    $('#dropdown-list-lables').empty();
    document.getElementById("dropdown-list-lables").style.display="none";

    lable_list_globle=[];
    getLableList();
});

const inputFieldlables = document.getElementsByClassName("input-field-lable-add")[0];
const itemsContainerlables = document.getElementsByClassName("lable-div-add")[0];
inputFieldlables.addEventListener("keyup", function (event) {
    var inputValue = inputFieldlables.value;
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-lables").style.display="block";
        var suggession_list = lable_list_globle.filter(item => item['lable'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-lables').empty();

        suggession_list.forEach((item,index)=>{
            if (index < 3) {
                $('#dropdown-list-lables').append('<div class="inbox inbox_priority suggession-lable-items" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-lable-val">'+item['lable']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="lable-input-suggession radio-visible" value="'+item['lable']+'">'
                +'</div>');
            }
        });
        // Add as Final
        $('#dropdown-list-lables').append('<div class="inbox inbox_priority suggession-lable-items" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-lable-val">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="lable-input-suggession radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');

    }else{
        $('#dropdown-list-lables').empty();
        document.getElementById("dropdown-list-lables").style.display="none";
    }
});

callALL();
function callALL(){
    // Reset
    lable_list_globle = [];

    getLableList();
}
function getLableID(item,value){
    console.log('id'+value);
    $.ajax({
        url:"<?php echo base_url('Alert_Settings_Controller/getLableID') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        data:{
            lable:value
        },
        success:function(res){
            item.setAttribute("lable_list_id", res);
            item.innerText=value;
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}
function getLableList(){
    console.log('Value');
    $.ajax({
        url:"<?php echo base_url('Alert_Settings_Controller/getLable') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            // res.forEach(function(item){
            //   lable_list_globle.push(item);  
            // });

            // Filter Status.........
            $('.Filter_lables_div').append('<div class="inbox inbox_filter_lables" style="display: flex;">'
                +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="filter_val_lables" name="filter_val_lables_name" value="all" type="checkbox" checked/>'
                +'</div>'
                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm">All</p>'
                +'</div>'
            +'</div>');
            res.forEach(function(item){
                lable_list_globle.push(item);

                $('.Filter_lables_div').append('<div class="inbox inbox_filter_lables" style="display: flex;">'
                    +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<input class="filter_val_lables" name="filter_val_lables_name" value="'+item['lable_id']+'" type="checkbox" checked/>'
                    +'</div>'
                    +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm">'+item['lable']+'</p>'
                    +'</div>'
                +'</div>');
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}


//Lable edit

$(document).on('click','.suggession-lable-items-edit',function(event){
    var countr = $('.suggession-lable-items-edit');
    var indx = countr.index($(this));
    var value = $('.lable-input-suggession-edit:eq('+indx+')').val();
    const itemsContainerlables = document.getElementsByClassName("lable-div-edit")[0];

    const item = document.createElement("div");

    const itemText = document.createElement("span");
    getLableID(itemText,value);
    item.appendChild(itemText);
    itemText.classList.add("lable_items");

    const itemRemove = document.createElement("span");
    itemRemove.classList.add("item-remove");
    itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    itemRemove.classList.add("marleftalign");
    item.appendChild(itemRemove);

    item.classList.add("lable-bg");
    
    itemsContainerlables.classList.add("margtop");
    itemsContainerlables.appendChild(item);

    const inputFieldEdit = document.getElementsByClassName("input-field-lable-edit")[0];
    inputFieldEdit.value = "";

    itemRemove.addEventListener("click", function () {
        itemsContainerlables.removeChild(item);
    });

    $('#dropdown-list-lables-edit').empty();
    document.getElementById("dropdown-list-lables-edit").style.display="none";

    lable_list_globle=[];
    getLableList();
});



// edit label function
const inputFieldlablesEdit = document.getElementsByClassName("input-field-lable-edit")[0];
const itemsContainerlablesEdit = document.getElementsByClassName("lable-div-edit")[0];
inputFieldlablesEdit.addEventListener("keyup", function (event) {
    var inputValue = inputFieldlablesEdit.value;
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-lables-edit").style.display="block";
        var suggession_list = lable_list_globle.filter(item => item['lable'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-lables-edit').empty();

        suggession_list.forEach((item,index)=>{
            if (index < 3) {
                $('#dropdown-list-lables-edit').append('<div class="inbox suggession-lable-items-edit" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-lable-val-edit">'+item['lable']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="lable-input-suggession-edit radio-visible" value="'+item['lable']+'">'
                +'</div>');
            }
        });
        // Add as Final
        $('#dropdown-list-lables-edit').append('<div class="inbox suggession-lable-items-edit" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-lable-val-edit">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="lable-input-suggession-edit radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');

    }else{
        $('#dropdown-list-lables-edit').empty();
        document.getElementById("dropdown-list-lables-edit").style.display="none";
    }

});

$(document).on("click", ".item-remove-lable-edit", function(event){
    var countr = $('.item-remove-lable-edit');
    var indx = countr.index($(this));
    $(this).parent('.lable-bg').remove();
});


// reset all inputs
function reset_all_input(data_txt){
    if(data_txt==="insert"){
        $('#add_alert_name').val('');
        $('#add_alert_metrics').val('');
        $('#add_alert_relation').val('');
        $('#add_alert_val').val('');
        $('#add_alert_past_hour').val('');
        reset_add_alert_machine();
        reset_add_alert_part();
        $('#work_check_toggle').prop('checked',false);
        $('#email_check_toggle').prop('checked',false);
        $('#add_alert_work_type').val('');
        $('#add_alert_work_title').val('');
        $('.selectBtn3').html('<div class="selectBtn3 priority_get_data_add" data-type="firstOption"> <i class="fas fa-angle-double-down" style="font: size 18px; width:18px; color: #2196F3; margin-top: 5px;"></i>&nbsp;Low</div>');
        $('.selectBtn3').attr('data-val', '0');
        $('.lable-div-add').empty();
        $('#add_alert_deu_days').val('');
        $('#assignee_val').text('Unassigned');
        $('#assignee_val').attr('data-assignee-val','Unassigned');
        $('.to_email_txt_tags_arr').empty();
        $('.cc_email_txt_arr').empty();
        $('#add_alert_mail_subject').val('');
        $('#add_alert_mail_notes').val('');
        $('.toggle_work_div').css('display','none');
        $('.email_div_visibility').css('display','none');
    }
    else if(data_txt==="edit"){
        $('#edit_alert_name').val('');
        $('#edit_alert_metrics').val('');
        $('#edit_alert_relation').val('');
        $('#edit_alert_val').val('');
        $('#edit_alert_past_hour').val('');
        $('#work_edit_check_toggle').prop('checked',false);
        $('#edit_email_check_toggle').prop('checked',false);
        $('#edit_alert_work_type').val('');
        $('#edit_alert_work_title').val('');
        // $('.select_edit_priority_btn ').val('');
        $('.select_edit_priority_btn').html('<div class="select_edit_priority_option" data-type="secondOption" onclick="icon_drop_edit_priority(this)"><i class="fas fa-angle-double-down" style="font: size 18px;; width:20px; margin-top: 5px; color:#2196F3;"></i>&nbsp;Low</div>');
        $('.select_edit_priority_btn').attr('data-val', '0');
        $('.lable-div-edit').empty();
        $('#edit_assignee_val').text('Unassigned');
        $('#edit_alert_deu_days').val('');
        $('.to_email_input_tags_txt_edit').empty();
        $('.cc_email_input_tags_txt_edit').empty();
        $('#edit_alert_mail_subject').val('');
        $('#edit_alert_mail_notes').val('');

    }



}

</script>