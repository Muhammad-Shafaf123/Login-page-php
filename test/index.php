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
    if(isset($_POST['logButton'])){
    $serverName = "localhost";
    $userName = "root";
    $password = "root";
    $dataBase = "userDB";
    $connector = new mysqli($serverName, $userName, $password, $dataBase); //connection of dataBase
    if ($connector->connect_erro){
      echo "Error";
    }
    $Email = $_POST['emailAddress'];
    $Password = $_POST['userPassword'];

    $sqlConnect = "SELECT Email FROM UserRegister where Email='$Email'";
    $result = $connector->query($sqlConnect);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $emailAlert = "this email is aleary used";
        session_start();
        $_session['uname']=$row['Email'];
        header("Location:home.php");
      }
    } else {
      $registerAlert = "Please register your self.";
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
                      <i class="fa fa-facebook facebook" ></i>
                    </div>
                    <div class="twitter-logo">
                      <i class="fa fa-twitter twitter"></i>
                    </div>
                  <p class="note">or use your account</p>
                  <form class="" action="index.php" method="post">
                      <input class="input-field" type="email" id="email_address" name="emailAddress" placeholder="Email">
                      <input class="input-field" type="password" id="password_field" name="userPassword" placeholder="Password">
                      <p class="warning-message"><?php echo $registerAlert; ?></p>
                      <p class="user-text">New User? <a class="form-page-link" href="register.php">Register</a></p>
                      <button class="btn-login" onclick="formValidation()" type="submit" name="logButton">Log in</button>
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
