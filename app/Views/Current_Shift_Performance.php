<head>
    <!-- oui current shift performance adding -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/css/oui_current_shift_performance.css?version=<?php echo rand(); ?>">
    <!-- <script src="<?php echo base_url(); ?>/assets/apexchart/dist/apexcharts.js"></script> -->
    <!-- oui current shift performance end -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/css/current_shift_performance.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/css/styles_production_quality.css?version=<?php echo rand() ; ?>">
    <link rel="stylesheet"
        href="<?php echo base_url()?>/assets/css/financial_metrics.css?version=<?php echo rand() ; ?>">

    <script src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chart.min.js?version=<?php echo rand() ; ?>">
    </script>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>/assets/css/all-fontawesome.css?version=<?php echo rand() ; ?>">
    <script
        src="<?php echo base_url(); ?>/assets/chartjs/package/dist/chartjs-plugin-datalabels.min.js?version=<?php echo rand() ; ?>">
    </script>

    <!-- full screen script -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.fullscreen.min.js"></script>

</head>

<!-- preloader -->
<div id="overlay">
    <div class="cv-spinner">
        <span class="spinner"></span>
        <span class="loading">Awaiting Completion...</span>
    </div>
</div>
<!-- preloader end -->

<div class="mr_left_content_sec">
    <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg fixsubnav_quality">
        <div class="container-fluid paddingm display_f justify_sb align_c">
            <div class="header_text_nav">
                <div class="oui_arrow_div">
                    <div class="dotAccessArrow dot-css acsControl marleftDot" style="margin-right:0.7rem;margin-left:0.4rem;" id="">
                        <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" onclick="oui_arrow_to_card()" class="img_font_wh dot-cont" style="height: 26px;transform: rotate(180deg);">
                    </div>
                </div>
                <p class="float-start fnt_fam mdl_header p3">Current Shift Performance</p>
            </div>

            <div class="d-flex display_f align_c">
                <div id="full_screen_btn_visibility">
                    <div class="full-screen"  onclick="fullscreen_mode()">
                        <div style="width:max-content;">
                            <i class="fa-solid fa-expand dot-cont"></i>
                        </div>
                    </div>
                </div>
                
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
                    <div class="dotAccessArrow dot-css acsControl marleftDot Previous_Shift_Live" status="">
                        <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont"
                            style="height: 26px;transform: rotate(180deg);">
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
                        <img src="<?php echo base_url('assets/img/oui_arrow.png'); ?>" class="img_font_wh dot-cont"
                            style="height: 18px;">
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
     
    <div class="graph-content">
        <div class="full_screen_close" onclick="fullscreen_mode_remove();">
            <div class="full-screen">
                <img src="<?php echo base_url('assets/icons/cancel1.png'); ?>" class="icon_img_wh">
            </div>
        </div>
        <div class="grid-container-cont row paddingm" id="full_screen_cards">
        </div>
    </div> 


    <!-- oui screen start -->
    <!-- oui screen -->
    <div class="oui_screen oui_screen_view" style="display: none;">
        <div class="second_header display_f justify_sb align_c">
            <div class="left_margin">
                <p class="paddingm machine_name" id="machine_name_oui"> </p>
                <P class="paddingm part_name" id="part_name_oui"></P>
            </div>
            <div class="">
                <p class="paddingm machine_name text_align_c" id="event_logo" style="font-size:1.2rem;"> Downtime </p>
                <P class="paddingm part_name text_align_c" id="event_duration_machine"> </P>
            </div>
            <div class="right_margin" style="display:flex;">
                <div class="oui_duration_only_active">
                    <i class="fa fa-circle" style="font-size:10px;color:white;"></i>
                    <span class="active_duration_oui" style="margin:0;padding:0;margin-right:1rem;font-size:1.4rem;font-family:'Roboto',sans-serif;color:white;font-weight:bold;"></span>
                </div>
                 <p class="paddingm machine_name" id="latest_event_machine" style="font-size:1.3rem;font-weight:600;"> Event </p>
            </div> 
        </div>

        <div class="body_area display_f">
            <div class="display_f graph_section" style="margin-bottom: 1rem;">
                <div class="outer mr_right_oui" style="width: 35%;">
                    <div class="po_relative">
                        <label class="outer_label">GOALS</label>
                        <div class="display_f">
                            <div class="" style="width: 65%;margin-top: 1rem;">
                                <div class="skill display_f justify_c align_c">
                                    <div class="inner flex_f display_f justify_c align_c">
                                        <div class="text_align_c" id="number_completion">
                                            
                                        </div>
                                        <div class="text_align_c" style="width: 80%;"> 
                                            <p class="white_s over_h text_e part_name" id="part_name_oui_p"></p>
                                        </div>
                                    </div>
                                    <svg version="1.1" class="svg_oui">
                                        <defs>
                                            <linearGradient id="GradientColor_oui">
                                                <stop id="circle_graph_colors" stop-color="#ffffff" />
                                            </linearGradient>
                                        </defs>
                                        <circle class="circle_oui" id="" cx="96" cy="96" r="71" stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="display_f justify_c align_c" style="width: 35%;margin-top: 1rem;">
                                <div class="" style="width:65%;">
                                    <p class="paddingm" style="">
                                        <span class="text-small">Target</span>
                                        <span class="target_text2"></span>
                                    </p>
                                    <div class="target_bar bg_title target_outline" style="width: 100%;">
                                        <div class="target_inline">
                                            <p class="paddingm target_inline_Cont"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="display_f justify_c">
                            <p class="text-small text-bold paddingm">
                                <span>
                                    <img src="<?php echo base_url(); ?>/assets/icons/duration_logo.png" alt="" class="icons_duration_oui">
                                </span>
                                <span id="remaining_time_duration">12m 11s</span>
                                <span class="icons_space_oui">
                                    <i class="fa fa-circle icons_dot_oui"></i>
                                </span>
                                <span id="estimated_time_target">2023-05-07 00:00</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mr_left_oui" style="width: 65%;">
                    <div class="outer po_relative" style="height: 40%;">
                        <label class="outer_label">TIMELINE</label>
                        <div class="display_f justify_sa" style="height: 100%;flex-direction: column;">
                            <div id="chartOp"></div>
                            <div class="">
                                <span class="float-start labelAlign display_f justify_c align_c"><div class="labelGraph" style="background: #01bb55"></div><p class="paddingm label_text">ACTIVE</p></span>
                                <span class="float-start labelAlign display_f justify_c align_c"><div class="labelGraph" style="background: #005abc"></div><p class="paddingm label_text">INACTIVE</p></span>
                                <span class="float-start labelAlign display_f justify_c align_c"><div class="labelGraph" style="background: #595959"></div><p class="paddingm label_text">MACHINE OFF</p></span>
                            </div>
                        </div>
                    </div>
                    <div class="outer po_relative" style="height: 57%;margin-top: 0.5rem;">
                        <label class="outer_label">PARTS BY HOUR</label>
                        <div class="display_f justify_sa" style="height: 100%;flex-direction: column;">
                            <div class="production-graph-area">
                                <div class="item-production-oui">
                                    <div class="item-production-s-oui" id="" style="background-color: rgba(255, 255, 255, 0.05);width: 78%;"></div>
                                    <div class="graph-content-div-oui production-graph-prod">
                                        <canvas id="production-graph" style="padding-top: 5px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <span class="float-start labelAlign display_f justify_c align_c"><div class="labelGraph" style="background: #595959"></div><p class="paddingm label_text">GOOD PARTS</p></span>
                                <span class="float-start labelAlign display_f justify_c align_c"><div class="labelGraph" style="background: #595959"></div><p class="paddingm label_text">REJECTED PARTS</p></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="display_f live_section">
                <div class="mr_right_oui" style="width: 35%;">
                    <div class="po_relative" style="height: 100%">
                        <div class="outer-bottom-con display_f justify_sb align_c">
                            <div style="float:left;" class="smallDivs">
                                <div class="display_f align_c justify_c cssDiv bg_title"><p class="paddingm">Downtime</p></div>
                                <div class="display_f align_c justify_c endDiv bg_light"><p id="downtime_duration"></p></div>
                            </div>
                            <div style="float:left;" class="smallDivs">
                                <div class="display_f align_c justify_c cssDiv bg_title"><p class="paddingm">Cycle Time</p></div>
                                <div class="display_f align_c justify_c endDiv bg_light"><p id="part_cycle_time"></p></div>
                            </div>
                            <div style="float:left;" class="smallDivs">
                                <div class="display_f align_c justify_c cssDiv bg_title"><p class="paddingm">Reject Counts</p></div>
                                <div class="display_f align_c justify_c endDiv bg_light"><p id="liveRejectCount"></p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="outer mr_left_oui" style="width: 65%;">
                    <div class="po_relative" style="height: 100%;">
                        <label class="outer_label">EFFICIENCY</label>
                        <div class="display_f align_c justify_c" style="height: 100%;">
                            <div style="flex: left;width: 20%;">  
                            </div>
                            <div style="flex: left;width: 20%;">
                                <p class="text-small text_align_c"><b>A</b>vailability</p>
                                <p class="paddingm text-small text_align_c" id="oui_availability"></p>
                            </div>
                            <div style="flex: left;width: 20%;">
                                <p class="text-small text_align_c"><b>P</b>erformance</p>
                                <p class="paddingm text-small text_align_c" id="oui_performance"></p>
                            </div>
                            <div style="flex: left;width: 20%;">
                                <p class="text-small text_align_c"><b>Q</b>uality</p>
                                <p class="paddingm text-small text_align_c" id="oui_quality"></p>
                            </div>
                            <div style="flex: left;margin-right: 2rem;" class="smallDivs">
                                <div class="display_f justify_c align_c cssDiv bg_title"><p class="paddingm">SHIFT OEE</p></div>
                                <div class="display_f justify_c align_c endDiv bg_light"><p id="oui_oee" style="font-size: 1.7rem;margin-top: 0.5rem;"></p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- oui screen end -->

    <a class="prev slideControl" onclick="plusSlides(-1)">
        <i class="fa fa-angle-left" style="font-size:36px"></i>
    </a>
    <a class="next slideControl" onclick="plusSlides(1)">
        <i class="fa fa-angle-right" style="font-size:36px"></i>
    </a>
   
