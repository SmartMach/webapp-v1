<style type="text/css">
    /*CSS for Calender dropdown*/
/*.ui-datepicker {
    text-align: center;
    z-index: 1000;
}*/

.ui-datepicker-trigger {
    margin: 0 0 0 5px;
    vertical-align: text-top;
}

.ui-datepicker {
    font-family: Open Sans, Arial, sans-serif;
    margin-top: 2px;
    background-color: white;
    border-radius: 6px 6px 6px 6px;
    padding: 3px;
    width: 256px;
    /* border: 1px solid #dddddd; */
    text-align: center;
    z-index: 100 !important;
}

.openemr-calendar .ui-datepicker {
    width: 191px;
}

.ui-datepicker table {
    width: 15rem;
    margin-left: 8px;
    z-index: 1000;
}

.ui-datepicker table thead{
    font-size: 13;
}
.ui-datepicker table td{
    color: #cacccf;
    background: #f6f6f6;
    border:1px solid #c5c5c5;
}

.ui-datepicker table td:hover{
    color: white;
    background: #c6c6c6;
    border:1px solid #c5c5c5;
}

.ui-datepicker table tr{
  text-align: center;
}

.ui-datepicker-prev{
  float: left;
  cursor: pointer;
  text-decoration: none;
}
.ui-datepicker-next{
  float: right;
  cursor: pointer;
  text-decoration: none;
}

.ui-datepicker-month{
  margin-left:0.5rem;
  padding: 0.1rem;
}
.ui-datepicker-year{
  margin-left:0.5rem;
  padding: 0.1rem;
}
.ui-datepicker-header{
  background-color: #e9e9e9;
  padding: 0.6rem;
  border-radius: 0.2rem;
}

.ui-state-default{
  text-decoration: none;
  font-size: 12px;
}
a{
  color: black; 
}

</style>
<div class="mr_left_content_sec">
        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">Quality Rejects</p>
              <div class="d-flex">
                    <p class="float-end stcode" style="color: #C00000;">
                        <span  id="rejects"></span><span style="font-size:1rem;">Rejects</span>
                    </p>
              </div>
          </div>
        </nav>

        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c ">
            <p class="float-start"></p>
              <div class="d-flex innerNav">
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <select class="form-select font_weight select_input_width input_padd" name="" id="RejectPartName" style="width: 10rem;padding-right:1.8rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Parts</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <input type="datepicker" class="form-control select_input_width input_padd font_weight datepicker" name="" id="RejectShiftDate" style="width: 10rem;" placeholder="dd-mm-yyyy" autocomplete="off">
                          
                            <label for="inputSiteNameAdd" class="input-padding font_weight">Shift Date</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <select class="form-select select_input_width input_padd font_weight" name="" id="RejectShift" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Shifts</label>
                        </div>
                    </div> 
              </div>
          </div>
        </nav>
            <div class="data_section">
                <div class="table_header table_header_p">
                    <div class="row paddingm">
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">FROM TIME</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">TO TIME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">PART NAME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_e align_c text_align_c ">
                          <p class="h_mar_r paddingm">MAX REJECTS <i class="fa fa-info-circle"></i></p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_e align_c text_align_c">
                          <p class="h_mar_r paddingm">REJECT COUNTS</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">REASON</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">NOTES</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_c align_c text_align_c">
                          <p class="paddingm">ACTION</p>
                        </div>
                    </div>
                </div>
                <div class="contentMachine paddingm " style="margin-top:0.9rem;">
                </div>
        </div>
