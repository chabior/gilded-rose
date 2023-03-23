<?php

declare(strict_types=1);

namespace App;

final class GildedRose
{
    public function __construct(private readonly SeasoningPolicyFactory $seasoningPolicyFactory)
    {
    }

    public function updateQuality(Item $item): void
    {
        $item->update($this->seasoningPolicyFactory->forItem($item));
    }
}
