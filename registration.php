<?php
    include_once 'include/class.user.php';
    $user = new User();

    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $register = $user->reg_user($name, $surname, $password, $email);
        if ($register) {
            // user create success
            echo "<div class='alert alert-success' style='text-align:center'>
            <strong>Kayıt işlemi başarılı.</strong> Giriş Yapmak için <a href='login.php'>buraya</a> tıklayın.
            </div>";
        } else {
            // user create unsuccessful
            echo "<div class='alert alert-danger' style='text-align:center'>
    <strong>Kayıt işlemi başarısız.</strong> Bu email adresi ile daha önce kayıt yapılmış.
  </div>";
        }
    }
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-9"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Kullanıcı Kayıt</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/js/registration.js" />
    </head>
    <body>
        <div id="container" class="container">
            <h1>Kayıt Ol</h1>
            <form action="" method="post" name="reg">
                <table class="table">
                    <tr>
                        <th>Ad:</th>
                        <td><input type="text" name="name" required></td>
                    </tr>
                    <tr>
                        <th>Soyad:</th>
                        <td><input type="text" name="surname" required></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><input type="email" name="email" required></td>
                    </tr>
                    <tr>
                        <th>Şifre:</th>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input class="btn btn-lg btn-primary" type="submit" name="submit" value="Kayıt Ol" onclick="return(submitreg());">
                            <a href="login.php" class = "btn btn-lg btn-danger">Üyeliğim var! Giriş Yap</a></td>
                    </tr>            
                </table>
            </form>
        </div>
    </body>
</html>
