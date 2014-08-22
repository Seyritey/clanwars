<?php
include 'blocks/header.php';
$uid = (int)$_GET['id'];
$result = $db->query('SELECT name,bdate,sex,karma FROM users WHERE id=?i',$uid);
$resname = mysqli_fetch_array($result);
$result2 = $db->query('SELECT big FROM avatars WHERE id=?i',$uid);
$resname2 = mysqli_fetch_array($result2);
$name = $resname['name'];
$name = htmlspecialchars($name);
head ($name . ' - ClanWars');
echo "$name <img src='" . $resname2['big'] . "' alt='" . $name . "' class='img-thumbnail'>
",$resname['bdate'],
$resname['sex'],
$resname['karma'],"
Какой-то текст ";
include 'blocks/footer.php';


?>