
// switch case function for reset function name get
function get_reset_fun(res){
    switch (res) {
        case 'oppcost_reason_machine':
            reset_machine_gp();
            break;
        case 'oppcost_reason_reason':
            reset_reason_gp();
            break;
        
        case 'oppcost_reason_category':
            reset_category_gp();
            break;

        case 'duration_reason_machine':
            reset_machine_gp1();
            break;

        case 'duration_reason_reason':
            reset_reason_gp1();
            break;

        case 'duration_reason_category':
            reset_category_gp1();
            break;
        
        case 'oppcost_machine_machine':
            reset_machine_gp2();
            break;

        case 'oppcost_machine_reason':
            reset_reason_gp2();
            break;

        case 'oppcost_machine_category':
            reset_category_gp2();
            break;

        case 'duration_machine_machine':
            reset_machine_gp3();
            break;

        case 'duration_machine_reason':
            reset_reason_gp3();
            break;
        case 'duration_machine_category':
            reset_category_gp3();
            break;

        case 'table_filter_user':
            reset_created_by();
            break;

        case 'table_filter_reason':
            reset_reason();
            break;

        case 'table_filter_category':
            reset_category()
            break;
        
        case 'table_filter_part':
            reset_part();
            break;
        
        case 'table_filter_machine':
            reset_machine();
            break;
    }
}

// filter 
// onclick div function 
// global checkbox div click function
function drp_div_selection_fun(classref,check_box_class,text_id,name_ref,function_name,thiref){
    var count_machine_gp  = $('.'+classref+'');
    var index_machine_gp = count_machine_gp.index($(thiref));
    var check_if = $('.'+check_box_class+'');
    if (index_machine_gp === 0) {
        if (check_if[0].checked==false) {
            get_reset_fun(function_name); 
            
        }
        else{
            $('.'+check_box_class+'').removeAttr('checked');
        }
    }else{
        if (check_if[index_machine_gp].checked==false) {
            check_if[index_machine_gp].checked=true;
            $('.'+check_box_class+':eq('+index_machine_gp+')').attr('checked','checked');
        }else{
            $('.'+check_box_class+':eq('+index_machine_gp+')').removeAttr('checked');
            check_if[0].checked=false;
        }
    }

    var machine_gp_select_count = 0;
    jQuery('.'+check_box_class+'').each(function(index){
      if (check_if[index].checked===true) {
        machine_gp_select_count = parseInt(machine_gp_select_count)+1;
      }
    });
    var machine_gp_len = $('.'+check_box_class+'').length;
    machine_gp_len = parseInt(machine_gp_len)-1;
    // console.log("machine onclick"+machine_gp_len);
    if (parseInt(machine_gp_select_count)>=parseInt(machine_gp_len)) {
        if(check_if[0].checked===true){
            check_if[0].checked=true;
            $('.'+text_id+'').html('All '+name_ref);
        }else{
            // check_if[0].checked=true;
            get_reset_fun(function_name);

            $('.'+text_id+'').html('All '+name_ref);
        }
    }else if(((parseInt(machine_gp_select_count)<parseInt(machine_gp_len))) && (parseInt(machine_gp_select_count)>0)){
        $('.'+text_id+'').html(parseInt(machine_gp_select_count)+' Selected');
        console.log("selection count"+parseInt(machine_gp_select_count)+""+parseInt(machine_gp_len));
        // check_if[0].checked=false;
    }else {
        $('.'+text_id+'').html('No '+name_ref);
    }
}

// Downtime Opportunity Cost by Reasons
// graph filter machine div onclick function
$(document).on('click','.filter_check_machinegp',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp','machinegp_checkbox','text_machinegp_drp','Machines','oppcost_reason_machine',this);
});

