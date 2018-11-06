<?php


namespace Stack;

require '..\LinkedListAlgorithm\LinkedList.php';

use LinkedListAlgorithm\LinkedList;

require 'Stack.php';


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
    private $stack;

    /**
     * Book constructor.
     * @param int $limit
     */
    public function __construct($limit = 20)
    {
        $this->limit = $limit;
        $this->stack = new LinkedList();
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
            $lastItem = $this->top();
            $this->stack->deleteLast();
            return $lastItem;

        }
    }

    /**
     * checks whether the stack is empty or not.
     * @return mixed
     */
    public function isEmpty()
    {
        return $this->stack->getSize() == 0;
    }

    /**
     * returns the top item of the stack.
     *
     * @return mixed
     */
    public function top()
    {
        return $this->stack->getNthNode($this->stack->getSize())->data;
    }

    /**
     *  add an item at the top of the stack.
     * @param $item
     * @return mixed
     */
    public function push($item)
    {
        $this->stack->insert($item);
    }
}