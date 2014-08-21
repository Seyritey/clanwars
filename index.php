<?php
$logout = $_GET['logout'];
if ($logout == 'plus') {
session_start();
session_unset();
session_destroy();
session_start();
    }
    
include 'blocks/header.php';
head ('Главная - ClanWars.su');
include 'blocks/news.php';
include 'blocks/footer.php';


?>