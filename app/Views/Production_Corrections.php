
<div class="mr_left_content_sec">

        <nav class="sec_nav display_f align_c justify_c sec_nav_c navbar-expand-lg">
          <div class="container-fluid paddingm display_f justify_sb align_c">
            <p class="float-start fnt_fam mdl_header">Corrections</p>
              <div class="d-flex">
                    <p class="float-end fnt_fam style_label fnt_inactive">
                        <span  id="corrects"></span>Correction Counts 
                    </p>
              </div>
          </div>
        </nav>
        <nav class="inner_nav inner_nav_c display_f align_c justify_sb navbar-expand-lg">
            <div class="container-fluid paddingm display_f justify_sb align_c">
             <p class="float-start"></p>
              <div class="d-flex innerNav">
                    <div class="box">
                        <div class="input-box" style="margin-right: var(--margin_right)">
                            <select class="form-select font_weight select_input_width input_padd" name="" id="correctionPart" style="width: 10rem;padding-right:1.8rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input_lable fnt_fam">Parts</label>
                        </div>
                    </div>
                    <div class="box">
                        <div class="input-box" style="margin-right: var(--margin_right)">
                            <input type="datepicker" class="form-control select_input_width input_padd font_weight datepicker" name="" id="shiftDate" style="width: 10rem;" placeholder="dd-mm-yyyy" autocomplete="off">
                            
                            <label for="inputSiteNameAdd" class="input_lable fnt_fam ">Shift Date</label>
                        </div>
                    </div>
                    <div class="box">
                        <div class="input-box" style="margin-right: var(--margin_right)">
                            <select class="form-select font_weight select_input_width input_padd" name="" id="shiftName" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input_lable fnt_fam">Shifts</label>
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
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">MIN COUNTS <i class="fa fa-info-circle"></i></p>
                        </div>
                        <div class="col-sm-2 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">CORRECTION COUNTS</p>
                        </div>
                        <div class="col-sm-3 p3 paddingm table_header_sec display_f justify_l align_c text_align_c">
                          <p class="h_mar_l paddingm">NOTES</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm table_header_sec display_f justify_c align_c text_align_c">
                          <p class="paddingm">ACTION</p>
                        </div>
                    </div>
                </div>
                <div class="contentCorrection paddingm tableDataContainer">
                   
                </div>
        </div>
</div>

<div class="modal fade" id="EditCorrectModal" tabindex="-1" aria-labelledby="EditCorrectModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <div class="modal-header border_no">
                <p class="modal-title header_popup fnt_fam" id="EditCorrectModal1" style="">EDIT CORRECTION DATA</p>
            </div>
            <form method="" class="addMachineForm" action="" >
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Part Name</label>
                            <p><span id="QPID" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Machine Name</label>
                            <p><span id="QMName" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Shift Date</label>
                            <p><span id="QShiftDate" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Shift</label>
                            <p><span id="QShift" class="font_weight_modal"></span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Last Updated By</label>
                            <p><span id="QLUDate" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Last Updated On</label>
                            <p><span id="QLUOn" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">From Time</label>
                            <p><span id="QFromTime" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">To Time</label>
                            <p><span id="QToTime" class="font_weight_modal"></span></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Min Counts</label>
                            <p><span id="MinCounts" class="font_weight_modal"></span></p>
                        </div>
                        <div class="col-lg-3">
                            <label for="" class="col-form-label headTitle fnt_fam">Total Correction Counts</label>
                            <p><span id="TotalCorrection" class="font_weight_modal"></span></p>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="CorrectionCount" name="" required=""  value="">
                                <label class="input_lable fnt_fam">Correction Count <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam correction_count_err" id=""></span>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 box">
                            <div class="input-box fieldStyle">
                                <input type="text" class="form-control input font_weight_modal" id="Notes" name="" required=""  value="">
                                <label class="input_lable fnt_fam">Notes <span class="paddingm validate fnt_fam">*</span></label>
                                <span class="paddingm float-start validate fnt_fam correction_reason_err" id=""></span>
                            </div>
                        </div> 
                    </div>                   
                </div>
                <div class="modal-footer border_no">
                    <a class="EditCorrection btn fnt_fam btn_fnt_size btn_padd btn_save" name="" id="edit_machine_data" value="SAVE">Save</a>
                    <a class="btn fnt_fam btn_fnt_size btn_padd btn_cancel" data-bs-dismiss="modal" aria-label="Close">Cancel</a>   
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

 var control = <?php echo($this->data['access'][0]['production_data_management']); ?>;
       var control_display = " ";
       if (control < 2) {
            control_display = "display:none";
       }
