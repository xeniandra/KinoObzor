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
    <title>KinoObzor - Регистрация</title>
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
                <form action="#">
                <input type="text" class="input-search" placeholder="Введите название фильма, жанр, имена актеров..." required>
                <button class="button-search"></button>
            </form>
            </div>

    </div>
</header>
    <!-- /.header -->
<main class="main">

    <div class="reelh">
        <h2>РЕГИСТРАЦИЯ</h2>
    </div>

<?php
    if($message == 1){
?>
    <p class="unsucessfull-add"><?="Пользователь с такими данными уже существует"?></p>
<?
    }
?>

    <div class="container-promo">
        <form action="php\registration.php" method="POST"> 
            <label for="email">Email: </label>
            <input type="email" name="email" placeholder="Введите email" class="input-auth" required autofocus>
            <label for="nick">Никнейм: </label>
            <input type="text" name="nick" placeholder="Введите никнейм" class="input-auth" required>
            <label for="password">Пароль: </label>
            <input type="password" name="password" id="password" placeholder="Введите пароль" class="input-auth" required>
            <!-- <label for="password-repit">Повтор пароля: </label>
            <input type="password" name="password-repit" id="password-repit" placeholder="Повторите пароль" class="input-auth" required> -->
            <input type="submit" value="Зарегистрироваться" class="button-auth">
        </form>
        <a href="authorization.php" class="to-reg">Уже есть аккаунт? Авторизуйтесь</a>
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
<script>
    
//     while (document.getElementById('password').value != "") {
        
    
//     if (document.getElementById('password').value == document.getElementById('password-repit').value) {
//         document.getElementById('password').style.background='#18bf6a';
//         document.getElementById('password-repit').style.background='#18bf6a';
//     } 
//     else {
//         document.getElementById('password').style.background='#f96e6e';
//         document.getElementById('password-repit').style.background='#f96e6e';
//     }
// }

// background: #f96e6e; wrong
// background: #18bf6a; write
</script>

</body>
</html>