<?php
session_start();
require_once "php\connection.php";
require_once "php\check_session.php";
$message = $_GET['message'];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\auth.css">
    <title>KinoObzor - Изменение данных профиля</title>
    <link rel="shortcut icon" href="img\XMLID.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=cyrillic" rel="stylesheet">
</head>
<body>
    <header class="header">
    <div class="container">
            <a href="index.php" class="logo" title="На главную">
                <img src="img\logo.svg" alt="Logo" class="logo">
            </a>
            <div class="search search-change">
            <form action="search.php" method="POST">
                <input type="text" name="search" class="input-search" placeholder="Введите название фильма, жанр, имена актеров..." required>
                <button type="submit" class="button-search"></button>
            </form>
            </div>
            <a href="profile.php" class="login">
                <img src="img\icon.svg" alt="icon" class="login">Профиль</a>
    </div>
</header>
    <!-- /.header -->
<main class="main">

    <div class="reelh">
        <h2>ИЗМЕНЕНИЕ ДАННЫХ ПРОФИЛЯ</h2>
    </div>
<?php
    if($message == 1){
?>
    <p class="unsucessfull-add"><?="Пользователь с такими данными уже существует!"?></p>
<?
    }
?>
    <div class="container-promo change">
        <form action="php\change_profile.php" method="POST">
            <label for="email">Email: </label>
            <input type="text" name="email" placeholder="Введите новый email" class="input-auth">
            <label for="nick">Никнейм: </label>
            <input type="text" name="nick" placeholder="Введите новый никнейм" class="input-auth">
            <label for="password">Пароль:</label>
            <input type="password" name="password" placeholder="Введите новый пароль" class="input-auth">
            <div class="buttons">
            <input type="submit" value="Изменить" class="button-auth">
            <a href="profile.php" class="button-auth black">Назад</a>
    </div>
            
        </form>
    </div>



 
</main>
<!-- /.main -->
<footer class="footer">
    <div class="reel"></div>
    <div class="container">
        <img src="img\popcorn.png" alt="popcorn.png" class="popfoot">
        <div class="social">
            <p>Мы в соцсетях</p>
            <div class="social-links">
                <a href="#" class="social-link"><img src="img\inst.svg" alt="instagram"></a>
                <a href="#" class="social-link"><img src="img\vk.svg" alt="vk"></a>
                <a href="#" class="social-link"><img src="img\twit.svg" alt="twitter"></a>
                
            </div>

            <p class="rights">©KinoObzor  2020</p>
        </div>
    </div>
</footer>
<!-- кнопка наверх -->
<a class="back_to_top" title="Наверх">↑</a>
<script src="js\to_top.js"></script>
<!-- кнопка наверх -->
</body>
</html>