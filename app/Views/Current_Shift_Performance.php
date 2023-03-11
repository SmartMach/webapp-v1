
<head>
  
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/current_shift_performance.css?version=<?php echo rand() ; ?>">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/financial_metrics.css?version=<?php echo rand() ; ?>">

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/all-fontawesome.css?version=<?php echo rand() ; ?>">
</head>
<div style="margin-left: 4.5rem;">
  <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav_quality" style="z-index: 1001!important">
    <div class="container-fluid paddingm" style="margin-top:0.2rem;">
      <p class="float-start p3" id="logo">Current Shift Perfomance</p>
      <div class="d-flex" style="display: flex;align-items: center;">
                <div class="box CurrentNav rightmar alignCenter">
                  <div class="input-box paddingm">
                      <select class="form-select font-items" name="" id="" style="width: 10rem;">
                        <option>Machine Rank Order</option>
                        <option>OEE Low to High</option>
                        <option>Part Completion High to Low</option>
                        <option>Machine Status High to Low Critical</option>
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
              </div>
              <div class="CurrentNav">
                <p class="paddingm titleTag">Shift</p>
                <p class="paddingm font-items" id="shift_id"></p>
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
      <div class="grid-item-cont">
        <div class="item-header">
          <div>
            <div class="cen-align">
              <p class="paddingm fnt-color machine_name_ref" id="Machine_name"></p>
            </div>
            <div class="cen-align">
              <p class="paddingm fnt-color current_event" id="latest_status_MC1001"></p>
            </div>
          </div>
        </div>
        <div class="item-circle">
          <!-- Circular Graph -->
          <div class="inner-circle">
            <div class="inner-val">
              <p class="paddingm production_completion"><span id="production_per"></span>%</p>
              <p class="paddingm production_completion partname_ref" id="partname_MC1001">Part Name 1</p>
            </div>
          </div>
          <svg version="1.1" class="svg">
            <defs>
                <linearGradient id="GradientColor">
                    <stop offset="0%" stop-color="#ffbf00" />
                    <stop offset="100%" stop-color="#ffbf00"/>
                </linearGradient>
            </defs>
            <circle class="circle" cx="120" cy="120" r="63" stroke-linecap="round"/>
          </svg>
        </div>
        <div class="item-oee" style="margin: 0.5rem;">
            <div style="width: 20%;display: flex;justify-content: flex-end;"><p class="paddingm oee-lable">OEE</p></div>
            <div class="FLayer">
              <div class="BLayer" id="Target_MC1001"></div>
              <div class="SLayer" id="SLayer_MC1001"></div>
              <div  class="TLayer TTotal" id="TTotal_MC1001">
                <p class="values paddingm val"><span id="SLayer_val_MC1001"></span>%</p>
              </div>
            </div>
        </div>
        <div class="item-production">
          <div class="item-production-s"></div>
          <div class="graph-content-div">
            <canvas id="production-graph" style=""></canvas>
          </div>
          
        </div>
      </div>
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

      getLiveMode(res[0]['shift_date'],res[0]['shift_id']);     
    },
    error:function(res){
      // Error Occured!
    }
  });
}

