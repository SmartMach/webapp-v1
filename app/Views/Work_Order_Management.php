<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/issue_management.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">
</head>
<style type="text/css">
    .input-field-lable{
        width: 100px;
        height: 28px;
        margin: 0.2rem;
        border: 0.1rem solid #faf7f7;
    }
    .lable-div{
        display: flex;
        /*min-height: 2.3rem !important;*/
        max-height: 10rem !important;
        overflow: auto;
        flex-wrap: wrap;
    }
    .contentContainer{
        margin-top: 0.7rem;
    }
    .padin{
        padding-left:1.5rem;
    }
     .img_font_wh{
        width: 1.7rem;
        height: 1.3rem;
        padding-right: 0.6rem;
        cursor: pointer;
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
    .action_count{
      margin-right: 3rem;
    }



.item-cause {
  background-color: rgb(255, 255, 255);
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 10px;
  display: flex;
  /*justify-content: flex-end;*/
  border:1px solid #d9d9d9;
  border-radius: 5px;
  position: relative;
  z-index: 1500;
  align-items: center;
}   
.item-id{
    margin-right: 5px;
    width: 15%;
}
.item-text {
  margin-right: 5px;
  width: 80%;
}
.font-size{
    font-size: 14px;
}
.font-fam{
    font-family: 'Roboto', sans-serif;
}
.item-remove {
  cursor: pointer;
  width: 5%;
}
.items-container{
    margin-top: 0.5rem;
    margin-bottom: 1.5rem;
}

.item-text-action{
    width: 95% !important
}
.item-remove-action{
    width: 5% !important;
}
.Comments-box{
    margin-top: 1rem;
}
.center-align-center{
    display: flex;
    align-items: center;
}
.marleftalign{
    margin-left: 1.5rem;
}

.Comments-cnt{
    margin-left: 4rem;
}

.filter_multiselect_lable{
    width: 10rem;
    min-height: 2.3rem;
    max-height: 10rem;
    border: 1px solid #ced4da;
    border-radius: 0.3rem;
}
.margtop{
    margin-top: 0.7rem;
}
.dot-style{
    margin-left: 0.7rem;
    height: 2rem;
    cursor: pointer;
}

.delete-cmd{
    cursor: pointer;
}
.edit-cmd{
    cursor: pointer;
}
.cmd-input{
    margin-left: 4rem;
}
.DTICursor{
    cursor: pointer;
}
.download-file{
    cursor: pointer;
}
.fit-width{
    width: fit-content;
}
.attached_file{
    margin-top: 2.5rem;
    display: flex;
    flex-wrap: wrap;
    width: 100%;
}
.filter_checkboxes_filter{
    width: 10rem !important;
}
.suggestion{
    display: none;
    z-index: 1501 !important;
}

.suggestion_width{
    width: 26.5rem !important;
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
.icon_img_wh {
    width: 1.2rem;
    height: 1.2rem;
}



</style>
<?php 
$session = \Config\Services::session();

?>
<div class="mr_left_content_sec">
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">Work Order Management</p>
              <div class="d-flex">
                    
                    <p class="float-end fnt_fam style_label open_color">
                        <span  id="open_total" class="paddingm span-stl"></span>OPEN 
                    </p>
                    <p class="float-end fnt_fam style_label in_progress_color">
                        <span  id="inprogress_total" class="paddingm span-stl"></span>IN PROGRESS 
                    </p>
                    <p class="float-end fnt_fam style_label overdue_color">
                        <span  id="overdue_total" class="paddingm span-stl"></span>OVERDUE
                    </p>
              </div>
          </div>
        </nav>
        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <div class="box rightmar" style="margin-left: 0.5rem;width: 10rem;">
                <div class="input-box" style="display: flex;">
                  <input type="number" class="form-control font_weight font_color" name="" id="pagination_val" style="width:2rem;height:2rem;border-radius:0.2rem;border:1px solid #A6A6A6;color:black;font-size:0.8rem;font-weight:500;">
                  <div class="box rightmar center-align font_color font-size-lable" style="margin-left: 0.5rem;">
                    <p class="paddingm">of <span id="total_pagination"></span> pages</p>
                  </div>
                </div>
            </div>

              <div class="d-flex innerNav">
                    <div class="box rightmar display_f align_c" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect_outer">
                            <div class="filter_selectBox_inner po_relative display_f align_c status" onclick="multiple_drp_status()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_status_val">All Status</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue po_fixed filter_checkboxes_filter Filter_status_div display_hide" style="position:fixed;">
                            </div>
                          </div>
                          <label class="input-padding ">Status</label>
                        </div>
                    </div>
                    <div class="box rightmar display_f align_c" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect_outer">
                            <div class="filter_selectBox_inner po_relative display_f align_c" onclick="multiple_drp_lables()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_lables_val">All Labels</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue po_fixed filter_checkboxes_filter Filter_lables_div display_hide" style="position:fixed;">
                            </div>
                          </div>
                          <label class="input-padding ">Labels</label>
                        </div>
                    </div>
                    <div class="box rightmar display_f align_c" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect_outer">
                            <div class="filter_selectBox_inner po_relative display_f align_c" onclick="multiple_drp_priority()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_priority_val">All Priority</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue po_fixed filter_checkboxes_filter Filter_priority_div display_hide" style="position:fixed;">
                            </div>
                          </div>
                          <label class="input-padding ">Priority</label>
                        </div>
                    </div>
                    <div class="box rightmar display_f align_c" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect_outer">
                            <div class="filter_selectBox_inner po_relative display_f align_c" onclick="multiple_drp_assignee()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_assignee_val">All Assignee</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue po_absolute filter_checkboxes_filter Filter_assignee_div display_hide" style="position:fixed;">
                            </div>
                          </div>
                          <label class="input-padding ">Assignee</label>
                        </div>
                    </div>

                    <!-- <a style="" class="add_btn cursor fnt_bold none_dec fnt_fam float-end" onclick="getFilterval(true)">APPLY FILTER
                    </a> -->
                    <a class="overall_filter_btn overall_filter_header_css" style="text-decoration:none;margin-right:0.5rem;cursor:pointer;"  onclick="getFilterval(true)">Apply Filter
                    </a>


                    <div class="box rightmar" style="margin-right: 0.5rem;display: flex;justify-content: center;">
                        <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;">
                    </div>

                    <?php 
                        if($this->data['access'][0]['work_order_management'] == 3){ 
                    ?>

                    <!-- <a style="" class="add_btn cursor fnt_bold none_dec fnt_fam float-end" id="add_issue_button">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD ISSUE
                    </a> -->
                    <a style="text-decoration:none;margin-right:0.5rem;cursor:pointer;" class="overall_filter_btn overall_filter_header_css" id="add_issue_button">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD ISSUE
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
                      <p class="h_mar_l paddingm">ID</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">TITLE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">LABEL</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">PRIORITY</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">ASSIGNEE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">DUE DATE</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">STATUS</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                      <p class="h_mar_l paddingm">ACTION</p>
                    </div>
                </div>
            </div>

            <div class="contentWorkOrder contentContainer paddingm " style="margin-bottom:0rem;">
            </div>
            </div>
        </div>
</div>
<div class="modal fade" id="AddIssueModal" tabindex="-1" aria-labelledby="AddIssueModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="AddIssueModal1" style="">ADD WORK</h5>
            </div>
                <div class="modal-body model-style">
                    <div class="row">
                        <div class="col-lg-8 box">
                            <div class="input-box reduce_width fieldStyle">      
                                <input type="text" class="form-control font_weight_modal" id="add_work_title" name="" >
                                <label for="" class="input-padding">Title <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputwork_title_Err"></span>  
                                
                                <!-- <span class="float-end charCount" id="addworktitleCunt"></span>  -->
                            </div>
                            <div class="input-box reduce_width fieldStyle" style="height: 8.5rem !important;">      
                                <!-- <input type="textarea" rows="4" class="form-control font_weight_modal" id="" name="" > -->
                                <textarea class="form-control font_weight_modal" id="add_work_description" rows="4"></textarea>
                                <label for="" class="input-padding">Description</label>
                                <span class="paddingm float-start validate" id="input_description_Err"></span> 
                                <span class="float-end charCount" id=""></span> 
                            </div>
                            
                            <div class="input-box reduce_width" style="display: none;" id="cause-add">      
                                <input type="text" class="form-control font_weight_modal input-field-add" id="add_cause" name="" >
                                <label for="" class="input-padding">Cause</label>
                                <!-- <span class="paddingm float-start validate" id="inputtypeErr"></span>  -->
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue po_absolute suggestion suggession_box suggestion_width" id="dropdown-list-cause">
                            </div>
                            <!-- Cause Content -->
                            <div class="items-container reduce_width items-container-cause"></div>

                            <div class="input-box center-align">      
                                <input type="text" class="form-control reduce_width font_weight_modal input-field-action" autocomplete="off" id="add_filed_action" name="add_filed_action" >
                                <label for="" class="input-padding">Action Taken</label>
                                <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" class="dot-style dot-cont input-field-action-add">
                            </div>
                            <span class="paddingm float-start validate" id="input_action_Err"></span> 
                            <!-- <span class="float-end charCount action_count" id="actiontakenCunt"></span>  -->
                            
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue po_absolute suggestion suggession_box suggestion_width" id="dropdown-list-action">
                            </div>
                            <!-- Action Taken content -->
                            <div class="items-container reduce_width items-container-action"></div>

                            <!-- <p class="Comments">Comments</p>
                            <div class="center-align reduce_width">
                                <div style="float: left;width: 10%;" class="center-align">
                                    <div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">MS</p></div>
                                </div>
                                <div class="input-box" style="width: 90%">      
                                    <input type="text" class="form-control font_weight_modal input-field-comments" id="add_input_comment" name="" >
                                </div>
                                <span class="paddingm float-start validate" id="input_comment_Err"></span> 
                            </div>

                            <div class="Comments-box reduce_width items-container-comments">

                            </div> -->

                        </div>
                        <div class="col-lg-4 box">
                            <div class="box">
                                <div class="input-box">
                                    <select class="form-select font_weight_modal" onchange="change_type(this)" name="" id="type-add">
                                        <option value="task">Task</option>
                                        <option value="issue">Issue</option>
                                    </select>
                                    <label for="" class="input-padding">Type <span class="paddingm validate">*</span></label>
                                    <span id="" class="validate"></span>
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Priority</span>
                                    <div class="filter_selectBox priority" onclick="multiple_priority(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="priority_val_lable">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>                                        
                                      </div>
                                    </div>
                                    <!-- <span id="inputpriorityErr" class="validate"></span> -->
                                  </div>
                                </div>
                                <div class="filter_checkboxes_issue po_absolute display_hide filter_priority">
                                    
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect_lable filter_multiselect_input">
                                    <span class="multi_select_label" style="">Label</span>
                                    <div class="filter_selectBox">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                            <div class="lable-div lable-div-add">
                                            </div>
                                            <input type="text" class="form-control font_weight_modal input-field-lable input-field-lable-add" id="input_field_label" name="" >
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
                                <div class="filter_checkboxes_issue po_absolute suggession_box suggestion" id="dropdown-list-lables">
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Assignee</span>
                                    <div class="filter_selectBox assignee" onclick="multiple_assignee(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="assignee_val">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="paddingm float-start validate" id="inputassignErr"></span>
                                </div>
                                <div class="filter_checkboxes_issue po_absolute add_record_assignee display_hide filter_assignee">
                                    <!--  -->
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box">
                                    <input type="date" class="form-control font_weight_modal" id="add_due_date" name="" value="">
                                    <label for="" class="input-padding">Due Date <span class="paddingm validate">*</span></label>
                                    <span id="" class="validate"></span>
                                  <span class="paddingm float-start validate" id="inputdateErr"></span>
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Status</span>
                                    <div class="filter_selectBox status" onclick="multiple_status(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="status_val_lable">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <span class="paddingm float-start validate" id="inputstatusErr"></span>
                                </div>
                                <div class="filter_checkboxes_issue po_absolute display_hide filter_status">
                                    
                                </div>
                            </div>
                            <div class="attach-file">
                                <p class="paddingm DTI DTICursor">
                                    <span class="unit-val"><i class="fa fa-paperclip clip " aria-hidden="true"></i></span>Attach</p>
                                <input class="attach_file_class" onchange="displaySelectedFiles()" type="file" name="" id="attach_file" style="display: none;">
                            </div>
                            <div class="attached_file attached_file_add">
                                <!-- <div class="attached_file_list"></div> -->
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Add_Work_Data saveBtnStyle" name="Add_Machine" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>
                </div>
    </div>
  </div>
</div>
<div class="modal fade" id="EditIssueModal" tabindex="-1" aria-labelledby="EditIssueModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditIssueModal1" style=""></h5>
            </div> 
                <div class="modal-body model-style">
                    <div class="row">
                        <div class="col-lg-8 box">
                            <div class="input-box reduce_width fieldStyle">      
                                <input type="text" class="form-control font_weight_modal" id="edit_work_title" name="" >
                                <label for="" class="input-padding">Title <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="edit_work_title_Err"></span> 
                                <!-- <span class="float-end charCount" id="edit_work_title_cout"></span>  -->
                            </div>
                            <div class="input-box reduce_width fieldStyle" style="height: 8.5rem !important;">      
                                <textarea class="form-control font_weight_modal" id="edit_work_description" rows="4"></textarea>
                                <label for="" class="input-padding">Description</label>
                                <!-- <span class="paddingm float-start validate" id="edit_description_Err"></span>  -->
                                <span class="float-end charCount" id=""></span> 
                            </div>
                            
                            <div class="input-box reduce_width" style="display: none;" id="cause-edit">      
                                <input type="text" class="form-control font_weight_modal input-field-edit" id="edit_cause" name="" >
                                <label for="" class="input-padding">Cause</label>
                                <!-- <span class="paddingm float-start validate" id="edittypeErr"></span>  -->
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue po_absolute suggession_box suggestion suggestion_width" id="dropdown-list-cause-edit">
                            </div>
                            <!-- Cause Container -->
                            <div class="items-container reduce_width items-container-edit-cause"></div>

                            <div class="input-box center-align">      
                                <input type="text" class="form-control reduce_width font_weight_modal input-field-action-edit" id="edit_field_action" name="" >
                                <label for="" class="input-padding">Action Taken</label>
                                <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" class="dot-style dot-cont input-field-action-edit-add">
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue po_absolute suggession_box suggestion suggestion_width" id="dropdown-list-action-edit">
                            </div>
                            <!-- <span class="paddingm float-start validate" id="edit_action_Err"></span>  -->
                            <!-- <span class="float-end charCount action_count" id="editactiontakenCunt"></span>  -->

                            <!-- Action Content -->
                            <div class="items-container reduce_width items-container-edit-action"></div>
                            <p class="Comments">Comments</p>
                            <div class="center-align reduce_width">
                                <div style="float: left;width: 10%;" class="center-align">
                                    <div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm Edit_Current_User"></p></div>
                                </div>
                                <div class="input-box" style="width: 90%">      
                                    <input type="text" class="form-control font_weight_modal input-field-comments-edit" id="" name="" >
                                </div>
                            </div>

                            <div class="Comments-box items-container-edit-comments">

                            </div>

                        </div>
                        <div class="col-lg-4 box">
                            <div class="box">
                                <div class="input-box">
                                    <select class="form-select font_weight_modal" onchange="change_type_edit(this)" name="" id="type-edit">
                                        <option value="task">Task</option>
                                        <option value="issue">Issue</option>
                                    </select>
                                    <label for="" class="input-padding">Type <span class="paddingm validate">*</span></label>
                                    <span id="" class="validate"></span>
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Priority</span>
                                    <div class="filter_selectBox" onclick="multiple_priority(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="priority_val_edit_lable">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes_issue po_absolute display_hide edit_priority filter_priority">
                
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect_lable filter_multiselect_input">
                                    <span class="multi_select_label" style="">Label</span>
                                    <div class="filter_selectBox">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                            <div class="lable-div lable-div-edit">
                                            </div>
                                            <input type="text" class="form-control font_weight_modal input-field-lable input-field-lable-edit" id="input-field-lable-edit" name="" >
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
                                <div class="filter_checkboxes_issue po_absolute suggession_box suggestion" id="dropdown-list-lables-edit">
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Assignee</span>
                                    <div class="filter_selectBox assignee" onclick="multiple_assignee(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="assignee_edit_val">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes_issue po_absolute edit_record_assignee display_hide filter_assignee">
                                    <!--  -->
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box">
                                    <input type="date" class="form-control font_weight_modal" id="edit_due_date" name="" >
                                    <label for="" class="input-padding">Due Date<span class="paddingm validate">*</span></label>
                                    <span id="" class="validate"></span>
                                    <span class="paddingm float-start validate" id="inputdateErrEdit"></span>
                                    
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Status </span>
                                    <div class="filter_selectBox" onclick="multiple_status(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="status_val_edit_lable">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes_issue po_absolute display_hide edit-status filter_status">
                                </div>
                            </div>
                            <div class="attach-file">
                                <p class="paddingm DTIEdit DTICursor">
                                    <span class="unit-val"><i class="fa fa-paperclip clip " aria-hidden="true"></i></span>Attach</p>
                                <input class="attach_file_class" onchange="displaySelectedFilesEdit()" type="file" name="" id="attach_file_edit" style="display: none;">
                            </div>
                            <div class="attached_file attached_file_edit">
                                <!-- <div class="attached_file_list"></div> -->
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Edit_Work_Data saveBtnStyle" name="Add_Machine" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="InfoIssueModal" tabindex="-1" aria-labelledby="InfoIssueModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded ">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="InfoIssueModal1" style=""></h5>
            </div> 
                <div class="modal-body model-style">
                    <div class="row">
                        <div class="col-lg-8 box">
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Title</label>
                              <p><span id="info_title" class="font_weight_modal"></span></p>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Description</label>
                              <p><span id="info_description" class="font_weight_modal"></span></p>
                            </div>
                            
                            <div class="box" id="cause-info" style="display: none;">
                              <label for="" class="input-padding col-form-label headTitle">Cause</label>
                              <div class="items-container reduce_width items-container-cause-info"></div>
                            </div>
                            <!-- Cause Container -->
                            <div class="items-container reduce_width items-container-info-cause"></div>

                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Action Taken</label>
                              <div class="items-container reduce_width items-container-info"></div>
                            </div>

                            <!-- Action Content -->
                            <!-- <div class="items-container reduce_width items-container-info-action"></div> -->
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Comments</label>
                            </div>

                            <div class="Comments-box reduce_width items-container-info-comments">

                            </div>

                        </div>
                        <div class="col-lg-4 box">
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Type</label>
                              <p><span id="info_type" class="font_weight_modal"></span></p>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Priority</label>
                              <p>
                                <span id="info_priority" class="font_weight_modal"></span>
                              </p>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Label</label>
                              <div class="lable-div lable-div-info"></div>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Assignee</label>
                              <span id="info_assignee" class="font_weight_modal"></span>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Due Date</label>
                              <p><span id="info_due_date" class="font_weight_modal"></span></p>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Status</label>
                              <p>
                                <span id="info_status" class="font_weight_modal"></span>
                              </p>
                            </div>
                            <div class="box">
                              <label for="" class="input-padding col-form-label headTitle">Attachments</label>
                              <div class="attached_file attached_file_info" style="margin-top:0rem;"></div>
                            </div>
                        </div>  
                    </div>
                </div>

                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveWorkOrderModal" tabindex="-1" aria-labelledby="DeactiveWorkOrderModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeactiveWorkOrderModal1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body" style="max-width:max-content;">
                    <label style="color: black;">Are you sure you want to delete this work order record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Delete-Work-Lable Delete-Work-Order saveBtnStyle" name="" value="SAVE" >Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var user_id_ref ="<?php  echo $this->data['user_details'][0]['user_id'] ; ?>";
    var assignee_list = [];
    var lable_list_globle = [];
    var action_list_globle = [];
    var priority_list_globle =[];
    var status_list_globle =[];
    var attach_list_globle =[];
    var issue_list_globle = [];
    var comments_list_globle =[];
    var filter_array = [];

    var action_list_globle_unique=[];
    var action_id_list_globle_unique=[];
    var cause_list_globle_unique=[];
    var lable_list_globle_unique=[];

    function change_type(item){
        if (item.value == "task") {
          document.getElementById("cause-add").style.display = "none";
          $(".item-cause").css('display','none');
          $(".items-container-cause").css("margin-bottom","0rem");
        }
        else{
          $(".items-container-cause").css("margin-bottom","1.5rem");
          document.getElementById("cause-add").style.display = "block";
          $(".item-cause").css('display','block');
        }
    }

    function change_type_edit(item){
        if (item.value == "task") {
          document.getElementById("cause-edit").style.display = "none";
        }
        else{
          document.getElementById("cause-edit").style.display = "block";
        }
    }

    $(document).on('click','#add_issue_button',function(event){

        action_list_globle_unique=[];
        action_id_list_globle_unique=[];
        cause_list_globle_unique=[];
        lable_list_globle_unique=[];

        $(".suggession_box").css("display","none");
        $(".items-container-cause").empty();
        $(".items-container-action").empty();
        $(".lable-div-add").css("display","none");
        $(".lable-div-add").empty();

        $('#type-add').val("task");

        $(".item-cause").css('display','none');
        $("#cause-add").css('display','none');
        
        $(".items-container-cause").css("margin-bottom","0rem");

        $("#add_work_title").val('');
        $("#add_work_description").val('');
        $("#add_filed_action").val('');
        $('.items-container-action .item-cause').remove();
        $('#add_input_comment').val('');
        $("#assignee_val").text('Select');
        $("#add_due_date").val('');
          
        $('#priority_val_lable').html('<i class="fa-solid fa-equals" style="color: #ffaa00"></i> <span>Medium</span>');
        $('.priority_add:eq(1)').prop('checked', true);

        $('#input_field_label').val('');
        $('.lable-bg').remove();
        $('#inputassignErr').html("");
        $('#inputstatusErr').html("");
        $("#label_action_Err").html("");
        $('#inputpriorityErr').html("");
        $("#input_comment_Err").html("");
        $("#input_description_Err").html("");
        $('#inputwork_title_Err').html("");
        $('#input_action_Err').html("");
        $('#inputdateErr').html("");
        
        $('#status_val_lable').html('<i class="fa fa-stop" style="color: #7f7f7f"></i> <span style="color: #7f7f7f">OPEN</span>');
        // $('.status_add:eq(0)').prop('checked', true);
        $('.inbox_status').children("input[name=status_val]").attr('checked', false);
        $('.inbox_status:eq(0)').children("input[name=status_val]").attr('checked', true);

        $('#AddIssueModal').modal('show');
    });

    function multiple_priority(t) {
      $(".filter_checkboxes_issue").addClass("display_hide");
      if ($('.filter_priority').css("display") == "none") {
          $(".filter_priority").removeClass("display_hide");
          $(".filter_priority").addClass("display_visible");
      } else {
          $(".filter_priority").removeClass("display_visible");
          $(".filter_priority").addClass("display_hide");
      }
      $('.filter_priority ').click(function(){
        $(".filter_priority").removeClass("display_visible");
          $(".filter_priority").addClass("display_hide");
      })
    }

    function multiple_assignee(t) {
      $(".filter_checkboxes_issue").addClass("display_hide");
      if ($('.filter_assignee').css("display") == "none") {
          $(".filter_assignee").removeClass("display_hide");
          $(".filter_assignee").addClass("display_visible");
      } else {
          $(".filter_assignee").removeClass("display_visible");
          $(".filter_assignee").addClass("display_hide");
      }
      $('.filter_assignee ').click(function(){
        $(".filter_assignee").removeClass("display_visible");
          $(".filter_assignee").addClass("display_hide");
      });
    }

    function multiple_status(t) {
      $(".filter_checkboxes_issue").addClass("display_hide");
      if ($('.filter_status').css("display") == "none") {
          $(".filter_status").removeClass("display_hide");
          $(".filter_status").addClass("display_visible");
      } else {
          $(".filter_status").removeClass("display_visible");
          $(".filter_status").addClass("display_hide");
      }
      $('.filter_status ').click(function(){
        $(".filter_status").removeClass("display_visible");
          $(".filter_status").addClass("display_hide");
      });
    }

function multiple_drp_status() {
    $('.filter_checkboxes_issue').css("display","none");
    if ($('.Filter_status_div').css("display") == "none") {
        $('.Filter_status_div').css("display","block");
    } else {
        $('.Filter_status_div').css("display","none");
    }
}
function multiple_drp_lables() {
    $('.filter_checkboxes_issue').css("display","none");
    if ($('.Filter_lables_div').css("display") == "none") {
        $('.Filter_lables_div').css("display","block");
    } else {
        $('.Filter_lables_div').css("display","none");
    }
}
function multiple_drp_priority() {
    $('.filter_checkboxes_issue').css("display","none");
    if ($('.Filter_priority_div').css("display") == "none") {
        $('.Filter_priority_div').css("display","block");
    } else {
        $('.Filter_priority_div').css("display","none");
    }
}
function multiple_drp_assignee() {
    $('.filter_checkboxes_issue').css("display","none");
    if ($('.Filter_assignee_div').css("display") == "none") {
        $('.Filter_assignee_div').css("display","block");
    } else {
        $('.Filter_assignee_div').css("display","none");
    }
}




$(document).mouseup(function(event){
    // Filter
    var filter_status = $('.Filter_status_div');
    if (!filter_status.is(event.target) && filter_status.has(event.target).length==0) {
        filter_status.hide();
    }
    var filter_lables = $('.Filter_lables_div');
    if (!filter_lables.is(event.target) && filter_lables.has(event.target).length==0) {
        filter_lables.hide();
    }
    var filter_priority = $('.Filter_priority_div');
    if (!filter_priority.is(event.target) && filter_priority.has(event.target).length==0) {
        filter_priority.hide();
    }
    var filter_assignee = $('.Filter_assignee_div');
    if (!filter_assignee.is(event.target) && filter_assignee.has(event.target).length==0) {
        filter_assignee.hide();
    }

    // Suggession...
    var cause = $('#dropdown-list-cause');
    if (!cause.is(event.target) && cause.has(event.target).length==0) {
        cause.hide();
    }
    var action = $('#dropdown-list-action');
    if (!action.is(event.target) && action.has(event.target).length==0) {
        action.hide();
    }
    var lables = $('#dropdown-list-lables');
    if (!lables.is(event.target) && lables.has(event.target).length==0) {
        lables.hide();
    }

    var cause_edit = $('#dropdown-list-cause-edit');
    if (!cause_edit.is(event.target) && cause_edit.has(event.target).length==0) {
        cause_edit.hide();
    }
    var action_edit = $('#dropdown-list-action-edit');
    if (!action_edit.is(event.target) && action_edit.has(event.target).length==0) {
        action_edit.hide();
    }
    var lables_edit = $('#dropdown-list-lables-edit');
    if (!lables_edit.is(event.target) && lables_edit.has(event.target).length==0) {
        lables_edit.hide();
    }



    var part_check = $('.filter_priority');
    if (!part_check.is(event.target) && part_check.has(event.target).length==0) {
        $(".filter_priority").removeClass("display_visible");
        $(".filter_priority").addClass("display_hide");
    }

    var status_check = $('.filter_status');
    if (!status_check.is(event.target) && status_check.has(event.target).length==0) {
        $(".filter_status").removeClass("display_visible");
        $(".filter_status").addClass("display_hide");
    }

    var assignee_check = $('.filter_assignee');
    if (!assignee_check.is(event.target) && assignee_check.has(event.target).length==0) {
        $(".filter_assignee").removeClass("display_visible");
        $(".filter_assignee").addClass("display_hide");
    }


});

$(document).on('click','.inbox_priority',function(event){
    var index = $('.inbox_priority').index(this);
    $('.inbox_priority').children("input[name=priority_val]").attr('checked', false);
    $('.inbox_priority:eq('+index+')').children("input[name=priority_val]").attr('checked', true);

    if (index == 0) {
        $('#priority_val_lable').html('<i class="fa fa-angle-double-right" style="rotate:270deg;color: #ff5630"></i> <span>High</span>');
    }
    else if (index ==1) {
        $('#priority_val_lable').html('<i class="fa-solid fa-equals" style="color: #ffaa00"></i> <span>Medium</span>');
    }
    else{
        $('#priority_val_lable').html('<i class="fa fa-angle-double-right" style="rotate:90deg;color: #0066ff"></i> <span>Low</span>');
    }    
});

$(document).on('click','.inbox_priority_edit',function(event){
    var index = $('.inbox_priority_edit').index(this);
    $('.inbox_priority_edit').children("input[name=priority_edit]").attr('checked', false);
    $('.inbox_priority_edit:eq('+index+')').children("input[name=priority_edit]").attr('checked', true);

    if (index == 0) {
        $('#priority_val_edit_lable').html('<i class="fa fa-angle-double-right" style="rotate:270deg;color: #ff5630"></i> <span>High</span>');
    }
    else if (index ==1) {
        $('#priority_val_edit_lable').html('<i class="fa-solid fa-equals" style="color: #ffaa00"></i> <span>Medium</span>');
    }
    else{
        $('#priority_val_edit_lable').html('<i class="fa fa-angle-double-right" style="rotate:90deg;color: #0066ff"></i> <span>Low</span>');
    }    
});


$(document).on('click','.inbox_status',function(event){
    var index = $('.inbox_status').index(this);

    $('.inbox_status').children("input[name=status_val]").attr('checked', false);
    $('.inbox_status:eq('+index+')').children("input[name=status_val]").attr('checked', true);

    if (index == 0) {
        $('#status_val_lable').html('<i class="fa fa-stop" style="color: #7f7f7f"></i> <span style="color: #7f7f7f">OPEN</span>');
    }
    else if (index ==1) {
        $('#status_val_lable').html('<i class="fa fa-stop" style="color: #4195f6"></i> <span style="color: #4195f6">IN PROGRESS</span>');
    }
    else{
         $('#status_val_lable').html('<i class="fa fa-stop" style="color: #6ac950"></i> <span style="color: #6ac950">CLOSED</span>');
    }    
});


$(document).on('click','.inbox_status_edit',function(event){
    var index = $('.inbox_status_edit').index(this);
    $('.inbox_status_edit').children("input[name=status_edit_val]").attr('checked', false);
    $('.inbox_status_edit:eq('+index+')').children("input[name=status_edit_val]").attr('checked', true);

    if (index == 0) {
        $('#status_val_edit_lable').html('<i class="fa fa-stop" style="color: #7f7f7f"></i> <span style="color: #7f7f7f">OPEN</span>');
    }
    else if (index ==1) {
        $('#status_val_edit_lable').html('<i class="fa fa-stop" style="color: #4195f6"></i> <span style="color: #4195f6">IN PROGRESS</span>');
    }
    else{
         $('#status_val_edit_lable').html('<i class="fa fa-stop" style="color: #6ac950"></i> <span style="color: #6ac950">CLOSED</span>');
    }    
});

$(document).on('click','.inbox_assignee',function(event){
    var index = $('.inbox_assignee').index(this);
    $('.inbox_assignee').children("input[name=assignee_val]").attr('checked', false);
    $('.inbox_assignee:eq('+index+')').children("input[name=assignee_val]").attr('checked', true);

    $('#assignee_val').html('<div style="float: left;width: 100%;" class="center-align">'
        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
            +'<p class="paddingm">'+$('.inbox_assignee:eq('+index+')').children('.circle-div-root').children('.circle-div').children('p').text()+'</p>'
        +'</div>'
        +'<span style="color: #7f7f7f">'+$('.inbox_assignee:eq('+index+')').children('.assignee_name_class').children('p').text()+'</span>'
        +'</div>');
});

$(document).on('click','.inbox_assignee_edit',function(event){
    var index = $('.inbox_assignee_edit').index(this);
    $('.inbox_assignee_edit').children("input[name=assignee_edit_val]").attr('checked', false);
    $('.inbox_assignee_edit:eq('+index+')').children("input[name=assignee_edit_val]").attr('checked', true);

    $('#assignee_edit_val').html('<div style="float: left;width: 100%;" class="center-align">'
        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
            +'<p class="paddingm">'+$('.inbox_assignee_edit:eq('+index+')').children('.circle-div-root').children('.circle-div').children('p').text()+'</p>'
        +'</div>'
        +'<span style="color: #7f7f7f">'+$('.inbox_assignee_edit:eq('+index+')').children('.assignee_name_class').children('p').text()+'</span>'
        +'</div>');
});


//  Edit Work Order Acknowledge ........... 
$(document).on("click", ".info-work-order", function(event){
  event.preventDefault();
  event.stopPropagation();
  var id = $(this).attr("edit-item");
  $('.Edit_Work_Data').attr('status_data',id);

  $.ajax({
        url: "<?php echo base_url('Work_Order_Management_controller/getEditRec'); ?>",
        type: "POST",
        cache: false,
        async:false,
        data: {
          order_id : id,
        },
        dataType: "json",
        success:function(res){
            $('#info_title').html(res[0]['title']);
            $('#info_description').html(res[0]['description']);
            $('#info_type').html(res[0]['type']);
            $('#InfoIssueModal1').text(res[0]['work_order_id']);

            var priority_img_color = "";
            var priority_img_rotate="";
            var priority_img="";
            var priority_val = "";
            if (res[0]['priority_id'] == 1) {
                priority_img_color = "#ff5630";
                priority_img_rotate = "270deg";
                priority_img="fa-angle-double-right";
                priority_val="High";
            }else if (res[0]['priority_id'] == 2) {
                priority_img_color = "#ffaa00";
                priority_img_rotate="180deg";
                priority_img="fa-equals";
                priority_val="Medium";
            }else{
                priority_img_color = "#0066ff";
                priority_img_rotate = "90deg";
                priority_img="fa-angle-double-right";
                priority_val="Low";
            }

            $('#info_priority').html('<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i> <span>'+priority_val+'</span>');

            assignee_list.forEach(function(item){
                var elements = $();
                if (item['user_id'] == res[0]['assignee']) {
                    var user_color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                    var randomColor = user_color[Math.floor(Math.random()*user_color.length)];

                    $('#info_assignee').html('<div style="float: left;width: 100%;display:flex">'
                      +'<div class="circle-div-select" style="background:'+randomColor+';color:white;">'
                        +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                      +'</div>'
                      +'<span style="color: #7f7f7f;margin-left:0.5rem;">'+item['first_name']+' '+item['last_name']+'</span>'
                    +'</div>');
                }
            });

            // Due Date....
            var due_date = new Date(res[0]['due_date']);
            $('#info_due_date').html(due_date.toISOString().substr(0, 10));

            // Privious Status....
            status_list_globle.forEach(function(st){
                var background_color ="";
                var val="";
                if (st['status_id'] == 1) {
                    val = "OPEN";
                    background_color = "#7f7f7f";
                }
                else if (st['status_id'] ==2) {
                    val = "IN PROGRESS";
                    background_color = "#4195f6";
                }
                else{
                    val = "CLOSED";
                    background_color = "#6ac950";
                }
                var elements = $();
                if (st['status_id'] == res[0]['status_id']) {
                  $('#info_status').html('<i class="fa fa-stop" style="color: '+background_color+'"></i> <span style="color: '+background_color+'">'+val+'</span>');
                }
            });

            $(".lable-div-info").empty();
            const value_lable = String(res[0]['lable_id']).split(",");
            value_lable.forEach(function(lable){
                lable_list_globle.forEach(function(lable_item){
                    var itemsContainerlable = $();
                    if (lable_item['lable_id'] == lable) {
                        itemsContainerlable = itemsContainerlable.add('<div class="lable-bg">'
                            +'<span lable_list_id="'+lable_item['lable_id']+'" class="lable_items">'+lable_item['lable']+'</span>'
                        +'</div>');
                        $(".lable-div-info").append(itemsContainerlable);
                    }
                });
            });

            var attach_file = String(res[0]['attachment_id']).split(",");
            $('.attached_file_info').empty();
            attach_file.forEach(function(im){
                attach_list_globle.forEach(function(image){
                    var elements = $();
                    if (image['attach_file_id'] == im) {
                        elements = elements.add('<div class="fit-width lable-bg-file">'
                            +'<span attach_list_id="'+im+'" class="attached_file_list_edit download-file">'+image['original_file_name']+'</span>'
                            +'</div>');
                    }
                    $('.attached_file_info').append(elements);
                }); 
            });

            // Previous Action....
            const value = String(res[0]['action_id']).split(",");
            $(".items-container-info").empty();
            value.forEach(function(ac){
                action_list_globle.forEach(function(action_item){
                    if (action_item['action_id'] == ac) {
                        var itemsContaineraction = $();
                        itemsContaineraction = itemsContaineraction.add('<div class="item-cause">'
                            +'<span class="item-text font_weight_modal font-fam item-text-action stcode-up" action_list_id="'+action_item['action_id']+'">'+action_item['action']+'</span>'
                            +'</div>');
                        $(".items-container-info").append(itemsContaineraction);
                    }
                });
            });

            if (res[0]['type'] == "issue") {
              $('#cause-info').css("display","block");
              $(".items-container-cause-info").empty();
              if (res[0]['cause_id'] != null) {
                var issue = String(res[0]['cause_id']).split(",");
                issue.forEach(function(issue){
                    issue_list_globle.forEach(function(issue_item){
                        if (issue == issue_item['cause_id']) {
                            var itemsContaineraction = $();
                            itemsContaineraction = itemsContaineraction.add('<div class="item-cause">'
                                +'<span class="item-id font_weight_modal font-fam stcode-up font-color" cause_list_id="'+issue+'">'+issue+'</span>'
                                +'<span class="item-text font_weight_modal font-fam stcode-up">'+issue_item['cause']+'</span>'
                            +'</div>');
                            $(".items-container-cause-info").append(itemsContaineraction);
                        }
                    });
                });
              }
            }else{
              $('#cause-info').css("display","none");
            }

            previous_comments(res);
            
            // Close the Acknowledge ................
            $('#InfoIssueModal').modal('show');
            // $("#overlay").fadeOut(300);
    
        },
        error:function(res){
            // alert("Sorry! Try Agian!!");
            $("#overlay").fadeOut(300);
        }
    });
  
});

function previous_comments(res){
  // Previous Comments....
            $('.items-container-info-comments').empty();
            var comment = String(res[0]['comment_id']).split(",");
            comment.forEach(function(cm){
                comments_list_globle.forEach(function(comment_item){
                    var elements = $();
                    if (cm == comment_item['comment_id']) {
                        var u_name = "";
                        var u_logo="";
                        assignee_list.forEach(function(item){
                            if (item['user_id'] == comment_item['last_updated_by']) {
                                u_logo = item['first_name'].trim().slice(0,1).toUpperCase()+''+item['last_name'].trim().slice(0,1).toUpperCase();
                                u_name = item['first_name']+" "+item['last_name'];
                            }
                        });

                        var display_option="none";
                        if (user_id_ref == comment_item['last_updated_by']) {
                            display_option = "block";
                        }

                        var date = new Date(res[0]['last_updated_on']);
                        var x_date = ("0" +date.getDate()).slice(-2)+" "+(date.toLocaleString([], { month: 'short' })+" "+(date.getFullYear()))+" at "+("0" +date.getHours()).slice(-2)+":"+("0" +date.getMinutes()).slice(-2);
                        elements = elements.add('<div class="Comments-list">'
                            +'<div class="center-align">'
                                +'<div style="float: left;width: 10%;" class="center-align">'
                                    +'<div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">'+u_logo+'</p></div>'
                                +'</div>'
                                +'<div class="input-box" style="width: 90%">'
                                    +'<div class="center-align-center">'
                                        +'<p class="paddingm font_weight_modal font-size font-fam">'+u_name+'</p>'
                                        +'<p class="paddingm font_weight_modal marleftalign font-fam font-size font-color"> <span>'+x_date+'</span></p>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                            +'<div class="center-align-center cmd-cnt">'
                                +'<p class="paddingm font_weight_modal Comments-cnt font-fam font-size font-color">'+comment_item['comment']+'</p>'
                                +'<input type="text" style="display:none" class="form-control font_weight_modal cmd-input" id="" name="">'
                            +'</div>'
                        +'</div>');
                        $('.items-container-info-comments').append(elements);
                    }
                });
            });

}

//  Edit Work Order Acknowledge ........... 
$(document).on("click", ".edit-work-order", function(event){

    $(".suggession_box").css("display","none");
    $(".input-field-comments-edit").val("");
    $(".input-field-action-edit").val("");
    $(".input-field-edit").val("");
    $(".input-field-lable-edit").val("");

    event.preventDefault();
    event.stopPropagation();
    var id = $(this).attr("edit-item");
    $('.Edit_Work_Data').attr('status_data',id);
    
    $.ajax({
        url: "<?php echo base_url('Work_Order_Management_controller/getEditRec'); ?>",
        type: "POST",
        cache: false,
        async:false,
        data: {
            order_id : id,
        },
        dataType: "json",
        success:function(res){
            $('#edit_work_title_Err').html("");
            $('#inputdateErrEdit').html("");

            $('#EditIssueModal1').text(res[0]['work_order_id']);
            $('#edit_work_title').val(res[0]['title']);
            $('#edit_work_description').val(res[0]['description']);
            $('#type-edit').val(res[0]['type']);

            // Previous Action....
            const value = String(res[0]['action_id']).split(",");
            $(".items-container-edit-action").empty();
            action_list_globle_unique = [];
            value.forEach(function(ac){
                action_list_globle.forEach(function(action_item){
                    if (action_item['action_id'] == ac) {
                      var itemsContaineraction = $();
                      itemsContaineraction = itemsContaineraction.add('<div class="item-cause">'
                          +'<span class="item-text font-fam item-text-action stcode-up" action_list_id="'+action_item['action_id']+'">'+action_item['action']+'</span>'
                          +'<span class="item-remove item-remove-action-edit item-remove-action font-fam stcode-up font-color"><i class="fa fa-times" aria-hidden="true"></i></span>'
                          +'</div>');
                      $(".items-container-edit-action").append(itemsContaineraction);
                      action_list_globle_unique.push(action_item['action']);
                      action_id_list_globle_unique.push(action_item['action']);
                    }
                });
            });

            // Previous Cause.....
            cause_list_globle_unique = [];
            if (res[0]['type'] == "issue") {
                $('#cause-edit').css("display","block");
                $(".items-container-edit-cause").css("display","block");

                $(".items-container-edit-cause").empty();
                if (res[0]['cause_id'] != null) {
                    var issue = String(res[0]['cause_id']).split(",");
                    issue.forEach(function(issue){
                        issue_list_globle.forEach(function(issue_item){
                            if (issue == issue_item['cause_id']) {
                                var itemsContaineraction = $();
                                itemsContaineraction = itemsContaineraction.add('<div class="item-cause">'
                                    +'<span class="item-id font-fam stcode-up font-color" cause_list_id="'+issue+'">'+issue+'</span>'
                                    +'<span class="item-text font-fam stcode-up">'+issue_item['cause']+'</span>'
                                    +'<span class="item-remove item-remove-cause-edit font-fam stcode-up font-color">'
                                        +'<i class="fa fa-times" aria-hidden="true"></i>'
                                    +'</span>'
                                +'</div>');
                                $(".items-container-edit-cause").append(itemsContaineraction);

                                cause_list_globle_unique.push(issue_item['cause']);
                            }
                        });
                    });
                }
            }else{
              $('#cause-edit').css("display","none");
              $(".items-container-edit-cause").css("display","none");
            }
            

            // Previous Priority....
            $(".edit_priority").empty();
            priority_list_globle.forEach(function(priority_item){
                var itemsContainerpriority = $();
                var priority_img_color = "";
                var priority_img_rotate="";
                var priority_img="";
                if (priority_item['priority_id'] == 1) {
                    priority_img_color = "#ff5630";
                    priority_img_rotate = "270deg";
                    priority_img="fa-angle-double-right";
                }else if (priority_item['priority_id'] == 2) {
                    priority_img_color = "#ffaa00";
                    priority_img_rotate="180deg";
                    priority_img="fa-equals";
                }else{
                    priority_img_color = "#0066ff";
                    priority_img_rotate = "90deg";
                    priority_img="fa-angle-double-right";
                }

                if (priority_item['priority_id'] == res[0]['priority_id']) {
                    itemsContainerpriority = itemsContainerpriority.add('<div class="inbox inbox_priority_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                            +'<p class="inbox-span paddingm">'+priority_item['priority']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="priority_edit radio-visible" name="priority_edit" value="'+priority_item['priority_id']+'" checked>'
                    +'</div>');
                    $(".edit_priority").append(itemsContainerpriority);

                    $('#priority_val_edit_lable').html('<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i> <span>'+priority_item['priority']+'</span>');

                }else{
                    itemsContainerpriority = itemsContainerpriority.add('<div class="inbox inbox_priority_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                            +'<p class="inbox-span paddingm">'+priority_item['priority']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="priority_edit radio-visible" name="priority_edit" value="'+priority_item['priority_id']+'">'
                    +'</div>');
                    $(".edit_priority").append(itemsContainerpriority);
                }
            });


            // Privious Lables....
            $(".lable-div-edit").empty();
            lable_list_globle_unique = [];
            const value_lable = String(res[0]['lable_id']).split(",");
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
                        lable_list_globle_unique.push(lable_item['lable']);
                        $(".lable-div-edit").append(itemsContainerlable);
                    }
                });
            });
            $(".lable-div-edit").addClass("margtop");
            
            // Privious Assignee....
            $('.edit_record_assignee').empty();
            assignee_list.forEach(function(item){
                var user_color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                var randomColor = user_color[Math.floor(Math.random()*user_color.length)];

                var elements = $();
                if (item['user_id'] == res[0]['assignee']) {
                    
                    elements = elements.add('<div class="inbox inbox_assignee_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                            +'<div class="circle-div" style="background:'+randomColor+';color:white;">'
                                +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                            +'</div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="assignee_edit radio-visible" name="assignee_edit_val" value="'+item['user_id']+'" checked>'
                    +'</div>');

                    if(item['site_id'] != "smartories"){
                      $('.edit_record_assignee').append(elements);
                    }

                    $('#assignee_edit_val').html('<div style="float: left;width: 100%;" class="center-align">'
                        +'<div class="circle-div-select" style="background:'+randomColor+';color:white;">'
                            +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                        +'</div>'
                        +'<span style="color: #7f7f7f">'+item['first_name']+' '+item['last_name']+'</span>'
                        +'</div>');
                }else{
                    elements = elements.add('<div class="inbox inbox_assignee_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                            +'<div class="circle-div" style="background:'+randomColor+';color:white;">'
                                +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                            +'</div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="assignee_edit radio-visible" name="assignee_edit_val" value="'+item['user_id']+'">'
                    +'</div>');
                    if(item['site_id'] != "smartories"){
                      $('.edit_record_assignee').append(elements);
                    }
                }
            });
            
        
            // Privious Status....
            $('.edit-status').empty();
            status_list_globle.forEach(function(st){
                var background_color ="";
                var val="";
                if (st['status_id'] == 1) {
                    val = "OPEN";
                    background_color = "#7f7f7f";
                }
                else if (st['status_id'] ==2) {
                    val = "IN PROGRESS";
                    background_color = "#4195f6";
                }
                else{
                    val = "CLOSED";
                    background_color = "#6ac950";
                }
                var elements = $();
                if (st['status_id'] == res[0]['status_id']) {
                    elements = elements.add('<div class="inbox inbox_status_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<div class="square-div" style="background:'+background_color+';color:white;"></div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                            +'<p class="inbox-span paddingm" style="color: '+background_color+'">'+val+'</p>'
                        +'</div>'
                        +'<input type="radio" class="status_add radio-visible" name="status_edit_val" value="'+st['status_id']+'" checked>'
                    +'</div>');
                    $('.edit-status').append(elements);
                    $('#status_val_edit_lable').html('<i class="fa fa-stop" style="color: '+background_color+'"></i> <span style="color: '+background_color+'">'+val+'</span>');
                }
                else{
                    elements = elements.add('<div class="inbox inbox_status_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<div class="square-div" style="background:'+background_color+';color:white;"></div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                            +'<p class="inbox-span paddingm" style="color: '+background_color+'">'+val+'</p>'
                        +'</div>'
                        +'<input type="radio" class="status_add radio-visible" name="status_edit_val" value="'+st['status_id']+'">'
                    +'</div>');
                    $('.edit-status').append(elements);
                }
            });


            // Previouse File....
            var attach_file = String(res[0]['attachment_id']).split(",");
            $('.attached_file_edit').empty();
            attach_file.forEach(function(im){
                attach_list_globle.forEach(function(image){
                    var elements = $();
                    if (image['attach_file_id'] == im) {
                        elements = elements.add('<div class="fit-width lable-bg-file">'
                            +'<span attach_list_id="'+im+'" class="attached_file_list_edit download-file">'+image['original_file_name']+'</span>'
                            +'<span class="item-remove item-remove-attach-edit marleftalign clip"><i class="fa fa-times" aria-hidden="true"></i></span>'
                            +'</div>');
                    }
                    $('.attached_file_edit').append(elements);
                }); 
            });
            
            // Due Date....
            var due_date = new Date(res[0]['due_date']);
            $('#edit_due_date').val(due_date.toISOString().substr(0, 10));

            // Logged user
            assignee_list.forEach(function(item){
              if (item['user_id'] == user_id_ref) {
                  u_logo = item['first_name'].trim().slice(0,1).toUpperCase()+''+item['last_name'].trim().slice(0,1).toUpperCase();
                  $('.Edit_Current_User').text(u_logo);
              }
            });

            // Previous Comments....
            previous_comments_edit(res);

            // Close the AckEnowledge ................
            $('#EditIssueModal').modal('show');
            // $("#overlay").fadeOut(300);
    
        },
        error:function(res){
            // alert("Sorry! Try Agian!!");
            $("#overlay").fadeOut(300);
        }
    });

    // $('#EditIssueModal').modal('show');
});

