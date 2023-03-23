<?php

declare(strict_types=1);

namespace App;

interface SeasoningPolicy
{
    public function update(SeasoningData $seasoningData): SeasoningData;
}