function getLiveMode(shift_date,shift_id){
  $.ajax({
    url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
    type: "POST",
    dataType: "json",
    cache: false,
    async: false,
    data:{
      shift_date:shift_date,
      shift_id:shift_id,
    },
    success:function(res){    

      // OEE Target....
      $('#Target_MC1001').css("width",res['targets'][0].oee+"%");

      // OEE Percentage......
      $('#SLayer_MC1001').css("width",res['oee'][0].OEE+"%");
      $('#SLayer_val_MC1001').html(res['oee'][0].OEE);
        
      // Latest Status........
      $('#latest_status_MC1001').html(res['latest_event'][0][0].duration+"m "+res['latest_event'][0][0].event);

      // Production Percentage.......
      var a = res['production_total'][0];
      var target_production=5000;
      var production_percent = parseInt((a/target_production)*100);
      var production_percent_val =470-(4.7*production_percent);
      const MyFSC_container = document.getElementsByClassName("circle");
      MyFSC_container[0].style.setProperty("--foo", production_percent_val);

      // Production Percentage......
      $("#production_per").html(production_percent);
      

      // Machine Name......
      $("#Machine_name").html(res['machine_name'][0]);
      
      var hourly = [];
      var hourList = [];
      var production_target = [];
      res['data'][0]['production'].forEach(function(item){
        hourly.push(item.production);
        hourList.push(item.start_time+" to "+item.end_time);
      });

      res['data'][0]['targets'].forEach(function(item){
        production_target.push(item);
      });

      var ctx = document.getElementById("production-graph").getContext('2d');
      myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: hourList,
        datasets: [
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
          
          {
            label: "Production",
            type: "bar",
            backgroundColor: "#a4041f",
            borderColor: "#a4041f", 
            borderWidth: 1,
            fill: true,
            data: hourly,
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
        legend: {
            display: false,
        },
        tooltip: {
          enabled: true,
        },
        datalabels: {
          formatter: function(value, context) {
            return context.chart.data.labels[context.dataIndex];
          }
        }
      },
    },

    });

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
  
  function live_MC1001(shift_date,shift_id) {

    $.ajax({
      url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
      type: "POST",
      dataType: "json",
      cache: false,
      async: false,
      data:{
        shift_date:shift_date,
        shift_id:shift_id,
      },
      success:function(res){

        // Current OEE Status Update.....
        var color ="";
        if (res['targets'][0].yellow > res['oee'][0].OEE) {
          color="#dc062a";
        }
        else if(res['targets'][0].green > res['oee'][0].OEE){
          color="#ffbf00";
        }
        else{
          color="#00b04f";
        }

        // Current Status Update.
        var state_color="";
        var state_color_rgb="";
        if (res['latest_event'][0][0].event == "Active") {
          state_color="#00b04f";
          state_color_rgb="rgba(0,176,80,0.1)";
        }
        else if (res['latest_event'][0][0].event == "Inactive") {
          state_color="#d10527";
          state_color_rgb="rgba(209,5,39,0.1)";
        }
        else if (res['latest_event'][0][0].event == "Machine OFF") {
          state_color="#7f7f7f";
          state_color_rgb="rgba(127,127,127,0.1)";
        }
        else{
          state_color="#ffc50d";
          state_color_rgb="rgba(255,197,13,0.1)";
        }

        // Update Production Target
        $(".item-production-s").css("background-color",state_color_rgb);

        // Update Header
        $(".item-header").css("background-color",state_color);

        // Update OEE Background
        $(".SLayer").css("background-color",color);

        // Update Machine Name
        $("#Machine_name").html(res['machine_name'][0]);

        // Update Machine Current Status
        $('#latest_status_MC1001').html(res['latest_event'][0][0].duration+"m "+res['latest_event'][0][0].event);

        // Update OEE
        $('#SLayer_MC1001').css("width",res['oee'][0].OEE+"%");
        $('#SLayer_val_MC1001').html(res['oee'][0].OEE);

        // Update OEE Target
        $('#Target_MC1001').css("width",res['targets'][0].oee+"%");

        // Update Production Percentage
        var a = res['production_total'][0];
        var target_production=5000;
        var production_percent = parseInt((a/target_production)*100);
        $("#production_per").html(production_percent);

        // Update Prodcution Percentage value
        var production_percent_val =470-(4.7*production_percent);
        const MyFSC_container = document.getElementsByClassName("circle");
        MyFSC_container[0].style.setProperty("--foo", production_percent_val);

        // Update Hourly Production
        var hourly = [];
        var hourList = [];
        var production_target = [];
        res['data'][0]['production'].forEach(function(item){
          hourly.push(item.production);
          hourList.push(item.start_time+" to "+item.end_time);
        });
        res['data'][0]['targets'].forEach(function(item){
          production_target.push(item);
        });

        // Update Production
        var dataset = myChart.data.datasets[1];
        var label = myChart.data;
        var len = hourly.length;
        var dataset_target = myChart.data.datasets[0];
        dataset.data=[];
        label.labels=[];
        dataset_target.data=[];
        // myChart.update();
        for (var i = 0; i < len; i++) {
          dataset.data[i] = hourly[i];
          label.labels[i] = hourList[i];
          dataset_target.data[i] = production_target[i];
        }

        // Update Production color
        myChart.data.datasets[1].backgroundColor=state_color;
        myChart.data.datasets[1].borderColor=state_color
        myChart.update();
      },
      error:function(res){

      }
    });
  }
</script>