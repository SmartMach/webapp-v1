<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/main.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/financial_metrics.css?version=<?php echo rand() ; ?>">

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>

    <!-- Datetimepicker -->
    <script src="<?php echo base_url(); ?>/assets/js/datetimepicker.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.datetimepicker.min.css?version=<?php echo rand() ; ?>">

    <!-- Pre Loader -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/pre_loader.css?version=<?php echo rand() ; ?>">

    <script src="<?php echo base_url(); ?>/assets/js/jquery.datetimepicker.js?version=<?php echo rand() ; ?>"></script>


      <style>
        #area-chart,
        #line-chart,
        #bar-chart,
        #stacked,
        #pie-chart{
          min-height: 250px;
        }

        .graphCardMain{
          padding: 10px;
        }
        .OuterCard{
          margin-top: 10px;
          margin-right: 3rem;
          margin-left: 3rem;
        }
        .selectOpt{
          width: 10rem;
        }
        .titleBar{
          height: 3rem;
          display: inline-flex;
          align-items: center;
        }

        
        .val{
          font-size: 1.7rem;
          font-weight: bold;
          margin-left: 0.3rem;
        }

        .apexcharts-tooltip {
          border-radius: 5px;
          box-shadow: 2px 2px 6px -4px #999;
          cursor: default;
          font-size: 14px;
          left: 62px;
          opacity: 0;
          pointer-events: none;
          position: absolute;
          top: 20px;
          display: flex;
          flex-direction: column;
          overflow: hidden;
          white-space: nowrap;
          z-index: 12;
          transition: 0.15s ease all;
        }

        .triangleDraw {
          width: 0;
          height: 0;
          border-left: 0.25rem solid transparent;
          border-right: 0.25rem solid transparent;
          border-bottom: 0.5rem solid #000000;
          opacity: 0.8;
        }
        .circleDraw{
          background-color: #09BB9F;
          color: #004b9b;
          height: 0.5rem;
          width: 0.5rem;
          display: inline-block;
          border-radius: 50%;
          opacity: 0.8;
        }
        .squareDraw{
          background-color: #0075F6;
          color: #004b9b;
          height: 0.5rem;
          width: 0.5rem;
          display: inline-block;
          opacity: 0.8;
          transform: translate(-50%,-50%);
          transform: rotate(-45deg);
          transform-origin: 0 100%;
        }
        .recDraw{
          background-color: #004b9b;
          color: #004b9b;
          height: 0.5rem;
          width: 0.5rem;
          display: inline-block;
          opacity: 0.8;
        }
        .lableSpace{
          margin-right: 0.5rem;
        }

        .fontStyle{
          font-size: 12px;
          color: #595959;
          font-family: 'Roboto', sans-serif;
        }
        .financial_text_center{

          display: flex;
          align-items: center;
          justify-content: start;

        }

        .graph_header{
          font-family: 'Roboto', sans-serif;
          font-size: 1rem;
          font-weight: 460;
          color: #a6a6a6;
          margin-bottom: 0px;
          margin-left: 1.1em;
          opacity: 72%;
        }

        /* css for machine wise oee breakdown */
        #graph_machine_agenda{
          opacity: 0.8;
          font-weight: 450;
          font-size:0.9rem;
        }

        /* graph bottom for each grph */
        .financial_drill_down_graph_bottom{
            margin-bottom:0.6rem;
        }

        /* oee trend graph css */
        .parent_graph_oee_trend{
          overflow-x:scroll;
          overflow-x: auto;
        }

        .parent_div{
          height: 22rem;
          overflow-y:hidden;
        }
        .child_div{
          height: 100%;
          padding: 0.5rem;
        }


        .hoverOverall{
          background-color: white;
          border-radius: 5px 5px 5px 5px;
          z-index: 1400;
          position: relative;
          border: 0.5px solid #d9d9d9;
          padding: 0.5rem;
          color: #979a9a;
          font-size: 0.8rem;
          font-weight:500;
          max-width:11rem;
          min-width: 5rem; 
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

      #title_overall{
        color:#596365;
        opacity: 100%;
        font-weight:450;

      }
      .val_color{
        color:rgb(0, 90, 188);
        font-weight:700;
        width:max-content;
      }


    /* mobile responsive strategy */
    /* navbar header global filter text is joining the from date to date filter thats the reason is should apply the below media query */
    .over_all_graph_width{
      width:25%;
    }
    .graph_width_res{width:80%}
    .res_screen_filtericon{display:none !important;}
    .graph_label_custome{
      overflow-x:scroll;
      overflow-y:hidden;
    }

    @media only screen and (max-width:880px){
      .over_all_graph_width{
        width:30%;
      }
      .graph_width_res{width:100%}
    }
    @media only screen and (max-width:810px) and (min-width:768px){
      .res_screen_filter_input{
        display:none !important;
      }
      .res_screen_filtericon{display:inline !important;}
      .over_all_graph_width{
        width:30%;
      }
    }
    @media only screen and (max-width:768px){

      .mr_left_content_sec{
        margin-left:0rem;
        top:0rem;
      }
      .res_screen_filter_input{
        display:none !important;
      }
      .res_screen_filtericon{display:inline !important;}

      .over_all_graph_width{
        width:30%;
      }
      .OuterCard{
        margin-left:1rem;
        margin-right:1rem;
        margin-top:10px;
      }
      .graph_width_res{width:100%}

    }
    @media only screen and (max-width:682px) {
      .over_all_graph_width{
        width:100%;
      }
      .flex-container{
        flex-direction:column;
      }
      .OuterCard{
        margin-left:1rem;
        margin-right:1rem;
        margin-top:10px;
      }
      .graph_width_res{width:100%}


    }
  /* mobile responsive end */
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

          if (inputDateTime.getDate() == current.getDate() && inputDateTime.getMonth() == current.getMonth()) {
            var tmp_current = new Date();
              if (inputDateTime.getHours() <= (current.getHours()) && tmp_current.getDate()==inputDateTime.getDate() && tmp_current.getMonth()==inputDateTime.getMonth()) {
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

<div class="mr_left_content_sec">
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">OEE Financial Drill Down</p>
              <div class="d-flex res_screen_filter_input">
                    <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
                        <div class="input-box" style="width:12rem;">
                          <input type="text" class="form-control fromDate fdate_fx" value="2022-08-23" step="1">
                          <label for="inputSiteNameAdd" class="input-padding ">From Date</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
                        <div class="input-box" style="width:12rem;">
                          <input type="text" class="form-control toDate tdate_fx" value="" step="1">
                          <label for="inputSiteNameAdd" class="input-padding ">To Date</label>
                        </div>
                    </div>
                  <!-- overall filter btn -->
                  <div class="box rightmar mar_r_box" >
                    <button type="button" class="overall_filter_btn overall_filter_header_css"  >Apply Filter</button>
                  </div>
              </div>
              <div class="res_screen_filtericon">
                <div class="d-flex p-2 justify-content-end align-items-center">
                  <img src="<?php echo base_url('/assets/img/global_filter.png') ?>" class="global_filter_btn" style="width:1.6rem;height:1.6rem;"  >
                 
                </div>
              </div>
          </div>
        </nav>

        <div class="OuterCard bodercss">
        	<div class="flex-container">
        		<div style="" class="graphCard over_all_graph_width">
        			<p class="graph_lable_header fnt_fam">OVERALL TEEP%</p>
        			<div style="width: 100%;max-width: 100%;" class="graphCardFLayer hoverCardTEEP">
        				<div style="width: 0%;max-width: 100%;" class="graphCardSLayer center-align" id="ViewOverallTEEP">
	        			</div>
                <div style="width: 0%;max-width:100%;" class="graphCardTLayer financial_text_center" id="viewTEEP">
                    <p class="values paddingm val"><span id="valueTEEP"></span>%</p>
                  </div>
        			</div>
        			<div class="hoverOverallTEEP hoverOverall">
                <div style="display: flex;">
                  <div style="width:max-content" class="center-align-div">
                    <div class="overallValueDiv"></div>
                  </div>
                  <div style="width: 70%" id="title_overall">TEEP%</div>
                  <div style="width: 30%" class="val_color" ><p class="paddingm teepVal" style="width:max-content;">0%</p></div>
                </div>
                <div style="display: flex;">
                  <div style="width: max-content" class="center-align-div">
                    <div class="overallTargetDiv"></div>
                  </div>
                  <div style="width: 70%">Target</div>
                  <div style="width: 30%"><p class="paddingm teepTarget">0%</p></div>
                </div>
              </div>
        		</div>
        		<div style="" class="graphCard bodercss over_all_graph_width">
        			<p class="graph_lable_header fnt_fam">OVERALL OOE%</p>
        			<div style="width: 100%;max-width: 100%;" class="graphCardFLayer hoverCardOOE">
        				<div style="width: 0%;max-width: 100%;" class="graphCardSLayer center-align" id="ViewOverallOOE">
        				</div>
                <div style="width: 0%;max-width: 100%;" class="graphCardTLayer financial_text_center" id="viewOOE">
                    <p class="values paddingm val"><span id="valueOOE"></span>%</p>
                </div>
        			</div>
              <div class="hoverOverall hoverOverallOOE">
                <div style="display: flex;">
                  <div style="width: max-content" class="center-align-div">
                    <div class="overallValueDiv"></div>
                  </div>
                  <div style="width: 70%" id="title_overall">OOE%</div>
                  <div style="width: 30%" class="val_color"><p class="paddingm ooeVal">0%</p></div>
                </div>
                <div style="display: flex;">
                  <div style="width: max-content" class="center-align-div">
                    <div class="overallTargetDiv"></div>
                  </div>
                  <div style="width: 70%">Target</div>
                  <div style="width: 30%"><p class="paddingm ooeTarget">0%</p></div>
                </div>
              </div>
        		</div>
        		<div style="" class="graphCard bodercss over_all_graph_width">
        			<p class="graph_lable_header">OVERALL OEE%</p>
        			<div style="width: 100%;max-width: 100%;" class="graphCardFLayer hoverCardOEE">
        				<div style="width: 0%;max-width: 100%;" class="graphCardSLayer center-align" id="ViewOverallOEE">
        				</div>
                <div style="width: 0%;max-width: 100%;" class="graphCardTLayer financial_text_center" id="viewOEE">
                    <p class="values paddingm val"><span id="valueOEE"></span>%</p>
                </div>
        			</div>
              <div class="hoverOverallOEE hoverOverall">
                <div style="display: flex;">
                  <div style="width: max-content" class="center-align-div">
                    <div class="overallValueDiv"></div>
                  </div>
                  <div style="width: 70%" id="title_overall">OEE%</div>
                  <div style="width: 30%" class="val_color"><p class="paddingm oeeVal">0%</p></div>
                </div>
                <div style="display: flex;">
                  <div style="width: max-content" class="center-align-div">
                    <div class="overallTargetDiv"></div>
                  </div>
                  <div style="width: 70%">Target</div>
                  <div style="width: 30%"><p class="paddingm oeeTarget">0<span>%<span></div>
                </div>
              </div>
        		</div>
        	</div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss graph_width_res" style="">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start graph_lable_header graph_lable_header_top fnt_fam" id="">MACHINE-WISE OEE% BREAKDOWN</p>
                  <div class="d-flex">
                  </div>
              </div>
            </nav>
            <div class="parent_graph_machine_wise_oee financial_drill_down_graph_bottom parent_div marginScroll">
              <div class="child_div child_graph_machine_wise_oee">
                <canvas id="machine_wise_OEE" ></canvas>  
              </div>
            </div> 

            <div class="display_f graph_lable graph_label_custome" >
              <div class="divSpace display_f justify_c align_c">
                <p class="paddingm display_f justify_c align_c fontStyle"><span class="recDraw lableSpace paddingm">.</span><span id="graph_machine_agenda">Machine OEE%</span></p>
              </div>
              <div class="divSpace display_f justify_c align_c">
                <p class="paddingm display_f justify_c align_c fontStyle"><span class="triangleDraw lableSpace paddingm"></span><span id="graph_machine_agenda">Availability%</span></p>
              </div>
              <div class="divSpace display_f justify_c align_c">
                <p class="paddingm display_f justify_c align_c fontStyle"><span class="squareDraw lableSpace paddingm">.</span><span id="graph_machine_agenda">Performance%</span></p>
              </div>
              <div class="divSpace display_f justify_c align_c">
                <p class="paddingm display_f justify_c align_c fontStyle"><span class="circleDraw lableSpace paddingm">.</span><span id="graph_machine_agenda">Quality%</span></p>
              </div>
            </div>  
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss graph_width_res" style="">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start graph_lable_header graph_lable_header_top fnt_fam" id="">AVAILABILITY OPPORTUNITY</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;">
                                </select>
                        </div> -->
                  </div>
              </div>
            </nav> 
              <div class="divMarLeft">
                <p class="paddingm headTitle fnt_fam">TOTAL</p>
                <p class="paddingm valueGraph"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft TotalAvail"></span></p>
              </div>
              <div class="parent_graph_availability_opportunity financial_drill_down_graph_bottom parent_div marginScroll">
                <div class="child_div child_graph_availability_opportunity">
                  <canvas id="avalabilityOpportunity"></canvas>    
                </div>
              </div>
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss graph_width_res" style=""> 
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start graph_lable_header graph_lable_header_top fnt_fam" id="">PERFORMANCE OPPORTUNITY</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div> -->
                  </div>
              </div>
            </nav> 
            <div class="divMarLeft">
                <p class="paddingm headTitle fnt_fam">TOTAL</p>
                <p class="paddingm valueGraph"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft PerformanceGrand"></span></p>
            </div>
            <div class="parent_graph_performance_opportunity financial_drill_down_graph_bottom parent_div marginScroll">
              <div class="child_div child_graph_performance_opportunity">
                  <canvas id="performanceOpportunity"></canvas>    
              </div>
            </div>
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss graph_width_res" style="">
            <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start graph_lable_header graph_lable_header_top fnt_fam" id="">QUALITY OPPORTUNITY</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div> -->
                  </div>
              </div>
            </nav> 
            <div class="divMarLeft">
                <p class="paddingm headTitle fnt_fam">TOTAL</p>
                <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft OppCostTotal" ></span></p>
            </div>
            <div class="parent_graph_quality_opportunity financial_drill_down_graph_bottom parent_div marginScroll">
              <div class="child_div child_graph_quality_opportunity">
                <canvas id="qualityOpportunity"></canvas>    
              </div>
            </div>
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss graph_width_res" style="">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start graph_lable_header graph_lable_header_top fnt_fam" id="">OEE TREND</p>
                  <div class="d-flex">
                        <!-- <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div>
                        <div class="rightmar">
                          <select class="form-select" name="" id="" style="width: 10rem;"></select>
                        </div> -->
                  </div>
              </div>
            </nav> 
            <div class="parent_graph_oee_trend financial_drill_down_graph_bottom parent_div marginScroll" >
              <div class="child_div child_graph_oee_trend">
                  <canvas id="OEETrend" class=""></canvas>    
              </div>
            </div>
          </div>
        </div>
</div>


<div class="modal fade" id="filter_ftdate_responsive" tabindex="-1" aria-labelledby="filter_ftdate_responsive12" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rounded">
      <div class="modal-content bodercss">
        <div class="modal-header" style="border:none; ">
          <h5 class="modal-title header_popup fnt_fam" id="filter_ftdate_responsive12" style="">Global Filter</h5>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-center align-items-center row">
            <div class="box rightmar col-sm-12 col-lg-6 col-md-6 p-2" style="margin-right: 0.5rem;width:12rem;">
              <div class="input-box" style="width:12rem;">
                <input type="text" class="form-control fromDate fdate_rs" value="2022-08-23" step="1">
                <label for="inputSiteNameAdd" class="input-padding ">From Date</label>
              </div>
            </div>
            <div class="box rightmar ol-sm-12 col-lg-6 col-md-6 p-2" style="margin-right: 0.5rem;width:12rem;">
              <div class="input-box" style="width:12rem;">
                <input type="text" class="form-control toDate tdate_rs" value="" step="1">
                <label for="inputSiteNameAdd" class="input-padding ">To Date</label>
              </div>
            </div>
          </div>  
        </div>
        <div class="modal-footer" style="border:none;">
          <a class="btn fnt_fam btn_fnt_size btn_padd btn_save overall_filter_btn_resp"  value="Apply Filter" >Apply Filter</a>
          <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
        </div>
      </div>
    </div>
</div>

<!-- preloader Start-->
<div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
      </div>
</div>
<!-- preloader end -->


<script type="text/javascript">

// fromdate using date time picker
var dt = new Date();
$('.fromDate').datetimepicker({  
  format:'Y-m-d H:00',
  // minDate : '0',
  maxDate: new Date(),
  onChangeDateTime:checkPastTime_F,
  onShow:checkPastTime_F,
});

$('.toDate').datetimepicker({
  format:'Y-m-d H:00',
  onChangeDateTime:checkPastTime,
  onShow:checkPastTime,
  maxDate: new Date()
});

var now = new Date();

var fdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + (now.getHours()-1)).slice(-2)+":00";

//One week back
now.setDate(now.getDate() - 6);
var tdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + now.getHours()).slice(-2)+":00";
$('.toDate').val(fdate);
$('.fromDate').val(tdate);


