<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
  </head>
  <body>



    <?php
    $Email = $_POST["Email"];
    $Password = $_POST["Password"];

    $serverName = "localhost";
    $userName = "root";
    $password = "root";
    $dataBase = "userDB";
    $connector = new mysqli($serverName, $userName, $password, $dataBase); // connecting to dataBase.
    if ($connector->connect_erro){
      echo "Error to connect dataBase";
    }
     // get the email and password.
    $sql = "SELECT Email, Password FROM UserRegister";
    $result = $connector->query($sql);
    //check the email is valid or not.
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        if ($Email == $row["Email"]){ // check email is already existend.
          $registerdEmail = "Email is already registerd.";
          die();
        }else {
          $sql = "INSERT INTO UserRegister VALUES ('$Email', '$Password')";
          if ($connector -> query($sql) === TRUE){
             echo "Success";
           }else {
             echo "Noo";
           }
      }
    } else {
      echo "0 Result";
     }
    }
    $connector -> close();
    ?>



    <div class="root-div-home">
      <div class="container">
        <div class="form-box-main">
          <div class="form-box">
              <h3 class="form-heading">Register</h3>
                <div class="left-form">
                    <div class="facebook-logo">
                      <i class="fa fa-facebook facebook" ></i>
                    </div>
                    <div class="twitter-logo">
                      <i class="fa fa-twitter twitter"></i>
                    </div>
                  <p class="note">or use your account</p>
                  <form class="" action="register.php" method="post">
                      <input class="input-field" type="text" id="email_address" name="Email" placeholder="Email">
                      <input class="input-field" type="text" id="password_field" name="Password" placeholder="Password">
                      <p id="warning-message"><?php echo $registerdEmail; ?></p>
                      <p class="user-text">Already have a n account? <a class="form-page-link" href="index.html">Login</a></p>
                      <button class="btn-login" type="submit" name="button"> Register</button>
                  </form>
                </div>
          </div>
          <div class="blank-box"></div>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="stylejs.js">
    </script>
  </body>
</html>
