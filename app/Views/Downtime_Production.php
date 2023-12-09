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
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="position:fixed;margin-top:0;width:95%;">
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
                                <div class="box">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Machines</span>
                                        <div class="filter_selectBox docr_machine" onclick="multiple_drp_hide_seek('filter_machine_docr','docr_machine')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="machine_text_docr">All Machines</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_machine_docr">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Reasons</span>
                                        <div class="filter_selectBox docr_reason" onclick="multiple_drp_hide_seek('filter_reason_docr','docr_reason')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="reason_text_docr">All Reasons</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_reason_docr">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Categories</span>
                                        <div class="filter_selectBox docr_category" onclick="multiple_drp_hide_seek('filter_category_docr','docr_category')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="category_text_docr">All Categories</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_category_docr">
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
                                <div class="box">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Machines</span>
                                        <div class="filter_selectBox ddr_machine" onclick="multiple_drp_hide_seek('filter_machine_ddr','ddr_machine')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="machine_text_ddr">All Machines</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_machine_ddr">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Reasons</span>
                                        <div class="filter_selectBox ddr_reason" onclick="multiple_drp_hide_seek('filter_reason_ddr','ddr_reason')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="reason_text_ddr">All Reasons</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_reason_ddr">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Categories</span>
                                        <div class="filter_selectBox ddr_category" onclick="multiple_drp_hide_seek('filter_category_ddr','ddr_category')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="category_text_ddr">All Categories</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_category_ddr">
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
                                <div class="box">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Machines</span>
                                        <div class="filter_selectBox docm_machine" onclick="multiple_drp_hide_seek('filter_machine_docm','docm_machine')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="machine_text_docm">All Machines</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_machine_docm">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Reasons</span>
                                        <div class="filter_selectBox docm_reason" onclick="multiple_drp_hide_seek('filter_reason_docm','docm_reason')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="reason_text_docm">All Reasons</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_reason_docm">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Categories</span>
                                        <div class="filter_selectBox docm_category" onclick="multiple_drp_hide_seek('filter_category_docm','docm_category')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="category_text_docm">All Categories</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_category_docm">
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
                                
                                <div class="box">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Machines</span>
                                        <div class="filter_selectBox ddmr_machine" onclick="multiple_drp_hide_seek('filter_machine_ddmr','ddmr_machine')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="machine_text_ddmr">All Machines</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_machine_ddmr">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Reasons</span>
                                        <div class="filter_selectBox ddmr_reason" onclick="multiple_drp_hide_seek('filter_reason_ddmr','ddmr_reason')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="reason_text_ddmr">All Reasons</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_reason_ddmr">
                                        </div>
                                      </div>
                                    </div>
                                </div>

                                <div class="box rightmar">
                                    <div class="input-box indexing">
                                      <div class="filter_multiselect filter_option" style="width:9rem;">
                                        <span class="multi_select_label" style="">Categories</span>
                                        <div class="filter_selectBox ddmr_category" onclick="multiple_drp_hide_seek('filter_category_ddmr','ddmr_category')">
                                          <div class="inbox-span fontStyle search_style dropdown-arrow">
                                            <div style="width: 80% !important">
                                              <p class="paddingm" id="category_text_ddmr">All Categories</p>
                                            </div>
                                            <div class="dropdown-div" style=" width: 20% !important">
                                              <i class="fa fa-angle-down icon-style"></i>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="filter_checkboxes filter_category_ddmr">
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
                        <div class="">
                           <img src="<?php echo base_url(); ?>/assets/img/filter_reset.png" style="height:1.5rem;width:1.5rem;" class="table_reset" alt="">
                        </div>
                        <!-- filter button -->
                        <button class="btn fo bn saveNotes filterbtnstyle" style="" id="apply_filter_btn">Apply Filter</button>
                        
                        <div class="box rightmar">
                            <div class="input-box indexing">
                              <div class="filter_multiselect filter_option" style="width:9rem;">
                                <span class="multi_select_label" style="">Created by</span>
                                <div class="filter_selectBox down_user" onclick="multiple_drp_hide_seek('filter_user_down','down_user')">
                                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                                    <div style="width: 80% !important">
                                      <p class="paddingm" id="user_text_down">All Users</p>
                                    </div>
                                    <div class="dropdown-div" style=" width: 20% !important">
                                      <i class="fa fa-angle-down icon-style"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes filter_user_down">
                                </div>
                              </div>
                            </div>
                        </div>

                        
                        <!-- dropdown checkbox machine -->
                        <div class="box rightmar">
                            <div class="input-box indexing">
                              <div class="filter_multiselect filter_option" style="width:9rem;">
                                <span class="multi_select_label" style="">Categories</span>
                                <div class="filter_selectBox down_category" onclick="multiple_drp_hide_seek('filter_category_down','down_category')">
                                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                                    <div style="width: 80% !important">
                                      <p class="paddingm" id="category_text_down">All Categories</p>
                                    </div>
                                    <div class="dropdown-div" style=" width: 20% !important">
                                      <i class="fa fa-angle-down icon-style"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes filter_category_down">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="box rightmar">
                            <div class="input-box indexing">
                              <div class="filter_multiselect filter_option" style="width:9rem;">
                                <span class="multi_select_label" style="">Reasons</span>
                                <div class="filter_selectBox down_reason" onclick="multiple_drp_hide_seek('filter_reason_down','down_reason')">
                                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                                    <div style="width: 80% !important">
                                      <p class="paddingm" id="reason_text_down">All Reasons</p>
                                    </div>
                                    <div class="dropdown-div" style=" width: 20% !important">
                                      <i class="fa fa-angle-down icon-style"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes filter_reason_down">
                                </div>
                              </div>
                            </div>
                        </div> 

                        <div class="box rightmar">
                            <div class="input-box indexing">
                              <div class="filter_multiselect filter_option" style="width:9rem;">
                                <span class="multi_select_label" style="">Parts</span>
                                <div class="filter_selectBox down_part" onclick="multiple_drp_hide_seek('filter_part_down','down_part')">
                                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                                    <div style="width: 80% !important">
                                      <p class="paddingm" id="part_text_down">All Parts</p>
                                    </div>
                                    <div class="dropdown-div" style=" width: 20% !important">
                                      <i class="fa fa-angle-down icon-style"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes filter_part_down">
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="box rightmar">
                            <div class="input-box indexing">
                              <div class="filter_multiselect filter_option" style="width:9rem;">
                                <span class="multi_select_label" style="">Machines</span>
                                <div class="filter_selectBox down_machine" onclick="multiple_drp_hide_seek('filter_machine_down','down_machine')">
                                  <div class="inbox-span fontStyle search_style dropdown-arrow">
                                    <div style="width: 80% !important">
                                      <p class="paddingm" id="machine_text_down">All Machines</p>
                                    </div>
                                    <div class="dropdown-div" style=" width: 20% !important">
                                      <i class="fa fa-angle-down icon-style"></i>
                                    </div>
                                  </div>
                                </div>
                                <div class="filter_checkboxes filter_machine_down">
                                </div>
                              </div>
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
<!-- <div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
    </div>
