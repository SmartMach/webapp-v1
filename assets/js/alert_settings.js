// filter dropdown part dropdown
var filter_alert_part_drp = false;
function alert_filter_part(){
    if (!filter_alert_part_drp) {
        $('.alert_file_part_div').css('display','block');
        filter_alert_part_drp = true;
    }else{

        $('.alert_file_part_div').css('display','none');
        filter_alert_part_drp = false;
    }
    // alert('hi');    
}

// filter dropdown machine dropdown
var filter_alert_machine_drp = false;
function alert_filter_machine(){
    if (!filter_alert_machine_drp) {
        $('.alert_filter_machine_div').css('display','block');
        filter_alert_machine_drp = true;
    }else{
        $('.alert_filter_machine_div').css('display','none');
        filter_alert_machine_drp = false;
    }
}

// // filter dropdown metrics
var filter_alert_metrics_drp = false;
function alert_filter_work(){

    if (!filter_alert_metrics_drp) {
        $('.alert_filter_work_order_dive').css('display','block');
        filter_alert_metrics_drp = true;
    }else{
        $('.alert_filter_work_order_dive').css('display','none');
        filter_alert_metrics_drp = false;
    }
}

// FILTER dropdown last updated by
var filter_alert_last_updated_by = false;
function alert_filter_assignee(){
    if (!filter_alert_last_updated_by) {
        $('.filter_alert_assignee_div').css('display','block');
        filter_alert_last_updated_by = true;
    }else{
        $('.filter_alert_assignee_div').css('display','none');
        filter_alert_last_updated_by = false;
    }
}


// edit multi select machine dropdown
var edit_machine_drp = false;
function edit_alert_machine(){
    if (!edit_machine_drp) {
        $('.edit_alert_machine_drp').css('display','block');
        edit_machine_drp = true;
    }else{
        $('.edit_alert_machine_drp').css('display','none');
        edit_machine_drp = false;
    }
}


// edit multi select part dropdown
var edit_part_drp_v = false;
function edit_alert_part(){
    if (!edit_part_drp_v) {
        $('.edit_alert_part_drp').css('display','block');
        edit_part_drp_v = true;
    }else{
        $('.edit_alert_part_drp').css('display','none');
        edit_part_drp_v = false;
    }
}



// filter dropdown assignee
// onclick part
$(document).on('click','.filter_drp_part',function(event){
    event.preventDefault();
    var count1 = $('.filter_drp_part');
    var index_val = count1.index($(this));
    var check_if = $('.filter_Drp_part_checkbox');
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            reset_filter_part();

        }else{
            $('.filter_Drp_part_checkbox').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.filter_Drp_part_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.filter_Drp_part_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.filter_Drp_part_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.filter_Drp_part_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#filter_txt_part').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            reset_filter_part();
            $('#filter_txt_part').text('All Parts');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#filter_txt_part').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#filter_txt_part').text('No Part');  
    }
});

// onclick machine
$(document).on('click','.filter_drp_machine_click',function(event){
    event.preventDefault();
    var count1 = $('.filter_drp_machine_click');
    var index_val = count1.index($(this));
    var check_if = $('.filter_drp_machine_checkbox');
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            reset_filter_machine_alert();

        }else{
            $('.filter_drp_machine_checkbox').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.filter_drp_machine_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.filter_drp_machine_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.filter_drp_machine_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.filter_drp_machine_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#filter_txt_machine').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            reset_filter_machine_alert();
            $('#filter_txt_machine').text('All Machines');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#filter_txt_machine').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#filter_txt_machine').text('No Machine');  
    }
});

// work order onclick
$(document).on('click','.alert_filter_work_click',function(event){
    event.preventDefault();
    var count1 = $('.alert_filter_work_click');
    var index_val = count1.index($(this));
    var check_if = $('.filter_alert_work_checkbox');
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            reset_work_order_drp();

        }else{
            $('.filter_alert_work_checkbox').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.filter_alert_work_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.filter_alert_work_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.filter_alert_work_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.filter_alert_work_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#text_filter_work').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            reset_work_order_drp();
            $('#text_filter_work').text('All Machines');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#text_filter_work').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#text_filter_work').text('No Machine');  
    }
});

// last updated by onclick

// work order onclick
$(document).on('click','.filter_drp_last_updated_click',function(event){
    event.preventDefault();
    var count1 = $('.filter_drp_last_updated_click');
    var index_val = count1.index($(this));
    var check_if = $('.filter_drp_last_updated_checkbox');
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            reset_filter_last_updated_by();

        }else{
            $('.filter_drp_last_updated_checkbox').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.filter_drp_last_updated_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.filter_drp_last_updated_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.filter_drp_last_updated_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.filter_drp_last_updated_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#txt_filter_last_updated_by').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            reset_filter_last_updated_by();
            $('#txt_filter_last_updated_by').text('All Users');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#txt_filter_last_updated_by').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#txt_filter_last_updated_by').text('No User');  
    }
});

