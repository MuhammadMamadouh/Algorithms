<?php


namespace LinkedListAlgorithm;


class DoublyLinkedList
{

    private $_firstNode = null;
    private $_lastNode = null;
    private $_totalNode = 0;


    /**
     * Insert Data At First Of List
     *
     * @param mixed $data
     */
    public function insertAtFirst($data)
    {
        $newNode = new ListNode($data);
        if ($this->_firstNode === null) {
            $this->_firstNode = $newNode;
            $this->_lastNode = $newNode;
        } else {
            $currentFirstNode = $this->_firstNode;
            $this->_firstNode = $newNode;
            $newNode->next = $currentFirstNode;
            $currentFirstNode->previous = $newNode;
        }
        $this->_totalNode++;
    }


    /**
     * Insert Data At Last Node
     *
     * @param mixed $data
     * @return bool
     */
    public function insertAtLast($data)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode === NULL) {
            $this->_firstNode = $newNode;
            $this->_lastNode = $newNode;
        } else {
            $currentNode = $this->_lastNode;
            $currentNode->next = $newNode;
            $newNode->previous = $currentNode;
            $this->_lastNode = $newNode;
        }

        $this->_totalNode++;
        return TRUE;
    }


    /**
     * Insert data before specific node data
     *
     * @param mixed $data
     * @param mixed $query
     * @return void
     */
    public function insertBefore($data, $query)
    {
        $newNode = new ListNode($data);

        if ($this->_firstNode) {
            $previous = null;
            $currentNode = $this->_firstNode;

            while ($currentNode !== null) {
                if ($currentNode->data == $query) {
                    $newNode->next = $currentNode;
                    $currentNode->previous = $newNode;
                    $previous->next = $newNode;
                    $newNode->previous = $previous;
                    $this->_totalNode++;
                    break;
                }
                $previous = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }


    /**
     * Insert Data after specific node
     *
     * @param mixed $data
     * @param mixed $query
     * @return void
     */
    public function insertAfter($data, $query)
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
                    if ($currentNode === $this->_lastNode) {
                        $this->_lastNode = $newNode;
                    }
                    $currentNode->next = $newNode;
                    $nextNode->previous = $newNode;
                    $newNode->previous = $currentNode;
                    $this->_totalNode++;
                    break;
                }
                $currentNode = $currentNode->next;
                $nextNode = $currentNode->next;
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
                $this->_firstNode->previous = null;

            } else {
                $this->_firstNode = null;
            }

            $this->_totalNode--;
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
        if ($this->_lastNode !== null) {
            $currentNode = $this->_lastNode;
            if ($currentNode->previous === null) {
                $this->_firstNode = null;
                $this->_lastNode = null;
            } else {
                $previousNode = $this->_lastNode->previous;
                $this->_lastNode = $previousNode;
                $previousNode->next = null;
                $this->_totalNode--;
                return true;
            }
        }
        return false;
    }


    /**
     * Delete specific query from list
     *
     * @param mixed $query
     * @return void
     */
    public function delete($query)
    {
        if ($this->_firstNode) {

            $previousNode = null;
            $currentNode = $this->_firstNode;

            while ($currentNode !== null) {
                if ($currentNode->data == $query) {
                    if ($currentNode->next === null) {
                        $previousNode->next = null;
                    } else {
                        $previousNode->next = $currentNode->next;
                        $currentNode->next->previous = $previousNode;
                    }
                    $this->_totalNode--;
                    break;
                }
                $previousNode = $currentNode;
                $currentNode = $currentNode->next;
            }
        }
    }


    /**
     * Display data by forward
     * @return void
     */
    public function displayForward()
    {
        echo 'Total book titles:' . $this->_totalNode . '<br/>';

        $currentNode = $this->_firstNode;

        while ($currentNode !== null) {
            echo $currentNode->data . ' ';

            $currentNode = $currentNode->next;
        }
    }

    /**
     * Display data by forward
     * @return void
     */
    public function displayBackward()
    {
        echo 'Total book titles:' . $this->_totalNode . '<br/>';

        $currentNode = $this->_lastNode;

        while ($currentNode !== null) {
            echo $currentNode->data . ' ';

            $currentNode = $currentNode->previous;
        }
    }
}