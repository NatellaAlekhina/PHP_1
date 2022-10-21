<?php


class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addTask(string $description): ?Task
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (user_id, description, is_done) VALUES (:user_id, :description, false)'
        );

        $statement->execute([
            'user_id' => $_SESSION['login']->getId(),
            'description' => $description
        ]);

        return $statement->fetchObject(Task::class, [$description]) ?: null;
    }

    public function getUndoneList(int $userId): ?array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE user_id = :user_id AND is_done = false');

        $statement->execute([
            'user_id' => $userId
        ]);

        return $statement->fetchAll(PDO::FETCH_NAMED);

    }

    public function isDoneTask(int $taskId)
    {

        $statement = $this->pdo->prepare(
            'UPDATE tasks SET is_done = true WHERE id = :id'
        );

        $statement->execute([
            'id' => $taskId,
        ]);
    }

}