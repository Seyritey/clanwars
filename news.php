<?php
include 'blocks/header.php';
$nid = ((int)$_GET['id']);
$query = $db->query('SELECT rating, name, author_id, message,ctime,etime FROM news WHERE id =?i',$nid);
$result = mysqli_fetch_array($query);
(int)$rating = $result['rating'];
(string)$name = $result['name'];
head ($name . ' - ClanWars');

$author_id = $result['author_id'];
(string)$message = $result['message'];

$query2 = $db->query('SELECT name FROM users WHERE id=?i',$author_id);
$result2 = mysqli_fetch_array($query2);
$authorname = $result2['name'];
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
$query = $db->query('SELECT id,author_id,comment,ctime FROM comments WHERE news_id=?i ORDER BY ctime ASC',$nid);
$n = mysqli_num_rows($query);

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
        global $db;
        $query233 = $db->query('SELECT name FROM users WHERE id=?i',$id);
        $resname = mysqli_fetch_array($query233);
        return htmlspecialchars($resname['name']);
    }
function AuthorAvatar($udid)
    {
        global $db;
        $query233 = $db->query('SELECT small FROM avatars WHERE id=?i',$udid);
        $resname = mysqli_fetch_array($query233);
        return $resname['small'];
    }

while($data = mysqli_fetch_array($query)) {

$avalink = "location.href='/profile.php?id=" . $data['author_id'] . "'";
echo "<div id='comments'>
    <div class='list'>
        <li>
            <div class='body'>
                <div class='thumb'>
                    <img alt='' src='" . AuthorAvatar($data['author_id']) . "'' onclick=" . $avalink . ">
                </div>
                <div class='leftpointer'></div>
                <div class='quote'>
                    <div class='textinfo'>
                        <a href='/profile.php?id=" . $data['author_id'] . "' class='user'>" . AuthorName2($data['author_id']) . "</a>
                        <span class='time'>" . $data['ctime'] . "</span>
                    </div>
                    <p>" . htmlspecialchars($data['comment']) . "</p>
                </div>
            </div>
        </li>
    </div>
</div>";
}
include 'blocks/footer.php'
?>