// graph filter reason div onclick function
$(document).on('click','.filter_check_reasongp',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp','reasongp_checkbox','text_reasongp','Reasons','oppcost_reason_reason',this);
    /*
        var count_reason_gp  = $('.filter_check_reasongp');
        var index_reason_gp = count_reason_gp.index($(this));
        var check_if = $('.reasongp_checkbox');
        if (index_reason_gp === 0) {
            if (check_if[0].checked==false) {
                reset_reason_gp();

            }
            else{
                $('.reasongp_checkbox').removeAttr('checked');
            }
        }else{
            if (check_if[index_reason_gp].checked==false) {
                check_if[index_reason_gp].checked=true;
                $('.reasongp_checkbox:eq('+index_reason_gp+')').attr('checked','checked');
            }else{
                $('.reasongp_checkbox:eq('+index_reason_gp+')').removeAttr('checked');
                check_if[0].checked=false;
            }
        }
    
        var reason_gp_select_count = 0;
        jQuery('.reasongp_checkbox').each(function(index){
            if (check_if[index].checked===true) {
                reason_gp_select_count = parseInt(reason_gp_select_count)+1;
            }
        });
        var reason_gp_len = $('.reasongp_checkbox').length;
        reason_gp_len = parseInt(reason_gp_len)-1;
        if (parseInt(reason_gp_select_count)>=parseInt(reason_gp_len)) {
            if(check_if[0].checked===true){
                check_if[0].checked=true;
                $('#text_reasongp').text('All Reasons');
            }else{
                // check_if[0].checked=true;
                reset_reason_gp();
                $('#text_reasongp').text('All Reasons');
            }
        }else if(((parseInt(reason_gp_select_count)<parseInt(reason_gp_len))) && (parseInt(reason_gp_select_count)>0)){
            $('#text_reasongp').text(parseInt(reason_gp_select_count)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_reasongp').text('No Reasons');
        }
    */
});

// graph filter category div onclick function
$(document).on('click','.filter_check_categorygb',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb','categorygp_checkbox','text_categorygp','Categories','oppcost_reason_category',this);

    /*   
        var count_category_gp  = $('.filter_check_categorygb');
        var index_category_gp = count_category_gp.index($(this));
        var check_if = $('.categorygp_checkbox');
        if (index_category_gp === 0) {
            if (check_if[0].checked==false) {
                reset_category_gp();

            }
            else{
                $('.categorygp_checkbox').removeAttr('checked');
            }
        }else{
            if (check_if[index_category_gp].checked==false) {
                check_if[index_category_gp].checked=true;
                $('.categorygp_checkbox:eq('+index_category_gp+')').attr('checked','checked');
            }else{
                $('.categorygp_checkbox:eq('+index_category_gp+')').removeAttr('checked');
                check_if[0].checked=false;
            }
        }

        var category_gp_select_count = 0;
        jQuery('.categorygp_checkbox').each(function(index){
        if (check_if[index].checked===true) {
            category_gp_select_count = parseInt(category_gp_select_count)+1;
        }
        });
        var category_gp_len = $('.categorygp_checkbox').length;
        category_gp_len = parseInt(category_gp_len)-1;
        if (parseInt(category_gp_select_count)>=parseInt(category_gp_len)) {
            if(check_if[0].checked===true){
                check_if[0].checked=true;
                $('#text_categorygp').text('All Categories');
            }else{
                // check_if[0].checked=true;
                reset_category_gp();
                $('#text_categorygp').text('All Categories');
            }
        }else if(((parseInt(category_gp_select_count)<parseInt(category_gp_len))) && (parseInt(category_gp_select_count)>0)){
            $('#text_categorygp').text(parseInt(category_gp_select_count)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_categorygp').text('No Categories');
        }
    */
});

// Downtime duration by Reason Graph
// Graph filter machine div onclick function
$(document).on('click','.filter_check_machinegp1',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp1','machinegp_checkbox1','text_machinegp1','Machines','duration_reason_machine',this);

    /*
        var count_machine_gp1  = $('.filter_check_machinegp1');
        var index_machine_gp1 = count_machine_gp1.index($(this));
        var check_if1 = $('.machinegp_checkbox1');
        if (index_machine_gp1 === 0) {
            if (check_if1[0].checked==false) {
                reset_machine_gp1();

            }
            else{
                $('.machinegp_checkbox1').removeAttr('checked');
            }
        }else{
            if (check_if1[index_machine_gp1].checked==false) {
                check_if1[index_machine_gp1].checked=true;
                $('.machinegp_checkbox1:eq('+index_machine_gp1+')').attr('checked','checked');
            }else{
                $('.machinegp_checkbox1:eq('+index_machine_gp1+')').removeAttr('checked');
                check_if1[0].checked=false;
            }
        }

        var machine_gp_select_count1 = 0;
        jQuery('.machinegp_checkbox1').each(function(index){
        if (check_if1[index].checked===true) {
            machine_gp_select_count1 = parseInt(machine_gp_select_count1)+1;
        }
        });
        var machine_gp_len1 = $('.machinegp_checkbox1').length;
        machine_gp_len1 = parseInt(machine_gp_len1)-1;
        if (parseInt(machine_gp_select_count1)>=parseInt(machine_gp_len1)) {
            if(check_if1[0].checked===true){
                check_if1[0].checked=true;
                $('#text_machinegp1').text('All Machines');
            }else{
                // check_if[0].checked=true;
                reset_machine_gp1();
                $('#text_machinegp1').text('All Machines');
            }
        }else if(((parseInt(machine_gp_select_count1)<parseInt(machine_gp_len1))) && (parseInt(machine_gp_select_count1)>0)){
            $('#text_machinegp1').text(parseInt(machine_gp_select_count1)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_machinegp1').text('No Machines');
        }
    */
});


