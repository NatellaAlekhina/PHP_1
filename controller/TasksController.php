<?php
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';
require_once 'model/User.php';
require_once 'model/UserProvider.php';

session_start();
$pdo = require 'pdo.php';

$login = $_SESSION['login']->getLogin();
$userId = $_SESSION['login']->getId();

$taskProvider = new TaskProvider($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'add') {
    $taskText = strip_tags($_POST['task']);
    $taskProvider->addTask($taskText);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done') {
    $key = $_GET['key'];
    $taskProvider->isDoneTask($key);
    header("Location: /?controller=tasks");
    die();
}

$tasks = $taskProvider->getUndoneList($userId);
foreach ($tasks as $key) {
    foreach ($key as $task){

    }
    $taskNew[] = $task;
};


include "view/tasks.php";