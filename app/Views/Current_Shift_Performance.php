<head>  
  <!-- oui current shift performance adding -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/oui_current_shift_performance.css?version=<?php echo rand(); ?>">  
  <!-- <script src="<?php echo base_url(); ?>/assets/apexchart/dist/apexcharts.js"></script> -->
  <!-- oui current shift performance end -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/current_shift_performance.css?version=<?php echo rand() ; ?>">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/financial_metrics.css?version=<?php echo rand() ; ?>">

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/all-fontawesome.css?version=<?php echo rand() ; ?>">
    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chartjs-plugin-datalabels.min.js?version=<?php echo rand() ; ?>"></script>

</head>
<div style="margin-left: 4.5rem;">
  <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav_quality" style="z-index: 1001!important">
    <div class="container-fluid paddingm" style="margin-top:0.2rem;">
      <div class="header_text_nav">
        <div class="oui_arrow_div">
          <div class="dotAccessArrow dot-css acsControl marleftDot " style="margin-right:0.7rem;margin-left:0.4rem;">
            <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont" style="height: 26px;transform: rotate(180deg);">
          </div>
        </div>
        <p class="float-start p3" id="logo" style="margin-left:0.1rem;">Current Shift Performance</p>
      </div>
      
      <div class="d-flex" style="display: flex;align-items: center;">
              <div class="box CurrentNav rightmar alignCenter visibility_div">
                  <div class="input-box paddingm">
                      <select class="form-select font-items" name="" id="Filter-values" style="width: 10rem;">
                        <option value="0">Machine Rank Order</option>
                        <option value="1">OEE Low to High</option>
                        <option value="2">Part Completion High to Low</option>
                        <option value="3">Machine Status High to Low Critical</option>
                      </select>
                      <label for="inputSiteNameAdd" class="input-padding titleTag">Sort</label>
                  </div>
              </div>
              <div class="CurrentNav visibility_div">
                <div class="dotAccessArrow dot-css acsControl marleftDot">
                    <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont" style="height: 26px;transform: rotate(180deg);">
                </div>
              </div>
              <div class="CurrentNav">
                <p class="paddingm titleTag">Shift Date</p>
                <p class="paddingm font-items" id="shift_date"></p>
                <input type="text" id="s_date_ref" style="display: none;">
              </div>
              <div class="CurrentNav">
                <p class="paddingm titleTag">Shift</p>
                <p class="paddingm font-items" id="shift_id"></p>
                <input type="text" id="s_id_ref" style="display: none;">
              </div>
              <div class="">
                <p class="paddingm titleTag">Start</p>
                <p class="paddingm font-items" id="start_time"></p>
                <input type="text" id="s_time_val" style="display: none;">
              </div>
              <div class="dot-cnt">
                <div class="dotAccessCurrent">
                    <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont" style="height: 18px;">
                </div>
              </div>
              <div class="CurrentNav">
                <p class="paddingm titleTag">End</p>
                <p class="paddingm font-items" id="end_time"></p>
                <input type="text" id="e_time_val" style="display: none;">
              </div>
      </div>
    </div>
  </nav>

  <div class="graph-content" style="margin-top:3.8rem;">
    <div style="display:flex;flex-direction:row-reverse;margin-bottom:0.4rem;">
      <div style="width:max-content;">
        <i class="fa-solid fa-expand" onclick="fullscreen_mode()"></i>
      </div>
    </div>
    <div class="grid-container-cont" id="full_screen_cards">
      <!-- Machine Tiles -->
    </div>
  </div>

  <!-- oui screen start -->
  <!-- oui screen -->
  <div class="oui_screen_view" style="display:none;">
    <div class="oui_header_div" style="">
        <div class="oui_sub_header" style="">
            <div class="sub_header_first_row" style="">
              <span class="first_row_header" id="machine_name_text" style=""></span>
              <span class="first_row_body" style="" id="part_name_header"></span>
            </div>
            <div class="sub_header_second_row" style="">
              <p>DOWNTIME <br> <span class="downtime_second_val" style="">04:02</span></p>
              
            </div>
            <div class="sub_header_third_row" style="">
              <span id="machine_status"></span>
            </div>
        </div>

        <div class="first_row_div" style="">
          <div class="goal_div" style="">
              <div class="goals_div line_color_border" >
                <p class="label_header label_text_color" >GOALS</p>
                <div class="goal_height_div" style="">
                  <div style="width:60%;">
                      <!-- circle graph start -->
                      <div class="item-circle_oui">
                        <!-- Circular Graph -->
                        <div class="inner-circle_oui">
                          <div class="inner-val_oui">
                            <p class="paddingm production_completion_oui"><span id="production_per_oui"></span>%</p>
                            <p class="paddingm production_completion_oui partname_ref_oui" id="part_name_circle">Part Name 1</p>
                          </div>
                        </div>
                        <svg version="1.1" class="svg_oui">
                          <defs>
                              <linearGradient id="GradientColor_oui">
                                  <stop stop-color="#C55A11" />
                              </linearGradient>
                          </defs>
                          <circle class="circle_oui_anim" cx="120" cy="120" r="63" stroke-linecap="round"/>
                        </svg>
                      </div>
                      <!-- circle graph end -->
                  </div>
                  <div style="width:38%;">
                    <div class="target_graph_div" style="">
                      <span>Target <span id="target_value">320</span></span>
                      <div class="target_graph_parent_div" style="">
                        <div class="target_graph_child_div" style="">
                          <span id="target_value_inner" style="">12</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="goals_div_text" style="">
                    <div class="circle_graph_text" style="">
                      <i class="fa-solid fa-clock-rotate-left" style="margin-right:1rem;"></i><span>112min</span>
                    </div>
                    <div class="target_graph_text" style="">
                      <i class="fa-solid fa-circle" style="margin-right:0.4rem;font-size:0.5rem;"></i><span style="">31 Jan 23,02:02 PM</span>
                    </div>
                </div>
              </div>
          </div>
          <div class="timeline_part">
            <div class="timeline_div line_color_border" style="">
              <p class="label_header label_text_color" style="">TIMELINE</p>
              <div id="downtime_chart" style="padding:0;margin:0;margin-left:1rem;margin-right:1rem"></div>
              <!-- downtime legend -->
              <div class="downtime_legend" style="margin-top:1rem;">
                
                <div class="legend_label" style="">
                  <div style="width:20%;">
                    <div class="label_div" style="background-color:#01BB55;"></div>
                  </div>
                  <div class="label_text" style="">
                    <span>ACTIVE</span>
                  </div>
                </div>

                <div class="legend_label" >
                  <div style="width:20%;">
                    <div class="label_div" style="background-color:#005ABC;"></div>
                  </div>
                  <div class="label_text" >
                    <span>INACTIVE</span>
                  </div>
                </div>

                <div class="legend_label" style="width:20%;">
                  <div style="width:20%;">
                    <div class="label_div" style="background-color:#595959;"></div>
                  </div>
                  <div class="label_text" >
                    <span>MACHINE OFF</span>
                  </div>
                </div>

              </div>

            </div>
            <div class="part_div line_color_border" style="">
              <p class="label_header label_text_color" >PART WISE BY HOURS</p>
              <div class="parent_part_oui part_wise_alignment parent_div marginScroll">
                <div class="child_div child_part_oui">
                  <canvas id="part_wise_graph_oui" class="part_wise_graph_oui_align" style="height:100%;width:100%;"></canvas>    
                </div>
              </div>
                <!-- <canvas id="part_wise_graph" style="height:10rem;width:10rem;"></canvas> -->
            </div>
          </div>
        </div>

        <!-- cards -->
        <div class="cards_div" style="">
          <div class="cards_div_left" style="">
            
            <div class="card_small_div" style="">
              <span class="card_header" style="">Downtime</span>
              <span class="card_body" style="" id="downtime_val"></span>
            </div>

            <div class="card_small_div" >
              <span class="card_header">Cycle Time</span>
              <span class="card_body" id="nict_val"></span>
            </div>


            <div class="card_small_div" >
              <span class="card_header" >Rejects Counts</span>
              <span class="card_body" id="reject_count"></span>
            </div>


          </div>
          <div style="width:48%;">
            <div class="efficiency_div line_color_border">
              <p class="label_header label_text_color" >EFFICIENCY</p>
              <div class="hide_card" style="">
                
                <div class="hide_card_div" style="">
                  <span class="hide_card_header" style="">Availability</span>
                  <span class="hide_card_body" style=""><span id="availability_val" class="value_text"></span> %</span>
                </div>

                <div class="hide_card_div">
                  <span class="hide_card_header">Performance</span>
                  <span  class="hide_card_body" ><span id="performance_val" class="value_text"></span> %</span>
                </div>


                <div class="hide_card_div">
                  <span class="hide_card_header">Quality</span>
                  <span class="hide_card_body"><span id="quality_val" class="value_text"></span> %</span>
                </div>

                <div class="shift_oee_div" style="">
                  <span class="shift_oee_header" style="">SHIFT OEE</span>
                  <span class="shift_oee_body" style=""><span id="oee_val" class="value_text"></span> %</span>
                </div>


              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
  <!-- oui screen end -->
