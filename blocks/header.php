<?php
include_once 'blocks/dbconnect.php';

  function head($title) {
    echo <<<ST
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>$title</title>
    <link rel="icon" href="/favicon.png" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
  </head>
  <body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/index.php">ClanWars</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Ссылка</a></li>
        <li><a href="#">В сибирь</a></li>
        <li class="dropdown">
          <a href="/index.php" class="dropdown-toggle" data-toggle="dropdown">Управление <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/index.php">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Что то еще тут</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Поиск">
        </div>
        <button type="submit" class="btn btn-default">Искать</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li>
ST;
include_once 'blocks/vkauthor.php';
if (!$_SESSION['login']) {
    $_SESSION['login'] = NULL;
    echo '<a href="' . $url . '?' . urldecode(http_build_query($params)) . '&display=popup">Войти на сайт</a>'; 
  }
if ($_SESSION['login']) { 
    echo '<a href="/profile.php?id=' . $_SESSION['uid'] . '">' . htmlspecialchars($_SESSION['login']) . '</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-align-right"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Свободный слот</a></li>
            <li><a href="#">Настройки</a></li>
            <li><a href="#">Что-то такое</a></li>
            <li class="divider"></li>
            <li><a href="/index.php?logout=plus">Выйти</a></li>
          </ul>
        </li>
      </ul>';
  }

echo <<<ORR

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class='main container'>
  <div class='row> 
    <div class='span12'>
ORR;
}
?>