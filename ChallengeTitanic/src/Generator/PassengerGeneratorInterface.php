<?php

namespace App\Generator;

interface PassengerGeneratorInterface
{
    function getGenerator($fileName): iterable;
}