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
        <title>Anasayfa</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <style type="text/css">
                /* Special class on .container surrounding .navbar, used for positioning it into place. */
        .navbar-wrapper {
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          z-index: 20;
          margin-top: 20px;
        }

        /* Flip around the padding for proper display in narrow viewports */
        .navbar-wrapper .container {
          padding-left: 0;
          padding-right: 0;
        }
        .navbar-wrapper .navbar {
          padding-left: 15px;
          padding-right: 15px;
        }

        .navbar-content
        {
            width:320px;
            padding: 15px;
            padding-bottom:0px;
        }
        .navbar-content:before, .navbar-content:after
        {
            display: table;
            content: "";
            line-height: 0;
        }
        .navbar-nav.navbar-right:last-child {
        margin-right: 15px !important;
        }
        .navbar-footer 
        {
            background-color:#DDD;
        }
        .navbar-footer-content { padding:15px 15px 15px 15px; }
        .dropdown-menu {
        padding: 0px;
        overflow: hidden;
        }
    </style>            

    </head>

<body>

<div class="container">
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
                                <a class="navbar-brand" href="#">Hediye Gönder</a>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Anasayfa</a></li>
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

<div class="container">
<h2>Oyunu oynayan kullanıcıların listesi</h2><br>
<strong>Hediye gönderebileceğin kullanıcılar aşağıdaki gibidir.</strong> <br>

<form action="gifts.php" method="post" name="login">
<table class="table table-bordered">
      <tr>
        <th>Kullanıcı No</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Email</th>
        <th class="td-actions">Gönderebileceğin Hediyeler</th>
      </tr>
      <tr>
        <td><?php $user->get_all_users($uid); ?></td>
      </tr>
</table>
</form>

</div>

<script type="text/javascript">

</script>

</body>
</html>