// edit machine drp click function on going
$(document).on('click','.edit_drp_machine_click',function(event){
    event.preventDefault();
    var count1 = $('.edit_drp_machine_click');
    var index_val = count1.index($(this));
    var check_if = $('.edit_drp_machine_checkbox');
    var temp_pass_data = null;
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            edit_machine_drp_set(temp_pass_data);

        }else{
            $('.edit_drp_machine_checkbox').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.edit_drp_machine_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.edit_drp_machine_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.edit_drp_machine_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.edit_drp_machine_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#edit_alert_machine_txt').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            edit_machine_drp_set(temp_pass_data);
            $('#edit_alert_machine_txt').text('All Machines');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#edit_alert_machine_txt').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#edit_alert_machine_txt').text('No Machine');  
    }
});

// edit part drp click function on going
$(document).on('click','.edit_part_drp_click',function(event){
    event.preventDefault();
    var count1 = $('.edit_part_drp_click');
    var index_val = count1.index($(this));
    var check_if = $('.editpart_drp_checkbox');
    var temp_pass_data = null;
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            edit_part_drp_set(temp_pass_data);

        }else{
            $('.editpart_drp_checkbox').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.editpart_drp_checkbox:eq('+index_val+')').attr('checked','checked');
        }else{
        $('.editpart_drp_checkbox:eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.editpart_drp_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.editpart_drp_checkbox').length;
    // console.log("reason length:\t"+reason_len);
    // console.log("reason select count:\t"+reason_select_count);
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('#edit_alert_part_txt').text(parseInt(createdby_select_count)-1+' Selected');
        }else{
            edit_part_drp_set(temp_pass_data);
            $('#edit_alert_part_txt').text('All Parts');
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('#edit_alert_part_txt').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('#edit_alert_part_txt').text('No Part');  
    }

})


function reset_filter_part(){
    var reason_arr = $('.filter_Drp_part_checkbox');
    jQuery('.filter_Drp_part_checkbox').each(function(in1){
        reason_arr[in1].checked=true;
    });
    $('#filter_txt_part').text('All Parts');
}

function reset_filter_machine_alert(){
    var machine_arr = $('.filter_drp_machine_checkbox');
    jQuery('.filter_drp_machine_checkbox').each(function(in1){
        machine_arr[in1].checked=true;
    });
    $('#filter_txt_machine').text('All Machines');

}

function reset_work_order_drp(){
    var work_arr = $('.filter_alert_work_checkbox');
    jQuery('.filter_alert_work_checkbox').each(function(index){
        work_arr[index].checked=true;
    });
    $('#text_filter_work').text('All ');
}

function reset_filter_last_updated_by(){
    var last_updated_arr = $('.filter_drp_last_updated_checkbox');
    jQuery('.filter_drp_last_updated_checkbox').each(function(index){
        last_updated_arr[index].checked=true;
    });
    $('#txt_filter_last_updated_by').text('All Users');
}


// edit machine arr particular value selection list
function edit_machine_drp_set(data) {
    var tmp_edit_machine_arr = $('.edit_drp_machine_checkbox');
    console.log(data);
    if (data==null) {
        jQuery('.edit_drp_machine_checkbox').each(function(ind1){
            tmp_edit_machine_arr[ind1].checked=true;
        });
        $('#edit_alert_machine_txt').text('All Machines');
    }else{
        var tmp_machine_arr = data.split(",");
        if (parseInt(tmp_machine_arr.length)>0) {
            jQuery('.edit_drp_machine_checkbox').each(function(index){
                var tmp_mid = $('.edit_drp_machine_checkbox:eq('+index+')').val();
                
                for(var i=0;i<parseInt(tmp_machine_arr.length);i++){
                    if (tmp_mid === tmp_machine_arr[i]) {
                        tmp_edit_machine_arr[index].checked=true;
                    }
                }
            }); 
            $('#edit_alert_machine_txt').text(tmp_machine_arr.length+' selected');
        }
    }
}

// edit part arr particular value selection list
function edit_part_drp_set(data){
    var tmp_edit_part_arr = $('.editpart_drp_checkbox');
    console.log(data);
    if (data==null) {
        jQuery('.editpart_drp_checkbox').each(function(ind1){
            tmp_edit_part_arr[ind1].checked=true;
        });
        $('#edit_alert_part_txt').text('All parts');
    }else{
        var tmp_part_arr = data.split(",");
        if (parseInt(tmp_part_arr.length)>0) {
            jQuery('.editpart_drp_checkbox').each(function(index){
                var tmp_mid = $('.editpart_drp_checkbox:eq('+index+')').val();
                
                for(var i=0;i<parseInt(tmp_part_arr.length);i++){
                    if (tmp_mid === tmp_part_arr[i]) {
                        tmp_edit_part_arr[index].checked=true;
                    }
                }
            }); 
            $('#edit_alert_part_txt').text(tmp_part_arr.length+' selected');
        }
    }
}