<?php
session_start();
if (!isset($_SESSION["sessionEmail"])){
  header("Location:index.php");
}
$registerName = $_SESSION["sessionEmail"];


 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body onload="startCounter()">
    <div class="root-home-page">
      <h2 class="title-heading">Hello <?php echo $registerName; ?>!</h2>
      <h3 class="start-message-text">Our service will be ready in
      <span class="show-timer-count" id="timer"></span> </h3>
      <a class="logout-link" href="logout.php">logout</a>
      <i class="fab fa-facebook-f"></i>
    </div>
    <script type="text/javascript" src="assets/js/countjs.js"></script>
  </body>
</html>
