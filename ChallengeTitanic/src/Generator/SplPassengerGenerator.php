<?php

namespace App\Generator;

use App\Passenger;
use SplFileObject;

class SplPassengerGenerator implements PassengerGeneratorInterface
{
    private SplFileObject $file;

    public function __construct()
    {
        $this->file = new SplFileObject(__DIR__.'/../data/titanic.csv');
    }

    public function getGenerator($fileName) : iterable{
        $cpt=0;
        foreach ($this->file as $line){
            if($cpt++===0) continue;
            yield new Passenger(...str_getcsv($line));
        }
    }
}