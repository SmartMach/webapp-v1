<div style="margin-left: 4.5rem;">
        <nav class="navbar navbar-expand-lg sticky-top settings_nav fixsubnav">
          <div class="container-fluid paddingm">
            <p class="float-start" id="logo">Quality Rejects</p>
              <div class="d-flex">
                    <p class="float-end stcode" style="color: #C00000;">
                        <span  id="rejects"></span><span style="font-size:1rem;">Rejects</span>
                    </p>
              </div>
          </div>
        </nav>
        <nav class="navbar navbar-expand-lg sub-nav sticky-top fixinnersubnav">
          <div class="container-fluid paddingm "  style="margin-top:0.7rem;">
            <p class="float-start"></p>
              <div class="d-flex innerNav">
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <select class="form-select font_weight" name="" id="RejectPartName" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Part Name</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <input type="date" class="form-control font_weight" name="" id="RejectShiftDate" style="width: 10rem;">
                          
                            <label for="inputSiteNameAdd" class="input-padding font_weight">Shift Date</label>
                        </div>
                    </div>
                    <div class="box rightmar" style="margin-right: 0.5rem;">
                        <div class="input-box">
                            <select class="form-select font_weight" name="" id="RejectShift" style="width: 10rem;">
                            </select>
                            <label for="inputSiteNameAdd" class="input-padding ">Shift</label>
                        </div>
                    </div> 
              </div>
          </div>
        </nav>
        <br>
            <div class="tableContent" style="margin-top:2.8rem;">
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
                        <div class="col-sm-2 p3 paddingm marleft" >
                          <p class="basic_header">MAX REJECTS <i class="fa fa-info-circle"></i></p>
                        </div>
                        <div class="col-sm-2 p3 paddingm marleft">
                          <p class="basic_header">REJECT COUNTS</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm">
                          <p class="basic_header">REASON</p>
                        </div>
                        <div class="col-sm-2 p3 paddingm">
                          <p class="basic_header">NOTES</p>
                        </div>
                        <div class="col-sm-1 p3 paddingm">
                          <p class="basic_header">ACTION</p>
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
            <!-- <div class="modal-header" style="border:none; ">
                <p class="modal-title settings-machineAdd-model" id="EditQualityModal1" style="">EDIT QUALITY REJECTS</p>
            </div> -->
            <form method="" class="addMachineForm" id="Reject_form_edit" action="" >
                <div class="modal-body paddingm">   
                <p class="modal-title settings-machineAdd-model mt-2 p-4" id="EditQualityModal1" style="">EDIT QUALITY REJECTS</p>        
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
                    <!-- <div class="flex-container">
                        <div style="width:100%;float:right;"><i class="fa fa-plus fa-2x appendform" id=""></i></div>
                        <!-- <div style="width:50%;float:right;"><i class="fa fa-trash fa-2x removeappendform" id=""></i></div> --
                    </div> -->
                    <!-- startegy work -->
                    <div class="flex-container" style="height:max-content;">
                        <div style="width:46%; height:max-content;" class="flex-container divbox">
                            <div style="width: 100%;height:max-content;" class="carddiv divinput-box">
                                <input type="text" name="reject_count[]" id="RejectCount" class="RejectCount font_weight_modal">
                                <label class="input-padding">Reject Count</label>

                                <span class="reject_count_err validate"></span>
                            </div>
                        </div>
                        <div style="width: 43%;" class="flex-container divbox_reject">
                            <div style="width: 100%;" class="carddiv divinput_box_reject">
                                    <div class="input-box fieldStyle" style="height:max-content;">
                                        <select class="inputDepartmentAdd form-select RejectReason font_weight_modal" name="reject_reason[]" id="RejectReason1" >
                                           
                                        </select>
                                        <label for="input" class="input-padding">Reject Reason</label>
                                    </div>
                            </div>
                        </div>    
                        <div style="width:10%;float:right;" class=" paddingm flex-container divbox">
                            <div style="width:100%;float:right;justify-content:center;text-align:center;margin:auto;"><img src="<?php echo base_url('assets/img/plus-icon.png'); ?>" style="width:2.8rem;height: 2.8rem;" class="appendform" id=""></div>
                        </div> 
                    </div>
                    <div class="append_reject"></div>
                    <!-- strategy work end -->
                </div>
                <div class="modal-footer" style="border:none;">
                    <a class="EditReject_submit btn fo bn" name="" value="SAVE" style="color: white;background: #005abc;">SAVE</a>
                    <a class="btn fo bn" data-bs-dismiss="modal" aria-label="Close" style="color: #989fac;background: #d9d9d9;">CANCEL</a>   
                </div>
            </form>
    </div>
  </div>