// Graph filter Reason div onclick function
$(document).on('click','.filter_check_reasongp1',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp1','reasongp_checkbox1','text_reasongp1','Reasons','duration_reason_reason',this);
    /*    
        var count_reason_gp1  = $('.filter_check_reasongp1');
        var index_reason_gp1 = count_reason_gp1.index($(this));
        var check_if1 = $('.reasongp_checkbox1');
        if (index_reason_gp1 === 0) {
            if (check_if1[0].checked==false) {
                reset_reason_gp1();

            }
            else{
                $('.reasongp_checkbox1').removeAttr('checked');
            }
        }else{
            if (check_if1[index_reason_gp1].checked==false) {
                check_if1[index_reason_gp1].checked=true;
                $('.reasongp_checkbox1:eq('+index_reason_gp1+')').attr('checked','checked');
            }else{
                $('.reasongp_checkbox1:eq('+index_reason_gp1+')').removeAttr('checked');
                check_if1[0].checked=false;
            }
        }

        var reason_gp_select_count1 = 0;
        jQuery('.reasongp_checkbox1').each(function(index){
        if (check_if1[index].checked===true) {
            reason_gp_select_count1 = parseInt(reason_gp_select_count1)+1;
        }
        });
        var reason_gp_len1 = $('.reasongp_checkbox1').length;
        reason_gp_len1 = parseInt(reason_gp_len1)-1;
        if (parseInt(reason_gp_select_count1)>=parseInt(reason_gp_len1)) {
            if(check_if1[0].checked===true){
                check_if1[0].checked=true;
                $('#text_reasongp1').text('All Reasons');
            }else{
                // check_if[0].checked=true;
                reset_reason_gp1();
                $('#text_reasongp1').text('All Reasons');
            }
        }else if(((parseInt(reason_gp_select_count1)<parseInt(reason_gp_len1))) && (parseInt(reason_gp_select_count1)>0)){
            $('#text_reasongp1').text(parseInt(reason_gp_select_count1)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_reasongp1').text('No Reasons');
        }
    */
});

// Graph filter Category div onclick function
$(document).on('click','.filter_check_categorygb1',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb1','categorygp_checkbox1','text_categorygp1','Categories','duration_reason_category',this);
    /*
        var count_category_gp1  = $('.filter_check_categorygb1');
        var index_category_gp1 = count_category_gp1.index($(this));
        var check_if1 = $('.categorygp_checkbox1');
        if (index_category_gp1 === 0) {
            if (check_if1[0].checked==false) {
                reset_category_gp1();

            }
            else{
                $('.categorygp_checkbox1').removeAttr('checked');
            }
        }else{
            if (check_if1[index_category_gp1].checked==false) {
                check_if1[index_category_gp1].checked=true;
                $('.categorygp_checkbox1:eq('+index_category_gp1+')').attr('checked','checked');
            }else{
                $('.categorygp_checkbox1:eq('+index_category_gp1+')').removeAttr('checked');
                check_if1[0].checked=false;
            }
        }

        var category_gp_select_count1 = 0;
        jQuery('.categorygp_checkbox1').each(function(index){
        if (check_if1[index].checked===true) {
            category_gp_select_count1 = parseInt(category_gp_select_count1)+1;
        }
        });
        var category_gp_len1 = $('.categorygp_checkbox1').length;
        category_gp_len1 = parseInt(category_gp_len1)-1;
        if (parseInt(category_gp_select_count1)>=parseInt(category_gp_len1)) {
            if(check_if1[0].checked===true){
                check_if1[0].checked=true;
                $('#text_categorygp1').text('All Categories');
            }else{
                // check_if[0].checked=true;
                reset_category_gp1();
                $('#text_categorygp1').text('All Categories');
            }
        }else if(((parseInt(category_gp_select_count1)<parseInt(category_gp_len1))) && (parseInt(category_gp_select_count1)>0)){
            $('#text_categorygp1').text(parseInt(category_gp_select_count1)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_categorygp1').text('No Categories');
        }
    */

});