function previous_comments_edit(res){
  $('.items-container-edit-comments').empty();
            var comment = String(res[0]['comment_id']).split(",");
            comment.forEach(function(cm){
                comments_list_globle.forEach(function(comment_item){
                    var elements = $();
                    if (cm == comment_item['comment_id']) {
                        var u_name = "";
                        var u_logo="";
                        assignee_list.forEach(function(item){
                            if (item['user_id'] == comment_item['last_updated_by']) {
                                u_logo = item['first_name'].trim().slice(0,1).toUpperCase()+''+item['last_name'].trim().slice(0,1).toUpperCase();
                                u_name = item['first_name']+" "+item['last_name'];
                            }
                        });

                        var display_option="none";
                        if (user_id_ref == comment_item['last_updated_by']) {
                            display_option = "block";
                        }

                        var date = new Date(res[0]['last_updated_on']);
                        var x_date = ("0" +date.getDate()).slice(-2)+" "+(date.toLocaleString([], { month: 'short' })+" "+(date.getFullYear()))+" at "+("0" +date.getHours()).slice(-2)+":"+("0" +date.getMinutes()).slice(-2);
                        elements = elements.add('<div style="display:flex"><div class="reduce_width">'
                            +'<div class="Comments-list">'
                              +'<div class="center-align">'
                                  +'<div style="float: left;width: 10%;" class="center-align">'
                                      +'<div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">'+u_logo+'</p></div>'
                                  +'</div>'
                                  +'<div class="input-box" style="width: 90%">'
                                      +'<div class="center-align-center">'
                                          +'<p class="paddingm font-size font-fam">'+u_name+'</p>'
                                          +'<p class="paddingm marleftalign font-fam font-size font-color"> <span>'+x_date+'</span></p>'
                                          +'<img class="img_font_wh marleftalign edit-cmd" style="display:'+display_option+'" src="<?php echo base_url('assets/img/pencil.png') ?>">'
                                          +'<img class="img_font_wh delete-cmd" style="display:'+display_option+'" src="<?php echo base_url('assets/img/delete.png') ?>">'
                                      +'</div>'
                                  +'</div>'
                              +'</div>'
                              +'<div class="center-align-center cmd-cnt">'
                                  +'<p class="paddingm Comments-cnt font-fam font-size font-color">'+comment_item['comment']+'</p>'
                                  +'<input type="text" style="display:none" class="form-control font_weight_modal cmd-input" id="" name="">'
                              +'</div>' 
                            +'</div>'
                            +'</div>'
                            +'<div style="width:10%" class="center-align">'
                              +'<img class="img_font_wh done-cmd" style="display:none" woi="'+res[0]['work_order_id']+'" ref="'+comment_item['comment_id']+'" src="<?php echo base_url('assets/img/tick.png') ?>">'
                            +'</div>'
                            +'</div>');
                        $('.items-container-edit-comments').append(elements);
                    }
                });
            });
}

