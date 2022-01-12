<?php

namespace App\Observers;

use \SplObserver;
use \SplSubject;

class LogSum implements SplObserver {
    private array $logs;

    public function update(SplSubject $subject):void{
        $this->logs[] = //sprintf("Total panier : %s", $subject->total());
        $subject->total();
    }
} 