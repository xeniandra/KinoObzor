<?php
session_start();
require_once "connection.php";
require_once "check_session.php";

$name_film = $_POST['name_film'];
$country = $_POST['country'];
$genre = $_POST['genre'];
$director = $_POST['director'];
$scenario = $_POST['scenario'];
$cast = $_POST['cast'];
$duration = $_POST['duration'];
$start_of_rental = $_POST['start_of_rental'];
$about_film = $_POST['about_film'];
$poster = $_POST['download'];
$status = $_POST['status'];
$queryFilm = "INSERT INTO `films` 
(`id_film`, `name_film`, `country`, `genre`, `director`, `scenario`, `cast`, `duration`, `start_of_rental`, `poster`, `about_film`, `id_status`)
 VALUES 
 (NULL, '$name_film', '$country', '$genre', '$director', '$scenario', '$cast', '$duration', '$start_of_rental', '$poster', '$about_film', '$status');";
$result = mysqli_query($link, $queryFilm) or die("Ошибка " . mysqli_error($link));

$thanks = 1;

mysqli_close($link);
header('Location: ../add_film.php?thanks='.urlencode($thanks));

?>