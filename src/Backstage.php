<?php

declare(strict_types=1);

namespace App;

class Backstage implements UpdatableItem
{
    public function __construct(
        private readonly string $name,
        private int $sell_in,
        private int $quality
    ) {
    }

    public function update(): void
    {
        $this->sell_in--;
        if ($this->sell_in <= 0) {
            $this->quality = 0;
            return;
        }

        $speed = 1;

        if ($this->sell_in <= 9) {
            $speed = 2;
        }

        if ($this->sell_in <= 5) {
            $speed = 3;
        }

        $this->quality = min($this->quality + $speed, 50);
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
