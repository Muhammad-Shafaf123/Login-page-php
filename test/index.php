<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login Page</title>
  </head>
  <body>
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
                  <form class="" action="insert.php" method="post">
                      <input class="input-field" type="text" id="email_address" name="emailAddress" placeholder="Email">
                      <input class="input-field" type="text" id="password_field" name="userPassword" placeholder="Password">
                      <p class="user-text">New User? <a class="form-page-link" href="Register.html">Register</a></p>
                      <button class="btn-login" onclick="formValidation()" type="submit" name="button">Log in</button>
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
