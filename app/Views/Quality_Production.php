
<head>
  
  <link rel="stylesheet" href="<?php echo base_url()?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">
   <!-- Datetimepicker -->
    <script src="<?php echo base_url(); ?>/assets/js/datetimepicker.js?version=<?php echo rand() ; ?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/jquery.datetimepicker.min.css?version=<?php echo rand() ; ?>">
    <script src="<?php echo base_url(); ?>/assets/js/jquery.datetimepicker.js?version=<?php echo rand() ; ?>"></script>

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>"></script>
<style>
  /* filter css design */
  .filterbtnstyle{
    color:white;
    background-color:#005abc;
    /* opacity: 0.7; */
    height:2.4rem;
    margin-top:0.5rem;
    margin-right:0.6rem;
  }
  .filterbtnstyle:hover{
    color:white;
    background-color:#005abc;
    opacity: 0.8;
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
<div style="margin-left: 4.5rem;">
  <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav_quality" style="z-index: 1001!important">
    <div class="container-fluid paddingm" style="margin-top:0.2rem;">
      <p class="float-start p3" id="logo">Production Quality</p>
      <div class="d-flex">
              <!-- <div class="float-end stcode paddingm logo-style opt-cont" style="color:#005CBC;font-size:1rem;margin-right:0.5rem; "> -->
                <!-- <div class="img-div">

                <i id="graph-cont" class="fa fa-industry img-style" alt=""></i>
                </div>
                <div class="img-div">

                <i id="table-cont" class="fa fa-industry img-style"  alt=""></i>
                </div> -->
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="border:1px solid #ced4ca;border-radius:0.25rem;padding:0.1rem;margin:auto;margin-right:0.5rem;">
                  <li class="nav-item" role="presentation"  >
                    <i class="fa fa-sitemap nav-link active"  id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" style="padding:0.4rem;font-size:1.3rem;"></i>
                  </li>
                  <li class="nav-item" role="presentation">
                    <i class="fa fa-calculator nav-link"  id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" style="padding:0.4rem;font-size:1.3rem;"></i>
                  </li>
                </ul>
              <!-- </div> -->
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
  <div class="tab-content" id="pills-tabContent" style="margin-top:3.8rem;">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
    <div class="grid-container">
      <div class="row paddingm" style="height: 15rem;width:100%;">
        <div class="grid-item mar-left paddingm" style="margin-top: 1.5rem;width:48.5%;margin-left:0.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Cost of Poor Quality (COPQ) by Reason</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft COPQP" ></span></p>
          </div>
          <div class="parent_graph_quality_opportunity parent_graph_div parent-style">
            <div class="child_graph_quality_opportunity child-style">
              <canvas id="COPQP" height="110"></canvas>
            </div>
          </div>
        </div>
        <div class="grid-item mar-right paddingm" style="margin-top: 1.5rem;width:48.5%;margin-right:0.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Quality Rejection by Reason</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><span class="paddingm valueMarLeft CRBR" ></span></p>
          </div>
          <div class="parent_graph_quality_reason_wise parent_graph_div parent-style">
            <div class="child_graph_quality_reason_wise child-style">
              <canvas id="QRBR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row paddingm" style="height: 15rem;width:100%;">
        <div class="grid-item mar-left mar-top paddingm" style="width:48.5%;margin-left:0.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Cost of Poor Quality (COPQ) by Machines</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft COPQM" ></span></p>
          </div>
          <div class="parent_graph_quality_machine_wise parent_graph_div parent-style">
            <div class="child_graph_quality_machine_wise child-style">
              <canvas id="COPQM" height="110"></canvas>
            </div>  
          </div>
        </div>
        <div class="grid-item mar-right mar-top paddingm" style="width:48.5%;margin-right:0.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Quality Rejection by Machines with Reasons</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><span class="paddingm valueMarLeft CRBMR" ></span></p>
          </div>
          <div class="parent_graph_quality_machine_reason parent_graph_div parent-style">
            <div class="child_graph_quality_machine_reason child-style">
              <canvas id="CRBMR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row paddingm" style="height: 15rem;width:100%;">
        <div class="grid-item mar-left mar-top paddingm" style="width:48.5%;margin-left:0.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Cost of Poor Quality (COPQ) by Parts</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft CQRP" ></span></p>
          </div>
          <div class="parent_graph_quality_parts parent_graph_div parent-style">
            <div class="child_graph_quality_parts child-style">
              <canvas id="CQRP" height="110"></canvas>
            </div>
          </div>
        </div>
        <div class="grid-item mar-right mar-top paddingm" style="width:48.5%;margin-right:0.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Quality Rejection by Parts with Reasons</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><span class="paddingm valueMarLeft CQRPR" ></span></p>
          </div>
          <div class="parent_graph_quality_part_reason parent_graph_div parent-style">
            <div class="child_graph_quality_part_reason child-style">
              <canvas id="CQRPR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
      <div class="container-fluid paddingm ">
        <div>
            
        </div>
        <div class="d-flex innerNav">
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <input type="number" class="form-control font_weight" name="" id="pagination_val" style="width: 4rem;">
            </div>
          </div>
          <div class="box rightmar center-align font_color" style="margin-right: 0.5rem;">
            <p class="paddingm">of <span id="total_pagination"></span> pages</p>
          </div>
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <select class="form-select font_weight" name="" id="Production_MachineName" style="width: 10rem;">
              </select>
              <label for="inputSiteNameAdd" class="input-padding ">Search</label>
            </div>
          </div>
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="part_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_part">
                </div>
              </div>
              <label for="partNameFilter" class="input-padding">Part Name</label>
            </div>
          </div>

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_machine()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="machine_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_machine">
                </div>
              </div>
              <label for="machineNameFilter" class="input-padding ">Machine Name</label>
            </div>
          </div> 
          
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_reason()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="reason_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_reason">
                </div>
              </div>
              <label for="reasonNameFilter" class="input-padding ">Reason</label>
            </div>
          </div> 

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_user()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="user_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_user">
                </div>
              </div>
              <label for="userNameFilter" class="input-padding ">Created by</label>
            </div>
          </div> 

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <!-- <a style="background: #005abc;color: white;width:9rem;" class="settings_nav_anchor float-end" id="add_machine_button" onclick="getFilterval()">Apply</a>  -->
            <button class="btn fo bn filterbtnstyle settings_nav_anchor float-end" style="margin-block:auto;" id="add_machine_button" onclick="getFilterval()">Apply Filter</button>
          </div>
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;">
          </div>
        </div>
      </div>
    </nav>
    <div class="tableContent">
      <div class="settings_machine_header sticky-top fixtabletitle">
        <div class="row paddingm">
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">FROM DATE</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">FROM TIME</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">TO TIME</p>
          </div>
          <div class="col-sm-1 p3 paddingm marleft" >
            <p class="basic_header">PART NAME </p>
          </div>
          <div class="col-sm-2 p3 paddingm marleft">
            <p class="basic_header">MACHINE</p>
          </div>
          <div class="col-sm-2 p3 paddingm">
            <p class="basic_header">REJECT COUNTS</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">REASON</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">UPDATED BY</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">UPDATED AT</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">NOTES</p>
          </div>
        </div>
      </div>

      <div class="contentQualityFilter contentContainer paddingm " style="margin-bottom:0rem;">
      </div>
    </div>
    </div>
  </div>


<!--   temporary hide this tags because its ui changes
  <div style="margin-top: 4.2rem;display: none;" id="graph-container-div"> 
    <div class="grid-container">
      <div class="row paddingm" style="height: 15rem;">
        <div class="grid-item mar-left paddingm" style="margin-top: 1.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Cost of Poor Quality (COPQ) by Reason</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft COPQP" ></span></p>
          </div>
          <div class="parent_graph_quality_opportunity parent_graph_div parent-style">
            <div class="child_graph_quality_opportunity child-style">
              <canvas id="COPQP" height="110"></canvas>
            </div>
          </div>
        </div>
        <div class="grid-item mar-right paddingm" style="margin-top: 1.5rem;">
          <div>
            <p class="paddingm fontBold financial_font">Quality Rejection by Reason</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><span class="paddingm valueMarLeft CRBR" ></span></p>
          </div>
          <div class="parent_graph_quality_reason_wise parent_graph_div parent-style">
            <div class="child_graph_quality_reason_wise child-style">
              <canvas id="QRBR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="row paddingm" style="height: 15rem">
        <div class="grid-item mar-left mar-top paddingm">
          <div>
            <p class="paddingm fontBold financial_font">Cost of Poor Quality (COPQ) by Machines</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft COPQM" ></span></p>
          </div>
          <div class="parent_graph_quality_machine_wise parent_graph_div parent-style">
            <div class="child_graph_quality_machine_wise child-style">
              <canvas id="COPQM" height="110"></canvas>
            </div>  
          </div>
        </div>
        <div class="grid-item mar-right mar-top paddingm">
          <div>
            <p class="paddingm fontBold financial_font">Quality Rejection by Machines with Reasons</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><span class="paddingm valueMarLeft CRBMR" ></span></p>
          </div>
          <div class="parent_graph_quality_machine_reason parent_graph_div parent-style">
            <div class="child_graph_quality_machine_reason child-style">
              <canvas id="CRBMR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row paddingm" style="height: 15rem">
        <div class="grid-item mar-left mar-top paddingm">
          <div>
            <p class="paddingm fontBold financial_font">Cost of Poor Quality (COPQ) by Parts</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><i class="fa fa-inr" aria-hidden="true"></i><span class="paddingm valueMarLeft CQRP" ></span></p>
          </div>
          <div class="parent_graph_quality_parts parent_graph_div parent-style">
            <div class="child_graph_quality_parts child-style">
              <canvas id="CQRP" height="110"></canvas>
            </div>
          </div>
        </div>
        <div class="grid-item mar-right mar-top paddingm">
          <div>
            <p class="paddingm fontBold financial_font">Quality Rejection by Parts with Reasons</p>
          </div>
          <div class="valueMarLeft">
              <p class="paddingm headTitle">TOTAL</p>
              <p class="paddingm valueGraph" style="margin-left:0.4rem;"><span class="paddingm valueMarLeft CQRPR" ></span></p>
          </div>
          <div class="parent_graph_quality_part_reason parent_graph_div parent-style">
            <div class="child_graph_quality_part_reason child-style">
              <canvas id="CQRPR" height="110"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
<!--  temporary hide this tags because its ui changes
  <div style="margin-top: 3.8rem;display: block;" id="table-container">
    <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
      <div class="container-fluid paddingm ">
        <div>
            
        </div>
        <div class="d-flex innerNav">
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <input type="number" class="form-control font_weight" name="" id="pagination_val" style="width: 4rem;">
            </div>
          </div>
          <div class="box rightmar center-align font_color" style="margin-right: 0.5rem;">
            <p class="paddingm">of <span id="total_pagination"></span> pages</p>
          </div>
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <select class="form-select font_weight" name="" id="Production_MachineName" style="width: 10rem;">
              </select>
              <label for="inputSiteNameAdd" class="input-padding ">Search</label>
            </div>
          </div>
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="part_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_part">
                </div>
              </div>
              <label for="partNameFilter" class="input-padding">Part Name</label>
            </div>
          </div>

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_machine()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="machine_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_machine">
                </div>
              </div>
              <label for="machineNameFilter" class="input-padding ">Machine Name</label>
            </div>
          </div> 
          
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_reason()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="reason_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_reason">
                </div>
              </div>
              <label for="reasonNameFilter" class="input-padding ">Reason</label>
            </div>
          </div> 

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <div class="input-box">
              <div class="filter_multiselect">
                <div class="filter_selectBox" onclick="multiple_drp_user()">
                  <div class="inbox-span fontStyle search_style"><p class="paddingm" id="user_text">Select</p></div>
                </div>
                <div class="filter_checkboxes filter_user">
                </div>
              </div>
              <label for="userNameFilter" class="input-padding ">Created by</label>
            </div>
          </div> 

          <div class="box rightmar" style="margin-right: 0.5rem;">
            <button class="btn fo bn filterbtnstyle settings_nav_anchor float-end" style="margin-block:auto;" id="add_machine_button" onclick="getFilterval()">Apply Filter</button>
          </div>
          <div class="box rightmar" style="margin-right: 0.5rem;">
            <img src="<?php echo base_url('assets/img/filter_reset.png'); ?>" class="undo" style="font-size:20px;color: #b5b8bc;cursor: pointer;width:1.3rem;height:1.3rem;">
          </div>
        </div>
      </div>
    </nav>
    <div class="tableContent">
      <div class="settings_machine_header sticky-top fixtabletitle">
        <div class="row paddingm">
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">FROM DATE</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">FROM TIME</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">TO TIME</p>
          </div>
          <div class="col-sm-1 p3 paddingm marleft" >
            <p class="basic_header">PART NAME </p>
          </div>
          <div class="col-sm-2 p3 paddingm marleft">
            <p class="basic_header">MACHINE</p>
          </div>
          <div class="col-sm-2 p3 paddingm">
            <p class="basic_header">REJECT COUNTS</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">REASON</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">UPDATED BY</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">UPDATED AT</p>
          </div>
          <div class="col-sm-1 p3 paddingm">
            <p class="basic_header">NOTES</p>
          </div>
        </div>
      </div>

      <div class="contentQualityFilter contentContainer paddingm " style="margin-bottom:0rem;">
       
      </div>
    </div>

  </div> -->
</div>

<script type="text/javascript">

  var filter_array = [];
 
  function getFilterval(){
    var part=[];
    var machine =[];
    var reason= [];
    var user= [];

    // Part Values...
    var part_flag=0;
    $.each($("input[name='part_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        part_flag =1;
      }
      else{
        part.push($(this).val());
      }
    });
    if (part_flag==1) {
      part=[];
      $.each($("input[name='part_filter_val']"), function(){
      if (($(this).val() != "all")) {
        part.push($(this).val());
      }
    });
    }

    // Machine Values...
    var machine_flag=0;
    $.each($("input[name='machine_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        machine_flag =1;
      }
      else{
        machine.push($(this).val());
      }
    });
    if (machine_flag==1) {
      machine=[];
      $.each($("input[name='machine_filter_val']"), function(){
      if (($(this).val() != "all")) {
        machine.push($(this).val());
      }
    });
    }


    // Reason Values...
    var reason_flag=0;
    $.each($("input[name='reason_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        reason_flag =1;
      }
      else{
        reason.push($(this).val());
      }
    });
    if (reason_flag==1) {
      reason=[];
      $.each($("input[name='reason_filter_val']"), function(){
      if (($(this).val() != "all")) {
        reason.push($(this).val());
      }
    });
    }


    // User Values...
    var user_flag=0;
    $.each($("input[name='user_filter_val']:checked"), function(){
      if (($(this).val() == "all")) {
        user_flag =1;
      }
      else{
        user.push($(this).val());
      }
    });
    if (user_flag==1) {
      user=[];
      $.each($("input[name='user_filter_val']"), function(){
      if (($(this).val() != "all")) {
        user.push($(this).val());
      }
    });
    }

    getTableData(part,machine,reason,user);
  }

  var dt = new Date();
  $('.fromDate').datetimepicker({  
    format:'Y-m-d H:00:00',
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


  myFun();

  $(document).on('blur','.fromDate',function(){
    myFun();
  });
  $(document).on('blur','.toDate',function(){
    myFun();
  });
  function myFun(){
      f = $('.fromDate').val(); 
      t = $('.toDate').val();

      if ((new Date(f) >= new Date(t)) || (t=="")) {
        var x = new Date(f)
        t = x.setHours(x.getHours() + 1);
        t= new Date(t);
        var tdate = t.getFullYear()+"-"+("0" + (parseInt(t.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + t.getDate()).slice(-2)+" "+("0" + t.getHours()).slice(-2)+":00:00";
        $('.toDate').val(tdate);
        t = $('.toDate').val();
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

      $('.fromDate').val(fdate);
      $('.toDate').val(tdate);
      f = $('.fromDate').val();
      t = $('.toDate').val();
    }
    copqp();
    qrbr();
    copqm();
    crbmr();
    qualitybyparts();
    qualitybyreasonparts();
  
  }

function multiple_drp() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_part').css("display") == "none") {
      $('.filter_part').css("display","block");
  } else {
      $('.filter_part').css("display","none");
  }
}

function multiple_drp_machine() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_machine').css("display") == "none") {
      $('.filter_machine').css("display","block");
  } else {
      $('.filter_machine').css("display","none");
  }
}

