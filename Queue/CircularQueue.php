<?php


namespace Queue;


class CircularQueue implements Queue
{

    /**
     * Array of queue
     *
     * @var array
     */
    private $queue;

    /**
     * Limit of queue array
     *
     * @var int
     */
    private $limit;

    /**
     * @var int
     */
    private $front = 0;

    /**
     * @var int
     */
    private $rear = 0;

    public function __construct(int $limit = 5)
    {
        $this->limit = $limit;
        $this->queue = [];
    }

    public function size()
    {
        if ($this->rear > $this->front) {
            return $this->rear - $this->front;
        }
        return $this->limit - $this->front + $this->rear;
    }

    /**
     * Append an item to the queue.
     *
     * @param $item
     * @return mixed
     */
    public function enqueue($item)
    {
        if ($this->isFull()) {
            throw new \OverflowException('Queue Is FULL');
        } else {
            $this->queue[$this->rear] = $item;
            $this->rear = ($this->rear + 1) % $this->limit;
        }
    }

    /**
     * Checks whether the queue is Full.
     *
     * @return bool
     */
    public function isFull()
    {
        $diff = $this->rear - $this->front;
        if ($diff == -1 || $diff == ($this->limit - 1)) {
            return true;
        }
        return false;
    }

    /**
     * Remove item of the stack and return it
     *
     * @return void
     */
    public function dequeue()
    {
        $item = '';
        if ($this->isEmpty()) {
            throw new \UnderflowException('Queue is EMPTY');
        } else {
            $item = $this->queue[$this->front];
            $this->queue[$this->front] = null;
            $this->front = ($this->front + 1) % $this->limit;
        }
        return $item;
    }

    /**
     * Checks whether the queue is empty or not.
     *
     * @return bool
     */
    public function isEmpty()
    {
        return $this->rear == $this->front;
    }

    /**
     * Returns the top item of the queue.
     *
     * @return mixed
     */
    public function peak()
    {
        return $this->queue[$this->front];
    }


}