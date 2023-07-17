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
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/oee_drill_down.css?version=<?php echo rand() ; ?>">

<!-- style css -->
<style>
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
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="position:fixed;margin-top:0;width:94.5%;">
        <div class="container-fluid paddingm">
            <p class="float-start" id="logo">OEE Drill Down</p>
            <div class="d-flex">
               
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

    <!-- first row -->
    <div class="first_row" style="">
        <div class="overall_div" style="">
            <!-- overall teep div -->
            
            <div style="position:inherit;" class="target_bar_bottom">
                <p class="graph_text" style="">Overall TEEP%</p>
                <div class="empty_graph teep_graph_hover" >
                    <div class="target_graph" id="teep_target" style="display:flex;flex-direction:row;justify-content:start;align-items:center;">
                        <div class="fill_graph" id="teep_graph" style="">
                            <span class="graph_font"  id="text_teep"></span>
                        </div>
                    </div>
                </div>
                <div class="target_hover_div" style="">
                    <div class="hover_flex" style="">
                        <div class="hover_text_div" style="">
                            <div class="hover_text_color_div" style="">
                                <div class="val_color_div" style=""></div>
                            </div>
                            TEEP
                        </div>
                        <div style="width:50%;text-align:end;"><span id="teep_val_hover">30</span>%</div>
                    </div>
                    <div class="hover_flex">
                        <div class="hover_flex" >
                            <div class="hover_text_color_div" >
                                <div class="target_color_div" style=""></div>
                            </div>
                            Target
                        </div>
                        <div style="width:50%;text-align:end;"><span id="target_teep_val_hover">30</span></div>
                    </div>
                </div>
            </div>

            <!--  Overall OOE% -->
            <div style="position:inherit;" class="target_bar_bottom">
                <p class="graph_text" >Overall OOE%</p>
                <div class="empty_graph ooe_graph_hover" >
                    <div class="target_graph" id="ooe_target" style="display:flex;flex-direction:row;justify-content:start;align-items:center;">
                        <div class="fill_graph" id="ooe_graph">
                            <span class="graph_font" id="text_ooe"></span>
                        </div>
                    </div>
                </div>
                <div class="target_hover_div" style="">
                    <div class="hover_flex" style="">
                        <div class="hover_text_div" style="">
                            <div class="hover_text_color_div" style="">
                                <div class="val_color_div" style=""></div>
                            </div>
                            OOE
                        </div>
                        <div style="width:50%;text-align:end;"><span id="ooe_val_hover">30</span>%</div>
                    </div>
                    <div class="hover_flex">
                        <div class="hover_flex" >
                            <div class="hover_text_color_div" >
                                <div class="target_color_div" style=""></div>
                            </div>
                            Target
                        </div>
                        <div style="width:50%;text-align:end;"><span id="target_ooe_val_hover">30</span></div>
                    </div>
                </div>
            </div>

            <!-- overall OEE% -->
            <div style="position:inherit;" class="target_bar_bottom">
                <p class="graph_text" >Overall OEE%</p>
                <div class="empty_graph oee_graph_hover">
                    <div class="target_graph"  id="oee_target" style="display:flex;flex-direction:row;justify-content:start;align-items:center;">
                        <div class="fill_graph" id="oee_graph" >
                            <span class="graph_font" id="text_oee"></span>
                        </div>
                    </div>
                </div>
                <div class="target_hover_div" style="">
                    <div class="hover_flex" style="">
                        <div class="hover_text_div" style="">
                            <div class="hover_text_color_div" style="">
                                <div class="val_color_div" style=""></div>
                            </div>
                            OOE
                        </div>
                        <div style="width:50%;text-align:end;"><span id="oee_val_hover">30</span>%</div>
                    </div>
                    <div class="hover_flex">
                        <div class="hover_flex" >
                            <div class="hover_text_color_div" >
                                <div class="target_color_div" style=""></div>
                            </div>
                            Target
                        </div>
                        <div style="width:50%;text-align:end;"><span id="target_oee_val_hover">30</span></div>
                    </div>
                </div>
            </div>

            <div class="target_bar_bottom">
                <div class="overall_label_flex" style="">
                    <div style="width:40%;"></div>
                    <div class="overall_div_label" style="">
                        <div style="width:20%;">
                            <div class="actual_label_color" style=""></div>                    
                        </div>
                        <div style="width:80%;">
                            <span class="auctal_label_text" style="">Actual</span>                    
                        </div>
                    </div>
                    <div class="overall_div_label" style="margin-right:0rem;">
                        <div style="width:20%;">
                            <div class="target_label_color" style=""></div>                    
                        </div>
                        <div style="width:80%;">
                            <span class="auctal_label_text" >Target</span>                    
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
        <div class="oee_trend_div" style="">
            <div class="title_div" style="">
                <p class="graph_title_oee" >OEE Trend</p>
            </div>
            <div  style="" class="marginScroll oee_trend_drp_div">
                 <!-- category multi select dropdown -->
                <div class="box rightmar" style="margin-right: 0.5rem;display:none;" >
                    <div class="filter_selectBox" onclick="byday_click()">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_category_drp" style="">By Day</option>
                        </select>
                        <div class="filter_overSelect"></div>
                    </div>
                    <div class="filter_checkboxes byday_fill" style="" >
                        <div class="filter_check_cate byday_click" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="by_day_checkbox" value="all"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">All</p>
                            </div>
                        </div>

                        <div class="filter_check_cate byday_click" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="by_day_checkbox" value="by_week"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">By Week</p>
                            </div>
                        </div>

                        <div class="filter_check_cate byday_click" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="by_day_checkbox" value="by_month"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">By Month</p>
                            </div>
                        </div>
                        <div class="filter_check_cate byday_click" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="by_day_checkbox" value="by_shift"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">By Shift</p>
                            </div>
                        </div>
                        <div class="filter_check_cate byday_click" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="by_day_checkbox" value="by_day"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">By Day</p>
                            </div>
                        </div>
                    </div>
                </div>

               
                <!-- Machine multi select dropdown -->
                <div class="box " style="" >
                    <label class="multi_select_label" style="">Machines</label>
                    <div class="filter_selectBox" onclick="machine_drp()">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_machine" style="">All Machines</option>
                        </select>
                        <div class="filter_overSelect"></div>
                    </div>
                    <div class="filter_checkboxes filter_checkboxes_machine" style="" >
                    </div>
                </div>
               


            </div>
            <div class="parent_oee_trend prodcution_downtime_graph parent_div marginScroll" >
                <div class="child_div child_oee_trend">
                    <canvas id="oee_trend" style="height:5rem;width:5rem;"></canvas>    
                </div>
            </div>
        </div>
    </div>

    <!-- second row -->
    <div class="second_row" style="">
        <div class="each_row_split" >
            <!-- title -->
            <div class="title_div" style="">
                <p class="graph_title_oee" >Machine-wise OEE% Breakdown</p>
            </div>
            <!-- dropdowns -->
            <div class="graph_filter_div marginScroll" style="">
                
                <!-- reason multi select dropdown -->
                <div class="box rightmar" style="margin-right: 0.5rem;" >
                    <label class="multi_select_label" style="">All Data Field</label>
                    <div class="filter_selectBox" onclick="all_data_field_click_fun()">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_all_data_field" style="">All Data Fields</option>
                        </select>
                        <div class="filter_overSelect"></div>
                    </div>
                    <div class="filter_checkboxes all_data_field_fill" style="" >
                        <div class="filter_check_cate all_data_field_click machine_oee_common" style="">
                            <div class="cate_drp_check " style="">
                                <input type="checkbox" id="one" class="all_data_field_checkbox" value="all"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">All Data Field</p>
                            </div>
                        </div>
                        <!-- oee -->
                        <div class="filter_check_cate all_data_field_click machine_oee_common" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="all_data_field_checkbox" value="oee"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">OEE</p>
                            </div>
                        </div>
                        <!-- availability -->
                        <div class="filter_check_cate all_data_field_click machine_oee_common" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="all_data_field_checkbox" value="availability"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">Availability</p>
                            </div>
                        </div>
                        <!-- performance -->
                        <div class="filter_check_cate all_data_field_click machine_oee_common" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="all_data_field_checkbox" value="performance"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">Performance</p>
                            </div>
                        </div>
                        <!-- quality -->
                        <div class="filter_check_cate all_data_field_click machine_oee_common" style="">
                            <div class="cate_drp_check" style="">
                                <input type="checkbox" id="one" class="all_data_field_checkbox" value="quality"/>
                            </div>
                            <div class="cate_drp_text" style="">
                                <p class="font_multi_drp" style="margin:auto;">Quality</p>
                            </div>
                        </div>


                    </div>
                </div>
               
                <!-- Machine multi select dropdown -->
                <div class="box " style="" >
                    <label class="multi_select_label" style="">Machine</label>
                    <div class="filter_selectBox" onclick="machine_drp1()">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_machine1" style="">All Machines</option>
                        </select>
                        <div class="filter_overSelect"></div>
                    </div>
                    <div class="filter_checkboxes filter_checkboxes_machine1" style="" >
                    </div>
                </div>
               
            </div>

            <!-- graph -->
            <div class="parent_machine_wise_oee prodcution_downtime_graph parent_div marginScroll" >
                <div class="child_div child_machine_wise_oee">
                    <canvas id="machine_wise_oee" style="height:5rem;width:5rem;"></canvas>    
                </div>
            </div>

            <div class="icons_bottom" style="">
                <div class="align_icons" style="">
                    <div class="align_machine_icons" style=""><div class="quality_circle" style=""></div></div>
                    <div style="width:80%;">
                        <span class="graph_label_font" >Quality</span>
                    </div>
                </div>
                <div class="align_icons" style="">
                    <div class="align_machine_icons" ><i class="fa-solid fa-diamond" style="color: #0075F6;font-size:0.8rem;"></i></div>
                    <div style="width:80%;">
                        <span class="graph_label_font" >Performance</span>
                    </div>
                </div>
                <div class="align_icons" style="">
                    <div class="align_machine_icons" ><div class="availability_triangle" style=""></div></div>
                    <div style="width:80%;">
                        <span class="graph_label_font" style="">Availability</span>
                    </div>
                </div>
                <div class="align_icons" style="">
                    <div class="align_machine_icons" ><div class="oee_square" style=""></div></div>
                    <div style="width:80%;">
                        <span class="graph_label_font" >OEE%</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="each_row_split" >
             <!-- title -->
             <div class="title_div" >
                <p class="graph_title_oee" >Machine-wise Availability with Reasons</p>
            </div>

             <!-- dropdowns -->
            <div  style="" class="marginScroll machine_wise_availability_div">
                <div style="width:max-content;">
                    <p class="header_text_val" style="">TOTAL</p>
                    <span class="header_value_pass" style="" id="total_duration_availability">0</span>
                </div>
                <div style="" class="availability_drp_div">
                    <!-- category multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 0.5rem;" >
                        <label class="multi_select_label" style="">Categorie</label>
                        <div class="filter_selectBox" onclick="category_drp2()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_category_drp2" style="">All Categories</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes category_fill2 " style="" >
                            <div class="filter_check_cate category_click2 machine_availability_common" style="">
                                <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox2" value="all"/>
                                </div>
                                <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                </div>
                            </div>

                            <div class="filter_check_cate category_click2 machine_availability_common" style="">
                                <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox2" value="Planned"/>
                                </div>
                                <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                </div>
                            </div>

                            <div class="filter_check_cate category_click2 machine_availability_common" style="">
                                <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox2" value="Unplanned"/>
                                </div>
                                <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- reason multi select dropdown -->
                    <div class="box " style="margin-right:0.5rem;" >
                        <label class="multi_select_label" style="">Reason</label>
                        <div class="filter_selectBox" onclick="reason_drp2()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_reason2" style="">All Reasons</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes reason_fill2" style="" ></div>
                    </div>
                
                    <!-- Machine multi select dropdown -->
                    <div class="box " style="" >
                        <label class="multi_select_label" style="">Machine</label>
                        <div class="filter_selectBox" onclick="machine_drp2()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_machine2" style="">All Machines</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes filter_checkboxes_machine2" style="" >
                        </div>
                    </div>
                </div>
            </div>

            <!-- graph -->
            <div class="parent_machine_reason_availability prodcution_downtime_graph parent_div marginScroll" >
                <div class="child_div child_machine_reason_availability">
                    <canvas id="machine_reason_availability" style="height:5rem;width:5rem;"></canvas>    
                </div>
            </div>

        </div>
    </div>

    <!-- third row -->
    <div class="second_row" style="margin-bottom:1rem;">
        <div class="each_row_split" style="">
            <!-- graph title -->
            <div class="title_div" >
                <p class="graph_title_oee" style="">Machine-wise Performance with Parts</p>
            </div>
            <!-- flex for dropdown and total -->
            <div class="marginScroll machine_wise_availability_div">
                <div style="width:max-content;">
                    <p class="header_text_val" >TOTAL</p>
                    <span class="header_value_pass"  id="total_speed_loss">0</span>
                </div>
                <div style="" class="performance_drp_div">    
                    <!-- reason multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 0.5rem;" >
                        <label class="multi_select_label" style="">Part</label>
                        <div class="filter_selectBox" onclick="part_drp()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_part" style="">All Parts</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes part_fill" style="" ></div>
                    </div>
               
                    <!-- Machine multi select dropdown -->
                    <div class="box"  >
                        <label class="multi_select_label" style="">Machine</label>
                        <div class="filter_selectBox" onclick="machine_drp3()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_machine3" style="">All Machines</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes filter_checkboxes_machine3" style="" >
                        </div>
                    </div>
                </div>
            </div>
           

            <!-- graph -->
            <div class="parent_graph_performance_opportunity prodcution_downtime_graph parent_div marginScroll" >
                <div class="child_graph_performance_opportunity child_div ">
                    <canvas id="performanceOpportunity" style="height:5rem;width:5rem;"></canvas>    
                </div>
            </div>

        </div>
        <div class="each_row_split" >
              <!-- graph title -->
              <div class="title_div" >
                <p class="graph_title_oee" style="">Machine-wise Quality with Reasons</p>
            </div>
             <!-- flex for dropdown and total -->
             <div  class="marginScroll machine_wise_availability_div">
                <div style="width:20%;">
                    <p class="header_text_val" >TOTAL</p>
                    <span class="header_value_pass" id="total_machine_reason_quality">0</span>
                </div>
                <div style="" class="quality_drp_div">    
                    <!-- reason multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 0.5rem;" >
                        <label class="multi_select_label" style="">Reason</label>
                        <div class="filter_selectBox" onclick="quality_reason_drp()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_quality_reason" style="">All Reasons</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes quality_reason_fill" style="" ></div>
                    </div>
               
                    <!-- Machine multi select dropdown -->
                    <div class="box " >
                        <label class="multi_select_label" style="">Machine</label>
                        <div class="filter_selectBox" onclick="machine_drp4()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_machine4" style="">All Machines</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes filter_checkboxes_machine4" style="" >
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- graph -->
            <div class="parent_quality_reason_machine prodcution_downtime_graph parent_div marginScroll" >
                <div class="child_quality_reason_machine child_div ">
                    <canvas id="quality_reason_machine" style="height:5rem;width:5rem;"></canvas>    
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
<script src="<?php echo base_url(); ?>/assets/js/oee_drill_down.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript">

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


