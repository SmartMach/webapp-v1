var positive = "*Positive values only allowed";
var numerical = "*Numerical values only";
var len = "*Invalid length";
var required = "*Required field";
var success="";
var greaterZero="*Should be greater than 0";

function inputAlertName(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		$('#add_alert_name').val(val);
		$('#edit_alert_name').val(val);
        // console.log('add_alert_name');
		return required;
       
	}else{
		return success;
	}
	
}



function inputAlertRateHour(data){
	var val = data;
	val = val.trim();
	if (!val) {
	//	$(".add_alert_btn").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;
		if (parseInt(val) > 0) {			
			if (num.test(val)) {
				//$(".add_alert_btn").removeAttr("disabled");
				// $("#edit_alert_val").val(parseFloat($("#edit_alert_val").val()).toFixed(2));
				$("#add_alert_past_hour").val(parseInt($("#add_alert_past_hour").val()));
				return success;
			
			}
			else{
			//	$(".add_alert_btn").attr("disabled", true);
				return numerical;
			}
		}else if(parseInt(val) < 0){
			//$(".add_alert_btn").attr("disabled", true);
				return positive;
		}
		else if (val ==0) {
			//$(".add_alert_btn").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				//$(".add_alert_btn").removeAttr("disabled");
				$("#add_alert_past_hour").val(parseInt($("#add_alert_past_hour").val()));
				return success;
			}
			else{
				//$(".add_alert_btn").attr("disabled", true);
				return numerical;
			}
		}
		
	}
}


function inputAlertValue(data){
	// console.log('new');
	var val = data;
	// val = val.trim();
	if (val==="" || val===null) {
		//$(".add_alert_btn").attr("disabled", true);
		// $('#add_alert_val').val(val);
		// $('#edit_alert_val').val(val);
		return required;
	}
	else{
		
		return success;
		
	}
}

function inputAlertmetrics(data){
	var val = data;
	//val = val.trim();
	if (val==="" || val===null) {
		//$('#add_alert_metrics').val(val);
		// var location = document.getElementById('add_alert_metrics').value;
		//loc = document.getElementById('edit_alert_metrics');
		//var  metrics_new= metrics.value == "Choose Metrics";
    	// var invalid = location.value;
    	//var invalid = loc.value == "Choose Metrics";
		
		// if (location) {
			
			return required;
		// }
		// else {
		// 	return sccuess;
		// }
		
	}
	else{
		//$(".add_alert_btn").attr("disabled", true);
		return success;
		
	}
}

function inputAlertrelation(data){
	var val = data;
	//val = val.trim();
	if (val===""||val===null) {
		//$('#add_alert_metrics').val(val);
		// var location = document.getElementById('add_alert_relation');
    	// var invalid = location.value == "Choose Relation";
 
		// if (invalid) {
			
			return required;
		// }
		// else {
			
		// }
		
	}
	else{
		//$(".add_alert_btn").attr("disabled", true);
			return success;
		
	}
}

function inputAlertworktype(data){
	var val = data;
	//val = val.trim();
	if (val==="" || val===null) {
		// var location = document.getElementById('add_alert_work_type');
	 	// co = document.getElementById('edit_alert_work_type');
    	// var invalid = location.value == "Choose Work Type";
		// invalid = co.value == "Choose Work Type";
		// if (invalid) {	
			return required;
		// }
		// else {		
		// }	
	}
	else{
		//$(".add_alert_btn").attr("disabled", true);
			return success;
		
	}
}

function inputAlertworktitle(data){
	var val = data;
	val = val;
	if (!val) {
	//	$(".add_alert_btn").attr("disabled", true);
		// $('#add_alert_val').val(val);
		// $('#edit_alert_work_title').val(val)
		return required;
	}
	else{
			return success;
	}
}

function inputAlertdue_days(data){
	var val = data;
	//val = val;
	if (!val) {
	//	$(".add_alert_btn").attr("disabled", true);
		// $('#add_alert_deu_days').val(val);
		// $('#edit_alert_deu_days').val(val);
		return required;
	}
	else{
		return success;
	}
	
}

