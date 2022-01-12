<?php

use App\{DecToBin, DecToHexa, BaseToBase, Number};

require_once __DIR__ . '/vendor/autoload.php';

echo((new Number(new DecToBin))->getUse("10"));
print_r("\n");
echo((new Number(new DecToHexa))->getUse("10"));
print_r("\n");
echo((new Number(new BaseToBase(2,10)))->getUse("10"));