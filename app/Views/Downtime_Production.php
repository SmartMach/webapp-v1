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

<style type="text/css">
    #table_view_icon:hover{
        cursor: pointer;
    }
    #graph_view_icon:hover{
        cursor:pointer;
    }

     /*if graph icon clicked then shown this heght width container for graph*/
     .graphview_1{
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      align-items:center;
     }
      /*splited  halff container for 1st two graphs*/
     .graph_1div{
      display: flex;
      flex-wrap: wrap;
      align-items:center;
      height:100%;
      width:100%;   
      margin-top:1rem;
     }
      /* rupees symbol sdujustment*/
     .icon-margin{
      margin-top: 0;
      margin-left: 1rem;
     } 
     /* alignment  'total' text in inner graph */
      .texttotal{
      margin-bottom:0;
      margin-left:1rem;
      padding:0
}     
     /* spliting two graphs in first div*/
     .graph_01,.graph_02{
        width: 49%;
        height: 98%;
        border:1px solid #000000; 
        border-radius: 15px;
        margin-left: 0.5%;
        margin-top: 0.2rem;
         }
    /* spliting two graphs in second div*/
        .graph_03,.graph_04{
        width: 49%;
        height: 98%;
        border:1px solid #000000; 
        border-radius: 15px;
        margin-left: 0.5%;
        margin-top: 0.2rem;
         }

         /* graph header margin align */
    .graph_mar_align{
        margin-top:0.5rem;
        margin-left:1rem;
        color:#404040;
    }


    /* chartjs graph alignment css */
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
    

    /* table view design */
    .container_table{
        min-height: 10rem;
        width:102rem;
        overflow-x: scroll;
        overflow-y: hidden;
        box-sizing: border-box;
    }
    .table_row_flex{
        display: flex;
        flex-direction: row;
    }
    .fixed_col_class{
        /* height: 25rem; */
        width:23%;
        margin-left: 0;
        margin-top: 0;
        float: left;
        position: sticky;
        left:0;
        z-index:200;
    }
    .fixed_col_class2{
        /* height: 27rem; */
        float: left;
        z-index:100;
        width:70%;
    }
    .fixed_col_width{
        margin-left: 0.5rem;
        float:left;
        width: 98%;
    }
    .fixed_col_common{
        width:100%;
        height: 3.5rem;
        position:sticky;
        background-color: white;
        border-radius: 8px 0px 0px 8px ;
        border:1px solid #d9d9d9;
        border-right:0px;
        margin-top: 0.2rem;
    }
    .alignflex{
        display: flex;
        align-items: center;
    }
    .fixed_col_common2{
        width:100%;
        height: 3.5rem;
        background-color: white;
        border-radius: 0px 8px 8px 0px ;
        border:1px solid #d9d9d9;
        margin-top: 0.2rem;
        border-left: 0;
    }
    .header_fixed_col{
        border-radius:10px 0px 0px 10px;
        color:black;
        box-shadow:3px 0px 4px #e6e6e6;
        border:1px solid rgba(242,242,242);
        border-right:0px;
        margin-bottom:0.5rem;
        background:#fff;
        white-space:nowrap;
    }
    .red{
        font-size:13px;
        font-family:'Roboto' sans-serif;
        font-weight:500;
        color:#C00000;
    }
    .font_row{
        font-size:12px;
        font-family:'Roboto' sans-serif;
        font-weight:450;
        color:#404040;
    }

    /* notes height and width */
    
    .icon_img_wh{
      width: 1.2rem;
      height: 1.2rem;
    }
    .icon_img_wh:hover{
      width: 1.2rem;
      height: 1.2rem;
      color:red;
    }
    .notes_check{
        height:1.8rem;
        width:1.8rem;
        display:flex;
        justify-content:center;
        align-items:center;
        background-color:white;
        border-radius:50%;
    }
    .notes_check:hover {
    
        cursor: pointer;
        background-color:#e6e6e6;
    }

    /* notes display property */
   .notes_display{
    min-height:4.8rem;
    max-width:10.9rem;
    min-width:10rem;
    background-color:white;
    margin-left:-14rem; 
    border:1px solid #e6e6e6;
    padding:0.7rem;
    border-radius:10px;
    display:none;
   }
#total_duration_header{
    font-weight:600;    
}
  
  /* dropdown checkbox category */
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
    height:2.3rem;
    margin-top:0.5rem;
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
    height:2.3rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
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
    cursor:context-menu;
    width:100%;
  }

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

  /* dropdown checkbox created by */
  .filter_selectBox_cb{
    height:2.3rem;
    margin-top:0.5rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
  }