// Pre-Loader On
// $("#overlay").fadeIn(300);
// setTimeout(myFun, 500);

/* temporary hide for this funciton
$(document).on('blur','.fromDate',function(){
  // Pre-Loader On
  $("#overlay").fadeIn(300);
  setTimeout(myFun, 500);

});
$(document).on('blur','.toDate',function(){
  // Pre-Loader On
  $("#overlay").fadeIn(300);
  setTimeout(myFun, 500);
});
*/



// overall filter button onclick function
$(document).on('click','.overall_filter_btn',function(event){
  event.preventDefault();
  console.log("filter button working");
  $("#overlay").fadeIn(300);
  myFun('fdate_fx','tdate_fx');
});

$(document).ready(function(){
  $("#overlay").fadeIn(300);
  myFun('fdate_fx','tdate_fx');
});


// mobile responsive global filter icon click function
$(document).on('click','.global_filter_btn',function(){
  $('#filter_ftdate_responsive').modal('show');
});
// mobile responsive modal onclick function
$(document).on('click','.overall_filter_btn_resp',function(){
  alert(' hi this responsive click global filter');
  // event.preventDefault();
  $('#filter_ftdate_responsive').modal('hide');
  $("#overlay").fadeIn(300);
  myFun('fdate_rs','tdate_rs');
  
  // $('#filter_ftdate_responsive').removeClass('show');

});