</div>


<script src="<?php echo base_url(); ?>/assets/apexchart/dist/apexcharts.js"></script>
<script src="<?php echo base_url(); ?>/assets/js/all-fontawesome.js?version=<?php echo rand() ; ?>"></script>

<script type="text/javascript">

$("#overlay").fadeIn(300);

let slideIndex = 0;
let slideIndexLimit = 10;
function plusSlides(n) {
  showSlides(n);
}

function showSlides(n) {
    let i;
    let j;
    let slides = document.getElementsByClassName("grid-item-cont");

    if (n == 1) {slideIndex = slideIndex+2}
    if (n == -1) {slideIndex = slideIndex-2}
    if (n == 0) {slideIndex = slideIndex}


    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }
    if (slideIndex<0) {
        slideIndex = slides.length-2;
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    let l = slideIndex;
    for (j = l; j < (10); j++) {
        slides[j].style.display = "block";
    }
}


var myChart = "";
var myChartList = [];
var i_global = "";
$('.oui_arrow_div').css('display', 'none');
$('.visibility_div').css('display', 'inline');
var j_global = "";
var mx_global="";


getMachineDataLive();
 
mx_global = setInterval(function() {
    getMachineDataLiveUpdate();
}, 1000);

$(document).on('click','.Previous_Shift_Live',function(event){
    myChartList =[];
    $(".Previous_Shift_Live").attr("status",1);
    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getPreviousShiftLive'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async: false,
        success: function(res) {
            // clearInterval(mx_global);
            clearInterval(i_global);
            clearInterval(j_global);
            getTileupdate(res);
        },
        error: function(res) {
            // Error Occured!
        }
    });
    
});


function getMachineDataLiveUpdate(){
    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getLive'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function(res) {
            var date =   $("#s_date_ref").val();
            var shift =   $("#s_id_ref").val();
            var s = $(".Previous_Shift_Live").attr("status");

            if (date == res[0]['shift_date'] && shift == res[0]['shift_id'] && s=="") {
                // Same sift Maintaine..
            }else if (s == 1) {
                // Previous sift, So no need to change anything..
            }else{
                getTileupdate(res);
            }
        },
        error: function(res) {
            // Error Occured!
        }
    });
}
function getTileupdate(res){
    var date = new Date(res[0]['shift_date']);
    date = date.getDate() + " " + date.toLocaleString([], {
        month: 'short'
    }) + " " + date.getFullYear();

    $("#shift_date").html(date);
    $('#shift_date').attr('sdate_format', res[0]['shift_date']);
    $("#shift_id").html("Shift " + res[0]['shift_id']);
    var s_time = res[0]['start_time'].split(":");
    var e_time = res[0]['end_time'].split(":");
    $("#start_time").html(s_time[0] + ":" + s_time[1]);
    $("#end_time").html(e_time[0] + ":" + e_time[1]);

    $("#s_time_val").val(s_time[0] + ":" + s_time[1] + ":" + s_time[2]);
    $("#e_time_val").val(e_time[0] + ":" + e_time[1] + ":" + s_time[2]);

    $("#s_date_ref").val(res[0]['shift_date']);
    $("#s_id_ref").val(res[0]['shift_id']);

    getLiveMode(res[0]['shift_date'], res[0]['shift_id']);

    var target_graph_date_time_val = date+","+e_time[0] + ":" + e_time[1] + ":" + s_time[2];
    $('#shift_date_oui_graph').text(target_graph_date_time_val);
}
function getMachineDataLive(res) {
    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getLive'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function(res) {
            getTileupdate(res);
        },
        error: function(res) {
            // Error Occured!
        }
    });
}

