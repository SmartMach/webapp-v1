var positive = "*Positive values only allowed";
var numerical = "*Numerical values only";
var len = "*Invalid length";
var required = "*Required field";
var success="";
var greaterZero="*Should be greater than 0"
var less="*Should be less than 100";
var decimal ="*Decimal places not allowed";
var alpha = "*Alphanumeric only";

function EOTEEP(){
	var val = $("#EOTEEP").val();
	var val_ooe = $("#EOOOE").val();
	var val_oee = $("#EOOEE").val();

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/
		if (val>=100) {
			$(".Update_GFM").attr("disabled", true);
			return less;
		}
		else if (val > val_ooe || val > val_oee) {
			$(".Update_GFM").attr("disabled", true);
			return "*Should be less than others";
		}
		else if (val<100 && val>=0 && num.test(val)) {
			$(".Update_GFM").removeAttr("disabled");
			$("#EOTEEP").val(parseFloat($("#EOTEEP").val()).toFixed(1));
			return "";
		}
		else if (val<0) {
			$(".Update_GFM").attr("disabled", true);
			return positive;
		}
		
		else{
			$(".Update_GFM").attr("disabled", true);
			return numerical;
		}
	}
	
}
function EOOOE(){
	var val = $("#EOOOE").val();
	var val_teep = $("#EOTEEP").val();
	var val_oee = $("#EOOEE").val();

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/
		if (val>=100) {
			$(".Update_GFM").attr("disabled", true);
			return less;
		}
		else if (val < val_teep) {
			$(".Update_GFM").attr("disabled", true);
			return "*Should be greater than TEEP";
		}
		else if (val > val_oee) {
			$(".Update_GFM").attr("disabled", true);
			return "*Should be less than OEE";
		}
		else if (val<100 && val>=0 && num.test(val)) {
			$(".Update_GFM").removeAttr("disabled");
			$("#EOOOE").val(parseFloat($("#EOOOE").val()).toFixed(1));
			return "";
		}
		else if (val<0) {
			$(".Update_GFM").attr("disabled", true);
			return positive;
		}
		
		else{
			$(".Update_GFM").attr("disabled", true);
			return numerical;
		}
	}
}
function EOOEE(){
	var val = $("#EOOEE").val();

	var val_ooe = $("#EOOOE").val();
	var val_teep = $("#EOTEEP").val();

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/
		if (val>=100) {
			$(".Update_GFM").attr("disabled", true);
			return less;
		}
		else if (val < val_teep) {
			$(".Update_GFM").attr("disabled", true);
			return "*Should not less than TEEP";
		}
		else if (val < val_ooe) {
			$(".Update_GFM").attr("disabled", true);
			return "*Should not less than OOE";
		}
		else if (val<100 && val>=0 && num.test(val)) {
			$(".Update_GFM").removeAttr("disabled");
			$("#EOOEE").val(parseFloat($("#EOOEE").val()).toFixed(1));
			return "";
		}
		else if (val<0) {
			$(".Update_GFM").attr("disabled", true);
			return positive;
		}
		
		else{
			$(".Update_GFM").attr("disabled", true);
			return numerical;
		}
	}
}

