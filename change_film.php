<?php
session_start();
require_once "php\connection.php";
require_once "php\check_session.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\auth.css">
    <title>KinoObzor - Изменение фильма</title>
    <link rel="shortcut icon" href="img\XMLID.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=cyrillic" rel="stylesheet">
</head>
<body>
    <div class="page">
    <header class="header">
    <div class="container">
            <a href="index.php" class="logo" title="На главную">
                <img src="img\logo.svg" alt="Logo" class="logo">
            </a>
            <div class="search search-change">
                <form action="#">
                <input type="text" class="input-search" placeholder="Введите название фильма...">
                <button class="button-search"></button>
            </form>
            </div>
            <a href="profile.php" class="login">
                <img src="img\icon.svg" alt="icon" class="login">Профиль</a>
    </div>
</header>
    <!-- /.header -->
<main class="main">

    <div class="reelh">
        <h2>РЕДАКТИРОВАНИЕ ФИЛЬМА</h2>
    </div>
    <div class="container-promo change">
        <form action="#">
            <label for="name-film">Название:</label>
            <input type="text" name="name-film" value="Взаперти" class="input-auth" required autofocus>
            <label for="country">Страна:</label>
            <input type="text" name="country" value="США" class="input-auth" required>
            <label for="genre">Жанр:</label>
            <input type="text" name="genre" value="триллер, драма, детектив" class="input-auth" required>
            <label for="director">Режиссер:</label>
            <input type="text" name="director" value="Аниш Чаганти" class="input-auth" required>
            <label for="scenario">Сценарий:</label>
            <input type="text" name="scenario" value="Аниш Чаганти, Севак Оганян" class="input-auth" required>
            <label for="cast">В ролях:</label>
            <input type="text" name="cast" value="Сара Полсон, Кира Аллен, Онали Эймс, Пэт Хили, Картер Хейнц" class="input-auth" required>
            <label for="duration">Длительность:</label>
            <input type="time" name="duration" value="01:30" class="input-auth" required>
            <label for="start-of-rental">Начало проката:</label>
            <input type="date" name="start-of-rental" value="2020.11.20" class="input-auth" required>
            <label for="download" class="download">Загрузить постер</label>
            <input type="url" name="download" value="FDHFJDFJF.URL" class="input-auth" required>

            <input type="button" value="Изменить" class="button-auth">
            
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
</div>
<!-- кнопка наверх -->
<a class="back_to_top" title="Наверх">↑</a>
<script src="js\to_top.js"></script>
<!-- кнопка наверх -->
</body>
</html>