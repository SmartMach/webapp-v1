<head>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> 
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css?version=<?php echo rand() ; ?>">
<link rel="stylesheet" href="<?php echo base_url()?>/assets/css/financial_metrics.css?version=<?php echo rand() ; ?>">
<script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>
   <!-- Datetimepicker -->
<script src="<?php echo base_url(); ?>/assets/js/datetimepicker.js?version=<?php echo rand() ; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.datetimepicker.min.css?version=<?php echo rand() ; ?>">
<script src="<?php echo base_url(); ?>/assets/js/jquery.datetimepicker.js?version=<?php echo rand() ; ?>"></script>
   <!-- style css -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/Downtime_production.css?version=<?php echo rand(); ?>">
<style type="text/css">


</style>
<script type="text/javascript">
  var checkPastTime = function(inputDateTime) {
      var current = new Date($('.fromDate').val());
      month = '' + (current.getMonth() + 1);
      day = '' + current.getDate();
      year = current.getFullYear();
      if (month.length < 2) 
          month = '0' + month;
      if (day.length < 2) 
          day = '0' + day;
      c_date =  new Date([year, month, day].join('-'));

      if (typeof(inputDateTime) != "undefined" && inputDateTime !== null) {
          if (inputDateTime.getFullYear() < current.getFullYear()) {
              $('.toDate').datetimepicker('reset');
              //Terminate
          } else if ((inputDateTime.getFullYear() == current.getFullYear()) && (inputDateTime.getMonth() < current.getMonth())) {
              $('.toDate').datetimepicker('reset');
              //Terminate
          }

          if (inputDateTime.getDate() == current.getDate()) {
              if (inputDateTime.getHours() <= (current.getHours())) {
                  $('.toDate').datetimepicker('reset');
              }
              this.setOptions({
                  minTime:(parseInt(current.getHours())+parseInt(1)) + ':00',
                  minDate:c_date
              });
          } else {
              this.setOptions({
                  minTime: false,
                  minDate:c_date
              });
          }

          var tmp = new Date()
          if (inputDateTime.getDate() == tmp.getDate()) {
              this.setOptions({
                  maxTime: (tmp.getHours())+ ':00',
              });
          } else {
              this.setOptions({
                  maxTime: false,
              });
          }
      }
  };

  var checkPastTime_F = function(inputDateTime) {
    var current = new Date();
      if (typeof(inputDateTime) != "undefined" && inputDateTime !== null) {
          if (inputDateTime.getDate() == current.getDate()) {
              if (inputDateTime.getHours() > (current.getHours())) {
                  $('.fromDate').datetimepicker('reset');
              }
              this.setOptions({
                  maxTime: (current.getHours())+ ':00',
              });
          } else {
              this.setOptions({
                  maxTime: false,
              });
          }
      }
  };
</script>
</head>
<?php 
$session = \Config\Services::session();

