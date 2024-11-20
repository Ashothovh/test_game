<?php

include_once("StringGenerator.php");

abstract class Player
{
    protected int $attack;
    protected int $defense;
    protected int $health;
    protected int $recovery;
    protected string $name;

    public function __construct(string $name, int $attack, int $defense, int $health, int $recovery)
    {
        $this->name = $name;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->health = $health;
        $this->recovery = $recovery;
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    public function damaging(int $damage): void
    {
        // $this->health = $this->health - ($damage - $this->defense); // ete > 0
        $this->health -= max(0, $damage - $this->defense);
        // $this->health = $this->health - max(0, $damage - $this->defense);

    }

    public function recover(): void
    {
        // $this->health = $this->health + $this->recovery;
        $this->health += $this->recovery;
    }

    public function fire(Player $target): void
    {
        echo "$this->name  fires at  $target->name <br>";
        $target->damaging($this->attack);
        echo "$target->name health: $target->health <br>";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }
}







