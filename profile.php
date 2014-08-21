<?php
include 'blocks/header.php';
$uid = $_GET['id'];
$uid = mysql_real_escape_string($uid);
$result = mysql_query("SELECT name,bdate,sex,karma FROM users WHERE id=$uid");
$resname = mysql_fetch_assoc($result);
$result2 = mysql_query("SELECT big FROM avatars WHERE id=$uid");
$resname2 = mysql_fetch_assoc($result2);
$name = $resname['name'];
$name = mysql_real_escape_string($name);
$name = htmlspecialchars($name);
head ($name . ' - ClanWars');
$avatar = $resname2['big'];
$bdate = $resname['bdate'];
$sex = $resname['sex'];
$karma = $resname['karma'];
echo "
$name
<img src='" . $avatar . "' alt='" . $name . "' class='img-thumbnail'>
$bdate
$sex
$karma
Какой-то текст ";
include 'blocks/footer.php';


?>