?>
<br>
<br>
<div style="margin-left: 4.5rem;margin-top:1rem; overflow-x:hidden;overflow-y:scroll;">
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="position:fixed;margin-top:0;width:94%;">
        <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Production Downtime</p>
            <div class="d-flex">
                <div class="box rightmar" style="margin-right:0.5rem;height:1rem;">
                    <div style="padding-left:10px;padding-right:10px;height:2.3rem;border:1px solid #e6e6e6;border-radius:0.25rem;display:flex;justify-content:center;align-items:center;color:#C00000;"><p style="text-align:center;margin:auto;font-size:15px;font-weight:500;"><span id="total_duration_header"></span> Downtime</p></div>
                </div>

                <div class="box rightmar" style="margin-right:0.5rem;height:1rem;">
                <!-- <div class="input-box" style="border:1px solid #ced4ca;padding:2px;border-radius:0.25rem;height:100%;width:4.3rem;display:flex;flex-direction:row;"> -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="border:1px solid #ced4ca;border-radius:0.25rem;padding:0.1rem;">
                        <li class="nav-item" role="presentation"  onclick="graph_view_click()">
                        <i class="fa fa-sitemap nav-link active"  id="pills-graph-tab" data-bs-toggle="pill" data-bs-target="#pills-graph" type="button" role="tab" aria-controls="pills-graph" aria-selected="true" style="padding:0.4rem;font-size:1.3rem;"></i>
                        </li>
                        <li class="nav-item" role="presentation" onclick="table_onclick()">
                        <i class="fa fa-calculator nav-link"  id="pills-table-tab" data-bs-toggle="pill" data-bs-target="#pills-table" type="button" role="tab" aria-controls="pills-table" aria-selected="false" style="padding:0.4rem;font-size:1.3rem;"></i>
                        </li>
                    </ul>
                    <!-- </div> -->
                </div>

                <div class="box rightmar" style="margin-right: 0.5rem;">
                    <div class="input-box">
                        <!-- <input type="date" name="" class="form-control fromDate" id="from"> -->
                        <input type="text" class="form-control fromDate" value="" step="1">
                        <!-- <input type="datetime-local" class="form-control" value="2013-10-24T10:00:00" step="1"> -->
                        <label for="inputSiteNameAdd" class="input-padding ">From DateTime</label>
                    </div>
                </div>
                <div class="box rightmar" style="margin-right: 0.5rem;">
                    <div class="input-box">
                        <!-- <input type="date" name="" class="form-control toDate"> -->
                        <input type="text" class="form-control toDate" value="" step="1">
                        <label for="inputSiteNameAdd" class="input-padding ">To DateTime</label>
                    </div>
                </div>
            </div>
        </div>
    </nav>
  
    <div class="tab-content" id="pills-tabContent" style="margin-top:3.8rem;">
        <div class="tab-pane fade show active" id="pills-graph" role="tabpanel" aria-labelledby="pills-graph-tab" tabindex="0">
            <!-- tamil design graph design -->
            <!-- <div id="graphview" class="graphview_1" style="margin-top:1rem;"> -->
                <div  class="graph_1div" >
                    <div class="graph_01 border" style="">
                        <!-- reason wise opportunity cost graph-->
                        <p  class="font graph_mar_align"> Downtime opportunity Cost by Reasons</p>
                        <div style="display:flex;flex-direction:row;" class="marginScroll">
                            <div style="width:20%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><i class="fa fa-inr inr-class"></i><span id="reason_wise_oppcost_total"></span></p>
                                </div>
                            </div>
                            <div style="width:80%;display:flex;flex-direction:row-reverse;" >
                                <!-- Machine Dropdown checkbox -->
                                <div class="box " style="" >
                                    <label class="multi_select_label" style="">Machine</label>
                                    <div class="filter_selectBox_machinegp" onclick="machine_multiselect_gp()">
                                        <select  class="multi_select_machinegp" style="" >
                                            <option id="text_machinegp" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Reason</label>
                                    <div class="filter_selectBox_reasongp" onclick="reason_multiselect_gp()">
                                        <select  class="multi_select_reasongp" style="" >
                                            <option id="text_reasongp" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Category</label>
                                    <div class="filter_selectBox_categorygp" onclick="category_multiselect_gp()">
                                        <select  class="multi_select_categorygp" style="" >
                                            <option id="text_categorygp" style="">All Category</option>
                                        </select>
                                        <div class="filter_overSelect_categorygp"></div>
                                    </div>
                                    <div class="filter_checkboxes_categorygp " style="" >
                                        <!-- options in progress -->
                                        <div class="filter_check_categorygb reason_oppcost_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox" value="all"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb reason_oppcost_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox" value="Planned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb reason_oppcost_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox" value="Unplanned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="parent_reason_wise_oppcost prodcution_downtime_graph parent_div marginScroll" >
                            <div class="child_div child_reason_wise_oppcost">
                            <canvas id="reason_wise_oppcost" style="height:5rem;width:5rem;"></canvas>    
                            </div>
                        </div>
                    </div>
                    <div class="graph_02 border">
                    <!-- Reason wise duration graph-->
                        <p class="font graph_mar_align"> Downtime Duration by Reasons</p>
                        <div style="display:flex;flex-direction:row;" class="marginScroll">
                            <div style="width:20%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><span id="reason_duration_text"></span></p>
                                </div>
                            </div>
                            <div style="width:80%;display:flex;flex-direction:row-reverse;">
                                <!-- Machine Dropdown checkbox -->
                                <div class="box " style="" >
                                    <label class="multi_select_label" style="">Machine</label>
                                    <div class="filter_selectBox_machinegp1" onclick="machine_multiselect_gp1()">
                                        <select  class="multi_select_machinegp1" style="" >
                                            <option id="text_machinegp1" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp1"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp1" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Reason</label>
                                    <div class="filter_selectBox_reasongp1" onclick="reason_multiselect_gp1();">
                                        <select  class="multi_select_reasongp1" style="" >
                                            <option id="text_reasongp1" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp1"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp1" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Category</label>
                                    <div class="filter_selectBox_categorygp1" onclick="category_multiselect_gp1()">
                                        <select  class="multi_select_categorygp1" style="" >
                                            <option id="text_categorygp1" style="">All Category</option>
                                        </select>
                                        <div class="filter_overSelect_categorygp1"></div>
                                    </div>
                                    <div class="filter_checkboxes_categorygp1" style="" >
                                        <!-- options in progress -->
                                        <div class="filter_check_categorygb1 reason_duration_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox1" value="all"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb1 reason_duration_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox1" value="Planned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb1 reason_duration_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox1" value="Unplanned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="parent_reason_wise_duration prodcution_downtime_graph parent_div marginScroll">
                            <div class="child_div child_reason_wise_duration">
                            <canvas id="reason_wise_duration" style="height:5rem;width:5rem;"></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="graph_1div" style="height:100%;width:100%;margin-top:0rem;margin-bottom:1rem;">
                    <div class="graph_03 border">
                        <!-- Machine wise opportunity cost graph-->
                        <p class="font graph_mar_align">Downtime Opportunity Cost by Machines</p>
                        <div style="display:flex;flex-direction:row;" class="marginScroll">
                            <div style="width:20%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><i class="fa fa-inr inr-class"></i><span id="machine_wise_oppcost_total"></span></p>
                                </div>
                            </div>
                            <div style="width:80%;display:flex;flex-direction:row-reverse;">
                                <!-- Machine Dropdown checkbox -->
                                <div class="box " style="">
                                    <label class="multi_select_label" style="">Machine</label>
                                    <div class="filter_selectBox_machinegp2" onclick="machine_multiselect_gp2()">
                                        <select  class="multi_select_machinegp2" style="" >
                                            <option id="text_machinegp2" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp2"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp2" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Reason</label>
                                    <div class="filter_selectBox_reasongp2" onclick="reason_multiselect_gp2();">
                                        <select  class="multi_select_reasongp2" style="" >
                                            <option id="text_reasongp2" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp2"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp2" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Category</label>
                                    <div class="filter_selectBox_categorygp2" onclick="category_multiselect_gp2()">
                                        <select  class="multi_select_categorygp2" style="" >
                                            <option id="text_categorygp2" style="">All Category</option>
                                        </select>
                                        <div class="filter_overSelect_categorygp2"></div>
                                    </div>
                                    <div class="filter_checkboxes_categorygp2" style="" >
                                        <!-- options in progress -->
                                        <div class="filter_check_categorygb2 machine_oppcost_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox2" value="all"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb2 machine_oppcost_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox2" value="Planned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb2 machine_oppcost_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox2" value="Unplanned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="parent_machine_wise_oppcost prodcution_downtime_graph parent_div marginScroll">
                            <div class="child_div child_machine_wise_oppcost">
                            <canvas id="machine_wise_oppcost" style="height:5rem;width:5rem;"></canvas>    
                            </div>
                        </div>
                    </div>
                    <div class="graph_04 border">
                        <!-- graph 4 inner lables-->
                        <p class="font graph_mar_align">Downtime Duration by Machines With Reasons</p>
                        <div style="display:flex;flex-direction:row;" class="marginScroll">
                            <div style="width:20%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><span id="machine_reason_duration_text"></span></p>
                                </div>
                            </div>
                            <div style="width:88%;display:flex;flex-direction:row-reverse;">
                                <!-- Machine Dropdown checkbox -->
                                <div class="box " style="" >
                                    <label class="multi_select_label" style="">Machine</label>
                                    <div class="filter_selectBox_machinegp3" onclick="machine_multiselect_gp3()">
                                        <select  class="multi_select_machinegp3" style="" >
                                            <option id="text_machinegp3" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp3"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp3" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Reason</label>
                                    <div class="filter_selectBox_reasongp3" onclick="reason_multiselect_gp3();">
                                        <select  class="multi_select_reasongp3" style="" >
                                            <option id="text_reasongp3" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp3"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp3" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label" style="">Category</label>
                                    <div class="filter_selectBox_categorygp3" onclick="category_multiselect_gp3()">
                                        <select  class="multi_select_categorygp3" style="" >
                                            <option id="text_categorygp3" style="">All Category</option>
                                        </select>
                                        <div class="filter_overSelect_categorygp3"></div>
                                    </div>
                                    <div class="filter_checkboxes_categorygp3" style="" >
                                        <!-- options in progress -->
                                        <div class="filter_check_categorygb3 machine_reason_duration_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox3" value="all"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb3 machine_reason_duration_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox3" value="Planned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                            </div>
                                        </div>

                                        <div class="filter_check_categorygb3 machine_reason_duration_common" style="">
                                            <div class="cate_drp_check" style="">
                                                <input type="checkbox" id="one" class="categorygp_checkbox3" value="Unplanned"/>
                                            </div>
                                            <div class="cate_drp_text" style="">
                                                <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="parent_machine_reason_duration prodcution_downtime_graph parent_div marginScroll">
                            <div class="child_div child_machine_reason_duration">
                            <canvas id="machine_reason_duration" style="height:5rem;width:5rem;"></canvas>    
                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
        <div class="tab-pane fade" id="pills-table" role="tabpanel" aria-labelledby="pills-table-tab" tabindex="0">
            <div style="display:flex;flex-direction:row;height:3rem;align-items:center;">
                <div style="width:10%;display:flex;flex-direction:row;">
                    <div style="margin-left:1rem;font-size:12px;color:#8c8c8c;">
                        <input type="text" name="" id="pagination_val" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onblur="pagination_filter()" style="width:2rem;text-align:center;height:2rem;border:1px solid #e6e6e6;border-radius:0.25rem;margin-right:0.4rem;"><span>of <span id="total_page"></span>  Pages</span>
                    </div>
                </div>
                <div style="width:90%;display:flex;flex-direction:row-reverse;align-items:center;">
                    <!-- <div style=""> -->
                        <!-- reset -->
                        <div class="" style="margin-top:0.5rem;">
                           <img src="<?php echo base_url(); ?>/assets/img/filter_reset.png" style="height:1.5rem;width:1.5rem;" class="table_reset" alt="">
                        </div>
                        <!-- filter button -->
                        <button class="btn fo bn saveNotes filterbtnstyle" style="" id="apply_filter_btn">Apply Filter</button>
                        
                        <!-- created by dropdown checkbox -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Created by</label>
                            <div class="filter_selectBox_cb" onclick="created_by_drp()">
                                <select  class="multi_select_drp_cb" style="" >
                                    <option id="text_created_by_drp" style="">Created by</option>
                                </select>
                                <div class="filter_overSelect_cb"></div>
                            </div>
                            <div class="filter_checkboxes_cb" style="" >
                                <!-- <div class="filter_check_cb" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="created_by_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">All </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- Reason dropdown checkbox -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Reason</label>
                            <div class="filter_selectBox_drpr" onclick="reason_drp()">
                                <select  class="multi_select_drp_r" style="" >
                                    <option id="text_reason_drp" style="">Reason</option>
                                </select>
                                <div class="filter_overSelect_r"></div>
                            </div>
                            <div class="filter_checkboxes_r" style="" >
                                <div class="filter_check_r" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="reason_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- dropdown checkbox category -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Category</label>
                            <div class="filter_selectBox" onclick="category_drp()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_category_drp" style="">All Categories</option>
                            </select>
                            <div class="filter_overSelect"></div>
                            </div>
                            <div class="filter_checkboxes" style="" >
                                <div class="filter_check_cate" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                    </div>
                                </div>

                                <div class="filter_check_cate" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox" value="Planned"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                    </div>
                                </div>

                                <div class="filter_check_cate" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox" value="Unplanned"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <!-- dropdown checkbox partname -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">PartName</label>
                            <div class="filter_selectBox_part" onclick="partname_drp()">
                                <select  class="multi_select_drp_part" style="" >
                                    <option id="text_category_drp_part" style="">All PartName</option>
                                </select>
                                <div class="filter_overSelect_part"></div>
                            </div>
                            <div class="filter_checkboxes_part" style="" >
                                <!-- <div class="filter_check_part" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="partname_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All</p>
                                    </div>
                                </div> -->

                            </div>
                        </div>

                        <!-- dropdown checkbox machine -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Machine Name</label>
                            <div class="filter_selectBox_machine" onclick="machinename_drp()">
                            <select  class="multi_select_drp_machine" style="" >
                                <option id="text_machine_drp" style="">All Machine</option>
                            </select>
                            <div class="filter_overSelect_part"></div>
                            </div>
                            <div class="filter_checkboxes_machine" style="" >
                                <!-- <div class="filter_check_machine" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="machine_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- keywords input -->
                        <div class="box rightmar" style="margin-right:0.5rem;margin-top:2.2rem;display:none;">
                            <div class="fieldStyle input-box">
                                <input type="text" class="form-control font_weight" id="filterkeyword" style="font-size:12px;height:2.1rem;margin-top:0.5rem;" name="filterkeyword" placeholder="Search by Keyword">
                                <label for="filterkeyword" class="input-padding">Search</label>
                            </div>   
                        </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- table tamil code -->
            <div id="container_table" class="container_table" >
                <!--scroll sett-->
                <div style="width: 110rem;">
                    <!--first div for stiky start-->
                    <div class="table_row_flex">
                        <div class="fixed_col_class" >
                            <div class="fixed_col_width" >
                                <div class="fixed_col_common alignflex header_fixed_col" style="border-radius:10px 0px 0px 10px;box-shadow:0px 2px 3px 0px #e6e6e6;width:100%;">
                                    <div class=" font alignflex" style="width:30%;height:100%"> <span style="margin-left:1rem;">MACHINE</span></div>
                                    <div class="font alignflex"style="width:42%;height: 100%" > <span style="margin:auto;">FROM DATE & TIME</span></div>
                                    <div class="font alignflex"style="width:28%;height:100%"><span style="margin-left:1rem;">DURATION</span>
                                    </div>
                                </div>
                                <!-- rows in table view -->
                                <div class="fixed_rows">
                                    <!-- <div class="fixed_col_common alignflex" style="width:100%;">
                                        <div class="border-left font_row alignflex" style="width:30%;height: 100%;"><span style="margin-left:1rem;">Machine Name 1</span></div>
                                        <div class="font_row alignflex"style="width:42%;height: 100%"><span style="margin:auto;">15 Dec21,12:00</span></div>
                                        <div  class="red alignflex" style="width:28%;height: 100%;justify-content:flex-end;"><span style="margin-right:1rem;">35</span></div>
                                    </div> -->
                                </div>
                            </div>   
                        </div>
                        <!--first div for stiky end-->
                        <div class="fixed_col_class2" style="">
                            <div style="margin-left:0rem;margin-right:1rem;width:98%;">
                                <div  class="fixed_col_common2 alignflex header_fixed_col" style="border-radius:0px 10px 10px 0px;box-shadow:0px 2px 3px 0px #e6e6e6;border-left:0px;width:83%;">
                                    <div class="font alignflex " style="height:100%;width:15%;"> <span style="margin:auto   ;">TO DATE & TIME </span> </div>
                                    <div class="font alignflex" style="height:100%;width:10%;"> <span style="margin-left:1rem;">CATEGORY</span></div>
                                    <div class="font alignflex" style="height:100%;width:15%;"> <span style="margin-left:1rem;">REASON</span></div>
                                    <div class="font alignflex" style="height:100%;width:12%;"><span style="margin-left:1rem;">TOOL NAME</span></div>
                                    <div class="font alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">PART NAME</span></div>
                                    <div class="font alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">UPDATED BY</span></div>
                                    <div class="font alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">UPDATED AT</span></div>
                                    <div class="font alignflex" style="height:100%;width: 8%;"><span style="margin:auto;">NOTES</span></div>
                                </div>
                                <!-- rows in table view -->
                                <div class="scroll_rows">
                                    <!-- <div class="alignflex fixed_col_common2"  style="width:83%;">
                                        <div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;"> 15 DEC 21,12:35</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;"> Unplanned </span></div>
                                        <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;"> No Manpower</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;"> Tool Name 1</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">Part Name 1</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;"> Naveen</span></div>
                                        <div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">21 Dec 21,13:31</span></div>
                                        <div class="font_row alignflex" style="height:100%;width: 8%;justify-content:center;"><i class="fa fa-info fa-2x" ></i></div>
                                    </div> -->
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                </div > 
                <!--scroll sett end-->
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
<script src="<?php echo base_url(); ?>/assets/js/Downtime_Production.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript">

