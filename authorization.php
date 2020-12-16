<?php
require_once "php\connection.php";
$message = $_GET['message'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\normalize.css">
    <link rel="stylesheet" href="css\auth.css">
    <title>KinoObzor - Авторизация</title>
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
            <div class="search">
                <form action="#">
                <input type="text" class="input-search" placeholder="Введите название фильма...">
                <button class="button-search"></button>
            </form>
            </div>

    </div>
</header>
    <!-- /.header -->
<main class="main">

    <div class="reelh">
        <h2>ВОЙТИ В УЧЕТНУЮ ЗАПИСЬ</h2>
    </div>

<?php
    if($message == 1){
?>
    <p class="unsucessfull-add"><?="Пользователя с такими данными не существует!"?></p>
<?
    }
?>
    <div class="container-promo">
        <form action="php\authorization.php" method="POST">
            <label for="email">Email: </label>
            <input type="email" name="email" id="" placeholder="Введите email" class="input-auth" required autofocus>
            <label for="password">Пароль:</label>
            <input type="password" name="password" id="" placeholder="Введите пароль" class="input-auth" required>
            <input type="submit" value="Войти" class="button-auth">
        </form>
        <a href="registration.php" class="to-reg">Нет аккаунта? Зарегистрируйтесь</a>
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
</body>
</html>