</div>

<script type="text/javascript">
     $(document).ready(function(){


        var control = <?php echo $this->data['access'][0]['production_data_management']; ?>;
        //alert(control);
        var display_var = " ";
        if (control < 2) {
            //alert("ok");
            display_var = "none";
        }else{
            //alert("not");
           display_var = "inline";
        }

        // reject reason
        $.ajax({
            url: "<?php echo base_url('Home/getRejectionPart'); ?>",
            type: "POST",
            dataType: "json",
            success:function(res){
                var elements = $();
                //var elements = $();

                $('#RejectPartName').append('<option value="" selected="true" disabled>Select</option>');
                    res.forEach(function(item){
                        elements = elements.add('<option value="'+item.part_id+'">'+item.part_name+'</option>');
                        $('#RejectPartName').append(elements);
                    });
            },
            error:function(res){
                alert("Sorry!Try Agian!!");
            }
        });
        
        $("#RejectShiftDate").attr("readonly", true); 
        $("#RejectShift").attr("readonly", true);
        /* strategy
        $(document).on('focus','.RejectReason',function(){
            //alert('ok');
                $.ajax({
                    url: '<?php echo base_url('Home/Reject_retrive'); ?>',
                    data:{id:id},
                    method:'post',
                    dataType:'json',
                    success:function(data){
                    //  alert(data[0].Downtime_Reason);
                    
                        //$('#reject_opt').html(data);
                        var elements = $();
                        data.forEach(function(item){
                            $('.RejectReason').empty();
                                    elements = elements.add('<option value='+item.Downtime_Reason+'>'+item.Downtime_Reason+'</option>');
                                    $('.RejectReason').append(elements);
                                // alert(item.Downtime_Reason);
                        });
                    }
                }); 
        });*/
        $(document).on("change", "#RejectPartName", function(){
            var part = $('#RejectPartName').val();
            //$('#RejectShiftDate').empty();
            $("#RejectShiftDate").removeAttr("readonly");

        });
        $(document).on("change", "#RejectShiftDate", function(){
            // var part = $('#RejectPartName').val();
            // var sdate = $('#RejectShiftDate').val();
            $('#RejectShift').empty();
            // alert(sdate);
            $.ajax({
                url: "<?php echo base_url('Home/getRejectShift'); ?>",
                type: "POST",
                dataType: "json",
                // data:{
                //     part:part,
                //     sdate:sdate,
                // },
                success:function(shift_res){
                    //alert(shift_res['shift']);
                    // var elements = $('<option value="all" selected>All</option>');
                    var elements = $();
                    $('#RejectShift').append('<option value="" selected="true" disabled>Select</option>');
                    shift_res['shift'].forEach(function(item){
                        elements = elements.add('<option value="'+item.Shifts+'">Shift '+item.Shifts+'</option>');
                        
                    });
                    $('#RejectShift').append(elements);
                    $("#RejectShift").removeAttr("readonly");
                },
                error:function(res){
                    alert("Sorry!Try Agian!!");
                }
            });
        });

    $(document).on('change','#RejectShift',function(){
        var shift = $('#RejectShift').val();
        var shiftdate = $('#RejectShiftDate').val();
        var partname = $('#RejectPartName').val();  
        // alert(shift);
        // alert(shiftdate);
        $.ajax({
        url: "<?php echo base_url('Home/getRejectionData'); ?>",
        type: "POST",
        dataType: "json",
        data:{
            shift:shift,
            shiftdate:shiftdate,
            partname:partname,
        },
        success:function(res){
           // alert(res);
            //console.log(res);
            //alert(display_var);

            if (res =="") {alert("No records*");}

            var elements = $();
            var count =0;
            $('.contentMachine').empty();
                res.forEach(function(item){
                    count = parseInt(count)+parseInt(item.rejections);
                    elements = elements.add('<div id="settings_div">'
                        +'<div class="row paddingm">'
                            +'<div class="col-sm-1 col marleft">'
                                +'<p id="fdate">'+item.start_time+'</p>'   
                            +'</div>'
                            +'<div class="col-sm-1 col marleft" >'
                                +'<p id="tdate">'+item.end_time+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p id="pname">'+item.part_id+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft" >'
                                +'<p id="mreject">'+item.rejection_max_counts+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft">'
                                +'<p id="rcount" style="color: #e2062c;">'+item.rejections+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col marleft">'
                                +'<p>'+item.reject_reason+'</p>'
                            +'</div>'
                            +'<div class="col-sm-2 col marleft">'
                                +'<p>'+item.rejections_notes+'</p>'
                            +'</div>'
                            +'<div class="col-sm-1 col d-flex justify-content-center fasdiv">'
                                +'<ul class="edit-menu">'
                                    +'<li class="d-flex justify-content-center " >'
                                        +'<a href="#">'
                                            +'<img src="<?php echo base_url('assets/img/pencil.png'); ?>" class="editRejects  pen-product" style="color: #d9d9d9;height:1.2rem;width:1.2rem;display:'+display_var+';" alt="Edit" rvalue="'+item.part_id+'" pIdValue="'+item.part_id+'" ftime="'+item.start_time+'" id="dsedit">'
                                        +'</a>'
                                    +'</li>'
                                +'</ul>'               
                            +'</div>'
                        +'</div>'
                    +'</div>');
                    $('.contentMachine').append(elements);
            });
            $('#rejects').html(count);
            
        },
        error:function(res){
            alert("Sorry!Try Agian!!");
        }
    });
    });
    $(document).on("click", ".editRejects", function(){
        var partid = $(this).attr("pIdValue");
        var from_time = $(this).attr("ftime");
        var shift_date = $('#RejectShiftDate').val();
        var shift = $('#RejectShift').val();
        // alert(partid);
        // alert(from_time);
        // alert(shift_date);
        // alert(shift);
        $.ajax({
            url: "<?php echo base_url('Home/getRejectData'); ?>",
            type: "POST",
            dataType: "json",
            data:{
                partid:partid,
                from_time:from_time,
                shift_date:shift_date,
                shift:shift,
            },
            success:function(res){
                //alert(res);
                var datetime = getdate_time(res['rejection'][0].last_updated_on);
                console.log(res);
                // alert(res['reject'][0].part_id);
                $('#PID').html(res['rejection'][0].part_id);
                $('#MName').html(res['rejection'][0].machine_id);
                $('#ShiftDate').html(res['rejection'][0].shift_date);
                $('#Shift').html('Shift'+' '+res['rejection'][0].shift_id);
                $('#LUDate').html(datetime);
                $('#LUOn').html(res['last_updated_by'][0].first_name+ " " +res['last_updated_by'][0].last_name);
                $('#FromTime').html(res['rejection'][0].start_time);
                $('#ToTime').html(res['rejection'][0].end_time);
                $('#MaxReject').html(res['rejection'][0].rejection_max_counts);
                $('#Notes').val(res['rejection'][0].rejections_notes);
                $('#RejectReason').val(res['rejection'][0].reject_reason);
                $('#RejectCount').val(res['rejection'][0].rejections);
                $('#TotalRejets').html(res['rejection'][0].rejections);
                
                $('#EditQualityModal').modal('show');
                // var rno = res['reject'][0].R_NO;
                // var qrno = res['correction'][0].R_NO;
                // var part_produced_cycle =res['part'][0].Part_Produced_Cycle;
                // var correction_value = res['correction'][0].Total_Correction;
                // sessionStorage.setItem("part_produced_cycle",part_produced_cycle);
                // sessionStorage.setItem("correction_value",correction_value);
                // sessionStorage.setItem("rno", rno);
                // sessionStorage.setItem('qrno',qrno);

                // temporary hide for strategy
                /*
                $('#RejectCount').on('change', function() {
                    var rejection_value = $('#RejectCount').val();
                    var first = 450;
                    var last = 540;
                    var part_produced_cycle =res['part'][0].Part_Produced_Cycle;
                    var shot_count = last-first;
                    var correction_value = res['correction'][0].Total_Correction;
                    var total_part_produced = part_produced_cycle * shot_count;
                    var max_reject = parseInt(total_part_produced) + (parseInt(correction_value));
                  
                    var total_rejection_value = rejection_value;
                     var min_count = parseInt(total_part_produced)-(parseInt(total_rejection_value));
                   
                        $(document).on('click', ".EditReject", function(){

                            var note = $('#Notes').val();
                            // var reason = [];
                            var rno = res['reject'][0].R_NO;
                            var qrno = res['correction'][0].R_NO;
                          //  var reason = $('#RejectReason')[1].val();
                            alert(reason);
                            $.ajax({
                                url: "<?php echo base_url('Home/updateRejectData'); ?>",
                                type: "POST",
                                dataType: "json",
                                data:{
                                    rno:rno,
                                    note:note,
                                    // reason:reason,
                                    totalreject:total_rejection_value,
                                    qrno:qrno,
                                    min_count:min_count,
                                },
                                success:function(res){
                                   // location.reload();
                                   alert(res);  
                                },
                                error:function(res){
                                    //alert(res);
                                    alert("Sorry!Try Agian!!");
                                }
                            });

                        });
                        
                    // }
                    //var min_count = total_part_produced - rejection_value;
                });

                */

            },
            error:function(err){
                alert("Sorry!Try Agian!!");
            }
        });

    //     $.ajax({
    //     url: '<?php echo base_url('Home/Reject_retrive'); ?>',
    //     data:{id:id},
    //     method:'post',
    //     dataType:'json',
    //     success:function(data){
    //     //  alert(data[0].Downtime_Reason);
         
    //         //$('#reject_opt').html(data);
    //         var elements = $();
    //         data.forEach(function(item){
    //             $('.RejectReason').empty();
    //                     elements = elements.add('<option value='+item.Downtime_Reason+'>'+item.Downtime_Reason+'</option>');
    //                     $('.RejectReason').append(elements);
    //                    // alert(item.Downtime_Reason);
    //         });
    //     }
    // });
    });

       
 
     }); 

    //  strategy code reject form append function
    var flag = 0;
    var count = 1;