function EAvailability(){
	var val = $("#EAvailability").val();

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/
		if (val>=100) {
			$(".Update_GFM").attr("disabled", true);
			return less;
		}
		else if (val<100 && val>=0 && num.test(val)) {
			$(".Update_GFM").removeAttr("disabled");
			$("#EAvailability").val(parseFloat($("#EAvailability").val()).toFixed(1));
			calcoee();
			return "";
		}
		else if (val<0) {
			$(".Update_GFM").attr("disabled", true);
			return positive;
		}
		// else if (val == 0){
		// 	$(".Update_GFM").attr("disabled", true);
		// 	return greaterZero;
		// }
		else{
			$(".Update_GFM").attr("disabled", true);
			return numerical;
		}
	}
}
function EPerformance(){
	var val = $("#EPerformance").val();

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/
		if (val>=100) {
			$(".Update_GFM").attr("disabled", true);
			return less;
		}
		else if (val<100 && val>=0 && num.test(val)) {
			$(".Update_GFM").removeAttr("disabled");
			$("#EPerformance").val(parseFloat($("#EPerformance").val()).toFixed(1));
			calcoee();
			return "";
		}
		else if (val<0) {
			$(".Update_GFM").attr("disabled", true);
			return positive;
		}
		// else if (val == 0){
		// 	$(".Update_GFM").attr("disabled", true);
		// 	return greaterZero;
		// }
		else{
			$(".Update_GFM").attr("disabled", true);
			return numerical;
		}
	}
}
function EQuality(){
	var val = $("#EQuality").val();

	if (!val) {
		$(".Update_GFM").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/
		if (val>=100) {
			$(".Update_GFM").attr("disabled", true);
			return less;
		}
		else if (val<100 && val>=0 && num.test(val)) {
			$(".Update_GFM").removeAttr("disabled");
			$("#EQuality").val(parseFloat($("#EQuality").val()).toFixed(1));
			calcoee();
			return "";
		}
		else if (val<0) {
			$(".Update_GFM").attr("disabled", true);
			return positive;
		}
		// else if (val == 0){
		// 	$(".Update_GFM").attr("disabled", true);
		// 	return greaterZero;
		// }
		else{
			$(".Update_GFM").attr("disabled", true);
			return numerical;
		}
	}
}
// function EOEE(){
// 	var val = $("#EOEE").val();

// 	if (!val) {
// 		$(".Update_GFM").attr("disabled", true);
// 		return required;
// 	}
// 	else{
// 		var num = /^[+-]?\d+(\.\d+)?$/
// 		if (val>=100) {
// 			$(".Update_GFM").attr("disabled", true);
// 			return less;
// 		}
// 		else if (val<100 && val>=0 && num.test(val)) {
// 			$(".Update_GFM").removeAttr("disabled");
// 			$("#EOEE").val(parseFloat($("#EOEE").val()).toFixed(1));
// 			return "";
// 		}
// 		else if (val<0) {
// 			$(".Update_GFM").attr("disabled", true);
// 			return positive;
// 		}
// 		// else if (val == 0){
// 		// 	$(".Update_GFM").attr("disabled", true);
// 		// 	return greaterZero;
// 		// }
// 		else{
// 			$(".Update_GFM").attr("disabled", true);
// 			return numerical;
// 		}
// 	}
// }

$('#EOTEEP').on('blur',function(){
    var x =EOTEEP();
   $("#EOTEEPErr").html(x);
});
$('#EOOOE').on('blur',function(){
    var x =EOOOE();
   $("#EOOOEErr").html(x);
});
$('#EOOEE').on('blur',function(){
    var x =EOOEE();
   $("#EOOEEErr").html(x);
});
$('#EAvailability').on('blur',function(){
    var x =EAvailability();
   $("#EAvailabilityErr").html(x);
});
$('#EPerformance').on('blur',function(){
    var x =EPerformance();
   $("#EPerformanceErr").html(x);
});
$('#EQuality').on('blur',function(){
    var x =EQuality();
   $("#EQualityErr").html(x);
});
// $('#EOEE').on('blur',function(){
//     var x =EOEE();
//    $("#EOEEErr").html(x);
// });



function Update_DThreshold(){
	var val = $("#Update_DThreshold").val();
	if (!val) {
		$(".Update_DT").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[0-9][0-9]*$/;
		var dec = /^[+-]?\d+(\.\d+)?$/;
		if (num.test(val)) {
			$(".Update_DT").removeAttr("disabled");
			return success;
		}
		else if (val<0) {
			$(".Update_DT").removeAttr("disabled");
			return positive;
		}
		else if(dec.test(val)){
			$(".Update_DT").removeAttr("disabled");
			return decimal;
		}
		else{
			$(".Update_DT").attr("disabled", true);
			return numerical;
		}
	}
}

$('#Update_DThreshold').on('blur',function(){
    var x =Update_DThreshold();
   $("#Update_DThresholdErr").html(x);
});