function multiple_drp_reason() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_reason').css("display") == "none") {
      $('.filter_reason').css("display","block");
  } else {
      $('.filter_reason').css("display","none");
  }
}


function multiple_drp_user() {
  $('.filter_checkboxes').css("display","none");
  if ($('.filter_user').css("display") == "none") {
      $('.filter_user').css("display","block");
  } else {
      $('.filter_user').css("display","none");
  }
}


$(document).on('click','.inbox_part',function(event){
  var index = $('.inbox_part').index(this);
  if(index==0 && $( ".filter_part_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_part_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_part_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_part_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_part_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_part_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_part_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_part_val').length;
  var l2 = $('.filter_part_val:checked').length;
  if (l2 < l1) {
    $( ".filter_part_val:eq(0)").prop( "checked", false );
  }

  // part count
  var part_count = 0;
  var check_if = $('.filter_part_val');
  jQuery('.filter_part_val').each(function(index){
    if (check_if[index].checked===true) {
      part_count = parseInt(part_count)+1;
    }
  });

  var part_len = $('.filter_part_val').length;
  part_len = parseInt(part_len)-1;
  if (parseInt(part_count)>=parseInt(part_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#part_text').text(parseInt(part_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_part();
      $('#part_text').text('All');
    }
  }else if(((parseInt(part_count)<parseInt(part_len))) && (parseInt(part_count)>0)){
    $('#part_text').text(parseInt(part_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#part_text').text('No Part');
  }

});



$(document).on('click','.inbox_machine',function(event){
  var index = $('.inbox_machine').index(this);
  if(index==0 && $( ".filter_machine_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_machine_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_machine_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_machine_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_machine_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_machine_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_machine_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_machine_val').length;
  var l2 = $('.filter_machine_val:checked').length;
  if (l2 < l1) {
    $( ".filter_machine_val:eq(0)").prop( "checked", false );
  }


  
  // machine count
  var machine_count = 0;
  var check_if = $('.filter_machine_val');
  jQuery('.filter_machine_val').each(function(index){
    if (check_if[index].checked===true) {
      machine_count = parseInt(machine_count)+1;
    }
  });

  var machine_len = $('.filter_machine_val').length;
  machine_len = parseInt(machine_len)-1;
  if (parseInt(machine_count)>=parseInt(machine_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#machine_text').text(parseInt(machine_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_machine();
      $('#machine_text').text('All');
    }
  }else if(((parseInt(machine_count)<parseInt(machine_len))) && (parseInt(machine_count)>0)){
    $('#machine_text').text(parseInt(machine_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#machine_text').text('No Machine');
  }

});

$(document).on('click','.inbox_reason',function(event){
  var index = $('.inbox_reason').index(this);
  if(index==0 && $( ".filter_reason_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_reason_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_reason_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_reason_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_reason_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_reason_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_reason_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_reason_val').length;
  var l2 = $('.filter_reason_val:checked').length;
  if (l2 < l1) {
    $( ".filter_reason_val:eq(0)").prop( "checked", false );
  }

  
  
  // Reason  count
  var reason_count = 0;
  var check_if = $('.filter_reason_val');
  jQuery('.filter_reason_val').each(function(index){
    if (check_if[index].checked===true) {
      reason_count = parseInt(reason_count)+1;
    }
  });

  var reason_len = $('.filter_reason_val').length;
  reason_len = parseInt(reason_len)-1;
  if (parseInt(reason_count)>=parseInt(reason_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#reason_text').text(parseInt(reason_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_reason();
      $('#reason_text').text('All');
    }
  }else if(((parseInt(reason_count)<parseInt(reason_len))) && (parseInt(reason_count)>0)){
    $('#reason_text').text(parseInt(reason_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#reason_text').text('No Reason');
  }


});

$(document).on('click','.inbox_user',function(event){
  var index = $('.inbox_user').index(this);
  if(index==0 && $( ".filter_user_val:eq('"+index+"')").prop( "checked")==true){
    $( ".filter_user_val").prop( "checked", false );
  }
  else if(index==0 && $( ".filter_user_val:eq('"+index+"')").prop( "checked")==false){
    $( ".filter_user_val").prop( "checked", true );
  }
  else{
    if ($( ".filter_user_val:eq('"+index+"')").prop( "checked")==true) {
      $( ".filter_user_val:eq('"+index+"')").prop( "checked", false );
    }
    else{
      $( ".filter_user_val:eq('"+index+"')").prop( "checked", true );
    }
  }
  var l1 = $('.filter_user_val').length;
  var l2 = $('.filter_user_val:checked').length;
  if (l2 < l1) {
    $( ".filter_user_val:eq(0)").prop( "checked", false );
  }

  
  
  // user  count
  var user_count = 0;
  var check_if = $('.filter_user_val');
  jQuery('.filter_user_val').each(function(index){
    if (check_if[index].checked===true) {
      user_count = parseInt(user_count)+1;
    }
  });

  var user_len = $('.filter_user_val').length;
  user_len = parseInt(user_len)-1;
  if (parseInt(user_count)>=parseInt(user_len)) {
      if(check_if[0].checked===true){
        check_if[0].checked=true;
        $('#user_text').text(parseInt(user_count)-1+' Selected');
      }else{
      // check_if[0].checked=true;
      reset_created();
      $('#user_text').text('All');
    }
  }else if(((parseInt(user_count)<parseInt(user_len))) && (parseInt(user_count)>0)){
    $('#user_text').text(parseInt(user_count)+' Selected');
    // check_if[0].checked=false;
  }else {
    $('#user_text').text('No users');
  }
});



function qualitybyreasonparts() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Production_Quality/qualityOpportunitypartsreason'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      // $('#qualityOpportunity').remove();
      // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
      // $('.chartjs-hidden-iframe').remove();

      // res=res["QualityOpportunity"]
      $(".CQRPR").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
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

      var totalVal =[];
      res['Total'].forEach(function(t){
          totalVal.push(t);
      }); 

      var lab = [];
      res['Part_List'].forEach(function(t){
        lab.push(t['part_name']);
      });

      var category_percent =1.0;
      var bar_space=0.5;

      while(true){
        var len= totalVal.length;
        if (len < 8) {
          totalVal.push("");
        }
        else if(len > 8){
          var l = parseInt(len)%parseInt(8);  
          var w= parseInt($('.parent_graph_quality_part_reason').css("width"))+parseInt(10);
          $('.child_graph_quality_part_reason').css("width",w+"px");
          break;
        }
        else{
          break;
        }
      }

      oppCost = [
        {
          label:"Total",
          type: "line",
          backgroundColor: "white",
          borderColor: "#d9d9ff",
          borderWidth: 1,
          showLine : false,
          fill: false,
          // reject:totalReject, 
          data:totalVal,
          // partName:partNameTotal,
          pointRadius: 7,
        }           
      ];

      var x=1;
      res['Part'].forEach(function(item){
        var ar=[];
        item['part_1'].forEach(function(val){
          ar.push(val['reject']);
        });
        oppCost.push({
          label: "partName",
          type: "bar",
          backgroundColor: "#004b9b",
          borderColor: color[x],
          borderWidth: 1,
          fill: true,
          // reject:a,
          data: ar,
          // partName:partNameHover,
          categoryPercentage:category_percent,
          barPercentage:bar_space,
        });
        x=x+1;
      });
            var ctx = document.getElementById("CQRPR").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: lab,
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
                  // external: qualityOpp,
                }
              },
            },
          });
        },
    error:function(res){
      // console.log("Sorry!Try Agian!!!!");
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}



function copqp() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Production_Quality/qualityOpportunity'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      // $('#qualityOpportunity').remove();
      // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
      // $('.chartjs-hidden-iframe').remove();

      // res=res["QualityOpportunity"]
      $(".COPQP").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
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

      var category_percent =1.0;
      var bar_space=0.5;

      while(true){
        var len= reasonList.length;
        if (len < 8) {
          reasonList.push("");
        }
        else if(len > 8){
          var l = parseInt(len)%parseInt(8);
          var w= parseInt($('.parent_graph_quality_opportunity').css("width"))+parseInt(l*5*16);
          $('.child_graph_quality_opportunity').css("width",w+"px");
          break;
        }
        else{
          break;
        }
      }

      // oppCost = [
      //   {
      //     label:"Total",
      //     type: "bar",
      //     backgroundColor: "#004b9b",
      //     borderColor: "#d9d9ff",
      //     borderWidth: 1,
      //     showLine : false,
      //     fill: false,
      //     // reject:totalReject, 
      //     data:totalVal,
      //     partName:partNameTotal,
      //     pointRadius: 7,
      //   }           
      // ];

      oppCost = [
        {
          label:"Total",
          type: "bar",
          backgroundColor: "#004b9b",
          borderColor: "#d9d9ff",
          borderWidth: 1,
          showLine : false,
          fill: false,
          // reject:totalReject, 
          data:totalVal,
          partName:partNameTotal,
          categoryPercentage:1.5,
          barPercentage:0.5,
        }           
      ];

        // oppCost.push({
        //   label: "partName",
        //   type: "bar",
        //   backgroundColor: "#004b9b",
        //   borderColor: color[x],
        //   borderWidth: 1,
        //   fill: true,
        //   // reject:a,
        //   data: totalVal,
        //   // partName:partNameHover,
        //   categoryPercentage:category_percent,
        //   barPercentage:bar_space,
        // });
            var ctx = document.getElementById("COPQP").getContext('2d');
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
                      stacked:true,
                      ticks: { 
                        color: '#A6A6A6', 
                        beginAtZero: true 
                      }
                  },
              },
              plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                  enabled: false,
                  // borderColor:"red",
                  // external: qualityOpp,
                },
              },
            },
          });
        },
    error:function(res){
      // console.log("Sorry!Try Agian!!!!");
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}

