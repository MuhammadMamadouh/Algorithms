<?php

class ListNode
{
    public $data = null;
    public $next = NULL;
    public $priority = NULL;

    public function __construct($data, $priority = null)
    {
        $this->data = $data;
        $this->priority = $priority;
    }
}

class LinkedList
{

    public $firstNode;

    public function insert($data, $priority)
    {
        $newNode = new ListNode($data, $priority);

        if ($this->firstNode == null) {
            $this->firstNode = $newNode;
        } else {
            $previous = $this->firstNode;
            $currentNode = $this->firstNode;

            while ($currentNode !== null) {
                if ($currentNode->priority < $priority) {
                    if ($currentNode == $this->firstNode) {
                        $previous = $this->firstNode;
                        $this->firstNode = $newNode;
                        $newNode->next = $previous;
                        return;
                    }
                    $newNode->next = $currentNode;
                    $previous->next = $newNode;
                    return;
                }
                $previous = $currentNode;
                $currentNode->next = $currentNode;
            }
        }
    }
}

class myPQ extends SplPriorityQueue
{

    /**
     * @param mixed $priority1
     * @param mixed $priority2
     * @return int
     */
    public function compare($priority1, $priority2)
    {
        return $priority1 <=> $priority1;
    }
}

$agents = new myPQ();
$agents->insert("Fred", 1);
$agents->insert('Newton', 3);
$agents->insert("Keith", 3);
$agents->insert("Adiyan", 4);
$agents->insert("Mikhael", 2);

$agents->setExtractFlags(MyPQ::EXTR_DATA);

$agents->top();

while ($agents->valid()) {
    $current = $agents->current();
    $current = $agents->current();
    echo 'data is ' . $current[''] . "<br/>";
    $agents->next();
}
echo '<pre>';
print_r($agents);
echo '</pre>';

