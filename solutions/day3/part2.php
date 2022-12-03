#!/usr/bin/php
<?php

$total_priority = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line1 = trim(fgets($file_handle));
    $line2 = trim(fgets($file_handle));
    $line3 = trim(fgets($file_handle));

    $line1_items = str_split($line1);
    $line2_items = str_split($line2);
    $line3_items = str_split($line3);

    var_dump($line1_items);
    var_dump($line2_items);
    var_dump($line3_items);

    $similar_items = array_unique(array_intersect($line1_items, $line2_items, $line3_items));
    var_dump($similar_items);
    foreach ($similar_items as $item) {
        $total_priority += ord($item) >= 97 ? ord($item) - 96 : ord($item) - 38;
    }
    var_dump($total_priority);
}

echo "Your total priority is $total_priority\n";