function qualitybyparts() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Production_Quality/qualityOpportunityparts'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      // $('#qualityOpportunity').remove();
      // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
      // $('.chartjs-hidden-iframe').remove();

      // res=res["QualityOpportunity"]
      $(".CQRP").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
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
        

      var totalVal =[];
      var partNameTotal=[];
      res['Part'].forEach(function(t){
          totalVal.push(t['cost']);
          partNameTotal.push(t['part_name']);
      }); 

      var category_percent =1.0;
      var bar_space=0.5;

      while(true){
        var len= partNameTotal.length;
        if (len < 8) {
          partNameTotal.push("");
        }
        else if(len > 8){
          var l = parseInt(len)%parseInt(8);  
          var w= parseInt($('.parent_graph_quality_parts').css("width"))+parseInt(l*5*16);
          $('.child_graph_quality_parts').css("width",w+"px");
          break;
        }
        else{
          break;
        }
      }


      oppCost = [
        {
          label:"Total",
          type: "bar",
          backgroundColor: "#004b9b",
          borderColor: "#d9d9ff",
          borderWidth: 1,
          showLine : false,
          fill: false,
          // reject:totalReject, 
          data:totalVal,
          partName:partNameTotal,
          // pointRadius: 7,
          categoryPercentage:category_percent,
          barPercentage:bar_space,
        }           
      ];

        // oppCost.push({
        //   label: "partName",
        //   type: "bar",
        //   backgroundColor: "#004b9b",
        //   borderColor: color[x],
        //   borderWidth: 1,
        //   fill: true,
        //   // reject:a,
        //   data: totalVal,
        //   // partName:partNameHover,
        //   categoryPercentage:category_percent,
        //   barPercentage:bar_space,
        // });
            var ctx = document.getElementById("CQRP").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: partNameTotal,
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
                      stacked:true,
                      ticks: { 
                        color: '#A6A6A6', 
                        beginAtZero: true 
                      }
                  },
              },
              plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                  enabled: false,
                  // borderColor:"red",
                  // external: qualityOpp,
                }
              },
            },
          });
        },
    error:function(res){
      // console.log("Sorry!Try Agian!!!!");
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}