</div> -->
<!-- preloader end -->
<script src="<?php echo base_url(); ?>/assets/js/Downtime_Production.js?version=<?php echo rand() ; ?>"></script>
<script type="text/javascript">


// hide and seek gloable variables
const hide_seek_obj = {
    // Downtime Opportunity Cost by Reasons
    docr_machine:false,
    docr_reason:false,
    docr_category:false,

    // Downtime Duration by Reasons
    ddr_machine:false,
    ddr_reason:false,
    ddr_category:false,

    // Downtime Opportunity Cost by Machines
    docm_machine:false,
    docm_reason:false,
    docm_category:false,

    // Downtime Duration by Machines With Reasons
    ddmr_machine:false,
    ddmr_reason:false,
    ddmr_category:false,

    // Downtime Opportunity Cost by Reasons
    down_machine:false,
    down_reason:false,
    down_category:false,
    down_part:false,
    down_user:false

    

 
};


function multiple_drp_hide_seek(classRef,keyRef){
  $('.filter_checkboxes').css("display","none");
  if (!hide_seek_obj[keyRef]) {
    $('.'+classRef+'').css("display","block");
    hide_seek_obj[keyRef] = true;
  }
  else{
    $('.'+classRef+'').css("display","none");
    hide_seek_obj[keyRef] = false;
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



// on mouse up function
$(document).mouseup(function(event){
    // part dropdown outside click
    var machine_check_docr = $('.filter_machine_docr');
    var docr_machine_c = $('.docr_machine');
    if (!machine_check_docr.is(event.target) && machine_check_docr.has(event.target).length==0 && !docr_machine_c.is(event.target) && docr_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['docr_machine']==true){
          machine_check_docr.hide();
          hide_seek_obj['docr_machine']=false;
        }
    }

    var reason_check_docr = $('.filter_reason_docr');
    var docr_reason_c = $('.docr_reason');
    if (!reason_check_docr.is(event.target) && reason_check_docr.has(event.target).length==0 && !docr_reason_c.is(event.target) && docr_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['docr_reason']==true){
          reason_check_docr.hide();
          hide_seek_obj['docr_reason']=false;
        }
    }

    var category_check_docr = $('.filter_category_docr');
    var docr_category_c = $('.docr_category');
    if (!category_check_docr.is(event.target) && category_check_docr.has(event.target).length==0 && !docr_category_c.is(event.target) && docr_category_c.has(event.target).length==0) {
        if(hide_seek_obj['docr_category']==true){
          category_check_docr.hide();
          hide_seek_obj['docr_category']=false;
        }
    }


    var machine_check_ddr = $('.filter_machine_ddr');
    var ddr_machine_c = $('.ddr_machine');
    if (!machine_check_ddr.is(event.target) && machine_check_ddr.has(event.target).length==0 && !ddr_machine_c.is(event.target) && ddr_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['ddr_machine']==true){
          machine_check_ddr.hide();
          hide_seek_obj['ddr_machine']=false;
        }
    }

    var reason_check_ddr = $('.filter_reason_ddr');
    var ddr_reason_c = $('.ddr_reason');
    if (!reason_check_ddr.is(event.target) && reason_check_ddr.has(event.target).length==0 && !ddr_reason_c.is(event.target) && ddr_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['ddr_reason']==true){
          reason_check_ddr.hide();
          hide_seek_obj['ddr_reason']=false;
        }
    }

    var category_check_ddr = $('.filter_category_ddr');
    var ddr_category_c = $('.ddr_category');
    if (!category_check_ddr.is(event.target) && category_check_ddr.has(event.target).length==0 && !ddr_category_c.is(event.target) && ddr_category_c.has(event.target).length==0) {
        if(hide_seek_obj['ddr_category']==true){
          category_check_ddr.hide();
          hide_seek_obj['ddr_category']=false;
        }
    }


    var machine_check_docm = $('.filter_machine_docm');
    var docm_machine_c = $('.docm_machine');
    if (!machine_check_docm.is(event.target) && machine_check_docm.has(event.target).length==0 && !docm_machine_c.is(event.target) && docm_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['docm_machine']==true){
          machine_check_docm.hide();
          hide_seek_obj['docm_machine']=false;
        }
    }

    var reason_check_docm = $('.filter_reason_docm');
    var docm_reason_c = $('.docm_reason');
    if (!reason_check_docm.is(event.target) && reason_check_docm.has(event.target).length==0 && !docm_reason_c.is(event.target) && docm_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['docm_reason']==true){
          reason_check_docm.hide();
          hide_seek_obj['docm_reason']=false;
        }
    }

    var category_check_docm = $('.filter_category_docm');
    var docm_category_c = $('.docm_category');
    if (!category_check_docm.is(event.target) && category_check_docm.has(event.target).length==0 && !docm_category_c.is(event.target) && docm_category_c.has(event.target).length==0) {
        if(hide_seek_obj['docm_category']==true){
          category_check_docm.hide();
          hide_seek_obj['docm_category']=false;
        }
    }

    var machine_check_ddmr = $('.filter_machine_ddmr');
    var ddmr_machine_c = $('.ddmr_machine');
    if (!machine_check_ddmr.is(event.target) && machine_check_ddmr.has(event.target).length==0 && !ddmr_machine_c.is(event.target) && ddmr_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['ddmr_machine']==true){
          machine_check_ddmr.hide();
          hide_seek_obj['ddmr_machine']=false;
        }
    }

    var reason_check_ddmr = $('.filter_reason_ddmr');
    var ddmr_reason_c = $('.ddmr_reason');
    if (!reason_check_ddmr.is(event.target) && reason_check_ddmr.has(event.target).length==0 && !ddmr_reason_c.is(event.target) && ddmr_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['ddmr_reason']==true){
          reason_check_ddmr.hide();
          hide_seek_obj['ddmr_reason']=false;
        }
    }

    var category_check_ddmr = $('.filter_category_ddmr');
    var ddmr_category_c = $('.ddmr_category');
    if (!category_check_ddmr.is(event.target) && category_check_ddmr.has(event.target).length==0 && !ddmr_category_c.is(event.target) && ddmr_category_c.has(event.target).length==0) {
        if(hide_seek_obj['ddmr_category']==true){
          category_check_ddmr.hide();
          hide_seek_obj['ddmr_category']=false;
        }
    }

    var machine_check_down = $('.filter_machine_down');
    var down_machine_c = $('.down_machine');
    if (!machine_check_down.is(event.target) && machine_check_down.has(event.target).length==0 && !down_machine_c.is(event.target) && down_machine_c.has(event.target).length==0) {
        if(hide_seek_obj['down_machine']==true){
          machine_check_down.hide();
          hide_seek_obj['down_machine']=false;
        }
    }

    var part_check_down = $('.filter_part_down');
    var down_part_c = $('.down_part');
    if (!part_check_down.is(event.target) && part_check_down.has(event.target).length==0 && !down_part_c.is(event.target) && down_part_c.has(event.target).length==0) {
        if(hide_seek_obj['down_part']==true){
          part_check_down.hide();
          hide_seek_obj['down_part']=false;
        }
    }

    var reason_check_down = $('.filter_reason_down');
    var down_reason_c = $('.down_reason');
    if (!reason_check_down.is(event.target) && reason_check_down.has(event.target).length==0 && !down_reason_c.is(event.target) && down_reason_c.has(event.target).length==0) {
        if(hide_seek_obj['down_reason']==true){
          reason_check_down.hide();
          hide_seek_obj['down_reason']=false;
        }
    }

    var category_check_down = $('.filter_category_down');
    var down_category_c = $('.down_category');
    if (!category_check_down.is(event.target) && category_check_down.has(event.target).length==0 && !down_category_c.is(event.target) && down_category_c.has(event.target).length==0) {
        if(hide_seek_obj['down_category']==true){
          category_check_down.hide();
          hide_seek_obj['down_category']=false;
        }
    }

    var user_check_down = $('.filter_user_down');
    var down_user_c = $('.down_user');
    if (!user_check_down.is(event.target) && user_check_down.has(event.target).length==0 && !down_user_c.is(event.target) && down_user_c.has(event.target).length==0) {
        if(hide_seek_obj['down_user']==true){
          user_check_down.hide();
          hide_seek_obj['down_user']=false;
        }
    }


});

