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
  .hoverOverall{
    background-color: white;
    border-radius: 5px 5px 5px 5px;
    z-index: 1400;
    position: absolute;
    border: 0.5px solid #d9d9d9;
    padding: 0.5rem;
    color: #979a9a;
    font-size: 0.8rem;
    font-weight:500;
    max-width:13rem;
    min-width: 12rem; 
    margin-top: 0.2rem;
    opacity: 100%;
    font-family: 'Roboto', sans-serif;
  }
  .hoverOverallOOE{
    display: none;
  }
  .hoverOverallOEE{
    display: none;
  }
  .hoverOverallTEEP{
    display: none;
  }

  .hoverCardOOE:hover + .hoverOverallOOE{
    display: block;
  }
  .hoverCardOEE:hover + .hoverOverallOEE{
    display: block;
  }
  .hoverCardTEEP:hover + .hoverOverallTEEP{
    display: block;
  }
  .center-align-div{
    display: flex;
    align-content: center;
    align-items: center;
    text-align: center;
    justify-content: center;
    margin-right:0.5rem;
  }
  .overallTargetDiv{
    height: 10px;
    width: 10px;
    background-color: rgb(179,215,255);
  }
  .overallValueDiv{
    height: 10px;
    width: 10px;
    background-color: rgb(0,74,155);
  }
  .overallDiv{
    height: 10px;
    width: 10px;
    background-color: rgb(242,242,242);
  }
  .graph_font{
    color: white;
    margin-left: 0.3rem;
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

<div style="margin-left: 4.5rem;margin-top:1rem; overflow-x:hidden;overflow-y:scroll;">
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="position:fixed;margin-top:0;width:94.5%;">
        <div class="container-fluid paddingm">
            <p class="float-start" id="logo">OEE Drill Down</p>
            <div class="d-flex">
               
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
                <div class="box rightmar mar_r_box" style="">
                    <button type="button" class="overall_filter_btn overall_filter_header_css"  >Apply Filter</button>
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
                        <div style="width:50%;text-align:end;"><span id="target_teep_val_hover">30</span>%</div>
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
                        <div style="width:50%;text-align:end;"><span id="target_ooe_val_hover">30</span>%</div>
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
                        <div style="width:50%;text-align:end;"><span id="target_oee_val_hover">30</span>%</div>
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
                <!-- <div class="box" style="" >
                    <label class="multi_select_label non_select" style="">Machines</label>
                    <div class="filter_selectBox non_select select_pointer oee_trend_drp_machine" onclick="common_drp_click('filter_checkboxes_machine','oee_trend_drp_machine')">
                        <select  class="multi_select_drp" style="" >
                            <option class="text_machine non_select" style="">All Machines</option>
                        </select>
                        <div class="filter_overSelect"></div>
                    </div>
                    <div class="filter_checkboxes filter_checkboxes_machine" style="" >
                    </div>
                </div> -->
                <div class="box">
                    <div class="input-box indexing Machines_dd_trend">
                      <div class="filter_multiselect filter_option" style="width:9rem;">
                        <span class="multi_select_label" style="">Machines</span>
                        <div class="filter_selectBox dd_trend_machine" onclick="multiple_drp_hide_seek('filter_machine_dd_trend','dd_trend_machine')">
                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                            <div style="width: 80% !important">
                              <p class="paddingm" id="machine_text_dd_trend">All Machines</p>
                            </div>
                            <div class="dropdown-div" style=" width: 20% !important">
                              <i class="fa fa-angle-down icon-style"></i>
                            </div>
                          </div>
                        </div>
                        <div class="filter_checkboxes filter_machine_dd_trend">
                        </div>
                      </div>
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
                <div class="box rightmar">
                    <div class="input-box indexing DataFields_dd_moeeb">
                      <div class="filter_multiselect filter_option" style="width:9rem;">
                        <span class="multi_select_label" style="">Data Fields</span>
                        <div class="filter_selectBox dd_moeeb_dataField" onclick="multiple_drp_hide_seek('filter_dataField_dd_moeeb','dd_moeeb_dataField')">
                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                            <div style="width: 80% !important">
                              <p class="paddingm" id="dataField_text_dd_moeeb">All Data Fields</p>
                            </div>
                            <div class="dropdown-div" style=" width: 20% !important">
                              <i class="fa fa-angle-down icon-style"></i>
                            </div>
                          </div>
                        </div>
                        <div class="filter_checkboxes filter_dataField_dd_moeeb">
                        </div>
                      </div>
                    </div>
                </div>

                <!-- Machine multi select dropdown -->
                <div class="box">
                    <div class="input-box indexing Machines_dd_moeeb">
                      <div class="filter_multiselect filter_option" style="width:9rem;">
                        <span class="multi_select_label" style="">Machines</span>
                        <div class="filter_selectBox dd_moeeb_machine" onclick="multiple_drp_hide_seek('filter_machine_dd_moeeb','dd_moeeb_machine')">
                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                            <div style="width: 80% !important">
                              <p class="paddingm" id="machine_text_dd_moeeb">All Machines</p>
                            </div>
                            <div class="dropdown-div" style=" width: 20% !important">
                              <i class="fa fa-angle-down icon-style"></i>
                            </div>
                          </div>
                        </div>
                        <div class="filter_checkboxes filter_machine_dd_moeeb">
                        </div>
                      </div>
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
                <div style="width:16%;">
                    <p class="header_text_val" style="">TOTAL</p>
                    <span class="header_value_pass" style="" id="total_duration_availability">0</span>
                </div>
                <div style="" class="availability_drp_div">
                    <!-- category multi select dropdown -->
                    <div class="box rightmar">
                        <div class="input-box indexing Categories_dd_mawr">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Categories</span>
                            <div class="filter_selectBox dd_mawr_category" onclick="multiple_drp_hide_seek('filter_category_dd_mawr','dd_mawr_category')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="category_text_dd_mawr">All Categories</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_category_dd_mawr">
                            </div>
                          </div>
                        </div>
                    </div>

                    <!-- reason multi select dropdown -->
                    <div class="box rightmar">
                        <div class="input-box indexing Reasons_dd_mawr">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Reasons</span>
                            <div class="filter_selectBox dd_mawr_reason" onclick="multiple_drp_hide_seek('filter_reason_dd_mawr','dd_mawr_reason')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="reason_text_dd_mawr">All Reasons</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_reason_dd_mawr">
                            </div>
                          </div>
                        </div>
                    </div>
                
                    <!-- Machine multi select dropdown -->
                    <div class="box">
                        <div class="input-box indexing Machines_dd_mawr">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Machines</span>
                            <div class="filter_selectBox dd_mawr_machine" onclick="multiple_drp_hide_seek('filter_machine_dd_mawr','dd_mawr_machine')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="machine_text_dd_mawr">All Machines</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_machine_dd_mawr">
                            </div>
                          </div>
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
                <div style="width:20%;">
                    <p class="header_text_val" >TOTAL</p>
                    <span class="header_value_pass"  id="total_speed_loss">0</span>
                </div>
                <div style="" class="performance_drp_div">    
                    <!-- reason multi select dropdown -->
                    <div class="box rightmar">
                        <div class="input-box indexing Parts_dd_mpwp">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Parts</span>
                            <div class="filter_selectBox dd_mpwp_part" onclick="multiple_drp_hide_seek('filter_part_dd_mpwp','dd_mpwp_part')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="part_text_dd_mpwp">All Parts</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_part_dd_mpwp">
                            </div>
                          </div>
                        </div>
                    </div>
               
                    <!-- Machine multi select dropdown -->
                    <div class="box">
                        <div class="input-box indexing Machines_dd_mpwp">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Machines</span>
                            <div class="filter_selectBox dd_mpwp_machine" onclick="multiple_drp_hide_seek('filter_machine_dd_mpwp','dd_mpwp_machine')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="machine_text_dd_mpwp">All Machines</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_machine_dd_mpwp">
                            </div>
                          </div>
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
                    <div class="box rightmar">
                        <div class="input-box indexing Reasons_dd_mqwr">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Reasons</span>
                            <div class="filter_selectBox dd_mqwr_reason" onclick="multiple_drp_hide_seek('filter_reason_dd_mqwr','dd_mqwr_reason')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="reason_text_dd_mqwr">All Reasons</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_reason_dd_mqwr">
                            </div>
                          </div>
                        </div>
                    </div>
               
                    <!-- Machine multi select dropdown -->
                    <div class="box">
                        <div class="input-box indexing Machines_dd_mqwr">
                          <div class="filter_multiselect filter_option" style="width:9rem;">
                            <span class="multi_select_label" style="">Machines</span>
                            <div class="filter_selectBox dd_mqwr_machine" onclick="multiple_drp_hide_seek('filter_machine_dd_mqwr','dd_mqwr_machine')">
                              <div class="inbox-span fontStyle search_style dropdown-arrow">
                                <div style="width: 80% !important">
                                  <p class="paddingm" id="machine_text_dd_mqwr">All Machines</p>
                                </div>
                                <div class="dropdown-div" style=" width: 20% !important">
                                  <i class="fa fa-angle-down icon-style"></i>
                                </div>
                              </div>
                            </div>
                            <div class="filter_checkboxes filter_machine_dd_mqwr">
                            </div>
                          </div>
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
<!-- <div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
    </div>
</div> -->
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



// overall filter onclick function
$(document).on('click','.overall_filter_btn',function(event){
    event.preventDefault();
    $('#overlay').fadeIn(400);

    reset_machine_dd_trend();
    reset_machine_dd_moeeb();
    reset_machine_dd_mawr();
    reset_machine_dd_mpwp();
    reset_machine_dd_mqwr();

    reset_reason_dd_mawr();
    reset_reason_dd_mqwr();

    reset_part_dd_mpwp();

    reset_dataField_dd_moeeb();

    reset_category_dd_mawr();

    all_graph_fun();
});

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

  










// by day shift meek month
var filter_expand_by_day = 0;
function byday_click(){
    var checkboxes = document.getElementsByClassName("byday_fill");
  if (!filter_expand_by_day) {
      $('.byday_fill').css("display","block");
      filter_expand_by_day = true;
  } else  {
     
      $('.byday_fill').css("display","none");
      filter_expand_by_day = false;
      
  }
}



// temporary hold this code
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
    common_click_div_fun('category_click2','category_drp_checkbox2','text_category_drp2','Categories','machine_wise_availability_category_call',this);

  
});

