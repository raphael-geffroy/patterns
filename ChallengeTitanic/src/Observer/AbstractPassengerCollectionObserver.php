<?php

namespace App\Observer;

use App\Passenger;
use App\PassengerCollection;
use App\StatPassengerProvider;
use SplObserver;
use SplSubject;

abstract class AbstractPassengerCollectionObserver implements SplObserver
{
    public function __construct(
        protected StatPassengerProvider $statPassengerProvider
    ){}

    public function update(SplSubject $subject)
    {
        /**
         * @var PassengerCollection $subject
         * @var Passenger $passenger
         */
        [$name, $sex, $class] = $subject->getLastPerson();
        $this->printStat($sex, $class);
    }

    abstract function printStat(string $sex, int $class);

}