// Downtime Opportunity cost by Machines Graph
// Graph filter machine div onclick function
$(document).on('click','.filter_check_machinegp2',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp2','machinegp_checkbox2','text_machinegp2','Machines','oppcost_machine_machine',this);
    /*
        var count_machine_gp2  = $('.filter_check_machinegp2');
        var index_machine_gp2 = count_machine_gp2.index($(this));
        var check_if2 = $('.machinegp_checkbox2');
        if (index_machine_gp2 === 0) {
            if (check_if2[0].checked==false) {
                reset_machine_gp2();

            }
            else{
                $('.machinegp_checkbox2').removeAttr('checked');
            }
        }else{
            if (check_if2[index_machine_gp2].checked==false) {
                check_if2[index_machine_gp2].checked=true;
                $('.machinegp_checkbox2:eq('+index_machine_gp2+')').attr('checked','checked');
            }else{
                $('.machinegp_checkbox2:eq('+index_machine_gp2+')').removeAttr('checked');
                check_if2[0].checked=false;
            }
        }

        var machine_gp_select_count2 = 0;
        jQuery('.machinegp_checkbox2').each(function(index){
        if (check_if2[index].checked===true) {
            machine_gp_select_count2 = parseInt(machine_gp_select_count2)+1;
        }
        });
        var machine_gp_len2 = $('.machinegp_checkbox2').length;
        machine_gp_len2 = parseInt(machine_gp_len2)-1;
        if (parseInt(machine_gp_select_count2)>=parseInt(machine_gp_len2)) {
            if(check_if2[0].checked===true){
                check_if2[0].checked=true;
                $('#text_machinegp2').text('All Machines');
            }else{
                // check_if[0].checked=true;
                reset_machine_gp2();
                $('#text_machinegp2').text('All Machines');
            }
        }else if(((parseInt(machine_gp_select_count2)<parseInt(machine_gp_len2))) && (parseInt(machine_gp_select_count2)>0)){
            $('#text_machinegp2').text(parseInt(machine_gp_select_count2)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_machinegp2').text('No Machines');
        }
    */
});


// Graph filter Reasons div onclick function
$(document).on('click','.filter_check_reasongp2',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp2','reasongp_checkbox2','text_reasongp2','Reasons','oppcost_machine_reason',this);
    /*
        var count_reason_gp2  = $('.filter_check_reasongp2');
        var index_reason_gp2 = count_reason_gp2.index($(this));
        var check_if2 = $('.reasongp_checkbox2');
        if (index_reason_gp2 === 0) {
            if (check_if2[0].checked==false) {
                reset_reason_gp2();

            }
            else{
                $('.reasongp_checkbox2').removeAttr('checked');
            }
        }else{
            if (check_if2[index_reason_gp2].checked==false) {
                check_if2[index_reason_gp2].checked=true;
                $('.reasongp_checkbox2:eq('+index_reason_gp2+')').attr('checked','checked');
            }else{
                $('.reasongp_checkbox2:eq('+index_reason_gp2+')').removeAttr('checked');
                check_if2[0].checked=false;
            }
        }

        var reason_gp_select_count2 = 0;
        jQuery('.reasongp_checkbox2').each(function(index){
        if (check_if2[index].checked===true) {
            reason_gp_select_count2 = parseInt(reason_gp_select_count2)+1;
        }
        });
        var reason_gp_len2 = $('.reasongp_checkbox2').length;
        reason_gp_len2 = parseInt(reason_gp_len2)-1;
        if (parseInt(reason_gp_select_count2)>=parseInt(reason_gp_len2)) {
            if(check_if2[0].checked===true){
                check_if2[0].checked=true;
                $('#text_reasongp2').text('All Reasons');
            }else{
                // check_if[0].checked=true;
                reset_reason_gp2();
                $('#text_reasongp2').text('All Reasons');
            }
        }else if(((parseInt(reason_gp_select_count2)<parseInt(reason_gp_len2))) && (parseInt(reason_gp_select_count2)>0)){
            $('#text_reasongp2').text(parseInt(reason_gp_select_count2)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_reasongp2').text('No Reasons');
        }
    */
});

