<head>
    <!-- Google Chart link -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>    
    <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/model.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

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
          margin-left: 1rem;
        }
        .val{
          font-size: 1rem;
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

        .centerAlign{
          display: flex;
          justify-content: center;
          align-items: center;
          height: 2rem;
        }
        .centerAlignLable{
          display: flex;
          justify-content: start;
          align-items: center;
          height: 2rem;
        }
        .leftMargin{
          margin-left: 2rem;
        }
        .triangleDraw {
          width: 0;
          height: 0;
          border-left: 0.35rem solid transparent;
          border-right: 0.35rem solid transparent;
          border-bottom: 0.7rem solid #004b9b;
        }
        .circleDraw{
          background-color: #004b9b;
          color: #004b9b;
          height: 0.6rem;
          width: 0.6rem;
          display: inline-block;
          border-radius: 50%;
        }
        .squareDraw{
          background-color: #004b9b;
          color: #004b9b;
          height: 0.6rem;
          width: 0.6rem;
          display: inline-block;
        }
        .recDraw{
          background-color: #004b9b;
          color: #004b9b;
          height: 0.8rem;
          width: 0.6rem;
          display: inline-block;
        }
        .lableSpace{
          margin-right: 0.5rem;
        }
        .divSpace{
          margin-right: 1.5rem;
        }

        .fontStyle{
          font-size: 12px;
          color: #595959;
          font-family: 'Roboto', sans-serif;
        }

      </style>
</head>

<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">OEE Financial Drill Down</p>
              <div class="d-flex">
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <!-- <input type="date" name="" class="form-control fromDate" id="from"> -->
                          <input type="datetime-local" class="form-control fromDate" value="" step="1">
                          <!-- <input type="datetime-local" class="form-control" value="2013-10-24T10:00:00" step="1"> -->
                          <label for="inputSiteNameAdd" class="input-padding ">From Date</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                          <!-- <input type="date" name="" class="form-control toDate"> -->
                          <input type="datetime-local" class="form-control toDate" value="" step="1">
                          <label for="inputSiteNameAdd" class="input-padding ">To Date</label>
                        </div>
                    </div>
              </div>
          </div>
        </nav>

        <div class="OuterCard bodercss" style="margin-top:4.5rem;">
        	<div class="flex-container">
        		<div style="width: 25%" class="graphCard">
        			<p class="p1">OVERALL TEEP%</p>
        			<div style="width: 100%;max-width: 100%;" class="graphCardFLayer">
        				<div style="width: 0%;max-width: 100%;" class="graphCardSLayer center-align" id="ViewOverallTEEP">
	        			</div>
                <div style="width: 0%;max-width:100%;" class="graphCardTLayer textCenter" id="viewTEEP">
                    <p class="values paddingm val"><span id="valueTEEP"></span>%</p>
                  </div>
        			</div>
        			
        		</div>
        		<div style="width: 25%" class="graphCard bodercss">
        			<p class="p1">OVERALL OOE%</p>
        			<div style="width: 100%;max-width: 100%;" class="graphCardFLayer">
        				<div style="width: 0%;max-width: 100%;" class="graphCardSLayer center-align" id="ViewOverallOOE">
        				</div>
                <div style="width: 0%;max-width: 100%;" class="graphCardTLayer textCenter" id="viewOOE">
                    <p class="values paddingm val"><span id="valueOOE"></span>%</p>
                  </div>
        			</div>
        		</div>
        		<div style="width: 25%" class="graphCard bodercss">
        			<p class="p1">OVERALL OEE%</p>
        			<div style="width: 100%;max-width: 100%;" class="graphCardFLayer">
        				<div style="width: 0%;max-width: 100%;" class="graphCardSLayer center-align" id="ViewOverallOEE">
        				</div>
                <div style="width: 0%;max-width: 100%;" class="graphCardTLayer textCenter" id="viewOEE">
                    <p class="values paddingm val"><span id="valueOEE"></span>%</p>
                </div>
        			</div>
        		</div>
        	</div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">MACHINE-WISE OEE% BREAKDOWN</p>
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
            <canvas id="machine_wise_OEE" style="width:100%;max-width: 600px;"></canvas>  
            <div class="centerAlignLable leftMargin">
              <div class="divSpace centerAlign">
                <p class="paddingm centerAlign fontStyle"><span class="recDraw lableSpace paddingm">.</span><span>Machine OEE%</span></p>
              </div>
              <div class="divSpace">
                <p class="paddingm centerAlign fontStyle"><span class="triangleDraw lableSpace paddingm"></span><span>Availability%</span></p>
              </div>
              <div class="divSpace">
                <p class="paddingm centerAlign fontStyle"><span class="squareDraw lableSpace paddingm">.</span><span>Performance%</span></p>
              </div>
              <div class="divSpace">
                <p class="paddingm centerAlign fontStyle"><span class="circleDraw lableSpace paddingm">.</span><span>Quality%</span></p>
              </div>
            </div>  
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">AVAILABILITY OPPORTUNITY</p>
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
                <p class="paddingm headTitle">TOTAL</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft TotalAvail"></span></p>
              </div>
              <canvas id="avalabilityOpportunity" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%"> 
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">PERFORMANCE OPPORTUNITY</p>
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
                <p class="paddingm headTitle">TOTAL</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft PerformanceGrand"></span></p>
              </div>
            <canvas id="performanceOpportunity" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">QUALITY OPPORTUNITY</p>
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
                <p class="paddingm headTitle">TOTAL</p>
                <p class="paddingm valueGraph"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft OppCostTotal"></span></p>
              </div>
            <canvas id="qualityOpportunity" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
        <div class="OuterCard graphCardMain">
          <div class="card bodercss" style="width: 80%">
              <nav class="navbar navbar-expand-lg">
              <div class="container-fluid paddingm">
                <p class="float-start fontBold" id="logo">OEE TREND</p>
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
              <canvas id="OEETrend" style="width:100%;max-width: 600px;"></canvas>    
          </div>
        </div>
</div>

<script type="text/javascript">
$(document).on('blur','.fromDate',function(){
  myFun();
});
$(document).on('blur','.toDate',function(){
  myFun();
});
function myFun(){
    // var today = new Date();
    // var now = today.toLocaleString();
    f = $('.fromDate').val();
    t = $('.toDate').val();
    if(f != "" && t !=""){
      machineWiseOEE();
      availabilityReason();
      qualityOpportunity();
      performanceOpportunity();
      overallTarget();
    }

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
  },
  error:function(res){
    $('#ViewOverallTEEP').css('width','0%');
    $('#ViewOverallOEE').css('width','0%');
    $('#ViewOverallOOE').css('width','0%');
  }
});