// filter onclick  function
$(document).on('click','#apply_filter_btn',function(event){
    event.preventDefault();
    
    var get_category_data = [];
    var machine_arr = [];
    var part_arr = [];
    var reason_arr = [];
    var created_by = [];

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            machine_flag =1;
        }
        else{
            machine_arr.push($(this).val());
        }
    });
    if (machine_flag==1) {
        machine_arr=[];
        $.each($("input[name='machine_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                machine_arr.push($(this).val());
            }
        });
    }

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            part_flag =1;
        }
        else{
            part_arr.push($(this).val());
        }
    });
    if (part_flag==1) {
        part_arr=[];
        $.each($("input[name='part_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                part_arr.push($(this).val());
            }
        });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            reason_flag =1;
        }
        else{
            reason_arr.push($(this).val());
        }
    });
    if (reason_flag==1) {
        reason_arr=[];
        $.each($("input[name='reason_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                reason_arr.push($(this).val());
            }
        });
    }

    // User Values...
    var user_flag=0;
    $.each($("input[name='user_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            user_flag =1;
        }
        else{
            created_by.push($(this).val());
        }
    });
    if (user_flag==1) {
        created_by=[];
        $.each($("input[name='user_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                created_by.push($(this).val());
            }
        });
    }

    // Category Values...
    var category_flag=0;
    $.each($("input[name='category_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            category_flag =1;
        }
        else{
            get_category_data.push($(this).val());
        }
    });
    if (category_flag==1) {
        get_category_data=[];
        $.each($("input[name='category_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                get_category_data.push($(this).val());
            }
        });
    }

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

    var get_category_data = [];
    var machine_arr = [];
    var part_arr = [];
    var reason_arr = [];
    var created_by = [];

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            machine_flag =1;
        }
        else{
            machine_arr.push($(this).val());
        }
    });
    if (machine_flag==1) {
        machine_arr=[];
        $.each($("input[name='machine_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                machine_arr.push($(this).val());
            }
        });
    }

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            part_flag =1;
        }
        else{
            part_arr.push($(this).val());
        }
    });
    if (part_flag==1) {
        part_arr=[];
        $.each($("input[name='part_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                part_arr.push($(this).val());
            }
        });
    }

    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            reason_flag =1;
        }
        else{
            reason_arr.push($(this).val());
        }
    });
    if (reason_flag==1) {
        reason_arr=[];
        $.each($("input[name='reason_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                reason_arr.push($(this).val());
            }
        });
    }

    // User Values...
    var user_flag=0;
    $.each($("input[name='user_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            user_flag =1;
        }
        else{
            created_by.push($(this).val());
        }
    });
    if (user_flag==1) {
        created_by=[];
        $.each($("input[name='user_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                created_by.push($(this).val());
            }
        });
    }

    // Category Values...
    var category_flag=0;
    $.each($("input[name='category_filter_val_down']:checked"), function(){
        if (($(this).val() == "all")) {
            category_flag =1;
        }
        else{
            get_category_data.push($(this).val());
        }
    });
    if (category_flag==1) {
        get_category_data=[];
        $.each($("input[name='category_filter_val_down']"), function(){
            if (($(this).val() != "all")) {
                get_category_data.push($(this).val());
            }
        });
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
            pass_machine:machine_arr,
            pass_part:part_arr,
            pass_cate:get_category_data,
            pass_reason:reason_arr,
            pass_created_by:created_by,
            from:from,
            to:to,   
        },
        success:function(res){
            console.log('production downtime table filter');
            console.log(res);
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

    reset_part_down();
    reset_user_down();
    reset_machine_down();
    reset_reason_down();
    reset_category_down();

    // filter function calling
    var start_index = 0;
    var end_index = 50;
    $('#pagination_val').val('1');
    
    filter_after_filter(end_index,start_index);


});