</div>

<!-- preloader -->
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
    <span class="loading">Awaiting Completion...</span>
  </div>
</div>
<!-- preloader end -->

<script src="<?php echo base_url(); ?>/assets/apexchart/dist/apexcharts.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/all-fontawesome.js?version=<?php echo rand() ; ?>"></script>

<script type="text/javascript">
  var myChart = "";
  var myChartList=[];
  var i="";
  $('.oui_arrow_div').css('display','none');
  $('.visibility_div').css('display','inline');
  var j="";
getMachineDataLive();
function getMachineDataLive() {
  $.ajax({
    url: "<?php echo base_url('Current_Shift_Performance/getLive'); ?>",
    type: "POST",
    dataType: "json",
    cache: false,
    async: false,
    contentType: "application/json; charset=utf-8",
    success:function(res){
      var date = new Date(res[0]['shift_date'])
      date = date.getDate()+" "+date.toLocaleString([], { month: 'short' })+" "+date.getFullYear();

      $("#shift_date").html(date);
      $("#shift_id").html("Shift "+res[0]['shift_id']);
      var s_time = res[0]['start_time'].split(":");
      var e_time = res[0]['end_time'].split(":");
      $("#start_time").html(s_time[0]+":"+s_time[1]);
      $("#end_time").html(e_time[0]+":"+e_time[1]);

      $("#s_time_val").val(s_time[0]+":"+s_time[1]+":"+s_time[2]);
      $("#e_time_val").val(e_time[0]+":"+e_time[1]+":"+s_time[2]);

      $("#s_date_ref").val(res[0]['shift_date']);
      $("#s_id_ref").val(res[0]['shift_id']);

      getLiveMode(res[0]['shift_date'],res[0]['shift_id']);     
    },
    error:function(res){
      // Error Occured!
    }
  });
}

