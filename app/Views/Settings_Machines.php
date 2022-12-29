<style type="text/css">
    .contentContainer{
        margin-top: 1.6rem;
    }
    .padin{
        padding-left:1.5rem;
    }
     .img_font_wh{
        width: 1.9rem;
        height: 1.4rem;
        padding-right: 0.6rem;
    }
    .img_font_wh1{
        width: 1.8rem;
        height: 1.2rem;
        padding-right: 0.6rem;
        color: #a6a6a6;
    }
    .img_font_wh2{
        width: 1.9rem;
        height: 1.2rem;
        padding-right: 0.6rem;
        color: #a6a6a6;
    }
    .menu-font-change{
        font-size: 0.5rem;

    }
    .mar_right{
        padding-left: 1rem;
    }
    .left-align{
        padding-left:1.4rem;
    }
    .readonly-input{
      background-color: #dddddd;
    }
    
</style>
<?php 
$session = \Config\Services::session();

?>
<br>
<br>
<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Machine Settings</p>
              <div class="d-flex">
                    
                    <p class="float-end stcode" class="active_click" style="color: #005CBC;">
                        <span  id="Active"></span>Active 

                    </p>
                    <p class="float-end stcode" style="color: #C00000;">
                        <span  id="Iactive"></span>Inactive
                    </p>
              </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
          <div class="container-fluid paddingm ">
            <p class="float-start"></p>
              <div class="d-flex innerNav">
                    <!-- Filter and Refresh Option will enable in future update-->
                    <!-- <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class=" float-end  undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;"></i>
                    <a style="background: #cde4ff;color: #005abc;width:7rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#FilterMachineModal" id="filterData">FILTER</a> -->

                    <?php 
                        if($this->data['access'][0]['settings_machine'] == 3){ 
                    ?>

                    <a style="background: #005abc;color: white;width:9rem;" class="settings_nav_anchor float-end" id="add_machine_button">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD MACHINE
                    </a>  

                    <?php 
                         }
                    ?>
                </div>
            </div>
        </nav>
        <div class="tableContent">
            <div class="settings_machine_header sticky-top fixtabletitle">
                <div class="row paddingm">
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">MACHINE ID</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">MACHINE NAME</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm mar_right">
                      <p class="basic_right">MACHINE RATE HOUR</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm ">
                      <p class="basic_right">MACHINE OFF RATE HOUR</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">TONNAGE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">MACHINE BRAND</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">STATUS</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="justify-content: center;">
                      <p class="basic_header">ACTION</p>
                    </div>
                </div>
            </div>

            <div class="contentMachine contentContainer paddingm " style="margin-bottom:0rem;">
           
            </div>
        </div>
</div>

