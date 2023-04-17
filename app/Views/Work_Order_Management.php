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
        width: 1.9rem;
        height: 1.4rem;
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



</style>
<?php 
$session = \Config\Services::session();

?>
<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Work Order Management</p>
              <div class="d-flex">
                    
                    <p class="float-end stcode stcode-up" class="active_click" style="color: #595959;">
                        <span  id="open_total" class="paddingm span-stl"></span>OPEN 
                    </p>
                    <p class="float-end stcode stcode-up" class="active_click" style="color: #4195f6;">
                        <span  id="inprogress_total" class="paddingm span-stl"></span>IN PROGRESS 
                    </p>
                    <p class="float-end stcode stcode-up" style="color: #ff0000;">
                        <span  id="overdue_total" class="paddingm span-stl"></span>OVERDUE
                    </p>
              </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
          <div class="container-fluid paddingm ">
            <div class="box rightmar" style="margin-left: 0.5rem;width: 10rem;">
                <div class="input-box" style="display: flex;">
                  <input type="number" class="form-control font_weight font_color" name="" id="pagination_val" style="width: 3.5rem;">
                  <div class="box rightmar center-align font_color font-size-lable" style="margin-left: 0.5rem;">
                    <p class="paddingm">of <span id="total_pagination"></span> pages</p>
                  </div>
                </div>
            </div>

              <div class="d-flex innerNav">
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect">
                            <div class="filter_selectBox" onclick="multiple_drp_status()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_status_val">All Status</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue filter_checkboxes_filter Filter_status_div display_hide">
                            </div>
                          </div>
                          <label class="input-padding ">Status</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect">
                            <div class="filter_selectBox" onclick="multiple_drp_lables()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_lables_val">All Lables</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue filter_checkboxes_filter Filter_lables_div display_hide">
                            </div>
                          </div>
                          <label class="input-padding ">Lables</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect">
                            <div class="filter_selectBox" onclick="multiple_drp_priority()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_priority_val">All Priority</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue filter_checkboxes_filter Filter_priority_div display_hide">
                            </div>
                          </div>
                          <label class="input-padding ">Priority</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <div class="filter_multiselect">
                            <div class="filter_selectBox" onclick="multiple_drp_assignee()">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important;">
                                  <p class="paddingm" id="Filter_assignee_val">All Assignee</p>
                                </div>
                                <div style="width: 80% !important;" class="dropdown-div">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes_issue filter_checkboxes_filter Filter_assignee_div display_hide">
                            </div>
                          </div>
                          <label class="input-padding ">Assignee</label>
                        </div>
                    </div>

                    <a style="background: #005abc;color: white;width:5rem;" class="settings_nav_anchor center-align" onclick="getFilterval()" id="">APPLY
                    </a>

                    <div class="box rightmar" style="margin-right: 0.5rem;display: flex;justify-content: center;">
                        <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;">
                    </div>

                    <a style="background: #005abc;color: white;width:9rem;" class="settings_nav_anchor float-end" id="add_issue_button">
                        <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD ISSUE
                    </a>
                </div>
            </div>
        </nav>
        <div class="tableContent" style="margin-top: 4rem;">
            <div class="settings_machine_header sticky-top fixtabletitle">
                <div class="row paddingm">
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">WORK ID</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">TITLE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">LABLE</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm ">
                      <p class="basic_right">PRIORITY</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">ASSIGNEE</p>
                    </div>
                    <div class="col-sm-2 p3 paddingm">
                      <p class="basic_header">DUE DATE</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm">
                      <p class="basic_header">STATUS</p>
                    </div>
                    <div class="col-sm-1 p3 paddingm" style="justify-content: center;">
                      <p class="basic_header">ACTION</p>
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
                                <span class="paddingm float-start validate" id=""></span> 
                                <span class="float-end charCount" id=""></span> 
                            </div>
                            <div class="input-box reduce_width fieldStyle" style="height: 8.5rem !important;">      
                                <!-- <input type="textarea" rows="4" class="form-control font_weight_modal" id="" name="" > -->
                                <textarea class="form-control font_weight_modal" id="add_work_description" rows="4"></textarea>
                                <label for="" class="input-padding">Description <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id=""></span> 
                                <span class="float-end charCount" id=""></span> 
                            </div>
                            
                            <div class="input-box reduce_width" style="display: none;" id="cause-add">      
                                <input type="text" class="form-control font_weight_modal input-field-add" id="" name="" >
                                <label for="" class="input-padding">Cause<span class="paddingm validate">*</span></label>
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue suggestion suggestion_width" id="dropdown-list-cause">
                            </div>
                            <!-- Cause Content -->
                            <div class="items-container reduce_width items-container-cause"></div>

                            <div class="input-box center-align">      
                                <input type="text" class="form-control reduce_width font_weight_modal input-field-action" id="" name="" >
                                <label for="" class="input-padding">Action Taken <span class="paddingm validate">*</span></label>
                                <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" class="dot-style dot-cont input-field-action-add">
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue suggestion suggestion_width" id="dropdown-list-action">
                            </div>
                            <!-- Action Taken content -->
                            <div class="items-container reduce_width items-container-action"></div>

                            <p class="Comments">Comments</p>
                            <div class="center-align reduce_width">
                                <div style="float: left;width: 10%;" class="center-align">
                                    <div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">MS</p></div>
                                </div>
                                <div class="input-box" style="width: 90%">      
                                    <input type="text" class="form-control font_weight_modal input-field-comments" id="" name="" >
                                </div>
                            </div>

                            <div class="Comments-box reduce_width items-container-comments">
                                <!-- <div class="Comments-list">
                                    <div class="center-align">
                                        <div style="float: left;width: 10%;" class="center-align">
                                            <div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">MS</p></div>
                                        </div>
                                        <div class="input-box" style="width: 90%">
                                            <div class="center-align-center">
                                                <p class="paddingm font-size font-fam">Manikandan</p>
                                                <p class="paddingm marleftalign font-fam font-size font-color"> <span>26 Feb 2023 </span>at <span>13:03</span></p>
                                                <img class="img_font_wh marleftalign edit-cmd" src="<?php echo base_url('assets/img/pencil.png') ?>">
                                                <img class="img_font_wh marleftalign delete-cmd" src="<?php echo base_url('assets/img/delete.png') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="center-align-center cmd-cnt">
                                        <p class="paddingm Comments-cnt font-fam font-size font-color">Comments added </p>
                                        <input type="text" style="display:none" class="form-control font_weight_modal cmd-input" id="" name="">
                                    </div>
                                </div> -->
                            </div>

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
                                    <span class="multi_select_label" style="">Priority <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox" onclick="multiple_priority(this)">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                          <p class="paddingm input-index" id="priority_val_lable">Select</p>
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes_issue display_hide filter_priority">
                                    <div class="inbox inbox_priority" style="display: flex;">
                                        <div style="float: left;width: 20%;" class="center-align">
                                          <i class="fa fa-angle-double-right" style="rotate:270deg;color: #ff5630"></i>
                                        </div>
                                        <div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">
                                            <p class="inbox-span paddingm">High</p>
                                        </div>
                                        <input type="radio" class="priority_add radio-visible" name="priority_val" value="1">
                                    </div>
                                    <div class="inbox inbox_priority" style="display: flex;">
                                        <div style="float: left;width: 20%;" class="center-align">
                                          <i class="fa-solid fa-equals" style="color: #ffaa00"></i>
                                        </div>
                                        <div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">
                                            <p class="inbox-span paddingm">Medium</p>
                                        </div>
                                        <input type="radio" class="priority_add radio-visible" name="priority_val" value="2">
                                    </div>
                                    <div class="inbox inbox_priority" style="display: flex;">
                                        <div style="float: left;width: 20%;" class="center-align">
                                          <i class="fa fa-angle-double-right" style="rotate:90deg;color: #0066ff"></i>
                                        </div>
                                        <div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">
                                            <p class="inbox-span paddingm">Low</p>
                                        </div>
                                        <input type="radio" class="priority_add radio-visible" name="priority_val" value="3">
                                    </div>
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect_lable filter_multiselect_input">
                                    <span class="multi_select_label" style="">Lable <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                            <div class="lable-div lable-div-add">
                                            </div>
                                            <input type="text" class="form-control font_weight_modal input-field-lable input-field-lable-add" id="" name="" >
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Drop down Suggestion -->
                                <div class="filter_checkboxes_issue suggestion" id="dropdown-list-lables">
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Assignee <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox" onclick="multiple_assignee(this)">
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
                                </div>
                                <div class="filter_checkboxes_issue add_record_assignee display_hide filter_assignee">
                                    <!--  -->
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box">
                                    <input type="date" class="form-control font_weight_modal" id="add_due_date" name="" >
                                    <label for="" class="input-padding">Due Date <span class="paddingm validate">*</span></label>
                                    <span id="" class="validate"></span>
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Status <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox" onclick="multiple_status(this)">
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
                                </div>
                                <div class="filter_checkboxes_issue display_hide filter_status">
                                    <div class="inbox inbox_status" style="display: flex;">
                                        <div style="float: left;width: 20%;" class="center-align">
                                          <div class="square-div" style="background:#7f7f7f;color:white;"></div>
                                        </div>
                                        <div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">
                                            <p class="inbox-span paddingm" style="color: #7f7f7f">OPEN</p>
                                        </div>
                                        <input type="radio" class="status_add radio-visible" name="status_val" value="1">
                                    </div>
                                    <div class="inbox inbox_status" style="display: flex;">
                                        <div style="float: left;width: 20%;" class="center-align">
                                          <div class="square-div" style="background:#4195f6;color:white;"></div>
                                        </div>
                                        <div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">
                                            <p class="inbox-span paddingm" style="color: #4195f6">IN PROGRESS</p>
                                        </div>
                                        <input type="radio" class="status_add radio-visible" name="status_val" value="2">
                                    </div>
                                    <div class="inbox inbox_status" style="display: flex;">
                                        <div style="float: left;width: 20%;" class="center-align">
                                          <div class="square-div" style="background:#6ac950;color:white;"></div>
                                        </div>
                                        <div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">
                                            <p class="inbox-span paddingm" style="color: #6ac950">CLOSED</p>
                                        </div>
                                        <input type="radio" class="status_add radio-visible" name="status_val" value="3">
                                    </div>
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
                                <span class="paddingm float-start validate" id=""></span> 
                                <span class="float-end charCount" id=""></span> 
                            </div>
                            <div class="input-box reduce_width fieldStyle" style="height: 8.5rem !important;">      
                                <textarea class="form-control font_weight_modal" id="edit_work_description" rows="4"></textarea>
                                <label for="" class="input-padding">Description <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id=""></span> 
                                <span class="float-end charCount" id=""></span> 
                            </div>
                            
                            <div class="input-box reduce_width" style="display: none;" id="cause-edit">      
                                <input type="text" class="form-control font_weight_modal input-field-edit" id="" name="" >
                                <label for="" class="input-padding">Cause<span class="paddingm validate">*</span></label>
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue suggestion suggestion_width" id="dropdown-list-cause-edit">
                            </div>
                            <!-- Cause Container -->
                            <div class="items-container reduce_width items-container-edit-cause"></div>

                            <div class="input-box center-align">      
                                <input type="text" class="form-control reduce_width font_weight_modal input-field-action-edit" id="" name="" >
                                <label for="" class="input-padding">Action Taken <span class="paddingm validate">*</span></label>
                                <img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" class="dot-style dot-cont input-field-action-edit-add">
                            </div>
                            <!-- Drop down Suggestion -->
                            <div class="filter_checkboxes_issue suggestion suggestion_width" id="dropdown-list-action-edit">
                            </div>
                            <!-- Action Content -->
                            <div class="items-container reduce_width items-container-edit-action"></div>

                            <p class="Comments">Comments</p>
                            <div class="center-align reduce_width">
                                <div style="float: left;width: 10%;" class="center-align">
                                    <div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">MS</p></div>
                                </div>
                                <div class="input-box" style="width: 90%">      
                                    <input type="text" class="form-control font_weight_modal input-field-comments-edit" id="" name="" >
                                </div>
                            </div>

                            <div class="Comments-box reduce_width items-container-edit-comments">

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
                                    <span class="multi_select_label" style="">Priority <span class="paddingm validate">*</span></span>
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
                                <div class="filter_checkboxes_issue display_hide edit_priority filter_priority">
                
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect_lable filter_multiselect_input">
                                    <span class="multi_select_label" style="">Lable <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox">
                                      <div class="inbox-span fontStyle search_style dropdown-arrow">
                                        <div style="width: 80% !important">
                                            <div class="lable-div lable-div-edit">
                                            </div>
                                            <input type="text" class="form-control font_weight_modal input-field-lable input-field-lable-edit" id="" name="" >
                                        </div>
                                        <div class="dropdown-div" style=" width: 20% !important">
                                          <i class="fa fa-angle-down icon-style"></i>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Drop down Suggestion -->
                                <div class="filter_checkboxes_issue suggestion" id="dropdown-list-lables-edit">
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Assignee <span class="paddingm validate">*</span></span>
                                    <div class="filter_selectBox" onclick="multiple_assignee(this)">
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
                                <div class="filter_checkboxes_issue edit_record_assignee display_hide filter_assignee">
                                    <!--  -->
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box">
                                    <input type="date" class="form-control font_weight_modal" id="edit_due_date" name="" >
                                    <label for="" class="input-padding">Due Date <span class="paddingm validate">*</span></label>
                                    <span id="" class="validate"></span>
                                </div>
                            </div>
                            <div class="box inbox-top">
                                <div class="input-box indexing">
                                  <div class="filter_multiselect filter_multiselect_input">
                                    <span class="multi_select_label" style="">Status <span class="paddingm validate">*</span></span>
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
                                <div class="filter_checkboxes_issue display_hide edit-status filter_status">
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

    function change_type(item){
        if (item.value == "task") {
            document.getElementById("cause-add").style.display = "none";
        }
        else{
            document.getElementById("cause-add").style.display = "block";
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
        // $('#status_val').html('<div style="display:flex" class="input-index-status"><div class="square-div" style="background:#7f7f7f;"></div><span class="paddingm" style="color: #7f7f7f">OPEN</span></div>');
    }
    else if (index ==1) {
        $('#status_val_lable').html('<i class="fa fa-stop" style="color: #4195f6"></i> <span style="color: #4195f6">IN PROGRESS</span>');
        // $('#status_val').html('<div style="display:flex" class="input-index-status"><div class="square-div" style="background:#4195f6;"></div><span class="paddingm" style="color: #4195f6">IN PROGRESS</span></div>');
    }
    else{
        //$('#status_val').html('<div style="display:flex" class="input-index-status"><div class="square-div" style="background:#6ac950;"></div><span class="paddingm" style="color: #6ac950">CLOSED</span></div>');
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
$(document).on("click", ".edit-work-order", function(event){
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
            $('#EditIssueModal1').text(res[0]['work_order_id']);
            $('#edit_work_title').val(res[0]['title']);
            $('#edit_work_description').val(res[0]['description']);
            $('#type-edit').val(res[0]['type']);

            // Previous Action....
            const value = res[0]['action_id'].split(",");
            $(".items-container-edit-action").empty();
            value.forEach(function(ac){
                action_list_globle.forEach(function(action_item){
                    if (action_item['action_id'] == ac) {
                        var itemsContaineraction = $();
                        itemsContaineraction = itemsContaineraction.add('<div class="item-cause">'
                            +'<span class="item-text font-fam item-text-action stcode-up" action_list_id="'+action_item['action_id']+'">'+action_item['action']+'</span>'
                            +'<span class="item-remove item-remove-action-edit item-remove-action font-fam stcode-up font-color"><i class="fa fa-times" aria-hidden="true"></i></span>'
                            +'</div>');
                        $(".items-container-edit-action").append(itemsContaineraction);
                    }
                });
            });

            // Previous Cause.....
            if (res[0]['type'] == "issue") {
                $('#cause-edit').css("display","block");
                $(".items-container-edit-cause").empty();
                if (res[0]['cause_id'] != null) {
                    var issue = res[0]['cause_id'].split(",");
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
                            }
                        });
                    });
                }
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
            const value_lable = res[0]['lable_id'].split(",");
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
            
            // Privious Assignee....
            $('.edit_record_assignee').empty();
            assignee_list.forEach(function(item){
                var elements = $();
                if (item['user_id'] == res[0]['assignee']) {
                    
                    elements = elements.add('<div class="inbox inbox_assignee_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                            +'<div class="circle-div" style="background:#7f7f7f;color:white;">'
                                +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                            +'</div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="assignee_edit radio-visible" name="assignee_edit_val" value="'+item['user_id']+'" checked>'
                    +'</div>');
                    $('.edit_record_assignee').append(elements);

                    $('#assignee_edit_val').html('<div style="float: left;width: 100%;" class="center-align">'
                        +'<div class="circle-div-select" style="background:#7f7f7f;color:white;">'
                            +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                        +'</div>'
                        +'<span style="color: #7f7f7f">'+item['first_name']+' '+item['last_name']+'</span>'
                        +'</div>');
                }else{
                    elements = elements.add('<div class="inbox inbox_assignee_edit" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align circle-div-root">'
                            +'<div class="circle-div" style="background:#7f7f7f;color:white;">'
                                +'<p class="paddingm">'+item.first_name.trim().slice(0,1).toUpperCase()+''+item.last_name.trim().slice(0,1).toUpperCase()+'</p>'
                            +'</div>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt assignee_name_class">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
                        +'</div>'
                        +'<input type="radio" class="assignee_edit radio-visible" name="assignee_edit_val" value="'+item['user_id']+'">'
                    +'</div>');
                    $('.edit_record_assignee').append(elements);
                }
            });
            
        
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
            var attach_file = res[0]['attachment_id'].split(",");
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


            // Previous Comments....
            $('.items-container-edit-comments').empty();
            var comment = res[0]['comment_id'].split(",");
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
                                        +'<p class="paddingm font-size font-fam">'+u_name+'</p>'
                                        +'<p class="paddingm marleftalign font-fam font-size font-color"> <span>'+x_date+'</span></p>'
                                        +'<img class="img_font_wh marleftalign edit-cmd" style="display:'+display_option+'" src="<?php echo base_url('assets/img/pencil.png') ?>">'
                                        +'<img class="img_font_wh marleftalign delete-cmd" style="display:'+display_option+'" src="<?php echo base_url('assets/img/delete.png') ?>">'
                                        +'<img class="img_font_wh marleftalign done-cmd" style="display:none" woi="'+res[0]['work_order_id']+'" ref="'+comment_item['comment_id']+'" src="<?php echo base_url('assets/img/tick.png') ?>">'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                            +'<div class="center-align-center cmd-cnt">'
                                +'<p class="paddingm Comments-cnt font-fam font-size font-color">'+comment_item['comment']+'</p>'
                                +'<input type="text" style="display:none" class="form-control font_weight_modal cmd-input" id="" name="">'
                            +'</div>'
                        +'</div>');
                        $('.items-container-edit-comments').append(elements);
                    }
                });
            });

            // Close the Acknowledge ................
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
            item.setAttribute("action_list_id", res);
            item.innerText=value;
        },
        error:function(err){
            // alert("Something went wrong!");
            // $("#overlay").fadeOut(300);
        }
    });
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

        suggession_list.forEach((item,index)=>{
            if (index < 3) {
                $('#dropdown-list-cause').append('<div class="inbox suggession-cause-items" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-cause-val">'+item['cause']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="cause-input-suggession radio-visible" value="'+item['cause']+'">'
                +'</div>');
            }
        });
        // Add as Final
        $('#dropdown-list-cause').append('<div class="inbox suggession-cause-items" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-cause-val">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="cause-input-suggession radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');

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

        suggession_list.forEach((item,index)=>{
            if (index < 3) {
                $('#dropdown-list-cause-edit').append('<div class="inbox suggession-cause-items-edit" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-cause-val-edit">'+item['cause']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="cause-input-suggession-edit radio-visible" value="'+item['cause']+'">'
                +'</div>');
            }
        });
        // Add as Final
        $('#dropdown-list-cause-edit').append('<div class="inbox suggession-cause-items-edit" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-cause-val-edit">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="cause-input-suggession-edit radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');
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

        suggession_list.forEach((item,index)=>{
            if (index < 3) {
                $('#dropdown-list-action').append('<div class="inbox suggession-action-items" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-action-val">'+item['action']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="action-input-suggession radio-visible" value="'+item['action']+'">'
                +'</div>');
            }
        });
        // Add as Final
        $('#dropdown-list-action').append('<div class="inbox suggession-action-items" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-action-val">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="action-input-suggession radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');

    }else{
        $('#dropdown-list-action').empty();
        document.getElementById("dropdown-list-action").style.display="none";
    }
});

