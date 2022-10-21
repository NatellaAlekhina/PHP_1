
<?php if ($login !== null) : ?>
    <a href="/">Главная</a>
    <a href="/?controller=tasks">Задачи</a><br>
    <p>Рады вас приветствовать, <?= $login ?>. <a href="/?controller=security&action=logout">[Выход]</a></p>
<?php else : ?>
    <a href="/?controller=security">Авторизоваться</a>
    <a href="/?controller=registration">Зарегистрироваться!</a>
<?php endif ?><br>