function crbmr() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Production_Quality/qualityOpportunityMachineReason'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      // $('#qualityOpportunity').remove();
      // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
      // $('.chartjs-hidden-iframe').remove();

      // res=res["QualityOpportunity"]
      $(".CRBMR").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
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
      var machineTotal =[];
      res['Total'].forEach(function(res){
          machineTotal.push(res);
      });


      var machineList =[];
      res['Machine_name'].forEach(function(res){
          machineList.push(res);
      });

      var category_percent =1.0;
      var bar_space=0.5;

      while(true){
        var len= machineTotal.length;
        if (len < 8) {
          machineTotal.push("");
        }
        else if(len > 8){
          var l = parseInt(len)%parseInt(8);  
          var w= parseInt($('.parent_graph_quality_machine_reason').css("width"))+parseInt(l*5*16);
          $('.child_graph_quality_machine_reason').css("width",w+"px");
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
          data:machineTotal,
          pointRadius: 7,
        }           
      ];

      var x = 1;
      res['Rejection'].forEach(function(reasonWise){
        var arr=[];
        console.log(reasonWise);
        // reasonWise['Machine'].forEach(function(machineWise){
        //   // console.log(machineWise);
        //   // arr.push(machineWise['Rejection']);
        // });
        oppCost.push({
          label: "partName",
          type: "bar",
          backgroundColor: "#004b9b",
          borderColor: color[x],
          borderWidth: 1,
          fill: true,
          // reject:a,
          data: arr,
          // partName:partNameHover,
          categoryPercentage:category_percent,
          barPercentage:bar_space,
        });
        x=x+1;
      });

        

            var ctx = document.getElementById("CRBMR").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: machineList,
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
                      stacked:true,
                      ticks: { 
                        color: '#A6A6A6', 
                        beginAtZero: true 
                      }
                  },
              },
              plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                  enabled: false,
                  // borderColor:"red",
                  // external: qualityOpp,
                }
              },
            },
          });
        },
    error:function(res){
      // console.log("Sorry!Try Agian!!!!");
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}

