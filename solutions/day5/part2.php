#!/usr/bin/php
<?php

$stacks = [];
$stack_lines = [];

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = rtrim(fgets($file_handle));
    if (strlen($line) > 0) {
        if (count($stacks) < 1) {
            $stack_lines[] = $line;
        } else {
            $actions = explode(' ', $line);
            if ('move' === $actions[0]) {
                $moving_items = [];
                for ($move_nr = 1; $move_nr <= (int) $actions[1]; ++$move_nr) {
                    $moving_items[] = array_pop($stacks[$actions[3]]);
                }
                $moving_items = array_reverse($moving_items);
                foreach ($moving_items as $moving_item) {
                    $stacks[$actions[5]][] = $moving_item;
                }
            }
        }
    } else {
        // Empty line indicates the separation between stack information and move information, so now it's time to create the $stacks array
        for ($stack_nr = count($stack_lines) - 2; $stack_nr >= 0; --$stack_nr) {
            $stack_information = str_split($stack_lines[$stack_nr], 4);
            foreach ($stack_information as $stack_number => $stack_info) {
                if (strlen(trim($stack_info)) > 0) {
                    $stacks[$stack_number + 1][] = substr($stack_info, 1, 1);
                }
            }
        }
    }
}

echo "Top of the stacks: ";
foreach ($stacks as $stack) {
    echo array_pop($stack);
}
echo "\n";
