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
.fixed_scroll:eq(0) .fixed_s:nth-child(1){
    position: sticky;
    left:100px;
}

.contentAlert, .fixed_header_check{
    position: -webkit-sticky;
    position: sticky;
    top: 2rem;
}

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
          if (inputDateTime.getDate() == tmp.getDate() && inputDateTime.getMonth()==tmp.getMonth()) {
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
              if (inputDateTime.getDate()==current.getDate() && inputDateTime.getMonth()==current.getMonth()) {
                this.setOptions({
                  maxTime: (current.getHours())+ ':00',
                });
              }
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
<div class="tmp_header" style="margin-left: 4.5rem;margin-top:1rem;overflow:hidden; ">
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="position:fixed;margin-top:0;width:95%;z-index:98;">
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

                <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
                    <div class="input-box" style="width:12rem;">
                        <!-- <input type="date" name="" class="form-control fromDate" id="from"> -->
                        <input type="text" class="form-control fromDate" value="" step="1">
                        <!-- <input type="datetime-local" class="form-control" value="2013-10-24T10:00:00" step="1"> -->
                        <label for="inputSiteNameAdd" class="input-padding ">From DateTime</label>
                    </div>
                </div>
                <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
                    <div class="input-box" style="width:12rem;">
                        <!-- <input type="date" name="" class="form-control toDate"> -->
                        <input type="text" class="form-control toDate" value="" step="1">
                        <label for="inputSiteNameAdd" class="input-padding ">To DateTime</label>
                    </div>
                </div>

                <!-- overall filter btn -->
                <div class="box rightmar mar_r_box" >
                    <button type="button" class="overall_filter_btn overall_filter_header_css"  >Apply Filter</button>
                </div>
            </div>
        </div>
    </nav>
  
    <div class="tab-content" id="pills-tabContent" style="margin-top:4rem;">
        <div class="tab-pane fade show active" id="pills-graph" role="tabpanel" aria-labelledby="pills-graph-tab" tabindex="0">
            <!-- tamil design graph design -->
            <!-- <div id="graphview" class="graphview_1" style="margin-top:1rem;"> -->
                <div  class="graph_1div" >
                    <div class="graph_01 border" style="">
                        <!-- reason wise opportunity cost graph-->
                        <p  class="font graph_mar_align"> Downtime Opportunity Cost by Reasons</p>
                        <div style="display:flex;flex-direction:row;" class="marginScroll">
                            <div style="width:20%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><i class="fa fa-inr inr-class"></i><span id="reason_wise_oppcost_total"></span></p>
                                </div>
                            </div>
                            <div style="width:80%;display:flex;flex-direction:row-reverse;" >
                                <!-- Machine Dropdown checkbox -->
                                <div class="box ">
                                    <label class="multi_select_label non-select" style="">Machines</label>
                                    <div class="filter_selectBox_machinegp oppcost_reason_machine_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_machinegp','oppcost_reason_machine_drp')">
                                        <select  class="multi_select_machinegp" style="" >
                                            <option class="text_machinegp_drp non-select" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp filter_checkbox_opt " style="display:none;" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Reasons</label>
                                    <!-- <div class="filter_selectBox_reasongp" onclick="reason_multiselect_gp()"> -->
                                    <div class="filter_selectBox_reasongp oppcost_reason_reason_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_reasongp','oppcost_reason_reason_drp')">
                                        <select  class="multi_select_reasongp" style="" >
                                            <option class="text_reasongp non-select">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp filter_checkbox_opt" style="display:none;" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Categories</label>
                                    <!-- <div class="filter_selectBox_categorygp" onclick="category_multiselect_gp()"> -->
                                    <div class="filter_selectBox_categorygp oppcost_reason_category_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_categorygp','oppcost_reason_category_drp')">
                                        <select  class="multi_select_categorygp" style="" >
                                            <option class="text_categorygp non-select" style="">All Categories</option>
                                        </select>
                                        <div class="filter_overSelect_categorygp"></div>
                                    </div>
                                    <div class="filter_checkboxes_categorygp filter_checkbox_opt" style="" >
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
                                    <label class="multi_select_label non-select" style="">Machines</label>
                                    <!-- <div class="filter_selectBox_machinegp1" onclick="machine_multiselect_gp1()">  -->
                                    <div class="filter_selectBox_machinegp1 duration_reason_machine_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_machinegp1','duration_reason_machine_drp')">
                                        <select  class="multi_select_machinegp1" style="" >
                                            <option class="text_machinegp1 non-select" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp1"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp1" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Reasons</label>
                                    <!-- <div class="filter_selectBox_reasongp1" onclick="reason_multiselect_gp1();"> -->
                                    <div class="filter_selectBox_reasongp1 duration_reason_reason_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_reasongp1','duration_reason_reason_drp');">
                                        <select  class="multi_select_reasongp1" style="" >
                                            <option class="text_reasongp1 non-select" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp1"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp1" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Categories</label>
                                    <!-- <div class="filter_selectBox_categorygp1" onclick="category_multiselect_gp1()"> -->
                                    <div class="filter_selectBox_categorygp1 duration_reason_category_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_categorygp1','duration_reason_category_drp')"> 
                                        <select  class="multi_select_categorygp1" style="" >
                                            <option class="text_categorygp1 non-select" style="">All Categories</option>
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
                                    <label class="multi_select_label non-select" style="">Machines</label>
                                    <!-- <div class="filter_selectBox_machinegp2" onclick="machine_multiselect_gp2()"> -->
                                    <div class="filter_selectBox_machinegp2 oppcost_machine_machine_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_machinegp2','oppcost_machine_machine_drp')">
                                        <select  class="multi_select_machinegp2" style="" >
                                            <option class="text_machinegp2 non-select" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp2"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp2" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Reasons</label>
                                    <!-- <div class="filter_selectBox_reasongp2" onclick="reason_multiselect_gp2();"> -->
                                    <div class="filter_selectBox_reasongp2 oppcost_machine_reason_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_reasongp2','oppcost_machine_reason_drp');"> 
                                        <select  class="multi_select_reasongp2" style="" >
                                            <option class="text_reasongp2 non-select" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp2"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp2" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Categories</label>
                                    <!-- <div class="filter_selectBox_categorygp2" onclick="category_multiselect_gp2()"> -->
                                    <div class="filter_selectBox_categorygp2 oppcost_machine_category_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_categorygp2','oppcost_machine_category_drp')">
                                        <select  class="multi_select_categorygp2" style="" >
                                            <option class="text_categorygp2 non-select" style="">All Categories</option>
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
                                    <label class="multi_select_label non-select" style="">Machines</label>
                                    <!-- <div class="filter_selectBox_machinegp3" onclick="machine_multiselect_gp3()"> -->
                                    <div class="filter_selectBox_machinegp3 duration_machine_reason_machine_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_machinegp3','duration_machine_reason_machine_drp')">
                                        <select  class="multi_select_machinegp3" style="" >
                                            <option class="text_machinegp3 non-select" style="">All Machines</option>
                                        </select>
                                        <div class="filter_overSelect_machinegp3"></div>
                                    </div>
                                    <div class="filter_checkboxes_machinegp3" style="" >
                                        <!-- options in progress -->
                                    </div>
                                </div>

                                <!-- Reasons Dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Reasons</label>
                                    <!-- <div class="filter_selectBox_reasongp3" onclick="reason_multiselect_gp3();"> -->
                                    <div class="filter_selectBox_reasongp3 duration_machine_reason_reason_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_reasongp3','duration_machine_reason_reason_drp');">
                                        <select  class="multi_select_reasongp3" style="" >
                                            <option class="text_reasongp3 non-select" style="">All Reasons</option>
                                        </select>
                                        <div class="filter_overSelect_reasongp3"></div>
                                    </div>
                                    <div class="filter_checkboxes_reasongp3" style="" >
                                        <!-- options in progress -->

                                    </div>
                                </div>

                                <!-- category dropdown checkbox -->
                                <div class="box rightmar" style="margin-right: 0.5rem;" >
                                    <label class="multi_select_label non-select" style="">Categories</label>
                                    <!-- <div class="filter_selectBox_categorygp3" onclick="category_multiselect_gp3()"> -->
                                    <div class="filter_selectBox_categorygp3 duration_machine_reason_category_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_categorygp3','duration_machine_reason_category_drp')">
                                        <select  class="multi_select_categorygp3" style="" >
                                            <option class="text_categorygp3 non-select" style="">All Categories</option>
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
            <div class="tb_fl_header" style="display:flex;flex-direction:row;height:3rem;align-items:center;">
                <div style="width:20%;display:flex;flex-direction:row;">
                    <div style="margin-left:1rem;font-size:12px;color:#8c8c8c;">
                        <input type="text" name="" id="pagination_val" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onblur="pagination_filter()" style="width:2rem;text-align:center;height:2rem;border:1px solid #e6e6e6;border-radius:0.25rem;margin-right:0.4rem;"><span>of <span id="total_page"></span>  Pages</span>
                    </div>
                </div>
                <div style="width:80%;display:flex;flex-direction:row-reverse;align-items:center;margin-right:0.6rem;">
                    <!-- <div style=""> -->
                        <!-- reset -->
                        <div class="" style="margin-top:0.5rem;">
                           <img src="<?php echo base_url(); ?>/assets/img/filter_reset.png" style="height:1.5rem;width:1.5rem;" class="table_reset" alt="">
                        </div>
                        <!-- filter button -->
                        <button class="btn fo bn saveNotes filterbtnstyle" style="" id="apply_filter_btn">Apply Filter</button>
                        
                        <!-- created by dropdown checkbox -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label non-select" style="">Created by</label>
                            <!-- <div class="filter_selectBox_cb" onclick="created_by_drp()"> -->
                            <div class="filter_selectBox_cb table_filter_created_by_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_cb','table_filter_created_by_drp')">
                                <select  class="multi_select_drp_cb" style="" >
                                    <option class="text_created_by_drp non-select" style="">Created by</option>
                                </select>
                                <div class="filter_overSelect_cb"></div>
                            </div>
                            <div class="filter_checkboxes_cb" style="" >
                               
                            </div>
                        </div>

                        <!-- Reason dropdown checkbox -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label non-select" style="">Reasons</label>
                            <!-- <div class="filter_selectBox_drpr" onclick="reason_drp()"> -->
                            <div class="filter_selectBox_drpr table_reason_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_r','table_reason_drp')">
                                <select  class="multi_select_drp_r" style="" >
                                    <option class="text_reason_drp non-select" style="">Reasons</option>
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
                            <label class="multi_select_label non-select" style="">Categories</label>
                            <!-- <div class="filter_selectBox" onclick="category_drp()"> -->
                            <div class="filter_selectBox table_filter_category_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes','table_filter_category_drp')">   
                                <select  class="multi_select_drp" style="" >
                                    <option class="text_category_drp non-select" style="">All Categories</option>
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
                            <label class="multi_select_label non-select" style="">Parts</label>
                            <!-- <div class="filter_selectBox_part" onclick="partname_drp()"> -->
                            <div class="filter_selectBox_part table_filter_part_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_part','table_filter_part_drp')">
                                <select  class="multi_select_drp_part" style="" >
                                    <option class="text_category_drp_part non-select" style="">All Parts</option>
                                </select>
                                <div class="filter_overSelect_part"></div>
                            </div>
                            <div class="filter_checkboxes_part" style="" >
                               
                            </div>
                        </div>

                        <!-- dropdown checkbox machine -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label non-select" style="">Machines</label>
                            <!-- <div class="filter_selectBox_machine" onclick="machinename_drp()"> -->
                            <div class="filter_selectBox_machine table_filter_machine_drp non-select select-pointer" onclick="multiple_drp_hide_seek_pd('filter_checkboxes_machine','table_filter_machine_drp')">
                                <select  class="multi_select_drp_machine non-select" style="" >
                                    <option class="text_machine_drp non-select" style="">All Machines</option>
                                </select>
                                <div class="filter_overSelect_part"></div>
                            </div>
                            <div class="filter_checkboxes_machine" style="" >
                              
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
           
            <div class="table_height_width" style="width:100%;height:10rem;margin-top:0.2rem;overflow:scroll;padding-left:0.2rem;padding-right:0.2rem;">
                <div style="width:90rem;">
                    <div class="header_fixed_col" style="z-index:95;">
                        <div class="font alignflex" style="width:10%;position: sticky;height:100%;left:0px;border-radius:10px 0px 0px 10px;background:white;">
                            <span style="margin-left:1rem;">MACHINE</span>
                        </div>
                        <div class="font alignflex" style="width:15%;position: sticky;left:120px;background:white;height:100%;">
                            <span style="margin: auto;">FROM DATE & TIME</span>
                        </div>
                        <div class="font alignflex" style="width:10%;position: sticky;left:295px;background:white;height:100%;">
                            <span style="margin: auto;">DURATION</span>
                        </div>
                        <div class="font alignflex" style="width:15%;height:100%;">
                            <span style="margin: auto;">TO DATE & TIME</span>
                        </div>
                        <div class="font alignflex" style="width:10%;height:100%;">
                            <span style="margin-left: 1rem;">CATEGORY</span>
                        </div>
                        <div class="font alignflex" style="width:13%;height:100%;">
                            <span style="margin-left: 1rem;">REASON</span>
                        </div>
                        <div class="font alignflex" style="width:11%;height:100%;">
                            <span style="margin-left: 1rem;">TOOL NAME</span>
                        </div>

                        <div class="font alignflex" style="width:11%;height:100%;">
                            <span style="margin-left: 1rem;">PART NAME</span>
                        </div>

                        <div class="font alignflex" style="width:10%;height:100%;">
                            <span style="margin-left: 1rem;">UPDATED BY</span>
                        </div>

                        <div class="font alignflex" style="width:10%;height:100%;">
                            <span style="margin-left: 1rem;">UPDATED AT</span>
                        </div>

                        <div class="font alignflex" style="width:7%;height:100%;">
                            <span style="margin-left: 1rem;">NOTES</span>
                        </div>

                    </div>

                    <div class="production_downtime_content">    </div>
                </div>
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


// hide and seek gloable variables
const drp_obj = {
    // cost by reason graph variable
    oppcost_reason_machine_drp:false,
    oppcost_reason_reason_drp:false,
    oppcost_reason_category_drp:false,

    // duration by reason graph varaiable
    duration_reason_machine_drp:false,
    duration_reason_category_drp:false,
    duration_reason_reason_drp:false,

    // oppcost by machine graph variables
    oppcost_machine_machine_drp:false,
    oppcost_machine_reason_drp:false,
    oppcost_machine_category_drp:false,

    // duration by machine with reasons graph
    duration_machine_reason_machine_drp:false,
    duration_machine_reason_category_drp:false,
    duration_machine_reason_reason_drp:false,


    // table filter drp function key
    table_filter_created_by_drp:false,
    table_reason_drp:false,
    table_filter_category_drp:false,
    table_filter_part_drp:false,
    table_filter_machine_drp:false,


};

// dropdown click open close global function 
function multiple_drp_hide_seek_pd(classref,keyref){
    $('.filter_checkbox_opt').css('display','none');
    if (!drp_obj[keyref]) {
        $('.'+classref+'').css('display','inline');
        drp_obj[keyref]=true;
    }else{
        $('.'+classref+'').css('display','none');
        drp_obj[keyref]=false;
    }
}


// from  date time 
$('.fromDate').datetimepicker({  
  format:'Y-m-d H:00',
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
        var rname = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label[context.tooltip.dataPoints[0].dataIndex]
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
            // innerHtml += '<div class="grid-item content-text"><span></span></div>';
            // innerHtml += '<div class="grid-item content-text-val"><span class="values-op"></span></div>';
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
// reason wise duration tooltip function
function reason_wise_duration_tooltip(context){
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
    $("#overlay").fadeIn(400);
    var start_index =0;
    var end_index = 0;
    if (parseInt(value_input)>0) {
        if (parseInt(value_input)<=parseInt(limit_val)) {
            end_index = parseInt(value_input)*50;
            start_index = parseInt(end_index)-50;
            // pagination_filter_pass(start_index,end_index);

        }else{
            $('#pagination_val').val('1');
            start_index = 0;
            end_index = 50;
            // pagination_filter_pass();
        }
    }else{
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
    // var demo = $('.fixed_col_common').length;
    // demo = parseInt(parseInt(demo)*4);
    // $('#container_table').css('max-height',parseInt(demo)+'rem');

    var tmp_h = $('.full_screen_mode_oui_disturb').height();
    var nav_h = $('.tb_fl_header').height();
    var sub_header = $('.fixsubnav').height();
    var my_height = parseInt(tmp_h)+parseInt(nav_h)+parseInt(sub_header)+48;
    var overall_height = $(window).height();
    var get_height = parseInt(overall_height) - parseInt(my_height);
    $('.table_height_width').css('height',parseInt(get_height)+'px');    



}

// graph view click align width
function graph_view_click(){
    var child_width = $('.child_reason_wise_oppcost').width();
    var parent_width = $('.graph_01').width();
    parent_width = parseInt(parseInt(parent_width)*12)+30;

    // reason wise graph
    if (parseInt(child_width)<=parseInt(parent_width)) {
        $('.child_reason_wise_oppcost').css('width',parent_width+'px');
        $('.child_reason_wise_duration').css('width',parent_width+'px');
    }

    // macine wise graph 
    var machine_parent_width = $('.graph_03').width();
    var machine_child_width = $('.child_machine_wise_oppcost').width();
    machine_parent_width = parseInt(parseInt(machine_parent_width)*12)+30;

    if (parseInt(machine_child_width)<parseInt(machine_parent_width)) {
        $('.child_machine_wise_oppcost').css('width',machine_parent_width+'px');
        $('.child_machine_reason_duration').css('width',machine_parent_width+'px');
        
    }
}


// notes hover function
function notes_hover(ele){
    var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
    var index_val = els.indexOf(event.currentTarget);
    $('.demo_notes:eq('+index_val+')').css('visibility','visible');
}


function mouse_out_check(ele1){
  var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
  var index_val1 = els.indexOf(event.currentTarget);
  $('.demo_notes:eq('+index_val1+')').css("visibility","hidden");
}

// date formate change function
function date_formate_change(date_format){
    var d = new Date(date_format);

    let day_demo = d.toLocaleString('en-us',{day:'2-digit'});
    let hour_demo = d.toLocaleString('en-us',{hour12:false,hour:'2-digit'});
    let month_demo = d.toLocaleString('en-us',{month:'short'});
    let year_demo = d.toLocaleString('en-us',{year:'2-digit'});
    let minute_demo = d.toLocaleString('en-us',{minute:'2-digit'});

    var tmp_minute = parseInt(minute_demo)>9?parseInt(minute_demo):'0'+parseInt(minute_demo);
    var tmp_hour = parseInt(hour_demo)>9?parseInt(hour_demo):'0'+parseInt(hour_demo);
    var tmp_day = parseInt(day_demo)>9?parseInt(day_demo):'0'+parseInt(day_demo);

    var final_res = tmp_day+' '+month_demo+' '+year_demo+', '+tmp_hour+':'+tmp_minute;
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
    var table_filter_machine_drp = $('.table_filter_machine_drp');
    if (!machine_reason.is(event.target) && machine_reason.has(event.target).length==0 && !table_filter_machine_drp.is(event.target) && table_filter_machine_drp.has(event.target).length==0) {
        if (drp_obj['table_filter_machine_drp']==true) {
            drp_obj['table_filter_machine_drp']=false;
            machine_reason.hide();
        }
    }

    // part name multi select dropdown
    var partname_checkbox = $('.filter_checkboxes_part');
    var table_filter_part_drp = $('.table_filter_part_drp');
    if (!partname_checkbox.is(event.target) && partname_checkbox.has(event.target).length==0 && !table_filter_part_drp.is(event.target) && table_filter_part_drp.has(event.target).length==0) {
        if (drp_obj['table_filter_part_drp']==true) {
            drp_obj['table_filter_part_drp']=false;
            partname_checkbox.hide();
        }
    }

    // created by multi seelct dropdown
    var created_by_checkbox = $('.filter_checkboxes_cb');
    var created_by_drp_tmp = $('.table_filter_created_by_drp');
    if (!created_by_checkbox.is(event.target) && created_by_checkbox.has(event.target).length==0 && !created_by_drp_tmp.is(event.target) && created_by_drp_tmp.has(event.target).length==0) {
        if (drp_obj['table_filter_created_by_drp']==true) {
            drp_obj['table_filter_created_by_drp']=false;
            created_by_checkbox.hide();

        }
    }

    // category dropdown multi select dropdown
    var category_drp_checkbox = $('.filter_checkboxes');
    var table_filter_category_drp = $('.table_filter_category_drp');
    if (!category_drp_checkbox.is(event.target) && category_drp_checkbox.has(event.target).length==0 && !table_filter_category_drp.is(event.target) && table_filter_category_drp.has(event.target).length==0 ) {
        if (drp_obj['table_filter_category_drp']==true) {
            drp_obj['table_filter_category_drp']=false;
            category_drp_checkbox.hide();
        }
    }

    // reason dropdown multi select dropdown
    var reason_drp_checkbox = $('.filter_checkboxes_r');
    var table_filter_reason_drp = $('.table_reason_drp');
    if (!reason_drp_checkbox.is(event.target) && reason_drp_checkbox.has(event.target).length==0 && !table_filter_reason_drp.is(event.target) && table_filter_reason_drp.has(event.target).length==0) {
        if (drp_obj['table_reason_drp']==true) {
            drp_obj['table_reason_drp']=false;
            reason_drp_checkbox.hide();
        }
    }

    // graph filter mouse out side click functions
    // category dropdown out side click hide
    var gp_category = $('.filter_checkboxes_categorygp');
    var oppcost_reason_category_drp = $('.oppcost_reason_category_drp')
    if (!gp_category.is(event.target) && gp_category.has(event.target).length==0 && !oppcost_reason_category_drp.is(event.target) && oppcost_reason_category_drp.has(event.target).length==0) {
        if (drp_obj['oppcost_reason_category_drp']==true) {
            gp_category.hide();
            drp_obj['oppcost_reason_category_drp']=false;
        }
    }

    // // reasons dropdown outside click hide
    var gp_reason = $('.filter_checkboxes_reasongp');
    var oppcost_reason_rdrp = $('.oppcost_reason_reason_drp');
    if (!gp_reason.is(event.target) && gp_reason.has(event.target).length==0 && !oppcost_reason_rdrp.is(event.target) && oppcost_reason_rdrp.has(event.target).length==0) {
        if (drp_obj['oppcost_reason_reason_drp']==true) {
            gp_reason.hide();
            drp_obj['oppcost_reason_reason_drp']=false;
        }
    }

    // machine dropdown outside click hide
    var gp_machine = $('.filter_checkboxes_machinegp');
    var cost_by_reason_m = $('.oppcost_reason_machine_drp');
    if (!gp_machine.is(event.target) && gp_machine.has(event.target).length==0 && !cost_by_reason_m.is(event.target) && cost_by_reason_m.has(event.target).length==0) {
        if (drp_obj['oppcost_reason_machine_drp']==true) {
            gp_machine.hide();
            drp_obj['oppcost_reason_machine_drp']=false;
        }
    }

    // reason wise duration dropdown close
    var gp_category1 = $('.filter_checkboxes_categorygp1');
    var duration_reason_category_drp = $('.duration_reason_category_drp');
    if (!gp_category1.is(event.target) && gp_category1.has(event.target).length==0 && !duration_reason_category_drp.is(event.target) && duration_reason_category_drp.has(event.target).length==0) {
        if (drp_obj['duration_reason_category_drp']==true) {
            drp_obj['duration_reason_category_drp']=false;
            gp_category1.hide();
        }
    }

    var gp_reason1 = $('.filter_checkboxes_reasongp1');
    var duration_reason_reason_drp = $('.duration_reason_reason_drp');
    if (!gp_reason1.is(event.target) && gp_reason1.has(event.target).length==0 && !duration_reason_reason_drp.is(event.target) && duration_reason_reason_drp.has(event.target).length==0) {
        if (drp_obj['duration_reason_reason_drp']==true) {
            drp_obj['duration_reason_reason_drp']=false;
            gp_reason1.hide();
        }
    }

    var gp_machine1 = $('.filter_checkboxes_machinegp1');
    var duration_reason_machine_drp = $('.duration_reason_machine_drp');
    if (!gp_machine1.is(event.target) && gp_machine1.has(event.target).length==0 && !duration_reason_machine_drp.is(event.target) && duration_reason_machine_drp.has(event.target).length==0) {
        if (drp_obj['duration_reason_machine_drp']==true) {
            drp_obj['duration_reason_machine_drp']=false;
            gp_machine1.hide();
        }
    }

    // machine wise oppcost dropdown close
    var gp_category2 = $('.filter_checkboxes_categorygp2');
    var oppcost_machine_category_drp = $('.oppcost_machine_category_drp');
    if (!gp_category2.is(event.target) && gp_category2.has(event.target).length==0 && !oppcost_machine_category_drp.is(event.target) && oppcost_machine_category_drp.has(event.target).length==0) {
        if (drp_obj['oppcost_machine_category_drp']==true) {
            drp_obj['oppcost_machine_category_drp']=false;
            gp_category2.hide();
        }
        
    }

    var gp_reason2 = $('.filter_checkboxes_reasongp2');
    var oppcost_machine_reason_drp = $('.oppcost_machine_reason_drp');
    if (!gp_reason2.is(event.target) && gp_reason2.has(event.target).length==0 && !oppcost_machine_reason_drp.is(event.target) && oppcost_machine_reason_drp.has(event.target).length==0) {
        if (drp_obj['oppcost_machine_reason_drp']==true) {
            drp_obj['oppcost_machine_reason_drp']=false;
            gp_reason2.hide();
        }
    }

    var gp_machine2 = $('.filter_checkboxes_machinegp2');
    var oppcost_machine_machine_drp = $('.oppcost_machine_machine_drp');
    if (!gp_machine2.is(event.target) && gp_machine2.has(event.target).length==0 && !oppcost_machine_machine_drp.is(event.target) && oppcost_machine_machine_drp.has(event.target).length==0) {
        if (drp_obj['oppcost_machine_machine_drp']==true) {
            drp_obj['oppcost_machine_machine_drp']=false;
            gp_machine2.hide();
        }
    }

    // machine reason duration dropdown close
    var gp_category3 = $('.filter_checkboxes_categorygp3');
    var duration_machine_reason_category_drp = $('.duration_machine_reason_category_drp');
    if (!gp_category3.is(event.target) && gp_category3.has(event.target).length==0 && !duration_machine_reason_category_drp.is(event.target) && duration_machine_reason_category_drp.has(event.target).length==0) {
        if (drp_obj['duration_machine_reason_category_drp']==true) {
            drp_obj['duration_machine_reason_category_drp']=false;
            gp_category3.hide();
        }
    }

    var gp_reason3 = $('.filter_checkboxes_reasongp3');
    var duration_machine_reason_reason_drp  =$('.duration_machine_reason_reason_drp');
    if (!gp_reason3.is(event.target) && gp_reason3.has(event.target).length==0 && !duration_machine_reason_reason_drp.is(event.target) && duration_machine_reason_reason_drp.has(event.target).length==0) {
        if (drp_obj['duration_machine_reason_reason_drp']==true) {
            drp_obj['duration_machine_reason_reason_drp']=false;
            gp_reason3.hide();
        }
    }

    var gp_machine3 = $('.filter_checkboxes_machinegp3');
    var duration_machine_reason_machine_drp = $('.duration_machine_reason_machine_drp');
    if (!gp_machine3.is(event.target) && gp_machine3.has(event.target).length==0 && !duration_machine_reason_machine_drp.is(event.target) && duration_machine_reason_machine_drp.has(event.target).length==0) {
        if (drp_obj['duration_machine_reason_machine_drp']==true) {
            drp_obj['duration_machine_reason_machine_drp']=false;
            gp_machine3.hide();
        }
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

    // var machine_len = $('.machine_checkbox').length;
    // var part_len = $('.partname_checkbox').length;
    // var category_len = $('.category_drp_checkbox').length;
    // var reason_len = $('.reason_checkbox').length;
    // var created_by_len = $('.created_by_checkbox').length;

  

    // // machine condition 
    // var pass_machine = "";
    // if (parseInt(machine_len)===parseInt(machine_arr.length)) {
    //     pass_machine = null;
    // }else{
        pass_machine = machine_arr;
    // }

    // // part condition
    // var pass_part = "";
    // if (parseInt(part_len)===parseInt(part_arr.length)) {
    //     pass_part = null;
    // }else{
        pass_part = part_arr;
    // }

    // // category_arr
    // var pass_cate = "";
    // if (parseInt(category_len)===parseInt(get_category_data.length)) {
    //     pass_cate = null;
    // }else{
        pass_cate = get_category_data;
    // }

    // // reason condition
    // var pass_reason = "";
    // if (parseInt(reason_len)===parseInt(reason_arr.length)) {
    //     pass_reason = null;
    // }else{
        pass_reason = reason_arr;
    // }

    // // created by condition
    // var pass_created_by = "";
    // if (parseInt(created_by_len)===parseInt(created_by.length)) {
    //     pass_created_by = null;
    // }else{
        pass_created_by = created_by;
    // }

    // from date and to date
    f = $('.fromDate').val();
    t = $('.toDate').val();
    from = f.replace(" ","T");
    to = t.replace(" ","T");
    // console.log(from);
    // console.log(to);
    // console.log("prodcution downtime table filter values");
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
            // console.log("prouction downtime records table");
            // console.log(res);
            $('.production_downtime_content').empty();
            // $('.scroll_rows').empty();
            var from_len = 0;
            var end_len = 50;
            var index = 0;
            var total_page = parseInt(res['total'])/50;
            total_page = Math.ceil(total_page);
            $('#total_page').html(total_page);
            if (parseInt(res['data'].length)>0) {
                res['data'].forEach(function(val,key){
                
                    // index = parseInt(index)+1;
                    if ((parseInt(key)<parseInt(end_index)) && (parseInt(key)>=parseInt(start_index))) {  
                        var elements = $();
                        var element = $();

                        var from_date = date_formate_change(val.shift_date+'T'+val.start_time);
                        var to_date = date_formate_change(val.shift_date+'T'+val.end_time);
                        var updated_at = date_formate_change(val.last_updated_on);
                        
                        var tmp_duration  = val.split_duration.toString().split('.');
                        var final_tmp_duration = " ";
                        if (tmp_duration.length > 1) {
                        final_tmp_duration = tmp_duration[0]+'m'+' '+tmp_duration[1]+'s';
                        }else{
                        final_tmp_duration = tmp_duration[0]+'m';
                        }

                        elements = elements.add('<div style="display:flex;flex-direction:row;border:1px solid rgba(242,242,242);border-radius:10px;margin-bottom:0.5rem;height:3.5rem;width:100%;">'
                            +'<div class="font_row alignflex fixed_record" style="width:9.5%;left:0px;border-radius:10px 0px 0px 10px;">'
                                +'<span style="margin: auto;">'+val.machine_name+'</span>'
                            +' </div>'
                            +'<div class="font_row alignflex fixed_record" style="width:14%;left:118px;">'
                                +'<span style="margin: auto;">'+from_date+'</span>'
                            +'</div>'
                            +'<div class="red alignflex fixed_record" style="width:9.6%;left:290px;">'
                                +'<span style="margin: auto;">'+final_tmp_duration+'</span>'
                            +'</div>'
                            +'<div class="font_row alignflex to_date_width" style="">'
                                +'<span style="margin: auto;">'+to_date+'</span>'
                            +' </div>'
                            +'<div class="font_row alignflex dcategory_width" style="">'
                                +'<span style="margin-left:1rem;">'+val.downtime_category+'</span>'
                            +'</div>'
                            +' <div class="font_row alignflex dreason_width" style="">'
                                +'<span style="margin-left:1rem;">'+val.downtime_reason+'</span>'
                            +'</div>'
                            +'<div class="font_row alignflex tool_name_width" style="">'
                                +'<span style="margin-left:1rem;">'+val.tool_name+'</span>'
                            +'</div>'
                            +'<div class="font_row alignflex part_name_width" style="">'
                                +'<span style="margin-left:1rem;">'+val.part_name+'</span>'
                            +'</div>'
                            +'<div class="font_row alignflex last_updated_width" style="">'
                                +'<span style="margin:auto;">'+val.last_updated_by+'</span>'
                            +'</div>'
                            +'<div class="font_row alignflex updated_at_width" style="">'
                                +'<span style="margin:auto;" title="'+updated_at+'">'+updated_at+'</span>'
                            +'</div>'
                            // +'<div class="font_row alignflex " style="width:6.5%;">'
                            //     +'<div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh"  data-bs-toggle="tooltip" data-bs-placement="left" title="Tooltip on left"/></div>'
                            // +'</div>'
                             +'<div class="font_row alignflex " style="width:6.5%;">'
                                +'<div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh"   onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"></div>'
                                +'<div class="demo_notes" style="">'
                                +'<p>'+val.notes+'</p>'
                                +'</div>'
                            +'</div>'
                           
                        +'</div>');


                        // element = element.add('<div class="alignflex fixed_col_common2"  style="width:83%;">'
                        //     +'<div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;">'+to_date+'</span></div>'
                        //     +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.downtime_category+'</span></div>'
                        //     +' <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.downtime_reason+'</span></div>'
                        //     +' <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;">'+val.tool_name+'</span></div>'
                        //     +'<div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.part_name+'</span></div>'
                        //     +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.last_updated_by+'</span></div>'
                        //     +'<div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">'+updated_at+'</span></div>'
                        //     +'<div class="font_row alignflex "  style="height:100%;width: 8%;justify-content:center;"><div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"/></div></div>'
                        //     +'<div class="notes_display" style="">'
                        //         +'<p >'+val.notes+'</p>'
                        //     +'</div>'
                        // +'</div>');

                        $('.production_downtime_content').append(elements);
                        // $('.scroll_rows').append(element);
                    }
                
                });
                table_onclick();

              
            }else{
                $('.production_downtime_content').append('<p class="no_record_css">No Records...</p>');
            }
            $("#overlay").fadeOut(550);
            // var width_get = $('.fixed_rows').css('height');
            // var width_get_1 = $('.scroll_rows').css('height');
            // var demo_height = parseInt(width_get)+98;
            // $('#container_table').css('height',parseInt(demo_height)+"px");
        },
        error:function(er){
          // alert("Error");
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
            $('#reason_wise_oppcost_total').text(parseInt(res['grandTotal']).toLocaleString("en-IN"));
            // total hour and minute
            var thour = parseInt(res['total_duration'])/60;
            var tminute = parseInt(res['total_duration']%60);
            $('#total_duration_header').html(parseInt(thour)+'h'+' '+parseInt(tminute)+'m');

            var category_percent = 1.0;
            var bar_space = 0.5;

            var reason_label = [];
            var oppcost_arr = [];
            var reason_id_arr = [];
           

            var oppcost_percent_arr = [];
            var temp_cost_ini = 0;
            res['graph'].forEach(function(val){
                reason_label.push(val.downtime_reason);
                var tempcost = parseInt(val.opportunity_cost);
                oppcost_arr.push(tempcost);
                reason_id_arr.push(val.downtime_reason_id);
                temp_cost_ini = parseInt(temp_cost_ini)+parseInt(tempcost);
                oppcost_percent_arr.push(temp_cost_ini);
            });

            // calculate percentage array
            var percentage_arr = [];
            oppcost_percent_arr.forEach(function(item){
                var temp_data = parseFloat(parseInt(item)/parseInt(res['grandTotal'])*100).toFixed(2);
                // temp_data = temp_data*100;
                percentage_arr.push(temp_data);
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
                var w= parseInt($('.parent_reason_wise_oppcost').css("width"))+parseInt(l*18*16);

                $('.child_reason_wise_oppcost').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }
          
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
                        categoryPercentage:category_percent,
                        barPercentage: bar_space,
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
                          // For Percentage.....
                          ticks: {
                            callback: function(value, index, values) {
                              return value + '%';
                            }
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
                          // For Rupee Symbol.....
                          ticks: {
                            callback: function(value, index, values) {
                              return '₹' + value;
                            }
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

            var hour_text = parseInt(parseInt(res['total_duration'])/60);
            var minute_text = parseInt(parseInt(res['total_duration'])%60);
            $('#reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');

            var category_percent = 1.0;
            var bar_space = 0.5;

            var reason_label = [];
            var duration_arr = [];
            var reason_id_arr = [];

            var duration_percentage_arr = [];
            var duration_arr_cumulative = [];
            var total_duration = 0;
            res['graph'].forEach(function(val){
                reason_label.push(val.downtime_reason);
                var tempcost = parseInt(val.duration);
                duration_arr.push(tempcost);
                reason_id_arr.push(val.downtime_reason_id);
                total_duration = parseInt(total_duration) + parseInt(tempcost);
                duration_arr_cumulative.push(total_duration);
                var temp_data = parseFloat(parseInt(total_duration)/parseInt(res['total_duration'])*100).toFixed(2);
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
                        categoryPercentage:category_percent,
                        barPercentage: bar_space,
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
                          // For Percentage.....
                          ticks: {
                            callback: function(value, index, values) {
                              return value + '%';
                            }
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
                          // For Rupee Symbol.....
                          ticks: {
                            callback: function(value, index, values) {
                              return value;
                            }
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
            $('#machine_wise_oppcost_total').text(parseInt(res['grant_total']).toLocaleString("en-IN"));
            var machine_label = [];
            var oppcost_arr = [];
            var machine_id_arr = [];

            var category_percent = 1.0;
            var bar_space = 0.5;
            
            var machine_duration_percentage = 0;
            var mdarr = [];
            var oppcost_arr_cumulative = [];
            res['graph'].forEach(function(val){
                machine_label.push(val.machine_name);
                var tempcost = parseInt(val.oppcost);
                oppcost_arr.push(tempcost);
                machine_id_arr.push(val.machine_id);
                machine_duration_percentage = parseInt(machine_duration_percentage)+parseInt(tempcost);
                oppcost_arr_cumulative.push(machine_duration_percentage);
                var temp_d = parseFloat(parseInt(machine_duration_percentage)/parseInt(res['grant_total'])*100).toFixed(2);
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
                        categoryPercentage:category_percent,
                        barPercentage: bar_space,
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
                          // For Percentage.....
                          ticks: {
                            callback: function(value, index, values) {
                              return value + '%';
                            }
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
                          // For Rupee Symbol.....
                          ticks: {
                            callback: function(value, index, values) {
                              return '₹' + value;
                            }
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
            console.log("machine duration graph filter");
            console.log(res);
            $('#machine_reason_duration').remove();
            $('.child_machine_reason_duration').append('<canvas id="machine_reason_duration"></canvas>');
            $('.chartjs-hidden-iframe').remove();
    
           
            var hour_text = parseInt(parseInt(res['total_duration'])/60);
            var minute_text = parseInt(parseInt(res['total_duration'])%60);
            $('#machine_reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');

            var color = ["white","#004b9b","#0071EE","#DE5B88","#53a6ff","#cde5ff",
                    "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
                    "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
                    "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
                    "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
                    "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
                    "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
                    "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
                    "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
                    "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
                    "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
                ];
            // var color = ["white","#004591","#0071EE","#97C9FF","#595959","#A6A6A6","#D9D9D9","#09BB9F","#39F3BB"];
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
                var temp_data =  parseFloat(parseInt(temp_duration)/parseInt(res['total_duration'])*100).toFixed(2);
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
                            // For Percentage.....
                            ticks: {
                              callback: function(value, index, values) {
                                return value + '%';
                              }
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
                            stacked:true,
                            // For Rupee Symbol.....
                            ticks: {
                                callback: function(value, index, values) {
                                    return  value;
                                }
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
        }
    });

}


// page load time this function execute
$(document).ready(function(){

    // preloader on function
    $("#overlay").fadeIn(500);

    // filter_drp_graph_all and graph always calling this function();
    // getall_filter_arr();
    graph_loader();

});

// overall filter button onclick funciton
$(document).on('click','.overall_filter_btn',function(event){
    event.preventDefault();
    $("#overlay").fadeIn(400);
    graph_loader();
}); 

/* temporary hide for this function 
// onblur function change input filter
// from date on blur function
$(document).on('blur','.fromDate',function(event){
    // event.preventDefault();

    // preloader function on load
    $("#overlay").fadeIn(400);
    graph_loader();
  
});

// to date onblur function
$(document).on('blur','.toDate',function(event){

    // event.preventDefault();  

    // // preloader function on load
    $("#overlay").fadeIn(400);
    graph_loader();

});

*/
// all dropdwon functions 
function getall_filter_arr(){
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getall_filter_arr') ?>",
        method:"POST",
        dataType:"json",
        success:function(res){

            // machine
            $('.filter_checkboxes_machine').empty();
            $('.filter_checkboxes_machinegp').empty();
            $('.filter_checkboxes_machinegp1').empty();
            $('.filter_checkboxes_machinegp2').empty();
            $('.filter_checkboxes_machinegp3').empty();


            $('.filter_checkboxes_machine').append('<div class="filter_check_machine" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox"  value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            $('.filter_checkboxes_machinegp').append('<div class="filter_check_machinegp reason_oppcost_common"  style="">'
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



                // elements_mdrp = elements_mdrp.add('<div class="filter_check_machine" style="">'
                // +'<div class="cate_drp_check " style="">'
                // +'<input type="checkbox" id="one" class="machine_checkbox" value="'+val.machine_id+'"/>'
                // +'</div>'
                // +'<div class="cate_drp_text" style="">'
                // +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                // +'</div>'
                // +'</div>');

                elements_mdrp = elements_mdrp.add('<div class="filter_check_machine" style="display:flex;flex-direction:row;height:2.3rem;position:relative;padding:12px 0;">'
                +'<div class="cate_drp_check " style="">'
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
                
                element_ddrp = element_ddrp.add('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="'+item.downtime_reason_id+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
                
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
            // getfilter_oppcost_reason();
            // getfilter_duration_reason();
            // getfilter_machine_oppcost();
            // getfilter_machine_reason_duration();
            
            var end_index = 50;
            var start_index = 0;
            // filter function apply
            filter_after_filter(end_index,start_index);
            


        },
        error:function(er){
          // alert("Error");
        }
    });
}

async function graph_loader(){
    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    await first_load_reason_oppcost(f,t);
    await first_load_reason_duration(f,t);
    await first_load_machine_oppcost(f,t);
    await first_load_machine_duration(f,t);

    getall_filter_arr();

    // $('#overlay').fadeOut(300);
}

// first loader functions
function first_load_reason_oppcost(f,t){
    return  new Promise(function (resolve,reject){
        $('#reason_wise_oppcost').remove();
        $('.child_reason_wise_oppcost').append('<canvas id="reason_wise_oppcost"></canvas>');
        $('.chartjs-hidden-iframe').remove();

       
        $.ajax({
            url:"<?php echo base_url('Production_Downtime_controller/first_reason_oppcost'); ?>",
            method:"POST",
            dataType:"json",
            data:{
                from:f,
                to:t
            },
            success:function(res){
                resolve(res);
                $('#reason_wise_oppcost_total').text(parseInt(res['grandTotal']).toLocaleString("en-IN"));
                // total hour and minute
                var thour = parseInt(res['total_duration'])/60;
                var tminute = parseInt(res['total_duration']%60);
                $('#total_duration_header').html(parseInt(thour)+'h'+' '+parseInt(tminute)+'m');

                var category_percent = 1.0;
                var bar_space = 0.5;

                var reason_label = [];
                var oppcost_arr = [];
                var reason_id_arr = [];
            

                var oppcost_percent_arr = [];
                var temp_cost_ini = 0;
                res['graph'].forEach(function(val){
                    reason_label.push(val.downtime_reason);
                    var tempcost = parseInt(val.opportunity_cost);
                    oppcost_arr.push(tempcost);
                    reason_id_arr.push(val.downtime_reason_id);
                    temp_cost_ini = parseInt(temp_cost_ini)+parseInt(tempcost);
                    oppcost_percent_arr.push(temp_cost_ini);
                });

                // calculate percentage array
                var percentage_arr = [];
                oppcost_percent_arr.forEach(function(item){
                    var temp_data = parseFloat(parseInt(item)/parseInt(res['grandTotal'])*100).toFixed(2);
                    percentage_arr.push(temp_data);
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
                        var w= parseInt($('.parent_reason_wise_oppcost').css("width"))+parseInt(l*18*4);
                    
                        $('.child_reason_wise_oppcost').css("width",w+"px");
                        break;
                    }
                    else{
                        break;
                    }
                }
            
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
                            categoryPercentage:category_percent,
                            barPercentage: bar_space,
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
                            // For Percentage.....
                            ticks: {
                              callback: function(value, index, values) {
                                return value + '%';
                              }
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
                            // For Rupee Symbol.....
                            ticks: {
                              callback: function(value, index, values) {
                                return '₹' + value;
                              }
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
            },
            error:function(er){
                reject(er);
            }
        });
    });  
}

// reason duration graph
function first_load_reason_duration(f,t){
    return  new Promise(function (resolve,reject){
        $('#reason_wise_duration').remove();
        $('.child_reason_wise_duration').append('<canvas id="reason_wise_duration"></canvas>');
        $('.chartjs-hidden-iframe').remove();

      
        $.ajax({
            url:"<?php echo base_url('Production_Downtime_controller/first_reason_duration'); ?>",
            method:"POST",
            dataType:"json",
            data:{
                from:f,
                to:t,
            },
            success:function(res){
                console.log("downtime duration reason")
                console.log(res);
                resolve(res);

                var hour_text = parseInt(parseInt(res['total_duration'])/60);
                var minute_text = parseInt(parseInt(res['total_duration'])%60);
                $('#reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');

                var category_percent = 1.0;
                var bar_space = 0.5;

                var reason_label = [];
                var duration_arr = [];
                var reason_id_arr = [];

                var duration_percentage_arr = [];
                var duration_arr_cumulative = [];
                var total_duration = 0;
                res['graph'].forEach(function(val){
                    reason_label.push(val.downtime_reason);
                    var tempcost = parseInt(val.duration);
                    duration_arr.push(tempcost);
                    reason_id_arr.push(val.downtime_reason_id);
                    total_duration = parseInt(total_duration) + parseInt(tempcost);
                    duration_arr_cumulative.push(total_duration);
                    var temp_data = parseFloat(parseInt(total_duration)/parseInt(res['total_duration'])*100).toFixed(2);
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
                        var w= parseInt($('.parent_reason_wise_duration').css("width"))+parseInt(l*18*4);
                        $('.child_reason_wise_duration').css("width",w+"px");
                        break;
                    }
                    else{
                        break;
                    }
                }
            
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
                            categoryPercentage:category_percent,
                            barPercentage: bar_space,
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
                            // For Percentage.....
                            ticks: {
                              callback: function(value, index, values) {
                                return value + '%';
                              }
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
                            // For Rupee Symbol.....
                            ticks: {
                              callback: function(value, index, values) {
                                return value;
                              }
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


            },
            error:function(er){
                reject(er);
            }
        });
    });
}

//  downtime oppcost by machine 
function first_load_machine_oppcost(f,t){
    return  new Promise(function (resolve,reject){
        $('#machine_wise_oppcost').remove();
        $('.child_machine_wise_oppcost').append('<canvas id="machine_wise_oppcost"></canvas>');
        $('.chartjs-hidden-iframe').remove();

        // f = $('.fromDate').val();
        // t = $('.toDate').val();
        // f = f.replace(" ","T");
        // t = t.replace(" ","T");

        $.ajax({
            url:"<?php echo  base_url('Production_Downtime_controller/first_machine_oppcost'); ?>",
            method:"POST",
            dataType:"json",
            data:{
                from:f,
                to:t
            },
            success:function(res){
                resolve(res);
                $('#machine_wise_oppcost_total').text(parseInt(res['grant_total']).toLocaleString("en-IN"));
                var machine_label = [];
                var oppcost_arr = [];
                var machine_id_arr = [];

                var category_percent = 1.0;
                var bar_space = 0.5;
                
                var machine_duration_percentage = 0;
                var mdarr = [];
                var oppcost_arr_cumulative = [];
                res['graph'].forEach(function(val){
                    machine_label.push(val.machine_name);
                    var tempcost = parseInt(val.oppcost);
                    oppcost_arr.push(tempcost);
                    machine_id_arr.push(val.machine_id);
                    machine_duration_percentage = parseInt(machine_duration_percentage)+parseInt(tempcost);
                    oppcost_arr_cumulative.push(machine_duration_percentage);
                    var temp_d = parseFloat(parseInt(machine_duration_percentage)/parseInt(res['grant_total'])*100).toFixed(2);
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
                            categoryPercentage:category_percent,
                            barPercentage: bar_space,
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
                            // For Percentage.....
                            ticks: {
                              callback: function(value, index, values) {
                                return value + '%';
                              }
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
                            // For Rupee Symbol.....
                            ticks: {
                              callback: function(value, index, values) {
                                return '₹' + value;
                              }
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
                reject(er);
            }
        });
    });
}

// downtime duration by machine 
function first_load_machine_duration(f,t){
    return  new Promise(function (resolve,reject){
       
        $.ajax({
            url:"<?php echo  base_url('Production_Downtime_controller/first_machine_duration'); ?>",
            method:"POST",
            dataType:"JSON",
            data:{
                from:f,
                to:t
            },
            success:function(res){
                resolve(res);
                console.log("machine duration");
                console.log(res);
                $('#machine_reason_duration').remove();
                $('.child_machine_reason_duration').append('<canvas id="machine_reason_duration"></canvas>');
                $('.chartjs-hidden-iframe').remove();           
                var hour_text = parseInt(parseInt(res['total_duration'])/60);
                var minute_text = parseInt(parseInt(res['total_duration'])%60);
                $('#machine_reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');

                color = ["white","#004b9b","#0071EE","#DE5B88","#53a6ff","#cde5ff",
                    "#fedc97", "#b5b682", "#7c9885", "#28666e", "#033f63",
                    "#eae2b7", "#a69cac", "#474973", "#161b33", "#0d0c1d",
                    "#662d91", "#720e9e", "#4B0082", "#33006F", "#023047",
                    "#0071c5", "#0066b2", "#004792", "#002387", "#000080",
                    "#4B9CD3", "#1F75FE", "#1034A6", "#003399", "#0a2351",
                    "#0000FF", "#0000CD", "#00008B", "#012169", "#011F5B",
                    "#034694", "#3457D5", "#002fa7", "#2c3968", "#14213d",
                    "#eaac8b", "#D8BFD8", "#DDA0DD", "#e56b6f", "#850000",
                    "#219ebc", "#00a8e8", "#00509d", "#0530ad", "#0018A8",
                    "#00BFFF", "#fcbf49", "#fb8500", "#8f2d56", "#323031",
                ];
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
                    var temp_data =  parseFloat(parseInt(temp_duration)/parseInt(res['total_duration'])*100).toFixed(2);
                    percentage_arr.push(temp_data);
                });

                demo.push({
                    label:"Total",
                    type: "line",
                    backgroundColor: color[0],
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
                        console.log(item.reason_name[val]);
                        
                    });
                    demo.push({
                        label:res['reason'][val]['downtime_reason'],
                        type: "bar",
                        backgroundColor: color[x],
                        borderColor: color[x],
                        // borderColor:'white',
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
                    console.log("color code is :\t"+color[x]);
                    x = x+1;
                });
                console.log(demo);
                console.log('loading time descending order');
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
                                // For Percentage.....
                                ticks: {
                                  callback: function(value, index, values) {
                                    return value + '%';
                                  }
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
                                stacked:true,
                                // For Rupee Symbol.....
                                ticks: {
                                  callback: function(value, index, values) {
                                    return value;
                                  }
                                },
                                },
                            x:{
                                display:true,
                                grid:{
                                display:false,
                                
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
              reject(er);
            }
        });
    });  
}
</script>