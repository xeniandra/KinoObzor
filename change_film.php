<?php
session_start();
require_once "php\connection.php";
require_once "php\check_session.php";
$getId = $_GET['filmID'];
$query = "SELECT `id_film`, `name_film`, `country`, `genre`, `director`, `scenario`, `cast`, `duration`,
 `start_of_rental`, `poster`, `about_film`, `id_status` FROM `films` WHERE `id_film` = '$getId'";
$resultSelect = mysqli_query($link, $query);
$SelectRow = mysqli_fetch_assoc($resultSelect);
$id_film = $SelectRow['id_film'];
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

    <div class="reelh">
        <h2>РЕДАКТИРОВАНИЕ ФИЛЬМА</h2>
    </div>
    <div class="container-promo change">
        <form action="php\change_film.php" method="POST">
            <label for="name_film">Название:</label>
            <input type="text" name="name_film" value="<?=$name_film;?>" class="input-auth" required autofocus>
            <label for="country">Страна:</label>
            <input type="text" name="country" value="<?=$country;?>" class="input-auth" required>
            <label for="genre">Жанр:</label>
            <input type="text" name="genre" value="<?=$genre;?>" class="input-auth" required>
            <label for="director">Режиссер:</label>
            <input type="text" name="director" value="<?=$director;?>" class="input-auth" required>
            <label for="scenario">Сценарий:</label>
            <input type="text" name="scenario" value="<?=$scenario;?>" class="input-auth" required>
            <label for="cast">В ролях:</label>
            <input type="text" name="cast" value="<?=$cast;?>" class="input-auth" required>
            <label for="duration">Длительность:</label>
            <input type="text" name="duration" value="<?=$duration;?>" class="input-auth" required>
            <label for="about_film">О фильме:</label>
            <input type="text" name="about_film" value="<?=$about_film;?>" class="input-auth" required>
            <label for="start_of_rental">Начало проката:</label>
            <input type="text" name="start_of_rental" value="<?=$start_of_rental;?>" class="input-auth" required>
            <label for="download" class="download">Загрузить постер</label>
            <input type="url" name="download" value="<?=$poster;?>" class="input-auth" required>
            <label for="status">Статус фильма:</label>
				<select name="status" class="input-auth">
					<option value="1">В прокате</option>
					<option value="2">Скоро выходят</option>
				</select>
            <input type="hidden" name="id" value="<?=$getId;?>">
            <input type="submit" value="Изменить" class="button-auth">
            
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