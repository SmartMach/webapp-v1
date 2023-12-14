
// Global variable 
const drp_obj = {
    // oee trend graph machine drp 
    oee_trend_drp_machine:false,

    // machine wise oee graph
    machine_wise_oee_field_drp:false,
    machine_wise_oee_machine_drp:false,

    // Machine wise Availability
    machine_availability_category_drp:false,
    machine_availability_reason_drp:false,
    machine_availability_machine_drp:false,

    // machine wise performance with parts
    machine_wise_performance_part_drp:false,
    machine_wise_performance_machine_drp:false,


    // machine wise quality with reasons graph
    machine_wise_quality_machine_drp:false,
    machine_wise_quality_reason_drp:false,

}

// graph fitler onclick function its show options common function
function common_drp_click(classref,keyref){
    $('.filter_checkboxes').css('display','none');
    if (!drp_obj[keyref]) {
        $('.'+classref+'').css('display','inline');
        drp_obj[keyref]=true;
    }else{
        $('.'+classref+'').css('display','none');
        drp_obj[keyref]=false;
    }

}

// switch case calling funciton in global function
function call_particular_fun(res){
    switch (res) {
        case 'oee_trend_machine_call':
            reset_machine();
            break;
        case 'machine_wise_oee_datafield_call':
            reset_all_data_field();
            break;

        case 'machine_wise_oee_machine_call':
            reset_machine1();
            break;

        case 'machine_wise_availability_category_call':
            reset_category2();
            break;

        case 'machine_wise_availability_reason_call':
            reset_reason2();
            break;

        case 'machine_wise_availability_machine_call':
            reset_machine2();
            break;

        case 'machine_wise_performance_part_call':
            reset_part();
            break;

        case 'machine_wise_performance_machine_call':
            reset_machine3();
            break;

        case 'machine_wise_quality_reason_call':
            reset_quality_reason();
            break;

        case 'machine_wise_quality_machine_call':
            reset_machine4();
            break;

        
    }
}

// graph filter onclick text to check checkbox common function
function common_click_div_fun(classref,checkbox_ref,text_ref,name_ref,fun_Call_ref,thisref){
    var count_reason_gp1  = $('.'+classref+'');
        var index_reason_gp1 = count_reason_gp1.index($(thisref));
        var check_if1 = $('.'+checkbox_ref+'');
        if (index_reason_gp1 === 0) {
            if (check_if1[0].checked==false) {
                call_particular_fun(fun_Call_ref);

            }
            else{
                $('.'+checkbox_ref+'').removeAttr('checked');
            }
        }else{
            if (check_if1[index_reason_gp1].checked==false) {
                check_if1[index_reason_gp1].checked=true;
                $('.'+checkbox_ref+':eq('+index_reason_gp1+')').attr('checked','checked');
            }else{
                $('.'+checkbox_ref+':eq('+index_reason_gp1+')').removeAttr('checked');
                check_if1[0].checked=false;
            }
        }

        var reason_gp_select_count1 = 0;
        jQuery('.'+checkbox_ref+'').each(function(index){
        if (check_if1[index].checked===true) {
            reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
        }
        });
        var reason_gp_len1 = $('.'+checkbox_ref+'').length;
        reason_gp_len1 = parseInt(reason_gp_len1)-1;
        if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
            if(check_if1[0].checked===true){
                check_if1[0].checked=true;
                $('.'+text_ref+'').text('All '+name_ref);
            }else{
                // check_if[0].checked=true;
                // reset_machine();
                call_particular_fun(fun_Call_ref);
            }
        }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
            $('.'+text_ref+'').text(parseInt(reason_gp_select_count1)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('.'+text_ref+'').text('No '+name_ref);
        }
}


//  oee trend graph 
// machine dropdown
function reset_machine(){
    var category_arr = $('.machine_checkbox');
    jQuery('.machine_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_machine').text('All Machines');
}

// machine wise oee graph
// datafield  dropdown 
function reset_all_data_field(){
    var category_arr = $('.all_data_field_checkbox');
    jQuery('.all_data_field_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_all_data_field').text('All Data Fields');
}

// machine dropdown
function reset_machine1(){
    var category_arr = $('.machine_checkbox1');
    jQuery('.machine_checkbox1').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_machine1').text('All Machines');
}


// machine wise availability dropdown
//  categroy dropdown
function reset_category2(){
    var category_arr = $('.category_drp_checkbox2');
    jQuery('.category_drp_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_category_drp2').text('All Categories');
}

// Reason dropdown
function reset_reason2(){
    var category_arr = $('.reason_checkbox2');
    jQuery('.reason_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_reason2').text('All Reasons');
}

// Machine Dropdown
function reset_machine2(){
    var category_arr = $('.machine_checkbox2');
    jQuery('.machine_checkbox2').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_machine2').text('All Machines');
}

// machine wise performance with parts
// parts dropdown
function reset_part(){
    var category_arr = $('.part_checkbox');
    jQuery('.part_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_part').text('All Parts');
}

// machine dropdown
function reset_machine3(){
    var category_arr = $('.machine_checkbox3');
    jQuery('.machine_checkbox3').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_machine3').text('All Machines');
}

// machine wise quality with reasons
// reasons dropdown
function reset_quality_reason(){
    var category_arr = $('.quality_checkbox');
    jQuery('.quality_checkbox').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_quality_reason').text('All Reasons');
}
// machine dropdown
function reset_machine4(){
    var category_arr = $('.machine_checkbox4');
    jQuery('.machine_checkbox4').each(function(in2){
        category_arr[in2].checked=true;
    });
    $('.text_machine4').text('All Machines');
}