// graph onclick
$(document).on('click','.docr_filter',function(event){
    event.preventDefault();
    getfilter_oppcost_reason();
});
$(document).on('click','.ddr_filter',function(event){
    event.preventDefault();
    getfilter_duration_reason();

});

$(document).on('click','.docm_filter',function(event){
    event.preventDefault();
    getfilter_machine_oppcost();
});

$(document).on('click','.ddmr_filter',function(event){
    event.preventDefault();
    getfilter_machine_reason_duration();

});


// graph filter function temporary hide 

// Downtime opportunity Cost by Reasons
function getfilter_oppcost_reason(){
    return new Promise(function(resolve,reject){

    var graph_category_arr=[];
    var graph_machine_arr =[];
    var graph_reason_arr= [];

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_docr']:checked"), function(){
        if (($(this).val() == "all")) {
            machine_flag =1;
        }
        else{
            graph_machine_arr.push($(this).val());
        }
    });
    if (machine_flag==1) {
        graph_machine_arr=[];
        $.each($("input[name='machine_filter_val_docr']"), function(){
            if (($(this).val() != "all")) {
                graph_machine_arr.push($(this).val());
            }
        });
    }

    // Reason array
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_docr']:checked"), function(){
        if (($(this).val() == "all")) {
            reason_flag =1;
        }
        else{
            graph_reason_arr.push($(this).val());
        }
    });
    if (reason_flag==1) {
        graph_reason_arr=[];
        $.each($("input[name='reason_filter_val_docr']"), function(){
            if (($(this).val() != "all")) {
                graph_reason_arr.push($(this).val());
            }
        });
    }


    // Category array
    var category_flag=0;
    $.each($("input[name='category_filter_val_docr']:checked"), function(){
        if (($(this).val() == "all")) {
            category_flag =1;
        }
        else{
            graph_category_arr.push($(this).val());
        }
    });
    if (category_flag==1) {
        graph_category_arr=[];
        $.each($("input[name='category_filter_val_docr']"), function(){
            if (($(this).val() != "all")) {
                graph_category_arr.push($(this).val());
            }
        });
    }


    $('#reason_wise_oppcost').remove();
    $('.child_reason_wise_oppcost').append('<canvas id="reason_wise_oppcost"></canvas>');
    $('.chartjs-hidden-iframe').remove();


    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    console.log("Before ajax drop down values:\t");
    console.log(graph_reason_arr);
    console.log(graph_machine_arr);
    console.log(graph_category_arr);


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
            resolve(res);
            console.log("prodcution downtime reasons oppcost by reason");
            console.log(res);
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

    });
}

