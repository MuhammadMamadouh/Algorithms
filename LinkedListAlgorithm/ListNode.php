<?php


namespace LinkedListAlgorithm;


class ListNode
{
    /**
     * Data to be stored
     *
     * @var null by default
     */
    public $data = null;

    /**
     * Link to the next data
     *
     * @var null by default
     */
    public $next = null;

    /**
     * Link To the previous data
     * @var null
     */
    public $previous = null;
    /**
     * ListNode constructor.
     * @param string|null $data
     */
    public function __construct(string $data = null)
    {
        $this->data = $data;
    }


}