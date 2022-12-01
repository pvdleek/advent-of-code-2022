#!/usr/bin/php
<?php

$max_total = 0;
$running_total = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = fgets($file_handle);
    if ((int) $line > 0) {
        $running_total += (int) $line;
    } else {
        if ($running_total > $max_total) {
            $max_total = $running_total;
        }
        $running_total = 0;
    }
}

echo $max_total;
