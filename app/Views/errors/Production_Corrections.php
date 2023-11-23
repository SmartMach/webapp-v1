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
          <div class="container-fluid paddingm " style="margin-top:0.6rem;">
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
                            <input type="date" class="form-control font_weight" name="" id="shiftDate" style="width: 10rem;">
                            
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
            <div class="tableContent" style="margin-top:2.9rem;">
                <div class="settings_machine_header sticky-top fixtabletitle">
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
            <!-- <div class="modal-header" style="border:none; "> -->
                
           <!--  </div> -->
            <form method="" class="addMachineForm" action="" >
                <div class="modal-body">
                    <p class="modal-title settings-machineAdd-model mt-2 p-1"  id="EditCorrectModal1" style="margin-bottom: 0;margin-left: 0.7rem;">EDIT CORRECTION DATA</p>
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
                        <!-- <div style="width: 50%;" class="flex-container divbox">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="Notes">
                                <label class="input-padding">Notes</label>
                            </div>
                        </div>  -->    
                    </div>
                    <div class="flex-container">
                        <div style="width:50%;" class="flex-container divbox">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="CorrectionCount" class="font_weight_modal">
                                <label class="input-padding">Correction Count</label>
                                <span class="correction_count_err validate"></span>
                            </div>
                        </div>
                        <div style="width: 50%;" class="flex-container divbox">
                            <div style="width: 100%;" class="carddiv divinput-box">
                                <input type="text" name="" id="Notes" class="font_weight_modal">
                                <label class="input-padding">Notes</label>
                                <span class="correction_reason_err validate"></span>
                            </div>
                        </div>     
                    </div>                    
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditCorrection btn fo bn" name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>
<script type="text/javascript">
     $(document).ready(function(){
       
       var control = <?php echo($this->data['access'][0]['production_data_management']); ?>;
       //alert(control);
       var control_display = " ";
       if (control < 2) {
            control_display = "none";
       }else{
        control_display = "inline";
       }
        $.ajax({
            url: "<?php echo base_url('Home/getCorrectionPart'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                //var elements = $('<option value="all" selected>All</option>');
                var elements = $();
                $('#correctionPart').append('<option value="all" selected="true" disabled>Select</option>');
                res.forEach(function(item){
                    elements = elements.add('<option value="'+item.part_id+'">'+item.part_name+'</option>');
                    $('#correctionPart').append(elements);
                });
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });

        $("#shiftDate").attr("readonly", true); 
        $("#shiftName").attr("readonly", true);
        $(document).on("change", "#correctionPart", function(){
            var part = $('#correctionPart').val();
            $('#shiftDate').empty();
            $("#shiftDate").removeAttr("readonly");
            /* temporary hiddeing for startegy reason of first select drop down after visible the rows
            $.ajax({
                url: "<?php echo base_url('Home/getCorrectShiftDate'); ?>",
                type: "POST",
                dataType: "json",
                data:{
                    part:part,
                },
                success:function(res){
                    var elements = $('<option value="all" selected>All</option>');
                    //$('#shiftDate').empty();
                        res.forEach(function(item){
                            elements = elements.add('<option value="'+item.Shift_Date+'">'+item.Shift_Date+'</option>');
                            $('#shiftDate').append(elements);
                    });
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
            */
        });

        $(document).on("change", "#shiftDate", function(){
            // var part = $('#correctionPart').val();
            // var sdate = $('#shiftDate').val();
            $('#shiftName').empty();
            // alert(part);
            $.ajax({
                url: "<?php echo base_url('Home/getCorrectShift'); ?>",
                type: "POST",
                dataType: "json",
                // data:{
                //     part:part,
                //     sdate:sdate,
                // },
                success:function(shift_res){
                    //alert(shift_res);
                    //var elements = $('<option value="all" selected>All</option>');
                    var elements = $();
                    $('#shiftName').append('<option value=" " selected="true" disabled>Select</option>');
                        shift_res['shift'].forEach(function(item){
                            elements = elements.add('<option value="'+item.Shifts+'">Shift '+item.Shifts+'</option>');
                            $('#shiftName').append(elements);
                        });
                    $("#shiftName").removeAttr("readonly");
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });


    // select shift to display table row
    $(document).on('change','#shiftName',function(){
        var partname = $('#correctionPart').val();
        var shift_date = $('#shiftDate').val();
        var shift = $('#shiftName').val();
        //alert(shift);
        $.ajax({
        url: "<?php echo base_url('Home/getCorrectionData'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            partname:partname,
            shift_date:shift_date,
            shift:shift,
        },
        success:function(res){
            //alert(res);
            if (res == "") { alert("No records*");}
            var elements = $();
            var count =0;
            $('.contentCorrection').empty();
                res.forEach(function(item){
                    count = parseInt(count)+parseInt(item.corrections);
                    if(item.correction_counts < 0){
                        elements = elements.add('<div id="settings_div">'
                                +'<div class="row paddingm">'
                                    +'<div class="col-sm-1 col marleft">'
                                        +'<p id="fdate" >'+item.start_time+'</p>'   
                                    +'</div>'
                                    +'<div class="col-sm-1 col marleft" >'
                                        +'<p id="tdate">'+item.end_time+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" >'
                                        +'<p id="pname">Part 1</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft" ">'
                                        +'<p id="mreject" >'+item.correction_min_counts+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-2 col marleft">'
                                        +'<p id="rcount" style="color: #e2062c;">'+item.corrections+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-3 col marleft">'
                                        +'<p>'+item.correction_notes+'</p>'
                                    +'</div>'
                                    +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                        +'<ul class="edit-menu">'
                                            +'<li class="d-flex justify-content-center">'
                                                +'<a href="#">'
                                                    +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects  pen-product" style="font-size: 20px;color: #d9d9d9;height:1.4rem;width:1.4rem;display:'+control_display+'" alt="Edit" rvalue="'+item.part_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                                                +'</a>'
                                            +'</li>'
                                        +'</ul>'               
                                    +'</div>'
                                +'</div>'
                            +'</div>');
                    }
                    else{
                        elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm">'
                            +'<div class="col-sm-1 col marleft">'
                                +'<p id="fdate">'+item.start_time+'</p>'   
                            +'</div>'
                            +'<div class="col-sm-1 col marleft" >'
                                +'<p id="tdate">'+item.end_time+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p id="pname">Part 1</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p id="mreject">'+item.correction_min_counts+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft">'
                                +'<p id="rcount" style="color: #004795;">'+item.corrections+'</p>'
                            +'</div>'
                            +'<div class="col-sm-3 col marleft">'
                                +'<p>'+item.correction_notes+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                +'<ul class="edit-menu">'
                                    +'<li class="d-flex justify-content-center">'
                                        +'<a href="#">'
                                            +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editCorrects  pen-product" style="font-size: 20px;color: #d9d9d9;height:1.2rem;width:1.2rem;display:'+control_display+'" alt="Edit" rvalue="'+item.part_id+'" pIdValue="'+item.part_id+'" fdate="'+item.start_time+'" >'
                                        +'</a>'
                                    +'</li>'
                                +'</ul>'               
                            +'</div>'
                        +'</div>'
                    +'</div>');
                    }
                    
                    $('.contentCorrection').append(elements);
            });
            $('#corrects').html(count);
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    });

    $(document).on("click", ".editCorrects", function(){
        //var id = $(this).attr("rvalue");  
        var partid = $(this).attr("pIdValue");
        var from_time = $(this).attr("fdate");
        var shift_date = $('#shiftDate').val();
        var shift = $('#shiftName').val();
        $.ajax({
            url: "<?php echo base_url('Home/getCorrectData'); ?>",
            type: "POST",
            dataType: "json",
            data:{
                partid:partid,
                from_time:from_time,
                shift_date:shift_date,
                shift:shift,
            },
            success:function(res){
               // alert(res);
               var datetime = getdate_time(res['correction'][0].last_updated_on);
                console.log(res);
                $('#QPID').html(res['correction'][0].part_id);

                $('#QMName').html(res['correction'][0].machine_id);
                $('#QShiftDate').html(res['correction'][0].shift_date);
                $('#QShift').html('Shift'+' '+res['correction'][0].shift_id);
                $('#QLUDate').html(res['last_updated_by'][0].first_name+ " " +res['last_updated_by'][0].last_name);
                $('#QLUOn').html(datetime);
                $('#QFromTime').html(res['correction'][0].start_time);
                $('#QToTime').html(res['correction'][0].end_time);
                $('#MinCounts').html(res['correction'][0].correction_min_counts);
                $('#TotalCorrection').html(res['correction'][0].corrections);
                $('#Notes').val(res['correction'][0].correction_notes);
                $('#CorrectionCount').val(res['correction'][0].corrections); 

                $('#EditCorrectModal').modal('show');
                //alert(res['rejection'][0].reject_counts);
                $('#CorrectionCount').on('change', function() {
                    var correction_value = $('#CorrectionCount').val();
                    // var first = 450;
                    // var last = 540;
                    // var part_produced_cycle =res['part'][0].part_produced_cycle;
                    // var shot_count = last-first;
                    // var rejection_value = res['rejection'][0].reject_counts;
                    // var total_part_produced = part_produced_cycle * shot_count;
                    // var min_count = parseInt(total_part_produced) - parseInt(rejection_value);
                    // var umin_count = parseInt(min_count) + parseInt(correction_value);
                    // //clarity
                    var db_correction = parseInt(res['correction'][0].corrections); 
                    var production_count = parseInt(res['correction'][0].production);
                    var start_time = res['correction'][0].start_time;
                    var shift = res['correction'][0].shift_id;
                    var shift_date = res['correction'][0].shift_date;


                   // var total_correction_value = correction_value;
                    //var max_count = parseInt(total_part_produced)+(parseInt(total_correction_value));
                    // if(umin_count < 0){
                    //     alert('Correction value exceeds!!');
                    // }
                    // else{
                        //alert(max_count);
                        // $('#MinCounts').html(umin_count);
                        // $('#TotalCorrection').html(total_correction_value);
                        $(document).on("click", ".EditCorrection", function(){
                            var note = $('#Notes').val();
                            // var rno = res['correction'][0].R_NO;
                            // var prno = res['rejection'][0].R_NO;
                            var correction_value = $('#CorrectionCount').val();
                            var correction_count = parseInt(db_correction) + parseInt(correction_value);
                            var max_reject = parseInt(production_count) + parseInt(correction_count);
                            if (parseInt(correction_count) < parseInt(production_count)) {
                                if (note) {
                                      $.ajax({
                                        url: "<?php echo base_url('Home/updateCorrectData'); ?>",
                                        type: "POST",
                                        dataType: "json",
                                        data:{
                                            note:note,
                                            total_correction_value:correction_count,
                                            max_count:max_reject,
                                            start_time:start_time,
                                            shift:shift,
                                            shift_date:shift_date,
                                        },
                                        success:function(res){
                                            //alert(res);
                                           // console.log(res);
                                           location.reload();
                                        },
                                        error:function(res){
                                            //alert(res);
                                            alert("Sorry!Try Agian!!");
                                        }
                                    }); 
                                  }else{
                                      $('.correction_reason_err').html('Emtpy Notes');
                                  }
                                 
                            }else{
                                $('.correction_count_err').html('Invalid Data');
                            }
                            

                        });
                        
                    // }
                    //var min_count = total_part_produced - rejection_value;
                });

            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });
    });


    });

// correction count validation
$(document).on('blur','#CorrectionCount',function(){
    var cval = $('#CorrectionCount').val();
    var msg = "";
    var pattern = Number(cval);
    //  alert(cval);
    if (Number.isInteger(pattern)) {
        msg = "";
         $('.EditCorrection').removeAttr("disabled");
    }else{
        msg = "Invalid Number";
        $('.EditCorrection').attr("disabled",true);
    }

    $('.correction_count_err').html(msg);
});

// correction reason validation
$(document).on('blur','#Notes',function(){
    var cval = $('#Notes').val();
    var msg = "";
    
    if (cval) {
        msg = "";
          $('.EditCorrection').removeAttr("disabled");
    }else{
        msg = "Invalid Number";
       $('.EditCorrection').attr("disabled",true);
    }

    $('.correction_reason_err').html(msg);
});
</script> 