function copqm() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Production_Quality/qualityOpportunityMachine'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      // $('#qualityOpportunity').remove();
      // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
      // $('.chartjs-hidden-iframe').remove();

      // res=res["QualityOpportunity"]
      $(".COPQM").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
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
      var machineList =[];
      res['Machine'].forEach(function(res){
          machineList.push(res);
      });

      var machineTotal=[];
      res['MachineCost'].forEach(function(t){
          machineTotal.push(t);
      }); 

      var category_percent =1.0;
      var bar_space=0.5;

      while(true){
        var len= machineList.length;
        if (len < 8) {
          machineList.push("");
        }
        else if(len > 8){
          var l = parseInt(len)%parseInt(8);  
          var w= parseInt($('.parent_graph_quality_machine_wise').css("width"))+parseInt(l*18*16);
          $('.child_graph_quality_machine_wise').css("width",w+"px");
          break;
        }
        else{
          break;
        }
      }

      oppCost = [
        {
            label: "partName",
          type: "bar",
          backgroundColor: "#004b9b",
          borderColor: "#004b9b",
          borderWidth: 1,
          fill: true,
          // reject:a,
          data: machineTotal,
          // partName:partNameHover,
          categoryPercentage:category_percent,
          barPercentage:bar_space,
        }           
      ];

        // oppCost.push({
        //   label: "partName",
        //   type: "bar",
        //   backgroundColor: "#004b9b",
        //   borderColor: color[x],
        //   borderWidth: 1,
        //   fill: true,
        //   // reject:a,
        //   data: totalVal,
        //   // partName:partNameHover,
        //   categoryPercentage:category_percent,
        //   barPercentage:bar_space,
        // });

            var ctx = document.getElementById("COPQM").getContext('2d');
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: machineList,
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
                      stacked:true,
                      ticks: { 
                        color: '#A6A6A6', 
                        beginAtZero: true 
                      }
                  },
              },
              plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                  enabled: false,
                  // borderColor:"red",
                  // external: qualityOpp,
                }
              },
            },
          });
        },
    error:function(res){
      // console.log("Sorry!Try Agian!!!!");
        alert("Sorry!Try Agian!!!!");
    }
  }); 
}

