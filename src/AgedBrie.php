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
        if ($this->quality < 50) {
            $this->quality++;
        }

        $this->sell_in--;

        if ($this->quality < 50 && $this->sell_in < 0) {
            $this->quality++;
        }
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
