
<head>
    <!-- Google Chart link -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script><!-- 
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>  -->
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css?version=<?php echo rand() ; ?>">
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

  .fontBold{
    font-weight: bold;
    margin-top:0.8rem;
  }
/* donut chart */
.donut-chart
{
    position: relative;
    width:50%;
    
}

#donutchart
{
    width: 100%;
    height: 20rem;
}

#pichart{
    width:100%;
    height:20rem;
}

.centerLabel
{
    position: absolute;
    left: 3rem;
    top: 3.7rem;
    width: 256px;
    line-height: 256px;
    text-align: center;
    justify-content:center;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 1rem;
    color: maroon;
}
#piechartwork{
    width:100%;
    height:20rem
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
        .valueGraph{
          font-size: 1.5rem;
          font-weight: bold;
          color: #004b9b;
        }
        .valueMarLeft{
          margin-left: 5px;
        }
        .divMarLeft{
          margin-left: 1.5rem;
        }

        /*.arrow_box{
          width: content-width;
          height:6rem;
          background-color: white;
          margin-bottom: 0;
          padding: 0;
          z-index: 2500;
        }*/
        /*.arrow_box p{
          color: #595959;
          font-size: 14;
          font-weight: bold;
          margin-left: 0.5rem;
          margin-top: 0.5rem;
          margin-bottom: 0;
          padding: 0;
          margin-right: 0.5rem;
        }*/
        /*.inner_arrow_box p{
          color: #bfbfbf;
          margin-left: 1.5rem;
        }*/

        /* graph header title */
        .financial_font{
          font-weight: 689;
          font-family: 'Roboto' , sans-serif;
          color: #A6A6A6;
          font-size: 1rem;
          opacity: 0.7;
          margin-left: 1.1rem;
          margin-top:1.3rem;
        }
        /* graph header text alignment */
        .financial_opportunity_graph_header{
          font-family: 'Roboto', sans-serif;
          font-size: 1rem;
          font-weight: 450;
          color: #a6a6a6;
          margin-bottom: 0px;
          margin-left: 1.1em;
          opacity: 0.8;
          margin-top:0.4rem;
        }


        /* graph scroll css */
        /* machine wise graph css */
        .parent_graph_machine_wise_insights{
          overflow-x:scroll;
          overflow-x: auto;
          margin-left:1rem; 
          margin-right:1rem;
        }

        /* opportunity trends insights  */
        .parent_graph_opportunity_trend_insights{
          overflow-x:scroll;
          overflow-x: auto;
          margin-left:1rem;
          margin-right:1rem;
        }

        /* opportunity trends drill down */
        .parent_graph_opportunity_dirll_down{
          overflow-x:scroll;
          overflow-x: auto;
          margin-left:1rem;
          margin-right:1rem;
        }

        .parent_graph_part_wise_pl{
          overflow-x:scroll;
          overflow-x: auto;
          margin-left:1rem;
          margin-right:1rem;
        }

        .parent_div{
          height: 22rem;
          overflow-y:hidden;
        }
        .child_div{
          height: 100%;
          padding: 0.5rem;
        }

        /* graph label in css */
        /* pie chart and donut chart */
        .label-col{
          width:32.3%;
        }
        .label-col1{
          width:68%;
        }
        .label-text{
          color:#979797;
          justify-content:center;
          text-align:center;
          font-weight:440;
          font-size: 0.7rem;
        }
        #donut_graph_operation{
          background-color: #004A9B;
          color: #004A9B;
          height: 0.7rem;
          width: 0.7rem;
          display: inline-block;
          /* opacity: 0.8; */
          margin-right:0.3rem;
          

        }
        .donut_graph_text{
          color:#979797;
          justify-content:center;
          font-weight:450;
          font-size:0.9rem;
          margin-right:0.3rem;
        }

        .donut_graph_text_pie{
          color:#979797;
          /* justify-content:center; */
          font-weight:450;
          font-size:0.9rem;
          margin-left:0rem;
          /* margin-right:0.3rem; */
        }
        #donut_graph_business{
          background-color: #B3D7FF;
          color: #B3D7FF;
          margin-left:0.3rem;
          height: 0.7rem;
          width: 0.7rem;
          display: inline-block;
          /* opacity: 0.8; */
          margin-right:0.4rem;
        }
        .col_rev_flex{
          display: flex;
          align-items:center;
        }
        .col_rev_flex_op{
          display: flex;
          align-items:center;
        }
        .graph_text_title{
          /* text-align:center; */
          margin-bottom:0.5rem;
          color:#979797;
          justify-content:center;
          text-align:center;
          font-weight:440;
          font-size: 0.7rem;
        }

        #pie_chart_color1{
          background-color: #004A9B;
          color: #004A9B;
          margin-left:0.3rem;
          height: 0.7rem;
          width: 0.7rem;
          display: inline-block;
          /* opacity: 0.8; */
          margin-right:0.4rem;
        }
        #pie_chart_color2{
          background-color: #005FC8;
          color: #005FC8;
          margin-left:0.3rem;
          height: 0.7rem;
          width: 0.7rem;
          display: inline-block;
          /* opacity: 0.8; */
          margin-right:0.4rem;
        }
        #pie_chart_color3{
          background-color: #057CFF;
          color: #057CFF;
          margin-left:0.3rem;
          height: 0.7rem;
          width: 0.7rem;
          display: inline-block;
          /* opacity: 0.8; */
          margin-right:0.4rem;
        }
        #pie_chart_color4{
          background-color: #CDE4FF;
          color: #CDE4FF;
          margin-left:0.3rem;
          height: 0.7rem;
          width: 0.7rem;
          display: inline-block;
          /* opacity: 0.8; */
          margin-right:0.4rem;
        }
        .graph_margin_bottom{
          margin-bottom:1.3rem;
        }

        /* display for lable legend for part wise graph css */
        .graph_part_wise_pl_flex{
          display:flex;
          flex-wrap:wrap;
          flex-direction:row;
          align-items:  center;

        }

        /* part graph */
        .part_graph{
          display:flex;
          justify-content:center;
          align-items:center; 
          margin-right:1rem;
        }

        /* part graph div */
        .part_graph_pdiv{
          height:4rem;
          align-items:center;
          flex-direction:row;
          margin-left:1.6rem;
        }

        /* change pie chart height and width */
        .piechart_control{
          height: 11.6rem;
          width:11.6rem;
          margin:auto;
        }

        .inr-img{
          height:14px;
          width:10px;
          margin-right:3px
        }

        /* graph height */
       /* #machineWiseInsights{
          max-height:22rem;
        }

        #OpportunityTrendInsights{
          max-height:21rem;
        }

        #OpportunityDrillDownInsights{
          max-height:21rem;
        }
        #PartWiseInsights{
          max-height:21rem;
        }*/
        /* #olichart{
          margin:auto;
        } */



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

    .pl_res_fgraph{
      display:flex;
      flex-direction:row;
      flex-wrap:wrap; 
    }
    .pl_res_graphfd{
      width:50%;
    }
    .pl_res_graphfd1{
      width:50%;
    }
    .pl_op_gl{
      width:50%;
      margin-left:2rem;
    }
    .base_graph_olichart{
      height:100%;
      width:70%;
      display:flex;
      flex-direction:column-reverse;
      align-items:center
    }

    .base_graph_chart{
      height:75%;
      width:70%;
    }
    @media only screen and (max-width:1000px){
      .pl_res_fgraph{
        flex-direction:column;
        align-items:center;
      }

      .pl_res_graphfd{
        width:60%;
        margin-bottom:0.5rem;
      }
      .pl_res_graphfd1{
        width:100%;
      }
      .base_graph_chart{
        height:75%;
        width:80%;
      }
      
    }
    @media only screen and (max-width:880px){
      .over_all_graph_width{
        width:30%;
      }
      .pl_res_graphfd{
        width:60;
        margin-bottom:0.5rem;
      }
      .graph_width_res{width:100%}

      .base_graph_chart{
        height:75%;
        width:80%;
      }
    }
    /* global fitler icon visibilities css */
    @media only screen and (max-width:810px) and (min-width:768px){
      .res_screen_filter_input{
        display:none !important;
      }
      .res_screen_filtericon{display:inline !important;}
      .over_all_graph_width{
        width:30%;
      }
      .pl_res_graphfd{
        width:60%;
        margin-bottom:0.5rem;
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

      .pl_res_graphfd{
        width:60%;
        margin-bottom:0.5rem;
      }
      .base_graph_chart{
        height:75%;
        width:75%;
      }

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

      .pl_res_graphfd{
        width:75%;
        margin-bottom:0.5rem;
      }
      .pl_op_gl{
        width:100%;
        margin-left:1rem;
      }
     
      .base_graph_chart{
        height:90%;
        width:85%;
      }
    }

    @media only screen and (max-width:350px){
      .col_rev_flex_op_div{
        /* display:flex; */
        flex-direction:column;
        width:100%;
      }
      .pl_op_gl{
        width:100%;
        margin-left:1rem;
      }

      .part_graph{
        display:flex;
        width:100%;
        justify-content:flex-start;
      }
      .part_graph_pdiv{
        height:4rem;
        align-items:start;
        flex-direction:column;
        margin-left:1.6rem;
        margin-bottom:1rem;
      }
      .base_graph_chart{
        height:100%;
        width:100%;
      }
      .pl_res_graphfd{
        width:100%;
        margin-bottom:0.5rem;
      }

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
          
          // var tmp_current_time = new Date()
          if (inputDateTime.getDate() == current.getDate() && inputDateTime.getMonth() == current.getMonth()) {
            var tmp_current = new Date();
            if (inputDateTime.getHours() <= (current.getHours()) && inputDateTime.getDate()==tmp_current.getDate() && inputDateTime.getMonth()==tmp_current.getMonth()) {
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
          if (inputDateTime.getDate() == tmp.getDate() && inputDateTime.getMonth() == tmp.getMonth()) {
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
              if (inputDateTime.getDate() == current.getDate() && inputDateTime.getMonth() == current.getMonth()) {
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
      <p class="float-start fnt_fam mdl_header">Opportunity Insights</p>
      <div class="d-flex res_screen_filter_input">
        <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
          <div class="input-box" style="width:12rem;">
            <!-- <input type="date" name="" class="form-control fromDate" id="from"> -->
            <input type="text" class="form-control fromDate" value="" step="1">
            <!-- <input type="datetime-local" class="form-control" value="2013-10-24T10:00:00" step="1"> -->
            <label for="inputSiteNameAdd" class="input-padding ">From Date</label>
          </div>
        </div>
        <div class="box rightmar" style="margin-right: 0.5rem;width:12rem;">
          <div class="input-box" style="width:12rem;">
            <!-- <input type="date" name="" class="form-control toDate"> -->
            <input type="text" class="form-control toDate" value="" step="1">
            <label for="inputSiteNameAdd" class="input-padding ">To Date</label>
          </div>
        </div>
        <div class="box rightmar mar_r_box" >
          <button type="button" class="overall_filter_btn overall_filter_header_css"  >Apply Filter</button>
        </div>
      </div>
      <div class="res_screen_filtericon">
        <div class="d-flex p-2 justify-content-end align-items-center">
          <img src="<?php echo base_url() ?>/assets/img/global_filter.png?version=<?= rand()?>" alt="" class="global_filter_btn" style="width:1.6rem;height:1.6rem;">
        </div>
      </div>
    </div>
  </nav> 
  
  <!-- the old class is  financial_opportunity_graph_header then after change the class name is financial_font  -->
  <div class="OuterCard graphCardMain">
    <div class="card bodercss graph_width_res" >
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid paddingm">
          <p class="float-start fontBold financial_font">P & L IMPROVEMENT OPPORTUNITY</p>
        </div>
      </nav> 
      <div class="pl_res_fgraph">
        <div  class="pl_res_graphfd d-flex flex-column justify-content-center align-items-center">
          <div class="base_graph_chart" style="" >
            <div id="chart"></div>
          </div>
          <div class="d-flex flex-row justify-content-center align-items-start mt-3">
            <span class="label-text">OVERALL</span>
          </div>
          <div class="d-flex flex-row justify-cotnent-start align-items-center p-2">
            <div style="width:50%;">
              <div class="col_rev_flex" style=" flex-direction: row-reverse;">
                <span class="donut_graph_text" >Operations</span><span id="donut_graph_operation"></span>
              </div>
            </div>
            <div style="width:50%;">
              <div class="col_rev_flex" style=" flex-direction: row-start;">
                <span id="donut_graph_business"></span><span class="donut_graph_text">Business</span>
              </div>
            </div>
          </div>
        </div>
        <div  class="pl_res_graphfd1 d-flex flex-column justify-content-center align-items-center">
          <div class="base_graph_olichart"style="">
            <div id="olichart" ></div>
          </div> 
          <div class="d-flex flex-row justify-content-center align-items-start mt-4">
            <span class="graph_text_title">OPERATIONS</span>
          </div> 
          <div class="d-flex flex-column justify-content-start align-items-center p-2" style="width:100%;">
            <!-- first row -->
            <div class="col_rev_flex_op" style="justify-content:center;margin-bottom:0.7rem;width:100%;">
              <div class="d-flex col_rev_flex_op_div" style="width:100%;">
                <div class="d-flex pl_op_gl" style="display:flex;align-items:center;margin-right:0.6rem;">
                  <span id="pie_chart_color1"></span><p style="margin:auto;margin-left:0rem;" class="donut_graph_text_pie">Planned Downtime</p>
                </div>
                <div class="d-flex pl_op_gl" style="display:flex;align-items:center;">
                  <span id="pie_chart_color2"></span><p style="margin:auto;margin-left:0rem;" class="donut_graph_text_pie">Performance</p>
                </div>
              </div>
            </div> 
            <!-- second row  -->
            <div class="col_rev_flex_op" style="justify-content:center;width:100%;">
              <div class="d-flex col_rev_flex_op_div" style="width:100%;">
                <div class="d-flex pl_op_gl" style="display:flex;align-items:center;  margin-right:0.6rem;">
                  <span id="pie_chart_color3"></span><p style="margin:auto;margin-left:0rem;width:max-content;" class="donut_graph_text_pie">Unplanned Downtime</p>
                </div>
                <div class="d-flex pl_op_gl" style="display:flex;align-items:center;">
                  <span id="pie_chart_color4"></span><p style="margin:auto;margin-left:0rem;" class="donut_graph_text_pie">Quality</p>
                </div>
              </div>
            </div>         
          </div>       
        </div>
      </div>
      <br>

      <!-- preloader Start-->
        <div class="overlay_div bodercss" id="overall_pl_loader">
              <div class="cv-spinner_div">
                <span class="spinner_div"></span>
                <!-- <span class="loading">Awaiting Completion...</span> -->
              </div>
        </div>
      <!-- preloader end -->
    </div>
  </div>


  <div class="OuterCard graphCardMain">
    <div class="card bodercss graph_width_res">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid paddingm">
          <p class="float-start fontBold  financial_font">MACHINE WISE P & L IMPROVEMENT OPPORTUNITY</p>
        </div>
      </nav> 
      <div class="divMarLeft">
        <p class="paddingm headTitle">TOTAL</p>
        <p class="paddingm valueGraph"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft" id="PLTotal"></span></p>
      </div>
      <div class="parent_graph_machine_wise_insights graph_margin_bottom parent_div marginScroll">
        <div class="child_graph_machine_wise_insig child_div">
          <canvas id="machineWiseInsights" ></canvas>    
        </div>
      </div>
      <!-- preloader Start-->
        <div class="overlay_div bodercss" id="machine_wise_loader">
              <div class="cv-spinner_div">
                <span class="spinner_div"></span>
                <!-- <span class="loading">Awaiting Completion...</span> -->
              </div>
        </div>
      <!-- preloader end -->
    </div>
  </div>

  <div class="OuterCard graphCardMain">
    <div class="card bodercss graph_width_res" >
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid paddingm">
          <p class="float-start fontBold financial_font">OPPORTUNITY TREND</p>
        </div>
      </nav> 
      <div class="divMarLeft">
        <p class="paddingm headTitle">TOTAL</p>
        <p class="paddingm valueGraph"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft" id="GTotalTrend"></span></p>
      </div>

      <div class="parent_graph_opportunity_trend_insights graph_margin_bottom parent_div marginScroll">
        <div class="child_graph_opportunity_trend_insights child_div">
          <canvas id="OpportunityTrendInsights"></canvas>    
        </div>
      </div>
      <!-- preloader Start-->
        <div class="overlay_div bodercss" id="opp_trend_loader">
              <div class="cv-spinner_div">
                <span class="spinner_div"></span>
                <!-- <span class="loading">Awaiting Completion...</span> -->
              </div>
        </div>
      <!-- preloader end -->
    </div>
  </div>
  
  <div class="OuterCard graphCardMain">
    <div class="card bodercss graph_width_res" >
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid paddingm">
          <p class="float-start fontBold  financial_font">OPPORTUNITY DRILL DOWN</p>
        </div>
      </nav> 
      <div class="divMarLeft">
        <p class="paddingm headTitle">TOTAL</p>
        <p class="paddingm valueGraph"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft" id="GTotalDrillDown"></span></p>
      </div>

      <div class="parent_graph_opportunity_dirll_down parent_div marginScroll" style="margin-bottom:1rem;">
        <div class="child_graph_opportunity_drill_down child_div">
          <canvas id="OpportunityDrillDownInsights" ></canvas>    
        </div>
      </div>
      <!-- preloader Start-->
        <div class="overlay_div bodercss" id="opp_drilldown_loader">
              <div class="cv-spinner_div">
                <span class="spinner_div"></span>
                <!-- <span class="loading">Awaiting Completion...</span> -->
              </div>
        </div>
      <!-- preloader end -->
    </div>
  </div>

  <div class="OuterCard graphCardMain">
    <div class="card bodercss graph_width_res" >
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid paddingm">
          <p class="float-start fontBold  financial_font">PART WISE P & L ANALYSIS</p>
        </div>
      </nav> 
      <div class="divMarLeft">
        <p class="paddingm headTitle financial_font">PROFIT / LOSS</p>
        <p class="paddingm valueGraph valueGraph_Loss"><i style="font-size:1.3rem;" class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft" id="GTotalPL"></span></p>
      </div>

      <div class="parent_graph_part_wise_pl parent_div marginScroll">
        <div class="child_graph_part_wise_pl child_div">
          <canvas id="PartWiseInsights"></canvas>    
        </div>
      </div>

      <div class="d-flex part_graph_pdiv" style="">
        <div class="part_graph" style=""><span id="pie_chart_color1"></span><span class="donut_graph_text">Material Cost</span></div>
          <div class="part_graph" style=""><span id="pie_chart_color2"></span><span class="donut_graph_text">Production Cost</span></div>
          <div class="part_graph" style=""><span id="pie_chart_color4"></span><span class="donut_graph_text">Profit / Loss</span></div>
        </div>

      <!-- preloader Start-->
        <div class="overlay_div bodercss" id="part_pl_loader">
              <div class="cv-spinner_div">
                <span class="spinner_div"></span>
                <!-- <span class="loading">Awaiting Completion...</span> -->
              </div>
        </div>
      <!-- preloader end -->
      </div>
    </div>
  </div>




<!-- global filter modal mobile responsive -->
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
<!-- <div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
    <span class="loading">Awaiting Completion...</span>
  </div>
</div> -->
<!-- preloader end -->

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>

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
  $(document).ready(function(){
    // setTimeout(myFun, 500);
    myFun('toDate','fromDate');

  });
 
  /* temporary hdie for this function
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

  $(document).on('click','.overall_filter_btn',function(event){
    event.preventDefault();
    // setTimeout(myFun, 500);
    myFun('toDate','fromDate');
  }); 




  async function myFun(tclass,fclass){
    
    $("#machine_wise_loader").fadeIn(300);
    $("#overall_pl_loader").fadeIn(300);
    $("#part_pl_loader").fadeIn(300);
    $("#opp_drilldown_loader").fadeIn(300);
    $("#opp_trend_loader").fadeIn(300);

    f = $('.'+fclass).val(); 
    t = $('.'+tclass).val();

    if ((new Date(f) >= new Date(t)) || (t=="")) {
      var x = new Date(f)
      t = x.setHours(x.getHours() + 1);
      t= new Date(t);
      var tdate = t.getFullYear()+"-"+("0" + (parseInt(t.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + t.getDate()).slice(-2)+" "+("0" + t.getHours()).slice(-2)+":00:00";
      $('.'+tclass).val(tdate);
      t = $('.'+tclass).val();
    }

    var f_t = new Date(f);
    var t_t = new Date(t);
    var c_t = new Date();
    if (c_t.getFullYear()==f_t.getFullYear() && c_t.getMonth() == f_t.getMonth() && c_t.getDate()==f_t.getDate() && (f_t.getHours()+2) >= c_t.getHours()) {
      var k = f_t.setHours(c_t.getHours()-2);
      var y = f_t.setHours(c_t.getHours()-1);
      k = new Date(k);
      y = new Date(y);
      var fdate = k.getFullYear()+"-"+("0" + (parseInt(k.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + k.getDate()).slice(-2)+" "+("0" + k.getHours()).slice(-2)+":00:00";

      var tdate = k.getFullYear()+"-"+("0" + (parseInt(y.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + y.getDate()).slice(-2)+" "+("0" + y.getHours()).slice(-2)+":00:00";

      $('.'+fclass).val(fdate);
      $('.'+tclass).val(tdate);
      f = $('.'+fclass).val();
      t = $('.'+tclass).val();
    }

    await plopportunity(tclass,fclass);
    await machineplopportunity(tclass,fclass);
    await partplopportunity(tclass,fclass);
    await opportunityTrendDay(tclass,fclass);
    await opportunitydrilldown(tclass,fclass);

    // Pre-Loader Off
  }

  //overallTarget();
function overallTarget(){
    
    f = $('.fromDate').val();
    t = $('.toDate').val();
    
    f = f.replace(" ","T");
    t = t.replace(" ","T");
}

function plopportunity(tclass,fclass){
  return new Promise(function(resolve,reject){
      f = $('.'+fclass).val();
      t = $('.'+tclass).val();

      f = f.replace(" ","T");
      t = t.replace(" ","T");

      $.ajax({
        url: "<?php echo base_url('Financial_Metrics/plopportunity'); ?>",
        type: "POST",
        dataType: "json",
        // async:false,
        data:{
          from:f,
          to:t
        },
        success:function(res){      
          
          resolve(res);
          $('#chart').empty();
          $(".apexcharts-canvas").remove();
          
          
          // res=res["PLOpportunity"];
          var data = [];
          var operationData = [];
          var operationDuration = [];

          data.push(res['business']);
          data.push(res['operation']);

          operationData.push(res['planned']);
          operationData.push(res['unplanned']);
          operationData.push(res['performance']);
          operationData.push(res['quality']);

          operationDuration.push(res['plannedDuration']);
          operationDuration.push(res['unplannedDuration']);
          operationDuration.push(res['performanceDuration']);
          operationDuration.push(res['qualityDuration']);

          var options = {
            series: data,
            chart: {
              type: "donut",
              foreColor: '#B3D7FF',
            },
            colors: ["#B3D7FF", "#004A9B"],
            dataLabels: {
              enabled: true,
              style: {
                colors: ["#004A9B","#FFFFFF"],
                fontSize: '13px',
                fontFamily: 'Roboto, Arial, sans-serif',
              },
              background: {
                enabled: false,
              },
              dropShadow: {
                enabled: false,
                top: 1,
                left: 1,
                // blur: 1,
                color: '#000',
                // opacity: 0.45
              }
            }, 

            plotOptions: {
              pie: {
                startAngle: 0,
                expandOnClick: true,
                offsetX: 0,
                offsetY: 0,
                customScale: 1,
                dataLabels: {
                  offset: 0,
                  minAngleToShowLabel: 10,
                },
                donut: {
                  size: "63%",
                  background: "transparent",
                  labels: {
                    show: true,
                    name: {
                      show: true,
                      fontSize: "22px",
                      fontFamily: "Roboto, Arial, sans-serif",
                      fontWeight: 100,
                      color: "black",
                      offsetY: -10,
                    },
                    value: {
                      show: true,
                      fontSize: "20px",
                      fontFamily: "Roboto, Arial, sans-serif",
                      fontWeight: 5,
                      fontWeight: "bold",
                      color: "#005ABC",
                      offsetY: 2,
                    },
                    total: {
                      show: true,
                      showAlways: true,
                      label: "TOTAL",
                      fontSize: "12px",
                      fontFamily: "Roboto, Arial, sans-serif",
                      fontWeight: "bold",
                      color: "#BFBFBF",
                      formatter: function (w) {
                        try {
                          var a = parseFloat(w.globals.seriesTotals[0]) + w.globals.seriesTotals[1];
                        }
                        catch(err) {
                          var a = parseFloat(w.globals.seriesTotals[0]);
                        }
                        return ("₹"+parseInt(a).toLocaleString("en-IN"));
                      },
                    },
                  },
                },
              },
            },
            stroke: {
              width: 0,
              colors: ['#fff']
            },
            legend: {
              show: false,
              position:'bottom'
            }, 
            tooltip: {
              custom: function({series, seriesIndex, dataPointIndex, w}) {
                if (seriesIndex=="0") {
                  l="Business";
                  var v=res['businessDuration'];
                }
                else{
                  l="Operation";
                  var v=(parseFloat(res['plannedDuration'])+parseFloat(res['unplannedDuration'])+parseFloat(res['performanceDuration'])+parseFloat(res['qualityDuration']));
                }

                var days = parseInt(parseInt(v/60)/24);
                var hours = parseInt(parseInt(v-(days*1440))/60);
                var min = parseInt(parseInt(v-(days*1440))%60);
                return '<div class="global" style="border-radius:0;">'+
                  '<div class="grid-container">'+ 
                    '<div class="title-bold"><span>'+l+'</span></div>'+
                    '<div class="grid-item title-bold"><span></span></div>'+
                    '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>'+
                    '<div class="cost-value title-bold-value margin-top "><span class="values-op" >'+'<span style="padding-right:0.1rem;">₹</span>'+parseInt(series[seriesIndex]).toLocaleString("en-IN")+'</span></div>'+
                    '<div class="grid-item content-text"><span>Duration</span></div>'+
                    '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>'+
                  '</div>'+
                '</div>'
              }
            },
            states: {
              hover: {
                filter: {
                  type: "none",
                },
              },
            },
          };
    
          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();


          // pie chart customize by naveen
          var label_data = ["Planned Downtime","Unplanned Downtime","Performance","Quality"];
          // apex charts
          var options = {
            series: operationData,
            duration:operationDuration,
            chart: {
              width: 230,
              type: 'pie',
            },
            colors: [ "#005FC8", "#057CFF","#53A5FF", "#E7F2FF"],
            // colors: [ "#005FC8", "#057CFF","#53A5FF", "#B3D7FF"],
            dataLabels: {
              enabled: true,
              offsetX: 30,
              minAngleToShowLabel: 1,
              style: {
                colors: ["#FFFFFF","#FFFFFF","#FFFFFF","#057CFF"],
                fontSize: '13px',
                fontFamily: 'Roboto, Arial, sans-serif',
              },
              background: {
                enabled: false,
              },
              dropShadow: {
                enabled: false,
                top: 1,
                left: 1,
                // blur: 1,
                // color: '#000',
                // opacity:1
              },
            },
            states:{
              hover:{
                filter:{
                  type:"none",
                  value:0,
                },
              },
            },
            labels: label_data,
            responsive: [{
              breakpoint: 150,
              options: {
                chart: {
                  width: 100
                },
              }
            }],
            stroke: {
              width: 0,
              colors: ['#fff']
            },
            legend: {
              show: false,
            }, 
            tooltip: {
              custom: function({series, seriesIndex, dataPointIndex, w}) {
                var cost = series[seriesIndex];
                var duration = w.config.duration[seriesIndex];
                var title = w.config.labels[seriesIndex];
                var days = parseInt(parseInt(duration/60)/24);
                var hours = parseInt(parseInt(duration-(days*1440))/60);
                var min = parseInt(parseInt(duration-(days*1440))%60);
                return '<div class="global" style="border-radius:0;">'+
                  '<div class="grid-container">'+ 
                    '<div class="title-bold"><span>'+title+'</span></div>'+
                    '<div class="grid-item title-bold"><span></span></div>'+
                    '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>'+
                    '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<span style="padding-right:0.1rem;">₹</span>'+parseInt(cost).toLocaleString("en-IN")+'</span></div>'+
                    '<div class="grid-item content-text"><span>Duration</span></div>'+
                    '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>'+
                  '</div>'+
                '</div>'
              }
            }
          };
          var chart = new ApexCharts(document.getElementById("olichart"), options);
          chart.render();

          $("#overall_pl_loader").fadeOut(300);
        },
        error:function(res){
          reject(res);
          // alert("Sorry!Try Agian!!");
          $("#overall_pl_loader").fadeOut(300);
        }
      });
  });
     
}


function machineplopportunity(tclass,fclass) {

  return new Promise(function(resolve,reject){
    f = $('.'+fclass).val();
    t = $('.'+tclass).val();

    f = f.replace(" ","T");
    t = t.replace(" ","T");

    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/machineplopportunity'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
        $('#machineWiseInsights').remove();
        $('.child_graph_machine_wise_insig').append('<canvas id="machineWiseInsights"><canvas>');
        $('.chartjs-hidden-iframe').remove();
      
          var op = ['business','planned','unplanned','performance','quality'];
          var op_l = ['Business','Planned Downtime','Unplanned Downtime','Performance','Quality'];
          var machineName = [];
          
          res.machine.forEach(function(item){
            machineName.push(item);               
          });

          $('#PLTotal').html(res['grand_total'].toLocaleString("en-IN"));
          
          var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
          var x=0;
          var index = 0;
        
          var totalVal =[];
          var totalDuartion=[];
          res['total'].forEach(function(t){
              totalVal.push(t);
          });
          res['totalDuration'].forEach(function(t){
              totalDuartion.push(t);
          });

          machineWiseReject=[];
          res['rejects'].forEach(function(t){
              machineWiseReject.push(t);
          });

          //Find the duration for each reason in each Machine............
          oppCost = [
            {
              label:"Total" ,
              type: "line",
              backgroundColor: color[0],
              borderColor: "#d9d9ff",  
              borderWidth: 1, 
              showLine : false,
              fill: false, 
              data:totalVal,
              duration:totalDuartion,
              reject:machineWiseReject,
              pointRadius: 7,
            }           
          ];

          var x=1;
          var index=0;
          var category_percent = 1.0;
          var bar_space = 0.5;

          op.forEach(function(item){
              oppCost.push({
                label: op_l[index],
                type: "bar",
                backgroundColor: color[x],
                borderColor: color[x],
                borderWidth: 1,
                fill: true,
                data: res[item],
                duration:res[item+"Duration"],
                reject:machineWiseReject,
                categoryPercentage:category_percent,
                barPercentage: bar_space,
              });
              x=x+1;
              index=index+1;
          });

          while(true){
              var len= machineName.length;
              if (len < 8) {
                machineName.push("");
              }
              else if(len > 8){
                var l = parseInt(len)%parseInt(8);
                var w= parseInt($('.parent_graph_machine_wise_insig').css("width"))+parseInt(l*18*16);
                $('.child_graph_machine_wise_insig').css("width",w+"px");
                break;
              }
              else{
                break;
              }
              
            }

          var ctx = document.getElementById("machineWiseInsights").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
          data: {
              labels: machineName,
              datasets: oppCost,
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
                      stacked:true
                  },
              },
              plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                  enabled: false,
                  external: machinewiseplOpp,
                }
              },
            },
          });
          $("#machine_wise_loader").fadeOut(300);
      },
      error:function(res){
        reject(res);
          // alert("Sorry!Try Agian!!");
        $("#machine_wise_loader").fadeOut(300);
      }
    });
  });
  
}

function machinewiseplOpp(context) {  
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-machineWisePL');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-machineWisePL';
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

        var duration = parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].duration[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        var reject = (context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].reject[context.tooltip.dataPoints[0].dataIndex]);

        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';

        innerHtml += '<div class="grid-container">';
        innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';
        innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';

        innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
        innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';

        if ((context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label).toLowerCase() == "quality") {
          innerHtml += '<div class="grid-item content-text"><span># of Rejects</span></div>';
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+reject+'</span></div>';
        }
        else{
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


function partplopportunity(tclass,fclass){

  return new Promise(function(resolve,reject){
    f = $('.'+fclass).val();
    t = $('.'+tclass).val();
    
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    
    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/partplopportunity'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        resolve(res);
        $('#PartWiseInsights').remove();
        $('.child_graph_part_wise_pl').append('<canvas id="PartWiseInsights"><canvas>');
        $('.chartjs-hidden-iframe').remove();

          // res=res["PartWisePLOpportunity"];
        
          var production_Cost= [];
          var material_Cost=[];
          var profitLoss = [];
          var GTotal = 0;
          var partWiseLable = [];
          res['data'].forEach(function(item){
            material_Cost.push(parseFloat(item.Material_Cost));
            production_Cost.push(parseFloat(item.Production_Cost));
            profitLoss.push(parseFloat(item.Profit_Loss));
            GTotal = GTotal+parseInt(item.Material_Cost)+parseInt(item.Production_Cost)+parseInt(item.Profit_Loss);
            
          });
          res['part'].forEach(function(item){
            partWiseLable.push(item.Part_Name);
          });

          if (res['total']<0) {
            $('#GTotalPL').html("("+res['total'].toLocaleString("en-IN")+")");
            $('.valueGraph_Loss').css("color","#C00000");
          }else{
            $('#GTotalPL').html(res['total'].toLocaleString("en-IN"));
            $('.valueGraph_Loss').css("color","#004b9b"); 
          }
          
          
          // for (var i =0 ; i < res.part.length; i++) {
          //   partWiseLable.push(res.part[i].Part_Name);
          // }

          var category_percent = 1.0;
          var bar_space = 0.5;

          while(true){
            var len= partWiseLable.length;
            if (len < 8) {
              partWiseLable.push("");
            }
            else if(len > 8){
              var l = parseInt(len)%parseInt(8);
              var w= parseInt($('.parent_graph_part_wise_pl').css("width"))+parseInt(l*18*16);
              $('.child_graph_part_wise_pl').css("width",w+"px");
              break;
            }
            else{
              break;
            }  
          }

          var category_percent = 1.0;
          var bar_space = 0.5;
          
          var ctx = document.getElementById("PartWiseInsights").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: partWiseLable,
              // labels:['p1','p2'],
              datasets: [{
                  label:'Material Cost',
                  type:'bar',
                  backgroundColor:'#004A9B',
                  borderColor:'#004A9B',
                  borderWidth:1,
                  fill:true,
                  // yAxisID:"axis-bar",
                  data:material_Cost,
                  duration:5,
                  categoryPercentage:category_percent,
                  barPercentage: bar_space, 
              },{
                label: "Production Cost",
                type: "bar",
                backgroundColor: "#005FC8",
                borderColor: "#005FC8", 
                borderWidth: 1,
                fill: true,
                // yAxisID: "axis-bar",
                data: production_Cost,
                duration:5,
                categoryPercentage:category_percent,
                barPercentage: bar_space,
              },{
                label: "Profit/Loss",
                type: "bar",
                backgroundColor: "#CDE4FF",
                borderColor: "#CDE4FF",
                borderWidth: 1,
                fill: true,
                // yAxisID: "axis-bar",
                data: profitLoss,
                duration:5,
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
                      grid:{
                        drawBorder:false,
                        display:true,
                        color: (ctx) => (ctx.tick.value === 0 ? 'rgba(0, 0, 0, 0.1)' : 'transparent'),
                        lineWidth:2
                      },
                      ticks: {
                        display: false,
                      },
                      stacked:true,
                  },
                  x:{
                      display:true,
                      grid:{
                        display:false,
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
                  external: partWisePL,
                }
              },
            },
          
          });
          $("#part_pl_loader").fadeOut(300);
      },
      error:function(res){
        reject(res);
          // alert("Sorry!Try Agian!!");
        $("#part_pl_loader").fadeOut(300);
      }
    });
  });
  
}

function partWisePL(context) {  
    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-partWisePL');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-partWisePL';
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
        innerHtml += '<div class="content-text sub-title"><span>'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';

        innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
        innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true"></i>'+parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';
        
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



function opportunitydrilldown(tclass,fclass){
  return new Promise(function(resolve,reject){
    f = $('.'+fclass).val();
    t = $('.'+tclass).val();
    
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/opportunitydrilldown'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){ 

        resolve(res);
        $('#OpportunityDrillDownInsights').remove();
        $('.child_graph_opportunity_drill_down').append('<canvas id="OpportunityDrillDownInsights"><canvas>');
        $('.chartjs-hidden-iframe').remove();

        // res=res["OpportunityDrillDown"];
        var GTotal=0;
        var reasonPer = [];
        var reasonPerLabel = res.Reason;
        res.Total.forEach(function(item){
          reasonPer.push(item.toFixed(2));
          GTotal=GTotal+item;
        });
        $('#GTotalDrillDown').html(parseInt(GTotal).toLocaleString("en-IN"));

        var category_percent = 1.0;
        var bar_space = 0.5;

        while(true){
          var len= reasonPerLabel.length;
          if (len < 8) {
            reasonPerLabel.push("");
          }
          else if(len > 8){
            var l = parseInt(len)%parseInt(8);
            var w= parseInt($('.parent_graph_opportunity_dirll_down').css("width"))+parseInt(l*18*16);
            $('.child_graph_opportunity_drill_down').css("width",w+"px");
            break;
          }
          else{
            var w= parseInt($('.parent_graph_opportunity_dirll_down').css("width"));
            $('.child_graph_opportunity_drill_down').css("width",w+"px");
            break;
          }  
        }
          
        var ctx = document.getElementById("OpportunityDrillDownInsights").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: reasonPerLabel,
            datasets: [{
                label:'Performance',
                type:'bar',
                backgroundColor:'#004b9b',
                borderColor:'#004b9b',
                borderWidth:1,
                fill:true,
                data:reasonPer,
                duration:res['Duration'],
                value_type:res['Type'],
                categoryPercentage:1.0,
                barPercentage: 0.5,
            }],
        },
          options: {
            responsive: true,
            maintainAspectRatio: false,   
            scales: {
                y: {
                    display:false,
                    beginAtZero:true,
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
                external: drillDownOpp,
              }
            },
          },
        
        });
        $("#opp_drilldown_loader").fadeOut(300);
      },
      error:function(res){
        reject(res);
        // alert("Sorry!Try Agian!!");
        $("#opp_drilldown_loader").fadeOut(300);
      }
    });
  });
  
}

function drillDownOpp(context) {  

    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-drillDown');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-drillDown';
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
        var duration = parseFloat(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].duration[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);

        var valueCategory =context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].value_type[context.tooltip.dataPoints[0].dataIndex];

        var lableType = valueCategory == "Quality" ? "# of Rejects" : "Duration";

        var lableName = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label;

        lableName = valueCategory == "Quality" ? "" : lableName;

        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        let innerHtml = '<div>';
        
        innerHtml += '<div class="grid-container">';
        innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';
        innerHtml += '<div class="content-text sub-title"><span>'+lableName+'</span></div>';
        innerHtml += '<div class="grid-item title-bold"><span></span></div>';

        innerHtml += '<div class="grid-item content-text margin-top"><span>Opportunity Cost</span></div>';
        innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+'<i class="fa fa-inr inr-class" aria-hidden="true" style="font-size:0.9rem;"></i>'+parseInt(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex]).toLocaleString("en-IN")+'</span></div>';

        innerHtml += '<div class="grid-item content-text"><span>'+lableType+'</span></div>';

        if (valueCategory != "Quality") {
          if (days>0) {
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+days+"d"+" "+hours+"h"+" "+min+"m"+'</span></div>';
          }
          else{
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+hours+"h"+" "+min+"m"+'</span></div>';
          }
        }else{
          innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+parseInt(duration)+'</span></div>';
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

function opportunityTrendDay(tclass,fclass){
  return new Promise(function(resolve,reject){
    f = $('.'+fclass).val();
    t = $('.'+tclass).val();
    
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    $.ajax({
      url: "<?php echo base_url('Financial_Metrics/opportunityTrendDay'); ?>",
      type: "POST",
      dataType: "json",
      // async:false,
      data:{
        from:f,
        to:t
      },
      success:function(res){
        // res=res["OpportunityPLTrend"];
        // res['data'].forEach(function(item){
        //   alert(item['total']);
        // });
        resolve(res);
        $('#OpportunityTrendInsights').remove();
        $('.child_graph_opportunity_trend_insights').append('<canvas id="OpportunityTrendInsights"><canvas>');
        $('.chartjs-hidden-iframe').remove();

        $("#GTotalTrend").html(res['grand_total'].toLocaleString("en-IN"));

          var op = ['business','planned','unplanned','performance','quality'];
          var op_l = ['Business','Planned Downtime','Unplanned Downtime','Performance','Quality'];
          var dayLables = [];
    
          res['data'].forEach(function(item){
            dayLables.push(item['date']);               
          });

          var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
          var x=0;
          var index = 0;
        
          var totalVal =[];
          res['data'].forEach(function(t){
              totalVal.push(t['total']);
          });

          var durationTotal=[];
          res['data'].forEach(function(t){
              durationTotal.push(t['totalDuration']);
          });

          // alert(totalVal);
          //Find the duration for each reason in each Machine............
          oppCost = [
            {
              label:"Total" ,
              type: "line",
              backgroundColor: color[0],
              borderColor: "#7f7f7f", 
              pointBorderColor: "#d9d9ff",  
              borderWidth: 1, 
              showLine : true,
              fill: false,
              lineColor:"black",
              data:totalVal,
              duration:durationTotal,
              pointRadius: 7,
            }           
          ];

          // alert(oppCost);

          var x=1;
          var index=0;

          var bar_width = 0.9;
          var bar_size = 0.7;

          op.forEach(function(item){
              var d = [];
              var durations=[];
              res['data'].forEach(function(v){
                d.push(v[item]);
                durations.push(v[item+"Duration"]);
              })
              oppCost.push({
                label: op_l[index],
                // label: "x",
                type: "bar",
                backgroundColor: color[x],
                borderColor: color[x],
                borderWidth: 1,
                fill: true,
                data: d,
                duration:durations,
                categoryPercentage:bar_width,
                barPercentage: bar_size,
              });
              x=x+1;
              index=index+1;
          });

          while(true){
            var len= dayLables.length;
            if (len < 15) {
              dayLables.push("");
            }
            else if(len > 15){
              var l = parseInt(len)%parseInt(8);
              // alert($('.parent_graph_opportunity_trend_insights').css("width"));
              var w= parseInt($('.parent_graph_opportunity_trend_insights').css("width"))+parseInt(l*4*16);
              $('.child_graph_opportunity_trend_insights').css("width",w+"px");
              // alert($('.child_graph_opportunity_trend_insights').css("width"));
              break;
            }
            else{
              break;
            }  
          }
          
        var ctx = document.getElementById("OpportunityTrendInsights").getContext('2d');
        var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: dayLables,
            datasets: oppCost,
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
                        var tmp_val = parseInt(value)/1000;
                        if (parseInt(tmp_val)>0) {
                          return "₹"+tmp_val+"k";
                        }else{
                          return "₹"+value;
                        }
                        
                      }
                    }
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
                borderColor:"red",
                external: plTrendOpp,
              }
            },
          },
        });
        $("#opp_trend_loader").fadeOut(300);
      },
      error:function(res){
        reject(res);
          // alert("Sorry!Try Agian!!");
        $("#opp_trend_loader").fadeOut(300);
      }
    });
  });
  
}
function plTrendOpp(context) {  

    // Tooltip Element
    let tooltipEl = document.getElementById('tooltip-plTreand');

    // Create element on first render
    if (!tooltipEl) {
        tooltipEl = document.createElement('div');
        tooltipEl.id = 'tooltip-plTreand';
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

        var duration = parseFloat(context.chart.config._config.data.datasets[0].duration[context.tooltip.dataPoints[0].dataIndex]).toFixed(1);
        var days = parseInt(parseFloat(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        let innerHtml = '<div>';
        
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


// global filter mobile responsive

// mobile responsive global filter icon click function
$(document).on('click','.global_filter_btn',function(){
  $('#filter_ftdate_responsive').modal('show');
});

// mobile responsive global filter button onclick function
$(document).on('click','.overall_filter_btn_resp',function(){
  $('#filter_ftdate_responsive').modal('hide');
  myFun('tdate_rs','fdate_rs');
});

</script>