// from date on blur function
$(document).on('blur','.fromDate',function(event){
   // event.preventDefault();
    $('#overlay').fadeIn(400);
    //    overall dropdown values and graph visible this function only
    // get_all_filter_drp_fill();
    all_graph_fun();
});

// todate onblur function
$(document).on('blur','.toDate',function(event){
    //event.preventDefault();

    $('#overlay').fadeIn(400);
    //    overall dropdown values and graph visible this function only
    // get_all_filter_drp_fill();
    all_graph_fun();

});

// async function all_graph_blur_fromdate(){
//     console.log("on blur to date filter");
//     await fill_target_bar.then(x=>console.log(x));
//     await over_all_target_graph.then(x=>console.log(x));
//     await first_load_oee_trend_day.then(x=>console.log(x));
//     await first_load_quality
//     await first_machine_wise_oee
//     await first_loader_performance
//     await first_load_availability
//     await get_all_filter_drp_fill
//     $('#overlay').fadeOut(500);
// }

// in Document ready function calling
$(document).ready(function(){
    $('#overlay').fadeIn(400);
    //    overall dropdown values and graph visible this function only
    // get_all_filter_drp_fill();
    all_graph_fun();
});




// by day shift and month week
function resetbyday_click(){
    var category_arr = $('.by_day_checkbox');
    jQuery('.by_day_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#by_day_checkbox').text('By Day');
}

  

// availability graph reset categroy
function reset_category2(){
    var category_arr = $('.category_drp_checkbox2');
    jQuery('.category_drp_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_category_drp2').text('All Categorys');
}


// availability graph
function reset_reason2(){
    var category_arr = $('.reason_checkbox2');
    jQuery('.reason_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_reason2').text('All Reasons');
}

function reset_quality_reason(){
    var category_arr = $('.quality_checkbox');
    jQuery('.quality_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_quality_reason').text('All Reasons');
}

function reset_machine(){
    var category_arr = $('.machine_checkbox');
    jQuery('.machine_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine').text('All Machines');
}

function reset_machine1(){
    var category_arr = $('.machine_checkbox1');
    jQuery('.machine_checkbox1').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine1').text('All Machines');
}

// availability graph
function reset_machine2(){
    var category_arr = $('.machine_checkbox2');
    jQuery('.machine_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine2').text('All Machines');
}


function reset_machine3(){
    var category_arr = $('.machine_checkbox3');
    jQuery('.machine_checkbox3').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine3').text('All Machines');
}


function reset_machine4(){
    var category_arr = $('.machine_checkbox4');
    jQuery('.machine_checkbox4').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine4').text('All Machines');
}

function reset_part(){
    var category_arr = $('.part_checkbox');
    jQuery('.part_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_part').text('All Parts');
}


function reset_all_data_field(){
    var category_arr = $('.all_data_field_checkbox');
    jQuery('.all_data_field_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_all_data_field').text('All Data Fields');
}


// by day shift meek month
var filter_expand_by_day = 0;
function byday_click(){
    var checkboxes = document.getElementsByClassName("byday_fill");
  if (!filter_expand_by_day) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.byday_fill').css("display","block");
      filter_expand_by_day = true;
  } else  {
     
    //   $('#text_category_drp').text('All ');
      $('.byday_fill').css("display","none");
      filter_expand_by_day = false;
      
  }
}

// availability graph
var filter_expanded2 = false;
function category_drp2() {
  // event.preventDefault();
  var checkboxes = document.getElementsByClassName("category_fill2");
  if (!filter_expanded2) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.category_fill2').css("display","block");
      filter_expanded2 = true;
  } else  {

      
     
      $('#text_category_drp2').text('All category');
      $('.category_fill2').css("display","none");
      filter_expanded2 = false;
    //   availabilityReason_machine();
  }
}

// reason
// availability graph
var filter_expanded_reason2 = false;
function reason_drp2() {
  // event.preventDefault();
  var checkboxes2 = document.getElementsByClassName("reason_fill2");
  if (!filter_expanded_reason2) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.reason_fill2').css("display","block");
      filter_expanded_reason2 = true;
  } else  {
      
      $('#text_reason2').text('All Reason');
      $('.reason_fill2').css("display","none");
      filter_expanded_reason2 = false;
    //   availabilityReason_machine();
  }
}


var reason_expand_filter_quality = false;
function quality_reason_drp() {
  // event.preventDefault();
  var checkboxes2 = document.getElementsByClassName("quality_reason_fill");
  if (!reason_expand_filter_quality) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.quality_reason_fill').css("display","block");
      reason_expand_filter_quality = true;
  } else  {
     
      $('#text_quality_reason').text('All Reason');
      $('.quality_reason_fill').css("display","none");
      reason_expand_filter_quality = false;
    //   availabilityReason_machine();
    // quality_reason_machine();
  }
}

// machine
var filter_expanded_machine1 = false;
function machine_drp1() {
 
  var checkboxes1 = document.getElementsByClassName("filter_checkboxes_machine1");
  if (!filter_expanded_machine1) {
   
      $('.filter_checkboxes_machine1').css("display","block");
      filter_expanded_machine1 = true;
  } else  {
     
       
        $('.filter_checkboxes_machine1').css("display","none");
        filter_expanded_machine1 = false;
        // machineWiseOEE();

  }
}

var filter_expanded_machine = false;
function machine_drp() {

  var checkboxes2 = document.getElementsByClassName("filter_checkboxes_machine");
  if (!filter_expanded_machine) {
   
      $('.filter_checkboxes_machine').css("display","block");
      filter_expanded_machine = true;
  } else  {
   
    //   $('#text_machine').text('All Machine');
      $('.filter_checkboxes_machine').css("display","none");
      filter_expanded_machine = false;
    //   oeeTrendDay();
  }
}

var filter_expanded_machine2 = false;
function machine_drp2() {
 
  var checkboxes2 = document.getElementsByClassName("filter_checkboxes_machine2");
  if (!filter_expanded_machine2) {
   
      $('.filter_checkboxes_machine2').css("display","block");
      filter_expanded_machine2 = true;
  } else  {
      
    //   $('#text_machine2').text('All Machine');
      $('.filter_checkboxes_machine2').css("display","none");
      filter_expanded_machine2 = false;
    //   availabilityReason_machine();
  }
}

var filter_expanded_machine3 = false;
function machine_drp3() {
 
  var checkboxes3 = document.getElementsByClassName("filter_checkboxes_machine3");
  if (!filter_expanded_machine3) {
   
      $('.filter_checkboxes_machine3').css("display","block");
      filter_expanded_machine3 = true;
  } else  {

      
    //   $('#text_machine3').text('All Machine');
      $('.filter_checkboxes_machine3').css("display","none");
      filter_expanded_machine3 = false;
    //   performance_opportunity();
  }
}

