<?php
session_start();
require_once "connection.php";
require_once "check_session.php";

$id_review = $_GET['reviewID'];
$queryAdd = "UPDATE `review` SET `id_status` = '1' WHERE `review`.`id_review` = '$id_review';";

$result = mysqli_query($link, $queryAdd) or die("Ошибка " . mysqli_error($link));
mysqli_close($link);
header('Location: ../users_review.php')

?>