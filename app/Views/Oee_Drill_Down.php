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
<style>
.multi_select_label{
position:fixed;
margin-top:0rem;
margin-left:0.8rem;
z-index:1;
background:white;
font-size:12px;
color:#8c8c8c;
font-family:'Roboto' sans-serif;
}
.filter_selectBox{
height:2rem;
/* margin-top:0.5rem; */
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
min-height:2rem;
max-height:3rem;
}
.cate_drp_check{
width:20%;
display:flex;
justify-content:center;
}
.cate_drp_text{
width:80%;
}
.multi_select_drp{
height:2rem;
position:relative;
min-width:9rem;
font-size:12px;
font-weight:500;
color:#8c8c8c;
border:1px solid #ced4da;
border-radius:0.25rem;
padding-left:1rem;
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
z-index:250;
position: absolute;
background:white;
/* padding:0.4rem; */
border-radius:0.25rem;
min-width:8.7rem;
min-height:max-content;
max-height:10rem;
overflow:hidden;
/* overflow-y:scroll;
overflow-x:hidden; */
}

.filter_checkboxes label {
display: block;
}

.filter_checkboxes div:hover {
background-color: #E7F2FF;
padding:0;
/* cursor:context-menu; */
/* width:100%; */
}

/* over all target graph css */
.target_bar_bottom{
    margin-top:0.6rem;
}
.graph_text{
    margin-bottom:auto;
    color:#404040;
    font-size:14px;
    font-weight:400;
}
.empty_graph{
    background-color:#F2F2F2;
    height:3.5rem;
    border-radius:0.2rem;
}
.target_graph{
    background-color:#B3D7FF;
    height:3.5rem;
    /* width:85%;  */
    border-radius:0.2rem;
    padding:0.2rem;
    padding-left:0;
    padding-right:0;
}
.fill_graph{
    background-color:#0075F6;
    width:80%;
    border-radius:0.2rem;
    height:3rem;
    color:white;
    display:flex;
    align-items:center;
    padding-left:0.3rem;
}
.graph_font{
    font-weight:bold;
    font-size:1.4rem;
}
.font_multi_drp{
font-family:'Roboto',sans-serif;
  font-weight:500;
  font-size:12px;
  margin:auto;
  user-select: none; 
  -webkit-user-select: none;
  -ms-user-select: none;
}
.reason_fill , .reason_fill2 {
    max-height:8rem;
    min-height:4rem;
    overflow-x:hidden;
    overflow-y:scroll;
}


.filter_checkboxes_machine , .filter_checkboxes_machine1 ,.filter_checkboxes_machine2,.filter_checkboxes_machine3{
    max-height:8rem;
    min-height:4rem;
    overflow-x:hidden;
    overflow-y:scroll;
}

.part_fill{
    max-height:8rem;
    min-height:4rem;
    overflow-x:hidden;
    overflow-y:scroll;
}

/* chartjs div css */
.parent_div{
    height:11rem;
    overflow-y:hidden;
}
.prodcution_downtime_graph{
    margin-bottom:0.6rem;
}
.marginScroll{
    margin-left:1rem;
    margin-right:1rem;
}
.child_div{
    height:100%;
    padding:0.5rem;    
}

/* moddule first row div  style */
.first_row{
    display:flex;
    flex-direction:row;
    margin-top:4.2rem;
    padding:0.3rem;
    padding-bottom:0;
    justify-content:space-evenly;
}
.overall_div{
    width:30%;
    height:19.4rem;
    border:1px solid #e6e6e6;
    padding-bottom:1rem;
    border-radius:0.5rem;
    padding-left:1rem;
    padding-right:0.5rem;
}
.oee_trend_div{
    width:69%;
    height:19.4rem;
    border:1px solid #e6e6e6;
    border-radius:0.5rem;
    padding-left:1rem;
}
.second_row{
    display:flex;
    flex-direction:row;
    margin-top:0.3rem;
    justify-content:space-evenly;
}
.graph_filter_div{
    display:flex;
    flex-direction:row;
    justify-content:flex-end;
}
/* machine wise oee% */
.icons_bottom{
    display:flex;
    flex-direction:row-reverse;
}
.align_icons{
    width:15%;
    display:flex;
    flex-direction:row;
}
.align_machine_icons{
    width:20%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}
