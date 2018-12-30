<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 30/12/2018
 * Time: 03:33 ص
 */

class HeapSort
{

    /**
     * Best time complexity Ω(nlog(n))
     * Worst time complexity O (nlog(n))
     * Average time complexity Θ(nlog(n))
     * Space Complexity (Worst case) O(1)
     *
     * Compared to merge sort, heap sort has better space complexity. As a result, many developers prefer heap
     * sort for sorting lists of items
     */

    /**
     * HeapSort constructor.
     * @param array $array
     */
    function __construct(array &$array)
    {
        $length = count($array);
        $this->buildHeap($array);
        $heapSize = $length - 1;
        for ($i = $heapSize; $i >= 0; $i--) {
            $tmp = $array[0];
            $array[0] = $array[$heapSize];
            $array[$heapSize] = $tmp;
            $heapSize--;
            $this->heapify($array, 0, $heapSize);
        }
    }

    function buildHeap(array $array)
    {
        $length = count($array);
        $heapSize = $length - 1;
        for ($i = ($length / 2); $i >= 0; $i--) {
            $this->heapify($array, $i, $heapSize);
        }
    }

    function heapify(array &$a, int $i, int $heapSize)
    {
        $largest = $i;
        $l = 2 * $i + 1;
        $r = 2 * $i + 2;
        if ($l <= $heapSize && $a[$l] > $a[$i]) {
            $largest = $l;
        }

        if
        ($r <= $heapSize && $a[$r] > $a[$largest]) {
            $largest = $r;
        }
        if
        ($largest != $i) {
            $tmp = $a[$i];
            $a[$i] = $a[$largest];
            $a[$largest] = $tmp;
            $this->heapify($a, $largest, $heapSize);
        }
    }
}