function qrbr() {
  f = $('.fromDate').val();
  t = $('.toDate').val();
  f = f.replace(" ","T");
  t = t.replace(" ","T");
  $.ajax({
    url: "<?php echo base_url('Production_Quality/qualityOpportunityRejectionWise'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
      // $('#qualityOpportunity').remove();
      // $('.child_graph_quality_opportunity').append('<canvas id="qualityOpportunity"><canvas>');
      // $('.chartjs-hidden-iframe').remove();

      // res=res["QualityOpportunity"]
      $(".CRBR").html(parseInt(res.GrandTotal).toLocaleString("en-IN"));
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
      res['Rejection'].forEach(function(t){
          totalVal.push(t);
          partNameTotal.push("Total");
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
          var w= parseInt($('.parent_graph_quality_reason_wise').css("width"))+parseInt(l*10*16);
          $('.child_graph_quality_reason_wise').css("width",w+"px");
          break;
        }
        else{
          break;
        }
      }

      oppCost = [
        {
          label:"Total",
          type: "bar",
          backgroundColor: "#004b9b",
          borderColor: "#d9d9ff",
          borderWidth: 1,
          showLine : false,
          fill: false,
          // reject:totalReject, 
          data:totalVal,
          partName:partNameTotal,
          // pointRadius: 7,
          categoryPercentage:category_percent,
          barPercentage:bar_space,
        }           
      ];

        // oppCost.push({
        //   label: "partName",
        //   type: "bar",
        //   backgroundColor: "#004b9b",
        //   borderColor: color[x],
        //   borderWidth: 1,
        //   fill: true,
        //   // reject:a,
        //   data: totalVal,
        //   // partName:partNameHover,
        //   categoryPercentage:category_percent,
        //   barPercentage:bar_space,
        // });
            var ctx = document.getElementById("QRBR").getContext('2d');
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
                      stacked:true,
                      ticks: { 
                        color: '#A6A6A6', 
                        beginAtZero: true 
                      }
                  },
              },
              plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                  enabled: false,
                  // borderColor:"red",
                  // external: qualityOpp,
                }
              },
            },
          });
        },
    error:function(res){
      // console.log("Sorry!Try Agian!!!!");
        alert("Sorry!Try Agian!!!!");
    }
  }); 

}

