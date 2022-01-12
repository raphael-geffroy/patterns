<?php

namespace App;

class DecToHexa implements IStrategy {
    public function execute(string $value){
        return base_convert($value,10,16);
    }
}