<?php

namespace App;

use App\Passenger;
use App\SubjectTrait;
use SplFileObject;

class StatPassengerProvider
{
    private SplFileObject $file;
    private array $stat = [];

    public function __construct()
    {
        $this->file = new SplFileObject(__DIR__.'/../data/titanic.csv');
        $cpt=0;
        foreach ($this->file as $line){
            if($cpt++===0) continue;
            $passenger = new Passenger(...str_getcsv($line));
            $this->stat[$passenger->survived][$passenger->sex][$passenger->class] =
                ($this->stat[$passenger->survived][$passenger->sex][$passenger->class]??0)+1;
        }
    }

    public function getSurvivalChances(?string $sex = null, ?int $class = null){
        if(!is_null($sex)){
            if(!is_null($class)){
                return $this->stat[1][$sex][$class]/
                    ($this->stat[0][$sex][$class]+ $this->stat[1][$sex][$class]);
            }
            return self::countPassengers($this->stat[1][$sex])/self::countPassengers([$this->stat[0][$sex], $this->stat[1][$sex]]);
        }
        return self::countPassengers($this->stat[1])/self::countPassengers([$this->stat[0], $this->stat[1]]);
    }

    /*private function printStats(array $stat, array $other, string $indent = ""){
        ksort($stat);
        echo(countPassengers($stat)/countPassengers([$stat, $other]));
        foreach ($stat as $key => $line){
            echo("\n$indent----$key----\n");
            if(is_array($line)){
                printStats($line, $other[$key]);
            } else {
                echo($indent.$line/($line + $other[$key]));
            }
        }
    }*/

    private static function countPassengers(array $array, int &$count = 0): int
    {
        foreach ($array as $line){
            if(is_array($line)){
                self::countPassengers($line, $count);
            } else {
                $count+=$line;
            }
        }
        return $count;
    }
}