.graph_label_font{
    font-size:12px;
    font-weight:450;
    color:#404040;
}

.quality_circle{
    background-color:#09BB9F;
    height:0.5rem;
    width:0.5rem;
    border-radius:50%;
}
.performance_star{
    color:#0075F6;
    font-size:10px;
}
.availability_triangle{
    width:0;
    height:0;
    border-left:5px solid transparent;
    border-right:5px solid transparent;
    border-bottom:10px solid #000000;
}
.oee_square{
    background-color:#0075F6;
    height:0.6rem;
    width:0.6rem;
}
.each_row_split{
    width:49.2%;
    border-radius:0.5rem;
    border:1px solid #e6e6e6;
    height:19rem;
}
.graph_title_oee{
    margin-bottom:auto;
    color:#404040;
    font-size:14px;
    font-weight:450;
}
.title_div{
   
    display:flex;
    flex-direction:column;
    margin-top:1rem;
    margin-left:1.3rem;
    margin-bottom:0.6rem;
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
                        <label for="inputSiteNameAdd" class="input-padding ">From Date</label>
                    </div>
                </div>
                <div class="box rightmar" style="margin-right: 0.5rem;">
                    <div class="input-box">
                        <!-- <input type="date" name="" class="form-control toDate"> -->
                        <input type="text" class="form-control toDate" value="" step="1">
                        <label for="inputSiteNameAdd" class="input-padding ">To Date</label>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- first row -->
    <div class="first_row" style="">
        <div class="overall_div" style="">
            <!-- overall teep div -->
            <div style="" class="target_bar_bottom">
                <p class="graph_text" style="">Overall TEEP%</p>
                <div class="empty_graph" >
                    <div class="target_graph" id="teep_target" style="">
                        <div class="fill_graph" id="teep_graph" style="">
                            <span class="graph_font"  id="text_teep"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--  Overall OOE% -->
            <div style="" class="target_bar_bottom">
                <p class="graph_text" >Overall OOE%</p>
                <div class="empty_graph" >
                    <div class="target_graph" id="ooe_target" style="">
                        <div class="fill_graph" id="ooe_graph">
                            <span class="graph_font" id="text_ooe"></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- overall OEE% -->
            <div style="" class="target_bar_bottom">
                <p class="graph_text" >Overall OEE%</p>
                <div class="empty_graph">
                    <div class="target_graph" style="" id="oee_target">
                        <div class="fill_graph" id="oee_graph" >
                            <span class="graph_font" id="text_oee"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="target_bar_bottom">
                <div style="display:flex;flex-direction:row;justify-content:flex-end;height:1.5rem;">
                    <div style="width:40%;"></div>
                    <div style="width:30%;display:flex;flex-direction:row;align-items:center;">
                        <div style="width:15%;">
                            <div style="height:0.7rem;width:0.7rem;background-color:#0075F6;"></div>                    
                        </div>
                        <div style="width:80%;">
                            <span style="margin-left:0.6rem;font-size:12px;color:#404040;">Actual</span>                    
                        </div>
                    </div>
                    <div style="width:30%;display:flex;flex-direction:row;align-items:center;">
                        <div style="width:15%;">
                            <div style="height:0.7rem;width:0.7rem;background-color:#B3D7FF;"></div>                    
                        </div>
                        <div style="width:80%;">
                            <span style="margin-left:0.6rem;font-size:12px;color:#404040;">Target</span>                    
                        </div>
                    </div>
                   
                </div>
            </div>

        </div>
        <div class="oee_trend_div" style="">
            <div class="title_div" style="">
                <p class="graph_title_oee" >OEE Trend</p>
            </div>
            <div style="display:flex;flex-direction:row;justify-content:flex-end;">
                 <!-- category multi select dropdown -->
                <div class="box rightmar" style="margin-right: 0.5rem;" >
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
                <div class="box rightmar" style="margin-right: 2.4rem;" >
                    <div class="filter_selectBox" onclick="machine_drp()">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_machine" style="">All Machine</option>
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
                <p class="graph_title_oee" >Machine-wise OEE% BreakDown</p>
            </div>
            <!-- dropdowns -->
            <div class="graph_filter_div" style="">
                
                <!-- reason multi select dropdown -->
                <div class="box rightmar" style="margin-right: 0.5rem;" >
                    <div class="filter_selectBox" onclick="">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_alldatafields" style="">All Data Fields</option>
                        </select>
                        <div class="filter_overSelect"></div>
                    </div>
                    <div class="filter_checkboxes all_data_field_fill" style="" ></div>
                </div>
               
                <!-- Machine multi select dropdown -->
                <div class="box rightmar" style="margin-right: 2.4rem;" >
                    <div class="filter_selectBox" onclick="machine_drp1()">
                        <select  class="multi_select_drp" style="" >
                            <option id="text_machine1" style="">All Machine</option>
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
                    <div class="align_machine_icons" ><i class="fa fa-certificate performance_star"  style=""></i></div>
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
            <div style="display:flex;flex-direction:row;justify-content:flex-start;">
                <div style="width:max-content;margin-left:1rem;">
                    <p style="font-size:11px;color:#A6A6A6;margin-bottom:0;">TOTAL</p>
                    <span style="color:#005abc;font-size:1rem;font-weight:800;" id="total_duration_availability"></span>
                </div>
                <div style="width:80%;display:flex;flex-direction:row;justify-content:flex-end;">
                    <!-- category multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 0.5rem;" >
                        <div class="filter_selectBox" onclick="category_drp2()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_category_drp2" style="">All Categories</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes category_fill2" style="" >
                            <div class="filter_check_cate category_click2" style="">
                                <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox2" value="all"/>
                                </div>
                                <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                </div>
                            </div>

                            <div class="filter_check_cate category_click2" style="">
                                <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox2" value="Planned"/>
                                </div>
                                <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                </div>
                            </div>

                            <div class="filter_check_cate category_click2" style="">
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
                    <div class="box rightmar" style="margin-right: 0.5rem;" >
                        <div class="filter_selectBox" onclick="reason_drp2()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_reason2" style="">All Reason</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes reason_fill2" style="" ></div>
                    </div>
                
                    <!-- Machine multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 2.4rem;" >
                        <div class="filter_selectBox" onclick="machine_drp2()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_machine2" style="">All Machine</option>
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
    <div class="second_row" >
        <div class="each_row_split" style="">
            <!-- graph title -->
            <div class="title_div" >
                <p class="graph_title_oee" style="">Machine-wise Performance with Parts</p>
            </div>
            <!-- flex for dropdown and total -->
            <div style="display:flex;flex-direction:row;justify-content:flex-start;">
                <div style="width:20%;margin-left:1rem;">
                    <p style="font-size:11px;color:#A6A6A6;margin-bottom:0;">TOTAL</p>
                    <span style="color:#005abc;font-size:1rem;font-weight:800;" id="total_speed_loss"></span>
                </div>
                <div style="width:80%;display:flex;flex-direction:row;justify-content:flex-end;">    
                    <!-- reason multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 0.5rem;" >
                        <div class="filter_selectBox" onclick="part_drp()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_part" style="">All Parts</option>
                            </select>
                            <div class="filter_overSelect"></div>
                        </div>
                        <div class="filter_checkboxes part_fill" style="" ></div>
                    </div>
               
                    <!-- Machine multi select dropdown -->
                    <div class="box rightmar" style="margin-right: 2.4rem;" >
                        <div class="filter_selectBox" onclick="machine_drp3()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_machine3" style="">All Machine</option>
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
<!-- <script src="<?php echo base_url(); ?>/assets/js/Downtime_Production.js?version=<?php echo rand() ; ?>"></script> -->
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


$(document).on('blur','.fromDate',function(event){
    event.preventDefault();
    fill_downtime_reason();
    fill_machine_dropdown();
    fill_part_drp();
    resetbyday_click();
    reset_category2();

    fill_target_bar();
    overallTarget();

    // graph filter
   graph_func();

   performance_opportunity();
   
    
});

$(document).on('blur','.toDate',function(event){
    event.preventDefault();
     // overall target function
    // target fill width function
    fill_downtime_reason();
    fill_machine_dropdown();
    fill_part_drp();
    resetbyday_click();
    reset_category2();

    fill_target_bar();
    overallTarget();

    // graph filter
   graph_func();

   performance_opportunity();
    



});
$(document).ready(function(){

    // overall target function
    // target fill width function
    fill_downtime_reason();
    fill_machine_dropdown();
    fill_part_drp();
    resetbyday_click();
    reset_category2();

    fill_target_bar();
    overallTarget();

    // graph filter
   graph_func();

   performance_opportunity();
    

});

// graph functions 
function graph_func(){
    oeeTrendDay();
    machineWiseOEE();
    availabilityReason_machine();

}

// by day shift and month week
function resetbyday_click(){
    var category_arr = $('.by_day_checkbox');
    jQuery('.by_day_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#by_day_checkbox').text('By Day');
}

// reset category
// function reset_category(){
//     var category_arr = $('.category_drp_checkbox');
//     jQuery('.category_drp_checkbox').each(function(in2){
//         category_arr[in2].checked=true;
//     });
//     $('#text_category_drp').text('All Category');
// }

// availability graph reset categroy
function reset_category2(){
    var category_arr = $('.category_drp_checkbox2');
    jQuery('.category_drp_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_category_drp2').text('All Category');
}


// availability graph
function reset_reason2(){
    var category_arr = $('.reason_checkbox2');
    jQuery('.reason_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_reason2').text('All Reason');
}

function reset_machine(){
    var category_arr = $('.machine_checkbox');
    jQuery('.machine_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine').text('All Machine');
}

function reset_machine1(){
    var category_arr = $('.machine_checkbox1');
    jQuery('.machine_checkbox1').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine1').text('All Machine');
}

// availability graph

function reset_machine2(){
    var category_arr = $('.machine_checkbox2');
    jQuery('.machine_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine2').text('All Machine');
}


function reset_machine3(){
    var category_arr = $('.machine_checkbox3');
    jQuery('.machine_checkbox3').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_machine3').text('All Machine');
}


function reset_part(){
    var category_arr = $('.part_checkbox');
    jQuery('.part_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_part').text('All Part');
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
      availabilityReason_machine();
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
      availabilityReason_machine();
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
     
      $('#text_machine1').text('All Machine');
      $('.filter_checkboxes_machine1').css("display","none");
      filter_expanded_machine1 = false;
      machineWiseOEE();

  }
}

