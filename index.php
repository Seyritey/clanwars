<?php
$logout = $_GET['logout'];
include 'blocks/header.php';
if ($logout == 'plus') {
session_unset();
session_destroy();
$_SESSION['login'] = NULL;
header('Location: ' . $_SERVER['HTTP_REFERER']);    }
head ('Главная - ClanWars.su');

include 'blocks/news.php';
include 'blocks/footer.php';
?>