// Downtime Duration by Reasons
function getfilter_duration_reason(){
    return new Promise(function(resolve,reject){
    $('#reason_wise_duration').remove();
    $('.child_reason_wise_duration').append('<canvas id="reason_wise_duration"></canvas>');
    $('.chartjs-hidden-iframe').remove();


    var graph_category_arr=[];
    var graph_machine_arr =[];
    var graph_reason_arr= [];

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_ddr']:checked"), function(){
        if (($(this).val() == "all")) {
            machine_flag =1;
        }
        else{
            graph_machine_arr.push($(this).val());
        }
    });
    if (machine_flag==1) {
        graph_machine_arr=[];
        $.each($("input[name='machine_filter_val_ddr']"), function(){
            if (($(this).val() != "all")) {
                graph_machine_arr.push($(this).val());
            }
        });
    }

    // Reason array
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_ddr']:checked"), function(){
        if (($(this).val() == "all")) {
            reason_flag =1;
        }
        else{
            graph_reason_arr.push($(this).val());
        }
    });
    if (reason_flag==1) {
        graph_reason_arr=[];
        $.each($("input[name='reason_filter_val_ddr']"), function(){
            if (($(this).val() != "all")) {
                graph_reason_arr.push($(this).val());
            }
        });
    }


    // Category array
    var category_flag=0;
    $.each($("input[name='category_filter_val_ddr']:checked"), function(){
        if (($(this).val() == "all")) {
            category_flag =1;
        }
        else{
            graph_category_arr.push($(this).val());
        }
    });
    if (category_flag==1) {
        graph_category_arr=[];
        $.each($("input[name='category_filter_val_ddr']"), function(){
            if (($(this).val() != "all")) {
                graph_category_arr.push($(this).val());
            }
        });
    }



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

    });
    
}

