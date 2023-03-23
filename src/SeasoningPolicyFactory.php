<?php

declare(strict_types=1);

namespace App;

use App\Policy\NoSeasoningPolicy;
use App\Policy\SellInBasedSpeedSeasoningPolicyBuilder;

class SeasoningPolicyFactory
{
    public function forItem(Item $item): SeasoningPolicy
    {
        return match ($item->getName()) {
            'Aged Brie' => SellInBasedSpeedSeasoningPolicyBuilder::withDefaultSpeed(1)
                ->whenSellInIsLowerThan(0)
                ->then(2)
                ->build(),
            'Sulfuras, Hand of Ragnaros' => new NoSeasoningPolicy(),
            'Backstage passes to a TAFKAL80ETC concert' => SellInBasedSpeedSeasoningPolicyBuilder::withDefaultSpeed(1)
                ->whenSellInIsLowerThan(9)
                ->then(2)
                ->whenSellInIsLowerThan(5)
                ->then(3)
                ->whenSellInIsLowerThan(0)
                ->thenChangeQualityToZero()
                ->build(),
            default => SellInBasedSpeedSeasoningPolicyBuilder::withDefaultSpeed(-1)
                ->whenSellInIsLowerThan(0)
                ->then(-2)
                ->build(),
        };
    }
}