var filter_expanded_machine = false;
function machine_drp() {
 
  var checkboxes2 = document.getElementsByClassName("filter_checkboxes_machine");
  if (!filter_expanded_machine) {
   
      $('.filter_checkboxes_machine').css("display","block");
      filter_expanded_machine = true;
  } else  {
     
      $('#text_machine').text('All Machine');
      $('.filter_checkboxes_machine').css("display","none");
      filter_expanded_machine = false;
      oeeTrendDay();
  }
}

var filter_expanded_machine2 = false;
function machine_drp2() {
 
  var checkboxes2 = document.getElementsByClassName("filter_checkboxes_machine2");
  if (!filter_expanded_machine2) {
   
      $('.filter_checkboxes_machine2').css("display","block");
      filter_expanded_machine2 = true;
  } else  {
     
      $('#text_machine2').text('All Machine');
      $('.filter_checkboxes_machine2').css("display","none");
      filter_expanded_machine2 = false;
      availabilityReason_machine();
  }
}


var filter_expanded_machine3 = false;
function machine_drp3() {
 
  var checkboxes3 = document.getElementsByClassName("filter_checkboxes_machine3");
  if (!filter_expanded_machine3) {
   
      $('.filter_checkboxes_machine3').css("display","block");
      filter_expanded_machine3 = true;
  } else  {
     
      $('#text_machine3').text('All Machine');
      $('.filter_checkboxes_machine3').css("display","none");
      filter_expanded_machine3 = false;
      performance_opportunity();
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
        performance_opportunity();
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

        }else{
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
            $('#text_category_drp').text('All');
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

        }else{
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
            $('#text_category_drp2').text('All');
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
            reset_reason();

        }else{
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
            $('#text_reason2').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_reason2').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_reason2').text('No Reason');
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

        }else{
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
            $('#text_machine').text('All');
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

        }else{
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
            $('#text_machine1').text('All');
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

        }else{
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
            $('#text_machine2').text('All');
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

        }else{
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
            $('#text_machine3').text('All');
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

        }else{
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
            $('#text_part').text('All');
        }
    }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
        $('#text_part').text(parseInt(reason_gp_select_count1)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_part').text('No Part');
    }
});


