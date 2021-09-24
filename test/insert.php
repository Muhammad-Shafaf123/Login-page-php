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