// get correction data function
function  gedt_correction_data(){
    var partname = $('#correctionPart').val();
    var shift_date = $('#shiftDate').val();
    const date_arr = shift_date.split('/');
    var shift_date_edit = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
    var shift = $('#shiftName').val();
    var s = shift.split("");
    $.ajax({
        url: "<?php echo base_url('PDM_controller/getCorrectionData'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            partname:partname,
            shift_date:shift_date_edit,
            shift:s[0],
        },
        success:function(res){
            var elements = $();
            var count =0;
            var startTime = "";
            var i=0;
            $('.contentCorrection').empty();
            res.forEach(function(item){
                if (item.corrections != null) {
                    count = parseInt(count)+parseInt(item.corrections);
                }
                var correction_min_count = (item.correction_min_counts != null ? item.correction_min_counts:"");
                var correction_count = (item.corrections != null ? item.corrections:"");
                var notes = (item.correction_notes != null ? item.correction_notes:"");

                if(parseInt(item.corrections) < 0){
                    elements = elements.add('<div class="table_data">'
                        +'<div class="row paddingm">'
                        +'<div class="col-sm-1 col marleft table_data_section display_f align_c">'
                        +'<p id="fdate" class="table_data_element fnt_fam">'+item.start_time+'</p>'
                        +'</div>'
                        +'<div class="col-sm-1 col marleft table_data_section display_f align_c" >'
                        +'<p id="tdate" class="table_data_element fnt_fam">'+item.end_time+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft table_data_section display_f align_c" >'
                        +'<p id="pname" class="table_data_element fnt_fam">'+item.part_name+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft table_data_section display_f align_c">'
                        +'<p id="mreject" class="table_data_element fnt_fam">'+correction_min_count+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft table_data_section display_f align_c">'
                        +'<p id="rcount" class="table_data_element fnt_fam fnt_bold" style="color: #e2062c;">'+correction_count+'</p>'
                        +'</div>'
                        +'<div class="col-sm-3 col marleft table_data_section display_f align_c">'
                        +'<p class="table_data_element fnt_fam">'+notes+'</p>'
                        +'</div>'
                        +'<div class="col-sm-1 col d-flex justify_c">'
                            +'<ul class="edit-menu d-flex justify_c align_c paddingm">'
                                +'<li class="d-flex justify_c">'
                                    +'<a href="#">'
                                        +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects icons-smart display_f justify_c align_c" style="'+control_display+'" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                                    +'</a>'
                                +'</li>'
                            +'</ul>'               
                        +'</div>'
                        +'</div>'
                        +'</div>');
                }
                else if (item.corrections>=0) {
                    elements = elements.add('<div class="table_data">'
                    +'<div class="row paddingm">'
                    +'<div class="col-sm-1 col marleft table_data_section display_f align_c">'
                    +'<p id="fdate" class="table_data_element fnt_fam">'+item.start_time+'</p>'   
                    +'</div>'
                    +'<div class="col-sm-1 col marleft table_data_section display_f align_c" >'
                    +'<p id="tdate" class="table_data_element fnt_fam">'+item.end_time+'</p>'
                    +'</div>'
                    +'<div class="col-sm-2 col marleft table_data_section display_f align_c" >'
                    +'<p id="pname" class="table_data_element fnt_fam">'+item.part_name+'</p>'
                    +'</div>'
                    +'<div class="col-sm-2 col marleft table_data_section display_f align_c" >'
                    +'<p id="mreject" class="table_data_element fnt_fam">'+correction_min_count+'</p>'
                    +'</div>'
                    +'<div class="col-sm-2 col marleft table_data_section display_f align_c">'
                    +'<p id="rcount" class="table_data_element fnt_fam fnt_bold" style="color: #004795;">'+correction_count+'</p>'
                    +'</div>'
                    +'<div class="col-sm-3 col marleft table_data_section display_f align_c">'
                    +'<p class="table_data_element fnt_fam">'+notes+'</p>'
                    +'</div>'
                    +'<div class="col-sm-1 col d-flex justify_c">'
                        +'<ul class="edit-menu d-flex justify_c align_c paddingm">'
                            +'<li class="d-flex justify_c">'
                                +'<a href="#">'
                                    +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects icons-smart display_f justify_c align_c" style="'+control_display+'" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                                +'</a>'
                            +'</li>'
                        +'</ul>'               
                    +'</div>'
                    +'</div>'
                    +'</div>');
                }       
                $('.contentCorrection').append(elements);
            });
            
            const absNumber = Math.abs(count);
            const convertedNumber = absNumber.toString().padStart(2, '0');
            count < 0 ? $('#corrects').html('-' + convertedNumber) : $('#corrects').html(convertedNumber);
        },
        error:function(res){
            // alert("Sorry!Try Agian!!");
        }
    });
}

