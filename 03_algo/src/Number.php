<?php

namespace App;

class Number extends Context {
    public function getUse(string $value){
        return $this->strategy->execute($value);
    }
}