$(document).on('click','.appendform',function(){
    flag = 0;
    var id = " ";
    count = document.getElementsByClassName("RejectReason").length;
    if (count > 0) {
        id = "drp"+count;
        
    }else{
        //$(".RejectReason").attr("id","drp_"+count);
        id = "drp"+count;
    }
    count++;
    $('.append_reject').append('<div class="flex-container remobj" style="height:max-content;"> <div style="width:46%;" class="flex-container divbox" >'
                            +'<div style="width: 100%;height:max-content;" class="carddiv divinput-box">'
                            +'<input type="text" name="reject_count[]" class="RejectCount font_weight" id="RejectCount">'
                            +'<label class="input-padding">Reject Count</label>'
                            +'  <span class="reject_count_err validate"></span>'
                            +'</div>'
                            +'</div>'
                            +'<div style="width: 47%;" class="flex-container divbox_reject">'
                            +' <div style="width: 100%;" class="carddiv divinput_box_reject">'
                            +'<div class="input-box fieldStyle" style="height:max-content;">'
                            +'<select class="inputDepartmentAdd form-select RejectReason font_weight" name="reject_reason[]" id='+id+'>'
                            +'</select>'
                            +' <label for="input" class="input-padding">Reject Reason</label>'
                            +'</div></div>'+
                            '<div class="" style="width:10%;justify-content:center;align-item:center;margin:auto;height:max-content;"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class=" removeappendform" style="width:1.4rem;height:1.2rem;"> </i></div>'+'</div>');
           
});

