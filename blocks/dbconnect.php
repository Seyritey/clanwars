<?php
header ("Content-Type: text/html; charset=utf-8");
session_start();

$dbhost = "localhost";
$dbname = "test";
$dblogin = "root";
$dbpass = "07051995";

$dbconnect = mysql_connect($dbhost,$dblogin,$dbpass);
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
if(mysql_select_db($dbname)) {}
else die ("Не могу подключиться к базе данных $dbname!");
?>