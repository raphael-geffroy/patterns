<?php

namespace App\Observer;

class SexPassengerCollectionObserver extends AbstractPassengerCollectionObserver
{
    function printStat(string $sex, int $class)
    {
        echo("$sex survival rate :\n");
        echo($this->statPassengerProvider->getSurvivalChances($sex));
        echo("\n");
    }
}