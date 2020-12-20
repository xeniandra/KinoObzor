<?php
session_start();
require_once "php\connection.php";
require_once "php\check_session.php";
// КОЛ-ВО ВХОДЯЩИХ ОТЗЫВОВ
$queryReviews = "SELECT `id_review` FROM `review` WHERE `id_status` = 3";
$resultReviews = mysqli_query($link, $queryReviews);
$rowReviews = mysqli_num_rows($resultReviews);
//
$queryReviewsShow = "SELECT `id_review`, `id_user`, `date_review`, `text_review`, `id_status`, `id_film` FROM `review` WHERE `id_status` = 3";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\profile.css">
    <title>KinoObzor - Входящие отзывы</title>
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
        <h2>ВХОДЯЩИЕ ОТЗЫВЫ</h2>
    </div>

<?php
if ($rowReviews != 0) {
$result = mysqli_query($link, $queryReviewsShow);
while ($SelectRow = mysqli_fetch_assoc($result)) {
    $id_review = $SelectRow['id_review'];
    $id_user = $SelectRow['id_user'];
    $date_review = $SelectRow['date_review'];
    $timestamp = strtotime($date_review);
    $date_review = date('H:i d.m.Y', $timestamp);
    $text_review = $SelectRow['text_review'];
    $id_status = $SelectRow['id_status'];
    $id_film = $SelectRow['id_film'];

    $queryfilm = "SELECT `name_film`, `poster` FROM `films` WHERE `id_film` = '$id_film'";
    $resultfilm = mysqli_query($link, $queryfilm);
    $Selectfilm = mysqli_fetch_assoc($resultfilm);
    $name_film = $Selectfilm['name_film'];
    $poster = $Selectfilm['poster'];
    $queryNick = "SELECT `nick` FROM `user` WHERE `id_user` = '$id_user'";
    $resultNick = mysqli_query($link, $queryNick);
    $SelectNick = mysqli_fetch_assoc($resultNick);
    $nick = $SelectNick['nick'];

?>
    <div class="review">  
        <div class="film">
            <img src="<?=$poster;?>" alt="<?=$name_film;?>" class="film">
            <ul class="film">
                <li class="user">Автор отзыва: <?=$nick;?></li>
                <li class="name-film">Фильм: <?=$name_film;?></li>
                <li class="date">Дата и время отзыва: <?=$date_review;?></li>
            </ul>
           
        </div>
        <div class="my-rev">
            <p class="review full-review"><?=$text_review;?></p>
            <div class="buttons-rev">
                <button class="full">Читать полностью</button>
                <form action="#" class="form-review">
                <a href="php\add_review.php?reviewID=<?=$id_review;?>" class="add">Добавить</a>  
                <a href="php\decline.php?reviewID=<?=$id_review;?>" class="del">Отклонить</a>  
                </form>
            </div>
        </div> 
</div>
 
<?
    }
}
else {
    ?>
        <div class="mess">
                <p>Пока нет отзывов на модерацию</p>
        </div>
    <?
            }
    ?>


 
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
<script src="js\review.js"></script>
</body>
</html>