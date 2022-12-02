#!/usr/bin/php
<?php

$max_total = [];
$running_total = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if ((int) $line > 0) {
        $running_total += (int) $line;
    } else {
        $max_total[] = $running_total;
        $running_total = 0;
    }
}

rsort($max_total);

echo $max_total[0] + $max_total[1] + $max_total[2];
