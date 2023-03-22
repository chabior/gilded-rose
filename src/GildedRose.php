<?php

namespace App;

final class GildedRose
{
    public function updateQuality(Item $item): void
    {
        $item->update();
    }
}