$(document).on("click", ".removeappendform", function(){
            // $('.append_reject').children().last().remove()
    $(this).closest('.remobj').remove();
});
       
$(document).on('click','.RejectReason',function(){
    var id ="ok";
   
    //alert('ok');
    var ind1 = $('.RejectReason');
    var ind2 = ind1.index($(this));
   // alert(ind2);
  
   var xid = $(this).attr('id');
   var len = document.getElementById(xid).options.length;
   //var len1 = document.getElementById('RejectReason1').options.length;
   //alert(len);
 var ind = $('.opt_drp').length;
 
  //alert(xid);
    $.ajax({
        url: '<?php echo base_url('Home/Reject_retrive'); ?>',
        data:{id:id},
        method:'post',
        dataType:'json',
        success:function(data){
            //alert(data);    
            var elements = $();
            // $('.opt_drp').empty();
            if ((len ==0) || (len <= 2)) {
                data.forEach(function(item){
                    var text = item.quality_reason_name;
                    const downtime_reasons = text.split(/\s/).join('');

                    elements = elements.add('<option value='+downtime_reasons+' class="opt_drp">'+item.quality_reason_name+'</option>');
                    $('#'+xid).append(elements);
                });
            }else{
            var x = 0;
            }
        }
    });  

 //flag = 1;
});

$(document).on('blur','.RejectCount',function(){

   // var count = document.getElementsByClassName('RejectCount');
     var count = $('.RejectCount');
    var index1 = count.index($(this));
    //alert(index1);
    var reject_val = $('.RejectCount')[index1].value;
    var pattern = Number(reject_val);
    var msg = " ";
    //alert(reject_val);
    if ((Number.isInteger(pattern)) && (pattern > 0)) {
            msg = " ";
             $('.EditReject_submit').removeAttr("disabled");

    }else{
        msg = "Invalid Number";
         $('.EditReject_submit').attr("disabled",true);
    }

    document.getElementsByClassName('reject_count_err')[index1].textContent = msg;
})

