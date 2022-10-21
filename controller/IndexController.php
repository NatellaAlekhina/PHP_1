<?php
require_once 'model/User.php';
session_start();

$pageHeader = 'Добро пожаловать';

$login = null;

if (isset($_SESSION['login'])) {
    $login = htmlspecialchars(strip_tags($_SESSION['login']->getLogin()));
}

include "view/index.php";