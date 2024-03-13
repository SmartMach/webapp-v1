<style type="text/css">
    .contentContainer{
        margin-top: 0.3rem;
        overflow-anchor: none;
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
    .font_weight_editp{
        font-weight: 500;
        font-size: 0.9rem;

    }
    .left-align{
       padding-left:1.4rem;
    }


    /* part setting mobile responsive table alignment css */
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
        width:83.5%;
        display:flex;
        flex-direction:row;
        padding:0;
        margin:0;
    }
    .res_basewidth1{
        width:16.5%;
        display:flex;
        flex-direction:row;
        padding:0;
        margin:0;
    }

    .resfw{
        padding-left:1rem;
    }
    .pd_1{
        padding-left:0.7rem;
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
        }


        /* active inactive subheader css */
        .active_res{
            font-size:0.8rem !important;
            height:100%;
            padding:8px !important;
            width:100%;
        }
       

        .inactive_res{
            font-size:0.8rem !important;
            display:flex;
            align-items:center;
        }
        .inactive_fnts{
            font-size:1rem !important;
        }
        .mdl_header{
            margin-left:0.4rem !important;
        }
        
    }

   
</style>
<div class="mr_left_content_sec">
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">Parts Settings</p>
              <div class="d-flex">
                    <p class="float-end fnt_fam style_label active_click fnt_active active_res">
                        <span  id="active" class="inactive_fnts"></span>Active
                    </p>
                    <p class="float-end fnt_fam style_label fnt_inactive inactive_res">
                        <span  id="IActive" class="inactive_fnts"></span>Inactive
                    </p>
              </div>
          </div>
        </nav>
        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start"></p>
              <div class="d-flex innerNav">
              
                    <!-- This option will enable in future update -->
                    <!-- <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="fa fa-redo float-end  undo" style="width:20px;height:20px;color: #b5b8bc;cursor: pointer;">
                    
                    <a style="background: #cde4ff;color: #005abc;width:7rem;justify-content:center;text-align:center;" class="settings_nav_anchor float-end" data-bs-toggle="modal" data-bs-target="#filterPartModal" id="filterData">FILTER</a>-->
                    <?php 
                         if($this->data['access'][0]['settings_part'] == 3){ 
                    ?>
                        <a style="text-decoration:none;margin-right:0.3rem;cursor:pointer;" class="overall_filter_btn overall_filter_header_css" id="add_part_modal">
                            <i class="fa fa-plus" style="font-size: 13px;margin-right: 7px;"></i>ADD PART
                        </a> 
                    <?php 
                         }
                    ?> 
              </div>
          </div>
        </nav>
        <div class="data_section">
            <div class="res_h">
                <div class="table_header table_header_p">
                    <div class="row paddingm">
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                        <p class="h_mar_l paddingm">PART ID</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                        <p class="h_mar_l paddingm">PART NAME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                        <p class="h_mar_l paddingm">TOOL NAME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                        <p class="h_mar_l paddingm">NET IDEAL CYCLE TIME (NICT)</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                        <p class="h_mar_l paddingm">PARTS PRODUCED / CYCLE</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_e align_c text_align_c txt_header_align">
                        <p class="h_mar_r paddingm">PART PRICE</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c txt_header_align">
                        <p class="h_mar_l paddingm">STATUS</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_c align_c text_align_c txt_header_align">
                        <p class="paddingm">ACTION</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header -->
            <div class="contentTool tableDataContainer paddingm" >
                <!-- <div class="table_data">
                    <div class="row paddingm res_d">
                        <div class="res_baswidth">
                            <div class="d-flex flex-row flex-wrap justify-content-start align-items-stretch w-100 padding_bottom_mr">
                                <div class="tb_res_header fnt-fam res_width">PART ID</div>
                                <div class="tb_res_header fnt-fam res_width">PART Name</div>
                                <div class="tb_res_header fnt-fam res_width">TOOL Name</div>

                                <div class="table_data_element res_width lg_record_alignment" style="width:20%;"><p class="paddingm">PT1001</p></div>
                                <div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">Partname 1 partname 1 partname 1</p></div>
                                <div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">ToolName Toolname 1</p></div>
                            </div>

                            <div class="d-flex flex-row flex-wrap align-items-stretch justify-content-start w-100 padding_bottom_mr">
                                <div class="tb_res_header fnt-fam res_width">NET IDEAL CYCLE TIME (NICT)</div>
                                <div class="tb_res_header fnt-fam res_width">PART PRODUCED / CYCLE</div>
                                <div class="tb_res_header fnt-fam res_width">PART PRICE</div>

                                <div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">20s</p></div>
                                <div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">partname 1</p></div>
                                <div class="table_data_element res_width lg_record_alignment" style="width:20%;"><p class="paddingm">20</p></div>
                            </div>                           
                        </div>
                        <div class="res_basewidth1">
                            <div class="col col-1 marleft settings_active table_data_section display_f align_c resfw" style="width:50%;">
                                <p class="table_data_element fnt_fm" style="color: #005CBC"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px; color:#005CBC;"></i>Active</p>
                            </div>
                            <div class="col col-1 d-flex justify-content-center fasdiv resfw justify_content_end_res" style="width:50%;">
                                <ul class="edit-menu">
                                    <li class="d-flex justify-content-center">
                                        <a href="javascript:function(){return false;}">
                                            <i  class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>
                                        </a>
                                        <ul class="edit-subMenu" style="z-index:10;">
                                            <li class="edit-opt info-tool1" lvalue="'+item.part_id+'" style="display:'+info_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="img_font_wh2" style="margin-left:10px;">INFO</a></li>
                                            <li class="edit-opt edit-tool menu-font-change text-right" lvalue="'+item.part_id+'" style="display:'+edit_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;">EDIT</a></li>
                                            <li class="deactivate-tool " lvalue="'+item.part_id+'" svalue="'+item.status+'" style="display:'+deactivate_machine+';"><a href="#" style="border-bottom:none;"><img  src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;">DEACTIVATE</a></li>
                                        </ul>
                                    </li>
                                </ul>              
                            </div>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>
</div>
<div>

