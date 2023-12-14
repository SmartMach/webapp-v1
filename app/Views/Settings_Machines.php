<style type="text/css">
    .padin{
        padding-left:1.5rem;
    }
    .left-align{
        padding-left:1.4rem;
    }
    
</style>
<?php 
$session = \Config\Services::session();

?>

<div class="mr_left_content_sec">
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">Machine Settings</p>
              <div class="d-flex">
                    <p class="float-end fnt_fam style_label active_click fnt_active">
                        <span  id="Active"></span>Active 
                    </p>
                    <p class="float-end fnt_fam style_label fnt_inactive">
                        <span  id="Iactive"></span>Inactive
                    </p>
              </div>
          </div>
        </nav>

        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start"></p>
              <div class="d-flex innerNav">

                    <!-- Filter and Refresh Option will enable in future update-->
                    <!-- <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class=" float-end  undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;"></i>
                    <a style="background: #cde4ff;color: #005abc;width:7rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#FilterMachineModal" id="filterData">FILTER</a> -->

                    <?php 
                        if($this->data['access'][0]['settings_machine'] == 3){ 
                    ?>

                    <a class="overall_filter_btn mr_right_ele cursor none_dec overall_filter_header_css" id="add_machine_button">
                        <i class="fa fa-plus mr_right_ele"></i>Add Machine
                    </a>

                    <?php 
                         }
                    ?>
                </div>
            </div>
        </nav>
        <div class="data_section">
            <div class="table_header table_header_p">
                <div class="row paddingm">
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">MACHINE ID</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">MACHINE NAME</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_e align_c text_align_c">
                      <p class="paddingm h_mar_r">MACHINE RATE HOUR</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_e align_c text_align_c">
                      <p class="paddingm h_mar_r">MACHINE OFF RATE HOUR</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">TONNAGE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">MACHINE BRAND</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">STATUS</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_c align_c text_align_c">
                      <p class="paddingm">ACTION</p>
                    </div>
                </div>
            </div>

            <div class="contentMachine tableDataContainer paddingm ">
            </div>
        </div>
</div>

