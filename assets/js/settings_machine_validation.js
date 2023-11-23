var positive = "*Positive values only allowed";
var numerical = "*Numerical values only";
var len = "*Invalid length";
var required = "*Required field";
var success="";
var greaterZero="*Should be greater than 0";

function inputMachineOffRateHour(data){
	var val = data;
	val = val.trim();
	if (!val) {
		//$('.Add_Machine_Data').attr()
		$(".Add_Machine_Data").attr("disabled", true);

		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;
		if ((val) > 0) {
			if (num.test(val)) {
			
				$(".Add_Machine_Data").removeAttr("disabled");
				$("#inputMachineOffRateHour").val(parseFloat($("#inputMachineOffRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return numerical;
			}	
		}else if((val) < 0){
				$(".Add_Machine_Data").attr("disabled", true);
				return positive;
		}
		else if (val ==0) {
			$(".Add_Machine_Data").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".Add_Machine_Data").removeAttr("disabled");
				$("#inputMachineOffRateHour").val(parseFloat($("#inputMachineOffRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return numerical;
			}
		}
	
	}
}

function inputMachineName(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		$('#inputMachineName').val(val);
		return required;
	}
	else{
		val = val.trim();
		// val = val.toLowerCase();
		if (val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			//This condition will not occur
			return "*Length should less than 50";
		}
		else if (val.length<=50) {
			$(".Add_Machine_Data").removeAttr("disabled");
			val = val.trimStart().trimEnd();
			$('#inputMachineName').val(val);
			$('#inputMachineNameCunt').html(val.length + ' / ' + "50");
			return success;
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			//Error message should update based on the Input validation
			return "Invalid*";
		}
	}
}

function inputMachineBrand(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		$('#inputMachineBrand').val(val);
		return required;
	}
	else{
		val = val.trim();
		if (val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputMachineBrandCunt").css("display","none");
			return "Invalid length*";
		}
		else if (val.length<=50) {
			val = val.trimStart().trimEnd();
			$(".Add_Machine_Data").removeAttr("disabled");
			$("#inputMachineBrandCunt").css("display","block");
			$('#inputMachineBrand').val(val);
			return success;
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			$("#inputMachineBrandCunt").css("display","none");
			return "Invalid*";
		}
	}
}

function inputMachineRateHour(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;
		if (parseInt(val) > 0) {			
			if (num.test(val)) {
				$(".Add_Machine_Data").removeAttr("disabled");
				$("#inputMachineRateHour").val(parseFloat($("#inputMachineRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return numerical;
			}
		}else if(parseInt(val) < 0){
			$(".Add_Machine_Data").attr("disabled", true);
				return positive;
		}
		else if (val ==0) {
			$(".Add_Machine_Data").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".Add_Machine_Data").removeAttr("disabled");
				$("#inputMachineRateHour").val(parseFloat($("#inputMachineRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return numerical;
			}
		}
		
	}
}

function inputTonnage(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[0-9]*$/;
		if (parseInt(val)>0) {
			if (num.test(val)) {
				$(".Add_Machine_Data").removeAttr("disabled");
				return success;
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return numerical;
			}
		}
		else if (val ==0) {
			$(".Add_Machine_Data").attr("disabled", true);
			return greaterZero;
		}
		else if (parseInt(val)<0){
			$(".Add_Machine_Data").attr("disabled", true);
			return positive;
		}
		else{
			if (num.test(val)) {
				$(".Add_Machine_Data").removeAttr("disabled");
				return success;
			}
			else{
				$(".Add_Machine_Data").attr("disabled", true);
				return numerical;
			}
		}
	}
}


function inputMachineSerialid(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".Add_Machine_Data").attr("disabled", true);
		return required;
	}
	else{
		val = val.trim();
		if (val.length > 50) {
			$(".Add_Machine_Data").attr("disabled", true);
			//This condition will not occur
			return "*Length should less than 50";
		}
		else if (val.length<=50) {
			$(".Add_Machine_Data").removeAttr("disabled");
			val = val.trimStart().trimEnd();
			$('#inputMachineSerialId').val(val);
			return success;
		}
		else{
			$(".Add_Machine_Data").attr("disabled", true);
			//Error message should update based on the Input validation
			return "Invalid*";
		}
	}
}

$('#inputMachineName').on('blur',function(){
    var x =inputMachineName($("#inputMachineName").val());
   $("#inputMachineNameErr").html(x);
});
$('#inputMachineRateHour').on('blur',function(){
	var x =inputMachineRateHour($("#inputMachineRateHour").val());
	$("#inputMachineRateHourErr").html(x);
});

$('#inputMachineOffRateHour').on('blur',function(){
   var x =inputMachineOffRateHour($("#inputMachineOffRateHour").val());
   $("#inputMachineOffRateHourErr").html(x);
});

$('#inputTonnage').on('blur',function(){
	var x =inputTonnage($("#inputTonnage").val());
	$("#inputTonnageErr").html(x);
});

$('#inputMachineBrand').on('blur',function(){
	var x =inputMachineBrand($("#inputMachineBrand").val());
	$("#inputMachineBrandErr").html(x);
});

// $('#inputMachineSerialId').on('blur',function(){
// 	var x =inputMachineSerialid($("#inputMachineSerialId").val());
// 	$("#inputMachineSerialId_err").html(x);
// });

// // Onchange
$('#inputMachineName').focus('type',function(){
	$('.Add_Machine_Data').removeAttr("disabled");
});

$('#inputMachineRateHour').focus('type',function(){
	$('.Add_Machine_Data').removeAttr("disabled");
});

$('#inputMachineOffRateHour').focus('type',function(){
	$('.Add_Machine_Data').removeAttr("disabled");
});

$('#inputTonnage').focus('type',function(){
	$('.Add_Machine_Data').removeAttr("disabled");
});

$('#inputMachineBrand').focus(function(){
	$('.Add_Machine_Data').removeAttr("disabled");
});

$('#inputMachineSerialId').focus('type',function(){
	$('.Add_Machine_Data').removeAttr("disabled");
});

$('#inputMachineSerialId').focusout('type',function(){
	var serial_id = $('#inputMachineSerialId').val();
    serial_id = serial_id.trim();
	check_machine_serial_id(serial_id);
});

// Key Press
$('#inputTonnage').on('keypress', function(key) {
    if(key.charCode < 48 || key.charCode > 57) {
		return false;
	}
});
$('#inputMachineName').on('keypress', function(key) {
	var val = $("#inputMachineName").val();
	val = val.trim();
    if(val.length>50) {
    	$('#inputMachineName').val(val);
		return false;
	}
});
$('#inputMachineBrand').on('keypress', function(key) {
    var val = $("#inputMachineBrand").val();
	val = val.trim();
    if(val.length>50) {
		return false;
	}
});
$('#inputMachineSerialId').on('keypress', function(key) {
    var val = $("#inputMachineSerialId").val();
	val = val.trim();
    if(val.length>50) {
		return false;
	}
});


// Charecter Count
var text_max = 50;
$('#inputMachineNameCunt').html('0 / ' + text_max);
$('#inputMachineName').keyup(function() {
	val_data = $('#inputMachineName').val();
	val_data = val_data.trimStart().trimEnd();
  	var text_length = val_data.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	// 	$('#inputMachineName').val($('#inputMachineName').val().trimStart().trimEnd());
	 	$('#inputMachineNameCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMachineName').val($('#inputMachineName').val().substring(0,50));
		var text_remaining = ($('#inputMachineName').val().trimStart().trimEnd()).length;
	 	$('#inputMachineNameCunt').html(text_remaining + ' / ' + text_max);
	}
});

var text_max = 50;
// $('#inputMachineNameCuntEdit').html(($('#editMachineName').val().length)+' / ' + text_max);
$('#editMachineName').keyup(function() {
	var val_data = $('#editMachineName').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#editMachineNameCuntEdit').html(text_remaining + ' / ' + text_max);
	 	// $('#editMachineName').val($('#editMachineName').val().trimStart().trimEnd());
	}
	else{
		$('#editMachineName').val($('#editMachineName').val().substring(0,50));
		var text_remaining = ($('#editMachineName').val().trimStart().trimEnd()).length;
	 	$('#editMachineNameCuntEdit').html(text_remaining + ' / ' + text_max);
	}
});


