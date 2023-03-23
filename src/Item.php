<?php

declare(strict_types=1);

namespace App;

final class Item
{
    public function __construct(
        private readonly string $name,
        private SeasoningData $seasoningData
    ) {
    }

    public function update(SeasoningPolicy $seasoningPolicy): void
    {
        $this->seasoningData = $seasoningPolicy->update($this->seasoningData);
    }

    public function getSellIn(): int
    {
        return $this->seasoningData->sellIn;
    }

    public function getQuality(): int
    {
        return $this->seasoningData->quality;
    }

    public function getName(): string
    {
        return $this->name;
    }
}