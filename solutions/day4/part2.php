#!/usr/bin/php
<?php

$overlap_count = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = trim(fgets($file_handle));
    $elfes = explode(',', $line);
    $sections_1 = explode('-', $elfes[0]);
    $sections_2 = explode('-', $elfes[1]);

    for ($section_nr = $sections_1[0]; $section_nr <= $sections_1[1]; ++$section_nr) {
        if ($section_nr >= $sections_2[0] && $section_nr <= $sections_2[1]) {
            ++$overlap_count;
            break;
        }
    }
}

echo "Overlap count is $overlap_count\n";