async function myFun(fclassname,tclassname){
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    if ((new Date(f) >= new Date(t)) || (t=="")) {
      var x = new Date(f)
      t = x.setHours(x.getHours() + 1);
      t= new Date(t);
      var tdate = t.getFullYear()+"-"+("0" + (parseInt(t.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + t.getDate()).slice(-2)+" "+("0" + t.getHours()).slice(-2)+":00";
      $('.'+tclassname).val(tdate);
      t = $('.'+tclassname).val();
    }

    var f_t = new Date(f);
    var t_t = new Date(t);
    var c_t = new Date();

    if (t_t >= c_t) {
      var k = t_t.setHours(c_t.getHours());
      k = new Date(k);
      var tdate = k.getFullYear()+"-"+("0" + (parseInt(k.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + k.getDate()).slice(-2)+" "+("0" + k.getHours()).slice(-2)+":00";
      $('.'+tclassname).val(tdate);
      var t_t = new Date(tdate);
    }

    if (c_t.getFullYear()==f_t.getFullYear() && c_t.getMonth() == f_t.getMonth() && c_t.getDate()==f_t.getDate() && (f_t.getHours()+2) >= c_t.getHours()) {
      var k = f_t.setHours(c_t.getHours()-1);
      var y = f_t.setHours(c_t.getHours());
      k = new Date(k);
      y = new Date(y);
      var fdate = k.getFullYear()+"-"+("0" + (parseInt(k.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + k.getDate()).slice(-2)+" "+("0" + k.getHours()).slice(-2)+":00";

      var tdate = k.getFullYear()+"-"+("0" + (parseInt(y.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + y.getDate()).slice(-2)+" "+("0" + y.getHours()).slice(-2)+":00";

      $('.'+fclassname).val(fdate);
      $('.'+tclassname).val(tdate);
      f = $('.'+fclassname).val();
      t = $('.'+tclassname).val();
    }

   
    await overallTarget(fclassname,tclassname);
    await machineWiseOEE(fclassname,tclassname);
    await availabilityReason(fclassname,tclassname);
    await qualityOpportunity(fclassname,tclassname);
    await performanceOpportunity(fclassname,tclassname);
    await oeeTrendDay(fclassname,tclassname);
  // Pre-Loader Off
  console.log("ok loading end");
  $("#overlay").fadeOut(300);
}

//Target Values.......
$.ajax({
  url: "<?php echo base_url('Financial_Metrics/getOverallTarget'); ?>",
  type: "POST",
  dataType: "json",
  success:function(res){
    $('#ViewOverallTEEP').css('width',''+res[0].overall_teep+'%');
    $('#ViewOverallOEE').css('width',''+res[0].overall_oee+'%');
    $('#ViewOverallOOE').css('width',''+res[0].overall_ooe+'%');

    $('.teepTarget').html(res[0].overall_teep+'%');
    $('.oeeTarget').html(res[0].overall_oee+'%');
    $('.ooeTarget').html(res[0].overall_ooe+'%');
    
  },
  error:function(res){
    $('#ViewOverallTEEP').css('width','0%');
    $('#ViewOverallOEE').css('width','0%');
    $('#ViewOverallOOE').css('width','0%');
  }
});

//Overall TEEP,OOE,OEE.......
//overallTarget();
function overallTarget(fclassname,tclassname){
  // Pre-Loader On
  // $("#overlay").fadeIn(300);
  return new Promise(function(resolve,reject){
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      //OEE check....
      url: "<?php echo base_url('Financial_Metrics/OverallOEETarget'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
        // res=res['OverallMonitoring'];
        $('#viewTEEP').css('width',''+parseInt(res.Overall_TEEP)+'%');
        $('#viewOOE').css('width',''+parseInt(res.Overall_OOE)+'%');
        $('#viewOEE').css('width',''+parseInt(res.Overall_OEE)+'%');
        
        $('#valueTEEP').html(res.Overall_TEEP);
        $('#valueOOE').html(res.Overall_OOE);
        $('#valueOEE').html(res.Overall_OEE);

        $('.ooeVal').html(res.Overall_OOE);
        $('.oeeVal').html(res.Overall_OEE);
        $('.teepVal').html(res.Overall_TEEP);

          // Pre-Loader Off
      },
      error:function(res){
        reject(res);
        $('#ViewOverallTEEP').css('width','0%');
        $('#ViewOverallOEE').css('width','0%');
        $('#ViewOverallOOE').css('width','0%');

          // Pre-Loader Off
      }
    });
  });
 
}

//Machine Wise OEE......
function machineWiseOEE(fclassname,tclassname) {
  // Pre-Loader On
  // $("#overlay").fadeIn(300);
  return new Promise(function(resolve,reject){
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/getMachineWiseOEE');?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
        $('#machine_wise_OEE').remove();
        $('.child_graph_machine_wise_oee').append('<canvas id="machine_wise_OEE"><canvas>');
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
                var w= parseInt($('.parent_graph_machine_wise_oee').css("width"))+parseInt(l*18*16);
                $('.child_graph_machine_wise_oee').css("width",w+"px");
                break;
              }
              else{
                break;
              }
            }
              var ctx = document.getElementById("machine_wise_OEE").getContext('2d');
                  var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: res.MachineName,
                    datasets: [
                    {
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
                    },
                    {
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

                      perTarget:res['PerformanceTarget'],
                      availTarget:res['AvailabilityTarget'],
                      qulyTarget:res['QualityTarget'],
                      oeeTarget:res['OEETarget'],

                    },
                    {
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
                        barThickness:30, //bar thickness percentage fixed
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

          // Pre-Loader Off
      },
      error:function(res){
        reject(res);
          // Pre-Loader Off
          // alert("No Data Records!");
      }
    });
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

//Reason wise availability........
//availabilityReason();
function availabilityReason(fclassname,tclassname) {

  // Pre-Loader On
  // $("#overlay").fadeIn(300);
  return new Promise(function(resolve,reject){
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/getAvailabilityReasonWise'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
        $('#avalabilityOpportunity').remove();
        $('.child_graph_availability_opportunity').append('<canvas id="avalabilityOpportunity"><canvas>');
        $('.chartjs-hidden-iframe').remove();
        
        // res= res["AvailabilityOpportunity"];

        $(".TotalAvail").html(res.grandTotal.toLocaleString("en-IN"));
        var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
          
        // Find the Reason Names as Lables..........
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

        var category_percent =1.0;
        var bar_space=0.5;
        while(true){
          var len= reasonList.length;
          if (len < 8) {
            reasonList.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);
            var w= parseInt($('.parent_graph_availability_opportunity').css("width"))+parseInt(l*18*16);
            $('.child_graph_availability_opportunity').css("width",w+"px");
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
            data:totalVal,
            duration:totalDuration,
            pointRadius: 7,
          }           
        ];

        var x=1;
        var index=0;
        res['data'].forEach(function(machineWise){
          //     //All the machines duration for each Reason..........
            var arr= [];
            var arrtmp = [];
            machineWise.forEach(function(reason){
              arr.push(reason.oppCost.toFixed(2));
              arrtmp.push(reason.duration);
            });

            machine.push({
              label: machineName[index],
              type: "bar",
              backgroundColor: color[x],
              borderColor: color[x],
              borderWidth: 1,
              fill: true,
              duration:arrtmp,
              data: arr,
              categoryPercentage:category_percent,
              barPercentage: bar_space,
              barThickness:30, //bar thickness percentage fixed
            });
            x=x+1;
            index=index+1;
        });
        var avlOpp = document.getElementById("avalabilityOpportunity").getContext('2d');
        var avlOppChart = new Chart(avlOpp, {
          type: 'bar',
          data: {
            labels: reasonList,
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

          // Pre-Loader Off
      },
      error:function(res){
        reject(res);
          // Pre-Loader Off
          // alert("Sorry!Try Agian!!!!");
      }
    }); 
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

        var duration= parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].duration[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);

        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        innerHtml += '<div class="grid-container">';
        innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';
        innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';

        innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
        innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';
        innerHtml += '<div class="grid-item content-text"><span>Duration</span></div>';
        if (days>0) {
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>';
        }
        else{
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+hours+"h"+" "+min+"m"+'</span></div>';
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

//Quality Opportunity........
//qualityOpportunity();
function qualityOpportunity(fclassname,tclassname) {
  // Pre-Loader On
  // $("#overlay").fadeIn(300);
  return new Promise(function(resolve,reject){
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/qualityOpportunity'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
        $('#qualityOpportunity').remove();
        $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
        $('.chartjs-hidden-iframe').remove();

        // res=res["QualityOpportunity"]
        $(".OppCostTotal").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
        // color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
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
        var reasonList =[];
        res['Reason'].forEach(function(res){
            reasonList.push(res);
        });

        var totalVal =[];
        var partNameTotal=[];
        res['Total'].forEach(function(t){
            totalVal.push(t);
            partNameTotal.push("Total");
        });
        
        var partName = [];
        for (const key in res['Part']) {

            partName.push(`${res['Part'][key]}`);
        }

        //Find the duration for each machine in each Reason............
        var totalReject=[];
        for (var i = 0; i< reasonList.length; i++) {
          var tmpTotalReject=0;
          for (var j = 0; j < res['OppCost'].length; j++) {
            tmpTotalReject=parseInt(tmpTotalReject)+parseInt(res['OppCost'][j]['Reason'][i]['TotalRejects']);
          }
          totalReject.push(tmpTotalReject);
        }

        var category_percent =1.0;
        var bar_space=0.5;

        while(true){
          var len= reasonList.length;
          if (len < 8) {
            reasonList.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);  
            var w= parseInt($('.parent_graph_quality_opportunity').css("width"))+parseInt(l*18*16);
            $('.child_graph_quality_opportunity').css("width",w+"px");
            break;
          }
          else{
            break;
          }
        }


        oppCost = [
          {
            label:"Total" ,
            type: "line",
            backgroundColor: color[0],
            borderColor: "#d9d9ff",  
            borderWidth: 1, 
            showLine : false,
            fill: false,
            reject:totalReject, 
            data:totalVal,
            partName:partNameTotal,
            pointRadius: 7,
          }           
        ];

        var x=1;
        var index=0;
        res['OppCost'].forEach(function(partWise){
        //     //All the part opportunity cost for each Reason..........
            var arr= [];
            var arrtmp = [];
            var a=[];
            var partNameHover=[];
            partWise.Reason.forEach(function(res){
              if (res.TotalCost == "") {
                arr.push(0);
                a.push(0);
              }
              else{
                  arr.push(res.TotalCost);
                  a.push(res.TotalRejects);
              }
              partNameHover.push(res.Part_Name);
            });
            oppCost.push({
              label: partName[index],
              type: "bar",
              backgroundColor: color[x],
              borderColor: color[x],
              borderWidth: 1,
              fill: true,
              reject:a,
              data: arr,
              partName:partNameHover,
              categoryPercentage:category_percent,
              barPercentage:bar_space,
              barThickness:30, //bar thickness percentage fixed

            });
            x=x+1;
            index=index+1;

        });

              var ctx = document.getElementById("qualityOpportunity").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: reasonList,
                  datasets:oppCost
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
                        stacked:true
                    },
                },
                plugins: {
                  legend: {
                      display: false,
                  },
                  tooltip: {
                    enabled: false,
                    // borderColor:"red",
                    external: qualityOpp,
                  }
                },
              },
            });

            // Pre-Loader Off
          },
      error:function(res){
        reject(res);
          // Pre-Loader Off
          // alert("Sorry!Try Agian!!!!");
      }
    }); 
  });
 
}