.multi_select_drp_cb{
    height:2.3rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.filter_overSelect_cb{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
.filter_checkboxes_cb{
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
    overflow-y:scroll;
    overflow-x:hidden;
}
.filter_checkboxes_cb label{
    display: block;
}
.filter_checkboxes_cb div:hover{
    background-color: #E7F2FF;
    padding:0;
    cursor:context-menu;
    width:100%;
}
.filter_check_cb{
    display:flex;
    padding-left:0.1rem;
    padding-right:0.5rem;
    justify-content:center;
    align-items:center;
    min-height:2rem;
    max-height:3rem;
}

/* reason dropdown checkbox */
.filter_selectBox_drpr{
    height:2.3rem;
    margin-top:0.5rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.multi_select_drp_r{
    height:2.3rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.filter_overSelect_r{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0; 
}
.filter_checkboxes_r{
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
    overflow-y:scroll;
    overflow-x:hidden;
}
.filter_checkboxes_r label{
    display:block;
}
.filter_checkboxes_r div:hover{
    background-color: #E7F2FF;
    padding:0;
    cursor:context-menu;
    width:100%;
}
.filter_check_r{
    display:flex;
    padding-left:0.1rem;
    padding-right:0.5rem;
    justify-content:center;
    align-items:center;
    min-height:2rem;
    max-height:3rem;
}


/* multiselect dropdown part name  */
.filter_selectBox_part{
    height:2.3rem;
    margin-top:0.5rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.multi_select_drp_part{
    height:2.3rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.filter_overSelect_part{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0; 
}
.filter_checkboxes_part{
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
    overflow-y:scroll;
    overflow-x:hidden;
}
.filter_checkboxes_part label{
    display:block;
}
.filter_checkboxes_part div:hover{
    background-color: #E7F2FF;
    padding:0;
    cursor:context-menu;
    width:100%;
}
.filter_check_part{
    display:flex;
    padding-left:0.1rem;
    padding-right:0.5rem;
    justify-content:center;
    align-items:center;
    min-height:2rem;
    max-height:3rem;
}

/* multiselect dropdwon machine  */
.filter_selectBox_machine{
    height:2.3rem;
    margin-top:0.5rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.multi_select_drp_machine{
    height:2.3rem;
    position:relative;
    min-width:9rem;
    font-size:12px;
    font-weight:500;
    color:#8c8c8c;
    border:1px solid #ced4da;
    border-radius:0.25rem;
}
.filter_overSelect_machine{
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0; 
}
.filter_checkboxes_machine{
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
    overflow-y:scroll;
    overflow-x:hidden;
}
.filter_checkboxes_machine label{
    display:block;
}
.filter_checkboxes_machine div:hover{
    background-color: #E7F2FF;
    padding:0;
    cursor:context-menu;
    width:100%;
}
.filter_check_machine{
    display:flex;
    padding-left:0.1rem;
    padding-right:0.5rem;
    justify-content:center;
    align-items:center;
    min-height:2rem;
    max-height:3rem;
}

/* graph font color and size */
.total_font_style{
    color:#005abc;
    font-size:1rem;
    font-weight:800;
}

/* font for multi select dropdown */
.font_multi_drp{
    font-family:'Roboto',sans-serif;
      font-weight:500;
      font-size:12px;
      margin:auto;
      user-select: none; 
      -webkit-user-select: none;
      -ms-user-select: none;
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
    <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav" style="position:fixed;margin-top:0;width:94%;">
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
        <div class="tab-pane fade show active" id="pills-graph" role="tabpanel" aria-labelledby="pills-graph-tab" tabindex="0">
            <!-- tamil design graph design -->
            <!-- <div id="graphview" class="graphview_1" style="margin-top:1rem;"> -->
                <div  class="graph_1div" >
                    <div class="graph_01 border" style="">
                        <!-- reason wise opportunity cost graph-->
                        <p  class="font graph_mar_align"> Downtime opportunity Cost by Reasons</p>
                        <div style="display:flex;flex-direction:row;padding-left:1rem;">
                            <div class="width:4%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><i class="fa fa-inr inr-class"></i><span id="reason_wise_oppcost_total"></span></p>
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
                        <div style="display:flex;flex-direction:row;padding-left:1rem;">
                            <div class="width:4%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><span id="reason_duration_text"></span></p>
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
                        <div style="display:flex;flex-direction:row;padding-left:1rem;">
                            <div class="width:4%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><i class="fa fa-inr inr-class"></i><span id="machine_wise_oppcost_total"></span></p>
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
                        <div style="display:flex;flex-direction:row;padding-left:1rem;">
                            <div class="width:4%;">
                                <div style="display:flex;flex-direction:column">
                                    <p style="color:#A6A6A6;font-size:11px;margin-bottom:0;">TOTAL</p>
                                    <p id="total_oppcost_by_reason" class="total_font_style"><span id="machine_reason_duration_text"></span></p>
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
            <div style="display:flex;flex-direction:row;height:3rem;align-items:center;">
                <div style="width:10%;display:flex;flex-direction:row;">
                    <div style="margin-left:1rem;font-size:12px;color:#8c8c8c;">
                        <input type="text" name="" id="pagination_val" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onblur="pagination_filter()" style="width:2rem;text-align:center;height:2rem;border:1px solid #e6e6e6;border-radius:0.25rem;margin-right:0.4rem;"><span>of <span id="total_page"></span>Pages</span>
                    </div>
                </div>
                <div style="width:90%;display:flex;flex-direction:row-reverse;align-items:center;">
                    <!-- <div style=""> -->
                        <!-- reset -->
                        <div class="" style="margin-top:0.5rem;">
                           <img src="<?php echo base_url(); ?>/assets/img/filter_reset.png" style="height:1.5rem;width:1.5rem;" class="table_reset" alt="">
                        </div>
                        <!-- filter button -->
                        <button class="btn fo bn saveNotes filterbtnstyle" style="" id="apply_filter_btn">Apply Filter</button>
                        
                        <!-- created by dropdown checkbox -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Created by</label>
                            <div class="filter_selectBox_cb" onclick="created_by_drp()">
                                <select  class="multi_select_drp_cb" style="" >
                                    <option id="text_created_by_drp" style="text-align:center;">Created by</option>
                                </select>
                                <div class="filter_overSelect_cb"></div>
                            </div>
                            <div class="filter_checkboxes_cb" style="" >
                                <!-- <div class="filter_check_cb" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="created_by_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">All </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- Reason dropdown checkbox -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Reason</label>
                            <div class="filter_selectBox_drpr" onclick="reason_drp()">
                                <select  class="multi_select_drp_r" style="" >
                                    <option id="text_reason_drp" style="text-align:center;">Reason</option>
                                </select>
                                <div class="filter_overSelect_r"></div>
                            </div>
                            <div class="filter_checkboxes_r" style="" >
                                <div class="filter_check_r" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="reason_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- dropdown checkbox category -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Category</label>
                            <div class="filter_selectBox" onclick="category_drp()">
                            <select  class="multi_select_drp" style="" >
                                <option id="text_category_drp" style="text-align:center;">All Categories</option>
                            </select>
                            <div class="filter_overSelect"></div>
                            </div>
                            <div class="filter_checkboxes" style="" >
                                <div class="filter_check_cate" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">All Categories</p>
                                    </div>
                                </div>

                                <div class="filter_check_cate" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox" value="Planned"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">Planned</p>
                                    </div>
                                </div>

                                <div class="filter_check_cate" style="">
                                    <div class="cate_drp_check" style="">
                                    <input type="checkbox" id="one" class="category_drp_checkbox" value="Unplanned"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                    <p class="font_multi_drp" style="margin:auto;">UnPlanned</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <!-- dropdown checkbox partname -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">PartName</label>
                            <div class="filter_selectBox_part" onclick="partname_drp()">
                                <select  class="multi_select_drp_part" style="" >
                                    <option id="text_category_drp_part" style="text-align:center;">All PartName</option>
                                </select>
                                <div class="filter_overSelect_part"></div>
                            </div>
                            <div class="filter_checkboxes_part" style="" >
                                <!-- <div class="filter_check_part" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="partname_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All</p>
                                    </div>
                                </div> -->

                            </div>
                        </div>

                        <!-- dropdown checkbox machine -->
                        <div class="box rightmar" style="margin-right: 0.5rem;" >
                            <label class="multi_select_label" style="">Machine Name</label>
                            <div class="filter_selectBox_machine" onclick="machinename_drp()">
                            <select  class="multi_select_drp_machine" style="" >
                                <option id="text_machine_drp" style="text-align:center;">All Machine</option>
                            </select>
                            <div class="filter_overSelect_part"></div>
                            </div>
                            <div class="filter_checkboxes_machine" style="" >
                                <!-- <div class="filter_check_machine" style="">
                                    <div class="cate_drp_check" style="">
                                        <input type="checkbox" id="one" class="machine_checkbox" value="all"/>
                                    </div>
                                    <div class="cate_drp_text" style="">
                                        <p class="font_multi_drp" style="margin:auto;">All</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <!-- keywords input -->
                        <div class="box rightmar" style="margin-right:0.5rem;margin-top:2.2rem;">
                            <div class="fieldStyle input-box">
                                <input type="text" class="form-control font_weight" id="filterkeyword" style="font-size:12px;height:2.4rem;" name="filterkeyword" placeholder="Search by Keyword">
                                <label for="filterkeyword" class="input-padding">Search</label>
                            </div>   
                        </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- table tamil code -->
            <div id="container_table" class="container_table" >
                <!--scroll sett-->
                <div style="width: 110rem;">
                    <!--first div for stiky start-->
                    <div class="table_row_flex">
                        <div class="fixed_col_class" >
                            <div class="fixed_col_width" >
                                <div class="fixed_col_common alignflex header_fixed_col" style="border-radius:10px 0px 0px 10px;box-shadow:0px 2px 3px 0px #e6e6e6;width:100%;">
                                    <div class=" font alignflex" style="width:30%;height:100%"> <span style="margin-left:1rem;">MACHINE</span></div>
                                    <div class="font alignflex"style="width:42%;height: 100%" > <span style="margin:auto;">FROM DATE & TO DATE</span></div>
                                    <div class="font alignflex"style="width:28%;height:100%"><span style="margin-left:1rem;">DURATION
                                        <br>(MIN)</span>
                                    </div>
                                </div>
                                <!-- rows in table view -->
                                <div class="fixed_rows">
                                    <!-- <div class="fixed_col_common alignflex" style="width:100%;">
                                        <div class="border-left font_row alignflex" style="width:30%;height: 100%;"><span style="margin-left:1rem;">Machine Name 1</span></div>
                                        <div class="font_row alignflex"style="width:42%;height: 100%"><span style="margin:auto;">15 Dec21,12:00</span></div>
                                        <div  class="red alignflex" style="width:28%;height: 100%;justify-content:flex-end;"><span style="margin-right:1rem;">35</span></div>
                                    </div> -->
                                </div>
                            </div>   
                        </div>
                        <!--first div for stiky end-->
                        <div class="fixed_col_class2" style="">
                            <div style="margin-left:0rem;margin-right:1rem;width:98%;">
                                <div  class="fixed_col_common2 alignflex header_fixed_col" style="border-radius:0px 10px 10px 0px;box-shadow:0px 2px 3px 0px #e6e6e6;border-left:0px;width:83%;">
                                    <div class="font alignflex " style="height:100%;width:15%;"> <span style="margin:auto   ;">TO DATE & TIME </span> </div>
                                    <div class="font alignflex" style="height:100%;width:10%;"> <span style="margin-left:1rem;">CATEGORY</span></div>
                                    <div class="font alignflex" style="height:100%;width:15%;"> <span style="margin-left:1rem;">REASON</span></div>
                                    <div class="font alignflex" style="height:100%;width:12%;"><span style="margin-left:1rem;">TOOL NAME</span></div>
                                    <div class="font alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">PART NAME</span></div>
                                    <div class="font alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">UPDATED BY</span></div>
                                    <div class="font alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">UPDATED AT</span></div>
                                    <div class="font alignflex" style="height:100%;width: 8%;"><span style="margin:auto;">NOTES</span></div>
                                </div>
                                <!-- rows in table view -->
                                <div class="scroll_rows">
                                    <!-- <div class="alignflex fixed_col_common2"  style="width:83%;">
                                        <div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;"> 15 DEC 21,12:35</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;"> Unplanned </span></div>
                                        <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;"> No Manpower</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;"> Tool Name 1</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">Part Name 1</span></div>
                                        <div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;"> Naveen</span></div>
                                        <div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">21 Dec 21,13:31</span></div>
                                        <div class="font_row alignflex" style="height:100%;width: 8%;justify-content:center;"><i class="fa fa-info fa-2x" ></i></div>
                                    </div> -->
                                </div>
                               
                            </div>
                            
                        </div>
                    </div>
                </div > 
                <!--scroll sett end-->
            </div> 
            <!-- table tamil code end -->

            <!-- <div class="tableContent">
                <div class="settings_machine_header sticky-top fixtabletitle">
                    <div class="row paddingm">
                        <div>
                            <div class="col-sm-1 p3 paddingm">
                            <p class="basic_header">MACHINE ID</p>
                            </div>
                            <div class="col-sm-2 p3 paddingm">
                            <p class="basic_header">MACHINE NAME</p>
                            </div>
                            <div class="col-sm-2 p3 paddingm mar_right">
                            <p class="basic_right">MACHINE RATE HOUR</p>
                            </div>
                        </div>
                        <div>
                            <div class="col-sm-2 p3 paddingm ">
                            <p class="basic_right">MACHINE OFF RATE HOUR</p>
                            </div>
                            <div class="col-sm-1 p3 paddingm">
                            <p class="basic_header">TONNAGE</p>
                            </div>
                            <div class="col-sm-2 p3 paddingm">
                            <p class="basic_header">MACHINE BRAND</p>
                            </div>
                            <div class="col-sm-1 p3 paddingm">
                            <p class="basic_header">STATUS</p>
                            </div>
                            <div class="col-sm-1 p3 paddingm" style="justify-content: center;">
                            <p class="basic_header">ACTION</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contentMachine contentContainer paddingm " style="margin-bottom:0rem;">
                    <div id="settings_div">
                        <div class="col-sm-1 col marleft" ><p>item.machine_id</p></div>
                        <div class="col-sm-2 col marleft" ><p title='+item.machine_name+'>item.machine_name</p></div>
                        <div class="col-sm-2 col marright" >
                            <p><i class="fa fa-inr" style="margin-right:5px;"></i>machine_rph</p>
                        </div>
                        <div class="col-sm-2 col marright" >
                            <p><i class="fa fa-inr" style="margin-right:5px;"></i>machine_orh</p>
                        </div>
                        <div class="col-sm-1 col marleft" ><p>'+item.tonnage+'T</p></div>
                        <div class="col-sm-2 col marleft" ><p>'+item.machine_brand+'</p></div>
                        <div class="col-sm-1 col marleft settings_active marleft" style="color:#005CBC;"><p style="color: #005CBC;"><i class="fa fa-circle" style="font-size:9px;margin-right:5px;margin-top:5px;"></i>Active</p></div>

                    </div>
                </div>
            </div> -->
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

<script type="text/javascript">


// filter multi select dropdwon downtime reasons
// filter option dropdown checkbox
var filter_expanded = false;

function category_drp() {
  // event.preventDefault();

  var checkboxes = document.getElementsByClassName("filter_checkboxes");
  if (!filter_expanded) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.filter_checkboxes').css("display","block");
      filter_expanded = true;
  } else  {
     
      $('#text_reason').text('All Reasons');
      $('.filter_checkboxes').css("display","none");
      filter_expanded = false;
  }
}


// filter created by function
var filter_created_by = false;
function created_by_drp(){
    var checkboxes = document.getElementsByClassName("filter_checkboxes_cb");
  if (!filter_created_by) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.filter_checkboxes_cb').css("display","block");
      filter_created_by = true;
  } else  {
     
      $('#text_reason').text('All Reasons');
      $('.filter_checkboxes_cb').css("display","none");
      filter_created_by = false;
  }
}

// reason dropdown function
var filter_reason = 0;
function reason_drp(){
    var checkboxes = document.getElementsByClassName("filter_checkboxes_r");
  if (!filter_created_by) {
      // checkboxes.style.display = "block";
    //   console.log("just click");
      $('.filter_checkboxes_r').css("display","block");
      filter_created_by = true;
  } else  {
     
      $('#text_reason').text('All Reasons');
      $('.filter_checkboxes_r').css("display","none");
      filter_created_by = false;
  }
}

// part name dropdown function 
var filter_partname = 0;
function partname_drp(){
    var checkboxes = document.getElementsByClassName("filter_checkboxes_part");
    if (!filter_partname) {
        $('.filter_checkboxes_part').css('display','block');
        filter_partname = true;
    }else{
        $('.filter_checkboxes_part').css('display','none');
        filter_partname = false;
    }
}

// machine name dropdown function 
var filter_machinename = 0;
function machinename_drp(){
    var checkboxes = document.getElementsByClassName('filter_checkboxes_machine');
    if (!filter_machinename) {
        $('.filter_checkboxes_machine').css('display','block');
        filter_machinename = true;
    }else{
        $('.filter_checkboxes_machine').css('display','none');
        filter_machinename = false;
    }
}

// filter 
// onselect multiselect dropdown

// category dropdown checkbox label onclick category reasons code
var count_category = 0;
$(document).on('click','.filter_check_cate',function(event){
  event.preventDefault();
  var count1 = $('.filter_check_cate');
  var index_val = count1.index($(this));
  
  var check_if = $('.category_drp_checkbox');
  if (index_val === 0) {
    // alert(index_val);
    // alert(check_if[index_val].checked);
    if (check_if[index_val].checked===false) {
      // alert('ok');
      check_if[0].checked=true;
      check_if[1].checked=true;
      check_if[2].checked=true;
      $('.category_drp_checkbox').attr('checked','checked');
      count_category = 2;
      
    }else{
      count_category = 0
      $('.category_drp_checkbox').removeAttr('checked');
    }
  }else{
    if (check_if[index_val].checked === false) {
      check_if[index_val].checked=true;
      count_category = parseInt(count_category)+1
      $('.category_drp_checkbox:eq('+index_val+')').attr('checked','checked');
    }else{
      count_category = parseInt(count_category)-1
      if (parseInt(count_category)<2) {
        check_if[0].checked=false;
      }
      $('.category_drp_checkbox:eq('+index_val+')').removeAttr('checked');
    }
  }

  // check the count
  var count_cate = 0;
  jQuery('.category_drp_checkbox').each(function(index){
    if (check_if[index].checked===true) {
      count_cate = parseInt(count_cate)+1;
    }
  });

  // text alignment
  // var temp_reason = "";
  if (parseInt(count_cate)>=2) {
    check_if[0].checked=true;
    var temp_reason = null;
    downtime_reason_filter(temp_reason);
    $('#text_category_drp').text('All Categories');
  }else if(parseInt(count_cate)>0){
    var temp_reason = getcategory_arr();
    downtime_reason_filter(temp_reason[0]);
    $('#text_category_drp').text(count_cate+' Selected');
   
  }
  else{
    var temp_reason = null;
    downtime_reason_filter(temp_reason);
    // reset_category();
    $('#text_category_drp').text('No Selected');
  }
});

// created by dropdown checkbox label onclick created by code
$(document).on('click','.filter_check_cb',function(event){
    event.preventDefault();
    var count1 = $('.filter_check_cb');
    var index_val = count1.index($(this));
    var check_if = $('.created_by_checkbox');
    if (parseInt(index_val)===0) {
        reset_created_by();
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.created_by_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.created_by_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.created_by_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.created_by_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#text_created_by_drp').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            reset_created_by();
            $('#text_created_by_drp').text('All');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#text_created_by_drp').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#text_created_by_drp').text('No Reason');  
    }

});

// downtime reason dropdown checkbox label onclick function code
$(document).on('click','.filter_check_r',function(event){
    event.preventDefault();
    var count_reason = $('.filter_check_r');
    var index_reason = count_reason.index($(this));
    var check_if = $('.reason_checkbox');
    if (parseInt(index_reason)==0) {
        reset_reason();
    }else{
        if (check_if[index_reason].checked=== false) {
            check_if[index_reason].checked=true;
            $('.reason_checkbox:eq('+index_reason+')').attr('checked','checked');
        }else{
            check_if[0].checked=false;
            $('.reason_checkbox:eq('+index_reason+')').removeAttr('checked');
        }
    }
    var reason_select_count = 0;
    jQuery('.reason_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            reason_select_count = parseInt(reason_select_count)+1;
        }
    });
    var reason_len = $('.reason_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    reason_len = parseInt(reason_len)-1;
    if (parseInt(reason_select_count)>=parseInt(reason_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#text_reason_drp').text(parseInt(reason_select_count)-1+' Selected');
        }else{
            reset_reason();
            $('#text_reason_drp').text('All');
        }
    }
    else if((parseInt(reason_select_count)<parseInt(reason_len)) && (parseInt(reason_select_count)>0)){
        $('#text_reason_drp').text(parseInt(reason_select_count)+' selected');
    }else{
        $('#text_reason_drp').text('No Reason');  
    }

   
});

// downtime part dropdown checkbox label onclick function
$(document).on('click','.filter_check_part',function(event){
    event.preventDefault();
    var count_part = $('.filter_check_part');
    var index_part = count_part.index($(this));
    var check_if = $('.partname_checkbox');
    if (index_part === 0) {
        if (check_if[0].checked==false) {
            reset_part();

        }else{
            $('.partname_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if[index_part].checked=== false) {
            check_if[index_part].checked=true;
            $('.partname_checkbox:eq('+index_part+')').attr('checked','checked');
        }else{
            $('.partname_checkbox:eq('+index_part+')').removeAttr('checked');
            check_if[0].checked = false;
        }
    }

    var part_select_count = 0;
    jQuery('.partname_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            part_select_count = parseInt(part_select_count)+1;
        }
    });
    var part_len = $('.partname_checkbox').length;
    console.log("part length:\t"+part_len);
    console.log("part select count:\t"+part_select_count);
    part_len = parseInt(part_len)-1;
    if (parseInt(part_select_count)>=parseInt(part_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#text_category_drp_part').text(parseInt(part_select_count)-1+' Selected');
        }else{
            reset_part();
            $('#text_category_drp_part').text('All');
        }
    }
    else if((parseInt(part_select_count)<parseInt(part_len)) && (parseInt(part_select_count)>0)){
        $('#text_category_drp_part').text(parseInt(part_select_count)+' selected');
    }else{
        $('#text_category_drp_part').text('No Parts');  
    }
   

});

// downtime machine dropdown checkbox label onclick function
$(document).on('click','.filter_check_machine',function(event){
    event.preventDefault();
    var count_machine  = $('.filter_check_machine');
    var index_machine = count_machine.index($(this));
    var check_if = $('.machine_checkbox');
    if (index_machine === 0) {
        if (check_if[0].checked==false) {
            reset_machine();

        }else{
            $('.machine_checkbox').removeAttr('checked');
        }
    }else{
        if (check_if[index_machine].checked==false) {
            check_if[index_machine].checked=true;
            $('.machine_checkbox:eq('+index_machine+')').attr('checked','checked');
        }else{
            $('.machine_checkbox:eq('+index_machine+')').removeAttr('checked');
            check_if[0].checked=false;
        }
    }

    var machine_select_count = 0;
    jQuery('.machine_checkbox').each(function(index){
      if (check_if[index].checked===true) {
        machine_select_count = parseInt(machine_select_count)+1;
      }
    });
    var machine_len = $('.machine_checkbox').length;
    machine_len = parseInt(machine_len)-1;
    console.log("total machine:\t"+machine_len);
    console.log('select machine:\t'+machine_select_count);
    if (parseInt(machine_select_count)>=parseInt(machine_len)) {
        if(check_if[0].checked===true){
            check_if[0].checked=true;
            $('#text_machine_drp').text(parseInt(machine_select_count)-1+' Selected');
        }else{
            // check_if[0].checked=true;
            reset_machine();
            $('#text_machine_drp').text('All');
        }
    }else if(((parseInt(machine_select_count)<parseInt(machine_len))) && (parseInt(machine_select_count)>0)){
        $('#text_machine_drp').text(parseInt(machine_select_count)+' Selected');

        // check_if[0].checked=false;
    }else {
        $('#text_machine_drp').text('No Machine');
    }
   
});



// reset machine dropdown
function reset_machine(){
  var machine_arr = $('.machine_checkbox');
  jQuery('.machine_checkbox').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#text_machine_drp').text('All Machines');
}


// reset part dropdown
function reset_part(){
    var part_arr = $('.partname_checkbox');
    jQuery('.partname_checkbox').each(function(index){
        part_arr[index].checked=true;
    });
    $('#text_category_drp_part').text('All Parts');
}

// reset downtime reasons dropdown
function reset_reason(){
    var reason_arr = $('.reason_checkbox');
    jQuery('.reason_checkbox').each(function(in1){
        reason_arr[in1].checked=true;
    });
    $('#text_reason_drp').text('All Reasons');
}

// reset downtime category
function reset_category(){
    var category_arr = $('.category_drp_checkbox');
    jQuery('.category_drp_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('#text_category_drp').text('All Category');
}

// reset created by
function reset_created_by(){
    var created_by_arr = $('.created_by_checkbox');
    jQuery('.created_by_checkbox').each(function(in3){
        created_by_arr[in3].checked=true;
    });
    $('#text_created_by_drp').text('All Users');
}


// date time 
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


// page load time this function execute
$(document).ready(function(){

    // preloader on function
    $("#overlay").fadeIn(500);
    // reason wise opportunity graph
    reason_wise_oppcost();
    // reason wise duration graph
    reason_wise_duration();
    // machine wise opportunity graph
    machine_wise_oppcost();
    // machine wise and reason wise duration
    machine_reason_wise_duration();

    $('#pagination_val').val('1');
    // table data function temporary hide this function for onlu filter apply function
    // get_table_record();
    

    // machine dropdown record filling function
    fill_machine_dropdown();

    // part dropdown record filling
    fill_part_dropdown();

  
    // created by dropdown record filling
    fill_created_by();

    // downtime reasons function
    var temp = null;
    downtime_reason_filter(temp);

    var end_index = 50;
    var start_index = 0;
    // filter function apply
    filter_after_filter(end_index,start_index);

    // preloader off function
   // $("#overlay").fadeOut(500);

});


// onblur function change input filter
// from date on blur function
$(document).on('blur','.fromDate',function(event){
    event.preventDefault();

    // preloader function on load
    $("#overlay").fadeIn(400);
    // reason wise opportunity graph
    reason_wise_oppcost();
    // reason wise duration graph
    reason_wise_duration();
    // machine wise opportunity graph
    machine_wise_oppcost();
    // machine wise and reason wise duration
    machine_reason_wise_duration();

    $('#pagination_val').val('1');
    // table data function temporary hid this function for apply filter function
    // get_table_record();
    var end_index = 50;
    var start_index = 0;
    // filter function apply
    filter_after_filter(end_index,start_index);

    // preloader off function
  //  $("#overlay").fadeOut(400);
  
});

// to date onblur function
$(document).on('blur','.toDate',function(event){

    event.preventDefault();  

    // preloader function on load
    $("#overlay").fadeIn(400);
    // reason wise opportunity graph
    reason_wise_oppcost();
    // reason wise duration graph
    reason_wise_duration();
    // machine wise opportunity graph
    machine_wise_oppcost();
    // machine wise and reason wise duration
    machine_reason_wise_duration();

    $('#pagination_val').val('1');
    // table data function temporary hide this function 
    // get_table_record();

    var end_index = 50;
    var start_index = 0;
    // filter function apply
    filter_after_filter(end_index,start_index);
   

    // preloader off function
  //   $("#overlay").fadeOut(400);
  
});




// this open code has default one week date selection 
var now = new Date();

var fdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + (now.getHours()-1)).slice(-2)+":00";

//One week back
now.setDate(now.getDate() - 6);
var tdate = now.getFullYear()+"-"+("0" + (parseInt(now.getMonth())+parseInt(1))).slice(-2)+"-"+("0" + now.getDate()).slice(-2)+" "+("0" + now.getHours()).slice(-2)+":00";
$('.toDate').val(fdate);
$('.fromDate').val(tdate);

// reason wise opportunitycost graph
function reason_wise_oppcost(){

    $('#reason_wise_oppcost').remove();
    $('.child_reason_wise_oppcost').append('<canvas id="reason_wise_oppcost"><canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    // console.log("from date:\t"+f);
    // console.log("to date:\t"+t);
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getdowntime_reason_whise_graph'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            from:f,
            to:t
        },
        success:function(res){
            console.log("Reason Wise Opportunity Graph");
            console.log(res);

            $('#reason_wise_oppcost_total').text(parseFloat(res['grandTotal']).toLocaleString("en-IN"));
            // total hour and minute
            var thour = parseInt(res['total_duration'])/60;
            var tminute = parseInt(res['total_duration']%60);
            $('#total_duration_header').html(parseInt(thour)+'h'+' '+parseInt(tminute)+'m');

            var reason_label = [];
            var oppcost_arr = [];
            var reason_id_arr = [];
           

            var oppcost_percent_arr = [];
            var temp_cost_ini = 0;
            res['graph'].forEach(function(val){
                reason_label.push(val.downtime_reason);
                var tempcost = parseInt(val.opportunity_cost);
                // console.log(typeof tempcost);
                oppcost_arr.push(tempcost);
                reason_id_arr.push(val.downtime_reason_id);
                // console.log(val.downtime_reason);
                // console.log('tempcost'+tempcost);
                // console.log('ex temp cost'+temp_cost_ini);
                // console.log(res['grandTotal']);
                temp_cost_ini = parseInt(temp_cost_ini)+parseInt(tempcost);
                oppcost_percent_arr.push(temp_cost_ini);
            });

            // calculate percentage array
            var percentage_arr = [];
            oppcost_percent_arr.forEach(function(item){
                // console.log(item);
                // console.log(res['grandTotal']);
                var temp_data = parseFloat(parseInt(item)/parseInt(res['grandTotal'])).toFixed(2)*100;
                // temp_data = temp_data*100;
                percentage_arr.push(temp_data);
            });

            // console.log("temporary cost array");
            // console.log(oppcost_percent_arr);
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
                // console.log("Reason Mapping");
                // console.log(w);
                $('.child_reason_wise_oppcost').css("width",w+"px");
                break;
                }
                else{
                break;
                }
            }
          
           
            // console.log(oppcost_percent_arr);
            // console.log(percentage_arr);
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
                       
                    }
                    ,{
                        type: 'bar',
                        label:reason_label ,
                        data: oppcost_arr,
                        percentage_data:0,
                        // borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: '#0075F6' 
                    }
                ],
                },
                // borderColor: "#004b9b", 
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
                        external: reason_oppcost_tooltip,
                    }
                    },
                },            
            });
  
        }
    });
}

