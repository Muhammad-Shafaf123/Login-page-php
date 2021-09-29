<?php
session_start();
if(isset($_SESSION["sessionEmail"])){
  header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login Page</title>
  </head>
  <body>

    <?php
    include('dbconnect.php');
    if(isset($_POST['logButton'])){
      $userEmail = $_POST['emailAddress'];
      $userPassword = $_POST['userPassword'];
      if ($userEmail == "" or $userPassword == ""){
        $emptyEmail = "Please fill in the required field. ";
      }
      $sqlConnect = "SELECT * FROM UserRegister where Email='$userEmail'";
      $result = $connector->query($sqlConnect);
      if($result->num_rows > 0){
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if(password_verify($userPassword,$row['Password'])){
            session_start();
            $_SESSION["sessionEmail"] = $userEmail;
              header("Location:home.php");
            }else {
              $errorPassword = "incorrect password.";
            }
        }
      }else{
        if($userEmail != "" or $userPassword != ""){
          $registerAlert = "Please register your self.";
        }
      }
      $connector -> close();
    }
    ?>

    <div class="root-div-home">
      <div class="container">
        <div class="form-box-main">
          <div class="form-box">
              <h3 class="form-heading">Login</h3>
                <div class="left-form">
                    <div class="facebook-logo">
                      <a href="https://www.facebook.com/"><i class="fa fa-facebook facebook" ></i></a>
                    </div>
                    <div class="twitter-logo">
                      <a href="https://twitter.com/?lang=en"><i class="fa fa-twitter twitter"></i></a>
                    </div>
                  <p class="note">or use your account</p>
                  <form class="" action="index.php" method="post">
                      <input class="input-field" type="email" id="email_address" name="emailAddress" placeholder="Email">
                      <input class="input-field" type="password" id="password_field" name="userPassword" placeholder="Password">
                      <p class="warning-message">
                        <?php
                        //warning messages.
                         echo $registerAlert;
                         echo $emptyEmail;
                         echo $errorPassword;
                         echo $dbError;
                         ?>
                      </p>
                      <p class="user-text">New User? <a class="form-page-link" href="register.php">Register</a></p>
                      <button class="btn-login"  type="submit" name="logButton">Log in</button>
                  </form>
                </div>
          </div>
          <div class="blank-box"></div>
        </div>
    </div>
    </div>
  </body>
</html>
