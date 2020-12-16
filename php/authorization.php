<?php
require_once "connection.php";
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT `email`, `password`, `id_role`  FROM `user`";
$result = mysqli_query($link, $query);

while ($row = mysqli_fetch_row($result)) {
    $passVer = password_verify($password, $row[1]);
    if (($email == $row[0]) and $passVer) 
    {
      session_start();
      $_SESSION['email'] = $row[0];
      $_SESSION['role'] = $row[2];
        $SESSIONemail = $_SESSION['email'];
        $query_id = "SELECT id_user FROM user WHERE email = '$SESSIONemail'";
        $result_id = mysqli_query($link, $query_id);
        $id_data = mysqli_fetch_row($result_id);
        $id_user = $id_data[0];
        $_SESSION['id_user'] = $id_user;
        header('Location: ../profile.php');
    }
    else{
        $message = 1;
        header('Location: ../authorization.php?message='.urlencode($message));
    }
}


?>