function getLiveMode(shift_date,shift_id){
  // var x = $('#Filter-values').val();
  $.ajax({
    url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
    type: "POST",
    dataType: "json",
    cache: false,
    async: false,
    data:{
      shift_date:shift_date,
      shift_id:shift_id,
      // filter:x,
    },
    success:function(res){
      $('.grid-container-cont').empty();
      res['latest_event'].forEach(function(machine){
        var machine_name = "";
        var production_total = 0;
        res['machine_name'].forEach(function(m){
          if(m['machine_id'] == machine[0]['machine_id']){
            machine_name = m['machine_name'];
          }
        });

        res['production_total'].forEach(function(m){
          if (m['machine_id'] == machine[0]['machine_id']) {
            production_total = m['total'];
          }
        });

        var elements = $();
        elements = elements.add('<div class="grid-item-cont">'
          +'<div class="item-header" id="item-header-'+machine[0]['machine_id']+'">'
              +'<div>'
              +'<p class="paddingm pad-top cen-align fnt-color machine_name_ref" mid_data="'+machine[0]['machine_id']+'"  id="Machine_name_'+machine[0]['machine_id']+'" title="'+machine_name+'">'+machine_name+'</p>'
              +'<p class="paddingm cen-align fnt-color current_event" id="latest_status_'+machine[0]['machine_id']+'"></p>'
              +'</div>'
          +'</div>'
          +'<div class="item-circle">'
            +'<div class="inner-circle">'
              +'<div class="inner-val">'
                +'<p class="paddingm production_completion production_completion_ref"><span id="production_per'+machine[0]['machine_id']+'"></span>%</p>'
                +'<p class="paddingm production_completion partname_ref" id="partname_'+machine[0]['machine_id']+'">Part Name</p>'
              +'</div>'
            +'</div>'
            +'<svg version="1.1" class="svg">'
              +'<defs>'
                  +'<linearGradient id="GradientColor_'+machine[0]['machine_id']+'">'
                      +'<stop id="circle_graph_colors_'+machine[0]['machine_id']+'" stop-color="#d10527" />'
                  +'</linearGradient>'
              +'</defs>'
              +'<circle class="circle" id="'+machine[0]['machine_id']+'" cx="120" cy="120" r="63" stroke-linecap="round"/>'
              +'<div class="part_completion">'
                +'<p class="paddingm">Part Completion</p>'
              +'</div>'
            +'</svg>'
          +'</div>'
          +'<div class="item-oee hoverCardOEECurrent" style="margin: 0.5rem;">'
            +'<div style="width: 15%;display: flex;justify-content: flex-end;"><p class="paddingm oee-lable">OEE</p></div>'
            +'<div class="FLayer">'
              +'<div class="BLayer" id="Target_'+machine[0]['machine_id']+'"></div>'
              +'<div class="SLayer" id="SLayer_'+machine[0]['machine_id']+'"></div>'
              +'<div  class="TLayer TTotal" id="TTotal_'+machine[0]['machine_id']+'">'
                +'<p class="values_oee paddingm val" id="SLayer_val_Color_'+machine[0]['machine_id']+'"><span id="SLayer_val_'+machine[0]['machine_id']+'"></span>%</p>'
              +'</div>'
            +'</div>'
          +'</div>'

          +'<div class="hoverOverallOEE_Current hoverOverall_current">'
            +'<div style="display: flex;">'
              +'<div style="width: 70%" id="title_overall">OEE%</div>'
              +'<div style="width: 30%" class="val_color" ><p class="paddingm teepVal" style="width:max-content;" id="OEE_'+machine[0]['machine_id']+'">0%</p></div>'
            +'</div>'
            +'<div style="display: flex;">'
              +'<div style="width: 70%">Target</div>'
              +'<div style="width: 30%"><p class="paddingm teepTarget" id="OEETarget_'+machine[0]['machine_id']+'">0%</p></div>'
            +'</div>'
          +'</div>'


          +'<div class="item-production">'
            +'<div class="item-production-s" id="item_production_s_'+machine[0]['machine_id']+'"></div>'
            +'<div class="graph-content-div">'
              +'<canvas id="production-graph-'+machine[0]['machine_id']+'" style=""></canvas>'
            +'</div>'  
          +'</div>'
        +'</div>');
        $('.grid-container-cont').append(elements);

        // OEE Target....
        $('#Target_'+machine[0]['machine_id']+'').css("width",parseInt(res['targets'][0].oee)+"%");

        // OEE Percentage......
        $('#SLayer_'+machine[0]['machine_id']+'').css("width",parseInt(res['oee'][0].OEE)+"%");
        
        $('#SLayer_val_'+machine[0]['machine_id']+'').html(parseInt(0));
          
        // Latest Status........
        $('#latest_status_'+machine[0]['machine_id']+'').html(res['latest_event'][0][0].duration+"m "+res['latest_event'][0][0].event);

        // Production Percentage.......
        var target_production=5000;
        var production_percent = parseInt((production_total/target_production)*100);
        var production_percent_val =470-(4.7*production_percent);
        const MyFSC_container = document.getElementsByClassName("circle");
        MyFSC_container[0].style.setProperty("--foo", production_percent_val);

        // Production Percentage......
        $('#production_per'+machine[0]['machine_id']+'').html(production_percent);


        // Graph Portion
        var hourly = [];
        var hourList = [];
        var production_target = [];
        var part_name_list=[];
        var rejections_list =[];
        res['data'].forEach(function(items){
          if(items['machine'] == machine[0]['machine_id']){
            items['production'].forEach(function(i){
              hourly.push(i['production']);
              hourList.push(i['start_time']+" to "+i['end_time']);
              part_name_list.push(i['part_name']);
              rejections_list.push(i['rejections']);
            });
            items['targets'].forEach(function(i){
              production_target.push(i);
            });
          }
        });

        ChartDataLabels.defaults.color = "#ffffff";
        // ChartDataLabels.defaults.font.size=8;
        ChartDataLabels.defaults.font.family = "Roboto, sans-serif";
        
        var ctx = document.getElementById('production-graph-'+machine[0]['machine_id']+'').getContext('2d');
        myChartList[myChartList.length] = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: hourList,
            datasets: [
              {
                label: "Production",
                type: "bar",
                backgroundColor: "white",
                borderColor: "rgba(0, 0, 0, 0)", 
                borderWidth: 1,
                fill: true,
                data: hourly,
                part_name:part_name_list,
                rejections:rejections_list,
                categoryPercentage:1.0,
                barPercentage: 1.0, 
              },
              {
                label: "Production Target",
                type: "line",
                backgroundColor: "#7f7f7f",
                borderColor: "#00000", 
                borderWidth: 1,
                fill: false,
                data: production_target,
                part_name:part_name_list,
                pointRadius: 0,
                stepped: 'before',
              },
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
                display:false,
                grid:{
                  display:false
                },
                stacked:true,
            },
          },
          plugins: {
            datalabels:{
              anchor:"end",
              align:"end",
              offset:-16,
              color:"white",
              font:{
                size:8,
              },
              formatter: (value,context) => context.datasetIndex === 0 ? value : '',
              
            },
            legend: {
              display: false,
              labels: {
                    // This more specific font property overrides the global property
                    font: {
                        size: 9
                    }
                }
            },
            tooltip: {
              enabled: false,
              external: productionTooltip,
            },
          },
        
        },
      plugins: [ChartDataLabels],
    });

    });
      // console.log(ChartDataLabels.defaults.color:"#32a852");
    live_graph(shift_date,shift_id);
    live_target(shift_date);
    },
    error:function(res){
      // Error Occured!
    }
  });
}

