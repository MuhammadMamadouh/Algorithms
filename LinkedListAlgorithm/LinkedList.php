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


    /**
     * Insert Data Into First Node
     *
     * @param string|null $data
     * @return bool
     */
    public function insertAtFirst(string $data = null)
    {

        $newNode = New ListNode($data);

        if ($this->_firstNode === null) {

            $this->_firstNode = $newNode;

        } else {

            $currentFirstNode = $this->_firstNode;

            $this->_firstNode = $newNode;

            $newNode->next = $currentFirstNode;

            $this->_totalNodes++;

            return true;
        }

    }

    /**
     * Search about data
     * @param $data
     * @return bool|null
     */
    public function search($data)
    {
        if ($this->_totalNodes) {

            $currentNode = $this->_firstNode;

            while ($currentNode !== null) {

                if ($currentNode->data == $data) {

                    return $currentNode;
                }

                $currentNode = $currentNode->next;

            }
        }
        return false;
    }

    /**
     * Insert Data before specific node
     *
     * @param $data
     * @param $query
     */
    public function insertBefore($data = NULL, $query = NULL)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode !== null) {

            $previous = NULL;
            $currentNode = $this->_firstNode;

            while ($currentNode !== NULL) {

                if ($currentNode->data == $query) {
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }


    public function insertAfter($data, $query)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $nextNode = null;
            $currentNode = $this->_firstNode;

            while ($currentNode !== NULL) {
                if ($currentNode->data == $query) {
                    if ($nextNode !== null) {
                        $nextNode->next = $nextNode;
                    }
                    $currentNode->next - $newNode;
                    $this->_totalNodes++;
                    break;
                }
            }
        }
    }

    public function insertAfters($data = NULL, $query = NULL)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode) {
            $nextNode = NULL;
            $currentNode = $this->_firstNode;
            while ($currentNode !== NULL) {
                if ($currentNode->data === $query) {
                    if ($nextNode !== NULL) {
                        $newNode->next = $nextNode;
                    }
                    $currentNode->next = $newNode;
                    $this->_totalNode++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }

    /**
     * Display Data of Linked List
     *
     * @return bool
     */
    public function display()
    {
        echo 'Total Book Title: ' . $this->_totalNodes . '';

        $currentNode = $this->_firstNode;

        while ($currentNode !== null) {

            echo $currentNode->data . "     ";

            $currentNode = $currentNode->next;
        }
        echo '';
    }


}