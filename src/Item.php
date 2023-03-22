<?php

namespace App;

final class Item
{
    public function __construct(
        private readonly string $name,
        private int $sell_in,
        private int $quality
    ) {
    }

    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    public function setSellIn(int $sell_in): void
    {
        $this->sell_in = $sell_in;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}