<?php
session_start();
require_once "connection.php";
require_once "check_session.php";
$getId = $_GET['filmID'];

$queryFilm = "UPDATE `films` SET `id_status` = '3' WHERE `films`.`id_film` = '$getId';";
$result = mysqli_query($link, $queryFilm) or die("Ошибка " . mysqli_error($link));


mysqli_close($link);
header('Location: ../index.php');

?>