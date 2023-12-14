
// Global variable 
const hide_seek_obj = {
    // OEE Trend
    dd_trend_machine:false,
    dd_moeeb_machine:false,
    dd_mawr_machine:false,
    dd_mpwp_machine:false,
    dd_mqwr_machine:false,

    dd_mawr_reason:false,
    dd_mqwr_reason:false,

    dd_mpwp_part:false,

    dd_mawr_category:false,

    dd_moeeb_dataField:false,

    

}

// graph fitler onclick function its show options common function
function multiple_drp_hide_seek(classRef,keyRef){
  $('.filter_checkboxes').css("display","none");
  if (!hide_seek_obj[keyRef]) {
    $('.'+classRef+'').css("display","block");
    hide_seek_obj[keyRef] = true;
  }
  else{
    $('.'+classRef+'').css("display","none");
    hide_seek_obj[keyRef] = false;
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


$(document).on('click','.inbox_machine_dd_trend',function(event){
    multiple_drp_fun("inbox_machine_dd_trend","filter_machine_dd_trend_val","machine_text_dd_trend","Machines",this);
});

$(document).on('click','.filter_machine_dd_trend_val',function(event){
    multiple_drp_fun("filter_machine_dd_trend_val","filter_machine_dd_trend_val","machine_text_dd_trend","Machines",this);
});


$(document).on('click','.inbox_machine_dd_moeeb',function(event){
    multiple_drp_fun("inbox_machine_dd_moeeb","filter_machine_dd_moeeb_val","machine_text_dd_moeeb","Machines",this);
});

$(document).on('click','.filter_machine_dd_moeeb_val',function(event){
    multiple_drp_fun("filter_machine_dd_moeeb_val","filter_machine_dd_moeeb_val","machine_text_dd_moeeb","Machines",this);
});
$(document).on('click','.inbox_dataField_dd_moeeb',function(event){
    multiple_drp_fun("inbox_dataField_dd_moeeb","filter_dataField_dd_moeeb_val","dataField_text_dd_moeeb","Data Fields",this);
});

$(document).on('click','.filter_dataField_dd_moeeb_val',function(event){
    multiple_drp_fun("filter_dataField_dd_moeeb_val","filter_dataField_dd_moeeb_val","dataField_text_dd_moeeb","Data Fields",this);
});

$(document).on('click','.inbox_machine_dd_mawr',function(event){
    multiple_drp_fun("inbox_machine_dd_mawr","filter_machine_dd_mawr_val","machine_text_dd_mawr","Machines",this);
});

$(document).on('click','.filter_machine_dd_mawr_val',function(event){
    multiple_drp_fun("filter_machine_dd_mawr_val","filter_machine_dd_mawr_val","machine_text_dd_mawr","Machines",this);
});
$(document).on('click','.inbox_reason_dd_mawr',function(event){
    multiple_drp_fun("inbox_reason_dd_mawr","filter_reason_dd_mawr_val","reason_text_dd_mawr","Reasons",this);
});

$(document).on('click','.filter_reason_dd_mawr_val',function(event){
    multiple_drp_fun("filter_reason_dd_mawr_val","filter_reason_dd_mawr_val","reason_text_dd_mawr","Reasons",this);
});
$(document).on('click','.inbox_category_dd_mawr',function(event){
    multiple_drp_fun("inbox_category_dd_mawr","filter_category_dd_mawr_val","category_text_dd_mawr","Categories",this);
});

$(document).on('click','.filter_category_dd_mawr_val',function(event){
    multiple_drp_fun("filter_category_dd_mawr_val","filter_category_dd_mawr_val","category_text_dd_mawr","Categories",this);
});


$(document).on('click','.inbox_machine_dd_mpwp',function(event){
    multiple_drp_fun("inbox_machine_dd_mpwp","filter_machine_dd_mpwp_val","machine_text_dd_mpwp","Machines",this);
});

$(document).on('click','.filter_machine_dd_mpwp_val',function(event){
    multiple_drp_fun("filter_machine_dd_mpwp_val","filter_machine_dd_mpwp_val","machine_text_dd_mpwp","Machines",this);
});
$(document).on('click','.inbox_part_dd_mpwp',function(event){
    multiple_drp_fun("inbox_part_dd_mpwp","filter_part_dd_mpwp_val","part_text_dd_mpwp","Parts",this);
});

$(document).on('click','.filter_part_dd_mpwp_val',function(event){
    multiple_drp_fun("filter_part_dd_mpwp_val","filter_part_dd_mpwp_val","part_text_dd_mpwp","Parts",this);
});



$(document).on('click','.inbox_machine_dd_mqwr',function(event){
    multiple_drp_fun("inbox_machine_dd_mqwr","filter_machine_dd_mqwr_val","machine_text_dd_mqwr","Machines",this);
});

$(document).on('click','.filter_machine_dd_mqwr_val',function(event){
    multiple_drp_fun("filter_machine_dd_mqwr_val","filter_machine_dd_mqwr_val","machine_text_dd_mqwr","Machines",this);
});
$(document).on('click','.inbox_reason_dd_mqwr',function(event){
    multiple_drp_fun("inbox_reason_dd_mqwr","filter_reason_dd_mqwr_val","reason_text_dd_mqwr","Reasons",this);
});

$(document).on('click','.filter_reason_dd_mqwr_val',function(event){
    multiple_drp_fun("filter_reason_dd_mqwr_val","filter_reason_dd_mqwr_val","reason_text_dd_mqwr","Reasons",this);
});


function reset_machine_dd_trend(){
  var machine_arr = $('.filter_machine_dd_trend_val');
  jQuery('.filter_machine_dd_trend_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#machine_text_dd_trend').text('All Machines');
}
function reset_machine_dd_moeeb(){
  var machine_arr = $('.filter_machine_dd_moeeb_val');
  jQuery('.filter_machine_dd_moeeb_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#machine_text_dd_moeeb').text('All Machines');
}
function reset_machine_dd_mawr(){
  var machine_arr = $('.filter_machine_dd_mawr_val');
  jQuery('.filter_machine_dd_mawr_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#machine_text_dd_mawr').text('All Machines');
}
function reset_machine_dd_mpwp(){
  var machine_arr = $('.filter_machine_dd_mpwp_val');
  jQuery('.filter_machine_dd_mpwp_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#machine_text_dd_mpwp').text('All Machines');
}

function reset_machine_dd_mqwr(){
  var machine_arr = $('.filter_machine_dd_mqwr_val');
  jQuery('.filter_machine_dd_mqwr_val').each(function(index){
    machine_arr[index].checked=true;
  });
  $('#machine_text_dd_mqwr').text('All Machines');
}

function reset_reason_dd_mawr(){
  var reason_arr = $('.filter_reason_dd_mawr_val');
  jQuery('.filter_reason_dd_mawr_val').each(function(index){
    reason_arr[index].checked=true;
  });
  $('#reason_text_dd_mawr').text('All Reasons');
}

function reset_reason_dd_mqwr(){
  var reason_arr = $('.filter_reason_dd_mqwr_val');
  jQuery('.filter_reason_dd_mqwr_val').each(function(index){
    reason_arr[index].checked=true;
  });
  $('#reason_text_dd_mqwr').text('All Reasons');
}

function reset_part_dd_mpwp(){
  var part_arr = $('.filter_part_dd_mpwp_val');
  jQuery('.filter_part_dd_mpwp_val').each(function(index){
    part_arr[index].checked=true;
  });
  $('#part_text_dd_mpwp').text('All Parts');
}

function reset_dataField_dd_moeeb(){
  var dataField_arr = $('.filter_dataField_dd_moeeb_val');
  jQuery('.filter_dataField_dd_moeeb_val').each(function(index){
    dataField_arr[index].checked=true;
  });
  $('#dataField_text_dd_moeeb').text('All Data Fields');
}

function reset_category_dd_mawr(){
  var category_arr = $('.filter_category_dd_mawr_val');
  jQuery('.filter_category_dd_mawr_val').each(function(index){
    category_arr[index].checked=true;
  });
  $('#category_text_dd_mawr').text('All Data Fields');
}
