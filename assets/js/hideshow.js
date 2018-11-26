var Password =false;

function changePwdView() {
	var getPwdview = $("#Password");

	if (Password === false){
		getPwdview.attr("type", "text");
		Password = true;
	}
	else if (Password === true){
		getPwdview.attr("type", "password");
		Password = false;
	}
}