//Overall TEEP,OOE,OEE.......
overallTarget();
function overallTarget(){
    f = $('.fromDate').val();
    t = $('.toDate').val();
  $.ajax({
    //OEE check....
    //url: "<?php //echo base_url('Home/myFunSample'); ?>",
    url: "<?php echo base_url('Financial_Metrics/OverallOEETarget'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      
      $('#viewTEEP').css('width',''+res.Overall_TEEP+'%');
      $('#viewOOE').css('width',''+res.Overall_OOE+'%');
      $('#viewOEE').css('width',''+res.Overall_OEE+'%');
      $('#valueTEEP').html(res.Overall_TEEP);
      $('#valueOOE').html(res.Overall_OOE);
      $('#valueOEE').html(res.Overall_OEE);
    },
    error:function(res){
        alert("No Data Records!");
        //$('#viewOEE').css('width','0%');
    }
  });
}


//Machine Wise OEE......
machineWiseOEE();
function machineWiseOEE() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  $.ajax({
    url: "<?php echo base_url('Financial_Metrics/getMachineWiseOEE');?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      //alert(res.MachineName);
        //var data = $.parseJSON(res.Quality);
        // res = Object.keys(res);
            var ctx = document.getElementById("machine_wise_OEE").getContext('2d');
                var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: res.MachineName,
                  datasets: [{
                    label: "Quality",
                    type: "line",
                    backgroundColor: "red", 
                    pointStyle:"circle",
                    radius:"5",
                    borderWidth: 1, 
                    showLine : false, 
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['Quality'],
                    pointRadius: 5,
                  },

                  {
                    label: "Performance",
                    type: "line",
                    backgroundColor: "white",
                    pointStyle:"rect",
                    radius:"5",
                    //borderColor: "red",  
                    borderWidth: 1, 
                    showLine : false,
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['Performance'],
                    pointRadius: 5,
                  },
                  {
                    label: "Availability",
                    type: "line",
                    backgroundColor: "yellow",
                    pointStyle:"triangle",
                    // borderColor: "red",  
                    borderWidth: 1, 
                    showLine : false,
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['Availability'],
                    pointRadius: 5,
                  },
                  {
                    label: "Machine OEE",
                    type: "bar",
                    backgroundColor: "#004b9b",
                    borderColor: "#004b9b", 
                    borderWidth: 1,
                    fill: true,
                    yAxisID: "axis-bar",
                    data: res['OEE']
                  },
                  {
                    label: "OEE Target",
                    type: "line",
                    backgroundColor: "rgb(179, 214, 255,0.3)", 
                    // pointStyle:"circle",
                    // radius:"5",
                    borderWidth: 1, 
                    showLine : true,
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['OEETarget'],
                    pointRadius: 0,
                  },
                  {
                    label: "Availability Target",
                    type: "line",
                    backgroundColor: "rgb(179,215,255,0.5)", 
                    // pointStyle:"circle",
                    // radius:"5",
                    borderWidth: 1, 
                    showLine : true,
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['AvailabilityTarget'],
                    pointRadius: 0,
                  },
                  {
                    label: "Performance Target",
                    type: "line",
                    backgroundColor: "rgb(139,194,255,0.3)", 
                    // pointStyle:"circle",
                    // radius:"5",
                    borderWidth: 1, 
                    showLine : true,
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['PerformanceTarget'],
                    pointRadius: 0,
                  },
                  {
                    label: "Quality Target",
                    type: "line",
                    backgroundColor: "rgb(139,194,255)", 
                    // pointStyle:"circle",
                    // radius:"5",
                    borderWidth: 1, 
                    showLine : true,
                    fill: true,
                    yAxisID: "axis-time", 
                    data: res['QualityTarget'],
                    pointRadius: 0,
                  }
                  ],
              },
              options: {
                  // bar: {
                  //   columnWidth: '60%',
                  // },
                  tooltips: {
                    enabled:true,
                    mode:"single",
                    backgroundColor: 'white',
                    //drawBorder
                    //borderRadius:10,
                    XAlign: 'center',
                    //fontColor:'red',
                    titleFontColor: '#595959',
                    titleFontSize:14,
                    //titleFontWeight:'bold',
                    bodyFontColor: '#595959',
                    bodyFontSize:13,
                    //bodyFontWeight:'bold',
                    labelFontColor: 'red',
                    footerFontColor: '#bfbfbf',
                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                    titleSpacing:3,
                    displayColors:false,
                    style: {
                      fontSize: '20px',
                      //fontFamily: undefined
                      //width:'200px'
                    },
                    callbacks:{
                      title:function(tooltipItems,data){
                        return "Machine Name";
                      },
                      beforeLabel:function(tooltipItems,data){
                        return "Operator Name";
                      },
                      label: function(tooltipsitems,data){
                        //var maw= yValues[tooltipsitems.index];
                        return '';
                      },
                      beforeFooter:function(tooltipsitems,data){
                        return '\t\t Opportunity Cost :';
                      },
                      footer:function(tooltipsitems,data){
                        return '\t\t Speed Loss :';
                      }, 
                    
                    },
                  },
                  legend: {
                    display: false,
                    labels: {
                        boxWidth: 3,
                        usePointStyle: true,
                        //boxHeight:5
                    },
                    position: 'bottom',
                    //show:false,
                  },
                  scales: {
                    xAxes: [{
                      stacked: true,
                      gridLines: {
                        display: false,
                      },
                    }],
                    yAxes: [{
                      stacked: true,
                      id: 'axis-bar',
                      gridLines: {
                        display: false,
                        drawBorder: false,
                      },
                      ticks: {
                        display: false
                      }
                    }, {
                      stacked: true,
                      id: 'axis-time',
                      display: false,
                    }]
                  },    
                },
              });

    },
    error:function(res){
        alert("No Data Records!");
    }
  });
}