</div>
<div class="modal fade" id="EditQualityModal"  tabindex="-1" aria-labelledby="EditQualityModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <form >
                <div class="modal-body paddingm">   
                <h5 class="modal-title settings-machineAdd-model mt-2 p-4" id="EditQualityModal1" style="">EDIT QUALITY REJECTS</h5>        
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle ">Part Name</label>
                                <p id="PID" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Machine Name</label>
                                <p id="MName" class="font_weight_modal"></p>
                            </div>
                        </div>
                        <div style="width: 50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Shift Date</label>
                                <p id="ShiftDate" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Shift</label>
                                <p id="Shift" class="font_weight_modal"></p>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Last Updated By</label>
                                <p id="LUOn" class="font_weight_modal"></p>
                            </div>
                       <!--  -->
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Last Updated On</label>
                                <p id="LUDate" class="font_weight_modal"></p>
                            </div>
                           
                        </div>
                        <div style="width: 50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">From Time</label>
                                <p id="FromTime" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">To Time</label>
                                <p id="ToTime" class="font_weight_modal"></p>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container ">
                            <div style="width: 50%;" class="carddiv ">
                                <label class="headTitle">Max Rejects</label>
                                <p id="MaxReject" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Total Rejects</label>
                                <p id="TotalRejets" class="font_weight_modal"></p>
                            </div>
                        </div>
                        <div style="width: 50%;" class="flex-container divbox">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="Notes" class="font_weight_modal">
                                <label class="input-padding">Notes</label>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container" style="height:max-content;">
                        <div style="width:55%; height:max-content;" class="flex-container divbox fieldStyle">
                            <div style="width: 100%;height:max-content;" class="carddiv divinput-box ">
                                <input type="text" name="reject_count[]" id="RejectCount" class="RejectCount font_weight_modal">
                                <label class="input-padding">Reject Count <span class="paddingm validate">*</span></label>
                                <span class="reject_count_err validate"></span>
                            </div>
                        </div>
                        <div style="width: 45%;" class="flex-container divbox_reject fieldStyle">
                            <div style="width: 100%;" class="carddiv divinput_box_reject">
                                    <div class="input-box fieldStyle" style="height:max-content;">
                                        <select class="inputDepartmentAdd form-select RejectReason font_weight_modal" name="reject_reason[]" id="RejectReason1" >
                                           
                                        </select>
                                        <label for="input" class="input-padding">Reject Reason <span class="paddingm validate">*</span></label>
                                        <span class="reject_reason_err validate"></span>
                                    </div>
                            </div>
                        </div>    
                        <div style="width:10%;float:right;" class=" paddingm flex-container divbox">
                            <div style="width:100%;float:right;justify-content:center;text-align:center;margin:auto;"><img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" style="width:2.8rem;height: 2.8rem;" class="appendform" id=""></div>
                        </div> 
                    <!-- </div> -->
                    </div>
                    <div class="append_reject"></div>
                    <!-- strategy work end -->
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditReject_submit btn fo bn saveBtnStyle" name="" value="SAVE" style="">Save</a>
                    <a class="btn fo bn cancelBtnStyle" data-bs-dismiss="modal" aria-label="Close" >Cancel</a>   
                </div>
            </form>
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


<!-- link for calendar date  -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