$(".circle").mouseover(function(){
  var count = $('.circle');
  var index_val = count.index($(this));
  $('.part_completion:eq('+index_val+')').css("display","block");
});
$(".circle").mouseout(function(){
  var count = $('.circle');
  var index_val = count.index($(this));
  $('.part_completion:eq('+index_val+')').css("display","none");
});

$(document).on("mousemove",".circle",function(e){ 
  var relX = event.pageX - $(this).offset().left-10;
  var relY = event.pageY - $(this).offset().top -50;
  var relBoxCoords = "(" + relX + "," + relY + ")";
  var count = $('.circle');
  var index_val = count.index($(this));
  $('.part_completion:eq('+index_val+')').css("transform","translate3d("+relX+"px,"+relY+"px,0px)");
});

function live_target_update(shift_date){
    // $('#item_production_s_'+machine[0]['machine_id']+'').css("background-color",state_color_rgb);
    var s_time= $("#s_time_val").val();
    var e_time= $("#e_time_val").val();

    var st_time = new Date(shift_date+" "+s_time);
    var et_time = new Date(shift_date+" "+e_time);

    s_time = new Date(shift_date+" "+s_time);
    e_time = new Date(shift_date+" "+e_time);
    var temp = new Date(shift_date+" "+s_time);

    while(true){
      st_time = new Date(st_time.setTime(st_time.getTime()+(60*1000)));
      if (st_time.getHours() == et_time.getHours() && st_time.getMinutes() == et_time.getMinutes()) {
        break;
      }
    }

    var difference = (new Date(st_time).getTime() - new Date(s_time).getTime())/1000;

    var st1_time = s_time;
    var et1_time = new Date();

    while(true){
      st1_time = new Date(st1_time.setTime(st1_time.getTime()+(1000)));
      if (st1_time.getHours() == et1_time.getHours() && st1_time.getMinutes() == et1_time.getMinutes() && st1_time.getSeconds() == et1_time.getSeconds()) {
        break;
      }
    }

    var temp_time = new Date(shift_date+" "+($("#s_time_val").val()));
    var difference_current = (new Date(st1_time).getTime() - new Date(temp_time).getTime())/1000;

    var w = parseFloat((difference_current/difference)*100).toFixed(2);
    $('.item-production-s').css("width",String(w)+"%");
    
}

