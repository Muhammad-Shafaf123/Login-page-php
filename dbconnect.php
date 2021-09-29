<?php
$serverName = "localhost";
$userName = "root";
$password = "root";
$dataBase = "userDataBase";
// dataBase connection.
$connector = new mysqli($serverName, $userName, $password);
// create dataBase.
$sqlConnect = "CREATE DATABASE IF NOT EXISTS userDataBase";
if($connector->query($sqlConnect)=== TRUE){
  $connector = new mysqli($serverName, $userName, $password, $dataBase);
  //create table
  $sqlTable = "CREATE TABLE IF NOT EXISTS UserRegister(Email varchar(255) NOT NULL, Password varchar(255) NOT NULL)";
  $connector->query($sqlTable);
}
 ?>