<div class="modal fade" id="AddMachineModal" tabindex="-1" aria-labelledby="AddMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="AddMachineModal1" style="">ADD MACHINE</h5>
            </div> 
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">      
                                <input type="text" class="form-control font_weight_modal" id="inputMachineName" name="inputMachineName" >
                                <label for="inputMachineName" class="input-padding">Machine Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputMachineNameErr"></span> 
                                <span class="float-end charCount" id="inputMachineNameCunt"></span> 
                            </div>
                        </div>
                    </div>
                    <div class="row">                      
                        <div class="col-lg-3 box">
                            <div class=" input-box fieldStyle">
                                <input type="text" class="form-control padin font_weight_modal" id="inputMachineRateHour" name="inputMachineRateHour" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label for="inputMachineRateHour" class="input-padding">Machine Rate Hour <span class="paddingm validate">*</span></label></label>
                                <span class="paddingm float-start validate" id="inputMachineRateHourErr"></span> 
                                
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input padin font_weight_modal" id="inputMachineOffRateHour" name="inputMachineOffRateHour" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label for="inputMachineOffRateHour" class="input-padding">Machine OFF Rate Hour <span class="paddingm validate">*</span></label></label>
                                <span class="paddingm float-start validate" id="inputMachineOffRateHourErr"></span> 
                                <!-- <span class="float-end charCount">Character Count</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class=" input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal paddinginright" id="inputTonnage" name="inputTonnage" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputTonnage" class="input-padding">Tonnage <span class="paddingm validate">*</span></label></label>
                                <span class="paddingm float-start validate" id="inputTonnageErr"></span> 
                                <span class="unit clip">T</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputMachineBrand" name="inputMachineBrand">
                                <label for="inputMachineBrand" class="input-padding">Machine Brand <span class="paddingm validate">*</span></label></label>
                                <span class="paddingm float-start validate" id="inputMachineBrandErr"></span> 
                                <span class="float-end charCount" id="inputMachineBrandCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 box" >
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputMachineSerialId" name="inputMachineSerialId" onkeydown="key_down(event)" onpaste="check_white_space(event)">
                                <label for="inputMachineSerialId" class="input-padding">Machine Serial ID <span class="paddingm validate">*</span></label></label>
                                <span class="paddingm float-start validate" id="inputMachineSerialId_err"></span> 
                                <span class="float-end charCount" id="inputMachineSerialIdCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <input type="text" class="form-control form-control-md" name="site_id" id="site_id_get_input" value="<?php echo $session->get('active_site'); ?>">
                    </div>
                </div>

                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Add_Machine_Data saveBtnStyle" name="Add_Machine" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveMachineModal" tabindex="-1" aria-labelledby="DeactiveMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveMachineModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body" style="max-width:max-content;">
                    <label style="color: black;">Are you sure you want to delete this machine record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-Machine Status-deactive saveBtnStyle" name="Edit_Machine" value="SAVE" >Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ActiveMachineModal" tabindex="-1" aria-labelledby="ActiveMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
            <h5 class="modal-title settings-machineAdd-model" id="ActiveMachineModal1" style="">CONFIRMATION MESSAGE</h5>
        </div>
        <div class="modal-body">
            <label style="color: black;">Are you sure you want to activate this machine record?</label>
            
        </div>
        <div class="modal-footer" style="border:none;">
            <a class="btn fo bn  Status-active saveBtnStyle" name="Edit_Machine" value="SAVE" >Save</a>
            <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
        </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditMachineModal" tabindex="-1" aria-labelledby="EditMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditMachineModal1" style="">EDIT MACHINE DETAILS</p>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <label for="" class="col-form-label headTitle">Machine ID</label>
                                        <p><span id="machineid" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class=" float-end">
                                        <label for="" class="col-form-label headTitle">Status</label>
                                        <p><b><span id="machinestatus" class="font_weight_modal" style="font-weight:bold;opacity:1;font-size:0.9rem;"></span></b></p>
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
                                <label class="input-padding">Machine Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editMachineNameErr"></span>
                                <span class="float-end charCount" id="editMachineNameCuntEdit"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input left-align font_weight_modal" id="editMachineRateHour" name="" required=""  value=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label class="input-padding">Machine Rate Hour <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editMachineRateHourErr"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input left-align font_weight_modal" id="editMachineOffRateHour" name="" required=""  value=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                                <label class="input-padding">Machine OFF Rate Hour <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editMachineOffRateHourErr"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input paddinginright font_weight_modal" id="editTonnage" name="" required=""  value=" " oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label class="input-padding">Tonnage <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editTonnageErr"></span>
                                <span class="unit clip">T</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineBrand" name="" required=""  value=" ">
                                <label class="input-padding">Machine Brand <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editMachineBrandErr"></span>
                                <span class="float-end charCount" id="editMachineBrandCuntEdit"></span>
                            </div>
                        </div>
                        <?php 
                         if($this->data['user_details'][0]['role'] == "Smart Admin"){ 
                        ?>
                         <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineSerialNumber" name="" required=""  value=" " onkeydown="key_down(event)" onpaste="check_white_space(event)">
                                <label class="input-padding">Machine Serial ID <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editMachineSerialNumber_err"></span>
                                <span class="float-end charCount" id="editMachineSerialNumberCunt"></span>
                            </div>
                        </div>
                       
                    <?php }else{ ?>
                         <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="editMachineSerialNumber" name="" required=""  value=" " readonly="true">
                                <label class="input-padding">Machine Serial ID <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="editMachineSerialNumber_err"></span>
                                <span class="float-end charCount" id="editMachineSerialNumberCunt"></span>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label headTitle">Last Updated By</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="last_updated_by" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-lg-4 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label headTitle">Last Updated On</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id='last_updated_on' class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditMachine btn fo bn saveBtnStyle" name="EditMachine" id="edit_machine_data" value="SAVE">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="InfoMachineModal" tabindex="-1" aria-labelledby="InfoMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="InfoMachineModal1" style="">INFO MACHINE</h5>
            </div>
                <div class="modal-body addMachineForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine ID</label>
                            <p><span id="MId" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Status</label>
                            <p><span id="MStatus" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Name</label>
                            <p><span id="MName" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Brand</label>
                            <p><span id="MBrand" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Rate Hour</label>
                            <p><span id="MRateHour" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine OFF Rate Hour</label>
                            <p><span id="MOffRate" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Tonnage</label>
                            <p><span id="MTonnage" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Machine Serial ID</label>
                            <p><span id="MSerialNumber" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Last Updated By</label>
                            <p><span id="last_updated_by1" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-4">
                            <label for="" class="col-form-label headTitle">Last Updated On</label>
                            <p><span id="last_updated_on1" class="font_weight_modal"></span></p>
                        </div>
                    </div>                   
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="FilterMachineModal" tabindex="-1" aria-labelledby="FilterMachineModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="FilterMachineModal1" style="">FILTER MACHINES</h5>
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
                        alert("Something went wrong!");
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

        // Edit.........
        $(document).on("click", ".edit", function(event){
            event.preventDefault();
            event.stopPropagation();
            if($(this).parent().siblings(".edit-subMenu").css('display').toLowerCase() == 'none'){
                $(this).parent().siblings(".edit-subMenu").css("display","block");
            }
            else{
                $(this).parent().siblings(".edit-subMenu").css("display","none");
            }
            $(document).mouseup(function(e){ 
                var container = $(".edit-subMenu");
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    container.hide();
                }
            });
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
                        alert("Sorry! Try Agian!!");
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
                        alert("Sorry! Try Agian!!");
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
                    alert("Sorry! Try Agian!!");
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
                    alert("Sorry! Try Agian!!");
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
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#machinestatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
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
                    alert("Sorry!Try Agian!!");
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
                        alert("Sorry!Try Agian!!");
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
                    alert('sorry Try Again...');
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
                        alert('sorry Try Again...');
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
        activate_machine = "none";
        deactivate_machine = "none";
        edit_machine = "none";
        info_machine = "block";
    }
    else if((parseInt(acsCon) == 2) ){
        // alert('site admin');
        activate_machine = "none";
        deactivate_machine = "none";
        edit_machine = "block";
        info_machine = "none";
    }
    else{
        activate_machine = "block";
        deactivate_machine = "block";
        edit_machine = "block";
        info_machine = "none";
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
                $('.contentMachine').html("<p>No Records Found!</p>");
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
                    elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm">'
                            +'<div class="col-sm-1 col marleft" ><p>'+item.machine_id+'</p></div>'
                            +'<div class="col-sm-2 col marleft" ><p title='+item.machine_name+'>'+item.machine_name+'</p></div>'         
                            +'<div class="col-sm-2 col marright" >'
                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+machine_rph+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marright" >'
                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+machine_orh+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col marleft" ><p>'+item.tonnage+'T</p></div>'
                            +'<div class="col-sm-2 col marleft" ><p>'+item.machine_brand+'</p></div>'
                            +'<div class="col-sm-1 col marleft settings_active marleft" style="color:#005CBC;"><p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                    +'<ul class="edit-menu" style="z-index:10;">'
                                        +'<li class="d-flex justify-content-center">'
                                            +'<a href="#">'
                                                +'<i class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                            +'</a>'
                                            +'<ul class="edit-subMenu" style="z-index:10;">'
                                                +'<li class="edit-opt info-machine1" lvalue="'+item.machine_id+'" style="display:'+info_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/info.png') ?>" class="img_font_wh2" style="margin-left:5px;">INFO</a></li>'
                                                +'<li class="edit-opt edit-machine menu-font-change hover_work" lvalue="'+item.machine_id+'" style="display:'+edit_machine+';"><a href="#" style="margin-left:8px"><img src="<?php echo base_url('assets/img/pencil.png') ?>" class="img_font_wh" style="margin-left:12x;">EDIT</a></li>'
                                                +'<li class="edit-opt deactivate-machine" lvalue="'+item.machine_id+'" svalue="'+item.status+'" style="display:'+deactivate_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/delete.png') ?>" class="img_font_wh1" style="margin-left:10px;">DEACTIVATE</a></li>'
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
                        elements = elements.add('<div id="settings_div">'
                            +'<div class="row paddingm">'
                            +'<div class="col-sm-1 col marleft" ><p>'+item.machine_id+'</p></div>'
                            +'<div class="col-sm-2 col marleft" ><p title='+item.machine_name+'>'+item.machine_name+'</p></div>'        
                            +'<div class="col-sm-2 col marright" >'
                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+machine_rph+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marright" >'
                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+machine_orh+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col marleft" ><p>'+item.tonnage+'T</p></div>'
                            +'<div class="col-sm-2 col marleft" ><p>'+item.machine_brand+'</p></div>'
                            +'<div class="col-sm-1 col marleft settings_active" style="color:#C00000;"><p style="color: #C00000; "><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                +'<ul class="edit-menu">'
                                    +'<li class="d-flex justify-content-center">'
                                        +'<a href="#">'
                                            +'<i class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                        +'</a>'
                                        +'<ul class="edit-subMenu" style="z-index:10;">'
                                            +'<li class="edit-opt info-machine" lvalue="'+item.machine_id+'"><a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="img_font_wh2" style="margin-left:5px;">INFO</a></li>'
                                            +'<li class="edit-opt activate-machine" lvalue="'+item.machine_id+'" svalue="'+item.status+'" style="display:'+activate_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/activate.png'); ?>" class="img_font_wh2" style="margin-left:5px;font-size:15px;">ACTIVATE</a></li>'
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
            alert(err);
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
            alert("Sorry!Try Agian!!");
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
