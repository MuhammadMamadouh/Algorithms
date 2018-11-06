<?php


namespace LinkedListAlgorithm;


class LinkedList implements \Iterator
{

    /**
     * Current Node
     *
     * @var ListNode| null
     */
    private $_currentNode = NULL;

    /**
     * Current Node Position
     *
     * @var int
     */
    private $_currentPosition = 0;

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


    /**
     * Insert data after specific data
     *
     * @param $data
     * @param $query
     */
    public function insertAfter($data, $query)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $nextNode = NULL;
            $currentNode = $this->_firstNode;

            while ($currentNode !== NULL) {

                if ($currentNode->data == $query) {

                    if ($nextNode !== NULL) {
                        $newNode->next = $nextNode;
                    }

                    $currentNode->next = $newNode;
                    $this->_totalNodes++;
                    break;
                }

                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
            }
        }
    }


    /**
     * Delete Node in the List
     *
     * @param $data
     * @return void
     */
    public function delete($data)
    {
        if ($this->_firstNode) {

            $previousNode = null;
            $currentNode = $this->_firstNode;
            while ($currentNode->data == $data) {
                if ($currentNode->next !== null) {
                    $previousNode->next = $currentNode->next;
                    $this->_totalNodes--;
                    break;
                }
                $previousNode = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }


    /**
     * Delete First Node
     *
     * @return bool
     */
    public function deleteFirst()
    {
        if ($this->_firstNode !== null) {
            if ($this->_firstNode->next !== null) {
                $this->_firstNode = $this->_firstNode->next;
            } else {
                $this->_firstNode = null;
            }
            $this->_totalNodes--;
            return true;
        }
        return false;
    }


    /**
     * Delete Last Node
     *
     * @return bool
     */
    public function deleteLast()
    {
        if ($this->_firstNode !== null) {
            $currentNode = $this->_firstNode;
            if ($currentNode->next === null) {
                $currentNode = null;
            } else {
                $previous = null;
                while ($currentNode->next !== null) {
                    $previous = $currentNode;
                    $currentNode = $currentNode->next;
                }
                $previous->next = null;
                $this->_totalNodes--;
                return true;
            }
            return false;
        }
    }


    public function reverse()
    {
        if ($this->_firstNode) {

            if ($this->_firstNode->next !== null) {

                $reversedList = null;
                $next = null;
                $currentNode = $this->_firstNode;

                while ($currentNode !== null) {
                    $next = $currentNode->next;
                    $currentNode->next = $reversedList;
                    $reversedList = $currentNode;
                    $currentNode = $next;
                }
                $this->_firstNode = $reversedList;
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
        echo 'Total Book Title: ' . $this->_totalNodes . '<br/>';

        $currentNode = $this->_firstNode;

        while ($currentNode !== null) {

            echo $currentNode->data . "     ";

            $currentNode = $currentNode->next;
        }
    }


    public function getNthNode($node = 0)
    {

        $count = 1;
        if ($this->_firstNode !== null) {
            $currentNode = $this->_firstNode;

            while ($currentNode !== null) {
                if ($count == $node)
                    return $currentNode;

                $count++;
                $currentNode = $currentNode->next;
            }
        }
    }


    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return $this->_currentNode->data;
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->_currentPosition++;
        $this->_currentNode = $this->_currentNode->next;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->_currentPosition;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        return $this->_currentNode !== NULL;
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->_currentPosition = 0;
        $this->_currentNode = $this->_firstNode;
    }

    /**
     * Display List With Iterator Methods
     * @return void
     */
    public function displayWithIterator()
    {
        for ($this->rewind(); $this->valid(); $this->next()) {
            echo $this->current() . '<br/>';
        }
    }

    /**
     * Get size of List
     *
     * @return int
     */
    public function getSize()
    {
        return $this->_totalNodes;
    }
}