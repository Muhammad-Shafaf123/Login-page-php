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
    // get the input field values.
    if(isset($_POST['regButton'])){
      $userEmail = $_POST["Email"];
      $userPassword = $_POST["Password"];
      if ($userEmail == "" or $userPassword == ""){
        $emptyEmail = "Please fill in the required field. ";
      }
      // password encryption.
      $encryptedPswd = password_hash($userPassword, PASSWORD_DEFAULT);
      //check email is already used or not.
      $sqlConnect = "SELECT Email FROM UserRegister where Email='$userEmail'";
      $result = $connector->query($sqlConnect);
      if ($result->num_rows > 0) {
        // get the data of each row
        while($row = $result->fetch_assoc()) {
          if ($userEmail != "" or $userPassword != ""){
            $excitingEmail =  "This email or password is already taken...!";
          }
        }
      }else {
        // if it's a new user and register to table
        if ($userEmail != "" and $userPassword != ""){
          $sqlConnect = "INSERT INTO UserRegister VALUES ('$userEmail', '$encryptedPswd')";
          if ($connector -> query($sqlConnect) === TRUE){
            header("Location: index.php");
            exit();
          }
        }
      }
      $connector -> close();
    }
    ?>

    <div class="root-div-home">
      <div class="container">
        <div class="form-box-main">
          <div class="form-box">
              <h3 class="form-heading">Register</h3>
                <div class="left-form">
                    <div class="facebook-logo">
                      <a href="https://www.facebook.com/"><i class="fa fa-facebook facebook" ></i></a>
                    </div>
                    <div class="twitter-logo">
                      <a href="https://twitter.com/?lang=en"><i class="fa fa-twitter twitter"></i></a>
                    </div>
                  <p class="note">or use your account</p>
                  <form class=""  method="post">
                      <input class="input-field" type="email" id="email_address" name="Email" placeholder="Email">
                      <input class="input-field" type="password" id="password_field" name="Password" placeholder="Password">
                      <p class="warning-message">
                        <?php
                        //warning messages
                        echo $registerdEmail;
                        echo $excitingEmail;
                        echo $emptyEmail;
                        echo $succesMessage;
                        echo $dbError;
                        ?>
                      </p>
                      <p class="user-text">Already have a n account? <a class="form-page-link" href="index.php">Login</a></p>
                      <button class="btn-login" type="submit" name="regButton"> Register</button>
                  </form>
                </div>
          </div>
          <div class="blank-box"></div>
        </div>
    </div>
    </div>
  </body>
</html>
