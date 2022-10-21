<?php
// fixture.php
require_once 'model/User.php';
require_once 'model/UserProvider.php';
$pdo = require 'pdo.php';

$user = new User('admin');
//var_dump($pdo);

//$user->setUsername('GeekBrains PHP');
/*
 * */
$name = 'admin';
$login = 'admin';
$password = '123';

$userProvider = new UserProvider($pdo);
$user = $userProvider->getByNameAndLogin($name, $login);
var_dump($user);
if ($user === null) {
    $userProvider->registerUser($name, $login, $password);
    $user = $userProvider->getByUsernameAndPassword($this->login,$this->password);
    var_dump($user);
} else {
    echo $error = 'Пользователь с указанными учетными данными уже существует!!! 
        Перейдите на страницу авторизации';
}
 /*
var_dump($a = registerUser($user,'fdfdf'));
*//*
function registerUser(User $user, string $password): void
{
    $pdo = new PDO('sqlite:database.db');

    $statement = $pdo->prepare(
        'INSERT INTO users (login, password) VALUES (:login, :password)'
    );

    $statement->execute([
        'login' => $user->getLogin(),
        'password' => md5($password)
    ]);
}

    /*return $statement->execute([
        'id' => $user->getId(),
        'login' => $user->getUsername(),
        'password' => $user->getPassword()
    ]);*/
//}

/*
<?php foreach ($tasks as $key => $task): ?>
    <div>
        <?=$task->getDescription()?>
        <a href="/?controller=tasks&action=done&key=<?=$key?>">[Done]</a><br><br>
    </div>
<?php endforeach; ?>
*/