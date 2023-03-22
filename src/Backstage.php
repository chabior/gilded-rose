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
        if ($this->quality < 50) {
            $this->quality++;

            if ($this->getSellIn() < 11) {
                $this->quality++;
            }

            if ($this->getSellIn() < 6) {
                $this->quality++;
            }
        }

        $this->sell_in--;

        if ($this->sell_in < 0) {
            $this->quality = 0;
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