function qualityOpp(context) {  
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-quality');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-quality';
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
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';
        innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].partName[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';

        innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
        innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';
        innerHtml += '<div class="grid-item content-text"><span># of Rejects</span></div>';
        innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].reject[context.tooltip.dataPoints[0].dataIndex])+'</span></div>';

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



//Performance Opportunity........
//performanceOpportunity();
function performanceOpportunity(fclassname,tclassname) {

  return new Promise(function(resolve,reject){
    $('#performanceOpportunity').remove();
    $('.child_graph_performance_opportunity').append('<canvas id="performanceOpportunity"><canvas>');
    $('.chartjs-hidden-iframe').remove();
    // Pre-Loader On
    // $("#overlay").fadeIn(300);
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/performanceOpportunity'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
              var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
              $(".PerformanceGrand").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));

              var partTotal = [];
              res.Total.forEach(function(r){
                partTotal.push(parseFloat(r.toFixed(2)));
              });
              
              var speedTotal=[];
              res.SpeedLossTotal.forEach(function(t){
                speedTotal.push(parseFloat(t.toFixed(2)));
              });

              var partWiseLable = [];
              res.Part.forEach(function(item){
                partWiseLable.push(item.part_name);
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
                  data:partTotal,
                  speedLoss:speedTotal,
                  pointRadius: 7,
                }           
              ];

              var x=1;
              var index=0;
              
              res.dataPart.forEach(function(item){
                var performancePart=[];
                var speedLoss=[];
                item.machineData.forEach(function(val){
                  var p = parseFloat(val['Opportunity'].toFixed(2));
                  performancePart.push(p);
                  speedLoss.push(parseFloat(val['SpeedLoss'].toFixed(2)));
                });

                oppCost.push({
                    label: partWiseLable[index],
                    type: "bar",
                    backgroundColor: color[x],
                    borderColor: color[x],
                    borderWidth: 1,
                    fill: true,
                    data: performancePart,
                    speedLoss:speedLoss,
                    categoryPercentage:1.0,
                    barPercentage: 0.5, 
                    barThickness:30, //bar thickness percentage fixed

                  });
                  x=x+1;
                  index=index+1;
              });

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

              var ctx = document.getElementById("performanceOpportunity").getContext('2d');
              var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: partWiseLable,
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
      error:function(res){
        reject(res);
      }
    }); 
  });
  
}