// Graph filter Categories div onclick function
$(document).on('click','.filter_check_categorygb2',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb2','categorygp_checkbox2','text_categorygp2','Categories','oppcost_machine_category',this);

    /*
        var count_category_gp2  = $('.filter_check_categorygb2');
        var index_category_gp2 = count_category_gp2.index($(this));
        var check_if2 = $('.categorygp_checkbox2');
        if (index_category_gp2 === 0) {
            if (check_if2[0].checked==false) {
                reset_category_gp2();

            }
            else{
                $('.categorygp_checkbox2').removeAttr('checked');
            }
        }else{
            if (check_if2[index_category_gp2].checked==false) {
                check_if2[index_category_gp2].checked=true;
                $('.categorygp_checkbox2:eq('+index_category_gp2+')').attr('checked','checked');
            }else{
                $('.categorygp_checkbox2:eq('+index_category_gp2+')').removeAttr('checked');
                check_if2[0].checked=false;
            }
        }

        var category_gp_select_count2 = 0;
        jQuery('.categorygp_checkbox2').each(function(index){
        if (check_if2[index].checked===true) {
            category_gp_select_count2 = parseInt(category_gp_select_count2)+1;
        }
        });
        var category_gp_len2 = $('.categorygp_checkbox2').length;
        category_gp_len2 = parseInt(category_gp_len2)-1;
        if (parseInt(category_gp_select_count2)>=parseInt(category_gp_len2)) {
            if(check_if2[0].checked===true){
                check_if2[0].checked=true;
                $('#text_categorygp2').text('All Categories');
            }else{
                // check_if[0].checked=true;
                reset_category_gp2();
                $('#text_categorygp2').text('All Categories');
            }
        }else if(((parseInt(category_gp_select_count2)<parseInt(category_gp_len2))) && (parseInt(category_gp_select_count2)>0)){
            $('#text_categorygp2').text(parseInt(category_gp_select_count2)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_categorygp2').text('No Categories');
        }
    */

});



// Downtime Duration by Machines With Reasons Graph
// Graph filter Machines div onclick function

// graph filter machine and reason duration
$(document).on('click','.filter_check_machinegp3',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp3','machinegp_checkbox3','text_machinegp3','Machines','duration_machine_machine',this);
    /*
        var count_machine_gp3  = $('.filter_check_machinegp3');
        var index_machine_gp3 = count_machine_gp3.index($(this));
        var check_if3 = $('.machinegp_checkbox3');
        if (index_machine_gp3 === 0) {
            if (check_if3[0].checked==false) {
                reset_machine_gp3();

            }
            else{
                $('.machinegp_checkbox3').removeAttr('checked');
            }
        }else{
            if (check_if3[index_machine_gp3].checked==false) {
                check_if3[index_machine_gp3].checked=true;
                $('.machinegp_checkbox3:eq('+index_machine_gp3+')').attr('checked','checked');
            }else{
                $('.machinegp_checkbox3:eq('+index_machine_gp3+')').removeAttr('checked');
                check_if3[0].checked=false;
            }
        }

        var machine_gp_select_count3 = 0;
        jQuery('.machinegp_checkbox3').each(function(index){
        if (check_if3[index].checked===true) {
            machine_gp_select_count3 = parseInt(machine_gp_select_count3)+1;
        }
        });
        var machine_gp_len3 = $('.machinegp_checkbox3').length;
        machine_gp_len3 = parseInt(machine_gp_len3)-1;
        if (parseInt(machine_gp_select_count3)>=parseInt(machine_gp_len3)) {
            if(check_if3[0].checked===true){
                check_if3[0].checked=true;
                $('#text_machinegp3').text('All Machines');
            }else{
                // check_if[0].checked=true;
                reset_machine_gp3();
                $('#text_machinegp3').text('All');
            }
        }else if(((parseInt(machine_gp_select_count3)<parseInt(machine_gp_len3))) && (parseInt(machine_gp_select_count3)>0)){
            $('#text_machinegp3').text(parseInt(machine_gp_select_count3)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_machinegp3').text('No Machines');
        }
    */
});


