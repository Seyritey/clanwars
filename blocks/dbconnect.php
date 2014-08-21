<?php
header ("Content-Type: text/html; charset=utf-8");
session_start();

$dbhost = "mysql47.1gb.ru";
$dbname = "gb_clanwarsme";
$dblogin = "gb_clanwarsme";
$dbpass = "rapemegithub";

$dbconnect = mysql_connect($dbhost,$dblogin,$dbpass);
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
  }
if(mysql_select_db($dbname)) {}
else die ("Не могу подключиться к базе данных $dbname!");
mysql_query("SET NAMES 'utf8'"); 
?>