function inputAlertlabel(data){
	var val = data;
	// val = val;
	// if (val<=0) {
		
		// if($(".parent_div_input_check_label li").length == 0)
		if(parseInt(val)<=0)
		{				
			// console.log('for label check');
			return required;
		}else{
			// console.log('cccccccccc');
			return success;
		}
		
	// }
	// else{
	// 		return success;
	// }
}

function inputAlertto(data){
	var val = data;
	// val = val.trim();
	// if (!val) {
		if(parseInt(val)<=0)
		{				
			// console.log('for to check');
			return required;
		}else{
			// console.log('cccccccccc');
			return success;
		}
	// }
	// else{
	// 	return success;
	// }
}

function inputAlertcc(data){
	var val = data;
	// val = val.trim();
	// if (!val) {
		if(parseInt(val)<=0)
		{	
			
			// console.log('for cc check');
			return required;
		}else{
			// console.log('cccccccccc');
			return success;
		}
	// }
	// else{
	// 		return success;
	// }
}


function inputAlert_mail_sub(data){
	var val = data;
	val = val;
	if (!val) {
	//	$(".add_alert_btn").attr("disabled", true);
		$('#add_alert_mail_subject').val(val);
		$('#edit_alert_mail_subject').val(val);
		return required;
	}
	else{
			return success;
	}
}

function inputAlert_email_note(data){
	var val = data;
	val = val;
	if (!val) {
	//	$(".add_alert_btn").attr("disabled", true);
		$('#add_alert_mail_notes').val(val);
		$('#edit_alert_mail_notes').val(val);

		return required;
	}
	else{
			return success;
	}
}

function input_work_check(data){
	
	if (!$('#work_check_toggle:checked').length && !$('#email_check_toggle:checked').length) {
			// console.log('unchecked');
	 $(".add_alert_btn").attr("disabled", true);
			return required;
		}
	else{
		$(".add_alert_btn").removeAttr("disabled");
			return success;
	}
}

function input_work_edit_check(data){
	if (!$('#work_edit_check_toggle:checked').length && !$('#edit_email_check_toggle:checked').length) {
		// console.log('unchecked');
 	$(".edit_alert_btn_submit").attr("disabled", true);	
		return required;
	}
else{
	$(".edit_alert_btn_submit").removeAttr("disabled");
		return success;
}
}

function input_work_check_new(data){

	if (!$('#work_check_toggle:checked').length && !$('#email_check_toggle:checked').length) {
		// console.log('unchecked');
$(".add_alert_btn").attr("disabled", true);

		return required;
	}

else{
		//return success;
}
}

$('.input-box').on('change',function(){
	// console.log('nnnnnn');
	var x =input_work_check_new($(".input-box").val());
	
	$("#input_toggle_Err").html(x);
});

$('.form-control').on('change',function(){
// console.log('form_control');
var x=input_work_check_new($(".form-control").val());
$("#input_toggle_Err").html(x);
});

$('#work_check_toggle').on('change',function(){
    var x =input_work_check($("#work_check_toggle").val());
	$('#add_alert_work_type').val('');
	$('#add_alert_work_title').val('');
	$('#input_check_label_alert').val('');
	$('.label_input_tags_txt').remove();
	$('#add_alert_assignee').val('');
	$('#assignee_val').text('Unassigned');
	$('#assignee_val').attr('data-assignee-val','Unassigned');
	$('#add_alert_deu_days').val('');
	$('#inputAlertworktypeErr').html('');
	$('#inputAlertworktitleErr').html('');
	$('#inputlabelErr').html('');
	$('#inputAlertdeudaysErr').html('');
   $("#input_toggle_Err").html(x);
   $(".selectBtn3").html('<div class="option3" data-type="firstOption" onclick="icon_drop(this)" ><i class="fas fa-angle-double-down" style="font: size 18px; width:18px; color: #2196F3; margin-top: 5px;"></i>&nbsp;Low</div>');


});