function getLiveMode(shift_date, shift_id) {
    // var x = $('#Filter-values').val();
    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async: false,
        data: {
            shift_date: shift_date,
            shift_id: shift_id,
            // filter:x,
        },
        success: function(res) {
            console.log("current shift performance live mode value");
            console.log(res);
            $('.grid-container-cont').empty();
            res['latest_event'].forEach(function(machine) {
                var machine_name = "";
                var production_total = 0;
                res['machine_name'].forEach(function(m) {
                    if (m['machine_id'] == machine[0]['machine_id']) {
                        machine_name = m['machine_name'];
                    }
                });

                res['production_total'].forEach(function(m) {
                    if (m['machine_id'] == machine[0]['machine_id']) {
                        production_total = m['total'];
                    }
                });

                var elements = $();
                // title="' + machine_name + '"
                elements = elements.add('<div class="grid-item-cont">' +
                    '<div class="item-header" id="item-header-' + machine[0]['machine_id'] +
                    '">' +
                    '<div>' +
                    '<p class="paddingm pad-top cen-align fnt-color machine_name_ref" tid_data="'+machine[0]['tool_id']+'" mid_data="' +
                    machine[0]['machine_id'] + '"  id="Machine_name_' + machine[0][
                    'machine_id'] + '" title="' + machine_name + '">' + machine_name + '</p>' +
                    '<p class="paddingm cen-align fnt-color current_event" event="" duration="" id="latest_status_' +
                    machine[0]['machine_id'] + '"></p>' +
                    '</div>' +
                    '</div>' +
                    '<div class="item-circle">' +
                    '<div class="inner-circle">' +
                    '<div class="inner-val">' +
                    '<p class="paddingm production_completion production_completion_ref"><span id="production_per' +
                    machine[0]['machine_id'] + '"></span></p>' +
                    '<p class="paddingm production_completion partname_ref" id="partname_' +
                    machine[0]['machine_id'] + '" title="">Part Name</p>' +
                    '</div>' +
                    '</div>' +
                    '<svg version="1.1" class="svg">' +
                    '<defs>' +
                    '<linearGradient id="GradientColor_' + machine[0]['machine_id'] + '">' +
                    '<stop id="circle_graph_colors_' + machine[0]['machine_id'] +
                    '" stop-color="#d10527" />' +
                    '</linearGradient>' +
                    '</defs>' +
                    '<circle class="circle" id="' + machine[0]['machine_id'] +
                    '" cx="120" cy="120" r="47" stroke-linecap="round"/>'+
                    '<div class="part_completion hover_area">'+
                        '<div style="display: flex;">' +
                            '<div class="hover_header_area paddingm fnt_fam hover_header_light">Part Name</div>' +
                            '<div class="hover_header_val_area"><p class="paddingm fnt_fam hover_val" id="part_name_hover_' +machine[0]['machine_id'] + '"></p></div>' +
                        '</div>' +
                        '<div style="display: flex;">' +
                            '<div class="hover_header_area paddingm fnt_fam hover_header_light">Tool Name</div>' +
                            '<div class="hover_header_val_area" ><p class="paddingm fnt_fam hover_val" id="tool_name_hover_' +machine[0]['machine_id'] + '"></p></div>' +
                        '</div>' +
                        '<div style="display: flex;">' +
                            '<div class="hover_header_area paddingm fnt_fam hover_header_light">Part Completion</div>' +
                            '<div class="hover_header_val_area" ><p class="paddingm fnt_fam hover_val" id="part_completion_hover_' +machine[0]['machine_id'] + '"></p></div>' +
                        '</div>' +
                    '</div>' +
                    '</svg>' +
                    '</div>' +
                    '<div class="item-oee hoverCardOEECurrent" style="margin: 0.5rem;">' +
                    '<div style="width: 19%;display: flex;justify-content: flex-end;"><p class="paddingm oee-lable">OEE</p></div>' +
                    '<div class="FLayer">' +
                    '<div class="BLayer" id="Target_' + machine[0]['machine_id'] + '"></div>' +
                    '<div class="SLayer" id="SLayer_' + machine[0]['machine_id'] + '"></div>' +
                    '<div  class="TLayer TTotal" id="TTotal_' + machine[0]['machine_id'] +
                    '">' +
                    '<p class="values_oee paddingm val" id="SLayer_val_Color_' + machine[0][
                        'machine_id'
                    ] + '"><span id="SLayer_val_' + machine[0]['machine_id'] +
                    '"></span>%</p>' +
                    '</div>' +
                    '</div>' +
                    '</div>'

                    +
                    '<div class="hover_area hoverOverallOEE_Current hoverOverall_current">' +
                    '<div style="display: flex;">' +
                        '<div class="hover_header_area paddingm fnt_fam hover_header_light">OEE%</div>' +
                        '<div class="hover_header_val_area" ><p class="paddingm fnt_fam hover_val teepVal" id="OEE_' +machine[0]['machine_id'] + '">0%</p></div>' +
                    '</div>' +
                    '<div style="display: flex;">' +
                        '<div class="hover_header_area paddingm fnt_fam hover_header_light">Target</div>' +
                        '<div class="hover_header_val_area"><p class="paddingm fnt_fam hover_val teepTarget" id="OEETarget_' +machine[0]['machine_id'] + '">0%</p></div>' +
                    '</div>' +
                    '<div style="display: flex;" class="margin-top">' +
                        '<div class="hover_header_area paddingm fnt_fam hover_header_light">Availability%</div>' +
                        '<div class="hover_header_val_area"><p class="paddingm fnt_fam hover_val teepTarget" id="OEEAvail_' +machine[0]['machine_id'] + '">0%</p></div>' +
                    '</div>' +
                    '<div style="display: flex;">' +
                        '<div class="hover_header_area paddingm fnt_fam hover_header_light">Performance%</div>' +
                        '<div class="hover_header_val_area"><p class="paddingm fnt_fam hover_val teepTarget" id="OEEPerf_' +machine[0]['machine_id'] + '">0%</p></div>' +
                    '</div>' +
                    '<div style="display: flex;">' +
                        '<div class="hover_header_area paddingm fnt_fam hover_header_light">Quality%</div>' +
                        '<div class="hover_header_val_area"><p class="paddingm fnt_fam hover_val teepTarget" id="OEEQuali_' +machine[0]['machine_id'] + '">0%</p></div>' +
                    '</div>' +
                    '</div>'


                    +
                    '<div class="item-production">' +
                    '<div class="item-production-s" id="item_production_s_' + machine[0][
                        'machine_id'
                    ] + '"></div>' +
                    '<div class="graph-content-div">' +
                    '<canvas id="production-graph-' + machine[0]['machine_id'] +
                    '" style=""></canvas>' +
                    '</div>' +
                    '</div>' +
                    '</div>');
                $('.grid-container-cont').append(elements);

                // OEE Target....
                $('#Target_' + machine[0]['machine_id'] + '').css("width", parseInt(res['targets'][
                    0].oee) + "%");

                // OEE Percentage......
                $('#SLayer_' + machine[0]['machine_id'] + '').css("width", parseInt(res['oee'][0]
                    .OEE) + "%");

                $('#SLayer_val_' + machine[0]['machine_id'] + '').html(parseInt(0));

                // Latest Status........
                $('#latest_status_' + machine[0]['machine_id'] + '').html(res['latest_event'][0][0]
                    .duration + "m " + res['latest_event'][0][0].event);

                
                // Production Percentage.......
                var target_production = 0;
                // res['production_target'].forEach(function(pp){
                //     if (machine[0]['machine_id'] == pp['machine_id']) {
                //         target_production = pp['target'];
                //     }
                // });
                var shift_production=0;
                res['shift_production_target'].forEach(function(i){
                    if (i['machine_id'] == machine[0]['machine_id']) {
                        target_production = i['shift_production_target'];
                        shift_production = i['shift_production'];
                    }
                });

                var production_percent = parseInt((shift_production / target_production) * 100);
                var production_percent_val = 470 - (4.7 * production_percent);
                const MyFSC_container = document.getElementsByClassName("circle");
                MyFSC_container[0].style.setProperty("--foo", production_percent_val);

                // Production Percentage......
                $('#production_per' + machine[0]['machine_id'] + '').html(production_percent);


                // Graph Portion
                var hourly = [];
                var hourList = [];
                var production_target = [];
                var part_name_list = [];
                var rejections_list = [];
                res['data'].forEach(function(items) {
                    if (items['machine'] == machine[0]['machine_id']) {
                        items['production'].forEach(function(i) {
                            hourly.push(i['production']);
                            hourList.push(i['start_time'] + " to " + i['end_time']);
                            part_name_list.push(i['part_name']);
                            rejections_list.push(i['rejections']);
                        });
                        items['targets'].forEach(function(i) {
                            production_target.push(i);
                        });
                    }
                });

                ChartDataLabels.defaults.color = "#ffffff";
                // ChartDataLabels.defaults.font.size=8;
                ChartDataLabels.defaults.font.family = "Roboto, sans-serif";

                var ctx = document.getElementById('production-graph-' + machine[0]['machine_id'] +
                    '').getContext('2d');
                myChartList[myChartList.length] = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: hourList,
                        datasets: [{
                                label: "Total Parts",
                                type: "bar",
                                backgroundColor: "white",
                                borderColor: "rgba(0, 0, 0, 0)",
                                borderWidth: 1,
                                fill: true,
                                data: hourly,
                                part_name: part_name_list,
                                rejections: rejections_list,
                                categoryPercentage: 1.0,
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
                                part_name: part_name_list,
                                pointRadius: 0,
                                stepped: 'before',
                            },
                        ],
                    },
                    options: {
                        scalebeginAtZero: false,
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                display: false,
                                beginAtZero: true,
                                stacked: false,
                            },
                            x: {
                                display: false,
                                grid: {
                                    display: false
                                },
                                stacked: true,
                            },
                        },
                        plugins: {
                            datalabels: {
                                anchor: "end",
                                align: "end",
                                offset: -16,
                                color: "white",
                                font: {
                                    size: 8,
                                },
                                formatter: (value, context) => context.datasetIndex === 0 ?
                                    value : '',

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


            // carousel
            
            $('.carousel_content_item').empty();
            var total_count = res['latest_event'].length;
            var tmp_count = total_count / 10;
            var loop_end = Math.ceil(tmp_count);

            for (var i = 0; i < loop_end; i++) {

                var carousel_ele = $();
                var start_index = i * 10;
                var end_index = (i + 1) * 10;
                var carousel_index = i + 1;
                if (i === 0) {
                    $('.carousel_content_item').append(
                        '<div class="carousel-item active  carousel_slide_number' + carousel_index +
                        '" style="background-color:white;height:100%;padding:1rem;display:flex;flex-direction:row;"></div>'
                        );
                } else if (i > 0) {
                    $('.carousel_content_item').append('<div class="carousel-item carousel_slide_number' +
                        carousel_index +
                        '"  style="background-color:white;width:100%;padding:1rem;display:flex;flex-direction:row;"></div>'
                        );
                }
                res['latest_event'].forEach(function(machine, index) {
                    if (index >= start_index && index < end_index) {

                        var machine_name = "";
                        var production_total = 0;
                        res['machine_name'].forEach(function(m) {
                            if (m['machine_id'] == machine[0]['machine_id']) {
                                machine_name = m['machine_name'];
                            }
                        });

                        res['production_total'].forEach(function(m) {
                            if (m['machine_id'] == machine[0]['machine_id']) {
                                production_total = m['total'];
                            }
                        });

                        var elements = $();
                        elements = elements.add('<div class="grid-item-cont">' +
                            '<div class="item-header" id="item-header1-' + machine[0][
                                'machine_id'
                            ] + '">' +
                            '<div>' +
                            '<p class="paddingm pad-top cen-align fnt-color machine_name_ref" tid_data="'+machine[0]['tool_id']+'" mid_data="' +
                            machine[0]['machine_id'] + '"  id="Machine_name1_' + machine[0][
                                'machine_id'
                            ] + '" title="' + machine_name + '">' + machine_name + '</p>' +
                            '<p class="paddingm cen-align fnt-color current_event" event="" duration="" id="latest_status_' +
                            machine[0]['machine_id'] + '"></p>' +
                            '</div>' +
                            '</div>' +
                            '<div class="item-circle">' +
                            '<div class="inner-circle">' +
                            '<div class="inner-val">' +
                            '<p class="paddingm production_completion production_completion_ref"><span id="production_per1' +
                            machine[0]['machine_id'] + '"></span>%</p>' +
                            '<p class="paddingm production_completion partname_ref" id="partname1_' +
                            machine[0]['machine_id'] + '" title="">Part Name</p>' +
                            '</div>' +
                            '</div>' +
                            '<svg version="1.1" class="svg">' +
                            '<defs>' +
                            '<linearGradient id="GradientColor_1' + machine[0]['machine_id'] +
                            '">' +
                            '<stop id="circle_graph_colors_1' + machine[0]['machine_id'] +
                            '" stop-color="#d10527" />' +
                            '</linearGradient>' +
                            '</defs>' +
                            '<circle class="circle" id="' + machine[0]['machine_id'] +
                            '1" cx="120" cy="120" r="47" stroke-linecap="round"/>'
                            // +'<div class="part_completion">'
                            //   +'<p class="paddingm">Part Completion</p>'
                            // +'</div>'
                            +
                            '<div class="part_completion hoverOverallOEE_Current hoverOverall_current">' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%" id="title_overall">Part Name</div>' +
                            '<div style="width: 30%" class="val_color" ><p class="paddingm cen-align" id="part_name_hover_' +
                            machine[0]['machine_id'] + '"></p></div>' +
                            '</div>' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%" id="title_overall">Tool Name</div>' +
                            '<div style="width: 30%" class="val_color" ><p class="paddingm cen-align" id="tool_name_hover_' +
                            machine[0]['machine_id'] + '"></p></div>' +
                            '</div>' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%" id="title_overall">Part Completion</div>' +
                            '<div style="width: 30%" class="val_color" ><p class="paddingm" id="part_completion_hover_' +
                            machine[0]['machine_id'] + '"></p></div>' +
                            '</div>' +
                            '</div>' +
                            '</svg>' +
                            '</div>' +
                            '<div class="item-oee hoverCardOEECurrent" style="margin: 0.5rem;">' +
                            '<div style="width: 19%;display: flex;justify-content: flex-end;"><p class="paddingm oee-lable">OEE</p></div>' +
                            '<div class="FLayer">' +
                            '<div class="BLayer" id="Target1_' + machine[0]['machine_id'] +
                            '"></div>' +
                            '<div class="SLayer" id="SLayer1_' + machine[0]['machine_id'] +
                            '"></div>' +
                            '<div  class="TLayer TTotal" id="TTotal1_' + machine[0][
                                'machine_id'] + '">' +
                            '<p class="values_oee paddingm val" id="SLayer_val_Color1_' +
                            machine[0]['machine_id'] + '"><span id="SLayer_val_' + machine[0][
                                'machine_id'
                            ] + '"></span>%</p>' +
                            '</div>' +
                            '</div>' +
                            '</div>'

                            +
                            '<div class="hoverOverallOEE_Current hoverOverall_current">' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%" id="title_overall">OEE%</div>' +
                            '<div style="width: 30%" class="val_color" ><p class="paddingm teepVal" style="width:max-content;" id="OEE_' +
                            machine[0]['machine_id'] + '">0%</p></div>' +
                            '</div>' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%">Target</div>' +
                            '<div style="width: 30%"><p class="paddingm teepTarget" id="OEETarget1_' +
                            machine[0]['machine_id'] + '">0%</p></div>' +
                            '</div>' +
                            '<div style="display: flex;" class="margin-top">' +
                            '<div style="width: 70%">Availability%</div>' +
                            '<div style="width: 30%"><p class="paddingm teepTarget" id="OEEAvail1_' +
                            machine[0]['machine_id'] + '">0%</p></div>' +
                            '</div>' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%">Performance%</div>' +
                            '<div style="width: 30%"><p class="paddingm teepTarget" id="OEEPerf1_' +
                            machine[0]['machine_id'] + '">0%</p></div>' +
                            '</div>' +
                            '<div style="display: flex;">' +
                            '<div style="width: 70%">Quality%</div>' +
                            '<div style="width: 30%"><p class="paddingm teepTarget" id="OEEQuali1_' +
                            machine[0]['machine_id'] + '">0%</p></div>' +
                            '</div>' +
                            '</div>'


                            +
                            '<div class="item-production">' +
                            '<div class="item-production-s" id="item_production_s1_' + machine[
                                0]['machine_id'] + '"></div>' +
                            '<div class="graph-content-div">' +
                            '<canvas id="production-graph1123-' + machine[0]['machine_id'] +
                            '" style=""></canvas>' +
                            '</div>' +
                            '</div>' +
                            '</div>');
                        $('.carousel_slide_number' + carousel_index).append(elements);

                        // OEE Target....
                        $('#Target1_' + machine[0]['machine_id'] + '').css("width", parseInt(res[
                            'targets'][0].oee) + "%");

                        // OEE Percentage......
                        $('#SLayer1_' + machine[0]['machine_id'] + '').css("width", parseInt(res[
                            'oee'][0].OEE) + "%");

                        $('#SLayer_val1_' + machine[0]['machine_id'] + '').html(parseInt(0));

                        // Latest Status........
                        $('#latest_status1_' + machine[0]['machine_id'] + '').html(res[
                            'latest_event'][0][0].duration + "m " + res['latest_event'][0][
                            0].event);

                        var target_production = 0;  
                        var shift_production=0;
                        res['shift_production_target'].forEach(function(i){
                            if (i['machine_id'] == machine[0]['machine_id']) {
                                target_production = i['shift_production_target'];
                                shift_production = i['shift_production'];
                            }
                        });

                        // Production Percentage.......
                        var production_percent = parseInt((shift_production / target_production) *
                            100);
                        var production_percent_val = 470 - (4.7 * production_percent);
                        const MyFSC_container = document.getElementsByClassName("circle");
                        MyFSC_container[0].style.setProperty("--foo", production_percent_val);

                        // Production Percentage......
                        $('#production_per1' + machine[0]['machine_id'] + '').html(
                            production_percent);


                        // Graph Portion
                        var hourly = [];
                        var hourList = [];
                        var production_target = [];
                        var part_name_list = [];
                        var rejections_list = [];
                        res['data'].forEach(function(items) {
                            if (items['machine'] == machine[0]['machine_id']) {
                                items['production'].forEach(function(i) {
                                    hourly.push(i['production']);
                                    hourList.push(i['start_time'] + " to " + i[
                                        'end_time']);
                                    part_name_list.push(i['part_name']);
                                    rejections_list.push(i['rejections']);
                                });
                                items['targets'].forEach(function(i) {
                                    production_target.push(i);
                                });
                            }
                        });

                        ChartDataLabels.defaults.color = "#ffffff";
                        // ChartDataLabels.defaults.font.size=8;
                        ChartDataLabels.defaults.font.family = "Roboto, sans-serif";

                    }

                });
                // carousel_ele = carousel_ele.add('</div>');
                // $('.carousel_content_item').append(carousel_ele);
            }

            live_graph(shift_date,shift_id);
            live_target(shift_date);
        },
        error: function(res) {
            // Error Occured!
        }
    });
}

