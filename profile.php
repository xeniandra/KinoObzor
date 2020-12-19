<?php
session_start();
require_once "php\connection.php";
require_once "php\check_session.php";

$id_user = $_SESSION['id_user'];
$queryUser = "SELECT `email`,`nick` FROM `user` WHERE `id_user` = '$id_user'";
$resultSelectUser = mysqli_query($link, $queryUser);
$SelectRowUser = mysqli_fetch_assoc($resultSelectUser);
$email = $SelectRowUser['email'];
$nick = $SelectRowUser['nick'];
// КОЛ-ВО ОТЗЫВОВ ПОЛЬЗОВАТЕЛЯ
$queryReviewUserNumber = "SELECT `id_user` FROM `review` WHERE `id_user` = '$id_user'";
$resultReviewsUserNumber = mysqli_query($link, $queryReviewUserNumber);
$rowReviewsNumber = mysqli_num_rows($resultReviewsUserNumber);
// 
$queryReviewUser = "SELECT `id_review`, `id_user`, `date_review`, `text_review`, `review`.`id_status`, `status`, `name_film`, `poster`, `review`.`id_film` FROM `review`, `films`, `status_review` WHERE `id_user` = '$id_user' AND `review`.`id_film` = `films`.`id_film` AND `review`.`id_status` = `status_review`.`id_status`";
// КОЛ-ВО ВХОДЯЩИХ ОТЗЫВОВ
$queryReviews = "SELECT `id_review` FROM `review` WHERE `id_status` = 3";
$resultReviews = mysqli_query($link, $queryReviews);
$rowReviews = mysqli_num_rows($resultReviews);
// 
if($_SESSION['role'] == 2){
    $role = "АДМИНИСТРАТОР";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\profile.css">
    <title>KinoObzor - Личный кабинет</title>
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
            <form action="search.php" method="POST">
                <input type="text" name="search" class="input-search" placeholder="Введите название фильма, жанр, имена актеров..." required>
                <button type="submit" class="button-search"></button>
            </form>
            </div>
            <a href="php\logout.php" class="login">
                <img src="img\icon.svg" alt="icon" class="login">Выйти</a>
    </div>
</header>
    <!-- /.header -->
<main class="main">

    <div class="reelh">
        <h2>ЛИЧНЫЙ КАБИНЕТ</h2>
    </div>
    <div class="container-promo profile">
        <p class="profile">Email: <?=$email;?></p>
        <p class="profile">Никнейм: <?=$role . ' ' . $nick;?></p>
        <p class="profile">Написано отзывов: <?=$rowReviewsNumber;?></p>
<?php
if($_SESSION['role'] == 2){
?>
        <p class="profile">Входящих отзывов: <?=$rowReviews;?></p>
<?
}
?>
        <div class="buttons">
<?php
if($_SESSION['role'] == 2){
?>   
            <a href="add_film.php" class="change">Добавить фильм</a>
            <a href="users_review.php" class="change">Входящие отзывы</a>
<?
}
?>
            <a href="change_profile.php" class="change">Редактировать профиль</a>
            <button class="change black" id="del-button">Удалить профиль</button>
        </div>
    </div>

    <div class="reelh">
        <h2>МОИ ОТЗЫВЫ</h2>
    </div>

<?php
if ($rowReviewsNumber != 0) {
    $result = mysqli_query($link, $queryReviewUser);
    while ($SelectRow = mysqli_fetch_assoc($result)) {
        $id_review = $SelectRow['id_review'];
        $text_review = $SelectRow['text_review'];
        $date_review = $SelectRow['date_review'];
        $timestamp = strtotime($date_review);
        $date_review = date('H:i d.m.Y', $timestamp);
        $status = $SelectRow['status'];
        $name_film = $SelectRow['name_film'];
        $poster = $SelectRow['poster'];
        $queryfilm = "SELECT `id_film` FROM `review` WHERE `id_review` = '$id_review'";
        $resultfilm = mysqli_query($link, $queryfilm);
        $Selectfilm = mysqli_fetch_assoc($resultfilm);
        $film = $Selectfilm['id_film'];
?>

    <div class="review">
        
        <div class="film">
            <a href="about_film.php?filmID=<?=$film;?>"><img src="<?=$poster;?>" alt="Постер" class="film filmhov" title="К фильму"></a>
            <ul class="film">
                <li class="name-film"><?=$name_film;?></li>
                <li class="date"><?=$date_review;?></li>
                <li class="status">Статус: <?=$status;?></li>
            </ul>
           
        </div>
        <div class="my-rev">
            <p class="review full-review"><?=$text_review;?></p>
            <div class="buttons-rev">
                <button class="full">Читать полностью</button>
                <a href="php\del_review.php?reviewID=<?=$id_review;?>" class="del-review">Удалить</a>    
            </div>
        </div>
        
    </div>
<?
    }
    }
    else {
        ?>
            <div class="message">
                    <p>У вас пока нет ни одного отзыва</p>
            </div>
        <?
                }
        ?>

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



<div class="modal">
    <p class="mod">Вы действительно хотите 
        удалить профиль?</p>
    <div class="buttons-mod">
    <a href="php\del_user.php" class="mod" id="yes">Да</a>
    <button class="mod" id="no">Нет</button>
    </div>
</div>  
<!-- кнопка наверх -->
<a class="back_to_top" title="Наверх">↑</a>
<script src="js\to_top.js"></script>
<!-- кнопка наверх -->
<script src="js\profile.js"></script>
</body>
</html>