var filter_expanded_machine4 = false;
function machine_drp4() {
 
  var checkboxes4 = document.getElementsByClassName("filter_checkboxes_machine4");
  if (!filter_expanded_machine4) {
   
    $('.filter_checkboxes_machine4').css("display","block");
    filter_expanded_machine4 = true;
    
  } else  {
     
    // $('#text_machine4').text('All Machine');
    $('.filter_checkboxes_machine4').css("display","none");
    filter_expanded_machine4 = false;
    // quality_reason_machine();
  }
}

var filterexpand_part = false;
function part_drp(){
    var checkbox1 = document.getElementsByClassName("part_fill");
    if (!filterexpand_part) {
        $('.part_fill').css('display','block');
        filterexpand_part = true;
    }else{
       
        $('#text_part').text('All Part');
        $('.part_fill').css('display','none');
        filterexpand_part = false;
        // performance_opportunity();
    }
}

var all_data_field_expand = false;
function all_data_field_click_fun(){
    // var checkbox1 = document.getElementsByClassName("all_data_field_fill");
    // alert('hi');
    if (!all_data_field_expand) {
        $('.all_data_field_fill').css('display','block');
        all_data_field_expand = true;
    }else{
        // $('#text_all_data_field').text('All Data Field');
       
        $('.all_data_field_fill').css('display','none');
        all_data_field_expand = false;
        // machineWiseOEE();
    } 
}



$(document).on('click','.byday_click',function(event){
    event.preventDefault();
    // event.preventDefault();
    var count_reason_gp1  = $('.byday_click');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.by_day_checkbox');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            resetbyday_click();

        }
        else{
            $('.by_day_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.by_day_checkbox:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.by_day_checkbox:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.by_day_checkbox').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.by_day_checkbox').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_category_drp').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            resetbyday_click();
            // $('#text_category_drp').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_category_drp').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_category_drp').text('By Shift');
    }
});

// availability
$(document).on('click','.category_click2',function(event){
    event.preventDefault();
    // event.preventDefault();
    var count_reason_gp1  = $('.category_click2');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.category_drp_checkbox2');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_category2();

        }
        else{
            $('.category_drp_checkbox2').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.category_drp_checkbox2:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.category_drp_checkbox2:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.category_drp_checkbox2').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.category_drp_checkbox2').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_category_drp2').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_category2();
            // $('#text_category_drp2').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_category_drp2').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_category_drp2').text('No Category');
    }
});

// availability graph
$(document).on('click','.reason_click2',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.reason_click2');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.reason_checkbox2');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_reason2();

        }
        else{
            $('.reason_checkbox2').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.reason_checkbox2:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.reason_checkbox2:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.reason_checkbox2').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.reason_checkbox2').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_reason2').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_reason2();
            // $('#text_reason2').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_reason2').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_reason2').text('No Reason');
    }
});


$(document).on('click','.quality_click',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.quality_click');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.quality_checkbox');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_quality_reason();

        }
        else{
            $('.quality_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.quality_checkbox:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.quality_checkbox:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.quality_checkbox').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.quality_checkbox').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_quality_reason').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_quality_reason();
            // $('#text_quality_reason').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_quality_reason').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_quality_reason').text('No Reason');
    }
});


$(document).on('click','.machine_click',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.machine_click');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.machine_checkbox');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_machine();

        }
        else{
            $('.machine_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.machine_checkbox:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.machine_checkbox:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.machine_checkbox').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.machine_checkbox').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_machine').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_machine();
            // $('#text_machine').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_machine').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_machine').text('No Machine');
    }
});

$(document).on('click','.machine_click1',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.machine_click1');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.machine_checkbox1');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_machine1();

        }
        else{
            $('.machine_checkbox1').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.machine_checkbox1:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.machine_checkbox1:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.machine_checkbox1').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.machine_checkbox1').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_machine1').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_machine1();
            // $('#text_machine1').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_machine1').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_machine1').text('No Machine');
    }
});

// availability graph
$(document).on('click','.machine_click2',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.machine_click2');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.machine_checkbox2');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_machine2();

        }
        else{
            $('.machine_checkbox2').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.machine_checkbox2:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.machine_checkbox2:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.machine_checkbox2').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.machine_checkbox2').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_machine2').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_machine2();
            // $('#text_machine2').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_machine2').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_machine2').text('No Machine');
    }
});


$(document).on('click','.machine_click3',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.machine_click3');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.machine_checkbox3');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_machine3();

        }
        else{
            $('.machine_checkbox3').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.machine_checkbox3:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.machine_checkbox3:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.machine_checkbox3').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.machine_checkbox3').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_machine3').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_machine3();
            // $('#text_machine3').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_machine3').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_machine3').text('No Machine');
    }
});



$(document).on('click','.part_click',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.part_click');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.part_checkbox');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_part();

        }
        else{
            $('.part_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.part_checkbox:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.part_checkbox:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.part_checkbox').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.part_checkbox').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_part').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_part();
            // $('#text_part').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_part').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_part').text('No Part');
    }
});


$(document).on('click','.machine_click4',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.machine_click4');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.machine_checkbox4');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_machine4();

        }
        else{
            $('.machine_checkbox4').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.machine_checkbox4:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.machine_checkbox4:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.machine_checkbox4').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.machine_checkbox4').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_machine4').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_machine4();
            // $('#text_machine4').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_machine4').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_machine4').text('No Machine');
    }
});

$(document).on('click','.all_data_field_click',function(event){
    event.preventDefault();
    var count_reason_gp1  = $('.all_data_field_click');
    var index_reason_gp1 = count_reason_gp1.index($(this));
    var check_if1 = $('.all_data_field_checkbox');
    if (index_reason_gp1 === 0) {
        if (check_if1[0].checked==false) {
            reset_all_data_field();

        }
        else{
            $('.all_data_field_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if1[index_reason_gp1].checked==false) {
            check_if1[index_reason_gp1].checked=true;
            $('.all_data_field_checkbox:eq('+index_reason_gp1+')').attr('checked','checked');
        }else{
            $('.all_data_field_checkbox:eq('+index_reason_gp1+')').removeAttr('checked');
            check_if1[0].checked=false;
        }
    }

    var reason_gp_select_count1 = 0;
    jQuery('.all_data_field_checkbox').each(function(index){
      if (check_if1[index].checked===true) {
        reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
      }
    });
    var reason_gp_len1 = $('.all_data_field_checkbox').length;
    reason_gp_len1 = parseInt(reason_gp_len1)-1;
    if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
        if(check_if1[0].checked===true){
            check_if1[0].checked=true;
            $('#text_all_data_field').text(parseInt(reason_gp_select_count1)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_all_data_field();
            // $('#text_all_data_field').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_all_data_field').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_all_data_field').text('No Data Field');
    }
});






// graph value for overallTarget function
function overallTarget(f,t){
    return  new Promise(function(resolve,reject){
        // f = $('.fromDate').val();
        // t = $('.toDate').val();
        // f = f.replace(" ","T");
        // t = t.replace(" ","T");
        $.ajax({
            //OEE check....
            url: "<?php echo base_url('OEE_Drill_Down_controller/OverallOEETarget'); ?>",
            type: "POST",
            dataType: "json",
            data:{
                from:f,
                to:t
            },
            success:function(res){
                // console.log("overall graph value");
                // console.log(res);
                resolve(res);

                var teep_graph_width = parseInt(res.Overall_TEEP)>100? parseInt(133) : parseInt(res.Overall_TEEP);
                var oee_graph_width = parseInt(res.Overall_OEE)>100? parseInt(111) : parseInt(res.Overall_OEE);
                var ooe_graph_width = parseInt(res.Overall_OOE)>100? parseInt(117) : parseInt(res.Overall_OEE);

                $('#teep_graph').css('width',''+teep_graph_width+'%');
                $('#ooe_graph').css('width',''+ooe_graph_width+'%');
                $('#oee_graph').css('width',''+oee_graph_width+'%');
                
                
                $('#text_teep').html(res.Overall_TEEP+'%');
                $('#text_ooe').html(res.Overall_OOE+'%');
                $('#text_oee').html(res.Overall_OEE+'%');

                $('#teep_val_hover').html(res.Overall_TEEP);
                $('#ooe_val_hover').html(res.Overall_OOE);
                $('#oee_val_hover').html(res.Overall_OEE);

            
            },
            error:function(er){
                console.log("No Data Records!");
                $('#teep_graph').css('width','0%');
                $('#ooe_graph').css('width','0%');
                $('#oee_graph').css('width','0%');
                reject(er);
            }
        });
    });
   
}

// target bar value loading funciton
// function fill_target_bar(){
    const fill_target_bar = new Promise(function(resolve,reject){
        $.ajax({
            url: "<?php echo base_url('Financial_Metrics/getOverallTarget'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                console.log("graph target");
                console.log(res);
                resolve(res);
            
                $('#teep_target').css('width',''+res[0].overall_teep+'%');
                $('#ooe_target').css('width',''+res[0].overall_ooe+'%');
                $('#oee_target').css('width',''+res[0].overall_oee+'%');

                $('#target_ooe_val_hover').html(res[0].overall_ooe);
                $('#target_oee_val_hover').html(res[0].overall_oee);
                $('#target_teep_val_hover').html(res[0].overall_teep);

            
                
            },
            error:function(er){
                $('#teep_target').css('width','0%');
                $('#oee_target').css('width','0%');
                $('#ooe_target').css('width','0%');
                reject(er);
            }
        });
    });
  
// }


// on mouse up function
$(document).mouseup(function(event){

    // oee trend graph
    // machine multi select dropdown
    var machine = $('.filter_checkboxes_machine');
    if (!machine.is(event.target) && machine.has(event.target).length==0) {
        machine.hide();

     
    }

    // machine wise OEE %
    // all data field dropdown
    var all_data_field = $('.all_data_field_fill');
    if (!all_data_field.is(event.target) && all_data_field.has(event.target).length==0) {
        all_data_field.hide();
    }

    // machine dropdown
    var machine1 = $('.filter_checkboxes_machine1');
    if (!machine1.is(event.target) && machine1.has(event.target).length==0) {
        machine1.hide();
    }

    // machine wise availability 
    // category dropdown
    var category1 = $('.category_fill2');
    if (!category1.is(event.target) && category1.has(event.target).length==0) {
        category1.hide();
    }
    // reason dropdown
    var reason1 = $('.reason_fill2');
    if (!reason1.is(event.target) && reason1.has(event.target).length==0) {
        reason1.hide();
    }

    // machine 
    var machine2 = $('.filter_checkboxes_machine2');
    if (!machine2.is(event.target) && machine2.has(event.target).length==0) {
        machine2.hide();
    }

    // Machine-wise Performance with Parts
    // parts
    var part1 = $('.part_fill');
    if (!part1.is(event.target) && part1.has(event.target).length==0) {
        part1.hide();
    }
    // machine
    var machine3 = $('.filter_checkboxes_machine3');
    if (!machine3.is(event.target) && machine3.has(event.target).length==0) {
        machine3.hide();
    }

    // machine quality with reasons
    // machine
    var machine4 = $('.filter_checkboxes_machine4');
    if (!machine4.is(event.target) && machine4.has(event.target).length==0) {
        machine4.hide();
    }

    // quality 
    var quality = $('.quality_reason_fill');
    if (!quality.is(event.target) && quality.has(event.target).length==0) {
        quality.hide();
    }




});

// graph onclick ajax function call
$(document).on('click','.oee_trend_common',function(event){
    event.preventDefault();
    oeeTrendDay();
});

$(document).on('click','.machine_oee_common',function(event){
    event.preventDefault();
    machineWiseOEE();
});

$(document).on('click','.machine_availability_common',function(event){
    event.preventDefault();
    availabilityReason_machine();
});

$(document).on('click','.machine_performance_common',function(event){
    event.preventDefault();
    performance_opportunity();
});
$(document).on('click','.machine_quality_common',function(event){
    event.preventDefault();
    quality_reason_machine();
});


function oeeTrendDay() {
     // machine array
     var graph_machine_arr = [];
    $('.machine_checkbox').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    // // reason array
    // var graph_reason_arr = [];
    // $('.reason_checkbox').each(function(){
    //     if ($(this).is(':checked')) {
    //         graph_reason_arr.push($(this).val());
    //     }
    // });

    
    // // category
    // var graph_category_arr = [];
    // $('.category_drp_checkbox').each(function(){
    //     if ($(this).is(':checked')) {
    //         graph_category_arr.push($(this).val());
    //     }
    // });




  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
    //   console.log(graph_reason_arr);
    //   console.log(graph_category_arr);
    //   console.log(graph_machine_arr);
    // oee trend day
    $.ajax({
        url: "<?php echo base_url('OEE_Drill_Down_controller/oeeTrendDay'); ?>",
        type: "POST",
        dataType: "json",
        data:{
          from:f,
          to:t,
        //   reason_arr:graph_reason_arr,
        //   category_arr:graph_category_arr,
          machine_arr:graph_machine_arr,
        },
        success:function(res){

            console.log("oee trend graph");
            console.log(res);
            
          $('#oee_trend').remove();
          $('.child_oee_trend').append('<canvas id="oee_trend"><canvas>');
          $('.chartjs-hidden-iframe').remove();
          
          // res=res["OEETrend"];
          oee = [];
          mainLable = [];
          var x=0;
          res.forEach(function(doee){
            oee.push(doee['oee']);
            mainLable.push(doee['date']);
          });

          var partwiseTotal=[];
          for (var i = 0; i < res.length; i++) {
            var p=[];
            p.push(res[i].availability);
            p.push(res[i].performance);
            p.push(res[i].quality);
            
            partwiseTotal[i]=p;
          }

            var category_percent = 0.9;
            var bar_space = 0.7;

            while(true){
              var len= mainLable.length;
              if (len < 15) {
                mainLable.push("");
              }
              else if(len > 15){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_oee_trend').css("width"))+parseInt(l*4*16);
                $('.child_oee_trend').css("width",w+"px");
                break;
              }
              else{
                break;
              }
            }

          var ctx = document.getElementById("oee_trend").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels:mainLable,
             
              datasets: [{
                  label:'OEE',
                  type:'bar',
                  backgroundColor:'#0075F6',
                  borderColor:'#0075F6',
                  borderWidth:1,
                  fill:true,
                  data:oee,
                  each:partwiseTotal,
                  categoryPercentage:category_percent,
                  barPercentage: bar_space,

              }],
          },

          options: {
            responsive: true,
            maintainAspectRatio: false,   
            scales: {
                y: {
                    display:true,
                    beginAtZero:true,  
                    stacked:true,
                },
                x:{
                    display:true,
                    grid:{
                      display:false
                    },
                    stacked:true,
                    barPercentage: 0.2
                },
            },
            plugins: {
              legend: {
                  display: false,
              },
              tooltip: {
                enabled: false,
                external: oeeTrendOpp,
              }
            },
          },
          });
          
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
    
}


  function oeeTrendOpp(context) {  

    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-oeetrend');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-oeetrend';
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

        let innerHtml = '<div>';
      
        innerHtml += '<div class="grid-container">';
        innerHtml += '<div class="title-bold"><span>'+context.tooltip.dataPoints[0].label+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span class="values-op"></span></div>';

        innerHtml += '<div class="grid-item title-bold margin-top"><span>OEE%</span></div>';
        innerHtml += '<div class="grid-item title-bold-value margin-top"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(2)+'%</span></div>';
        innerHtml += '<div class="grid-item content-text"><span>Availability%</span></div>';
        innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].each[context.tooltip.dataPoints[0].dataIndex][0]).toFixed(2)+'%</span></div>';
        innerHtml += '<div class="grid-item content-text"><span>Performance%</span></div>';
        innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].each[context.tooltip.dataPoints[0].dataIndex][1]).toFixed(2)+'%</span></div>';
        innerHtml += '<div class="grid-item content-text"><span>Quality%</span></div>';
        innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].each[context.tooltip.dataPoints[0].dataIndex][2]).toFixed(2)+'%</span></div>';

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


