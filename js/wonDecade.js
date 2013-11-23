
function obtainAction(trackingNumber) {

	var action = "oidn";
	var startString = trackingNumber.substring(0, 2).toUpperCase();

	console.log(startString);

	var ondnp = new Array("CU", "SU", "EU", "PU");
	var ondnc = new Array("CC", "CD", "CL", "CM", "CO", "CP", "DE", "DI", "EC",
			"EE", "EO", "EP", "GC", "GD", "GE", "GF", "GO", "GR", "GS", "IN",
			"IS", "JP", "OL", "PP", "RD", "RR", "SL", "SP", "SR", "ST", "TC",
			"TL", "UP");
	var ondi = new Array("EE", "CX", "RR", "XP", "XX", "XR");

	if ($.inArray(startString, ondnp) >= 0) {
		action = "ondnp";
	} else if ($.inArray(startString, ondnc) >= 0) {
		action = "ondnc";
	} else if ($.inArray(startString, ondi) >= 0) {
		action = "ondi";
	} else if (/^\d+$/.test(trackingNumber)) {
		// FIXME ACA puede ser onpa y ondng
	}

	return action;
}

function parseResult(result) {
	
	result = $.trim(result);
	
	var scriptIndex = result.indexOf("<script");
	result = result.substring(0, scriptIndex);
	result = result.replace("alert-info", "alert-danger");
	result = result.replace("badge", "label label-success");

	return result;
}

function swingOnDecade() {
	$('#decadeSwing').show();
}

function swingOffDecade() {
	$('#decadeSwing').hide();
}

function swingCfk(){
	$("#decadeResults").append($('<img />').attr('src','img/swing_cfk.gif'));
}

function errorAlert(message){
	var alertError = $("<div />")
		.addClass("alert alert-danger")
		.append("<p />")
		.html(message);
	
	$("#decadeResults").html(alertError);

}
function doTheDecade(trackingNumber) {
	
	trackingNumber = $.trim(trackingNumber);
	if (trackingNumber != ""){
		var action = obtainAction(trackingNumber);
		var query = {
			id : trackingNumber,
			action : action
		};
		
		swingOnDecade();
		
		$('.ganar-decada').closest('fieldset').attr('disabled', 'true');
		$("#decadeResults").html('');
		
		$.get("action/caQuery.php", query)
				.done(function(data) {
					data = parseResult(data);
					if (data == ""){
						errorAlert('La d&eacute;cada no ha sido ganada, intente nuevamente m&aacute;s tarde <strong> votando a otra gente </strong>');
						swingCfk();
					}else{
						try {
							$("#decadeResults").html(data);
						} catch (e) {
							errorAlert('La d&eacute;cada no ha sido ganada, intente nuevamente m&aacute;s tarde <strong> votando a otra gente </strong>');
							swingCfk();
						}
					}
				})
				.fail(function(data) {
	
							swingCfk();
						})
				.always(function(data) {
					swingOffDecade();
					$('.ganar-decada').closest('fieldset').removeAttr('disabled');
				});
	}
	return false;
}
