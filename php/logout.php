<?
session_start();
//Уничтожаем переменные в сессиях
unset($c_email);
unset($c_password);

unset($_SESSION['email']);
unset($_SESSION['role']);
unset($_SESSION['id_user']);
session_destroy();

header('Location: ../index.php');
exit();