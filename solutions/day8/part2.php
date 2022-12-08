#!/usr/bin/php
<?php

$trees = [];
$hightest_scenic_score = 0;

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
        $scenic_score = [];

        // Left check
        $left_score = $column;
        for ($left_tree = $column - 1; $left_tree >= 0; --$left_tree) {
            if ($trees[$row][$left_tree] >= $tree_height) {
                $left_score = $column - $left_tree;
                break;
            }
        }

        // Right check
        $right_score = count($trees[$row]) - $column - 1;
        for ($right_tree = $column + 1; $right_tree < count($trees[$row]); ++$right_tree) {
            if ($trees[$row][$right_tree] >= $tree_height) {
                $right_score = $right_tree - $column;
                break;
            }
        }

        // Up check
        $up_score = $row;
        for ($up_tree = $row - 1; $up_tree >= 0; --$up_tree) {
            if ($trees[$up_tree][$column] >= $tree_height) {
                $up_score = $row - $up_tree;
                break;
            }
        }

        // Down check
        $down_score = count($trees) - $row - 1;
        for ($down_tree = $row + 1; $down_tree < count($trees); ++$down_tree) {
            if ($trees[$down_tree][$column] >= $tree_height) {
                $down_score = $down_tree - $row;
                break;
            }
        }

        $scenic_score = $left_score * $right_score * $up_score * $down_score;
        if ($scenic_score > $hightest_scenic_score) {
            $hightest_scenic_score = $scenic_score;
        }
    }
}

echo sprintf("\nFound %d as highest scenic score", $hightest_scenic_score);
