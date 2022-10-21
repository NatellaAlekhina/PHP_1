<?php
/**
 * @var Task $task
 * @var TaskProvider $taskPovider
 */
?>
<head>
    <meta charset="UTF-8">
    <title>Задачи</title>
</head>
<body>
   Hello, <?=$login?>! <br>
   <a href="/">Назад</a> <br>
   <a href="/?controller=security&action=logout">Выйти</a> <br>
<form action="/?controller=tasks&action=add" method="post">
    <input type="text" name="task" placeholder="Опишите новую задачу">
    <input type="submit" value="Добавить">
</form>

   <?php foreach ($tasks as $task): ?>
       <?php echo $task['description'] ?>
       <a href="/?controller=tasks&action=done&key=<?= $task['id'] ?>">[Done]</a>
       <br><br>
   </div>
   <?php endforeach; ?>



</body>
