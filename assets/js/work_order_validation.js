var positive = "*Positive values only allowed";
var numerical = "*Numerical values only";
var len = "*Invalid length";
var required = "*Required field";
var success="";
var greaterZero="*Should be greater than 0";

// for work title

$('#add_work_title').on('blur',function(){
    var x =inputAlertName($("#add_work_title").val());
   $("#inputwork_title_Err").html(x);
});

//  for title length check
$('#add_work_title').on('keypress', function(key) {
	var val = $("#add_work_title").val();
	val = val.trim();
 //    if(val.length>50) {
 //    	$('#add_work_title').val(val);
	// 	return false;
	// }
});

// Charecter Count
// var text_max = 50;
// $('#addworktitleCunt').html('0 / ' + text_max);
// $('#add_work_title').keyup(function() {
// 	val_data = $('#add_work_title').val();
// 	val_data = val_data.trimStart().trimEnd();
//   	var text_length = val_data.length;
//   	if (text_length <= 50) {
// 	 	var text_remaining = text_length;
// 	 	// 	$('#inputMachineName').val($('#inputMachineName').val().trimStart().trimEnd());
// 	 	$('#addworktitleCunt').html(text_remaining + ' / ' + text_max);
// 	}
// 	else{
// 		$('#add_work_title').val($('#add_work_title').val().substring(0,50));
// 		var text_remaining = ($('#add_work_title').val().trimStart().trimEnd()).length;
// 	 	$('#addworktitleCunt').html(text_remaining + ' / ' + text_max);
// 	}
// });

function inputAlertName(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		$('#add_work_title').val(val);
		$('#edit_alert_name').val(val);
		return required;
       
	}else{
        val = val.trim();
		// val = val.toLowerCase();
		// if (val.length > 50) {
			
		// 	return "*Length should less than 50";
		// }
		// else if (val.length<=50) {
			
		// 	val = val.trimStart().trimEnd();
		// 	$('#add_work_title').val(val);
			
		// 	return success;
		// }
		// else{
			
		// 	return "Invalid*";
		// }
		val = val.trimStart().trimEnd();
		$('#add_work_title').val(val);
		return success;
	}
	
}


// for add_work_description 
// $('#add_work_description').on('blur',function(){
//     var x =inputdescription($("#add_work_description").val());
// 	//console.log(x);
//    $("#input_description_Err").html(x);
// });

function inputdescription(data){
	var val = data;
	//val = val.trim();
	if (!val) {
		
		$('#add_work_description').val(val);
		$('#edit_alert_name').val(val);
        console.log('add_work_description');
		return required;
       
	}else{
        if (val.length > 200) {
			
			return "*Length should less than 200";
		}
		else if (val.length<=200) {
			
			val = val.trimStart().trimEnd();
			$('#add_work_title').val(val);
			
			return success;
		}
		else{
			
			return "Invalid*";
		}
		return success;
	}
	
}

// for input-field-action
// $("#add_filed_action").on('blur',function(){
//     console.log('action fieldd');
// 	var action_field = $('.items-container-action .item-cause').length;
// 	var x = inputaction(action_field);
// 	$("#input_action_Err").html(x);
// });

//  for add_filed_action length count 
$('#add_filed_action').on('keypress', function(key) {
	var val = $("#add_filed_action").val();
	val = val.trim();
    if(val.length>50) {
    	$('#add_filed_action').val(val);
		return false;
	}
});
//  for action taken count 
// var text_max = 50;
// $('#actiontakenCunt').html('0 / ' + text_max);
// $('#add_filed_action').keyup(function() {
// 	val_data = $('#add_filed_action').val();
// 	val_data = val_data.trimStart().trimEnd();
//   	var text_length = val_data.length;
//   	if (text_length <= 50) {
// 	 	var text_remaining = text_length;
// 	 	// 	$('#inputMachineName').val($('#inputMachineName').val().trimStart().trimEnd());
// 	 	$('#actiontakenCunt').html(text_remaining + ' / ' + text_max);
// 	}
// 	else{
// 		$('#add_filed_action').val($('#add_filed_action').val().substring(0,50));
// 		var text_remaining = ($('#add_filed_action').val().trimStart().trimEnd()).length;
// 	 	$('#actiontakenCunt').html(text_remaining + ' / ' + text_max);
// 	}
// });

