var positive = "*Positive values only allowed";
var numerical = "*Numerical values only";
var len = "*Invalid length";
var required = "*Required field";
var success="";
var greaterZero="*Should be greater than 0"


// tool dropdown add part
function inputdropdwontool(){
	var tool = $('#inputNewToolName').val();

	tool = tool.trim();

	if(!tool){
		$(".Add_Tool_Data").attr("disabled", true);
		return required;
	}else{
		$(".Add_Tool_Data").removeAttr("disabled");
		return success;
	}
}




function inputPartName(){
	var val = $("#inputPartName").val();
	val = val.trim();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		$("#inputPartName").val(val);
		return required;
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			//Will not occur this condition
			return "Invalid length*";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			var val_demo = $('#inputPartName').val();
			val_demo = val_demo.trimStart().trimEnd();
			$('#inputPartName').val(val_demo);
			return success;
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "*Invalid";
		}
	}
}
function inputNICT(){
	var val = $("#inputNICT").val();
	val = val.trim();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;
		if ((val)==0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return greaterZero;
		}
		else if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputNICT").val(parseFloat($("#inputNICT").val()).toFixed(2));
			return success;
		}
		else if ((val)<0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return positive;
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return numerical;
		}
	}
}

function inputNoOfPartsPerCycle(){
	var val = $("#inputNoOfPartsPerCycle").val();
	 val = val.trim();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[0-9]*$/;
		if ((val)==0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return greaterZero;
		}
		else if (num.test(val)) {
			$(".Add_Tool_Data").removeAttr("disabled");
			return success;
		}
		else if ((val)<0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return positive;
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return numerical;
		}
	}
}

