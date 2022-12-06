#!/usr/bin/php
<?php

$file_handle = fopen('input.txt', 'r');
$line = trim(fgets($file_handle));

for ($position = 3; $position < strlen($line); ++$position) {
    if (4 === count(array_unique(str_split(substr($line, $position - 4, 4))))) {
        echo "\nFound sequence at position ".$position;
        exit();
    }
}