// Add event listener to the input field
itemsFieldAdd.addEventListener("click", function (event) {
    // Get the value from the input field
    const value = inputFieldaction.value.trim();

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
      getActionID(itemText,value);
      // itemText.innerText = value;
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
      inputFieldaction.placeholder = "Add an action taken to solve the problem...";
      // Add event listener to the remove icon
      itemRemove.addEventListener("click", function () {
        itemsContaineraction.removeChild(item);
        inputFieldaction.value = "";
      });
    }

    action_list_globle=[];
    getActionList();
    $('#dropdown-list-action').empty();
    document.getElementById("dropdown-list-action").style.display="none";
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

        suggession_list.forEach((item,index)=>{
            if (index < 3) {
                $('#dropdown-list-action-edit').append('<div class="inbox suggession-action-items-edit" style="display: flex;">'
                    +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                        +'<p class="inbox-span paddingm"><span class="suggession-action-val-edit">'+item['action']+'</span></p>'
                    +'</div>'
                    +'<input type="text" class="action-input-suggession-edit radio-visible" value="'+item['action']+'">'
                +'</div>');
            }
        });
        // Add as Final
        $('#dropdown-list-action-edit').append('<div class="inbox suggession-action-items-edit" style="display: flex;">'
                +'<div style="float: left;width: 100%;overflow: hidden;" class="center-align_cnt">'
                    +'<p class="inbox-span paddingm"><span class="suggession-action-val-edit">'+inputValue.trim()+'</span><span> (Add New)</span></p>'
                +'</div>'
                +'<input type="text" class="action-input-suggession-edit radio-visible" value="'+inputValue.trim()+'">'
            +'</div>');

    }else{
        $('#dropdown-list-action-edit').empty();
        document.getElementById("dropdown-list-action-edit").style.display="none";
    }
});


