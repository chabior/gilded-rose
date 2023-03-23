<?php

declare(strict_types=1);

namespace App\Policy;

class SellInThreshold
{
    public function __construct(private readonly int $value, public readonly ?int $speed)
    {
    }

    public function meets(int $sellIn): bool
    {
        return $this->value >= $sellIn;
    }
}