$('#email_check_toggle').on('change',function(){
    var x =input_work_check($("#email_check_toggle").val());
	$('.to_email_txt_tags_arr').remove();
	$('.cc_email_txt_arr').remove();
	$('#input_check_to').val('');
	$('#input_check_cc').val('');
	$('#add_alert_mail_subject').val('');
	$('#add_alert_mail_notes').val('');	
	$('#input_check_to_Err').html('');
	// $('#input_check_cc_Err').html('');
	$('#input_email_sub_Err').html('');
	$('#input_email_note_Err').html('');
   $("#input_toggle_Err").html(x);
});

$('#add_alert_name').on('blur',function(){
    var x =inputAlertName($("#add_alert_name").val());
	//console.log(x);
   $("#inputAlertNameErr").html(x);
});


$('#add_alert_past_hour').on('blur',function(){
	var x =inputAlertRateHour($("#add_alert_past_hour").val());
	$("#inputAlertpastHourErr").html(x);
});

$('#add_alert_val').on('blur',function(){
	var x =inputAlertValue($("#add_alert_val").val());
	$("#inputAlertValueErr").html(x);
});

$('#add_alert_metrics').on('click',function(){
	var x = inputAlertmetrics($("#add_alert_metrics").val());
	$('#inputAlertmetricsErr').html(x);
});

$('#add_alert_relation').on('click',function(){
	var x = inputAlertrelation($("#add_alert_relation").val());
	$('#inputAlertrelationsErr').html(x);
});

$("#work_check_toggle").on('change', function() {
	
	if ($(this).is(':checked')) {
	  $(this).attr('value', 'true');
	  $('#add_alert_work_type').on('click',function(){
		var x = inputAlertworktype($("#add_alert_work_type").val());
		$('#inputAlertworktypeErr').html(x);
	});
	} else {
	
	  $(this).attr('value', 'false');
	}
	$('#checkbox-value').text($('#checkbox1').val());
  });

$("#add_alert_work_title").on('blur',function(){
	var x =inputAlertworktitle($("#add_alert_work_title").val());
	$("#inputAlertworktitleErr").html(x);
});

$("#add_alert_deu_days").on('blur',function(){
	var x =inputAlertdue_days($("#add_alert_deu_days").val());
	$("#inputAlertdeudaysErr").html(x);
});

$("#input_check_label").on('blur',function(){
	var add_alert_leng = $('.parent_div_input_check_label li').length;
	var x = inputAlertlabel(add_alert_leng);
	$("#inputlabelErr").html(x);
});

$("#input_check_to").on('blur',function(){
	var add_to_leng = $('.parent_div_input_check li').length;
	var x = inputAlertto(add_to_leng);
	$("#input_check_to_Err").html(x);
});

// its temporary hide for madhan sir instruction
// $("#input_check_cc").on('blur',function(){
// 	var length_cc = $('.parent_div_input_check_cc li').length;
// 	var x = inputAlertcc(length_cc);
// 	$("#input_check_cc_Err").html(x);
// });

$("#add_alert_mail_subject").on('blur',function(){
	var x = inputAlert_mail_sub($("#add_alert_mail_subject").val());
	$("#input_email_sub_Err").html(x);
});

$("#add_alert_mail_notes").on('blur',function(){
	var x = inputAlert_email_note($("#add_alert_mail_notes").val());
	$("#input_email_note_Err").html(x);
});

// on focus function

$('#add_alert_name').focus('type',function(){
	//$('.add_alert_btn').removeAttr("disabled");
});

$('#add_alert_past_hour').focus('type',function(){
	//$('.add_alert_btn').removeAttr("disabled");
});

$('#add_alert_val').focus(function(){
	//$('.add_alert_btn').removeAttr("disabled");
});

