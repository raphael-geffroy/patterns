<?php

namespace App;

abstract class Context {
    public function __construct(protected IStrategy $strategy){
    }

    abstract public function getUse(string $value);
}