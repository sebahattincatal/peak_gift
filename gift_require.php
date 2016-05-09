<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();

    $uid = $_SESSION['uid'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-9"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Anasayfa</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/gift_require.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

<body>

<?php include 'public/header.html'; ?>

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