// from  date time 
$('.fromDate').datetimepicker({  
  format:'Y-m-d H:00:00',
  // minDate : '0',
  maxDate: new Date(),
  onChangeDateTime:checkPastTime_F,
  onShow:checkPastTime_F,
});

// to date time
$('.toDate').datetimepicker({
  format:'Y-m-d H:00',
  onChangeDateTime:checkPastTime,
  onShow:checkPastTime,
  maxDate: new Date()
});


// this open code has default one week date selection 
var now = new Date();

var fdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + (now.getHours()-1)).slice(-2)+":00";

//One week back
now.setDate(now.getDate() - 6);
var tdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + now.getHours()).slice(-2)+":00";
$('.toDate').val(fdate);
$('.fromDate').val(tdate);

// reason wise opportunitycost graph tooltip
function reason_oppcost_tooltip(context) {  
    // console.log(context);
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-reason_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-reason_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        // console.log("hovering"+percentage);
        var rname = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label[context.tooltip.dataPoints[0].dataIndex]
        // console.log(oppcost);
        // console.log(rname);
        // var days = parseInt(parseInt(duration/60)/24);
        // var hours = parseInt(parseInt(duration-(days*1440))/60);
        // var min = parseInt(parseInt(duration-(days*1440))%60);
        let innerHtml = '<div>';
        innerHtml += '<div class="grid-container">';

        if (parseInt(percentage)>0) {
            // console.log("percentage hovering");

            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            // innerHtml += '<div class="grid-item content-text"><span></span></div>';
            // innerHtml += '<div class="grid-item content-text-val"><span class="values-op"></span></div>';
        }else{
            // console.log("bar hovering");
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
            // innerHtml += '<div class="grid-item content-text"><span></span></div>';
            // innerHtml += '<div class="grid-item content-text-val"><span class="values-op"></span></div>';
        }
       
       
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}
// reason wise duration tooltip function
function reason_wise_duration_tooltip(context){
    // console.log(context);
     // Tooltip Element
     let tooltipEl = document.getElementById('tooltip-reason_duration');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-reason_duration';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);
        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);

        var duration = parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);


        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';
        if (parseInt(percentage)>0) {
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
        }else{
            innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text"><span>Duration</span></div>';  
            if (days>0) {
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>';
            }
            else{
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+hours+"h"+" "+min+"m"+'</span></div>';
            }
        }
     
        innerHtml += '</div>';
        innerHtml += '</div>';

        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}
// machine wise opportunity cost tooltip function
function machine_wise_oppcost_tooltip(context){
    // console.log(context);
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-machine_oppcost');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-machine_oppcost';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);
        var oppcost = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var mname = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label[context.tooltip.dataPoints[0].dataIndex]
        // console.log(oppcost);
        // console.log(mname);
        // var days = parseInt(parseInt(duration/60)/24);
        // var hours = parseInt(parseInt(duration-(days*1440))/60);
        // var min = parseInt(parseInt(duration-(days*1440))%60);
        let innerHtml = '<div>';
        innerHtml += '<div class="grid-container">';
        if (parseInt(percentage)>0) {
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            
            
        }else{
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(oppcost).toLocaleString("en-IN")+'</span></div>';
            // innerHtml += '<div class="grid-item content-text"><span></span></div>';
            // innerHtml += '<div class="grid-item content-text-val"><span class="values-op"></span></div>';
        }
      
        innerHtml += '</div>';
        innerHtml += '</div>';
        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}