// reason wise opportunitycost graph tooltip
function reason_oppcost_tooltip(context) {  
    // console.log(context);
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
        // console.log("hovering"+percentage);
        var rname = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].label[context.tooltip.dataPoints[0].dataIndex]
        // console.log(oppcost);
        // console.log(rname);
        // var days = parseInt(parseInt(duration/60)/24);
        // var hours = parseInt(parseInt(duration-(days*1440))/60);
        // var min = parseInt(parseInt(duration-(days*1440))%60);
        let innerHtml = '<div>';
        innerHtml += '<div class="grid-container">';

        if (parseInt(percentage)>0) {
            // console.log("percentage hovering");

            innerHtml += '<div class="title-bold"><span>'+context.chart.config._config.data.labels[context.tooltip.dataPoints[0].dataIndex]+'</span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';
            innerHtml += '<div class="content-text sub-title"><span></span></div>';
            innerHtml += '<div class="grid-item title-bold"><span></span></div>';

            innerHtml += '<div class="grid-item content-text margin-top"><span>Percentage</span></div>';
            innerHtml += '<div class="cost-value title-bold-value margin-top"><span class="values-op">'+parseFloat(percentage).toLocaleString("en-IN")+'% </span></div>';
            // innerHtml += '<div class="grid-item content-text"><span></span></div>';
            // innerHtml += '<div class="grid-item content-text-val"><span class="values-op"></span></div>';
        }else{
            // console.log("bar hovering");
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

// reason wise duration graph
function reason_wise_duration(){
        
    $('#reason_wise_duration').remove();
    $('.child_reason_wise_duration').append('<canvas id="reason_wise_duration"><canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getdowntime_reason_whise_graph'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            from:f,
            to:t
        },
        success:function(res){
            console.log("Reason Wise duration");
            console.log(res);

            var hour_text = parseInt(parseInt(res['total_duration'])/60);
            var minute_text = parseInt(parseInt(res['total_duration'])%60);
            $('#reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');

            var reason_label = [];
            var duration_arr = [];
            var reason_id_arr = [];

            var duration_percentage_arr = [];
            var duration_arr_cumulative = [];
            var total_duration = 0;
            res['graph'].forEach(function(val){
                reason_label.push(val.downtime_reason);
                var tempcost = parseInt(val.duration);
                // console.log(typeof tempcost);
                duration_arr.push(tempcost);
                reason_id_arr.push(val.downtime_reason_id);
                // console.log(val.downtime_reason);
                total_duration = parseInt(total_duration) + parseInt(tempcost);
                duration_arr_cumulative.push(total_duration);
                var temp_data = parseFloat(parseInt(total_duration)/parseInt(res['total_duration'])).toFixed(2)*100;
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
            // console.log("duration by reasons");
            // console.log(duration_percentage_arr);
            var ctx = document.getElementById("reason_wise_duration").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: reason_label,
                    datasets: [{
                        label:reason_label,
                        data:duration_arr,
                        percentage_data:0,
                        backgroundColor: "#0075F6",
                    },{
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
                    }],
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
                        external: reason_wise_duration_tooltip,
                    }
                    },
                },            
            });
        }
    });
}

