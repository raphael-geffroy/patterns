<?php

use App\Observer\SexAndClassPassengerCollectionObserver;
use App\PassengerCollection;
use App\StatPassengerProvider;

require_once __DIR__ . '/vendor/autoload.php';

$statProvider = new StatPassengerProvider();
$passengerCollection = new PassengerCollection();
$passengerCollection->attach(new SexAndClassPassengerCollectionObserver($statProvider));

$passengerCollection->setPerson("Alan", "male", 2 );
