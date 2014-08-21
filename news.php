<?php
include 'blocks/header.php';
$nid = mysql_real_escape_string((int)$_GET['id']);
$query = "SELECT rating, name, author_id, message,ctime,etime FROM news WHERE id = " . $nid;
$res = mysql_query($query);
$result = mysql_fetch_assoc($res);
$rating = $result['rating'];
(string)$name = $result['name'];
head ($name . ' - ClanWars');

$author_id = $result['author_id'];
(string)$message = mysql_real_escape_string($result['message']);

$query2 = "SELECT name FROM users WHERE id=$author_id";
$res2 = mysql_query($query2);
$result2 = mysql_fetch_assoc($res2);
$authorname = mysql_real_escape_string($result2['name']);
$ctime = $result['ctime'];
$etime = $result['etime'];
$rating_color = "#666";
if (($rating >= 0) and ($rating < 100))
	{$rating_color = "green";}
elseif ($rating >=100)
	{$rating_color = "#18E223";}
elseif (($rating < 0) and ($rating > -100))
	{$rating_color = "#D82D23";}
elseif ($rating <=100)
	{$rating_color = "#FA3434";}
$query3 = "SELECT id,author_id,comment,ctime FROM comments WHERE news_id = $nid ORDER BY ctime ASC";
$res3 = mysql_query($query3);
$n = mysql_num_rows($res3);

echo "
			<div class='transbox'>
				<div class='headname'><h3>" . htmlspecialchars($name) . "</h3></div>
				<div class='rating'> 
					
					<div class='plusminus'><a href='/profile.php?id=$author_id'>" . htmlspecialchars($authorname) . "</a><a style='color: $rating_color;'>$rating</a> <button type='button' class='ratbtn btn btn-success'>▲</button> <button type='button' class='ratbtn btn btn-danger'>▼
					</button></div>
				</div>
			</div>
			<div class='newstext'>" . htmlspecialchars($message) . "</div><div class='mini2'>Комментариев: $n </div><div class='mini'>Создана: $ctime | Редактирована: $etime</div>
			<br><br>";




function AuthorName2($id)
    {
        $query233 = "SELECT name FROM users WHERE id=$id";
        $result23 = mysql_query($query233);
        $result23 = mysql_fetch_assoc($result23);
        $resname =  mysql_real_escape_string($result['name']);
        return $resname;
    }
function AuthorAvatar($udid)
    {
        $query233 = "SELECT small FROM avatars WHERE id=$udid";
        $result23 = mysql_query($query233);
        $resname = mysql_fetch_assoc($result23);
        return $resname['small'];
    }


for($i=0;$i<$n;$i++) { 
$id = mysql_result($res3,$i,id);
$author_id = mysql_result($res3,$i,author_id);
$authorname = AuthorName2($author_id);
$comment = mysql_result($res3,$i,comment);
$ctime = mysql_result($res3,$i,ctime);
$avatar = AuthorAvatar($author_id);


echo "
			<div class='comment'>
				<div class='avatar'><img src='$avatar' width='100px' height='100px' class='img-thumbnail'><br>
				<a class='marg' href='/profile.php?id=$author_id'>" . htmlspecialchars($authorname) . "</a><div class='timecc'>$ctime</div></div>
				<div class='comm'>" . htmlspecialchars($comment) . "</div>
			</div>";
}
include 'blocks/footer.php'
?>