//  Deactivate Work Order Acknowledge ........... 
$(document).on("click", ".deactivate-work-order", function(event){
    event.preventDefault();
    event.stopPropagation();
    var id = $(this).attr("del-item");
    $('.Delete-Work-Lable').attr('status_data',id);
    $('#DeactiveWorkOrderModal').modal('show');
});

$(document).on("click", ".item-remove-action-edit", function(event){
    var countr = $('.item-remove-action-edit');
    var indx = countr.index($(this));
    $(this).parent('.item-cause').remove();
});
$(document).on("click", ".item-remove-cause-edit", function(event){
    var countr = $('.item-remove-cause-edit');
    var indx = countr.index($(this));
    $(this).parent('.item-cause').remove();
});
$(document).on("click", ".item-remove-lable-edit", function(event){
    var countr = $('.item-remove-lable-edit');
    var indx = countr.index($(this));
    $(this).parent('.lable-bg').remove();
});
$(document).on("click", ".item-remove-attach-edit", function(event){
    var countr = $('.item-remove-attach-edit');
    var indx = countr.index($(this));
    $(this).parent('.lable-bg-file').remove();
    
});



// Deactivate Machine Submit .............
$('.Delete-Work-Order').click(function(event){
    $("#overlay").fadeIn(300);
    event.preventDefault();
    event.stopPropagation();
    var id = $(this).attr('status_data');
    $.ajax({
        url: "<?php echo base_url('Work_Order_Management_controller/deleteWorkOrderRec'); ?>",
        type: "POST",
        cache: false,
        async:false,
        data: {
            order_id : id,
        },
        dataType: "json",
        success:function(res){
            callALL();
            // Close the Acknowledge ................
            $('#DeactiveWorkOrderModal').modal('hide');
            $("#overlay").fadeOut(300);
        },
        error:function(res){
            // alert("Sorry! Try Agian!!");
            $("#overlay").fadeOut(300);
        }
    });
});