// Add event listener to the input field
itemsFieldEdit.addEventListener("click", function (event) {
    // Get the value from the input field
    const value = inputFieldactionEdit.value.trim();

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
      getActionID(itemText,value);
      // itemText.innerText = value;
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
      inputFieldactionEdit.placeholder = "Add an action taken to solve the problem...";
    }

    action_list_globle=[];
    getActionList();
    $('#dropdown-list-action').empty();
    document.getElementById("dropdown-list-action").style.display="none";
});


// Comments
const inputFieldcomments = document.getElementsByClassName("input-field-comments")[0];
const itemsContainercomments = document.getElementsByClassName("items-container-comments")[0];
// Add event listener to the input field
inputFieldcomments.addEventListener("keyup", function (event) {
  // Check if the key pressed is "Enter"
  if (event.keyCode === 13) {
    // Get the value from the input field
    const value = inputFieldcomments.value.trim();

    // If the value is not empty, create a new item and append it to the container
    if (value !== "") {
        // var element = $();
        // element = element.add('<div class="Comments-list">'
        //                 +'<div class="center-align">'
        //                     +'<div style="float: left;width: 10%;" class="center-align">'
        //                         +'<div class="circle-div" style="background:#7f7f7f;color:white;"><p class="paddingm">MS</p></div>'
        //                         +'</div>'
        //                         +'<div class="input-box" style="width: 90%">'
        //                             +'<div class="center-align-center">'
        //                                 +'<p class="paddingm font-size font-fam">Manikandan</p>'
        //                                 +'<p class="paddingm marleftalign font-fam font-size font-color"> <span>26 Feb 2023 </span>at <span>13:03</span></p>'
        //                                 +'<img class="edit-cmd img_font_wh marleftalign" src="<?php echo base_url('assets/img/pencil.png') ?>">'
        //                                 +'<img class="delete-cmd img_font_wh delete marleftalign" src="<?php echo base_url('assets/img/delete.png') ?>">'
        //                             +'</div>'
        //                         +'</div>'
        //                     +'</div>'
        //                     +'<div class="center-align-center cmd-cnt">'
        //                         +'<p class="paddingm Comments-cnt font-fam font-size font-color">'+value+'</p>'
        //                         +'<input type="text" style="display:none" class="form-control font_weight_modal cmd-input" id="" name="" >'
        //                     +'</div>'
        //                 +'</div>');

        // $('.items-container-comments').append(element);
        // inputFieldcomments.value = "";
        // inputFieldcomments.placeholder = "Add a comment...";
    }
  }
});