// availability graph
$(document).on('click','.reason_click2',function(event){
    event.preventDefault();
    common_click_div_fun('reason_click2','reason_checkbox2','text_reason2','Reasons','machine_wise_availability_reason_call',this);

    
});

// machine wise quality graph
// reason dropdown onclick div function
$(document).on('click','.quality_click',function(event){
    event.preventDefault();
    common_click_div_fun('quality_click','quality_checkbox','text_quality_reason','Reasons','machine_wise_quality_reason_call',this);
  
});


$(document).on('click','.machine_click',function(event){
    event.preventDefault();
    common_click_div_fun('machine_click','machine_checkbox','text_machine','Machines','oee_trend_machine_call',this);
   
});

// machine wise oee graph machine drp click function
$(document).on('click','.machine_click1',function(event){
    event.preventDefault();
    common_click_div_fun('machine_click1','machine_checkbox1','text_machine1','Machines','machine_wise_oee_machine_call',this);
   
});

// availability graph
$(document).on('click','.machine_click2',function(event){
    event.preventDefault();
    common_click_div_fun('machine_click2','machine_checkbox2','text_machine2','Machines','machine_wise_availability_machine_call',this);

   
});


$(document).on('click','.machine_click3',function(event){
    event.preventDefault();
    common_click_div_fun('machine_click3','machine_checkbox3','text_machine3','Machines','machine_wise_performance_machine_call',this);

   
});