function DTName(){
	var val = $("#DTName").val();
	val =  val.trim();
	if (!val) {
		$(".submit_downtime_reason").attr("disabled", true);
		$("#DTName").val(val);
		return required;
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".submit_downtime_reason").attr("disabled", true);
			return "Invalid length*";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".submit_downtime_reason").removeAttr("disabled");
			var val_demo = $("#DTName").val();
			val_demo = val_demo.trimStart().trimEnd();
			$('#DTName').val(val_demo);
			return success;
		}
		else{
			$(".submit_downtime_reason").attr("disabled", true);
			return alpha;
		}
	}	
}

function DTCategoryErrFun(){
	var category = $('#DTRCategory').val();
	if (!category) {
		$(".submit_downtime_reason").attr("disabled", true);
		return required;
	}
	else{
		$(".submit_downtime_reason").removeAttr("disabled");
		return success;
	}
}

$('#DTName').on('blur',function(){
    var x = DTName();
   $("#DTNameErr").html(x);
});

$('#DTRCategory').on('change',function(){
    var x = DTCategoryErrFun();
   $("#DTCategoryErr").html(x);
});

// Charecter Count
var text_max1 = 50;
$('#DTNameCunt').html('0 / ' + text_max1);
$('#DTName').keyup(function() {	
	var text_max12 = 50;
	var val_data = $('#DTName').val();
	val_data = val_data.trimEnd().trimStart();
  	var text_length = val_data.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#DTNameCunt').html(text_remaining + ' / ' + text_max12);
	}
	else{
		$('#DTName').val($('#DTName').val().substring(0,50));
		var text_remaining = $('#DTName').val().length;
	 	$('#DTNameCunt').html(text_remaining + ' / ' + text_max12);
	}
});


function UDTName(){
	var val = $("#UDTName").val();
	val = val.trim();

	if (!val) {
		$(".Update_Downtime_Reason").attr("disabled", true);
		$("#UDTName").val(val);
		return required;
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".Update_Downtime_Reason").attr("disabled", true);
			return "Invalid length*";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".Update_Downtime_Reason").removeAttr("disabled");

			var val_data = $("#UDTName").val();
			val_data = val_data.trimStart().trimEnd();
			$("#UDTName").val(val_data);
			return success;
		}
		else{
			$(".Update_Downtime_Reason").attr("disabled", true);
			return alpha;
		}

	}
}

$('#UDTName').on('blur',function(){
    var x =UDTName();
   $("#UDTNameErr").html(x);
});

// Charecter Count
var text_max = 50;
$('#UDTNameCunt').html('0 / ' + text_max);
$('#UDTName').keyup(function() {
  var text_length = $('#UDTName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#UDTNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#UDTName').val($('#UDTName').val().substring(0,50));

		var text_remaining = $('#UDTName').val().length;
	 	$('#UDTNameCunt').html(text_remaining + ' / ' + text_max);
	}
});


function QReasonName(){
	var val = $("#QReasonName").val();
	val = val.trim();
	if (!val) {
		$(".submit_downtime_reason").attr("disabled", true);
		$("#QReasonName").val(val);
		return required;
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();

		if (letters.test(val) && val.length > 50) {
			$(".submit_quality_reason").attr("disabled", true);
			return "Invalid length*";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".submit_quality_reason").removeAttr("disabled");
			var val_demo = $("#QReasonName").val();
			val_demo = val_demo.trimStart().trimEnd();
			$('#QReasonName').val(val_demo);
			return success;
		}
		else{
			$(".submit_quality_reason").attr("disabled", true);
			return alpha;
		}
	}
}

$('#QReasonName').on('blur',function(){
    var x =QReasonName();
   $("#QReasonNameErr").html(x);
});

// Charecter Count
var text_max = 50;
$('#QReasonNameCunt').html('0 / ' + text_max);
$('#QReasonName').keyup(function() {
	var val_data = $('#QReasonName').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
	
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#QReasonNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#QReasonName').val($('#QReasonName').val().substring(0,50));

		var text_remaining = $('#QReasonName').val().length;
	 	$('#QReasonNameCunt').html(text_remaining + ' / ' + text_max);
	}
});