// $(document).on('click','#add_machine_button',function(event){
// 	event.preventDefault();
// 	var data = "addalert";
// 	error_show_remove(data);

// 	// add alert is click clear the exisiting fill records
// 	$('#add_alert_name').val('');
// 	$('#add_alert_metrics').val('');
// 	$('#add_alert_relation').val('');
// 	$('#add_alert_val').val('');
// 	$('#add_alert_past_hour').val('');
// 	$('#add_alert_work_type').val('');
// 	$('#add_alert_work_title').val('');
// 	$('#input_check_label_alert').val('');
// 	$('#add_alert_assignee').val('Unassigned');
// 	$('#add_alert_deu_days').val('');
// 	$('#input_check_to').val('');
// 	$('#input_check_cc').val('');
// 	$('#add_alert_mail_subject').val('');
// 	$('#add_alert_mail_notes').val('');
// 	$('#work_check_toggle').prop('checked',false);
// 	$('#email_check_toggle').prop('checked',false);
// 	$('.toggle_work_div').css('display','none');
// 	$('.email_div_visibility').css('display','none');
// 	var img_drp = $('#low_default').attr("data-thumbnail");
// 	// $('.btn-select').html('<li style="width:80%;"><img src="'+img_drp+'" alt="" value="low"> <span style="font-size:14px;" class="priority_txt">LOW</span></li><div style="display:flex;flex-direction:row;justify-content:center;align-items:center;width:20%;"><i class="fa-solid fa-angle-down"></i></li></div>');
// 	// $('.btn-select').attr('value', 'en');
// 	$('.Add_Machine_Data').removeAttr("disabled");
// 	$('#AddMachineModal').modal('show');

// //  Remove all the Error Messages ................

// 	function error_show_remove(data){
// 		if (data == "addalert") {
// 			$('#inputAlertNameErr').html('');
// 			$('#inputAlertmetricsErr').html('');
// 			$('#inputAlertrelationsErr').html('');
// 			$('#inputAlertValueErr').html('');
// 			$('#inputAlertpastHourErr').html('');
// 			$('#inputAlertworktypeErr').html('');
// 			$('#inputAlertworktitleErr').html('');
// 			$('#inputlabelErr').html('');
// 			$('#inputAlertdeudaysErr').html('');
// 			$('#input_check_to_Err').html('');
// 			$('#input_check_cc_Err').html('');
// 			$('#input_email_sub_Err').html('');
// 			$('#input_email_note_Err').html('');
// 			$('#input_toggle_Err').html('');
	
	
// 		}else if (data == "edit_machine") {
// 			$('#editMachineNameErr').html(' ');
// 			$('#editMachineRateHourErr').html(' ');
// 			$('#editMachineOffRateHourErr').html(' ');
// 			$('#editTonnageErr').html(' ');
// 			$('#editMachineBrandErr').html(' ');
// 			$('#editMachineSerialNumber_err').html(' ');
// 		}
// 	}
// });


// edit alert function

$('#edit_alert_name').on('blur',function(){
    var x =inputAlertName($("#edit_alert_name").val());
	//console.log(x);
   $("#inputedit_alertNameErr").html(x);
});

//edit_alert_metrics
// $('#edit_alert_metrics').on('click',function(){
// 	var x = inputAlertmetrics($("#edit_alert_metrics").val());
// 	$('#inputAlert_edit_metricsErr').html(x);
// });

//edit_alert_val
$('#edit_alert_val').on('blur',function(){
	var x =inputAlertValue($("#edit_alert_val").val());
	$("#inputAlert_edit_ValueErr").html(x);
});

// edit_alert_past_hour
$('#edit_alert_past_hour').on('blur',function(){
	var x =inputAlertRateHour($("#edit_alert_past_hour").val());
	$("#inputAlert_edit_pastHourErr").html(x);
});

