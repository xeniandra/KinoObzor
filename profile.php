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
                <form action="#">
                <input type="text" class="input-search" placeholder="Введите название фильма...">
                <button class="button-search"></button>
            </form>
            </div>
            <a href="authorization.php" class="login">
                <img src="img\icon.svg" alt="icon" class="login">Выйти</a>
    </div>
</header>
    <!-- /.header -->
<main class="main">

    <div class="reelh">
        <h2>ЛИЧНЫЙ КАБИНЕТ</h2>
    </div>
    <div class="container-promo profile">
        <p class="profile">Email: ElenaK@mail.ru</p>
        <p class="profile">Никнейм: ElenaK</p>
        <p class="profile">Написано отзывов: 1</p>
        <p class="profile">Входящих отзывов: 2</p>
        <div class="buttons">
            <a href="add_film.php" class="change">Добавить фильм</a>
            <a href="users_review.php" class="change">Входящие отзывы</a>
            <a href="change_profile.php" class="change">Редактировать профиль</a>
            <button class="change black" id="del-button">Удалить профиль</button>
        </div>
    </div>

    <div class="reelh">
        <h2>МОИ ОТЗЫВЫ</h2>
    </div>
    <div class="review">
        
        <div class="film">
            <img src="img\film.png" alt="Постер" class="film">
            <ul class="film">
                <li class="name-film">Взаперти</li>
                <li class="date">22 ноября 2020 | 17:13</li>
                <li class="status">Статус: Ожидает модерацию</li>
            </ul>
           
        </div>
        <div class="my-rev">
            <p class="review full-review">
                Общее впечатление: Любая заботливая мать хочет только лучшего для своего ребенка. Именно такая мать-одиночка Диана Шерман (Сара Полсон) воспитывает дочь Хлою (Кира Ален) в полной изоляции, контролируя каждый её шаг. Та прикована к инвалидному креслу, принимает множество таблеток, обучается дома и не общается со сверстниками. Разумеется, Хлоя растет наивной девушкой, но однажды она начинает подозревать что-то неладное. <br>
                Гиперзабота хорошо раскрыта в одном мини-сериале «Притворство», и безусловно общие черты с эти сериалом у данного фильма имеются. Мать так же пичкает дочь таблетками, не разрешает ей выходить одной на улицу, интернет только под присмотром. Чем вызвано желание оберегать? Об этом зрителю поверхностно говорят в начале, а уж ближе к финалу рассказывают страшную тайну. Есть к фильму вопросы, чисто по сюжету, но можно закрыть на них глаза, т. к. у триллера хорошая напряженная часть. Сюжет действительно держит у экрана, а саспенс пронизывает все повествование. Конечно, переживаешь за героиню, потому как есть такие моменты от которых становится страшно. Если вдуматься, такое действительно может быть, от этого и ужасно. <br>
                Режиссер фильма Аниш Чаганти снял так же напряженный триллер «Поиск», вы наверняка видели его, если нет, рекомендую обратить внимание. Снят он необычно, но смотрится с интересом. Тогда в 2018 для Чаганти это был дебют, но пока что молодой режиссер не пробует себя в другом, за основу берется снова непростые отношения родители-дети и саспенс. «Взаперти» фокусируется на 2-х актрисах, конечно, это Сара Полсон с ролью сумасшедшей матери справляется великолепно, другого и быть не может. И Совсем неизвестная мне актриса — Кира Аллен. Кира так же показывает разнообразие эмоций, и страх, и удивление, и ненависть. <br>
                Финал у ленты хорош. Закольцовывая сюжет зритель вспомнит одну пословицу — Что посеешь, то и пожнешь. Приятного просмотра! <br>
                7 из 10
            </p>
            <div class="buttons-rev">
                <button class="full">Читать полностью</button>
                <button class="del-review">Удалить</buton>    
            </div>
            </div>
        
    </div>
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
    <button class="mod" id="yes">Да</button>
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