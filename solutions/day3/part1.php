#!/usr/bin/php
<?php

$total_priority = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = trim(fgets($file_handle));

    if (strlen($line) > 0) {
        $first_items = str_split(substr($line, 0, strlen($line) / 2));
        $second_items = str_split(substr($line, strlen($line) / 2));

        $similar_items = array_unique(array_intersect($first_items, $second_items));
        foreach ($similar_items as $item) {
            $total_priority += ord($item) >= 97 ? ord($item) - 96 : ord($item) - 38;
        }
    }
}

echo "Your total priority is $total_priority\n";
