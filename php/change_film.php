<?php
session_start();
require_once "connection.php";
require_once "check_session.php";

$id_film = $_POST['id'];
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
$queryFilm = "UPDATE `films` 
SET `name_film`='$name_film',`country`='$country',`genre`='$genre',`director`='$director',
`scenario`='$scenario',`cast`='$cast',`duration`='$duration',
`start_of_rental`='$start_of_rental',`poster`='$poster',`about_film`='$about_film',`id_status`='$status' WHERE `id_film` = '$id_film';";
$result = mysqli_query($link, $queryFilm) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);
header('Location: ../about_film.php?filmID='.$id_film);

?> 