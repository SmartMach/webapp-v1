
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
  
});

// graph filter category div onclick function
$(document).on('click','.filter_check_categorygb',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb','categorygp_checkbox','text_categorygp','Categories','oppcost_reason_category',this);

   
});

// Downtime duration by Reason Graph
// Graph filter machine div onclick function
$(document).on('click','.filter_check_machinegp1',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp1','machinegp_checkbox1','text_machinegp1','Machines','duration_reason_machine',this);

    
});


// Graph filter Reason div onclick function
$(document).on('click','.filter_check_reasongp1',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp1','reasongp_checkbox1','text_reasongp1','Reasons','duration_reason_reason',this);
   
});

// Graph filter Category div onclick function
$(document).on('click','.filter_check_categorygb1',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb1','categorygp_checkbox1','text_categorygp1','Categories','duration_reason_category',this);
   
});


// Downtime Opportunity cost by Machines Graph
// Graph filter machine div onclick function
$(document).on('click','.filter_check_machinegp2',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp2','machinegp_checkbox2','text_machinegp2','Machines','oppcost_machine_machine',this);
  
});


// Graph filter Reasons div onclick function
$(document).on('click','.filter_check_reasongp2',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp2','reasongp_checkbox2','text_reasongp2','Reasons','oppcost_machine_reason',this);
  
});

// Graph filter Categories div onclick function
$(document).on('click','.filter_check_categorygb2',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb2','categorygp_checkbox2','text_categorygp2','Categories','oppcost_machine_category',this);

});



// Downtime Duration by Machines With Reasons Graph
// Graph filter Machines div onclick function

// graph filter machine and reason duration
$(document).on('click','.filter_check_machinegp3',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machinegp3','machinegp_checkbox3','text_machinegp3','Machines','duration_machine_machine',this);
   
});


// Graph filter Reasons div onclick function
$(document).on('click','.filter_check_reasongp3',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_reasongp3','reasongp_checkbox3','text_reasongp3','Reasons','duration_machine_reason',this);

});


// Graph filter Category div onclick function
$(document).on('click','.filter_check_categorygb3',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_categorygb3','categorygp_checkbox3','text_categorygp3','Categories','duration_machine_category',this);

});



// Production Downtime Table filter filter dropdown click functions
// created by dropdown checkbox label onclick created by code
$(document).on('click','.filter_check_cb',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_cb','created_by_checkbox','text_created_by_drp','Users','table_filter_user',this);
 
});


// downtime reason dropdown checkbox label onclick function code
$(document).on('click','.filter_check_r',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_r','reason_checkbox','text_reason_drp','Reasons','table_filter_reason',this);

});


// category dropdown checkbox label onclick category reasons code
$(document).on('click','.filter_check_cate',function(event){
  event.preventDefault();
  drp_div_selection_fun('filter_check_cate','category_drp_checkbox','text_category_drp','Categories','table_filter_category',this);

});


// downtime part dropdown checkbox label onclick function
$(document).on('click','.filter_check_part',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_part','partname_checkbox','text_category_drp_part','Parts','table_filter_part',this);

});


// downtime machine dropdown checkbox label onclick function
$(document).on('click','.filter_check_machine',function(event){
    event.preventDefault();
    drp_div_selection_fun('filter_check_machine','machine_checkbox','text_machine_drp','Machines','table_filter_machine',this);
     
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
