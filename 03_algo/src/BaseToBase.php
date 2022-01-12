<?php

namespace App;

class BaseToBase implements IStrategy {
    public function __construct(private int $base, private int $dest)
    {
        
    }
    public function execute(string $value){
        return base_convert($value,$this->base,$this->dest);
    }
}