// Graph filter Reasons div onclick function
$(document).on('click','.filter_check_reasongp3',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp3','reasongp_checkbox3','text_reasongp3','Reasons','duration_machine_reason',this);

    /*
        var count_reason_gp3  = $('.filter_check_reasongp3');
        var index_reason_gp3 = count_reason_gp3.index($(this));
        var check_if3 = $('.reasongp_checkbox3');
        if (index_reason_gp3 === 0) {
            if (check_if3[0].checked==false) {
                reset_reason_gp3();

            }
            else{
                $('.reasongp_checkbox3').removeAttr('checked');
            }
        }else{
            if (check_if3[index_reason_gp3].checked==false) {
                check_if3[index_reason_gp3].checked=true;
                $('.reasongp_checkbox3:eq('+index_reason_gp3+')').attr('checked','checked');
            }else{
                $('.reasongp_checkbox3:eq('+index_reason_gp3+')').removeAttr('checked');
                check_if3[0].checked=false;
            }
        }

        var reason_gp_select_count3 = 0;
        jQuery('.reasongp_checkbox3').each(function(index){
        if (check_if3[index].checked===true) {
            reason_gp_select_count3 = parseInt(reason_gp_select_count3)+1;
        }
        });
        var reason_gp_len3 = $('.reasongp_checkbox3').length;
        reason_gp_len3 = parseInt(reason_gp_len3)-1;
        if (parseInt(reason_gp_select_count3)>=parseInt(reason_gp_len3)) {
            if(check_if3[0].checked===true){
                check_if3[0].checked=true;
                $('#text_reasongp3').text('All Reasons');
            }else{
                // check_if[0].checked=true;
                reset_reason_gp3();
                $('#text_reasongp3').text('All Reasons');
            }
        }else if(((parseInt(reason_gp_select_count3)<parseInt(reason_gp_len3))) && (parseInt(reason_gp_select_count3)>0)){
            $('#text_reasongp3').text(parseInt(reason_gp_select_count3)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_reasongp3').text('No Reasons');
        }
    */
});


// Graph filter Category div onclick function
$(document).on('click','.filter_check_categorygb3',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb3','categorygp_checkbox3','text_categorygp3','Categories','duration_machine_category',this);

    /*
        var count_category_gp3  = $('.filter_check_categorygb3');
        var index_category_gp3 = count_category_gp3.index($(this));
        var check_if3 = $('.categorygp_checkbox3');
        if (index_category_gp3 === 0) {
            if (check_if3[0].checked==false) {
                reset_category_gp3();

            }
            else{
                $('.categorygp_checkbox3').removeAttr('checked');
            }
        }else{
            if (check_if3[index_category_gp3].checked==false) {
                check_if3[index_category_gp3].checked=true;
                $('.categorygp_checkbox3:eq('+index_category_gp3+')').attr('checked','checked');
            }else{
                $('.categorygp_checkbox3:eq('+index_category_gp3+')').removeAttr('checked');
                check_if3[0].checked=false;
            }
        }

        var category_gp_select_count3 = 0;
        jQuery('.categorygp_checkbox3').each(function(index){
        if (check_if3[index].checked===true) {
            category_gp_select_count3 = parseInt(category_gp_select_count3)+1;
        }
        });
        var category_gp_len3 = $('.categorygp_checkbox3').length;
        category_gp_len3 = parseInt(category_gp_len3)-1;
        if (parseInt(category_gp_select_count3)>=parseInt(category_gp_len3)) {
            if(check_if3[0].checked===true){
                check_if3[0].checked=true;
                $('#text_categorygp3').text('All Categories');
            }else{
                // check_if[0].checked=true;
                reset_category_gp3();
                $('#text_categorygp3').text('All Categories');
            }
        }else if(((parseInt(category_gp_select_count3)<parseInt(category_gp_len3))) && (parseInt(category_gp_select_count3)>0)){
            $('#text_categorygp3').text(parseInt(category_gp_select_count3)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_categorygp3').text('No Categories');
        }
    */

});



