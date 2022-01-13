<?php

use App\Generator\SplPassengerGenerator;
use App\PassengerCollection;

require_once __DIR__ . '/vendor/autoload.php';
$generator = (new SplPassengerGenerator())->getGenerator(__DIR__ . '/data/titanic.csv');
$stat = [];
foreach($generator as $passenger){
    $stat[$passenger->survived][$passenger->sex][$passenger->class] =
        ($stat[$passenger->survived][$passenger->sex][$passenger->class]??0)+1;
}

printStats($stat['1'], $stat['0']);

function printStats(array $stat, array $other, string $indent = ""){
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
}
function countPassengers(array $array, int &$count = 0): int
{
    foreach ($array as $line){
        if(is_array($line)){
            countPassengers($line, $count);
        } else {
            $count+=$line;
        }
    }
    return $count;
}