function inputPartPrice(){
	var val = $("#inputPartPrice").val();
	 val = val.trim();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;
		if (parseInt(val) > 0) {
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				$("#inputPartPrice").val(parseFloat($("#inputPartPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}	
		}
		else if((val) < 0){
				$(".Add_Tool_Data").attr("disabled", true);
				return positive;
		}
		else if ((val) == 0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return greaterZero;
		}

		else{
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				$("#inputPartPrice").val(parseFloat($("#inputPartPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}
		}
	}
}

function inputPartWeight(){
	var val = $("#inputPartWeight").val();
	val = val.trim();

	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return required;
	}
	else{
		/*
		var num = /^[0-9]*$/;
		if ((val)>0) {
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}
		}
		else if ((val)<0){
			$(".Add_Tool_Data").attr("disabled", true);
			return positive;
		}
		else if ((val)==0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}
		}
		*/
		var num = /^[+-]?\d+(\.\d+)?$/;
		if (parseInt(val) > 0) {
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				$("#inputPartWeight").val(parseFloat($("#inputPartWeight").val()).toFixed(3));
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}	
		}
		else if((val) < 0){
				$(".Add_Tool_Data").attr("disabled", true);
				return positive;
		}
		else if ((val) == 0) {
			$(".Add_Tool_Data").attr("disabled", true);
			return greaterZero;
		}

		else{
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				$("#inputPartWeight").val(parseFloat($("#inputPartWeight").val()).toFixed(3));
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}
		}
	}
}


function inputMaterialPrice(){
	var val = $("#inputMaterialPrice").val();
	val = val.trim();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		return required;
	}
	else{

		var num = /^[+-]?\d+(\.\d+)?$/;
		if (parseInt(val) >= 0) {
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				$("#inputMaterialPrice").val(parseFloat($("#inputMaterialPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}	
		}
		else if((val) < 0){
				$(".Add_Tool_Data").attr("disabled", true);
				return positive;
		}
		// else if ((val) == 0) {
		// 	$(".Add_Tool_Data").attr("disabled", true);
		// 	return greaterZero;
		// }

		else{
			if (num.test(val)) {
				$(".Add_Tool_Data").removeAttr("disabled");
				$("#inputMaterialPrice").val(parseFloat($("#inputMaterialPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Tool_Data").attr("disabled", true);
				return numerical;
			}
		}
	}
}

function inputMaterialName(){
	var val = $("#inputMaterialName").val();
	val = val.trim();
	if (!val) {
		$(".Add_Tool_Data").attr("disabled", true);
		$("#inputMaterialName").val(val);
		return required;
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			$("#inputNewToolNameCunt").css("display","none");
			// This will not occur
			return "Invalid length*";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputNewToolNameCunt").css("display","block");
			var vel_Demo = $('#inputMaterialName').val();
			vel_Demo = vel_Demo.trimStart().trimEnd();
			$('#inputMaterialName').val(vel_Demo);
			return success;
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			return "Invalid*";
		}
	}
}


function inputNewToolName(){
	var val = $("#inputNewToolName").val();
	val = val.trim();
	var tool_select = $('#inputToolName').val();
	if (!val) {
		if (tool_select != " ") {
			$(".Add_Tool_Data").attr("disabled", true);
			$('#inputNewToolName').val(val);
		return required;
		}else{
			$(".Add_Tool_Data").attr("disabled", false);
			var val_demo = $('#inputNewToolName').val();
			val_demo = val_demo.trimStart().trimEnd();
			$('#inputNewToolName').val(val_demo);
		return success;
		}
		
	}
	else{
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".Add_Tool_Data").attr("disabled", true);
			$("#inputNewToolNameCunt").css("display","none");
			return "Invalid length*";
		}
		else if (val.length<=100) {
			$(".Add_Tool_Data").removeAttr("disabled");
			$("#inputNewToolNameCunt").css("display","block");
			var val_demo = $('#inputNewToolName').val();
			val_demo = val_demo.trimStart().trimEnd();
			$('#inputNewToolName').val(val_demo);
			return success;
		}
		else{
			$(".Add_Tool_Data").attr("disabled", true);
			$("#inputNewToolNameCunt").css("display","none");
			return "Invalid*";
		}
	}
}



$('#inputPartName').on('blur',function(){
    var x =inputPartName();
   $("#inputPartNameErr").html(x);
});

$('#inputNICT').on('blur',function(){
    var x =inputNICT();
   $("#inputNICTErr").html(x);
});

$('#inputNoOfPartsPerCycle').on('blur',function(){
    var x =inputNoOfPartsPerCycle();
   $("#inputNoOfPartsPerCycleErr").html(x);
});

$('#inputPartPrice').on('blur',function(){
    var x =inputPartPrice();
   $("#inputPartPriceErr").html(x);
});
$('#inputPartWeight').on('blur',function(){
    var x =inputPartWeight();
   $("#inputPartWeightErr").html(x);
});

$('#inputMaterialPrice').on('blur',function(){
    var x =inputMaterialPrice();
   $("#inputMaterialPriceErr").html(x);
});

$('#inputMaterialName').on('blur',function(){
    var x =inputMaterialName();
   $("#inputMaterialNameErr").html(x);
});


$('#inputNewToolName').on('blur',function(){
    var x =inputNewToolName();
   $("#inputNewToolNameErr").html(x);
});


// Charecter Count
var text_max = 100;
$('#inputPartNameCunt').html('0 / ' + text_max);
$('#inputPartName').keyup(function() {
	var val_data = $('#inputPartName').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputPartNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputPartName').val($('#inputPartName').val().substring(0,100));
		var text_remaining = $('#inputPartName').val().length;
	 	$('#inputPartNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

$('#inputNewToolNameCunt').html('0 / ' + text_max);
$('#inputNewToolName').keyup(function() {
	var val_data = $('#inputNewToolName').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputNewToolNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputNewToolName').val($('#inputNewToolName').val().substring(0,100));
		var text_remaining = $('#inputNewToolName').val().length;
	 	$('#inputNewToolNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

$('#inputMaterialNameCunt').html('0 / ' + text_max);
$('#inputMaterialName').keyup(function() {
	var val_data = $('#inputMaterialName').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputMaterialNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMaterialName').val($('#inputMaterialName').val().substring(0,100));
		var text_remaining = $('#inputMaterialName').val().length;
	 	$('#inputMaterialNameCunt').html(text_remaining + ' / ' + text_max);
	}
});



function EditPartName(){

	var val = $("#EditPartName").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		$("#EditPartName").val(val);
		return required;
	}
	else{	
		val = val.trim();
		val = val.toLowerCase();
		if (val.length > 100) {
			$(".EditTool").attr("disabled", true);
			$("#EditPartNameCunt").css("display","none");
			//this condition will not occur
			return "Invalid length*";
		}
		else if (val.length<=100) {
			$(".EditTool").removeAttr("disabled");
			$("#EditPartNameCunt").css("display","block");
			var val_demo = $('#EditPartName').val();
			val_demo = val_demo.trimStart().trimEnd();
			$('#EditPartName').val(val_demo);
			// val = val.trimStart().trimEnd();
			// $('#EditPartName').val(val);
			return success;
		}
		else{
			$(".EditTool").attr("disabled", true);
			$("#EditPartNameCunt").css("display","none");
			return "Invalid*";
		}
	}
}
function EditNICT(){
	var val = $("#EditNICT").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		return required;
	}
	else{

		var num = /^[+-]?\d+(\.\d+)?$/;
		if ((val)==0) {
			$(".EditTool").attr("disabled", true);
			return greaterZero;
		}
		else if (num.test(val)) {
			$(".EditTool").removeAttr("disabled");
			$("#EditNICT").val(parseFloat($("#EditNICT").val()).toFixed(2));
			return success;
		}
		else if ((val)<0) {
			$(".EditTool").attr("disabled", true);
			return positive;
		}
		else{
			$(".EditTool").attr("disabled", true);
			return numerical;
		}
	}
}

function EditNoOfPartsPerCycle(){
	var val = $("#EditNoOfPartsPerCycle").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[0-9]*$/;
		if ((val)==0) {
			$(".EditTool").attr("disabled", true);
			return greaterZero;
		}
		else if (num.test(val)) {
			$(".EditTool").removeAttr("disabled");
			return success;
		}
		else if ((val)<0) {
			$(".EditTool").attr("disabled", true);
			return positive;
		}
		else{
			$(".EditTool").attr("disabled", true);
			return numerical;
		}
	}
}

function EditPartPrice(){
	var val = $("#EditPartPrice").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;
		if (parseInt(val) > 0) {
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				$("#EditPartPrice").val(parseFloat($("#EditPartPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}	
		}
		else if((val) < 0){
				$(".EditTool").attr("disabled", true);
				return positive;
		}
		else if ((val) == 0) {
			$(".EditTool").attr("disabled", true);
			return greaterZero;
		}

		else{
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				$("#EditPartPrice").val(parseFloat($("#EditPartPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}
		}
	}
}

function EditPartWeight(){
	var val = $("#EditPartWeight").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		return required;
	}
	else{
		/*
		var num = /^[0-9]*$/;
		if ((val)>0) {
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}
		}
		else if ((val)<0){
			$(".EditTool").attr("disabled", true);
			return positive;
		}
		else if ((val)==0) {
			$(".EditTool").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}
		}
		*/
		var num = /^[+-]?\d+(\.\d+)?$/;
		
		if (parseInt(val) > 0) {
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				$("#EditPartWeight").val(parseFloat($("#EditPartWeight").val()).toFixed(3));
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}	
		}
		else if((val) < 0){
				$(".EditTool").attr("disabled", true);
				return positive;
		}
		else if ((val) == 0) {
			$(".EditTool").attr("disabled", true);
			return greaterZero;
		}

		else{
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				$("#EditPartWeight").val(parseFloat($("#EditPartWeight").val()).toFixed(3));
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}
		}
	}
}


function EditMaterialPrice(){
	var val = $("#EditMaterialPrice").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		return required;
	}
	else{
		// var num = /^[0-9]*$/;
		var num = /^[+-]?\d+(\.\d+)?$/;
		
		if (parseInt(val) >= 0) {
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				$("#EditMaterialPrice").val(parseFloat($("#EditMaterialPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}	
		}
		else if((val) < 0){
				$(".EditTool").attr("disabled", true);
				return positive;
		}
		// else if ((val) == 0) {
		// 	$(".EditTool").attr("disabled", true);
		// 	return greaterZero;
		// }

		else{
			if (num.test(val)) {
				$(".EditTool").removeAttr("disabled");
				$("#EditMaterialPrice").val(parseFloat($("#EditMaterialPrice").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditTool").attr("disabled", true);
				return numerical;
			}
		}
	}
}

function EditMaterialName(){
	var val = $("#EditMaterialName").val();
	val = val.trim();
	if (!val) {
		$(".EditTool").attr("disabled", true);
		$("#EditMaterialName").val(val);
		return required;
	}
	else{
		val = val.trim();
		// val = val.toLowerCase();
		if (val.length > 100) {
			$(".EditTool").attr("disabled", true);
			$("#EditMaterialNameCunt").css("display","none");
			return "Invalid length*";
		}
		else if (val.length<=100) {
			$(".EditTool").removeAttr("disabled");
			$("#EditMaterialNameCunt").css("display","block");
			var val_demo = $("#EditMaterialName").val();
			val_demo = val_demo.trimStart().trimEnd();
			$("#EditMaterialName").val(val_demo);
			return success;
		}
		else{
			$(".EditTool").attr("disabled", true);
			$("#EditMaterialNameCunt").css("display","block");
			return "Invalid*";	
		}
	}
}


$('#EditPartName').on('blur',function(){
    var x =EditPartName();
   	$(".EditPartNameErr").html(x);
});

$('#EditNICT').on('blur',function(){
    var x =EditNICT();
   	$(".EditNICTErr").html(x);
});

$('#EditNoOfPartsPerCycle').on('blur',function(){
    var x =EditNoOfPartsPerCycle();
   	$(".EditNoOfPartsPerCycleErr").html(x);
});

$('#EditPartPrice').on('blur',function(){
    var x =EditPartPrice();
   	$(".EditPartPriceErr").html(x);
});
$('#EditPartWeight').on('blur',function(){
    var x =EditPartWeight();
   	$(".EditPartWeightErr").html(x);
});

$('#EditMaterialPrice').on('blur',function(){
    var x =EditMaterialPrice();
   	$(".EditMaterialPriceErr").html(x);
});

$('#EditMaterialName').on('blur',function(){
    var x =EditMaterialName();
   	$(".EditMaterialNameErr").html(x);
});


var text_max_edit = 100;
// $('#EditMaterialNameCunt').html('0 / ' + text_max_edit);
$('#EditMaterialName').keyup(function() {
  var text_length = $('#EditMaterialName').val();
  text_length = text_length.trim();
  text_length = text_length.length;
  
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#EditMaterialNameCunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#EditMaterialName').val($('#EditMaterialName').val().substring(0,100));
	}
});

// $('#EditPartNameCunt').html('0 / ' + text_max_edit);
$('#EditPartName').keyup(function() {
	var val_data = $('#EditPartName').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#EditPartNameCunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#EditPartName').val($('#EditPartName').val().substring(0,100));
	}
});

// $('#inputNewToolNameEditCunt').html('0 / ' + text_max_edit);
$('#inputNewToolNameEdit').keyup(function() {
	var val_data = $('#inputNewToolNameEdit').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 100) {
	 	var text_remaining = text_length;
	 	$('#inputNewToolNameEditCunt').html(text_remaining + ' / ' + text_max_edit);
	}
	else{
		$('#inputNewToolNameEdit').val($('#inputNewToolNameEdit').val().substring(0,100));
		var text_remaining = $('#inputNewToolNameEdit').val().length;
	 	$('#inputNewToolNameEditCunt').html(text_remaining + ' / ' + text_max_edit);
	}
});



// numeric values empty spaces remove function
function key_down(e){
	var e = window.event || e;
	var get_code = e.keyCode;
	if (get_code == 32) {
		e.preventDefault();
	}
}

// if any copy paste the empty space not paste the element
function check_white_space(event){
	var data = event.clipboardData.getData("text/plain");
    var white_space = (!data || data.length === 0 || /\s/g.test(data));
  
    if(white_space)
    {
  	  event.preventDefault(); 
    }
}


