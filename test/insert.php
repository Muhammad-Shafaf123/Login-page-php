<?php
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

$sql = "SELECT Email FROM UserRegister where Email='$Email'";
$result = $connector->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "used email.";
  }
} else {
  $sql = "INSERT INTO UserRegister VALUES ('$Email', '$Password')";
  if ($connector -> query($sql) === TRUE){
     echo "Success";
   }
}

// $encryptedValue = password_hash($Password, PASSWORD_DEFAULT);
// echo $encryptedValue;
// echo $Email;


//$sql = "INSERT INTO UserRegister VALUES ('$Email', '$encryptedValue')";
// if ($connector -> query($sql) === TRUE){
//   echo "Success";
// }else {
//   echo "Noo";
// }
$connector -> close();
?>
