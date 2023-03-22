<?php

declare(strict_types=1);

namespace App;

final class AgedBrie implements UpdatableItem
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
        $speed = 1;
        if ($this->sell_in <= 0) {
            $speed = 2;
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