// Production Downtime Table filter filter dropdown click functions
// created by dropdown checkbox label onclick created by code
$(document).on('click','.filter_check_cb',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_cb','created_by_checkbox','text_created_by_drp','Users','table_filter_user',this);

    /*
        var count1 = $('.filter_check_cb');
        var index_val = count1.index($(this));
        var check_if = $('.created_by_checkbox');
        if (parseInt(index_val)===0) {
        
            if (check_if[0].checked==false) {
                reset_created_by();

            }else{
                $('.created_by_checkbox').removeAttr('checked');
            }
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
                $('#text_created_by_drp').text('All Users');
            }else{
                reset_created_by();
                $('#text_created_by_drp').text('All Users');
            }
        }
        else if((parseInt(createdby_select_count)<parseInt(createdby_len)) && (parseInt(createdby_select_count)>0)){
            $('#text_created_by_drp').text(parseInt(createdby_select_count)+' selected');
        }else{
            $('#text_created_by_drp').text('No Users');  
        }
    */

});


// downtime reason dropdown checkbox label onclick function code
$(document).on('click','.filter_check_r',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_r','reason_checkbox','text_reason_drp','Reasons','table_filter_reason',this);

    /*
        var count_reason = $('.filter_check_r');
        var index_reason = count_reason.index($(this));
        var check_if = $('.reason_checkbox');
        if (parseInt(index_reason)==0) {
        
            if (check_if[0].checked==false) {
                reset_reason();

            }else{
                $('.reason_checkbox').removeAttr('checked');
            }
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
                $('#text_reason_drp').text('All Reasons');
            }else{
                reset_reason();
                $('#text_reason_drp').text('All Reasons');
            }
        }
        else if((parseInt(reason_select_count)<parseInt(reason_len)) && (parseInt(reason_select_count)>0)){
            $('#text_reason_drp').text(parseInt(reason_select_count)+' selected');
        }else{
            $('#text_reason_drp').text('No Reason');  
        }

    */

   
});


// category dropdown checkbox label onclick category reasons code
$(document).on('click','.filter_check_cate',function(event){
  event.preventDefault();
  drp_div_selection_fun('filter_check_cate','category_drp_checkbox','text_category_drp','Categories','table_filter_category',this);

  /*  
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
            $('#text_category_drp').text('All Categories');
            
            }else{
            count_category = 0
            $('.category_drp_checkbox').removeAttr('checked');
            $('#text_category_drp').text('No Categories');
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
                        
                // check the count
                var count_cate = 0;
                jQuery('.category_drp_checkbox').each(function(index){
                    if (check_if[index].checked===true) {
                    count_cate = parseInt(count_cate)+1;
                    }
                });
                if (parseInt(count_cate)>=2) {
                    check_if[0].checked=true;
                    $('#text_category_drp').text('All Categories');
                }else if(parseInt(count_cate)>0){
                    $('#text_category_drp').text(count_cate+' Selected');       
                }
                else{
                    $('#text_category_drp').text('No Selected');
                }
                // $('#text_category_drp').text(count_cate+' Selected');


        }
    */

});


// downtime part dropdown checkbox label onclick function
$(document).on('click','.filter_check_part',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_part','partname_checkbox','text_category_drp_part','Parts','table_filter_part',this);

    /*
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
        // console.log("part length:\t"+part_len);
        // console.log("part select count:\t"+part_select_count);
        part_len = parseInt(part_len)-1;
        if (parseInt(part_select_count)>=parseInt(part_len)) {
            if (check_if[0].checked==true) {
                check_if[0].checked=true;
                $('#text_category_drp_part').text('All Parts');
            }else{
                reset_part();
                $('#text_category_drp_part').text('All Parts');
            }
        }
        else if((parseInt(part_select_count)<parseInt(part_len)) && (parseInt(part_select_count)>0)){
            $('#text_category_drp_part').text(parseInt(part_select_count)+' selected');
        }else{
            $('#text_category_drp_part').text('No Parts');  
        }
   
    */
});


// downtime machine dropdown checkbox label onclick function
$(document).on('click','.filter_check_machine',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machine','machine_checkbox','text_machine_drp','Machines','table_filter_machine',this);
    /*
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
        // console.log("total machine:\t"+machine_len);
        // console.log('select machine:\t'+machine_select_count);
        if (parseInt(machine_select_count)>=parseInt(machine_len)) {
            if(check_if[0].checked===true){
                check_if[0].checked=true;
                $('#text_machine_drp').text('All Machines');
            }else{
                // check_if[0].checked=true;
                reset_machine();
                $('#text_machine_drp').text('All Machines');
            }
        }else if(((parseInt(machine_select_count)<parseInt(machine_len))) && (parseInt(machine_select_count)>0)){
            $('#text_machine_drp').text(parseInt(machine_select_count)+' Selected');

            // check_if[0].checked=false;
        }else {
            $('#text_machine_drp').text('No Machine');
        }
    */
    
});