$(document).on('click','.part_click',function(event){
    event.preventDefault();
    common_click_div_fun('part_click','part_checkbox','text_part','Parts','machine_wise_performance_part_call',this);

   
});

// machine wise quality graph machine dropdown onclick
$(document).on('click','.machine_click4',function(event){
    event.preventDefault();
    common_click_div_fun('machine_click4','machine_checkbox4','text_machine4','Machines','machine_wise_quality_machine_call',this);
   
});

// machine wise oee graph datafield  dropdown onclick
$(document).on('click','.all_data_field_click',function(event){
    event.preventDefault();
    common_click_div_fun('all_data_field_click','all_data_field_checkbox','text_all_data_field','DataFields','machine_wise_oee_datafield_call',this);

   
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

    var machine_check_dd_trend = $('.filter_machine_dd_trend');
    var dd_trend_machine_c = $('.dd_trend_machine');
    if (!machine_check_dd_trend.is(event.target) && machine_check_dd_trend.has(event.target).length==0 && !dd_trend_machine_c.is(event.target) && dd_trend_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_trend_machine']==true){
            machine_check_dd_trend.hide();
            hide_seek_obj['dd_trend_machine']=false;
        }
    }

    var machine_check_dd_moeeb = $('.filter_machine_dd_moeeb');
    var dd_moeeb_machine_c = $('.dd_moeeb_machine');
    if (!machine_check_dd_moeeb.is(event.target) && machine_check_dd_moeeb.has(event.target).length==0 && !dd_moeeb_machine_c.is(event.target) && dd_moeeb_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_moeeb_machine']==true){
            machine_check_dd_moeeb.hide();
            hide_seek_obj['dd_moeeb_machine']=false;
        }
    }

    var dataField_check_dd_moeeb = $('.filter_dataField_dd_moeeb');
    var dd_moeeb_dataField_c = $('.dd_moeeb_dataField');
    if (!dataField_check_dd_moeeb.is(event.target) && dataField_check_dd_moeeb.has(event.target).length==0 && !dd_moeeb_dataField_c.is(event.target) && dd_moeeb_dataField_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_moeeb_dataField']==true){
            dataField_check_dd_moeeb.hide();
            hide_seek_obj['dd_moeeb_dataField']=false;
        }
    }

    var machine_check_dd_mawr = $('.filter_machine_dd_mawr');
    var dd_mawr_machine_c = $('.dd_mawr_machine');
    if (!machine_check_dd_mawr.is(event.target) && machine_check_dd_mawr.has(event.target).length==0 && !dd_mawr_machine_c.is(event.target) && dd_mawr_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mawr_machine']==true){
            machine_check_dd_mawr.hide();
            hide_seek_obj['dd_mawr_machine']=false;
        }
    }

    var category_check_dd_mawr = $('.filter_category_dd_mawr');
    var dd_mawr_category_c = $('.dd_mawr_category');
    if (!category_check_dd_mawr.is(event.target) && category_check_dd_mawr.has(event.target).length==0 && !dd_mawr_category_c.is(event.target) && dd_mawr_category_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mawr_category']==true){
            category_check_dd_mawr.hide();
            hide_seek_obj['dd_mawr_category']=false;
        }
    }

    var machine_check_dd_mpwp = $('.filter_machine_dd_mpwp');
    var dd_mpwp_machine_c = $('.dd_mpwp_machine');
    if (!machine_check_dd_mpwp.is(event.target) && machine_check_dd_mpwp.has(event.target).length==0 && !dd_mpwp_machine_c.is(event.target) && dd_mpwp_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mpwp_machine']==true){
            machine_check_dd_mpwp.hide();
            hide_seek_obj['dd_mpwp_machine']=false;
        }
    }

    var part_check_dd_mpwp = $('.filter_part_dd_mpwp');
    var dd_mpwp_part_c = $('.dd_mpwp_part');
    if (!part_check_dd_mpwp.is(event.target) && part_check_dd_mpwp.has(event.target).length==0 && !dd_mpwp_part_c.is(event.target) && dd_mpwp_part_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mpwp_part']==true){
            part_check_dd_mpwp.hide();
            hide_seek_obj['dd_mpwp_part']=false;
        }
    }

    var machine_check_dd_mqwr = $('.filter_machine_dd_mqwr');
    var dd_mqwr_machine_c = $('.dd_mqwr_machine');
    if (!machine_check_dd_mqwr.is(event.target) && machine_check_dd_mqwr.has(event.target).length==0 && !dd_mqwr_machine_c.is(event.target) && dd_mqwr_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mqwr_machine']==true){
            machine_check_dd_mqwr.hide();
            hide_seek_obj['dd_mqwr_machine']=false;
        }
    }

    var reason_check_dd_mawr = $('.filter_reason_dd_mawr');
    var dd_mawr_reason_c = $('.dd_mawr_reason');
    if (!reason_check_dd_mawr.is(event.target) && reason_check_dd_mawr.has(event.target).length==0 && !dd_mawr_reason_c.is(event.target) && dd_mawr_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mawr_reason']==true){
            reason_check_dd_mawr.hide();
            hide_seek_obj['dd_mawr_reason']=false;
        }
    }
    var reason_check_dd_mqwr = $('.filter_reason_dd_mqwr');
    var dd_mqwr_reason_c = $('.dd_mqwr_reason');
    if (!reason_check_dd_mqwr.is(event.target) && reason_check_dd_mqwr.has(event.target).length==0 && !dd_mqwr_reason_c.is(event.target) && dd_mqwr_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['dd_mqwr_reason']==true){
            reason_check_dd_mqwr.hide();
            hide_seek_obj['dd_mqwr_reason']=false;
        }
    }
    

    
        

    // // oee trend graph
    // // machine multi select dropdown
    // var machine = $('.filter_checkboxes_machine');
    // var oee_trend_machine_drp = $('.oee_trend_drp_machine');
    // if (!machine.is(event.target) && machine.has(event.target).length==0 && !oee_trend_machine_drp.is(event.target) && oee_trend_machine_drp.has(event.target).length==0) {
    //     if (drp_obj['oee_trend_drp_machine']==true) {
    //         drp_obj['oee_trend_drp_machine']=false;
    //         machine.hide();     
    //     }
    // }

    // // machine wise OEE %
    // // all data field dropdown
    // var all_data_field = $('.all_data_field_fill');
    // var machine_wise_oee_field_drp = $('.machine_wise_oee_field_drp');
    // if (!all_data_field.is(event.target) && all_data_field.has(event.target).length==0 && !machine_wise_oee_field_drp.is(event.target) && machine_wise_oee_field_drp.has(event.target).length==0) {
    //     if (drp_obj['machine_wise_oee_field_drp']==true) {
    //         drp_obj['machine_wise_oee_field_drp']=false;
    //         all_data_field.hide();
    //     }
    // }

    // // machine dropdown
    // var machine1 = $('.filter_checkboxes_machine1');
    // var machine_wise_oee_machine_drp = $('.machine_wise_oee_machine_drp');
    // if (!machine1.is(event.target) && machine1.has(event.target).length==0 && !machine_wise_oee_machine_drp.is(event.target) && machine_wise_oee_machine_drp.has(event.target).length==0) {
    //     if (drp_obj['machine_wise_oee_machine_drp']==true) {
    //         drp_obj['machine_wise_oee_machine_drp']=false;
    //         machine1.hide();
    //     }
    // }

    // // machine wise availability 
    // // category dropdown
    // var category1 = $('.category_fill2');
    // var machine_wise_availability_category = $('.machine_availability_category_drp');
    // if (!category1.is(event.target) && category1.has(event.target).length==0 && !machine_wise_availability_category.is(event.target) && machine_wise_availability_category.has(event.target).length==0) {
    //     if (drp_obj['machine_availability_category_drp']==true) {
    //         drp_obj['machine_availability_category_drp']=false;
    //         category1.hide();
    //     }
    // }
    // // reason dropdown
    // var reason1 = $('.reason_fill2');
    // var machine_wise_availability_reason = $('.machine_availability_reason_drp');
    // if (!reason1.is(event.target) && reason1.has(event.target).length==0 && !machine_wise_availability_reason.is(event.target) && machine_wise_availability_reason.has(event.target).length==0) {
    //     if (drp_obj['machine_availability_reason_drp']==true) {
    //         drp_obj['machine_availability_reason_drp']=false;
    //         reason1.hide();
    //     }
    // }

    // // machine 
    // var machine2 = $('.filter_checkboxes_machine2');
    // var machine_wise_availability_machine = $('.machine_availability_machine_drp');
    // if (!machine2.is(event.target) && machine2.has(event.target).length==0 && !machine_wise_availability_machine.is(event.target) && machine_wise_availability_machine.has(event.target).length==0) {
    //     if (drp_obj['machine_availability_machine_drp']==true) {
    //         drp_obj['machine_availability_machine_drp']=false;
    //         machine2.hide();
    //     }
    // }

    // // Machine-wise Performance with Parts
    // // parts
    // var part1 = $('.part_fill');
    // var machine_wise_performance_part_tmp = $('.machine_wise_performance_part_drp');
    // if (!part1.is(event.target) && part1.has(event.target).length==0 && !machine_wise_performance_part_tmp.is(event.target) && machine_wise_performance_part_tmp.has(event.target).length==0) {
    //     if (drp_obj['machine_wise_performance_part_drp']==true) {
    //         drp_obj['machine_wise_performance_part_drp']=false;
    //         part1.hide();
    //     }
    // }

    // // machine
    // var machine3 = $('.filter_checkboxes_machine3');
    // var machine_wise_performance_machine_tmp = $('.machine_wise_performance_machine_drp');
    // if (!machine3.is(event.target) && machine3.has(event.target).length==0 && !machine_wise_performance_machine_tmp.is(event.target) && machine_wise_performance_machine_tmp.has(event.target).length==0) {
    //     if (drp_obj['machine_wise_performance_machine_drp']==true) {
    //         drp_obj['machine_wise_performance_machine_drp']=false;
    //         machine3.hide();
    //     }
    // }

    // // machine quality with reasons
    // // machine
    // var machine4 = $('.filter_checkboxes_machine4');
    // var machine_wise_quality_machine_tmp = $('.machine_wise_quality_machine_drp');
    // if (!machine4.is(event.target) && machine4.has(event.target).length==0 && !machine_wise_quality_machine_tmp.is(event.target) && machine_wise_quality_machine_tmp.has(event.target).length==0) {
    //     if (drp_obj['machine_wise_quality_machine_drp']==true) {
    //         drp_obj['machine_wise_quality_machine_drp']=false;
    //         machine4.hide();
    //     }
    // }

    // // quality 
    // var quality = $('.quality_reason_fill');
    // var machine_wise_quality_reason_tmp = $('.machine_wise_quality_reason_drp');
    // if (!quality.is(event.target) && quality.has(event.target).length==0 && !machine_wise_quality_reason_tmp.is(event.target) && machine_wise_quality_reason_tmp.has(event.target).length==0) {
    //     if (drp_obj['machine_wise_quality_reason_drp']==true) {
    //         drp_obj['machine_wise_quality_reason_drp']=false;
    //         quality.hide();
    //     }
    // }




});

