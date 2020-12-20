<?php
session_start();
require_once "php\connection.php";
$search = $_POST['search'];
if($search)
{   
  $search = $_POST['search'];
  $search = preg_replace('/ /', '', $search);
  $query = "SELECT `id_film`, `name_film`, `genre`, `cast`, `poster`, `country`,`start_of_rental` FROM `films` 
  WHERE concat(`name_film`, `genre`, `cast`, `director`, `country`) LIKE '%$search%'";

  if (mysqli_num_rows(mysqli_query($link, $query)) <= 0){
      $noResults = 1;
  }  
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\profile.css">
    <title>KinoObzor - Поиск фильмов</title>
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
        <h2>ПОИСК ФИЛЬМОВ</h2>
    </div>
<?php
    if (mysqli_num_rows(mysqli_query($link, $query)) > 0) {
    $resultFilm = mysqli_query($link, $query);
    while ($SelectFilm = mysqli_fetch_assoc($resultFilm)) {
        $id_film = $SelectFilm['id_film'];
        $name_film = $SelectFilm['name_film'];
        $genre = $SelectFilm['genre'];
        $poster = $SelectFilm['poster'];
        $start_of_rental = $SelectFilm['start_of_rental'];
        $country = $SelectFilm['country'];
        $cast = strpos($SelectFilm['cast'], ' ', 100);
        $cast =  substr($SelectFilm['cast'], $cast);
?>
 
    <div class="search-film">
        <div class="film">
        <a href="about_film.php?filmID=<?=$id_film;?>" class="search-film" title="К фильму"> <img src="<?=$poster;?>" alt="<?=$name_film;?>" class="film"></a>
            <ul class="film">
                <li class="li-film">Фильм: <?=$name_film;?></li>
                <li class="li-film">Жанр: <?=$genre;?></li>
                <li class="li-film">Страна: <?=$country;?></li>
                <li class="li-film">В ролях: <?=$cast;?></li>
                <li class="li-film">Начало проката: <?=$start_of_rental;?></li>
            </ul>
        </div>
    </div>
<?
        }
    }
    else {
?>
    <div class="mess">
            <p>Фильм не найден, попробуйте еще</p>
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
</body>
</html>