$('#work_edit_check_toggle').on('change',function(){
    // var x =input_work_edit_check($("#work_edit_check_toggle").val());
	var x =input_work_edit_check($("#work_edit_check_toggle").val());
	$('#edit_alert_work_type').val('');
	$('#edit_alert_work_title').val('');
	$('#edit_input_check_label').val('');
	$('.label_input_tags_txt_edit').remove();
	$('#edit_alert_assignee').val('');
	$('#edit_alert_deu_days').val('');
	$('#inputAlert_edit_worktypeErr').html('');
	$('#inputAlert_edit_worktitleErr').html('');
	$('#inputlabel_edit_Err').html('');
	$('#inputAlert_edit_deudaysErr').html('');
   	$("#input_edit_toggle_Err").html(x);
	
//    $("#input_edit_toggle_Err").html(x);
});

$('#edit_email_check_toggle').on('change',function(){

	var x =input_work_edit_check($("#edit_email_check_toggle").val());
	$('.to_email_input_tags_txt_edit').remove();
	$('.cc_email_input_tags_txt_edit').remove();
	$('#input_check_to_edit').val('');
	$('#input_check_cc_edit').val('');
	$('#edit_alert_mail_subject').val('');
	$('#edit_alert_mail_notes').val('');
	$('#input_email_edit_sub_Err').html('');
	$('#input_email_edit_note_Err').html('');
	$('#input_check_to_edit_Err').html('');
	// $('#input_check_cc_edit_Err').html('');
   $("#input_edit_toggle_Err").html(x);

//     var x =input_work_edit_check($("#edit_email_check_toggle").val());
//    $("#input_edit_toggle_Err").html(x);
});


//edit_alert_work_title
$("#edit_alert_work_title").on('blur',function(){
	var x =inputAlertworktitle($("#edit_alert_work_title").val());
	$("#inputAlert_edit_worktitleErr").html(x);
});

$("#edit_alert_deu_days").on('blur',function(){
	var x =inputAlertdue_days($("#edit_alert_deu_days").val());
	$("#inputAlert_edit_deudaysErr").html(x);
});

$(".input_check_to_edit").on('blur',function(){
	// console.log('edit_to');
	var length_to = $('.edit_parent_div_input_check li').length;
	var x = inputAlertto(length_to);
	$("#input_check_to_edit_Err").html(x);
});

// this cc email function is temporary hide as per the madhan sir instruction

// $(".input_check_cc_edit").on('blur',function(){
// 	// console.log('edit_to');
// 	var length_cc = $('.edit_parent_div_input_check_cc li').length;
// 	var x = inputAlertcc(length_cc);
// 	$("#input_check_cc_edit_Err").html(x);
// });

$("#edit_alert_mail_subject").on('blur',function(){
	var x = inputAlert_mail_sub($("#edit_alert_mail_subject").val());
	$("#input_email_edit_sub_Err").html(x);
});

$("#edit_alert_mail_notes").on('blur',function(){
	var x = inputAlert_email_note($("#edit_alert_mail_notes").val());
	$("#input_email_edit_note_Err").html(x);
});

$(".edit_input_check_label").on('blur',function(){
	//console.log("edit onblur label");
	var length_edit_label = $('.edit_parent_div_input_check_label li').length;
	var x = inputAlertlabel(length_edit_label);
	$("#inputlabel_edit_Err").html(x);
});

// $("#label_input_tags_txt_edit").on('click',function(){
// 	console.log('svg click');edit_input_check_label
// 	var x = inputAlertlabel($("#label_input_tags_txt_edit").val());
// 	$("#inputlabel_edit_Err").html(x);
// });

$("#work_edit_check_toggle").on('change', function() {
	
	if ($(this).is(':checked')) {
	  $(this).attr('value', 'true');
	  $('#edit_alert_work_type').on('click',function(){
		var x = inputAlertworktype($("#edit_alert_work_type").val());
		$('#inputAlert_edit_worktypeErr').html(x);
	});
	} else {
	
	  $(this).attr('value', 'false');
	}
	$('#checkbox-value').text($('#checkbox1').val());
  });