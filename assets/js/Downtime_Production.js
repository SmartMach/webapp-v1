
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


function multiple_drp_fun(classRef,eleRef,labRef,dropRef,thisRef) {
    var index = $('.'+classRef+'').index(thisRef);

    if(index==0 && $( '.'+eleRef+':eq('+index+')').prop( "checked")==true){
      $( '.'+eleRef+'').prop( "checked", false );
    }
    else if(index==0 && $('.'+eleRef+':eq('+index+')').prop( "checked")==false){
      $( '.'+eleRef+'').prop( "checked", true );
    }
    else{
      if ($( '.'+eleRef+':eq('+index+')').prop( "checked")==true) {
        $( '.'+eleRef+':eq('+index+')').prop( "checked", false );
      }
      else{
        $( '.'+eleRef+':eq('+index+')').prop( "checked", true );
      }
    }

    var l1 = $('.'+eleRef+'').length;
    var l2 = $('.'+eleRef+':checked').length;
    

    if ( (((l2)+1) == l1) && !($('.'+eleRef+'')[0].checked)) {
      $( '.'+eleRef+':eq(0)').prop( "checked", true);
    }
    else if (l2 < l1) {
      $( '.'+eleRef+':eq(0)').prop( "checked", false );
    }

    // part count
    var element_count = 0;
    var check_if = $('.'+eleRef+'');
    jQuery('.'+eleRef+'').each(function(index){
      if (check_if[index].checked===true) {
        element_count = parseInt(element_count)+1;
      }
    });

    var element_len = $('.'+eleRef+'').length;

    element_len = parseInt(element_len);
    if (check_if[0].checked) {
      $('#'+labRef+'').text('All '+dropRef+'');
    }
    else if (!check_if[0].checked && element_len==(element_count+1)) {
      $('#'+labRef+'').text('All '+dropRef+'');
    }
    else if (!check_if[0].checked && element_count>=1) {
      $('#'+labRef+'').text(parseInt(element_count)+' Selected');
    }
    else{
      $('#'+labRef+'').text('No '+dropRef+'');
    }
}

// Downtime Opportunity Cost by Reasons
$(document).on('click','.inbox_reason_docr',function(event){
    multiple_drp_fun("inbox_reason_docr","filter_reason_val_docr","reason_text_docr","Reasons",this);
});

$(document).on('click','.filter_reason_val_docr',function(event){
    multiple_drp_fun("filter_reason_val_docr","filter_reason_val_docr","reason_text_docr","Reasons",this);
});
$(document).on('click','.inbox_machine_docr',function(event){
    multiple_drp_fun("inbox_machine_docr","filter_machine_val_docr","machine_text_docr","Machines",this);
});

$(document).on('click','.filter_machine_val_docr',function(event){
    multiple_drp_fun("filter_machine_val_docr","filter_machine_val_docr","machine_text_docr","Machines",this);
});
$(document).on('click','.inbox_category_docr',function(event){
    multiple_drp_fun("inbox_category_docr","filter_category_val_docr","category_text_docr","Categories",this);
});

$(document).on('click','.filter_category_val_docr',function(event){
    multiple_drp_fun("filter_category_val_docr","filter_category_val_docr","category_text_docr","Categories",this);
});

// Downtime Duration by Reasons
$(document).on('click','.inbox_reason_ddr',function(event){
    multiple_drp_fun("inbox_reason_ddr","filter_reason_val_ddr","reason_text_ddr","Reasons",this);
});

$(document).on('click','.filter_reason_val_ddr',function(event){
    multiple_drp_fun("filter_reason_val_ddr","filter_reason_val_ddr","reason_text_ddr","Reasons",this);
});
$(document).on('click','.inbox_machine_ddr',function(event){
    multiple_drp_fun("inbox_machine_ddr","filter_machine_val_ddr","machine_text_ddr","Machines",this);
});

$(document).on('click','.filter_machine_val_ddr',function(event){
    multiple_drp_fun("filter_machine_val_ddr","filter_machine_val_ddr","machine_text_ddr","Machines",this);
});
$(document).on('click','.inbox_category_ddr',function(event){
    multiple_drp_fun("inbox_category_ddr","filter_category_val_ddr","category_text_ddr","Categories",this);
});

