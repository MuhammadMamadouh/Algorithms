<?php


namespace Queue;

require 'Queue.php';


class Book implements Queue
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
     *
     * @param int $limit
     */
    public function __construct($limit = 20)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    /**
     * Append an item to the queue.
     *
     * @param $item
     * @return void
     */
    public function enqueue($item)
    {
        if (count($this->queue) < $this->limit) {
            array_push($this->queue, $item);
        } else {
            throw new \OverflowException('Queue is FULL');
        }
    }

    /**
     * Remove item of the stack and return it
     *
     * @return mixed
     */
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is EMPTY');
        } else {
            return array_shift($this->queue);
        }
    }

    /**
     * Checks whether the queue is empty or not.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return empty($this->queue);
    }

    /**
     * Returns the top item of the queue.
     *
     * @return mixed
     */
    public function peak()
    {
        return current($this->queue);
    }
}