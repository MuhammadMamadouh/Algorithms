<?php


namespace Queue;

require '..\LinkedListAlgorithm\LinkedList.php';

use LinkedListAlgorithm\LinkedList;

require 'Queue.php';


class BookLinkedList implements Queue
{
    /**
     * $limit of stack List
     *
     * @var int
     */
    private $limit;

    /**
     * @var array
     */
    private $queue;

    /**
     * Book constructor.
     * @param int $limit
     */
    public function __construct($limit = 20)
    {
        $this->limit = $limit;
        $this->queue = new LinkedList();
    }

    /**
     * Append an item to the queue.
     *
     * @param $item
     * @return mixed
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is EMPTY');
        } else {

            $lastItem = $this->peak();
            $this->queue->deleteFirst();
            return $lastItem;
        }
    }

    /**
     * checks whether the stack is empty or not.
     * @return mixed
     */
    public function isEmpty()
    {
        return $this->queue->getSize() == 0;
    }

    /**
     * Returns the top item of the queue.
     *
     * @return mixed
     */
    public function peak()
    {
        return $this->queue->getNthNode(1)->data;
    }

    /**
     * Remove item of the stack and return it
     *
     * @return void
     */
    public function enqueue($item)
    {
        if (($this->queue->getSize()) < $this->limit) {

            $this->queue->insert($item);
        } else {
            throw new \OverflowException('Queue is FULL');
        }
    }
}