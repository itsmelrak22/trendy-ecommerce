<?php
spl_autoload_register(function ($class) {
    include '../models/' . $class . '.php';
  });

$product = new Product; // intantiate

$productParameter = [
    'name' => 'new update'
];

print_r($product->all());