// machine wise 0ee% break down

//Machine Wise OEE......
function machineWiseOEE() {

    var graph_machine_arr = [];
    $('.machine_checkbox1').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    var all_data_field = [];
    $('.all_data_field_checkbox').each(function(){
        if ($(this).is(':checked')) {
            all_data_field.push($(this).val().trim());
        }
    });

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    // console.log("machine wise oee");
    // console.log(graph_machine_arr);
    // console.log(all_data_field);
    $.ajax({
        url: "<?php echo base_url('OEE_Drill_Down_controller/getMachineWiseOEE');?>",
        type: "POST",
        dataType: "json",
        data:{
        from:f,
        to:t,
        machine_arr:graph_machine_arr,
        // all_data_field:all_data_field,
        },
        success:function(res){
            $('#machine_wise_oee').remove();
            $('.child_machine_wise_oee').append('<canvas id="machine_wise_oee"></canvas>');
            $('.chartjs-hidden-iframe').remove();
            // console.log("machine wise oee");
            // console.log(res);
            
            var category_percent = 1.0;
            var bar_space = 0.5;

            while(true){
                var len= res["OEE"].length;
                if (len < 8) {
                res["OEE"].push("");
                res.MachineName.push("");
                }
                else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_machine_wise_oee').css("width"))+parseInt(l*18*16);
                $('.child_machine_wise_oee').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }

            // console.log("all data field array");
            var graph_demo_arr = [];
            all_data_field.forEach(function(item){
                if(item === "quality"){
                    graph_demo_arr.push({
                        label: "Quality",
                        type: "line",
                        backgroundColor: "#09BB9F",
                        pointStyle:"circle",
                        radius:"5",
                        borderWidth: 1,
                        showLine : false,
                        fill: false,
                        data: res['Quality'],
                        pointRadius: 5,
                        perTarget:res['PerformanceTarget'],
                        availTarget:res['AvailabilityTarget'],
                        qulyTarget:res['QualityTarget'],
                        oeeTarget:res['OEETarget'],
                    });
                }
                else if(item === "performance"){
                    graph_demo_arr.push({
                        label: "Performance",
                        type: "line",
                        backgroundColor: "#0075F6",
                        pointStyle:"rectRot",
                        radius:"5", 
                        borderWidth: 1, 
                        showLine : false,
                        fill: false, 
                        data: res['Performance'],
                        pointRadius: 6,
                        pointHoverRadius: 6,

                        perTarget:res['PerformanceTarget'],
                        availTarget:res['AvailabilityTarget'],
                        qulyTarget:res['QualityTarget'],
                        oeeTarget:res['OEETarget'],
                    });

                }
                else if(item === "availability"){
                    graph_demo_arr.push({
                        label: "Availability",
                        type: "line",
                        backgroundColor: "#000000",
                        pointStyle:"triangle",
                        // borderColor: "red",  
                        borderWidth: 1, 
                        showLine : false,
                        fill: false,
                        data: res['Availability'],
                        pointRadius: 5,

                        perTarget:res['PerformanceTarget'],
                        availTarget:res['AvailabilityTarget'],
                        qulyTarget:res['QualityTarget'],
                        oeeTarget:res['OEETarget'],
                    });
                }
                else if (item==="oee") {
                    graph_demo_arr.push({
                        label: "Machine OEE",
                        type: "bar",
                        backgroundColor: "#0075F6",
                        borderColor: "#004b9b", 
                        borderWidth: 1,
                        fill: true,
                        data: res['OEE'],
                        perTarget:res['PerformanceTarget'],
                        availTarget:res['AvailabilityTarget'],
                        qulyTarget:res['QualityTarget'],
                        oeeTarget:res['OEETarget'],
                        categoryPercentage:category_percent,
                        barPercentage: bar_space, 
                    });
                }
            });
            var ctx = document.getElementById("machine_wise_oee").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: res.MachineName,
                    datasets: graph_demo_arr,
                },
                
                options: {
                    scalebeginAtZero:false,
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        y: {
                            display:true,
                            beginAtZero:true,
                            stacked:false,
                           
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
                        borderColor:"red",
                        external: machineWiseOEETooltip,
                    },
                    
                    },
                },
            }); 
               
        },
        error:function(res){
            // alert("No Data Records!");
            console.log("No Data Records!");
        }
    });
    // return;
}

function machineWiseOEETooltip(context) {
    // Tooltip Element
    let tooltipEl = document.getElementById('chartjs-tooltip');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'chartjs-tooltip';
        tooltipEl.innerHTML = '<table></table>';
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
        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';
          
          innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
          innerHtml += '<div class="cost-value title-bold-value"><span></span></div>';

          innerHtml += '<div class="grid-item title-bold margin-top"><span>'+context.tooltip.dataPoints[0].dataset.label+'%</span></div>';
          innerHtml += '<div class="grid-item title-bold-value margin-top"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1)+'%</span></div>';
          innerHtml += '<div class="grid-item content-text"><span>Target</span></div>';
    
        if (context.tooltip.dataPoints[0].dataset.label == "Availability") {
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].availTarget[0]).toFixed(1)+'%</span></div>';
        }
        else if(context.tooltip.dataPoints[0].dataset.label == "Quality"){
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].qulyTarget[0]).toFixed(1)+'%</span></div>';
        }
        else if(context.tooltip.dataPoints[0].dataset.label == "Performance"){
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].perTarget[0]).toFixed(1)+'%</span></div>';
        }
        else if(context.tooltip.dataPoints[0].dataset.label == "Machine OEE"){
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[0].oeeTarget[0]).toFixed(1)+'%</span></div>';
        }

        innerHtml += '</div>';
        innerHtml += '</div>';
        

        let tableRoot = tooltipEl.querySelector('table');
        tableRoot.innerHTML = innerHtml;
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