$(document).on('click','#graph-cont',function(event){
  $("#graph-container-div").css("display","block");
  $("#table-container").css("display","none");
});
$(document).on('click','#table-cont',function(event){
  $("#graph-container-div").css("display","none");
  $("#table-container").css("display","block");
});


getfilterdata();

function getfilterdata() {
  $('.filter_part').empty();
  $('.filter_machine').empty(); 
  $('.filter_reason').empty();
  $('#userNameFilter').empty();
  
  $.ajax({
    url: "<?php echo base_url('Production_Quality/getfilterdata'); ?>",
    type: "POST",
    dataType: "json",
    success:function(res){
      // Part Filter
      var elements = $();
      $('.filter_part').append('<div class="inbox inbox_part" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_part_val" name="part_filter_val" value="all" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">All</p>'
                                +'</div>'
                              +'</div>');
      res['Part'].forEach(function(item){
        $('.filter_part').append('<div class="inbox inbox_part" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_part_val" name="part_filter_val" value="'+item.part_id+'" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">'+item.part_id+"-"+item.part_name+'</p>'
                                +'</div>'
                              +'</div>');
      });    

      // Machine Filter
      var elements1 = $();
      $('.filter_machine').append('<div class="inbox inbox_machine" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_machine_val" name="machine_filter_val" value="all" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">All</p>'
                                +'</div>'
                              +'</div>');
      res['Machine'].forEach(function(item){
        $('.filter_machine').append('<div class="inbox inbox_machine" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_machine_val" name="machine_filter_val" value="'+item.machine_id+'" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
                                +'</div>'
                              +'</div>');
      });


      // Reason Filter
      var elements2 = $();
      $('.filter_reason').append('<div class="inbox inbox_reason" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_reason_val" name="reason_filter_val" value="all" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">All</p>'
                                +'</div>'
                              +'</div>');
      res['Reason'].forEach(function(item){
        $('.filter_reason').append('<div class="inbox inbox_reason" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_reason_val" name="reason_filter_val" value="'+item.quality_reason_id+'" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">'+item.quality_reason_id+"-"+item.quality_reason_name+'</p>'
                                +'</div>'
                              +'</div>');
      });

      // User Filter
      var elements3 = $();
      $('.filter_user').append('<div class="inbox inbox_user" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_user_val" name="user_filter_val" value="all" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">All</p>'
                                +'</div>'
                              +'</div>');
      res['Created_By'].forEach(function(item){
        $('.filter_user').append('<div class="inbox inbox_user" style="display: flex;">'
                                +'<div style="float: left;width: 20%;" class="center-align">'
                                  +'<input class="checkbox_part filter_user_val" name="user_filter_val" value="'+item.user_id+'" type="checkbox" checked/>'
                                +'</div>'
                                +'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
                                    +'<p class="inbox-span paddingm">'+item.user_id+"-"+item.first_name+'</p>'
                                +'</div>'
                              +'</div>');
      });
      getFilterval();
    },
    error:function(res){
      alert("Something went wrong!");
    }
  });
}