var control = <?php echo $this->data['access'][0]['production_data_management']; ?>;
var display_var = " ";
if (control < 2) {
    display_var = "none";
}else{
    display_var = "inline";
}
// Data Retrive for show in dashboard.......
function selection_data(){
    var shift = $('#RejectShift').val();
    var s = shift.split("");
    var shiftdate = $('#RejectShiftDate').val();
    const date_arr = shiftdate.split('/');
    var shift_date = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
    var partname = $('#RejectPartName').val();  
    $.ajax({
        url: "<?php echo base_url('PDM_controller/getRejectionData'); ?>",
        type: "POST",
        dataType: "json",

        data:{
            shift:s[0],
            shiftdate:shift_date,
            partname:partname,
            async: false,
        },
        success:function(res){
            
            var elements = $();
            var count =0;
            var startTime = "";
            var i=0;
            $('.contentMachine').empty();
            res.forEach(function(item){
                var max_reject =  (item.rejection_max_counts != null ? item.rejection_max_counts:"");
                var reject_count =  (item.rejections != null ? item.rejections:"");
                var notes= (item.rejections_notes != null ? item.rejections_notes:"");

                var s = item.start_time.split(":");
                var e = item.end_time.split(":");

                var reasons_data = item.reject_reason;
                var splitstring=[];
                if (reasons_data != null) {
                    splitstring = (reasons_data).split("&&");
                }
                if (item.rejections != null) {
                    count = parseInt(count)+parseInt(item.rejections);
                }
                elements = elements.add('<div id="settings_div">'
                    +'<div class="row paddingm">'
                        +'<div class="col-sm-1 col marleft">'
                            +'<p id="fdate">'+item.start_time+'</p>'   
                        +'</div>'
                        +'<div class="col-sm-1 col marleft" >'
                            +'<p id="tdate">'+item.end_time+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft" >'
                            +'<p id="pname">'+item.part_name+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marright" >'
                            +'<p id="mreject">'+max_reject+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marright">'
                            +'<p id="rcount" style="color: #e2062c;">'+reject_count+'</p>'
                        +'</div>'
                        +'<div class="col-sm-1 col marleft">'
                            +'<p id="display_reject_reason'+i+'"></p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft">'
                            +'<p>'+notes+'</p>'
                        +'</div>'
                        +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                            +'<ul class="edit-menu">'
                                +'<li class="d-flex justify-content-center " >'
                                    +'<a href="#">'
                                        +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editRejects  pen-product" style="color: #d9d9d9;height:1.2rem;width:1.2rem;display:'+display_var+';" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" ftime="'+item.start_time+'" id="dsedit">'
                                    +'</a>'
                                +'</li>'
                            +'</ul>'               
                        +'</div>'
                    +'</div>'
                +'</div>');
                $('.contentMachine').append(elements);
                var index_id = "display_reject_reason"+i;
                get_display_reason(index_id,splitstring);
                i++;
            });
            (parseInt(count)>9)? ($('#rejects').html(count)):($('#rejects').html('0'+count));
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}


// date picker function 
function datePick(date_shift){
    var enableDays=[];
    date_shift.forEach(function(item){
        enableDays.push(item.shift_date);
    });
    $(".datepicker").datepicker({beforeShowDay: function(dt) {
        var datestring = $.datepicker.formatDate('yy-mm-dd', dt);
        if($.inArray(datestring, enableDays) != -1) {
            return [true];
        }
        else{
            // return [dt.getDay() == 1 || dt.getDay() == 2 ? false : true && vakantie.indexOf(datestring) == -1 ];
            // return [vakantie.indexOf(datestring) == -1 ];
            return [false];
        }   
    },
    changeMonth: true,
    changeYear: true,
    maxDate: new Date()
    });
}

// date picker clear cache function
function clear_data(){
    $('#RejectShiftDate').empty();
    $(".datepicker").datepicker({beforeShowDay:function(date){
        return [false, ''];
    }
    });
}

$(document).ready(function(){
    var control = <?php echo $this->data['access'][0]['production_data_management']; ?>;
    var display_var = " ";
    if (control < 2) {
        display_var = "none";
    }else{
        display_var = "inline";
    }
    $.ajax({
        url: "<?php echo base_url('PDM_controller/getRejectionPart'); ?>",
        type: "POST",
        dataType: "json",
        success:function(res){
            var elements = $();
            $('#RejectPartName').append('<option value="" selected="true" disabled>Select</option>');
            res.forEach(function(item){
                elements = elements.add('<option value="'+item.part_id+'">'+item.part_name+'-'+item.part_id+'</option>');
                $('#RejectPartName').append(elements);
            });
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
        
    $("#RejectShiftDate").attr("readonly", true);
    $("#RejectShiftDate").attr("disabled", true);
    $("#RejectShiftDate").removeAttr("disabled");
    $("#RejectShift").attr("readonly", true);
    $("#RejectShift").attr("disabled", true);
    // if you cselect part name and upload data in shift date records
    $(document).on("change", "#RejectPartName", function(){
        
        $('#rejects').html('');

        $('#RejectShiftDate').prop('selectedIndex',0);
        var part = $('#RejectPartName').val();       
        $('#RejectShiftDate').val('');
        $('#RejectShiftDate').removeAttr('disabled',true);
        $('#RejectShift').attr("readonly",true);
        $.ajax({
            url:"<?php echo base_url('PDM_controller/get_reject_shift_date'); ?>",
            type:"POST",
            dataType:"json",
            data:{
                part_id:part,
            },

            success:function(data){
                // working for onchange
                enableDays = [];
                data.forEach(item=>{
                    enableDays.push(item.shift_date);
                });
                $(".datepicker").datepicker({beforeShowDay: function(dt) {
                    var datestring = $.datepicker.formatDate('yy-mm-dd', dt);
                    if($.inArray(datestring, enableDays) != -1) {
                        return [true];
                    }
                    else{
                        // return [dt.getDay() == 1 || dt.getDay() == 2 ? false : true && vakantie.indexOf(datestring) == -1 ];
                        // return [vakantie.indexOf(datestring) == -1 ];
                        return [false];
                    }   
                },
                changeMonth: true,
                changeYear: true,
                maxDate: new Date()
                });
            },
            error:function(err){
                // alert("Sorry Try again");
            }
        }); 
        $('.fixtabletitle').css("z-index","1");
        $('#RejectShiftDate').val("");
        $("#RejectShiftDate").removeAttr("readonly");
        $('.contentMachine').empty();
        $('#RejectShift').prop('selectedIndex',0);
        $('#RejectShift').attr("disabled",true);
    });

    // shift date onclick time design adding
    $(document).on('click','#RejectShiftDate',function(){
        $( "#ui-datepicker-div" ).css( "border","1px solid #dddddd" );
    });

    // change shift date retrive  shift name function
    $(document).on("change", "#RejectShiftDate", function(){
        
        $('#rejects').html('');

        var part_name = $('#RejectPartName').val();
        var sdate = $('#RejectShiftDate').val();
        $('#RejectShift').empty();
        $('.contentMachine').empty();
        $('#RejectShift').prop('selectedIndex',0);
        const date_arr = sdate.split('/');
        var shift_date = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
        $.ajax({
            url: "<?php echo base_url('PDM_controller/getRejectShift'); ?>",
            type: "POST",
            dataType: "json",
            data:{
                shift_date:shift_date,
            },
            success:function(shift_res){
                var elements = $();
                $('#RejectShift').append('<option value="" selected="true" disabled>Select</option>');
                shift_res['shift'].forEach(function(item){
                    var temp = item.shifts.split("");
                    $.ajax({
                        url:"<?php echo base_url('PDM_controller/correction_rejection_exactshift'); ?>",
                        method:"post",
                        cache: false,
                        async: false,
                        data:{
                            part_name:part_name,
                            shift_date:shift_date,
                            shift:temp[0]
                        },
                        dataType:"json",
                        success:function(shift){
                            if(shift.length > 0){
                                elements = elements.add('<option value="'+item.shifts+'">Shift '+temp[0]+'</option>');
                            }
                        }
                    });
                    $('#RejectShift').append(elements); 
                });
                   
                $("#RejectShift").removeAttr("readonly");
                $("#RejectShift").removeAttr("disabled");
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    });

   
    // rejeciton shift
    $(document).on('change','#RejectShift',function(){
      selection_data();
    });

    // edit rejects
    $(document).on("click", ".editRejects", function(event){
        event.preventDefault();
        var partid = $(this).attr("pIdValue");
        var from_time = $(this).attr("ftime");
        var shift_date = $('#RejectShiftDate').val();
        var shift = $('#RejectShift').val();
        var machine_id = $(this).attr('rvalue');
        var s = shift.split("");
        
        // first empty the edit rejection values then after 
        $('#PID').html(' ');
        $('#MName').html('');
        $('#ShiftDate').html(' ');
        $('#Shift').html(' ');
        $('#LUDate').html(' ');
        $('#LUOn').html('');
        $('#FromTime').html(' ');
        $('#ToTime').html(' ');
        $('#MaxReject').html(' ');
        $('#Notes').val('');
        $('#TotalRejets').html(' ');
        $('#RejectReason').val('');
        $('#RejectCount').val('');

        const shift_arr = shift_date.split('/');
        var shift_date_edit = shift_arr[2]+'-'+shift_arr[0]+'-'+shift_arr[1];
        $.ajax({
            url: "<?php echo base_url('PDM_controller/getRejectData'); ?>",
            type: "POST",
            dataType: "json",
            data:{
                partid:partid,
                from_time:from_time,
                shift_date:shift_date_edit,
                shift:s[0],
                machine_id:machine_id,
            },
            success:function(res){
                $('.append_reject').empty();
                var datetime = getdate_time(res['rejection'][0].last_updated_on);

                $('#PID').html(res['part_name']);
                $('#MName').html(res['machine_name']);
                $('#PID').attr("part_data",res['rejection'][0].part_id);
                $('#MName').attr("machine_data",res['rejection'][0].machine_id);
                $('#ShiftDate').html(res['rejection'][0].shift_date);
                $('#Shift').html('Shift'+' '+res['rejection'][0].shift_id);
                $('#LUDate').html(datetime);
                if(res['last_updated_by'] !=null){
                    $('#LUOn').html(res['last_updated_by'][0].first_name+ " " +res['last_updated_by'][0].last_name);
                }else{
                    $('#LUOn').html('');
                }
                $('#FromTime').html(res['rejection'][0].start_time);
                $('#ToTime').html(res['rejection'][0].end_time);
                $('#MaxReject').html(res['rejection'][0].rejection_max_counts);
                $('#Notes').val(res['rejection'][0].rejections_notes);
                $('#TotalRejets').html(res['rejection'][0].rejections);
                $('.EditReject_submit').attr('max_val',res['rejection'][0].rejection_max_counts);

                var data = res['rejection'][0].reject_reason;
                var splitstring=[];
                if (data !=null) {
                    splitstring = data.split("&&");
                }
                var rrstr = [];
                var rrint = [];
                if (splitstring.length > 1){
                    splitstring.forEach(element => {
                        var demo = parseInt(element);
                        var str = demo.toString().length;
                        element = element.trim();
                        var orgstr = element.split('&');
                        rrstr.push(orgstr[1]);
                        rrint.push(demo);
                    });
                    $('.append_reject').empty();
                    var id_demo = " ";
                    var id_first = document.getElementsByClassName("RejectReason")[0].getAttribute("id");
                    var j = 0;
                    for(var i=1;i<rrstr.length;i++){
                        //   function load in dropdown
                        if (parseInt(i) == 1) {
                            document.getElementsByClassName('RejectCount')[0].value = rrint[0];
                            drp_first_element(id_first,rrstr[0]);
                        }
                        j = parseInt(j) + 1;
                        id_demo = "drp"+j;
                        drp_function(id_demo,rrstr[i]); 
                        // append form
                        $('.append_reject').append('<div class="flex-container remobj" style="height:max-content;">'
                            +'<div style="width:55%;height:max-content;" class="flex-container divbox fieldStyle" >'
                                +'<div style="width: 100%;height:max-content;" class="carddiv divinput-box">'
                                    +'<input type="text" name="reject_count[]" class="RejectCount font_weight" value='+rrint[i]+' id="RejectCount" >'
                                    +'<label class="input-padding">Reject Count <span class="paddingm validate">*</span></label>'
                                    +'  <span class="reject_count_err validate"></span>'
                                +'</div>'
                            +'</div>'
                            +'<div style="width: 45%;" class="flex-container divbox_reject fieldStyle">'
                                +' <div style="width: 100%;" class="carddiv divinput_box_reject">'
                                    +'<div class="input-box fieldStyle" style="height:max-content;">'
                                        +'<select class="inputDepartmentAdd form-select RejectReason font_weight" name="reject_reason[]"  id='+id_demo+'>'
                                        +'</select>'
                                        +' <label for="input" class="input-padding">Reject Reason <span class="paddingm validate">*</span></label>'
                                        +' <span class="reject_reason_err validate"></span>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                            +'<div class="" style="width:10%;justify-content:center;text-align:center;align-item:center;margin:auto;height:max-content;">'
                                    +'<img src="<?php echo base_url('assets/img/delete.png'); ?>" class=" removeappendform" style="width:1.4rem;height:1.2rem;">'
                            +'</div>'
                        +'</div>'); 
                    }
                }else if (splitstring.length == 1){
                    var id_first = document.getElementsByClassName("RejectReason")[0].getAttribute("id");
                    var one_var = splitstring[0].split('&');
                    if (one_var.length > 1){
                        one_reason = one_var[1];
                        one_val = one_var[0];
                        document.getElementsByClassName('RejectCount')[0].value = one_val;
                        drp_first_element(id_first,one_reason);
                    }else{
                        var string_str = "empty";
                        document.getElementById('RejectCount').value = "";
                        drp_first_element(id_first,string_str);
                    } 
                }
                else{
                    var id_first = document.getElementsByClassName("RejectReason")[0].getAttribute("id");
                    var string_str = "empty";
                    document.getElementById('RejectCount').value = "";
                    drp_first_element(id_first,string_str);
                }
                $('.reject_reason_err').html('');
                $('.reject_count_err').html('');
                $('#EditQualityModal').modal('show');
            },
            error:function(err){
                // alert(err);
            }
              
        }); 
    }); 

    // append function for multiple reasons
    $(document).on('click','.appendform',function(){
   
        var id = " ";
        var count = document.getElementsByClassName("RejectReason").length;
        count = parseInt(count) + 1;
        if (count > 0) {
            id = "drp"+parseInt(count);
        }else{
            id = "drp"+parseInt(count);
        }
        var id_check = document.getElementById(id);
        var id_original = " ";
        if (id_check) {
            id_original = id+"a";
        }else{
            id_original = id;
        }
        var reason = "empty";
       
        $('.append_reject').append('<div class="flex-container remobj" style="height:max-content;">'
            +'<div style="width:55%;" class="flex-container divbox fieldStyle" >'
                +'<div style="width: 100%;height:max-content;" class="carddiv divinput-box">'
                    +'<input type="text" name="reject_count[]" class="RejectCount font_weight" id="RejectCount">'
                    +'<label class="input-padding">Reject Count <span class="paddingm validate">*</span></label>'
                    +'  <span class="reject_count_err validate"></span>'
                +'</div>'
            +'</div>'
            +'<div style="width: 45%;" class="flex-container divbox_reject fieldStyle">'
                +' <div style="width: 100%;" class="carddiv divinput_box_reject">'
                    +'<div class="input-box fieldStyle" style="height:max-content;">'
                        +'<select class="inputDepartmentAdd form-select RejectReason font_weight" name="reject_reason[]" id='+id_original+'>'
                        +'</select>'
                        +' <label for="input" class="input-padding">Reject Reason <span class="paddingm validate">*</span></label>'
                        +' <span class="reject_reason_err validate"></span>'
                    +'</div>'
                +'</div>'
            +'</div>'
            +'<div class="" style="width:10%;justify-content:center;text-align:center;align-item:center;margin:auto;height:max-content;">'
                +'<img src="<?php echo base_url('assets/img/delete.png'); ?>" class=" removeappendform" style="width:1.4rem;height:1.2rem;">'
            +'</div>'
        +'</div>');

        drp_function(id_original,reason);
           
    });

    $(document).on("click", ".removeappendform", function(){
        var getdel_ind = $('.removeappendform');
        var get_ind = getdel_ind.index($(this));
        // alert(get_ind);
        get_ind = parseInt(get_ind)+1;
        var getcount = $('.RejectCount:eq('+get_ind+')').val();
        if (parseInt(getcount)>0) {
            var total_count = $('#TotalRejets').text();
            // alert(total_count);
            total_count = parseInt(total_count) - parseInt(getcount);
            // alert(total_count);
            $('#TotalRejets').html(total_count); 
        }
        // alert(getcount);
        $(this).closest('.remobj').remove(); 
        var rjcount = $('.RejectCount').length;
        var totalrj_count = 0;
        for(var j=0;j<rjcount;j++){
            var tmp_count = $('.RejectCount:eq('+j+')').val();
            if (parseInt(tmp_count)>0) {
                totalrj_count = parseInt(tmp_count) + parseInt(totalrj_count);
            }else{
                totalrj_count = 0 + parseInt(totalrj_count);

            }
        }
        var max_reject_count = $('#MaxReject').text();
        console.log(totalrj_count);
        console.log(max_reject_count);
        
        if (parseInt(totalrj_count)>parseInt(max_reject_count)) {
            $('.EditReject_submit').attr("disabled",true);
            // console.log("total rejection is greater");
        }else{
            $('.reject_count_err').html(" ");
            $('.EditReject_submit').removeAttr("disabled");
            // console.log("total rejection is lesser");
        }

       
    });
 
    // on edit rejection count its updated total reject 
    $(document).on('blur','.RejectCount',function(){
        // alert('ok');
        var count = $('.RejectCount');
        var index1 = count.index($(this));
        var pattern = $('.RejectCount')[index1].value;
        var msg = "";
        document.getElementsByClassName('reject_count_err').textContent = msg;

        var max_reject = $('.EditReject_submit').attr("max_val");
        var rcount = $('.RejectCount').length;
        const myarr = [];
        var array_sum_rcount=0;
        for (var i = 0; i < rcount; i++) {
            var re_count =  document.getElementsByClassName('RejectCount')[i].value;
            myarr.push(re_count);
            if(re_count!="" && re_count >0){
                // alert('ok that`s second');
                array_sum_rcount = parseInt(array_sum_rcount)+parseInt(re_count);
                re_count = Math.trunc(re_count);
                $('.RejectCount:eq('+i+')').val(re_count);
                document.getElementsByClassName('reject_count_err')[i].textContent ="";
                // if (parseInt(re_count)>=parseInt(max_reject)) {
                //     $('.reject_count_err:eq('+i+')').text('error');
                //     //document.getElementsByClassName('reject_count_err')[i].textContent ="*";
                // }else{
                //     document.getElementsByClassName('reject_count_err')[i].textContent =" ";
                // }
            }
            else{
                // alert('ji');
                $('.EditReject_submit').attr("disabled",true);    
            }
        }

        if (pattern >= 0) {
            if (parseInt(array_sum_rcount) <= parseInt(max_reject)) {
                $('#TotalRejets').text(array_sum_rcount);
                msg = "";
                $('.EditReject_submit').removeAttr("disabled");
            }
            else{
                $('#TotalRejets').text(array_sum_rcount);
                // rejection error message
                //msg = "*Total reject counts shouldn't be greater than Max rejects";
                for(var k=0;k<=parseInt(rcount);k++){
                    var tmpcount =  document.getElementsByClassName('RejectCount')[k].value;
                    if (parseInt(tmpcount)>=parseInt(max_reject)) {
                        document.getElementsByClassName('reject_count_err')[k].textContent = "*This element is greater to maxreject"; 
                    }
                    else if((tmpcount<0) || tmpcount===""){
                        document.getElementsByClassName('reject_count_err')[k].textContent = " "; 
                    }
                    else{
                        document.getElementsByClassName('reject_count_err')[k].textContent = "*Total reject counts shouldn't be greater than Max rejects"; 

                    }
                    console.log(parseInt(tmpcount));
                }
                $('.EditReject_submit').attr("disabled",true);
            }   
        }
        else if (!pattern) {
            msg = "*Required field";
            $('.EditReject_submit').attr("disabled",true);   
        }
        else if (parseInt(pattern) < 0) {
            msg = "*Positive value only allowed";
            $('.EditReject_submit').attr("disabled",true);
        }
        else{
            msg = "*Numerical value only allowed";
            $('.EditReject_submit').attr("disabled",true);
        }
        document.getElementsByClassName('reject_count_err')[index1].textContent = msg;
    });

    $(document).on('change','.RejectReason',function(event){
        $('.EditReject_submit').removeAttr("disabled");
    });

    // edit rejection count reasons submission function
    $(document).on('click','.EditReject_submit',function(event){
        // after edit modal submit the function working
        event.preventDefault();
        $("#overlay").fadeIn(300);
        var condition = $('.EditReject_submit').attr("disabled");
        console.log(condition);
        if (condition != "disabled" ) {
        
            var reason = $('.RejectReason').length;
            const myarr = [];
            for(var i=0;i<reason;i++){
                var reason_text = document.getElementsByClassName('RejectReason')[i].value;
                myarr.push(reason_text);
            }
            var rcount = $.map($('.RejectCount'),function(count){
                return $(count).val();
            });
            var array_sum_rcount = rcount.reduce(function(a, b){
                return parseInt(a) + parseInt(b);
            }, 0);

            var flag=0;
            for(var x=0;x<rcount.length;x++){
                if (rcount[x] < 0) {
                    flag=1;
                    msg = "*Positive value only allowed";
                    $('.EditReject_submit').attr("disabled",true);
                    document.getElementsByClassName('reject_count_err')[x].textContent = msg;
                }
            }
            if (rcount.length > 1) {
                var al = rcount.length;
                for(var x=0;x<al;x++){
                    if (parseInt(rcount[x]) == 0) {
                        rcount.splice(x, 1);
                        myarr.splice(x, 1);
                    }
                }
            }

            if (rcount.length > 0 && flag==0) {
                var validate_count_max = $('#MaxReject').text();
                var start_time = $('#FromTime').text();
                var shift = $('#RejectShift').val();
                var s = shift.split("");
                shift = s[0];
        
                var shift_date = $('#RejectShiftDate').val();
                const shift_arr = shift_date.split('/');
                var shift_date_edit = shift_arr[2]+'-'+shift_arr[0]+'-'+shift_arr[1];
                var partid = $('#PID').attr("part_data");
                var note = $('#Notes').val();
                // var note = ($('#Notes').val().trim() != "" ? $('#Notes').val():null);
                var machine_id = $('#MName').attr("machine_data");
           
                if (parseInt(array_sum_rcount) <= parseInt(validate_count_max) ) {
                    $.ajax({
                        url: "<?php echo base_url('PDM_controller/reject_form_func'); ?>",
                        method:"POST",
                        dataType:'json',
                        data:{
                            note:note,
                            reason:myarr,
                            rcount:rcount,
                            shift:shift,
                            shift_date:shift_date_edit,
                            partid:partid,
                            start_time:start_time,
                            machine_id:machine_id,
                        },
                        success:function(data){
                            selection_data();
                        }                
                    });  
                    $('#EditQualityModal').modal('hide');      
                    $("#overlay").fadeOut(300);     
                }else{
                    for(var i=0;i<reason;i++){
                        var reason_err = document.getElementsByClassName('RejectCount')[i].value;
                        if (reason_err == "") {
                            document.getElementsByClassName('reject_count_err')[i].textContent = '*Required field';
                        }
                    }
                    $("#overlay").fadeOut(300);   
                }
            }
            else{
                $('.EditReject_submit').attr("disabled",true);
                $("#overlay").fadeOut(300);
            }
        }else{
            $('.EditReject_submit').attr("disabled",true);
            $("#overlay").fadeOut(300);   
        }
    });

    // dropdown for retrive multiplpe reasons function 
    function drp_function(id_demo,reason){
        var id = "ok";
        reason = reason.split('_').join('');
        $('#'+id_demo).empty();
        if (reason == "empty") {

            $.ajax({
                url: '<?php echo base_url('PDM_controller/Reject_retrive'); ?>',
                data:{id:id},
                method:'post',
                dataType:'json',
                success:function(data){
                    var elements = $();
                    data.forEach(function(item){
                        var text = item.quality_reason_name;
                        var id_reason = item.quality_reason_id;
                        elements = elements.add('<option value='+id_reason+' class="opt_drp">'+item.quality_reason_name+'</option>');
                    });
                    $('#'+id_demo).append(elements);               
                }
            }); 
            
        }else{
            
            $.ajax({
                url: '<?php echo base_url('PDM_controller/Reject_retrive'); ?>',
                data:{id:id},
                method:'post',
                dataType:'json',
                success:function(data){
                    var elements = $();
                    data.forEach(function(item){
                        var text = item.quality_reason_name;
                        var quality_reason_id  =  item.quality_reason_id;
                        if (parseInt(reason) == parseInt(quality_reason_id)) {
                            elements = elements.add('<option value='+quality_reason_id+' selected="true" class="opt_drp">'+item.quality_reason_name+'</option>');
                        }else{
                            elements = elements.add('<option value='+quality_reason_id+' class="opt_drp">'+item.quality_reason_name+'</option>');
                        }
                    });
                    $('#'+id_demo).append(elements);              
                }
            });  
        }
    }

    // first element for dropdown function
    function drp_first_element(id_demo,reason_str){
        reason_str = reason_str.split('_').join('');
        $('#'+id_demo).empty();
        var id ="ok";
        if (reason_str == "empty") {
        $.ajax({
            url: '<?php echo base_url('PDM_controller/Reject_retrive'); ?>',
            data:{id:id},
            method:'post',
            dataType:'json',
            success:function(data){
                var elements = $();
                data.forEach(function(item){
                    var text = item.quality_reason_name;
                    elements = elements.add('<option value='+item.quality_reason_id+' class="opt_drp">'+item.quality_reason_name+'</option>');
                });
                $('#'+id_demo).append(elements);
            }
        }); 

        }else{
            $.ajax({
                url: '<?php echo base_url('PDM_controller/Reject_retrive'); ?>',
                data:{id:id},
                method:'post',
                dataType:'json',
                success:function(data){
                    var elements = $();
                    data.forEach(function(item){
                        var text = item.quality_reason_name;
                        var reason_id = item.quality_reason_id;
                        if (parseInt(reason_str) == parseInt(reason_id)) {
                            elements = elements.add('<option value='+reason_id+' selected="true" class="opt_drp">'+item.quality_reason_name+'</option>');
                        }else{
                            elements = elements.add('<option value='+reason_id+' class="opt_drp">'+item.quality_reason_name+'</option>');
                        }
                    });
                    $('#'+id_demo).append(elements);
                }
            }); 
        }
    }
}); 

// This function will help to identify the Reject Reason Counts......
function get_display_reason(index_id,reason_id_check){
    if(reason_id_check.length == 1){
        data_check = reason_id_check[0].split("&");
        $.ajax({
            url: '<?php echo base_url('PDM_controller/Reject_retrive'); ?>',
            method:'post',
            async:false,
            dataType:"json",
            success:function(data){
                data.forEach(function(item){
                    var text = item.quality_reason_name;
                    var reason_id = item.quality_reason_id;
                    if (parseInt(data_check[1]) == parseInt(reason_id)) {
                        $('#'+index_id).html(item.quality_reason_name);
                    }
                });
            }
        });
    }else if(reason_id_check.length > 1){
        $('#'+index_id).html((reason_id_check.length)+" "+"Reasons");
    }
}
</script> 
