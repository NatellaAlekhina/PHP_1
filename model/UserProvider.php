<?php

class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function registerUser(?string $name, string $login, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO users (name, login, password) VALUES (:name, :login, :password)'
        );

        $statement->execute([
            'name' => $name,
            'login' => $login,
            'password' => md5($password)
        ]);

        return $statement->fetchObject(User::class, [$login]) ?: null;
    }

    public function getByUsernameAndPassword(string $login, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM users WHERE login = :login AND password = :password LIMIT 1'
        );
        $statement->execute([
            'login' => $login,
            'password' => md5($password)
        ]);

        return $statement->fetchObject(User::class, [$login]) ?: null;
    }

    public function getByNameAndLogin(string $name, string $login): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM users WHERE login = :login AND name = :name LIMIT 1'
        );
        $statement->execute([
            'login' => $login,
            'name' => $name
        ]);

        return $statement->fetchObject(User::class, [$login]) ?: null;
    }
}