#!/usr/bin/php
<?php

$full_overlap_count = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = trim(fgets($file_handle));
    $elfes = explode(',', $line);
    $sections_1 = explode('-', $elfes[0]);
    $sections_2 = explode('-', $elfes[1]);

    if ($sections_1[0] <= $sections_2[0] && $sections_1[1] >= $sections_2[1]) {
        ++$full_overlap_count;
    } elseif ($sections_2[0] <= $sections_1[0] && $sections_2[1] >= $sections_1[1]) {
        ++$full_overlap_count;
    }
}

echo "Full overlap count is $full_overlap_count\n";
