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
 /* z-index: 1000;*/

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

#shiftDate:onclick{
    
}

</style>

<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Corrections</p>
              <div class="d-flex">
                    <p class="float-end stcode" style="color: #005CBC;">
                        <span  id="corrects"></span><span style="font-size: 1rem;">Correction Counts</span>
                    </p>
              </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
            <div class="container-fluid paddingm " style="margin-top:0.2rem;">
             <p class="float-start"></p>
              <div class="d-flex innerNav">
                    <div class="box">
                        <div class="input-box" style="margin-right: 0.5rem;">
                            <select class="form-select font_weight" name="" id="correctionPart" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding font_weight">Part Name</label>
                        </div>
                    </div>
                    <div class="box">
                        <div class="input-box" style="margin-right: 0.5rem;">
                            <input type="datepicker" class="form-control font_weight datepicker" name="" id="shiftDate" style="width: 10rem;" placeholder="dd-mm-yyyy" autocomplete="off">
                            
                            <label for="inputSiteNameAdd" class="input-padding ">Shift Date</label>
                        </div>
                    </div>
                    <div class="box">
                        <div class="input-box" style="margin-right: 0.5rem;">
                            <select class="form-select font_weight" name="" id="shiftName" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Shift</label>
                        </div>
                    </div> 
              </div>
          </div>
        </nav>
        <br>
            <div class="tableContent" style="margin-top:2.5rem;" >
                <div class="settings_machine_header sticky-top fixtabletitle_correction">
                    <div class="row paddingm">
                        <div class="col-sm-1 p3 paddingm">
                          <p class="basic_header">FROM TIME</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm">
                          <p class="basic_header">TO TIME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">PART NAME</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">MIN COUNTS <i class="fa fa-info-circle"></i></p>
                        </div>
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">CORRECTION COUNTS</p>
                        </div>
                        <div class="col-sm-3 p3 paddingm">
                          <p class="basic_header">NOTES</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm">
                          <p class="basic_header">ACTION</p>
                        </div>
                    </div>
                </div>
                <div class="contentCorrection paddingm ">
                   
                </div>
        </div>
</div>

