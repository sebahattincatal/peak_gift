function submitlogin() {
	var form = document.login;
	if(form.email.value == ""){
		alert( "Email Girin" );
		return false;
	}
	else if(form.password.value == ""){
		alert( "Parola Girin" );
		return false;
	}	 
}