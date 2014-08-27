<?php
include 'blocks/header.php';
$clan = $db->fetch($db->query('SELECT * FROM clans WHERE id=?i',$_GET['id']));
head ('Клан ' . $clan['name'],'main');
?>
<div style='float: left; width: 50%; height: 100%; background: white;'>
<div class='username'><img src='css/cavatars/<? echo $clan['id']; ?>.png' style='width: 25px; height: 25px;'><? echo htmlspecialchars($clan['name']); ?></div>
<img src="css/cavatars/<? echo $clan['id']; ?>.png">
<br>Рейтинг:
<? echo $clan['rating']; ?>
<br>Побед:
<? echo $clan['vict']; ?>
<br>Поражений:
<? echo $clan['lose']; ?>
<br>Ничьих:
<? echo $clan['drow']; ?>
<br>Враги:
<? echo $clan['enemy']; ?>
<br>Союзники:
<? echo $clan['ally']; ?>
<br>Тип клана:
<? echo $clan['type']; ?>
<br>Тег клана:
<? echo htmlspecialchars($clan['tag']); ?>
<br>Информация о клане:
<? echo htmlspecialchars($clan['claninfo']); ?>
<br>1:
<? echo htmlspecialchars($clan['head']) . ":<br>";
?>

<br>2:
<? echo htmlspecialchars($clan['officers']); ?>
<br>3:
<? echo htmlspecialchars($clan['lofficers']); ?>
<br>4:
<? echo htmlspecialchars($clan['lowoff']); ?>
<br>5:
<? echo htmlspecialchars($clan['rdv']); ?>
</div>
<div style='float: left; width: 50%; height: 100%; background: rgba(255,255,255,0.7);'><? 
function member ($rank) { 
global $db,$clan;
$member = $db->query('SELECT id,name FROM users WHERE cl1=?i and cl?irank=?i',$clan['id'],$clan['type'],$rank);
while($data = mysqli_fetch_array($member)) {
$avatar = $db->fetch($db->query('SELECT small FROM avatars WHERE id=?i',$data['id']));
echo "<img src='" . $avatar['small'] . "' style='width: 48px; height: 48px;'><p>",$data['name'],"</p>";
}
};
member(1);
include 'blocks/news.php'; ?></div>
<?
include 'blocks/footer.php';
?>