// machine and reason wise tooltip function
function machine_and_reason_wise_tooltip(context){
    // console.log(context);
     // Tooltip Element
     let tooltipEl = document.getElementById('tooltip-machine_reason_duration');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-machine_reason_duration';
        document.body.appendChild(tooltipEl);
    }
    tooltipEl.classList.add("global");

    // Hide if no tooltip
    const tooltipModel = context.tooltip;
    if (tooltipModel.opacity === 0) {
        tooltipEl.style.opacity = 0;
        return;
    }

    // Set caret Position
    tooltipEl.classList.remove('above', 'below', 'no-transform');
    if (tooltipModel.yAlign) {
        tooltipEl.classList.add(tooltipModel.yAlign);
        
    } else {
        tooltipEl.classList.add('no-transform');
    }

    function getBody(bodyItem) {
        return bodyItem.lines;
    }

    // Set Text
    if (tooltipModel.body) {
        
        const titleLines = tooltipModel.title || [];
        const bodyLines = tooltipModel.body.map(getBody);

        var duration = parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        // var reject = (context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].reject[context.tooltip.dataPoints[0].dataIndex]);

        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';
        if (parseInt(percentage)>0) {
            //innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';  
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            

        }else{
            //innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text"><span>Duration</span></div>';  
            if (days>0) {
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>';
            }
            else{
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+hours+"h"+" "+min+"m"+'</span></div>';
            }
        }
      
       
        innerHtml += '</div>';
        innerHtml += '</div>';

        tooltipEl.innerHTML = innerHtml;
    }

    const position = context.chart.canvas.getBoundingClientRect();
    const bodyFont = Chart.helpers.toFont(tooltipModel.options.bodyFont);

    // Display, position, and set styles for font
    tooltipEl.style.opacity = 1;
    tooltipEl.style.position = 'absolute';
    tooltipEl.style.left = position.left + window.pageXOffset + tooltipModel.caretX + 'px';
    tooltipEl.style.top = position.top + window.pageYOffset + tooltipModel.caretY + 'px';
    tooltipEl.style.font = bodyFont.string;
    tooltipEl.style.padding = tooltipModel.padding + 'px ' + tooltipModel.padding + 'px';
    tooltipEl.style.pointerEvents = 'none';
}

// pagination filter function
function pagination_filter(){
    var value_input = $('#pagination_val').val();
    var limit_val = $('#total_page').text();
    // console.log(value_input);
    // console.log(limit_val);
    $("#overlay").fadeIn(400);
    var start_index =0;
    var end_index = 0;
    if (parseInt(value_input)>0) {
        if (parseInt(value_input)<=parseInt(limit_val)) {
            end_index = parseInt(value_input)*50;
            start_index = parseInt(end_index)-50;
            // console.log("start index"+start_index);
            // console.log("end index"+end_index);
            // pagination_filter_pass(start_index,end_index);

        }else{
            // console.log("invalid and more than limited value");
            $('#pagination_val').val('1');
            start_index = 0;
            end_index = 50;
            // pagination_filter_pass();

        }
    }else{
        // console.log("invalid and more than limited value");
        $('#pagination_val').val('1');
        start_index = 0;
        end_index = 50;
    }
    // pagination_filter_pass(start_index,end_index);
    filter_after_filter(end_index,start_index);
}


// table onclick 
function table_onclick(){
    // alert('hi');
    var demo = $('.fixed_col_common').length;
    // console.log("onclick");
    // console.log(demo);
    demo = parseInt(parseInt(demo)*4);
    $('#container_table').css('max-height',parseInt(demo)+'rem');
}

// graph view click align width
function graph_view_click(){
    var child_width = $('.child_reason_wise_oppcost').width();
    var parent_width = $('.graph_01').width();
    parent_width = parseInt(parseInt(parent_width)*12)+30;
    // console.log("parent width");
    // console.log(parent_width);
    // console.log("child width");
    // console.log(child_width);

    // reason wise graph
    if (parseInt(child_width)<=parseInt(parent_width)) {
        // console.log("error");
        $('.child_reason_wise_oppcost').css('width',parent_width+'px');
        $('.child_reason_wise_duration').css('width',parent_width+'px');
    }
    // else{
    //     console.log("no error");    
    // }

    // macine wise graph 
    var machine_parent_width = $('.graph_03').width();
    var machine_child_width = $('.child_machine_wise_oppcost').width();
    machine_parent_width = parseInt(parseInt(machine_parent_width)*12)+30;
    // console.log("macine wise graph");
    // console.log(machine_parent_width);
    if (parseInt(machine_child_width)<parseInt(machine_parent_width)) {
        $('.child_machine_wise_oppcost').css('width',machine_parent_width+'px');
        $('.child_machine_reason_duration').css('width',machine_parent_width+'px');
        
    }
}


// notes hover function
function notes_hover(ele){
    var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
    var index_val = els.indexOf(event.currentTarget);
    //   alert(index_val);
    $('.notes_display:eq('+index_val+')').css('display','block');
    //   console.log("notes index hovering"+index_val);
}


function mouse_out_check(ele1){
  var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
  var index_val1 = els.indexOf(event.currentTarget);
  $('.notes_display:eq('+index_val1+')').css("display","none");
    //   console.log("notes index  hovering remove"+index_val1);

}

// date formate change function
function date_formate_change(date_format){
    const d = new Date(date_format);

    let day_demo = d.toLocaleString('en-us',{day:'2-digit'});
    let hour_demo = d.toLocaleString('en-us',{hour12:false,hour:'2-digit'});
    let month_demo = d.toLocaleString('en-us',{month:'short'});
    let year_demo = d.toLocaleString('en-us',{year:'2-digit'});
    let minute_demo = d.toLocaleString('en-us',{minute: '2-digit'});

    var final_res = day_demo+' '+month_demo+' '+year_demo+', '+hour_demo+':'+minute_demo;
    return final_res;
}



// this function get category value 
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

// machine array
function getmachine_arr(){
    const temp_arr = [];
    $('.machine_checkbox').each(function(){
        if ($(this).is(':checked')) {
            temp_arr.push($(this).val());
        }
    });

    return temp_arr;
}

// part array
function getpart_arr(){
    const tmp_arr = [];
    $('.partname_checkbox').each(function(){
        if ($(this).is(':checked')) {
            tmp_arr.push($(this).val());
        }
    });
    return tmp_arr;
}

// created_by array
function getcreated_by_arr(){
    const tmp_arr = [];
    $('.created_by_checkbox').each(function(){
        if ($(this).is(':checked')) {
            tmp_arr.push($(this).val());
        }
    });
    return tmp_arr;
}

// reason array function
function getreason_arr(){
    const temp = [];
    $('.reason_checkbox').each(function(){
        if ($(this).is(':checked')) {
            temp.push($(this).val());
        }
    });

    return temp;
}

// on mouse up function
$(document).mouseup(function(event){

    // machine multi select dropdown
    var machine_reason = $('.filter_checkboxes_machine');
    if (!machine_reason.is(event.target) && machine_reason.has(event.target).length==0) {
        machine_reason.hide();
    }

    // part name multi select dropdown
    var partname_checkbox = $('.filter_checkboxes_part');
    if (!partname_checkbox.is(event.target) && partname_checkbox.has(event.target).length==0) {
        partname_checkbox.hide();
    }

    // created by multi seelct dropdown
    var created_by_checkbox = $('.filter_checkboxes_cb');
    if (!created_by_checkbox.is(event.target) && created_by_checkbox.has(event.target).length==0) {
        created_by_checkbox.hide();
    }

    // category dropdown multi select dropdown
    var category_drp_checkbox = $('.filter_checkboxes');
    if (!category_drp_checkbox.is(event.target) && category_drp_checkbox.has(event.target).length==0) {
        category_drp_checkbox.hide();
    }

    // reason dropdown multi select dropdown
    var reason_drp_checkbox = $('.filter_checkboxes_r');
    if (!reason_drp_checkbox.is(event.target) && reason_drp_checkbox.has(event.target).length==0) {
        reason_drp_checkbox.hide();
    }

    // graph filter mouse out side click functions
    // category dropdown out side click hide
    var gp_category = $('.filter_checkboxes_categorygp');
    if (!gp_category.is(event.target) && gp_category.has(event.target).length==0) {
        gp_category.hide();
        // getfilter_oppcost_reason();
    }

    // // reasons dropdown outside click hide
    var gp_reason = $('.filter_checkboxes_reasongp');
    if (!gp_reason.is(event.target) && gp_reason.has(event.target).length==0) {
        gp_reason.hide();
        // getfilter_oppcost_reason();
    }

    // // machine dropdown outside click hide
    var gp_machine = $('.filter_checkboxes_machinegp');
    if (!gp_machine.is(event.target) && gp_machine.has(event.target).length==0) {
        gp_machine.hide();
        // getfilter_oppcost_reason();
    }

    // reason wise duration dropdown close
    var gp_category1 = $('.filter_checkboxes_categorygp1');
    if (!gp_category1.is(event.target) && gp_category1.has(event.target).length==0) {
        gp_category1.hide();
    }

    var gp_reason1 = $('.filter_checkboxes_reasongp1');
    if (!gp_reason1.is(event.target) && gp_reason1.has(event.target).length==0) {
        gp_reason1.hide();
    }

    var gp_machine1 = $('.filter_checkboxes_machinegp1');
    if (!gp_machine1.is(event.target) && gp_machine1.has(event.target).length==0) {
        gp_machine1.hide();
    }

    // machine wise oppcost dropdown close
    var gp_category2 = $('.filter_checkboxes_categorygp2');
    if (!gp_category2.is(event.target) && gp_category2.has(event.target).length==0) {
        gp_category2.hide();
    }

    var gp_reason2 = $('.filter_checkboxes_reasongp2');
    if (!gp_reason2.is(event.target) && gp_reason2.has(event.target).length==0) {
        gp_reason2.hide();
    }

    var gp_machine2 = $('.filter_checkboxes_machinegp2');
    if (!gp_machine2.is(event.target) && gp_machine2.has(event.target).length==0) {
        gp_machine2.hide();
    }

    // machine reason duration dropdown close
    var gp_category3 = $('.filter_checkboxes_categorygp3');
    if (!gp_category3.is(event.target) && gp_category3.has(event.target).length==0) {
        gp_category3.hide();
    }

    var gp_reason3 = $('.filter_checkboxes_reasongp3');
    if (!gp_reason3.is(event.target) && gp_reason3.has(event.target).length==0) {
        gp_reason3.hide();
    }

    var gp_machine3 = $('.filter_checkboxes_machinegp3');
    if (!gp_machine3.is(event.target) && gp_machine3.has(event.target).length==0) {
        gp_machine3.hide();
    }


});

