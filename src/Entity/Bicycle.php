<?php

// src/Entity/Bicycle.php

namespace App\Entity;

class Bicycle
{
    private $brand;
    private $color;
    private $value;
    private $isRunning;

    public function __construct(string $brand, string $color, float $value)
    {
        $this->brand = $brand;
        $this->color = $color;
        $this->value = $value;
        $this->isRunning = false;
    }

    public function start()
    {
        if ($this->isRunning) {
            throw new \Exception('The bicycle is already running.');
        }

        $this->isRunning = true;
    }

    public function stop()
    {
        if (!$this->isRunning) {
            throw new \Exception('The bicycle is already stopped.');
        }

        $this->isRunning = false;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function isRunning(): bool
    {
        return $this->isRunning;
    }
}