$('#editMachineBrand').keyup(function() {
	var val_data = $('#editMachineBrand').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#editMachineBrandCuntEdit').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#editMachineBrand').val($('#editMachineBrand').val().substring(0,50));
		var text_remaining = $('#editMachineBrand').val().length;
	 	$('#editMachineBrandCuntEdit').html(text_remaining + ' / ' + text_max);
	}
});


$('#inputMachineBrandCunt').html('0 / ' + text_max);
$('#inputMachineBrand').keyup(function() {
	var val_data = $('#inputMachineBrand').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#inputMachineBrandCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMachineBrand').val($('#inputMachineBrand').val().substring(0,50));
		var text_remaining = $('#inputMachineBrand').val().length;
	 	$('#inputMachineBrandCunt').html(text_remaining + ' / ' + text_max);
	}
});


$('#inputMachineSerialIdCunt').html('0 / ' + text_max);
$('#inputMachineSerialId').keyup(function() {
	var val_data = $('#inputMachineSerialId').val();
	val_data = val_data.trimStart().trimEnd();
  var text_length = val_data.length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#inputMachineSerialIdCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#inputMachineSerialId').val($('#inputMachineSerialId').val().substring(0,50));
		var text_remaining = $('#inputMachineSerialId').val().length;
	 	$('#inputMachineSerialIdCunt').html(text_remaining + ' / ' + text_max);
	}
});


