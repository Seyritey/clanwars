<?php
$query = "SELECT id,name,rating,author_id FROM news ORDER BY id desc";
$result = mysql_query($query);


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
        $query2 = "SELECT name FROM users WHERE id=$id";
        $result23 = mysql_query($query2);
        $resname = mysql_fetch_assoc($result23);
        return mysql_real_escape_string($resname['name']);
    }
$rating_color = "black";

for($i=0;$i<10;$i++) { 
$id = mysql_result($result,$i,id);
$author_id = mysql_result($result,$i,author_id);
$authorname = AuthorName($author_id);
$rating = mysql_result($result,$i,rating);
if ($rating >= 100)
    {$rating_color = green;}
else {$rating_color = black;};
if ($rating < 0)
    {$rating_color = red;};
$location = "location.href='/news.php?id=$id'";
$newsname = mysql_result($result,$i,name);
$userlink = "location.href='/profile.php?id=$author_id'";
    echo "<tr><td class='btn2' onclick=",$location, ">" . htmlspecialchars($newsname) . "</td><td class='btn2' onclick=",$userlink, ">" . htmlspecialchars($authorname) . "</td><td style='color: $rating_color'>$rating</td></tr>";
 }
echo <<<END
                  </tbody>
                </table>
            </div>
        </div> <!-- /row -->
    </div> <!-- /container -->
END;

include_once 'blocks/footer.php';
?>