// filter onclick  function
$(document).on('click','#apply_filter_btn',function(event){
    event.preventDefault();
    
    var get_category_data = getcategory_arr();
    var machine_arr = getmachine_arr();
    var part_arr = getpart_arr();
    var reason_arr = getreason_arr();
    var created_by = getcreated_by_arr();
    if ((parseInt(get_category_data.length)>0) && (parseInt(machine_arr.length)>0) && (parseInt(part_arr.length)>0) && (parseInt(reason_arr.length)>0) && (parseInt(created_by.length)>0)) {
            $('#pagination_val').val('1');
        $("#overlay").fadeIn(400);
        var start_index = 0;
        var end_index = 50;
        filter_after_filter(end_index,start_index);
   
    }else{
        $('#pagination_val').val('1');
        $('.fixed_rows').empty();
        $('.scroll_rows').empty();
        $('#total_page').html("1");
        $('.fixed_rows').append("No Records Found");
    }

});
// after click filter and document ready function and after pagination uusing filter
function filter_after_filter(end_index,start_index){

    var get_category_data = getcategory_arr();
    var machine_arr = getmachine_arr();
    var part_arr = getpart_arr();
    var reason_arr = getreason_arr();
    var created_by = getcreated_by_arr();

    var machine_len = $('.machine_checkbox').length;
    var part_len = $('.partname_checkbox').length;
    var category_len = $('.category_drp_checkbox').length;
    var reason_len = $('.reason_checkbox').length;
    var created_by_len = $('.created_by_checkbox').length;

    // machine condition 
    var pass_machine = "";
    if (parseInt(machine_len)===parseInt(machine_arr.length)) {
        pass_machine = null;
    }else{
        pass_machine = machine_arr;
    }

    // part condition
    var pass_part = "";
    if (parseInt(part_len)===parseInt(part_arr.length)) {
        pass_part = null;
    }else{
        pass_part = part_arr;
    }

    // category_arr
    var pass_cate = "";
    if (parseInt(category_len)===parseInt(get_category_data.length)) {
        pass_cate = null;
    }else{
        pass_cate = get_category_data;
    }

    // reason condition
    var pass_reason = "";
    if (parseInt(reason_len)===parseInt(reason_arr.length)) {
        pass_reason = null;
    }else{
        pass_reason = reason_arr;
    }

    // created by condition
    var pass_created_by = "";
    if (parseInt(created_by_len)===parseInt(created_by.length)) {
        pass_created_by = null;
    }else{
        pass_created_by = created_by;
    }

    // from date and to date
    f = $('.fromDate').val();
    t = $('.toDate').val();
    from = f.replace(" ","T");
    to = t.replace(" ","T");

    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/filter_records'); ?>",
        method:"POST",
        dataType:"json",
        data:{
            pass_machine:pass_machine,
            pass_part:pass_part,
            pass_cate:pass_cate,
            pass_reason:pass_reason,
            pass_created_by:pass_created_by,
            from:from,
            to:to,   
        },
        success:function(res){
            // console.log(res);
            // console.log("table data");
            // console.log(res);
            $('.fixed_rows').empty();
            $('.scroll_rows').empty();
            // console.log("table key");
            // console.log(res['total']);
            var from_len = 0;
            var end_len = 50;
            var index = 0;
            var total_page = parseInt(res['total'])/50;
            total_page = Math.ceil(total_page);
            $('#total_page').html(total_page);
            res['data'].forEach(function(val,key){
                
                // index = parseInt(index)+1;
                if ((parseInt(key)<parseInt(end_index)) && (parseInt(key)>=parseInt(start_index))) {  
                    var elements = $();
                    var element = $();

                    var from_date = date_formate_change(from);
                    var to_date = date_formate_change(to);
                    var updated_at = date_formate_change(val.last_updated_on);
                    var tmp_duration  = val.split_duration.toString().split('.');
                    var final_tmp_duration = " ";
                    if (parseInt(tmp_duration[0])>0) {
                        if (parseInt(tmp_duration[1])>0) {
                            final_tmp_duration = tmp_duration[0]+'m'+' '+tmp_duration[1]+'s';
                        }else{
                            final_tmp_duration = tmp_duration[0]+'m'+' ';
                        }
                       
                    }else{
                        if (parseInt(tmp_duration[1])>0) {
                            final_tmp_duration = tmp_duration[1]+'s';
                        }else{
                            final_tmp_duration = '0s';
                        } 
                    }



                    elements = elements.add('<div class="fixed_col_common alignflex" style="width:100%;">'
                        +'<div class="border-left font_row alignflex" style="width:30%;height: 100%;"><span style="margin-left:1rem;">'+val.machine_name+'</span></div>'
                        +'<div class="font_row alignflex"style="width:42%;height: 100%"><span style="margin:auto;">'+from_date+'</span></div>'
                        +' <div  class="red alignflex" style="width:28%;height: 100%;justify-content:flex-end;"><span style="margin-right:1rem;">'+final_tmp_duration+'</span></div>'
                    +'</div>');


                    element = element.add('<div class="alignflex fixed_col_common2"  style="width:83%;">'
                        +'<div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;">'+to_date+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.downtime_category+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.downtime_reason+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;">'+val.tool_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.part_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.last_updated_by+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">'+updated_at+'</span></div>'
                        +'<div class="font_row alignflex "  style="height:100%;width: 8%;justify-content:center;"><div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"/></div></div>'
                        +'<div class="notes_display" style="">'
                            +'<p >'+val.notes+'</p>'
                        +'</div>'
                    +'</div>');

                    $('.fixed_rows').append(elements);
                    $('.scroll_rows').append(element);
                    // console.log("Table Data");
                    // console.log(val);
                }
                
            });
            table_onclick();

            $("#overlay").fadeOut(550);
            // var width_get = $('.fixed_rows').css('height');
            // var width_get_1 = $('.scroll_rows').css('height');
            // // console.log("table height");
            // // console.log(width_get);
            // // consoe.log(width_get_1);
            // var demo_height = parseInt(width_get)+98;
            // $('#container_table').css('height',parseInt(demo_height)+"px");
        },
        error:function(er){
            console.log("Try Again for filter button");
        }

    });       
}


// table reset click
$(document).on('click','.table_reset',function(event){
    event.preventDefault();
    $('.fixed_rows').empty();
    $('.scroll_rows').empty();
    $("#overlay").fadeIn(400);
    // reset all dropdown values
    reset_category();
    reset_created_by();
    reset_machine();
    reset_part();
    reset_reason();

    // filter function calling
    var start_index = 0;
    var end_index = 50;
    $('#pagination_val').val('1');
    
    filter_after_filter(end_index,start_index);


});


// graph onclick
$(document).on('click','.reason_oppcost_common',function(event){
    event.preventDefault();
    getfilter_oppcost_reason();
});
$(document).on('click','.reason_duration_common',function(event){
    event.preventDefault();
    getfilter_duration_reason();
    // console.log("click reason duration common");

});

