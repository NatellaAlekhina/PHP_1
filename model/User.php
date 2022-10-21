<?php

class User
{
    private int $id;
    private string $login;
    private ?string $name;
    //private string $password;

    public function __construct(string $login)
    {
        $this->login = $login;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }



   /* public function getPassword(): string
    {
        return $this->password;
    }*/

}