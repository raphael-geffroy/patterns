<?php

namespace App;

interface IStrategy {
    public function execute(string $value);
}