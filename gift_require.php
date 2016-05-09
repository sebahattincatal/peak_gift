<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];

    if (!$user->get_session()){
       header("location:login.php");
    }

    if (isset($_GET['q'])){
        $user->user_logout();
        header("location:login.php");
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Anasayfa</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/gift_require.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <!--<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">-->
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
                                <a class="navbar-brand" href="user.php">Hediye Gönder Oyunu</a>
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
                                                </div><br>
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
</div>-->

<div class="container">
<h2>Oyunu oynayan kullanıcıların listesi</h2><br>
<strong>İsteyebileceğin hediyeleri ve hangi kullanıcıdan istediğini seçmelisin..!</strong><br><br>

    <form action="gift_claim.php" method="post">
        <select name="kadi" required>
          <?php $user->get_all_email($uid); ?>
        </select>

        <select name="gift" required>
          <?php $user->get_all_gifts(); ?>
        </select>

        <input type="submit" value="Hediye Talep Et" class="btn btn-md btn-success"/>
    </form>
</div>

</body>
</html>
