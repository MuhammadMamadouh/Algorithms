<?php

namespace LinkedListAlgorithm;


require_once 'LinkedList.php';
require_once 'ListNode.php';
require 'CircularLinkedList.php';
require 'DoublyLinkedList.php';
$test = new LinkedList();
$test->insert(1);
$test->insert(2);
$test->insert(3);
$test->insert(4);
$test->insert(5);
$test->insert(6);
$test->insert(7);
$test->insert(10);
$test->insertBefore(9, 10);
$test->insertBefore(8, 9);
$test->insertAfter(11, 10);
$test->deleteFirst();
$test->deleteLast();
$test->reverse();
$test->display();
$test->displayWithIterator();

$test2 = new CircularLinkedList();
$test2->insertAtEnd(1);
$test2->insertAtEnd(2);
$test2->insertAtEnd(3);
$test2->insertAtEnd(4);
$test2->insertAtEnd(5);
$test2->insertAtEnd(6);
$test2->insertAtEnd(7);
$test2->insertAtEnd(10);

$test3 = new DoublyLinkedList();
$test3->insertAtLast(1);
$test3->insertAtLast(2);
$test3->insertAtLast(3);
$test3->insertAtLast(4);
$test3->insertAtLast(5);
$test3->insertAtLast(6);
$test3->insertAtLast(7);
$test3->insertAtLast(10);
echo 'DoublyLinkedList <br/>';
$test3->displayForward();
$test3->displayBackward();

$test4 = new \SplDoublyLinkedList();
//
//echo '<pre>';
//print_r($test);
//echo '</pre>';
//echo '<pre>';
//print_r($test2);
//echo '</pre>';
echo '<pre>';
print_r($test3);
echo '</pre>';