// availability graph
function availabilityReason_machine() {

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    
    // machine array
    var graph_category_arr = [];
    $('.category_drp_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_category_arr.push($(this).val().trim());
        }
    });

    // reason array
    var graph_reason_arr = [];
    $('.reason_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_reason_arr.push($(this).val());
        }
    });

    
    // category
    var graph_machine_arr = [];
    $('.machine_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val());
        }
    });

    // console.log("availability graph");
    // console.log(graph_machine_arr);
    // console.log(graph_reason_arr);
    // console.log(graph_category_arr);

	$.ajax({
        url: "<?php echo base_url('OEE_Drill_Down_controller/getmachine_reason_availability');?>",
        type: "POST",
        dataType: "json",
        data:{
            from:f,
            to:t,
            machine_arr:graph_machine_arr,
            reason_arr:graph_reason_arr,
            category_arr:graph_category_arr,
        },
        success:function(res){
            // console.log("Availability reasons");
            // console.log(res);
            //console.log(typeof res);

            $('#machine_reason_availability').remove();
            $('.child_machine_reason_availability').append('<canvas id="machine_reason_availability"></canvas>');
            $('.chartjs-hidden-iframe').remove();
            
            // res= res["AvailabilityOpportunity"];

            //$(".TotalAvail").html(res.grandTotal.toLocaleString("en-IN"));
            color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
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
                
            // Find the Reason Names as Lables..........
            var machine_wise_total = [];
            res['data'].forEach(function(item){
                // console.log("Availability ");
                // console.log(item);
                var tmp_total_duration = 0;
                item.forEach(function(val){
                    tmp_total_duration = tmp_total_duration + val['duration'];
                });
                machine_wise_total.push(tmp_total_duration);
    
            });


            // console.log("Availability graph total");
            // console.log(machine_wise_total);
            var reasonList =[];
            res['reason'].forEach(function(reason){
                reasonList.push(reason.downtime_reason);
            });

            var totalVal =[];
            res['total'].forEach(function(total){
                totalVal.push(total.toFixed(2));
            });

            var totalDuration=[];
            res['totalDuration'].forEach(function(duration){
                totalDuration.push(duration);
            });
            

            var machineName = [];
            res['machineName'].forEach(function(Name){
                machineName.push(Name.machine_name);
            });

            var sum = machine_wise_total.reduce(function(a, b) { return a + b; }, 0);
            var hour_text = parseInt(parseInt(sum)/60);
            var minute_text = parseInt(parseInt(sum)%60);
            $('#total_duration_availability').text(hour_text+'h'+' '+minute_text+'m');

            var category_percent =1.0;
            var bar_space=0.5;
            while(true){
                var len= machineName.length;
                if (len < 8) {
                    machineName.push("");
                }
                else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_machine_reason_availability').css("width"))+parseInt(l*18*16);
                $('.child_machine_reason_availability').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }

            //Find the duration for each machine in each Reason............
            machine = [
                {
                label:"Total" ,
                type: "line",
                backgroundColor: color[0],
                borderColor: "#d9d9ff",  
                borderWidth: 1, 
                showLine : false,
                fill: false, 
                // data:totalVal,
                data:machine_wise_total,
                data_percentage:machine_wise_total,
                duration:totalDuration,
                pointRadius: 7,
                }           
            ];

            var x=1;
            var index=0;
            res['reason'].forEach(function(machineWise){
                //All the machines duration for each Reason..........
  
                var arr= [];
                var arrtmp = [];
                // machineWise[''].forEach(function(reason){
                //     arr.push(reason.oppCost.toFixed(2));
                //     arrtmp.push(reason.duration);
                // });
                //machineWise['reason_name'].push("Ku");

                machine.push({
                    label: machineWise['downtime_reason'],
                    type: "bar",
                    backgroundColor: color[x],
                    borderColor: color[x],
                    borderWidth: 1,
                    fill: true,
                    duration:machineWise['duration'],
                    // data: machineWise['oppcost'],
                    data_percentage:0,
                    data: machineWise['duration'],
                    categoryPercentage:category_percent,
                    barPercentage: bar_space,
                });
                x=x+1;
                index=index+1;
            });
            // console.log("machine array");
            // console.log(machine)
            var avlOpp = document.getElementById("machine_reason_availability").getContext('2d');
            var avlOppChart = new Chart(avlOpp, {
                type: 'bar',
                data: {
                labels: machineName,
                datasets: machine,
                },
            options: {
                responsive: true,
                maintainAspectRatio: false,   
                scales: {
                    y: {
                        display: true,
                        stacked:true,
                        beginAtZero:true,
                    },
                    x:{
                        display:true,
                        grid:{
                            display:false
                        },
                        stacked:true
                    }
                },
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: availabilityOpp,
                    }
                },
                },
            });



        },
        error:function(er){
            // alert("Sorry!Try Agian!!!!");
            console.log("Sorry!Try Agian!!!!");
            console.log(er);
        }
    }); 
}



function availabilityOpp(context) {
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-availability');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-availability';
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
        let innerHtml = '<div>';

        var duration= parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data_percentage[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        innerHtml += '<div class="grid-container">';
        if (parseInt(percentage)>0) {
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            var tmpdays = parseInt(parseInt(percentage/60)/24);
            var tmphours = parseInt(parseInt(percentage-(tmpdays*1440))/60);
            var tmpmin = parseInt(parseInt(percentage-(tmpdays*1440))%60);
            innerHtml += '<div class="grid-item content-text"><span>Total Duration</span></div>';  
            if (days>0) {
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+tmpdays+"d"+" "+tmphours+"h"+" "+tmpmin+"m"+'</span></div>';
            }
            else{
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+tmphours+"h"+" "+tmpmin+"m"+'</span></div>';
            }        

        }
        else{
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            // innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
            // innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';
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


function performance_opportunity(){
    
    $('#performanceOpportunity').remove();
    $('.child_graph_performance_opportunity').append('<canvas id="performanceOpportunity"></canvas>');
    $('.chartjs-hidden-iframe').remove();

    var graph_machine_arr = [];
    $('.machine_checkbox3').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
        }
    });

    var part_arr = [];
    $('.part_checkbox').each(function(){
        if ($(this).is(':checked')) {
            part_arr.push($(this).val().trim());
        }
    });


    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    console.log("performance graph");
    console.log(graph_machine_arr);
    console.log(part_arr);
    $.ajax({
        url: "<?php echo base_url('OEE_Drill_Down_controller/performanceOpportunity'); ?>",
        type: "POST",
        dataType: "json",
        data:{
        from:f,
        to:t,
        machine_arr:graph_machine_arr,
        part_arr:part_arr,
        },
        success:function(res){
            // console.log("performance opportunity graph");
            // console.log(res);
            color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
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
                // $(".PerformanceGrand").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));

                var partTotal = [];
                res.Total.forEach(function(r){
                partTotal.push(parseFloat(r.toFixed(2)));
                });
                
                var speedTotal=[];
                res.SpeedLossTotal.forEach(function(t){
                speedTotal.push(parseFloat(t.toFixed(2)));
                });

                var sum = speedTotal.reduce(function(a, b) { return a + b; }, 0);
                var hour_text = parseInt(parseInt(sum)/60);
                var minute_text = parseInt(parseInt(sum)%60);
                $('#total_speed_loss').text(hour_text+'h'+' '+minute_text+'m');

                // console.log("total speed loss");
                // console.log(sum);
                var partWiseLable = [];
                res.Part.forEach(function(item){
                partWiseLable.push(item.part_name);
                });

                var machine_total_arr = [];
                var mname_arr = [];
                res.dataPart.forEach(function(item){
                    var tmp_data = 0;
                    mname_arr.push(item['machine_name']);
                    item['machineData'].forEach(function(val){
                        tmp_data = parseInt(tmp_data)+parseInt(val['SpeedLoss']);
                    });
                    machine_total_arr.push(tmp_data);
                });

                //Find the duration for each machine in each Reason............
                oppCost = [
                {
                    label:"Total" ,
                    type: "line",
                    backgroundColor: color[0],
                    borderColor: "#d9d9ff",  
                    borderWidth: 1, 
                    showLine : false,
                    fill: false, 
                    data:machine_total_arr,
                    percentage_data:machine_total_arr,
                    machine_wise_total:0,
                    speedLoss:speedTotal,
                    pointRadius: 7,
                }           
                ];

                var x=1;
                var index=0;
               
                // var machine_total_arr = [];
                res.Part.forEach(function(item){
                    var performancePart=[];
                    var speedLoss=[];
                    var part_name_arr = [];
                    
                    var machine_wise_total = 0;   
                    res.dataPart.forEach(function(val){
                        // mname_arr.push(val['machine_name']);
                        val.machineData.forEach(function(value){
                            if (value['part_id'] === item['part_id']) {
                                var p = parseFloat(value['Opportunity'].toFixed(2));
                                //var tmp_sploss = parseFloat(value['SpeedLoss'].toFixed(2));
                                performancePart.push(p);
                                speedLoss.push(parseFloat(value['SpeedLoss'].toFixed(2)));
                                part_name_arr.push(value['part_name']);
                                machine_wise_total = parseFloat(machine_wise_total) + parseFloat(p).toFixed(2);
                            }
                        });     
                    
                    });
                    // machine_total_arr.push(machine_wise_total)
                    oppCost.push({
                        label:item['part_name'],
                        type: "bar",
                        backgroundColor: color[x],
                        borderColor: color[x],
                        borderWidth: 1,
                        fill: true,
                        data: speedLoss,
                       // speedLoss:speedLoss,
                        percentage_data:0,
                        categoryPercentage:1.0,
                        barPercentage: 0.5, 
                    });
                    x=x+1;
                    index=index+1;
                   
                });

                // console.log("Graph array")
                // console.log(oppCost);

                var bar_width = 0.6;
                var bar_size = 0.7;

                while(true){
                    var len= mname_arr.length;
                    if (len < 8) {
                        mname_arr.push("");
                    }
                    else if(len > 8){
                        var l = parseInt(len)%parseInt(8);
                        var w= parseInt($('.parent_graph_performance_opportunity').css("width"))+parseInt(l*18*16);
                        $('.child_graph_performance_opportunity').css("width",w+"px");
                        break;
                    }
                    else{
                        break;
                    }
                }
                // console.log("Machine name lable");
                // console.log(mname_arr);
            var ctx = document.getElementById("performanceOpportunity").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: mname_arr,
                    datasets:oppCost,
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        y: {
                            display:true,
                            beginAtZero:true,
                            stacked:true
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
                           external: performanceOpp,
                        }
                    },
                },            
            });
        },
        error:function(er){
            console.log("No Records");
            console.log(er);
            // alert("Sorry!Try Agian!!!!");
        }
    }); 
}