<div class="modal fade rounded" id="AddPartModal" tabindex="-1" aria-labelledby="AddPartModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="AddPartModal1" style="">ADD PART DETAILS</p>
            </div>
            <!-- <form method="post" class="addToolForm" id="AddPartFormSub" action="<?= base_url('Settings_controller/addTool/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" > -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputPartName" name="inputPartName"><label for="inputPartName" class="input-padding">Part Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputPartNameErr"></span> 
                                <span class="float-end charCount" id="inputPartNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight_modal" name="inputToolName" id="inputToolName">
                                </select>
                                <label for="inputToolName" class="input-padding">Tool Name <span class="paddingm validate">*</span></label>
                                <span id="tool_select_err" class="validate"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNewToolName" name="inputNewToolName">
                                <label for="inputNewToolName" class="input-padding">New Tool Name</label>
                                <span class="paddingm float-start validate" id="inputNewToolNameErr"></span> 
                                <span class="float-end charCount" id="inputNewToolNameCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNICT" name="inputNICT" style="padding-right:1.1rem;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputNICT" class="input-padding">NICT (in seconds) <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputNICTErr"></span> 
                                <span class="unit clip">S</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputNoOfPartsPerCycle" name="inputNoOfPartsPerCycle" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputNoOfPartsPerCycle" class="input-padding">No of Parts / Cycle <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputNoOfPartsPerCycleErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <label for="" class="col-form-label paddingm headTitle">Tool ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="tid" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control left-align font_weight_modal" id="inputPartPrice" name="inputPartPrice" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputPartPrice" class="input-padding">Part Price <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputPartPriceErr"></span> 
                                <span class="unit-input"><i class="fa fa-inr  clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputPartWeight" name="inputPartWeight" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputPartWeight" class="input-padding">Part Weight (in grams) <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputPartWeightErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control left-align font_weight_modal" id="inputMaterialPrice" name="inputMaterialPrice" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="inputMaterialPrice" class="input-padding">Material Price (per kg) <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputMaterialPriceErr"></span>
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight_modal" id="inputMaterialName" name="inputMaterialName">
                                <label for="inputMaterialName" class="input-padding">Material Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate" id="inputMaterialNameErr"></span> 
                                <span class="float-end charCount" id="inputMaterialNameCunt"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <input type="submit" class="btn fo bn Add_Tool_Data saveBtnStyle" name="Add_Tool" value="Save">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>

<div class="modal fade" id="DeactiveToolModal" tabindex="-1" aria-labelledby="DeactiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="DeactiveToolModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
            <div class="modal-body">
                <label style="color: black;">Are you sure you want to delete this part record?</label>
            </div>
            <div class="modal-footer" style="border:none;">
                <a class="btn fo bn Status-deactivate saveBtnStyle" name="Edit_Tool" value="Save">Save</a>
                <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
            </div>
    </div>
  </div>
</div>
<div class="modal fade" id="ActiveToolModal" tabindex="-1" aria-labelledby="ActiveToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="ActiveToolModal1" style="">CONFIRMATION MESSAGE</p>
            </div>
            <!-- <form method="post" class="addToolForm" action="" > -->
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to activate this part record?</label>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn Status-activate saveBtnStyle" name="Edit_Tool" value="Save">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div>

<!-- edit part settings modal -->
<div class="modal fade" id="EditToolModal" tabindex="-1" aria-labelledby="EditToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditToolModal1" style="">EDIT PART DETAILS</p>
            </div>
            <!-- <form method="post" class="addToolForm EditMachine" action="" > -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="" class="col-form-label">Part ID</label>
                                        <p><span id="partid" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3 float-end">
                                        <label for="" class="col-form-label">Status</label>
                                        <p><span id="partstatus" style="font-weight:bold;" class="font_weight_modal"></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="" class="form-control font_weight_modal" id="EditPartName" name="EditPartName">
                                <label for="EditPartName" class="input-padding ">Part Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditPartNameErr"></span> 
                                <span class="float-end charCount" id="EditPartNameCunt"></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight_modal" name="inputToolNameEdit" id="inputToolNameEdit">
                                </select>
                                <label for="inputToolNameEdit" class="input-padding">Tool Name <span class="paddingm validate">*</span></label>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 box">
                            <!-- new tool add input -->
                            <div class="input-box fieldStyle display_new_tool" >
                                <input type="text" class="form-control font_weight_modal" id="inputNewToolNameEdit" name="inputNewToolNameEdit">
                                <label for="inputNewToolNameEdit" class="input-padding">New Tool Name</label>
                                <span class="paddingm float-start validate inputNewToolNameEditErr" id ="inputNewToolNameEditErr"></span> 
                                <span class="float-end charCount" id="inputNewToolNameEditCunt"></span>
                            </div>

                            <!-- tool name edit input -->
                            <div class="input-box fieldStyle display_edit_tool">
                                <input type="text" name="inputEditToolName" id="inputEditToolName" class="form-control font_weight_modal" >
                                <label for="inputEditToolName" class="input-padding">Edit Tool Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate edit_tool_name_err" id="edit_tool_name_err"></span>
                                <span class="float-end charCount" id="edit_tool_name_cunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="" class="form-control right-type font_weight_modal" id="EditNICT" name="EditNICT" style="padding-right:1.2rem;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="EditNICT" class="input-padding">NICT (in seconds) <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditNICTErr"></span> 
                                <span class="unit clip">S</span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="" class="form-control right-type font_weight_modal" id="EditNoOfPartsPerCycle" name="EditNoOfPartsPerCycle" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="EditNoOfPartsPerCycle" class="input-padding">No of Parts / Cycle <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditNoOfPartsPerCycleErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="fieldStyle input-box">
                                <label for="toolidedit" class="col-form-label paddingm headTitle ">Tool ID</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="toolidedit" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Part_Price+'" class="form-control left-align  font_weight_modal" id="EditPartPrice" name="EditPartPrice" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="EditPartPrice" class="input-padding">Part Price <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditPartPriceErr"></span> 
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Part_Weight+'" class="form-control right-type font_weight_modal" id="EditPartWeight" name="EditPartWeight" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="EditPartWeight" class="input-padding">Part Weight (in grams) <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditPartWeightErr"></span> 
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Material_Price+'" class="form-control left-align font_weight_modal" id="EditMaterialPrice" name="EditMaterialPrice" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                <label for="EditMaterialPrice" class="input-padding">Material Price (per kg) <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditMaterialPriceErr"></span> 
                                <span class="unit-input"><i class="fa fa-inr clip" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" value="'+res_csp[0].Material_Name+'" class="form-control font_weight_modal" id="EditMaterialName" name="EditMaterialName">
                                <label for="EditMaterialName" class="input-padding">Material Name <span class="paddingm validate">*</span></label>
                                <span class="paddingm float-start validate EditMaterialNameErr"></span> 
                                <span class="float-end charCount" id="EditMaterialNameCunt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="fieldStyle input-box">
                                <label for="" class="col-form-label paddingm">Last Updated By</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id="last_updated_by" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-lg-4 box">
                            <div class="fieldStyle input-box">
                                <label for="" class="col-form-label paddingm">Last Updated On</label>
                                <p class="fieldStyleSub" style="position: absolute;"><span id='date-time' class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditTool btn fo bn saveBtnStyle" name="EditTool" value="Save">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>


