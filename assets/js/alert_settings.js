// Global Variables
const drp_obj = {
    table_filter_part:false,
    table_filter_machine:false,
    table_fitler_notify_as:false,
    table_filter_lastupdated_by:false,


    add_alert_drp_machine:false,
    add_alert_drp_part:false,

    edit_alert_drp_machine:false,
    edit_alert_drp_part:false,
};


// common checkbox dropdown onclick function in alert management module
function multiple_drp_hide_seek_pd(classref,keyref){
    $('.filter_checkboxes_categorygp').css('display','none');
    if (!drp_obj[keyref]) {
        $('.'+classref+'').css('display','inline');
        drp_obj[keyref]=true;
    }else{
        $('.'+classref+'').css('display','none');
        drp_obj[keyref]=false;
    }
}

// common checkbox dropdown onclick function in alertmanagement modal functions adding and editing alert function
function multiple_drp_alert_seek_pd(classref,keyref){
    $('.filter_checkbox_option_div').css('display','none');
    if (!drp_obj[keyref]) {
        $('.'+classref+'').css('display','inline');
        drp_obj[keyref]=true;
    }else{
        $('.'+classref+'').css('display','none');
        drp_obj[keyref]=false;
    }
}


// global function calling switchcase function
function reset_function_calling(res){
    switch (res) {
        case 'table_filter_part':
            reset_filter_part();
            break;
    
        case 'table_filter_machine':
            reset_filter_machine_alert();
            break;
        
        case 'table_fitler_notify_as':
            reset_work_order_drp();
            break;

        case 'table_filter_lastupdated_by':
            reset_filter_last_updated_by();
            break;

        case 'add_alert_drp_part_call':
            reset_add_alert_part();
            break;
        case 'add_alert_drp_machine_call':
            reset_add_alert_machine();
            break;
        case 'edit_alert_drp_machine_call':
            edit_machine_drp_set(null);
            break;
        case 'edit_alert_drp_part_call':
            edit_part_drp_set(null);
            break;
    }
}

// gloabl onclick div function 
function onclick_common_div_fun(classref,checkbox_ref,text_div,name_ref,fun_call,thisref){
    var count1 = $('.'+classref+'');
    var index_val = count1.index($(thisref));
    var check_if = $('.'+checkbox_ref+'');
    if (parseInt(index_val)===0) {
        if (check_if[0].checked==false) {
            reset_function_calling(fun_call);
            
            $('.'+text_div+'').text('All '+name_ref);

        }else{
            $('.'+checkbox_ref+'').removeAttr('checked');
        }
    }else if(parseInt(index_val)>0){
        if (check_if[index_val].checked === false) {
        check_if[index_val].checked=true;
        $('.'+checkbox_ref+':eq('+index_val+')').attr('checked','checked');
        }else{
        $('.'+checkbox_ref+':eq('+index_val+')').removeAttr('checked');
        check_if[0].checked=false;
        }
    }

    var createdby_select_count = 0;
    jQuery('.'+checkbox_ref+'').each(function(index){
        if (check_if[index].checked===true) {
            createdby_select_count = parseInt(createdby_select_count)+1;
        }
    });
    var createdby_len = $('.'+checkbox_ref+'').length;
   
    createdby_len = parseInt(createdby_len)-1;
    if (parseInt(createdby_select_count)>=parseInt(createdby_len)) {
        if (check_if[0].checked==true) {
            check_if[0].checked=true;
            $('.'+text_div+'').text('All '+name_ref);
        }else{
            reset_function_calling(fun_call);
           
            $('.'+text_div+'').text('All '+name_ref);
        }
    }
    else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
        $('.'+text_div+'').text(parseInt(createdby_select_count)+' selected');
    }else{
        $('.'+text_div+'').text('No '+name_ref);  
    }
}

// table filter onclick parts dropdown function
$(document).on('click','.filter_drp_part',function(event){
    event.preventDefault();
    onclick_common_div_fun('filter_drp_part','filter_Drp_part_checkbox','filter_txt_part','Parts','table_filter_part',this);
});

// table filter  onclick machines dropdown function
$(document).on('click','.filter_drp_machine_click',function(event){
    event.preventDefault();
    onclick_common_div_fun('filter_drp_machine_click','filter_drp_machine_checkbox','filter_txt_machine','Machines','table_filter_machine',this);
   
});

