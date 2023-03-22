<?php

declare(strict_types=1);

namespace App;

interface UpdatableItem
{
    public function update(): void;

    public function getSellIn(): int;

    public function getQuality(): int;
}