$(".circle").mouseover(function() {
    var count = $('.circle');
    var index_val = count.index($(this));
    $('.part_completion:eq(' + index_val + ')').css("display", "block");
});
$(".circle").mouseout(function() {
    var count = $('.circle');
    var index_val = count.index($(this));
    $('.part_completion:eq(' + index_val + ')').css("display", "none");
});

$(document).on("mousemove", ".circle", function(e) {
    var relX = event.pageX - $(this).offset().left;
    var relY = event.pageY - $(this).offset().top;
    var relBoxCoords = "(" + relX + "," + relY + ")";
    var count = $('.circle');
    var index_val = count.index($(this));
    // $('.part_completion:eq(' + index_val + ')').css("transform", "translate3d(" + relX + "px," + relY + "px,0px)");
});

function live_target_update(shift_date) {
    // $('#item_production_s_'+machine[0]['machine_id']+'').css("background-color",state_color_rgb);
    var s_time = $("#s_time_val").val();
    var e_time = $("#e_time_val").val();

    var st_time = new Date(shift_date + " " + s_time);
    var et_time = new Date(shift_date + " " + e_time);

    s_time = new Date(shift_date + " " + s_time);
    e_time = new Date(shift_date + " " + e_time);
    var temp = new Date(shift_date + " " + s_time);

    while (true) {
        st_time = new Date(st_time.setTime(st_time.getTime() + (60 * 1000)));
        if (st_time.getHours() == et_time.getHours() && st_time.getMinutes() == et_time.getMinutes()) {
            break;
        }
    }

    var difference = (new Date(st_time).getTime() - new Date(s_time).getTime()) / 1000;

    var st1_time = s_time;
    var et1_time = new Date();

    if (st_time >= et1_time) {

        while (true) {
            st1_time = new Date(st1_time.setTime(st1_time.getTime() + (1000)));
            if (st1_time.getHours() == et1_time.getHours() && st1_time.getMinutes() == et1_time.getMinutes() && st1_time
                .getSeconds() == et1_time.getSeconds()) {
                break;
            }
        }

        var temp_time = new Date(shift_date + " " + ($("#s_time_val").val()));
        

        var difference_current = (new Date(st1_time).getTime() - new Date(temp_time).getTime()) / 1000;

        var w = parseFloat((difference_current / difference) * 100).toFixed(2);
        $('.item-production-s').css("width", String(w) + "%");
    }else{
        $('.item-production-s').css("width", "100%");
    }

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

        let innerHtml = '<div>';

        innerHtml += '<div class="grid-container">';

        innerHtml += '<div class="title-bold"><span>' + context.chart.config._config.data.labels[context.tooltip
            .dataPoints[0].dataIndex] + '</span></div>';
        innerHtml += '<div class="cost-value title-bold-value"><span></span></div>';

        if (context.tooltip.dataPoints[0].datasetIndex == 0) {
            innerHtml += '<div class="grid-item content-text margin-top"><span>Part Name</span></div>';
            innerHtml += '<div class="grid-item content-text-val margin-top"><span class="values-op">' + context.chart
                .config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].part_name[context.tooltip
                    .dataPoints[0].dataIndex] + '</span></div>';

            innerHtml += '<div class="grid-item content-text"><span>' + context.tooltip.dataPoints[0].dataset.label +
                '</span></div>';
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">' + (context.chart.config
                ._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip.dataPoints[
                    0].dataIndex]) + '</span></div>';

            if (context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].rejections[
                    context.tooltip.dataPoints[0].dataIndex] == null) {
                var r = 0;
            } else {
                var r = context.chart.config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex]
                    .rejections[context.tooltip.dataPoints[0].dataIndex];
            }

            innerHtml += '<div class="grid-item content-text"><span>Rejections</span></div>';
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">' + r + '</span></div>';
        } else {
            innerHtml += '<div class="grid-item content-text margin-top"><span>' + context.tooltip.dataPoints[0].dataset
                .label + '</span></div>';
            innerHtml += '<div class="grid-item content-text-val margin-top"><span class="values-op">' + (context.chart
                .config._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].data[context.tooltip
                    .dataPoints[0].dataIndex]) + '</span></div>';

            innerHtml += '<div class="grid-item content-text"><span>Part Name</span></div>';
            innerHtml += '<div class="grid-item content-text-val"><span class="values-op">' + context.chart.config
                ._config.data.datasets[context.tooltip.dataPoints[0].datasetIndex].part_name[context.tooltip.dataPoints[
                    0].dataIndex] + '</span></div>';
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
b = 0;
c = 0;
var shift_date = "";
var shift_id = "";

function live_graph(s_date, s_id) {
    // i_global = setInterval(function() {
        live_MC1001(s_date, s_id);
    // }, 2000);
}

function live_target(s_date) {
    // j_global = setInterval(function() {
        live_target_update(s_date);
    // }, 1000);
}

$('#Filter-values').on('change', function(event) {
    $("#overlay").fadeIn(300);
    var option = $('#Filter-values').val();
    var x = $('.values_oee');
    var len = x.length;
    var arr = [];
    var val = [];
    if (option == 1) { //Soritng based on OEE
        for (var p = 0; p < len; p++) {
            arr.push(p);
            val.push(parseInt($('.values_oee:eq(' + p + ')').children('span').html()));
        }
        
        for (var i = 0; i < len; i++) {
            var min = i;
            for (var j = i; j < len; j++) {
                if (parseFloat(val[j]) <= parseFloat(val[min])) {
                    min = j;
                }
            } 
            var temp = val[i];
            val[i] = val[min];
            val[min] = temp;

            var temp_elem = $('.grid-item-cont:eq(' + i + ')');
            var elem = $('.grid-item-cont:eq(' + min + ')');
            elem.insertBefore($('.grid-item-cont:eq(' + i + ')'));
            temp_elem.insertAfter($('.grid-item-cont:eq(' + (min) + ')'));
        }
    } else if (option == 2) {
        for (var i = 0; i < len; i++) {
            arr.push(i);
            val.push(parseInt($('.production_completion_ref:eq(' + i + ')').children('span').html()));
        }
        for (var i = 0; i < len - 1; i++) {
            var min = i;
            for (var j = i + 1; j < len; j++) {
                if (val[j] > val[min]) {
                    min = j;
                }
            }

            var temp = val[i];
            val[i] = val[min];
            val[min] = temp;

            var temp_elem = $('.grid-item-cont:eq(' + i + ')');
            var elem = $('.grid-item-cont:eq(' + min + ')');
            elem.insertBefore($('.grid-item-cont:eq(' + i + ')')).fadeIn(3000);
            temp_elem.insertAfter($('.grid-item-cont:eq(' + (min) + ')')).fadeIn(3000)
        }
    } else if (option == 0) {
        for (var i = 0; i < len; i++) {
            arr.push(i);
            var ref = $('.production_completion_ref:eq(' + i + ')').children('span').attr("id");
            ref = ref.split("_per");
            val.push(ref[1]);
        }
        for (var i = 0; i < len - 1; i++) {
            var min = i;
            for (var j = i + 1; j < len; j++) {
                var tempx = val[j].split("C");
                var tempy = val[min].split("C");
                if ((parseInt(tempx[1]) - 1000) < (parseInt(tempy[1]) - 1000)) {
                    min = j;
                }
            }

            var temp = val[i];
            val[i] = val[min];
            val[min] = temp;

            var temp_elem = $('.grid-item-cont:eq(' + i + ')');
            var elem = $('.grid-item-cont:eq(' + min + ')');
            elem.insertBefore($('.grid-item-cont:eq(' + i + ')')).fadeIn(3000);
            temp_elem.insertAfter($('.grid-item-cont:eq(' + (min) + ')')).fadeIn(3000);
        }
    } else {
        var x = $('.current_event');
        var len = x.length;
        var up = [];
        var up_time = [];
        for (var i = 0; i < len; i++) {
            up.push($('.current_event:eq(' + i + ')').attr("event"));
            up_time.push($('.current_event:eq(' + i + ')').attr("duration"));
        }

        for (var i = 0; i < len - 1; i++) {
            var min = i;
            for (var j = i + 1; j < len; j++) {
                if (parseInt(up_time[j]) > parseInt(up_time[min])) {
                    min = j;
                }
            }   
            var temp = up_time[i];
            up_time[i] = up_time[min];
            up_time[min] = temp;

            var temp_elem = $('.grid-item-cont:eq(' + i + ')');
            var elem = $('.grid-item-cont:eq(' + min + ')');
            elem.insertBefore($('.grid-item-cont:eq(' + i + ')')).fadeIn(3000);
            temp_elem.insertAfter($('.grid-item-cont:eq(' + (min) + ')')).fadeIn(3000);
        }

        up = [];
        up_time = [];

        for (var i = 0; i < len; i++) {
            up.push($('.current_event:eq(' + i + ')').attr("event"));
            up_time.push($('.current_event:eq(' + i + ')').attr("duration"));
        }

        for (var i = len; i >= 1; i--) {
            if (up[i] == "Active") {
                var temp_elem = $('.grid-item-cont:eq(' + i + ')');
                temp_elem.insertAfter($('.grid-item-cont:eq(' + (len - 1) + ')')).fadeIn(3000);
            }
        }
    }
    $("#overlay").fadeOut(300);
});

