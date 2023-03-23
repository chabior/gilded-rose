<?php

declare(strict_types=1);

namespace App\Policy;

class SellInBasedSpeedSeasoningPolicyBuilder
{
    private int $maxQuality = 50;
    /**
     * @var SellInThresholdBuilder[]
     */
    private array $thresholds = [];

    public function __construct(private readonly int $defaultSpeed)
    {
    }

    public static function withDefaultSpeed(int $defaultSpeed): self
    {
        return new self($defaultSpeed);
    }

    public function withMaxQuality(int $maxQuality): self
    {
        $this->maxQuality = $maxQuality;
        return $this;
    }

    public function whenSellInIsLowerThan(int $sellInThreshold): SellInThresholdBuilder
    {
        $sellInThresholdValue = new SellInThresholdBuilder($this, $sellInThreshold, $this->defaultSpeed);
        $this->thresholds[] = $sellInThresholdValue;

        return $sellInThresholdValue;
    }

    public function build(): SellInBasedSpeedSeasoningPolicy
    {
        return new SellInBasedSpeedSeasoningPolicy(
            $this->maxQuality,
            $this->defaultSpeed,
            ...array_map(
                static function (SellInThresholdBuilder $sellInThresholdBuilder): SellInThreshold {
                    return $sellInThresholdBuilder->build();
                },
                $this->thresholds
            )
        );
    }
}
