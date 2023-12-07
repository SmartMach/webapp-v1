function reset_reason_docr(){
  var part_arr = $('.filter_reason_val_docr');
  jQuery('.filter_reason_val_docr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#reason_text_docr').text('All Reasons');
}
function reset_reason_ddr(){
  var part_arr = $('.filter_reason_val_ddr');
  jQuery('.filter_reason_val_ddr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#reason_text_ddr').text('All Reasons');
}
function reset_reason_docm(){
  var part_arr = $('.filter_reason_val_docm');
  jQuery('.filter_reason_val_docm').each(function(index){
    part_arr[index].checked=true;
  });
  $('#reason_text_docm').text('All Reasons');
}
function reset_reason_ddmr(){
  var part_arr = $('.filter_reason_val_ddmr');
  jQuery('.filter_reason_val_ddmr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#reason_text_ddmr').text('All Reasons');
}
function reset_reason_down(){
  var part_arr = $('.filter_reason_val_down');
  jQuery('.filter_reason_val_down').each(function(index){
    part_arr[index].checked=true;
  });
  $('#reason_text_down').text('All Reasons');
}


function reset_machine_docr(){
  var part_arr = $('.filter_machine_val_docr');
  jQuery('.filter_machine_val_docr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#machine_text_docr').text('All Machines');
}
function reset_machine_ddr(){
  var part_arr = $('.filter_machine_val_ddr');
  jQuery('.filter_machine_val_ddr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#machine_text_ddr').text('All Machines');
}
function reset_machine_docm(){
  var part_arr = $('.filter_machine_val_docm');
  jQuery('.filter_machine_val_docm').each(function(index){
    part_arr[index].checked=true;
  });
  $('#machine_text_docm').text('All Machines');
}
function reset_machine_ddmr(){
  var part_arr = $('.filter_machine_val_ddmr');
  jQuery('.filter_machine_val_ddmr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#machine_text_ddmr').text('All Machines');
}
function reset_machine_down(){
  var part_arr = $('.filter_machine_val_down');
  jQuery('.filter_machine_val_down').each(function(index){
    part_arr[index].checked=true;
  });
  $('#machine_text_down').text('All Machines');
}



function reset_category_docr(){
  var part_arr = $('.filter_category_val_docr');
  jQuery('.filter_category_val_docr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#category_text_docr').text('All Categories');
}
function reset_category_ddr(){
  var part_arr = $('.filter_category_val_ddr');
  jQuery('.filter_category_val_ddr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#category_text_ddr').text('All Categories');
}
function reset_category_docm(){
  var part_arr = $('.filter_category_val_docm');
  jQuery('.filter_category_val_docm').each(function(index){
    part_arr[index].checked=true;
  });
  $('#category_text_docm').text('All Categories');
}
function reset_category_ddmr(){
  var part_arr = $('.filter_category_val_ddmr');
  jQuery('.filter_category_val_ddmr').each(function(index){
    part_arr[index].checked=true;
  });
  $('#category_text_ddmr').text('All Categories');
}
function reset_category_down(){
  var part_arr = $('.filter_category_val_down');
  jQuery('.filter_category_val_down').each(function(index){
    part_arr[index].checked=true;
  });
  $('#category_text_down').text('All Categories');
}


function reset_part_down(){
  var part_arr = $('.filter_part_val_down');
  jQuery('.filter_part_val_down').each(function(index){
    part_arr[index].checked=true;
  });
  $('#part_text_down').text('All Parts');
}
function reset_user_down(){
  var part_arr = $('.filter_user_val_down');
  jQuery('.filter_user_val_down').each(function(index){
    part_arr[index].checked=true;
  });
  $('#user_text_down').text('All Users');
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