<!-- info modal for part settings -->
<div class="modal fade" id="InfoToolModal" tabindex="-1" aria-labelledby="InfoToolModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="modal-content container bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="InfoToolModal1" style="">INFO PART</p>
            </div>
            <!-- <form method="post" class="addToolForm EditMachine" action="" > -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipartid" class="col-form-label headTitle">Part ID</label>
                                <p><span id="Ipartid" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipartstatus" class="col-form-label headTitle">Status</label>
                                <p><span id="Ipartstatus" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipartname" class="col-form-label headTitle">Part Name</label>
                                <p><span id="Ipartname" class="font_weight_modal"></span></p> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Inict" class="col-form-label headTitle">NICT (in seconds)</label>
                                <p><span id="Inict" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Inop" class="col-form-label headTitle">No of Parts / Cycle</label>
                                <p><span id="Inop" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipp" class="col-form-label headTitle">Part Price</label>
                                <p><span id="Ipp" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Ipw" class="col-form-label headTitle">Part Weight (in grams)</label>
                                <p><span id="Ipw" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="ITN" class="col-form-label headTitle">Tool Name</label>
                                <p><span id="ITN" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Itoolid" class="col-form-label headTitle">Tool ID</label>
                                <p><span id="Itoolid" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Imname" class="col-form-label headTitle">Material Name  </label>
                                <p><span id="Imname" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="Imp" class="col-form-label headTitle">Material Price (per kg)</label>
                                <p><span id="Imp" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="IUpdatedBy" class="col-form-label headTitle">Last Updated By</label>
                                <p><span id="IUpdatedBy" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="IUpdatedOn" class="col-form-label headTitle">Last Updated On</label>
                                <p><span id="IUpdatedOn" class="font_weight_modal"></span></p>
                            </div>
                        </div>
                    </div>               
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
            <!-- </form> -->
    </div>
  </div>
</div>

<div class="modal fade" id="filterPartModal" tabindex="-1" aria-labelledby="filterPartModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="filterPartModal1" style="">FILTER PARTS</p>
            </div>
            <!-- <form method="post" class="addToolForm" action="<?= base_url('Home/addMachine/'.$this->data['select_opt'].'/'.$this->data['select_sub_opt'].'')?>" > -->
                <div class="modal-body">
                    <div class="d-flex">
                        <p style="font-family:'Roboto', sans-serif;color:#8c8c8c;font-size:0.8rem;">Registered on</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterFrom" name="filterFrom">
                                <label for="filterFrom" class="input-padding">From Date</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="datetime-local" class="form-control font_weight" id="filterTo" name="filterTo">
                                <label for="filterTo" class="input-padding">To Date</label>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterToolName" id="filterToolName">
                                </select>
                                <label for="filterToolName" class="input-padding">Tool Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterkey" placeholder="Type Keyword" name="filterkey"> 
                                <label for="filterkey" class="input-padding">Keyword</label>
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
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
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterPartPriceR" id="filterPartPriceR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterPartPriceR" class="input-padding">Part Price</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterPartPriceOp" name="filterPartPriceOp">
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterNICTR" id="filterNICTR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterNICTR" class="input-padding">NICT</label>
                            </div>
                        </div>
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterNICTS" name="filterNICTS">
                                <label for="filterNICTS" class="input-padding">in seconds</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterMaterialPriceR" id="filterMaterialPriceR">
                                    <option selected value="all">All Rate</option>
                                    <option value="<"> <= </option>
                                    <option value=">"> >= </option>
                                    <option value="="> Equal</option>
                                </select>
                                <label for="filterMaterialPriceR" class="input-padding">Material Price</label>
                            </div>
                        </div>
                        <div class="col-lg-3 fieldStyle">
                            <div class="fieldStyle">
                                <input type="text" class="form-control font_weight" id="filterMaterialPriceOp" name="filterMaterialPriceOp">
                            </div>
                        </div>
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterMaterialName" id="filterMaterialName"></select>
                                <label for="filterMaterialName" class="input-padding">Material Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <select class="form-select font_weight" name="filterLastUpdatedBy" id="filterLastUpdatedBy"></select>
                                <label for="filterSiteName" class="input-padding">Last Updated By</label>
                            </div>
                        </div>    
                    </div>                 
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="Add_FilterPart btn fo bn saveBtnStyle" name="" value="Apply">Apply</a>
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

<!-- google analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VKPSE3L44B"></script>

