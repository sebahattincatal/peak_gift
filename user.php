<?php
    session_start();
    require "vendor/autoload.php";
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
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-9"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Anasayfa</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/user.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

<body>

<?php include 'public/header.html'; ?>

<div class="container">
<h2>Oyunu oynayan kullanıcıların listesi</h2><br>
<strong>Gönderebileceğin hediyeleri ve hangi kullanıcıya gönderebileceğini seçmelisin..!</strong><br><br>

    <form action="gifts.php" method="post">
        <select name="test" required>
          <?php $user->get_all_email($uid); ?>
        </select>

        <select name="gift" required>
          <?php $user->get_all_gifts(); ?>
        </select>

        <input type="submit" value="Hediye Gönder" class="btn btn-md btn-success"/>
    </form>
</div>

</body>
</html>
