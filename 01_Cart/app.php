<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\{Cart, Product};
use App\Observers\{LogFile, LogSum};

$cart = new Cart([]);

// Observers
$logFile = new LogFile;
$logSum = new LogSum;

$cart->attach($logFile);
$cart->attach($logSum);
// Ajoutez des produits ...

// $products = [
//     'apple' => new Product('apple', 10.5),
//     'raspberry' => new Product('raspberry', 13),
//     'strawberry' => new Product('strawberry', 7.5),
//     'orange' => new Product('orange', 7.5),
// ];
// extract($products);

$product = new Product('product 1', 10);
$product2 = new Product('product 2', 20);
$cart->buy($product,2);
$cart->buy($product2, 2);
// detach Observer
$cart->detach($logSum);
$cart->detach($logFile);


// recommandez des produits et vérifiez qu'ils ne sont pas de LogSum
$cart->buy($product,2);
$cart->buy($product2, 2);
