<?php
include_once 'dbconnect.php';
global $db;
$client_id = '4510119';
$client_secret = 'lGnqmBphXLzjW4xQKJca';
$redirect_uri = 'http://clanwars/blocks/vkauthor.php';

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
            'fields'       => 'uid,first_name,last_name,sex,bdate,photo_100,photo_400_orig',
            'access_token' => $token['access_token']
        );

        $userInfo = json_decode(file_get_contents('https://api.vk.com/method/users.get' . '?' . urldecode(http_build_query($params))), true);
        if (isset($userInfo['response'][0]['uid'])) {
            $userInfo = $userInfo['response'][0];
            $result = true;
        }
    }
if ($db->numRows($db->query("SELECT id FROM users WHERE social_id=?i",$userInfo['uid'])) > 0) {
    $loaduser = $db->getRow("SELECT id,name FROM users WHERE social_id=?i",$userInfo['uid']);
        $_SESSION['login'] = $loaduser['name'];
        $_SESSION['uid'] = $loaduser['id'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        function get_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

    	$addtobase = $db->query("INSERT INTO users SET name=?s, social_id=?i, sex=?i, bdate=?s, ip=?s",$userInfo['first_name'] . ' ' . $userInfo['last_name'],$userInfo['uid'],$userInfo['sex'],$userInfo['bdate'],get_ip()) or die("В процессе регистрации/авторизации произошла ошибка, обратитесь к администрации в скайп: ClanwarsContact");
        $auth = $db->fetch($db->query("SELECT id FROM users WHERE social_id=?i",$userInfo['uid']));
        $ress = $db->query("INSERT INTO avatars SET id=?i, big=?s, small=?s",$auth['id'],$userInfo['photo_400_orig'],$userInfo['photo_100']);
            $_SESSION['login'] = $userInfo['first_name'] . ' ' . $userInfo['last_name'];
            $_SESSION['uid'] = $auth['id'];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    }
?>
