function submitreg() {
    var form = document.reg;
    if(form.name.value == ""){
        alert( "İsminizi Girin." );
        return false;
    }
    else if(form.surname.value == ""){
        alert( "Soyadınızı Girin." );
        return false;
    }
    else if(form.password.value == ""){
        alert( "Şifre Girin." );
        return false;
    }
    else if(form.uemail.value == ""){
        alert( "Email Girin." );
        return false;
    }
}