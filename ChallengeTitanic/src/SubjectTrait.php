<?php

namespace App;

use SplObjectStorage;
use SplObserver;

trait SubjectTrait
{
    private SplObjectStorage $observers;

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