//script for Shift Date calender
function datePick(date_shift){

  var enableDays=[];
  date_shift.forEach(function(item){
    enableDays.push(item.shift_date);
  });
}
     $(document).ready(function(){
        
    //    this is access control for the user privilage
       var control = <?php echo($this->data['access'][0]['production_data_management']); ?>;
       var control_display = " ";
       if (control < 2) {
            control_display = "none";
       }else{
        control_display = "inline";
       }
    //    this ajax function retrive all tool changeover parts
        $.ajax({
            url: "<?php echo base_url('PDM_controller/getCorrectionPart'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                var elements = $();
                $('#correctionPart').append('<option value="all" selected="true" disabled>Select</option>');
                res.forEach(function(item){
                    elements = elements.add('<option value="'+item.part_id+'">'+item.part_name+'-'+item.part_id+'</option>');
                    $('#correctionPart').append(elements);
                });
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });

        $("#shiftDate").attr("readonly", true); 
        $("#shiftName").attr("readonly", true);
        $("#shiftName").attr("disabled", true);
        $("#shiftDate").attr("disabled", true);
        
        // this function if you change part dropdown then retrive the shift date for the dropdown and enable the shifts

        $(document).on("change", "#correctionPart", function(){

            $('#corrects').html("");

            $('#shiftDate').prop('selectedIndex',0);
            var part = $('#correctionPart').val();
            $('.contentCorrection').empty();
            $('#shiftDate').val('');
            $.ajax({
                url:"<?php echo base_url('PDM_controller/correction_shift_date'); ?>",
                type:"POST",
                dataType:"json",
                data:{
                    part_id:part,
                },
                success:function(data){
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
                }

                
            }); 
            $('.fixtabletitle').css("z-index","1");
            $("#shiftDate").removeAttr("disabled");
            $("#shiftDate").removeAttr("readonly");
            $('.contentMachine').empty();
            $('#shiftName').prop('selectedIndex',0);
            $('#shiftName').attr('disabled',true);
        });
        // onclick time shift date design for border adding  [the error for shift border align for table design]
        $(document).on('click','#shiftDate',function(){
            $( "#ui-datepicker-div" ).css( "border","1px solid #dddddd" );
        });

        // after select shift date retrive that particular date  shifts retrive funciton
        $(document).on("change", "#shiftDate", function(){

            $('#corrects').html("");
            
            var sdate = $('#shiftDate').val();
            var part_name = $('#correctionPart').val();
            const date_arr = sdate.split('/');
            var shift_date = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
            $('#shiftName').empty();
            $('#shiftName').prop('selectedIndex',0);
            $('.contentCorrection').empty();
           
            $.ajax({
                url: "<?php echo base_url('PDM_controller/getCorrectShift'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    sdate:shift_date,
                },
                success:function(shift_res){
                    var elements = $();
                    $('#shiftName').append('<option value=" " selected="true" disabled>Select</option>');
                   
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
                            //elements = elements.add('<option value="'+item.shifts+'">Shift '+temp[0]+'</option>');
                            $('#shiftName').append(elements);
                    });
                    $("#shiftName").removeAttr("readonly");
                    $("#shiftName").removeAttr("disabled");
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                }
            });
        });


    // select shift to display table row 
    $(document).on('change','#shiftName',function(){
            gedt_correction_data();
    });

    $(document).on("click", ".editCorrects", function(){
        var partid = $(this).attr("pIdValue");
        var from_time = $(this).attr("fdate");
        var shift_date = $('#shiftDate').val();
        const date_arr = shift_date.split('/');
        var shift_date_edit = date_arr[2]+'-'+date_arr[0]+'-'+date_arr[1];
        var shift = $('#shiftName').val();
        var machine_id = $(this).attr('rvalue');
        var s = shift.split("");

        // frist remove the before values
        $('#QPID').html('');
        $('#QMName').html('');
        $('#QShiftDate').html('');
        $('#QShift').html('');
        $('#QLUDate').html('');
        $('#QLUOn').html('');
        $('#QFromTime').html('');
        $('#QToTime').html('');
        $('#MinCounts').html('');
        $('#TotalCorrection').html('');
        $('#Notes').val('');
        $('#CorrectionCount').val('');

        $.ajax({
            url: "<?php echo base_url('PDM_controller/getCorrectData_con'); ?>",
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
                var datetime = getdate_time(res['correction'][0].last_updated_on);
                $('#QPID').html(res['part_name']);
                $('#QPID').attr("part_data",res['correction'][0].part_id);
                $('#QMName').html(res['machine_name']);
                $('#QMName').attr("machine_data",res['correction'][0].machine_id);
                $('#QShiftDate').html(res['correction'][0].shift_date);
                $('#QShift').html('Shift'+' '+res['correction'][0].shift_id);

                if(res['last_updated_by'] !=null){
                    $('#QLUDate').html(res['last_updated_by'][0].first_name+ " " +res['last_updated_by'][0].last_name);
                }else{
                    $('#QLUDate').html('');
                }
                var correction_min_count_edit = 0;
                if (parseInt(res['correction'][0].correction_min_counts)>0) {
                    correction_min_count_edit = -res['correction'][0].correction_min_counts
                }
                else{
                    correction_min_count_edit = res['correction'][0].correction_min_counts;
                }
                
                $('#QLUOn').html(datetime);
                $('#QFromTime').html(res['correction'][0].start_time);
                $('#QToTime').html(res['correction'][0].end_time);
                $('#MinCounts').html(correction_min_count_edit);
                $('#TotalCorrection').html(res['correction'][0].corrections);
                if (res['correction'][0].correction_notes != " ") {
                    $('#Notes').val(res['correction'][0].correction_notes);
                }else{
                    $('#Notes').val('');
                }
                
                $('#CorrectionCount').val(res['correction'][0].corrections); 
                $('.correction_reason_err').html('');
                $('.correction_count_err').html('');
                $('#EditCorrectModal').modal('show');
                var production_count = parseInt(res['correction'][0].production);
                $('.EditCorrection').attr('production_count',production_count);
            },
            error:function(res){
                // alert("Sorry!Try Agian!!");
            }
        });
    });


    });

    // AFTER edit submit the corrections function
    $(document).on("click", ".EditCorrection", function(event){
        event.preventDefault();
        var x = correctionCount();
        var y = correctionNotes();
        if (x!='' || y!='') {
            $('.correction_count_err').html(x);
            $('.correction_reason_err').html(y);
        }else{
            $('.correction_count_err').html(x);
            $('.correction_reason_err').html(y);


            $("#overlay").fadeIn(300);
            var note = $('#Notes').val();
            var start_time = $('#QFromTime').text();
            var shift_date = $('#QShiftDate').text();
            var machine_id = $('#QMName').attr("machine_data");
            var shift = $('#QShift').text();
            var shift_arr = shift.split(' ');
            var min_count = $('#MinCounts').text();
            var production_count = $('.EditCorrection').attr('production_count');
            var correction_value = $('#CorrectionCount').val();
            var correction_count = parseInt(correction_value);
            var max_reject = parseInt(production_count) + parseInt(correction_count);
            var partid=$('#correctionPart').val();
            $('.EditCorrection').removeAttr("disabled");
            $.ajax({
                url: "<?php echo base_url('PDM_controller/updateCorrectData'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    note:note,
                    total_correction_value:correction_count,
                    max_count:max_reject,
                    start_time:start_time,
                    shift:shift_arr[1],
                    shift_date:shift_date,
                    machine_id:machine_id,
                    partid:partid
                },
                success:function(res){
                    gedt_correction_data();
                    $('#EditCorrectModal').modal('hide');
                    $("#overlay").fadeOut(300);                      
                },
                error:function(res){
                    // alert("Sorry!Try Agian!!");
                    $("#overlay").fadeOut(300);
                }
            });
        }
    });