function getLableID(item,value){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getLableID') ?>",
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

function getAttachFileID(item){
    const files = document.getElementById("attach_file").files;
    var formData = new FormData();
    formData.append('attach', files[0]);
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getAttachFileID') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        data:formData,
        processData:false,
        contentType: false,
        success:function(res){
            item.setAttribute("attach_list_id", res);
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getAttachFileIDEdit(item){
    const files = document.getElementById("attach_file_edit").files;
    var formData = new FormData();
    formData.append('attach', files[0]);
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getAttachFileID') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        data:formData,
        processData:false,
        contentType: false,
        success:function(res){
            item.setAttribute("attach_list_id", res);
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getActionID(item,value){
    var previous=0;
    action_list_globle.forEach(function(ele){
      if (ele['action'].trim().toUpperCase() == value) {
        item.setAttribute("action_list_id", ele['action_id']);
        item.innerText=value;
        previous=1;
      }
    });
    if (previous==0) {
      console.log("ation ajax");
      console.log(value);
      $.ajax({
          url:"<?php echo base_url('Work_Order_Management_controller/getActionID') ?>",
          method:"POST",
          cache: false,
          async:false,
          dataType:"json",
          data:{
              action:value
          },
          success:function(res){
              action_id_list_globle_unique.push(res);
              item.setAttribute("action_list_id", res);
              item.innerText=value;
          },
          error:function(err){
              // alert("Something went wrong!");
              // $("#overlay").fadeOut(300);
          }
      });
    }
}


function getCauseID(itemId,value){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getCauseID') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        data:{
            cause:value
        },
        success:function(res){
            itemId.setAttribute("cause_list_id", res);
            itemId.innerText = res;
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}
      


// Code for Cause Suggession.......
const inputField = document.getElementsByClassName("input-field-add")[0];
const itemsContainer = document.getElementsByClassName("items-container-cause")[0];
// Add event listener to the input field
inputField.addEventListener("keyup", function (event) {

    var inputValue = inputField.value;
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-cause").style.display="block";
        var suggession_list = issue_list_globle.filter(item => item['cause'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-cause').empty();

        var inputVal = inputValue.trim().toUpperCase();

        var present = cause_list_globle_unique.find(function (item_val) {
          return item_val.toUpperCase() === inputVal;
        });

        suggession_list.forEach((item,index)=>{
            if (index < 3 && !present) {
                $('#dropdown-list-cause').append('<div class="inbox suggession-cause-items" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-cause-val">'+item['cause']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="cause-input-suggession radio-visible" value="'+item['cause']+'">'
                +'</div>');
            }
        });

        // Add as Final
        var option = suggession_list.find(function (item_val) {
          return item_val['cause'].toUpperCase() === inputVal;
        });

        if (!option && !present) {
          $('#dropdown-list-cause').append('<div class="inbox suggession-cause-items" style="display: flex;">'
                  +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm"><span class="suggession-cause-val">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                  +'</div>'
                  +'<input type="text" class="cause-input-suggession radio-visible" value="'+inputValue.trim()+'">'
              +'</div>');
        }
    }else{
        $('#dropdown-list-cause').empty();
        document.getElementById("dropdown-list-cause").style.display="none";
    }
});

// Code for Cause Suggession.......
const inputFieldEdit = document.getElementsByClassName("input-field-edit")[0];
const itemsContainerEdit = document.getElementsByClassName("items-container-edit-cause")[0];
// Add event listener to the input field
inputFieldEdit.addEventListener("keyup", function (event) {
    var inputValue = inputFieldEdit.value;
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-cause-edit").style.display="block";
        var suggession_list = issue_list_globle.filter(item => item['cause'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-cause-edit').empty();

        var inputVal = inputValue.trim().toUpperCase();

        var present = cause_list_globle_unique.find(function (item_val) {
          return item_val.toUpperCase() === inputVal;
        });

        suggession_list.forEach((item,index)=>{
            if (index < 3 && !present) {
                $('#dropdown-list-cause-edit').append('<div class="inbox suggession-cause-items-edit" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-cause-val-edit">'+item['cause']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="cause-input-suggession-edit radio-visible" value="'+item['cause']+'">'
                +'</div>');
            }
        });
        // Add as Final
        var inputVal = inputValue.trim().toUpperCase();
        var option = suggession_list.find(function (item_val) {
          return item_val['lable'].toUpperCase() === inputVal;
        });

        if (!option && !present) {
          $('#dropdown-list-cause-edit').append('<div class="inbox suggession-cause-items-edit" style="display: flex;">'
                  +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm"><span class="suggession-cause-val-edit">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                  +'</div>'
                  +'<input type="text" class="cause-input-suggession-edit radio-visible" value="'+inputValue.trim()+'">'
              +'</div>');
        }
    }else{
        $('#dropdown-list-cause-edit').empty();
        document.getElementById("dropdown-list-cause-edit").style.display="none";
    }
});


// Action Taken........
const inputFieldaction = document.getElementsByClassName("input-field-action")[0];
const itemsContaineraction = document.getElementsByClassName("items-container-action")[0];
const itemsFieldAdd = document.getElementsByClassName("input-field-action-add")[0];

inputFieldaction.addEventListener("keyup", function (event) {
    var inputValue = inputFieldaction.value;
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-action").style.display="block";
        var suggession_list = action_list_globle.filter(item => item['action'].toUpperCase().includes(inputValue.trim().toUpperCase()));

        $('#dropdown-list-action').empty();
        var inputVal = inputValue.trim().toUpperCase();

        var present = action_list_globle_unique.find(function (item_val) {
          return item_val.toUpperCase() === inputVal;
        });

        suggession_list.forEach((item,index)=>{
            if (index < 3 && !present) {
                $('#dropdown-list-action').append('<div class="inbox suggession-action-items" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-action-val">'+item['action']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="action-input-suggession radio-visible" value="'+item['action']+'">'
                +'</div>');
            }
        });
        // Add as Final
        
        var option = suggession_list.find(function (item_val) {
          return item_val['action'].toUpperCase() === inputVal;
        });

        if (!option && !present) {
          $('#dropdown-list-action').append('<div class="inbox suggession-action-items" style="display: flex;">'
                  +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm"><span class="suggession-action-val">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                  +'</div>'
                  +'<input type="text" class="action-input-suggession radio-visible" value="'+inputValue.trim()+'">'
              +'</div>');
        }
    }else{
        $('#dropdown-list-action').empty();
        document.getElementById("dropdown-list-action").style.display="none";
    }

    $('.input-field-action-add').css({
      "pointer-events": "initial",
    });
});


function add_action_val(ack){
  // Get the value from the input field
    const value = inputFieldaction.value.trim();
    console.log("add actions value:\t"+value);
    if (ack==true) {
      action_list_globle_unique.push(value);
    }

    var inputVal = value.trim().toUpperCase();
    var present = action_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    console.log("add action condition:\n");
    console.log(value!="" && present);
    // If the value is not empty, create a new item and append it to the container
    if (value !== "" && present) {

      $('.input-field-action-add').css({
        "pointer-events": "initial",
      });

      const item = document.createElement("div");
      item.classList.add("item-cause");

      // Cause Name
      const itemText = document.createElement("span");
      itemText.classList.add("item-text");
      itemText.classList.add("font-fam");
      itemText.classList.add("item-text-action");
      itemText.classList.add("stcode-up");
      console.log("action condition working");
      if (ack == true) {
        getActionID(itemText,value);
      }else{
        itemText.setAttribute("action_list_id", action_id_list_globle_unique[present]);
        itemText.innerText=value;
      }

      item.appendChild(itemText);
      
      // Cause Remove
      const itemRemove = document.createElement("span");
      itemRemove.classList.add("item-remove");
      itemRemove.classList.add("item-remove-action");
      itemRemove.classList.add("font-fam");
      itemRemove.classList.add("stcode-up");
      itemRemove.classList.add("font-color");
      itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
      item.appendChild(itemRemove);

      itemsContaineraction.appendChild(item);

      // Clear the input field
      inputFieldaction.value = "";
      // Add event listener to the remove icon
      itemRemove.addEventListener("click", function () {        
        
        // const parentElement = document.querySelector('.items-container-action');
        // const spanElement = parentElement.querySelector('.item-text');
        // const index = action_list_globle_unique.indexOf(spanElement.textContent);
        // if (index > -1) {
        //   action_list_globle_unique.splice(index, 1);
        //   action_id_list_globle_unique.splice(index, 1);
        // }

        itemsContaineraction.removeChild(item);
        inputFieldaction.value = "";
      });
    }

    action_list_globle=[];
    getActionList();
    $('#dropdown-list-action').empty();
    document.getElementById("dropdown-list-action").style.display="none";
}

// Add event listener to the input field
itemsFieldAdd.addEventListener("click", function (event) {
  var inputVal = inputFieldaction.value.trim().toUpperCase();
  const parentElement = document.querySelector('.items-container-action');
  const childElements = parentElement.children;

  var ck=0;
  for (let i = 0; i < childElements.length; i++) {
    const childElement = childElements[i];
    const spanElement = childElement.querySelector('.item-text');
    if (inputVal == spanElement.textContent.trim().toUpperCase()) {
      ck=1;
      break;
    }
  }
  var present = action_list_globle_unique.find(function (item_val) {
    return item_val.toUpperCase() === inputVal;
  });
  if (!present && ck==0) {
    $('.input-field-action-add').css({
        "pointer-events": "initial",
    });
    add_action_val(true);
  }else if (present && ck==0) {
    $('.input-field-action-add').css({
        "pointer-events": "initial",
    });
    add_action_val(false);
  }
  else if (present && ck==1) {
    $('.input-field-action-add').css({
        "pointer-events": "none",
    });
  }
});

// Action Taken........
const inputFieldactionEdit = document.getElementsByClassName("input-field-action-edit")[0];
const itemsContaineractionEdit = document.getElementsByClassName("items-container-edit-action")[0];
const itemsFieldEdit = document.getElementsByClassName("input-field-action-edit-add")[0];

inputFieldactionEdit.addEventListener("keyup", function (event) {
    var inputValue = inputFieldactionEdit.value;
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-action-edit").style.display="block";
        var suggession_list = action_list_globle.filter(item => item['action'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-action-edit').empty();

        var inputVal = inputValue.trim().toUpperCase();

        var present = action_list_globle_unique.find(function (item_val) {
          return item_val.toUpperCase() === inputVal;
        });

        suggession_list.forEach((item,index)=>{
            if (index < 3 && !present) {
                $('#dropdown-list-action-edit').append('<div class="inbox suggession-action-items-edit" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-action-val-edit">'+item['action']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="action-input-suggession-edit radio-visible" value="'+item['action']+'">'
                +'</div>');
            }
        });
        // Add as Final
        if (!present) {
          $('#dropdown-list-action-edit').append('<div class="inbox suggession-action-items-edit" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-action-val-edit">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="action-input-suggession-edit radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');
        }
    }else{
        $('#dropdown-list-action-edit').empty();
        document.getElementById("dropdown-list-action-edit").style.display="none";
    }

    $('.input-field-action-edit-add').css({
      "pointer-events": "initial",
    });
});



const itemsCommentsEditVal = document.getElementsByClassName("input-field-comments-edit")[0];
itemsCommentsEditVal.addEventListener("keyup", function (event) {
  if (event.code === 'Enter')
  {
    var comments_list = $('.input-field-comments-edit').val();
    var ref = $('.Edit_Work_Data').attr('status_data');

    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/update_comments_data') ?>",
        method:"POST",
        async:false,  
        cache: false, 
        data:{
          ref:ref,
          comment:comments_list,
        },
        dataType:"json",
        success:function(data){
          getComments();
          previous_comments_edit(data);
        },
        error:function(err){
          // alert("Something went wrong!");
        }
    });
  }
});

function edit_action_add(ack){
    // Get the value from the input field
    const value = inputFieldactionEdit.value.trim();
    if (ack==true) {
      action_list_globle_unique.push(value);
    }

    var inputVal = value.trim().toUpperCase();
    var present = action_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    // If the value is not empty, create a new item and append it to the container
    if (value !== "") {
      const item = document.createElement("div");
      item.classList.add("item-cause");

      // Cause Name
      const itemText = document.createElement("span");
      itemText.classList.add("item-text");
      itemText.classList.add("font-fam");
      itemText.classList.add("item-text-action");
      itemText.classList.add("stcode-up");

      if (ack == true) {
        getActionID(itemText,value);
      }else{
        itemText.setAttribute("action_list_id", action_id_list_globle_unique[present]);
        itemText.innerText=value;
      }
      
      item.appendChild(itemText);
      
      // Cause Remove
      const itemRemove = document.createElement("span");
      itemRemove.classList.add("item-remove");
      itemRemove.classList.add("item-remove-action-edit");
      itemRemove.classList.add("item-remove-action");
      itemRemove.classList.add("font-fam");
      itemRemove.classList.add("stcode-up");
      itemRemove.classList.add("font-color");
      itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
      item.appendChild(itemRemove);

      itemsContaineractionEdit.appendChild(item);

      // Clear the input field
      inputFieldactionEdit.value = "";
      // inputFieldactionEdit.placeholder = "Add an action taken to solve the problem...";
    }

    action_list_globle=[];
    getActionList();
    $('#dropdown-list-action').empty();
    document.getElementById("dropdown-list-action").style.display="none";
}

// Add event listener to the input field
itemsFieldEdit.addEventListener("click", function (event) {

  var inputVal = inputFieldactionEdit.value.trim().toUpperCase();
  const parentElement = document.querySelector('.items-container-edit-action');
  const childElements = parentElement.children;

  var ck=0;
  for (let i = 0; i < childElements.length; i++) {
    const childElement = childElements[i];
    const spanElement = childElement.querySelector('.item-text');
    if (inputVal == spanElement.textContent.trim().toUpperCase()) {
      ck=1;
      break;
    }
  }
  var present = action_list_globle_unique.find(function (item_val) {
    return item_val.toUpperCase() === inputVal;
  });
  if (!present && ck==0) {
    $('.input-field-action-edit-add').css({
        "pointer-events": "initial",
    });
    edit_action_add(true);
  }else if (present && ck==0) {
    $('.input-field-action-edit-add').css({
        "pointer-events": "initial",
    });
    edit_action_add(false);
  }
  else if (present && ck==1) {
    $('.input-field-action-edit-add').css({
        "pointer-events": "none",
    });
  }  
});


// Comments
// const inputFieldcomments = document.getElementsByClassName("input-field-comments")[0];
// const itemsContainercomments = document.getElementsByClassName("items-container-comments")[0];
// // Add event listener to the input field
// inputFieldcomments.addEventListener("keyup", function (event) {
//   // Check if the key pressed is "Enter"
//   if (event.keyCode === 13) {
//     // Get the value from the input field
//     const value = inputFieldcomments.value.trim();

//     // If the value is not empty, create a new item and append it to the container
//     if (value !== "") {
//         // var element = $();
//         // element = element.add('<div class="Comments-list">'
//         //                 +'<div class="center-align">'
//         //                     +'<div style="float: left;width: 10%;" class="center-align">'
//         //                         +'<div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">MS</p></div>'
//         //                         +'</div>'
//         //                         +'<div class="input-box" style="width: 90%">'
//         //                             +'<div class="center-align-center">'
//         //                                 +'<p class="paddingm font-size font-fam">Manikandan</p>'
//         //                                 +'<p class="paddingm marleftalign font-fam font-size font-color"> <span>26 Feb 2023 </span>at <span>13:03</span></p>'
//         //                                 +'<img class="edit-cmd img_font_wh marleftalign" src="<?php echo base_url('assets/img/pencil.png') ?>">'
//         //                                 +'<img class="delete-cmd img_font_wh delete marleftalign" src="<?php echo base_url('assets/img/delete.png') ?>">'
//         //                             +'</div>'
//         //                         +'</div>'
//         //                     +'</div>'
//         //                     +'<div class="center-align-center cmd-cnt">'
//         //                         +'<p class="paddingm Comments-cnt font-fam font-size font-color">'+value+'</p>'
//         //                         +'<input type="text" style="display:none" class="form-control font_weight_modal cmd-input" id="" name="" >'
//         //                     +'</div>'
//         //                 +'</div>');

//         // $('.items-container-comments').append(element);
//         // inputFieldcomments.value = "";
//         // inputFieldcomments.placeholder = "Add a comment...";
//     }
//   }
// });


// Lables...........
// Comments
const inputFieldlables = document.getElementsByClassName("input-field-lable-add")[0];
const itemsContainerlables = document.getElementsByClassName("lable-div-add")[0];
inputFieldlables.addEventListener("keyup", function (event) {
    var inputValue = inputFieldlables.value;
    var inputVal = inputValue.trim().toUpperCase();
    var present = lable_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    if (inputValue.length>0) {
        document.getElementById("dropdown-list-lables").style.display="block";
        var suggession_list = lable_list_globle.filter(item => item['lable'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-lables').empty();

        suggession_list.forEach((item,index)=>{
            if (index < 3 && !present) {
                $('#dropdown-list-lables').append('<div class="inbox suggession-lable-items" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-lable-val">'+item['lable']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="lable-input-suggession radio-visible" value="'+item['lable']+'">'
                +'</div>');
            }
        });

        var inputVal = inputValue.trim().toUpperCase();
        var option = suggession_list.find(function (item_val) {
          return item_val['lable'].toUpperCase() === inputVal;
        });

        if (!option && !present) {
          $('#dropdown-list-lables').append('<div class="inbox  suggession-lable-items" style="display: flex;">'
                      +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                          +'<p class="inbox-span paddingm"><span class="suggession-lable-val">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                      +'</div>'
                      +'<input type="text" class="lable-input-suggession radio-visible" value="'+inputValue.trim()+'">'
                  +'</div>');
        }

    }else{
        $('#dropdown-list-lables').empty();
        document.getElementById("dropdown-list-lables").style.display="none";
    }
});

$(document).on('click','.suggession-action-items',function(event){
    var countr = $('.suggession-action-items');
    var indx = countr.index($(this));
    var val = $('.action-input-suggession:eq('+indx+')').val();
    
    const inputField = document.getElementsByClassName("input-field-action")[0];
    inputField.value = val;

    var inputVal = val.trim().toUpperCase();
    var present = action_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    const parentElement = document.querySelector('.items-container-action');
    const childElements = parentElement.children;
    let ck=0;
    for (let i = 0; i < childElements.length; i++) {
      const childElement = childElements[i];
      const spanElement = childElement.querySelector('.item-text');
      if (inputVal == spanElement.textContent.trim().toUpperCase()) {
        ck=1;
        break;
      }
    }

    if (!present && ck==0) {
      $('.input-field-action-add').css({
          "pointer-events": "initial",
      });
      add_action_val(true);
    }else if (present && ck==0) {
      $('.input-field-action-add').css({
          "pointer-events": "initial",
      });
      add_action_val(false);
    }
    else if (present && ck==1) {
      $('.input-field-action-add').css({
          "pointer-events": "none",
      });
    }

    $('#dropdown-list-action').empty();
    document.getElementById("dropdown-list-action").style.display="none";
});

$(document).on('click','.suggession-action-items-edit',function(event){
    var countr = $('.suggession-action-items-edit');
    var indx = countr.index($(this));
    var val = $('.action-input-suggession-edit:eq('+indx+')').val();
    
    const inputField = document.getElementsByClassName("input-field-action-edit")[0];
    inputField.value = val;

    var inputVal = val.trim().toUpperCase();
    var present = action_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    const parentElement = document.querySelector('.items-container-edit-action');
    const childElements = parentElement.children;
    let ck=0;
    for (let i = 0; i < childElements.length; i++) {
      const childElement = childElements[i];
      const spanElement = childElement.querySelector('.item-text');
      if (inputVal == spanElement.textContent.trim().toUpperCase()) {
        ck=1;
        break;
      }
    }

    console.log("CK"+ck+"Present"+present);
    console.log("List"+action_list_globle_unique);

    if (!present && ck==0) {
      $('.input-field-action-edit-add').css({
          "pointer-events": "initial",
      });
      edit_action_add(true);
    }else if (present && ck==0) {
      $('.input-field-action-edit-add').css({
          "pointer-events": "initial",
      });
      edit_action_add(false);
    }
    else if (present && ck==1) {
      $('.input-field-action-edit-add').css({
          "pointer-events": "none",
      });
    }

    $('#dropdown-list-action-edit').empty();
    document.getElementById("dropdown-list-action-edit").style.display="none";
});


$(document).on('click','.suggession-lable-items',function(event){
    var countr = $('.suggession-lable-items');
    var indx = countr.index($(this));
    var value = $('.lable-input-suggession:eq('+indx+')').val();
    const itemsContainerlables = document.getElementsByClassName("lable-div-add")[0];

    $(".lable-div-add").css("display","block");
    $(".lable-div-add").css("display","flex");

    var inputVal = value.trim().toUpperCase();
    var present = lable_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    lable_list_globle_unique.push(value.trim());

    if (!present) {
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
    }
});

$(document).on('click','.suggession-cause-items',function(event){
    var countr = $('.suggession-cause-items');
    var indx = countr.index($(this));
    var value = $('.cause-input-suggession:eq('+indx+')').val();
    const itemsContainer = document.getElementsByClassName("items-container-cause")[0];
    cause_list_globle_unique.push(value.trim());

    var inputVal = value.trim().toUpperCase();
    var present = cause_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });
      
      // If the value is not empty, create a new item and append it to the container
        if (value !== "" && present) {
          const item = document.createElement("div");
          item.classList.add("item-cause");

          // Cause Id
          const itemId = document.createElement("span");
          itemId.classList.add("item-id");
          itemId.classList.add("font-fam");
          itemId.classList.add("stcode-up");
          itemId.classList.add("font-color");
          getCauseID(itemId,value);
          item.appendChild(itemId);

          // Cause Name
          const itemText = document.createElement("span");
          itemText.classList.add("item-text");
          itemText.classList.add("font-fam");
          itemText.classList.add("stcode-up");
          itemText.innerText = value;
          item.appendChild(itemText);
          
          // Cause Remove
          const itemRemove = document.createElement("span");
          itemRemove.classList.add("item-remove");
          itemRemove.classList.add("font-fam");
          itemRemove.classList.add("stcode-up");
          itemRemove.classList.add("font-color");
          itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
          item.appendChild(itemRemove);

          itemsContainer.appendChild(item);

          // Clear the input field
          const inputField = document.getElementsByClassName("input-field-add")[0];
          inputField.value = "";

          // Add event listener to the remove icon
          itemRemove.addEventListener("click", function () {
            itemsContainer.removeChild(item);
            inputField.value = "";
          });
        }

    issue_list_globle=[];
    getIssueList();
    $('#dropdown-list-cause').empty();
    document.getElementById("dropdown-list-cause").style.display="none";
});

$(document).on('click','.suggession-cause-items-edit',function(event){
    var countr = $('.suggession-cause-items-edit');
    var indx = countr.index($(this));
    var value = $('.cause-input-suggession-edit:eq('+indx+')').val();
    const itemsContainer = document.getElementsByClassName("items-container-edit-cause")[0];

    var inputVal = value.trim().toUpperCase();
    var present = cause_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    // If the value is not empty, create a new item and append it to the container
    if (value !== "" && !present) {
      const item = document.createElement("div");
      item.classList.add("item-cause");

      // Cause Id
      const itemId = document.createElement("span");
      itemId.classList.add("item-id");
      itemId.classList.add("font-fam");
      itemId.classList.add("stcode-up");
      itemId.classList.add("font-color");
      getCauseID(itemId,value);
      item.appendChild(itemId);

      // Cause Name
      const itemText = document.createElement("span");
      itemText.classList.add("item-text");
      itemText.classList.add("font-fam");
      itemText.classList.add("stcode-up");
      itemText.innerText = value;
      item.appendChild(itemText);
      
      // Cause Remove
      const itemRemove = document.createElement("span");
      itemRemove.classList.add("item-remove");
      itemRemove.classList.add("item-remove-cause-edit");
      itemRemove.classList.add("font-fam");
      itemRemove.classList.add("stcode-up");
      itemRemove.classList.add("font-color");
      itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
      item.appendChild(itemRemove);

      itemsContainer.appendChild(item);

      const inputFieldEditVal = document.getElementsByClassName("input-field-edit")[0];

      // Clear the input field
      inputFieldEditVal.value = "";
      // inputFieldEdit.placeholder = "Add a Cause for the problem...";
    }

    issue_list_globle=[];
    getIssueList();
    $('#dropdown-list-cause-edit').empty();
    document.getElementById("dropdown-list-cause-edit").style.display="none";
});

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

    var inputVal = value.trim().toUpperCase();
    var present = lable_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });

    lable_list_globle_unique.push(value.trim());

    if (!present) {
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
    }
});



const inputFieldlablesEdit = document.getElementsByClassName("input-field-lable-edit")[0];
const itemsContainerlablesEdit = document.getElementsByClassName("lable-div-edit")[0];
inputFieldlablesEdit.addEventListener("keyup", function (event) {
    var inputValue = inputFieldlablesEdit.value;
    var inputVal = inputValue.trim().toUpperCase();
    var present = lable_list_globle_unique.find(function (item_val) {
      return item_val.toUpperCase() === inputVal;
    });
    if (inputValue.length>0) {
        document.getElementById("dropdown-list-lables-edit").style.display="block";
        var suggession_list = lable_list_globle.filter(item => item['lable'].toUpperCase().includes(inputValue.trim().toUpperCase()));
        
        $('#dropdown-list-lables-edit').empty();

        suggession_list.forEach((item,index)=>{
            if (index < 3 && !present) {
                $('#dropdown-list-lables-edit').append('<div class="inbox suggession-lable-items-edit" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-lable-val-edit">'+item['lable']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="lable-input-suggession-edit radio-visible" value="'+item['lable']+'">'
                +'</div>');
            }
        });
        // Add as Final
        var inputVal = inputValue.trim().toUpperCase();
        var option = suggession_list.find(function (item_val) {
          return item_val['lable'].toUpperCase() === inputVal;
        });

        if (!option && !present) {
          $('#dropdown-list-lables-edit').append('<div class="inbox suggession-lable-items-edit" style="display: flex;">'
                  +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm"><span class="suggession-lable-val-edit">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                  +'</div>'
                  +'<input type="text" class="lable-input-suggession-edit radio-visible" value="'+inputValue.trim()+'">'
              +'</div>');
        }

    }else{
        $('#dropdown-list-lables-edit').empty();
        document.getElementById("dropdown-list-lables-edit").style.display="none";
    }
    // // Check if the key pressed is "Enter"
    // if (event.keyCode === 13) {
    //     // Get the value from the input field
    //     const value = inputFieldlablesEdit.value.trim();
    //     // If the value is not empty, create a new item and append it to the container
    //     if (value !== "") {
    //         const item = document.createElement("div");

    //         const itemText = document.createElement("span");
    //         getLableID(itemText,value);
    //         item.appendChild(itemText);
    //         itemText.classList.add("lable_items");

    //         const itemRemove = document.createElement("span");
    //         itemRemove.classList.add("item-remove");
    //         itemRemove.classList.add("item-remove-lable-edit");
    //         itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    //         itemRemove.classList.add("marleftalign");
    //         item.appendChild(itemRemove);


    //         item.classList.add("lable-bg");

            
    //         itemsContainerlablesEdit.classList.add("margtop");
    //         itemsContainerlablesEdit.appendChild(item);

    //         inputFieldlablesEdit.value = "";
    //     }   
    // }
});

$(document).on('click','.delete-cmd',function(event){
    var countr = $('.delete-cmd');
    var indx = countr.index($(this));
    $('.Comments-list:eq('+indx+')').remove();
});

$(document).on('click','.edit-cmd',function(event){
    var countr = $('.edit-cmd');
    var indx = countr.index($(this));
    $('.Comments-cnt:eq('+indx+')').css("display","none");
    $('.cmd-input:eq('+indx+')').val($('.Comments-cnt:eq('+indx+')').text());
    $('.cmd-input:eq('+indx+')').css("display","block");

    $('.done-cmd:eq('+indx+')').css("display","block");
    $('.edit-cmd:eq('+indx+')').css("display","none");
    $('.delete-cmd:eq('+indx+')').css("display","none");
});

$(document).on('click','.done-cmd',function(event){
    var countr = $('.done-cmd');
    var indx = countr.index($(this));

    var woi = $('.done-cmd:eq('+indx+')').attr("woi");
    var val = $('.cmd-input:eq('+indx+')').val();
    var c_id = $('.done-cmd:eq('+indx+')').attr("ref");

    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/updateComments') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        data:{
            value:val,
            ref:woi,
            c_ref:c_id,
        },
        success:function(res){
            $('.cmd-input:eq('+indx+')').css("display","none");
            $('.Comments-cnt:eq('+indx+')').css("display","block");

            $('.done-cmd:eq('+indx+')').css("display","none");
            $('.edit-cmd:eq('+indx+')').css("display","block");
            $('.delete-cmd:eq('+indx+')').css("display","block");

            $('.Comments-cnt:eq('+indx+')').text(val);
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
});

var file_name_val = "attach_file";
$(document).on("click", ".DTI", function(event){
    $('#'+file_name_val+'').click();
});

$(document).on("click", ".DTIEdit", function(event){
    $('#attach_file_edit').click();
});


function displaySelectedFiles() {
  const files = document.getElementById("attach_file").files;
  const itemsContainerlables = document.getElementsByClassName("attached_file_add")[0];
  // const file_list = document.getElementsByClassName("attached_file_list")[0];

  
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const fileName = file.name;

    const item = document.createElement("div");
    item.classList.add("fit-width");
    const itemText = document.createElement("span");
    itemText.classList.add("download-file");
    getAttachFileID(itemText);
    itemText.innerText = fileName;
    item.appendChild(itemText);
    itemText.classList.add("attached_file_list");

    const itemRemove = document.createElement("span");
    itemRemove.classList.add("item-remove");
    itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    itemRemove.classList.add("marleftalign");
    itemRemove.classList.add("clip");
    item.appendChild(itemRemove);


    item.classList.add("lable-bg-file");
    
    itemsContainerlables.appendChild(item);

    
    // // Append the node in another node.....
    // var element_file = document.getElementById("attach_file");
    // var parent_node = document.getElementsByClassName("attached_file_list")[0];
    // var len_file = parent_node.children.length;
    // element_file.id=file_name_val+"_"+(parseInt(len_file));
    // element_file.style.display = "none";  
    // file_list.appendChild(element_file);

    // const item_input = document.createElement("input");
    // const item_insert = document.getElementsByClassName("attach-file")[0];
    // item_input.class="attach_file_class";
    // item_input.onchange = displaySelectedFiles;
    // item_input.type = "file";
    // item_input.name = "";
    // item_input.id = "attach_file";
    // item_input.style.display = "none";
    // item_insert.appendChild(item_input);

    itemRemove.addEventListener("click", function () {
        itemsContainerlables.removeChild(item);
        file_list.removeChild(element_file);;
    });
  }
}


