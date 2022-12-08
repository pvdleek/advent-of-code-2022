#!/usr/bin/php
<?php

$trees = [];
$number_of_visible_trees = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = trim(fgets($file_handle));
    $trees[] = str_split($line);
}

$number_of_visible_trees = 2 * count($trees[0]);
for ($row = 1; $row < count($trees) - 1; ++$row) {
    $number_of_visible_trees += 2;
    for ($column = 1; $column < count($trees[$row]) - 1; ++$column) {
        $tree_height = $trees[$row][$column];

        // Left check
        $visible = true;
        for ($left_tree = $column - 1; $left_tree >= 0; --$left_tree) {
            if ($trees[$row][$left_tree] >= $tree_height) {
                $visible = false;
                break;
            }
        }
        if ($visible) {
            ++$number_of_visible_trees;
            continue;
        }

        // Right check
        $visible = true;
        for ($right_tree = $column + 1; $right_tree < count($trees[$row]); ++$right_tree) {
            if ($trees[$row][$right_tree] >= $tree_height) {
                $visible = false;
                break;
            }
        }
        if ($visible) {
            ++$number_of_visible_trees;
            continue;
        }

        // Up check
        $visible = true;
        for ($up_tree = $row - 1; $up_tree >= 0; --$up_tree) {
            if ($trees[$up_tree][$column] >= $tree_height) {
                $visible = false;
                break;
            }
        }
        if ($visible) {
            ++$number_of_visible_trees;
            continue;
        }

        // Down check
        $visible = true;
        for ($down_tree = $row + 1; $down_tree < count($trees); ++$down_tree) {
            if ($trees[$down_tree][$column] >= $tree_height) {
                $visible = false;
                break;
            }
        }
        if ($visible) {
            ++$number_of_visible_trees;
            continue;
        }
    }
}

echo sprintf("\nFound %d visible trees", $number_of_visible_trees);