$(document).on('click','.EditReject_submit',function(){
    // var test = "test";
    var reason = $.map( $(".RejectReason"), function(elem){
         return $(elem).val();
    });
    var rcount = $.map($('.RejectCount'),function(count){
        return $(count).val();
    });
     var array_sum_rcount = rcount.reduce(function(a, b){
        return parseInt(a) + parseInt(b);
    }, 0);
     var validate_count_max = $('#MaxReject').text();
   
    // var rejection_value = $('#RejectCount').val();
    var start_time = $('#FromTime').text();
    var shift = $('#RejectShift').val();
   
    var shift_date = $('#RejectShiftDate').val();
    var partid = $('#PID').text();
    var note = $('#Notes').val();


    // alert(validate_count_max);
    // alert(array_sum_rcount);
    // alert(shift);
    // alert(shift_date);
    // alert(partid);
    // alert(note);

    if (parseInt(array_sum_rcount) < parseInt(validate_count_max) ) {
            $.ajax({
                url: "<?php echo base_url('Home/reject_form_func'); ?>",
                method:"POST",
                dataType:'json',
                data:{
                    note:note,
                    reason:reason,
                    rcount:rcount,
                    shift:shift,
                    shift_date:shift_date,
                    partid:partid,
                    start_time:start_time,
                },
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    location.reload();
                   
                }
            
            });  
    }else{
        //alert('lesser to max reject');
        $('.reject_count_err').html("Lesser to Maximum Rejects");
    }
   
});

$(document).on('click','.editRejects',function(){

    var id = $(this).attr("rvalue");
    var partid = $(this).attr("pIdValue");
    var from_time = $(this).attr("ftime");
    var shift_date = $('#RejectShiftDate').val();
    var shift = $('#RejectShift').val();
    // alert(partid);
    // alert(from_time);
    // alert(shift_date);
    // alert(shift);
    var datademo ="";
    $.ajax({
        url : '<?php echo base_url('Home/retrive_reasons'); ?>',
        method:'post',
        // dataType:'json',
        data:{
            partid:partid,
            from_time:from_time,
            shift_date:shift_date,
            shift:shift,
        },

       success:function(data){
       //alert(data);
       console.log(data);
           var splitstring = data.split("&&");
           var rrstr = [];
           var rrint = [];
            //alert(splitstring);
        splitstring.forEach(element => {
            var demo = parseInt(element);
            //alert(demo);
            var str = demo.toString().length;
            //alert(str);
            element = element.trim();
            var orgstr = element.substring(str);
           // alert(orgstr);
           rrstr.push(orgstr);
           rrint.push(demo);
        });
       // $('.RejectReason').empty();
        $('.append_reject').empty();
        for(var i=0;i<rrstr.length;i++){
            if(i == 0){
                document.getElementsByClassName("RejectCount")[0].value = rrint[i];
                document.getElementsByClassName("RejectReason")[0].value = rrstr[i];
            }
            else{

                var id = "drp"+i;
                $('.append_reject').append('<div class="flex-container remobj" style="height:max-content;"> <div style="width:46%;height:max-content;" class="flex-container divbox" >'
                            +'<div style="width: 100%;height:max-content;" class="carddiv divinput-box">'
                            +'<input type="text" name="reject_count[]" class="RejectCount font_weight" value='+rrint[i]+' id="RejectCount">'
                            +'<label class="input-padding">Reject Count</label>'
                            +'  <span class="reject_count_err validate"></span>'
                            +'</div>'
                            +'</div>'
                            +'<div style="width: 47%;" class="flex-container divbox_reject">'
                            +' <div style="width: 100%;" class="carddiv divinput_box_reject">'
                            +'<div class="input-box fieldStyle" style="height:max-content;">'
                            +'<select class="inputDepartmentAdd form-select RejectReason font_weight" name="reject_reason[]"  id='+id+'>'
                            +'<option value='+rrstr[i]+' selected="true" disabled>'+rrstr[i]+'<option>'
                            +'</select>'
                            +' <label for="input" class="input-padding">Reject Reason</label>'
                            +'</div></div>'+
                            '<div class="" style="width:10%;justify-content:center;align-item:center;margin:auto;height:max-content;"><img src="<?php echo base_url('assets/img/delete.png'); ?>" class=" removeappendform" style="width:1.4rem;height:1.2rem;"> </i></div>'+'</div>'); 
                            
                            
            }
        }
        //location.reload();
       },
       error:function(err){
           alert(err);
       }
   });
});

</script> 
