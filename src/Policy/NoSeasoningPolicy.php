<?php

declare(strict_types=1);

namespace App\Policy;

use App\SeasoningData;
use App\SeasoningPolicy;

class NoSeasoningPolicy implements SeasoningPolicy
{
    public function update(SeasoningData $seasoningData): SeasoningData
    {
        return $seasoningData;
    }
}
