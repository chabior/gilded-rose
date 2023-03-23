<?php

declare(strict_types=1);

namespace App\Policy;

class SellInThresholdBuilder
{
    private ?int $speed;

    public function __construct(
        private readonly SellInBasedSpeedSeasoningPolicyBuilder $seasoningPolicyBuilder,
        private readonly int $threshold,
        private readonly int $defaultSpeed
    ) {
        $this->speed = $this->defaultSpeed;
    }

    public function then(int $speed): SellInBasedSpeedSeasoningPolicyBuilder
    {
        $this->speed = $speed;

        return $this->seasoningPolicyBuilder;
    }

    public function thenChangeQualityToZero(): SellInBasedSpeedSeasoningPolicyBuilder
    {
        $this->speed = null;

        return $this->seasoningPolicyBuilder;
    }

    public function build(): SellInThreshold
    {
        return new SellInThreshold($this->threshold, $this->speed);
    }
}
