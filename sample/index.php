<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
  </head>
<body>
  <?php
  $serverName = "localhost";
  $userName = "root";
  $password = "root";
  $dataBase = "userDB";

  $connector = new mysqli($serverName, $userName, $password, $dataBase);
  if ($connector->connect_erro){
    echo "Error";
  }
  $Email = $_POST['emailAddress'];
  $Password = $_POST['password'];

  $sql = "INSERT INTO UserRegister VALUES ('$Email', '$Password')";
  if ($connector -> query($sql) === TRUE){
    echo "Success";
  }else {
    echo "Noo";
  }
  $connector -> close();
  ?>
<form class="" action="index.php" method="post">
  <label for="Username">User name</label>
  <input type="text" name="emailAddress" value=""><br><br>
  <label for="Password">password</label>
  <input type="text" name="password" value=""><br><br>
  <input type="submit" name="" value="submit">
</form>

</body>
</html>