$(document).on('click','.machine_oppcost_common',function(event){
    event.preventDefault();
    getfilter_machine_oppcost();
});

$(document).on('click','.machine_reason_duration_common',function(event){
    event.preventDefault();
    getfilter_machine_reason_duration();

});


// graph filter function temporary hide 

// Downtime opportunity Cost by Reasons
function getfilter_oppcost_reason(){
    //alert('hi');
    $('#reason_wise_oppcost').remove();
    $('.child_reason_wise_oppcost').append('<canvas id="reason_wise_oppcost"></canvas>');
    $('.chartjs-hidden-iframe').remove();

    // machine array
    var graph_machine_arr = [];
    $('.machinegp_checkbox').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    // reason array
    var graph_reason_arr = [];
    $('.reasongp_checkbox').each(function(){
        if ($(this).is(':checked')) {
            graph_reason_arr.push($(this).val());
        }
    });

    
    // category
    var graph_category_arr = [];
    $('.categorygp_checkbox').each(function(){
        if ($(this).is(':checked')) {
            graph_category_arr.push($(this).val());
        }
    });

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    // console.log('reason oppcost graph filter');
    // console.log(graph_machine_arr);
    // console.log(graph_category_arr);
    // console.log(graph_reason_arr);
    // console.log(f);
    // console.log(t);

    $.ajax({
        url:"<?php echo  base_url('Production_Downtime_controller/graph_filter_reason_wise_oppcost'); ?>",
        method:"POST",
        dataType:"json",
        data:{
            reason_arr:graph_reason_arr,
            machine_arr:graph_machine_arr,
            category_arr:graph_category_arr,
            from:f,
            to:t,
        },
        success:function(res){
            // console.log("filter data reason oppcost");
            // console.log(res);


            $('#reason_wise_oppcost_total').text(parseInt(res['grandTotal']).toLocaleString("en-IN"));
            // total hour and minute
            var thour = parseInt(res['total_duration'])/60;
            var tminute = parseInt(res['total_duration']%60);
            $('#total_duration_header').html(parseInt(thour)+'h'+' '+parseInt(tminute)+'m');

            var reason_label = [];
            var oppcost_arr = [];
            var reason_id_arr = [];
           

            var oppcost_percent_arr = [];
            var temp_cost_ini = 0;
            res['graph'].forEach(function(val){
                reason_label.push(val.downtime_reason);
                var tempcost = parseInt(val.opportunity_cost);
                // console.log(typeof tempcost);
                oppcost_arr.push(tempcost);
                reason_id_arr.push(val.downtime_reason_id);
                // console.log(val.downtime_reason);
                // console.log('tempcost'+tempcost);
                // console.log('ex temp cost'+temp_cost_ini);
                // console.log(res['grandTotal']);
                temp_cost_ini = parseInt(temp_cost_ini)+parseInt(tempcost);
                oppcost_percent_arr.push(temp_cost_ini);
            });

            // calculate percentage array
            var percentage_arr = [];
            oppcost_percent_arr.forEach(function(item){
                // console.log(item);
                // console.log(res['grandTotal']);
                var temp_data = parseFloat(parseInt(item)/parseInt(res['grandTotal'])).toFixed(2)*100;
                // temp_data = temp_data*100;
                percentage_arr.push(temp_data);
            });

            // console.log("temporary cost array");
            // console.log(oppcost_percent_arr);
            var bar_width = 0.6;
            var bar_size = 0.7;
        
            while(true){
                var len= reason_label.length;
                if (len < 8) {
                    reason_label.push("");
                }
                else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_reason_wise_oppcost').css("width"))+parseInt(l*18*16);
                // console.log("Reason Mapping");
                // console.log(w);
                $('.child_reason_wise_oppcost').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }
          
           
            // console.log(oppcost_percent_arr);
            // console.log(percentage_arr);
            var ctx = document.getElementById("reason_wise_oppcost").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: reason_label,
                    datasets:[{
                        type: 'line',
                        label: 'Total',
                        data: percentage_arr,
                        percentage_data:percentage_arr,
                        backgroundColor: 'white',
                        borderColor: "#7f7f7f", 
                        pointBorderColor: "#d9d9ff",  
                        borderWidth: 1, 
                        showLine : true,
                        fill: false,
                        lineColor:"black",
                        pointRadius:7,
                        yAxisID: 'A',  
                       
                    }
                    ,{
                        type: 'bar',
                        label:reason_label ,
                        data: oppcost_arr,
                        percentage_data:0,
                        // borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: '#0075F6',
                        yAxisID: 'B',
                    }
                ],
                },
                // borderColor: "#004b9b", 
                options: {
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        // y: {
                        //     display:false,
                        //     beginAtZero:true,
                        //     stacked:true
                        // },
                        A:{
                          type: 'linear',
                          position: 'right',
                          // beginAtZero: true,
                          suggestedMin: 0,
                          suggestedMax: 100,
                          display:true,
                          grid:{
                            display:false
                          },
                        },
                        B:{
                          type: 'linear',
                          position: 'left',
                          beginAtZero: true,
                          display:true,
                          grid:{
                            display:false
                          },
                        },
                        x:{
                            display:true,
                            grid:{
                            display:false
                            },
                            stacked:true,
                        },
                    },
                    plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                        external: reason_oppcost_tooltip,
                    }
                    },
                },            
            });
        }

    });
    //    console.log('filter data');
    //    console.log(graph_category_arr);
    //    console.log(graph_reason_arr);
    //    console.log(graph_machine_arr);
}


// Downtime Duration by Reasons
function getfilter_duration_reason(){
     
    $('#reason_wise_duration').remove();
    $('.child_reason_wise_duration').append('<canvas id="reason_wise_duration"></canvas>');
    $('.chartjs-hidden-iframe').remove();


    // machine array
    var graph_machine_arr = [];
    $('.machinegp_checkbox1').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    // reason array
    var graph_reason_arr = [];
    $('.reasongp_checkbox1').each(function(){
        if ($(this).is(':checked')) {
            graph_reason_arr.push($(this).val());
        }
    });

    
    // category
    var graph_category_arr = [];
    $('.categorygp_checkbox1').each(function(){
        if ($(this).is(':checked')) {
            graph_category_arr.push($(this).val());
        }
    });



    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    // console.log('reason duration graph filter');
    // console.log(graph_machine_arr);
    // console.log(graph_category_arr);
    // console.log(graph_reason_arr);
    // console.log(f);
    // console.log(t);
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getdowntime_graph_filter_reason_duration'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            from:f,
            to:t,
            reason_arr:graph_reason_arr,
            machine_arr:graph_machine_arr,
            category_arr:graph_category_arr
        },
        success:function(res){
            // console.log("Reason Wise duration graph filter");
            // console.log(res);

            var hour_text = parseInt(parseInt(res['total_duration'])/60);
            var minute_text = parseInt(parseInt(res['total_duration'])%60);
            $('#reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');

            var reason_label = [];
            var duration_arr = [];
            var reason_id_arr = [];

            var duration_percentage_arr = [];
            var duration_arr_cumulative = [];
            var total_duration = 0;
            res['graph'].forEach(function(val){
                reason_label.push(val.downtime_reason);
                var tempcost = parseInt(val.duration);
                // console.log(typeof tempcost);
                duration_arr.push(tempcost);
                reason_id_arr.push(val.downtime_reason_id);
                // console.log(val.downtime_reason);
                total_duration = parseInt(total_duration) + parseInt(tempcost);
                duration_arr_cumulative.push(total_duration);
                var temp_data = parseFloat(parseInt(total_duration)/parseInt(res['total_duration'])).toFixed(2)*100;
                duration_percentage_arr.push(temp_data);
            });

            var bar_width = 0.6;
            var bar_size = 0.7;
            
            while(true){
                var len= reason_label.length;
                if (len < 8) {
                    reason_label.push("");
                }
                else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_reason_wise_duration').css("width"))+parseInt(l*18*16);
                $('.child_reason_wise_duration').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }
            // console.log("duration by reasons");
            // console.log(duration_percentage_arr);
            var ctx = document.getElementById("reason_wise_duration").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: reason_label,
                    datasets: [{

                        type: 'line',
                        label: 'Percentage',
                        data:duration_percentage_arr,
                        percentage_data: duration_percentage_arr,
                        backgroundColor: 'white',
                        borderColor: "#7f7f7f", 
                        pointBorderColor: "#d9d9ff",  
                        borderWidth: 1, 
                        showLine : true,
                        fill: false,
                        lineColor:"black",
                        pointRadius:7,
                        yAxisID: 'A',

                      

                    },{
                        type:'bar',
                        label:reason_label,
                        data:duration_arr,
                        percentage_data:0,
                        backgroundColor: "#0075F6",
                        yAxisID: 'B',  
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        // y: {
                        //     display:false,
                        //     beginAtZero:true,
                        //     stacked:true
                        // },
                        A:{
                          type: 'linear',
                          position: 'right',
                          // beginAtZero: true,
                          suggestedMin: 0,
                          suggestedMax: 100,
                          display:true,
                          grid:{
                            display:false
                          },
                        },
                        B:{
                          type: 'linear',
                          position: 'left',
                          beginAtZero: true,
                          display:true,
                          grid:{
                            display:false
                          },
                        },
                        x:{
                            display:true,
                            grid:{
                            display:false
                            },
                            stacked:true,
                        },
                    },
                    plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                        external: reason_wise_duration_tooltip,
                    }
                    },
                },            
            });

            
        }
    });
    
}