// tooltip function
function performanceOpp(context){
    // console.log(context);
    let tooltipEl = document.getElementById('tooltip-machine_part_performance');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-machine_part_performance';
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

        var performance = parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseInt(performance/60)/24);
        var hours = parseInt(parseInt(performance-(days*1440))/60);
        var min = parseInt(parseInt(performance-(days*1440))%60);
     
        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';
        if (parseInt(percentage)>0) {
            //innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            var tmpdays = parseInt(parseInt(percentage/60)/24);
            var tmphours = parseInt(parseInt(percentage-(tmpdays*1440))/60);
            var tmpmin = parseInt(parseInt(percentage-(tmpdays*1440))%60);
            innerHtml += '<div class="grid-item content-text"><span>Total Speed Loss</span></div>';  
            if (days>0) {
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+tmpdays+"d"+" "+tmphours+"h"+" "+tmpmin+"m"+'</span></div>';
            }
            else{
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+tmphours+"h"+" "+tmpmin+"m"+'</span></div>';
            }        

        }else{
            //innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text"><span>Speed Loss</span></div>';  
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

function quality_reason_machine() {

    var graph_quality_arr = [];
    $('.quality_checkbox').each(function(){
        if ($(this).is(':checked')) {
            graph_quality_arr.push($(this).val().trim());
        }
    });

    var machine_arr = [];
    $('.machine_checkbox4').each(function(){
        if ($(this).is(':checked')) {
            machine_arr.push($(this).val().trim());
        }
    });

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    // console.log("quality graph");
    // console.log(machine_arr);
    // console.log(graph_quality_arr);
    $.ajax({
        url: "<?php echo base_url('OEE_Drill_Down_controller/qualityOpportunity'); ?>",
        type: "POST",
        dataType: "json",
        data:{
        from:f,
        to:t,
        machine_arr:machine_arr,
        quality_arr:graph_quality_arr,
        },
        success:function(res){

            console.log("quality reasons array");
            console.log(res);
            $('#quality_reason_machine').remove();
            $('.child_quality_reason_machine').append('<canvas id="quality_reason_machine"></canvas>');
            $('.chartjs-hidden-iframe').remove();


            // console.log("Quality Opportunity graph");
            // console.log(res);
            color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
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

            var machineName_arr = [];
            var machine_total_arr = [];
            var total_val = 0;
            res['machine_data'].forEach(function(item){
                machineName_arr.push(item.machine_name);
                total_val = total_val + item.total_rejects;
                machine_total_arr.push(item.total_rejects);
            });

            $('#total_machine_reason_quality').text(parseInt(total_val).toLocaleString("en-IN"));
            quality_reason_arr = [
                {
                    label:"Total" ,
                    type: "line",
                    backgroundColor: color[0],
                    borderColor: "#d9d9ff",  
                    borderWidth: 1, 
                    showLine : false,
                    fill: false, 
                    data:machine_total_arr,
                    percentage_data:machine_total_arr,
                    machine_wise_total:0,
                    // speedLoss:speedTotal,
                    pointRadius: 7,
                }           
            ];
            var x=1;
            var index=0;
            res['graph_data'].forEach(function(item){
                var part_arr = [];
                var count_arr = [];
                var reason_wise_data = [];
                var temp_machine_part_arr = [];
                item['machine_data'].forEach(function(ele) {
                    var tmp_part_total = 0;
                    var temp_partname_arr = [];
                    ele['part_data'].forEach(function(element){
                        tmp_part_total = tmp_part_total + element['total_reject'];
                        var temp_data = element['part_name']+'&'+element['total_reject'];
                        temp_partname_arr.push(temp_data);
                    });

                    var tmp_arr_str = temp_partname_arr.join(',');
                    temp_machine_part_arr.push(tmp_arr_str);
                    reason_wise_data.push(tmp_part_total);
                });
                quality_reason_arr.push({
                    label:item['reason_name'],
                    type: "bar",
                    backgroundColor: color[x],
                    borderColor: color[x],
                    borderWidth: 1,
                    fill: true,
                    data: reason_wise_data,
                    reason_arr:temp_machine_part_arr,
                    percentage_data:0,
                    categoryPercentage:1.0,
                    barPercentage: 0.5, 
                });
                x=x+1;
                index=index+1;
            });


            // console.log(quality_reason_arr);
            var bar_width = 0.6;
            var bar_size = 0.7;
            while(true){
                var len= machineName_arr.length;
                if (len < 8) {
                    machineName_arr.push("");
                }
                else if(len > 8){
                    var l = parseInt(len)%parseInt(8);
                    var w= parseInt($('.parent_quality_reason_machine').css("width"))+parseInt(l*18*16);
                    $('.child_quality_reason_machine').css("width",w+"px");
                    break;
                }
                else{
                    break;
                }
            }
            // console.log("quality graph array");
            // console.log(quality_reason_arr);

            var ctx = document.getElementById("quality_reason_machine").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: machineName_arr,
                        datasets:quality_reason_arr,
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,   
                        scales: {
                            y: {
                                display:true,
                                beginAtZero:true,
                                stacked:true
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
                               external: quality_reason_machine_tooltip,
                            }
                        },
                    },            
            });
        
        },
        error:function(er){
            console.log(er);
            // console.log("Sorry!Try Agian!!!!");
            // alert("Sorry!Try Agian!!!!");
        }
    }); 
}

