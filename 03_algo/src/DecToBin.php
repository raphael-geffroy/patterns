<?php

namespace App;

class DecToBin implements IStrategy {

    public function execute(string $value){
        return base_convert($value,10,2);
    }
}