function performanceOpp(context) {  
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-performance');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-performance';
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

        var duration = parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].speedLoss[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        innerHtml += '<div class="grid-container">';

        innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';
        innerHtml += '<div class="content-text sub-title"><span></span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';

        innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
        innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';
        innerHtml += '<div class="grid-item content-text"><span>Speed Loss</span></div>';
        if (days>0) {
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>';
        }
        else{
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+hours+"h"+" "+min+"m"+'</span></div>';
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


function oeeTrendDay(fclassname,tclassname) {
  // Pre-Loader On
  // $("#overlay").fadeIn(300);
  return new Promise(function(resolve,reject){
    f = $('.'+fclassname).val();
    t = $('.'+tclassname).val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
      // oee trend day
    $.ajax({
        url: "<?php echo base_url('Financial_Metrics/oeeTrendDay'); ?>",
        type: "POST",
        dataType: "json",
        // async:false,
        data:{
          from:f,
          to:t
        },
        success:function(res){
          resolve(res);
          $('#OEETrend').remove();
          $('.child_graph_oee_trend').append('<canvas id="OEETrend"><canvas>');
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
                var w= parseInt($('.parent_graph_oee_trend').css("width"))+parseInt(l*4*16);
                $('.child_graph_oee_trend').css("width",w+"px");
                break;
              }
              else{
                break;
              }
            }

          var ctx = document.getElementById("OEETrend").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels:mainLable,
             
              datasets: [{
                  label:'OEE',
                  type:'bar',
                  backgroundColor:'#004b9b',
                  borderColor:'#004b9b',
                  borderWidth:1,
                  fill:true,
                  data:oee,
                  each:partwiseTotal,
                  borderWidth: 1, // Border width for bars
                  barThickness: 30, // Fixed bar width
                  categoryPercentage: 1 // 100% of available space used for each category (no spacing)

              }],
          },

          options: {
            responsive: true,
            maintainAspectRatio: false, // Ensures chart responsiveness  
            scales: {
                y: {
                    display:true,
                    beginAtZero:true,  
                    stacked:true,
                    ticks:{
                      callback:function(value){
                        return value+"%";
                      },
                      beginAtZero:true,  
                    }
                    
                },
                x:{
                    display:true,
                    grid:{
                      display:false
                    },
                    stacked:true,
                    barPercentage: 0.5, // Adjust the width of bars
                    categoryPercentage: 0.5 // Adjust the space between bars 
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
          reject(res);
        }
    });
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

</script>

