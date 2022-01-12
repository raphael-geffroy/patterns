<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Model\Person;
use Ds\Map;

$populationFile = new SplFileObject(__DIR__.'/Data/populations.txt');
$relationFile = new SplFileObject(__DIR__.'/Data/relationships.txt');


$storage = new Map();

foreach($populationFile as [$id, $name]){
    $person = new Person($id,$name, []);
    $storage->put($id, $person);
}

$sum = 0;
foreach($population as $person){
    $sum += $person->countRelations();
}

echo("".($sum/$population->count()));