function getTableData(part,machine,reason,user){
    filter_array =[];
    $.ajax({
    url: "<?php echo base_url('Production_Quality/gettablefilterdata'); ?>",
    type: "POST",
    dataType: "json",
    async:false,
    data:{
      part:part,
      machine:machine,
      reason:reason,
      user:user
    },
    success:function(res){
      res.forEach(function(value, index) {
        filter_array.push(value);
      });
    },
    error:function(res){
      alert("Something went wrong!");
    }
  });
  $("#pagination_val").val(1);
  filter_table_data();
}

$('#pagination_val').on('change', function(event) {
  filter_table_data();
});

function filter_table_data(){
  $('.contentQualityFilter').empty();
  var pagination_length=10;
  total_pagination = Math.ceil((filter_array.length)/(pagination_length));
  $("#total_pagination").html(total_pagination);
  var x = $("#pagination_val").val();
  filter_array.forEach(function(value, index) {
    if ((index > (x*pagination_length)-(pagination_length+1)) && (index < (x*pagination_length))) {
      var elements = $();
      elements = elements.add('<div id="settings_div">'
                  +'<div class="row paddingm">'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['from_date']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['from_time']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['to_time']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['part_name']+'</p></div>'
                    +'<div class="col-sm-2 col marleft"><p class="rejection_font_color">'+value['machine_name']+'</p></div>'
                    +'<div class="col-sm-2 col marleft"><p class="rejection_color">'+value['total_reject']+'</p></div>' 
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['reason_name']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['user_name']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+value['updated_at']+'</p></div>'
                    +'<div class="col-sm-1 col marleft"><p class="rejection_font_color">'+"Notes"+'</p></div>'
                  +'</div>'
                +'</div>');
      $('.contentQualityFilter').append(elements);
    }
  });
}

// $(document).click(function() {
//     var container = $(".filter_selectBox");
//     if (!container.is(event.target) && !container.has(event.target).length) {
//         $(".filter_part").hide();
//         $(".filter_machine").hide();
//         $(".filter_reason").hide();
//         $(".filter_user").hide();
//     }
// });

// mouse up function dropdown outside click remove function  
$(document).mouseup(function(event){

  // part dropdown outside click
  var part_check = $('.filter_part');
  if (!part_check.is(event.target) && part_check.has(event.target).length==0) {
    part_check.hide();
    
  }

  // machine dropdown outside click
  var machine_check = $('.filter_machine');
  if (!machine_check.is(event.target) && machine_check.has(event.target).length==0) {
    machine_check.hide();
  }

  // reason dropdown outside click
  var reason_check = $('.filter_reason');
  if (!reason_check.is(event.target) && reason_check.has(event.target).length==0) {
    reason_check.hide();
  }

  // created by dropdown outside click
  var created_check = $('.filter_user');
  if (!created_check.is(event.target) && created_check.has(event.target).length==0) {
    created_check.hide();
  }

});

// undo button
$(document).on('click','.undo',function(event){
  event.preventDefault();

  reset_part();
  reset_machine();
  reset_reason();
  reset_created();
  getFilterval();

});

// reset part
function reset_part(){
  var machine_arr = $('.filter_part_val');
  jQuery('.filter_part_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#part_text').text('All Parts');
}

// reset machine 
function reset_machine(){
  var machine_arr = $('.filter_machine_val');
  jQuery('.filter_machine_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#filter_machine_val').text('All Machine');
}

// reset reason
function reset_reason(){
  var reason_arr = $('.filter_reason_val');
  jQuery('.filter_reason_val').each(function(index){
    reason_arr[index].checked=true;
  });
  $('#reason_text').text('All Machine');
}

// reset created by
function reset_created(){
  var created_arr = $('.filter_user_val');
  jQuery('.filter_user_val').each(function(index){
    created_arr[index].checked=true;
  });
  $('#user_text').text('All Machine');
}
</script>