function productionTooltip(context) {
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

        // console.log(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex]);

        // console.log(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex]);

        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';
          
          innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
          innerHtml += '<div class="cost-value title-bold-value"><span></span></div>';

          if (context.tooltip.dataPoints[0].datasetIndex == 0) {
            innerHtml += '<div class="grid-item content-text margin-top"><span>'+context.tooltip.dataPoints[0].dataset.label+'</span></div>';
            innerHtml += '<div class="grid-item content-text-val margin-top"><span class="values-op">'+(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex])+'</span></div>';
            innerHtml += '<div class="grid-item content-text"><span>Part Name</span></div>';
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].part_name[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';

            if (context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].rejections[context.tooltip.dataPoints[0].dataIndex] == null) {
              var r = 0;
            }else{
              var r = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].rejections[context.tooltip.dataPoints[0].dataIndex];
            }

            innerHtml += '<div class="grid-item content-text"><span>Rejections</span></div>';
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+r+'</span></div>';
          }else{
            innerHtml += '<div class="grid-item content-text margin-top"><span>'+context.tooltip.dataPoints[0].dataset.label+'</span></div>';
            innerHtml += '<div class="grid-item content-text-val margin-top"><span class="values-op">'+(context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[0].dataIndex])+'</span></div>';

            innerHtml += '<div class="grid-item content-text"><span>Part Name</span></div>';
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">'+context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].part_name[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
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

  a = 470;
  b =0;
  c=0;
  var shift_date="";
  var shift_id="";
  function live_graph(s_date,s_id){
     i = setInterval(function() { live_MC1001(s_date,s_id); }, 2000);
  }

  function live_target(s_date){
     j = setInterval(function() { live_target_update(s_date); }, 1000);
  }

  $('#Filter-values').on('change', function(event) {
    var option = $('#Filter-values').val();
    var x = $('.values_oee');
    var len = x.length;
    var arr=[];
    var val=[];
    if (option == 1) { //Soritng based on OEE
      for (var i = 0; i < len; i++) {
        arr.push(i);
        val.push(parseInt($('.values_oee:eq('+i+')').children('span').html()));
      }
      for (var i = 0; i < len-1; i++) {
        var min=i;
        for (var j = i+1; j<len; j++) {
          if (val[j] < val[i]) {
            min=j;
          }
        }

        var temp = val[i];
        val[i] = val[min];
        val[min]=temp;

        var temp_elem = $('.grid-item-cont:eq('+i+')');
        var elem = $('.grid-item-cont:eq('+min+')');
        elem.insertBefore($('.grid-item-cont:eq('+i+')')).fadeIn(3000); 
        temp_elem.insertAfter($('.grid-item-cont:eq('+(min)+')')).fadeIn(3000)
      }
    }else if (option == 2){
      for (var i = 0; i < len; i++) {
        arr.push(i);
        val.push(parseInt($('.production_completion_ref:eq('+i+')').children('span').html()));
      }
      for (var i = 0; i < len-1; i++) {
        var min=i;
        for (var j = i+1; j<len; j++) {
          if (val[j] > val[i]) {
            min=j;
          }
        }

        var temp = val[i];
        val[i] = val[min];
        val[min]=temp;

        var temp_elem = $('.grid-item-cont:eq('+i+')');
        var elem = $('.grid-item-cont:eq('+min+')');
        elem.insertBefore($('.grid-item-cont:eq('+i+')')).fadeIn(3000); 
        temp_elem.insertAfter($('.grid-item-cont:eq('+(min)+')')).fadeIn(3000)
      }
    }else if (option == 0) {
      for (var i = 0; i < len; i++) {
        arr.push(i);
        var ref = $('.production_completion_ref:eq('+i+')').children('span').attr("id");
        ref = ref.split("_per");
        val.push(ref[1]);
      }
      for (var i = 0; i < len-1; i++) {
        var min=i;
        for (var j = i+1; j<len; j++) {
          var tempx = val[j].split("C");
          var tempy = val[i].split("C");
          if ((parseInt(tempx[1])-1000) < (parseInt(tempy[1])-1000)) {
            min=j;
          }
        }

        var temp = val[i];
        val[i] = val[min];
        val[min]=temp;

        var temp_elem = $('.grid-item-cont:eq('+i+')');
        var elem = $('.grid-item-cont:eq('+min+')');
        elem.insertBefore($('.grid-item-cont:eq('+i+')')).fadeIn(3000); 
        temp_elem.insertAfter($('.grid-item-cont:eq('+(min)+')')).fadeIn(3000)
      }
    }
  });
  
  function live_MC1001(shift_date,shift_id) {
    // var x = $('#Filter-values').val();
    $.ajax({
      url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
      type: "POST",
      dataType: "json",
      cache: false,
      async: false,
      data:{
        shift_date:shift_date,
        shift_id:shift_id,
        // filter:x,
      },
      success:function(res){
        var n=0;
        res['latest_event'].forEach(function(machine){
          
            var machine_name = "";
            var production_total = 0;
            var color="";
            var event="";
            var duration =0;
            var partList = "";
            var val_color="";
            res['machine_name'].forEach(function(m){
              if(m['machine_id'] == machine[0]['machine_id']){
                machine_name = m['machine_name'];
                event = machine[0]['event'];
                duration = machine[0]['duration'];
                partList = machine[0]['part_id'];
              }
            });

            var partListArr = partList.split(",");
            var partname="";
            partListArr.forEach(function(p){
              res['part_list'].forEach(function(pl){
                if (p==pl['part_id']) {
                  if (partListArr.length>1) {
                    partname = partname+pl['part_name']+",";
                  }else{
                    partname = pl['part_name'];
                  }
                }
              });
            });

            if (partListArr.length>1) {
              partname = partname.substring(0,partname.length-1);
            }

            // Update Part Name 
            $('#partname_'+machine[0]['machine_id']+'').html(partname);

            // Update Machine Name
            $('#Machine_name_'+machine[0]['machine_id']+'').html(machine_name);
            var time = duration.split(".");
            // Update Machine Current Status
            if(time.length > 1){
              var h = parseInt(time[0]/60);
              var m = time[0]%60;
              if (h>0) {
                $('#latest_status_'+machine[0]['machine_id']+'').html(h+"h "+m+"m "+time[1]+"s "+event);
              }else{
                $('#latest_status_'+machine[0]['machine_id']+'').html(time[0]+"m "+time[1]+"s "+event);
              }
            }else{
              if(time[0]>0){
                $('#latest_status_'+machine[0]['machine_id']+'').html(time[0]+"m "+event);
              }else{
                $('#latest_status_'+machine[0]['machine_id']+'').html(time[0]+"s "+event);
              }
            }

            res['production_total'].forEach(function(m){
              if (m['machine_id'] == machine[0]['machine_id']) {
                production_total = m['total'];
              }
            });

            res['oee'].forEach(function(m){
              if (m['Machine_Id'] == machine[0]['machine_id']) {
                // Current OEE Status Update.....
                if (res['targets'][0].yellow > m['OEE']) {
                  color="#dc062a";
                  val_color ="white";
                }
                else if(res['targets'][0].green > m['OEE']){
                  color="#ffbf00";
                  val_color ="black";
                }
                else{
                  color="#00b04f";
                  val_color ="white";
                }

                // Update OEE Background
                $('#SLayer_'+machine[0]['machine_id']+'').css("background-color",color);

                // Update OEE
                $('#SLayer_'+machine[0]['machine_id']+'').css("width",m['OEE']+"%");
                $('#SLayer_val_'+machine[0]['machine_id']+'').html(parseInt(m['OEE']));
                $('#SLayer_val_Color_'+machine[0]['machine_id']+'').css("color",val_color);


                $('#OEE_'+machine[0]['machine_id']+'').html(m['OEE']+"%");
              }
            });

            // Current Status Update.
            var state_color="";
            var state_color_rgb="";
            if (event == "Active") {
              state_color="#007a37";
              state_color_rgb="rgba(0,122,55,0.1)";
            }
            else if (event == "Inactive") {
              state_color="#d10527";
              state_color_rgb="rgba(209,5,39,0.1)";
            }
            else if (event == "Machine OFF") {
              state_color="#7f7f7f";
              state_color_rgb="rgba(127,127,127,0.1)";
            }
            else{
              state_color="#ffc50d";
              state_color_rgb="rgba(255,197,13,0.1)";
            }

            // Update Header
            $('#item-header-'+machine[0]['machine_id']+'').css("background-color",state_color);

            // Update Production Target
            $('#item_production_s_'+machine[0]['machine_id']+'').css("background-color",state_color_rgb);

            // Update OEE Target
            $('#Target_'+machine[0]['machine_id']+'').css("width",res['targets'][0].oee+"%");
            $('#OEETarget_'+machine[0]['machine_id']+'').html(res['targets'][0].oee+"%");

            // Update Production Percentage
            var target_production=5000;
            var production_percent = parseInt((production_total/target_production)*100);
            $('#production_per'+machine[0]['machine_id']+'').html(production_percent);

            // Graph Portion
            var hourly = [];
            var hourList = [];
            var production_target = [];
            var total_target = 0;
            var production_tar_per=0;
            res['data'].forEach(function(items){
              if(items['machine'] == machine[0]['machine_id']){
                items['production'].forEach(function(i){
                  hourly.push(i['production']);
                  hourList.push(i['start_time']+" to "+i['end_time']);
                });
                items['targets'].forEach(function(i){
                  production_target.push(i);
                  total_target = total_target + i;
                });
                items['target_per'].forEach(function(i){
                  production_tar_per = production_tar_per + i;
                });
              }
            });

            var myChart = myChartList[n];

            // Update Production
            var dataset = myChart.data.datasets[0];
            var label = myChart.data;
            var len = hourly.length;
            var dataset_target = myChart.data.datasets[1];
            dataset.data=[];
            label.labels=[];
            dataset_target.data=[];
            for (var i = 0; i < len; i++) {
              dataset.data[i] = hourly[i];
              label.labels[i] = hourList[i];
              dataset_target.data[i] = production_target[i];
            }

            // Update Production color
            myChart.data.datasets[0].backgroundColor=state_color;
            myChart.data.datasets[0].borderColor="rgba(0, 0, 0, 0)";
            myChart.update();

            // Update Prodcution Percentage value
            var production_percent_val =470-(4.7*production_percent);
            var iterate = document.getElementsByClassName("circle");
            var refcolor = 'url('+'#GradientColor_'+machine[0]['machine_id']+')';
            // const MyFSC_container = document.getElementsByClassName("circle");
            // MyFSC_container[n].style.setProperty("--foo", production_percent_val);
            // MyFSC_container[n].style.setProperty("--ref_graph", refcolor);

            for (val of iterate) {
              if(val.getAttribute("id") == machine[0]['machine_id']){
                val.style.setProperty("--foo", production_percent_val);
                val.style.setProperty("--ref_graph", refcolor);
              }
            }

            var color_code="";
            if (production_percent > 75) {
              color_code = "#c2fb05";
            }
            else if (production_percent > 50) {
              color_code = "#fae910";
            }
            else if (production_percent > 25) {
              color_code = "#c55911";
            }
            else{
              color_code = "#d10527";
            }

            document.getElementById('circle_graph_colors_'+machine[0]['machine_id']).attributes['stop-color'].value = color_code;
            n = n+1;
        });
      },
      error:function(res){

      }
    });
  }


  // cards click function

  $(document).on('click','.grid-item-cont',function(event){
    event.preventDefault();
    var find_index = $('.grid-item-cont');
    var index_val = find_index.index($(this));
    var tmp_mid = $('.machine_name_ref:eq('+index_val+')').attr('mid_data');
    var shift_date = $('#shift_date').text();
    var shift_id = $('#shift_id').text();
    var event = $('.current_event:eq('+index_val+')').attr('event_data');
    var machine_name = $('.machine_name_ref:eq('+index_val+')').text();
    // alert(shift_id.split(" "));
    const tmp = shift_id.split(" ")
    alert(shift_date);
    alert(tmp_mid);
    var backgroundcolor = "";
    var bar_color = "";
    var card_body = "";
    var line  = "";
    var label_text = "";

    if (event === "Active") {
      backgroundcolor = "#01ab4e";
      bar_color = "#007A37";
      card_body = "#009644";
      line = "#01a34a";
      label_text="white";
    }else if(event === "Inactive"){
      backgroundcolor = "#d10527";
      bar_color = "#730316";
      card_body = "#BB0523";
      line = "#730316";
      label_text="black";
    }else if(event === "Machine OFF"){
      backgroundcolor = "#7f7f7f";
      bar_color = "#404040";
      card_body = "#565656";
      line="#aaaaaa";
      label_text="black";
    }
    const shift_arr = [];
    shift_arr.push(tmp[1]);
    // #009644 green header card body part graph  #007A37 card header

    getDownTimeGraph(tmp_mid,shift_date,shift_arr);
    part_by_hour(tmp_mid,shift_date,tmp[1],bar_color);
    div_records(tmp_mid,shift_date,tmp[1],bar_color,card_body);
    $('.graph-content').css('display','none');
    $('.oui_screen_view').css('display','inline');
    $('.oui_header_div').css('background-color',backgroundcolor);
    $('.label_header').css('background-color',backgroundcolor);
    $('.oui_sub_header').css('background-color',card_body);
    $('.target_graph_parent_div').css('background-color',card_body);
    $('.line_color_border').css('border','1px solid '+line);
    $('.label_text_color').css('color',label_text);
    $('#machine_status').text(event);
    $('#machine_name_text').text(machine_name);

    $('.oui_arrow_div').css('display','inline');
    $('.visibility_div').css('display','none');
  });


  // downtime graph global variables
