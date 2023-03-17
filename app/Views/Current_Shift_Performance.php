<head>  
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
      <p class="float-start p3" id="logo">Current Shift Performance</p>
      <div class="d-flex" style="display: flex;align-items: center;">
                <div class="box CurrentNav rightmar alignCenter">
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
              <div class="CurrentNav">
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
              </div>
              <div class="dot-cnt">
                <div class="dotAccessCurrent">
                    <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont" style="height: 18px;">
                </div>
              </div>
              <div class="CurrentNav">
                <p class="paddingm titleTag">End</p>
                <p class="paddingm font-items" id="end_time"></p>
              </div>
      </div>
    </div>
  </nav>
  <div class="graph-content" style="margin-top:3.8rem;">
    <div class="grid-container-cont">
      <!-- Machine Tiles -->
    </div>
  </div>
</div>

<!-- preloader -->
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
    <span class="loading">Awaiting Completion...</span>
  </div>
</div>
<!-- preloader end -->

<script src="<?php echo base_url(); ?>/assets/js/all-fontawesome.js?version=<?php echo rand() ; ?>"></script>

<script type="text/javascript">
  var myChart = "";
  var myChartList=[];
  var i="";
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
      $("#shift_date").html(res[0]['shift_date']);
      $("#shift_id").html("Shift "+res[0]['shift_id']);            
      $("#start_time").html(res[0]['start_time']);
      $("#end_time").html(res[0]['end_time']);

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
  var x = $('#Filter-values').val();
  $.ajax({
    url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
    type: "POST",
    dataType: "json",
    cache: false,
    async: false,
    data:{
      shift_date:shift_date,
      shift_id:shift_id,
      filter:x,
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
              +'<div class="cen-align">'
                +'<p class="paddingm fnt-color machine_name_ref" id="Machine_name_'+machine[0]['machine_id']+'">'+machine_name+'</p>'
              +'</div>'
              +'<div class="cen-align">'
                +'<p class="paddingm fnt-color current_event" id="latest_status_'+machine[0]['machine_id']+'"></p>'
              +'</div>'
            +'</div>'
          +'</div>'
          +'<div class="item-circle">'
            +'<div class="inner-circle">'
              +'<div class="inner-val">'
                +'<p class="paddingm production_completion"><span id="production_per'+machine[0]['machine_id']+'"></span>%</p>'
                +'<p class="paddingm production_completion partname_ref" id="partname_'+machine[0]['machine_id']+'">Part Name 1</p>'
              +'</div>'
            +'</div>'
            +'<svg version="1.1" class="svg">'
              +'<defs>'
                  +'<linearGradient id="GradientColor">'
                      +'<stop offset="0%" stop-color="#ffbf00" />'
                      +'<stop offset="100%" stop-color="#ffbf00"/>'
                  +'</linearGradient>'
              +'</defs>'
              +'<circle class="circle" cx="120" cy="120" r="63" stroke-linecap="round"/>'
            +'</svg>'
          +'</div>'
          +'<div class="item-oee" style="margin: 0.5rem;">'
            +'<div style="width: 15%;display: flex;justify-content: flex-end;"><p class="paddingm oee-lable">OEE</p></div>'
            +'<div class="FLayer">'
              +'<div class="BLayer" id="Target_'+machine[0]['machine_id']+'"></div>'
              +'<div class="SLayer" id="SLayer_'+machine[0]['machine_id']+'"></div>'
              +'<div  class="TLayer TTotal" id="TTotal_'+machine[0]['machine_id']+'">'
                +'<p class="values_oee paddingm val"><span id="SLayer_val_'+machine[0]['machine_id']+'"></span>%</p>'
              +'</div>'
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
        res['data'].forEach(function(items){
          if(items['machine'] == machine[0]['machine_id']){
            items['production'].forEach(function(i){
              hourly.push(i['production']);
              hourList.push(i['start_time']+" to "+i['end_time']);
            });
            items['targets'].forEach(function(i){
              production_target.push(i);
            });
          }
        });

        ChartDataLabels.defaults.color = "#ffffff";
        ChartDataLabels.defaults.font.size = "9px";
        ChartDataLabels.defaults.font.family = "'Roboto', sans-serif;";
        ChartDataLabels.defaults.anchor = "center";


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

    });
      // console.log(ChartDataLabels.defaults.color:"#32a852");
    live_graph(shift_date,shift_id);
    },
    error:function(res){
      // Error Occured!
    }
  });
}

  a = 470;
  b =0;
  c=0;
  var shift_date="";
  var shift_id="";
  function live_graph(s_date,s_id){
     i = setInterval(function() { live_MC1001(s_date,s_id); }, 2000);
  }

  // $('#Filter-values').on('change', function(event) {
  //   clearInterval(i);
  //   getLiveMode($("#s_date_ref").val(),$("#s_id_ref").val());
  // });
  
  function live_MC1001(shift_date,shift_id) {
    var x = $('#Filter-values').val();
    $.ajax({
      url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
      type: "POST",
      dataType: "json",
      cache: false,
      async: false,
      data:{
        shift_date:shift_date,
        shift_id:shift_id,
        filter:x,
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
              $('#latest_status_'+machine[0]['machine_id']+'').html(time[0]+"m "+time[1]+"s "+event);
            }else{
              $('#latest_status_'+machine[0]['machine_id']+'').html(time[0]+"m "+event);
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
                }
                else if(res['targets'][0].green > m['OEE']){
                  color="#ffbf00";
                }
                else{
                  color="#00b04f";
                }

                // Update OEE Background
                $('#SLayer_'+machine[0]['machine_id']+'').css("background-color",color);

                // Update OEE
                $('#SLayer_'+machine[0]['machine_id']+'').css("width",m['OEE']+"%");
                $('#SLayer_val_'+machine[0]['machine_id']+'').html(parseInt(m['OEE']));
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

            var oee_target_per = (production_tar_per/total_target)*100;
            // Update Production Target
            $('#item_production_s_'+machine[0]['machine_id']+'').css("width",oee_target_per+"%");

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
            myChart.data.datasets[0].borderColor=state_color
            myChart.update();

            // Update Prodcution Percentage value
            var production_percent_val =470-(4.7*production_percent);
            const MyFSC_container = document.getElementsByClassName("circle");
            MyFSC_container[n].style.setProperty("--foo", production_percent_val);
            // console.log(MyFSC_container[0]);

            n = n+1;
        });
      },
      error:function(res){

      }
    });
  }
</script>