// machine wise oppcost graph filter function 
function getfilter_machine_oppcost(){

    $('#machine_wise_oppcost').remove();
    $('.child_machine_wise_oppcost').append('<canvas id="machine_wise_oppcost"></canvas>');
    $('.chartjs-hidden-iframe').remove();


    // machine array
    var graph_machine_arr = [];
    $('.machinegp_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    // reason array
    var graph_reason_arr = [];
    $('.reasongp_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_reason_arr.push($(this).val());
        }
    });

    
    // category
    var graph_category_arr = [];
    $('.categorygp_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_category_arr.push($(this).val());
        }
    });

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    // console.log('machine wise oppcost graph filter');
    // console.log(graph_machine_arr);
    // console.log(graph_category_arr);
    // console.log(graph_reason_arr);
    // console.log(f);
    // console.log(t);
    $.ajax({
        url:'<?php echo base_url('Production_Downtime_controller/filter_machine_wise_oppcost') ?>',
        type: "POST",
        dataType: "json",
        data:{
            from:f,
            to:t,
            reason_arr:graph_reason_arr,
            machine_arr:graph_machine_arr,
            category_arr:graph_category_arr
        },
        success:function(res){
            // console.log('Machine wise oppcost');
            // console.log(res);
            $('#machine_wise_oppcost_total').text(parseInt(res['grant_total']).toLocaleString("en-IN"));
            var machine_label = [];
            var oppcost_arr = [];
            var machine_id_arr = [];

            var machine_duration_percentage = 0;
            var mdarr = [];
            var oppcost_arr_cumulative = [];
            res['graph'].forEach(function(val){
                machine_label.push(val.machine_name);
                var tempcost = parseInt(val.oppcost);
                // console.log(typeof tempcost);
                oppcost_arr.push(tempcost);
                machine_id_arr.push(val.machine_id);
                // console.log(val.downtime_reason);
                machine_duration_percentage = parseInt(machine_duration_percentage)+parseInt(tempcost);
                oppcost_arr_cumulative.push(machine_duration_percentage);
                var temp_d = parseFloat(parseInt(machine_duration_percentage)/parseInt(res['grant_total'])).toFixed(2)*100;
                mdarr.push(temp_d);
                
            });

            var bar_width = 0.6;
            var bar_size = 0.7;
        
            while(true){
                var len= machine_label.length;
                if (len < 8) {
                    machine_label.push("");
                }
                else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_machine_wise_oppcost').css("width"))+parseInt(l*18*16);
                $('.child_machine_wise_oppcost').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }

            var ctx = document.getElementById("machine_wise_oppcost").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: machine_label,
                    datasets: [{
                        type: 'line',
                        label: 'Percentage',
                        // data: oppcost_arr_cumulative,
                        percentage_data:mdarr,
                        data:mdarr,
                        backgroundColor: 'white',
                        borderColor: "#7f7f7f", 
                        pointBorderColor: "#d9d9ff",  
                        borderWidth: 1, 
                        showLine : true,
                        fill: false,
                        lineColor:"black", 
                        pointRadius:7,
                        yAxisID: 'A',  

                       
                    },{
                        label:machine_label,
                        data:oppcost_arr,
                        backgroundColor: "#0075F6",
                        percentage_data:0,
                        yAxisID: 'B',
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        // y: {
                        //     id: 'A',
                        //     type:'linear',
                        //     position:'left',
                        //     display:true,
                        //     // beginAtZero:true,
                        //     stacked:true
                        // },
                        A:{
                          type: 'linear',
                          position: 'right',
                          // beginAtZero: true,
                          suggestedMin: 0,
                          suggestedMax: 100,
                          display:true,
                          grid:{
                            display:false
                          },
                        },
                        B:{
                          type: 'linear',
                          position: 'left',
                          beginAtZero: true,
                          display:true,
                          grid:{
                            display:false
                          },
                        },
                        x:{
                            display:true,
                            grid:{
                            display:false
                            },
                            stacked:true,
                        },
                    },
                    plugins: {
                        legend: {
                            display: false,
                        },
                        tooltip: {
                            enabled: false,
                            external: machine_wise_oppcost_tooltip,
                        }
                    },
                },            
            });


        },
        error:function(er){
            // alert(er);
        }
    });

}


// machine and reason duration graph filter function
function getfilter_machine_reason_duration(){


   
    // machine array
    var graph_machine_arr = [];
    $('.machinegp_checkbox3').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    // reason array
    var graph_reason_arr = [];
    $('.reasongp_checkbox3').each(function(){
        if ($(this).is(':checked')) {
            graph_reason_arr.push($(this).val());
        }
    });

    
    // category
    var graph_category_arr = [];
    $('.categorygp_checkbox3').each(function(){
        if ($(this).is(':checked')) {
            graph_category_arr.push($(this).val());
        }
    });


    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    // console.log('machine and reason duration  graph filter');
    // console.log(graph_machine_arr);
    // console.log(graph_category_arr);
    // console.log(graph_reason_arr);
    // console.log("from date:\t"+f);
    // console.log("to date:\t"+t);
    $.ajax({
        url:'<?php echo base_url('Production_Downtime_controller/filter_machine_reason_duration') ?>',
        type: "POST",
        dataType: "json",
        data:{
            from:f,
            to:t,
            reason_arr:graph_reason_arr,
            machine_arr:graph_machine_arr,
            category_arr:graph_category_arr
        },
        success:function(res){
            // console.log('Machine and reason  wise duration');
            // console.log(res);

            $('#machine_reason_duration').remove();
            $('.child_machine_reason_duration').append('<canvas id="machine_reason_duration"></canvas>');
            $('.chartjs-hidden-iframe').remove();
    
           
            var hour_text = parseInt(parseInt(res['total_duration'])/60);
            var minute_text = parseInt(parseInt(res['total_duration'])%60);
            $('#machine_reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');


            var color = ["white","#004591","#0071EE","#97C9FF","#595959","#A6A6A6","#D9D9D9","#09BB9F","#39F3BB"];
            var demo = [];
            var x= 1;
            var machineName = [];
            var category_percent = 1.0;
            var bar_space = 0.5;
            var percentage_arr = [];
            var temp_duration = 0;
            res['data'].forEach(function(value){
                machineName.push(value.machine_name);
                temp_duration = parseInt(temp_duration)+parseInt(value.total);
                var temp_data =  parseFloat(parseInt(temp_duration)/parseInt(res['total_duration'])).toFixed(2)*100;
                percentage_arr.push(temp_data);
            });

            demo.push({
                label:"Total",
                type: "line",
                backgroundColor: 'white',
                borderColor: "#7f7f7f", 
                pointBorderColor: "#d9d9ff",  
                borderWidth: 1, 
                showLine : true,
                fill: false,
                lineColor:"black", 
                percentage_data:percentage_arr,
                data:percentage_arr,
                pointRadius: 7,
                yAxisID: 'A',  
            });

            res['reason'].forEach(function(k,val) {
                var arr_1 =[];
                var rname = [];
                res['data'].forEach(function(item){
                    arr_1.push(item.reason_duration[val]);
                    rname.push(item.reason_name[val]);
                    
                });
                demo.push({
                    label:res['reason'][val]['downtime_reason'],
                    type: "bar",
                    backgroundColor: color[x],
                    borderColor: color[x],
                    borderWidth: 1,
                    fill: true,
                    data: arr_1,
                    reasonid:val,
                    percentage_data:0,
                    // reject:machineWiseReject,
                    categoryPercentage:category_percent,
                    barPercentage: bar_space,
                    yAxisID: 'B',
                });
                x = x+1;
            });

            // console.log("graph data graph4");
            // console.log(demo);

        
            while(true){
                var len= machineName.length;
                if (len < 8) {
                machineName.push("");
                }
                else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_machine_reason_duration').css("width"))+parseInt(l*18*16);
                $('.child_machine_reason_duration').css("width",w+"px");
                break;
                }
                else{
                break;
                }
                
            }

            var ctx = document.getElementById("machine_reason_duration").getContext('2d');
            var myChart = new Chart(ctx, {
            type: 'bar',
                data: {
                    labels: machineName,
                    datasets: demo,
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        // y: {
                        //     display:false,
                        //     beginAtZero:true,
                        //     stacked:true,
                        // },
                        A:{
                            type: 'linear',
                            position: 'right',
                            // beginAtZero: true,
                            suggestedMin: 0,
                            suggestedMax: 100,
                            display:true,
                            grid:{
                                display:false
                            },
                            },
                            B:{
                            type: 'linear',
                            position: 'left',
                            beginAtZero: true,
                            display:true,
                            grid:{
                                display:false
                            },
                            },
                        x:{
                            display:true,
                            grid:{
                            display:false
                            },
                            stacked:true
                        },
                    },
                    plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                        external: machine_and_reason_wise_tooltip,
                    }
                    },
                },
            });

        },
        error:function(er){
            // alert(er);
            console.log("error "+er);
        }
    });

}