<div class="modal fade" id="AddMachineModal" tabindex="-1" aria-labelledby="AddMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title header_popup fnt_fam" id="AddMachineModal1" style="">ADD MACHINE DETAILS</p>
            </div> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">      
                                <input type="text" class="form-control font_weight_modal" id="inputMachineName" name="inputMachineName" >
                                <label for="inputMachineName" class="input_lable fnt_fam">Machine Name <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="inputMachineNameErr"></span> 
                                <span class="float-end charCount fnt_fam" id="inputMachineNameCunt"></span> 
                            </div>
                        </div>
                    </div>
                    <div class="row">                      
                        <div class="col-lg-3 box">
                            <div class=" input-box fieldStyle">
                                <input type="text" class="form-control padin font_weight_modal" id="inputMachineRateHour" name="inputMachineRateHour" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input cursor"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label for="inputMachineRateHour" class="input_lable fnt_fam">Machine Rate Hour <span class="paddingm validate fnt_fam">*</span></label></label>
                                <span class="paddingm float-start validate fnt_fam" id="inputMachineRateHourErr"></span> 
                                
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input padin font_weight_modal" id="inputMachineOffRateHour" name="inputMachineOffRateHour" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input cursor"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label for="inputMachineOffRateHour" class="input_lable fnt_fam">Machine OFF Rate Hour <span class="paddingm validate fnt_fam">*</span></label></label>
                                <span class="paddingm float-start validate fnt_fam" id="inputMachineOffRateHourErr"></span> 
                                <!-- <span class="float-end charCount fnt_fam">Character Count</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class=" input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal paddinginright" id="inputTonnage" name="inputTonnage" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputTonnage" class="input_lable fnt_fam">Tonnage <span class="paddingm validate fnt_fam">*</span></label></label>
                                <span class="paddingm float-start validate fnt_fam" id="inputTonnageErr"></span> 
                                <span class="unit clip cursor">T</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputMachineBrand" name="inputMachineBrand">
                                <label for="inputMachineBrand" class="input_lable fnt_fam">Machine Brand <span class="paddingm validate fnt_fam">*</span></label></label>
                                <span class="paddingm float-start validate fnt_fam" id="inputMachineBrandErr"></span> 
                                <span class="float-end charCount fnt_fam" id="inputMachineBrandCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 box" >
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputMachineSerialId" name="inputMachineSerialId" onkeydown="key_down(event)" onpaste="check_white_space(event)">
                                <label for="inputMachineSerialId" class="input_lable fnt_fam">Machine Serial ID <span class="paddingm validate fnt_fam">*</span></label></label>
                                <span class="paddingm float-start validate fnt_fam" id="inputMachineSerialId_err"></span> 
                                <span class="float-end charCount fnt_fam" id="inputMachineSerialIdCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <input type="text" class="form-control form-control-md" name="site_id" id="site_id_get_input" value="<?php echo $session->get('active_site'); ?>">
                    </div>
                </div>

                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fnt_fam btn_fnt_size btn_padd btn_save Add_Machine_Data" name="Add_Machine" value="Save">
                    <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveMachineModal" tabindex="-1" aria-labelledby="DeactiveMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header border_no">
                <p class="modal-title header_popup fnt_fam" id="DeactiveMachineModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
                <div class="modal-body">
                    <label class="conf_message">Are you sure you want to delete this machine record?</label>
                    
                </div>
                <div class="modal-footer border_no">
                    <a class="btn fnt_fam btn_fnt_size btn_padd btn_save Status-Machine Status-deactive" name="Edit_Machine" value="SAVE" >Save</a>
                    <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ActiveMachineModal" tabindex="-1" aria-labelledby="ActiveMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
        <div class="modal-header border_no">
            <h5 class="modal-title header_popup fnt_fam" id="ActiveMachineModal1" style="">CONFIRMATION MESSAGE</h5>
        </div>
        <div class="modal-body">
            <label class="conf_message">Are you sure you want to activate this machine record?</label>            
        </div>
        <div class="modal-footer border_no">
            <a class="btn fnt_fam btn_fnt_size btn_padd btn_save Status-active" name="Edit_Machine" value="SAVE" >Save</a>
            <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditMachineModal" tabindex="-1" aria-labelledby="EditMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header border_no">
                <p class="modal-title header_popup fnt_fam" id="EditMachineModal1" style="">EDIT MACHINE DETAILS</p>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label for="" class="col-form-label headTitle fnt_fam">Machine ID</label>
                                        <p><span id="machineid" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="float-end">
                                        <label for="" class="col-form-label headTitle fnt_fam">Status</label>
                                        <p><span id="machinestatus" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="editMachineName" name="" required=""  value="" >
                                <label class="input_lable fnt_fam">Machine Name <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editMachineNameErr"></span>
                                <span class="float-end charCount fnt_fam" id="editMachineNameCuntEdit"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input left-align font_weight_modal" id="editMachineRateHour" name="" required=""  value=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input cursor"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label class="input_lable fnt_fam">Machine Rate Hour <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editMachineRateHourErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input left-align font_weight_modal" id="editMachineOffRateHour" name="" required=""  value=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label class="input_lable fnt_fam">Machine OFF Rate Hour <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editMachineOffRateHourErr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input paddinginright font_weight_modal" id="editTonnage" name="" required=""  value=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label class="input_lable fnt_fam">Tonnage <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editTonnageErr"></span>
                                <span class="unit clip">T</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineBrand" name="" required=""  value=" ">
                                <label class="input_lable fnt_fam">Machine Brand <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editMachineBrandErr"></span>
                                <span class="float-end charCount fnt_fam" id="editMachineBrandCuntEdit"></span>
                            </div>
                        </div>
                        <?php 
                         if($this->data['user_details'][0]['role'] == "Smart Admin"){ 
                        ?>
                         <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineSerialNumber" name="" required=""  value=" " onkeydown="key_down(event)" onpaste="check_white_space(event)">
                                <label class="input_lable fnt_fam">Machine Serial ID <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editMachineSerialNumber_err"></span>
                                <span class="float-end charCount fnt_fam" id="editMachineSerialNumberCunt"></span>
                            </div>
                        </div>
                       
                    <?php }else{ ?>
                         <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineSerialNumber" name="" required=""  value=" " readonly="true">
                                <label class="input_lable fnt_fam">Machine Serial ID <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam" id="editMachineSerialNumber_err"></span>
                                <span class="float-end charCount fnt_fam" id="editMachineSerialNumberCunt"></span>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                    <div class="row">
                         <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="input_lable fnt_fam">Last Updated By</label>
                                <p class="fieldStyleSub po_absolute"><span id="last_updated_by" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="input_lable fnt_fam">Last Updated On</label>
                                <p class="fieldStyleSub po_absolute"><span id='last_updated_on' class="font_weight_modal"></span></p>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="modal-footer border_no">
                    <a class="EditMachine btn fnt_fam btn_fnt_size btn_padd btn_save" name="EditMachine" id="edit_machine_data" value="SAVE">Save</a>
                    <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="InfoMachineModal" tabindex="-1" aria-labelledby="InfoMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title header_popup fnt_fam" id="InfoMachineModal1" style="">INFO MACHINE</h5>
            </div>
                <div class="modal-body addMachineForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine ID</label>
                            <p><span id="MId" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Status</label>
                            <p><span id="MStatus" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine Name</label>
                            <p><span id="MName" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine Brand</label>
                            <p><span id="MBrand" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine Rate Hour</label>
                            <p><span id="MRateHour" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine OFF Rate Hour</label>
                            <p><span id="MOffRate" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Tonnage</label>
                            <p><span id="MTonnage" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine Serial ID</label>
                            <p><span id="MSerialNumber" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Last Updated By</label>
                            <p><span id="last_updated_by1" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle fnt_fam">Last Updated On</label>
                            <p><span id="last_updated_on1" class="font_weight_modal"></span></p>
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="FilterMachineModal" tabindex="-1" aria-labelledby="FilterMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title header_popup fnt_fam" id="FilterMachineModal1" style="">FILTER MACHINES</h5>
            </div>
            <!-- <form method="" class="addMachineForm" action="" > -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 box" style="padding-right:0;">
                            <div class="input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterFrom" name="filterFrom">
                                <label for="filterFrom" class="input-padding">Registered on</label>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding-left:0.5rem;">
                            <div class=" input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterTo" name="filterTo">
                                <label for="filterTo" class="input-padding"></label>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="fieldStyle input-box">
                                <select class="form-select font_weight" name="filterMachineBrand" id="filterMachineBrand"></select>
                                <label for="filterMachineBrand" class="input-padding">Machine Brand</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class=" fieldStyle input-box">
                                <input type="text" class="form-control font_weight" id="filterkey" name="filterkey"> 
                                <label for="filterkey" class="input-padding">Keyword</label> 
                            </div>
                        </div>
                        <div class="box col-lg-6">
                            <div class="fieldStyle input-box">
                                <select class="form-select font_weight" name="filterStatus" id="filterStatus">
                                    <option selected value="all">All</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <label for="filterStatus" class="input-padding">Status</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="box col-lg-6">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterSiteName" id="filterSiteName">
                                    </select> 
                                <label for="filterSiteName" class="input-padding">Site Name</label>
                            </div>
                        </div>
                        <div class="box col-lg-6">
                            <div class="fieldStyle input-box">
                                <select class="form-select font_weight" name="filterLastUpdatedBy" id="filterLastUpdatedBy"></select>
                                <label for="filterLastUpdatedBy" class="input-padding">Last Updated By</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box" style="padding-right:0;">
                            <div class="input-box fieldStyle" >
                                <select class="form-select font_weight" name="filterMachineRateHourR" id="filterMachineRateHourR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterMachineRateHourR" class="input-padding">Machine Rate Hour</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box" style="padding-left:0.5rem;">
                            <div class="fieldStyle input-box">
                                <input type="text" class="form-control font_weight" id="filterMachineRateHourOp" name="filterMachineRateHourOp">
                                <label for="filterMachineRateHourOp" class="input-padding"></label>
                            </div>
                        </div>
                        <div class="col-lg-3 box" style="padding-right:0;">
                            <div class=" fieldStyle input-box">
                                <select class="form-select font_weight" name="filterMachineOffRateR" id="filterMachineOffRateR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterMachineOffRateR" class="input-padding">Machine OFF Rate Hour</label>
                            </div>
                        </div>
                        <div class="col-lg-3" style="padding-left:0.5rem;">
                            <div class="fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterMachineOffRateOp" name="filterMachineOffRateOp">
                                <!-- <label for="filterMachineOffRateOp" class="input-padding"></label> -->
                            </div>
                        </div>
                    </div>              
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="Add_Filter btn fo bn saveBtnStyle" name="" value="Apply">Apply</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
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




<script src="<?php echo base_url()?>/assets/js/settings_machine_validation.js?version=<?php echo rand(); ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>/assets/js/custom_date_format.js?version=<?php echo rand() ; ?>"></script>

<script type="text/javascript">
    $(document).on('click','#add_machine_button',function(event){
        event.preventDefault();
        var data = "addmachine";
        error_show_remove(data);
 
        // add machine is click clear the exisiting fill records
        $('#inputMachineName').val('');
        $('#inputMachineRateHour').val('');
        $('#inputMachineOffRateHour').val('');
        $('#inputTonnage').val('');
        $('#inputMachineBrand').val('');
        $('#inputMachineSerialId').val('');

        $('.Add_Machine_Data').removeAttr("disabled");
        $('#AddMachineModal').modal('show');
    });
    $(".Add_Machine_Data").click(function(event){
       event.preventDefault();
       $("#overlay").fadeIn(300);
        var f = inputMachineSerialid($('#inputMachineSerialId').val());
        check_machine_serial_id($('#inputMachineSerialId').val().trim());
        var a = inputMachineOffRateHour($("#inputMachineOffRateHour").val());
        var b = inputMachineRateHour($("#inputMachineRateHour").val());
        var c = inputMachineName($("#inputMachineName").val());
        var d = inputTonnage($("#inputTonnage").val());
        var e = inputMachineBrand($("#inputMachineBrand").val());
        if (a != "" || b!="" || c!="" || d!="" || e!="" || f!="") {
            $("#inputMachineOffRateHourErr").html(a);
            $("#inputMachineRateHourErr").html(b);            
            $("#inputMachineNameErr").html(c);
            $("#inputTonnageErr").html(d);        
            $("#inputMachineBrandErr").html(e);    
            $('#inputMachineSerialId_err').html(f);   
            $("#overlay").fadeOut(300);    
        }
        else{
            
            var machine_off_rate_hour = $('#inputMachineOffRateHour').val();
            var machine_rate_hour = $('#inputMachineRateHour').val();
            var tonnage = $('#inputTonnage').val();
            var machine_name = $('#inputMachineName').val();
            var machine_brand = $('#inputMachineBrand').val();
            var machine_serial_id = $('#inputMachineSerialId').val();
            var site_id = $('#site_id_get_input').val();

            var serial_err = $('#inputMachineSerialId_err').text();
            $.ajax({
                    url:"<?php echo base_url('Settings_controller/add_machine_new_Code') ?>",
                    method:"POST",
                    cache: false,
                    async:false,
                    data:{
                        machine_off_rate_hour : machine_off_rate_hour,
                        machine_rate_hour : machine_rate_hour,
                        tonnage : tonnage,
                        machine_name : machine_name,
                        machine_brand : machine_brand,
                        machine_serial_id : machine_serial_id,
                        site_id : site_id,
                    },
                    // async:false,
                    dataType:"json",
                    success:function(data){
                        if (data == true) {
                            // retrive all rows
                            get_machine_data();
                            // get count data
                            get_count();
                            $('#AddMachineModal').modal('hide');
                            $("#overlay").fadeOut(300);
                        }
                    },
                    error:function(err){
                        // alert("Something went wrong!");
                        $("#overlay").fadeOut(300);
                    }
            });
        }
    });

    // document ready function
    $(document).ready(function(){
        // Retrive all Machine Records......
        get_machine_data();
        // Retrive all Machine Record Count........
        get_count();
        var currentdate = new Date(); 
        var datetime = currentdate.getDate() + " "
                + currentdate.toLocaleString('en-us', { month: 'short' })  + " " 
                + currentdate.getFullYear() + ", "  
                + currentdate.getHours() + ":"  
                + currentdate.getMinutes()
        $('#date-time').html(datetime);
        // Page Refresh
        $('.undo').click(function(event){
            event.preventDefault();
            event.stopPropagation()
            location.reload();
        });


        //  Deactivate Machine Acknowledge ........... 
        $(document).on("click", ".deactivate-machine", function(event){
            event.preventDefault();
            event.stopPropagation();
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('.Status-deactive').attr('status_data',status);
            $('.Status-deactive').attr('lvalue',id);
            $('#DeactiveMachineModal').modal('show');
            
        });

        // Deactivate Machine Submit .............
        $('.Status-deactive').click(function(event){
                $("#overlay").fadeIn(300);
                event.preventDefault();
                event.stopPropagation();
                var id = $(this).attr('lvalue');
                var status = $(this).attr('status_data');
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/deactivateMachine'); ?>",
                    type: "POST",
                    cache: false,
                    async:false,
                    data: {
                        MachineId : id,
                        Status_Machine: status,
                    },
                    dataType: "json",
                    success:function(res){
                        // Retrive all the Machine Records .........
                        get_machine_data();
                        // Retrive all the Machine Records Total ......
                        get_count();
                        // Close the Acknowledge ................
                        $('#DeactiveMachineModal').modal('hide');
                        $("#overlay").fadeOut(300);
                
                    },
                    error:function(res){
                        // alert("Sorry! Try Agian!!");
                        $("#overlay").fadeOut(300);
                    }
                });
        }); 

        // Activate Machine Acknowledge .............
        $(document).on("click", ".activate-machine", function(event){ 
            event.preventDefault();
            event.stopPropagation();
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('#ActiveMachineModal').modal('show');
            $('.Status-active').attr('status_data',status);
            $('.Status-active').attr('lvalue',id);
           
        });
        // Activate Machine Acknowledge ...............
        $('.Status-active').click(function(event){
                $("#overlay").fadeIn(300);
                event.preventDefault();
                event.stopPropagation();
                var status = $(this).attr('status_data');
                var id = $(this).attr('lvalue');
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/deactivateMachine'); ?>",
                    type: "POST",
                    cache: false,
                    async:false,
                    data: {
                        MachineId : id,
                        Status_Machine: status,
                    },
                    dataType: "json",
                    success:function(res){
                        // Retrive all the Machine Records .........
                        get_machine_data();
                        // Retrive all the Machine Records Total ......
                        get_count();
                        // Close the Acknowledge ................
                        $('#ActiveMachineModal').modal('hide');
                        $("#overlay").fadeOut(300);
                    },
                    error:function(res){
                        // alert("Sorry! Try Agian!!");
                        $("#overlay").fadeOut(300);
                    }
                });
            }); 

        // Retrive Machine Information for Particular Selected Machine ..............
        $(document).on("click", ".info-machine", function(event){
            event.preventDefault();
            event.stopPropagation();

            var id = $(this).attr("lvalue");            
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getMachineData'); ?>",
                type: "POST",
                cache: false,
                async:false,
                data: {
                    MachineId : id
                },
                dataType: "JSON",
                success:function(res_csp){
                    var date_time = getdate_time( res_csp['machine'][0].last_updated_on);
                    $('#MId').html(
                        res_csp['machine'][0].machine_id
                    );
                    if (res_csp['machine'][0].status == 1) {
                        $('#MStatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#MStatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                    }
                    $('#MName').html(
                        res_csp['machine'][0].machine_name
                    );
                    $('#MBrand').html(
                        res_csp['machine'][0].machine_brand
                    );
                    $('#MRateHour').html(
                        (Math.round(res_csp['machine'][0].rate_per_hour * 100) / 100).toFixed(2)
                    );
                    $('#MOffRate').html(
                        (Math.round(res_csp['machine'][0].machine_offrate_per_hour * 100) / 100).toFixed(2)
                    );
                    $('#MTonnage').html(
                        res_csp['machine'][0].tonnage
                    );
                    $('#MSerialNumber').html(
                        res_csp['machine'][0].machine_serial_number
                    );
                    $('#last_updated_by1').html(
                        res_csp['last_updated_by'][0].first_name + " "
                   + res_csp['last_updated_by'][0].last_name);
                    $('#last_updated_on1').html(date_time);
                },
                error:function(res){
                    // alert("Sorry! Try Agian!!");
                }
            });
            $('#InfoMachineModal').modal('show');
        });

        // Retrive Machine Information for Particular Selected Machine ..............
         $(document).on("click", ".info-machine1", function(event){
            event.preventDefault();
            event.stopPropagation();
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getMachineData'); ?>",
                type: "POST",
                cache: false,
                async:false,
                data: {
                    MachineId : id
                },
                dataType: "JSON",
                success:function(res_csp){
                    var date_time = getdate_time( res_csp['machine'][0].last_updated_on);
                    $('#MId').html(
                        res_csp['machine'][0].machine_id
                    );
                    if (res_csp['machine'][0].status == 1) {
                        $('#MStatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#MStatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                    }
                    $('#MName').html(
                        res_csp['machine'][0].machine_name
                    );
                    $('#MBrand').html(
                        res_csp['machine'][0].machine_brand
                    );
                    $('#MRateHour').html(
                        res_csp['machine'][0].rate_per_hour
                    );
                    $('#MOffRate').html(
                        res_csp['machine'][0].machine_offrate_per_hour
                    );
                    $('#MTonnage').html(
                        res_csp['machine'][0].tonnage
                    );
                    $('#MSerialNumber').html(
                        res_csp['machine'][0].machine_serial_number
                    );
                    $('#last_updated_by1').html(
                        res_csp['last_updated_by'][0].first_name + " "
                   + res_csp['last_updated_by'][0].last_name);
                    $('#last_updated_on1').html(date_time);
                },
                error:function(res){
                    // alert("Sorry! Try Agian!!");
                }
            });
            $('#InfoMachineModal').modal('show');
        });


        // Retrive Machine Information for Edit Model ..........
        $(document).on("click", ".edit-machine", function(event){
            event.preventDefault();
            event.stopPropagation();

            var edit = "edit_machine";
            remove_previous_value(edit);   
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getMachineData'); ?>",
                type: "POST",
                cache: false,
                async:false,
                data: {
                    MachineId : id
                },
                dataType: "json",
                success:function(res_csp){
                    $('#machineid').html(
                        res_csp['machine'][0].machine_id
                    );
                    if (res_csp['machine'][0].status == 1) {
                        $('#machinestatus').html(
                            '<p class="fnt_active"><i class="fa fa-circle active_dot"></i>Active</p>'
                        );
                    }
                    else{
                        $('#machinestatus').html(
                            '<p class="fnt_active"><i class="fa fa-circle active_dot"></i>Inactive</p>'
                        );
                    }
                    var date_time  = getdate_time(res_csp['machine'][0].last_updated_on)
                    $('#editMachineName').val(res_csp['machine'][0].machine_name);
                    $('#editMachineRateHour').val(res_csp['machine'][0].rate_per_hour);
                    $('#editMachineOffRateHour').val(res_csp['machine'][0].machine_offrate_per_hour);
                    $('#editTonnage').val(res_csp['machine'][0].tonnage);
                    $('#editMachineBrand').val(res_csp['machine'][0].machine_brand);
                    $('#editMachineSerialNumber').val(res_csp['machine'][0].machine_serial_number);
                    $('#last_updated_by').html(res_csp['last_updated_by'][0].first_name + " " +res_csp['last_updated_by'][0].last_name);
                    $('#last_updated_on').html(date_time);
                    $('.EditMachine').attr("serial_data",res_csp['machine'][0].machine_serial_number);

                    $('#editMachineNameCuntEdit').html($('#editMachineName').val().length + ' / ' + text_max);

                    $('#editMachineBrandCuntEdit').html($('#editMachineBrand').val().length  + ' / ' + text_max);
                    $('#editMachineSerialNumberCunt').html($('#editMachineSerialNumber').val().length  + ' / ' + text_max);
                    
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
            var check_error_show = "edit_machine";
            // Reset the Error Messages ........
            error_show_remove(check_error_show);
            $('.EditMachine').removeAttr("disabled");
            $('#EditMachineModal').modal('show');
        });
        
        // Machine Record Updations ........... 
        $(document).on("click", ".EditMachine", function(event){
            // event.preventDefault();
            check_machine_serial_id_edit($("#editMachineSerialNumber").val().trim());
            var e = editMachineOffRateHour($("#editMachineOffRateHour").val());
            var f = editMachineRateHour($("#editMachineRateHour").val());
            var g = editMachineName($("#editMachineName").val());
            var a = editTonnage($("#editTonnage").val());
            var b = editMachineBrand($("#editMachineBrand").val());
            var h = editMachineSerialNumber($("#editMachineSerialNumber").val());
            if (a != "" || b!="" || e!="" || f!="" || g!="" || h!="") {
                $("#editMachineOffRateHourErr").html(e);
                $("#editMachineRateHourErr").html(f);            
                $("#editMachineNameErr").html(g);
                $("#editTonnageErr").html(a); 
                $("#editMachineBrandErr").html(b);
                $("#editMachineSerialNumberErr").html(h);            
                $("#overlay").fadeOut(300);
            }
            else{
                var  veditMachineName = $('#editMachineName').val();
                var  veditMachineRateHour = $('#editMachineRateHour').val();
                var  veditMachineOffRateHour = $('#editMachineOffRateHour').val();
                var  veditTonnage = $('#editTonnage').val();
                var  veditMachineBrand = $('#editMachineBrand').val();  
                var machine_serial_id = $('#editMachineSerialNumber').val(); 
                var machine_id = $('#machineid').text();
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/editMachineData'); ?>",
                    type: "POST",
                    // cache: false,
                    async:false,
                    data: {
                        MachineId : machine_id,
                        MachineName: veditMachineName,
                        MachineRateHour : veditMachineRateHour,
                        MachineOffRateHour: veditMachineOffRateHour,
                        Tonnage : veditTonnage,
                        MachineBrand: veditMachineBrand,
                        machine_serial_id:machine_serial_id,
                    },
                    dataType: "json",
                    success:function(res){
                        if (res) {
                            get_machine_data();
                            // get count data
                            get_count();
                          
                            $('#EditMachineModal').modal('hide');
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

        //  Filter Functions ...........
        $("#filterMachineRateHourOp").attr("disabled", true);
        $('#filterMachineRateHourR').on('change', function(event) {

            event.preventDefault();
            event.stopPropagation();

            if ($('#filterMachineRateHourR').val() == 'all') {
                $("#filterMachineRateHourOp").attr("disabled", true);
            }
            else{
                $("#filterMachineRateHourOp").removeAttr("disabled");
            }
        });

        $("#filterMachineOffRateOp").attr("disabled", true);
        $('#filterMachineOffRateR').on('change', function(event) {
            event.preventDefault();
            event.stopPropagation();

            if ($('#filterMachineOffRateR').val() == 'all') {
                $("#filterMachineOffRateOp").attr("disabled", true);
            }
            else{
                $("#filterMachineOffRateOp").removeAttr("disabled");
            }
        });
    });
        
    function check_machine_serial_id(serial_id) {
        window.localStorage.clear();
        if (serial_id.trim() == "") {
            $('#inputMachineSerialId_err').html(required);
            $('.Add_Machine_Data').attr("disabled",true);
            $("#overlay").fadeOut(300);
        }else{
            $.ajax({
                url:"<?php echo base_url('Settings_controller/check_serialid'); ?>",
                method:"post",
                data:{serial_id:serial_id},
                dataType:"json",
                cache: false,
                async:false,
                success:function(data){
                    if(data == true){
                        $('#inputMachineSerialId_err').html('*Machine serial id already exists');
                        $('.Add_Machine_Data').attr("disabled",true);
                        $("#overlay").fadeOut(300);
                    }else{
                        $('#inputMachineSerialId_err').html('');
                        $('#inputMachineSerialId').val(serial_id);
                        $('.Add_Machine_Data').removeAttr("disabled");
                        $("#overlay").fadeOut(300);
                    }
                },
                error:function(res){
                    // alert('sorry Try Again...');
                }
            });
        }
    }

    function check_machine_serial_id_edit(serial_id) {
        window.localStorage.clear();
        var old_val = $('.EditMachine').attr("serial_data");
        if (serial_id.trim() == "") {
            $('#editMachineSerialNumber_err').html(required);
            $('.EditMachine').attr("disabled",true);
            $("#overlay").fadeOut(300);
        }
        else if (old_val == serial_id) {
            $('#editMachineSerialNumber_err').html('');
            $('.EditMachine').removeAttr("disabled");
            $("#overlay").fadeOut(300);
        }
        else{
            $.ajax({
                    url:"<?php echo base_url('Settings_controller/check_serialid'); ?>",
                    method:"post",
                    data:{serial_id:serial_id},
                    dataType:"json",
                    cache: false,
                    async:false,
                    success:function(data){
                        if(data==true){
                            $('#editMachineSerialNumber_err').text('*Machine serial id already exists');
                            $('.EditMachine').attr("disabled",true);
                        }else{
                            $('#editMachineSerialNumber_err').html('');
                            $('.EditMachine').removeAttr("disabled");
                        }
                        $("#overlay").fadeOut(300);
                    },
                    error:function(res){
                        // alert('sorry Try Again...');
                        $("#overlay").fadeOut(300);
                    }
                });
            }
    }

    // Machine Serial ID Back-End Validation .......... 
    $(document).on('change','#inputMachineSerialId',function(event){
        event.preventDefault();
        var serial_id = $('#inputMachineSerialId').val();
        serial_id = serial_id.trim();
        if (serial_id == "") {
            $('#inputMachineSerialId_err').html(required);
            $('.Add_Machine_Data').attr("disabled",true);
        }else{
            check_machine_serial_id(serial_id);
        }
    });

    // Machine Serial ID Back-End Validation for Edit Functions ............. 
    $(document).on('change','#editMachineSerialNumber',function(event){
        // event.stopPropagation();
        // event.preventDefault();
        $('.EditMachine').attr("disabled",true);
        var serial_id = $('#editMachineSerialNumber').val();
        serial_id = serial_id.trim();
        if (serial_id == "") {
            $('#editMachineSerialNumber_err').html(required);
            $('.EditMachine').attr("disabled",true);    
        }else{
            check_machine_serial_id_edit(serial_id);
        }
    });

$(document).on('click','.active_click',function(event){
    event.preventDefault();
    event.stopPropagation();
    $('.inactive_click').css("display","none");
    $('#Iactive').html('00');
});

// Retrive all the Machine Records ...............
function get_machine_data(){
    var acsCon = <?php  echo $this->data['access'][0]['settings_machine']; ?>;
    var userole_check = "<?php echo $this->data['user_details'][0]['role']; ?>";
    // alert(acsCon+" "+userole_check);
    var activate_machine = "";
    var deactivate_machine = "";
    var info_machine = "";
    var edit_machine = "";
    if(parseInt(acsCon) < 2){
        activate_machine = "display:none;";
        deactivate_machine = "display:none;";
        edit_machine = "display:none;";
        // info_machine = "display:block;";
    }
    else if((parseInt(acsCon) == 2) ){
        // alert('site admin');
        activate_machine = "display:none;";
        deactivate_machine = "display:none;";
        //edit_machine = "display:block;";
        info_machine = "display:none;";
    }
    else{
        //activate_machine = "display:block;";
        //deactivate_machine = "display:block;";
        //edit_machine = "display:block;";
        info_machine = "display:none;";
    }
    $.ajax({
        url:"<?php echo base_url('Settings_controller/get_machine_data'); ?>",
        type:"POST",
        dataType:"json",
        async:false,
        cache: false,
        success:function(res){
            $('.contentMachine').empty();
            if (jQuery.isEmptyObject(res)){
                $('.contentMachine').html('<p class="no_record_css">No Records...</p>');
            }
            res.forEach(function(item){
                var machine_rate_per_hour = item.rate_per_hour;
                var machine_off_rate_per_hour = item.machine_offrate_per_hour;
                var machine_rph = 0;
                if (isFloat(machine_rate_per_hour) == true) {
                    machine_rph = parseFloat(machine_rate_per_hour);
                }else{
                    machine_rph = parseInt(machine_rate_per_hour).toFixed(2);

                }
                var machine_orh = 0;
                if (isFloat(machine_off_rate_per_hour) == true) {
                    machine_orh = parseFloat(machine_off_rate_per_hour);
                }else{
                    machine_orh = parseInt(machine_off_rate_per_hour).toFixed(2);
                }
                var elements = $();
                if (item.status == 1) {
                    elements = elements.add('<div class="table_data">'
                        +'<div class="row paddingm">'
                            +'<div class="col-sm-1 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam">'+item.machine_id+'</p></div>'
                            +'<div class="col-sm-2 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam" title='+item.machine_name+'>'+item.machine_name+'</p></div>'         
                            +'<div class="col-sm-2 col paddingm marright table_data_section display_f justify_e align_c" >'
                                +'<p class="paddingm h_mar_r table_data_element fnt_fam"><i class="fa fa-inr mar_right_logo" style="font-size:0.70rem;"></i>'+machine_rph+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col paddingm table_data_section display_f justify_e align_c" >'
                                +'<p class="paddingm h_mar_r table_data_element fnt_fam"><i class="fa fa-inr mar_right_logo" style="font-size:0.70rem;"></i>'+machine_orh+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam">'+item.tonnage+'T</p></div>'
                            +'<div class="col-sm-2 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam">'+item.machine_brand+'</p></div>'
                            +'<div class="col-sm-1 col settings_active marleft table_data_section display_f align_c fnt_active" ><p class="table_data_element fnt_bold fnt_fam fnt_active"><i class="fa fa-circle active_dot"></i>Active</p></div>'
                                +'<div class="col-sm-1 col d-flex justify_c">'
                                    +'<ul class="edit-menu d-flex justify_c align_c paddingm">'
                                        +'<li class="d-flex justify_c po_relative">'
                                            +'<a href="javascript:function(){return false;}">'
                                                +'<i class="editOpt fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                            +'</a>'
                                            +'<ul class="paddingm element-hover-content po_absolute">'
                                                +'<li class="hover_elem_height side-menu-hover-btom display_f align_c info-machine1 sidenave-hover cursor" lvalue="'+item.machine_id+'" style="'+info_machine+'">'
                                                    //+'<a href="#"><img src="<?php echo base_url('assets/img/info.png') ?>" class="icons_style" style="margin-left:5px;">INFO</a></li>'
                                                    +'<div class="icon-option display_f justify_c align_c">'
                                                        +'<img src="<?php echo base_url('assets/img/info.png') ?>" class="icons-smart icon-sub">'
                                                    +'</div>'
                                                    +'<div class="lable-option display_f align_c">'
                                                        +'<a href="#" id="" class="nav-sub lable-option-val none_dec">INFO</a>'
                                                    +'</div>'
                                                    +'</li>'
                                                +'<li class="hover_elem_height side-menu-hover-btom display_f align_c  edit-machine hover_work cursor sidenave-hover" lvalue="'+item.machine_id+'" style="'+edit_machine+'">'
                                                    // +'<a href="#" style=""><img src="<?php echo base_url('assets/img/pencil.png') ?>" class="icons_style" style="margin-left:10px;">EDIT</a></li>'
                                                    +'<div class="icon-option display_f justify_c align_c">'
                                                        +'<img src="<?php echo base_url('assets/img/pencil.png') ?>" class="icons-smart icon-sub">'
                                                    +'</div>'
                                                    +'<div class="lable-option display_f align_c">'
                                                        +'<a href="#" id="" class="nav-sub lable-option-val none_dec">EDIT</a>'
                                                    +'</div>'
                                                +'</li>'
                                                +'<li class="hover_elem_height display_f align_c deactivate-machine sidenave-hover cursor" lvalue="'+item.machine_id+'" svalue="'+item.status+'" style="'+deactivate_machine+'">'
                                                    // +'<a href="#" style="border-bottom:none;"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="icons_style" style="margin-left:10px;">DEACTIVATE</a></li>'
                                                    +'<div class="icon-option display_f justify_c align_c">'
                                                        +'<img src="<?php echo base_url('assets/img/delete.png') ?>" class="icons-smart icon-sub">'
                                                    +'</div>'
                                                    +'<div class="lable-option display_f align_c">'
                                                        +'<a href="#" id="" class="nav-sub lable-option-val none_dec">DEACTIVATE</a>'
                                                    +'</div>'
                                                +'</li>'
                                            +'</ul>'
                                        +'</li>'
                                    +'</ul>'                
                                +'</div>'                           
                            +'</div>'
                        +'</div>');
                        $('.contentMachine').append(elements);
                }
                else{
                        var machine_off_reate_hour = item.machine_offrate_per_hour;
                        elements = elements.add('<div class="table_data">'
                            +'<div class="row paddingm">'
                            +'<div class="col-sm-1 col marleft table_data_section display_f align_c"><p class="table_data_element fnt_fam">'+item.machine_id+'</p></div>'
                            +'<div class="col-sm-2 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam" title='+item.machine_name+'>'+item.machine_name+'</p></div>'        
                            +'<div class="col-sm-2 col paddingm marright table_data_section display_f justify_e align_c" >'
                                +'<p class="paddingm h_mar_r table_data_element fnt_fam"><i class="fa fa-inr mar_right_logo" style="font-size:0.70rem;"></i>'+machine_rph+'</p>'
                            +'</div>' 
                            +'<div class="col-sm-2 col paddingm marright table_data_section display_f justify_e align_c" >'
                                +'<p class="paddingm h_mar_r table_data_element fnt_fam"><i class="fa fa-inr mar_right_logo" style="font-size:0.70rem;"></i>'+machine_orh+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam">'+item.tonnage+'T</p></div>'
                            +'<div class="col-sm-2 col marleft table_data_section display_f align_c" ><p class="table_data_element fnt_fam">'+item.machine_brand+'</p></div>'
                            +'<div class="col-sm-1 col marleft settings_active table_data_section display_f align_c fnt_inactive"><p class="table_data_element fnt_bold fnt_fam fnt_inactive"><i class="fa fa-circle active_dot"></i>Inactive</p></div>'
                            +'<div class="col-sm-1 col d-flex justify_c">'
                                +'<ul class="edit-menu paddingm display_f justify_c align_c">'
                                    +'<li class="d-flex justify_c po_relative">'
                                        +'<a href="javascript:function(){return false;}">'
                                            +'<i class="editOpt fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                        +'</a>'
                                        +'<ul class="paddingm element-hover-content po_absolute">'
                                            +'<li class="hover_elem_height side-menu-hover-btom display_f align_c info-machine sidenave-hover cursor" lvalue="'+item.machine_id+'">'
                                            // +'<a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="icons_style" style="margin-left:5px;">INFO</a></li>'
                                                +'<div class="icon-option display_f justify_c align_c">'
                                                    +'<img src="<?php echo base_url('assets/img/info.png') ?>" class="icons-smart icon-sub">'
                                                +'</div>'
                                                +'<div class="lable-option display_f align_c">'
                                                    +'<a href="#" id="" class="nav-sub lable-option-val none_dec">INFO</a>'
                                                +'</div>'
                                             +'</li>'
                                            +'<li class="hover_elem_height display_f align_c activate-machine sidenave-hover cursor" lvalue="'+item.machine_id+'" svalue="'+item.status+'" style="'+activate_machine+';">'
                                                +'<div class="icon-option display_f justify_c align_c">'
                                                    +'<img src="<?php echo base_url('assets/img/activate.png') ?>" class="icons-smart icon-sub">'
                                                +'</div>'
                                                +'<div class="lable-option display_f align_c">'
                                                    +'<a href="#" id="" class="nav-sub lable-option-val none_dec">ACTIVATE</a>'
                                                +'</div>'
                                            +'</li>'
                                            // +'<a href="#" style="border-bottom:none;"><img src="<?php echo base_url('assets/img/activate.png'); ?>" class="icons_style" style="margin-left:5px;font-size:15px;">ACTIVATE</a></li>'
                                        +'</ul>'
                                    +'</li>'
                                +'</ul>'                
                            +'</div>'                
                            +'</div>'
                            +'</div>');
                            $('.contentMachine').append(elements);
                        }
            });
        },
        error:function(err){
            // alert(err);
        }
    });
}


// Get Total Active and Inactive Count .............
function get_count(){
    $.ajax({
        url: "<?php echo base_url('Settings_controller/aIaMachine'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async:false,
        success:function(res){
            var len = res.InActive.toString().length;
            var len1 = res.Active.toString().length;
            if (parseInt(len) > 1) {
                $('#Iactive').html(res.InActive);
            }else{
                $('#Iactive').html('0'+res.InActive);
            }

            if (parseInt(len1) > 1) {
                $('#Active').html(res.Active);
            }else{
                $('#Active').html('0'+res.Active);
            }   
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}
   
//  Remove all the Error Messages ................
function error_show_remove(data){
    if (data == "addmachine") {
        $('#inputMachineNameErr').html(' ');
        $('#inputMachineRateHourErr').html(' ');
        $('#inputMachineOffRateHourErr').html(' ');
        $('#inputTonnageErr').html(' ');
        $('#inputMachineBrandErr').html(' ');
        $('#inputMachineSerialId_err').html(' ');
        $('#inputMachineNameCunt').html('0 / ' + text_max);
        $('#inputMachineBrandCunt').html('0 / ' + text_max);
        $('#inputMachineSerialIdCunt').html('0 / ' + text_max);
    }else if (data == "edit_machine") {
        $('#editMachineNameErr').html(' ');
        $('#editMachineRateHourErr').html(' ');
        $('#editMachineOffRateHourErr').html(' ');
        $('#editTonnageErr').html(' ');
        $('#editMachineBrandErr').html(' ');
        $('#editMachineSerialNumber_err').html(' ');
    }
}

// Reset the all values before Edit Machine Model show ...........
function  remove_previous_value(edit){
    if (edit == "edit_machine") {
        $('#machineid').html(' ');
        $('#editMachineName').val('');
        $('#editMachineRateHour').val('');
        $('#editMachineOffRateHour').val('');
        $('#editTonnage').val('');
        $('#editMachineBrand').val('');
        $('#editMachineSerialNumber').val('');
        $('#last_updated_by').html(' ');
        $('#last_updated_on').html(' ');
    }
}

// float checking function
function isFloat(x) {
     return !!(x % 1); 
}
</script>