function displaySelectedFilesEdit() {
  const files = document.getElementById("attach_file_edit").files;
  const itemsContainerlables = document.getElementsByClassName("attached_file_edit")[0];

  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    const fileName = file.name;

    const item = document.createElement("div");
    item.classList.add("fit-width");
    item.classList.add("lable-bg-file");
    const itemText = document.createElement("span");
    itemText.classList.add("download-file");
    getAttachFileIDEdit(itemText);
    itemText.innerText = fileName;
    item.appendChild(itemText);
    itemText.classList.add("attached_file_list_edit");

    const itemRemove = document.createElement("span");
    itemRemove.classList.add("item-remove");
    itemRemove.classList.add("item-remove-attach-edit");
    itemRemove.innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    itemRemove.classList.add("marleftalign");
    itemRemove.classList.add("clip");
    item.appendChild(itemRemove);


    item.classList.add("lable-bg-file");

    itemsContainerlables.appendChild(item);
  }
}

$( document ).ready(function() {
  callALL();
});

function callALL(){
    // Reset
    $('.contentWorkOrder').empty();
    assignee_list = [];
    lable_list_globle = [];
    action_list_globle = [];
    priority_list_globle =[];
    status_list_globle =[];
    attach_list_globle =[];
    issue_list_globle = [];
    comments_list_globle =[];
    filter_array = [];

    getAssigneeList();
    getLableList();
    getActionList();
    getPriorityList();
    getStatusList();
    getAttachList();
    getIssueList();
    getComments();
    getFilterval();
}

