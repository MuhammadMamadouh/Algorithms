<?php


namespace Stack;

require 'Stack.php';

class Book implements Stacks
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
    private $stack;

    /**
     * Book constructor.
     * @param int $limit
     */
    public function __construct($limit = 20)
    {
        $this->limit = $limit;
        $this->stack = [];
    }

    /**
     *  add an item at the top of the stack.
     * @param $item
     * @return mixed
     */
    public function push($item)
    {
        if (count($this->stack) < $this->limit) {
            array_push($this->stack, $item);
        } else {
            throw new \OverflowException('Stack is FULL');
        }
    }

    /**
     * remove the top item of the stack and return it
     * @return mixed
     */
    public function pop()
    {
        if ($this->isEmpty()) {
            throw new \UnderflowException('Stack is EMPTY');
        } else {
            return array_pop($this->stack);
        }
    }

    /**
     * checks whether the stack is empty or not.
     * @return mixed
     */
    public function isEmpty()
    {
        return empty($this->stack);
    }

    /**
     * returns the top item of the stack.
     *
     * @return mixed
     */
    public function top()
    {
        return end($this->stack);
    }
}