<?php
    session_start();
    include_once 'include/class.user.php';

    $user = new User();
    $uid = $_SESSION['uid'];

    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $gifts_send = $user->gifts_send($uid);
        if ($gifts_send) {
            // gift create success
            echo "<div style='text-align:center'>Hediyeniz gönderildi.</div>";
        } else {
            // gift create unsuccessful
            echo "<div style='text-align:center'>Günde bir tane hediye gönderebilirsiniz.</div>";
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Anasayfa</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/gifts.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

<body>

    <?php include 'public/header.html'; ?>

<!--<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="navbar-wrapper">
                <div class="container">
                    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                        class="icon-bar"></span><span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Hediye Gönder Oyunu</a>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="user.php">Hediye Gönder</a></li>
                                    <li><a href="gift_require.php">Hediye İste</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Hesabım
                                        <b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="navbar-content">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <span><?php ucfirst($user->get_fullname($uid)); ?></span>
                                                            <p class="text-muted small">
                                                                <?php $user->get_email($uid); ?></p>
                                                            <div class="divider">
                                                            </div>
                                                            <a href="profile.php" class="btn btn-primary btn-sm active">Profilini Gör</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="navbar-footer">
                                                    <div class="navbar-footer-content">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <a href="home.php?q=logout" style="text-align:center">Çıkış Yap</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>-->

<?php  
    $uid = $_SESSION['uid'];

    $result = $user->gifts_send($_POST['test'], $uid, $_POST['gift']); 

    if ($result) 
    {
?>

<div class="container">
  <h2>Hediye Gönderme Durumu</h2>
  <div class="alert alert-success">
    <strong>Hediye Gönderme Başarılı! </strong> Hediyeniz gönderildi.  
  </div>
</div>
<?php } else { ?>

<div class="container">
  <h2>Hediye Gönderme Durumu</h2>
  <div class="alert alert-danger">
    <strong>Hediye Gönderme Başarısız! </strong> Aynı gün içerisinde 1 tane hediye gönderebilirsiniz.  
  </div>
</div>
<?php  } ?>

</body>
</html>
