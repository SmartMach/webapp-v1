<style type="text/css">
    .fieldStyleInfo{
    height: 3.5rem;
}
.fieldStyleSubInfo{
    margin-left: 1rem;
}
.LastNameMarg{
    margin-left: 0.2rem;
}
.marleftDot{
    margin-left: 1rem;
}
.cen-align{
    display: flex;
    align-items: center;
    height: 3rem;
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

    /*user info access control*/
.dotAccess_userinfo{
    height: 2.2rem;
    width: 2.2rem;
    border-radius: 50%;
    display: flex;
    text-align: center;
    align-items: center;
    justify-content: center;
}
.info-mar{
    margin-left: 0.5rem;
}

.clip_reset{
    color:#d9d9d9;
}

</style>
<div class="mr_left_content_sec">
 <!---topbar navigation settings----->
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">User Settings</p>
              <div class="d-flex">
                    <p class="float-end fnt_fam style_label active_click fnt_active">
                        <span  id="Active" class=""></span>Active
                    </p>
                    <p class="float-end fnt_fam style_label fnt_inactive">
                        <span  id="Iactive"></span>Inactive
                    </p>
              </div>
          </div>
        </nav>
 <!---topbar navigation settings ending----->
 <!---filter and add user navigation starting-->
        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start"></p>
              <div class="d-flex innerNav">

                  <!----This will enable in future update---->
                    <!--   <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="fa fa-redo float-end  undo" style="width:20px;height:20px;color: #b5b8bc;cursor: pointer;">
                
                    <a style="background: #cde4ff;color: #005abc; width: 8rem;justify-content: center; text-align: center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#FilterUserModal" id="filterData" >FILTER</a>
 -->
                    <?php if($this->data['access'][0]['settings_user_management'] == 3){ ?>
                        <!----add user option----->
                        <!-- <a style="width:8rem;justify-content:center;text-align:center;" class="settings_nav_anchor saveBtnStyle float-end " id="add_user_model">
                            <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD USER
                        </a>  -->
                        <a style="text-decoration:none;margin-right:0.3rem;cursor:pointer;" class="overall_filter_btn overall_filter_header_css" id="add_user_model">
                            <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD USER
                        </a> 

                    <?php }?>
              </div>
          </div>
        </nav>
        <!---filter and add user navigation ending-->
        <!-----main function of table starts------->
            <div class="data_section">
                <div class="table_header table_header_p">
                    <div class="row paddingm">
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">USER ID</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">SITE NAME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">DESIGNATION</p>
                        </div>
                        <div class="col-sm-2 p3  paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">REGISTERED ON</p>
                        </div>
                        <div class="col-sm-2  p3 paddingm table_header_sec display_f justify_l align_c text_align_c " style="text-align:center;padding-left:1.4rem;">
                          <p class="h_mar_l paddingm">ROLE</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">STATUS</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_c align_c text_align_c">
                          <p class="paddingm">ACTION</p>
                        </div>
                    </div>
                </div>
                <div class="contentUser paddingm" style="margin-top:1rem;">
                   
                </div>
        </div>
</div>

<!-- add user modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" aria-labelledby="AddUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model " id="AddUserModal1" style="">ADD USER</h5>
            </div>
              <!-- <form method="post" id="form_add_user"> -->
                <div class="modal-body">
                    <div class="row paddingm">
                        <div class="col-sm-6 box">
                            <div class="input-box fieldStyle">     
                                <select class="form-select font_weight_modal" name="inputRoleAdd" id="inputRoleAdd">
                                    <option value=" " selected="true" disabled>Select Role</option>
                                <?php if($this->data['user_details'][0]['role']=="Smart Admin") { ?>
                                    <option value="Smart Users">Smart Users</option>
                                <?php }?>
                                <?php if($this->data['user_details'][0]['role'] !="Site Admin") { ?>
                                    <option value="Site Admin">Site Admin</option>
                                <?php }?>
                                    <option value="Site Users">Site User</option>
                                    <option value="Operator">Operator</option>
                                </select>
                                <label for="input" class="input-padding">Role <span class="paddingm validate">*</span></label> 
                                <span class="paddingm float-start validate" id="validate_role"></span> 
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <select class="inputSiteNameAdd form-select font_weight_modal" name="inputUserSiteName" id="inputUserSiteName">
                                </select>
                                <label for="input" class="input-padding">Site Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" style="display: none;" id="sitename_error"></span> 
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                                <div class="input-box fieldStyle font_weight">
                                    <label for="" class="col-form-label paddingm headTitle">Site ID</label>
                                    <p class="fieldStyleSub" style="position: absolute;"><span id="SiteID" class="font_weight_modal"></span></p>
                                </div>
                        </div>
                    </div>
                    <div class="row paddingm">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle" id="ExceptOp">
                                    <input type="text" class="form-control input font_weight_modal" id="inputUserEMail" name="inputUserEMail" oninput="this.value=this.value.trim();">
                                    <label for="input" class="input-padding">User ID <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputUserEMailErr"></span> 
                                </div>
                                <div class="input-box fieldStyle" id="OperatorCredential" style="display: none;">
                                    <input type="text" class="form-control input font_weight_modal" id="inputOpUserID" name="inputOpUserID">
                                    <label for="input" class="input-padding">User ID <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputOpUserIDErr"></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle ">Site Location</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="SiteLocation" class="font_weight_modal"></span></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row paddingm">
                        <div class="col-sm-3 box fieldStyle">
                            <div class="input-box">
                                <input type="text" class="form-control font_weight_modal" id="inputUserFirstName" name="inputUserFirstName">
                                <label for="inputMachineRateHour" class="input-padding">First Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputUserFirstNameErr"></span> 
                                <span class="float-end charCount" id="inputUserFirstNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="inputUserLastName" name="inputUserLastName">
                                <label for="inputMachineOffRateHour" class="input-padding">Last Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputUserLastNameErr"></span> 
                                <span class="float-end charCount" id="inputUserLastNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-sm-6 visible_site">
                            <div class="row ">
                                <div class="col-lg-6">
                                    <div class="box new_site_box">
                                        <div class="input-box fieldStyle">
                                            <input type="text" class="form-control input font_weight_modal" id="new_site_name" name="new_site_name">
                                            <label for="input" class="input-padding">Site Name <span class="paddingm validate">*</span></label>
                                            <span class="paddingm float-start validate" id="inputUsernew_site_err"></span><span class="float-end charCount" id="inputUsernew_site_err_count"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="box new_site_box">
                                        <div class="input-box fieldStyle">
                                            <input type="text" class="form-control input font_weight_modal" id="location_name" name="location_name">
                                            <label for="input" class="input-padding">Location <span class="paddingm validate">*</span></label>
                                            <span class="paddingm float-start validate" id="location_name_err"></span><span class="float-end charCount" id="location_name_count"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row paddingm" style="margin-left:1rem;margin-right:1rem;">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control input font_weight_modal" id="inputUserPhone" name="inputUserPhone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                    <label for="input" class="input-padding">Phone <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputUserPhoneErr"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="" id="ACControl">
                                <div class="flex-container textCenter float-start">
                                    <label for="input" class="float-start">Access Control</label>
                                    <div class="dotAccess dot-css acsControl marleftDot">
                                        <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont" style="font-size:1.8rem; margin-left:0.5rem;">
                                    </div>
                                </div>
                            </div>
                            <div id="pass_op_visible">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="password" class="form-control input font_weight_modal" id="pass_op" name="pass_op" oninput="this.value=this.value.trimStart().trimEnd();" style="padding-right:2rem;">
                                            <label for="pass_op" class="input-padding">Password <span class="paddingm validate">*</span></label>
                                            <span class="unit"><i id="eye_pass_op" class="fa fa-eye-slash clip showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                                            <span class="paddingm float-start validate" id="pass_op_err"></span><span class="float-end charCount" id="pass_op_count"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="box">
                                        <div class="input-box fieldStyle">
                                            <input type="password" class="form-control input font_weight_modal" id="re_pass_op" name="re_pass_op" oninput="this.value=this.value.trimStart().trimEnd();" style="padding-right:2rem;">
                                            <label for="re_pass_op" class="input-padding">Re-Type Password <span class="paddingm validate">*</span></label>
                                            <span class="unit"><i id="eye_repass_op" class="fa fa-eye-slash clip showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                                            <span class="paddingm float-start validate" id="re_pass_op_err"></span><span class="float-end charCount" id="re_pass_op_count"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="row paddingm" style="margin-left:1rem;margin-right:1rem;">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control input font_weight_modal" id="inputUserDesignation" name="inputUserDesignation">
                                    <label for="input" class="input-padding">Designation <span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="inputUserDesignationErr"></span><span class="float-end charCount" id="inputUserDesignationCunt"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                    <div class="input-box fieldStyle">
                                        <select class="inputDepartmentAdd form-select font_weight_modal" name="inputUserSiteDepartment" id="inputUserSiteDepartment">
                                           
                                        </select>
                                        <label for="input" class="input-padding">Department <span class="paddingm validate">*</span></label>
                                        <span class="paddingm float-start validate" id="input_dept_err"></span>
                                    </div>
                            </div>
                            
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <button class="CreateUser btn fo bn saveBtnStyle" name="" value="Save">Save</button>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>

<!-- access control modal -->
<div class="modal fade" id="AccessControlModal" tabindex="-1" aria-labelledby="AccessControlModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded" style="margin: auto;">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none;margin-bottom: none;">
                <p class="modal-title settings-machineAdd-model " id="AccessControlModal1" style="">ACCESS CONTROL</p>
            </div>
                <div class="modal-body">
                    <div class="dot dot-css back_btn_access" data-bs-dismiss="modal" aria-label="Close"><img src="<?php echo base_url('assets/img/back.png') ?>" class="img_font_wh dot-cont" style="width: max-content;height: 2rem;margin-left:0.6rem;"></div>
                    <div class="accessControlPaddinghead">
                            <div class="row paddingm textCenter fntTitle">
                                <div class="col-sm-4 fn paddingm">
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>No Access</p>
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>View</p>
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>Edit</p>
                                </div>
                                <div class="col-sm-2 fn paddingm">
                                  <p>Create/ Delete</p>
                                </div>
                            </div>
                    </div>
                    <div style="overflow: auto;height: 24rem;">
                    <div class="accessControlPaddinghead">
                            <div class="row paddingm mb-2">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                    <p style="margin-left: 0.5rem;">Financial Metrics</p>
                                </div>
                            </div>
                    </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm" id="OEE_Financial_Drill_Down">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">OEE Financial Drill Down</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] != 1 or 2 or 3 ){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] >= 1){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="1">
                                    <?php } ?>
                                </div>
                                <!-- tempoaray hide for financial metrics edit and create delete -->
                                <!-- <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] >= 2){ ?>
                                        <input type="radio" id="html" name="ooe_f_drill_down" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_financial_drill_down'] == 3){ ?>
                                        <input type="radio" id="ooe_f_drill_down_add_del" name="ooe_f_drill_down" value="3">
                                    <?php } ?>
                                </div> -->
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">Opportunity Insights</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] >= 1){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="1">
                                    <?php } ?>
                                </div>
                                <!-- tempoaray hide for financial metrics edit and create delete -->
                                <!-- <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] >= 2){ ?>
                                        <input type="radio" id="html" name="opportunity_insights" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['opportunity_insights'] == 3){ ?>
                                        <input type="radio" id="opportunity_insights_add_del" name="opportunity_insights" value="3">
                                    <?php } ?>
                                </div> -->
                            </div>
                        </div> 
                    <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fntTitle fn paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">OEE Drill Down</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="0">
                                    <?php } ?>
                                </div>
                                 <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] >= 1){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="1">
                                    <?php } ?>
                                </div>
                                <!--
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] >= 2){ ?>
                                        <input type="radio" id="html" name="ooe_drill_down" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['oee_drill_down'] == 3){ ?>
                                        <input type="radio" id="ooe_drill_down_add_del" name="ooe_drill_down" value="3">
                                    <?php } ?>
                                </div> -->
                            </div>
                        </div>
                    <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Operator User Interface</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="oui" value="0">
                                    <?php } ?>
                                </div>
                                <!-- <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] >= 1){ ?>
                                        <input type="radio" id="html" name="oui" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] >= 2){ ?>
                                        <input type="radio" id="html" name="oui" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['operator_user_interface'] == 3){ ?>
                                        <input type="radio" id="oui_add_del" name="oui" value="3">
                                    <?php } ?>
                                </div> -->
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Production Data Management</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="pdm" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] >= 1){ ?>
                                        <input type="radio" id="html" name="pdm" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] >= 2){ ?>
                                        <input type="radio" id="html" name="pdm" value="2">
                                    <?php } ?>
                                </div>
                                <!-- <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_data_management'] == 3){ ?>
                                        <input type="radio" id="pdm_add_del" name="pdm" value="3">
                                    <?php } ?>
                                </div> -->
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Daily Production Data</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['daily_production_data'] >= 1 or 2 or 3){?>
                                        <input type="radio" id="html" name="dpd" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['daily_production_data'] >= 1){ ?>
                                        <input type="radio" id="html" name="dpd" value="1">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Current Shift Performance</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['current_shift_performance'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="csp" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['current_shift_performance'] >= 1){ ?>
                                        <input type="radio" id="html" name="csp" value="1">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Production Downtime</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_downtime'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="pd" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_downtime'] >= 1){ ?>
                                        <input type="radio" id="html" name="pd" value="1">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Production Quality</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_quality'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="pq" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['production_quality'] >= 1){ ?>
                                        <input type="radio" id="html" name="pq" value="1">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Work Order Management</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['work_order_management'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="wom" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['work_order_management'] >= 1){ ?>
                                        <input type="radio" id="html" name="wom" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['work_order_management'] >= 2){ ?>
                                        <input type="radio" id="html" name="wom" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['work_order_management'] == 3){ ?>
                                        <input type="radio" id="html" name="wom" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding mb-3">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm textCenterTitle">
                                  <p style="margin-left: 0.5rem;">Alert Management</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['alert_management'] >= 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="alm" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['alert_management'] >= 1){ ?>
                                        <input type="radio" id="html" name="alm" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['alert_management'] >= 2){ ?>
                                        <input type="radio" id="html" name="alm" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['alert_management'] == 3){ ?>
                                        <input type="radio" id="html" name="alm" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPaddinghead mb-2">
                            <div class="row paddingm ">
                                <div class="col-sm-4 fn fntTitle paddingm">
                                    <p style="margin-left: 0.5rem;" class="paddingm">Settings</p>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">Machine</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] != 1 or 2 or 3 ){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_machine'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_macine" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter machine_add_del_check">
                                    <?php if ($this->data['access'][0]['settings_machine'] == 3){ ?>
                                        <input type="radio" id="settings_macine_add_del" name="settings_macine" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">Parts</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="settings_part" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_part" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_part" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_part'] == 3){ ?>
                                        <input type="radio" id="settings_part_add_del" name="settings_part" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="accessControlPadding">
                            <div class="row paddingm">
                                <div class="col-sm-4 fn paddingm textCenterTitle">
                                  <p style="margin-left: 20px;">General</p>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] != 1 or 2 or 3){ ?>
                                        <input type="radio" id="html" name="settings_general" value="0">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] >= 1){ ?>
                                        <input type="radio" id="html" name="settings_general" value="1">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] >= 2){ ?>
                                        <input type="radio" id="html" name="settings_general" value="2">
                                    <?php } ?>
                                </div>
                                <div class="col-sm-2 fn paddingm textCenter">
                                    <?php if ($this->data['access'][0]['settings_general'] == 3){ ?>
                                        <input type="radio" id="settings_general_add_del" name="settings_general" value="3">
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="user_account_access">
                            <div class="accessControlPadding ">
                                <div class="row paddingm">
                                    <div class="col-sm-4 fn paddingm textCenterTitle">
                                    <p style="margin-left: 20px;">User Account</p>
                                    </div>
                                    <div class="col-sm-2 fn paddingm textCenter">
                                        <?php if ($this->data['access'][0]['settings_user_management'] != 1 or 2 or 3){ ?>
                                            <input type="radio" id="settings_user_noaccess" name="settings_user" value="0">
                                        <?php }?>
                                    </div>
                                    <div class="col-sm-2 fn paddingm textCenter">
                                        <?php if ($this->data['access'][0]['settings_user_management'] >= 1){ ?>
                                            <input type="radio" class="noAccess" id="settings_user_view" name="settings_user" value="1">
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-2 fn paddingm textCenter">
                                        <?php if ($this->data['access'][0]['settings_user_management'] >= 2){ ?>
                                            <input type="radio" class="noAccess" id="settings_user_edit" name="settings_user" value="2">
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-2 fn paddingm textCenter">
                                        <?php if ($this->data['access'][0]['settings_user_management'] == 3){ ?>
                                            <input type="radio" class="noAccess" id="settings_user_add_del" name="settings_user" value="3">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        </div>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn access-save saveBtnStyle" name="" data-bs-dismiss="modal" aria-label="Close" value="Save">Save</a>
                    <a class="btn fo bn cancelBtnStyle cancel_access_control" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>
<!-- inactive modal start -->
<div class="modal fade" id="DeactiveToolModal" tabindex="-1" aria-labelledby="DeactiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
            <p class="modal-title settings-machineAdd-model" id="DeactiveToolModal1" style="">CONFIRMATION MESSAGE</p>
        </div>
        <div class="modal-body">
            <?php  ?>
            <label style="color: black;" id="inactive_confirmation_msg"></label>
        </div>
        <div class="modal-footer" style="border:none;">
            <a class="btn fo bn Status-deactivate saveBtnStyle" name="" value="Save">Save</a>
            <a class="btn fo bn cancelBtnStyle " data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
        </div>
    </div>
  </div>
</div>
<!-- inactive modal end -->

<!-- active madal start -->
<div class="modal fade" id="ActiveToolModal" tabindex="-1" aria-labelledby="ActiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
            <p class="modal-title settings-machineAdd-model" id="ActiveToolModal1" style="">CONFIRMATION MESSAGE</p>
        </div>
        <div class="modal-body">
            <label style="color: black;" id="active_confirmation_msg"></label>        
        </div>
        <div class="modal-footer" style="border:none;">
            <a class="btn fo bn Status-activate saveBtnStyle" name="" value="Save">Save</a>
            <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
        </div>
    </div>
  </div>
</div>
<!-- active modal end -->

<!---- edit user details----->
<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditUserModal1" style="">EDIT USER DETAILS</p>
            </div>
            <!-- <form method="" class="addMachineForm" action="" > -->
                <div class="modal-body">     
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="input-box fieldStyle">     
                                <select class="form-select font_weight_modal" name="input" id="EditUserRole" disabled>
                                </select>
                                <label for="input" class="input-padding">Role<span class="paddingm validate">*</span></label> 
                                <span class="paddingm float-start validate" id="site_error_edit"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Status</label>
                                <p class="fieldStyleSub p1" style="position: absolute;opacity:1;"><span id="EditUserStatus" class="font_weight_modal"></span></p>
                            </div>  
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Registered on</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserRegisteredOn" class="font_weight_modal"></span></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 fieldStyle">
                            <div class="box">
                                <div class="input-box fieldStyle" id="ExceptOpEdit">
                                    <input type="email" class="form-control input font_weight_modal" id="EditUserEmail" name="EditUserEmail" disabled="disabled" >
                                    <label for="input" class="input-padding">User Email<span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="email_err"></span> 
                                </div>
                                <div class="input-box fieldStyle" id="OperatorCredentialEdit" style="display: none;">
                                    <input type="text" class="form-control input font_weight_modal" id="EditOpUserID" name="EditOpUserID" disabled="disabled">
                                    <label for="input" class="input-padding">User ID<span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="email_err"></span> 
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <select class="inputSiteNameAdd form-select font_weight_modal" name="EditUserSiteName" id="EditUserSiteName">
                                </select>
                                <label for="input" class="input-padding">Site Name<span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="sitename_error_edit"></span> 
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Site ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserSiteId" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="EditUserFName" name="EditUserFName">
                                <label for="inputMachineRateHour" class="input-padding">First Name<span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="EditUserFNameErr"></span> 
                                <span class="float-end charCount" id="EditUserFNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="EditUserLName" name="EditUserLName">
                                <label for="inputMachineOffRateHour" class="input-padding">Last Name<span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="EditUserLNameErr"></span> 
                                <span class="float-end charCount" id="EditUserLNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Site Location</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserLocation" class="font_weight_modal">Sample</span></p>
                            </div>  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="EditUserPhone" name="EditUserPhone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputMachineOffRateHour" class="input-padding">Phone<span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="EditUserPhoneErr"></span> 
                                <!-- <span class="float-end charCount">Character Count</span> -->
                            </div>
                        </div>
                        <!-- tmeporary hide for mathan sir instruction -->
                        <div class="col-sm-6 box">
                        <!--<div id="visible_creation_edit">
                                <div class="row" id="">
                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="input-box fieldStyle">
                                                <input type="text" class="form-control input font_weight" id="EditUser_newsite" name="EditUser_newsite">
                                                <label for="input" class="input-padding">Site Name</label>
                                                <span class="paddingm float-start validate" id="EditUser_newsite_err"></span>
                                                <span class="float-end charCount" id="EditUser_newsite_count"></span>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="box">
                                            <div class="input-box fieldStyle">
                                                <input type="text" class="form-control input font_weight" id="EditUser_location" name="EditUser_location">
                                                <label for="input" class="input-padding">Location</label>
                                                <span class="paddingm float-start validate" id="EditUser_location_err"></span>
                                                <span class="float-end charCount" id="EditUser_newsite_count"></span>
                                            </div>
                                        </div> 
                                    </div> 
                                </div>
                            </div> -->

                        <!-- temporary hide end  -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <input type="text" class="form-control input font_weight_modal" id="EditUserDesignation" name="EditUserDesignation">
                                    <label for="input" class="input-padding">Designation<span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate" id="EditUserDesignationErr"></span>
                                    <span class="float-end charCount" id="EditUserDesignationCunt"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <div class="input-box fieldStyle">
                                    <select class="inputDepartmentAdd form-select font_weight_modal" name="EditUserDepartment" id="EditUserDepartment">
                                    </select>
                                    <label for="input" class="input-padding">Department<span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate d-none" id="dept_err"></span> 
                                    <!-- <span class="float-end charCount">Character Count</span> -->
                                </div>
                            </div>
                            <!-- <div class="box fieldStyle" >
                                <div class="flex-container textCenter float-start ACControl" id="ACControl" style="display: none;">
                                    <label for="input" class="float-start" style="margin-right:1rem;margin-top:0.3rem;">Access Control</label>
                                    <div class="dotAccess dot-css acsControl_edit" style="margin-left: 2rem;font-size:2rem;"><img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class=" dot-cont" style="height: 1.5rem;width: 1.5rem;"></i></div>
                                </div>
                            </div> -->
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-sm-6 box">
                                    <div class="input-box fieldStyle">
                                        <label for="" class="col-form-label paddingm headTitle">Last Updated By</label>
                                        <p class="fieldStyleSub" style="position: absolute;word-wrap: break-word;"><span id="EditUserUpdatedBy" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 box">
                                    <div class="input-box fieldStyle">
                                        <label for="" class="col-form-label paddingm headTitle">Last Updated On</label>
                                        <p class="fieldStyleSub" style="position: absolute;"><span id="EditUserUpdatedOn" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box fieldStyle" >
                                <div class="flex-container textCenter float-start ACControl" id="ACControl" style="display: none;">
                                    <label for="input" class="float-start" style="margin-right:1rem;margin-top:0.3rem;">Access Control</label>
                                    <div class="dotAccess dot-css acsControl_edit" style="margin-left: 2rem;font-size:2rem;"><img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class=" dot-cont" style="height: 1.5rem;width: 1.5rem;"></i></div>
                                </div>
                            </div>
                            <!-- <div class="box">
                                <div class="input-box fieldStyle">
                                    <select class="inputDepartmentAdd form-select font_weight_modal" name="EditUserDepartment" id="EditUserDepartment">
                                    </select>
                                    <label for="input" class="input-padding">Department<span class="paddingm validate">*</span></label>
                                    <span class="paddingm float-start validate d-none" id="dept_err"></span> 
                                    <!-- <span class="float-end charCount">Character Count</span> --
                                </div>
                             
                            </div> -->
                           
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditUserData btn fo bn saveBtnStyle" name="" value="Save" data_val="">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>
<!-- edit user modal end -->

<!----user info modal ---->
<div class="modal fade" id="InfoUserModal" tabindex="-1" aria-labelledby="InfoUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="InfoUserModal1" style="">USER INFO</p>
            </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Role</label>
                                <p class="" ><span id="UserRole" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-3 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Status</label>
                                <p class="info-mar"><span id="UserStatus" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-3 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Registered on</label>
                                <p class=""><span id="UserRegisteredOn" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-sm-6">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">User ID</label>
                                <p class=""><span id="UserId" class="font_weight_modal"></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-3">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Site Name</label>
                                <p class=""><span id="UserSiteName" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-3">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Site ID</label>
                                <p class=""><span id="UserSiteId" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">First Name</label>
                                <p class=""><span id="UserFirstName" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-3 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Last Name</label>
                                <p class=""><span id="UserLastName" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-6 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Site Location</label>
                                <p class=""><span id="UserSiteLocation" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-sm-6 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Phone</label>
                                <p class=""><span id="UserPhone" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-sm-6 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Department</label>
                                <p class=""><span id="UserDepartment" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Designation</label>
                                <p class=""><span id="UserDesignation" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                         <div class="col-sm-6 center-align">
                            <div class="ACControl cen-align" style="display: flex;">
                                <label for="input" class="float-start">Access Control</label>
                                <div style="margin-left: 1.3rem;" class="marleftDot float-start dotAccess_userinfo dot-css acsControl_info"><img src="<?php echo base_url('assets/img/oui_arrow.png') ?>" class="img_font_wh dot-cont" style="justify-content: center;margin-left:0.6rem;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Last Updated By</label>
                                <p class=""><span id="UserLastUpdatedBy" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                        <div class="col-lg-4 box">
                            <!-- <div class="fieldStyleInfo"> -->
                                <label for="" class="col-form-label headTitle">Last Updated On</label>
                                <p class=""><span id="UserLastUpdatedOn" class="font_weight_modal "></span></p>
                            <!-- </div> -->
                        </div>
                    </div>             
                </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
            </div>
    </div>
  </div>
</div>
<!-- user info modal end -->

<!-- filter modal start -->
<div class="modal fade" id="FilterUserModal" tabindex="-1" aria-labelledby="FilterUserModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
            <h5 class="modal-title settings-machineAdd-model" id="FilterUserModal1" style="">FILTER USERS</h5>
        </div>
        <form method="" class="addMachineForm" action="">
            <div class="modal-body">
                <div class="d-flex">
                    <p style="font-family:'Roboto', sans-serif;color:#8c8c8c;font-size:0.9rem;">Registered on</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 fieldStyle box">
                        <div class="input-box paddingm">
                            <input type="datetime-local" class="form-control" id="filterFrom" name="filterFrom" >
                            <label for="filterFrom" class="input-padding">From Date</label>
                        </div>
                    </div> 
                    <div class="col-lg-3 fieldStyle box">
                        <div class="input-box paddingm">
                            <input type="datetime-local" class="form-control" id="filterTo" name="filterTo">
                            <label for="filterTo" class="input-padding">To Date</label>
                        </div>
                    </div>
                    <div class="col-lg-6 box">
                        <div class="input-box fieldStyle">
                            <select class="form-select" name="filterStatus" id="filterStatus">
                                <option selected value="all">All</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            <label for="filterStatus" class="input-padding">Status</label>
                        </div>
                    </div>            
                </div>
                <div class="row"> 
                    <div class="col-lg-6 box">
                        <div class=" input-box fieldStyle">
                            <input type="text" class="form-control" id="filterkey" name="filterkey" placeholder="Type Keyword"> 
                            <label for="filterkey" class="input-padding">Keyword</label> 
                        </div>
                    </div>
                    <div class="col-lg-6 box">
                        <div class=" input-box fieldStyle">
                            <select class="form-select" name="filterSiteName" id="filterSiteName">
                            </select> 
                            <label for="filterSiteName" class="input-padding">Site Name</label>
                        </div>
                    </div>
                </div>
                <div class="row">   
                    <div class="box col-lg-6">
                        <div class="input-box fieldStyle">
                            <select class="form-select" name="filterRole" id="filterRole"></select>
                            <label for="filterRole" class="input-padding">Roles</label>
                        </div>
                    </div>
                    <div class="col-lg-6 box">
                        <div class="input-box fieldStyle">
                            <select class="form-select" name="filterLastUpdatedBy" id="filterLastUpdatedBy">
                            </select>
                            <label for="filterLastUpdatedBy" class="input-padding">Last Updated By</label>
                        </div>
                    </div>
                </div>                    
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="Add_Filter btn fo bn saveBtnStyle" name="" value="Apply">Apply</a>
                <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
            </div>
        </form>
    </div>
  </div>
</div>
<!-- filter modal end -->

<!-- modal for forgot password  Operator-->
<div class="modal fade" id="forgot-modal" tabindex="-1" aria-labelledby="ActiveToolModal1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
        <div class="modal-content bodercss container">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="ActiveToolModal1" style="">CHANGE PASSWORD</h5>
            </div>
            <div class="modal-body">
                <div class="p-1">
                    <!-- <form method="post" action="<?= base_url('Operator/');?>" > -->
                        <div class="box">
                            <div class="input-box fieldStyle">
                                <input type="password" class="form-control input" id="forgot_pass" lvalue=" " name="sitepass" oninput="this.value=this.value.trim()">
                                <label for="input" class="input-padding">New Password</label>
                                <span class="unit"><i id="eye_pass_forgot" class="fa fa-eye-slash  clip_reset showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                                <span class="paddingm float-start validate" id="op_new_pass_err" ></span> 
                            </div>
                        </div>
                        <div class="box">
                            <div class="input-box fieldStyle">
                                <input type="password" class="form-control input" id="forgot_confirm_pass" name="sitepass1" oninput="this.value=this.value.trim();">
                                <label for="input" class="input-padding">Confirm Password</label>
                                <span class="unit"><i id="eye_repass_forgot" class="fa fa-eye-slash clip_reset showpass" style="font-size: 20px;" aria-hidden="true"></i></span>
                                <span class="paddingm float-start validate" id="op_confirm_pass_err" ></span>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn forgot_pass_siteadmin saveBtnStyle" name="" value="Save">Save</a>
                <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
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


<!-- modal end for site admin forgot password  -->

<script src="<?php echo base_url()?>/assets/js/settings_user_validation.js?version=<?php echo rand() ; ?>"></script>
<script src="<?php echo base_url()?>/assets/js/custom_date_format.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript">
    var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
    var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";

    var example = new Array();
    var UserIdRef ="<?php echo($this->data['user_details'][0]['user_id'])?>";
    var SiteIdRef = "<?php echo($this->data['user_details'][0]['site_id'])?>";

    // add user model open close event for input fields reset
    $(document).on('click','#add_user_model',function(event){
        // event.preventDefault();
        // event.stopPropagation();
        // reset all input fields
        $('#inputRoleAdd').val(" ");
        $('#inputOpUserID').val('');
        $('#inputUserEMail').val('');
        $('#inputUserFirstName').val('');
        $('#inputUserLastName').val('');
        $('#inputUserPhone').val('');
        $('#pass_op').val('');
        $('#re_pass_op').val('');
        $('#inputUserDesignation').val('');
        $('#inputUserSiteDepartment').val(' ');
        $('.noAccess').css("display","block");
        
        // $('#form_add_user')[0].reset();
        $('.access-save').css("display","inline");
        $('#inputUserSiteName').removeAttr("disabled");
        $('#inputUserSiteDepartment').removeAttr("disabled");

        if (UserRoleRef != "Site Admin") {
            $('#SiteID').empty();
            $('#SiteLocation').empty();
        }
        var add_data_error = "adduser";
        error_show_remove(add_data_error);

        $('#pass_op_visible').css("display","none");
        $('#ACControl').css("display","block");
        $(".new_site_box").css("display","none");
        
        $(".CreateUser").removeAttr("disabled");
        $('#AddUserModal').modal('show');
        get_site_name();
    });

    // add user  submit function 
    $('.CreateUser').on('click',function(event){
        event.preventDefault();
        event.stopPropagation();
        var a = inputUserEMail();
        var b = inputUserFirstName();
        var c = inputUserLastName();
        var d = inputUserPhone();
        var e = inputUserDesignation();
        var f = inputOpUserID();
        var g = passwordCheck();
        var h = retypepass();
        var i = inputSiteNameAdd();
        var j= inputLocationAdd();
        if ($('#inputUserSiteDepartment').val() == null) {
            var k = "*Required field";
        }else{
            var k = "";
        }
        

        if ($('#inputUserSiteName').val() == "all") {
            $("#sitename_error").css("display","block");
            $(".CreateUser").attr("disabled", true);
        }
        else if($('#inputRoleAdd').val() == null) {
            $('#validate_role').html(required);
            $("#inputUserFirstNameErr").html(b);
            $("#inputUserLastNameErr").html(c);
            $("#inputUserPhoneErr").html(d);
            $("#inputUserDesignationErr").html(e);
            $("#inputUserEMailErr").html(a);
            $('#inputOpUserIDErr').html(f);
            $('#re_pass_op_err').html(h);
            $('#pass_op_err').html(g);
            $("#location_name_err").html(j);
            $("#inputUsernew_site_err").html(i);
            $("#input_dept_err").html(k);

            $(".CreateUser").attr("disabled", true);
        }
        else{
            $("#sitename_error").css("display","none");
            $("#validate_role").html(success);

            if (  b!="" || c!="" || d!="" || e!="" || k!="") {
                $("#inputUserFirstNameErr").html(b);
                $("#inputUserLastNameErr").html(c);
                $("#inputUserPhoneErr").html(d);
                $("#inputUserDesignationErr").html(e);
                $("#input_dept_err").html(k);
                $(".CreateUser").attr("disabled", true);
            }
            else{
                var site_name = $('#inputUserSiteName').val();
                if (site_name == " ") {
                      $(".CreateUser").attr("disabled", true);
                }
                  var new_site_name = $('#new_site_name').val();
                  var new_site_location = $('#location_name').val();

                  var role = $('#inputRoleAdd').val();
                if (role != "Operator") {
                    //alert(site_name);
                    if ((site_name!=null)) {
                        var User_Email = $('#inputUserEMail').val();
                        var User_First_Name = $('#inputUserFirstName').val();
                        var User_Last_Name = $('#inputUserLastName').val();
                        var User_Phone = $('#inputUserPhone').val();
                        var User_Designation = $('#inputUserDesignation').val();
                        var User_Site_Name = $('#inputUserSiteName').val();
                        var User_Department = $('#inputUserSiteDepartment').val();
                        var FDrillDown = $('input[name="ooe_f_drill_down"]:checked').val();
                        var Opportunityinsights = $('input[name="opportunity_insights"]:checked').val();
                        var OEEDrillDown = $('input[name="ooe_drill_down"]:checked').val();
                        var OUI = $('input[name="oui"]:checked').val();
                        var PDM = $('input[name="pdm"]:checked').val();
                        var SMachine = $('input[name="settings_macine"]:checked').val();
                        var SPart = $('input[name="settings_part"]:checked').val();
                        var SGeneral = $('input[name="settings_general"]:checked').val();
                        var SUser = $('input[name="settings_user"]:checked').val();

                        var DailyProduction = $('input[name="dpd"]:checked').val();
                        var Current_Shift = $('input[name="csp"]:checked').val();
                        var Production_Quality = $('input[name="pq"]:checked').val();
                        var Production_Downtime = $('input[name="pd"]:checked').val();
                        var Work_Order_Management = $('input[name="wom"]:checked').val();
                        var Alert_Management = $('input[name="alm"]:checked').val();



                        User_First_Name = User_First_Name.trim();
                        User_Last_Name = User_Last_Name.trim();
                        $("#input_dept_err").html('');
                        $("#overlay").fadeIn(300);

                        $.ajax({
                            url: "<?php echo base_url('User_controller/createNewUser'); ?>",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            data:{
                                User_Email:User_Email,
                                User_First_Name:User_First_Name,
                                User_Last_Name:User_Last_Name,
                                User_Phone:User_Phone,
                                User_Designation:User_Designation,
                                Role:role,
                                User_Site_Name:User_Site_Name,
                                User_Department:User_Department,
                                User_Ref:UserNameRef,
                                FDrillDown:FDrillDown,
                                Opportunityinsights:Opportunityinsights,
                                OEEDrillDown:OEEDrillDown,
                                OUI:OUI,
                                PDM:PDM,
                                SMachine:SMachine,
                                SPart:SPart,
                                SGeneral:SGeneral,
                                SUser:SUser,
                                new_site_name:new_site_name,
                                new_site_location:new_site_location,

                                DailyProduction:DailyProduction,
                                Current_Shift:Current_Shift,
                                Production_Quality:Production_Quality,
                                Production_Downtime:Production_Downtime,
                                Work_Order_Management:Work_Order_Management,
                                Alert_Management:Alert_Management,
                            },
                            success:function(res){
                                if (res == true) {
                                    // after insert user load the div function
                                    get_all_user();
                                    // after add user close the modal
                                    $('#AddUserModal').modal('hide');
                                    // document.body.classList.remove('demo_class');
                                    $("#overlay").fadeOut(300);
                                }
                            },
                            error:function(res){
                                // alert("Sorry!Try Agian!!");
                                // document.body.classList.remove('demo_class');
                                $("#overlay").fadeOut(300);
                            }
                        });
                    }else{
                        $('#sitename_error').css("display","inline");
                        $('#sitename_error').html('* required Field');
                    }
                }
                else{
                    var User_First_Name = $('#inputUserFirstName').val();
                    var User_Last_Name = $('#inputUserLastName').val();
                    var User_Phone = $('#inputUserPhone').val();
                    var User_Site_ID = $('#inputUserSiteName').val();
                    var User_ID = $('#inputOpUserID').val();
                    var User_Site_Name = $('#inputUserSiteName').val();
                    var User_Department = $('#inputUserSiteDepartment').val();
                    var User_Designation = $('#inputUserDesignation').val();
                    var new_site_name = $('#new_site_name').val();
                    var new_site_location = $('#location_name').val();
                    var pass = $('#pass_op').val();
                    var repass = $('#re_pass_op').val();
                    $("#input_dept_err").html('');
                    if (pass.localeCompare(repass)== 0) {
                        // $("#overlay").fadeIn(300);
                        // alert(User_Site_ID);
                        if (User_Site_ID !=null) { 
                            $.ajax({
                                url: "<?php echo base_url('User_controller/createNewUser_op'); ?>",
                                type: "POST",
                                cache: false,
                                data:{
                                    User_First_Name:User_First_Name,
                                    userName:User_ID,
                                    User_Last_Name:User_Last_Name,
                                    User_Phone:User_Phone,
                                    Role:role,
                                    User_Site_Name:User_Site_Name,
                                    User_Site_ID:User_Site_ID,
                                    User_Department:User_Department,
                                    User_Designation:User_Designation,
                                    user_id:UserNameRef,
                                    pass:pass,
                                },
                                dataType: "json",
                                success:function(res){
                                    if (res == true) {
                                        // after insert user load the div function
                                        get_all_user();
                                        // after add user close the modal
                                        $('#AddUserModal').modal('hide');
                                        $("#overlay").fadeOut(300);
                                    }
                                },
                                error:function(res){
                                    // alert("Sorry!Try Agian!!");
                                    $("#overlay").fadeOut(300);
                                }
                            });
                            
                        }
                        else{
                            $('#sitename_error').css("display","inline");
                            $('#sitename_error').html('* required Field');
                        }
                    }else{
                        $('#pass_op_err').html("*Password mismatch");
                        $('#re_pass_op_err').html('*Password mismatch');
                    }
                }
            }
        }   
    });

    $(document).on("change","#inputUserSiteDepartment",function(){
        $("#input_dept_err").html('');
        $(".CreateUser").removeAttr("disabled");
    });


    // info access control 
    $(document).on("click",".acsControl_info",function(){
        var userid = $('#UserId').attr("user_id_data");
        var user_role = $('#UserRole').text();
        if (user_role == "Site Users") {
            $('.user_account_access').css("display","none");
            $('.machine_add_del_check').css("display","none");
        }
        else if (user_role == "Site Admin") {
            $('.user_account_access').css("display","inline");
            $('.machine_add_del_check').css("display","none");
        }
        else if (user_role == "Smart Users") {
            $('.user_account_access').css("display","inline");
            $('.machine_add_del_check').css("display","inline");
            $('.machine_add_del_check').css("display","flex");
        }
        else{
            $('.user_account_access').css("display","inline");
            // $('.create_del_visible').css("display","inline");
        }
        $('.cancel_access_control').attr("data_check","user_info");
        $('.cancel_access_control').attr("info_id",userid);
        $('.cancel_access_control').attr("can_data",user_role);
        //get_edit_access_control(userid,user_role);
        $('#AccessControlModal').modal('show');

    });



    // get all site name function
    // document ready function ajax for get site name dropdown function
    function get_site_name(){
        var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
        var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";
        var site_id = "<?php echo($this->data['user_details'][0]['site_id']); ?>";
        $('#inputUserSiteName').empty();
        $.ajax({
            url: "<?php echo base_url('User_controller/getSiteName'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            data:{
                UserNameRef:UserNameRef,
                UserRoleRef:UserRoleRef,
            },
            success:function(res_Site){
                if (UserRoleRef != "Site Admin") {
                    var elements = $('<option value="0" disabled selected="true">Select Site</option>');
                    elements = elements.add('<option value="new_site" id="new_site_visible">Add Site</option>');
                }
                res_Site.forEach(function(item){
                    // alert(site_id+" "+item.site_id);
                    if (site_id == item.site_id && UserRoleRef == "Site Admin") {
                        $('#inputUserSiteName').empty();
                        $('#inputUserSiteName').append('<option value="'+item.site_id+'" class="opt_sitname">'+item.site_name+' -'+item.site_id+'</option>');
                        // find_site_location(site_id);
                        get_site_location(site_id);
                    }else if (UserRoleRef != "Site Admin"){
                        elements = elements.add('<option value="'+item.site_id+'" class="opt_sitname">'+item.site_name+' -'+item.site_id+'</option>');
                        $('#inputUserSiteName').append(elements);
                    }
                });
            },
            error:function(res){
                // alert("Sorry!Try Agian SiteName!!");
            }

        });
    }


    // get dropdwon for function
    function get_dropdown_function(){
         // get department details for dropdown function 
        $('#inputUserSiteDepartment').empty();
        $.ajax({
            url : "<?php echo base_url('User_controller/getdept'); ?>",
            method: "post",
            dataType: "json",
            cache: false,
            success:function(res){
                var elements = $('<option value=" " selected="true" disabled>Select Department</option>');
                res.forEach(function(item){ 
                    elements = elements.add('<option value="'+item.dept_id+'">'+item.department+'</option>');
                    $('#inputUserSiteDepartment').append(elements);
                });
            },
            error:function(res_err){
                // alert("Sorry Try Again");
            }
        });
    }

    // this function for site admin after login get site location
    function get_site_location(site_id){
        $.ajax({
            url: "<?php echo base_url('User_controller/getSite'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                Sname : site_id
            },
            success:function(res_Site){
                $('#SiteID').html(
                    res_Site['site'][0].site_id
                );
                $('#SiteLocation').html(
                    res_Site['location'][0].location
                );   
            },
            error:function(res){
                // alert("Sorry! Try Agian!!");
            }
        });
    }
    
// document ready function
$(document).ready(function(){
    // get retrive all the user
    get_all_user();
    // get site name dropdown
    get_site_name();
    // get department dropdown 
    get_dropdown_function();
    $('#pass_op_visible').css("display","none");
    $(".new_site_box").css("display","none");
    $(".new_site_box").css("display","none");
             
    // this function for date format changeing function 
    function getdate(date){
        var currentdate = new Date(date);
        var date_only = currentdate.getFullYear() + "-"
            +currentdate.toLocaleString('en-us',{month:'short'})+"-"
            +currentdate.toLocaleString('en-us',{day:'2-digit'})
        return date_only;
    }
    //Access Control Options for privillages setting function
    var acsCon = <?php echo $this->data['access'][0]['settings_user_management']; ?>;
    if(acsCon < 2){
        $('.edit-user').css("display","none");
        $('.activate-user').css("display","none");
        $('.deactivate-user').css("display","none");
        $('.info-user').css("display","block");
    }
    else{
        $('.edit-user').css("display","block");
        $('.activate-user').css("display","block");
        $('.deactivate-user').css("display","block");
        $('.info-user').css("display","none");
    }

    function find_site_location(site_id) {
        $.ajax({
            url: "<?php echo base_url('User_controller/getSite'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                Sname : site_id
            },
            success:function(res_Site){
                $('#SiteID').html(
                    res_Site['site'][0].site_id
                );
                $('#SiteLocation').html(
                    res_Site['location'][0].location
                );  
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    }
    
    // on change site name  function
    $('#inputUserSiteName').on('change', function(event) {
        // event.preventDefault();
        // event.stopPropagation();
        if( this.value == 'new_site'){
            $('#SiteID').empty();
            $('#SiteLocation').empty();
            $("#new_site_name").val("");
            $("#location_name").val("");
            $('#inputUserSiteName').attr("disabled",true);
            $('#inputRoleAdd').val("Site Admin");
        }
        else{
            var role = $('#inputRoleAdd').val();
            find_site_location(this.value);
        }
    });

    // click access control function for arrow icon
    $(document).on("click", ".acsControl", function(event){
        event.preventDefault();
        event.stopPropagation();
        // alert('fhber');
        var user = $('#inputRoleAdd').val();
        //var edituser = $('#EditUserRole').val();
       // alert(user);
        if ((user !== "" && user == null)) {
            alert('please Select User Role');
        }else{
            $('.cancel_access_control').attr("can_adata",user);
            $('.cancel_access_control').attr("data_check","add_user");
            $('#AccessControlModal').modal('show');
            /*
            $.ajax({
                url: "<?php echo base_url('User_controller/getUserRole'); ?>",
                type: "POST",
                dataType: "json",
                cache: false,
                data:{
                    userRole:user,
                },
                success:function(res_role){
                    $("input[name=ooe_f_drill_down][value='"+res_role.Financial_Drill_Down+"']").prop("checked",true);
                    $("input[name=opportunity_insights][value='"+res_role.Financial_Opportunity_Insights+"']").prop("checked",true);
                    $("input[name=ooe_drill_down][value='"+res_role.OEE_Drill_Down+"']").prop("checked",true);
                    $("input[name=oui][value='"+res_role.Operator_User_Interface+"']").prop("checked",true);
                    $("input[name=pdm][value='"+res_role.Production_Data_Management+"']").prop("checked",true);
                    $("input[name=settings_macine][value='"+res_role.Settings_Machine+"']").prop("checked",true);
                    $("input[name=settings_part][value='"+res_role.Settings_Parts+"']").prop("checked",true);
                    $("input[name=settings_general][value='"+res_role.Settings_General+"']").prop("checked",true);
                    $("input[name=settings_user][value='"+res_role.Settings_User_Management+"']").prop("checked",true);

                    $('#AccessControlModal').modal('show');
                },
                error:function(res){
                    alert("Sorry!Try Agian!0!");
                }
            });
            */
        }
    });
    // cancel button reset access control
    $(document).on("click",".cancel_access_control",function(event){
        event.preventDefault();
       var user = $('.cancel_access_control').attr("can_adata");
       var check_data = $('.cancel_access_control').attr("data_check");
        if (check_data ==="add_user") {
            get_access_control(user);
        }
        else if(check_data ==="edit_user"){
            var usrid = $('.cancel_access_control').attr("edit_id");
            get_edit_access_control(usrid,user);
        }
        else if(check_data ==="info_user"){
            var usrid = $('.cancel_access_control').attr("info_id");
            get_edit_access_control(usrid,user);
        }
        
    });

    // back button reset the access control
    $(document).on("click",".back_btn_access",function(event){
        event.preventDefault();
       var user = $('.cancel_access_control').attr("can_adata");
       var check_data = $('.cancel_access_control').attr("data_check");
        if (check_data ==="add_user") {
            get_access_control(user);
        }
        else if(check_data ==="edit_user"){
            var usrid = $('.cancel_access_control').attr("edit_id");
            get_edit_access_control(usrid,user);
        }
        else if(check_data ==="info_user"){
            var usrid = $('.cancel_access_control').attr("info_id");
            get_edit_access_control(usrid,user);
        }
        
    });


    // edit access control
    $(document).on('click','.acsControl_edit',function(){
        var edituser = $('#EditUserRole').val();
        if ((edituser !== "" && edituser == null)) {
            alert('please Select User Role');
        }else{
            if (edituser == "Site Users") {
                // $('.user_account_access').css("display","none");
                $('.machine_add_del_check').css("display","none");
                $('.noAccess').css("display","none");
            }
            else if (edituser == "Site Admin") {
                // $('.user_account_access').css("display","inline");
                $('.machine_add_del_check').css("display","none");
                $('.noAccess').css("display","block");
            }
            else if(edituser == "Smart Users"){
                $('.noAccess').css("display","block");
                $('.machine_add_del_check').css("display","inline");
                $('.machine_add_del_check').css("display","flex");
            }
            else{
                // $('.user_account_access').css("display","inline");
                $('.noAccess').css("display","none");
                // $('.create_del_visible').css("display","inline");

            }
            var userid = $('.EditUserData').attr("data_val");
            $('.cancel_access_control').attr("can_data",edituser);
            $('.cancel_access_control').attr("data_check","edit_user");
            $('.cancel_access_control').attr("edit_id",userid);
            // get_edit_access_control(userid,edituser);
            $("#AccessControlModal :input").removeAttr("disabled");
            $('#AccessControlModal').modal('show');
        }
    });

    // change user role for dropdwon function 
    $(document).on("change", "#inputRoleAdd", function(event){
        error_show_remove("adduser");
        var user = $('#inputRoleAdd').val();
        $('.CreateUser').removeAttr("disabled");
        if (user == "Smart Users") {
            get_access_control(user);
            $("#AccessControlModal :input").removeAttr("disabled");
            // if you select smart user display none the new site and location input
            $(".new_site_box").css("display","none");
            $('#OperatorCredential').css("display","none");
            $('#ExceptOp').css("display","inline");
            $('#pass_op_visible').css("display","none");
            $('#inputUserSiteDepartment').val(4);
            $('#inputUserSiteDepartment').attr("disabled",true);
            $('.user_account_access').css("display","inline");
            // $('.create_del_visible').css("display","inline");
            $('#new_site_location').css('display','none');
            $('.noAccess').css("display","block");

            $('.machine_add_del_check').css("display","inline");
            $('.machine_add_del_check').css("display","flex");
            
            document.getElementsByClassName('opt_sitname')[0].style.display="inline";
            document.getElementsByClassName('opt_sitname')[0].selected="true";
            $('#inputUserSiteName').attr("disabled",true);
            find_site_location($('#inputUserSiteName').val());

            // $('#inputUserEMail').val('');
            $('#inputOpUserID').val('');
            $('#inputUserEMail').val('');
            $('#inputUserFirstName').val('');
            $('#inputUserLastName').val('');
            $('#inputUserPhone').val('');
            $('#pass_op').val('');
            $('#re_pass_op').val('');
            $('#inputUserDesignation').val('');
            $('#new_site_name').val('');
            $('#location_name').val('');
        }
        else if(user == "Site Admin"){
            get_access_control(user);
            $("#AccessControlModal :input").removeAttr("disabled");
            $('#ExceptOp').css("display","inline");
            $('#OperatorCredential').css("display","none");
            $('#pass_op_visible').css("display","none");
            $('#new_site_visible').css("display","inline");
            $('#inputUserSiteDepartment').val(4);
            $('#inputUserSiteDepartment').attr("disabled",true);
            // $('#inputUserSiteName').removeAttr("disabled");
            $('.user_account_access').css("display","inline");
            // $('.create_del_visible').css("display","inline");
            $('.machine_add_del_check').css("display","none");
            $('#inputUserSiteName').val("new_site");
            $('#inputUserSiteName').attr("disabled",true);
            $('#SiteID').css("display","inline");
            $('#SiteLocation').css("display","inline");
            $('.noAccess').css("display","block");
          
            // if you select site admin visible the site name and location
            $(".new_site_box").css("display","inline");
            $(".new_site_box").css("display","inline");
            document.getElementsByClassName('opt_sitname')[0].style.display="none";

            $('#SiteID').empty();
            $('#SiteLocation').empty();

            // role after change remove fields input
            $('#inputOpUserID').val('');
            $('#inputUserEMail').val('');
            $('#inputUserFirstName').val('');
            $('#inputUserLastName').val('');
            $('#inputUserPhone').val('');
            $('#pass_op').val('');
            $('#re_pass_op').val('');
            $('#inputUserDesignation').val('');
            $('#new_site_name').val(' ');
            $('#location_name').val(' ');

        }
        else if(user == "Site Users"){
            get_access_control(user);
            // $('.create_del_visible').css("display","inline");
            $("#AccessControlModal :input").removeAttr("disabled");
            $('.new_site_box').css("display","none");
            $('#ACControl').css("display","inline");
            $('#pass_op_visible').css("display","none");
            $('#OperatorCredential').css("display","none");
            $('#new_site_visible').css("display","none");
            
            $('#inputUserSiteDepartment').val(" ");
            $('#inputUserSiteDepartment').removeAttr("disabled");

            var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";
            if (UserRoleRef !="Site Admin") {
                document.getElementsByClassName('opt_sitname')[0].style.display="none";
                $('#SiteID').empty();
                $('#SiteLocation').empty();
                $('#inputUserSiteName').val("0");
                $('#inputUserSiteName').removeAttr("disabled");
            }

            // after select site user role then disabled user account access
            $('.machine_add_del_check').css("display","none");
            $('.noAccess').css("display","none");

            // after change the role dropdown refresh the field
            $('#inputOpUserID').val('');
            $('#inputUserEMail').val('');
            $('#inputUserFirstName').val('');
            $('#inputUserLastName').val('');
            $('#inputUserPhone').val('');
            $('#pass_op').val('');
            $('#re_pass_op').val('');
            $('#inputUserDesignation').val('');
            $('#new_site_name').val('');
            $('#location_name').val('');
        }

        else if(user == "Operator"){
            $('#pass_op_visible').css("display","inline");
            $('#OperatorCredential').css("display","inline");
            $('#ExceptOp').css("display","none");
            $('#inputUserSiteDepartment').val(1);
            $('#inputUserSiteDepartment').attr("disabled",true);
            // if you select operator display none the new site and location input
            $(".new_site_box").css("display","none");
            $(".new_site_box").css("display","none");
            $('#ACControl').css("display","none");

            var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";
            if (UserRoleRef !="Site Admin") {
                document.getElementsByClassName('opt_sitname')[0].style.display="none";
                $('#SiteID').empty();
                $('#SiteLocation').empty();
                $('#inputUserSiteName').removeAttr("disabled");
                $('#inputUserSiteName').val("0");
            }

            $('#SiteID').css("display","inline");
            $('#SiteLocation').css("display","inline");
            $('#new_site_visible').css("display","none");

            // after change the role dropdown refresh the fields
            $('#inputOpUserID').val('');
            $('#inputUserEMail').val('');
            $('#inputUserFirstName').val('');
            $('#inputUserLastName').val('');
            $('#inputUserPhone').val('');
            $('#pass_op').val('');
            $('#re_pass_op').val('');
            $('#inputUserDesignation').val('');
        }else{
          
            // if you select role display none the new site and location input
            $(".new_site_box").css("display","none");
            $(".new_site_box").css("display","none");
            document.getElementsByClassName('opt_sitname')[0].style.display="none";
            $('#SiteID').css("display","inline");
            $('#SiteLocation').css("display","inline");
            $('#pass_op_visible').css("display","none");
            $('#new_site_visible').css("display","none");
            $('#inputUserSiteDepartment').val(4);
            $('#inputUserSiteDepartment').removeAttr("disabled");
            $('#inputUserSiteName').removeAttr("disabled");
            $('#inputUserSiteName').val("0")
            $('#SiteID').empty();
            $('#SiteLocation').empty();

        }
            
        
    });
        
    // edit option submenu click function
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


    // deactivate ajax function for user status chengeing function
    $(document).on("click", ".deactivate-user", function(event){
        event.preventDefault();
        event.stopPropagation();  
        var id = $(this).attr("lvalue");
        var status = $(this).attr("svalue");
        var role = $(this).attr("rvalue");
        var site_id = $(this).attr("site_id");
        $('.Status-deactivate').attr('lvalue',id);
        $('.Status-deactivate').attr('svalue',status);
        $('.Status-deactivate').attr('rvalue',role);
        $('.Status-deactivate').attr('site_id',site_id);

        if (role === "Site Admin") {
            $('#inactive_confirmation_msg').html('Are you sure you want to delete the site admin? <br> Note: The site will be inactive for all the users?');
        }else{
            $('#inactive_confirmation_msg').html('Are you sure you want to delete this user record?');
        }
       
        $('#DeactiveToolModal').modal('show');
    });

    // deactivate submit function
    $('.Status-deactivate').click(function(event){
        event.preventDefault();
        $("#overlay").fadeIn(300);
        var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
        var id = $(this).attr('lvalue');
        var status = $(this).attr('svalue');
        var role = $(this).attr('rvalue');
        var site_id = $(this).attr("site_id");
        $.ajax({
            url: "<?php echo base_url('User_controller/deactivateUser'); ?>",
            type: "POST",
            cache: false,
            data: {
                User_Id : id,
                Status_User: status,
                Updated_By:UserNameRef,
                Role:role,
                site_id:site_id
            },
            dataType: "json",
            success:function(res){
                if (res == true) {
                    // retrive all user
                    get_all_user();
                    // after deactivate the user close the modal
                    $('#DeactiveToolModal').modal('hide');
                    $("#overlay").fadeOut(300);
                }
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
                $("#overlay").fadeOut(300);
            }
        });
    }); 

// document ready function closing

// activate click to confirm message function
    $(document).on("click", ".activate-user", function(event){  
        event.preventDefault();
        event.stopPropagation();
        var id = $(this).attr("lvalue");
        var status = $(this).attr("svalue");
        var role = $(this).attr("rvalue");
        var site_id = $(this).attr("site_id");
        $('.Status-activate').attr('lvalue',id);
        $('.Status-activate').attr('svalue',status);
        $('.Status-activate').attr('rvalue',role);
        $('.Status-activate').attr('site_id',site_id);
        if (role === "Site Admin") {
            $('#active_confirmation_msg').html('Are you sure you want to activate the site admin? Note: The site will be active for all the users?');
        }else{
            $('#active_confirmation_msg').html('Are you sure you want to activate this user record?');
        }

        $('#ActiveToolModal').modal('show');
    }); 

// active user function
    $('.Status-activate').click(function(event){
        event.preventDefault();
        $("#overlay").fadeIn(300);
        var id = $(this).attr('lvalue');
        var status = $(this).attr('svalue');
        var role = $(this).attr('rvalue');
        var site_id = $(this).attr("site_id");
        $.ajax({
            url: "<?php echo base_url('User_controller/deactivateUser'); ?>",
            type: "POST",
            cache: false,
            data: {
                User_Id : id,
                Status_User: status,
                Updated_By:UserNameRef,
                Role:role,
                site_id:site_id
            },
            dataType: "json",
            success:function(res){
                if (res == true) {
                    // get all users
                    get_all_user();
                    // after activate the user close the modal
                    $('#ActiveToolModal').modal('hide');
                    $("#overlay").fadeOut(300);
                }
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
                $("#overlay").fadeOut(300);
            }
        });
    });

//in valid but confirmation 

// user info details ajax modal
    $(document).on("click", ".info-user", function(event){
        event.preventDefault();
        event.stopPropagation();

        var id = $(this).attr("lvalue");
        var role = $(this).attr("rvalue");
        var created_on = $(this).attr('con');
        var site = $(this).attr('site');
        $.ajax({
            url: "<?php echo base_url('User_controller/getUserData'); ?>",
            type: "POST",
            cache: false,
            data: {
                UserId : id,
                Role:role,
                Site_id:site,
            },
            dataType: "json",
            success:function(res_csp){
                if (res_csp['user_data'][0].status == 1) {
                    $('#UserStatus').html(
                        '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                    );
                }
                else{
                    $('#UserStatus').html(
                        '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                    }
                if (res_csp['user_data'][0].role != "Operator") {
                    $('.ACControl').css("display","block");
                }
                else{
                    $('.ACControl').css("display","none");
                }
                $('#UserRole').html(
                    res_csp['user_data'][0].role
                );
                $('#UserRegisteredOn').html(
                    created_on
                );
                $('#UserId').html(
                    res_csp['user_data'][0].username
                );
                $('#UserFirstName').html(
                    res_csp['user_data'][0].first_name
                );
                $('#UserSiteId').html(
                    res_csp['user_data'][0].site_id
                );
                $('#UserSiteName').html(
                    res_csp['site_name']
                );
                $('#UserLastName').html(
                    res_csp['user_data'][0].last_name
                );
                $('#UserSiteLocation').html(
                    res_csp['location']
                );
                $('#UserPhone').html(
                    res_csp['user_data'][0].phone
                );
                $('#UserDepartment').html(
                    res_csp['department']
                );
                $('#UserDesignation').html(
                    res_csp['user_data'][0].designation
                );
                $('#UserId').attr("user_id_data",res_csp['user_data'][0].user_id);
                $('#UserLastUpdatedBy').html(res_csp['last_updated_by'][0].first_name+" " + res_csp['last_updated_by'][0].last_name);
                var datetime = getdate_time( res_csp['user_data'][0].last_updated_on);
                $('#UserLastUpdatedOn').html(datetime);
                if(res_csp['user_data'][0].role != "Operator"){
                    $.ajax({
                        url: "<?php echo base_url('User_controller/EditUserRoleMaster'); ?>",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        data:{
                            userName:res_csp['user_data'][0].user_id,
                        },
                        success:function(res_role){
                            $("input[name=ooe_f_drill_down][value='"+res_role[0].oee_financial_drill_down+"']").prop("checked",true);
                            $("input[name=opportunity_insights][value='"+res_role[0].opportunity_insights+"']").prop("checked",true);
                            $("input[name=ooe_drill_down][value='"+res_role[0].oee_drill_down+"']").prop("checked",true);
                            $("input[name=oui][value='"+res_role[0].operator_user_interface+"']").prop("checked",true);
                            $("input[name=pdm][value='"+res_role[0].production_data_management+"']").prop("checked",true);
                            $("input[name=settings_macine][value='"+res_role[0].settings_machine+"']").prop("checked",true);
                            $("input[name=settings_part][value='"+res_role[0].settings_part+"']").prop("checked",true);
                            $("input[name=settings_general][value='"+res_role[0].settings_general+"']").prop("checked",true);
                            $("input[name=settings_user][value='"+res_role[0].settings_user_management+"']").prop("checked",true);
                                
                        },
                        error:function(res){
                            // alert("Sorry!ifTry Agian!!");
                        }
                    });
                    // getinfoaccess_control();
                }
                $("#AccessControlModal :input").attr("disabled", true);
                $(".CreateUser").attr("disabled", true);
            },
            error:function(res){
                // alert("Sorry!Try Agian!! user info");
            }
        });
        $('.access-save').css("display","none");
        $('#InfoUserModal').modal('show');
    });

// edit modal for ajax function
    $(document).on("click", ".edit-user", function(event){
        event.preventDefault(); 
        var id = $(this).attr("lvalue");
        var role = $(this).attr("rvalue");
        var status = $(this).attr("svalue");
        var sitename = $(this).attr('site');
        var created_on = $(this).attr('con');
        var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
        var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";

        // this ajax function for edit modal  retrive data then set the particular data for the particular user
        $.ajax({
            url: "<?php echo base_url('User_controller/getUserData'); ?>",
            type: "POST",
            cache: false,
            async:false,
            data: {
                UserId : id,
                Role:role,
                Site_id:sitename,

            },
            dataType: "json",
            success:function(res_csp){
                // console.log(res_csp);
                // active inactive user s condition
                if (res_csp['user_data'][0].status == 1) {
                    $('#EditUserStatus').html('<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>');
                }
                else{
                    $('#EditUserStatus').html('<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>');
                }
                // permissions for particular users condition
                $('#EditUserRegisteredOn').html(created_on);
                $('#ExceptOpEdit').css("display","none");
                $('#OperatorCredentialEdit').css("display","none");
                $('.ACControl').css("display","none");
                // read and write permissions for particular user role
                if(res_csp['user_data'][0].role != "Operator"){
                    // access control and basic adding  management user and operator
                    $('#EditUserEmail').val(res_csp['user_data'][0].username);
                    $("#EditUserEmail").attr("disabled", true);
                    $('#ExceptOpEdit').css("display","block");
                    $('#OperatorCredentialEdit').css("display","none");
                    $('.ACControl').css("display","block");
                }
                else{
                    // access control and basic adding operator user management user
                    $('#EditOpUserID').val(res_csp['user_data'][0].username);
                    $("#EditOpUserID").attr("disabled", true);
                    $('#ExceptOpEdit').css("display","none");
                    $('#OperatorCredentialEdit').css("display","block");
                    $('.ACControl').css("display","none");
                }
                 
                // get sitename for particular users site dropdown
                $('#EditUserSiteName').empty();
                var role = res_csp['user_data'][0].role;
                var site_id = res_csp['user_data'][0].site_id;
                $("#EditUserSiteName").css("display","inline");
                edit_user_site_name(role , site_id);
               

                // get deparment for update modal
                $('#EditUserDepartment').empty();
                // if ((res_csp['user_data'][0].role == "Smart Users") || (res_csp['user_data'][0].role == "Site Admin")) {
                //     var elements = $('<option value="4" selected="true">General</option>');
                //     $('#EditUserDepartment').append(elements);
                //     $('#EditUserDepartment').attr("disabled",true);
                // }else if(res_csp['user_data'][0].role == "Operator"){
                //     var elements = $('<option value="1" selected="true">Production</option>');
                //     $('#EditUserDepartment').append(elements);
                // }else{
                    $.ajax({
                        url: "<?php echo base_url('User_controller/getdept'); ?>",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        async:false,
                        success:function(res_Site){
                            var datetime = getdate_time(res_csp['user_data'][0].last_updated_on);
                            var elements = $('<option value="" disabled>Select deparment</option>');
                            res_Site.forEach(function(item){
                                if (res_csp['user_data'][0].department===item.dept_id) {        
                                    elements = elements.add('<option value="'+item.dept_id+'" selected="true">'+item.department+'</option>');
                                }
                                else{
                                    elements = elements.add('<option value="'+item.dept_id+'">'+item.department+'</option>');
                                }
                            }); 
                            $('#EditUserDepartment').append(elements);
                            // $('#EditUserDepartment option[value="'+res_csp['user_data'][0]+'"]').attr('selected',true)             
                        },
                        error:function(res){
                            // alert("Sorry!Try Agian!!");
                        }
                    });
                // }
                 
                // after selection site dropdown then display site id and location
                $('#EditUserSiteId').html(res_csp['user_data'][0].site_id);
                $('#EditUserFName').val(res_csp['user_data'][0].first_name);
                $('#EditUserLName').val(res_csp['user_data'][0].last_name );
                $('#EditUserLocation').html(res_csp['location']);
                $('#EditUserPhone').val(res_csp['user_data'][0].phone);
                $('#EditUserDesignation').val(res_csp['user_data'][0].designation);
                $('#EditUserUpdatedBy').html(res_csp['last_updated_by'][0].first_name + " " +res_csp['last_updated_by'][0].last_name);
                $('#EditUserUpdatedOn').html(getdate_time(res_csp['user_data'][0].last_updated_on));

                $('#EditUserFNameCunt').html($('#EditUserFName').val().length+' / ' + text_max);
                $('#EditUserLNameCunt').html($('#EditUserLName').val().length+' / ' + text_max);
                $('#EditUserDesignationCunt').html($('#EditUserDesignation').val().length+' / ' + text_max_val);

                $('#EditUserRole').empty();
                var elements = $('<option value="null">Select Role</option>');
                // this condition get role based datas
                if (res_csp['user_data'][0].role == "Smart Users" ) {
                    $('#EditUserSiteName option[value="new_site-test"]').remove();
                    $('#EditUserSiteName').attr("disabled",true);
                    // temporary hide for edit add new site input in edit for mathan sir instruction
                    // $('#visible_creation_edit').css('display',"none");
                    // $('#display_edit_add').css("display","none");
                    $('#EditUserDepartment').val(4);
                    $('#EditUserDepartment').attr("disabled",true);
                    elements = elements.add('<option value="Smart Users" selected>Smart Users</option>');
                    elements = elements.add('<option value="Site Admin">Site Admin</option>');
                    elements = elements.add('<option value="Site Users">Site Users</option>');
                    elements = elements.add('<option value="Operator">Operator</option>');
                }
                else if(res_csp['user_data'][0].role == "Site Admin"){
                   
                    // temporary hide for edit add new site input in edit for mathan sir instruction
                    // $('#visible_creation_edit').css('display',"inline");
                    $('#display_edit_add').css("display","inline");
                    $('#EditUserSiteName').attr("disabled",true);
                    $('#EditUserDepartment').val(4);
                    $('#EditUserDepartment').attr("disabled",true);
                    elements = elements.add('<option value="Site Admin" selected>Site Admin</option>');
                    elements = elements.add('<option value="Site Users">Site Users</option>');
                    elements = elements.add('<option value="Operator">Operator</option>');
                    
                }
                else if(res_csp['user_data'][0].role == "Site Users"){
                    // alert('ok');
                    $('#EditUserDepartment').removeAttr("disabled");
                    // document.getElementById("EditUserDepartment").value=res_csp['user_data'][0].department;
                    //alert(res_csp['user_data'][0].department);
                    $('#EditUserDepartment').val(res_csp['user_data'][0].department);
                    // $('#EditUserDepartment').text(res_csp['department']);

                    elements = elements.add('<option value="Site Users" selected>Site Users</option>');
                    elements = elements.add('<option value="Operator">Operator</option>');
                }
                else if(res_csp['user_data'][0].role == "Operator"){
                    $('#display_edit_add').css("display","none");
                    $('#EditUserDepartment').val(1);
                    $('#EditUserDepartment').attr("disabled",true);
                    $('#EditUserSiteName').removeAttr('disabled');
                    elements = elements.add('<option value="Operator" selected>Operator</option>');
                }
                else{
                    elements = elements.add('<option value="Smart Admin" selected>Smart Admin</option>');
                }
                 
                // this line is remove for radio button none property
                $('.access-save').css("display","inline");
                $('#EditUserRole').append(elements);
                $("#AccessControlModal :input").removeAttr("disabled");
               // console.log('user role'+res_csp['user_data'][0].role);
                // if not equal to operator the access control for edit modal function
                if(res_csp['user_data'][0].role != "Operator"){
                    // this ajax get particular user access data
                   get_edit_access_control(res_csp['user_data'][0].user_id,res_csp['user_data'][0].role);
                  


                    if ((res_csp['user_data'][0].role != 'Site Users') && (res_csp['user_data'][0].role !='Site Admin') ) {
                        // this conditions for only not equal to site user
                        $('#settings_user_noaccess').removeAttr('disabled');
                        $('#settings_user_view').removeAttr('disabled');
                        $('#settings_user_edit').removeAttr('disabled');
                        $('#settings_user_add_del').removeAttr('disabled');

                        // this condtion for only allowed in smart user
                        $('#ooe_f_drill_down_add_del').removeAttr('disabled');
                        $('#opportunity_insights_add_del').removeAttr('disabled');
                        $('#ooe_drill_down_add_del').removeAttr('disabled');
                        $('#oui_add_del').removeAttr('disabled');
                        $('#pdm_add_del').removeAttr('disabled');
                        $('#settings_macine_add_del').removeAttr('disabled');
                        $('#settings_part_add_del').removeAttr('disabled');
                        $('#settings_general_add_del').removeAttr('disabled');

                    }else if((res_csp['user_data'][0].role !='Site Users') && (res_csp['user_data'][0].role =='Site Admin')){
                        // this condition if you not equal to the site user at the same is site admin remove add delete radio button
                        $('#ooe_f_drill_down_add_del').attr('disabled',true);
                        $('#opportunity_insights_add_del').attr('disabled',true);
                        $('#ooe_drill_down_add_del').attr('disabled',true);
                        $('#oui_add_del').attr('disabled',true);
                        $('#pdm_add_del').attr('disabled',true);
                        $('#settings_macine_add_del').attr('disabled',true);
                        $('#settings_part_add_del').attr('disabled',true);
                        $('#settings_general_add_del').attr('disabled',true);
                        $('#settings_user_add_del').attr('disabled',true);

                        // and enable user account radio button
                        $('#settings_user_noaccess').removeAttr('disabled');
                        $('#settings_user_view').removeAttr('disabled');
                        $('#settings_user_edit').removeAttr('disabled');
                        
                        //document.getElementById('settings_user_add_del').disabled = false;                        

                    }else{
                        // this condition only available in site users for remove all add and remove machine part site users
                        $('#ooe_f_drill_down_add_del').attr('disabled',true);
                        $('#opportunity_insights_add_del').attr('disabled',true);
                        $('#ooe_drill_down_add_del').attr('disabled',true);
                        $('#oui_add_del').attr('disabled',true);
                        $('#pdm_add_del').attr('disabled',true);
                        $('#settings_macine_add_del').attr('disabled',true);
                        $('#settings_general_add_del').attr('disabled',true);
                        $('#settings_part_add_del').attr('disabled',true);
                        
                        // this conditions remove user acocunt for site users
                        $('#settings_user_noaccess').attr('disabled',true);
                        $('#settings_user_view').attr('disabled',true);
                        $('#settings_user_edit').attr('disabled',true);
                        $('#settings_user_add_del').attr('disabled',true);
                    }
                }

                // temporary hide for strategy

                $('.EditUserData').attr("data_val",id);
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
        var edit_data = "edit_user";
        error_show_remove(edit_data);
        $('#EditUserModal').modal('show');
    });     

    // after click edit open the modal then load the site name dropdown
    function edit_user_site_name(role ,site_id){
        var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";
        var UserRoleRef ="<?php  echo($this->data['user_details'][0]['role'])?>";

        $.ajax({
            url: "<?php echo base_url('User_controller/getSiteName'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            data:{
                UserNameRef:UserNameRef,
                UserRoleRef:UserRoleRef,
            },
            success:function(res_Site){
                if(role == "Smart Users"){
                    var elements = $('<option value="'+res_Site[0].site_id+'" id="display_edit_add">'+res_Site[0].site_name+'</option>');
                    $('#EditUserSiteName').append(elements);
                    $('#EditUserSiteName').attr("disabled",true);
                }
                else if(role == "Site Admin"){
                    $('#EditUserSiteName').attr("disabled",true);
                    var elements = $('<option value="new_site-test" id="display_edit_add">Add Site</option>');                  
                    res_Site.forEach(function(item){
                        if (item.site_id != "smartories") {
                            if (item.site_id == site_id) {                     
                                elements = elements.add('<option value="'+item.site_id+'" selected class="edit_opt_sname">'+item.site_name+' -'+item.site_id+'</option>');
                            }
                            else{          
                                elements = elements.add('<option value="'+item.site_id+'" class="edit_opt_sname">'+item.site_name+' -'+item.site_id+'</option>');
                            }
                            $('#EditUserSiteName').append(elements);
                        }
                    });            
                }
                else {
                    $('#EditUserSiteName').removeAttr("disabled");
                    var elements = $('<option value=" " id="display_edit_add" selected disabled>Select Site</option>');
                    res_Site.forEach(function(item){
                        if (item.site_id != "smartories") {
                            if (item.site_id == site_id) {                             
                                elements = elements.add('<option value="'+item.site_id+'" selected class="edit_opt_sname">'+item.site_name+' -'+item.site_id+'</option>');
                            }
                            else{                 
                                elements = elements.add('<option value="'+item.site_id+'" class="edit_opt_sname">'+item.site_name+' -'+item.site_id+'</option>');
                            }     
                            $('#EditUserSiteName').append(elements);
                        }            
                    });
                }              
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    }

    // on change site name function
    // on change sitename this function on changeing the site chnage some elements in edit modal 
    $('#EditUserSiteName').on('change', function(event) {

        event.preventDefault();
        event.stopPropagation();

        const mydemo = $('#EditUserSiteName').val();
        const myarr1 = mydemo.split('-');
        if( myarr1[0] == 'new_site'){
            $('#EditUserSiteId').empty();
            $('#EditUserLocation').empty();
        }
        else{
            var site_select = $('#EditUserSiteName').val();
            const myarr = site_select.split("-");
            var site_id = myarr[0];
            var location = myarr[1];
            $('#EditUserSiteId').html(site_id);
            $('#EditUserLocation').html(location);
        }
    });

    // update user data for access control and user details
    // after retriving updated function then finally update the updation function
    // hode some function for mathan sir instruction based on edit modal
    $(document).on("click", ".EditUserData", function(event){
        event.preventDefault();
        event.stopPropagation();
       
        var UserNameRef = "<?php echo($this->data['user_details'][0]['user_id'])?>";     
        var condition = $('.EditUserData').attr("disabled");
        if (condition == "disabled") {
            $('.EditMachine').css('border',"none");
        }else{
            var a = EditUserFName();
            var b = EditUserLName();
            var c = EditUserPhone();
            var d = EditUserDesignation();
            if (($('#EditUserSiteName').val() == "all")||($('#EditUserRole').val() == "null")) {
                if ($('#EditUserSiteName').val() == "all") {
                    $("#sitename_error_edit").css("display","block");
                }
                if ($('#EditUserRole').val() == "null") {
                    $("#site_error_edit").css("display","block");
                    $('#site_error_edit').html(required);
                }
                $('.EditUserData').attr("disabled",true);
            }
            else{
                $("#overlay").fadeIn(300);
                $("#site_error_edit").css("display","none");
                $("#EditUserSiteName").css("display","none");
                var user_id = $('.EditUserData').attr('data_val');
                var User_Role = $('#EditUserRole').val();
                var User_Email = $('#EditUserEmail').val();
                var User_First_Name = $('#EditUserFName').val();
                var User_Last_Name = $('#EditUserLName').val();
                var User_Phone = $('#EditUserPhone').val();
                var User_Designation = $('#EditUserDesignation').val();
                var User_Site_Name = $('#EditUserSiteName').val();
                var User_Department = $('#EditUserDepartment').val();
                if (User_Role != "Operator"){
                    var FDrillDown = $('input[name="ooe_f_drill_down"]:checked').val();
                    var Opportunityinsights = $('input[name="opportunity_insights"]:checked').val();
                    var OEEDrillDown = $('input[name="ooe_drill_down"]:checked').val();
                    var OUI = $('input[name="oui"]:checked').val();
                    var PDM = $('input[name="pdm"]:checked').val();
                    var SMachine = $('input[name="settings_macine"]:checked').val();
                    var SPart = $('input[name="settings_part"]:checked').val();
                    var SGeneral = $('input[name="settings_general"]:checked').val();
                    var SUser = $('input[name="settings_user"]:checked').val();

                    var DPD = $('input[name="dpd"]:checked').val();
                    var CSP = $('input[name="csp"]:checked').val();         
                    var PD = $('input[name="pd"]:checked').val();
                    var PQ = $('input[name="pq"]:checked').val();
                    var WOM = $('input[name="wom"]:checked').val();
                    var ALM = $('input[name="alm"]:checked').val();
                }
                else{
                    var FDrillDown = "";
                    var Opportunityinsights = "";
                    var OEEDrillDown = "";
                    var OUI = "";
                    var PDM = "";
                    var SMachine = "";
                    var SPart = "";
                    var SGeneral = "";
                    var SUser = "";
                    var DPD = "";
                    var CSP = "";         
                    var PD = "";
                    var PQ = "";
                    var WOM = "";
                    var ALM = "";
                }
                    var user_id_op = $('#EditOpUserID').val();
                    if (User_Role == "Operator") {
                        $.ajax({
                            url: "<?php echo base_url('User_controller/updateUserData_op'); ?>",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            data:{
                                user_id:user_id,
                                user_id_op:user_id_op,
                                User_First_Name:User_First_Name,
                                User_Last_Name:User_Last_Name,
                                User_Phone:User_Phone,
                                User_Designation:User_Designation,
                                Role:User_Role,
                                User_Site_Name:User_Site_Name,
                                User_Department:User_Department,
                                Updated_By:UserNameRef,                                  
                            },
                            success:function(res){
                                if (res == true) {
                                    // after update get all user data 
                                    get_all_user();
                                    // after updation close the modal 
                                    $('#EditUserModal').modal('hide');
                                    $("#overlay").fadeOut(300);
                                }
                            },
                            error:function(res){
                                // alert("Sorry!Try Agian!!");
                                $("#overlay").fadeOut(300);
                            }
                        });
                    }else{
                        $.ajax({
                            url: "<?php echo base_url('User_controller/updateUserData'); ?>",
                            type: "POST",
                            dataType: "json",
                            cache: false,
                            data:{
                                user_id:user_id,
                                User_Email:User_Email,
                                User_First_Name:User_First_Name,
                                User_Last_Name:User_Last_Name,
                                User_Phone:User_Phone,
                                User_Designation:User_Designation,
                                Role:User_Role,
                                User_Site_Name:User_Site_Name,
                                User_Department:User_Department,
                                Updated_By:UserNameRef,
                                FDrillDown:FDrillDown,
                                Opportunityinsights:Opportunityinsights,
                                OEEDrillDown:OEEDrillDown,
                                OUI:OUI,
                                PDM:PDM,
                                SMachine:SMachine,
                                SPart:SPart,
                                SGeneral:SGeneral,
                                SUser:SUser,

                                DPD:DPD,
                                CSP:CSP,         
                                PD:PD,
                                PQ:PQ,
                                WOM:WOM,
                                ALM:ALM,
                            },
                            success:function(res){
                                if (res == true) {            
                                    // get all user data
                                    get_all_user();
                                    // after updation close the modal
                                    $('#EditUserModal').modal('hide');
                                    $("#overlay").fadeOut(300);
                                }
                            },
                            error:function(res){
                                // alert("Sorry!Try Agian!!");
                                $("#overlay").fadeOut(300);
                            }
                        });
                    }
                           
                // }
                   
            }
        }
                
    });



// forgot password in site admin for the modal function
    $(document).on('click','.forgot-password',function(event){
        event.preventDefault();
        event.stopPropagation();
        var user_id = $(this).attr('lvalue');
        $('#forgot_pass').attr('lvalue',user_id);
        var data = "forgotpassword";
        error_show_remove(data);
        $('#forgot-modal').modal('show');
    });
// forgot password validation for operator
    
// forgot password for site admin updation of password function
    $(document).on('click','.forgot_pass_siteadmin',function(event){

        event.preventDefault();
        event.stopPropagation();
        var a = operator__forgot_password();
        var b = operator__forgot_confirm_password();
        if (a!="" || b!="") {
            $('#op_new_pass_err').html(a);
            $('#op_confirm_pass_err').html(b);
            
        }else{

            uid = $('#forgot_pass').attr('lvalue');
            pass = document.getElementById("forgot_pass").value;
            repass = document.getElementById("forgot_confirm_pass").value;
            pass = pass.toLocaleLowerCase();
            repass = repass.toLocaleLowerCase();
            if (pass == repass) {
                $.ajax({
                    url : "<?php echo base_url('User_controller/forgot_siteadmin_pass'); ?>",
                    method : "post",
                    cache: false,
                    data:{pass:pass,
                        uid:uid,
                        ref_id:UserNameRef
                    },
                    dataType : "json",
                    success:function(data){
                        if (data == true) {
                            // get all user data
                            get_all_user();
                            // after update the password close the modal
                            $('#forgot-modal').modal('hide');
                        }
                    }
                });
            }else{
                $('#op_new_pass_err').html("Password Mismatch");
                $('#op_confirm_pass_err').html("Password Mismatch");
                $('.forgot_pass_siteadmin').attr("disabled",true);
            }
        }
    });  
    /*
    temporary hide for this function in strategy 
    
        $('.Add_Filter').click(function(){
            // alert("filter event");
            var  FromDate = $('#filterFrom').val();
            var  ToDate = $('#filterTo').val();
            var  Site = $('#filterSiteName').val();
            var  Brand = $('#filterRole').val();
            var  Status = $('#filterStatus').val();
            var  LastUpdatedBy = $('#filterLastUpdatedBy').val();
            var  filterMachineRateHourOp = $('#filterMachineRateHourOp').val();
            var  filterMachineRateHourR = $('#filterMachineRateHourR').val();
            var  filterMachineOffRateR = $('#filterMachineOffRateR').val();
            var  filterMachineOffRateOp = $('#filterMachineOffRateOp').val();
            /*
            $.ajax({
                url: "<?php echo base_url('Home/getuserFilterData'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    FromDate : FromDate,
                    ToDate : ToDate,
                    Site : Site,
                    Brand : Brand,
                    Status : Status,
                    LastUpdatedBy : LastUpdatedBy,
                    filterMachineRateHourOp:filterMachineRateHourOp,
                    filterMachineRateHourR:filterMachineRateHourR,
                    filterMachineOffRateOp:filterMachineOffRateOp,
                    filterMachineOffRateR:filterMachineOffRateR
                },
                success:function(res_filter){
                    $('.contentMachine').empty();
                    $('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_filter)){
                        $('.contentMachine').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                        res_filter.forEach(function(item){
                            var elements = $();
                            if (item.Status == 1) {
                                active = active+1;
                                elements = elements.add('<div id="settings_div">'
                                        +'<div class="row paddingm">'
                                            +'<div class="col-sm-1 col marleft" ><p>'+item.Machine_Id+'</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Name+'</p></div>'         
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_OFF_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-1 col marright" ><p>'+item.Tonnage+'T</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Brand+'</p></div>'
                                            +'<div class="col-sm-1 col marleft settings_active" ><p style="color: #004795"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                                +'<ul class="edit-menu">'
                                                    +'<li class="d-flex justify-content-center">'
                                                        +'<a href="#">'
                                                            +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
                                                        +'</a>'
                                                        +'<ul class="edit-subMenu">'
                                                            +'<li class="edit-opt edit-user" lvalue="'+item.R_NO+'" ><a href="#"><i class="fa fa-pencil" style="margin-left:10px;"></i>EDIT</a></li>'
                                                            +'<li class="edit-opt deactivate-machine" lvalue="'+item.R_NO+'" svalue="'+item.Status+'"><a href="#"><i class="fa fa-trash" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                        +'</ul>'
                                                    +'</li>'
                                                +'</ul>'                
                                            +'</div>'
                                            
                                        +'</div>'
                                    +'</div>');
                                $('.contentMachine').append(elements);
                            }
                            else{
                                inactive = inactive+1;
                                elements = elements.add('<div id="settings_div">'
                                        +'<div class="row paddingm">'
                                            +'<div class="col-sm-1 col marleft" ><p>'+item.Machine_Id+'</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Name+'</p></div>'        
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-2 col marright" >'
                                                +'<p><i class="fa fa-inr" style="margin-right:5px;"></i>'+item.Machine_OFF_Rate_Hour+'.00</p>'
                                            +'</div>'
                                            +'<div class="col-sm-1 col marright" ><p>'+item.Tonnage+'T</p></div>'
                                            +'<div class="col-sm-2 col marleft" ><p>'+item.Machine_Brand+'</p></div>'
                                            +'<div class="col-sm-1 col marleft settings_active" ><p style="color: #e2062c"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
                                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                                +'<ul class="edit-menu">'
                                                    +'<li class="d-flex justify-content-center">'
                                                        +'<a href="#">'
                                                            +'<i class="edit fas fa-ellipsis-v" alt="Edit"></i>'
                                                        +'</a>'
                                                        +'<ul class="edit-subMenu">'
                                                            +'<li class="edit-opt info-machine" lvalue="'+item.R_NO+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>EDIT</a></li>'
                                                            +'<li class="edit-opt activate-machine" lvalue="'+item.R_NO+'" svalue="'+item.Status+'"><a href="#"><i class="fa fa-power-off" style="margin-left:10px;"></i>ACTIVATE</a></li>'
                                                        +'</ul>'
                                                    +'</li>'
                                                +'</ul>'                
                                            +'</div>'
                                            
                                        +'</div>'
                                    +'</div>');
                                $('.contentMachine').append(elements);
                            }
                        });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    active_len = active.toString().length;
                    if (parseInt(inactive_len) > 1) {
                         $('#Iactive').html(inactive);
                    }else{
                        $('#Iactive').html('0'+inactive);
                    }

                    if (parseInt(active_len) > 1) {
                         $('#Active').html(active);
                    }else{
                        $('#Active').html('0'+active);
                    }
//                     $('#Iactive').html(inactive);
//                     $('#Active').html(active);
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });*/


     }); //invalida closeing wait check the confirmation

// input user email validation this function  check the database the email id is exists are new checking database
function inputUserEMail(){
    var val = $("#inputUserEMail").val();
    if (!val) {
        $(".CreateUser").attr("disabled", true);
        return required;
    }
    else{
        var letters = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        val = val.trim();
        val = val.toLowerCase();
        if (letters.test(val)) {
            $(".CreateUser").attr("disabled", true);
            var user = $('#inputUserEMail').val();
            $.ajax({
                url: "<?php echo base_url('User_controller/checkUser'); ?>",
                type: "POST",
                dataType:"json",
                cache: false,
                data:{
                    user_name:user,
                },
                success:function(res){
                    if (res) {
                        $('#inputUserEMailErr').html('*Email address already exists');
                        $(".CreateUser").attr("disabled", true);
                        // $('#inputUserFirstName').attr("disabled",true);
                        // $('#inputUserLastName').attr("disabled",true);
                        // $('#inputUserPhone').attr("disabled",true);
                        // $('#inputUserDesignation').attr("disabled",true);
                        $("#inputUserFirstName").val(" ");
                        $("#inputUserLastName").val(" ");
                        $("#inputUserPhone").val(" ");
                        $("#inputUserDesignation").val(" ");
                    }else{
                        $(".CreateUser").removeAttr("disabled");
                        // $("#inputUserFirstName").removeAttr("disabled");
                        // $("#inputUserLastName").removeAttr("disabled");
                        // $("#inputUserPhone").removeAttr("disabled");
                        // $("#inputUserDesignation").removeAttr("disabled");
                    }
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
         return "";
        }
        else{
            $(".CreateUser").attr("disabled", true);
            return "*Invalid Email address";
        }
    }
}


// operator on change
function inputOpUserID(){
    var val = $("#inputOpUserID").val();
    if (!val) {
        $(".CreateUser").attr("disabled", true);
        return required;
    }
    else{
        // var num = /^\(?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;
        var num = /[a-zA-Z0-9]+$/;
        if ((num.test(val)) && (parseInt(val.length)>=4)) {
            $(".CreateUser").removeAttr("disabled");
            var id = $('#inputOpUserID').val();
            $.ajax({
                url: "<?php echo base_url('User_controller/checkOperator'); ?>",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {
                    User_ID : id
                },
                success:function(res){
                    if (res == true) {
                        alert("User already exists!");
                        $(".CreateUser").attr("disabled", true);
                        $('#inputUserFirstName').attr("disabled",true);
                        $('#inputUserLastName').attr("disabled",true);
                        $('#inputUserPhone').attr("disabled",true);
                        $('#inputUserDesignation').attr("disabled",true);
                        $('#inputUserFirstName').val(" ");
                        $('#inputUserLastName').val(" ");
                        $('#inputUserPhone').val(" ");
                        $('#inputUserDesignation').val(" ");
                    }
                    else{
                        $(".CreateUser").removeAttr("disabled");
                        $("#inputUserFirstName").removeAttr("disabled");
                        $("#inputUserLastName").removeAttr("disabled");
                        $("#inputUserPhone").removeAttr("disabled");
                        $("#inputUserDesignation").removeAttr("disabled");
                    }
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
            return "";
        }
        else{
            $(".CreateUser").attr("disabled", true);
            return "*Invalid user id";
        }
    }
}

    // undo funciton load the page reset the page function
    $(document).on('click','.undo',function(event){
        event.preventDefault();
        event.stopPropagation();

        location.reload();
    });

    // validation for site creation
    $(document).on('blur','#new_site_name',function(event){
        event.preventDefault();

        var new_site = $('#new_site_name').val();
        var role = $('#inputRoleAdd').val();

        if(role === "Site Admin"){
            var pattern = /^[0-9a-zA-Z]+$/;
            if(new_site == ""){
                msg = required;
              
                $('.CreateUser').attr("disabled",true);
            }else if(pattern.test(new_site)){
                msg = success;
               
                $('.CreateUser').removeAttr("disabled");
            }else{
                msg = alphaNum;
                $('.CreateUser').attr("disabled",true);
            }
            document.getElementById('inputUsernew_site_err').innerHTML =msg;
        }else{
            $('.CreateUser').attr("disabled",true);
        }
    });

//  operator password validation function
    $(document).on('blur','#re_pass_op',function(event){

        event.preventDefault();
        event.stopPropagation();
        var x = retypepass();
         document.getElementById('re_pass_op_err').innerHTML = x;
    });
    function retypepass(){
        var pass = $('#re_pass_op').val();
        var msg = " ";
        var pattern = /^[0-9a-zA-Z]{5,}$/;
        pass = pass.trim();
        if (pass == "") {
            msg = required;
        }else if (pattern.test(pass)) {
            msg = success;
            $('.CreateUser').removeAttr("disabled");
        }else{
            msg = "Minimum 5 chars required";
            $('.CreateUser').attr("disabled",true);
        }
        return msg;
    };

// retype password validation
    $(document).on('blur','#pass_op',function(event){
        event.preventDefault();
        event.stopPropagation();
        var x = passwordCheck();
        document.getElementById('pass_op_err').innerHTML = x;
    });
    function passwordCheck(){
        var pass = $('#pass_op').val();
        var msg = " ";
        pass=pass.trim();

        var pattern = /^[0-9a-zA-Z]{5,}$/;

        if (pass == "") {
            msg = required;
        }
        else if (pattern.test(pass)) {
        
            msg = success;
            $('.CreateUser').removeAttr("disabled");
        }else{
            msg = "Minimum 5 chars required";
            $('.CreateUser').attr("disabled",true);
        }
        return msg;
    };

// filter active
/*
$(document).on('click','.active_click',function(){
   // alert();

  // retrive all users
         var SiteUserRef = "<?php echo($this->data['user_details'][0]['user_id']); ?>";
         var role = "<?php echo($this->data['user_details'][0]['role']); ?>";
         var sitename = "<?php echo($this->data['user_details'][0]['site_id']);  ?>";

         // alert(SiteUserRef);
         // alert(role);
         $.ajax({
            url: "<?php echo base_url('User_controller/getSiteUser'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                SiteUserRef : SiteUserRef,
                role:role,
                sitename:sitename,
            },
            success:function(res_Site){
               // console.log(res_Site);
                
                //alert(res_Site);
                
                $('.contentUser').empty();
                    //$('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_Site)){
                        $('.contentUser').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                    var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    
                    res_Site.forEach(function(item){
                        //alert();
                        var randomColor = color[Math.floor(Math.random()*color.length)];
                        var elements = $();

                        if (item.role == "Smart Admin"){
                            var forgot = "none";
                            var colorRole = "#853e2c";
                            var colorBorder = "#ffdad0";
                        }
                        else if(item.role == "Smart Users"){
                            var forgot = "none";
                            var colorRole = "#a2723f";
                            var colorBorder = "#ffe4c4";
                        }
                        else if(item.role == "Site Admin"){
                            var forgot = "block";
                            var colorRole = "#005fc8";
                            var colorBorder = "#c1eaff";
                        }
                        else if(item.role == "Site Users"){
                            var forgot = "none";
                            var colorRole = "#56b8c2";
                            var colorBorder = "#60ebee";
                        }
                        else{
                            var forgot = "none";
                            var colorRole = "#7030a0";
                            var colorBorder = "#dfcaee";
                        }
                        
                        //alert(item.User_Name);
                        if (item.status == 1) {
                            active = active+1;
                        
                            elements = elements.add('<div id="settings_div">'
                                    +'<div class="row paddingm">'
                                    +'<div class="col-sm-2 col" style="display: flex;">'
                                        +'<div style="width: 30%">'
                                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                        +'</div>'
                                        +'<div style="width: 70%">'
                                            +'<p title="'+item.username+'">'+item.username+'</p>'
                                            +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                            
                                        +'</div>'                
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ><p title="'+sitename+'">'+sitename+'</p></div>'        
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.designation+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.created_on+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft">'
                                        +'<div class="userRole textCenter marleft" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                            +'<p style="color:'+colorRole+'" class="userRole_get  marleft">'+item.role+'</p>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col settings_active marleft" ><p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu">'
                                                    // +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                    +'<li class="edit-opt edit-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>'
                                                    +'<li class="edit-opt deactivate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'"><a href="#"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                     +'<li class="edit-opt forgot-password forgotwork " style="display:'+forgot+';" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><i class="fa fa-key" style="margin-left:10px;"></i>RESET PAASWORD</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                                +'</div>');
                            $('.contentUser').append(elements);
                        }
                    });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    //  var len = res.InActive.toString().length;
                    // var len1 = res.Active.toString().length;
                    inactive_len = inactive.toString().length;
                    active_len = active.toString().length;
                    // if (parseInt(inactive_len) > 1) {
                    //      $('#Iactive').html(inactive);
                    // }else{
                    //     $('#Iactive').html('0'+inactive);
                    // }

                    $('#Iactive').html('00');
                    if (parseInt(active_len) > 1) {
                         $('#Active').html(active);
                    }else{
                        $('#Active').html('0'+active);
                    }
                    // $('#Iactive').html(inactive);
                    // $('#Active').html(active);
                           
            },
            error:function(res){
               // console.log(res);
                alert("Sorry!Try Agian!!");
            }
        });

    
});
*/

// filter inactive
/*
$(document).on('click','.inactive_click',function(){
    //alert();

  // retrive all users
         var SiteUserRef = "<?php echo($this->data['user_details'][0]['user_id']); ?>";
         var role = "<?php echo($this->data['user_details'][0]['role']); ?>";
         var sitename = "<?php echo($this->data['user_details'][0]['site_id']);  ?>";

         // alert(SiteUserRef);
         // alert(role);
         $.ajax({
            url: "<?php echo base_url('User_controller/getSiteUser'); ?>",
            type: 'post',
            dataType: 'json',
            data: {
                SiteUserRef : SiteUserRef,
                role:role,
                sitename:sitename,
            },
            success:function(res_Site){
               // console.log(res_Site);
                
                //alert(res_Site);
                
                $('.contentUser').empty();
                    //$('#FilterMachineModal').modal('hide');
                    if (jQuery.isEmptyObject(res_Site)){
                        $('.contentUser').html("<p>No Records Found!</p>");
                    }
                    var active = 0;
                    var inactive = 0;
                    var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    
                    res_Site.forEach(function(item){
                        //alert();
                        var randomColor = color[Math.floor(Math.random()*color.length)];
                        var elements = $();

                        if (item.role == "Smart Admin"){
                            var forgot = "none";
                            var colorRole = "#853e2c";
                            var colorBorder = "#ffdad0";
                        }
                        else if(item.role == "Smart Users"){
                            var forgot = "none";
                            var colorRole = "#a2723f";
                            var colorBorder = "#ffe4c4";
                        }
                        else if(item.role == "Site Admin"){
                            var forgot = "block";
                            var colorRole = "#005fc8";
                            var colorBorder = "#c1eaff";
                        }
                        else if(item.role == "Site Users"){
                            var forgot = "none";
                            var colorRole = "#56b8c2";
                            var colorBorder = "#60ebee";
                        }
                        else{
                            var forgot = "none";
                            var colorRole = "#7030a0";
                            var colorBorder = "#dfcaee";
                        }
                        
                        //alert(item.User_Name);
                        if (item.status == 0) {
                            active = active+1;
                        
                            elements = elements.add('<div id="settings_div">'
                                    +'<div class="row paddingm">'
                                    +'<div class="col-sm-2 col" style="display: flex;">'
                                        +'<div style="width: 30%">'
                                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                        +'</div>'
                                        +'<div style="width: 70%">'
                                            +'<p title="'+item.username+'">'+item.username+'</p>'
                                            +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                            
                                        +'</div>'                
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ><p title="'+sitename+'">'+sitename+'</p></div>'        
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.designation+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p>'+item.created_on+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft">'
                                        +'<div class="userRole textCenter marleft" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                            +'<p style="color:'+colorRole+'" class="userRole_get  marleft">'+item.role+'</p>'
                                        +'</div>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col settings_active marleft" ><p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>InActive</p></div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu">'
                                                    // +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                                    +'<li class="edit-opt edit-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>'
                                                    +'<li class="edit-opt deactivate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'"><a href="#"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                                     +'<li class="edit-opt forgot-password forgotwork " style="display:'+forgot+';" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><i class="fa fa-key" style="margin-left:10px;"></i>RESET PAASWORD</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                                +'</div>');
                            $('.contentUser').append(elements);
                        }
                    });
                    $('#Iactive').empty();
                    $('#Active').empty();
                    //  var len = res.InActive.toString().length;
                    // var len1 = res.Active.toString().length;
                    inactive_len = inactive.toString().length;
                    active_len = active.toString().length;
                    // if (parseInt(inactive_len) > 1) {
                    //      $('#Iactive').html(inactive);
                    // }else{
                    //     $('#Iactive').html('0'+inactive);
                    // }

                    $('#Active').html('00');
                    if (parseInt(active_len) > 1) {
                         $('#Iactive').html(active);
                    }else{
                        $('#Iactive').html('0'+active);
                    }
                    // $('#Iactive').html(inactive);
                    // $('#Active').html(active);
                           
            },
            error:function(res){
               // console.log(res);
                alert("Sorry!Try Agian!!");
            }
        });

    
});
*/

// function for the error removing after click if anything error show its removing function
function error_show_remove(data){
    if (data == "adduser") {
        $('#inputUserFirstNameCunt').html('0 / ' + text_max);
        $('#inputUserLastNameCunt').html('0 / ' + text_max);
        $('#inputUserDesignationCunt').html('0 / ' + text_max_val);

        $('#inputOpUserIDErr').html('');
        $('#inputUserFirstNameErr').html('');
        $('#inputUserLastNameErr').html('');
        $('#inputUsernew_site_err').html('');
        $('#location_name_err').html('');
        $('#inputUserPhoneErr').html('');
        $('#pass_op_err').html('');
        $('#re_pass_op_err').html('');
        $('#inputUserEMailErr').html('');
        $('#inputUserDesignationErr').html('');
        $('#validate_role').html('');
        $("#input_dept_err").html('');
        // console.log("its worked");
    }
    else if (data == "edit_user") {
        $('#email_err').html(' ');
        $('#EditUserFNameErr').html('');
        $('#EditUserLNameErr').html('');
        $('#EditUserPhoneErr').html('');
        // temporary hide for edit model new site creation input is hide for mathan sir instruction
        // $('#EditUser_newsite_err').html('');
        // $('#EditUser_location_err').html('');
        $('#EditUserDesignationErr').html('');
        $('#validate_role').html('');
        //$('#').html('');
    }

    else if(data == "forgotpassword"){
        $('#forgot_pass').val('');
        $('#forgot_confirm_pass').val('');

        $('#op_confirm_pass_err').html('');
        $('#op_new_pass_err').html('');

    }
}


 // retrive all users function

function get_all_user(){

// retrive all users for rows
var SiteUserRef = "<?php echo($this->data['user_details'][0]['user_id']); ?>";
var role = "<?php echo($this->data['user_details'][0]['role']); ?>";
var sitename = "<?php echo($this->data['user_details'][0]['site_id']);  ?>";

//  this ajax function for document ready ajax function
$.ajax({
    url: "<?php echo base_url('User_controller/getSiteUser'); ?>",
    type: 'post',
    dataType: 'json',
    cache: false,
    data: {
        SiteUserRef:SiteUserRef,
        role:role,
        sitename:sitename,
    },
    success:function(res_Site){    
        $('.contentUser').empty();
            if (jQuery.isEmptyObject(res_Site)){
                $('.contentUser').html('<p class="no_record_css">No Records...</p>');
            }
            var active = 0;
            var inactive = 0;
            var color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
            // this foreach function for rows updation 
            res_Site.forEach(function(item){
                var randomColor = color[Math.floor(Math.random()*color.length)];
                var elements = $();
                var forgot_border = "";
                var delete_border = "";
                if (item.role == "Smart Admin"){
                    var forgot = "none";
                    var colorRole = "#853e2c";
                    var colorBorder = "#ffdad0";
                    forgot_border = "none";
                    delete_border="none";
                }
                else if(item.role == "Smart Users"){
                    var forgot = "none";
                    var colorRole = "#a2723f";
                    var colorBorder = "#ffe4c4";
                    forgot_border = "none";
                    delete_border="none";
                }
                else if(item.role == "Site Admin"){
                    var forgot = "none";
                    var colorRole = "#005fc8";
                    var colorBorder = "#c1eaff";
                    forgot_border = "none";
                    delete_border="none";
                }
                else if(item.role == "Site Users"){
                    var forgot = "none";
                    var colorRole = "#56b8c2";
                    var colorBorder = "#60ebee";
                    forgot_border = "none";
                    delete_border="none";
                }
                else if(item.role == "Operator"){
                    var forgot = "block";
                    var colorRole = "#7030a0";
                    var colorBorder = "#dfcaee";
                    forgot_border = "none";
                    delete_border="1px solid #EEE";
                }
                if (item.status == 1) {
                    active = active+1;
                
                    elements = elements.add('<div id="settings_div">'
                            +'<div class="row paddingm">'
                            +'<div class="col-sm-2 col" style="display: flex;">'
                                +'<div style="width: 30%">'
                                    +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                +'</div>'
                                +'<div style="width: 70%">'
                                    +'<p title="'+item.username+'">'+item.username+'</p>'
                                    +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                    
                                +'</div>'                
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" ><p title="'+item.site_id+'">'+item.site_name+'</p></div>'        
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p>'+item.designation+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p>'+register_date(item.created_on)+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col ">'
                                +'<div class="userRole siteAdmin textCenter" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                    +'<p style="color:'+colorRole+'" class="user_get_role">'+item.role+'</p>'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-sm-1 col settings_active marleft" ><p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>'
                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                +'<ul class="edit-menu">'
                                    +'<li class="d-flex justify-content-center">'
                                        +'<a href="javascript:function(){return false;}">'
                                            +'<i class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                        +'</a>'
                                        +'<ul class="edit-subMenu" style="z-index:10;">'
                                            // +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'"><a href="#"><i class="fa fa-info" style="margin-left:10px;"></i>INFO</a></li>'
                                            +'<li class="edit-opt edit-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;"></i>EDIT</a></li>'
                                            +'<li class="edit-opt deactivate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site_id="'+item.site_id+'"><a href="#" style="border-bottom:'+delete_border+';"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;"></i>DEACTIVATE</a></li>'
                                            +'<li class="edit-opt forgot-password forgotwork " style="display:'+forgot+';" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'" site="'+item.site_id+'"><a href="#" style="border-bottom:'+forgot_border+';"><i class="fa fa-key" style="margin-left:15px;font-size:1rem;"></i><span style="margin-left:0.8rem;">RESET PASSWORD</span></a></li>'
                                        +'</ul>'
                                    +'</li>'
                                +'</ul>'                
                            +'</div>'
                        +'</div>'
                        +'</div>');
                    $('.contentUser').append(elements);
                }
                else{
                    inactive = inactive+1;
                    elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm">'
                            +'<div class="col-sm-2 col" style="display: flex;">'
                                +'<div style="width: 30%">'
                                    +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p>'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p></div>'
                                +'</div>'
                                +'<div style="width: 70%">'
                                    +'<p title="'+item.username+'">'+item.username+'</p>'
                                    +'<p><span>'+item.first_name+'</span><span class="LastNameMarg">'+item.last_name+'</span></p>'
                                    
                                +'</div>'                
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" ><p title="'+item.site_id+'">'+item.site_name+'</p></div>'        
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p>'+item.designation+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p>'+register_date(item.created_on)+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col ">'
                                +'<div class="userRole siteAdmin textCenter" style="border:1px solid '+colorBorder+';margin-left:1rem;">'
                                    +'<p style="color:'+colorRole+'" class="user_get_role">'+item.role+'</p>'
                                +'</div>'
                            +'</div>'
                            +'<div class="col-sm-1 col settings_active marleft"><p style="color:#C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p></div>'
                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                +'<ul class="edit-menu">'
                                    +'<li class="d-flex justify-content-center">'
                                        +'<a href="javascript:function(){return false;}">'
                                            +'<i class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                        +'</a>'
                                        +'<ul class="edit-subMenu" style="z-index:10;">'
                                            +'<li class="edit-opt info-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" con="'+item.created_on+'" site="'+item.site_id+'"><a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="img_font_wh2" style="margin-left:10px;"></i>INFO</a></li>'
                                            +'<li class="edit-opt activate-user" rvalue="'+item.role+'" lvalue="'+item.user_id+'" svalue="'+item.status+'"  site_id="'+item.site_id+'"><a href="#" style="border-bottom:none;"><img src="<?php echo base_url('assets/img/activate.png'); ?>" class="img_font_wh2" style="margin-left:10px;"></i>ACTIVATE</a></li>'
                                        +'</ul>'
                                    +'</li>'
                                +'</ul>'                
                            +'</div>'
                        +'</div>'
                    +'</div>');
                    $('.contentUser').append(elements);
                    // var text_val = $('.userRole').children('p').text();
                    // alert(text_val);
                }
            });
            $('#Iactive').empty();
            $('#Active').empty();
            // active and inactvie count checking for two digits

            inactive_len = inactive.toString().length;
            active_len = active.toString().length;
            if (parseInt(inactive_len) > 1) {
                $('#Iactive').html(inactive);
            }else{
                $('#Iactive').html('0'+inactive);
            }

            if (parseInt(active_len) > 1) {
                $('#Active').html(active);
            }else{
                $('#Active').html('0'+active);
            }
    },
    error:function(res){
        // alert("Sorry!Try Agian!!");
    }
});

}


// edit access control db configuration
function get_edit_access_control(userid,user_role){
   
    $.ajax({
        url: "<?php echo base_url('User_controller/EditUserRoleMaster'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        data:{
            userName:userid,
        },
        success:function(res_role){
            $("input[name=ooe_f_drill_down][value='"+res_role[0].oee_financial_drill_down+"']").prop("checked",true);
            $("input[name=opportunity_insights][value='"+res_role[0].opportunity_insights+"']").prop("checked",true);
            $("input[name=ooe_drill_down][value='"+res_role[0].oee_drill_down+"']").prop("checked",true);
            $("input[name=oui][value='"+res_role[0].operator_user_interface+"']").prop("checked",true);
            $("input[name=pdm][value='"+res_role[0].production_data_management+"']").prop("checked",true);
            $("input[name=settings_macine][value='"+res_role[0].settings_machine+"']").prop("checked",true);
            $("input[name=settings_part][value='"+res_role[0].settings_part+"']").prop("checked",true);
            $("input[name=settings_general][value='"+res_role[0].settings_general+"']").prop("checked",true);
                         
            $("input[name=settings_user][value='"+res_role[0].settings_user_management+"']").prop("checked",true);
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}

// this functiion AFTER role select get access control
function get_access_control(user){
    // if not equal to the operator for the access control and another functional work access control value getting function
    if( user != 'Operator'){
        // alert(user);
        $('#ACControl').css("display","block");
        $('#ExceptOp').css("display","block");
        $('#OperatorCredential').css("display","none");
             
        // this ajax function for access control value getting function
        $.ajax({
            url: "<?php echo base_url('User_controller/getUserRole'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            data:{
                userRole:user,
            },
            success:function(res_role){
                $("input[name=ooe_f_drill_down][value='"+res_role.Financial_Drill_Down+"']").prop("checked",true);
                $("input[name=opportunity_insights][value='"+res_role.Financial_Opportunity_Insights+"']").prop("checked",true);
                $("input[name=ooe_drill_down][value='"+res_role.OEE_Drill_Down+"']").prop("checked",true);
                $("input[name=oui][value='"+res_role.Operator_User_Interface+"']").prop("checked",true);
                $("input[name=pdm][value='"+res_role.Production_Data_Management+"']").prop("checked",true);
                $("input[name=settings_macine][value='"+res_role.Settings_Machine+"']").prop("checked",true);
                $("input[name=settings_part][value='"+res_role.Settings_Parts+"']").prop("checked",true);
                $("input[name=settings_general][value='"+res_role.Settings_General+"']").prop("checked",true);
                $("input[name=settings_user][value='"+res_role.Settings_User_Management+"']").prop("checked",true);

                $("input[name=dpd][value='"+res_role.Daily_Production_Data+"']").prop("checked",true);
                $("input[name=csp][value='"+res_role.Current_Shift_Performance+"']").prop("checked",true);
                $("input[name=pd][value='"+res_role.Production_Downtime+"']").prop("checked",true);
                $("input[name=pq][value='"+res_role.Production_Quality+"']").prop("checked",true);
                $("input[name=wom][value='"+res_role.Work_Order_Management+"']").prop("checked",true);
                $("input[name=alm][value='"+res_role.Alert_Management+"']").prop("checked",true);

            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    }
    else{
        $('#ACControl').css("display","none");
        $('#OperatorCredential').css("display","block");
        $('#ExceptOp').css("display","none");
    }
}




// add user if you select operator the password icon functions 
$(document).on('click','.clip',function(event){

    event.preventDefault();

    var find_index = $('.clip').index(this);
    if (find_index == 0) {
        var pass = $('#pass_op').prop('type');
        var element = $('#eye_pass_op');
        if (pass == 'password') {
            $("#pass_op").prop('type','text'); 
            $('#eye_pass_op').removeClass("fa-eye-slash");
            $('#eye_pass_op').addClass("fa-eye");
        }else{
            $("#pass_op").prop('type','password');
            $('#eye_pass_op').removeClass("fa-eye");
            $('#eye_pass_op').addClass("fa-eye-slash");
        }
    }else{
        var re_pass = $('#re_pass_op').prop('type');
        var ele_add = $('#eye_repass_op');
        if (re_pass == 'password') {
            $("#re_pass_op").prop('type','text'); 
            $('#eye_repass_op').removeClass("fa-eye-slash");
            $('#eye_repass_op').addClass("fa-eye");
        }else{
            $("#re_pass_op").prop('type','password');
            $('#eye_repass_op').removeClass("fa-eye");
            $('#eye_repass_op').addClass("fa-eye-slash");
        }
    }
});

// reset pasword for operator icon funcitons
$(document).on('click','.clip_reset',function(event){

    event.preventDefault();
    var find_index = $('.clip_reset').index(this);
    // forgot password condition
    if (find_index == 0) {
        var reset_pass = $('#forgot_pass').prop('type');
        if (reset_pass == "password") {
            $('#forgot_pass').prop('type','text');
            $('#eye_pass_forgot').removeClass("fa-eye-slash");
            $('#eye_pass_forgot').addClass("fa-eye");
        }else{
            $('#forgot_pass').prop('type','password');
            $('#eye_pass_forgot').removeClass("fa-eye");
            $('#eye_pass_forgot').addClass("fa-eye-slash");
        }
    }else if(find_index == 1){
        var reset_repass = $('#forgot_confirm_pass').prop('type');
        if (reset_repass == "password") {
            $('#forgot_confirm_pass').prop('type','text');
            $('#eye_repass_forgot').removeClass("fa-eye-slash");
            $('#eye_repass_forgot').addClass("fa-eye");
        }else{
            $('#forgot_confirm_pass').prop('type','password');
            $('#eye_repass_forgot').removeClass("fa-eye");
            $('#eye_repass_forgot').addClass("fa-eye-slash");
        }

    }


});


</script>
