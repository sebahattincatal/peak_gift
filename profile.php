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
        <link rel="stylesheet" href="assets/css/profile.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>

<body>

<?php include 'public/header.html'; ?>

<div class="container">
  <h2>Kullanıcı Bilgileri Tablosu</h2><br>
  <strong>Profil bilgileriniz aşağıdaki gibidir</strong>            
  <table class="table">
    <thead>
      <tr>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Email</th>
        <th>Hediyelerim</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php ucfirst($user->get_fullname($uid)); ?></td>
        <td><?php ucfirst($user->get_surname($uid)); ?></td>
        <td><?php $user->get_email($uid); ?></td>
        <td><?php $user->get_gifts($uid); ?></td>
      </tr>
    </tbody>
  </table>

</div>

</body>
</html>
