<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Model\Person;
use Ds\Map;

$population = new Map();
$populationFile = new SplFileObject(__DIR__.'/Data/populations.txt');
foreach($populationFile as $line){
    [$id, $name] = explode(", ", str_replace("\n","",$line));
    $person = new Person($id,$name);
    $population->put($id, $person);
}

$relationFile = new SplFileObject(__DIR__.'/Data/relationships.txt');
foreach($relationFile as $line){
    [$id1, $id2] = explode(", ", trim($line));
    $person1 = $population->get($id1);
    $person2 = $population->get($id2);
    $person1->addRelation($person2);
    $person2->addRelation($person1);
}

$sum = 0;
foreach($population as $person){
    $sum += $person->countRelations();
}

echo("".($sum/$population->count()));