<?php

namespace App\Observer;

class SexAndClassPassengerCollectionObserver extends AbstractPassengerCollectionObserver
{
    function printStat(string $sex, int $class)
    {
        echo("$sex in class $class survival rate :\n");
        echo($this->statPassengerProvider->getSurvivalChances($sex, $class));
        echo("\n");
    }
}