//Reason wise availability........
availabilityReason();
function availabilityReason() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
	$.ajax({
    url: "<?php echo base_url('Financial_Metrics/getAvailabilityReasonWise'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){

      $(".TotalAvail").html(res.grandTotal);
      var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        
      // Find the Reason Names as Lables..........
      var reasonList =[];
      res['reason'].forEach(function(reason){
          reasonList.push(reason.downtime_reason);
      });

      var totalVal =[];
      res['total'].forEach(function(total){
          totalVal.push(total);
      });
      

      var machineName = [];
      res['machineName'].forEach(function(Name){
          machineName.push(Name.machine_name);
      });

      //Find the duration for each machine in each Reason............
      machine = [
        {
          label:"Total" ,
          type: "line",
          backgroundColor: color[0],
          borderColor: "#d9d9ff",  
          borderWidth: 1, 
          showLine : false,
          fill: true,
          yAxisID: "axis-time", 
          data:totalVal,
          pointRadius: 7,
        }           
      ];

      var x=1;
      var index=0;
      res['data'].forEach(function(machineWise){
      //     //All the machines duration for each Reason..........
          var arr= [];
          var arrtmp = [];
          machineWise.data.forEach(function(reason){
            if (reason == "") {
              arr.push(0)
            }
            else{
              reason.forEach(function(data){
                arr.push(data.duration);
              });

            }
          });
          
          machine.push({
            label: machineName[index],
            label: "x",
            type: "bar",
            //backgroundColor:"#005dc8",
            backgroundColor: color[x],
            borderColor: color[x],
            borderWidth: 1,
            fill: true,
            yAxisID: "axis-bar",
            data: arr
          });
          x=x+1;
      });

      var avlOpp = document.getElementById("avalabilityOpportunity").getContext('2d');
      var avlOppChart = new Chart(avlOpp, {
        type: 'bar',
        data: {
          labels: reasonList,
          datasets: machine,
        },
      options: {
          tooltips: {
            enabled:true,
            mode:"single",
            backgroundColor: 'white',
            //drawBorder
            //borderRadius:10,
            XAlign: 'center',
            //fontColor:'red',
            titleFontColor: '#595959',
            titleFontSize:14,
            //titleFontWeight:'bold',
            bodyFontColor: '#595959',
            bodyFontSize:13,
            //bodyFontWeight:'bold',
            labelFontColor: 'red',
            footerFontColor: '#bfbfbf',
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
            titleSpacing:3,
            displayColors:false,
            style: {
              fontSize: '20px',
              //fontFamily: undefined
              //width:'200px'
            },
            callbacks:{
              title:function(tooltipItems,data){
                //return tooltipItems.querySelector('.apexcharts-tooltip');
                // console.log(tooltipsItems);
                return "Reason Name";
                // console.log(tooltipItems);
                // console.log(data);
                // return tooltipItems.yLabel;
              },
              beforeLabel:function(tooltipItems,data){
                return "Machine Name";
              },
              label: function(tooltipsitems,data){
                //var maw= yValues[tooltipsitems.index];
                return '';
              },
              // afterLabel:function(tooltipsitems,data){
              //   return '\t\tDuration:';
              // },
              beforeFooter:function(tooltipsitems,data){
                return '\t\t Opportunity Cost :';
              },
              footer:function(tooltipsitems,data){
                return '\t\t Duration :';
              }, 
            
            },
          },
          legend: {
                  display: false
          },
          scales: {
            xAxes: [{
              stacked: true,
              gridLines: {
                display: false,
              },
            }],
            yAxes: [{
              stacked: true,
              id: 'axis-bar',
              gridLines: {
                display: false,
                drawBorder: false,
              },
              ticks: {
                display: false
              }
            }, {
              stacked: true,
              id: 'axis-time',
              display: false,
            }]
          },
          
        },
      });

    },
    error:function(res){
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}


//Quality Opportunity........
qualityOpportunity();
function qualityOpportunity() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  $.ajax({
    url: "<?php echo base_url('Financial_Metrics/qualityOpportunity'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){

      // alert(res.GrandTotal);
      $(".OppCostTotal").html(res.GrandTotal);
      var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
        
      // Find the Reason Names as Lables..........
      var reasonList =[];
      res['Reason'].forEach(function(res){
          reasonList.push(res);
      });

      var totalVal =[];
      res['Total'].forEach(function(t){
          totalVal.push(t);
      });
      
      var partName = [];
      res['Part'].forEach(function(Name){
          partName.push(Name);
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
          fill: true,
          yAxisID: "axis-time", 
          data:totalVal,
          pointRadius: 7,
        }           
      ];

      var x=1;
      var index=0;
      res['OppCost'].forEach(function(partWise){
      //     //All the part opportunity cost for each Reason..........
          var arr= [];
          var arrtmp = [];
          partWise.Reason.forEach(function(res){
            if (res.TotalCost == "") {
              arr.push(0)
            }
            else{
                arr.push(res.TotalCost);
            }
          });
          //alert(arr);
          oppCost.push({
            label: partName[index],
            // label: "x",
            type: "bar",
            backgroundColor: color[x],
            borderColor: color[x],
            borderWidth: 1,
            fill: true,
            yAxisID: "axis-bar",
            data: arr
          });
          x=x+1;
      });

            //alert(oppCost);
            //$(".OppCostTotal").html(QualityOppTotal);
            var ctx = document.getElementById("qualityOpportunity").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: reasonList,
                datasets:oppCost
            },
            options: {
                tooltips: {
                    enabled:true,
                    mode:"single",
                    backgroundColor: 'white',
                    //drawBorder
                    //borderRadius:10,
                    XAlign: 'center',
                    //fontColor:'red',
                    titleFontColor: '#595959',
                    titleFontSize:14,
                    //titleFontWeight:'bold',
                    bodyFontColor: '#595959',
                    bodyFontSize:13,
                    //bodyFontWeight:'bold',
                    labelFontColor: 'red',
                    footerFontColor: '#bfbfbf',
                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                    titleSpacing:3,
                    displayColors:false,
                    style: {
                      fontSize: '20px',
                      //fontFamily: undefined
                      //width:'200px'
                    },
                    callbacks:{
                      title:function(tooltipItems,data){
                        return "Reason Name";
                      },
                      beforeLabel:function(tooltipItems,data){
                        return "Part Name";
                      },
                      label: function(tooltipsitems,data){
                        //var maw= yValues[tooltipsitems.index];
                        return '';
                      },
                      beforeFooter:function(tooltipsitems,data){
                        return '\t\t Opportunity Cost :';
                      },
                      footer:function(tooltipsitems,data){
                        return '\t\t No of Rejects :';
                      }, 
                    
                    },
                  },
                legend: {
                  display: false
                },
                scales: {
                  xAxes: [{
                    stacked: true,
                    gridLines: {
                      display: false,
                    },
                  }],
                  yAxes: [{
                    stacked: true,
                    id: 'axis-bar',
                    gridLines: {
                      display: false,
                      drawBorder: false,
                    },
                    ticks: {
                      display: false
                    },
                  }, {
                    stacked: true,
                    id: 'axis-time',
                    display: false,
                  }]
                },
                
              },
            });
        },
    error:function(res){
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}

