<?php
/**
 * Plugin Name: Bowling Score Calculator
 * Description: A simple PHP class to calculate the score of a ten-pin bowling game.
 * Version: 1.0.0
 * Author: Harshad Mane
 * Author URI: https://NumeroGuru.net
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 */
 
class BowlingScoreCalculator {
    private $rolls = [];

    // Add rolls (frames) into the game
    public function __construct(array $frames) {
        foreach ($frames as $frame) {
            foreach ($frame as $pins) {
                $this->rolls[] = $pins;
            }
        }
    }

    // Main function to calculate score
    public function score(): int {
        $score = 0;
        $rollIndex = 0;

        // A bowling game always has 10 frames
        for ($frame = 1; $frame <= 10; $frame++) {
            if ($this->isStrike($rollIndex)) {
                // Strike: 10 + next two rolls
                $score += 10 + $this->strikeBonus($rollIndex);
                $rollIndex += 1; // Strike consumes only 1 roll
            } elseif ($this->isSpare($rollIndex)) {
                // Spare: 10 + next roll
                $score += 10 + $this->spareBonus($rollIndex);
                $rollIndex += 2;
            } else {
                // Open frame: just sum of two rolls
                $score += $this->sumOfBallsInFrame($rollIndex);
                $rollIndex += 2;
            }
        }

        return $score;
    }

    // Helper: check if strike
    private function isStrike(int $rollIndex): bool {
        return $this->rolls[$rollIndex] === 10;
    }

    // Helper: check if spare
    private function isSpare(int $rollIndex): bool {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1] === 10;
    }

    // Helper: strike bonus
    private function strikeBonus(int $rollIndex): int {
        return $this->rolls[$rollIndex + 1] + $this->rolls[$rollIndex + 2];
    }

    // Helper: spare bonus
    private function spareBonus(int $rollIndex): int {
        return $this->rolls[$rollIndex + 2];
    }

    // Helper: sum of two rolls
    private function sumOfBallsInFrame(int $rollIndex): int {
        return $this->rolls[$rollIndex] + $this->rolls[$rollIndex + 1];
    }
}

// ---------------- Example Test ----------------
$frames = [
    [5, 3],   // Frame 1: Open
    [10],     // Frame 2: Strike
    [4, 6],   // Frame 3: Spare
    [5, 0]    // Frame 4: Open
];

$game = new BowlingScoreCalculator($frames);
echo "Final Score: " . $game->score(); // Expected output: 48