function getAssigneeList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getAssignee') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            $('.add_record_assignee').empty();

            $('.Filter_assignee_div').empty();
            // Filter Status.........
                $('.Filter_assignee_div').append('<div class="inbox inbox_filter_assignee" style="display: flex;">'
                    +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<input class="filter_val_assignee" name="filter_val_assignee_name" value="all" type="checkbox" checked/>'
                    +'</div>'
                    +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm">All</p>'
                    +'</div>'
                +'</div>');
            res.forEach(function(item){
                var user_color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
                var randomColor = user_color[Math.floor(Math.random()*user_color.length)];

                assignee_list.push(item);
                var elements = $();
                if(item['site_id'] != "smartories"){
                elements = elements.add('<div class="inbox inbox_assignee" style="display: flex;">'
                    +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                        +'<div class="circle-div" style="background:'+randomColor+';color:white;">'
                            +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                        +'</div>'
                    +'</div>'
                    +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                        +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                    +'</div>'
                    +'<input type="radio" class="assignee_add radio-visible" name="assignee_val" value="'+item['user_id']+'">'
                +'</div>');
                $('.add_record_assignee').append(elements);

                    $('.Filter_assignee_div').append('<div class="inbox inbox_filter_assignee" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="filter_val_assignee" name="filter_val_assignee_name" value="'+item['user_id']+'" type="checkbox" checked/>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                    +'</div>');
                  }
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getFilterval(filter=false){
    var status=[];
    var lables=[];
    var priority =[];
    var assignee=[];

    // Status Values...
    var status_flag=0;
    $.each($("input[name='filter_val_status_name']:checked"), function(){
      if (($(this).val() == "all")) {
        status_flag =1;
      }
      else{
        status.push($(this).val());
      }
    });
    if (status_flag==1) {
      status=[];
      $.each($("input[name='filter_val_status_name']"), function(){
      if (($(this).val() != "all")) {
        status.push($(this).val());
      }
    });
    }

    // Lables Values...
    var lables_flag=0;
    $.each($("input[name='filter_val_lables_name']:checked"), function(){
      if (($(this).val() == "all")) {
        lables_flag =1;
      }
      else{
        lables.push($(this).val());
      }
    });
    if (lables_flag==1) {
      lables=[];
      $.each($("input[name='filter_val_lables_name']"), function(){
      if (($(this).val() != "all")) {
        lables.push($(this).val());
      }
    });
    }

    // Priority Values...
    var priority_flag=0;
    $.each($("input[name='filter_val_priority_name']:checked"), function(){
      if (($(this).val() == "all")) {
        priority_flag =1;
      }
      else{
        priority.push($(this).val());
      }
    });
    if (priority_flag==1) {
      priority=[];
      $.each($("input[name='filter_val_priority_name']"), function(){
      if (($(this).val() != "all")) {
        priority.push($(this).val());
      }
    });
    }

    // Assignee Values...
    var assignee_flag=0;
    $.each($("input[name='filter_val_assignee_name']:checked"), function(){
      if (($(this).val() == "all")) {
        assignee_flag =1;
      }
      else{
        assignee.push($(this).val());
      }
    });
    if (assignee_flag==1) {
      assignee=[];
      $.each($("input[name='filter_val_assignee_name']"), function(){
      if (($(this).val() != "all")) {
        assignee.push($(this).val());
      }
    });
    }
    getWorkOrderRecords(status,lables,priority,assignee,filter);
  }

function getActionList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getAction') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            res.forEach(function(item){
                action_list_globle.push(item);
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getAttachList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getAttach') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            res.forEach(function(item){
                attach_list_globle.push(item);
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getIssueList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getIssue') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            res.forEach(function(item){
                issue_list_globle.push(item);
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getComments(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getComments') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            comments_list_globle=[];
            res.forEach(function(item){
                comments_list_globle.push(item);
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getStatusList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getStatus') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            // res.forEach(function(item){
            //     status_list_globle.push(item);
            // });
            $('.Filter_status_div').empty();
            $('.filter_status').empty();

            // Filter Status.........
            $('.Filter_status_div').append('<div class="inbox inbox_filter_status" style="display: flex;">'
                +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="filter_val_status" name="filter_val_status_name" value="all" type="checkbox" checked/>'
                +'</div>'
                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm">All</p>'
                +'</div>'
            +'</div>');
            res.forEach(function(item){
                status_list_globle.push(item);
                $('.Filter_status_div').append('<div class="inbox inbox_filter_status" style="display: flex;">'
                    +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<input class="filter_val_status" name="filter_val_status_name" value="'+item['status_id']+'" type="checkbox" checked/>'
                    +'</div>'
                    +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm">'+item['status']+'</p>'
                    +'</div>'
                +'</div>');


                var status_color = "";
                var status_val_rec = "";
                if (item['status_id'] == 1) {
                    status_color = "#7f7f7f";
                    status_val_rec = "OPEN";
                }else if (item['status_id'] == 2) {
                    status_color = "#4195f6";
                    status_val_rec = "IN PROGRESS";
                }else{
                    status_color = "#6ac950";
                    status_val_rec = "CLOSED";
                }

                if (item['status_id'] == 1) {
                  $('.filter_status').append('<div class="inbox inbox_status" style="display: flex;">'
                      +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<div class="square-div" style="background:'+status_color+';color:white;"></div>'
                      +'</div>'
                      +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm" style="color: '+status_color+'">'+status_val_rec+'</p>'
                      +'</div>'
                      +'<input type="radio" class="status_add radio-visible" name="status_val" value="'+item['status_id']+'">'
                  +'</div>');

                  $('#status_val_lable').html('<i class="fa fa-stop" style="color: '+status_color+'"></i> <span style="color: '+status_color+'">'+status_val_rec+'</span>');
                }
                else{
                  $('.filter_status').append('<div class="inbox inbox_status" style="display: flex;">'
                      +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<div class="square-div" style="background:'+status_color+';color:white;"></div>'
                      +'</div>'
                      +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm" style="color: '+status_color+'">'+status_val_rec+'</p>'
                      +'</div>'
                      +'<input type="radio" class="status_add radio-visible" name="status_val" value="'+item['status_id']+'">'
                  +'</div>');
                }
            });
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

$(document).on('click','.inbox_filter_status',function(event){
  var index = $('.inbox_filter_status').index(this);

  if(index==0 && $( ".filter_val_status:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_val_status").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_val_status:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_val_status").prop( "checked", true );
  }
  else{
    if ($( ".filter_val_status:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_val_status:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_val_status:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_val_status').length;
  var l2 = $('.filter_val_status:checked').length;
  if (l2 < l1) {
    $( ".filter_val_status:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_val_status');
  jQuery('.filter_val_status').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_val_status').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#Filter_status_val').text(parseInt(reason_count)-1+' Selected');
      }else{
      // reset_reason();
      $('#Filter_status_val').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#Filter_status_val').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#Filter_status_val').text('No Reason');
  }
});


$(document).on('click','.download-file',function(event){
    var id = event.target.getAttribute("attach_list_id");
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getFileData') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        data:{
            ref:id,
        },
        success:function(res){
            const element = document.createElement("a");
            element.style.display="none";
            var x = res[0]['uploaded_file_location'].split("public");
            var loc = "<?php echo base_url(); ?>"+"/public"+x[1]+res[0]['uploaded_file_name']+".png";
            var f = res[0]['original_file_name'];
            element.setAttribute("href", loc);
            element.setAttribute("download", f);
            element.click();
            element.remove();

        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
});


$(document).on('click','.inbox_filter_assignee',function(event){
  var index = $('.inbox_filter_assignee').index(this);

  if(index==0 && $( ".filter_val_assignee:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_val_assignee").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_val_assignee:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_val_assignee").prop( "checked", true );
  }
  else{
    if ($( ".filter_val_assignee:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_val_assignee:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_val_assignee:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_val_assignee').length;
  var l2 = $('.filter_val_assignee:checked').length;
  if (l2 < l1) {
    $( ".filter_val_assignee:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_val_assignee');
  jQuery('.filter_val_assignee').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_val_assignee').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#Filter_assignee_val').text(parseInt(reason_count)-1+' Selected');
      }else{
      // reset_reason();
      $('#Filter_assignee_val').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#Filter_assignee_val').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#Filter_assignee_val').text('No Reason');
  }
});

$(document).on('click','.inbox_filter_lables',function(event){
  var index = $('.inbox_filter_lables').index(this);

  if(index==0 && $( ".filter_val_lables:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_val_lables").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_val_lables:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_val_lables").prop( "checked", true );
  }
  else{
    if ($( ".filter_val_lables:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_val_lables:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_val_lables:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_val_lables').length;
  var l2 = $('.filter_val_lables:checked').length;
  if (l2 < l1) {
    $( ".filter_val_lables:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_val_lables');
  jQuery('.filter_val_lables').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_val_lables').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#Filter_lables_val').text(parseInt(reason_count)-1+' Selected');
      }else{
      // reset_reason();
      $('#Filter_lables_val').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#Filter_lables_val').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#Filter_lables_val').text('No Reason');
  }
});


$(document).on('click','.inbox_filter_priority',function(event){
  var index = $('.inbox_filter_priority').index(this);

  if(index==0 && $( ".filter_val_priority:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_val_priority").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_val_priority:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_val_priority").prop( "checked", true );
  }
  else{
    if ($( ".filter_val_priority:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_val_priority:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_val_priority:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_val_priority').length;
  var l2 = $('.filter_val_priority:checked').length;
  if (l2 < l1) {
    $( ".filter_val_priority:eq(0)").prop( "checked", false );
  }

  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_val_priority');
  jQuery('.filter_val_priority').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_val_priority').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#Filter_priority_val').text(parseInt(reason_count)-1+' Selected');
      }else{
      // reset_reason();
      $('#Filter_priority_val').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#Filter_priority_val').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#Filter_priority_val').text('No Reason');
  }
});


function getPriorityList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getPriority') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            // res.forEach(function(item){
            //     priority_list_globle.push(item);
            // });
            $('.Filter_priority_div').empty();
            $('.filter_priority').empty();

            // Filter Status.........
            $('.Filter_priority_div').append('<div class="inbox inbox_filter_priority" style="display: flex;">'
                +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="filter_val_priority" name="filter_val_priority_name" value="all" type="checkbox" checked/>'
                +'</div>'
                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm">All</p>'
                +'</div>'
            +'</div>');
            res.forEach(function(item){
                priority_list_globle.push(item);

                $('.Filter_priority_div').append('<div class="inbox inbox_filter_priority" style="display: flex;">'
                    +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<input class="filter_val_priority" name="filter_val_priority_name" value="'+item['priority_id']+'" type="checkbox" checked/>'
                    +'</div>'
                    +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm">'+item['priority']+'</p>'
                    +'</div>'
                +'</div>');

                var priority_img_color = "";
                var priority_img_rotate="";
                var priority_img="";
                if (item['priority_id'] == 1) {
                    priority_img_color = "#ff5630";
                    priority_img_rotate = "270deg";
                    priority_img="fa-angle-double-right";
                }else if (item['priority_id'] == 2) {
                    priority_img_color = "#ffaa00";
                    priority_img_rotate="180deg";
                    priority_img="fa-equals";
                }else{
                    priority_img_color = "#0066ff";
                    priority_img_rotate = "90deg";
                    priority_img="fa-angle-double-right";
                }
 
                if (item['priority_id'] == 2) {
                  $('.filter_priority').append('<div class="inbox inbox_priority" style="display: flex;">'
                      +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i>'
                      +'</div>'
                      +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                          +'<p class="inbox-span paddingm">'+item['priority']+'</p>'
                      +'</div>'
                      +'<input type="radio" class="priority_add radio-visible" name="priority_val" value="'+item['priority_id']+'" checked="true">'
                  +'</div>');

                  $('#priority_val_lable').html('<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i> <span>'+item['priority']+'</span>');

                }else{
                  $('.filter_priority').append('<div class="inbox inbox_priority" style="display: flex;">'
                      +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i>'
                      +'</div>'
                      +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                          +'<p class="inbox-span paddingm">'+item['priority']+'</p>'
                      +'</div>'
                      +'<input type="radio" class="priority_add radio-visible" name="priority_val" value="'+item['priority_id']+'">'
                  +'</div>');
                }
                
            });
                                    
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
}

function getLableList(){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/getLable') ?>",
        method:"POST",
        cache: false,
        async:false,
        dataType:"json",
        success:function(res){
            // res.forEach(function(item){
            //   lable_list_globle.push(item);  
            // });
            $('.Filter_lables_div').empty();

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

$('#pagination_val').on('change', function(event) {
  getFilterData();
});

function getFilterData(){

    $('.contentWorkOrder').empty();

    var pagination_length=50;
    total_pagination = Math.ceil((filter_array.length)/(pagination_length));
    $("#total_pagination").html(total_pagination);
    var x = $("#pagination_val").val();
    filter_array.forEach(function(item, index) {
        if ((index > (x*pagination_length)-(pagination_length+1)) && (index < (x*pagination_length))) {
            var due_date_color="";
            var due_date = new Date(item['due_date']);
            due_date = ("0" +due_date.getDate()).slice(-2)+" "+due_date.toLocaleString([], { month: 'short' });

            var c_date = new Date();
            var d_date = new Date(item['due_date']);
            
            c_date = `${c_date.getFullYear()}-${c_date.getMonth()+1}-${c_date.getDate()}`;
            d_date = `${d_date.getFullYear()}-${d_date.getMonth()+1}-${d_date.getDate()}`;

            if (c_date == d_date) {
                due_date_color = "#4195f6";
                due_date = "Today";
            }else if (new Date(d_date) < new Date(c_date)) {
                due_date_color = "#ff0000";
            }else{
                due_date_color = "#black";
            }

            var priority_img_color = "";
            var priority_img_rotate="";
            var priority_img="";
            if (item['priority_id'] == 1) {
                priority_img_color = "#ff5630";
                priority_img_rotate = "270deg";
                priority_img="fa-angle-double-right";
            }else if (item['priority_id'] == 2) {
                priority_img_color = "#ffaa00";
                priority_img_rotate="180deg";
                priority_img="fa-equals";
            }else{
                priority_img_color = "#0066ff";
                priority_img_rotate = "90deg";
                priority_img="fa-angle-double-right";
            }

            var status_color = "";
            var status_val_rec = "";
            if (item['status_id'] == 1) {
                status_color = "#7f7f7f";
                status_val_rec = "OPEN";
            }else if (item['status_id'] == 2) {
                status_color = "#4195f6";
                status_val_rec = "IN PROGRESS";
            }else{
                status_color = "#6ac950";
                status_val_rec = "CLOSED";
            }
            
            var elements_lable = "";
            var lable_list_ar = item['lable_id'].split(",");
            lable_list_ar.forEach(function(lable){
                lable_list_globle.forEach(function(l){
                    if (l['lable_id'] == lable) {
                        elements_lable=elements_lable+""+'<span class="lable-bg">'+l['lable']+'</span>';
                    }
                });    
            });

            var user_id="";
            var user_first="";
            var user_last="";
            // var assignee="";
            var user_color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];

            var assignee_option = "";
            var randomColor = user_color[Math.floor(Math.random()*user_color.length)];
            assignee_list.forEach(function(u){
                if (item['assignee'] == u['user_id']) {
                    user_first = u['first_name'];
                    user_last = u['last_name'];

                    assignee_option = ('<div style="width: 25%">'
                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p class="paddingm">'+user_first.trim().slice(0,1).toUpperCase()+''+user_last.trim().slice(0,1).toUpperCase()+'</p></div>'
                        +'</div>'
                        +'<div style="width: 75%">'
                            +'<p class="paddingm"><span>'+user_first+' '+user_last+'</span></p>' 
                        +'</div>');
                }
            });

            var option="";
            <?php 
              if($this->data['access'][0]['work_order_management'] >= 2){
            ?>
              option = '<span class="doth"><img class="icon_img_wh edit-work-order"  edit-item="'+item['work_order_id']+'" src="<?php echo base_url('assets/img/pencil.png') ?>"></span><span class="doth"><img class="icon_img_wh deactivate-work-order" del-item="'+item['work_order_id']+'" src="<?php echo base_url('assets/img/delete.png') ?>"></span>';
            <?php 
              }
            ?>

            var elements = $();
            elements = elements.add('<div id="settings_div" class="info-work-order" edit-item="'+item['work_order_id']+'">'
                +'<div class="row paddingm">'
                    +'<div class="col-sm-1 col marleft"><p class="paddingm">'+item['work_order_id']+'</p></div>'
                    +'<div class="col-sm-2 col marleft"><p class="paddingm">'+item['title']+'</p></div>'   
                    +'<div class="col-sm-2 col marleft flex-wrap">'+elements_lable+'</div>'
                    +'<div class="col-sm-1 col center-align">'
                        +'<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i>'
                    +'</div>'
                    +'<div class="col-sm-2 col">'
                        +assignee_option
                        // +'<div style="width: 25%">'
                        //     +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p class="paddingm">'+user_first.trim().slice(0,1).toUpperCase()+''+user_last.trim().slice(0,1).toUpperCase()+'</p></div>'
                        // +'</div>'
                        // +'<div style="width: 75%">'
                        //     +'<p class="paddingm"><span>'+user_first+' '+user_last+'</span></p>' 
                        // +'</div>'
                    +'</div>'
                    +'<div class="col-sm-2 col marleft"><p class="paddingm" style="color:'+due_date_color+'">'+due_date+'</p></div>'
                    +'<div class="col-sm-1 col">'
                        +'<div style="width: 15%">'
                            +'<div class="square-div" style="background:'+status_color+';"></div>'
                        +'</div>'
                        +'<div style="width: 85%">'
                            +'<p class="paddingm" style="color: '+status_color+'">'+status_val_rec+'</p>'
                        +'</div>'
                    +'</div>'
                    +'<div class="col-sm-1 col center-align">'
                        +option
                        // +'<img class="img_font_wh edit-work-order"  edit-item="'+item['work_order_id']+'" src="<?php //echo base_url('assets/img/pencil.png') ?>">'
                        // +'<img class="img_font_wh deactivate-work-order" del-item="'+item['work_order_id']+'" src="<?php //echo base_url('assets/img/delete.png') ?>">'
                    +'</div>'
                +'</div>'
            +'</div>');
            $('.contentWorkOrder').append(elements);
        }
    });
}

function getWorkOrderRecords(status,lables,priority,assignee,filter){
    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/get_work_order_data') ?>",
        method:"POST",
        async:false,
        cache: false,
        dataType:"json",
        data:{
            status:status,
            lables:lables,
            priority:priority,
            assignee:assignee,
            filter:filter,
        },
        success:function(data_res){
            $('.contentWorkOrder').empty();
            filter_array=[];
            var open=0;
            var in_progress=0;
            var overdue =0;
            data_res.forEach(function(item){
                filter_array.push(item);
                if (item['status_id'] == 1) {
                    open = parseInt(open) + 1;
                }
                else if (item['status_id'] == 2) {
                    in_progress = parseInt(in_progress)+1;
                }

                ac_date = new Date(item['due_date']);
                c_date = new Date();
            
                c_date = `${c_date.getFullYear()}-${c_date.getMonth()+1}-${c_date.getDate()}`;
                ac_date = `${ac_date.getFullYear()}-${ac_date.getMonth()+1}-${ac_date.getDate()}`;

                c_date = new Date(c_date);
                ac_date = new Date(ac_date);

                if (item['status_id'] != 3 && ac_date<c_date) {
                    overdue = parseInt(overdue) + 1;
                }
            });

            $("#pagination_val").val(1);
            $("#open_total").html(("0" +open).slice(-2));
            $("#inprogress_total").html(("0" +in_progress).slice(-2));
            $("#overdue_total").html(("0" +overdue).slice(-2));

            // console.log(filter_array);

            getFilterData();
        },
        error:function(err){

        }
    });
    
}


// for work order management form submit
$(document).on('click','.Add_Work_Data',function(event){
        event.preventDefault();

        $("#overlay").fadeIn(300);
        var add_title_name = $('#add_work_title').val();
        var add_description = $('#add_work_description').val();
        var add_field = $('.items-container-action .item-cause').length;
       // var add_comment = $('#add_input_comment').val();
        var add_type = $('#type-add').val();
        var add_priority = $("#priority_val_lable").text();
        var add_label = $('.lable-div-add .lable-bg').length;
        var add_assignee = $("#assignee_val").text();
        var add_status = $("#status_val_lable").text();
        var add_date = $('#add_due_date').val();
        var check_cause = ($('.items-container-cause .item-cause').length);
        var add_type = $('#type-add').val();

        var a = inputAlertName(add_title_name);
        // var b = inputdescription(add_description);
        // var c = inputaction(add_field);
        // var d = inputlabel(add_label);
        // var f = input_priority(add_priority);
        // var e = input_field_comment(add_comment);
        // var g = input_assignee(add_assignee);
        // var h = input_status(add_status);
        var i = input_date(add_date);
        // var x = work_type(check_cause);
        

        // if (a!="" || b!="" || d!="" || c!="" || f!="" || g!="" || h!="") {
        if (a!="" || i!="") {
            $('#inputwork_title_Err').html(a);
            $('#inputdateErr').html(i);
            // $('#label_action_Err').html(d);
             //$('#input_comment_Err').html(e);
            // $('#input_action_Err').html(c);
            // $('#input_description_Err').html(b);
            // $('#inputpriorityErr').html(f); 
            // $('#inputassignErr').html(g);
            //$('#inputstatusErr').html(h);
            // $('#inputtypeErr').html(x);
        }
        
        else{
          var priority_tmp = " ";
          $('.priority_add').each(function(){
            if ($(this).is(':checked')) {
              priority_tmp = $(this).val();
            }
          });
          var formData = new FormData();

    formData.append('title', $('#add_work_title').val());
    formData.append('type', $('#type-add').val());
    formData.append('description', $('#add_work_description').val());
    formData.append('priority', $('input[name="priority_val"]:checked').val());
    formData.append('due_date', $('#add_due_date').val());
    formData.append('status', $('input[name="status_val"]:checked').val());
    if (!$('input[name="assignee_val"]:checked').val()) {
      formData.append('assignee', "");
    }else{
      formData.append('assignee', $('input[name="assignee_val"]:checked').val());
    }

    var cause_list=[];
    var element_cause = $('.items-container-cause').children('.item-cause').children('.item-id');
    $.each(element_cause, function(key,valueObj){
        cause_list.push(valueObj.getAttribute('cause_list_id'));
    });

    formData.append('cause_list', cause_list);
    var action_list =[];
    var element_action = $('.items-container-action').children('.item-cause').children('.item-text');
    $.each(element_action, function(key,valueObj){
        action_list.push(valueObj.getAttribute('action_list_id'));
    });

    formData.append('action_list', action_list);

    // var comments_list = $('.input-field-comments').val();
    // formData.append('comments_list', comments_list);

    var lable_list = [];
    var lable = $('.lable-div-add').children('.lable-bg').children('.lable_items');
    $.each(lable, function(key,valueObj){
        lable_list.push(valueObj.getAttribute('lable_list_id'));
    });

    formData.append('lable_list', lable_list);
    
    var file_list_collection = [];
    var files = $('.attached_file_list');
    $.each(files, function(key,valueObj){
        file_list_collection.push(valueObj.getAttribute('attach_list_id'));
    });

    formData.append('file_list_collection', file_list_collection);

      // for (var pair of formData.entries()) {
      //     console.log(pair[0]+ ', ' + pair[1]); 
      // }

          $.ajax({
              url:"<?php echo base_url('Work_Order_Management_controller/save_work_order_data') ?>",
              method:"POST",
              async:false,  
              cache: false, 
              data:formData,
              processData:false,
              contentType: false,
              // dataType:"json",
              success:function(data){
                  callALL();
                  // Close the Acknowledge ................
                  $('#AddIssueModal').modal('hide');
              },
              error:function(err){

              }
          });
        }
});


// work for workorder edit submit
$(".Edit_Work_Data").click(function(event){

    event.preventDefault();
        $("#overlay").fadeIn(300);
        var add_title_name = $('#edit_work_title').val();
        var add_description = $('#edit_work_description').val();
        var add_field = $('.items-container-edit-cause .item-cause').length;
       // var add_comment = $('#add_input_comment').val();
        var add_type = $('#type-edit').val();
        var add_action = $('.items-container-edit-action .item-cause').length;
        var add_label = $('.lable-div-edit .lable-bg').length;
        var add_assignee = $("#assignee_edit_val").text();
        var add_status = $("#status_val_edit_lable").text();
        var add_date = $('#edit_due_date').val();
        // var check_cause = ($('.items-container-cause .item-cause').length);
        var add_type = $('#type-edit').val();

        var a = inputAlertName(add_title_name);
        // var b = inputdescription(add_description);
        // var c = inputaction(add_action);
        // var d = inputlabel(add_label);
       
       // var e = input_field_comment(add_comment);
        // var g = input_assignee(add_assignee);
        // var h = input_status(add_status);
        var i = input_date(add_date);
        // var x = work_type(check_cause);
        if(add_type == "issue"){
            var f = work_type(add_field);
        }

        // if (a!="" || b!="" || d!="" || c!="" || f!="") {
        if (a!="" || i!="") {
            $('#edit_work_title_Err').html(a);
            $('#inputdateErrEdit').html(i);
            // $('#label_edit_Err').html(d);
            // $('#edit_action_Err').html(c);
            // $('#edit_description_Err').html(b);
            // $('#edittypeErr').html(f); 

            //$('#input_comment_Err').html(e);
            // $('#inputassignErr').html(g);
            // $('#inputstatusErr').html(h);
            // $('#inputtypeErr').html(x);

        }else{
    var formData = new FormData();

    formData.append('title', $('#edit_work_title').val());
    formData.append('type', $('#type-edit').val());
    formData.append('description', $('#edit_work_description').val());
    formData.append('priority', $('input[name="priority_edit"]:checked').val());
    formData.append('due_date', $('#edit_due_date').val());
    formData.append('status', $('input[name="status_edit_val"]:checked').val());
    formData.append('assignee', $('input[name="assignee_edit_val"]:checked').val());

    var cause_list=[];
    var element_cause = $('.items-container-edit-cause').children('.item-cause').children('.item-id');
    $.each(element_cause, function(key,valueObj){
        cause_list.push(valueObj.getAttribute('cause_list_id'));
    });

    formData.append('cause_list', cause_list);

    var action_list =[];
    var element_action = $('.items-container-edit-action').children('.item-cause').children('.item-text');
    $.each(element_action, function(key,valueObj){
      action_list.push(valueObj.getAttribute('action_list_id'));
    });

    formData.append('action_list', action_list);

    var comments_list = $('.input-field-comments-edit').val();
    formData.append('comments_list', comments_list);

    var lable_list = [];
    var lable = $('.lable-div-edit').children('.lable-bg').children('.lable_items');
    $.each(lable, function(key,valueObj){
        lable_list.push(valueObj.getAttribute('lable_list_id'));
    });

    formData.append('lable_list', lable_list);
    
    var file_list_collection = [];
    var files = $('.attached_file_list_edit');
    $.each(files, function(key,valueObj){
        file_list_collection.push(valueObj.getAttribute('attach_list_id'));
    });

    formData.append('file_list_collection', file_list_collection);

    formData.append('work_order_id', $('.Edit_Work_Data').attr('status_data'));

    // for (var pair of formData.entries()) {
    //   console.log(pair[0]+ ', ' + pair[1]); 
    // }

    $.ajax({
        url:"<?php echo base_url('Work_Order_Management_controller/update_work_order_data') ?>",
        method:"POST",
        async:false,  
        cache: false, 
        data:formData,
        processData:false,
        contentType: false,
        // dataType:"json",
        success:function(data){
            callALL();
            // Close the Acknowledge ................
            $('#EditIssueModal').modal('hide');
        },
        error:function(err){

        }
    });

        }
});
</script>
<script src="<?php echo base_url()?>/assets/js/work_order_validation.js?version=<?php echo rand(); ?>"></script>