// Lables...........
// Comments
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

$(document).on('click','.suggession-action-items',function(event){
    var countr = $('.suggession-action-items');
    var indx = countr.index($(this));
    var val = $('.action-input-suggession:eq('+indx+')').val();
    
    const inputField = document.getElementsByClassName("input-field-action")[0];
    inputField.value = val;

    $('#dropdown-list-action').empty();
    document.getElementById("dropdown-list-action").style.display="none";

});

$(document).on('click','.suggession-action-items-edit',function(event){
    var countr = $('.suggession-action-items-edit');
    var indx = countr.index($(this));
    var val = $('.action-input-suggession-edit:eq('+indx+')').val();
    
    const inputField = document.getElementsByClassName("input-field-action-edit")[0];
    inputField.value = val;

    $('#dropdown-list-action-edit').empty();
    document.getElementById("dropdown-list-action-edit").style.display="none";

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

$(document).on('click','.suggession-cause-items',function(event){
    var countr = $('.suggession-cause-items');
    var indx = countr.index($(this));
    var value = $('.cause-input-suggession:eq('+indx+')').val();
    const itemsContainer = document.getElementsByClassName("items-container-cause")[0];
      
      // If the value is not empty, create a new item and append it to the container
        if (value !== "") {
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

    // If the value is not empty, create a new item and append it to the container
    if (value !== "") {
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

callALL();
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
                assignee_list.push(item);
                var elements = $();
                elements = elements.add('<div class="inbox inbox_assignee" style="display: flex;">'
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
                $('.add_record_assignee').append(elements);


                    $('.Filter_assignee_div').append('<div class="inbox inbox_filter_assignee" style="display: flex;">'
                        +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="filter_val_assignee" name="filter_val_assignee_name" value="'+item['user_id']+'" type="checkbox" checked/>'
                        +'</div>'
                        +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                            +'<p class="inbox-span paddingm">'+item['first_name']+' '+item['last_name']+'</p>'
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

function getFilterval(){
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

    getWorkOrderRecords(status,lables,priority,assignee);
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
            if (new Date(item['due_date']) == new Date()) {
                due_date_color = "#4195f6";
                due_date = "Today";
            }else if (new Date(item['due_date']) < new Date()) {
                due_date_color = "#black";
            }else{
                due_date_color = "#ff0000";
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
            var assignee="";
            var user_color = ["#005bbc","#ff3399","#70ad47","#7c68ee","#d60700","#827718","#bd02d6","#fcba03","#fc6f03","#6bfc03"];
            assignee_list.forEach(function(u){
                if (item['assignee'] = u['user_id']) {
                    user_first = u['first_name'];
                    user_last = u['last_name'];
                }
            });
            var randomColor = user_color[Math.floor(Math.random()*user_color.length)];

            var elements = $();
            elements = elements.add('<div id="settings_div">'
                +'<div class="row paddingm">'
                    +'<div class="col-sm-1 col marleft"><p class="paddingm">'+item['work_order_id']+'</p></div>'
                    +'<div class="col-sm-2 col marleft"><p class="paddingm">'+item['title']+'</p></div>'   
                    +'<div class="col-sm-2 col marleft flex-wrap">'+elements_lable+'</div>'
                    +'<div class="col-sm-1 col center-align">'
                        +'<i class="fa '+priority_img+'" style="rotate:'+priority_img_rotate+';color: '+priority_img_color+'"></i>'
                    +'</div>'
                    +'<div class="col-sm-2 col">'
                        +'<div style="width: 25%">'
                            +'<div class="dotUser" style="background:'+randomColor+';color:white;"><p class="paddingm">'+user_first.trim().slice(0,1).toUpperCase()+''+user_last.trim().slice(0,1).toUpperCase()+'</p></div>'
                        +'</div>'
                        +'<div style="width: 75%">'
                            +'<p class="paddingm"><span>'+user_first+' '+user_last+'</span><span class="LastNameMarg">S</span></p>' 
                        +'</div>'
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
                        +'<img class="img_font_wh edit-work-order"  edit-item="'+item['work_order_id']+'" src="<?php echo base_url('assets/img/pencil.png') ?>">'
                        +'<img class="img_font_wh deactivate-work-order" del-item="'+item['work_order_id']+'" src="<?php echo base_url('assets/img/delete.png') ?>">'
                    +'</div>'
                +'</div>'
            +'</div>');
            $('.contentWorkOrder').append(elements);
        }
    });
}

function getWorkOrderRecords(status,lables,priority,assignee){

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
        },
        success:function(data){
            $('.contentWorkOrder').empty();
            filter_array=[];
            var open=0;
            var in_progress=0;
            var overdue =0;
            data.forEach(function(item){
                filter_array.push(item);
                if (item['status_id'] == 1) {
                    open = parseInt(open) + 1;
                }
                else if (item['status_id'] == 2) {
                    in_progress = parseInt(in_progress)+1;
                }

                ac_date = new Date(item['due_date']);
                c_date = new Date();
                if (item['status_id'] != 3 && ac_date<c_date) {
                    overdue = parseInt(overdue) + 1;
                }
            });

            $("#pagination_val").val(1);
            $("#open_total").html(("0" +open).slice(-2));
            $("#inprogress_total").html(("0" +in_progress).slice(-2));
            $("#overdue_total").html(("0" +overdue).slice(-2));
            
            getFilterData();
        },
        error:function(err){

        }
    });
    
}

// Add Work Order
$(".Add_Work_Data").click(function(event){

    var formData = new FormData();

    formData.append('title', $('#add_work_title').val());
    formData.append('type', $('#type-add').val());
    formData.append('description', $('#add_work_description').val());
    formData.append('priority', $('input[name="priority_val"]:checked').val());
    formData.append('due_date', $('#add_due_date').val());
    formData.append('status', $('input[name="status_val"]:checked').val());
    formData.append('assignee', $('input[name="assignee_val"]:checked').val());

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

    var comments_list = $('.input-field-comments').val();
    formData.append('comments_list', comments_list);

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

});

// Edit Work Order
$(".Edit_Work_Data").click(function(event){

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

    // for (var pair of formData.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]); 
    // }

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
    //     console.log(pair[0]+ ', ' + pair[1]); 
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

});
</script>