$('#editMachineSerialNumberCunt').html('0 / ' + text_max);
$('#editMachineSerialNumber').keyup(function() {
  var text_length = $('#editMachineSerialNumber').val().length;
  	if (text_length <= 50) {
	 	var text_remaining = text_length;
	 	$('#editMachineSerialNumberCunt').html(text_remaining + ' / ' + text_max);
	}
	else{
		$('#editMachineSerialNumber').val($('#editMachineSerialNumber').val().substring(0,50));
		var text_remaining = $('#editMachineSerialNumber').val().length;
	 	$('#editMachineSerialNumberCunt').html(text_remaining + ' / ' + text_max);
	}
});



//Edit Operations

function editMachineOffRateHour(data){
	var val = data;
	val = val.trim();
	if (!val) {
		//$('.Add_Machine_Data').attr()
		$(".EditMachine").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;

		if (parseInt(val) > 0) {
			if (num.test(val)) {
			
				$(".EditMachine").removeAttr("disabled");
				$("#editMachineOffRateHour").val(parseFloat($("#editMachineOffRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditMachine").attr("disabled", true);
				return numerical;
			}	
		}else if(parseInt(val) < 0){
				$(".EditMachine").attr("disabled", true);
				return positive;
		}
		else if (val ==0) {
			$(".EditMachine").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".EditMachine").removeAttr("disabled");
				$("#editMachineOffRateHour").val(parseFloat($("#editMachineOffRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditMachine").attr("disabled", true);
				return numerical;
			}
		}
	}
}

function editMachineName(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		$('#editMachineName').val(val);
		return required;
	}
	else{
		val = val.trim();
		if (val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			//This condition will not occur
			return "*Length should less than 50";
		}
		else if (val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			var ve_demo = $('#editMachineName').val();
			ve_demo = ve_demo.trimStart().trimEnd();
			$('#editMachineName').val(ve_demo);
			$('#editMachineNameCuntEdit').html(ve_demo.length + ' / ' + "50");
			return success;
		}
		else{
			$(".EditMachine").attr("disabled", true);
			//Error message should update based on the Input validation
			return "Invalid*";
		}
	}
}

function editMachineBrand(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		$('#editMachineBrand').val(val);
		return required;
	}
	else{
		val = val.trim();
	
		if (val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			$("#editMachineBrandCunt").css("display","none");
			return "Invalid length*";
		}
		else if (val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			$("#editMachineBrandCunt").css("display","block");
			var val_demo = $('#editMachineBrand').val();
			val_demo = val_demo.trimStart().trimEnd();
			// val = val.trimStart().trimEnd();
			$('#editMachineBrand').val(val_demo);
			return success;
		}
		else{
			$(".EditMachine").attr("disabled", true);
			$("#editMachineBrandCunt").css("display","none");
			return "Invalid*";
		}
	}
}

function editMachineRateHour(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[+-]?\d+(\.\d+)?$/;

		if (parseInt(val) > 0) {
			if (num.test(val)) {
			
				$(".EditMachine").removeAttr("disabled");
				$("#editMachineRateHour").val(parseFloat($("#editMachineRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditMachine").attr("disabled", true);
				return numerical;
			}	
		}else if(parseInt(val) < 0){
				$(".EditMachine").attr("disabled", true);
				return positive;
		}
		else if (val ==0) {
			$(".EditMachine").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".EditMachine").removeAttr("disabled");
				$("#editMachineRateHour").val(parseFloat($("#editMachineRateHour").val()).toFixed(2));
				return success;
			}
			else{
				$(".EditMachine").attr("disabled", true);
				return numerical;
			}
		}
		
	}
}

