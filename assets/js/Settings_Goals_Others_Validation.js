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