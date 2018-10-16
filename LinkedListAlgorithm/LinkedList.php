<?php


namespace LinkedListAlgorithm;


class LinkedList
{
    /**
     * First Node to be linked to Next Node
     *
     * @var null by default
     */
    private $_firstNode = null;

    /**
     * Link to the next data
     *
     * @var int| by default = 0
     */
    public $_totalNodes = 0;


    /**
     * Insert data to Linked List
     *
     * @param null $data
     * @return bool
     */
    public function insert($data = null)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = $newNode;
        } else {
            $currentNode = $this->_firstNode;
            while ($currentNode->next !== null) {
                $currentNode = $currentNode->next;
            }
            $currentNode->next = $newNode;
        }

        $this->_totalNodes++;

        return true;
    }

    public function display()
    {
        echo 'Total Book Title: ' . $this->_totalNodes;

        $currentNode = $this->_firstNode;

        while ($currentNode->next !== null) {

            echo $currentNode->data . "\n";

            $currentNode = $currentNode->next;
        }
    }
}