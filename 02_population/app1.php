<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Model\Person;
use App\MyIterator;
use Ds\Map;

$population = new Map();
$populationFile = new MyIterator(__DIR__.'/Data/populations.txt');
foreach($populationFile as [$id, $name]){
    $person = new Person($id,$name);
    $population->put($id, $person);
}

$relationFile = new MyIterator(__DIR__.'/Data/relationships.txt');
foreach($relationFile as [$id1, $id2]){
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