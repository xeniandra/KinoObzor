<?php
session_start();

if (empty($_SESSION['email'])) {
    header('Location: ../authorization.php');
    exit();
}