<div class="modal fade" id="EditCorrectModal" tabindex="-1" aria-labelledby="EditCorrectModal1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered rounded">
    <div class="container modal-content bodercss">
            <form method="" class="addMachineForm" action="" >
                <div class="modal-body">
                    <h5 class="modal-title settings-machineAdd-model mt-2 p-1"  id="EditCorrectModal1" style="margin-bottom: 0;margin-left: 0.7rem;">EDIT CORRECTION DATA</h5>
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Part Name</label>
                                <p id="QPID" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Machine Name</label>
                                <p id="QMName" class="font_weight_modal"></p>
                            </div>
                        </div>
                        <div style="width: 50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Shift Date</label>
                                <p id="QShiftDate" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Shift</label>
                                <p id="QShift" class="font_weight_modal"></p>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container">
                        <!-- temporary hide for this code -->
                        <div style="width:50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Last Updated By</label>
                                <p id="QLUDate" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Last Updated On</label>
                                <p id="QLUOn" class="font_weight_modal"></p>
                            </div>
                        </div>
                        <div style="width: 50%;" class="flex-container">
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">From Time</label>
                                <p id="QFromTime" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">To Time</label>
                                <p id="QToTime" class="font_weight_modal"></p>
                            </div>
                        </div>     
                    </div>
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container ">
                            <div style="width: 50%;" class="carddiv ">
                                <label class="headTitle">Min Counts</label>
                                <p id="MinCounts" class="font_weight_modal"></p>
                            </div>
                            <div style="width: 50%;" class="carddiv">
                                <label class="headTitle">Total Correction Counts</label>
                                <p id="TotalCorrection" class="font_weight_modal"></p>
                            </div>
                        </div>   
                    </div>
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container divbox fieldStyle">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="CorrectionCount" class="font_weight_modal">
                                <label class="input-padding">Correction Count <span class="paddingm validate">*</span></label>
                                <span class="correction_count_err validate"></span>
                            </div>
                        </div>
                        <div style="width: 50%;" class="flex-container divbox fieldStyle">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="Notes" class="font_weight_modal">
                                <label class="input-padding">Notes <span class="paddingm validate">*</span></label>
                                <span class="correction_reason_err validate"></span>
                            </div>
                        </div>     
                    </div>                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditCorrection btn fo bn saveBtnStyle" name="" value="SAVE">Save</a>
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

 var control = <?php echo($this->data['access'][0]['production_data_management']); ?>;
       var control_display = " ";
       if (control < 2) {
            control_display = "none";
       }else{
        control_display = "inline";
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
              //  console.log(item);
                if (item.corrections != null) {
                    count = parseInt(count)+parseInt(item.corrections);
                }
                var correction_min_count = (item.correction_min_counts != null ? item.correction_min_counts:"");
                var correction_count = (item.corrections != null ? item.corrections:"");
                var notes = (item.correction_notes != null ? item.correction_notes:"");

                if(parseInt(item.corrections) < 0){
                    elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm">'
                        +'<div class="col-sm-1 col marleft">'
                        +'<p id="fdate" >'+item.start_time+'</p>'
                        +'</div>'
                        +'<div class="col-sm-1 col marleft" >'
                        +'<p id="tdate">'+item.end_time+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft" >'
                        +'<p id="pname">'+item.part_name+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft" ">'
                        +'<p id="mreject" style="">'+correction_min_count+'</p>'
                        +'</div>'
                        +'<div class="col-sm-2 col marleft">'
                        +'<p id="rcount" style="color: #e2062c; font-weight:bold;">'+correction_count+'</p>'
                        +'</div>'
                        +'<div class="col-sm-3 col marleft">'
                        +'<p>'+notes+'</p>'
                        +'</div>'
                        +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                        +'<ul class="edit-menu">'
                        +'<li class="d-flex justify-content-center">'
                        +'<a href="#">'
                        +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects  pen-product" style="font-size: 20px;color: #d9d9d9;height:1.4rem;width:1.4rem;display:'+control_display+'" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                        +'</a>'
                        +'</li>'
                        +'</ul>'
                        +'</div>'
                        +'</div>'
                        +'</div>');
                }
                else if (item.corrections>=0) {
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
                    +'<div class="col-sm-2 col marleft" >'
                    +'<p id="mreject" style="">'+correction_min_count+'</p>'
                    +'</div>'
                    +'<div class="col-sm-2 col marleft">'
                    +'<p id="rcount" style="color: #004795;font-weight:bold;">'+correction_count+'</p>'
                    +'</div>'
                    +'<div class="col-sm-3 col marleft">'
                    +'<p>'+notes+'</p>'
                    +'</div>'
                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                    +'<ul class="edit-menu">'
                    +'<li class="d-flex justify-content-center">'
                    +'<a href="#">'
                    +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects  pen-product" style="font-size: 20px;color: #d9d9d9;height:1.2rem;width:1.2rem;display:'+control_display+'" alt="Edit" rvalue="'+item.machine_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                    +'</a>'
                    +'</li>'
                    +'</ul>'               
                    +'</div>'
                    +'</div>'
                    +'</div>');
                }       
                $('.contentCorrection').append(elements);
            });
    
            (parseInt(count)>9 || (parseInt(count)<0 && parseInt(count)<(-9)))? ($('#corrects').html(count)):($('#corrects').html('0'+count));
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
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
                alert("Sorry!Try Agian!!");
            }
        });

        $("#shiftDate").attr("readonly", true); 
        $("#shiftName").attr("readonly", true);
        $("#shiftName").attr("disabled", true);
        $("#shiftDate").attr("disabled", true);
        
        // this function if you change part dropdown then retrive the shift date for the dropdown and enable the shifts

        $(document).on("change", "#correctionPart", function(){
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
                    alert("Sorry!Try Agian!!");
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
               // console.log(res);
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
                alert("Sorry!Try Agian!!");
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
                    alert("Sorry!Try Agian!!");
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
        }else{
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
