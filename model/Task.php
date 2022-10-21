<?php

class Task
{
    private int $id;
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private int $priority;
    private bool $isDone;
    private User $user;
    private array $comment = [];

    public function __construct(string $description)
    {
        $this->description = $description;
        $this->isDone = false;
    }

    public function markAsDone()
    {
        $this->isDone = true;
        //$this->dateUpdated = new DateTime();
        //$this->dateDone = new DateTime();
    }

    public function getComment(): array
    {
        return $this->comment;
    }


    public function setComment(array $comment): self
    {
        $this->comment[] = $comment;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
        $this->dateUpdated = new DateTime('now');
    }

    public function getDateUpdated(): DateTime
    {
        return $this->dateUpdated;
    }

    public function setDateUpdated(DateTime $dateUpdated): void
    {
        $this->dateUpdated = $dateUpdated;
    }

    public function getDateDone(): DateTime
    {
        return $this->dateDone;
    }


    public function setDateDone(DateTime $dateDone): void
    {
        $this->dateDone = $dateDone;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;
        return $this;
    }

    public function getIsDone(bool $isDone): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

}