// $(".input-field-action-add").on('click',function(){
//     console.log('plus icon click');
// 	var action_field = $('.items-container-action .item-cause').length;
// 	var x = inputaction(action_field);
// 	$("#input_action_Err").html(x);
// });
function inputaction(data){
	var val = data;
	if (!val) {
		
		$('#add_filed_action').val(val);
		$('#edit_alert_name').val(val);
        console.log('add_filed_action');
		return required;
       
	}else{
		if (!val) {
			
			console.log('add_filed_action');
			return required;
		   
		}else{
			return success;
			
		}	
	}
	
}

// for add_input_comment 
// $('#add_input_comment').on('blur',function(){
//     console.log('add_input_comment');
//     var x =input_field_comment($("add_input_comment").val());
// 	//console.log(x);
//    $("#input_comment_Err").html(x);
// });

// function input_field_comment(data){
// 	var val = data;
// 	if (!val) {
		
// 		$('#add_input_comment').val(val);
// 		$('#edit_alert_name').val(val);
//         console.log('add_input_comment');
// 		return required;
       
// 	}else{
// 		return success;
// 	}
	
// }

//for priority check
// $('.priority').on('click',function(){
//     console.log('nnnn');
//     y = $("#priority_val_lable").text();
//     var x = input_priority($("#priority_val_lable").text());
//     console.log(y);
//     $('#inputpriorityErr').html(x);
// });

$('.inbox_priority').on('click',function(){
    console.log('priority on click');
    $('#inputpriorityErr').html("");
})
function input_priority(data){
    console.log('for pro');
	var val = data;
	
	if (val==="Select") {
			
			return required;
	
	}
	else{
		
			return success;
		
	}
}

    //  for input_field_label
// $("#input_field_label").on('blur',function(){
// 	var action_field = $('.lable-div-add .lable-bg').length;
// 	var x = inputlabel(action_field);
// 	$("#label_action_Err").html(x);
// });

$('#dropdown-list-lables').on('click',function(){
	$("#label_action_Err").html("");
    //$("#label_action_Err").html("");
});
function inputlabel(data){
	var val = data;
	// val = val.trim();
	if (!val) {
		
		$('#add_filed_action').val(val);
		$('#edit_alert_name').val(val);
        console.log('add_filed_action');
		return required;
       
	}else{
		return success;
	}
	
}

//  for status

// $('.status').on('click',function(){
//     console.log('staus');
   
//     y = $("#status_val_lable").text();
//     var x = input_status($("#status_val_lable").text());
//     console.log(y);
//     $('#inputstatusErr').html(x);  
// });

$('.inbox_status').on('click',function(){
    $('#inputstatusErr').html("");
});
function input_status(data){
	var val = data;
	
	if (val==="Select") {
			return required;
	}
	else{
			return success;
	}
}

//for assignee check
// $('.assignee').on('click',function(){
//     console.log('assignee');
//     y = $("#assignee_val").text();
//     var x = input_assignee($("#assignee_val").text());
//     console.log(y);
//     $('#inputassignErr').html(x);
// });

$('.inbox_assignee').on('click',function(){
    $('#inputassignErr').html("");
});
function input_assignee(data){
	var val = data;
	if (val==="Select") {		
			return required;
	}
	else{	
			return success;	
	}
}

//  for date picker 
$('#add_due_date').on('change',function(){
    y = $("#add_due_date").val();
    var x = input_date($("#add_due_date").val());
    $('#inputdateErr').html(x);
});
function input_date(data){
	var val = data;
    if(val == '')
    {	
    	return required;
	}
	else{	
		return success;	
	}
}

// for type check
$('#type-add').on('change',function(){
    var typ = $('#type-add').val();
    console.log(typ);
    if(typ == 'issue'){
        var x =work_type($('.items-container-cause .item-cause').length);
        console.log(x);
        $('#inputtypeErr').html(x);
    }
});

$('#add_cause').on('blur',function(){
    var x =work_type($('.items-container-cause .item-cause').length);
    $('#inputtypeErr').html(x);
});

$('#dropdown-list-cause').on('click',function(){
    // var x =work_type($('.items-container-cause .item-cause').length);
    // console.log('suggesss');
    $('#inputtypeErr').html("");
});
function work_type(data){
	
	var val = data;
	if (!val) {
        console.log('work cause');
		return required;
	}else{
        if (val.length > 200) {	
			return "*Length should less than 200";
		}
		else{
			return success;
		}
		return success;
	}
}


// for edit edit_work_title
$('#edit_work_title').on('blur',function(){
    var x =inputAlertName($("#edit_work_title").val());
   $("#edit_work_title_Err").html(x);
});


