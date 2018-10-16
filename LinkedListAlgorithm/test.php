<?php

namespace LinkedListAlgorithm;


require_once 'LinkedList.php';
require_once 'ListNode.php';
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
$test->display();
echo '<pre>';
print_r($test);
echo '</pre>';