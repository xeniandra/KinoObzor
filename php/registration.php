<?php
require_once "connection.php";
$email = $_POST['email'];
$nick = $_POST['nick'];
$password = $_POST['password'];
$passwordhash = password_hash($password, PASSWORD_DEFAULT);

$queryCheckEmail = "SELECT `email` FROM user WHERE `email` = '$email'";
$queryCheckNick = "SELECT `nick` FROM user WHERE `nick` = '$nick'";

$resultCheckEmail = mysqli_query($link, $queryCheckEmail);
$rowCheckEmail = mysqli_num_rows($resultCheckEmail);

$resultCheckNick = mysqli_query($link, $queryCheckNick);
$rowCheckNick = mysqli_num_rows($resultCheckNick);

if ($rowCheckEmail == 0 && $rowCheckNick == 0)
{
    $query_reg = "INSERT INTO `user` (`id_user`, `email`, `nick`, `password`, `id_role`) VALUES (NULL, '$email', '$nick', '$passwordhash', 1);";
    $result = mysqli_query($link, $query_reg) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        header('Location: ../authorization.php');
    }
}
else{
    $message = 1;
    header('Location: ../registration.php?message='.urlencode($message));
}
mysqli_close($link);

?>