function editTonnage(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return required;
	}
	else{
		var num = /^[0-9]*$/;
		if (parseInt(val)>0) {
			if (num.test(val)) {
				$(".EditMachine").removeAttr("disabled");
				return success;
			}
			else{
				$(".EditMachine").attr("disabled", true);
				return numerical;
			}
		}
		else if (parseInt(val)<0){
			$(".EditMachine").attr("disabled", true);
			return positive;
		}
		else if (val ==0) {
			$(".EditMachine").attr("disabled", true);
			return greaterZero;
		}
		else{
			if (num.test(val)) {
				$(".EditMachine").removeAttr("disabled");
				return success;
			}
			else{
				$(".EditMachine").attr("disabled", true);
				return numerical;
			}
		}
	}
}

function editMachineSerialNumber(data){
	var val = data;
	val = val.trim();
	if (!val) {
		$(".EditMachine").attr("disabled", true);
		return required;
	}
	else{
		val = val.trim();
		if (val.length > 50) {
			$(".EditMachine").attr("disabled", true);
			//This condition will not occur
			return "*Length should less than 50";
		}
		else if (val.length<=50) {
			$(".EditMachine").removeAttr("disabled");
			return success;
		}
		else{
			$(".EditMachine").attr("disabled", true);
			//Error message should update based on the Input validation
			return "Invalid*";
		}
	}
}

$('#editMachineName').on('blur',function(){
    var x =editMachineName($("#editMachineName").val());
   $("#editMachineNameErr").html(x);
});
$('#editMachineRateHour').on('blur',function(){
	var x =editMachineRateHour($("#editMachineRateHour").val());
	$("#editMachineRateHourErr").html(x);
});

$('#editMachineOffRateHour').on('blur',function(){
   var x =editMachineOffRateHour($("#editMachineOffRateHour").val());
   $("#editMachineOffRateHourErr").html(x);
});

$('#editTonnage').on('blur',function(){
	var x =editTonnage($("#editTonnage").val());
	$("#editTonnageErr").html(x);
});

$('#editMachineBrand').on('blur',function(){
	var x =editMachineBrand($("#editMachineBrand").val());
	$("#editMachineBrandErr").html(x);
});

// $('#editMachineSerialNumber').on('blur',function(){
// 	var x =editMachineSerialNumber($("#editMachineSerialNumber").val());
// 	$("#editMachineSerialNumber_err").html(x);
// });

// // Onchange
$('#editMachineName').focus('type',function(){
	$('.EditMachine').removeAttr("disabled");
});

$('#editMachineRateHour').focus('type',function(){
	$('.EditMachine').removeAttr("disabled");
});

$('#editMachineOffRateHour').focus('type',function(){
	$('.EditMachine').removeAttr("disabled");
});

$('#editTonnage').focus('type',function(){
	$('.EditMachine').removeAttr("disabled");
});

$('#editMachineBrand').focus(function(){
	$('.EditMachine').removeAttr("disabled");
});

$('#editMachineSerialNumber').focus('type',function(){
	$('.EditMachine').removeAttr("disabled");
});

$('#editMachineSerialNumber').focusout('type',function(){
	var serial_id = $('#editMachineSerialNumber').val();
    serial_id = serial_id.trim();
	check_machine_serial_id_edit(serial_id);
});

// Key Press
$('#editTonnage').on('keypress', function(key) {
    if(key.charCode < 48 || key.charCode > 57) {
		return false;
	}
});
$('#editMachineName').on('keypress', function(key) {
	var val = $("#editMachineName").val();
	val = val.trim();
    if(val.length>50) {
		return false;
	}
});
$('#editMachineBrand').on('keypress', function(key) {
    var val = $("#editMachineBrand").val();
	val = val.trim();
    if(val.length>50) {
		return false;
	}
});
$('#editMachineSerialNumber').on('keypress', function(key) {
    var val = $("#editMachineSerialNumber").val();
	val = val.trim();
    if(val.length>50) {
		return false;
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