// graph onclick ajax function call
$(document).on('click','.oee_trend_common',function(event){
    event.preventDefault();
    oeeTrendDay();
});

// graph onclick ajax function call machine wise oee
$(document).on('click','.machine_oee_common',function(event){
    event.preventDefault();
    machineWiseOEE();
});

// graph onclickajax function call machine wise availability
$(document).on('click','.machine_availability_common',function(event){
    event.preventDefault();
    availabilityReason_machine();
});

// graph onclick ajax function call machine wise performance 
$(document).on('click','.machine_performance_common',function(event){
    event.preventDefault();
    performance_opportunity();
});

// graph onclick ajax function call machine wise quality
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
                        // borderColor: "#004b9b", 
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
                var tmp_total_duration = 0;
                item.forEach(function(val){
                    tmp_total_duration = tmp_total_duration + val['duration'];
                });
                machine_wise_total.push(tmp_total_duration);
    
            });

            // var reasonList =[];
            
            // res['reason'].forEach(function(reason){
            //     reasonList.push(reason.downtime_reason);
            // });

            // var totalVal =[];
            // res['total'].forEach(function(total){
            //     totalVal.push(total.toFixed(2));
            // });

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
            // alert("Sorry!Try Agian!!!!");
        }
    }); 
}

// tooltip function
function performanceOpp(context){
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

            $('#quality_reason_machine').remove();
            $('.child_quality_reason_machine').append('<canvas id="quality_reason_machine"></canvas>');
            $('.chartjs-hidden-iframe').remove();

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
            tmp_part_arr.forEach(function(item){
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

    
        $('.filter_machine_dd_trend').empty();
        $('.filter_machine_dd_moeeb').empty();
        $('.filter_machine_dd_mawr').empty();
        $('.filter_machine_mpwp').empty();
        $('.filter_machine_dd_mqwr').empty();
        
        $('.filter_reason_dd_mawr').empty();
        $('.filter_reason_dd_mqwr').empty();

        $('.filter_part_mpwp').empty();

        $('.filter_category_dd_mawr').empty();

        $('.filter_dataField_dd_moeeb').empty();
        
        
        $.ajax({
            url:"<?php echo base_url('OEE_Drill_Down_controller/get_all_dilter_drp_fun'); ?>",
            method:"POST",
            dataType:"JSON",
            // async:false,
            success:function(res){
                resolve(res);

                $('.filter_machine_dd_moeeb').append('<div class="inbox inbox_machine_dd_moeeb" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_machine_dd_moeeb filter_machine_dd_moeeb_val" name="machine_dd_moeeb_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_machine_dd_dataField').append('<div class="inbox inbox_machine_dd_dataField" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_machine_dd_dataField filter_machine_dd_dataField_val" name="machine_dd_dataField_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                

                $('.filter_machine_dd_mawr').append('<div class="inbox inbox_machine_dd_mawr" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_machine_dd_mawr filter_machine_dd_mawr_val" name="machine_dd_mawr_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_category_dd_mawr').append('<div class="inbox inbox_category_dd_mawr" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_category_dd_mawr filter_category_dd_mawr_val" name="category_dd_mawr_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_machine_dd_mqwr').append('<div class="inbox inbox_machine_dd_mqwr" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_machine_dd_mqwr filter_machine_dd_mqwr_val" name="machine_dd_mqwr_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_machine_dd_trend').append('<div class="inbox inbox_machine_dd_trend" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_machine_dd_trend filter_machine_dd_trend_val" name="machine_dd_trend_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_machine_dd_mpwp').append('<div class="inbox inbox_machine_dd_mpwp" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_machine_dd_mpwp filter_machine_dd_mpwp_val" name="machine_dd_mpwp_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_reason_dd_mawr').append('<div class="inbox inbox_reason_dd_mawr" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_reason_dd_mawr filter_reason_dd_mawr_val" name="reason_dd_mawr_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_reason_dd_mqwr').append('<div class="inbox inbox_reason_dd_mqwr" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_reason_dd_mqwr filter_reason_dd_mqwr_val" name="reason_dd_mqwr_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

                $('.filter_part_dd_mpwp').append('<div class="inbox inbox_part_dd_mpwp" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part_dd_mpwp filter_part_dd_mpwp_val" name="part_dd_mpwp_filter_val" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');
                
                

                res['data_field'].forEach(function(val){
                    $('.filter_dataField_dd_moeeb').append('<div class="inbox inbox_dataField_dd_moeeb" style="display: flex;">'
                      +'<div style="float: left;width: 20%;" class="center-align">'
                        +'<input class="checkbox_dataField_dd_moeeb filter_dataField_dd_moeeb_val" name="dataField_dd_moeeb_filter_val" value="'+val+'" type="checkbox" checked/>'
                      +'</div>'
                      +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                          +'<p class="inbox-span paddingm">'+val+'</p>'
                      +'</div>'
                    +'</div>');
                });

                res['machine'].forEach(function(val){
                        $('.filter_machine_dd_trend').append('<div class="inbox inbox_machine_dd_trend" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_machine_dd_trend filter_machine_dd_trend_val" name="machine_dd_trend_filter_val" value="'+val.machine_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                          +'</div>'
                        +'</div>');

                        $('.filter_machine_dd_moeeb').append('<div class="inbox inbox_machine_dd_moeeb" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_machine_dd_moeeb filter_machine_dd_moeeb_val" name="machine_dd_moeeb_filter_val" value="'+val.machine_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                          +'</div>'
                        +'</div>');

                        $('.filter_machine_dd_mawr').append('<div class="inbox inbox_machine_dd_mawr" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_machine_dd_mawr filter_machine_dd_mawr_val" name="machine_dd_mawr_filter_val" value="'+val.machine_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                          +'</div>'
                        +'</div>');

                        $('.filter_machine_dd_mqwr').append('<div class="inbox inbox_machine_dd_mqwr" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_machine_dd_mqwr filter_machine_dd_mqwr_val" name="machine_dd_mqwr_filter_val" value="'+val.machine_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                          +'</div>'
                        +'</div>');

                        $('.filter_machine_dd_mpwp').append('<div class="inbox inbox_machine_dd_mpwp" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_machine_dd_mpwp filter_machine_dd_mpwp_val" name="machine_dd_mpwp_filter_val" value="'+val.machine_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                          +'</div>'
                        +'</div>');                        

                    });

                res['downtime'].forEach(function(val){

                    $('.filter_reason_dd_mawr').append('<div class="inbox inbox_reason_dd_mawr" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_reason_dd_mawr filter_reason_dd_mawr_val" name="reason_dd_mawr_filter_val" value="'+val.downtime_reason_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.downtime_reason_id+"-"+val.downtime_reason+'</p>'
                          +'</div>'
                        +'</div>');
                });

                res['category'].forEach(function(val){

                    $('.filter_category_dd_mawr').append('<div class="inbox inbox_category_dd_mawr" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_category_dd_mawr filter_category_dd_mawr_val" name="category_dd_mawr_filter_val" value="'+val.downtime_category+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.downtime_category+'</p>'
                          +'</div>'
                        +'</div>');
                });

                res['quality'].forEach(function(val){
                    var elements_qdrp = $();
                    $('.filter_reason_dd_mqwr').append('<div class="inbox inbox_reason_dd_mqwr" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_reason_dd_mqwr filter_reason_dd_mqwr_val" name="reason_dd_mqwr_filter_val" value="'+val.quality_reason_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.quality_reason_id+"-"+val.quality_reason_name+'</p>'
                          +'</div>'
                        +'</div>');
                });

                res['part'].forEach(function(val){
                    $('.filter_part_dd_mpwp').append('<div class="inbox inbox_part_dd_mpwp" style="display: flex;">'
                          +'<div style="float: left;width: 20%;" class="center-align">'
                            +'<input class="checkbox_part_dd_mpwp filter_part_dd_mpwp_val" name="part_dd_mpwp_filter_val" value="'+val.part_id+'" type="checkbox" checked/>'
                          +'</div>'
                          +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                              +'<p class="inbox-span paddingm">'+val.part_id+"-"+val.part_name+'</p>'
                          +'</div>'
                        +'</div>'); 
                });


                // reset_reason();
                // reset_reason2();
                
                // reset_quality_reason();
                // reset_part();
                // reset_machine();
                // reset_machine1();
                // reset_machine2();
                // reset_machine3();
                // reset_machine4();
                // resetbyday_click();
                // reset_category2();
                // reset_all_data_field();

              
                
            },
            error:function(er){
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

                resolve(res);
                $('#machine_wise_oee').remove();
                $('.child_machine_wise_oee').append('<canvas id="machine_wise_oee"></canvas>');
                $('.chartjs-hidden-iframe').remove();
                
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
                            // borderColor: "#004b9b", 
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
                    var tmp_total_duration = 0;
                    item.forEach(function(val){
                        tmp_total_duration = tmp_total_duration + val['duration'];
                    });
                    machine_wise_total.push(tmp_total_duration);
        
                });

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
                resolve(res);
                $('#quality_reason_machine').remove();
                $('.child_quality_reason_machine').append('<canvas id="quality_reason_machine"></canvas>');
                $('.chartjs-hidden-iframe').remove();

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
                reject(er);
            }
        });
    });
   

}
</script>