function live_MC1001(shift_date, shift_id) {
    // var x = $('#Filter-values').val();
    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
        type: "POST",
        dataType: "json",
        cache: false,
        async: false,
        data: {
            shift_date: shift_date,
            shift_id: shift_id,
            // filter:x,
        },
        success: function(res) {
            var n = 0;
            res['latest_event'].forEach(function(machine) {

                var machine_name = "";
                var production_total = 0;
                var color = "";
                var event = "";
                var duration = 0;
                var partList = "";
                var val_color = "";
                var tool_name = "";
                res['machine_name'].forEach(function(m) {
                    if (m['machine_id'] == machine[0]['machine_id']) {
                        machine_name = m['machine_name'];
                        event = machine[0]['event'];
                        duration = machine[0]['duration'];
                        partList = machine[0]['part_id'];
                        tool_name = machine[0]['tool_name']
                    }
                });

                var partListArr = partList.split(",");
                var partname = "";
                partListArr.forEach(function(p) {
                    res['part_list'].forEach(function(pl) {
                        if (p == pl['part_id']) {
                            if (partListArr.length > 1) {
                                partname = partname + pl['part_name'] + ",";
                            } else {
                                partname = pl['part_name'];
                            }
                        }
                    });
                });

                if (partListArr.length > 1) {
                    partname = partname.substring(0, partname.length - 1);
                }

                // Update Part Name 
                $('#partname_' + machine[0]['machine_id'] + '').html(partname);
                $('#partname_' + machine[0]['machine_id'] + '').attr("title", partname);

                $('#part_name_hover_' + machine[0]['machine_id'] + '').html(partname);

                // Update Tool Name
                $('#tool_name_hover_' + machine[0]['machine_id'] + '').html(tool_name);


                // Update Machine Name
                $('#Machine_name_' + machine[0]['machine_id'] + '').html(machine_name);
                var time = duration.split(".");
                // Update Machine Current Status
                if (time.length > 1) {
                    var h = parseInt(time[0] / 60);
                    var m = time[0] % 60;
                    if (h > 0) {
                        $('#latest_status_' + machine[0]['machine_id'] + '').html(h + "h " + m +
                            "m " + time[1] + "s " + event);
                    } else {
                        $('#latest_status_' + machine[0]['machine_id'] + '').html(time[0] + "m " +
                            time[1] + "s " + event);
                    }
                    $('#latest_status_' + machine[0]['machine_id'] + '').attr("duration", (parseInt(
                        time[0] * 60) + parseInt(time[1])));
                } else {
                    var h = parseInt(time[0] / 60);
                    var m = time[0] % 60;
                    if (h > 0) {
                        $('#latest_status_' + machine[0]['machine_id'] + '').html(h + "h " + m +
                            "m "  + event);
                    } else {
                        $('#latest_status_' + machine[0]['machine_id'] + '').html(time[0] + "m " +
                            event);
                    }
                    $('#latest_status_' + machine[0]['machine_id'] + '').attr("duration", (parseInt(
                        time[0] * 60)));
                }
                $('#latest_status_' + machine[0]['machine_id'] + '').attr("event", event);

                res['production_total'].forEach(function(m) {
                    if (m['machine_id'] == machine[0]['machine_id']) {
                        production_total = m['total'];
                    }
                });

                res['oee'].forEach(function(m) {
                    if (m['Machine_Id'] == machine[0]['machine_id']) {
                        // Current OEE Status Update.....
                        if (res['targets'][0].yellow > m['OEE']) {
                            color = "#dc062a";
                            val_color = "white";
                        } else if (res['targets'][0].green > m['OEE']) {
                            color = "#ffbf00";
                            val_color = "black";
                        } else {
                            color = "#00b04f";
                            val_color = "white";
                        }

                        // Update OEE Background
                        $('#SLayer_' + machine[0]['machine_id'] + '').css(
                            "background-color", color);

                        // Update OEE
                        $('#SLayer_' + machine[0]['machine_id'] + '').css("width", m[
                            'OEE'] + "%");
                        $('#SLayer_val_' + machine[0]['machine_id'] + '').html(parseInt(m[
                            'OEE']));
                        $('#SLayer_val_Color_' + machine[0]['machine_id'] + '').css("color",
                            val_color);


                        // Update OEE Availability
                        $('#OEEAvail_' + machine[0]['machine_id'] + '').html(parseInt(m[
                            'Availability']) + "%");
                        // Update OEE Performance
                        $('#OEEPerf_' + machine[0]['machine_id'] + '').html(parseInt(m[
                            'Performance']) + "%");

                        // Update OEE Quality
                        $('#OEEQuali_' + machine[0]['machine_id'] + '').html(parseInt(m[
                            'Quality']) + "%");


                        $('#OEE_' + machine[0]['machine_id'] + '').html(parseInt(m['OEE']) + "%");
                    }
                });

                // Current Status Update.
                var state_color = "";
                var state_color_rgb = "";
                var state_bar_color = "";
                if (event == "Active") {
                    state_color = "#00b04f";
                    state_color_rgb = "rgba(0,122,55,0.1)";
                    state_bar_color = "#007a37";
                } else if (event == "Inactive") {
                    state_color = "#d10527";
                    state_color_rgb = "rgba(209,5,39,0.1)";
                    state_bar_color = "#a4041f";
                } else if (event == "Machine OFF") {
                    state_color = "#7f7f7f";
                    state_color_rgb = "rgba(127,127,127,0.1)";
                    state_bar_color = "#404040";
                } else {
                    state_color = "#ffc50d";
                    state_color_rgb = "rgba(255,197,13,0.1)";
                    state_bar_color = "#ffc50d";
                }

                // Update Header
                $('#item-header-' + machine[0]['machine_id'] + '').css("background-color",
                    state_color);

                // Update Production Target
                $('#item_production_s_' + machine[0]['machine_id'] + '').css("background-color",
                    state_color_rgb);

                // Update OEE Target
                $('#Target_' + machine[0]['machine_id'] + '').css("width", res['targets'][0].oee +
                    "%");
                $('#OEETarget_' + machine[0]['machine_id'] + '').html(parseInt(res['targets'][0].oee) + "%");

                // Update Production Percentage
                var target_production = 0;  
                var production_total=0;
                res['shift_production_target'].forEach(function(i){
                    if (i['machine_id'] == machine[0]['machine_id']) {
                        target_production = i['shift_production_target'];
                        production_total = i['shift_production'];
                    }
                });

                var production_percent = parseInt((production_total / target_production) * 100);
                console.log("current shift performance production target selection");
                console.log(production_percent);
                res['production_target'].forEach(function(tmid){
                    if (tmid['machine_id']==machine[0]['machine_id']) {
                        if (parseInt(tmid['target'])>0) {
                            $('#production_per' + machine[0]['machine_id'] + '').html(production_percent+"%");
                            $('#part_completion_hover_' + machine[0]['machine_id'] + '').html(production_percent + "%");
                        }else{
                            $('#production_per' + machine[0]['machine_id'] + '').html('NA');
                            $('#part_completion_hover_' + machine[0]['machine_id'] + '').html("NA");
                        }
                    }
                }); 
               

                // Graph Portion
                var hourly = [];
                var hourList = [];
                var production_target = [];
                var total_target = 0;
                var production_tar_per = 0;
                res['data'].forEach(function(items) {
                    if (items['machine'] == machine[0]['machine_id']) {
                        items['production'].forEach(function(i) {
                            hourly.push(i['production']);
                            hourList.push(i['start_time'] + " to " + i['end_time']);
                        });
                        items['targets'].forEach(function(i) {
                            production_target.push(i);
                            total_target = total_target + i;
                        });
                        items['target_per'].forEach(function(i) {
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
                dataset.data = [];
                label.labels = [];
                dataset_target.data = [];
                for (var i = 0; i < len; i++) {
                    dataset.data[i] = hourly[i];
                    label.labels[i] = hourList[i];
                    dataset_target.data[i] = production_target[i];
                }

                // Update Production color
                myChart.data.datasets[0].backgroundColor = state_bar_color;
                myChart.data.datasets[0].borderColor = "rgba(0, 0, 0, 0)";
                myChart.update();

                // Update Prodcution Percentage value
                var production_percent_val = 470 - (2.4 * production_percent);
                var iterate = document.getElementsByClassName("circle");
                var refcolor = 'url(' + '#GradientColor_' + machine[0]['machine_id'] + ')';

                // 230
                for (val of iterate) {
                    // mahince_id ===machine_id
                    if (val.getAttribute("id") == machine[0]['machine_id']) {
                        // 471 to 300
                        val.style.setProperty("--foo", production_percent_val);
                        val.style.setProperty("--ref_graph", refcolor);
                    }
                }

                var color_code = "";
                if (production_percent > 75) {
                    color_code = "#c2fb05";
                } else if (production_percent > 50) {
                    color_code = "#fae910";
                } else if (production_percent > 25) {
                    color_code = "#c55911";
                } else {
                    color_code = "#d10527";
                }

                document.getElementById('circle_graph_colors_' + machine[0]['machine_id'])
                    .attributes['stop-color'].value = color_code;
                n = n + 1;
            });
            $("#overlay").fadeOut(300);
        },
        error: function(res) {

        }
    });
}


// cards click function

$(document).on('click', '.grid-item-cont', function(event) {
    event.preventDefault();
   
    var find_index = $('.grid-item-cont');
    var index_val = find_index.index($(this));
    $("#overlay").fadeIn(300);
    // #009644 green header card body part graph  #007A37 card header
    oui_functions_call(index_val);
});


function oui_functions_call(index_val){
    $("#overlay").fadeIn(300);

    fullscreen_mode_remove();

    var tmp_mid = $('.machine_name_ref:eq(' + index_val + ')').attr('mid_data');
    var tid_data = $('.machine_name_ref:eq('+index_val+')').attr('tid_data');
    var shift_date = $('#shift_date').attr("sdate_format");
    var shift_id = $('#shift_id').text();
    var event_status = $('.current_event:eq(' + index_val + ')').attr('event');
    var machine_name = $('.machine_name_ref:eq(' + index_val + ')').text();
    const tmp = shift_id.split(" ");

    // OUI FUNCTIONS...........
    var backgroundcolor = "";
    var background_title_color="";
    var background_light_color="";
    var border_color="";
    var production_bar_color="";
    var sub_header = "";

    // event_status = "Inactive";

    if (event_status === "Active") {
        backgroundcolor = "#01ab4e";
        background_title_color="#007a37";
        background_light_color="#009a46";
        border_color = "#01a149";
        sub_header = "#01ab4e";

    } else if (event_status === "Inactive") {
        backgroundcolor = "#d10527";
        background_title_color="#730316";
        background_light_color="#bb0523";
        border_color = "#9e041e";
        sub_header = "";

    } else if (event_status === "Machine OFF") {
        backgroundcolor = "#7f7f7f";
        background_title_color="#404040";
        background_light_color="#565656";
        border_color = "#bfbfbf";
        sub_header = "";

    } else {
        backgroundcolor = "#ffd966";
        background_title_color="#b08600";
        background_light_color="#ffc50d";
        border_color = "#d0a61b";
        sub_header = "";
    }

    
    $('.oui_screen_view').css('background-color', backgroundcolor);
    $('.outer_label').css('background-color', backgroundcolor);
    $('.bg_title').css('background-color', background_title_color);
    $('.bg_light').css('background-color', background_light_color);
    $('.outer').css('border-color', border_color);
    $('.second_header').css('background-color',sub_header);
    
    
    getProductionGraph(tmp_mid,shift_date,tmp[1],background_title_color,border_color);
    getDownTimeGraph(tmp_mid,shift_date,tmp[1]);
    getLiveOEE(tmp_mid,shift_date,tmp[1]);
    getDowntimeDuration(tmp_mid,shift_date,tmp[1]);
    getLiveProduction(tmp_mid,shift_date,tmp[1]);
    getPartCycleTime(tmp_mid);
    getRejectCounts(tmp_mid,shift_date,tmp[1]);
    target_oui_graph(tmp_mid,tid_data,shift_date,shift_id);
    $('.graph-content').css('display', 'none');
    $('.oui_screen_view').css('display', 'block');
    $('.oui_arrow_div').css('display', 'inline');
    $('.visibility_div').css('display', 'none');
    $('#full_screen_btn_visibility').css('visibility','hidden');

    $("#overlay").fadeOut(300);
}
    

   
//     var tmp_mid = $('.machine_name_ref:eq(' + index_val + ')').attr('mid_data');
//     var tid_data = $('.machine_name_ref:eq('+index_val+')').attr('tid_data');
//     var shift_date = $('#shift_date').attr("sdate_format");
//     var shift_id = $('#shift_id').text();
//     var event_status = $('.current_event:eq(' + index_val + ')').attr('event');
//     var machine_name = $('.machine_name_ref:eq(' + index_val + ')').text();
//     // alert(shift_id.split(" "));
//     const tmp = shift_id.split(" ");


//     const shift_arr = [];
//     shift_arr.push(tmp[1]);
//     await getDownTimeGraph(tmp_mid, shift_date, shift_arr);
//     await target_oui_graph(tmp_mid,tid_data,shift_date);
//     await part_by_hour(tmp_mid, shift_date, tmp[1], bar_color);
//     await div_records(tmp_mid, shift_date, tmp[1], bar_color, card_body);
//     await circle_data_oui(tmp_mid,shift_date,tmp[1]);
//     $('.target_graph_child_div').css('background-color',circle_target_color);
//     $('#oui_circle_graph_color').attr('stop-color',circle_target_color);
//     
//     //alert(backgroundcolor);
//     $('.cycle_time_val_div').css('background-color',backgroundcolor);
//     $('.oui_header_div').css('background-color', backgroundcolor);
//     $('.label_header').css('background-color', backgroundcolor);
//     $('.oui_sub_header').css('background-color', card_body);
//     $('.target_graph_parent_div').css('background-color', bar_color);
//     $('.line_color_border').css('border', '1px solid ' + line);
//     $('.label_text_color').css('color', label_text);
//     $('#machine_status').text(event_status);
//     $('#machine_name_text').text(machine_name);

//     $('.downtime_second_val').css('display', downtime_display_property);
//     $('.oui_arrow_div').css('display', 'inline');
//     $('.visibility_div').css('display', 'none');
//     $('#full_screen_btn_visibility').css('visibility','hidden');
//     $("#overlay").fadeOut(300);
// }



// downtime graph global variables
var event_ref = new Array();
var machineID_ref = "";
var shift_date_ref = "";
var shift_Ref = "";
var data_duration = new Array();
var data_notes = new Array();
var down_notes = new Array();
var machine_Name = "";
var part_name_tooltip = new Array();

function color_bar(color, reason) {
    var colordemo = "";
    if (color == "Machine OFF") {
        if (reason == 1) {
            colordemo = "#686868";
        } else {
            colordemo = "#888888";
        }
    } else if (color == "Inactive") {
        if (reason == 1) {
            colordemo = "#4F8DF2";
        } else {
            colordemo = "#015BBC";
        }
    } else if (color == "Active") {
        colordemo = "#01bb55";
    } else if (color == "Offline") {
        colordemo = "#f2f2f2";
    } else {
        colordemo = "#f2f2f2";
    }
    return colordemo;
}

function fullscreen_mode() {
    $('.left-sidebar').css('display','none');
    $('.topnav').css('display','none');
    $('.fixsubnav_quality').css('display','none');

    $('.mr_left_content_sec').css('top', '0rem');
    $('.mr_left_content_sec').css('margin-left', '0rem');

    $('.grid-container-cont').css('margin-top', '0rem');
    $('.full_screen_close').css('display','block');
    $('.full_screen_close').css('display','flex');

    showSlides(0);

    const element = document.documentElement;
    if (element.requestFullscreen) {
      element.requestFullscreen();
    } else if (element.webkitRequestFullscreen) {
      element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) {
      element.msRequestFullscreen();
    }

    $('.prev').css('margin-left','-4.5rem');

    let slides = document.getElementsByClassName("grid-item-cont");
    if (slides.length > 0) {
        $('.slideControl').css('display','block');
    }
}

function fullscreen_mode_remove(){

    // return new Promise(function(resolve,reject){

   
    $('.left-sidebar').css('display','block');
    $('.topnav').css('display','block');
    $('.fixsubnav_quality').css('display','block');

    $('.mr_left_content_sec').css('margin-left', '4.5rem');
    $('.mr_left_content_sec').css('top', '4rem');

    $('.topnav').css('display','flex');
    $('.fixsubnav_quality').css('display','flex');
    $('.graph-content').css('display','block');
    $('.full_screen_close').css('display','none');

    $('.prev').css('margin-left','0rem');
    let slides = document.getElementsByClassName("grid-item-cont");
    for (j = 0; j < slides.length; j++) {
        slides[j].style.display = "block";
    }

    const element = document.documentElement;
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }

    $('.slideControl').css('display','none');

// });
}

// var full = document.getElementById("full_screen_id");

// function full_screen_fun() {
//   document.getElementById("full_screen_id").requestFullscreen();
//     // if (document.fullscreenEnabled) {
//     //   full.requestFullscreen();
//     // } else if (full.webkitRequestFullscreen) { /* Safari */
//     //   full.webkitRequestFullscreen();
//     // } else if (full.msRequestFullscreen) { /* IE11 */
//     //   full.msRequestFullscreen();
//     // }
//     // $(document).fullScreen(true);
// }

$(document).on('click','.close_div_circle',function(event){
    event.preventDefault();

    $('.left-sidebar').css('display','inline');
    $('.full_screen_mode_oui_disturb').css('display','inline');
    $('.hide_full_screen').css('display','inline');
    $('.hide_full_screen').css('margin-left','4.5rem');
    $('.full_screen_div').css('display','none');
    // $('.graph-content').css('display','inline');
});


// this function return to oui to cards
function oui_arrow_to_card(){
    $('#full_screen_btn_visibility').css('visibility','visible');
    $('.visibility_div').css("display",'inline');
    $('.graph-content').css('display', 'inline');
    $('.graph-content').css('display', 'block');
    $('.oui_screen_view').css('display', 'none');
    // $('.grid-container-cont').css('margin-top', '5rem');
    $('.oui_arrow_div').css("display",'none');
    // $('#full_screen_cards').empty();
    // fullscreen_mode_remove();
}


// Production Graph
function getProductionGraph(machine_id,shift_date,shift,backgroundcolor,border_color){
    $('#production-graph').remove();
    $('.production-graph-prod').append('<canvas id="production-graph"><canvas>');
    $.ajax({
        url: "<?php echo base_url('Current_Shift_Performance/getLiveMode');?>",
        type: "POST",
        dataType: "json",
        async:false,
        data:{
            shift_date: shift_date,
            shift_id: shift,
            filter:2,
        },
        success: function(res){
            var hours_list=[];
            var production_count = [];
            var production_target =[];
            var rejection_count =[];

            res['hours'].forEach(function(item){
                hours_list.push(item);
            });

            res['data'].forEach(function(item){
                if (item['machine'] == machine_id) {
                    item['production'].forEach(function(p){
                        production_count.push(parseInt(p['production']));
                    });
                }
            });

            res['data'].forEach(function(item){
                if (item['machine'] == machine_id) {
                    item['production'].forEach(function(p){
                        rejection_count.push(parseInt(p['rejections']));
                    });
                }
            });

            res['data'].forEach(function(item){
                if (item['machine'] == machine_id) {
                    item['targets'].forEach(function(p){
                        production_target.push(p);
                    });
                }
            });

                ChartDataLabels.defaults.color = "#ffffff";
                ChartDataLabels.defaults.font.size=16;
                ChartDataLabels.defaults.font.family = "Roboto, sans-serif";
                var ctx = document.getElementById('production-graph').getContext('2d');
                myChartList = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: hours_list,
                        datasets: [{
                                label: "Total Parts",
                                type: "bar",
                                backgroundColor: backgroundcolor,
                                borderWidth: 1,
                                fill: true,
                                data:production_count,
                                // part_name: part_name_list,
                                // rejections: rejections_list,
                                categoryPercentage: 1.0,
                                barPercentage: 0.8,
                            },
                            {
                                label: "Total Rejection",
                                type: "bar",
                                backgroundColor: "#595959",
                                borderWidth: 1,
                                fill: true,
                                data:rejection_count,
                                // part_name: part_name_list,
                                // rejections: rejections_list,
                                categoryPercentage: 1.0,
                                barPercentage: 0.8,
                            },
                            {
                                label: "Production Target",
                                type: "line",
                                backgroundColor: "#ffffff",
                                borderColor: "#ffffff",
                                borderWidth: 1,
                                fill: false,
                                data:production_target,
                                // part_name: part_name_list,
                                pointRadius: 0,
                                stepped: 'before',
                            },
                        ],
                    },
                    options: {
                        scalebeginAtZero: false,
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                display: false,
                                beginAtZero: true,
                                grid: {
                                    display: false,
                                    color:"#01a149",
                                },
                                stacked: true,
                            },
                            x: {
                                display: true,
                                grid: {
                                    display: true,
                                    color:border_color,
                                },
                                stacked: true,
                                ticks:{
                                    crossAlign: 'far',
                                    padding:5,
                                    color:"#ffffff",
                                }
                            },
                        },
                        plugins: {
                            datalabels: {
                                anchor: "start",
                                align: "end",
                                offset: 6,
                                color: "white",
                                font: {
                                    size: 12,
                                },
                                formatter: (value, context) => context.datasetIndex === 0 ?
                                    value : '',
                            },
                            legend: {
                                display: false,
                                labels: {
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            tooltip: {
                                // enabled: false,
                                // external: productionTooltip,
                            },
                        },
                    },
                    plugins: [ChartDataLabels],
                });
        },
        error: function(err){
            // error......
        }
    });
}
// Downtime Graph
function getDownTimeGraph(machine_id, shift_date, s) { 
        var url = "<?php echo base_url('PDM_controller/getDownGraph'); ?>";
        $.ajax({
            method: 'POST',
            url: url,
            dataType: 'json',
            // async:false,
            data: {
                machine_id: machine_id,
                shift_date: shift_date,
                shift: s,
            },
            success:function(response){
                response['shift']['shift'].forEach(function(item) {
                    var x = item.shifts.split("");
                    if (x[0] == s[0]) {
                        const downtime_start_time_split = item.start_time.split(':');
                        const downtime_end_time_split = item.end_time.split(':');

                        shift_stime = item.start_time;
                        shift_etime = item.end_time;
                    }
                });
                $('#chartOp').empty();
                var graph_Data = [];
                var machine_on_count = [];
                var machine_off_count = [];
                var tool_change_count = [];
                var i = 0;
                var preview = "";
                var val;
                var x = 0;
                var noDataArray = [];
                if (response['machineData'].length > 0) {
                    $.each(response['machineData'], function(key, model) {
                        if (model.duration >= 0) {
                            if (model.event == "No Data") {
                                noDataArray.push('slantedLines');
                            } else {
                                if (key == 0) {
                                    st = new Date(model.calendar_date + " " + shift_stime);
                                    et = new Date(model.calendar_date + " " + model.start_time);
                                    if (st.getTime() !== et.getTime()) {
                                        noDataArray.push('slantedLines');
                                    } else {
                                        noDataArray.push(undefined);
                                    }
                                } else {
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

                            colordemo = color_bar(model.event, model.reason_mapped);
                            var machineEvent = model.machine_event_id;
                            event_ref.push(model.machine_event_id);

                            colordemo = color_bar(model.event, model.reason_mapped);

                            if (key == 0) {
                                st = new Date(model.calendar_date + " " + shift_stime);
                                et = new Date(model.calendar_date + " " + model.start_time);
                                if (st.getTime() !== et.getTime()) {
                                    var res = Math.abs(et - st) / 1000;
                                    duration = (Math.floor(res / 60)) + "." + (Math.floor(res % 60));

                                    colordemo = color_bar("No Data", model.reason_mapped);
                                    graph_Data.push({
                                        name: "No Data",
                                        data: [duration],
                                        color: colordemo,
                                        start: shift_stime,
                                        end: model.start_time,
                                        machineEvent: machineEvent,
                                        down_notes: model.notes,
                                        machine_Name: machine_Name,
                                        part_Name: "No Part",
                                        duration: duration
                                    });
                                } else if (key == (response['machineData'].length - 1)) {
                                    st = new Date(model.calendar_date + " " + shift_etime);
                                    et = new Date(model.calendar_date + " " + model.end_time);
                                    if (st.getTime() !== et.getTime()) {
                                        et_x = new Date();
                                        et = et_x;
                                        st = new Date(model.calendar_date + " " + model.start_time);
                                        var res_tmp = Math.abs(et - st) / 1000;
                                        duration_tmp = (Math.floor(res_tmp / 60)) + "." + (Math.floor(res_tmp %
                                            60));
                                        x_time = (et_x.getHours() > 9 ? et_x.getHours() : "0" + et_x
                                        .getHours()) + ":" + (et_x.getMinutes() > 9 ? et_x.getMinutes() : "0" +
                                                et_x.getMinutes()) + ":" + (et_x.getSeconds() > 9 ? et_x
                                                .getSeconds() : "0" + et_x.getSeconds());

                                        graph_Data.push({
                                            name: model.event,
                                            data: [duration_tmp],
                                            color: colordemo,
                                            start: model.start_time,
                                            end: x_time,
                                            machineEvent: machineEvent,
                                            down_notes: model.notes,
                                            machine_Name: machine_Name,
                                            part_Name: part_name_arr_pass,
                                            duration: duration_tmp
                                        });

                                        noDataArray.push('slantedLines');
                                        st = new Date(model.calendar_date + " " + shift_etime);
                                        var res = Math.abs(et - st) / 1000;
                                        duration = (Math.floor(res / 60)) + "." + (Math.floor(res % 60));
                                        colordemo = color_bar("No Data", model.reason_mapped);
                                        graph_Data.push({
                                            name: "No Data",
                                            data: [duration],
                                            color: colordemo,
                                            start: model.end_time,
                                            end: shift_etime,
                                            machineEvent: machineEvent,
                                            down_notes: model.notes,
                                            machine_Name: machine_Name,
                                            part_Name: part_name_arr_pass,
                                            duration: duration
                                        });
                                    } else {
                                        graph_Data.push({
                                            name: model.event,
                                            data: [model.duration],
                                            color: colordemo,
                                            start: model.start_time,
                                            end: model.end_time,
                                            machineEvent: machineEvent,
                                            down_notes: model.notes,
                                            machine_Name: machine_Name,
                                            part_Name: part_name_arr_pass,
                                            duration: model.duration
                                        });
                                    }
                                } else {
                                    graph_Data.push({
                                        name: model.event,
                                        data: [model.duration],
                                        color: colordemo,
                                        start: model.start_time,
                                        end: model.end_time,
                                        machineEvent: machineEvent,
                                        down_notes: model.notes,
                                        machine_Name: machine_Name,
                                        part_Name: part_name_arr_pass,
                                        duration: model.duration
                                    });
                                }
                            } else if (key == (response['machineData'].length - 1)) {
                                st = new Date(model.calendar_date + " " + shift_etime);
                                et = new Date(model.calendar_date + " " + model.end_time);
                                if (st.getTime() !== et.getTime()) {
                                    et_x = new Date();
                                    et = et_x;
                                    st = new Date(model.calendar_date + " " + model.start_time);
                                    var res_tmp = Math.abs(et - st) / 1000;
                                    duration_tmp = (Math.floor(res_tmp / 60)) + "." + (Math.floor(res_tmp %
                                    60));
                                    x_time = (et_x.getHours() > 9 ? et_x.getHours() : "0" + et_x.getHours()) +
                                        ":" + (et_x.getMinutes() > 9 ? et_x.getMinutes() : "0" + et_x
                                            .getMinutes()) + ":" + (et_x.getSeconds() > 9 ? et_x.getSeconds() :
                                            "0" + et_x.getSeconds());

                                    graph_Data.push({
                                        name: model.event,
                                        data: [duration_tmp],
                                        color: colordemo,
                                        start: model.start_time,
                                        end: x_time,
                                        machineEvent: machineEvent,
                                        down_notes: model.notes,
                                        machine_Name: machine_Name,
                                        part_Name: part_name_arr_pass,
                                        duration: duration_tmp
                                    });

                                    noDataArray.push('slantedLines');
                                    st = new Date(model.calendar_date + " " + shift_etime);
                                    var res = Math.abs(et - st) / 1000;
                                    duration = (Math.floor(res / 60)) + "." + (Math.floor(res % 60));
                                    colordemo = color_bar("No Data", model.reason_mapped);
                                    graph_Data.push({
                                        name: "No Data",
                                        data: [duration],
                                        color: colordemo,
                                        start: model.end_time,
                                        end: shift_etime,
                                        machineEvent: machineEvent,
                                        down_notes: model.notes,
                                        machine_Name: machine_Name,
                                        part_Name: part_name_arr_pass,
                                        duration: duration
                                    });
                                } else {
                                    graph_Data.push({
                                        name: model.event,
                                        data: [model.duration],
                                        color: colordemo,
                                        start: model.start_time,
                                        end: model.end_time,
                                        machineEvent: machineEvent,
                                        down_notes: model.notes,
                                        machine_Name: machine_Name,
                                        part_Name: part_name_arr_pass,
                                        duration: model.duration
                                    });
                                }
                            } else {
                                graph_Data.push({
                                    name: model.event,
                                    data: [model.duration],
                                    color: colordemo,
                                    start: model.start_time,
                                    end: model.end_time,
                                    machineEvent: machineEvent,
                                    down_notes: model.notes,
                                    machine_Name: machine_Name,
                                    part_Name: part_name_arr_pass,
                                    duration: model.duration
                                });
                            }
                        }
                    });
                } else {
                    noDataArray.push('slantedLines');
                    var colordemo = "";
                    colordemo = color_bar("No Data", 0);

                    var du = response['shift']['duration'][0]['duration'].split(":");
                    var d = parseFloat((parseInt(du[0]) * 60) + parseInt(du[1]));
                    colordemo = color_bar("No Data", 0);

                    graph_Data.push({
                        name: "No Data",
                        data: [(d).toFixed(2)],
                        color: colordemo,
                        start: shift_stime,
                        end: shift_etime,
                        machineEvent: "No Event",
                        down_notes: "No Notes",
                        machine_Name: machine_Name,
                        part_Name: "No Part",
                        duration: d
                    });
                }

                var options = {
                    series: graph_Data,
                    chart: {
                        type: 'bar',
                        height: 50,
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
                            show: false,
                            formatter: function(val) {
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
                        custom: function({
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            var data = w.globals.initialSeries[seriesIndex].data[dataPointIndex];
                            var sname = w.globals.initialSeries[seriesIndex].name;
                            var start_time = w.globals.initialSeries[seriesIndex].start;
                            var end_time = w.globals.initialSeries[seriesIndex].end;
                            var part_id = w.globals.initialSeries[seriesIndex].part_id;

                            var machine_Name_Tooltip = w.globals.initialSeries[seriesIndex].machine_Name;
                            var part_name_tooltip = w.globals.initialSeries[seriesIndex].part_Name;

                            return ('<div class="Tooltip_Container">' + '<div>' +
                                '<p class="paddingm nameHeader">' + sname + '</p>' +
                                '<p class="paddingm contentName">' + part_name_tooltip + '</p>' +
                                '<p class="paddingm contentName leftAllign"><span>' + start_time +
                                ' to </span><span>' + end_time + '</span></p>' +
                                '<p class="paddingm durationVal leftAllign">' + data + 'm</p>' +
                                '</div>' +
                                '</div>'

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
                        show: false
                    },
                    annotations: {
                        points: [{
                            x: 30,
                            y: 300,
                            marker: {
                                size: 8,
                                fillColor: '#fff',
                                strokeColor: 'red',
                                radius: 2
                            }
                        }]
                    },
                };

                var chart = new ApexCharts(document.querySelector("#chartOp"), options);
                chart.render();
            },
            error:function(er){
                reject(er);
            }
        });
    
}

    function getLiveOEE(machine_id,shift_date,shift){
        $.ajax({
            url: "<?php echo base_url('Current_Shift_Performance/getLiveMode');?>",
            type: "POST",
            dataType: "json",
            data:{
                shift_date: shift_date,
                shift_id: shift,
                filter:2,
            },
            success: function(res){

                res['oee'].forEach(function(machine) {
                    if (machine['Machine_Id'] == machine_id) {
                        $('#oui_availability').text(parseInt(machine['Availability'])+"%");
                        $('#oui_performance').text(parseInt(machine['Performance'])+"%");
                        $('#oui_quality').text(parseInt(machine['Quality'])+"%");
                        $('#oui_oee').text(parseInt(machine['OEE'])+"%");
                    }
                });

                res['machine_name'].forEach(function(machine) {
                    if (machine['machine_id'] == machine_id) {
                        $('#machine_name_oui').text(machine['machine_name']);
                    }
                });


                res['latest_event'].forEach(function(machine) {
                    if (machine[0]['machine_id'] == machine_id) {
                        $('#latest_event_machine').text(machine[0]['event']);
                        var t = machine[0]['duration'].split(".");
                        if (machine[0]['event']==="Active") {
                            $('#event_duration_machine').css("display",'none');
                            $('#event_logo').css("display",'none');
                            $('.oui_duration_only_active').css("display",'inline');
                            $('.active_duration_oui').text(t[0]+"m");
                        }else{
                            $('#event_duration_machine').css("display",'block');
                            $('#event_logo').css("display",'block');
                            $('.oui_duration_only_active').css("display",'none');
                            $('#event_duration_machine').text(t[0]+"m");
                        }
                        
                    }
                });
            },
            error: function(err) {
                // 
            }
        });
    }

    function getDowntimeDuration(machine_id,shift_date,shift){
        $.ajax({
            url: "<?php echo base_url('Operator/getLiveDowntime'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_ref : machine_id,
                shift_ref : shift,
                shift_date_ref : shift_date
            },
            success: function(res) {
                if (res['h'] > 0) {
                    $('#downtime_duration').text(res['h']+"h"+" "+res['m']+"m");
                }else{
                    $('#downtime_duration').text(res['m']+"m");
                }
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getLiveProduction(machine_id,shift_date,shift){
        $.ajax({
            url: "<?php echo base_url('Operator/getLiveProduction'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_id_ref : machine_id,
                shift_id_ref : shift,
                shift_date_ref : shift_date, 
            },
            success: function(res) {
                $('#remaining_time_duration').text(res['duration_min']+" "+"min");

                var date = new Date();
                date.setMinutes (date.getMinutes() + parseInt(res['duration_min']));

                var x_date = ("0" +date.getDate()).slice(-2)+" "+(date.toLocaleString([], { month: 'short' })+" "+(date.getFullYear()))+", "+("0" +date.getHours()).slice(-2)+":"+("0" +date.getMinutes()).slice(-2);

                $('#estimated_time_target').text(x_date);
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getPartCycleTime(machine_id){
        $.ajax({
            url: "<?php echo base_url('Operator/getPartCycleTime'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_ref : machine_id,
            },
            success: function(res) {
                $('#part_cycle_time').text(res[0]['NICT']+"s");
                $('#part_name_oui').text(res[0]['part_name']);
                $('#part_name_oui').attr("part_id",""+res[0]['part_id']+"");

                $('#part_name_oui_p').text(res[0]['part_name']);

            },
            error: function(res) {
                // Error Occured!
            }
        });
    }

    function getRejectCounts(machine_id,shift_date,shift){
        $.ajax({
            url: "<?php echo base_url('Operator/getLiveRejectCount'); ?>",
            type: "POST",
            dataType: "json",
            async: false,
            data:{
                machine_ref : machine_id,
                shift_ref : shift,
                shift_date_ref : shift_date
            },
            success: function(res) {
                if (res[0]['rejections'] != null && res[0]['rejections'] !="") {
                    $('#liveRejectCount').text(res[0]['rejections']); 
                }else{
                    $('#liveRejectCount').text(0); 
                }
                
            },
            error: function(res) {
                // Error Occured!
            }
        });
    }



    function target_oui_graph(mid,tid,sdate,shift_id){
        // return new Promise(function(resolve,reject){
        $.ajax({
            url:"<?php echo base_url('Current_Shift_Performance/getLiveMode'); ?>",
            method:"POST",
            data:{
                // mid:mid,
                // sdate:sdate,
                // tid:tid,
                shift_date: sdate,
                shift_id: shift_id,
            },
            dataType:"JSON",
            success:function(res){
                console.log("oui tool changeover target graph");
                console.log(res);
                var target = 0;
                res['production_target'].forEach(function(i){
                    if (i['machine_id'] == mid) {
                        target = i['target'];
                    }
                });

                var total_produced=0;
                res['target_production'].forEach(function(i){
                    if (i['machine_id'] == mid) {
                        total_produced = i['total_part_produced'];
                    }
                });
                
                var target_percentage=0;
                if (target > 0) {
                    target_percentage = (total_produced/target)*100;
                }else{
                    target_percentage = 100;
                }
                
                console.log("production target percentage");
                console.log(target_percentage);
                console.log("target tool changeover"+target);
                console.log("target production count :\t"+total_produced);
                if (target_percentage > 100) {
                    
                    $('.target_inline').css('height','100%');
                }else{
                    if (parseInt(target)>0) {
                        $('.target_inline').css('height',target_percentage+'%');
                    }else{
                        $('.target_inline').css('height','2%');
                    }
                    
                }
                if (parseInt(target)>0) {
                    $('.target_inline_Cont').text(total_produced);
                    $('.target_text2').text(target);
                }else {
                    $('.target_inline_Cont').text('NA');
                    $('.target_text2').text('NA');
                    $('#remaining_time_duration').text('NA');
                    $('#estimated_time_target').text('NA');
                }
               

                var shift_target = 0;
                var shift_production=0;
                res['shift_production_target'].forEach(function(i){
                    if (i['machine_id'] == mid) {
                        shift_target = i['shift_production_target'];
                        shift_production = i['shift_production'];
                    }
                });

                var production_percent = (shift_production/shift_target)*100;
                var production_percent_val = 470 - (4.7 * production_percent);
                const circle_container = document.getElementsByClassName("circle_oui");
                circle_container[0].style.setProperty("--foo_oui", production_percent_val);
                if (parseInt(target)>0) {
                    $('#number_completion').text(parseInt(production_percent)+"%");
                }else{
                    $('#number_completion').text("NA");
                }
                

                var color_code = "";
                if (production_percent > 75) {
                    color_code = "#c2fb05";
                } else if (production_percent > 50) {
                    color_code = "#fae910";
                } else if (production_percent > 25) {
                    color_code = "#c55911";
                } else {
                    color_code = "#d10527";
                }

                document.getElementById('circle_graph_colors').attributes['stop-color'].value = color_code;
                document.getElementsByClassName('target_inline')[0].style.backgroundColor  = color_code;

            },
            error:function(er){
                // reject(er);
            }
        });
        // });
    }
</script>