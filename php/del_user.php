<?php
session_start();
require_once "connection.php";
require_once "check_session.php";
$id_user = $_SESSION['id_user'];

$queryDel = "DELETE FROM `user` WHERE `id_user` = '$id_user'";
$result = mysqli_query($link, $queryDel) or die("Ошибка " . mysqli_error($link));

mysqli_close($link);

unset($c_email);
unset($c_password);

unset($_SESSION['email']);
unset($_SESSION['role']);
unset($_SESSION['id_user']);
session_destroy();

header('Location: ../index.php');
exit();
?>