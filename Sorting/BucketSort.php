<?php

/**
 * Sort Array using Merge sort algorithm
 *
 * Best time complexity Ω(nlog(n))
 * Worst time complexity O(n2)
 * Average time complexity Θ(nlog(n))
 * Space complexity (worst case) O(log(n))
 *
 * @param array $arr
 * @return void
 */
function bucketSort(array &$data)
{
    $n = count($data);
    if ($n <= 0) return;

    $min = min($data);
    $max = max($data);
    $bucket = [];

    $bLen = $max - $min + 1;

    $bucket = array_fill(0, $bLen, []);

    for ($i = 0; $i < $n; $i++) {
        array_push($bucket[$data[$i] - $min], $data[$i]);
    }
}



