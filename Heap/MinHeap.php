<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 29/12/2018
 * Time: 04:35 م
 */

namespace Heap;

class MinHeap
{

    /**
     *
     * DEFINITION:-
     * heap is a specialized tree data structure that supports a heap property. A heap property is
     * defined in such a way that the root of a heap structure will be either smaller or larger than its child nodes.
     * If the parent node is greater than the child nodes, then it is known as max-heap and if the parent node is
     * smaller than the child nodes then it is known as min-heap. The following figure shows an example of max heap:
     *
     * Operation |  Complexity-average |   Complexity - Worst
     * Search    |      O(n)           |        O(n)
     * Insert    |      O(1)           |        O(log n)
     * Delete    |      O(log n)       |        O(log n)
     * Extract   |      O(1)           |        O(1)
     * Space     |      O(n)           |        O(n)
     */

    /**
     * @var array
     */
    public $heap;

    /**
     * @var int
     */
    public $count;

    /**
     * MinHeap constructor.
     * @param $size
     */
    public function __construct($size)
    {
        /**
         * initialized the heap array to have all 0 values
         * from 0 index to $size + 1
         * Since we are considering putting the root at index 1,
         * we are going to require an array with one extra space
         */
        $this->heap = array_fill(0, $size + 1, 0);

        $this->count = 0;
    }

    /**
     * Build a heap from an array
     *
     * @param array $arr
     * @return void
     */
    public function create(array $arr = [])
    {
        if ($arr) {
            // For each element in the array,
            // we insert it to the heap using an insert method
            foreach ($arr as $value) {
                $this->insert($value);
            }
        }
    }

    /**
     * Insert value to heap
     * @param int $value
     * @return void
     */
    public function insert(int $value)
    {
        //  check if the current size of the heap is 0 or not.
        if ($this->count == 0) {        // size is zero
            $this->heap[1] = $value;    // add the first item to index 1
            $this->count = 2;           // setting the next counter at 2.
            //
        } else {                        // heap has an item or more
            $this->heap[$this->count++] = $value;   // store the new item in the last position
            $this->siftUp();                        // make sure the newly inserted value satisfies the heap property.
        }
    }

    /**
     * make sure the newly inserted value satisfies the heap property.
     * @return void
     */
    public function siftUp()
    {
        $tmpPos = $this->count - 1;              // last position
        $tmp = intval($tmpPos / 2);         // last position's parent

        // node Is not root     &&      child node is smaller than its parent
        while ($tmpPos > 0 && $this->heap[$tmp] > $this->heap[$tmpPos]) {
            //If the child value is less than the parent one,
            $this->swap($tmpPos, $tmp); // swap them
            $tmpPos = intval($tmpPos / 2); // tmpPos becomes parent of current node
            $tmp = intval($tmpPos / 2);     // tmp becomes parent of tmpPos
        }
    }


    /**
     * swap two items
     *
     * @param int $a
     * @param int $b
     * @return void
     */
    public function swap(int $a, int $b)
    {
        $tmp = $this->heap[$a];
        $this->heap[$a] = $this->heap[$b];
        $this->heap[$b] = $tmp;
    }

    /**
     *  Extract the minimum value of the current heap all the time:
     *
     * @return mixed
     */
    public function extractMin()
    {
        $min = $this->heap[1];
        $this->heap[1] = $this->heap[$this->count - 1];
        $this->heap[--$this->count] = 0;
        $this->siftDown(1);

        return $min;
    }


    /**
     *
     * @param int $k
     * @return void
     */
    public function siftDown(int $k)
    {
        // consider $k is the smallest value
        $smallest = $k;         // index of node
        $left = $k * 2;         // index of left child
        $right = $k * 2 + 1;    // index of right child

        // if left child is smaller than parent
        if ($left < $this->count && $this->heap[$smallest] > $this->heap[$left]) {
            $smallest = $left;          // then left child is the smallest
        }

        // if right child is smaller than parent
        if ($right < $this->count && $this->heap[$smallest] > $this->heap[$right]) {
            $smallest = $right;         // then right child is the smallest
        }


        // if node has a child smaller than it
        if ($smallest != $k) {
            $this->swap($k, $smallest);     // swap between parent and child
            $this->siftDown($smallest);     // continue until the tree satisfies the heap property.
        }
    }

    public function display()
    {
        echo implode(",\t ", array_slice($this->heap, 1)) . '<br/>';
    }

}

$numbers = [37, 44, 34, 65, 26, 86, 129, 83, 9];

echo 'initial array: ' . implode(', ', $numbers) . '<br/>';

$heap = new MinHeap(count($numbers));

$heap->create($numbers);

echo "Constructed Heap <br/>";
$heap->display();

echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
echo '<br/> Min Extract: ' . $heap->extractMin() . '<br/>';
$heap->display();