// tooltip function
function quality_reason_machine_tooltip(context){
    let tooltipEl = document.getElementById('tooltip-quality_machine_reason');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-quality_machine_reason';
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

        var performance = parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var percentage = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].percentage_data[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
      
        // console.log(percentage);
        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';
    
        if (parseInt(percentage)>0) {
            //innerHtml += '<div class="grid-container">';
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
           
            innerHtml += '<div class="grid-item content-text margin-top"><span class="values-op">Total Rejection Count</span></div>';  
            innerHtml += '<div class="grid-item title-bold-value margin-top"><span class="values-op">'+parseInt(percentage)+'</span></div>';       

        }else{
            //innerHtml += '<div class="grid-container">';
            var parts_arr = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].reason_arr[context.tooltip.dataPoints[0].dataIndex]
            // console.log("quality graph hovering");
            // console.log(parts_arr);
            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title margin-top"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
            innerHtml += '<div class="grid-item title-bold-value margin-top"><span class="values-op">'+parseInt(performance)+'</span></div>';
            // innerHtml += '<div class="grid-item content-text"><span>Spped Loss</span></div>';  
            // if (days>0) {
            //     innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>';
            // }
            // else{
            //     innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+hours+"h"+" "+min+"m"+'</span></div>';
            // }
            const tmp_part_arr = parts_arr.split(',');
            // console.log("temporary part array");
            // console.log(tmp_part_arr);
            tmp_part_arr.forEach(function(item){
                // console.log(item);
                var part_val = item.split('&');

                innerHtml += '<div class="grid-item content-text"><span>'+part_val[0]+'</span></div>'; 
                innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+part_val[1]+'</span></div>';

            });
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
// this function gets all dropdown value and graph calling function
// function get_all_filter_drp_fill(){
    const get_all_filter_drp_fill = new Promise(function (resolve,reject){
        $.ajax({
            url:"<?php echo base_url('OEE_Drill_Down_controller/get_all_dilter_drp_fun'); ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            success:function(res){
                console.log("all dropdown ajax value");
                console.log(res);
                resolve(res);

                // machine 
                $('.filter_checkboxes_machine').empty();
                $('.filter_checkboxes_machine1').empty();
                $('.filter_checkboxes_machine2').empty();
                $('.filter_checkboxes_machine3').empty();
                $('.filter_checkboxes_machine4').empty();

                $('.filter_checkboxes_machine').append('<div class="filter_check_cate machine_click oee_trend_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="machine_checkbox" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                +'</div>');

                $('.filter_checkboxes_machine1').append('<div class="filter_check_cate machine_click1 machine_oee_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="machine_checkbox1" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                +'</div>');


                $('.filter_checkboxes_machine2').append('<div class="filter_check_cate machine_click2 machine_availability_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="machine_checkbox2" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                +'</div>');

                $('.filter_checkboxes_machine3').append('<div class="filter_check_cate machine_click3 machine_performance_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="machine_checkbox3" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                +'</div>');


                $('.filter_checkboxes_machine4').append('<div class="filter_check_cate machine_click4 machine_quality_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="machine_checkbox4" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                +'</div>');

                    res['machine'].forEach(function(val){
                        var elements_mdrp = $();
                        var element_mdrp = $();
                        var ele_mdrp = $();
                        var eles_mdrp = $();
                        var element1_mdrp = $();
                    
                        elements_mdrp = elements_mdrp.add('<div class="filter_check_cate machine_click oee_trend_common" style="">'
                            +'<div class="cate_drp_check" style="">'
                            +'<input type="checkbox" id="one" class="machine_checkbox" value="'+val.machine_id+'"/>'
                            +'</div>'
                            +'<div class="cate_drp_text" style="">'
                            +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                            +'</div>'
                        +'</div>');


                        element_mdrp = element_mdrp.add('<div class="filter_check_cate machine_click1 machine_oee_common" style="">'
                            +'<div class="cate_drp_check" style="">'
                            +'<input type="checkbox" id="one" class="machine_checkbox1" value="'+val.machine_id+'"/>'
                            +'</div>'
                            +'<div class="cate_drp_text" style="">'
                            +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                            +'</div>'
                        +'</div>');

                        ele_mdrp = ele_mdrp.add('<div class="filter_check_cate machine_click2 machine_availability_common" style="">'
                            +'<div class="cate_drp_check" style="">'
                            +'<input type="checkbox" id="one" class="machine_checkbox2" value="'+val.machine_id+'"/>'
                            +'</div>'
                            +'<div class="cate_drp_text" style="">'
                            +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                            +'</div>'
                        +'</div>');
                    

                        eles_mdrp = eles_mdrp.add('<div class="filter_check_cate machine_click3 machine_performance_common" style="">'
                            +'<div class="cate_drp_check" style="">'
                            +'<input type="checkbox" id="one" class="machine_checkbox3" value="'+val.machine_id+'"/>'
                            +'</div>'
                            +'<div class="cate_drp_text" style="">'
                            +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                            +'</div>'
                        +'</div>');

                        element1_mdrp = element1_mdrp.add('<div class="filter_check_cate machine_click4 machine_quality_common" style="">'
                        +'<div class="cate_drp_check" style="">'
                        +'<input type="checkbox" id="one" class="machine_checkbox4" value="'+val.machine_id+'"/>'
                        +'</div>'
                        +'<div class="cate_drp_text" style="">'
                        +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                        +'</div>'
                        +'</div>');

                        $('.filter_checkboxes_machine').append(elements_mdrp);
                        $('.filter_checkboxes_machine1').append(element_mdrp);
                        $('.filter_checkboxes_machine2').append(ele_mdrp);
                        $('.filter_checkboxes_machine3').append(eles_mdrp);
                        $('.filter_checkboxes_machine4').append(element1_mdrp);

                    });

                    // part
                $('.part_fill').empty();
                $('.part_fill').append('<div class="filter_check_cate part_click machine_performance_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="part_checkbox" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                    +'</div>');
                res['part'].forEach(function(val){
                    var elements_pdrp = $();
                    elements_pdrp = elements_pdrp.add('<div class="filter_check_cate part_click machine_performance_common" style="">'
                        +'<div class="cate_drp_check" style="">'
                        +'<input type="checkbox" id="one" class="part_checkbox" value="'+val.part_id+'"/>'
                        +'</div>'
                        +'<div class="cate_drp_text" style="">'
                        +'<p class="font_multi_drp" style="margin:auto;">'+val.part_name+'</p>'
                        +'</div>'
                        +'</div>');



                    $('.part_fill').append(elements_pdrp);
                });

                // quality reason 
                $('.quality_reason_fill').empty();
                $('.quality_reason_fill').append('<div class="filter_check_cate quality_click machine_quality_common" style="">'
                    +'<div class="cate_drp_check" style="">'
                    +'<input type="checkbox" id="one" class="quality_checkbox" value="all"/>'
                    +'</div>'
                    +'<div class="cate_drp_text" style="">'
                    +'<p class="font_multi_drp" style="margin:auto;">All</p>'
                    +'</div>'
                    +'</div>');

                res['quality'].forEach(function(val){
                    var elements_qdrp = $();
                    elements_qdrp = elements_qdrp.add('<div class="filter_check_cate quality_click machine_quality_common" style="">'
                        +'<div class="cate_drp_check" style="">'
                        +'<input type="checkbox" id="one" class="quality_checkbox" value="'+val.quality_reason_id+'"/>'
                        +'</div>'
                        +'<div class="cate_drp_text" style="">'
                        +'<p class="font_multi_drp" style="margin:auto;">'+val.quality_reason_name+'</p>'
                        +'</div>'
                    +'</div>');
                        // console.log(val.quality_reason_id);


                    $('.quality_reason_fill').append(elements_qdrp);
                });

                // downtime reason
                $('.reason_fill2').empty();
                var element_ddrp = $();
                var elements_ddrp = $();
                $('.reason_fill2').append('<div class="filter_check_cate reason_click2 machine_availability_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox2" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
                res['downtime'].forEach(function(item){        
                    elements_ddrp = elements_ddrp.add('<div class="filter_check_cate reason_click2 machine_availability_common" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox2" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
                    $('.reason_fill2').append(elements_ddrp);
                
                });

                // reset_reason();
                reset_reason2();
                
                reset_quality_reason();
                reset_part();
                reset_machine();
                reset_machine1();
                reset_machine2();
                reset_machine3();
                reset_machine4();
                resetbyday_click();
                reset_category2();
                reset_all_data_field();

              
                
            },
            error:function(er){
                console.log("all dropdown ajax error");
                console.log(er);
                reject(er);
            }
        });
    });
// }

// all graph functions
async function all_graph_fun(){

    // fill_target_bar();
    // overallTarget();
    // oee_trend_first_load();
    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    console.log("function calling");
    await fill_target_bar
    await overallTarget(f,t);
    await oee_trend_first_load(f,t);
    await first_loader_machine_oee(f,t);
    await first_loader_availability(f,t);
    await first_loader_performance(f,t);
    await first_loader_quality(f,t);
    // await first_load_quality
    // await first_machine_wise_oee
    // await first_loader_performance
    // await first_load_availability
    await get_all_filter_drp_fill
    $('#overlay').fadeOut(500);
   

}

// function first loader function 
function oee_trend_first_load(f,t){

    return  new Promise(function (resolve,reject){
       
        $.ajax({
            url:"<?php echo  base_url('OEE_Drill_Down_controller/first_load_oee_trend'); ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            data:{
                from:f,
                to:t
            },
            success:function(res){
                console.log("oee drill down graph first loader");
                console.log(res);
                resolve(res);
                
                $('#oee_trend').remove();
                $('.child_oee_trend').append('<canvas id="oee_trend"><canvas>');
                $('.chartjs-hidden-iframe').remove();
                
                // res=res["OEETrend"];
                oee = [];
                mainLable = [];
                var x=0;
                res.forEach(function(doee){
                    oee.push(doee['oee']);
                    mainLable.push(doee['date']);
                });

                var partwiseTotal=[];
                for (var i = 0; i < res.length; i++) {
                    var p=[];
                    p.push(res[i].availability);
                    p.push(res[i].performance);
                    p.push(res[i].quality);
                    
                    partwiseTotal[i]=p;
                }

                var category_percent = 0.9;
                var bar_space = 0.7;

                while(true){
                var len= mainLable.length;
                if (len < 15) {
                    mainLable.push("");
                }
                else if(len > 15){
                    var l = parseInt(len)%parseInt(8);
                    var w= parseInt($('.parent_oee_trend').css("width"))+parseInt(l*4*16);
                    $('.child_oee_trend').css("width",w+"px");
                    break;
                }
                else{
                    break;
                }
                }

                var ctx = document.getElementById("oee_trend").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:mainLable,
                    
                        datasets: [{
                            label:'OEE',
                            type:'bar',
                            backgroundColor:'#0075F6',
                            borderColor:'#0075F6',
                            borderWidth:1,
                            fill:true,
                            data:oee,
                            each:partwiseTotal,
                            categoryPercentage:category_percent,
                            barPercentage: bar_space, 
                        }],
                    },

                    options: {
                        responsive: true,
                        maintainAspectRatio: false,   
                        scales: {
                            y: {
                                display:true,
                                beginAtZero:true,  
                                stacked:true,
                                ticks:{
                                    callback:function(value){
                                        return value+"%";
                                    }
                                }
                            },
                            x:{
                                display:true,
                                grid:{
                                display:false
                                },
                                stacked:true,
                                barPercentage: 0.2
                            },
                        },
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                                enabled: false,
                                external: oeeTrendOpp,
                            }
                        },
                    },
                });
            

            },
            error:function(er){
                console.log("Oee drill down graph first loader ajax funtion issue");
                reject(er);
            }
        });
    });
    
}

// first loader machine wise oee
function first_loader_machine_oee(f,t){

    return  new Promise(function(resolve,reject){
       
        $.ajax({
            url:"<?php echo  base_url('OEE_Drill_Down_controller/first_loader_machine_oee'); ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            data:{
                from:f,
                to:t
            },
            success:function(res){
                console.log("first laoder machine wise oee");
                console.log(res);

                resolve(res);
                $('#machine_wise_oee').remove();
                $('.child_machine_wise_oee').append('<canvas id="machine_wise_oee"></canvas>');
                $('.chartjs-hidden-iframe').remove();
                // console.log("machine wise oee");
                // console.log(res);
                
                var category_percent = 1.0;
                var bar_space = 0.5;

                while(true){
                    var len= res["OEE"].length;
                    if (len < 8) {
                    res["OEE"].push("");
                    res.MachineName.push("");
                    }
                    else if(len > 8){
                    var l = parseInt(len)%parseInt(8);
                    var w= parseInt($('.parent_machine_wise_oee').css("width"))+parseInt(l*18*16);
                    $('.child_machine_wise_oee').css("width",w+"px");
                    break;
                    }
                    else{
                    break;
                    }
                }

                all_data_field = ['quality','performance','availability','oee'];
                // console.log("all data field array");
                var graph_demo_arr = [];
                all_data_field.forEach(function(item){
                    if(item === "quality"){
                        graph_demo_arr.push({
                            label: "Quality",
                            type: "line",
                            backgroundColor: "#09BB9F",
                            pointStyle:"circle",
                            radius:"5",
                            borderWidth: 1,
                            showLine : false,
                            fill: false,
                            data: res['Quality'],
                            pointRadius: 5,
                            perTarget:res['PerformanceTarget'],
                            availTarget:res['AvailabilityTarget'],
                            qulyTarget:res['QualityTarget'],
                            oeeTarget:res['OEETarget'],
                        });
                    }
                    else if(item === "performance"){
                        graph_demo_arr.push({
                            label: "Performance",
                            type: "line",
                            backgroundColor: "#0075F6",
                            pointStyle:"rectRot",
                            radius:"5", 
                            borderWidth: 1, 
                            showLine : false,
                            fill: false, 
                            data: res['Performance'],
                            pointRadius: 6,
                            pointHoverRadius: 6,

                            perTarget:res['PerformanceTarget'],
                            availTarget:res['AvailabilityTarget'],
                            qulyTarget:res['QualityTarget'],
                            oeeTarget:res['OEETarget'],
                        });

                    }
                    else if(item === "availability"){
                        graph_demo_arr.push({
                            label: "Availability",
                            type: "line",
                            backgroundColor: "#000000",
                            pointStyle:"triangle",
                            // borderColor: "red",  
                            borderWidth: 1, 
                            showLine : false,
                            fill: false,
                            data: res['Availability'],
                            pointRadius: 5,

                            perTarget:res['PerformanceTarget'],
                            availTarget:res['AvailabilityTarget'],
                            qulyTarget:res['QualityTarget'],
                            oeeTarget:res['OEETarget'],
                        });
                    }
                    else if (item==="oee") {
                        graph_demo_arr.push({
                            label: "Machine OEE",
                            type: "bar",
                            backgroundColor: "#0075F6",
                            borderColor: "#004b9b", 
                            borderWidth: 1,
                            fill: true,
                            data: res['OEE'],
                            perTarget:res['PerformanceTarget'],
                            availTarget:res['AvailabilityTarget'],
                            qulyTarget:res['QualityTarget'],
                            oeeTarget:res['OEETarget'],
                            categoryPercentage:category_percent,
                            barPercentage: bar_space, 
                            // yAxisID:'ypercentage',
                        });
                    }
                });
                var ctx = document.getElementById("machine_wise_oee").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: res.MachineName,
                        datasets: graph_demo_arr,
                    },
                    
                    options: {
                        scalebeginAtZero:false,
                        responsive: true,
                        maintainAspectRatio: false,   
                        scales: {
                            y: {
                                //type:"bar",
                                display:true,
                                beginAtZero:true,
                                stacked:false,
                                ticks:{
                                    callback:function(value){
                                        return value+"%";
                                    }
                                }
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
                            borderColor:"red",
                            external: machineWiseOEETooltip,
                        },
                        
                        },
                    },
                }); 
                
            },
            error:function(er){
                console.log("first loader machine wise oee ajax issue");
                console.log(er);
                reject(er);
            }
        });
    });
   
    
}

