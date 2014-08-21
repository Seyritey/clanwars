<?php
$client_id = '4510119'; // ID приложения
$client_secret = 'lGnqmBphXLzjW4xQKJca'; // Защищённый ключ
$redirect_uri = 'http://clanwars'; // Адрес сайта

$url = 'http://oauth.vk.com/authorize';


    $params = array(
        'client_id'     => $client_id,
        'redirect_uri'  => $redirect_uri,
        'response_type' => 'code'
    );

if (isset($_GET['code'])) {
    $result = false;
    $params = array(
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $_GET['code'],
        'redirect_uri' => $redirect_uri
    );

    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);

    if (isset($token['access_token'])) {
        $params = array(
            'uids'         => $token['user_id'],
            'fields'       => 'uid,first_name,last_name,screen_name,sex,bdate,photo_100,photo_400_orig',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }

    $query = mysql_query("SELECT COUNT(social_id) FROM users WHERE social_id='".mysql_real_escape_string($userInfo['uid'])."'");
    $query24 = "SELECT id,name FROM users WHERE social_id=" . mysql_real_escape_string($userInfo['uid']);
    $res24 = mysql_query($query24);
    $result24 = mysql_fetch_assoc($res24);
    $login = mysql_real_escape_string($result24['name']);
    $uid = $result24['id'];
    if(mysql_result($query, 0) > 0)

    {

        $_SESSION['login'] = $login;
        $_SESSION['uid'] = $uid;
        header ("Location: index.php");
    }
    elseif(count($err) == 0)
    {
    	$name = mysql_real_escape_string($userInfo['first_name']) . " " . mysql_real_escape_string($userInfo['last_name']);
    	$social_id = $userInfo['uid'];
    	$avatar_big = $userInfo['photo_400_orig'];
        $avatar_small = $userInfo['photo_100'];
        $sex = $userInfo['sex'];
        $bdate = $userInfo['bdate'];
    	$result = mysql_query("INSERT INTO users SET name='".$name."', social_id='.$social_id.', sex='.$sex.', bdate='$bdate'") or die("В процессе регистрации/авторизации произошла ошибка, обратитесь к администрации в скайп: ClanwarsContact");
        $query24 = "SELECT id,name FROM users WHERE social_id=" . $userInfo['uid'];
        $res24 = mysql_query($query24);
        $result24 = mysql_fetch_assoc($res24);
        $login = mysql_real_escape_string($result24['name']);
        $uid = $result24['id'];
        $ress = mysql_query("INSERT INTO avatars SET id='".$uid."', big='$avatar_big', small='$avatar_small'");
            $_SESSION['login'] = $login;
            $_SESSION['uid'] = $uid;
            header ("Location: index.php");
    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."<br>";

        }}
    }
?>
