<?php
require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();
$pdo = require 'pdo.php';

$error = null;

if (isset($_POST['name'], $_POST['login'], $_POST['password'])) {
    ['name' => $name, 'login' => $login, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByNameAndLogin($name, $login);
    if ($user === null) {
        $user = $userProvider->registerUser($name, $login, $password);
        $user = $userProvider->getByUsernameAndPassword($login, $password);
        $_SESSION['login'] = $user;
        header("Location: index.php");
        die();
    } else {
        echo $error = 'Пользователь с указанными учетными данными уже существует!!! 
        Перейдите на страницу авторизации';
    }

}

include "view/registration.php";