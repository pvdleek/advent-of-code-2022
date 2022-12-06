#!/usr/bin/php
<?php

$file_handle = fopen('input.txt', 'r');
$line = trim(fgets($file_handle));

for ($position = 13; $position < strlen($line); ++$position) {
    if (14 === count(array_unique(str_split(substr($line, $position - 14, 14))))) {
        echo "\nFound sequence at position ".$position;
        exit();
    }
}
