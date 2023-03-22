<?php

namespace App;

final class Item implements UpdatableItem
{
    public function __construct(
        private readonly string $name,
        private int $sell_in,
        private int $quality
    ) {
    }

    public function update(): void
    {
        if ($this->getQuality() > 0) {
            $this->setQuality($this->getQuality() - 1);
        }

        $this->setSellIn($this->getSellIn() - 1);

        if ($this->getSellIn() < 0) {
            if ($this->getQuality() > 0) {
                $this->setQuality($this->getQuality() - 1);
            }
        }
    }

    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    public function getQuality(): int
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