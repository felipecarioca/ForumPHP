function loadByAjax(div, file) {
	$('#' + div).load(file);
}

function loadByAjax(div, file, form) {
	$('#' + div).load(file, $('#' + form).serializeArray());
}