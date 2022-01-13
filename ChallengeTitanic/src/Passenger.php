<?php
namespace App;

class Passenger
{
    public function __construct(
        public $id,
        public $survived,
        public $class,
        public $name,
        public $sex,
        public $age,
        public $sibSp,
        public $parch,
        public $ticket,
        public $fare,
        public $cabin,
        public $embarked
    ){

    }
}