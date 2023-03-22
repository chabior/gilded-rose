<?php

namespace App;

final class GildedRose
{
    public function updateQuality(UpdatableItem $item): void
    {
        $item->update();
    }
}