// first loader availability graph function
function first_loader_availability(f,t){
    return  new Promise(function (resolve,reject){
       
        $.ajax({
            url:"<?php echo base_url('OEE_Drill_Down_controller/first_load_availability'); ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            data:{
                from:f,
                to:t
            },
            success:function(res){
                console.log("first loader availability graph ");
                console.log(res);
                resolve(res);

                
                $('#machine_reason_availability').remove();
                $('.child_machine_reason_availability').append('<canvas id="machine_reason_availability"></canvas>');
                $('.chartjs-hidden-iframe').remove();
                
                // res= res["AvailabilityOpportunity"];

                //$(".TotalAvail").html(res.grandTotal.toLocaleString("en-IN"));
                var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
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
                    
                // Find the Reason Names as Lables..........
                var machine_wise_total = [];
                res['data'].forEach(function(item){
                    // console.log("Availability ");
                    // console.log(item);
                    var tmp_total_duration = 0;
                    item.forEach(function(val){
                        tmp_total_duration = tmp_total_duration + val['duration'];
                    });
                    machine_wise_total.push(tmp_total_duration);
        
                });


                // console.log("Availability graph total");
                // console.log(machine_wise_total);
                var reasonList =[];
                res['reason'].forEach(function(reason){
                    reasonList.push(reason.downtime_reason);
                });

                var totalVal =[];
                res['total'].forEach(function(total){
                    totalVal.push(total.toFixed(2));
                });

                var totalDuration=[];
                res['totalDuration'].forEach(function(duration){
                    totalDuration.push(duration);
                });
                

                var machineName = [];
                res['machineName'].forEach(function(Name){
                    machineName.push(Name.machine_name);
                });

                var sum = machine_wise_total.reduce(function(a, b) { return a + b; }, 0);
                var hour_text = parseInt(parseInt(sum)/60);
                var minute_text = parseInt(parseInt(sum)%60);
                $('#total_duration_availability').text(hour_text+'h'+' '+minute_text+'m');

                var category_percent = 1.0;
                var bar_space = 0.5;
                while(true){
                    var len= machineName.length;
                    if (len < 8) {
                        machineName.push("");
                    }
                    else if(len > 8){
                        var l = parseInt(len)%parseInt(8);
                        var w= parseInt($('.parent_machine_reason_availability').css("width"))+parseInt(l*18*16);
                        $('.child_machine_reason_availability').css("width",w+"px");
                        break;
                    }
                    else{
                        break;
                    }
                }

                //Find the duration for each machine in each Reason............
                machine = [
                    {
                    label:"Total" ,
                    type: "line",
                    backgroundColor: color[0],
                    borderColor: "#d9d9ff",  
                    borderWidth: 1, 
                    showLine : false,
                    fill: false, 
                    // data:totalVal,
                    data:machine_wise_total,
                    data_percentage:machine_wise_total,
                    duration:totalDuration,
                    pointRadius: 7,
                    }           
                ];

                var x=1;
                var index=0;
                res['reason'].forEach(function(machineWise){
                    //All the machines duration for each Reason..........
    
                    var arr= [];
                    var arrtmp = [];
                
                    machine.push({
                        label: machineWise['downtime_reason'],
                        type: "bar",
                        backgroundColor: color[x],
                        borderColor: color[x],
                        borderWidth: 1,
                        fill: true,
                        duration:machineWise['duration'],
                        // data: machineWise['oppcost'],
                        data_percentage:0,
                        data: machineWise['duration'],
                        categoryPercentage:category_percent,
                        barPercentage: bar_space,
                    });
                    x=x+1;
                    index=index+1;
                });
                // console.log("machine array");
                // console.log(machine)
                var avlOpp = document.getElementById("machine_reason_availability").getContext('2d');
                var avlOppChart = new Chart(avlOpp, {
                    type: 'bar',
                    data: {
                        labels: machineName,
                        datasets: machine,
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,   
                        scales: {
                            y: {
                                display: true,
                                stacked:true,
                                beginAtZero:true,
                            },
                            x:{
                                display:true,
                                grid:{
                                    display:false
                                },
                                stacked:true
                            }
                        },
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                            enabled: false,
                            // borderColor:"red",
                            external: availabilityOpp,
                            }
                        },
                    },
                });


            },
            error:function(er){
                console.log("first loader availability graph ajax issue");
                console.log(er);
                reject(er);
            }
        });
    });
   
 
}

// first loader performance graph function
function first_loader_performance(f,t){
    return  new Promise(function (resolve,reject){
        $('#performanceOpportunity').remove();
        $('.child_graph_performance_opportunity').append('<canvas id="performanceOpportunity"></canvas>');
        $('.chartjs-hidden-iframe').remove();
      
        $.ajax({
            url:"<?php echo base_url('OEE_Drill_Down_controller/first_loader_performance') ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            data:{
                from:f,
                to:t
            },
            success:function(res){
                console.log("first loader performance graph");
                console.log(res);
                resolve(res);


                var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
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
                    // $(".PerformanceGrand").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));

                var partTotal = [];
                res.Total.forEach(function(r){
                    partTotal.push(parseFloat(r.toFixed(2)));
                });
                    
                var speedTotal=[];
                res.SpeedLossTotal.forEach(function(t){
                    speedTotal.push(parseFloat(t.toFixed(2)));
                });

                var sum = speedTotal.reduce(function(a, b) { return a + b; }, 0);
                var hour_text = parseInt(parseInt(sum)/60);
                var minute_text = parseInt(parseInt(sum)%60);
                $('#total_speed_loss').text(hour_text+'h'+' '+minute_text+'m');

                // console.log("total speed loss");
                // console.log(sum);
                var partWiseLable = [];
                res.Part.forEach(function(item){
                    partWiseLable.push(item.part_name);
                });
    
                var machine_total_arr = [];
                var mname_arr = [];
                res.dataPart.forEach(function(item){
                    var tmp_data = 0;
                    mname_arr.push(item['machine_name']);
                    item['machineData'].forEach(function(val){
                        tmp_data = parseInt(tmp_data)+parseInt(val['SpeedLoss']);
                    });
                    machine_total_arr.push(tmp_data);
                });
                //Find the duration for each machine in each Reason............
                oppCost = [
                    {
                        label:"Total" ,
                        type: "line",
                        backgroundColor: color[0],
                        borderColor: "#d9d9ff",  
                        borderWidth: 1, 
                        showLine : false,
                        fill: false, 
                        data:machine_total_arr,
                        percentage_data:machine_total_arr,
                        machine_wise_total:0,
                        speedLoss:speedTotal,
                        pointRadius: 7,
                    }           
                ];

                var x=1;
                var index=0;
                var category_percent = 1.0;
                var bar_space = 0.5;
            // var machine_total_arr = [];
                res.Part.forEach(function(item){
                    var performancePart=[];
                    var speedLoss=[];
                    var part_name_arr = [];
                        
                    var machine_wise_total = 0;   
                    res.dataPart.forEach(function(val){
                        // mname_arr.push(val['machine_name']);
                        val.machineData.forEach(function(value){
                            if (value['part_id'] === item['part_id']) {
                                var p = parseFloat(value['Opportunity'].toFixed(2));
                                //var tmp_sploss = parseFloat(value['SpeedLoss'].toFixed(2));
                                performancePart.push(p);
                                speedLoss.push(parseFloat(value['SpeedLoss'].toFixed(2)));
                                part_name_arr.push(value['part_name']);
                                machine_wise_total = parseFloat(machine_wise_total) + parseFloat(p).toFixed(2);
                            }
                        });         
                    });
                    // machine_total_arr.push(machine_wise_total)
                    oppCost.push({
                        label:item['part_name'],
                        type: "bar",
                        backgroundColor: color[x],
                        borderColor: color[x],
                        borderWidth: 1,
                        fill: true,
                        data: speedLoss,
                        // speedLoss:speedLoss,
                        percentage_data:0,
                        categoryPercentage:category_percent,
                        barPercentage: bar_space, 
                    });
                    x=x+1;
                    index=index+1;
                    
                });

                // console.log("Graph array")
                // console.log(oppCost);

                var bar_width = 0.6;
                var bar_size = 0.7;

                while(true){
                    var len= mname_arr.length;
                    if (len < 8) {
                        mname_arr.push("");
                    }
                    else if(len > 8){
                        var l = parseInt(len)%parseInt(8);
                        var w= parseInt($('.parent_graph_performance_opportunity').css("width"))+parseInt(l*18*16);
                        $('.child_graph_performance_opportunity').css("width",w+"px");
                        break;
                    }
                    else{
                        break;
                    }
                }
                // console.log("Machine name lable");
                // console.log(mname_arr);
                var ctx = document.getElementById("performanceOpportunity").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: mname_arr,
                        datasets:oppCost,
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,   
                        scales: {
                            y: {
                                display:true,
                                beginAtZero:true,
                                stacked:true
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
                            external: performanceOpp,
                            }
                        },
                    },            
                });

            },
            error:function(er){
                console.log("first loader performance graph ajax issue");
                console.log(er);
                reject(er);
            }
        });
    });
   
}


function first_loader_quality(f,t){
    return new Promise(function (resolve,reject){
       
        $.ajax({
            url:"<?php echo  base_url('OEE_Drill_Down_controller/first_loader_quality'); ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            data:{
                from:f,
                to:t
            },
            success:function(res){
                console.log("first loader quality graph");
                console.log(res);
                resolve(res);
                $('#quality_reason_machine').remove();
                $('.child_quality_reason_machine').append('<canvas id="quality_reason_machine"></canvas>');
                $('.chartjs-hidden-iframe').remove();


                // console.log("Quality Opportunity graph");
                // console.log(res);
                var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff",
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

                var machineName_arr = [];
                var machine_total_arr = [];
                var total_val = 0;
                res['machine_data'].forEach(function(item){
                    machineName_arr.push(item.machine_name);
                    total_val = total_val + item.total_rejects;
                    machine_total_arr.push(item.total_rejects);
                });

                $('#total_machine_reason_quality').text(parseInt(total_val).toLocaleString("en-IN"));
                quality_reason_arr = [
                    {
                        label:"Total" ,
                        type: "line",
                        backgroundColor: color[0],
                        borderColor: "#d9d9ff",  
                        borderWidth: 1, 
                        showLine : false,
                        fill: false, 
                        data:machine_total_arr,
                        percentage_data:machine_total_arr,
                        machine_wise_total:0,
                        // speedLoss:speedTotal,
                        pointRadius: 7,
                    }           
                ];
                var x=1;
                var index=0;
                res['graph_data'].forEach(function(item){
                    var part_arr = [];
                    var count_arr = [];
                    var reason_wise_data = [];
                    var temp_machine_part_arr = [];
                    item['machine_data'].forEach(function(ele) {
                        var tmp_part_total = 0;
                        var temp_partname_arr = [];
                        ele['part_data'].forEach(function(element){
                            tmp_part_total = tmp_part_total + element['total_reject'];
                            var temp_data = element['part_name']+'&'+element['total_reject'];
                            temp_partname_arr.push(temp_data);
                        });

                        var tmp_arr_str = temp_partname_arr.join(',');
                        temp_machine_part_arr.push(tmp_arr_str);
                        reason_wise_data.push(tmp_part_total);
                    });
                    quality_reason_arr.push({
                        label:item['reason_name'],
                        type: "bar",
                        backgroundColor: color[x],
                        borderColor: color[x],
                        borderWidth: 1,
                        fill: true,
                        data: reason_wise_data,
                        reason_arr:temp_machine_part_arr,
                        percentage_data:0,
                        categoryPercentage:1.0,
                        barPercentage: 0.5, 
                    });
                    x=x+1;
                    index=index+1;
                });


                // console.log(quality_reason_arr);
                var bar_width = 0.6;
                var bar_size = 0.7;
                while(true){
                    var len= machineName_arr.length;
                    if (len < 8) {
                        machineName_arr.push("");
                    }
                    else if(len > 8){
                        var l = parseInt(len)%parseInt(8);
                        var w= parseInt($('.parent_quality_reason_machine').css("width"))+parseInt(l*18*16);
                        $('.child_quality_reason_machine').css("width",w+"px");
                        break;
                    }
                    else{
                        break;
                    }
                }
            
                var ctx = document.getElementById("quality_reason_machine").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: machineName_arr,
                        datasets:quality_reason_arr,
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,   
                        scales: {
                            y: {
                                display:true,
                                beginAtZero:true,
                                stacked:true
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
                                external: quality_reason_machine_tooltip,
                            }
                        },
                    },            
                });

            },
            error:function(er){
                console.log("first loader quality graph aja issue");
                console.log(er);
                reject(er);
            }
        });
    });
   

}
</script>