// reason wise duration tooltip function
function reason_wise_duration_tooltip(context){
    // console.log(context);
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

            innerHtml += '<div class="grid-item content-text"><span>Percentage</span></div>';  
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

// reason wise oppcost graph
function machine_wise_oppcost(){
    $('#machine_wise_oppcost').remove();
    $('.child_machine_wise_oppcost').append('<canvas id="machine_wise_oppcost"><canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getMachine_wise_opporuntiy_cost'); ?>",
        type: "POST",
        dataType: "json",
        data:{
        from:f,
        to:t
        },
        success:function(res){
            console.log("Machine Wise opportunity graph");
            console.log(res);

            $('#machine_wise_oppcost_total').text(parseFloat(res['grant_total']).toLocaleString("en-IN"));
            var machine_label = [];
            var oppcost_arr = [];
            var machine_id_arr = [];

            var machine_duration_percentage = 0;
            var mdarr = [];
            var oppcost_arr_cumulative = [];
            res['graph'].forEach(function(val){
                machine_label.push(val.machine_name);
                var tempcost = parseInt(val.oppcost);
                // console.log(typeof tempcost);
                oppcost_arr.push(tempcost);
                machine_id_arr.push(val.machine_id);
                // console.log(val.downtime_reason);
                machine_duration_percentage = parseInt(machine_duration_percentage)+parseInt(tempcost);
                oppcost_arr_cumulative.push(machine_duration_percentage);
                var temp_d = parseFloat(parseInt(machine_duration_percentage)/parseInt(res['grant_total'])).toFixed(2)*100;
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
                        yAxisID: 'B',

                       
                    },{
                        label:machine_label,
                        data:oppcost_arr,
                        backgroundColor: "#0075F6",
                        percentage_data:0,
                        yAxisID: 'A',
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,   
                    scales: {
                        y: {
                            id: 'A',
                            type:'linear',
                            position:'left',
                            display:true,
                            // beginAtZero:true,
                            stacked:true
                        },
                        y1:{
                            id: 'B',
                            type:'linear',
                            display:true,
                            position:'right',
                            // beginAtZero:true,
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
        }
  });

}

// machine wise opportunity cost tooltip function
function machine_wise_oppcost_tooltip(context){
    // console.log(context);
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
        // console.log(oppcost);
        // console.log(mname);
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

            innerHtml += '<div class="grid-item content-text"><span>Percentage</span></div>';  
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

// Machine  wise and reason wise duration graph
function machine_reason_wise_duration(){
    $('#machine_reason_duration').remove();
    $('.child_machine_reason_duration').append('<canvas id="machine_reason_duration"><canvas>');
    $('.chartjs-hidden-iframe').remove();

    f = $('.fromDate').val();
    t = $('.toDate').val();
    f = f.replace(" ","T");
    t = t.replace(" ","T");

    
  $.ajax({
    url: "<?php echo base_url('Production_Downtime_controller/getmachine_reason_duration'); ?>",
    type: "POST",
    dataType: "json",
    data:{
      from:f,
      to:t
    },
    success:function(res){
        console.log("Machine and Reason Array Duration");
        console.log(res);

        var hour_text = parseInt(parseInt(res['total_duration'])/60);
        var minute_text = parseInt(parseInt(res['total_duration'])%60);
        $('#machine_reason_duration_text').text(hour_text+'h'+' '+minute_text+'m');


        var color = ["white","#004591","#0071EE","#97C9FF","#595959","#A6A6A6","#D9D9D9","#09BB9F","#39F3BB"];
        var demo = [];
        var x= 1;
        var machineName = [];
        var category_percent = 1.0;
        var bar_space = 0.5;
       
        res['data'].forEach(function(value){
            machineName.push(value.machine_name);
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
                // reject:machineWiseReject,
                categoryPercentage:category_percent,
                barPercentage: bar_space,
            });
            x = x+1;
        });

        // console.log("graph data graph4");
        // console.log(demo);

      
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
                    external: machine_and_reason_wise_tooltip,
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

// machine and reason wise tooltip function
function machine_and_reason_wise_tooltip(context){
    // console.log(context);
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
        var days = parseInt(parseInt(duration/60)/24);
        var hours = parseInt(parseInt(duration-(days*1440))/60);
        var min = parseInt(parseInt(duration-(days*1440))%60);

        // var reject = (context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].reject[context.tooltip.dataPoints[0].dataIndex]);

        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';

        innerHtml += '<div class="grid-container">';
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

// get table data function  temporary hide this function for only filter function
/*
function get_table_record(){
    f = $('.fromDate').val();
    t = $('.toDate').val();
    from = f.replace(" ","T");
    to = t.replace(" ","T");

    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/gettable_data'); ?>",
        type:"POST",
        dataType: "json",
        data:{from:from,to:to},
        success:function(res){
            console.log("table data");
            console.log(res);
            $('.fixed_rows').empty();
            $('.scroll_rows').empty();
            
            // console.log("table key");
            // console.log(res['total']);
            var from_len = 0;
            var end_len = 50;
            var index = 0;
            var total_page = parseInt(res['total'])/50;
            total_page = Math.ceil(total_page);
            $('#total_page').html(total_page);
            // var count_leng = 0;
            res['data'].forEach(function(val,key){
                
                // index = parseInt(index)+1;
                if (parseInt(key)<parseInt(end_len)) {  
                    var elements = $();
                    var element = $();

                    var from_date = date_formate_change(from);
                    var to_date = date_formate_change(to);
                    var updated_at = date_formate_change(val.last_updated_on)


                    elements = elements.add('<div class="fixed_col_common alignflex" style="width:100%;">'
                        +'<div class="border-left font_row alignflex" style="width:30%;height: 100%;"><span style="margin-left:1rem;">'+val.machine_name+'</span></div>'
                        +'<div class="font_row alignflex"style="width:42%;height: 100%"><span style="margin:auto;">'+from_date+'</span></div>'
                        +' <div  class="red alignflex" style="width:28%;height: 100%;justify-content:flex-end;"><span style="margin-right:1rem;">'+val.split_duration+'</span></div>'
                    +'</div>');

                    element = element.add('<div class="alignflex fixed_col_common2"  style="width:83%;">'
                        +'<div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;">'+to_date+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.downtime_category+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.downtime_reason+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;">'+val.tool_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.part_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.last_updated_by+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">'+updated_at+'</span></div>'
                        +'<div class="font_row alignflex "  style="height:100%;width: 8%;justify-content:center;"><div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"/></div></div>'
                        +'<div class="notes_display" style="">'
                            +'<p >'+val.notes+'</p>'
                        +'</div>'
                    +'</div>');

                    $('.fixed_rows').append(elements);
                    $('.scroll_rows').append(element);
                    // console.log("Table Data");
                    // console.log(val);
                }
                
            });
            // once complete next move on this function for height
            table_onclick();

            // var width_get = $('.fixed_rows').css('height');
            // // var width_get_1 = $('.scroll_rows').css('height');
            // console.log("table height");
            // // console.log(width_get);
            // // consoe.log(width_get_1);
            // var demo_height = parseInt(width_get)+98;
            // $('#container_table').css('height',parseInt(demo_height)+"px");
        },
        error:function(err){
            console.log("Sorry TryAgain");
        }
    });
 
}
*/

// pagination filter function
function pagination_filter(){
    var value_input = $('#pagination_val').val();
    var limit_val = $('#total_page').text();
    // console.log(value_input);
    // console.log(limit_val);
    $("#overlay").fadeIn(400);
    var start_index =0;
    var end_index = 0;
    if (parseInt(value_input)>0) {
        if (parseInt(value_input)<=parseInt(limit_val)) {
            end_index = parseInt(value_input)*50;
            start_index = parseInt(end_index)-50;
            console.log("start index"+start_index);
            console.log("end index"+end_index);
            // pagination_filter_pass(start_index,end_index);

        }else{
            console.log("invalid and more than limited value");
            $('#pagination_val').val('1');
            start_index = 0;
            end_index = 50;
            // pagination_filter_pass();

        }
    }else{
        console.log("invalid and more than limited value");
        $('#pagination_val').val('1');
        start_index = 0;
        end_index = 50;
    }
    // pagination_filter_pass(start_index,end_index);
    filter_after_filter(end_index,start_index);
}

// filter process function temporary hide this function filter pagination apply
/*
function pagination_filter_pass(start_index,end_index){
    f = $('.fromDate').val();
    t = $('.toDate').val();
    from = f.replace(" ","T");
    to = t.replace(" ","T");
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/gettable_data'); ?>",
        type:"POST",
        dataType: "json",
        data:{from:from,to:to},
        success:function(res){
            console.log("table data");
            console.log(res);
            $('.fixed_rows').empty();
            $('.scroll_rows').empty();
            // console.log("table key");
            // console.log(res['total']);
            var from_len = 0;
            var end_len = 50;
            var index = 0;
            var total_page = parseInt(res['total'])/50;
            total_page = Math.ceil(total_page);
            $('#total_page').html(total_page);
            res['data'].forEach(function(val,key){
                
                // index = parseInt(index)+1;
                if ((parseInt(key)<parseInt(end_index)) && (parseInt(key)>=parseInt(start_index))) {  
                    var elements = $();
                    var element = $();

                    var from_date = date_formate_change(from);
                    var to_date = date_formate_change(to);
                    var updated_at = date_formate_change(val.last_updated_on)


                    elements = elements.add('<div class="fixed_col_common alignflex" style="width:100%;">'
                        +'<div class="border-left font_row alignflex" style="width:30%;height: 100%;"><span style="margin-left:1rem;">'+val.machine_name+'</span></div>'
                        +'<div class="font_row alignflex"style="width:42%;height: 100%"><span style="margin:auto;">'+from_date+'</span></div>'
                        +' <div  class="red alignflex" style="width:28%;height: 100%;justify-content:flex-end;"><span style="margin-right:1rem;">'+val.split_duration+'</span></div>'
                    +'</div>');


                    element = element.add('<div class="alignflex fixed_col_common2"  style="width:83%;">'
                        +'<div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;">'+to_date+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.downtime_category+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.downtime_reason+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;">'+val.tool_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.part_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.last_updated_by+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">'+updated_at+'</span></div>'
                        +'<div class="font_row alignflex "  style="height:100%;width: 8%;justify-content:center;"><div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"/></div></div>'
                        +'<div class="notes_display" style="">'
                            +'<p >'+val.notes+'</p>'
                        +'</div>'
                    +'</div>');

                    $('.fixed_rows').append(elements);
                    $('.scroll_rows').append(element);
                    // console.log("Table Data");
                    // console.log(val);
                }
                
            });
            table_onclick();
            // var width_get = $('.fixed_rows').css('height');
            // var width_get_1 = $('.scroll_rows').css('height');
            // // console.log("table height");
            // // console.log(width_get);
            // // consoe.log(width_get_1);
            // var demo_height = parseInt(width_get)+98;
            // $('#container_table').css('height',parseInt(demo_height)+"px");
        },
        error:function(err){
            console.log("Sorry TryAgain");
        }
    });
}
*/

// table onclick 

function table_onclick(){
    // alert('hi');
    var demo = $('.fixed_col_common').length;
    // console.log("onclick");
    // console.log(demo);
    demo = parseInt(parseInt(demo)*4);
    $('#container_table').css('max-height',parseInt(demo)+'rem');
}

// graph view click align width
function graph_view_click(){
    var child_width = $('.child_reason_wise_oppcost').width();
    var parent_width = $('.graph_01').width();
    parent_width = parseInt(parseInt(parent_width)*12)+30;
    // console.log("parent width");
    // console.log(parent_width);
    // console.log("child width");
    // console.log(child_width);

    // reason wise graph
    if (parseInt(child_width)<=parseInt(parent_width)) {
        // console.log("error");
        $('.child_reason_wise_oppcost').css('width',parent_width+'px');
        $('.child_reason_wise_duration').css('width',parent_width+'px');
    }
    // else{
    //     console.log("no error");    
    // }

    // macine wise graph 
    var machine_parent_width = $('.graph_03').width();
    var machine_child_width = $('.child_machine_wise_oppcost').width();
    machine_parent_width = parseInt(parseInt(machine_parent_width)*12)+30;
    // console.log("macine wise graph");
    // console.log(machine_parent_width);
    if (parseInt(machine_child_width)<parseInt(machine_parent_width)) {
        $('.child_machine_wise_oppcost').css('width',machine_parent_width+'px');
        $('.child_machine_reason_duration').css('width',machine_parent_width+'px');
        
    }
}


// notes hover function
function notes_hover(ele){
    var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
    var index_val = els.indexOf(event.currentTarget);
    //   alert(index_val);
    $('.notes_display:eq('+index_val+')').css('display','block');
    //   console.log("notes index hovering"+index_val);
}


function mouse_out_check(ele1){
  var els = Array.prototype.slice.call( document.getElementsByClassName('icon_img_wh'), 0 );
  var index_val1 = els.indexOf(event.currentTarget);
  $('.notes_display:eq('+index_val1+')').css("display","none");
    //   console.log("notes index  hovering remove"+index_val1);

}

// date formate change function
function date_formate_change(date_format){
    const d = new Date(date_format);

    let day_demo = d.toLocaleString('en-us',{day:'2-digit'});
    let hour_demo = d.toLocaleString('en-us',{hour12:false,hour:'2-digit'});
    let month_demo = d.toLocaleString('en-us',{month:'short'});
    let year_demo = d.toLocaleString('en-us',{year:'2-digit'});
    let minute_demo = d.toLocaleString('en-us',{minute:'2-digit'});

    var final_res = day_demo+' '+month_demo+' '+year_demo+' ,'+hour_demo+':'+minute_demo;
    return final_res;
}

//  machine multi select dropdown function 
function fill_machine_dropdown(){
    // console.log("machine dropdown records filling function");
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getmachine_data'); ?>",
        type:"POST",
        dataType: "json",
        // data:{from:from,to:to},
        success:function(res){
            console.log("multi select dropdown machine");
            console.log(res);
            $('.filter_checkboxes_machine').empty();
            $('.filter_checkboxes_machine').append('<div class="filter_check_machine" style="">'
            +'<div class="cate_drp_check" style="">'
            +'<input type="checkbox" id="one" class="machine_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
            +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>')
            res.forEach(function(val){
                var elements = $();
                elements = elements.add('<div class="filter_check_machine" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="machine_checkbox" value="'+val.machine_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.machine_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_machine').append(elements);
            });

            reset_machine();
            
        },
        error:function(er){
            console.log("Error Try Again...");
        }
    });
}

// part name multi select dropdown
function fill_part_dropdown(){
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getpart_data_drp'); ?>",
        type:"POST",
        dataType: "json",
        // data:{from:from,to:to},
        success:function(res){
            console.log("multi select dropdown part");
            console.log(res);
            
            $('.filter_checkboxes_part').empty();
            $('.filter_checkboxes_part').append('<div class="filter_check_part" style="">'
            +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="partname_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>')
            res.forEach(function(val){
                var elements = $();
                elements = elements.add('<div class="filter_check_part" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="partname_checkbox" value="'+val.part_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.part_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_part').append(elements);
            });
            reset_part();
            reset_category();

            
        },
        error:function(er){
            console.log("Error Try Again...");
        }
        
    });
    
}

// function created by select dropdown
function fill_created_by(){
    $.ajax({
        url:"<?php echo base_url('Production_Downtime_controller/getcreated_by_drp'); ?>",
        type:"POST",
        dataType: "json",
        // data:{from:from,to:to},
        success:function(res){
            console.log("multi select dropdown created by");
            console.log(res);
            
            $('.filter_checkboxes_cb').empty();
            $('.filter_checkboxes_cb').append('<div class="filter_check_cb" style="">'
            +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="created_by_checkbox" value="all"/>'
            +'</div>'
            +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">All</p>'
            +'</div>'
            +'</div>')
            res.forEach(function(val){
                var elements = $();
                elements = elements.add('<div class="filter_check_cb" style="">'
                +'<div class="cate_drp_check" style="">'
                +'<input type="checkbox" id="one" class="created_by_checkbox" value="'+val.user_id+'"/>'
                +'</div>'
                +'<div class="cate_drp_text" style="">'
                +'<p class="font_multi_drp" style="margin:auto;">'+val.first_name+''+val.last_name+'</p>'
                +'</div>'
                +'</div>');

                $('.filter_checkboxes_cb').append(elements);
            });
            reset_created_by();
            
        },
        error:function(er){
            console.log("Error Try Again...");
        }
        
    }); 
}

// filter downtime reasons dropdwon function
function downtime_reason_filter(category_temp){
  // var cate_arr = getcategory_arr(); 
  // var arr_leng = cate_arr.length;
  $('.filter_checkboxes_r').empty();
  if (category_temp === null) {
    $.ajax({
      url:"<?php echo base_url(); ?>/Production_Downtime_controller/downtime_reason_filter_con",
      method:"POST",
      dataType:"json",
      success:function(res){
        // console.log("reason dropdwon");
        // console.log(res);

        var element = $();
        $('.filter_checkboxes_r').append('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
        res.forEach(function(item){
          // console.log(item.downtime_reason_id);
          if (item.downtime_reason==="Tool Changeover") {
            
          }else{
            // element = element.add('<option value="'+item.downtime_reason+'">'+item.downtime_reason+'</option>');
            element = element.add('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
            $('.filter_checkboxes_r').append(element);
          }
        
        });
        // downtime reasons all reasons selection funciton [reset the multiselect dropdwon]
        reset_reason();
      },
      error:function(err){
        console.log(err);
      },
    });
  }
  else if(category_temp!=null){
    // selected_cate_reasons(cate_arr[0]);
    // console.log("ok");
    // console.log(category_temp);
    category_based_reson(category_temp);
  }
}

// category based reason
function category_based_reson(category_temp){
    $.ajax({
      url:"<?php echo base_url(); ?>/Production_Downtime_controller/category_based_reason",
      method:"POST",
      dataType:"json",
      data:{category_temp:category_temp},
      success:function(res){
        // console.log("reason dropdwon");
        // console.log(res);
        console.log("category selection ");
        console.log(res);
        var element = $();
        $('.filter_checkboxes_r').append('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="all_reason"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" style="">All Reasons</p></div></idv>');
        res.forEach(function(item){
          // console.log(item.downtime_reason_id);
          if (item.downtime_reason==="Tool Changeover") {
            
          }else{
            // element = element.add('<option value="'+item.downtime_reason+'">'+item.downtime_reason+'</option>');
            element = element.add('<div class="filter_check_r" style=""><div class="cate_drp_check" style=""><input type="checkbox" id="one" class="reason_checkbox" value="'+item.downtime_reason+'"/></div><div class="cate_drp_text" style=""><p class="font_multi_drp" >'+item.downtime_reason+'</p></div></idv>');
            $('.filter_checkboxes_r').append(element);
          }
        
        });
        // downtime reasons all reasons selection funciton [reset the multiselect dropdwon]
        reset_reason();
      },
      error:function(err){
        console.log(err);
      },
    });  
}

// this function get category value 
function getcategory_arr(){
  const temp_arr = [];
  var loop_cate = $('.category_drp_checkbox').val();
  $('.category_drp_checkbox').each(function(){ 
    if($(this).is(':checked')){
      temp_arr.push($(this).val());
    }           
  });
  return temp_arr;
}

// machine array
function getmachine_arr(){
    const temp_arr = [];
    $('.machine_checkbox').each(function(){
        if ($(this).is(':checked')) {
            temp_arr.push($(this).val());
        }
    });

    return temp_arr;
}

// part array
function getpart_arr(){
    const tmp_arr = [];
    $('.partname_checkbox').each(function(){
        if ($(this).is(':checked')) {
            tmp_arr.push($(this).val());
        }
    });
    return tmp_arr;
}

// created_by array
function getcreated_by_arr(){
    const tmp_arr = [];
    $('.created_by_checkbox').each(function(){
        if ($(this).is(':checked')) {
            tmp_arr.push($(this).val());
        }
    });
    return tmp_arr;
}

// reason array function
function getreason_arr(){
    const temp = [];
    $('.reason_checkbox').each(function(){
        if ($(this).is(':checked')) {
            temp.push($(this).val());
        }
    });

    return temp;
}

// on mouse up function
$(document).mouseup(function(event){

    // machine multi select dropdown
    var machine_reason = $('.filter_checkboxes_machine');
    if (!machine_reason.is(event.target) && machine_reason.has(event.target).length==0) {
        machine_reason.hide();
    }

    // part name multi select dropdown
    var partname_checkbox = $('.filter_checkboxes_part');
    if (!partname_checkbox.is(event.target) && partname_checkbox.has(event.target).length==0) {
        partname_checkbox.hide();
    }

    // created by multi seelct dropdown
    var created_by_checkbox = $('.filter_checkboxes_cb');
    if (!created_by_checkbox.is(event.target) && created_by_checkbox.has(event.target).length==0) {
        created_by_checkbox.hide();
    }

    // category dropdown multi select dropdown
    var category_drp_checkbox = $('.filter_checkboxes');
    if (!category_drp_checkbox.is(event.target) && category_drp_checkbox.has(event.target).length==0) {
        category_drp_checkbox.hide();
    }

    // reason dropdown multi select dropdown
    var reason_drp_checkbox = $('.filter_checkboxes_r');
    if (!reason_drp_checkbox.is(event.target) && reason_drp_checkbox.has(event.target).length==0) {
        reason_drp_checkbox.hide();
    }
});

// filter onclick  function
$(document).on('click','#apply_filter_btn',function(event){
    event.preventDefault();
    $('#pagination_val').val('1');
    $("#overlay").fadeIn(400);
    var start_index = 0;
    var end_index = 50;
    filter_after_filter(end_index,start_index);
   
   
    // alert('ji');

});
// after click filter and document ready function and after pagination uusing filter
function filter_after_filter(end_index,start_index){
    var get_category_data = getcategory_arr();
    var machine_arr = getmachine_arr();
    var part_arr = getpart_arr();
    var reason_arr = getreason_arr();
    var created_by = getcreated_by_arr();

    var machine_len = $('.machine_checkbox').length;
    var part_len = $('.partname_checkbox').length;
    var category_len = $('.category_drp_checkbox').length;
    var reason_len = $('.reason_checkbox').length;
    var created_by_len = $('.created_by_checkbox').length;

    // machine condition 
    var pass_machine = "";
    if (parseInt(machine_len)===parseInt(machine_arr.length)) {
        pass_machine = null;
    }else{
        pass_machine = machine_arr;
    }

    // part condition
    var pass_part = "";
    if (parseInt(part_len)===parseInt(part_arr.length)) {
        pass_part = null;
    }else{
        pass_part = part_arr;
    }

    // category_arr
    var pass_cate = "";
    if (parseInt(category_len)===parseInt(get_category_data.length)) {
        pass_cate = null;
    }else{
        pass_cate = get_category_data;
    }

    // reason condition
    var pass_reason = "";
    if (parseInt(reason_len)===parseInt(reason_arr.length)) {
        pass_reason = null;
    }else{
        pass_reason = reason_arr;
    }

    // created by condition
    var pass_created_by = "";
    if (parseInt(created_by_len)===parseInt(created_by.length)) {
        pass_created_by = null;
    }else{
        pass_created_by = created_by;
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
            pass_machine:pass_machine,
            pass_part:pass_part,
            pass_cate:pass_cate,
            pass_reason:pass_reason,
            pass_created_by:pass_created_by,
            from:from,
            to:to,   
        },
        success:function(res){
            // console.log(res);
            console.log("table data");
            console.log(res);
            $('.fixed_rows').empty();
            $('.scroll_rows').empty();
            // console.log("table key");
            // console.log(res['total']);
            var from_len = 0;
            var end_len = 50;
            var index = 0;
            var total_page = parseInt(res['total'])/50;
            total_page = Math.ceil(total_page);
            $('#total_page').html(total_page);
            res['data'].forEach(function(val,key){
                
                // index = parseInt(index)+1;
                if ((parseInt(key)<parseInt(end_index)) && (parseInt(key)>=parseInt(start_index))) {  
                    var elements = $();
                    var element = $();

                    var from_date = date_formate_change(from);
                    var to_date = date_formate_change(to);
                    var updated_at = date_formate_change(val.last_updated_on)


                    elements = elements.add('<div class="fixed_col_common alignflex" style="width:100%;">'
                        +'<div class="border-left font_row alignflex" style="width:30%;height: 100%;"><span style="margin-left:1rem;">'+val.machine_name+'</span></div>'
                        +'<div class="font_row alignflex"style="width:42%;height: 100%"><span style="margin:auto;">'+from_date+'</span></div>'
                        +' <div  class="red alignflex" style="width:28%;height: 100%;justify-content:flex-end;"><span style="margin-right:1rem;">'+val.split_duration+'</span></div>'
                    +'</div>');


                    element = element.add('<div class="alignflex fixed_col_common2"  style="width:83%;">'
                        +'<div class="font_row alignflex " style="height:100%;width:15.1%;"><span style="margin:auto;">'+to_date+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.downtime_category+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.downtime_reason+'</span></div>'
                        +' <div class="font_row alignflex" style="height:100%;width:12%"><span style="margin-left:1rem;">'+val.tool_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:15%;"><span style="margin-left:1rem;">'+val.part_name+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width:10%;"><span style="margin-left:1rem;">'+val.last_updated_by+'</span></div>'
                        +'<div class="font_row alignflex" style="height:100%;width: 15%;"><span style="margin-left:1rem;">'+updated_at+'</span></div>'
                        +'<div class="font_row alignflex "  style="height:100%;width: 8%;justify-content:center;"><div class="notes_check"><img src="<?php  echo base_url(); ?>/assets/img/info.png" class="icon_img_wh" onmouseover="notes_hover(this)"  onmouseout="mouse_out_check(this)"/></div></div>'
                        +'<div class="notes_display" style="">'
                            +'<p >'+val.notes+'</p>'
                        +'</div>'
                    +'</div>');

                    $('.fixed_rows').append(elements);
                    $('.scroll_rows').append(element);
                    // console.log("Table Data");
                    // console.log(val);
                }
                
            });
            table_onclick();
            $("#overlay").fadeOut(400);
            // var width_get = $('.fixed_rows').css('height');
            // var width_get_1 = $('.scroll_rows').css('height');
            // // console.log("table height");
            // // console.log(width_get);
            // // consoe.log(width_get_1);
            // var demo_height = parseInt(width_get)+98;
            // $('#container_table').css('height',parseInt(demo_height)+"px");
        },
        error:function(er){
            console.log("Try Again for filter button");
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
    reset_category();
    reset_created_by();
    reset_machine();
    reset_part();
    reset_reason();

    // filter function calling
    var start_index = 0;
    var end_index = 50;
    $('#pagination_val').val('1');
    
    filter_after_filter(end_index,start_index);


});

</script>
