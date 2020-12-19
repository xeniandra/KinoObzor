<?php
session_start();
require_once "php\connection.php";

$getId = $_GET['filmID'];
$query = "SELECT `id_film`, `name_film`, `country`, `genre`, `director`, `scenario`, `cast`, `duration`,
`start_of_rental`, `poster`, `about_film`, `id_status` FROM `films` WHERE `id_film` = '$getId'";
$resultSelect = mysqli_query($link, $query);
$SelectRow = mysqli_fetch_assoc($resultSelect);

$name_film = $SelectRow['name_film'];
$country = $SelectRow['country'];
$genre = $SelectRow['genre'];
$director = $SelectRow['director'];
$scenario = $SelectRow['scenario'];
$cast = $SelectRow['cast'];
$duration = $SelectRow['duration'];
$start_of_rental = $SelectRow['start_of_rental'];
$poster = $SelectRow['poster'];
$about_film = $SelectRow['about_film'];
$id_status = $SelectRow['id_status'];

$queryReviews = "SELECT `id_review`, `id_user`, `date_review`, `text_review`, `id_status`, `id_film` FROM `review` WHERE `id_film` = '$getId' AND `id_status` = 1";

$Review = "SELECT `id_review` FROM `review` WHERE `id_film` = '$getId' AND `id_status` = 1";
$resultReview = mysqli_query($link, $Review);
$row = mysqli_num_rows($resultReview);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\about_film.css">
    <title>KinoObzor - О фильме</title>
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
                    <input type="text" name="search" class="input-search" placeholder="Введите название фильма..." required>
                    <button type="submit" class="button-search"></button>
                </form>
            </div>
                <a href="profile.php" class="login">
                    <img src="img\icon.svg" alt="icon" class="login">Профиль</a>
        </div>
    </header>
    <!-- /.header -->
    <main class="main">
        <div class="container-promo">
                <img src="<?=$poster;?>" alt="<?=$name_film;?>" class="film">
                <div class="about_film">
                    <h3><?=$name_film;?></h3>
                    <ul>
                        <li>Страна: <?=$country;?></li>
                        <li>Жанр: <?=$genre;?></li>
                        <li>Режиссер: <?=$director;?></li>
                        <li>Сценарий: <?=$scenario;?></li>
                        <li>В ролях: <?=$cast;?></li>
                        <li>Длительность: <?=$duration;?></li>
                    </ul>
                    <p class="date">Начало проката: <?=$start_of_rental;?></p>
                </div>
        </div>
        <div class="reelh">
            <h2>О ФИЛЬМЕ</h2>
        </div>
        <div class="container-about">
            <p class="about"><?=$about_film;?></p>
        </div>
        <div class="reelh">
            <h2>ОТЗЫВЫ</h2>
        </div>

    <?php
    if ($row != 0) {
        $resultReviews = mysqli_query($link, $queryReviews);
        while ($SelectRow = mysqli_fetch_assoc($resultReviews)) {
            $id_review = $SelectRow['id_review'];
            $id_film = $SelectRow['id_film'];
            $id_status = $SelectRow['id_status'];   
            $date_review = $SelectRow['date_review'];
            $timestamp = strtotime($date_review);
            $date_review = date('H:i d.m.Y', $timestamp);
            $text_review = $SelectRow['text_review'];
            $id_user = $SelectRow['id_user'];

            $queryUser = "SELECT `nick` FROM `user` WHERE `id_user` = '$id_user'";
            $resultSelectUser = mysqli_query($link, $queryUser);
            $SelectRowUser  = mysqli_fetch_assoc($resultSelectUser);
            $user_nick = $SelectRowUser['nick'];
    ?>

        <div class="review">
            <ul>
                <li class="author"><?=$user_nick;?></li>
                <li class="date-review"><?=$date_review;?></li>
            </ul>
            <p class="review"><?=$text_review;?></p>
        </div>

        <?
        }
    }
            else {
        ?>
            <div class="message">
                    <p class="message">К этому фильму пока нет ни одного отзыва. Вы можете стать первым!</p>
            </div>
        <?}?>
            <div class="reelh">
                <h2>НАПИШИТЕ СВОЙ ОТЗЫВ</h2>
            </div>
        <?php
        if (empty($_SESSION['email'])) {
        ?>
            <div class="message">
                <p class="message">Оставлять отзывы могут только авторизованные пользователи!</p>
            </div> 
        <?
        }
        else{
        ?>
            <div class="my-review">
                <form action="php\send_review.php" method="POST">
                    <textarea name="review" id="textarea-comment" cols="30" rows="10" placeholder="Введите текст..."></textarea>
                    <input type="hidden" value="<?=$getId;?>" name="id_film">
                    <input type="submit" value="Отправить">
                </form>
            </div>
        <?}?>

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