// machine wise oppcost graph filter function 
function getfilter_machine_oppcost(){
    return new Promise(function(resolve,reject){
    $('#machine_wise_oppcost').remove();
    $('.child_machine_wise_oppcost').append('<canvas id="machine_wise_oppcost"></canvas>');
    $('.chartjs-hidden-iframe').remove();


    var graph_category_arr=[];
    var graph_machine_arr =[];
    var graph_reason_arr= [];

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_docm']:checked"), function(){
        if (($(this).val() == "all")) {
            machine_flag =1;
        }
        else{
            graph_machine_arr.push($(this).val());
        }
    });
    if (machine_flag==1) {
        graph_machine_arr=[];
        $.each($("input[name='machine_filter_val_docm']"), function(){
            if (($(this).val() != "all")) {
                graph_machine_arr.push($(this).val());
            }
        });
    }

    // Reason array
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_docm']:checked"), function(){
        if (($(this).val() == "all")) {
            reason_flag =1;
        }
        else{
            graph_reason_arr.push($(this).val());
        }
    });
    if (reason_flag==1) {
        graph_reason_arr=[];
        $.each($("input[name='reason_filter_val_docm']"), function(){
            if (($(this).val() != "all")) {
                graph_reason_arr.push($(this).val());
            }
        });
    }


    // Category array
    var category_flag=0;
    $.each($("input[name='category_filter_val_docm']:checked"), function(){
        if (($(this).val() == "all")) {
            category_flag =1;
        }
        else{
            graph_category_arr.push($(this).val());
        }
    });
    if (category_flag==1) {
        graph_category_arr=[];
        $.each($("input[name='category_filter_val_docm']"), function(){
            if (($(this).val() != "all")) {
                graph_category_arr.push($(this).val());
            }
        });
    }

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
            // console.log("machine wise oppcost");
            // console.log(res);
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
            // alert(er);
        }
    });

    });

}

// machine and reason duration graph filter function
function getfilter_machine_reason_duration(){


   return new Promise(function(resolve,reject){
    var graph_category_arr=[];
    var graph_machine_arr =[];
    var graph_reason_arr= [];

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val_ddmr']:checked"), function(){
        if (($(this).val() == "all")) {
            machine_flag =1;
        }
        else{
            graph_machine_arr.push($(this).val());
        }
    });
    if (machine_flag==1) {
        graph_machine_arr=[];
        $.each($("input[name='machine_filter_val_ddmr']"), function(){
            if (($(this).val() != "all")) {
                graph_machine_arr.push($(this).val());
            }
        });
    }

    // Reason array
    var reason_flag=0;
    $.each($("input[name='reason_filter_val_ddmr']:checked"), function(){
        if (($(this).val() == "all")) {
            reason_flag =1;
        }
        else{
            graph_reason_arr.push($(this).val());
        }
    });
    if (reason_flag==1) {
        graph_reason_arr=[];
        $.each($("input[name='reason_filter_val_ddmr']"), function(){
            if (($(this).val() != "all")) {
                graph_reason_arr.push($(this).val());
            }
        });
    }


    // Category array
    var category_flag=0;
    $.each($("input[name='category_filter_val_ddmr']:checked"), function(){
        if (($(this).val() == "all")) {
            category_flag =1;
        }
        else{
            graph_category_arr.push($(this).val());
        }
    });
    if (category_flag==1) {
        graph_category_arr=[];
        $.each($("input[name='category_filter_val_ddmr']"), function(){
            if (($(this).val() != "all")) {
                graph_category_arr.push($(this).val());
            }
        });
    }


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
            resolve(res);
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
    });
}


