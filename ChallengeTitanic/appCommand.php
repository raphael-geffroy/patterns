<?php

use App\Observer\SexAndClassPassengerCollectionObserver;
use App\PassengerCollection;
use App\StatPassengerProvider;
use App\Observer\SexPassengerCollectionObserver;

require_once __DIR__ . '/vendor/autoload.php';

$statProvider = new StatPassengerProvider();
$passengerCollection = new PassengerCollection();
$passengerCollection->attach(
    $argv[1]
        ?new SexAndClassPassengerCollectionObserver($statProvider)
        :new SexPassengerCollectionObserver($statProvider)
);

$passengerCollection->setPerson($argv[2], $argv[3], (int)$argv[4]);
