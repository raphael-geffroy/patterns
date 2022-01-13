<?php

namespace App;

class PassengerCollection implements \SplSubject
{
    use SubjectTrait;
    private array $persons;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }


    public function setPerson(string $name, string $sex, int $class){
        $this->persons[] = [$name,$sex, $class];
        $this->notify();
    }

    public function getLastPerson(): array {
        return end($this->persons);
    }

}