// table filter onclick notify as dropdown function
$(document).on('click','.alert_filter_work_click',function(event){
    event.preventDefault();
    onclick_common_div_fun('alert_filter_work_click','filter_alert_work_checkbox','text_filter_work',' ','table_fitler_notify_as',this);
    
});


// table filter onclick last updated by dropdown function
$(document).on('click','.filter_drp_last_updated_click',function(event){
    event.preventDefault();
    onclick_common_div_fun('filter_drp_last_updated_click','filter_drp_last_updated_checkbox','txt_filter_last_updated_by','Users','table_filter_lastupdated_by',this);
   
});




// edit multi select machine dropdown
// var edit_machine_drp = false;
// function edit_alert_machine(){
//     if (!edit_machine_drp) {
//         $('.edit_alert_machine_drp').css('display','block');
//         edit_machine_drp = true;
//     }else{
//         $('.edit_alert_machine_drp').css('display','none');
//         edit_machine_drp = false;
//     }
// }


// edit multi select part dropdown
// var edit_part_drp_v = false;
// function edit_alert_part(){
//     if (!edit_part_drp_v) {
//         $('.edit_alert_part_drp').css('display','block');
//         edit_part_drp_v = true;
//     }else{
//         $('.edit_alert_part_drp').css('display','none');
//         edit_part_drp_v = false;
//     }
// }

// edit machine drp click function on going
$(document).on('click','.edit_drp_machine_click',function(event){
    event.preventDefault();
    onclick_common_div_fun('edit_drp_machine_click','edit_drp_machine_checkbox','edit_alert_machine_txt','Machines','edit_alert_drp_machine_call',this);

    /*
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
                $('#edit_alert_machine_txt').text('All Machines');
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
    */
});

// edit part drp click function on going
$(document).on('click','.edit_part_drp_click',function(event){
    event.preventDefault();
    onclick_common_div_fun('edit_part_drp_click','editpart_drp_checkbox','edit_alert_part_txt','Parts','edit_alert_drp_part_call',this);
    /*
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
                $('#edit_alert_part_txt').text('All Parts');
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
    */

})


function reset_filter_part(){
    var reason_arr = $('.filter_Drp_part_checkbox');
    jQuery('.filter_Drp_part_checkbox').each(function(in1){
        reason_arr[in1].checked=true;
    });
    $('.filter_txt_part').text('All Parts');
}

function reset_filter_machine_alert(){
    var machine_arr = $('.filter_drp_machine_checkbox');
    jQuery('.filter_drp_machine_checkbox').each(function(in1){
        machine_arr[in1].checked=true;
    });
    $('.filter_txt_machine').text('All Machines');

}

function reset_work_order_drp(){
    var work_arr = $('.filter_alert_work_checkbox');
    jQuery('.filter_alert_work_checkbox').each(function(index){
        work_arr[index].checked=true;
    });
    $('.text_filter_work').text('All ');
}

function reset_filter_last_updated_by(){
    var last_updated_arr = $('.filter_drp_last_updated_checkbox');
    jQuery('.filter_drp_last_updated_checkbox').each(function(index){
        last_updated_arr[index].checked=true;
    });
    $('.txt_filter_last_updated_by').text('All Users');
}


// edit machine arr particular value selection list
function edit_machine_drp_set(data) {
    var tmp_edit_machine_arr = $('.edit_drp_machine_checkbox');
    // console.log(data);
    if (data==null) {
        jQuery('.edit_drp_machine_checkbox').each(function(ind1){
            tmp_edit_machine_arr[ind1].checked=true;
        });
        $('.edit_alert_machine_txt').text('All Machines');
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
            if (tmp_machine_arr[0]==="all") {
                $('.edit_alert_machine_txt').text('All Machines');
                
            }else{
                $('.edit_alert_machine_txt').text(tmp_machine_arr.length+' selected');

            }
        }
    }
}

// edit part arr particular value selection list
function edit_part_drp_set(data){
    var tmp_edit_part_arr = $('.editpart_drp_checkbox');
    // console.log(data);
    if (data==null) {
        jQuery('.editpart_drp_checkbox').each(function(ind1){
            tmp_edit_part_arr[ind1].checked=true;
        });
        $('.edit_alert_part_txt').text('All parts');
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

            if (tmp_part_arr[0]==="all") {
                $('.edit_alert_part_txt').text('All Parts');
                
            }else{
                $('.edit_alert_part_txt').text(tmp_part_arr.length+' selected');

            }
        }
    }
}