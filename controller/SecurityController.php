<?php
require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();
$pdo = require 'pdo.php';

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['login']);
    //session_destroy();
    header("Location: index.php");
    die();
}

$error = null;

if (isset($_POST['login'], $_POST['password'])) {
    ['login' => $login, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUsernameAndPassword($login, $password);
    if ($user === null) {
        echo $error = 'Пользователь с указанными учетными данными не найден!!!';
    } else {
        $_SESSION['login'] = $user;
        header("Location: index.php");
        die();
    }
}



include "view/singin.php";