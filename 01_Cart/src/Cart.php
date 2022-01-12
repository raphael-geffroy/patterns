<?php

namespace App;

use SplObjectStorage;
use SplObserver;
use SplSubject;

class Cart implements SplSubject
{
    private SplObjectStorage $observers;
    private $storage;
    private $tva;

    public function __construct(array $storage = [], float $tva = 0.2)
    {
        $this->tva = $tva;
        $this->storage = $storage;
        $this->observers = new SplObjectStorage();
    }

    public function buy(Product $product, int $quantity): void
    {
        $total = $quantity * $product->getPrice() * ($this->tva + 1);

        $this->storage[$product->getName()] = $total;
        $this->notify();
    }

    public function reset(): void
    {
        $this->storage = [];
        $this->notify();
    }

    public function total(): float
    {
        return array_sum($this->storage);
    }

    public function restore(Product $product): void
    {
        if (isset($this->storage[$product->getName()])) {
            unset($this->storage[$product->getName()]);
        }
        $this->notify();
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        /** @var SplObserver $observer */
        foreach($this->observers as $observer){
            $observer->update($this);
        }
    }
}