// graph filter multi select dropdown




// graph filter machine onclick function



// graph filter reason1 onclick function





// graph filter machine wise oppcost onclick function 








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
    $('#text_category_drp').text('All Categories');
}

// reset created by
function reset_created_by(){
    var created_by_arr = $('.created_by_checkbox');
    jQuery('.created_by_checkbox').each(function(in3){
        created_by_arr[in3].checked=true;
    });
    $('#text_created_by_drp').text('All Users');
}

// reset graph filter function
// reset category graph filter
function reset_category_gp(){
    var created_by_arr = $('.categorygp_checkbox');
    jQuery('.categorygp_checkbox').each(function(in3){
        created_by_arr[in3].checked=true;
    });
    $('#text_categorygp').text('All Categories');
}

// reset reason graph filter
function reset_reason_gp(){
    var reason_gparr = $('.reasongp_checkbox');
    jQuery('.reasongp_checkbox').each(function(index){
        reason_gparr[index].checked=true;
    });
    $('#text_reasongp').text('All Reasons');
}

// reset machine graph filter
function reset_machine_gp(){
    var machine_gparr = $('.machinegp_checkbox');
    jQuery('.machinegp_checkbox').each(function(index){
        machine_gparr[index].checked=true;
    });
    $('#text_machinegp_drp').text('All Machines');
}

// reset machine1 reason duration graph filter
function reset_machine_gp1(){
    var machine_gparr = $('.machinegp_checkbox1');
    jQuery('.machinegp_checkbox1').each(function(index){
        machine_gparr[index].checked=true;
    });
    $('#text_machinegp1').text('All Machines');
} 


// reset reason graph filter
function reset_reason_gp1(){
    var reason_gparr1 = $('.reasongp_checkbox1');
    jQuery('.reasongp_checkbox1').each(function(index){
        reason_gparr1[index].checked=true;
    });
    $('#text_reasongp1').text('All Reasons');
}


// category1 graph filter 
function reset_category_gp1(){
    var created_by_arr = $('.categorygp_checkbox1');
    jQuery('.categorygp_checkbox1').each(function(in3){
        created_by_arr[in3].checked=true;
    });
    $('#text_categorygp1').text('All Categories');
}

// machine wise oppcost reset dropdown
function reset_machine_gp2(){
    var machine_gparr = $('.machinegp_checkbox2');
    jQuery('.machinegp_checkbox2').each(function(index){
        machine_gparr[index].checked=true;
    });
    $('#text_machinegp2').text('All Machines');
} 

function reset_reason_gp2(){
    var reason_gparr1 = $('.reasongp_checkbox2');
    jQuery('.reasongp_checkbox2').each(function(index){
        reason_gparr1[index].checked=true;
    });
    $('#text_reasongp2').text('All Reasons');
}

function reset_category_gp2(){
    var created_by_arr = $('.categorygp_checkbox2');
    jQuery('.categorygp_checkbox2').each(function(in3){
        created_by_arr[in3].checked=true;
    });
    $('#text_categorygp2').text('All Categories');
}

// machine and reason wise duration
function reset_machine_gp3(){
    var machine_gparr = $('.machinegp_checkbox3');
    jQuery('.machinegp_checkbox3').each(function(index){
        machine_gparr[index].checked=true;
    });
    $('#text_machinegp3').text('All Machines');
} 

function reset_reason_gp3(){
    var reason_gparr1 = $('.reasongp_checkbox3');
    jQuery('.reasongp_checkbox3').each(function(index){
        reason_gparr1[index].checked=true;
    });
    $('#text_reasongp3').text('All Reasons');
}

function reset_category_gp3(){
    var created_by_arr = $('.categorygp_checkbox3');
    jQuery('.categorygp_checkbox3').each(function(in3){
        created_by_arr[in3].checked=true;
    });
    $('#text_categorygp3').text('All Categories');
}
