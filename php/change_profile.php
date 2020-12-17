<?php
session_start();
require_once "connection.php";
require_once "check_session.php";
$id_user = $_SESSION['id_user'];
$error = 0;
$email = $_POST['email'];
$nick = $_POST['nick'];
$password = $_POST['password'];
if ($password) {
$passwordhash = password_hash($password, PASSWORD_DEFAULT);
}
// ПРОВЕРКА НА СОВПАДЕНИЕ ЛОГИНА И НИКА////////////
if ($email) {
    $queryEmail = "SELECT `email` FROM `user` WHERE `id_user` != '$id_user' AND `email` = '$email'";
    $resultEmail = mysqli_query($link, $queryEmail);
    $rowEmail = mysqli_num_rows($resultEmail);
    if ($rowEmail == 0) {
        $email = $_POST['email'];
    }
    else{
        $error+=1;
    }
}
if ($nick) {
    $queryNick = "SELECT `nick` FROM `user` WHERE `id_user` != '$id_user' AND `nick` = '$nick'";
    $resultNick = mysqli_query($link, $queryNick);
    $rowNick = mysqli_num_rows($resultNick);
    if ($rowNick == 0) {
        $nick = $_POST['nick'];
    }
    else{
        $error+=1;
    }
}
///////////////ЕСЛИ СОВПАДЕНИЙ НЕ НАЙДЕНО, ВЫПОЛНИТЬ ЗАПРОС///////////////////////////////
if ($error == 0) {
    if ($email && $nick && $passwordhash) {
        $queryChangeUser = "UPDATE `user` SET `email` = '$email', `nick` = '$nick', `password` = '$passwordhash' WHERE `user`.`id_user` = '$id_user';";
        // echo "vse";
    }
    else {
        if($email && $nick){
            $queryChangeUser = "UPDATE `user` SET `email` = '$email', `nick` = '$nick' WHERE `user`.`id_user` = '$id_user';";
            // echo "email && nick";
        }
        elseif($nick && $passwordhash){
            $queryChangeUser = "UPDATE `user` SET `nick` = '$nick', `password` = '$passwordhash' WHERE `user`.`id_user` = '$id_user';";
            // echo "nick && passwordhash";
        }
        elseif($email && $passwordhash){
            $queryChangeUser = "UPDATE `user` SET `email` = '$email', `password` = '$passwordhash' WHERE `user`.`id_user` = '$id_user';";
            // echo "email && passwordhash";
        }
        else{
            if ($email) {
                $queryChangeUser = "UPDATE `user` SET `email` = '$email' WHERE `user`.`id_user` = '$id_user';";
                // echo "email";
            }
            elseif($nick){
                $queryChangeUser = "UPDATE `user` SET `nick` = '$nick' WHERE `user`.`id_user` = '$id_user';";
                // echo "nick";
            }
            else{
                $queryChangeUser = "UPDATE `user` SET `password` = '$passwordhash' WHERE `user`.`id_user` = '$id_user';";
                // echo "password";
            }
        }
    }
    // echo $queryChangeUser;
    $result = mysqli_query($link, $queryChangeUser) or die("Ошибка " . mysqli_error($link));
    if ($result) {
        // echo $queryChangeUser;
        header('Location: ../profile.php');
    }
    
} else {
    $message = 1;
    // echo "kek";
    header('Location: ../change_profile.php?message='.urlencode($message));

}
mysqli_close($link);
?>