// page load time this function execute
$(document).ready(function(){

    // preloader on function
    $("#overlay").fadeIn(500);

    // filter_drp_graph_all and graph always calling this function();
    getall_filter_arr();


});

// onblur function change input filter
// from date on blur function
$(document).on('blur','.fromDate',function(event){
    event.preventDefault();

    // preloader function on load
    $("#overlay").fadeIn(400);
     // filter_drp_graph_all and graph always calling this function();
     getall_filter_arr();

  
});

// to date onblur function
$(document).on('blur','.toDate',function(event){

    event.preventDefault();  

    // // preloader function on load
    $("#overlay").fadeIn(400);
     // filter_drp_graph_all and graph always calling this function();
     getall_filter_arr();

});

// all dropdwon functions 
function getall_filter_arr(){
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getall_filter_arr') ?>",
        method:"POST",
        dataType:"json",
        success:function(res){
            console.log("All dropdown function");
            console.log(res);

            // machine
            $('.filter_checkboxes_machine').empty();
            $('.filter_checkboxes_machinegp').empty();
            $('.filter_checkboxes_machinegp1').empty();
            $('.filter_checkboxes_machinegp2').empty();
            $('.filter_checkboxes_machinegp3').empty();


            $('.filter_checkboxes_machine').append('<div class="filter_check_machine" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            $('.filter_checkboxes_machinegp').append('<div class="filter_check_machinegp reason_oppcost_common" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machinegp_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            $('.filter_checkboxes_machinegp1').append('<div class="filter_check_machinegp1 reason_duration_common" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machinegp_checkbox1" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            $('.filter_checkboxes_machinegp2').append('<div class="filter_check_machinegp2 machine_oppcost_common" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machinegp_checkbox2" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            $('.filter_checkboxes_machinegp3').append('<div class="filter_check_machinegp3 machine_reason_duration_common" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machinegp_checkbox3" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            res['machine'].forEach(function(val){
                var elements_mdrp = $();
                var element_mdrp = $();
                var ele_mdrp = $();
                var ele_1_mdrp = $();
                var ele_2_mdrp = $();



                elements_mdrp = elements_mdrp.add('<div class="filter_check_machine" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machine_checkbox" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');


                element_mdrp = element_mdrp.add('<div class="filter_check_machinegp reason_oppcost_common" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machinegp_checkbox" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                ele_mdrp = ele_mdrp.add('<div class="filter_check_machinegp1 reason_duration_common" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machinegp_checkbox1" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                ele_1_mdrp = ele_1_mdrp.add('<div class="filter_check_machinegp2 machine_oppcost_common" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machinegp_checkbox2" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                ele_2_mdrp = ele_2_mdrp.add('<div class="filter_check_machinegp3 machine_reason_duration_common" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machinegp_checkbox3" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_machine').append(elements_mdrp);
                $('.filter_checkboxes_machinegp').append(element_mdrp);
                $('.filter_checkboxes_machinegp1').append(ele_mdrp);
                $('.filter_checkboxes_machinegp2').append(ele_1_mdrp);
                $('.filter_checkboxes_machinegp3').append(ele_2_mdrp);

            });


            // part 
            $('.filter_checkboxes_part').empty();
            $('.filter_checkboxes_part').append('<div class="filter_check_part" style="">'
            +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="partname_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');
            res['part'].forEach(function(val){
                var elements_pdrp = $();
                elements_pdrp = elements_pdrp.add('<div class="filter_check_part" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="partname_checkbox" value="'+val.part_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.part_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_part').append(elements_pdrp);
            });


            // created by dropdown
            $('.filter_checkboxes_cb').empty();
            $('.filter_checkboxes_cb').append('<div class="filter_check_cb" style="">'
            +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="created_by_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>')
            res['created_by'].forEach(function(val){
                var elements_cdrp = $();
                elements_cdrp = elements_cdrp.add('<div class="filter_check_cb" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="created_by_checkbox" value="'+val.user_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.first_name+''+val.last_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_cb').append(elements_cdrp);
            });

            // downtime reason
            $('.filter_checkboxes_r').empty();
            $('.filter_checkboxes_reasongp').empty();
            $('.filter_checkboxes_reasongp1').empty();
            $('.filter_checkboxes_reasongp2').empty();
            $('.filter_checkboxes_reasongp3').empty();

            // console.log("reason dropdwon");
            // console.log(res);

            var element_ddrp = $();
            var elements_ddrp = $();
            var ele_ddrp = $();
            var ele_1_ddrp = $();
            var ele_2_ddrp = $();

            $('.filter_checkboxes_r').append('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
            $('.filter_checkboxes_reasongp').append('<div class="filter_check_reasongp reason_oppcost_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
            $('.filter_checkboxes_reasongp1').append('<div class="filter_check_reasongp1 reason_duration_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox1" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
            $('.filter_checkboxes_reasongp2').append('<div class="filter_check_reasongp2 machine_oppcost_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox2" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
            $('.filter_checkboxes_reasongp3').append('<div class="filter_check_reasongp3 machine_reason_duration_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox3" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');


            res['downtime_reason'].forEach(function(item){
                
                element_ddrp = element_ddrp.add('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
                
                elements_ddrp = elements_ddrp.add('<div class="filter_check_reasongp reason_oppcost_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');

                ele_ddrp = ele_ddrp.add('<div class="filter_check_reasongp1 reason_duration_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox1" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
                
                ele_1_ddrp = ele_1_ddrp.add('<div class="filter_check_reasongp2 machine_oppcost_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox2" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
                ele_2_ddrp = ele_2_ddrp.add('<div class="filter_check_reasongp3 machine_reason_duration_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reasongp_checkbox3" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
            
                $('.filter_checkboxes_r').append(element_ddrp);
                $('.filter_checkboxes_reasongp').append(elements_ddrp);
                $('.filter_checkboxes_reasongp1').append(ele_ddrp);
                $('.filter_checkboxes_reasongp2').append(ele_1_ddrp);
                $('.filter_checkboxes_reasongp3').append(ele_2_ddrp);             
            });
            // downtime reasons all reasons selection funciton [reset the multiselect dropdwon]
            reset_reason();
            reset_reason_gp();
            reset_reason_gp1();
            reset_reason_gp2();
            reset_reason_gp3();
            //graph filter reset category dropdown
            reset_category_gp();
            reset_category_gp1();
            reset_category_gp2();
            reset_category_gp3();
            reset_created_by();
            reset_part();
            reset_category();
            reset_machine();
            reset_machine_gp();
            reset_machine_gp1();
            reset_machine_gp2();
            reset_machine_gp3();


            // all graph 
            $('#pagination_val').val('1');
            getfilter_oppcost_reason();
            getfilter_duration_reason();
            getfilter_machine_oppcost();
            getfilter_machine_reason_duration();
            
            var end_index = 50;
            var start_index = 0;
            // filter function apply
            filter_after_filter(end_index,start_index);
            


        },
        error:function(er){
            console.log("All dropdown ajax error");
            console.log(er);
        }
    });
}

</script>