<script src="<?php echo base_url()?>/assets/js/settings_tools_validation.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/custom_date_format.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript">

    // google analytics code
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-VKPSE3L44B');


    // Add Part Model Show ..........
    $(document).on('click','#add_part_modal',function(event){
        event.preventDefault();
        
        var data = "addpart";
        error_show_remove(data);
        // add  part existing submission record cahe cleared
        $('#inputPartName').val('');
        $('#inputToolName').val('');
        $('#inputNewToolName').val('');
        $('#inputNICT').val('');
        $('#inputNoOfPartsPerCycle').val('');
        $('#inputPartPrice').val('');
        $('#inputPartWeight').val('');
        $('#inputMaterialPrice').val('');
        $('#inputMaterialName').val('');    

        // $('#AddPartFormSub')[0].reset();
        tool_dropdown_retrive();
        $('#AddPartModal').modal('show');
    });

    // Add Part Validations ............
    $('.Add_Tool_Data').on('click',function(event){
        $("#overlay").fadeIn(300);
        event.preventDefault();
        var a = inputPartName();
        var b =inputNICT();
        var c =inputNoOfPartsPerCycle();
        var d = inputPartPrice();
        var e = inputPartWeight();
        var f = inputMaterialPrice();
        var g = inputMaterialName();
        var h = inputNewToolName();
        
        var tool = $("#inputToolName").val();
        if(tool == null){
            $('#tool_select_err').html(required);
            $("#overlay").fadeOut(300);
        }else{
            var new_tool = $('#inputNewToolName').val();
            if ((tool == "new") && (new_tool != " ")) {
                if (a != "" || b != "" || c != "" || d != "" || e != "" || f != "" || g != "" || h != "") {
                    $("#inputPartNameErr").html(a);
                    $("#inputNICTErr").html(b);
                    $("#inputNoOfPartsPerCycleErr").html(c);
                    $("#inputPartPriceErr").html(d);     
                    $("#inputPartWeightErr").html(e);   
                    $("#inputMaterialPriceErr").html(f);  
                    $("#inputMaterialNameErr").html(g);
                    $("#inputNewToolNameErr").html(h);
                    $("#overlay").fadeOut(300);              
                }
                else{
                    ajax_part_insert();
                }
                
            }else{
                if (a != "" || b != "" || c != "" || d != "" || e != "" || f != "" || g != "") {
                    $("#inputPartNameErr").html(a);
                    $("#inputNICTErr").html(b);
                    $("#inputNoOfPartsPerCycleErr").html(c);
                    $("#inputPartPriceErr").html(d); 
                    $("#inputPartWeightErr").html(e); 
                    $("#inputMaterialPriceErr").html(f); 
                    $("#inputMaterialNameErr").html(g);    
                    $("#overlay").fadeOut(300);
                }
                else{
                    ajax_part_insert();
                } 
            }
        }    
    });

    // Add Part ..............
    function ajax_part_insert(){
        var part_name = $('#inputPartName').val();
        var tool_select = $('#inputToolName').val();
        var new_tool = $('#inputNewToolName').val();
        var inputNICT = $('#inputNICT').val();
        var inputNoOfPartsPerCycle = $('#inputNoOfPartsPerCycle').val();
        var inputPartPrice = $('#inputPartPrice').val();
        var inputPartWeight = $('#inputPartWeight').val();
        var inputMaterialPrice = $('#inputMaterialPrice').val();
        var inputMaterialName = $('#inputMaterialName').val();
        
        $.ajax({
            url : "<?php echo base_url('Settings_controller/add_part_new_code'); ?>",
            method : "POST",
            cache: false,
            async:false,
            data:{
                part_name : part_name,
                tool_select : tool_select,
                new_tool : new_tool,
                inputNICT : inputNICT,
                inputNoOfPartsPerCycle : inputNoOfPartsPerCycle,
                inputPartPrice : inputPartPrice,
                inputPartWeight : inputPartWeight,
                inputMaterialPrice : inputMaterialPrice,
                inputMaterialName : inputMaterialName,

            },
            dataType:"json",
            success:function(data){
                if (data == true) {
                    // Retrive all the Part Records ..............
                    get_part_data();
                    // Retrive all the Part Records Total Count ............
                    get_count_data();   
                    // Close the Model ............
                    $('#AddPartModal').modal('hide');
                    $("#overlay").fadeOut(300);
                }
            },
            error:function(err){
                // alert(err);
                $("#overlay").fadeOut(300);
            }
        });

    }
    $(document).ready(function() {
        // Retrive all the Part Records .........
        get_part_data();
        // Retrive all the Part Records Total Count .........
        get_count_data();

        // get tool dropdown records
        tool_dropdown_retrive();

        $('.undo').click(function(event){
            event.preventDefault();
            location.reload();
        });
        // Access controll Previliages ........
        var acsCon = "<?php echo $this->data['access'][0]['settings_part']; ?>";
        var display_var = " ";
        if(parseInt(acsCon) < 2){
            $('.edit-tool').css("display","none");
            $('.activate-tool').css("display","none");
            $('.deactivate-tool').css("display","none");
            $('.info-tool1').css("display","block");
        }
        else{
            $('.edit-tool').css("display","block");
            $('.activate-tool').css("display","block");
            $('.deactivate-tool').css("display","block");
            $('.info-tool1').css("display","none");
        }

        $(document).on("click", ".edit", function(event){
            event.preventDefault();
            if($(this).parent().siblings(".edit-subMenu").css('display').toLowerCase() == 'none'){
                // $(".edit-subMenu").css("display","block");
                $(this).parent().siblings(".edit-subMenu").css("display","block");
            }
            else{
                $(this).parent().siblings(".edit-subMenu").css("display","none");
            }
            $(document).mouseup(function(e) 
            { 
                var container = $(".edit-subMenu");
                if (!container.is(e.target) && container.has(e.target).length === 0) 
                {
                    container.hide();
                }
            });
        });

        // Deactivate Part Acknowledge ........
        $(document).on("click", ".deactivate-tool", function(event){
            event.preventDefault();
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('.Status-deactivate').attr('status_data',status);
            $('.Status-deactivate').attr('lvalue',id);
            $('#DeactiveToolModal').modal('show');
        });
        // Deactivate Part .........
        $('.Status-deactivate').click(function(event){
                event.preventDefault();
                $("#overlay").fadeIn(300);
                var id = $(this).attr('lvalue');
                var status = $(this).attr('status_data');
                status_find(id,status);
                get_count_data();
        });

        // Activate Part Acknowledge ..........
        $(document).on("click", ".activate-tool", function(event){ 
            event.preventDefault();
          
            var id = $(this).attr("lvalue");
            var status = $(this).attr("svalue");
            $('.Status-activate').attr('lvalue',id);
            $('.Status-activate').attr('status_data',status);
            $('#ActiveToolModal').modal('show');
        });

        // Activate Part ...........
        $('.Status-activate').click(function(event){

            event.preventDefault();
            $("#overlay").fadeIn(300);
            var id = $(this).attr('lvalue');
            var status = $(this).attr('status_data');
            status_find(id,status);
            get_count_data();
        });


        
       

        // Retrive Tool Records .............
        /*
        $(document).on('load','#inputToolNameEdit',function(event){
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolName'); ?>",
                type: "POST",
                dataType: "json",
                success:function(res_Site){   
                     $('#inputToolNameEdit').empty();
                    var elements1 = $('<option value="new">Add New Tool</option>');
                    res_Site.forEach(function(item){
                        elements1 = elements1.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                    });
                    $('#inputToolNameEdit').append(elements1);

                    if (res_Site == "new") {
                        $("#inputNewToolName").removeAttr("disabled");
                    }
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });  
        });
*/
        // Tool change ......... 
        $('#inputToolName').on('change', function(event) {
            event.preventDefault();
            if( this.value == 'new'){
                $("#inputNewToolName").removeAttr("disabled");
                $('#tid').empty();
                $('tool_select_err').html(' ');
            }
            else{
                $('#tool_select_err').html(' ');
                document.getElementById('inputNewToolName').value = " ";
                $('#inputNewToolNameErr').html("");
                $('#inputNewToolNameCunt').html('0 /'+'100');
                $("#inputNewToolName").attr("disabled", true);
                $.ajax({
                    url: "<?php echo base_url('Settings_controller/getTool'); ?>",
                    type: "POST",
                    dataType: "json",
                    cache: false,
                    async:false,
                    data: {
                        TId : this.value
                    },
                    success:function(res_Tool){
                        $('#tid').html(
                            res_Tool[0].tool_id
                        );
                    },
                    error:function(res){
                        // alert("Sorry!Try Agian!! this");
                    }
                });
            }
        });

        // Part Info .............
         $(document).on("click", ".info-tool1", function(event){
            event.preventDefault();
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolData'); ?>",
                type: "POST",
                cache: false,
                async:false,
                data: {
                    Pid : id
                },
                dataType: "json",
                success:function(res_csp){
                    var date_time = getdate_time(res_csp['tool'][0].last_updated_on);
                    $('#Ipartid').html(
                        res_csp['tool'][0].part_id
                    );
                    if (res_csp['tool'][0].status == 1) {
                        $('#Ipartstatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#Ipartstatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#Ipartname').html(
                        res_csp['tool'][0].part_name
                    );
                    $('#Inict').html(
                        res_csp['tool'][0].NICT
                    );
                    $('#Inop').html(
                        res_csp['tool'][0].part_produced_cycle
                    );
                    $('#Ipp').html(
                        (Math.round(res_csp['tool'][0].part_price * 100) / 100).toFixed(2)
                    );
                    $('#Ipw').html(
                        res_csp['tool'][0].part_weight
                    );
                    $('#ITN').html(
                        res_csp["tool"][0].tool_name
                    );
                    $('#Itoolid').html(
                        res_csp['tool'][0].tool_id
                    );
                    $('#Imname').html(
                        res_csp['tool'][0].material_name
                    );
                    $('#Imp').html(
                         (Math.round(res_csp['tool'][0].material_price * 100) / 100).toFixed(2)
                    );
                    $('#IUpdatedBy').html(
                        res_csp['last_updated_by'][0].first_name + " "+ res_csp['last_updated_by'][0].last_name   
                    );
                    $('#IUpdatedOn').html(date_time);
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
            $('#InfoToolModal').modal('show');
        });

        // Part Information Model ............
        $(document).on("click", ".info-tool", function(event){
            event.preventDefault();
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolData'); ?>",
                type: "POST",
                cache: false,
                async:false,
                data: {
                    Pid : id
                },
                dataType: "json",
                success:function(res_csp){
                    var date_time = getdate_time(res_csp['tool'][0].last_updated_on);
                    $('#Ipartid').html(
                        res_csp['tool'][0].part_id
                    );
                    if (res_csp['tool'][0].status == 1) {
                        $('#Ipartstatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#Ipartstatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#Ipartname').html(
                        res_csp['tool'][0].part_name
                    );
                    $('#Inict').html(
                        res_csp['tool'][0].NICT
                    );
                    $('#Inop').html(
                        res_csp['tool'][0].part_produced_cycle
                    );
                    $('#Ipp').html(
                        (Math.round(res_csp['tool'][0].part_price * 100) / 100).toFixed(2)
                    );
                    $('#Ipw').html(
                        res_csp['tool'][0].part_weight
                    );
                    $('#ITN').html(
                        res_csp["tool"][0].tool_name
                    );
                    $('#Itoolid').html(
                        res_csp['tool'][0].tool_id
                    );
                    $('#Imname').html(
                        res_csp['tool'][0].material_name
                    );
                    $('#Imp').html(
                        (Math.round(res_csp['tool'][0].material_price * 100) / 100).toFixed(2)
                    );
                    $('#IUpdatedBy').html(
                        res_csp['last_updated_by'][0].first_name + " "+ res_csp['last_updated_by'][0].last_name   
                    );
                    $('#IUpdatedOn').html(date_time);
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
            $('#InfoToolModal').modal('show');
        });

        // Edit Part Model ............
        $(document).on("click", ".edit-tool", function(event){
            event.preventDefault();
            var edit = "edit_part";
            remove_cache_value(edit)
            var id = $(this).attr("lvalue");
            $.ajax({
                url: "<?php echo base_url('Settings_controller/getToolData'); ?>",
                type: "POST",
                cache: false,
                async:false,
                data: {
                    Pid : id
                },
                dataType: "json",
                success:function(res_csp){
                    $('#partid').html(
                        res_csp['tool'][0].part_id
                    );
                    if (res_csp['tool'][0].status == 1) {
                        $('#partstatus').html(
                            '<p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;"></i>Active</p>'        
                        );
                    }
                    else{
                        $('#partstatus').html(
                            '<p style="color: #C00000;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                        );
                    }
                    $('#EditPartName').val(res_csp['tool'][0].part_name);
                    $('#EditNICT').val(res_csp['tool'][0].NICT);
                    $('#EditNoOfPartsPerCycle').val(res_csp['tool'][0].part_produced_cycle);
                    $('#EditPartPrice').val(res_csp['tool'][0].part_price);
                    $('#EditPartWeight').val(res_csp['tool'][0].part_weight);
                    $('#EditMaterialPrice').val(res_csp['tool'][0].material_price);
                    $('#EditMaterialName').val(res_csp['tool'][0].material_name);
                    set_edit_tool_data(res_csp['tool'][0].tool_id);
                    // temporary hide
                    // $('#toolidedit').html(
                    //     res_csp['tool'][0].tool_id
                    // );
                    var date_time_edit = getdate_time(res_csp['tool'][0].last_updated_on);
                    $('#date-time').html(date_time_edit);
                    $('#last_updated_by').html(res_csp['last_updated_by'][0].first_name+ " "+ res_csp['last_updated_by'][0].last_name);
                    $('#inputToolNameEdit').empty();
                    $('#EditPartNameCunt').html($('#EditPartName').val().length +' / ' + text_max_edit);
                    $('#EditMaterialNameCunt').html($('#EditMaterialName').val().length +' / ' + text_max_edit);
                    $('#inputNewToolNameEditCunt').html($('#inputNewToolNameEditCunt').val().length +' / ' + text_max_edit);
                    $.ajax({
                        url: "<?php echo base_url('Settings_controller/getToolName'); ?>",
                        type: "POST",
                        dataType: "json",
                        cache: false,
                        async:false,
                        success:function(res_Tool){
                            var elements = $('<option value="new">Add New</option>');
                            res_Tool.forEach(function(item){
                                if (res_csp['tool'][0].tool_id== item.tool_id) {
                                    elements = elements.add('<option value="'+item.tool_id+'" selected="true">'+item.tool_name+' -'+item.tool_id+'</option>');
                                }
                                else{
                                    elements = elements.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                                }
                            });
                            $('#inputToolNameEdit').append(elements);
                        },
                        error:function(res){
                            // alert("Sorry!Try Agian!!");
                        }
                    });
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
            // temporary hide for this function because the tool name edit
            //$('#inputNewToolNameEdit').attr("disabled",true);
            $('#display_new_tool').css("display","none");
            $('#display_edit_tool').css("display","inline");

            var data_error_show_remove = "edit_part";
            error_show_remove(data_error_show_remove);
            $('#EditToolModal').modal('show');

        });

        // Edit Part ..........
        $(document).on("click", ".EditTool", function(event){
            event.preventDefault();
                $("#overlay").fadeIn(300);
                var id = $('#partid').text();
                var a = EditPartName();
                var b =EditNICT();
                var c =EditNoOfPartsPerCycle();
                var d = EditPartPrice();
                var e = EditPartWeight();
                var f = EditMaterialPrice(); 
                var g = EditMaterialName(); 
                var h = inputNewToolNameEdit();
                var i = inputEditToolName();

                var tool = $("#inputToolNameEdit").val();
                if (tool != "new") {
                    if (a != "" || b != "" || c != "" || d != "" || e != "" || f !="" || g != "" || i !="") {
                        $("#EditPartNameErr").html(a);
                        $("#EditNICTErr").html(b);
                        $("#EditNoOfPartsPerCycleErr").html(c);
                        $("#EditPartPriceErr").html(d); 
                        $("#EditPartWeightErr").html(e); 
                        $("#EditMaterialPriceErr").html(f); 
                        $("#EditMaterialNameErr").html(g); 
                        $('#edit_tool_name_err').html(i);
                        
                        $('#EditToolModal').modal('show');
                        $("#overlay").fadeOut(300);
                    }
                    else{
                        var  VEditPartName = $('#EditPartName').val();
                        var  VEditNICT = $('#EditNICT').val();
                        var  VEditNoOfPartsPerCycle = $('#EditNoOfPartsPerCycle').val();
                        var  VEditPartPrice = $('#EditPartPrice').val();
                        var  VEditPartWeight = $('#EditPartWeight').val();
                        var  VEditMaterialPrice = $('#EditMaterialPrice').val();
                        var  VEditMaterialName = $('#EditMaterialName').val();
                        var  VinputToolNameEdit = $('#inputToolNameEdit').val();
                        var  tool_name_edit = $('#inputEditToolName').val();
                        $.ajax({
                            url: "<?php echo base_url('Settings_controller/editToolData'); ?>",
                            type: "POST",
                            cache: false,
                            async:false,
                            data: {
                                Part_Id : id,
                                EditPartName: VEditPartName,
                                EditNICT : VEditNICT,
                                EditNoOfPartsPerCycle: VEditNoOfPartsPerCycle,
                                EditPartPrice : VEditPartPrice,
                                EditPartWeight: VEditPartWeight,
                                EditMaterialPrice : VEditMaterialPrice,
                                EditMaterialName: VEditMaterialName,
                                inputToolNameEdit : VinputToolNameEdit,
                                tool_name_edit : tool_name_edit
                            },
                            dataType: "json",
                            success:function(res){
                                get_part_data();
                                get_count_data();
                                $('#EditToolModal').modal('hide');
                                $("#overlay").fadeOut(300);
                            },
                            error:function(res){
                                // alert("Sorry!Try Agian!!");
                                $("#overlay").fadeOut(300);
                            }
                        });
                    }    
                }
                else{
                    if (a != "" || b != "" || c != "" || d != "" || e != "" || f != "" || g != "" || h !="") {
                        $("#EditPartNameErr").html(a);
                        $("#EditNICTErr").html(b);
                        $("#EditNoOfPartsPerCycleErr").html(c);
                        $("#EditPartPriceErr").html(d);     
                        $("#EditPartWeightErr").html(e);   
                        $("#EditMaterialPriceErr").html(f);  
                        $("#EditMaterialNameErr").html(g);
                        $("#inputNewToolNameEditErr").html(h);
                        $('#EditToolModal').modal('show');
                        $("#overlay").fadeOut(300);
                    }
                    else{
                        var  VEditPartName = $('#EditPartName').val();
                        var  VEditNICT = $('#EditNICT').val();
                        var  VEditNoOfPartsPerCycle = $('#EditNoOfPartsPerCycle').val();
                        var  VEditPartPrice = $('#EditPartPrice').val();
                        var  VEditPartWeight = $('#EditPartWeight').val();
                        var  VEditMaterialPrice = $('#EditMaterialPrice').val();
                        var  VEditMaterialName = $('#EditMaterialName').val();
                        var  VinputToolNameEdit = $('#inputToolNameEdit').val();
                        var  VinputNewToolNameEdit = $('#inputNewToolNameEdit').val();
                       
                        if (VinputNewToolNameEdit == "") {
                            $('.inputNewToolNameEditErr').html(required);
                            $('.EditTool').attr("disabled",true);
                            $("#overlay").fadeOut(300);
                        }
                        else{
                            $.ajax({
                                url: "<?php echo base_url('Settings_controller/add_tool_edit_part'); ?>",
                                type: "POST",
                                cache: false,
                                async:false,
                                data: {
                                    Part_Id : id,
                                    EditPartName: VEditPartName,
                                    EditNICT : VEditNICT,
                                    EditNoOfPartsPerCycle: VEditNoOfPartsPerCycle,
                                    EditPartPrice : VEditPartPrice,
                                    EditPartWeight: VEditPartWeight,
                                    EditMaterialPrice : VEditMaterialPrice,
                                    EditMaterialName: VEditMaterialName,
                                    inputToolNameEdit : VinputToolNameEdit,
                                    inputNewToolNameEdit : VinputNewToolNameEdit
                                },
                                dataType: "json",
                                success:function(res){
                                    // Retrive all the Part Records ............
                                    get_part_data();
                                    // Retrive all the Part Records Count ...........
                                    get_count_data();
                                    $('#EditToolModal').modal('hide');
                                    $("#overlay").fadeOut(300);
                                },
                                error:function(res){
                                    // alert("Sorry! Try again");
                                    $("#overlay").fadeOut(300);
                                }
                            });
                        }
                    }
                }
        }); 

        $('.display_new_tool').css("display","none");
        $('.display_edit_tool').css("display","inline");

        $('#inputToolNameEdit').on('change', function(event) {
            event.preventDefault();
            if( this.value == 'new'){
                $('.display_new_tool').css("display","inline");
                $('.display_edit_tool').css("display","none");

                $('.EditTool').attr("disabled",true);
                $('#toolidedit').empty();
                $('#edit_tool_name_err').html(success);
                $('#edit_tool_name_cunt').html('0 /'+'100');

            }
            else{
                $('.display_edit_tool').css("display","inline");
                $('.display_new_tool').css("display","none");

                // temporary hide this function
                // document.getElementById('inputNewToolNameEdit').value = " ";
                $('#inputNewToolNameEditErr').html(success);
                $('#inputNewToolNameEditCunt').html('0 / '+'100');
                set_edit_tool_data(this.value);
            }
        });
    });

    
    function set_edit_tool_data(tool_id){
        $.ajax({
            url: "<?php echo base_url('Settings_controller/getTool'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            async:false,
            data: {
                TId : tool_id
            },
            success:function(res_tool){
                $('#toolidedit').html(
                    res_tool[0].tool_id
                );
                $('#inputEditToolName').val(res_tool[0].tool_name);
                $('#edit_tool_name_cunt').html($('#inputEditToolName').val().length+' / '+text_max_edit);

            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    }

// Retrive all the Part Records ..............
function get_part_data(){
    var acsCon = "<?php echo $this->data['access'][0]['settings_part']; ?>";
    var display_var = " ";
    var activate_machine = "";
    var deactivate_machine = "";
    var edit_machine = "";
    var info_machine = "";

    if(parseInt(acsCon) < 2){
        edit_machine = "none";
        activate_machine = "none";
        deactivate_machine = "none";
        info_machine = "block";
    }
    else{
        edit_machine = "block";
        activate_machine = "block";
        deactivate_machine = "block";
        info_machine = "none";
    }
   
    $('.contentTool').empty();
    $.ajax({
        url:"<?php echo base_url('Settings_controller/retrive_all_part'); ?>",
        type:"POST",
        dataType:'json',
        cache: false,
        async:false,
        success:function(res){
            $('.contentTool').empty();
            if(parseInt(res.length)>0){  
                res.forEach(function(item){
                    var elements = $();
                    var part_price = item.part_price;
                    var part_p =0;
                    if (isFloat(part_price) == true) {
                        part_p = parseFloat(part_price);
                    }else{
                        part_p = parseInt(part_price).toFixed(2);
                    }
                    if (item.status == 1) {
                        var condition = item.part_price;
                        elements = elements.add('<div class="table_data">'
                            +'<div class="row paddingm res_d">'
                                +'<div class="res_baswidth">'
                                    +'<div class="d-flex flex-row flex-wrap justify-content-start align-items-stretch w-100 padding_bottom_mr">'
                                        +'<div class="tb_res_header fnt-fam res_width">Part Id</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">Part Name</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">Tool Name</div>'

                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:20%;"><p class="paddingm">'+item.part_id+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.part_name+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.tool_name+'</p></div>'
                                    +'</div>'

                                    +'<div class="d-flex flex-row flex-wrap align-items-stretch justify-content-start w-100 padding_bottom_mr">'
                                        +'<div class="tb_res_header fnt-fam res_width">Net Ideal Cycle Time (NICT)</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">Part Produced / Cycle</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">Part Price</div>'

                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.NICT+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.part_produced_cycle+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignprice" style="width:20%;"><p class="paddingm"> <i class="fa fa-inr" style="margin-right:5px;"></i>'+item.part_price+'</p></div>'
                                    +'</div>'                           
                                +'</div>'
                                +'<div class="res_basewidth1">'
                                    +'<div class="col col-1 marleft settings_active table_data_section display_f align_c resfw" style="width:50%;">'
                                        +'<p class="table_data_element fnt_fm" style="color: #005CBC"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px; color:#005CBC;"></i>Active</p>'
                                    +'</div>'
                                    +'<div class="col col-1 d-flex justify-content-center fasdiv resfw justify_content_end_res" style="width:50%;">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="javascript:function(){return false;}">'
                                                    +'<i  class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu" style="z-index:10;">'
                                                    +'<li class="edit-opt info-tool1" lvalue="'+item.part_id+'" style="display:'+info_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="img_font_wh2" style="margin-left:10px;">INFO</a></li>'
                                                    +'<li class="edit-opt edit-tool menu-font-change text-right" lvalue="'+item.part_id+'" style="display:'+edit_machine+';"><a href="#"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="img_font_wh" style="margin-left:10px;">EDIT</a></li>'
                                                    +'<li class="deactivate-tool " lvalue="'+item.part_id+'" svalue="'+item.status+'" style="display:'+deactivate_machine+';"><a href="#" style="border-bottom:none;"><img  src="<?php echo base_url('assets/img/delete.png'); ?>" class="img_font_wh1" style="margin-left:10px;">DEACTIVATE</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'              
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</div>');
                        $('.contentTool').append(elements);
                    }
                    else{
                        var condition1 = item.part_price;
                        elements = elements.add('<div class="table_data">'
                            +'<div class="row paddingm res_d">'
                                +'<div class="res_baswidth">'
                                    +'<div class="d-flex flex-row flex-wrap justify-content-start align-items-stretch w-100 padding_bottom_mr">'
                                        +'<div class="tb_res_header fnt-fam res_width">PART ID</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">PART Name</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">TOOL Name</div>'

                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:20%;"><p class="paddingm">'+item.part_id+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.part_name+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.tool_name+'</p></div>'
                                    +'</div>'
                                    +'<div class="d-flex flex-row flex-wrap align-items-stretch justify-content-start w-100 padding_bottom_mr">'
                                        +'<div class="tb_res_header fnt-fam res_width">NET IDEAL CYCLE TIME (NICT)</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">PART PRODUCED / CYCLE</div>'
                                        +'<div class="tb_res_header fnt-fam res_width">PART PRICE</div>'

                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.NICT+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignment" style="width:40%;"><p class="paddingm">'+item.part_produced_cycle+'</p></div>'
                                        +'<div class="table_data_element res_width lg_record_alignprice" style="width:20%;"><p class="paddingm"> <i class="fa fa-inr" style="margin-right:5px;"></i>'+item.part_price+'</p></div>'
                                    +'</div>'
                                +'</div>'
                                +'<div class="res_basewidth1">'
                                    +'<div class="col col-1 marlef settings_active table_data_section display_f align_c resfw" style="color:#C00000;width:50%;">'
                                        +'<p class="table_data_element fnt_fm" style="color: #C00000"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Inactive</p>'
                                    +'</div>'
                                    +'<div class="col col-1 d-flex justify-content-center fasdiv resfw   justify_content_end_res" style="width:50%;">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="javascript:function(){return false;}">'
                                                    +'<i class="edit fa fa-ellipsis-v icon-font dot-padding" alt="Edit"></i>'
                                                +'</a>'
                                                +'<ul class="edit-subMenu" style="z-index:10;">'
                                                    +'<li class="edit-opt info-tool" lvalue="'+item.part_id+'"><a href="#"><img src="<?php echo base_url('assets/img/info.png'); ?>" class="img_font_wh2" style="margin-left:10px;">INFO</a></li>'
                                                    +'<li class="activate-tool active_not" lvalue="'+item.part_id+'" svalue="'+item.status+'" style="display:'+activate_machine+';"><a href="#" style="border-bottom:none;"><img src="<?php  echo base_url('assets/img/activate.png') ?>" class="img_font_wh2" style="margin-left:10px;"></i>ACTIVATE</a></li>'
                                                +'</ul>'
                                            +'</li>'
                                        +'</ul>'                
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</div>');
                        $('.contentTool').append(elements);
                    }      
                });
            }
            else{
                // elements = elements.add(');
                $('.contentTool').append('<p class="no_record_css">No Records...</p>');
            }            
                
        },
        error:function(err){
            // alert("Sorry Try again!");
        }
    });
  
}

// Part Status ............
function status_find(id,status){
    $.ajax({
        url: "<?php echo base_url('Settings_controller/deactivateTool'); ?>",
        type: "POST",
        cache: false,
        async:false,
        data: {
            Part_Id : id,
            Status_Tool: status,
        },
        dataType: "json",
        success:function(res){
            get_part_data();
            // get count data
            get_count_data();
            $('#ActiveToolModal').modal('hide');
            $('#DeactiveToolModal').modal('hide');
            $("#overlay").fadeOut(300);
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
            $("#overlay").fadeOut(300);
        }
    });
}

// Retive Part Record Total Count ..............
function get_count_data(){
    $.ajax({
            url: "<?php echo base_url('Settings_controller/aIaTool'); ?>",
            type: "POST",
            dataType: "json",
            cache: false,
            async:false,
            success:function(res){
                var len = res.InActive.toString().length;
                var len1 = res.Active.toString().length;
                if (parseInt(len) > 1) {
                     $('#IActive').html(res.InActive);
                }else{
                    $('#IActive').html('0'+res.InActive);
                }

                if (parseInt(len1) > 1) {
                     $('#active').html(res.Active);
                }else{
                    $('#active').html('0'+res.Active);
                }
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
}

// Reset all the Error Messages ............
function error_show_remove(data){
    if (data == "addpart") {
        $('#inputPartNameErr').html(' ');
        $('#inputNewToolNameErr').html(' ');
        $('#inputNICTErr').html(' ');
        $('#inputNoOfPartsPerCycleErr').html(' ');
        $('#inputPartPriceErr').html(' ');
        $('#inputPartWeightErr').html(' ');
        $('#inputMaterialPriceErr').html(' ');
        $('#inputMaterialNameErr').html(' ');
        $('#tool_select_err').html(' ');
        $('#tid').html(' ');
        $('#inputPartNameCunt').html('0 / ' + text_max);
        $('#inputNewToolNameCunt').html('0 / ' + text_max);
        $('#inputMaterialNameCunt').html('0 / ' + text_max);

        $('.Add_Tool_Data').removeAttr("disabled");
    }else if (data == "edit_part") {
        $('.EditPartNameErr').html(' ');
        $('.inputNewToolNameEditErr').html('');
        $('.EditNICTErr').html(' ');
        $('.EditNoOfPartsPerCycleErr').html(' ');
        $('.EditPartPriceErr').html(' ');
        $('.EditPartWeightErr').html(' ');  
        $('.EditMaterialPriceErr').html(' ');
        $('.EditMaterialNameErr').html(' ');   
    }
}

// Reset all the Before Edit Model Show ..............
function remove_cache_value(edit){
    if (edit == "edit_part") {
        $('#partid').html(' ');
        $('#EditPartName').val('');
        $('#EditNoOfPartsPerCycle').val('');
        $('#EditPartPrice').val('');
        $('#EditPartWeight').val('');
        $('#EditMaterialPrice').val('');
        $('#EditMaterialName').val('');
        $('#toolidedit').html(' ');
        $('#date-time').html(' ');
        $('#inputNewToolNameEdit').val('');
        $('#inputToolNameEdit').val('');
    } 
}

function inputNewToolNameEdit(){
	var val = $("#inputNewToolNameEdit").val();
    val = val.trim();
	if (val == "") {
		$(".EditTool").attr("disabled", true);
		$('#inputNewToolNameEdit').val(val);
		return required;
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (parseInt(val.length) > 100) {
			$(".EditTool").attr("disabled", true);
			$("#inputNewToolNameEditCunt").css("display","none");
            //This will not occur
			return "Invalid length**";
		}
		else if (parseInt(val.length)<=100) {
			$(".EditTool").removeAttr("disabled");
			$("#inputNewToolNameEditCunt").css("display","block");
            var val_data = $("#inputNewToolNameEdit").val();
            val_data = val_data.trimStart().trimEnd();
            $('#inputNewToolNameEdit').val(val_data);
			return success
		}
		else{
			$(".EditTool").attr("disabled", true);
			$("#inputNewToolNameEditCunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#inputNewToolNameEdit').on('blur',function(){
    var x =inputNewToolNameEdit();
 	$("#inputNewToolNameEditErr").html(x);
});


// tool name dropdown
 // Retrive Tool Records .............
function tool_dropdown_retrive(){
    $.ajax({
        url: "<?php echo base_url('Settings_controller/getToolName'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async:false,
        success:function(res_Site){  
            $('#inputToolName').empty();
            // $('#inputToolNameEdit').empty();
            var elements = $('<option value="" selected="true" disabled>Select Tool</option>');
            elements = elements.add('<option value="new">Add New</option>');
            // var elements1 = $('<option value="new">Add New</option>');
         
            res_Site.forEach(function(item){
                elements = elements.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                // elements1 = elements1.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
            });
            $('#inputToolName').append(elements);
            // $('#inputToolNameEdit').append(elements1);
            $("#inputNewToolName").attr("disabled", true);   
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}
       



function inputEditToolName(){
    var val = $("#inputEditToolName").val();
    val = val.trim();
	if (val == "") {
		$(".EditTool").attr("disabled", true);
		$("#inputEditToolName").val(val);
		return required;
	}
	else{
		val = val.trim();
		if (parseInt(val.length) > 100) {
			$(".EditTool").attr("disabled", true);
			$("#edit_tool_name_cunt").css("display","none");
            //This will not occur
			return "Invalid length**";
		}
		else if (parseInt(val.length)<=100) {
			$(".EditTool").removeAttr("disabled");
			$("#edit_tool_name_cunt").css("display","block");
            var val_demo = $('#inputEditToolName').val();
            val_demo = val_demo.trimStart().trimEnd();
            $('#inputEditToolName').val(val_demo);
			return success
		}
		else{
			$(".EditTool").attr("disabled", true);
			$("#edit_tool_name_cunt").css("display","none");
			return "Invalid**";
		}
	}
}

$('#inputEditToolName').on('blur',function(){
    var x =inputEditToolName();
 	$("#edit_tool_name_err").html(x);
});

// character count
$('#inputEditToolName').keyup(function() {
    var text_length = $('#inputEditToolName').val();
    text_length = text_length.trim();
    text_length = text_length.length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#edit_tool_name_cunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#inputEditToolName').val($('#inputEditToolName').val().substring(0,100));
		var text_remaining = $('#inputEditToolName').val().length;
	 	$('#edit_tool_name_cunt').html(text_remaining + ' / ' + text_max_edit);
	}
});

// float checking function
function isFloat(x) {
     return !!(x % 1); 
}

// double click prevent the add part button
$('.Add_Tool_Data').dblclick(function(e){ 
    e.preventDefault();
})

// double click prevent for edit button
$('.EditTool ').dbclick(function(e){
    e.preventDefault();
});

</script>