//Performance Opportunity........
performanceOpportunity();
function performanceOpportunity() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  $.ajax({
    url: "<?php echo base_url('Financial_Metrics/performanceOpportunity'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
            // alert(res.dataPart);
            
            var color = ["white","#004b9b","#005dc8","#057eff","#53a6ff","#cde5ff"];
            $(".PerformanceGrand").html(res.GrandTotal);

            var partTotal = [];
            res.Total.forEach(function(r){
              partTotal.push(r);
            });

            var partWiseLable = [];
            res.Part.forEach(function(item){
              // alert(item);
              partWiseLable.push(item.part_name);
            });
            // alert(performancePart);
            // alert(Total);

             //Find the duration for each machine in each Reason............
            oppCost = [
              {
                label:"Total" ,
                type: "line",
                // backgroundColor: color[0],
                borderColor: "#d9d9ff",  
                borderWidth: 1, 
                showLine : false,
                fill: true,
                yAxisID: "axis-time", 
                data:partTotal,
                pointRadius: 7,
              }           
            ];

            var x=1;
            var index=0;
            
            res.dataPart.forEach(function(item){
              var performancePart=[];
              item.machineData.forEach(function(val){
                performancePart.push(val);
              });
              // alert(performancePart);
              // performancePart.push(item.machineData);
              oppCost.push({
                  label: partWiseLable[index],
                  //label: "x",
                  type: "bar",
                  backgroundColor: color[x],
                  borderColor: color[x],
                  borderWidth: 1,
                  fill: true,
                  yAxisID: "axis-bar",
                  data: performancePart
                });
                x=x+1;
            });

            // var ctx = document.getElementById("performanceOpportunity").getContext('2d');
            // var myChart = new Chart(ctx, {
            //   type: 'bar',
            //   data: {
            //     labels: partWiseLable,
            //     datasets:oppCost,
            // },
            // options: {
            //     tooltips: {
            //         enabled:true,
            //         mode:"single",
            //         backgroundColor: 'white',
            //         //drawBorder
            //         //borderRadius:10,
            //         XAlign: 'center',
            //         //fontColor:'red',
            //         titleFontColor: '#595959',
            //         titleFontSize:14,
            //         //titleFontWeight:'bold',
            //         bodyFontColor: '#595959',
            //         bodyFontSize:13,
            //         //bodyFontWeight:'bold',
            //         labelFontColor: 'red',
            //         footerFontColor: '#bfbfbf',
            //         tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
            //         titleSpacing:3,
            //         displayColors:false,
            //         style: {
            //           fontSize: '20px',
            //           //fontFamily: undefined
            //           //width:'200px'
            //         },
            //         callbacks:{
            //           title:function(tooltipItems,data){
            //             return "Part Name";
            //           },
            //           beforeLabel:function(tooltipItems,data){
            //             return "Operator Name";
            //           },
            //           label: function(tooltipsitems,data){
            //             //var maw= yValues[tooltipsitems.index];
            //             return '';
            //           },
            //           beforeFooter:function(tooltipsitems,data){
            //             return '\t\t Opportunity Cost :';
            //           },
            //           footer:function(tooltipsitems,data){
            //             return '\t\t Speed Loss :';
            //           }, 
                    
            //         },
            //       },
            //     legend: {
            //             display: false
            //     },
            //     scales: {
            //       xAxes: [{
            //         stacked: true,
            //         gridLines: {
            //           display: false,
            //         },
            //       }],
            //       yAxes: [{
            //         stacked: true,
            //         id: 'axis-bar',
            //         gridLines: {
            //           display: false,
            //           drawBorder: false,
            //         },
            //         ticks: {
            //           display: false
            //         },
            //       }, {
            //         stacked: true,
            //         id: 'axis-time',
            //         display: false,
            //       }]
            //     },
                
            //   },
            // });

            var ctx = document.getElementById("performanceOpportunity").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: partWiseLable,
                datasets:oppCost
                // datasets: [{
                //   label: 'Employee',
                //   backgroundColor: "#caf270",
                //   data: [-12, 59, 5, 56, 58,12, 59, 87, 45],
                // }, {
                //   label: 'Engineer',
                //   backgroundColor: "#45c490",
                //   data: [12, -59, 5, 56, 58,12, 59, 85, 23],
                // }, {
                //   label: 'Government',
                //   backgroundColor: "#008d93",
                //   data: [12, -59, 5, 56, 58,12, 59, 65, 51],
                // }, {
                //   label: 'Political parties',
                //   backgroundColor: "red",
                //   data: [12, 59, 5, 56, -58, 12, 59, 12, 74],
                // }]
            },
            options: {
                tooltips: {
                    enabled:true,
                    mode:"single",
                    backgroundColor: 'white',
                    //drawBorder
                    //borderRadius:10,
                    XAlign: 'center',
                    //fontColor:'red',
                    titleFontColor: '#595959',
                    titleFontSize:14,
                    //titleFontWeight:'bold',
                    bodyFontColor: '#595959',
                    bodyFontSize:13,
                    //bodyFontWeight:'bold',
                    labelFontColor: 'red',
                    footerFontColor: '#bfbfbf',
                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
                    titleSpacing:3,
                    displayColors:false,
                    style: {
                      fontSize: '20px',
                      //fontFamily: undefined
                      //width:'200px'
                    },
                    callbacks:{
                      title:function(tooltipItems,data){
                        return "Reason Name";
                      },
                      beforeLabel:function(tooltipItems,data){
                        return "Part Name";
                      },
                      label: function(tooltipsitems,data){
                        //var maw= yValues[tooltipsitems.index];
                        return '';
                      },
                      beforeFooter:function(tooltipsitems,data){
                        return '\t\t Opportunity Cost :';
                      },
                      footer:function(tooltipsitems,data){
                        return '\t\t No of Rejects :';
                      }, 
                    
                    },
                  },
                legend: {
                  display: false
                },
                scales: {
                  xAxes: [{
                    stacked: true,
                    gridLines: {
                      display: false,
                    },
                  }],
                  yAxes: [{
                    stacked: true,
                    id: 'axis-bar',
                    gridLines: {
                      display: false,
                      drawBorder: false,
                    },
                    ticks: {
                      display: false
                    },
                  }, {
                    stacked: true,
                    id: 'axis-time',
                    display: false,
                  }]
                },
                
              },
            });
    },
    error:function(res){
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}


 //        $.ajax({
 //            url: "<?php echo base_url('Home/getGraph'); ?>",
 //            type: "POST",
 //            dataType: "json",
 //            success:function(res)




 //        // oee trend day
 //        $.ajax({
 //            url: "<?php echo base_url('Home/OEETrendDay'); ?>",
 //            type: "POST",
 //            dataType: "json",
 //            success:function(res){

 //              oee = [];
 //              mainLable = [];
 //              var x=0;
 //              res.forEach(function(doee){
 //                oee.push(doee.OEE);
 //                x=x+1;
 //                mainLable.push(x);
 //                //alert(doee.OEE);
 //              });

 //              var ctx = document.getElementById("OEETrend").getContext('2d');
 //              var myChart = new Chart(ctx, {
 //                type: 'bar',
 //                data: {
 //                  labels:mainLable,
 //                  datasets: [{
 //                      label:'OEE',
 //                      type:'bar',
 //                      backgroundColor:'#004b9b',
 //                      borderColor:'#004b9b',
 //                      borderWidth:1,
 //                      fill:true,
 //                      yAxisID:"axis-bar",
 //                      data:oee
 //                  }],
 //              },
 //              options: {
 //                  tooltips: {
 //                    enabled:true,
 //                    mode:"single",
 //                    backgroundColor: 'white',
 //                    //drawBorder
 //                    //borderRadius:10,
 //                    XAlign: 'center',
 //                    //fontColor:'red',
 //                    titleFontColor: '#595959',
 //                    titleFontSize:14,
 //                    //titleFontWeight:'bold',
 //                    bodyFontColor: '#595959',
 //                    bodyFontSize:13,
 //                    //bodyFontWeight:'bold',
 //                    labelFontColor: 'red',
 //                    footerFontColor: '#bfbfbf',
 //                    tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
 //                    titleSpacing:3,
 //                    displayColors:false,
 //                    style: {
 //                      fontSize: '20px',
 //                      //fontFamily: undefined
 //                      //width:'200px'
 //                    },
 //                    callbacks:{
 //                      title:function(tooltipItems,data){
 //                        return "03 Jan 2022";
 //                      },
 //                      afterTitle:function(tooltipItems,data){
 //                        return "\t\tOEE%";
 //                      },
 //                      label: function(tooltipsitems,data){
 //                        //var maw= yValues[tooltipsitems.index];
 //                        return '';
 //                      },
 //                      beforeFooter:function(tooltipsitems,data){
 //                        return '\t\t Availability% :';
 //                      },
 //                      footer:function(tooltipsitems,data){
 //                        return '\t\t Performance% :';
 //                      }, 
 //                      afterFooter:function(tooltipsitems,data){
 //                        return '\t\t Availability% :';
 //                      },
                    
 //                    },
 //                  },
 //                  scales: {
 //                    xAxes: [{
 //                      stacked: true,
 //                      gridLines: {
 //                        display: false,
 //                      },
 //                    }],
 //                    yAxes: [{
 //                      stacked: true,
 //                      id: 'axis-bar',
 //                      ticks: {
 //                        display: false
 //                      },
 //                      gridLines: {
 //                        display: false,
 //                        drawBorder: false,
 //                      },
 //                    }, {
 //                      stacked: true,
 //                      id: 'axis-time',
 //                      display: false,
 //                    }]
 //                  },
                  
 //                },
 //              });
 //            },
 //            error:function(res){
 //                alert("Sorry!Try Agian!!!!!@");
 //            }
 //        });



	// });

</script>

<script  type="text/javascript">



/*var legend = myChart.generateLegend();
document.getElementById("legend").innerHTML = legend; */




</script>