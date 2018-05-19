<?php session_start(); ?>
<!DOCTYPE html>
<html >
<head>
<title>CSS Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="header">
      <?php include 'include/header.php' ?>
</div>

<div class="row">
  <div class="column side" style="background-color:#aaa;">
    <?php

           include 'include/menu.php';
    ?>
  </div>
  <div class="column middle" style="background-color:#bbb;">       
        <img src="image/bkground.jpg" width="100%" height="100%">
  </div>
  <div class="column side" style="background-color:#ccc;">Quảng cáo</div>
</div>

<div class="footer">
  <?php include 'include/footer.php' ?>
</div>

</body>
</html>
