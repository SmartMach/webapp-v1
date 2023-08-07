
<style type="text/css">
    #chart{
      max-height: 10rem;
      width: 100%;
      margin: auto;
      padding: 0.5rem;
      margin-top: 0.6rem;
    } 
    .marginlr{
      margin-left: 0.2rem;
      margin-right: 0.2rem;
    }
    .ICONDiv{
      display: flex;
      justify-content: flex-start;
    }
    .optionLeft{
      margin-left:1.5rem;
    }
    .ICON{
      font-size: 1.2rem;
      color: #595959;
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
    .doth:nth-last-child(1):hover{
      background: white;
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

/* custom tooltip  strategy code*/
.d-flex{
      display: flex;
      flex-wrap: wrap;
      flex-direction: row;
      
    }
    .col-6{
      width: 50%;
      font-size: 1rem;
     
      /* font-weight: bold; */
    }
    .col-text{
      padding-left: 1rem;
      font-size: 0.8rem;
      font-weight:bold;
      font-family: 'Roboto';
      color:rgb(241, 92, 92);
    }
    .col-val{
      color:rgb(245, 41, 126);
      font-size: 0.8rem;
      font-family: 'Roboto';
    }
    .inEdit{
      display: none;
    }
    .inEditValue{
      display: none;
    }
    /* .addNotesReason{
      display: none;
      position: relative;
    } */
    /* .addNotesReason img{
      position: absolute;
      top: 23%;
      left: 23%;
    } */
    .doneEdit{
      display: none;
      position: relative;
    }
    .doneEdit img{
      position: absolute;
      top: 15%;
      left: 17%;
    }
    /*.split_input:nth-child(1) #settings_div div div .delete-split{
      display: none;
    }*/
    .labelGraph{
      /*background-color: blue;*/
      height: 10px;
      width: 10px;
      margin-right: 0.5rem;
    }
    .labelGraph1{
      /*background-color: blue;*/
      height: 5px;
      width: 15px;
      margin-right: 0.5rem;
    }

    .labelAlign{
      margin-left: 0.5rem;
      margin-right: 1rem;
    }

    .text-label-graph p{
      font-family:'Roboto-Regular';
      font-size:0.8rem;
      color:#999999;
      margin-left: 0.5rem;
    }
    .text-label-graph-end{
      display: flex;
      justify-content: end;
    }
    .text-label-graph-end p{
      font-family:'Roboto-Regular';
      font-size:0.8rem;
      color:#999999;
      margin-right: 0.5rem;
    }

 
    .Tooltip_Container{
      height:max-content;
      width: max-content;
      padding: 0.5rem;
      z-index: 3000;

    }
    .nameHeader{
      color: #595959;
      font-weight: bold;
      font-family: 'Roboto', sans-serif;
      font-size: 0.9rem;
    }
    .contentName{
      color: #595959;
      font-family: 'Roboto', sans-serif;
      font-size: 0.8rem;
    }
    .durationVal{
      color: #bfbfbf;
      font-family: 'Roboto', sans-serif;
      font-size: 0.8rem;
    }
    .leftAllign{
      margin-left: 0.5rem;
    }
    
    /*graph icons*/
    .icon_img_wh{
      width: 1.2rem;
      height: 1.2rem;
    }
     .icon_img_wh1{
      width: 1.4rem;
      height: 1.4rem;
    }


/*CSS for Calender dropdown*/
.ui-datepicker {
    text-align: center;
}

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
  /*border: 1px solid #dddddd;*/
  text-align: center;
}

.openemr-calendar .ui-datepicker {
    width: 191px;
}

.ui-datepicker table {
    width: 15rem;
    margin-left: 8px;
}

.ui-datepicker table thead{
    font-size: 13;
}
.ui-datepicker table td{
    color: #cacccf;
    background: #f6f6f6;
    border:1px solid #c5c5c5;
}
.font-size{
  font-size: 0.75rem;
  font-family: 'Roboto', sans-serif;
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

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

/* bulg edit css  is important */

.filterbtnstyle{
  color:white;
  background-color:#005abc;
  /* opacity: 0.7; */
  height:2.4rem;
}

/* filter button hovering style */
.filterbtnstyle:hover{
  color:var(--save_btn_font_color);
  background-color:var(--save_btn_hover_background_color);
  opacity: 0.9;

}

.filter_edit_div{
  height:4rem;
  top:19rem;
  left:4.6rem;
  right:0;
  background-color:var(--save_btn_font_color);
  z-index:101;
  position: fixed;
  /* margin-top:8rem; */
  display:flex;
  flex-direction:row;
  justify-content:flex-end;
  align-items:center;
}

.filter{
  display:none;
  z-index:5000;
  position:fixed;
}

.filter_input{
  display:flex;
  flex-direction:row-reverse;
  justify-content:flex-end;
  align-items:center;
  height:100%;
  width:100%;
}

.reset_img{
  height:1.5rem;
  margin-left:1rem;
  margin-right:1rem;
}

.bulg_edit_ui{
  display:none;
  z-index:5000;
  position:fixed;
}
.bulg_edit_div{
  display:flex;
  flex-direction:row;
  justify-content:flex-end;
  align-items:center;
  height:100%;
  width:100%;
}

/* css for filter dropd */
.filter_selectBox {
    position: relative;
    /* height:3.5rem; */
    width:100%;
    display:flex;
    align-items:center;

  }
  
  .filter_selectBox select {
    width: 100%;
    font-weight: bold;
  }

  
  .filter_overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }

  
  
  .filter_checkboxes {
    display: none;
    border: 1px #dadada solid;
    z-index:2000;
    position: absolute;
    background:var(--save_btn_font_color);
    /* padding:0.4rem; */
    border-radius:0.25rem;
    min-width:8.7rem;
  }
  
  .filter_checkboxes label {
    display: block;
  }
  
  .filter_checkboxes div:hover {
    background-color: #E7F2FF;
    padding:0;
    cursor:context-menu;
  }
  
  /* bulk edit multi select dropdown */
  .multi_select_label{
    position:fixed;
    margin-top:-0.6rem;
    margin-left:0.8rem;
    z-index:1500;
    background:white;
    font-size:12px;
    color:#8c8c8c;
    font-family:'Roboto' sans-serif;
  }
  .multi_select_drp{
    height:2.5rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
  }
  .filter_check_cate{
    display:flex;
    padding-left:0.1rem;
    padding-right:0.5rem;
    justify-content:center;
    align-items:center;
    height:2rem;
  }
  .cate_drp_check{
    width:20%;
    display:flex;
    justify-content:center;
  }
  .cate_drp_text{
    width:90%;
  }

  /* downtime reason multi select dropdown */
  .filter_selectBox_reason{
    position: relative;
    /* height:3.5rem; */
    width:100%;
    display:flex;
    align-items:center;
  }
  .filter_selectBox_reason select{
    width: 100%;
    font-weight: bold;
  }
  .filter_overSelect_reason{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }
  .filter_checkboxes_reason{
    display: none;
    border: 1px #dadada solid;
    z-index:2000;
    position: absolute;
    background:var(--save_btn_font_color);
    /* padding:0.4rem; */
    border-radius:0.25rem;
    min-width:8.7rem;

    min-height:max-content;
    max-height:10rem;
    overflow:scroll;
  }

  .filter_checkboxes_reason label{
    display: block;
  }
  .filter_checkboxes_reason div:hover{
    background-color: #E7F2FF;
    padding:0;
    cursor:context-menu;
  }
  .filter_check_reason{
    display:flex;
    /* padding-left:0.1rem;
    padding-right:0.5rem; */
    justify-content:center;
    align-items:center;
    height:2rem;
  }
  .reason_drp_check{
    width:20%;
    display:flex;
    justify-content:center;
    font-family:'Roboto',sans-serif;
    font-size:12px;
    font-weight:500;
  }
  .reason_drp_text{
    width:90%;
  }

  /* edit notes */
  .edit-split .note_edit {
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
      width: 20rem;
      height: 8rem;
    }


    /* bulk edit enable button */

    .bulk_edit_btn_case{
      position:fixed;
      z-index:5000;
      padding-right:1rem;
      display:none;
    }

    .bulk_edit_enable{
      width:8rem;
      height:2.6rem;
      border:1px solid #ced4ca;
      border-radius:0.25rem;
      display:flex;
      flex-direction:row;
      justify-content:center;
      align-items:center;
      color:grey;
      padding:0.5rem;
      font-family:'Roboto' sans-serif;
      font-weight:400;
    }

    .bulk_edit_enable:hover{
      cursor:pointer;
    }

    /* font style for multi select dropdwon */
    .font_multi_drp{
      font-family:'Roboto',sans-serif;
      font-weight:500;
      font-size:12px;
      margin:auto;
      user-select: none; 
      -webkit-user-select: none;
      -ms-user-select: none; 
    }


    /* no records found filter text */
    .no_record{
      display:flex;
      justify-content:center;
      align-items:center;
      font-family:'Roboto' sans-serif;
      font-weight:400;
      font-size:15px;
      height:5rem;
      color:#ced4ca;
    }
</style>

 <!-- timepicker start -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.min.css" integrity="sha512-WlaNl0+Upj44uL9cq9cgIWSobsjEOD1H7GK1Ny1gmwl43sO0QAUxVpvX2x+5iQz/C60J3+bM7V07aC/CNWt/Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.14.0/jquery.timepicker.js" integrity="sha512-v84GNWs/NREzyztDm0s2NCXR9tIXH4aD/pe3uktyJeCWICr+/J38obdjXx1wxPRzTXHY54Hf0zBD5fbuRSNvGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- timepicker end -->

<div class="mr_left_content_sec">
      <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
        <div class="container-fluid paddingm display_f justify_sb align_c">
          <p class="float-start fnt_fam mdl_header">Downtime</p>
            <div class="d-flex">
                  <p class="float-end fnt_fam style_label active_click fnt_active">
                      <span  id="machineOFFTotal">0</span>Machine OFF 
                  </p>
                  <p class="float-end fnt_fam style_label fnt_inactive">
                      <span  id="UnnamedTotal">0</span>Unnamed
                  </p>
            </div>
        </div>
      </nav>

      <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
        <div class="container-fluid paddingm display_f justify_sb align_c">
          <div>
            <span class="float-start paddingm labelAlign display_f justify_c align_c"><div class="labelGraph active_bg"></div><p class="paddingm p3">Active</p></span>
            <span class="float-start paddingm labelAlign  display_f justify_c align_c"><div class="labelGraph inactive_bg"></div><p class="paddingm p3">Inactive</p></span>
            <span class="float-start paddingm labelAlign  display_f justify_c align_c"><div class="labelGraph machine_off_bg"></div><p class="paddingm p3">Machine OFF</p></span>
            <span class="float-start paddingm labelAlign  display_f justify_c align_c"><div class="labelGraph offline_bg"></div><p class="paddingm p3">No Data</p></span>
          </div>
          <div class="d-flex innerNav">
            <div class="box display_f align_c" style="margin-right: 0.5rem;">
              <div class="input-box">
                  <select class="form-select font_weight select_input_width input_padd" name="" id="Production_MachineName" style="width: 10rem;padding-right:1.8rem;">
                  </select>
                  <label for="inputSiteNameAdd" class="input-padding ">Machine Name</label>
              </div>
            </div>
            <div class="box display_f align_c" style="margin-right: 0.5rem;">
              <div class="input-box">
                  <input type="datepicker" class="form-control select_input_width input_padd font_weight datepicker" id="Production_shift_date" style="width: 10rem;" placeholder="dd-mm-yyyy" autocomplete="off">
                  <label for="inputSiteNameAdd" class="input-padding ">Shift Date</label>
              </div>
            </div>
            <div class="box display_f align_c" style="margin-right: 0.5rem;">
              <div class="input-box">
                  <select class="form-select select_input_width input_padd font_weight" name="" id="RejectShift" style="width: 10rem;">
                  </select>
                  <label for="inputSiteNameAdd" class="input-padding ">Shift</label>
              </div>
            </div>
                 
          </div>
        </div>
      </nav>

      <!-- Downtime Graph -->
      <div class="chart-div po_fixed bg_white" style="left:4.5rem;right:0;z-index:101;">
        <div id="chart"></div>
        <div class="text-label-graph" style="width: 50%;float: left;">
          <p  id="shift_start_time_label" class="startTimeVal"></p>
        </div>
        <div class="text-label-graph-end" style="width: 50%;float: left;">
          <p  id="shift_end_time_label" class="endTimeVal"></p>
        </div>
      </div>

        <!-- filter option bulg edit -->
        <!-- filter downtime -->
        <div class="filter_edit_div" style="">
          <!-- filter option ui -->
          <div class="filter" style="">
            <!-- <div class="filter_re" style="height:100%;width:100%;"> -->     
            <div class="filter_input" style="">
              <!-- reset img -->
              <img src="<?php echo base_url(); ?>/assets/img/filter_reset.png" alt="" class="reset_img" style="">
              <!-- reset img -->
              <!-- filter button -->
              <button class="btn fo bn saveNotes filterbtnstyle" style="" id="apply_filter_btn">Apply Filter</button>
              <!-- filter button -->

              <!-- temporary hide for this code has change for the multi select dropdwon -->
              <!-- <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box">
                  <select class="form-select font_weight bulgedit_downtime_reason_drp" name="bulg_edit_drp" id="bulgedit_downtime_reason_drp" style="width: 10rem;" >
                  </select>
                  <label for="inputSiteNameAdd" class="input-padding ">Reason</label>
                </div>
              </div> -->
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <label class="multi_select_label" style="">Reason</label>
                <div class="filter_selectBox_reason" onclick="reason_multi_drp()">
                  <select  class="multi_select_drp" style="">
                    <option style="text-align:center;" id="text_reason">All Reasons</option>
                  </select>
                  <div class="filter_overSelect_reason"></div>
                </div>
                <div class="filter_checkboxes_reason" style="">
                  <!-- <div class="filter_check_reason" style="">
                    <div class="reason_drp_check" style="">
                      <input type="checkbox" id="one" class="reason_drp_checkbox" value="all"/>
                    </div>
                    <div class="reason_drp_text" style="">
                      <p style="font-size:15px;margin:auto;">All Reasons</p>
                    </div>
                  </div> -->
                </div>
              </div>

              <!-- temporary hide for this code because this code has change for multi select dropdwon -->
              <!-- <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box">
                  <select class="form-select font_weight" name="" id="bulg_drp_category" style="width: 10rem;">
                    <option value="" class="hide_text" selected disabled>Select</option>
                    <option value="Planned">Planned</option>
                    <option value="Unplanned">UnPlanned</option>
                  </select>
                  <label for="inputSiteNameAdd" class="input-padding ">Category</label>
                </div>
              </div> -->
              <div class="box rightmar" style="margin-right: 0.5rem;" >
                <label class="multi_select_label" style="">Category</label>
                <div class="filter_selectBox" onclick="category_drp()">
                  <select  class="multi_select_drp" style="" >
                    <option id="text_category_drp" style="text-align:center;">All Categories</option>
                  </select>
                  <div class="filter_overSelect"></div>
                </div>
                <div class="filter_checkboxes" style="" >
                  <div class="filter_check_cate" style="">
                    <div class="cate_drp_check" style="">
                      <input type="checkbox" id="one" class="category_drp_checkbox" value="all"/>
                    </div>
                    <div class="cate_drp_text" style="">
                      <p class="font_multi_drp" >All Categories</p>
                    </div>
                  </div>

                  <div class="filter_check_cate" style="">
                    <div class="cate_drp_check" style="">
                      <input type="checkbox" id="one" class="category_drp_checkbox" value="Planned"/>
                    </div>
                    <div class="cate_drp_text" style="">
                      <p class="font_multi_drp">Planned</p>
                    </div>
                  </div>

                  <div class="filter_check_cate" style="">
                    <div class="cate_drp_check" style="">
                      <input type="checkbox" id="one" class="category_drp_checkbox" value="Unplanned"/>
                    </div>
                    <div class="cate_drp_text" style="">
                      <p class="font_multi_drp">UnPlanned</p>
                    </div>
                  </div>

                </div>
              </div>
           

                 
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box">
                  <input type="time" class="form-control start_time_till" id="start_time_till" step="1" placeholder="Select" required>
                  <label for="inputSiteNameAdd" class="input-padding ">Start Time Till</label>
                </div>
              </div>
               
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box">
                  <input type="time" class="form-control start_time_from" id="start_time_from" step="1" placeholder="Select" required>
                  <label for="inputSiteNameAdd" class="input-padding ">Start Time From</label>
                </div>        
              </div>
            </div>

            
            <!-- </div> -->
          </div>
          <!-- filter option ui end -->
          <!-- after change edit checkbox -->
          <div class="bulg_edit_ui" style="">
            <div class="bulg_edit_div" style="">     
              <!-- category dropdown -->
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box">
                  <select class="form-select font_weight bulg_edit_category_drp" name="" id="bulg_edit_category_drp" style="width: 10rem;">
                    <option value="" selected disabled>Select</option>
                    <option value="Planned">Planned</option>
                    <option value="Unplanned">UnPlanned</option>
                  </select>
                  <label for="inputSiteNameAdd" class="input-padding ">Category</label>
                </div>
              </div>
              <!-- category dropdown -->
              <!-- reason dropdown -->
              <div class="box rightmar" style="margin-right: 0.5rem;">
                <div class="input-box">
                  <select class="form-select font_weight bulg_edit_drp" name="bulg_edit_drp" id="bulg_edit_drp" style="width: 10rem;" disabled="true">
                    <!-- <option value="" class="hide_text" selected disabled id="select_color">Select</option> -->
                  </select>
                  <label for="inputSiteNameAdd" class="input-padding ">Reason</label>
                </div>
              </div>
              <!-- reason dropwon -->
              <!-- button  -->
              <button class="btn fo bn saveNotes saveBtnStyle bulg_edit_submit" style="height:2.4rem;margin-right:1rem;">Save</button>
              <!-- button -->

            </div>
          </div>
          <!-- after change edit checkbox code end -->

          <!-- new design for bulk edit button -->
          <div class="bulk_edit_btn_case" style="" onclick="filter_show_hide()">
            <div class="bulk_edit_enable" style="">
              <div style="width:20%;text-align:center;">
                <i class="fa fa-clipboard"></i>
              </div>
              <div style="width:80%;">
                <span>Bulk Edit</span>
              </div>
            </div>
          </div>
          <!-- nre design for bulk edit button end -->
        </div>
          <!-- </div> -->

        <!-- filter option code end -->
          <!--  -->
          <div class="tableContent downtimeHeader" style="display: none;top:20rem">
            <div class="settings_machine_header sticky-top" style="position:fixed;left:4.5rem;right:0;top:23rem;margin-left: 0.5rem;margin-right: 0.5rem;background-color: white;z-index:100;">
              <div class="row paddingm">
                  <div class="col-sm-1 p3 paddingm" style="width:3%;">
                      <input type="checkbox" class="select_item" id="select_all_checkbox" style="height:1rem;width:1rem;margin:auto;">
                  </div>
                  <div class="col-sm-1 p3 paddingm" style="display:flex;flex-direction:row;">
                    <p class="basic_header">START TIME</p>
                  </div>
                  <div class="col-sm-1 p3 paddingm" style="word-wrap: break-word;flex-wrap: wrap;">
                    <p class=" basic_header">DURATION
                      <br>
                      (min)
                    </p>
                  </div>
                  <div class="col-sm-1 p3 paddingm">
                    <p class="basic_header">END TIME</p>
                  </div>
                  <div class="col-sm-1 p3 paddingm">
                    <p class="basic_header">CATEGORY</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm reason_header" style="width:15%;">
                    <p class="basic_header">REASON</p>
                  </div>
                  <!-- target header -->
                  <div class="col-sm-2 p3 paddingm target_header" style="width:10%;display:none;">
                    <p class="basic_header" style="margin:auto;margin-block-start:revert;margin-top:1rem;">Target</p>
                  </div>
                  <!-- target header end -->

                  <div class="col-sm-2 p3 paddingm tool_name_header" style="width:15%;">
                    <p class="basic_header">TOOL NAME</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm part_name_header" style="width:15%;">
                    <p class="basic_header">PART NAME</p>
                  </div>
                  <div class="col-sm-2 p3 paddingm" style="justify-content: center;width:15%;">
                    <p class="basic_header">ACTION</p>
                  </div>
              </div>
            </div>

          <!-- Graph split content will be displayed in this div -->
            <div class="contentMachine paddingm " style="margin-top:16.2rem;">
              <div class="split_input"></div>
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
   

<div class="modal fade" id="DeleteSPlit" tabindex="-1" aria-labelledby="DeleteSPlit1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="DeleteSPlit1" style="">CONFIRMATION MESSAGE</h5>
            </div>
                <div class="modal-body">
                    <label style="color: black;">Are you sure you want to delete this machine record?</label>
                    <p class="settings-machineAdd-model">Downtime duration will merge with it`s parent record</p>
                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn deleteRec saveBtnStyle" name="" value="SAVE" >Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close" >Cancel</a>   
                </div>
    </div>
  </div>
</div>
<!--  temporary hide this function notes model insertion as per the madhan sir instruction
<div class="modal fade" id="EditSPlit" tabindex="-1" aria-labelledby="EditSPlit1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered rounded">
    <div class="modal-content bodercss">
            <div class="modal-header" style="border:none; ">
                <h5 class="modal-title settings-machineAdd-model" id="EditSPlit1" style="">EDIT NOTES</h5>
            </div>
                <div class="modal-body">
                    <div class="box">   
                      <div class="input-box fieldStyle">  
                          <textarea class="form-control NotesValue" id="NotesValue" placeholder="Enter Your Notes Here.." rows="3"></textarea>    
                          <br>
                          <!-- <input type="text" class="form-control" id="" name=""> --
                          <label for="inputMachineName" class="input-padding">Notes</label>
                      </div>
                      <input type="text" name="" class="indexNotes" id="indexNotes" style="display: none;">
                    </div>
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="btn fo bn saveNotes saveBtnStyle" name="" data-bs-dismiss="modal" value="SAVE" >Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
                </div>
    </div>
  </div>
</div> -->
        
<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> -->
<!-- apexcharts js local -->
<script src="<?php echo base_url(); ?>/assets/apexchart/dist/apexcharts.js"></script>


<!-- Link For Calender -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>




// Code for find the diference between two different timestamps...........
// var difference = new Date(date2).getTime() - new Date(date1).getTime();
// alert(difference/1000);

//script for Shift Date calender
/*
function datePick(date_shift){

  var enableDays=[];

  date_shift.forEach(function(item){
    enableDays.push(item.shift_date);
  });
  enableDays.push("2022-05-06");
  //alert(enableDays);

  //For insert new dates.......
  // var enableDays = ["06-05-2022","08-07-2022","13-07-2022","06-08-2022","02-07-2022"];
  $(".datepicker").datepicker({beforeShowDay: function(dt) {
    var datestring = $.datepicker.formatDate('yy-mm-dd', dt);
    //alert(datestring);
      if($.inArray(datestring, enableDays) != -1) {
       return [true];
      }
      else{
       return [false];
      }   
      },
      changeMonth: true,
      changeYear: true,
      maxDate: new Date()
  });
}
*/


// bulg edit functional code 


// bulk edit hide and show function
function filter_show_hide(){
  $('.filter').css('display','inline');
  $('.bulk_edit_btn_case').css('display','none');
  $('.select_item').css('display','inline');
  $('.npencil').css('display','none');
  $('.splitclick').css('display','none');
  $('.ndelete').css('display','none');


  $('.tableContent').css('display','none');
  $('.split_input').empty();
  $('.edit_input').css('display','none');
  $('.edit_display').css('display','inline');
  $('.edit_input1').css('display','none');
  $('.edit_display1').css('display','inline');
  $('.edit_input2').css('display','none');
  $('.edit_display2').css('display','inline');
  $('.edit_input3').css('display','none');
  $('.edit_display3').css('display','inline');
  $('.edit_input4').css('display','none');
  $('.edit_display4').css('display','inline');
  $('.doneEdit').css('display','none');
  $('.reasonInfo').css('display','inline');

  target_input_function_handle("remove",0);

}

// reset category dropdwon
function reset_category(){
 
  var cate_arr = $('.category_drp_checkbox');
  // alert(cate_arr.length);
  // for(var j=0;j<parseInt(cate_arr.length);j++){
  //   cate_arr[j].checked=true;
  //   $('.category_drp_checkbox:eq('+j+')').attr('checked',true);
  // }
  jQuery('.category_drp_checkbox').each(function(index){
    cate_arr[index].checked=true;
  });
  
}

// bulk edit code downtime reasons all selected
function reset_downtime_reasons(){
  var rarr = $('.reason_drp_checkbox');
  // alert(cate_arr.length);
  jQuery('.reason_drp_checkbox').each(function(index){
    rarr[index].checked=true;
  });

}

// category dropdwon checkbox click
/* temporary hide for this function
$(document).on('click','.category_drp_checkbox',function(event){
  event.preventDefault();
  var dummy_in = $('.category_drp_checkbox');
  var d_index = dummy_in.index($(this));
  var tmp_che = $('.category_drp_checkbox');
  if (tmp_che[d_index].checked ===true) {
    tmp_che[d_index].checked = false;
    // $('.category_drp_checkbox:eq('+d_index+')').removeAttr('checked');
  }else{
    tmp_che[d_index].checked = true;
    // $('.category_drp_checkbox:eq('+d_index+')').attr('checked','checked');
  }
  alert(d_index);
});
*/
// bulk edit label onclick category reasons code
var count_category = 0;
$(document).on('click','.filter_check_cate',function(event){
  event.preventDefault();
  var count1 = $('.filter_check_cate');
  var index_val = count1.index($(this));
  // alert(index_val);
  var check_if = $('.category_drp_checkbox');
  if (index_val === 0) {
    // alert(index_val);
    // alert(check_if[index_val].checked);
    if (check_if[index_val].checked===false) {
      // alert('ok');
      check_if[0].checked=true;
      check_if[1].checked=true;
      check_if[2].checked=true;
      $('.category_drp_checkbox').attr('checked','checked');
      count_category = 2;
      
    }else{
      count_category = 0
      $('.category_drp_checkbox').removeAttr('checked');
     
    }
    // $('.category_drp_checkbox').attr('checked','checked');
  }else{
    if (check_if[index_val].checked === false) {
      check_if[index_val].checked=true;
      count_category = parseInt(count_category)+1
      $('.category_drp_checkbox:eq('+index_val+')').attr('checked','checked');
      
      // if (parseInt(count_category)==2) {
      //   check_if[0].checked=true;
       
      //   // downtime_reason_filter();
      // }

    }else{
      // check_if[index_val].checked=true;
      count_category = parseInt(count_category)-1
      if (parseInt(count_category)<2) {
        check_if[0].checked=false;
      }
      
      $('.category_drp_checkbox:eq('+index_val+')').removeAttr('checked');

    }
  }

  // check the count
  var count_cate = 0;
  jQuery('.category_drp_checkbox').each(function(index){
    if (check_if[index].checked===true) {
      count_cate = parseInt(count_cate)+1;
    }
  });

  // text alignment
  // var temp_reason = "";
  if (parseInt(count_cate)>=2) {
    check_if[0].checked=true;
    var temp_reason = null;
    downtime_reason_filter(temp_reason);
    $('#text_category_drp').text('All Categories');
  }else if(parseInt(count_cate)>0){
    var temp_reason = getcategory_arr();
    downtime_reason_filter(temp_reason[0]);
    $('#text_category_drp').text(count_cate+' Selected');
   
  }
  else{
    var temp_reason = null;
    downtime_reason_filter(temp_reason);
    // reset_category();
    $('#text_category_drp').text('No Selected');
  }
  $('#text_reason').text('All Reasons');

});

// bulk edit label onclick downtime reasons code
$(document).on('click','.filter_check_reason',function(event){
  event.preventDefault();

  var countr = $('.filter_check_reason');
  var inval_reason = countr.index($(this));
  var check_reason_if = $('.reason_drp_checkbox');
  if (inval_reason == 0) {
    if (check_reason_if[0].checked === true) {
      $('.reason_drp_checkbox').removeAttr('checked');
      // reset_downtime_reasons();
      $('#text_reason').text('No Reasons');
    }else{
      $('.reason_drp_checkbox').attr('checked',true);
      jQuery('.reason_drp_checkbox').each(function(index) {
          check_reason_if[index].checked=true;

      });
      $('#text_reason').text('All Reasons');
    }

  }else if(parseInt(inval_reason)>0){

    if (check_reason_if[inval_reason].checked === false) {
      check_reason_if[inval_reason].checked=true;
      $('.reason_drp_checkbox:eq('+inval_reason+')').attr('checked','checked');
      

    }else{
      $('.reason_drp_checkbox:eq('+inval_reason+')').removeAttr('checked');
    }

    // selected reasons
    
    var reason_selected_count = 0;
    jQuery('.reason_drp_checkbox').each(function(index){
      if (check_reason_if[index].checked===true) {
        reason_selected_count = parseInt(reason_selected_count)+1;
      }
    });
    var reason_select_leng = $('.reason_drp_checkbox').length;
    reason_select_leng = parseInt(reason_select_leng)-1;
    if (parseInt(reason_selected_count)>=parseInt(reason_select_leng)) {
      if(check_reason_if[0].checked===true){
        check_reason_if[0].checked=false;
        $('#text_reason').text(parseInt(reason_selected_count)-1+' Selected');
      }else{
        check_reason_if[0].checked=true;
        $('#text_reason').text('All Reasons');
      }
    
    }else if((parseInt(reason_selected_count)<parseInt(reason_select_leng)) && (parseInt(reason_selected_count)>0)){
      $('#text_reason').text(parseInt(reason_selected_count)+' Selected');
    }else{
      // reset_downtime_reasons();
      $('#text_reason').text('No Reasons');
    }

  }

  
});

// 

// select all checkbox click event function
// bulg edit code
$(document).on('click','#select_all_checkbox',function(event){
  var check = $('#select_all_checkbox').prop('checked');

  if (check === true) {
    var val_arr = $('.select_item');
    for(var i=0;i<val_arr.length;i++){
      if (val_arr[i].checked === false) {
        val_arr[i].checked = true;
        $('.select_item:eq('+i+')').attr('checked','checked');
      }
    }
    // $('.select_item').attr('checked','checked');
  }else{
    $('.select_item').removeAttr('checked');
  }
    //$('.select_item').attr('checked','checked');
});

// filter option dropdown checkbox
var filter_expanded = false;

function category_drp() {
  // event.preventDefault();

var checkboxes = document.getElementsByClassName("filter_checkboxes");
if (!filter_expanded) {
    // checkboxes.style.display = "block";
    console.log("just click");
    $('.filter_checkboxes').css("display","block");
    filter_expanded = true;
} else  {
    // checkboxes.style.display = "none";
    var category_drp = "";
    var category_arr_drp_tmp = getcategory_arr();
    var cate_leng = category_arr_drp_tmp.length;
    if (parseInt(cate_leng)>2) {
      category_drp = null;
    }else{
      category_drp = category_arr_drp_tmp[0];
    }
    // console.log("after select category dropdwon");
    console.log("category_drp");
    downtime_reason_filter(category_drp);
    $('#text_reason').text('All Reasons');
    $('.filter_checkboxes').css("display","none");
    filter_expanded = false;
}
}


// filter multi select dropdwon downtime reasons
var reason_expand = false;
function reason_multi_drp(){
  var checkboxes = document.getElementsByClassName("filter_checkboxes_reason");
  if (!reason_expand) {
      // checkboxes.style.display = "block";
    
      // console.log(category_drp);
      $('.filter_checkboxes_reason').css("display","block");
      reason_expand = true;
  } else {
      // checkboxes.style.display = "none";
      $('.filter_checkboxes_reason').css("display","none");
      reason_expand = false;
  }
}

// start time till onchange
$(document).on('change','#start_time_till',function(event){
  
  event.preventDefault();
  var start_time_til = $('#start_time_till').val();
  if (start_time_til != null || start_time_til !="") {
    var start_time_start = $('#start_time_from').val();
    if ((start_time_start !=null) && (start_time_start!="") ){
      // console.log(start_time_start);
      // console.log(start_time_til); 
      $('#apply_filter_btn').css("color","white");
      $('#apply_filter_btn').css("background-color","#005abc");
      $('#apply_filter_btn').css("opacity","1");
    }
  }

});

// start time from onchange
$(document).on('change','#start_time_from',function(event){
  event.preventDefault();
  var start_time_from = $('#start_time_from').val();
  if (start_time_from !=null || start_time_from !="") {
    var start_time_till = $('#start_time_till').val();
    if ((start_time_till !=null) && (start_time_till !="")) {
      // console.log(start_time_from);
      // console.log(start_time_till);
      $('#apply_filter_btn').css("color","white");
      $('#apply_filter_btn').css("background-color","#005abc");
      $('#apply_filter_btn').css("opacity","1");
    }
  }
});

// reset image this function reset the records display div
$(document).on('click','.reset_img',function(event){

  event.preventDefault();
  $('.split_input').empty();
  var stime = $('#shift_start_time_label').text();
  var etime = $('#shift_end_time_label').text();
  // console.log("end time start time");
  // console.log(stime);
  $('#start_time_from').val(stime);
  $('#start_time_till').val(etime);
  // $('#bulg_drp_category').val('');
  // this function  is reset the category dropdwon all selected function
  reset_category();
  $('#text_category_drp').text('All Categories');
  $('#text_reason').text('All Reasons');
  var category_tmp = null;
  downtime_reason_filter(category_tmp);
});

// filter downtime reasons dropdwon function
function downtime_reason_filter(category_temp){
  // var cate_arr = getcategory_arr(); 
  // var arr_leng = cate_arr.length;
  $('.filter_checkboxes_reason').empty();
  if (category_temp === null) {
    $.ajax({
      url:"<?php echo base_url(); ?>/PDM_controller/downtime_reason_bulgedit",
      method:"POST",
      dataType:"json",
      success:function(res){
        // console.log("reason dropdwon");
        // console.log(res);

        var element = $();
        $('.filter_checkboxes_reason').append('<div class="filter_check_reason" style=""><div class="reason_drp_check" style=""><input type="checkbox" id="one" class="reason_drp_checkbox" value="all_reason"/></div><div class="reason_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
        res.forEach(function(item){
          // console.log(item.downtime_reason_id);
          if (item.downtime_reason==="Tool Changeover") {
            
          }else{
            // element = element.add('<option value="'+item.downtime_reason+'">'+item.downtime_reason+'</option>');
            element = element.add('<div class="filter_check_reason" style=""><div class="reason_drp_check" style=""><input type="checkbox" id="one" class="reason_drp_checkbox" value="'+item.downtime_reason+'"/></div><div class="reason_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
            $('.filter_checkboxes_reason').append(element);
          }
        
        });
        // downtime reasons all reasons selection funciton [reset the multiselect dropdwon]
        reset_downtime_reasons();
      },
      error:function(err){
        console.log(err);
      },
    });
  }
  else if(category_temp!=null){
    // selected_cate_reasons(cate_arr[0]);
    // console.log("ok");
    // console.log(category_temp);
    category_based_reson(category_temp);
  }

  
 
}


// bulk edit this function get category array for before filter submission
function getcategory_arr(){
  const temp_arr = [];
  var loop_cate = $('.category_drp_checkbox').val();
  $('.category_drp_checkbox').each(function(){ 
    if($(this).is(':checked')){
      temp_arr.push($(this).val());
    }           
  });
  return temp_arr;

}

// after change category update the downtime reason dropdwon
/* this function not now
function after_cate(){
  alert('ji');
  var category_drp = "";
  var category_arr_drp_tmp = getcategory_arr();
  var cate_leng = category_arr_drp_tmp.length;
  if (parseInt(cate_leng)>2) {
    category_drp = null;
  }else{
    category_drp = category_arr_drp_tmp[0];
  }
  console.log("after select category dropdwon");
  console.log(category_drp);
  downtime_reason_filter(category_drp);
}
*/

// get filter reason array
function getreason_arr(){
  const tarr = [];
  var loop_reason = $('.reason_drp_checkbox').val();
  $('.reason_drp_checkbox').each(function(){
    if ($(this).is(':checked')) {
      tarr.push($(this).val());
    }
  });
  return tarr;
}

// filter function
function filter_btn_call(){
  var start_time_from = $('#start_time_from').val();
    var start_time_till = $('#start_time_till').val();
    if (((start_time_from!=null) && (start_time_from!="")) && ((start_time_till!=null) && (start_time_till!=""))) {
      // var category_drp = $('#bulg_drp_category').val();
      // category value getting
      var category_drp = "";
      const category_arr = getcategory_arr();
      cate_leng = category_arr.length;
      if (parseInt(cate_leng)>2) {
        category_drp = null;
      }else{
        category_drp = category_arr[0];
      }

      // console.log(category_arr);
      // console.log(category_drp);
      // var reason_drp = $('#bulgedit_downtime_reason_drp').val();
      // reason dropdown
      var reason_drp = "";
      const reason_arr = getreason_arr();
      var rleng = $('.reason_drp_checkbox').length;
      if (parseInt(rleng)===parseInt(reason_arr.length)) {
        reason_drp = null;
      }else if(parseInt(reason_arr.length)>0) {
        reason_drp = reason_arr
      }
      // console.log(category_drp);
      // console.log("Reason Array");
      // console.log(reason_drp);
      var machine_id = $('#Production_MachineName').val();
      var sdate = $('#Production_shift_date').val();
      var sid = $('#RejectShift').val();
      var shift_id = sid.split('0');
      const tmp_sdate = sdate.split("-");
      var sdate_tmp = tmp_sdate[0]+'-'+tmp_sdate[1]+'-'+tmp_sdate[2];
      console.log(tmp_sdate);
      // alert(shift_id);
      // alert(reason_drp);
      // alert(start_time_from);
      // alert(start_time_till);
      $('.split_input').empty();  
      $.ajax({
        url:"<?php echo base_url(); ?>/PDM_controller/apply_filter_get_data",
        method:"POST",
        dataType:"json",
        data:{
          start_time:start_time_from,
          end_time:start_time_till,
          category:category_drp,
          dreason:reason_drp,
          machine_id:machine_id,
          shift_date:sdate_tmp,
          sid:shift_id[0],
        },
        success:function(res){
          console.log("apply filter");
          console.log(res);
          if (parseInt(res.length)>0) {
            var z=0;
            res.forEach(function(item){
              // console.log(item.start_time);


              data_time.push(item.start_time);
              data_time.push(item.end_time);
              data_array.push(item.split_duration);
              split_ref.push(item.split_id);
              data_notes.push(item.notes);

              var reason = findDownReason(item.downtime_reason_id);
              $('.downtimeHeader').css("display","block");
              var partid = item.part_id;
              var toolid = item.tool_id;
              drawGraph(item.start_time,item.split_duration,item.end_time,item.machine_event_id,item.notes,reason,partid,toolid,item.split_id,item.last_updated_by,item.last_updated_on);
              $('.ndelete').css("display","none");
              $('.nsplit').css('display','none');
              $(".delete-split:eq(0)").css("display","none");
              $(".circleMatch:eq(0)").css("display","block");
              $('.npencil').css('display','none');
              DownReasonUpdate(z,reason,item.downtime_reason_id);
              DownToolUpdate(z,toolid);
              DownPartUpdate(z,partid,toolid);

              z = parseInt(z)+1;
            
            });
          }else{
            // console.log("No Records Found!!!");
            $('.split_input').html('<p class="no_record">No Records Found!!</p>');
          }
         
          $("#overlay").fadeOut(300);
        },
        error:function(err){
          console.log(er);
          // alert('Sorry Try Again');
          $("#overlay").fadeOut(300);
        }
      });

    }
}

// apply filter submission button
$(document).on('click','#apply_filter_btn',function(event){
    event.preventDefault();
    console.log("filter button");
    $("#overlay").fadeIn(300);
   
    // $('.ndelete').css('display','none');
    filter_btn_call();
   
    // $('.splitclick').css('display','none');
  
});


// after click checkbox change ui 
$(document).on('change','.select_item',function(event){

  event.preventDefault();
  var count = 0;
  var count_len = $('.select_item').length;
  var checkbox = $('.select_item');
  if (parseInt(count_len)>1) {
    
  
    for(var i=0;i<parseInt(count_len);i++){
      // console.log(checkbox[i].checked);
      if (checkbox[i].checked === true) {
        count = parseInt(count)+1;
      }
    }
    if (parseInt(count)>0) {
      // console.log("one then more checkbxes selected"+count);
      bulg_edit_dropdown();
      $('.filter').css("display","none");
      $('.bulg_edit_ui').css("display","inline");
      $('#bulg_edit_drp').val('');
      $('#bulg_edit_drp').attr("disabled",true);
      $('#bulg_edit_category_drp').val('');


      $('.note_edit').css('display','none');
      $('.splitclick').css("display","none");
      $('.edit_visible').css("display","none");
      $('.ninfo').css("display","none");
      $('.ndelete').css('display','none');
      $('.npencil').css('display','none');

      // $('.action_div').css("display","none");
      var edit_count = 0;
      jQuery('.select_item').each(function(index){
        if (checkbox[index].checked === true) {
          edit_count = parseInt(edit_count)+1;
        }
      });
      var tmp = parseInt(count_len)-1;
      if (parseInt(tmp)==parseInt(edit_count)) {
        if(checkbox[0].checked===true){
          checkbox[0].checked=false;
        }else{
          checkbox[0].checked=true;
        }
      }

    }else{
      // console.log("no checkboxes selected"+count);
      $('.filter').css("display","inline");
      $('#bulg_edit_drp').val('');
      $('#bulg_edit_category_drp').val('');
      $('.bulg_edit_ui').css("display","none");

      $('.ninfo').css("display","inline");
      $('.edit_visible').css("display","inline");
      $('.splitclick').css("display","none");
      $('.ndelete').css('display','none');
      $('.npencil').css('display','none');
      // var del = $('.ndelete');
      // jQuery('.select_item').each(function(index){
      //     if ($('.ndelete:eq('+index+')').attr("splitref")==="0") {
      //       $('.ndelete:eq('+index+')').css('display','none');
      //     }else{
      //       $('.ndelete:eq('+index+')').css('display','inline');
      //     }
      // });
      // $('.ndelete:eq(0)').css('display','none');
      // $('.ndelete').css('display','inline');
      // $('.action_div').css("display","inline");
    }
  }
  else{
    $('.select_item').removeAttr('checked');
    // alert("only on filter or graph ");
  }

  // $('.filter').css("display","none");
  // $('.bulg_edit_ui').css("display","inline");

});

// after click checkbox and change category dropdown function
$(document).on('change','#bulg_edit_category_drp',function(event){
  event.preventDefault();

  var get_category =  $('#bulg_edit_category_drp').val();
  if ((get_category!="") && (get_category!=null)) {
    
    $('#bulg_edit_drp').removeAttr("disabled");
    bulg_edit_dropdown(get_category);
  }

  
});

// bulg edit submission function 
$(document).on('click','.bulg_edit_submit',function(event){
  event.preventDefault();
 
  var bulg_reason = $('#bulg_edit_drp').val();
  var bulg_category = $('#bulg_edit_category_drp').val();
  var machine_id = $('#Production_MachineName').val();
  var shift_date = $('#Production_shift_date').val();
  var shift_id = $('#RejectShift').val();
  const sid = shift_id.split("0");
  const sdate = shift_date.split("-");
  if ((bulg_category!="") && (bulg_category!=null)) {
    if ((bulg_reason!="")&& (bulg_reason!=null)) {
      // alert("all values are correct");
      $("#overlay").fadeIn(300);
      // checked value only get 
      var check_box = $('.select_item');
      const start_time_arr = [];
      const end_time_arr = [];
      const machine_event_id_arr = [];
      const split_id_arr = [];
      // getting values condition
      if (check_box[0].checked === true) {
        // this condition getting all records values
        for(c=0;c<parseInt(check_box.length)-1;c++){
          if (check_box[c].checked === true) {
            var tmp_index = parseInt(c);
            
            var tmp_stime = $('.startTime:eq('+parseInt(tmp_index)+')').text();
            var tmp_etime = $('.endTime:eq('+parseInt(tmp_index)+')').text();
            var tmp_meid = $('.splitclick:eq('+parseInt(tmp_index)+')').attr("refval");
            var tmp_spid = $('.splitclick:eq('+parseInt(tmp_index)+')').attr("splitref");

            // pushing record
            start_time_arr.push(tmp_stime);
            end_time_arr.push(tmp_etime);
            machine_event_id_arr.push(tmp_meid);
            split_id_arr.push(tmp_spid);
          }
        }
      }
      else if(check_box[0].checked !=true){
        // this condition getting selected values
        for(c=0;c<parseInt(check_box.length);c++){
          if (check_box[c].checked === true) {
            var tmp_index = parseInt(c)-1;
            
            var tmp_stime = $('.startTime:eq('+parseInt(tmp_index)+')').text();
            var tmp_etime = $('.endTime:eq('+parseInt(tmp_index)+')').text();
            var tmp_meid = $('.splitclick:eq('+parseInt(tmp_index)+')').attr("refval");
            var tmp_spid = $('.splitclick:eq('+parseInt(tmp_index)+')').attr("splitref");

            // pushing record
            start_time_arr.push(tmp_stime);
            end_time_arr.push(tmp_etime);
            machine_event_id_arr.push(tmp_meid);
            split_id_arr.push(tmp_spid);
          }
        }
      }

      // display selected records
      // console.log("after click bulg edit submission");
      // console.log(start_time_arr);
      // console.log(end_time_arr);
      // console.log(machine_event_id_arr);
      // console.log(split_id_arr);

      var tmp_sid = sid[0];
      var sdate_tmp = sdate[0]+'-'+sdate[1]+'-'+sdate[2];
      // bulg edit ajax function
      $.ajax({
        url:"<?php echo base_url(); ?>/PDM_controller/bulg_updation",
        method:"POST",
        dataType:"json",
        data:{
          start_time_ar:start_time_arr,
          end_time_ar:end_time_arr,
          machine_event_arr:machine_event_id_arr,
          split_arr:split_id_arr,
          dcategory:bulg_category,
          dreason:bulg_reason,
          mid:machine_id,
          sid:tmp_sid,
          sdate:sdate_tmp,

        },
        success:function(res){
          // console.log(res);
          if (res == true) {
            // $('#bulg_edit_category_drp').val('');
            // $('#bulg_edit_drp').val('');
            $('.bulg_edit_ui').css("display","none");
            $('.filter').css("display","inline");
            // $('.split_input').empty();

            // refresh filter input 
            // $('#start_time_from').val('');
            // $('#start_time_till').val('');
            // $('#bulg_drp_category').val('');
            // $('.category_drp_checkbox').attr('checked',true);
            $('#bulgedit_downtime_reason_drp').val('');
            $('.select_item').removeAttr("checked");

            // $('.filterbtnstyle').css("color","white");
            // $('.filterbtnstyle').css("background-color","grey");
            // $('.filterbtnstyle').css("opacity","0.7");
            // downtime graph refreshment
            filter_btn_call();
            getDownTimeGraph();
            getTotalCount();

            // alert("Bulk Updation SuccessFully");
          }
          $("#overlay").fadeOut(300);
        },
        error:function(err){
          console.log(err);
          // alert("Sorry Try Again");
          $("#overlay").fadeOut(300);
        },
      });

    }else{
      alert("Required field reason");
    }
  }else{
    alert("Required field category");
  }
});


// bulg edit function code end






var UserNameRef = "<?php //echo($this->data['user_details'][0]['User_Name'])?>";
var UserRoleRef ="<?php //echo($this->data['user_details'][0]['Role'])?>";
var UserSiteRef ="<?php //echo($this->data['user_details'][0]['Site_ID'])?>";


var data_array = new Array();
var calendar_array = new Array();
var data_time = new Array();
var event_ref= new Array();
var split_ref = new Array();
var machineEventIdRef ="";
var machineID_ref = "";
var shift_date_ref = "";
var shift_Ref ="";
var live_graph="";
var data_duration = new Array();
var data_notes = new Array();
var down_category = new Array();
var down_reason =new Array();
var down_tool = new Array();
var down_part = new Array();
var down_notes = new Array();
var machine_Name = "";
var part_name_tooltip = new Array();
var machine_Data = new Array();
var down_reason_collection = new Array();
var part_collection = new Array();

var current_data={};

var machineOFFTotal=0;
var UnnamedTotal=0;

var down_category = new Array();

var down_reason_val = new Array();

var count_click = 0;
const index_arr = new Array();

var split_second=0;

var check_count= 0;

var overall_duration_value =0;

// graph and records part id to change part name 
function getpartnames_graph(tmp_part_id_arr){
  var part_id_a = tmp_part_id_arr.split(",");
  var part_len = parseInt(part_id_a.length);
  var partname_arr = new Array();
  if (parseInt(part_len)>1) {
    for(var i=0;i<parseInt(part_len);i++){
  
      for(let j=0;j<parseInt(down_part.length)/2;j++){
        if (part_id_a[i] === down_part[2*j]) {
          // console.log("matched part_id:\t"+part_id_a[i]+down_part[2*j])
            partname_arr.push(" "+down_part[(2*j)+1]);
        }
      }
    // partname_arr.push(" "+'No Part');
    }
  }else{
    if (part_id_a[0] === "PT1001") {
        partname_arr.push(""+"No Part");
    }else{
      for(var i=0;i<parseInt(part_len);i++){
  
        for(let j=0;j<parseInt(down_part.length)/2;j++){
          if (part_id_a[i] === down_part[2*j]) {
            // console.log("matched part_id:\t"+part_id_a[i]+down_part[2*j])
              partname_arr.push(" "+down_part[(2*j)+1]);
          }
        }
      // partname_arr.push(" "+'No Part');
      }
    }
  }
  

  // console.log(partname_arr);
  return partname_arr.toString();
}


$(document).ready(function(){

  
  
  
// document.getElementsByClassName('circleMatch')[0].style.display = "inline";
  // var delete_icon = document.getElementsByClassName('delete-split');
  // delete_icon[0].style.display = "none";
  $("#Production_shift_date").attr('readonly',true);
  $('#Production_shift_date').attr('disabled',true);
  $('#RejectShift').attr('readonly',true);
  $('#RejectShift').attr('disabled',true);

  // Ajax function for dropdown machine names
  $('#Production_MachineName').empty();
  $.ajax({
    url: "<?php echo base_url('PDM_controller/retirve_machine_data'); ?>",
    method:"post",
    dataType:"json",
    success:function(result_machine){
      var elements = $();
      $('#Production_MachineName').append('<option value="" selected="true">Select</option>');
      result_machine.forEach(function(item){
        elements = elements.add('<option value="'+item.machine_id+'" mname="'+item.machine_name+'">'+item.machine_name+'-'+item.machine_id+'</option>');
        $('#Production_MachineName').append(elements);
      });
    },
    error:function(err){
      // alert("Error while receiving machine records!");
    }
  });
     
  });

// this function for dropdown shift date design changes function for the border crosing the table
$(document).on('click','#Production_shift_date',function(){
  $( "#ui-datepicker-div" ).css( "border","1px solid #dddddd" );
  $('#ui-datepicker-div').css("z-index","6000");
});

// then if you change the machine dropdown to enable the date input
$(document).on('change','#Production_MachineName',function(){
  clearInterval(live_graph);
  $('#machineOFFTotal').text("00");
  $('#UnnamedTotal').text("00");
  var machinename = $('#Production_MachineName').val();
    // alert(machinename);
    $('#chart').empty();
    $('.startTimeVal').css("display","none");
    $('.endTimeVal').css("display","none");
    $('#RejectShift').empty();
    $('#RejectShift').prop('selectedIndex',0);
    $('#Production_shift_date').prop('selectedIndex',0);
    $('.fixtabletitle').css("z-index",'100');
    $('.split_input').empty();
    $('.downtimeHeader').css("display","none");

    // filter option reset
    $('.filter').css('display','none');
    $('.bulk_edit_btn_case').css('display','none');

  if (machinename == "") {
    $('#Production_shift_date').attr('readonly',true); 
  }else{
    
    $('#Production_shift_date').removeAttr('readonly');
    $('#Production_shift_date').removeAttr('disabled');
    $('#Production_shift_date').val('');
    $('#RejectShift').attr("disabled",true);
    $('#RejectShift').attr("readonly",true);
    

    $.ajax({
      url:"<?php echo base_url('PDM_controller/getMachineDate'); ?>",
      method:"post",
      data:{
        machine:machinename,
      },
      async:false,
      cache: false,
      dataType:"json",
      success:function(date_shift){
          // enable days function
          enableDays = [];
          date_shift.forEach(item=>{
            enableDays.push(item.shift_date);
          });

          $( ".datepicker" ).datepicker( "option", "minDate", null)

          var t = new Date(date_shift[0].last_updated_on);
          var date_s = t.getFullYear()+"-"+("0" + (parseInt(t.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + t.getDate()).slice(-2);

          $(".datepicker").datepicker({
            beforeShowDay: function(dt) {
              var datestring = $.datepicker.formatDate('yy-mm-dd', dt);
              if($.inArray(datestring, enableDays) != -1) {
                return [true];
              }
              else{
                return [true];
              }
            },
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            minDate: date_s,
            maxDate: new Date(),
          });
          $(".datepicker").datepicker("option", "minDate", date_s);
          $('.ui-datepicker').css("display","none");
      },
      error:function(err){
        // alert("Error while processing Machine active dates");
      }
    });
    
  }
  machine_Name = $('option:selected',this).attr("mname");
});

// then if you choose production_shift_date then retirve the particular day shifts
$(document).on('change','#Production_shift_date',function(){
    $('#machineOFFTotal').text("00");
    $('#UnnamedTotal').text("00");
    var production_machine_name = $('#Production_MachineName').val();
    var production_shift_date = $('#Production_shift_date').val();
    // $('#RejectShift').empty();
    
    $('#chart').empty();
    $('#RejectShift').empty();
    $('.startTimeVal').css("display","none");
    $('.endTimeVal').css("display","none");
    // $('#RejectShift').prop('selectedIndex',0);
    $('.split_input').empty();
    $('.downtimeHeader').css("display","none");

    // filter option display 
    $('.filter').css('display','none');
    $('.bulk_edit_btn_case').css('display','none');


    var formattedDate = new Date(production_shift_date);
    var d = formattedDate.getDate();
    var m =  formattedDate.getMonth();
    m += 1;  
    var y = formattedDate.getFullYear();
    production_shift_date = y+"-"+(m > 9 ? m: "0" + m)+"-"+(d > 9 ? d: "0" + d)+" 23:59:59";
  $.ajax({
      url:"<?php echo base_url('PDM_controller/production_shift_retrive'); ?>",
      method:"post",
      data:{production_machine_name:production_machine_name,
        production_shift_date:production_shift_date
      },
      dataType:"json",
      success:function(production_shift){
        var machinename = $('#Production_MachineName').val();
        var elements = $();
        $('#RejectShift').empty();
        $('#RejectShift').append('<option value="" selected="true" disabled>Select</option>');
        production_shift['shift'].forEach(function(item){
          var c_date = new Date(y+"-"+(m > 9 ? m: "0" + m)+"-"+(d > 9 ? d: "0" + d)+" "+item.start_time);
          if (new Date() > c_date) {
            var temp = item.shifts.split("");
            elements = elements.add('<option value="'+item.shifts+'">Shift '+temp[0]+'</option>');
          }
        });
        $('#RejectShift').append(elements);
        $("#RejectShift").removeAttr("readonly");
        $('#RejectShift').removeAttr('disabled');
      },
      error:function(err){
        // alert("Something went wrong!");
      }
  });
    //To find the current part in Machine...................
  findPart(production_shift_date);
 
});

function findPart(production_shift_date){
  $.ajax({
    url:"<?php echo base_url('PDM_controller/findPartTool'); ?>",
    method:"post",
    data:{
      production_shift_date:production_shift_date
    },
    dataType:"json",
    success:function(production_shift){
      part_name_tooltip =[];
      production_shift.forEach(function(item){
        var tmp = {
          "time":item.event_start_time,
          "part_id":item.part_id,
          "part_name":item.part_name,
        };
        part_name_tooltip.push(tmp);
      });
     
    },
    error:function(err){
      // alert("Something went wrong!");
    }
  });
}



function getTotalCount() {
  var machine_name = $('#Production_MachineName').val();
  var shift_date_1 = $('#Production_shift_date').val();

  var dateShift = new Date(shift_date_1);
    shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

  var shift = $('#RejectShift').val();
  var s = shift.split("");
  shift = s[0];
  $.ajax({
    url:"<?php echo base_url('PDM_controller/findTotalCount'); ?>",
    method:"post",
    data:{
      machineId:machine_name,
      shift_date:shift_date,
      shift:shift,
    },
    dataType:"json",
    success:function(production_shift){
      machineoff = (production_shift['machineoff'] > 9 ? production_shift['machineoff']: "0" + production_shift['machineoff']);
      unnamed = (production_shift['unnamed'] > 9 ? production_shift['unnamed']: "0" + production_shift['unnamed']);
      $('#machineOFFTotal').text(machineoff);
      $('#UnnamedTotal').text(unnamed);
      return;
    },
    error:function(err){
      // alert("Couldn't find the total count!");
    }
  });
}

$(document).on('change','#RejectShift',function(){
  var machine_name = $('#Production_MachineName').val();
  var shift_date_1 = $('#Production_shift_date').val();

  $('#machineOFFTotal').text("00");
  $('#UnnamedTotal').text("00");

  var dateShift = new Date(shift_date_1);
    shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

  // Line hiding for checking..
  // var tmp = shift_date_1.split("/");
  // var shift_date = ""+tmp[2]+"-"+tmp[0]+"-"+tmp[1]+"";
  
  $('.startTimeVal').css("display","block");
  $('.endTimeVal').css("display","block");

  var shift = $('#RejectShift').val();
  var s = shift.split("");
  shift = s[0];
  // alert(machine_name+" "+shift_date+" "+shift);
  if(machine_name !="select" && shift_date !="" && shift !="select"){
    $('.split_input').empty();
    getDownTimeGraph();
    getTotalCount();
    $('.filter').css('display','inline');

    
    // reset the bulg edit inputs and button
    $('#start_time_from').val('');
    $('#start_time_till').val('');
    // $('#bulg_drp_category').val('');

    $('#bulgedit_downtime_reason_drp').val('');
    // $('.filterbtnstyle').css("color","white");
    // $('.filterbtnstyle').css("background-color","grey");
    // $('.filterbtnstyle').css("opacity","0.7");

    // bulg edit update inputs reset
    // $('#bulg_edit_category_drp').val('');
    $('#bulg_edit_drp').val('');
    reset_category();
    $('#text_category_drp').text('All Categories');
    $('#text_reason').text('All Reasons');
    $('.bulk_edit_btn_case').css('display','none');
    
    var category_tmp = null;
    downtime_reason_filter(category_tmp);
    target_input_function_handle("remove",0);

    // $('.category_drp_checkbox').attr('checked',true);

  }
  
});

var indexRef="";
var refValSPlit="";
var svalue="";
$(document).on("click", ".delete-split", function(){
    indexRef = $('.delete-split').index(this);
    // $(this).closest('.rowData').remove();
    refValSPlit = $(this).attr("splitRef");
    // var machine_event_id = ref;
    svalue = document.getElementsByClassName('sval')[indexRef].value;
    $('#DeleteSPlit').modal('show');
});

$(document).on("click", ".deleteRec", function(){
      $('#DeleteSPlit').modal('hide');
      $("#overlay").fadeIn(300);
        var startTime = "";
        var endTime="";
        var duration="";
        // Remove the current deleted row........
        $('.rowData:eq('+indexRef+')').remove();
        if (indexRef == 1) {
          var tmp = ((data_array[0]).toString()).split(".");
          var tmpVal = parseInt(tmp[0])+parseInt(data_array[1]);
          data_array[0] = tmpVal+"."+("0" + (tmp[1])).slice(-2);
          duration = data_array[0];
        }
        else{
          data_array[indexRef-1] = parseInt(data_array[indexRef-1])+parseInt(data_array[indexRef]);
          duration = data_array[indexRef-1];
        }
        data_array.splice(indexRef, indexRef);
        //alert(data_array);
        if(indexRef == data_array.length){
          var x = data_time[parseInt(2*indexRef)+parseInt(1)];
          data_time.splice(2*indexRef,2);
          data_time[(2*indexRef)-1] = x;
          startTime = data_time[(2*indexRef)-2];
          endTime = data_time[(2*indexRef)-1];
        }else{
          var x = data_time[parseInt(2*indexRef)+parseInt(1)];
          data_time.splice(2*indexRef,2);
          data_time[(2*indexRef)-1] = x;
          startTime = data_time[(2*indexRef)-2];
          endTime = data_time[(2*indexRef)-1];
        }

        l = data_array.length;
        
        for (var i = 0; i<l; i++) {
          var z = data_time[parseInt(parseInt(2*i)+parseInt(1))];
          var y = data_time[parseInt(2*i)];
          $('.startTime:eq('+i+')').text(y);
          $('.endTime:eq('+i+')').text(z);
          $('.ReasonDuration:eq('+i+')').text(data_array[i]);
          $('.sval:eq('+i+')').val(data_array[i]);
        }
      // alert("Start ="+startTime+"Duration ="+duration+" End ="+endTime);
      // alert(refValSPlit);
      const tmp_arr = [machineEventIdRef,endTime,duration,refValSPlit,startTime];    
      // Update after Delete......
      $.ajax({
        url: "<?php echo base_url('PDM_controller/deleteSPlit'); ?>",
        type: "POST", 
        dataType: "json",
        data:{
          ref:machineEventIdRef,
          End_time:endTime,
          duration:duration,
          SplitRef:refValSPlit,
          // Split_Ref:split_ref,
          Start_time:startTime,
        },
        success:function(res){
          // alert("Record removed!!");
          getSplittedData(machineEventIdRef,overall_duration_value);
          getDownTimeGraph();
          getTotalCount();
          $('.select_item').css('display','none');
          $("#overlay").fadeOut(300);
        
        },
        error:function(err){
          // alert("Something went wrong!!");
          getSplittedData(machineEventIdRef,overall_duration_value);
          getDownTimeGraph();
          getTotalCount();
          $('.select_item').css('display','none');
          $("#overlay").fadeOut(300);
        
        }    
      });      
});

/* temporary hide this code for notes save 
    var IndexNotes = 0;
    $(document).on("click", ".addNotesReason", function(){
      var index = $('.addNotesReason').index(this);
      IndexNotes = index;
      var l=data_notes.length;    
      //Show Model..........
      $('#EditSPlit').modal('show');
      $('.NotesValue').val(data_notes[index]);
    
    });
    //Model save click event........
    $(document).on("click",".saveNotes",function(){
        var x = $('.NotesValue').val();
        data_notes[IndexNotes] = x;
    });
*/
    $('#EditSPlit').on('hidden.bs.modal', function () {
      $('.NotesValue').val("");
    });
    $(document).on("click", ".addNotes", function(){
      $('.splitclick').click(false);
      if ($(this).parent().siblings('div').children('.inEdit').css('display').toLowerCase() == 'none') {
        $(this).parent().siblings('div').children('.inEdit').css('display','block');
        $(this).parent().siblings('div').children('.paraEdit').css('display','none');
        
        $(this).css("display","none");
        $(this).siblings('.reasonInfo').css("display","none");
        $(this).siblings('.delete-split').css("display","none");
        $(this).siblings('.splitclick').css("display","none");
        $(this).siblings('.doneEdit').css("display","block");
        // $(this).siblings('.addNotesReason').css("display","block");
        //$('.paraEdit').css("display","none");
      }
      else{
        $(this).parent().siblings('div').children('.inEdit').css('display','none');
        $(this).parent().siblings('div').children('.paraEdit').css('display','block');
      }

      current_data.category=$(this).parent().siblings('div').children('.DownCategoryValue').val();
      current_data.reason = $(this).parent().siblings('div').children('.DownReasonValue').val();
      current_data.tool = $(this).parent().siblings('div').children('.DownTool').val();
      current_data.part = $(this).parent().siblings('div').children('.DownPart').val();
      
      


    $(document).on("change", ".DownCategoryValue", function(){
      var val = this.value;
      var count = $('.DownCategoryValue');
      var index_value = count.index($(this));
      var elements = $();
      var id = 0;
      $('.DownReason:eq('+index_value+')').empty();
      target_input_function_handle("remove",0);
      // console.log(down_reason_collection);
      down_reason_collection.forEach(function(item){
        if (val == item[1]) {
          id = item[0]; 
          elements = elements.add('<option value='+item[0]+' dvalue='+item[0]+' selected="true">'+item[2]+'</option>');
        }
      });
      $('.DownReason:eq('+index_value+')').append(elements);
      $(this).siblings('.ReasonCategory').text(val);

      down_reason_collection.forEach(function(item){
        if(item[0] == id)
        {
          c = item[2].toLowerCase().trim().replace(" ","","g");
          if (c == "toolchangeover") {
            $('.edit_input3:eq('+index_value+')').css("display","inline");
            $('.edit_input4:eq('+index_value+')').css("display","inline");
            $('.edit_display3:eq('+index_value+')').css("display","none");
            $('.edit_display4:eq('+index_value+')').css("display","none");
            // document.getElementsByClassName('edit_input3')[index_value].style.display="inline";
            // document.getElementsByClassName('edit_input4')[index_value].style.display="inline";
            // document.getElementsByClassName('edit_display3')[index_value].style.display="none";
            // document.getElementsByClassName('edit_display4')[index_value].style.display="none";
          } 
          else{
            $('.edit_input3:eq('+index_value+')').css("display","none");
            $('.edit_input4:eq('+index_value+')').css("display","none");
            $('.edit_display3:eq('+index_value+')').css("display","inline");
            $('.edit_display4:eq('+index_value+')').css("display","inline");
            // document.getElementsByClassName('edit_input3')[index_value].style.display="none";
            // document.getElementsByClassName('edit_input4')[index_value].style.display="none";
            // document.getElementsByClassName('edit_display3')[index_value].style.display="inline";
            // document.getElementsByClassName('edit_display4')[index_value].style.display="inline";
          }
        }
      });  
    });

    $(document).on("change", ".DownReasonValue", function(){
      var val = this.value;
      var count = $('.DownReasonValue');
      var index_value = count.index($(this));
      for (var i = 1 ; i <= down_reason.length; i++) {
        if (i == val) {
          $(this).siblings('.ReasonName').text(down_reason[i-1]);
        }
      }
      if (val==2 || val==3) {

        $('.edit_input3:eq('+index_value+')').css("display","inline");
        $('.edit_input4:eq('+index_value+')').css("display","inline");
        $('.edit_display3:eq('+index_value+')').css("display","none");
        $('.edit_display4:eq('+index_value+')').css("display","none");
        // target 
        target_input_function_handle("add",index_value);
      
        // document.getElementsByClassName('edit_input3')[index_value].style.display="inline";
        // document.getElementsByClassName('edit_input4')[index_value].style.display="inline";
        // document.getElementsByClassName('edit_display3')[index_value].style.display="none";
        // document.getElementsByClassName('edit_display4')[index_value].style.display="none";
      }
      else{

        $('.edit_input3:eq('+index_value+')').css("display","none");
        $('.edit_input4:eq('+index_value+')').css("display","none");
        $('.edit_display3:eq('+index_value+')').css("display","inline");
        $('.edit_display4:eq('+index_value+')').css("display","inline");

        // target display none
        target_input_function_handle("remove",0);
        
        // document.getElementsByClassName('edit_input3')[index_value].style.display="none";
        // document.getElementsByClassName('edit_input4')[index_value].style.display="none";
        // document.getElementsByClassName('edit_display3')[index_value].style.display="inline";
        // document.getElementsByClassName('edit_display4')[index_value].style.display="inline";
      } 
    });
    $(document).on("change", ".DownTool", function(){
      var index = this.value;
      var count = $('.DownTool');
      var index_value = count.index($(this));
      var elements = $();
      $('.checkboxes:eq('+index_value+')').empty();
      part_collection.forEach(function(item){
        // console.log("indexing part :\t"+index);
        // console.log("parts collection");
        // console.log(part_collection);
        if (index == item[2]) {
          elements = elements.add('<div class="option_multi"><div class="multi-check "><input type="checkbox" id="one" value="'+item[0]+'" name="multi_part[]" class="checkboxIn" checked="true"></div><div class="multi-lable check_dis "><span>'+item[1]+'-'+item[0]+'</span></div></div>');

          // elements = elements.add('<option class="DownPartVal" pval="'+item[1]+'.'+item[0]+'" tvalue="'+item[2]+'" value="'+item[0]+'">'+item[1]+' -'+item[0]+'</option>');
        }
      });
      $('.checkboxes:eq('+index_value+')').append(elements);
      $('.display_parts:eq('+index_value+')').html(' Selected');
     
      // check_count = 0;
      // $('.check_dis:eq(0)').html(' ');
      // for (var i = 1; i <= down_tool.length; i++) {
      //   var x = document.getElementsByClassName('DownToolVal')[i].getAttribute("tvalue");
      //   var y = x.split("."); 
      //   if (y[1] == index) {
      //     $(this).siblings('.ToolName').text(down_tool[i]);
      //   }
      // } 
    });

    $(document).on("change", ".checkboxes", function(){
      // var val = this.value;
      var count = $('.checkboxes');
      var index = count.index($(this));
      var m =0;
      var part_arr = new Array();
      var part_arr = [];
      $.each($('.checkboxes:eq('+index+') input:checked'), function(){ 
        if($(this).is(':checked')){
          part_arr.push($(this).val());
        }           
      });
      
      $('.display_parts:eq('+index+')').html(part_arr.length+' Selected');
      
      $('.PartNameValue:eq('+index+')').text(part_arr.toString());

      // console.log(part_arr);
     

        
      // for (var i = 0; i < (down_part.length)/2; i++) {
      //   var x = document.getElementsByClassName('checkboxes')[m].getAttribute("pval");
      //   var y = x.split("."); 
      //   if (y[1] == val) {
      //     $(this).siblings('.PartNameValue').text(down_part[(2*i)+1]);
      //   }
      //   m=m+1;
      // }
    });

    });
    /* temporary hide for this function for strategy
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
    */

    // var cal_count = 0;
   function drawGraph(start,svalue,end,machineEventRef,notes,reason=null,part=null,tool=null,splitId,last_updated_by,last_updated_on){
    toolName = tool;
    partName = part;
    for (var i = 0; i < (down_tool.length)/2; i=i+1) {
      if (tool == down_tool[2*i]) {
        toolName = down_tool[(2*i)+1];
        break;
      }
    }

    // temp hide for this function for tool chnage over table updation
    // for (var i = 0; i < (down_part.length)/2; i=i+1) {
    //   if (part == down_part[2*i]) {
    //     partName = down_part[(2*i)+1];
    //     break;
    //   }
    // }
    partName  = getpartnames_graph(part);


    val_second=svalue;

    var splitTmp = (""+svalue).split(".");

    if (splitTmp.length > 1)
    {
      split_second = splitTmp[1];
      val_second = splitTmp[0];
    }

    if (notes) {
      var notes_mapped = "notes.png";
    }
    else{
      var notes_mapped = "notes.png";
    }
    
    // var last_updated_name = getlast_updated_name(last_updated_by);
   var cal_count = 1;
    $( ".split_input" ).append('<div id="settings_div" class="rowData">'
            +'<div class="row paddingm">'
                +'<div class="" style="width:3%;display:flex;padding:0;"><input type="checkbox" style="height:1rem;width:1rem;margin:auto;" class="select_item"></div>'
                +'<div class="col-sm-1 col marleft" style="width:8.6%;"><p class="startTime">'+start+'</p></div>'
                +'<div class="col-sm-1 col marleft" style="width:8%;">'
                    +'<input type="number" value="'+val_second+'" class="form-control inEdit form-control-md sval edit_input" id="val_g" required="true" name="val_g[]">'
                    +'<p class="paraEdit ReasonDuration edit_display" id="ReasonDuration">'+svalue+'</p>'
                +'</div>'        
                +'<div class="col-sm-1 col marleft" style="width:8.5%;">'
                    +'<p class="endTime">'+end+'</p>'
                +'</div>'
                +'<div class="col-sm-1 col marleft" style="width:8.4%;">'
                    +'<select class="form-select inEdit marginlr DownCategoryValue edit_input1 font-size">'
                      // +'<option value="planned">Planned</option>'
                      // +'<option value="unplanned" selected>Unplanned</option>'
                    +'</select>'
                    +'<p class="paraEdit ReasonCategory edit_display1" id="ReasonCategory">Unplanned</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft DownReasonDiv" style="width:15%;">'
                  +'<select class="form-select inEdit marginlr DownReason DownReasonValue edit_input2 font-size">'
                      // +'<option>Tool Changeover</option>'
                      // +'<option>Break Down</option>'
                  +'</select>'
                  +'<p class="paraEdit ReasonName edit_display2" id="ReasonName">'+reason+'</p>'
                +'</div>'
                // Target value input
                +'<div class="col-sm-2 col marleft Downtime_target" style="width:10%;display:none;padding:0.3rem;">'
                  +'<div style="display:flex;flex-direction:row;align-items:center;justify-content:center;height:100%;">'
                    +'<input type="text" class="form-control target_input_cl" id="target_input" style="width:100%;height:2rem;" value="0">'
                  +'</div>'
                +'</div>'
                +'<div class="col-sm-2 col marleft downtime_tool_name_div" style="width:14.8%;">'
                  +'<select class="form-select inEditValue marginlr DownTool edit_input3 font-size">'
                      // +'<option>Tool Name1</option>'
                      // +'<option>Tool Name2</option>'
                  +'</select>'
                  +'<p class="paraEditValue  edit_display3 ToolName">'+toolName+'</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft downtime_part_name_div" style="width:14.9%;">'

                  // +'<select class="form-select inEditValue marginlr DownPart edit_input4 font-size">'
                  //     // +'<option>Part Name1</option>'
                  //     // +'<option>Part Name2</option>'
                  // +'</select>'
                  
                  +'<div class="cust-drop edit_input4 marginlr inEditValue" >'
                    +'<div class="selectOpp" onclick="showCheckboxes(this)" id="">'
                      +'<select class="form-select onchange_select" >'
                          +'<option class="check_dis display_parts" >'+partName+'</option>'
                      +'</select>'
                      +'<div class="overSelect"></div>'
                    +'</div>'
                    +'<div class="checkboxes">'
                      //Options 1
                      // +'<div class="option">'
                      //   +'<div class="multi-check">'
                      //     +'<input type="checkbox" id="one" value="First" name="val" class="ch   eckboxIn" />'
                      //   +'</div>'
                      //   +'<div class="multi-lable">'
                      //     +'<span>First</span>'
                      //   +'</div>'
                      // +'</div>'
                      // // Option 2
                      // +'<div class="option">'
                      //   +'<div class="multi-check">'
                      //     +'<input type="checkbox" id="one" value="First" name="val" class="checkboxIn" />'
                      //   +'</div>'
                      //   +'<div class="multi-lable">'
                      //     +'<span>Second</span>'
                      //   +'</div>'
                      // +'</div>'
                    +'</div>'
                  +'</div>' 
                  
                  +'<p class="paraEditValue  PartNameValue edit_display4" title="'+partName+'" id_check="'+part+'">'+partName+'</p>'
                +'</div>'
                +'<div class="col-sm-2 col marleft ICONDiv action_div" style="width:18.6%;">'
                    +'<span class="doth optionLeft splitclick center-align clickdb dataUpdateVal nsplit filter_css" dvalue="'+end+'"  svalue="'+svalue+'" evalue="'+end+'" refVal="'+machineEventRef+'" splitRef="'+splitId+'" reason="'+reason+'" tool="'+tool+'" part="'+part+'"><img src="<?php echo base_url('assets/img/split.png'); ?>" class="icon_img_wh  ICON"></span>'
                    +'<span class="doth addNotes edit_visible npencil"><img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="icon_img_wh ICON "></span>'
                    // +'<span class="optionLeft doth addNotesReason dedit" value=""><img src="<?php echo base_url('assets/img/notes.png'); ?>" class="icon_img_wh ICON"></span>'
                    +'<span class="doth doneEdit dcheck" split="1" ><img src="<?php echo base_url('assets/img/tick.png'); ?>" class="icon_img_wh1 ICON" style="color:white;"></span>'
                    +'<span class="doth edit-split ninfo reasonInfo" onmouseover="check_info(this)" onmouseout="mouse_out_check(this)">'
                      +'<img src="<?php echo base_url()?>/assets/img/'+notes_mapped+'" class="icon_img_wh ICON info_click"  data_val="'+last_updated_by+'">'
                      +'<div class="edit-Subsplit" style="z-index:10;">'
                          +'<div style="display: flex;width: 100%;">'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft p1 pvalue">Last Updated by</p>'
                            +'</div>'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft pvalue"><span class="info_last_data">'+last_updated_by+'</span></p>'
                            +'</div>'
                          +'</div>'
                          +'<div style="display: flex;width: 100%;">'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft p1 pvalue">Last Updated on</p>'
                            +'</div>'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft pvalue"><b>'+getdate_time(last_updated_on)+'</b></p>'
                            +'</div>'
                          +'</div>'
                          +'<div style="display: flex;width: 100%;">'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<p class="marleft p1 pvalue">Notes</p>'
                            +'</div>'
                            +'<div style="width: 50%;float: left;height: 100%;">'
                              +'<div style="word-wrap: break-word;flex-wrap: wrap;display:flex;overflow: hidden;height: 4.5rem;width:10rem;">'
                                +'<p class="marleft pvalue" title="'+notes+'">'+notes+'</p>' 
                                +'</div>'
                            +'</div>'
                          +'</div>'
                      +'</div>'
                      +'<div class="note_edit" style="z-index:10;" >'
                        +'<div style="display:flex;width:100%;height:100%;">'
                          +'<div class="box" style="width:80%;padding:0.5rem;padding-top:1.6rem;">'
                            +'<div class="input-box fieldStyle" style="height:100%;">'
                              +'<textarea class="form-control NotesValue" id="NotesValue" rows="3" value="'+notes+'" style="border-radius:0.8rem;height:100%;resize:none;">'+notes+'</textarea>'
                              +'<label for="inputMachineName" class="input-padding">Notes</label>'
                            +'</div>'
                          +'</div>'
                          +'<div style="width:20%;display:flex;justify-content:center;padding-bottom:1rem;">'
                          +'<div style="display:flex;justify-content:center;align-items:flex-end;">'
                            +'<img  src="<?php echo base_url()?>/assets/img/tick.png" class="icon_img_wh ICON note_sub_cl" style="width:2.2rem;height:2.2rem;" onclick="notes_submit()">'
                          +'</div>'
                          +'</div>'
                        +'</div>'
                      +'</div>'
                    +'</span>'
                    +'<span class="doth delete-split ndelete" style="" refVal="'+machineEventRef+'" splitRef="'+splitId+'" svalue="'+svalue+'"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class="icon_img_wh1 ICON" ></span>'
                    // +'<span class="doth circleMatch circle_class" style="" id="disp'+cal_count+'"></span>'          
                +'</div>'
            +'</div>'
        +'</div>'); 
      return;
   }

    // Initialize the variables for check the first shift 

    var shiftFlag = 0;
    var shiftStartTime;

// Key Press
$(document).on('keypress','.sval',function(key){
  if(key.charCode < 48 || key.charCode > 57) {
    return false;
  }
});

//getDownTimeGraph();
function getDownTimeGraph(){
      var machine_id = $('#Production_MachineName').val();
      var shift_date_1 = $('#Production_shift_date').val();
      var shift = $('#RejectShift').val();
      var s = shift.split("");
      var dateShift = new Date(shift_date_1);
      shift_date = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));
      var url = "<?php echo base_url('PDM_controller/getDownGraph'); ?>";
      $.ajax({
           method: 'POST',
           url: url,
           dataType:'json',
           // async:false,
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
                $('#chart').empty();
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
                  if(model.duration >= 0){ 
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
                        down_notes.push(model.notes);
                        data_duration.push(model.start_time);
                        data_duration.push(model.end_time);

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
                    events:{
                      click:function(event, chartContext, config){
                        target_input_function_handle("remove",0);
                        var l_l = config.globals.series.length;

                        var production_shift_date = $('#Production_shift_date').val();
                        var formattedDate = new Date(production_shift_date);
                        var d = formattedDate.getDate();
                        var m =  formattedDate.getMonth();
                        m += 1;  
                        var y = formattedDate.getFullYear();
                        var c_date = new Date(y+"-"+(m > 9 ? m: "0" + m)+"-"+(d > 9 ? d: "0" + d)+" "+shift_stime);
                        if ((config.seriesIndex == (l_l-2)) && (new Date() >= c_date)) {
                          $('.split_input').empty();
                        }
                        else{
                          if (config.seriesIndex >= 0) {
                            $('.split_input').empty();
                            //function for find the split records
                            $("#overlay").fadeIn(300);
                            $('.split_input').empty();  
                            var access_control = <?php  echo $this->data['access'][0]['production_data_management']; ?>;
                            // alert(parseInt(access_control));
                            count_click = 0;
                            index_arr.length=0;
                            data_notes.length=0;
                            //Commented for checking...........
                            // DownReason();
                            // DownTool(); 
                            // DownPart();
                                    
                            //console.log(config);
                            var inval = config.seriesIndex;
                            var svalue = config.config.series[inval].data[config.dataPointIndex];
                            var sname = config.config.series[inval].name;
                            var start = config.config.series[inval].start;
                            var end = config.config.series[inval].end;
                            var machineEventRef = config.config.series[inval].machineEvent;
                            var machine_Name_Tooltip = config.config.series[inval].machine_Name;
                            var part_name_tooltip = config.config.series[inval].part_Name;
                            machineEventIdRef = config.config.series[inval].machineEvent;
                            var durationVal = config.config.series[inval].duration;
                            overall_duration_value = svalue;

                            if ((parseInt(durationVal) >= 0) && (parseInt(access_control)>1) ) {
                              $.ajax({
                                url: "<?php echo base_url('PDM_controller/findSplit'); ?>",
                                type: "POST",
                                dataType: "json",
                                data:{
                                  ref:machineEventRef, 
                                },
                                success:function(res){
                                  data_time=[];
                                  data_array=[];
                                  split_ref =[];
                                  data_notes = [];
                                  machineOFFTotal=0;
                                  UnnamedTotal=0;
                                  calendar_array = [];
                                  if (((res['value'].length > 0) && (sname == "Inactive")) || ((res['value'].length > 0) && (sname == "Machine OFF"))) {
                                    
                                    // bulk edit
                                    $('.filter').css("display","none");
                                    $('.bulk_edit_btn_case').css('display','inline');
                                    // dipslay none in bulg edit submission
                                    $('.bulg_edit_ui').css("display","none");
                                    // bulg edit submission input value reset
                                    $('#bulg_edit_drp').val('');
                                    $('#bulg_edit_category_drp').val('');

                                    var z = 0;
                                    res['value'].forEach(function(item){
                                      calendar_array.push(item.calendar_date);
                                      var notes = item.notes;
                                      var downReason = item.downtime_reason_id;
                                      // if ((sname != "Active")||(sname != "No Data")&&(item.split_duration >=1) ) {

                                      // if ((sname == "Inactive")) {
                                        $('.downtimeHeader').css("display","block");
                                        shiftStartTime = start ;

                                        data_time.push(item.start_time);
                                        data_time.push(item.end_time);
                                        data_array.push(item.split_duration);
                                        split_ref.push(item.split_id);
                                        data_notes.push(item.notes);
                                        
                                        var reason = findDownReason(item.downtime_reason_id);
                                        //Draw Graph
                                        partid = item.part_id;
                                        toolid = item.tool_id;
                                        downtime_reason_id = item.downtime_reason_id;
                                        // console.log("tool id:\t"+toolid);
                                        //var last_updated_by = res[]
                                      
                                        // alert(downtime_reason_id);
                                        drawGraph(item.start_time,item.split_duration,item.end_time,item.machine_event_id,item.notes,reason,partid,toolid,item.split_id,item.last_updated_by,item.last_updated_on);
                                        console.log("downtime graph clicking 11...");
                                        $(".delete-split:eq(0)").css("display","none");
                                        $(".circleMatch:eq(0)").css("display","block");
                                      
                                        machineEventIdRef = item.machine_event_id ;
                                        overall_value = svalue;
                                      // }
                                      // else {
                                      //   $('.downtimeHeader').css("display","none");
                                      // }

                                      $('.select_item').css('display','none');

                                      //function for retrive data......
                                      DownReasonUpdate(z,reason,downtime_reason_id);
                                      DownToolUpdate(z,toolid);
                                      DownPartUpdate(z,partid,toolid);
                                      z=parseInt(z)+1;
                                      
                                    });

                                  }
                                  else {
                                        $('.downtimeHeader').css("display","none");
                                  }
                                },
                                error:function(res){
                                    // alert("Sorry!Try Agian!!");
                                }
                              });
                            }
                            
                            $("#overlay").fadeOut(300);
                          }
                        }
                      } 
                    }
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
                      // console.log("part id");
                      // console.log(part_id);
                      var machine_Name_Tooltip = w.globals.initialSeries[seriesIndex].machine_Name;
                      var part_name_tooltip = w.globals.initialSeries[seriesIndex].part_Name;
                      // alert(part_id);
                      //var machineEventRef = w.globals.initialSeries[seriesIndex].machineEvent;
                      // alert(part_name_tooltip);
                      
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
                    //offsetX: 10,
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

              var chart = new ApexCharts(document.querySelector("#chart"), options);
              chart.render();
              // $('.filter').css("display","none");
              // dipslay none in bulg edit submission
              $('.bulg_edit_ui').css("display","none");
              // bulg edit submission input value reset
              $('#bulg_edit_drp').val('');
              $('#bulg_edit_category_drp').val('');
              // var tmp_val = null;
              // downtime_reason_filter(tmp_val);

              // alert(data_duration);
              // DownReason();
              // DownTool();
              // DownPart();
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

  var tmpArr = [];
  tmpArr=[];
  tmpArrEnd=[];
  $(document).on('click','.splitclick',function(){
    $("#overlay").fadeIn(300);
    //Total record(row) count....
    var count = $('.splitclick');
    //Index value of splitted row.....
    var index1 = count.index($(this));
    //Duration value of the clicked row.....
    var svalue = document.getElementsByClassName('sval')[index1].value;
    //Split id for clicked row...... 
    var splitRef = $(this).attr("splitRef");
    //Machine Event Id Reference for splitted row......
    var refVal = $(this).attr("refVal");

    //End value of the Total event(parent)....
    var dvalue = $(this).attr("dvalue");
    //End value of the Total event....
    var evalue = $(this).attr("evalue");
    //Reason Id...
    var reason = $(this).attr("reason");
    //Tool Id....
    var tool = $(this).attr("tool");
    //Part Id...
    var part = $(this).attr("part");

    //Temporary value for is_split occured.......
    var tempSplit = 0;
    var calendar_date="";
    var calendar_date_array = [];
    // console.log(svalue);
    if (svalue === "") {
      alert('please select the value');
    }
    else{
      //check the current splitted duration is greater than 1, because minimum 2 is required for split.....
      if (parseInt(svalue)>=2) {
        //Array for store splitted Data.....
        var splitData = [];
        //Make Splite....
        var split_value = parseInt(svalue) / 2;      
        var smal_val = parseInt(split_value);
        var mathv = Math.ceil(parseInt(svalue) / 2);
        //progress for graph data updation
        //Update the value in data_array(global variable)....
        if (index1 == 0) {
          var fistSec = ((data_array[0]).toString()).split(".");
          data_array[index1] = (mathv+"."+("0" + (fistSec[1])).slice(-2));
        }
        else{
          data_array[index1] = mathv;
        }
        //Variable for split data passing
        splitData[0] = data_array[0];
        splitData[1] = smal_val;

        data_array.splice([index1 + 1],0,smal_val);
        document.getElementsByClassName('sval')[index1].value = mathv;

        //length of the data_array array....
        var l = data_array.length;
        //start value of the array.....
        var stime = data_time[0];

        data_time=[];
        //Calculation for seconds data.....
        s_date = new Date(calendar_array[0]+" "+stime);  

        datetext = s_date.toTimeString();
        stime = datetext.split(' ')[0];
        calendar_date = s_date.getFullYear()+"-"+("0" + (parseInt(s_date.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + s_date.getDate()).slice(-2);
        //convert the values to seconds.....
        var firstSecond = ((data_array[0]).toString()).split(".");
        for(let i=0;i<l;i++){
          calendar_date = s_date.getFullYear()+"-"+("0" + (parseInt(s_date.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + s_date.getDate()).slice(-2);
          calendar_date_array.push(calendar_date);

          datetext = s_date.toTimeString();
          stime = datetext.split(' ')[0];
          data_time.push(stime);

          if (i==0) {
            s_date.setSeconds(s_date.getSeconds()+parseInt(parseInt(firstSecond[0])*60)+parseInt(firstSecond[1]));
          }
          else{
            s_date.setSeconds(s_date.getSeconds()+parseInt(data_array[i]*60));
          }

          if (i == (parseInt(l)-1)) {
            // First record seconds ..........
            firstSecond[1] = 0;
          }
          if (i==0) {
            var tm = data_array[0].split(".");
            data_array[0] = tm[0]+"."+(("0" + (firstSecond[1])).slice(-2));
          }

          datetext = s_date.toTimeString();
          var endTime = datetext.split(' ')[0];
          data_time.push(endTime);
          stime = endTime;
        }
    }
    else{
      alert("Minimum Split Reached!");
      document.body.classList.remove('demo_class');
      $("#overlay").fadeOut(300);
      tempSplit =1;
    }
    }
    // console.log(calendar_date_array);
  if (tempSplit != 1) {
    //Alternate calculation for splitDataPass........
    var splitDataPass = [];
    var indxVal = index1;
    var indxData = index1;
        splitDataPass.push(data_time[parseInt(parseInt(indxVal)*2)]);
        splitDataPass.push(data_time[parseInt(parseInt(indxVal)*2)+parseInt(1)]);
        splitDataPass.push(data_array[indxData]);
        splitDataPass.push(data_time[parseInt(parseInt(indxVal)*2)+parseInt(2)]);
        splitDataPass.push(data_time[parseInt(parseInt(indxVal)*2)+parseInt(3)]);
        indxData=indxData+1;
        splitDataPass.push(data_array[indxData]);
        calendar_date =  calendar_date_array[indxData];

    // Insert the start time of each split record
      $('.split_input').empty();
      var TmpIndex=0;
      for (let i = 0; i < l; i++) {
        //Draw Graph required values.....
        //drawGraph(start,svalue,end,machineEventRef,notes,reason=null,part=null,tool=null,splitRef);
        drawGraph(data_time[TmpIndex],data_array[i],data_time[parseInt(TmpIndex)+1],machineEventIdRef,down_notes[i],reason,part,tool,i);
        
        $(".delete-split:eq(0)").css("display","none");
        $(".circleMatch:eq(0)").css("display","block");
        TmpIndex = parseInt(TmpIndex)+2;
      }
    
    
    var eventRefVal = $(this).attr('refVal');
    // Ajax function for store splitted value in database
    var shift_date_split = document.getElementById('Production_shift_date').value;
    var shift_id_split = document.getElementById('RejectShift').value;
    
    //Function for date conversion
    var dateShift = new Date(shift_date_split);
    shift_date_split = dateShift.getFullYear()+'-'+((dateShift.getMonth() > 8) ? (dateShift.getMonth() + 1) : ('0' + (dateShift.getMonth() + 1))) + '-' + ((dateShift.getDate() > 9) ? dateShift.getDate() : ('0' + dateShift.getDate()));

    var s = shift_id_split.split("");
    $.ajax({
      url: "<?php echo base_url('PDM_controller/splitDownGraph'); ?>",
      type: "POST",
      dataType: "json",
      data:{
          shift_id:s[0],
          shift_date:shift_date_split,
          Data:splitDataPass,
          SplitRef:splitRef,
          Ref:eventRefVal,
          Calendar_Date:calendar_date,
      },
      success:function(res_Site){ 
        if (res_Site == true) {
          data_time=[];
          data_array=[];
          split_ref =[];
          down_notes =[]; 
          getSplittedData(machineEventIdRef,overall_duration_value);
          getDownTimeGraph();
          getTotalCount();
        }
        else{
          data_time=[];
          data_array=[];
          split_ref =[];  
          down_notes = [];
          getSplittedData(machineEventIdRef,overall_duration_value);
          getDownTimeGraph();
          getTotalCount();
        }
        $('.select_item').css('display','none');
        $('.filter').css('display','none');
        $('.bulk_edit_btn_case').css('display','inline');
       
      document.body.classList.remove('demo_class');
      $("#overlay").fadeOut(300);
      },
      error:function(res){
      }
    });
    tmpArr = [];
  }

});


function getSplittedData(machineEventRef,svalue){
  $('.split_input').empty();
  calendar_array=[];
  $.ajax({
    url: "<?php echo base_url('PDM_controller/findSplit'); ?>",
    type: "POST",
    dataType: "json",
    async:false,
    data:{
      ref:machineEventRef,
    },
    success:function(res){
      $('.split_input').empty();
      data_time=[];
      data_array=[];
      split_ref =[];  
      down_notes =[]; 
      data_notes = [];

          if (res['value'].length > 0) {
            var z = 0;
            res['value'].forEach(function(item){
              calendar_array.push(item.calendar_date);
              var notes = item.notes;
              var downReason = item.downtime_reason_id;
              if ((item.event != "Active")&&(item.event != "No Data")&&(item.split_duration >=1) ) {
                $('.downtimeHeader').css("display","block");
                // shiftStartTime = start ;

                data_time.push(item.start_time);
                data_time.push(item.end_time);
                data_array.push(item.split_duration);
                split_ref.push(item.split_id);
                setNotes(item.notes);

                var reason = findDownReason(item.downtime_reason_id);
                //Draw Graph
                partid = item.part_id;
                toolid = item.tool_id;

                drawGraph(item.start_time,item.split_duration,item.end_time,item.machine_event_id,item.notes,reason,partid,toolid,item.split_id,item.last_updated_by,item.last_updated_on);

                $(".delete-split:eq(0)").css("display","none");
                $(".circleMatch:eq(0)").css("display","block");
                
                machineEventIdRef = item.machine_event_id ;

                overall_value = svalue;
              }
              else {
                $('.downtimeHeader').css("display","none");
              }
              //function for retrive data......
              DownReasonUpdate(z,reason,downReason);
              DownToolUpdate(z,toolid);
              DownPartUpdate(z,partid,toolid);
              z=parseInt(z)+1;
            });
          }
    },
    error:function(res){  
      // alert(res);
    }
  });
}

function setNotes(notes){
  down_notes.push(notes);
  data_notes.push(notes);
}


$(document).on('click','.doneEdit',function(){
    //Reset the visibility of the input tag and paragraph tag......
    $('.splitclick').click(true);
    $("#overlay").fadeIn(300);
    count_click = 0;
    index_arr.length=0;

    var count = $('.doneEdit');
    var index = count.index($(this));

    var dataArray = [];
    var updatedArray=[];
    var input = $( this );
    var isplit = input.attr("split");
    var splitRef = $(this).siblings('.splitclick').attr('splitRef');
    var machineEventRef = $(this).siblings('.splitclick').attr('refVal');

    //functional flow for insert......
    var myObj =[];
    for (var i = 0; i <= (data_array.length-1); i++) {
      myObj= {"start_time": data_time[2*i], "split_duration": data_array[i],"end_time":data_time[(2*i)+1],"machine_id":machineEventRef,"split_id":i};

      // updatedArray.push("start_time= "+data_time[2*i]+" split_duration "+data_array[i]+" end_time= "+data_time[(2*i)+1]+" Id="+machineEventRef+" Split_id="+i);
    }

    // $(this).parent().siblings('div').children('.inEdit').css('display','none');
    // $(this).parent().siblings('div').children('.inEditValue').css('display','none');
      
    // $(this).parent().siblings('div').children('.paraEdit').css('display','block');
    // $(this).parent().siblings('div').children('.paraEditValue').css('display','block');

    $(this).siblings('.addNotes').css("display","block");
    $(this).siblings('.reasonInfo').css("display","block");
    $(this).siblings('.delete-split').css("display","block");
    $(this).siblings('.splitclick').css("display","block");
    $(this).css("display","none");
    // $(this).siblings('.addNotesReason').css("display","none");
    $(".delete-split:eq(0)").css("display","none");
    $(".delete-split:eq(0)").css("visibility","hidden");

      // var duration = input.siblings('.dataUpdateVal').attr("svalue");
      // var start = input.siblings('.dataUpdateVal').attr("dvalue"); 
      // var end = input.siblings('.dataUpdateVal').attr("evalue");
      var category = document.getElementsByClassName('DownCategoryValue')[index].value;
      var reason = document.getElementsByClassName('DownReasonValue')[index].value;
      var toolname = document.getElementsByClassName('DownTool')[index].value;
      var target = document.getElementsByClassName('target_input_cl')[index].value;
      console.log(target);
      console.log("top target input");
      // var partname = document.getElementsByClassName('DownPart')[index].value;

      // one tool multi part
      var part_arr = new Array();
      var part_arr = [];
        $.each($('.checkboxes:eq('+index+') input:checked'), function(){ 
          if($(this).is(':checked')){
            part_arr.push($(this).val());
          }           
           
        });

    // notes = data_notes[index];
    if(parseInt(part_arr.length) === 0){
      part_arr = "empty";
    }
    dataArray.push(category,reason,toolname,part_arr,machineEventRef,splitRef,machineID_ref,shift_date_ref,shift_Ref);

    // console.log("data Array");
    // console.log(dataArray);
    // console.log(machineEventRef);
    // console.log(splitRef);
    // console.log(data_time);
    // console.log(data_array);
    // console.log(split_ref);
    // console.log(calendar_array);

    // Ajax function for update particular splitted value in database
    
    $.ajax({
      url: "<?php echo base_url('PDM_controller/updateDownGraph'); ?>",
      type: "POST",
      dataType: "json",
      data:{
          MachineRef:machineEventRef,
          SplitRef:splitRef,
          TimeArray:data_time,
          DurationArray:data_array,
          Data:dataArray,
          split_arr:split_ref,
          date_array:calendar_array,
          target:target,
      },
      success:function(res_Site){
        // console.log(res_Site);
        if (res_Site) {
          alert("Updated Successfully!!");
        } 
        else{
          // alert("Something went wrong!");
        }
        data_time=[];
        data_array=[];
        split_ref =[];     
        getSplittedData(machineEventIdRef,overall_duration_value);
        getDownTimeGraph();
        getTotalCount();
        $('.select_item').css('display','none');
        $("#overlay").fadeOut(300);
      },
      error:function(res){
        // alert("Sorry!Try Agian!!");
        data_time=[];
        data_array=[];
        split_ref =[];     
        getSplittedData(machineEventIdRef,overall_duration_value);
        getDownTimeGraph();
        getTotalCount();
        $('.select_item').css('display','none');
        $("#overlay").fadeOut(300);
      }
    });
    
});

  $(document).on('change','.sval',function(){
          var count2 = $('.sval');
          //index of the current selected row
          var index3 = count2.index($(this));
          //new entered duration
          var vale = document.getElementsByClassName("sval")[index3].value; 
          //actual duration before new duration enter 
          var len_split = document.getElementsByClassName("sval").length;
          var remain_value;

          if (!(vale.trim())) {
            document.getElementsByClassName("sval")[index3].value = parseInt(data_array[index3]);
          }

          //len_split = parseInt(len_split) - 1;
          // overall_value = parseInt(overall_value) - parseInt(len_split);
          var m =overall_duration_value-(len_split-1);
          //condition check whethere total duration for that particular value is less for new enterd total value
          if (vale > m) {
            alert('Maximum split reached!');
            document.getElementsByClassName("sval")[index3].value = parseInt(data_array[index3]);
          }else{
            if (vale >= 1) {
              var prev = data_array[index3];
              //check whether new entered duration is greater or less to do(addition or substraction) 
              if(parseInt(vale) > parseInt(prev)){
                    //find remaining value neede to substract from the clock wise and add it to current row
                    remain_value =parseInt(vale)-parseInt(prev);
                    i=index3;
                    var r = remain_value;
                    var v = vale;
                    var check = [];
                    //loop execute untill the remaining values get zero
                    while(r>0){
                      //check the clicked index is end of the array list to start the loop from the begining
                      if(i<(len_split-1)){
                        if (i==0) {
                          var tmp = data_array[0].split(".");
                          data_array[i] = parseInt(v);
                          split_second = parseInt(("0" + (tmp[1])).slice(-2));
                        }
                        else{
                          data_array[i] = parseInt(v);
                        }
                        var flag = 1;
                        i= i+1;

                        nval = data_array[i];
                        //Substract the maximum substract limit from the next index value of the array(data_array)
                        if (r>=nval) {
                          //substract maximum value from the next array index
                          r = (r-(nval-1));
                          prev = data_array[i]-(nval-1);
                          v = prev;
                        }
                        else{
                          nval = data_array[i];
                          if (parseInt(nval) !=1) {
                            v = nval-r;
                            if (i==0) {
                              var tmp = data_array[0].split(".");
                              data_array[i] = parseInt(v);
                              split_second =parseInt(("0" + (tmp[1])).slice(-2));
                            }
                            else{
                              data_array[i] = parseInt(v);
                            }
                            r = (r-(nval));
                          }
                          else{
                            v=1;
                            flag = 0;
                          }
                        } 
                      }
                      else{
                        if (i==0) {
                          var tmp = data_array[0].split(".");
                          data_array[i] = parseInt(v);
                          split_second = parseInt(("0" + (tmp[1])).slice(-2));
                        }
                        else{
                          data_array[i] = parseInt(v);
                        }
                        
                        i=0;
                        nval = data_array[i]; 
                        if (r>=nval) {
                          r = (r-(nval-1));
                          prev = data_array[i]-(nval-1);
                          v = prev;
                        }
                        else{
                          nval = data_array[i];
                          v = nval-r;
                          if (i==0) {
                            var tmp = data_array[0].split(".");
                            if (tmp.length > 1) {
                              data_array[i] = parseInt(v);
                              split_second = parseInt(("0" + (tmp[1])).slice(-2));
                            }
                            else{
                              data_array[i] = parseInt(v);
                              split_second = parseInt(("0" + (tmp[1])).slice(-2));
                            }
                          }
                          else{
                            data_array[i] = parseInt(v);
                          }
                          r = (r-(nval));
                        }
                      }
                      
                    //Calculation
                    var sx = data_time[0];
                    var j=0;
                    var length = data_array.length;
                    var c_date = new Date(calendar_array[0]+" "+sx);
                    while(j < length){
                      // s_date = new Date(calendar_array[index3]+" "+sx);
                      s_date = c_date;
                      datetext = s_date.toTimeString();
                      stime = datetext.split(' ')[0];
                      // Update the calender date.....
                      tmp_date = s_date.getFullYear()+'-'+((s_date.getMonth() > 8) ? (s_date.getMonth() + 1) : ('0' + (s_date.getMonth() + 1))) + '-' + ((s_date.getDate() > 9) ? s_date.getDate() : ('0' + s_date.getDate()));
                      calendar_array[j]= tmp_date;
                      //2(i)+1 logic
                      data_time[(2*j)]=stime;
                      s_date.setMinutes(s_date.getMinutes()+parseInt(data_array[j]));
                      // if (j == (length-1)) {
                      if (j == 0) {
                        // nsec= parseInt(nsec)+parseInt(split_second);
                        s_date.setSeconds(s_date.getSeconds()+parseInt(split_second));
                      }
                      datetext = s_date.toTimeString();
                      stime = datetext.split(' ')[0];
                      data_time[(2*j)+1]=stime;
                      j=j+1;
                      sx=stime;
                      c_date = s_date;
                    }
                    //Calculation for start and end time to change
                    //calcDataTiming();
                    }
              }
              else{
                remain_value = parseInt(prev) - parseInt(vale);
                if (index3 ==0) {
                  var tmpsplit = data_array[0].split(".");
                  if (tmpsplit.length > 1) {
                    data_array[index3] = parseInt(vale);
                    split_second = parseInt(("0" + (tmpsplit[1])).slice(-2));
                  }
                  else{
                    data_array[index3] = parseInt(vale);
                  }
                }
                else{
                  data_array[index3] = parseInt(vale);
                }
                //time split checking
                var check = [];
                if (index3 == (data_array.length -1)) {
                  index3 = 0;
                  // new code added
                  var tmpsplit = data_array[0].split(".");
                  if (tmpsplit.length >1) {
                    data_array[index3] = parseInt(tmpsplit[0])+parseInt(remain_value);
                  }
                  else{
                    data_array[index3] = parseInt(tmpsplit[0])+parseInt(remain_value);  
                  }
                    var sx = data_time[0];
                    var j=0;
                    var length = data_array.length;
                    var c_date = new Date(calendar_array[0]+" "+sx);
                    while(j < length){
                      // s_date = new Date(calendar_array[index3]+" "+sx);
                      s_date = c_date;
                      datetext = s_date.toTimeString();
                      stime = datetext.split(' ')[0];
                      check.push(stime);
                      // Update the date array.....
                      tmp_date = s_date.getFullYear()+'-'+((s_date.getMonth() > 8) ? (s_date.getMonth() + 1) : ('0' + (s_date.getMonth() + 1))) + '-' + ((s_date.getDate() > 9) ? s_date.getDate() : ('0' + s_date.getDate()));
                      calendar_array[j]= tmp_date;
                      //2(i)+1 logic
                      data_time[(2*j)]=stime;
                      s_date.setMinutes(s_date.getMinutes()+parseInt(data_array[j]));
                      // if (j == (length-1)) {
                      if (j == 0) {
                        s_date.setSeconds(s_date.getSeconds()+parseInt(split_second));
                        // nsec= parseInt(nsec)+parseInt(split_second);
                      }

                      datetext = s_date.toTimeString();
                      stime = datetext.split(' ')[0];

                      check.push(stime);
                      data_time[(2*j)+1]=stime;
                      j=j+1;

                      c_date = s_date;
                    }
                    // console.log(calendar_array);
                  //Calculation for start and end time to change
                  //calcDataTiming();
                }else{
                  index3 = parseInt(index3) + 1;
                  data_array[index3] = parseInt(data_array[index3])+parseInt(remain_value);
                  //2(n)+1 logic
                  var j = parseInt(2*(index3-1))+parseInt(1);
                  var sx = data_time[j];
                  s_date = new Date(calendar_array[index3]+" "+sx);
                  s_date.setMinutes(s_date.getMinutes()-parseInt(remain_value));
                  datetext = s_date.toTimeString();
                  stime = datetext.split(' ')[0];
                  data_time[j] = stime;

                  // Update the date array.....
                  tmp_date = s_date.getFullYear()+'-'+((s_date.getMonth() > 8) ? (s_date.getMonth() + 1) : ('0' + (s_date.getMonth() + 1))) + '-' + ((s_date.getDate() > 9) ? s_date.getDate() : ('0' + s_date.getDate()));
                  calendar_array[parseInt(index3)]= tmp_date;

                  if (j==0) {
                    s_date.setSeconds(s_date.getSeconds()+parseInt(split_second));
                  }

                  datetext = s_date.toTimeString();
                  stime = datetext.split(' ')[0];
                  data_time[j+1] = stime;
                }
                var navl = data_array[index3];
              }          
              
              var l=0;
              var len = data_array.length;
              while(l < len) {
                document.getElementsByClassName("startTime")[l].innerHTML=data_time[2*l];
                document.getElementsByClassName("endTime")[l].innerHTML=data_time[parseInt(2*l)+parseInt(1)];
                l=l+1;
              }
              var k=0;
              var dlen=data_array.length;
              while(k < dlen){
                $('.sval:eq('+k+')').val(data_array[k]);
                if (k==0) {
                  //Added for duration split on 25-09-2022
                  var tmpsplit = data_array[0].toString().split(".");
                  data_array[0] = parseInt(tmpsplit[0]);
                  data_array[0] = data_array[0]+"."+split_second;
                  $('.ReasonDuration:eq('+k+')').text(data_array[k]);
                } 
                else{
                  $('.ReasonDuration:eq('+k+')').text(data_array[k]);
                }
                k=k+1;
              }
          }
          else{
            alert("Minimum split reached!");
          }
        }
   });

function calcDataTiming(){
  var sx = data_time[0].split(":");
  var mx= parseInt(sx[1]);
  var hx= parseInt(sx[0]);
  var nmx= mx;
  var nhx=hx;
  var j=0;
  var length = data_array.length;
  while(j < length){
    var tmp = ""+hx+":"+mx+"";
    check.push(tmp);
    //2(i)+1 logic
    data_time[(2*j)]=tmp;
    //document.getElementsByClassName("startTime")[(2*j)].innerHTML=tmp;
    mx = parseInt(mx)+parseInt(data_array[j]);
    if (mx > 60) {
      while(mx > 60){
        hx = parseInt(hx)+1;
        mx = parseInt(mx)-60;
      }
    }
    nhx = hx;
    nmx = mx;
    tmp = ""+nhx+":"+nmx+"";
    check.push(tmp);
    data_time[(2*j)+1]=tmp;
    //document.getElementsByClassName("startTime")[(2*j)+1].innerHTML=tmp;
    j=j+1;
  }
  // alert(data_time);
  return;
}

function addDownCategory(category){
  down_category.push(category);
}
function addDownReason(reason){
  down_reason.push(reason);
}
function addDownTool(tool,tool_id){
  down_tool.push(tool_id,tool);
}  
function addDownPart(part,part_id){
  down_part.push(part_id,part);
}

  function findDownReason(ref){
    //alert(down_reason);
    var $tmpData = new Array();
    for (var i = 0; i < down_reason.length; i++) {
      if (i == ref) {
        $tmpData.push(down_reason[i-1]);
      }
    }
    return $tmpData;
  }



  function  DownReasonUpdate(ref,reason,downtime_reason_id){
    $('.DownReason:eq('+ref+')').empty();
    $('.DownCategoryValue:eq('+ref+')').empty();
    var elements = $();
    var elementsCategory = $();
    var cat="";
    var id="";
    var refCat ="";
    var reason ="";

    down_reason_collection.forEach(function(item){
      if (downtime_reason_id == item[0]) {
        refCat = item[1];
      }
    });

    // alert(down_reason_collection.length);
    down_reason_collection.forEach(function(item){

      if (item[1] == refCat) {
        if (downtime_reason_id == item[0]) {
          elements = elements.add('<option value='+item[0]+' dvalue='+item[0]+' selected="true">'+item[2]+'</option>');
          cat = item[1];
          id=item[0];
          reason=item[2];
        }
        else{
          elements = elements.add('<option value='+item[0]+' dvalue='+item[0]+'>'+item[2]+'</option>');
        }
      }

    });          
    if (cat=="Unplanned") {
      elementsCategory = elementsCategory.add('<option value="Unplanned" dvalue='+id+' selected="true">'+"Unplanned"+'</option>');
        elementsCategory = elementsCategory.add('<option value='+"Planned"+' dvalue='+id+'>'+"Planned"+'</option>');
    }
    else{
      elementsCategory = elementsCategory.add('<option value="Unplanned" dvalue='+id+'>'+"Unplanned"+'</option>');
      elementsCategory = elementsCategory.add('<option value='+"Planned"+' dvalue='+id+' selected="true">'+"Planned"+'</option>');
    }
    $('.DownReason:eq('+ref+')').append(elements);
    $('.DownCategoryValue:eq('+ref+')').append(elementsCategory);
    $('.ReasonCategory:eq('+ref+')').text(cat);
    $('.ReasonName:eq('+ref+')').text(reason);
    // console.log(ref+" "+reason+" "+id+" "+cat);
  }

  function DownToolUpdate(ref,tool){
    $.ajax({
      url: "<?php echo base_url('PDM_controller/getToolName'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserNameRef:UserNameRef,
      //     UserRoleRef:UserRoleRef,
      // },
      success:function(res_Site){   
          $('.DownTool:eq('+ref+')').empty();
          var elements = $();
          res_Site.forEach(function(item){
            // this condition adding for no part and no tool remove
            // if (item.tool_id == "TL1001") {
              
            // }else{
              if (item.tool_id == tool) {
                elements = elements.add('<option tvalue="'+item.tool_name+'.'+item.tool_id+'" class="DownToolVal" value="'+item.tool_id+'" selected="true">'+item.tool_name+' -'+item.tool_id+'</option>');
              }
              else{
                elements = elements.add('<option tvalue="'+item.tool_name+'.'+item.tool_id+'" class="DownToolVal" value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
              }
            // }
          });
          $('.DownTool:eq('+ref+')').append(elements);
          //$('.DownToolFirst').append(elements1);
      },
      error:function(res){
          // alert("Sorry!Try Agian!!");
      }
  });
  }
  
  function DownPartUpdate(ref,part,tool){
    // alert(tool);
    $.ajax({
      url: "<?php echo base_url('PDM_controller/getPart'); ?>",
      type: "POST",
      dataType: "json",
      success:function(res_Site){
        // $('.DownPart:eq('+ref+')').empty();
        $('.checkboxes:eq('+ref+')').empty();
          var elements = $();

          // for(var i=0;i<parseInt())
          res_Site.forEach(function(item){
            // this condition adding for no part and no tool remove 
            // if (item.part_id == "PT1001") {
              
            // }else{
              if (item.status == 1) {
                if (tool == item.tool_id) {
                  if (item.part_id == part) {
                    elements = elements.add('<div class="option_multi"><div class="multi-check "><input type="checkbox" id="one" value="'+item.part_id+'" name="multi_part[]" class="checkboxIn" checked="true"></div><div class="multi-lable check_dis"><span>'+item.part_id+'-'+item.part_name+'</span></div></div>');                 
                  }
                  else{
                    // elements = elements.add('<option class="DownPartVal" pval="'+item.part_name+'.'+item.part_id+'" tvalue="'+item.tool_id+'" value="'+item.part_id+'">'+item.part_name+' -'+item.part_id+'</option>');
                    elements = elements.add('<div class="option_multi"><div class="multi-check "><input type="checkbox" id="one" value="'+item.part_id+'" name="multi_part[]" class="checkboxIn"></div><div class="multi-lable check_dis"><span>'+item.part_id+'-'+item.part_name+'</span></div></div>');
                  }
                }
              }
            // }
          });
          // $('.DownPart:eq('+ref+')').append(elements);
          $('.checkboxes:eq('+ref+')').append(elements);
      },
      error:function(res){
          // alert("Sorry!Try Agian!!");
      }
  });
  }  


// //Function for store downtime reason Globally..............
// $.ajax({
//   url: "<?php echo base_url('Home/downtime_reason_collection'); ?>",
//   type: "POST",
//   dataType: "json",
//   // data: {
//   //     Sname : this.value
//   // },
//   success:function(res_Site){
//       alert();
//       // res_Site.forEach(function(item){
//       // });
//   },
//   error:function(res){
//       alert("Sorry!Try Agian!!");
//   }
// });


  DownReason();
  function DownReason(){

    $.ajax({
      url: "<?php echo base_url('PDM_controller/downtime_reason_retrive'); ?>",
      type: "POST",
      dataType: "json",
      // data: {
      //     Sname : this.value
      // },
      success:function(res_Site){
          $('.DownReason').empty();
          var elements = $();
          var elements1 = $();
          down_reason=[];
          // alert(res_Site);
          res_Site.forEach(function(item){
            addDownReason(item.downtime_reason);
            down_reason_collection.push(Object.values(item));
              elements = elements.add('<option value='+item.downtime_reason_id+' dvalue='+item.downtime_reason_id+' rvalue='+item.downtime_reason+'>'+item.downtime_reason+'</option>');
          });
          $('.DownReason').append(elements);
          //alert(down_reason);
      },
      error:function(res){
          // alert("Sorry!Try Agian!!");
      }
    });
    // alert(down_reason);
  }
  
  DownTool();
  function DownTool(){
    $.ajax({
      url: "<?php echo base_url('PDM_controller/getToolName'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserNameRef:UserNameRef,
      //     UserRoleRef:UserRoleRef,
      // },
      success:function(res_Site){   
        $('.DownTool').empty();
        $('.DownToolFirst').empty();
          var elements = $();
          var elements1 = $();
          down_tool = [];
          res_Site.forEach(function(item){
              addDownTool(item.tool_name,item.tool_id);
              // no tool not mentioned the dropdwon
              // if (item.tool_id == "TL1001") {
                
              // }else{
                elements = elements.add('<option tvalue="'+item.tool_name+'.'+item.tool_id+'" class="DownToolVal" value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
                elements1 = elements1.add('<option value="'+item.tool_id+'">'+item.tool_name+' -'+item.tool_id+'</option>');
              // }
             
          });
          $('.DownTool').append(elements);
          //$('.DownToolFirst').append(elements1);
      },
      error:function(res){
          // alert("Sorry!Try Agian!!");
      }
  });
  }

  DownPart();
  function DownPart(){
    $.ajax({
      url: "<?php echo base_url('PDM_controller/getPart'); ?>",
      type: "POST",
      dataType: "json",
      // data:{
      //     UserSiteRef:UserSiteRef,
      // },
      success:function(res_Site){  
        $('.checkboxes').empty();
          var elements = $();
          // var elements1 = $();
          down_part = [];
          res_Site.forEach(function(item){
              addDownPart(item.part_name,item.part_id);
              // alert(Object.values(item));
              // no part not mentioned the dropdwon
              // if (item.part_id == "PT1001") {
                
              // }else{
                if (item.status == 1) {
                  part_collection.push(Object.values(item));
                  elements = elements.add('<div class="option_multi"><div class="multi-check "><input type="checkbox" id="one" value="'+item.part_id+'" name="multi_part[]" class="checkboxIn"></div><div class="multi-lable check_dis"><span>'+item.part_id+'-'+item.part_name+'</span></div></div>');
                }

                // elements = elements.add('<option class="DownPartVal" pval="'+item.part_name+'.'+item.part_id+'" tvalue="'+item.tool_id+'" value="'+item.part_id+'">'+item.part_name+' -'+item.part_id+'</option>');
              // }
             
          });
          $('.checkboxes').append(elements);
      },
      error:function(res){
          // alert("Sorry!Try Agian!!");
      }
  });
  }


// downtime grap strategy code
/*
$(document).on('click','.splitclick',function(){
  var machine = "MC1001";
  var shift = 1;
  var toolid = "TL1001";
  var toolname = "Tool Name 1"; 
  var partid = "PT1001";
  var partname = "Part Name 1";
  var machine_status = 0;
  var downtime_status = 0;


});*/ 



// this function is first split then next click the pencile icon after click another row of pencile icon then check it for confirmation in leave or not
$(document).on('click','.edit_visible',function(){
  var count = $('.edit_visible');
  var index_value = count.index($(this));
  var edit_input = $('.edit_input').length;
  index_arr.push(index_value);
  count_click +=1;
 if (count_click == 1) {
   true_value(index_value,edit_input);
 }else{
    if (confirm("Are You Sure You Should Leave The Record") == true) {
        true_value(index_value,edit_input);
    }else{
      var acount = index_arr.length;
        var invalue = index_arr[parseInt(acount-2)];
        invalue = Math.abs(invalue);
        true_value(invalue,edit_input);
        // console.log('array value:'+index_arr+"arrayindex:"+invalue);
    }
  //$('.edit_input')[index_value].css("display","inline");
 }

      var part_demo = new Array();
      // var part_demo = [];
        $.each($('.checkboxes:eq('+index_value+') input:checked'), function(){ 
          if($(this).is(':checked')){
            part_demo.push($(this).val());
          }           
           
        });

        // $('.check_dis:eq(0)').html(part_demo.length+" Selected");
  
});
// this function is parent of pencil icon edit enable or disable function so this function is user define function 
function true_value(index_value,einput){
  for(var i=0;i<einput;i++){
      // $('.edit_input')[i].css("display","none");
      // document.getElementsByClassName('edit_input')[i].style.display="none";
      // document.getElementsByClassName('edit_input1')[i].style.display="none";
      // document.getElementsByClassName('edit_input2')[i].style.display="none";
      // document.getElementsByClassName('edit_input3')[i].style.display="none";
      // document.getElementsByClassName('edit_input4')[i].style.display="none";
      $('.edit_input:eq('+i+')').css("display","none");
      $('.edit_input1:eq('+i+')').css("display","none");
      $('.edit_input2:eq('+i+')').css("display","none");
      $('.edit_input3:eq('+i+')').css("display","none");
      $('.edit_input4:eq('+i+')').css("display","none");

      // document.getElementsByClassName('edit_display')[i].style.display="inline";
      // document.getElementsByClassName('edit_display1')[i].style.display="inline";
      // document.getElementsByClassName('edit_display2')[i].style.display="inline";
      // document.getElementsByClassName('edit_display3')[i].style.display="inline";
      // document.getElementsByClassName('edit_display4')[i].style.display="inline";
      $('.edit_display:eq('+i+')').css("display","inline");
      $('.edit_display1:eq('+i+')').css("display","inline");
      $('.edit_display2:eq('+i+')').css("display","inline");
      $('.edit_display3:eq('+i+')').css("display","inline");
      $('.edit_display4:eq('+i+')').css("display","inline");
      
      
      // icons
      // for notes
      // document.getElementsByClassName('dedit')[i].style.display="none";
      document.getElementsByClassName('dcheck')[i].style.display="none";
   
      document.getElementsByClassName('nsplit')[i].style.display="inline";
      document.getElementsByClassName('npencil')[i].style.display="inline";
      document.getElementsByClassName('ninfo')[i].style.display="inline";
      if (i==0) {
        document.getElementsByClassName('ndelete')[i].style.display="none";
      }
      else{
        document.getElementsByClassName('ndelete')[i].style.display="inline";
      }

  }
    
    if ($('.edit_display').size() == 1) {
      document.getElementsByClassName('edit_input')[index_value].style.display="none";
      document.getElementsByClassName('edit_display')[index_value].style.display="inline";
    }
    else{
      document.getElementsByClassName('edit_input')[index_value].style.display="inline";
      document.getElementsByClassName('edit_display')[index_value].style.display="none";
    }
    document.getElementsByClassName('edit_input1')[index_value].style.display="inline";
    document.getElementsByClassName('edit_input2')[index_value].style.display="inline";
    
    document.getElementsByClassName('edit_display1')[index_value].style.display="none";
    document.getElementsByClassName('edit_display2')[index_value].style.display="none";
  
    // icons
    // for notes
    // document.getElementsByClassName('dedit')[index_value].style.display="inline";
    document.getElementsByClassName('dcheck')[index_value].style.display="inline";
   
    document.getElementsByClassName('nsplit')[index_value].style.display="none";
    document.getElementsByClassName('npencil')[index_value].style.display="none";
    document.getElementsByClassName('ninfo')[index_value].style.display="none";
    document.getElementsByClassName('ndelete')[index_value].style.display="none";


    var s = $('.DownReason:eq('+index_value+')').val();

    down_reason_collection.forEach(function(item){
      if(item[0] == s)
      {
        c = item[2].toLowerCase().trim().replace(" ","","g");
        if (c == "toolchangeover") {
          $('.edit_input3:eq('+index_value+')').css("display","inline");
          $('.edit_input4:eq('+index_value+')').css("display","inline");
          $('.edit_display3:eq('+index_value+')').css("display","none");
          $('.edit_display4:eq('+index_value+')').css("display","none");
          console.log("already tool changeover");
          target_input_function_handle("edit",index_value);

          // document.getElementsByClassName('edit_input3')[index_value].style.display="inline";
          // document.getElementsByClassName('edit_input4')[index_value].style.display="inline";
          // document.getElementsByClassName('edit_display3')[index_value].style.display="none";
          // document.getElementsByClassName('edit_display4')[index_value].style.display="none";
        } 
      }
    });   
}



// get last updated by function
$(document).on('click','.info_click',function(){

  var valu = $('.info_click');
  var index_val = valu.index($(this));
  $('.edit-Subsplit:eq('+index_val+')').css('display','none');
  if ($('.note_edit:eq('+index_val+')').css('display') === "none") {
    $('.note_edit').css('display','none');
    $('.note_edit:eq('+index_val+')').css('display','inline');
    // $('.edit-Subsplit:eq('+index_val+')').css('display','none');
    // $('.edit-Subsplit').css('display','none');
    $('.reasonInfo').removeAttr("onmouseover");
  }else{
    $('.note_edit:eq('+index_val+')').css('display','none');
    $('.edit-Subsplit').css('display','none');
    $('.edit-Subsplit:eq('+index_val+')').css('display','none');
    $('.reasonInfo').attr("onmouseover","check_info(this)");
  }
  
  var last_updated_id = $(this).attr('data_val');
  //alert(last_updated_id);
/*
  $.ajax({
    url:"<?php echo base_url('PDM_controller/graph_get_last_updated_by'); ?>",
    method:"POST",
    data:{last_updated_id:last_updated_id},
    dataType:"json",
    success:function(res){
      //console.log(res);
      if (res) {
        $('.info_last_data').html(res[0]['first_name']+" "+res[0]['last_name']);
        $('.info_last_data').css("font-weight","bold");
      }else{
        $('.info_last_data').html('');
        $('.info_last_data').css("font-weight","bold");
      }
     
    }
  });
*/

});
</script>



<script type="text/javascript">


// $(document).on('click','.multi-lable',function(event){
//     event.preventDefault();
//     var getind = $('.multi-lable');
//     var useind = getind.index($(this));
//     if ($('.checkboxIn:eq('+useind+')').prop('checked')==true){ 
//         // alert('checked');
//         $('.checkboxIn:eq('+useind+')').removeAttr("checked");
//         check_count--;
        
//     }else{
//       // alert('not checked');
//       $('.checkboxIn:eq('+useind+')').attr("checked",true);
//       check_count++;
      
//     }
//     $('.check_dis:eq(0)').html(check_count+'Selected');

// });

// checkbox dropdwon new code
var expanded = false;
function showCheckboxes(index) {
  //var checkboxes = document.getElementById("checkboxes");
  //  alert("ok");
  // index value
  var els = Array.prototype.slice.call( document.getElementsByClassName('selectOpp'), 0 );
  var index_val = els.indexOf(event.currentTarget);
  var w = $('.overSelect:eq('+index_val+')').width();
  // alert(w);
  var sel_drp_ch = $('.PartNameValue:eq('+index_val+')').attr("id_check");
  const sel_part = sel_drp_ch.split(",");
  // alert(index_val);
  // $('.multi-lable').attr('drop_index',)
  var ch_drp_len = $('.checkboxIn').length;

  for(var k=0;k<parseInt(sel_part.length);k++){
      var l = 0;
      while(l<parseInt(ch_drp_len)){
        var tmp_part = $('.checkboxIn:eq('+l+')').val();
          if (sel_part[k] == tmp_part) {
              $('.checkboxIn:eq('+l+')').attr("checked",true); 
          }
          l = l+1;
      }
  }

  var checkboxes = $('.checkboxes:eq('+index_val+')');
  if (!expanded) {
    // checkboxes.style.display = "block";
    $('.checkboxes:eq('+index_val+')').css("display","block");
    $('.cust-drop:eq('+index_val+')').css("z-index","2000");


    $('.option_multi').css("width",w+"px");
    // $('.checkboxes:eq('+index_val+')').css("z-index","2000");
    expanded = true;
  } else {
    // checkboxes.style.display = "none";
    $('.checkboxes:eq('+index_val+')').css("display","none");
    $('.cust-drop:eq('+index_val+')').css("z-index","1500");

    $('.option_multi').css("width",w+"px");
    expanded = false;
  }
  // $('.checkboxes').css("z-index","2000");
}

$(document).mouseup(function(e){ 
  // one tool multipart code 
  // multipart dropdwon outside click closed the menu
  var container = $('.checkboxes');
  // alert("container"+container);
  // console.log("mouse up");
  // console.log(!container.is(e.target));
  if (!container.is(e.target) && container.has(e.target).length === 0) 
  {
      container.hide();
  }
  // bulk edit code
  // bulk edit filter category dropdwon outside click its closed the menu
  var cate_con = $('.filter_checkboxes');
  if (!cate_con.is(e.target) && cate_con.has(e.target).length===0) {
    cate_con.hide();

    var cate_arr_demo = $('.category_drp_checkbox');
    var dummy_count = 0;
    jQuery('.category_drp_checkbox').each(function(index){
      if(cate_arr_demo[index].checked===true){
        dummy_count = parseInt(dummy_count)+1;
        // category_drp_val = 
      }
    });
    
    if (parseInt(dummy_count)===0) {
      reset_category();
      $('#text_category_drp').text('All Categories');
    }
    // else if(parseInt(dummy_count)>0){
    //   if (parseInt(dummy_count)>=2) {
    //     var demo = null;
    //     downtime_reason_filter(demo);
    //   }else{
    //     var category_drp_val = getcategory_arr();
    //     // console.log("single value for category");
    //     downtime_reason_filter(category_drp_val[0]);
    //   }
    // }

  }

  // bulk edit filter reasons dropdwon outside click its close the menu
  var reason_con = $('.filter_checkboxes_reason');
  if (!reason_con.is(e.target) && reason_con.has(e.target).length === 0) {
    reason_con.hide();

    // downtime reasons
    var reason_arr_demo = $('.reason_drp_checkbox');
    var tmp_dummy_count = 0;
    jQuery('.reason_drp_checkbox').each(function(index){
      if (reason_arr_demo[index].checked===true) {
        tmp_dummy_count = parseInt(tmp_dummy_count)+1;
      }
    });

    if (parseInt(tmp_dummy_count)===0) {
      reset_downtime_reasons();
      $('#text_reason').text('All Reasons');
    }

  }


  // notes outside click
  var notes_target = $('.note_edit');
  if (!notes_target.is(e.target) && notes_target.has(e.target).length === 0) {
    notes_target.hide();
    $('.reasonInfo').attr("onmouseover","check_info(this)");
  }
 
});

// tool changeover part selection click p tag checked the input tag
// condition code



// tool changeover part selection  double click p tag unchecked the input tag
// condition code
// $(document).on('dblclick','.multi-lable',function(event){
//   event.preventDefault();

//   var gi = $('.multi-lable');
//   var di = gi.index($(this));
//   $('.checkboxIn:eq('+di+')').removeAttr("checked");

// });


// bulk edit function category based downtime reasons function 
function category_based_reson(temp_category){
  // console.log(temp_category);
  // console.log(down_reason_collection);
  $('.filter_checkboxes_reason').empty();
  var elements = $();
  $('.filter_checkboxes_reason').append('<div class="filter_check_reason" style=""><div class="reason_drp_check" style=""><input type="checkbox" id="one" class="reason_drp_checkbox" value="all_reason"/></div><div class="reason_drp_text" style=""><p class="font_multi_drp" >All Reasons</p></div></idv>');
  down_reason_collection.forEach(function(item){
    if (temp_category == item[1]) {
      // console.log(item[1]);
      // console.log(item[2]);
      if (item[2] === "Tool Changeover") {
        
      }else{
        elements = elements.add('<div class="filter_check_reason" style=""><div class="reason_drp_check" style=""><input type="checkbox" id="one" class="reason_drp_checkbox" value="'+item[2]+'"/></div><div class="reason_drp_text" style=""><p class="font_multi_drp">'+item[2]+'</p></div></idv>');
        $('.filter_checkboxes_reason').append(elements);
      }
      // id = item[0]; 
      // elements = elements.add('<option value='+item[0]+' dvalue='+item[0]+' selected="true">'+item[2]+'</option>');
    }
  });
  // reset the downtime reasons for all selection function 
  reset_downtime_reasons();
}

// bulk edit category based dropdwon using 
// edit downtime reasons dropdown function
function bulg_edit_dropdown(category){
  if (category!=null) {
    $('.bulg_edit_drp').empty();
    var element = $();
    $('.bulg_edit_drp').append('<option selected="true" value="empty" disabled>Select</option>');
    down_reason_collection.forEach(function(item){
      if (category == item[1]) {
        // console.log(item[1]);
        // console.log(item[2]);
        if (item[2] === "Tool Changeover") {
          
        }else{
          element = element.add('<option value="'+item[0]+'">'+item[2]+'</option>');
          // console.log(item);
          $('.bulg_edit_drp').append(element);
        }
      }
    });
  }
  
  /*
  $.ajax({
    url:"<?php echo base_url(); ?>/PDM_controller/downtime_reason_bulgedit",
    method:"POST",
    dataType:"json",
    success:function(res){
      // console.log(res);
      var element = $();
      $('.bulg_edit_drp').append('<option selected="true" value="empty" disabled>Select</option>');
      res.forEach(function(item){
        // console.log(item.downtime_reason_id);
        if (item.downtime_reason==="Tool Changeover") {
          
        }else{
          element = element.add('<option value="'+item.downtime_reason+'">'+item.downtime_reason+'</option>');
          $('.bulg_edit_drp').append(element);
        }
       
      });
    },
    error:function(err){
      console.log(err);
    },
  });
  */
}

function check_info(ele){
  // e.preventDefault();
  var els = Array.prototype.slice.call( document.getElementsByClassName('edit-split'), 0 );
  var index_val = els.indexOf(event.currentTarget);
  var temp_count = 0;
  var tmp = $('.node_edit');
  var last_updated_id = $('.info_click:eq('+index_val+')').attr("data_val");
  $('.info_last_data').html('');
  $.ajax({
    url:"<?php echo base_url('PDM_controller/graph_get_last_updated_by'); ?>",
    method:"POST",
    data:{last_updated_id:last_updated_id},
    dataType:"json",
    success:function(res){
      //console.log(res);
      if (parseInt(res.length)>0) {
        $('.info_last_data:eq('+index_val+')').html(res[0]['first_name']+" "+res[0]['last_name']);
        $('.info_last_data').css("font-weight","bold");
      }else{
        $('.info_last_data:eq('+index_val+')').html('');
        $('.info_last_data').css("font-weight","bold");
      }
     
    },

  });
 
  $('.edit-Subsplit').css("display","none"); 
    if ($('.node_edit:eq('+index_val+')').css('display') == 'inline') {
      // console.log('ite ok');
      $('.edit-Subsplit:eq('+index_val+')').css("display","none");
    }else{
      $('.edit-Subsplit:eq('+index_val+')').css("display","block");
    }
    

}
function mouse_out_check(ele1){
  var els = Array.prototype.slice.call( document.getElementsByClassName('edit-split'), 0 );
  var index_val1 = els.indexOf(event.currentTarget);
  $('.edit-Subsplit:eq('+index_val1+')').css("display","none");

}

// notes submit function
function notes_submit(){
  $("#overlay").fadeIn(100);
  var tmp_els= Array.prototype.slice.call( document.getElementsByClassName('note_sub_cl'), 0 );
  var inval = tmp_els.indexOf(event.currentTarget);
  // alert(inval);
  var notes_val = $('.NotesValue:eq('+inval+')').val();
  var start_time = $('.startTime:eq('+inval+')').text();
  var end_time = $('.endTime:eq('+inval+')').text();
  var machine_ref_id = $('.splitclick:eq('+inval+')').attr('refval');
  var splitref = $('.splitclick:eq('+inval+')').attr('splitref');

  var mid = $('#Production_MachineName').val();
  var sdate = $('#Production_shift_date').val();
  var sid = $('#RejectShift').val();
  const tmpsid = sid.split('0');
  const tmpsdate = sdate.split('/');
  var tmpshiftdate = tmpsdate[0]+'-'+tmpsdate[1]+'-'+tmpsdate[2];
  // alert(notes_val);
  // alert(tmpshiftdate);
  // console.log(notes_val);
  // console.log()
  $.ajax({
    url:"<?php echo base_url(); ?>/PDM_controller/notes_submit",
    dataType:"json",
    method:"POST",
    data:{
      nval:notes_val,
      stime:start_time,
      etime:end_time,
      mrefid:machine_ref_id,
      srefid:splitref,
      mid:mid,
      sdate:tmpshiftdate,
      sid:tmpsid[0],
    },
    success:function(res){
      // alert(res);
      // console.log(res);
      // if (res == true) {
      // alert('Notes Added Successfully');
      // }
      $('.reasonInfo:eq('+inval+')').attr("onmouseover","check_info(this)");
      var de = $('.filter').css('display');
      if (de === "none") {
        $('.filter').css('display','none');
        $('.bulg_edit_ui').css('display','none');
        $('.bulk_edit_btn_case').css('display','inline');
        // filter_btn_call();
        getSplittedData(machineEventIdRef,overall_duration_value);
        getDownTimeGraph();
        getTotalCount();
      }else{
          $('.filter').css('display','inline');
          $('.bulg_edit_ui').css('display','none');
          $('.bulk_edit_btn_case').css('display','none');
          filter_btn_call();
          getDownTimeGraph();
          getTotalCount();
      }
      console.log(de+"display check after notes submission");
    
      
      $('.note_edit:eq('+inval+')').css('display','none');
      $("#overlay").fadeOut(100);


    },
    error:function(er){
      // alert('Sorry TryAgain');
      $("#overlay").fadeOut(100);
    },
  });





}

// $('.edit-split').hover(function(){
//   alert('hi');
// });


// target input ui display visibility control function 
function target_input_function_handle(var_str,index_value){
  if (var_str==="add") {
    $('.target_header').css('display','inline');
    $('.reason_header').css('width','11%');
    $('.tool_name_header').css('width','13.4%');
    $('.part_name_header').css('width','13.4%');
    $('.DownReasonDiv:eq('+index_value+')').css("width",'11%');
    $('.Downtime_target:eq('+index_value+')').css('display','inline');
    $('.downtime_part_name_div:eq('+index_value+')').css("width",'13.2%');
    $('.downtime_tool_name_div:eq('+index_value+')').css("width",'13.4%');
    $('.action_div:eq('+index_value+')').css('width','14%');
  }else if(var_str==="remove"){
    $('.target_header').css('display','none');
    $('.reason_header').css('width','15%');
    $('.tool_name_header').css('width','15%');
    $('.part_name_header').css('width','15%');
    $('.DownReasonDiv').css("width",'15%');
    $('.Downtime_target').css('display','none');
    $('.downtime_part_name_div').css("width",'14.8%');
    $('.downtime_tool_name_div').css("width",'14.8%');
    $('.action_div').css('width','18%');
  }
  else if(var_str==="edit"){
    $('.target_header').css('display','inline');
    $('.reason_header').css('width','11%');
    $('.tool_name_header').css('width','13.4%');
    $('.part_name_header').css('width','13.4%');
    $('.DownReasonDiv:eq('+index_value+')').css("width",'11%');
    $('.Downtime_target:eq('+index_value+')').css('display','inline');
    $('.downtime_part_name_div:eq('+index_value+')').css("width",'13.2%');
    $('.downtime_tool_name_div:eq('+index_value+')').css("width",'13.4%');
    $('.action_div:eq('+index_value+')').css('width','14%');
    target_value_ajax(index_value);
  }
}

// target value ajax function
function target_value_ajax(index_value){
  var sdate  = $('#Production_shift_date').val();
  var mid = $('#Production_MachineName').val();
  var sid = $('#RejectShift').val();
  var tid = $('.splitclick:eq('+index_value+')').attr('tool');
  var pid = $('.splitclick:eq('+index_value+')').attr('part');
  var refid = $('.splitclick:eq('+index_value+')').attr('refval');

  var temp_sid = sid.split('0');

  $.ajax({
    url:"<?php echo base_url(); ?>/PDM_controller/gettarget_input",
    dataType:"JSON",
    method:"POST",
    data:{
      sdate:sdate,
      mid:mid,
      pid:pid,
      tid:tid,
      sid:temp_sid[0],
      refid:refid,
    },
    DataType:"json",
    success:function(res_data){
      console.log("ajax success target value geeting");
      console.log(res_data);
      $('.target_input_cl:eq('+index_value+')').val(res_data);
    },
    error:function(er){
      console.log("Sorry Try Again... in target input value get error for editing purpose");
      console.log(er);
    }
  });


}

</script>