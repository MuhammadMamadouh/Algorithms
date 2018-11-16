<?php


/**
 * Binary Search Algorithm
 *
 * Best time complexity O(1)
 * Worst time complexity O(log n)
 * Average time complexity O(log n)
 * Space complexity (worst case) O(1)
 *
 *
 * @param array $numbers
 * @param int $needle
 * @return bool
 */
function binarySearch(array $numbers, int $needle): bool
{
    $low = 0;

    $high = count($numbers) - 1;

    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);

        if ($numbers[$mid] > $needle) {
            $high = $mid - 1;
        } elseif ($numbers[$mid] < $needle) {
            $low = $mid + 1;
        } else {
            return true;
        }
    }
    return False;
}


/**
 * Binary search with recursive algorithm
 *
 * @param array $list
 * @param int $needle
 * @param int $low
 * @param int $high
 * @return bool
 */
function recursiveBinarySearch(array $list, int $needle, int $low, int $high): bool
{
    if ($high < $low)
        return false;

    $mid = (int)(($low + $high) / 2);

    if ($list[$mid] > $needle) {
        return recursiveBinarySearch($list, $needle, $low, $mid - 1);
    } elseif ($list[$mid] < $needle) {
        return recursiveBinarySearch($list, $needle, $mid + 1, $high);
    } else {
        return true;
    }
}


function repetitiveBinarySearch(array $numbers, int $needle): int
{
    $low = 0;
    $high = count($numbers) - 1;
    $firstOccurrence = -1;

    while ($low <= $high - 1) {
        $mid = (int)(($low + $high) / 2);

        if ($numbers[$mid] === $needle) {
            $firstOccurrence = $mid;
            $high = $mid - 1;
        } elseif ($numbers[$mid] > $needle) {
            $high = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return $firstOccurrence;

}

//$numbers = range(0, 1000, 5);
$numbers = [5, 53, 55, 6, 8, 9];

$number = 5;

if (recursiveBinarySearch($numbers, $number, 0, count($numbers) - 1)) {
    echo 'found';
} else {
    echo 'not found';
}

echo '</br>' . repetitiveBinarySearch($numbers, $number);