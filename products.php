<?php
/**
 * Created by PhpStorm.
 * User: sherie
 * Date: 2018-10-10
 * Time: 20:17
 */



//foreach loopen hjälper till att iterera över varje "key" och "value" med hjälp av include.
// Lägga bilderna i array för att förenkla kod. Keep it simple!


$products = [
    [
        "name" => "Blush Rose", // "name" är key och "Blush rose" är value
        "price" => 200,            // "price" är key och 5 är value
         "image" => "images/rose.jpg"    // tillägg
    ],
    [
        "name" => "Blush Peach",
        "price" => 100,
        "image" => "images/pink.jpeg"
    ],
    [
        "name" => "Blush Deep Magenta",
        "price" => 100,
        "image" => "images/magenta.jpeg"
    ],

    [
        "name" => "Blush Magenta",
        "price" => 100,
        "image" => "images/magenta.jpeg"
    ]


];

//product type
