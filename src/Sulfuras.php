<?php

declare(strict_types=1);

namespace App;

class Sulfuras implements UpdatableItem
{
    public function __construct(
        private readonly string $name,
        private int $sell_in,
        private int $quality
    ) {
    }

    public function update(): void
    {
        //nothing happens
    }

    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }
}
