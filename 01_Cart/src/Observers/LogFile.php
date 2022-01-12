<?php

namespace App\Observers;

use \SplObserver;
use \SplSubject;

class LogFile implements SplObserver{
    
    private string $fileName;
    
    public function __construct()
    {
        $this->fileName = __DIR__.'/../../logs/log.txt';
    }

    public function update(SplSubject $subject):void{
        file_put_contents($this->fileName, "".$subject->total()."\n", FILE_APPEND);
    }
}