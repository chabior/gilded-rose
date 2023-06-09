<?php

declare(strict_types=1);

namespace App;

final class SeasoningData
{
    public function __construct(
        public readonly int $sellIn,
        public readonly int $quality,
    ) {
    }

    public function changeQuality(?int $speed, int $maxQuality): self
    {
        if ($speed === null) {
            $quality = 0;
        } else {
            $quality = $this->quality + $speed;
        }

        $quality = max(0, $quality);
        $quality = min($maxQuality, $quality);

        return new self($this->sellIn, $quality);
    }

    public function decreaseSellInTime(): self
    {
        return new self($this->sellIn - 1, $this->quality);
    }
}
