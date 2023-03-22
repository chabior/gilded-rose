<?php

namespace App;

final class Item
{
    public function __construct(
        private readonly string $name,
        private int $sell_in,
        private int $quality
    ) {
    }

    public function update(): void
    {
        if ($this->getName() != 'Aged Brie' and $this->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
            if ($this->getQuality() > 0) {
                if ($this->getName() != 'Sulfuras, Hand of Ragnaros') {
                    $this->setQuality($this->getQuality() - 1);
                } else {
                    $this->setQuality(80);
                }
            }
        } else {
            if ($this->getQuality() < 50) {
                $this->setQuality($this->getQuality() + 1);
                if ($this->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->getSellIn() < 11) {
                        if ($this->getQuality() < 50) {
                            $this->setQuality( $this->getQuality() + 1);
                        }
                    }
                    if ($this->getSellIn() < 6) {
                        if ($this->getQuality() < 50) {
                            $this->setQuality($this->getQuality() + 1);
                        }
                    }
                }
            }
        }

        if ($this->getName() != 'Sulfuras, Hand of Ragnaros') {
            $this->setSellIn($this->getSellIn() - 1);
        }

        if ($this->getSellIn() < 0) {
            if ($this->getName() != 'Aged Brie') {
                if ($this->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($this->getQuality() > 0) {
                        if ($this->getName() != 'Sulfuras, Hand of Ragnaros') {
                            $this->setQuality($this->getQuality() - 1);
                        }
                    }
                } else {
                    $this->setQuality($this->getQuality() - $this->getQuality());
                }
            } else {
                if ($this->getQuality() < 50) {
                    $this->setQuality($this->getQuality() + 1);
                }
            }
        }
    }

    private function getSellIn(): int
    {
        return $this->sell_in;
    }

    private function getQuality(): int
    {
        return $this->quality;
    }

    private function getName(): string
    {
        return $this->name;
    }

    private function setQuality(int $quality): void
    {
        $this->quality = $quality;
    }

    private function setSellIn(int $sell_in): void
    {
        $this->sell_in = $sell_in;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}