// correction count validation
$(document).on('change','#CorrectionCount',function(){
    x= correctionCount();
    $('.correction_count_err').html(x);
});
function correctionCount(){
    var cval = $('#CorrectionCount').val();
    cval = cval.trim();
    var mincount = $('#MinCounts').text();

    mincount = mincount.trim();

    var msg = "";
    var pattern = Number(cval);
    if (cval == "") {
        
        msg = "*Required field";
    }else{
        
        msg = "";

        var first_element = pattern.toString().charAt(0);

        if (parseInt(cval) >= 0) {
            msg = "";
            cval = Math.trunc(cval);
            $('#CorrectionCount').val(cval);
            $("#TotalCorrection").html(cval);
            $('.EditCorrection').removeAttr("disabled");
        }
        else if(parseInt(cval)>= parseInt(mincount)){
            msg = "";
            cval = Math.trunc(cval);
            $('#CorrectionCount').val(cval);
            $("#TotalCorrection").html(cval);
            $('.EditCorrection').removeAttr("disabled");
        }
        else if (parseInt(cval) < parseInt(mincount)) {
            msg = "*Value should be greater than Min Counts";
            $('.EditCorrection').attr("disabled",true);
        }
        else{
            msg = "*Numerical values only allowed";
            $('.EditCorrection').attr("disabled",true);
        }
    }
    return msg;
};

// correction reason validation
$(document).on('blur','#Notes',function(){
    x=correctionNotes();
    $('.correction_reason_err').html(x);
});
function correctionNotes(){
    var cval = $('#Notes').val();
    cval = cval.trim();
    var msg = "";
    
    if (cval) {
        msg = "";
        $('.EditCorrection').removeAttr("disabled");
    }else{
        msg = "*Required field";
       $('.EditCorrection').attr("disabled",true);
    }
    return msg;
};
</script> 
