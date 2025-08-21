# Bowling Score Calculator

A simple PHP class to calculate the score of a ten-pin bowling game.
This implementation follows standard bowling rules (10 frames, strike/spare bonuses).

---

## Features

* Supports strike (`10`) scoring (adds next 2 rolls as bonus).
* Supports spare scoring (adds next roll as bonus).
* Handles open frames correctly.
* Clean, maintainable, production-ready code.
* Easy to extend for testing and future improvements.

---

## Installation & Usage

1. Clone or download the PHP file.
2. Include it in your project:

```php
require_once 'bowling.php';
```

3. Create a new game with frames:

```php
$frames = [
    [5, 3],   // Frame 1: Open
    [10],     // Frame 2: Strike
    [4, 6],   // Frame 3: Spare
    [5, 0]    // Frame 4: Open
];

$game = new BowlingScoreCalculator($frames);
echo "Final Score: " . $game->score(); 
```

---

## Scoring Example

For the above input:

* Frame 1: 5 + 3 = 8
* Frame 2 (Strike): 10 + (4+6 bonus) = 20 → Total = 28
* Frame 3 (Spare): 10 + (next roll 5 bonus) = 15 → Total = 43
* Frame 4: 5 + 0 = 5 → Total = 48

**Final Score = 48**

---

## Rules Implemented

* **Strike** → 10 + sum of next two rolls
* **Spare** → 10 + next roll
* **Open Frame** → sum of both rolls
* **Game** → always 10 frames

---

## Author

**Harshad Mane**
Version: `1.0.0`
License: [MIT](https://opensource.org/licenses/MIT)

---
