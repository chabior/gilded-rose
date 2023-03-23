<?php

declare(strict_types=1);

namespace App\Policy;

use App\SeasoningData;
use App\SeasoningPolicy;

class SellInBasedSpeedSeasoningPolicy implements SeasoningPolicy
{
    /**
     * @var SellInThreshold[]
     */
    private array $sellInSpeedConfig;

    public function __construct(
        private readonly int $maxQuality,
        private readonly int $defaultSpeed,
        SellInThreshold ...$sellInSpeedConfig,
    ) {
        $this->sellInSpeedConfig = $sellInSpeedConfig;
    }

    public function update(SeasoningData $seasoningData): SeasoningData
    {
        $seasoningData = $seasoningData->decreaseSellInTime();

        $speed = $this->defaultSpeed;

        foreach ($this->sellInSpeedConfig as $sellingThreshold) {
            if ($sellingThreshold->meets($seasoningData->sellIn)) {
                $speed = $sellingThreshold->speed;
            }
        }

        return $seasoningData->changeQuality($speed, $this->maxQuality);
    }
}
