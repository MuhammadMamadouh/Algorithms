<?php

namespace Queue;
//require 'Queue.php';
//require 'Book.php';
require 'BookLinkedList.php';
require_once '..\LinkedListAlgorithm\LinkedList.php';
require_once '..\LinkedListAlgorithm\ListNode.php';
try {
    $test = new BookLinkedList();

    $test->enqueue('Book1');
    $test->enqueue('Book2');
    $test->enqueue('Book3');
    $test->enqueue('Book4');
    $test->enqueue('Book5');
    $test->enqueue('Book6');

    echo $test->peak() . '<br/>';
    echo $test->dequeue();
    echo '<pre>';
    print_r($test);
    echo '</pre>';


} catch (Exception $exception) {
    echo '<h1>' . $exception->getMessage() . '</h1>';
}