// graph value for overallTarget
function overallTarget(){
    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
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
            console.log("overall target");
            console.log(res);
        // res=res['OverallMonitoring'];
          $('#teep_graph').css('width',''+parseInt(res.Overall_TEEP)+'%');
          $('#ooe_graph').css('width',''+parseInt(res.Overall_OOE)+'%');
          $('#oee_graph').css('width',''+parseInt(res.Overall_OEE)+'%');
        
          $('#text_teep').html(res.Overall_TEEP+'%');
          $('#text_ooe').html(res.Overall_OOE+'%');
          $('#text_oee').html(res.Overall_OEE+'%');

        //   $('.ooeVal').html(res.Overall_OOE);
        //   $('.oeeVal').html(res.Overall_OEE);
        //   $('.teepVal').html(res.Overall_TEEP);

        
        },
        error:function(res){
            console.log("No Data Records!");
            $('#teep_graph').css('width','0%');
            $('#ooe_graph').css('width','0%');
            $('#oee_graph').css('width','0%');
        }
    });
}


function fill_target_bar(){
    $.ajax({
        url: "<?php echo base_url('Financial_Metrics/getOverallTarget'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            console.log("graph target");
            console.log(res);
            $('#teep_target').css('width',''+res[0].overall_teep+'%');
            $('#oee_target').css('width',''+res[0].overall_oee+'%');
            $('#ooe_target').css('width',''+res[0].overall_ooe+'%');

            // $('.teepTarget').html(res[0].overall_teep);
            // $('.oeeTarget').html(res[0].overall_oee);
            // $('.ooeTarget').html(res[0].overall_ooe);
            
        },
        error:function(res){
            $('#teep_target').css('width','0%');
            $('#oee_target').css('width','0%');
            $('#ooe_target').css('width','0%');
        }
    });
}


