<?php
session_start();
require_once "php\connection.php";

$query = "SELECT `id_film`, `name_film`, `country`, `genre`, `director`, `scenario`, `cast`, `duration`,
`start_of_rental`, `poster`, `about_film`, `id_status` FROM `films` WHERE `id_status` = 1";
$query2 = "SELECT `id_film`, `name_film`, `country`, `genre`, `director`, `scenario`, `cast`, `duration`,
`start_of_rental`, `poster`, `about_film`, `id_status` FROM `films` WHERE `id_status` = 2";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\style.css">
    <title>KinoObzor - Обзор новинок кино</title>
    <link rel="shortcut icon" href="img\XMLID.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap&subset=cyrillic" rel="stylesheet">
</head>
<body>
    <header class="header">
        <div class="container">
                <a href="index.php" class="logo" title="На главную">
                    <img src="img\logo.svg" alt="Logo" class="logo">
                </a>
                <div class="search">
                <form action="search.php" method="POST">
                    <input type="text" name="search" class="input-search" placeholder="Введите название фильма, жанр, имена актеров..." required>
                    <button type="submit" class="button-search"></button>
                </form>
                </div>
                <a href="profile.php" class="login">
                    <img src="img\icon.svg" alt="icon" class="login">
                    Профиль
                </a>
        </div>
    </header>
    <main class="main">
        <div class="container-promo">
            <section class="promo">
                <h1 class="promo-title">Онлайн-сервис <br/> отзывов на премьеры кино</h1>
                <p class="promo-text">Каждая новинка кинотеатров не пройдет мимо вас, читайте и узнавайте всё самыми первыми!</p>
            </section>
        </div>
        <div class="films-today">
            <h2>В ПРОКАТЕ</h2>
        </div>
            <div class="container-promo">
                <div class="films-one">
                    <?php
                        $result = mysqli_query($link, $query);
                        while ($SelectRow = mysqli_fetch_assoc($result)) {
                            $id_film = $SelectRow['id_film'];
                            $name_film = $SelectRow['name_film'];
                            $poster = $SelectRow['poster'];
                            $id_status = $SelectRow['id_status'];      
                    ?>
                    <div class="film-with-buttons">
                        <a href="about_film.php?filmID=<?=$id_film;?>" class="filmframe">
                            <div class="film">
                                <div class="name-film">
                                    <h3><?=$name_film;?></h3>
                                </div>
                                <img src="<?=$poster;?>" alt="<?=$name_film;?>">
                            </div>
                        </a>
                    <?php
                        if($_SESSION['role'] == 2){
                    ?>
                        <div class="buttons-change">
                            <a href="change_film.php?filmID=<?=$id_film;?>" class="change">Редактировать</a>
                            <a href="php\archieve_film.php?filmID=<?=$id_film;?>" class="del">В архив</a>  
                        </div>
                    <?}?>
                    </div>
                <?}?>
            </div>
        </div>
        <div class="films-today">
            <h2>СКОРО ВЫЙДУТ</h2>
        </div>
        <div class="container-promo">
            <div class="films-one">
                <?php
                    $result2 = mysqli_query($link, $query2);
                    while ($SelectRow = mysqli_fetch_assoc($result2)) {
                        $id_film = $SelectRow['id_film'];
                        $name_film = $SelectRow['name_film'];
                        $poster = $SelectRow['poster'];
                        $id_status = $SelectRow['id_status'];      
                ?>
                    <div class="film-with-buttons">
                        <a href="about_film.php?filmID=<?=$id_film;?>" class="filmframe">
                            <div class="film">
                                <div class="name-film">
                                    <h3><?=$name_film;?></h3>
                                </div>
                                <img src="<?=$poster;?>" alt="<?=$name_film;?>">
                            </div>
                        </a>
                <?php
                    if($_SESSION['role'] == 2){
                ?>
                        <div class="buttons-change">
                            <a href="change_film.php?filmID=<?=$id_film;?>" class="change">Редактировать</a>
                            <a href="php\archieve_film.php?filmID=<?=$id_film;?>" class="del">В архив</a>  
                        </div>
                <?}?>
                    </div>

                <?}?>
            </div>
        </div>
    </main>
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