$(document).on('click','.filter_category_val_ddr',function(event){
    multiple_drp_fun("filter_category_val_ddr","filter_category_val_ddr","category_text_ddr","Categories",this);
});

// Downtime Opportunity Cost by Machines
$(document).on('click','.inbox_reason_docm',function(event){
    multiple_drp_fun("inbox_reason_docm","filter_reason_val_docm","reason_text_docm","Reasons",this);
});

$(document).on('click','.filter_reason_val_docm',function(event){
    multiple_drp_fun("filter_reason_val_docm","filter_reason_val_docm","reason_text_docm","Reasons",this);
});
$(document).on('click','.inbox_machine_docm',function(event){
    multiple_drp_fun("inbox_machine_docm","filter_machine_val_docm","machine_text_docm","Machines",this);
});

$(document).on('click','.filter_machine_val_docm',function(event){
    multiple_drp_fun("filter_machine_val_docm","filter_machine_val_docm","machine_text_docm","Machines",this);
});
$(document).on('click','.inbox_category_docm',function(event){
    multiple_drp_fun("inbox_category_docm","filter_category_val_docm","category_text_docm","Categories",this);
});

$(document).on('click','.filter_category_val_docm',function(event){
    multiple_drp_fun("filter_category_val_docm","filter_category_val_docm","category_text_docm","Categories",this);
});

// Downtime Duration by Machines With Reasons
$(document).on('click','.inbox_reason_ddmr',function(event){
    multiple_drp_fun("inbox_reason_ddmr","filter_reason_val_ddmr","reason_text_ddmr","Reasons",this);
});

$(document).on('click','.filter_reason_val_ddmr',function(event){
    multiple_drp_fun("filter_reason_val_ddmr","filter_reason_val_ddmr","reason_text_ddmr","Reasons",this);
});
$(document).on('click','.inbox_machine_ddmr',function(event){
    multiple_drp_fun("inbox_machine_ddmr","filter_machine_val_ddmr","machine_text_ddmr","Machines",this);
});

$(document).on('click','.filter_machine_val_ddmr',function(event){
    multiple_drp_fun("filter_machine_val_ddmr","filter_machine_val_ddmr","machine_text_ddmr","Machines",this);
});
$(document).on('click','.inbox_category_ddmr',function(event){
    multiple_drp_fun("inbox_category_ddmr","filter_category_val_ddmr","category_text_ddmr","Categories",this);
});

$(document).on('click','.filter_category_val_ddmr',function(event){
    multiple_drp_fun("filter_category_val_ddmr","filter_category_val_ddmr","category_text_ddmr","Categories",this);
});


// Table View
$(document).on('click','.inbox_reason_down',function(event){
    multiple_drp_fun("inbox_reason_down","filter_reason_val_down","reason_text_down","Reasons",this);
});

$(document).on('click','.filter_reason_val_down',function(event){
    multiple_drp_fun("filter_reason_val_down","filter_reason_val_down","reason_text_down","Reasons",this);
});
$(document).on('click','.inbox_machine_down',function(event){
    multiple_drp_fun("inbox_machine_down","filter_machine_val_down","machine_text_down","Machines",this);
});

$(document).on('click','.filter_machine_val_down',function(event){
    multiple_drp_fun("filter_machine_val_down","filter_machine_val_down","machine_text_down","Machines",this);
});
$(document).on('click','.inbox_category_down',function(event){
    multiple_drp_fun("inbox_category_down","filter_category_val_down","category_text_down","Categories",this);
});

$(document).on('click','.filter_category_val_down',function(event){
    multiple_drp_fun("filter_category_val_down","filter_category_val_down","category_text_down","Categories",this);
});
$(document).on('click','.inbox_part_down',function(event){
    multiple_drp_fun("inbox_part_down","filter_part_val_down","part_text_down","Parts",this);
});

$(document).on('click','.filter_part_val_down',function(event){
    multiple_drp_fun("filter_part_val_down","filter_part_val_down","part_text_down","Parts",this);
});

$(document).on('click','.inbox_user_down',function(event){
    multiple_drp_fun("inbox_user_down","filter_user_val_down","user_text_down","Users",this);
});

$(document).on('click','.filter_user_val_down',function(event){
    multiple_drp_fun("filter_user_val_down","filter_user_val_down","user_text_down","Users",this);
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
