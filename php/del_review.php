<?php
session_start();
require_once "connection.php";
require_once "check_session.php";

$id_review = $_GET['reviewID'];
$queryDel = "DELETE FROM `review` WHERE `id_review` = '$id_review'";
$result = mysqli_query($link, $queryDel) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);
header('Location: ../profile.php');
?>