//  for title length check
$('#edit_work_title').on('keypress', function(key) {
	var val = $("#edit_work_title").val();
	val = val.trim();
 //    if(val.length>50) {
 //    	$('#edit_work_title').val(val);
	// 	return false;
	// }
});

// // Charecter Count
// var text_max = 50;
// $('#edit_work_title_cout').html('0 / ' + text_max);
// $('#edit_work_title').keyup(function() {
// 	val_data = $('#edit_work_title').val();
// 	val_data = val_data.trimStart().trimEnd();
//   	var text_length = val_data.length;
//   	if (text_length <= 50) {
// 	 	var text_remaining = text_length;
// 	 	// 	$('#inputMachineName').val($('#inputMachineName').val().trimStart().trimEnd());
// 	 	$('#edit_work_title_cout').html(text_remaining + ' / ' + text_max);
// 	}
// 	else{
// 		$('#edit_work_title').val($('#edit_work_title').val().substring(0,50));
// 		var text_remaining = ($('#edit_work_title').val().trimStart().trimEnd()).length;
// 	 	$('#edit_work_title_cout').html(text_remaining + ' / ' + text_max);
// 	}
// });


//for edit_work_description
// $('#edit_work_description').on('blur',function(){
//     var x =inputdescription($("#edit_work_description").val());
// 	console.log('edit_work_description');
//    $("#edit_description_Err").html(x);
// });

// for edit_cause
$('#type-edit').on('change',function(){
    var typ = $('#type-edit').val();
    console.log(typ);
    if(typ == 'issue'){
        var x =work_type($('.items-container-edit-cause .item-cause').length);
        console.log(x);
        $('#edittypeErr').html(x);
    }
});

$('#edit_cause').on('blur',function(){
    var x =work_type($('.items-container-edit-cause .item-cause').length);
    console.log('causes');
    $('#edittypeErr').html(x);
});

$('#dropdown-list-cause-edit').on('click',function(){
    // var x =work_type($('.items-container-cause .item-cause').length);
    // console.log('suggesss');
    $('#edittypeErr').html("");
});

// for edit_action
// $("#edit_field_action").on('blur',function(){
// 	var action_field = $('.items-container-edit-action .item-cause').length;
// 	var x = inputaction(action_field);
// 	$("#edit_action_Err").html(x);
// });

//  for add_filed_action length count 
$('#edit_field_action').on('keypress', function(key) {
	var val = $("#edit_field_action").val();
	val = val.trim();
 //    if(val.length>50) {
 //    	$('#edit_field_action').val(val);
	// 	return false;
	// }
});
// //  for action taken count 
// var text_max = 50;
// $('#editactiontakenCunt').html('0 / ' + text_max);
// $('#edit_field_action').keyup(function() {
// 	val_data = $('#edit_field_action').val();
// 	val_data = val_data.trimStart().trimEnd();
//   	var text_length = val_data.length;
//   	if (text_length <= 50) {
// 	 	var text_remaining = text_length;
// 	 	// 	$('#inputMachineName').val($('#inputMachineName').val().trimStart().trimEnd());
// 	 	$('#editactiontakenCunt').html(text_remaining + ' / ' + text_max);
// 	}
// 	else{
// 		$('#edit_field_action').val($('#edit_field_action').val().substring(0,50));
// 		var text_remaining = ($('#edit_field_action').val().trimStart().trimEnd()).length;
// 	 	$('#editactiontakenCunt').html(text_remaining + ' / ' + text_max);
// 	}
// });

// $(".input-field-action-edit-add").on('click',function(){
// 	var action_field = $('.items-container-edit-action .item-cause').length;
// 	var x = inputaction(action_field);
// 	$("#edit_action_Err").html(x);
// });

// for input-field-lable-edit
// $("#input-field-lable-edit").on('blur',function(){
// 	var action_field = $('.lable-div-edit .lable-bg').length;
// 	var x = inputlabel(action_field);
// 	$("#label_edit_Err").html(x);
// });

$('#dropdown-list-lables-edit').on('click',function(){
	$("#label_edit_Err").html("");
    //$("#label_action_Err").html("");
});
// $('.lable-div-edit .lable-bg .item-remove').on('click',function(){
//     console.log('cross click');
//     var action_field = $('.lable-div-edit .lable-bg').length;
// 	var x = inputlabel(action_field);
// 	$("#label_edit_Err").html(x);
// });


// for edit-work-order on click
$('.edit-work-order').on('click',function(){
    $("#edit_work_title_Err").html("");
    $("#edit_description_Err").html("");
    $('#edittypeErr').html("");
    $('#label_edit_Err').html("");
	$('#edit_action_Err').html("");
});