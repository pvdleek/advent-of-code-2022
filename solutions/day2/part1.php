#!/usr/bin/php
<?php

const BET_SCORE = ['X' => 1, 'Y' => 2, 'Z' => 3];
const SCORE_LOOSE = 0;
const SCORE_DRAW = 3;
const SCORE_WIN = 6;

// my-bet_his-bet => score
const SCORE_MODEL = [
    'X_A' => SCORE_DRAW,
    'X_B' => SCORE_LOOSE,
    'X_C' => SCORE_WIN,
    'Y_A' => SCORE_WIN,
    'Y_B' => SCORE_DRAW,
    'Y_C' => SCORE_LOOSE,
    'Z_A' => SCORE_LOOSE,
    'Z_B' => SCORE_WIN,
    'Z_C' => SCORE_DRAW,
];

$total_score = 0;

$file_handle = fopen('input.txt', 'r');
while (!feof($file_handle)) {
    $line = fgets($file_handle);

    if (strlen($line) > 0) {
        $bets = explode(' ', $line);

        $his_bet = trim($bets[0]);
        $my_bet = trim($bets[1]);

        $total_score += SCORE_MODEL[$my_bet.'_'.$his_bet] + BET_SCORE[$my_bet];
    }
}

echo "\nYou scored $total_score\n";
