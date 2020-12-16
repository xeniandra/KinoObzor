<?php
session_start();
require_once "connection.php";
require_once "check_session.php";
$text_review = $_POST['review'];
$id_user = $_SESSION['id_user'];
$id_film = $_POST['id_film'];


$queryReview = "INSERT INTO `review` (`id_review`, `id_user`, `date_review`, `text_review`, `id_status`, `id_film`) VALUES (NULL, '$id_user', NOW(), '$text_review', '3', '$id_film');";
$result = mysqli_query($link, $queryReview) or die("Ошибка " . mysqli_error($link));
mysqli_close($link);
header('Location: ../about_film.php?filmID='.$id_film)

?>