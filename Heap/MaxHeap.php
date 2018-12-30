<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 30/12/2018
 * Time: 02:44 ص
 */

namespace Heap;


class MaxHeap
{
    public $heap = [];
    public $count = 0;

    public function __construct(int $size)
    {
        $this->heap = array_fill(0, $size, 0);
        $this->count = 0;
    }

    public function create(array $arr = [])
    {
        if ($arr) {
            foreach ($arr as $value) {
                $this->insert($value);
            }
        }
    }

    public function insert(int $value)
    {
        if ($this->count == 0) {
            $this->heap[0] = $value;
            $this->count = 1;
        } else {
            $this->heap[$this->count++] = $value;
            $this->siftUp();
        }
    }

    public function siftUp()
    {
        $tmpPos = $this->count - 1;
        $tmp = intval($tmpPos / 2);

        while ($tmp < $this->count && $this->heap[$tmp] < $this->heap[$tmpPos]) {
            $this->swap($tmp, $tmpPos);

            $tmpPos = intval($tmpPos / 2);
            $tmp = intval($tmpPos / 2);
        }
    }

    public function swap(int $a, int $b)
    {
        $tmp = $this->heap[$a];
        $this->heap[$a] = $this->heap[$b];
        $this->heap[$b] = $tmp;
    }

    public function display()
    {
        echo implode(', ', array_slice($this->heap, 0)) . '<br/>';
    }

    public function extractMax()
    {
        $max = $this->heap[0];
        $this->heap[0] = $this->heap[$this->count - 1];
        $this->heap[$this->count - 1] = 0;
        $this->count--;
        $this->siftDown(0);
        return $max;
    }

    public function siftDown(int $k)
    {
        $largest = $k;
        $left = 2 * $k + 1;
        $right = 2 * $k + 2;

        if ($left < $this->count && $this->heap[$left] > $this->heap[$largest]) {
            $largest = $left;
        }

        if ($right < $this->count && $this->heap[$right] > $this->heap[$largest]) {
            $largest = $right;
        }

        if ($largest != $k) {
            $this->swap($largest, $k);
            $this->siftDown($largest);
        }
    }
}

class PriorityQ extends MaxHeap
{

    public function __construct(int $size)
    {
        parent::__construct($size);
    }

    public function enqueue($val)
    {
        parent::insert($val);
    }

    public function dequeue()
    {
        return parent::extractMax();
    }
}

$numbers = [37, 44, 34, 65, 26, 86, 129, 83, 9];

$pq = new PriorityQ(count($numbers));