// page load time this function execute
$(document).ready(function(){

    // preloader on function
    $("#overlay").fadeIn(500);

    graph_loader();

});

// overall filter button onclick funciton
$(document).on('click','.overall_filter_btn',function(event){
    event.preventDefault();
    $("#overlay").fadeIn(400);

    reset_reason_docr();
    reset_reason_ddr();
    reset_reason_docm();
    reset_reason_ddmr();
    reset_reason_down();

    reset_machine_docr();
    reset_machine_ddr();
    reset_machine_docm();
    reset_machine_ddmr();
    reset_machine_down();

    reset_category_docr();
    reset_category_ddr();
    reset_category_docm();
    reset_category_ddmr();
    reset_category_down();

    reset_part_down();

    reset_user_down();

    graph_loader();
}); 


// all dropdwon functions 
function getall_filter_arr(){

    return new Promise(function(resolve,reject){
    
    $('.filter_machine_docr').empty();
    $('.filter_reason_docr').empty();
    $('.filter_category_docr').empty();

    $('.filter_machine_ddr').empty();
    $('.filter_reason_ddr').empty();
    $('.filter_category_ddr').empty();

    $('.filter_machine_docm').empty();
    $('.filter_reason_docm').empty();
    $('.filter_category_docm').empty();

    $('.filter_machine_ddmr').empty();
    $('.filter_reason_ddmr').empty();
    $('.filter_category_ddmr').empty();

    $('.filter_machine_down').empty();
    $('.filter_reason_down').empty();
    $('.filter_category_down').empty();
    $('.filter_part_down').empty();
    $('.filter_user_down').empty();

    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getall_filter_arr') ?>",
        method:"POST",
        dataType:"json",
        success:function(res){
            console.log("all graph drp values ajax success");
            console.log(res);
            resolve(res);

            // Machine
            $('.filter_machine_docr').append('<div class="inbox inbox_machine_docr docr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_machine_val_docr" name="machine_filter_val_docr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            $('.filter_machine_ddr').append('<div class="inbox inbox_machine_ddr ddr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_machine_val_ddr" name="machine_filter_val_ddr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_machine_docm').append('<div class="inbox inbox_machine_docm docm_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_machine_val_docm" name="machine_filter_val_docm" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_machine_ddmr').append('<div class="inbox inbox_machine_ddmr ddmr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_machine_val_ddmr" name="machine_filter_val_ddmr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_machine_down').append('<div class="inbox inbox_machine_down down_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_machine_val_down" name="machine_filter_val_down" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            // Reason
            $('.filter_reason_docr').append('<div class="inbox inbox_reason_docr docr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_reason_val_docr" name="reason_filter_val_docr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            $('.filter_reason_ddr').append('<div class="inbox inbox_reason_ddr ddr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_reason_val_ddr" name="reason_filter_val_ddr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_reason_docm').append('<div class="inbox inbox_reason_docm docm_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_reason_val_docm" name="reason_filter_val_docm" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_reason_ddmr').append('<div class="inbox inbox_reason_ddmr ddmr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_reason_val_ddmr" name="reason_filter_val_ddmr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_reason_down').append('<div class="inbox inbox_reason_down down_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_reason_val_down" name="reason_filter_val_down" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            // Category
            $('.filter_category_docr').append('<div class="inbox inbox_category_docr docr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_category_val_docr" name="category_filter_val_docr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            $('.filter_category_ddr').append('<div class="inbox inbox_category_ddr ddr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_category_val_ddr" name="category_filter_val_ddr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_category_docm').append('<div class="inbox inbox_category_docm docm_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_category_val_docm" name="category_filter_val_docm" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_category_ddmr').append('<div class="inbox inbox_category_ddmr ddmr_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_category_val_ddmr" name="category_filter_val_ddmr" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');
            $('.filter_category_down').append('<div class="inbox inbox_category_down down_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_category_val_down" name="category_filter_val_down" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            // Part
            $('.filter_part_down').append('<div class="inbox inbox_part_down down_filter" style="display: flex;">'
              +'<div style="float: left;width: 20%;" class="center-align">'
                +'<input class="checkbox_part filter_part_val_down" name="part_filter_val_down" value="all" type="checkbox" checked/>'
              +'</div>'
              +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                  +'<p class="inbox-span paddingm">All</p>'
              +'</div>'
            +'</div>');

            // User
            $('.filter_user_down').append('<div class="inbox inbox_user_down down_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_user filter_user_val_down" name="user_filter_val_down" value="all" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">All</p>'
                  +'</div>'
                +'</div>');

        

            res['machine'].forEach(function(val){

                $('.filter_machine_docr').append('<div class="inbox inbox_machine_docr docr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_machine_val_docr" name="machine_filter_val_docr" value="'+val.machine_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_machine_ddr').append('<div class="inbox inbox_machine_ddr ddr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_machine_val_ddr" name="machine_filter_val_ddr" value="'+val.machine_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_machine_docm').append('<div class="inbox inbox_machine_docm docm_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_machine_val_docm" name="machine_filter_val_docm" value="'+val.machine_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_machine_ddmr').append('<div class="inbox inbox_machine_ddmr ddmr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_machine_val_ddmr" name="machine_filter_val_ddmr" value="'+val.machine_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_machine_down').append('<div class="inbox inbox_machine_down down_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_machine_val_down" name="machine_filter_val_down" value="'+val.machine_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.machine_id+"-"+val.machine_name+'</p>'
                  +'</div>'
                +'</div>');

            });

            res['downtime_reason'].forEach(function(val){

                $('.filter_reason_docr').append('<div class="inbox inbox_reason_docr docr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_reason_val_docr" name="reason_filter_val_docr" value="'+val.downtime_reason_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_reason_id+"-"+val.downtime_reason+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_reason_ddr').append('<div class="inbox inbox_reason_ddr ddr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_reason_val_ddr" name="reason_filter_val_ddr" value="'+val.downtime_reason_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_reason_id+"-"+val.downtime_reason+'</p>'
                  +'</div>'
                +'</div>');

                $('.filter_reason_docm').append('<div class="inbox inbox_reason_docm docm_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_reason_val_docm" name="reason_filter_val_docm" value="'+val.downtime_reason_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_reason_id+"-"+val.downtime_reason+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_reason_ddmr').append('<div class="inbox inbox_reason_ddmr ddmr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_reason_val_ddmr" name="reason_filter_val_ddmr" value="'+val.downtime_reason_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_reason_id+"-"+val.downtime_reason+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_reason_down').append('<div class="inbox inbox_reason_down down_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_reason_val_down" name="reason_filter_val_down" value="'+val.downtime_reason_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_reason_id+"-"+val.downtime_reason+'</p>'
                  +'</div>'
                +'</div>');
            });

            res['downtime_category'].forEach(function(val){

                $('.filter_category_docr').append('<div class="inbox inbox_category_docr docr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_category_val_docr" name="category_filter_val_docr" value="'+val.downtime_category+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_category+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_category_ddr').append('<div class="inbox inbox_category_ddr ddr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_category_val_ddr" name="category_filter_val_ddr" value="'+val.downtime_category+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_category+'</p>'
                  +'</div>'
                +'</div>');

                $('.filter_category_docm').append('<div class="inbox inbox_category_docm docm_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_category_val_docm" name="category_filter_val_docm" value="'+val.downtime_category+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_category+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_category_ddmr').append('<div class="inbox inbox_category_ddmr ddmr_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_category_val_ddmr" name="category_filter_val_ddmr" value="'+val.downtime_category+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_category+'</p>'
                  +'</div>'
                +'</div>');
                $('.filter_category_down').append('<div class="inbox inbox_category_down down_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_category_val_down" name="category_filter_val_down" value="'+val.downtime_category+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.downtime_category+'</p>'
                  +'</div>'
                +'</div>');
            });


            res['part'].forEach(function(val){
                $('.filter_part_down').append('<div class="inbox inbox_part_down down_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_part filter_part_val_down" name="part_filter_val_down" value="'+val.part_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.part_id+"-"+val.part_name+'</p>'
                  +'</div>'
                +'</div>');
            });


            res['created_by'].forEach(function(val){
                $('.filter_user_down').append('<div class="inbox inbox_user_down down_filter" style="display: flex;">'
                  +'<div style="float: left;width: 20%;" class="center-align">'
                    +'<input class="checkbox_user filter_user_val_down" name="user_filter_val_down" value="'+val.user_id+'" type="checkbox" checked/>'
                  +'</div>'
                  +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                      +'<p class="inbox-span paddingm">'+val.first_name+''+val.last_name+'</p>'
                  +'</div>'
                +'</div>');
            });
        },
        error:function(er){
          // alert("Error");
        }
    });
    
    });

}

async function graph_loader(){
    await getall_filter_arr();

    await getfilter_oppcost_reason();
    await getfilter_duration_reason();
    await getfilter_machine_oppcost();
    await getfilter_machine_reason_duration();
    console.log("first loader function");
    filter_after_filter(50,0);


}

</script>