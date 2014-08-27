<?php
$result = $db->query("SELECT id,name,rating,author_id FROM news ORDER BY id desc LIMIT ?i",10);

echo <<<START
            <h1 class="centr">Новости</h1>
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="rowname">Название</th>
                      <th class="rowauthor">Автор</th>
                      <th class="rowrating">Рейтинг</th>
                    </tr>
                  </thead>
                  <tbody>
START;

function AuthorName($id)
    {
      global $db;
        $query2 = $db->query('SELECT name FROM users WHERE id=?i',$id);
        $resname = mysqli_fetch_array($query2);
        return $resname['name'];
    }


while($data = mysqli_fetch_array($result)) {

$news = array(
        'id' => $data['id'],
        'author_id' => $data['author_id'],
        'authorname' => AuthorName($data['author_id']),
        'rating' => $data['rating'],
        'newsname' => $data['name']
    );
if ($news['rating'] >= 100)
    {$rating_color = 'green';}
elseif ($news['rating'] < -10)
    {$rating_color = 'red';}
else {
  $rating_color = 'black';
}

$location = "location.href='/news.php?id=" . $news['id'] . "'";
$userlink = "location.href='/profile.php?id=" . $news['author_id'] . "'";
    echo "<tr><td class='btn2' onclick=",$location, ">" . htmlspecialchars($news['newsname']) . "</td><td class='btn2' onclick=",$userlink, ">" . htmlspecialchars($news['authorname']) . "</td><td style='color: $rating_color'>",$news['rating'],"</td></tr>";

}

echo <<<END
                  </tbody>
                </table>
                <br>
            </div>
        </div> <!-- /row -->
    </div> <!-- /container -->
END;
include_once 'blocks/footer.php';
?>