function fill_downtime_reason(){
    $.ajax({
      url:"<?php echo base_url(); ?>/OEE_Drill_Down_controller/downtime_reason_filter_con",
      method:"POST",
      dataType:"json",
      success:function(res){

        console.log("reason dropdwon");
        console.log(res);

      
        $('.reason_fill2').empty();
        var element = $();
        var elements = $();
       

        // $('.reason_fill').append('<div class="filter_check_cate reason_click" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
      
        $('.reason_fill2').append('<div class="filter_check_cate reason_click2" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox2" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
        res.forEach(function(item){
            // element = element.add('<div class="filter_check_cate reason_click" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
          
            elements = elements.add('<div class="filter_check_cate reason_click2" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox2" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');


            // $('.reason_fill').append(element);
            $('.reason_fill2').append(elements);
          
        });

        // reset_reason();
        reset_reason2();
        },
        error:function(err){
            console.log(err);
        },
    });
}

// fill machine 
function fill_machine_dropdown(){
    // console.log("machine dropdown records filling function");
    $.ajax({
        url:"<?php echo base_url('OEE_Drill_Down_controller/getmachine_data'); ?>",
        type:"POST",
        dataType: "json",
        success:function(res){
            console.log("multi select dropdown machine");
            console.log(res);
            
            $('.filter_checkboxes_machine').empty();
            $('.filter_checkboxes_machine1').empty();
            $('.filter_checkboxes_machine2').empty();
            $('.filter_checkboxes_machine3').empty();

            $('.filter_checkboxes_machine').append('<div class="filter_check_cate machine_click" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            $('.filter_checkboxes_machine1').append('<div class="filter_check_cate machine_click1" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox1" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');


            $('.filter_checkboxes_machine2').append('<div class="filter_check_cate machine_click2" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox2" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');


            $('.filter_checkboxes_machine3').append('<div class="filter_check_cate machine_click3" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox3" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');

            res.forEach(function(val){
                var elements = $();
                var element = $();
                var ele = $();
                var eles = $();
             
                elements = elements.add('<div class="filter_check_cate machine_click" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machine_checkbox" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');


                element = element.add('<div class="filter_check_cate machine_click1" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machine_checkbox1" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                ele = ele.add('<div class="filter_check_cate machine_click2" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machine_checkbox2" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');
              

                eles = eles.add('<div class="filter_check_cate machine_click3" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machine_checkbox3" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_machine').append(elements);
                $('.filter_checkboxes_machine1').append(element);
                $('.filter_checkboxes_machine2').append(ele);
                $('.filter_checkboxes_machine3').append(eles);

            });

            reset_machine();
            reset_machine1();
            reset_machine2();
            reset_machine3();

            oeeTrendDay();
            machineWiseOEE();
            availabilityReason_machine();
            
        },
        error:function(er){
            console.log("Error Try Again...");
        }
    });
}

// fill part 
function fill_part_drp(){
    $.ajax({
        url:"<?php echo base_url('OEE_Drill_Down_controller/getpart_data'); ?>",
        type:"POST",
        dataType: "json",
        success:function(res){
            console.log("multi select dropdown part");
            console.log(res);
            $('.part_fill').empty();
            $('.part_fill').append('<div class="filter_check_cate part_click" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="part_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>');
            res.forEach(function(val){
                var elements = $();
                elements = elements.add('<div class="filter_check_cate part_click" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="part_checkbox" value="'+val.part_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.part_name+'</p>'
                +'</div>'
                +'</div>');



                $('.part_fill').append(elements);
            });
            reset_part();
            performance_opportunity();

         
           
        },
        error:function(er){
            console.log("Error Try Again...");
        }
    });
}



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

          var bar_width = 0.9;
          var bar_size = 0.7;

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
                  each:partwiseTotal
              }],
          },

          options: {
            responsive: true,
            maintainAspectRatio: false,   
            scales: {
                y: {
                    display:false,
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
        },
        success:function(res){
            $('#machine_wise_oee').remove();
            $('.child_machine_wise_oee').append('<canvas id="machine_wise_oee"><canvas>');
            $('.chartjs-hidden-iframe').remove();
            console.log("machine wise oee");
            console.log(res);
            
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
            var ctx = document.getElementById("machine_wise_oee").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: res.MachineName,
                    datasets: [
                    {
                        label: "Quality",
                        type: "line",
                        backgroundColor: "#004b9b",
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
                    },
                    {
                        label: "Performance",
                        type: "line",
                        backgroundColor: "#004b9b",
                        pointStyle:"rectRot",
                        radius:"5", 
                        borderWidth: 1, 
                        showLine : false,
                        fill: false, 
                        data: res['Performance'],
                        pointRadius: 6,

                        perTarget:res['PerformanceTarget'],
                        availTarget:res['AvailabilityTarget'],
                        qulyTarget:res['QualityTarget'],
                        oeeTarget:res['OEETarget'],

                    },
                    {
                        label: "Availability",
                        type: "line",
                        backgroundColor: "#004b9b",
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
                    },
                        {
                        label: "Machine OEE",
                        type: "bar",
                        backgroundColor: "#004b9b",
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
                        }
                    ],
                },
                
                options: {
                    scalebeginAtZero:false,
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        y: {
                            display:false,
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
    //   console.log("Availability reason machine");
    //   console.log(f);
    //   console.log(t);
    // machine array
    var graph_machine_arr = [];
    $('.category_drp_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_machine_arr.push($(this).val().trim());
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
    var graph_category_arr = [];
    $('.machine_checkbox2').each(function(){
        if ($(this).is(':checked')) {
            graph_category_arr.push($(this).val());
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
            console.log("Availability reasons");
            console.log(res);

            $('#machine_reason_availability').remove();
            $('.child_machine_reason_availability').append('<canvas id="machine_reason_availability"><canvas>');
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


            console.log("Availability graph total");
            console.log(machine_wise_total);
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
                var len= reasonList.length;
                if (len < 8) {
                reasonList.push("");
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
            console.log("machine array");
            console.log(machine)
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
                        display: false,
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
            console.log("performance opportunity graph");
            console.log(res);
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

                console.log("total speed loss");
                console.log(sum);
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
                var len= partWiseLable.length;
                if (len < 8) {
                    partWiseLable.push("");
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
                            display:false,
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

            innerHtml += '<div class="grid-item content-text"><span>Spped Loss</span></div>';  
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

function qualityOpportunity() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Financial_Metrics/qualityOpportunity'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
        //   $('#qualityOpportunity').remove();
        //   $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        //   $('.chartjs-hidden-iframe').remove();
        console.log("Quality Opportunity graph");
        conole.log(res);
     
    },
    error:function(er){
        console.log(er);
        // console.log("Sorry!Try Agian!!!!");
        // alert("Sorry!Try Agian!!!!");
    }
  }); 
}


</script>