function UQReasonName(){
	var val = $("#UQReasonName").val();
	val = val.trim();
	if (!val) {
		$(".submit_downtime_reason").attr("disabled", true);
		$('#UQReasonName').val(val);
		return required;
	}
	else{
		var letters = /^[a-z][a-z0-9\s]*$/;
		val = val.trim();
		val = val.toLowerCase();
		if (letters.test(val) && val.length > 50) {
			$(".submit_qualityup_reason").attr("disabled", true);
			return "Invalid length*";
		}
		else if (letters.test(val) && val.length<=50) {
			$(".submit_qualityup_reason").removeAttr("disabled");

			var val_data = $('#UQReasonName').val();
			val_data = val_data.trimStart().trimEnd();
			$('#UQReasonName').val(val_data);
			return success;
		}
		else{
			$(".submit_qualityup_reason").attr("disabled", true);
			return alpha;
		}
	}
}

$('#UQReasonName').on('blur',function(){
    var x =UQReasonName();
   $("#UQReasonNameErr").html(x);
});

// Charecter Count
var text_max = 50;
$('#UQReasonNameCunt').html('0 / ' + text_max);
$('#UQReasonName').keyup(function() {
  var text_length = $('#UQReasonName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#UQReasonNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#UQReasonName').val($('#UQReasonName').val().substring(0,50));
		var text_remaining = $('#UQReasonName').val().length;
	 	$('#UQReasonNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

$('#targetvalue').on('blur',function(){
    var x =addTargetCurrentShift();
   $(".add_target_data").html(x);
});




function addTargetCurrentShift(){
	var val = $("#targetvalue").val();
	if (!val) {
		$(".btn_current_shift").attr("disabled", true);
		return required;
	}
	else{
		var letters = /^[0-9]*$/;
		var num = /^[+-]?\d+(\.\d+)?$/;
		if (val >= 100) {
			$(".btn_current_shift").attr("disabled", true);
			return "*Value should be less than 100";
		}
		else if (val < 0) {
			$(".btn_current_shift").attr("disabled", true);
			return positive;
		}
		else if(letters.test(val)) {
			$(".btn_current_shift").removeAttr("disabled");
			return success;
		}
		else if (num.test(val)) {
			$(".btn_current_shift").attr("disabled", true);
			return numerical;
		}
		else{
			$(".btn_current_shift").attr("disabled", true);
			return numerical;
		}
	}
}


// button interface onclick  its show modal
$(document).on('click','#add_btn_interface',function(event){
	event.preventDefault();
	$('.downtime_drps_btnui').addClass('d-none');
	$('.quality_drp_btnui').addClass('d-none');
	$('#btn_ui_check_dq').val('select');
	open_button_interface_modal("btn_ui_add_quality_drp",null,"btn_ui_add_tool_drp",null,"Button_interface_add",0,"btn_ui_add_downtime_rdrp",null,"btn_conf_am_content");
});

// edit button interface button click 

$(document).on('click','.btn_ui_edit_click',function(event){
	event.preventDefault();
	

	var find_btnui_index = $('.btn_ui_edit_click').index(this);
	
	open_edit_interface_modal(find_btnui_index);
	
	
});

// its filling tool dropdown and qualilty dropdownn and value selection also this function
async function open_button_interface_modal(qref_id=null,ridval,tref_id=null,tidval,modal_ref_id=null,index_val,ddrp,ddval,machine_ref){

		const tool_res = await get_tool_data_arr();
		const quality_res = await getquality_data_arr();
		const getmachine_res = await getmachine_data_arr();
		

		// machine checkbox
		if (machine_ref!=null) {
			$('.btn_conf_am_content').empty();
			$('.btn_conf_am_content').append('<div class="inbox inbox_machine_abtnui btnui_machine_filter" style="display: flex;">'
				+'<div style="float: left;width: 20%;" class="center-align">'
				+'<input class="checkbox_machine filter_admachine_val" name="btn_ui_add_machine_val" value="all" type="checkbox" checked/>'
				+'</div>'
				+'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
					+'<p class="inbox-span paddingm">All</p>'
				+'</div>'
			+'</div>');
			getmachine_res.forEach(function(item){
				$('.btn_conf_am_content').append('<div class="inbox inbox_machine_abtnui btnui_machine_filter" style="display: flex;">'
					+'<div style="float: left;width: 20%;" class="center-align">'
					+'<input class="checkbox_machine filter_admachine_val" name="btn_ui_add_machine_val" value="'+item.machine_id+'" type="checkbox" checked/>'
					+'</div>'
					+'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
						+'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
					+'</div>'
				+'</div>');
			}); 
		}
		

		// quality drp
		if (qref_id!=null) {
			$('.'+qref_id+':eq('+index_val+')').empty();
			var qele = $();
			qele = qele.add('<option value="select" disabled>Select Reasons</option>')
			quality_res.forEach(function(item){
				qele = qele.add('<option value="'+item['quality_reason_id']+'" >'+item['quality_reason_id']+'-'+item['quality_reason_name']+'</option>');
			});
			$('.'+qref_id+':eq('+index_val+')').append(qele);

			var selected_val_q = "";
			if (ridval===null) {
				selected_val_q = "select";
				// $('#'+qref_id).val(ridval);
			}else{
				selected_val_q = ridval
				
			}
			$('.'+qref_id+':eq('+index_val+')').val(selected_val_q);
		}

		// tool drp
		if (tref_id!=null) {
			// console.log("tool array");
			// console.log(tool_res);
			$('.'+tref_id+':eq('+index_val+')').empty();
			var tele = $();
			tele = tele.add('<option value="select" selected >Select ToolName</option>')
			tool_res.forEach(function(item){
				tele = tele.add('<option value="'+item['tool_id']+'" >'+item['tool_id']+'-'+item['tool_name']+'</option>');
			});
			$('.'+tref_id+':eq('+index_val+')').append(tele);
			console.log('hi'+index_val);

			var selected_val_t = "";
			if (tidval===null) {
				selected_val_t = "select";
				// $('#'+qref_id).val(ridval);
			}else{
				selected_val_t = tidval
			}
			$('.'+tref_id+':eq('+index_val+')').val(selected_val_t);
		}

		// downtime default select option
		if (ddval===null) {
			$('.'+ddrp+':eq('+index_val+')').append('<option value="select" selected disabled>Select Reason</option>');
		}

	if (modal_ref_id!=null) {
		$('#'+modal_ref_id).modal('show');
	}
}

async function open_edit_interface_modal(find_btnui_index){
	var find_set_id = $('.btn_ui_edit_click:eq('+find_btnui_index+')').attr('data_set_id');
	var btnui_data = await getupdated_single_data(find_set_id);
	var machine_arr = await getmachine_data_arr();
	
	
	// machine dropdown function
	var machine_id_group = btnui_data[0]['machine_id_group'];
	select_machine_arr = machine_id_group.split(",");
	$('.btn_conf_em_content').empty();
	var check_out = "";
	if (parseInt(select_machine_arr.length)>=parseInt(machine_arr.length)) {
		check_out = "checked";
	}
	$('.btn_conf_em_content').append('<div class="inbox inbox_machine_ebtnui btnui_machine_filter" style="display: flex;">'
		+'<div style="float: left;width: 20%;" class="center-align">'
		+'<input class="checkbox_machine filter_edmachine_val" name="btn_ui_edit_machine_val" value="all" type="checkbox" '+check_out+'/>'
		+'</div>'
		+'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
			+'<p class="inbox-span paddingm">All</p>'
		+'</div>'
	+'</div>');
	machine_arr.forEach(function(item){
		var tmp_check = "";
		select_machine_arr.forEach(function(ele){
			if (item.machine_id===ele) {
				tmp_check = "checked";
			}
		});
		$('.btn_conf_em_content').append('<div class="inbox inbox_machine_ebtnui btnui_machine_filter" style="display: flex;">'
			+'<div style="float: left;width: 20%;" class="center-align">'
			+'<input class="checkbox_machine filter_edmachine_val" name="btn_ui_edit_machine_val" value="'+item.machine_id+'" type="checkbox" '+tmp_check+'/>'
			+'</div>'
			+'<div style="float: left;width: 80%;overflow: hidden;" class="center-align_cnt">'
				+'<p class="inbox-span paddingm">'+item.machine_id+"-"+item.machine_name+'</p>'
			+'</div>'
		+'</div>');
	}); 
	
	const category_arr = btnui_data[0]['category_group'].split(",");
	const reason_arr  = btnui_data[0]['reason_id_group'].split(',');
	const tool_arr = btnui_data[0]['tool_id_group'].split(',');
	const btn_arr = btnui_data[0]['button_value_group'].split(',');
	$('.dynamic_btn_reasons_editcontent').empty();
	category_arr.forEach(function(rele,index){
		
		
		if (rele==="Downtime") {
			
			if (reason_arr[index]==="2" || reason_arr[index]==="3") {
				edit_multiple_divs(null,tool_arr[index],reason_arr[index],index);
				$('.tool_hide_visible_property_edit').removeClass('d-none');
				$('.tool_hide_visible_property_edit').addClass('d-inline');
			}else{
				edit_multiple_divs(null,null,reason_arr[index],index);
			}
			var tmp_category = $('.get_reason_id_'+btnui_data[0]['set_id']+':eq('+index+')').attr('downtime_category');
			console.log("downtime category:\t"+tmp_category+"\t index value:\t"+index);
			$('.btn_ui_edit_downtime_cdrp:eq('+index+')').val(tmp_category);
			$('.btn_ui_edit_downtime_rdrp:eq('+index+')').empty();
			split_downtime_drp(tmp_category,"btn_ui_edit_downtime_rdrp",reason_arr[index],index);
			console.log("reason id:\t"+reason_arr[index]);
			$('.downtime_drps_btnui_edit:eq('+index+')').removeClass('d-none');
			$('.downtime_drps_btnui_edit:eq('+index+')').addClass('d-inline');
			
		}else if(rele==="Quality"){
			edit_multiple_divs(reason_arr[index],null,null,index);
			$('.quality_drp_btnui_edit:eq('+index+')').removeClass('d-none');
			$('.quality_drp_btnui_edit:eq('+index+')').addClass('d-inline');

		}

		$('.btn_ui_edit_btnnum:eq('+index+')').val(btn_arr[index]);
		$('.editconfig_category_drp:eq('+index+')').val(rele);
	});
	
	$('#Button_interface_edit').attr('set_data',btnui_data[0]['set_id']);
	$('#Button_interface_edit').modal('show');
}

// primary configurations
// add modal
$(document).on('change','.config_category_drp',function(){
	var config_category_drp = $('.config_category_drp');
	var find_index_category = config_category_drp.index(this);
	// alert(find_index_category);

	var primary_configuration_Drp = $('.config_category_drp:eq('+find_index_category+')').val();
	
	//alert(primary_configuration_Drp);
	$('.btn_ui_add_quality_drp:eq('+find_index_category+')').val('select');
	$('.btn_ui_add_downtime_cdrp:eq('+find_index_category+')').val('select');
	$('.btn_ui_add_downtime_rdrp:eq('+find_index_category+')').val('select');
	
	$('.btn_ui_add_downtime_rdrp:eq('+find_index_category+')').attr('disabled',true);
	$('.tool_hide_visible_property:eq('+find_index_category+')').removeClass('d-inline');
	$('.tool_hide_visible_property:eq('+find_index_category+')').addClass('d-none');
	if (primary_configuration_Drp==="Downtime") {
		$('.downtime_drps_btnui:eq('+find_index_category+')').removeClass('d-none');
		$('.downtime_drps_btnui:eq('+find_index_category+')').addClass('d-inline');
		$('.quality_drp_btnui:eq('+find_index_category+')').addClass('d-none');
	}
	else if(primary_configuration_Drp==="Quality"){
		$('.quality_drp_btnui:eq('+find_index_category+')').removeClass('d-none');
		$('.quality_drp_btnui:eq('+find_index_category+')').addClass('d-inline');
		$('.downtime_drps_btnui:eq('+find_index_category+')').addClass('d-none');
	}else if(primary_configuration_Drp==="select"){
		$('#primary_category_err_add_btn_ui').text(required);
	}
	
});

// edit modal
$(document).on('change','.editconfig_category_drp',function(){
	var config_category_drp = $('.editconfig_category_drp');
	var find_index_category = config_category_drp.index(this);
	var edit_primary_configuration = $('.editconfig_category_drp:eq('+find_index_category+')').val();
	console.log("edit onchange");
	console.log(edit_primary_configuration);
	//alert(primary_configuration_Drp);
	$('.btn_ui_edit_quality_drp:eq('+find_index_category+')').val('select');
	$('.btn_ui_edit_downtime_cdrp:eq('+find_index_category+')').val('select');
	$('.btn_ui_add_downtime_rdrp:eq('+find_index_category+')').val('select');
	$('.btn_ui_add_downtime_rdrp:eq('+find_index_category+')').attr('disabled',true);
	$('.tool_hide_visible_property:eq('+find_index_category+')').removeClass('d-inline');
	$('.tool_hide_visible_property_edit:eq('+find_index_category+')').addClass('d-none');
	if (edit_primary_configuration==="Downtime") {
		$('.downtime_drps_btnui_edit:eq('+find_index_category+')').removeClass('d-none');
		$('.downtime_drps_btnui_edit:eq('+find_index_category+')').addClass('d-inline');
		$('.quality_drp_btnui_edit:eq('+find_index_category+')').addClass('d-none');
	}
	else if(edit_primary_configuration==="Quality"){
		$('.quality_drp_btnui_edit:eq('+find_index_category+')').removeClass('d-none');
		$('.quality_drp_btnui_edit:eq('+find_index_category+')').addClass('d-inline');
		$('.downtime_drps_btnui_edit:eq('+find_index_category+')').addClass('d-none');
	}else if(edit_primary_configuration==="select"){
		// $('#primary_category_err_add_btn_ui').text(required);
	}
	
});

// downtime split category wise
async function split_downtime_drp(category,dref_id,didval,index_val){
	const dres = await getdowntime_data_arr();
	var dele = $();
	$('.'+dref_id+':eq('+index_val+')').attr('disabled',false);
	$('.'+dref_id+':eq('+index_val+')').empty();
	dele = dele.add('<option value="select"  disabled>Select Reason</option>')
	dres.forEach(function(item){
		if (category===item['downtime_category']) {
			dele = dele.add('<option value="'+item['downtime_reason_id']+'">'+item['downtime_reason_id']+'-'+item['downtime_reason']+'</option>');
		}
	});

	$('.'+dref_id+':eq('+index_val+')').append(dele);
	var select_dval = "";
	if (didval===null) {
		select_dval = "select";
	}else{
		select_dval = didval;
	}
	// console.log(didval);
	$('.'+dref_id+':eq('+index_val+')').val(select_dval);
}

// primary configuration downtime category onchange
// add modal 
// category onchange release downtime reasons
$(document).on('change','.btn_ui_add_downtime_cdrp',function(){
	var getindex = $('.btn_ui_add_downtime_cdrp');
	var find_dc_drp = getindex.index(this);
	var dcategory = $('.btn_ui_add_downtime_cdrp:eq('+find_dc_drp+')').val();
	$('.tool_hide_visible_property:eq('+find_dc_drp+')').removeClass('d-inline');
	$('.tool_hide_visible_property:eq('+find_dc_drp+')').addClass('d-none');
	split_downtime_drp(dcategory,"btn_ui_add_downtime_rdrp",null,find_dc_drp);
});

// add modal 
// reason onchange release tool dropdown
$(document).on('change','.btn_ui_add_downtime_rdrp',function(){
	var getindexr = $('.btn_ui_add_downtime_rdrp');
	var find_dr_drp = getindexr.index(this);
	var get_reason_id = $('.btn_ui_add_downtime_rdrp:eq('+find_dr_drp+')').val();
	$('.btn_ui_add_tool_drp:eq('+find_dr_drp+')').val('select');
	if (get_reason_id==="2" || get_reason_id==="3") {
		// open_button_interface_modal(null,null,"btn_ui_add_tool_drp",null,null,find_dr_drp);
		$('.tool_hide_visible_property:eq('+find_dr_drp+')').removeClass('d-none');
		$('.tool_hide_visible_property:eq('+find_dr_drp+')').addClass('d-inline');
	}else{
		$('.tool_hide_visible_property:eq('+find_dr_drp+')').removeClass('d-inline');
		$('.tool_hide_visible_property:eq('+find_dr_drp+')').addClass('d-none');
	}
});

// edit modal
$(document).on('change','#btn_ui_edowntime_ecdrp',function(){
	var edit_category = $('#btn_ui_edowntime_ecdrp').val();
	split_downtime_drp(edit_category,"btn_ui_edowntime_erdrp","null");
});

// common dropdown validation function
function drp_btn_ui_validate(drp_ref_id,btn_ref_id){
	var getval = $('#'+drp_ref_id).val();
	if (getval==="select") {
		$('.'+btn_ref_id).attr('disabled',true);
		return required;
	}else{

		$('.'+btn_ref_id).attr('disabled',false);
		return success;
	}
}

const hide_seek_obj = {
	btn_conf_amachine:false,
	btn_conf_emachine:false,
};

// button configuration machine checkbox click common function
function multiselect_checkbox(classRef,keyRef){
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

// on mouse up fucntion 
$(document).mouseup(function(event){
	 // machine dropdown outside click
	 var machine_add_check = $('.btn_conf_am_content');
	 var machine_drp_list = $('.btn_conf_amachine');
	 if (!machine_add_check.is(event.target) && machine_add_check.has(event.target).length==0 && !machine_drp_list.is(event.target) && machine_drp_list.has(event.target).length==0) {
		if(hide_seek_obj['btn_conf_amachine']==true){
			machine_add_check.hide();
			hide_seek_obj['btn_conf_amachine']=false;
		}
	}


	// machine dropdown outside click
	var machine_add_check = $('.btn_conf_em_content');
	var machine_drp_list = $('.btn_conf_emachine');
	if (!machine_add_check.is(event.target) && machine_add_check.has(event.target).length==0 && !machine_drp_list.is(event.target) && machine_drp_list.has(event.target).length==0) {
	   if(hide_seek_obj['btn_conf_emachine']==true){
		   machine_add_check.hide();
		   hide_seek_obj['btn_conf_emachine']=false;
	   	}
   	}


   
});


// add button user interface modal machine drp  div onclick
$(document).on('click','.inbox_machine_abtnui',function(event){
	multiple_drp_fun('inbox_machine_abtnui','filter_admachine_val','btn_ui_addmachine_txt','Machines',this);
});


// add button user interface modal machine drp  div onclick
$(document).on('click','.filter_admachine_val',function(event){
	multiple_drp_fun('filter_admachine_val','filter_admachine_val','btn_ui_addmachine_txt','Machines',this);
});

// edit button user interface machine drp div onclick
$(document).on('click','.inbox_machine_ebtnui',function(event){
	multiple_drp_fun('inbox_machine_ebtnui','filter_edmachine_val','btn_ui_editmachine_txt','Machines',this);
});

// edit button user interface machine drp div onclick
$(document).on('click','.filter_edmachine_val',function(event){
	multiple_drp_fun('filter_edmachine_val','filter_edmachine_val','btn_ui_editmachine_txt','Machines',this);
});




// common machine dropdown onclick function select and unselect

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

// delete button interface reason for add modal function
$(document).on('click','.del_button_reasons',function(){
	// alert('hi');
	$(this).closest('.appended_reason_div').remove(); 
});

// edit modal click delete button
$(document).on('click','.edit_del_button_reasons',function(){
	$(this).closest('.edit_appended_reason_div').remove();
});


// softdelete modal open function
$(document).on('click','.btn_ui_del_click',function(){
	var delindex = $('.btn_ui_del_click');
	var get_del_index = delindex.index(this);
	var set_id = $('.btn_ui_del_click:eq('+get_del_index+')').attr('data_set_id');

	$('#del_button_configuration').attr('set_id',set_id);
	$('#del_button_configuration').modal('show');

});