var event_ref= new Array();
var machineID_ref = "";
var shift_date_ref = "";
var shift_Ref ="";
var data_duration = new Array();
var data_notes = new Array();
var down_notes = new Array();
var machine_Name = "";
var part_name_tooltip = new Array();
function getDownTimeGraph(machine_id,shift_date,s){
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
                  
                    shift_stime = item.start_time;
                    shift_etime = item.end_time;
                  }
                });
                $('#downtime_chart').empty();
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

                        // part_name_arr_pass = getpartnames_graph(model.part_id);
                        part_name_arr_pass = model.part_id;
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

                      var machine_Name_Tooltip = w.globals.initialSeries[seriesIndex].machine_Name;
                      var part_name_tooltip = w.globals.initialSeries[seriesIndex].part_Name;
                      
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

              var chart = new ApexCharts(document.querySelector("#downtime_chart"), options);
              chart.render();
             
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

// part wise graph by hours using oui screen
function part_by_hour(mid,sdate,sid,bar_color){
  var x = 0;
  $.ajax({
    url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
    type: "POST",
    dataType: "json",
    cache: false,
    async: false,
    data:{
      shift_date:sdate,
      shift_id:sid,
      filter:x,
    },
    success:function(res){
      var hourly = [];
      var hourList = [];
      var production_target = [];
      res['data'].forEach(function(items){
        if(items['machine'] === mid){
          items['production'].forEach(function(i){
            hourly.push(i['production']);
            hourList.push(i['start_time']+" to "+i['end_time']);
          });
          items['targets'].forEach(function(i){
            production_target.push(i);
          });
        }
      });
      // availability performance and quality div records
      var availability_assign = 0;
      var performance_assign = 0;
      var quality_assign = 0;
      var oee_assign = 0;
      res['oee'].forEach(function(item){
        if (item['Machine_Id']===mid) {
          availability_assign = item['Availability'];
          performance_assign = item['Performance'];
          quality_assign = item['Quality'];
          oee_assign = item['OEE'];
        }
      });

      $('#availability_val').text(parseInt(availability_assign));
      $('#performance_val').text(parseInt(performance_assign));
      $('#quality_val').text(parseInt(quality_assign));
      $('#oee_val').text(parseInt(oee_assign));


      ChartDataLabels.defaults.color = "#ffffff";
      ChartDataLabels.defaults.font.size = "9px";
      ChartDataLabels.defaults.font.family = "'Roboto', sans-serif;";
      ChartDataLabels.defaults.anchor = "center";
      var ctx = document.getElementById('part_wise_graph_oui').getContext('2d');
      myChartList[myChartList.length] = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: hourList,
          datasets: [
            {
              label: "Production",
              type: "bar",
              backgroundColor: bar_color,
              borderColor: "white", 
              borderWidth: 1,
              fill: true,
              data: hourly,
            },
            {
              label: "Production Target",
              type: "line",
              backgroundColor: "#7f7f7f",
              borderColor: "#00000", 
              borderWidth: 1,
              fill: false,
              data: production_target,
              pointRadius: 0,
            },
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
              display:false,
              grid:{
                display:false
              },
              stacked:true,
            },
          },
          plugins: {
            datalabels:{
              formatter: (value,context) => context.datasetIndex === 0 ? value : ''
            },
            legend: {
              display: false,
            },
            tooltip: {
              enabled: true,
            },
          },
        
        },
        plugins: [ChartDataLabels],
      });


    },
    error:function(er){
      console.log("error code");
      console.log(er);
    },

  });
}

