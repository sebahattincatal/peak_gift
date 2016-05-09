<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) { 
		extract($_REQUEST);   
	    $login = $user->check_login($email, $password);
	    if ($login) {
	        // Kayıt varsa anasayfaya yönlendiriyoruz.
	       header("location:user.php");
	    } else {
	        // Kayıt yoksa uyarı veriyoruz.
	        echo "<script>alert('Bu kullanıcı bilgilerine sahip kullanıcı bulunamadı.')</script>";  
	    }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Hediye Gönderme Oyunu Giriş Sayfası</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/js/login.js" />
		<!--<script language="javascript" type="text/javascript"> 
            
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
		</script>-->
	</head>

	<body>
		<div id="container" class="container">
			<h1>Giriş Yapın</h1>
			<form action="" method="post" name="login">
				<table class="table " width="400">
					<tr>
						<th>Eposta:</th>
						<td><input type="text" name="email" required></td>
					</tr>
					<tr>
						<th>Şifre:</th>
						<td><input type="password" name="password" required></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input class = "btn btn-lg btn-primary" type = "submit" name = "submit" value = "Login" onclick = "return(submitlogin());">
						<a href="registration.php" class = "btn btn-lg btn-danger">Üye Ol</a></td>
					</tr>		
				</table>
			</form>
		</div>
	</body>
</html>