// div elements value assigning function
function div_records(mid,shift_date,shift_id,card_header,card_body){
  $.ajax({
    url:"<?php echo base_url('Current_Shift_Performance/div_details'); ?>",
    type: "POST",
    dataType: "json",
    cache: false,
    async: false,
    data:{
      mid:mid,
      shift_date:shift_date,
      shift_id:shift_id,
    },
    success:function(res){
      console.log("Div Records");
      console.log(res);

      var nict_min = res['nict']/60;
      var tmp_nict = " ";
      if (parseInt(nict_min)>0) {
        var nict_second = res['nict']%60;
        if (parseInt(nict_second)>0) {
          tmp_nict = parseInt(nict_min)+"m"+" "+parseInt(nict_second)+"s";
        }else{
          tmp_nict = parseInt(nict_min)+"m";
        }
      }else{
        tmp_nict = parseInt(res['nict'])+'s';
      }

      var temp_downtime = res['downtime']/60;
      var downtime_val = " ";
      if (parseInt(temp_downtime)>0) {
        var downtime_hour = temp_downtime/60;
        if (parseInt(downtime_hour)>0) {
            downtime_val = parseInt(downtime_hour)+"h"+" "+parseInt(temp_downtime)+"m";
        }else{
          downtime_val = parseInt(temp_downtime)+"m";
        }
      }else{
        downtime_val = parseInt(res['downtime'])+"s";
      }

      $('#downtime_val').text(downtime_val);
      $('#nict_val').text(tmp_nict);
      $('#reject_count').text(res['rejection_count']);
      $('#part_name_circle').text(res['part_name']);
      $('#part_name_header').text(res['part_name']);

      $('.card_header').css('background-color',card_header);
      $('.card_small_div').css('background-color',card_body);
      $('.shift_oee_header').css('background-color',card_header);
      $('.shift_oee_div').css('background-color',card_body);
      
    },
    error:function(er){
      console.log("error");
      console.log(er);

    }
  });
}

var full = document.getElementById("full_screen_cards");
// full screen mode onclick
function fullscreen_mode(){
  if (full.requestFullscreen) {
    full.requestFullscreen();
  } else if (full.webkitRequestFullscreen) { /* Safari */
    full.webkitRequestFullscreen();
  } else if (full.msRequestFullscreen) { /* IE11 */
    full.msRequestFullscreen();
  }
}

</script>