<?php

namespace Stack;
require 'BookLinkedList.php';
require_once '..\LinkedListAlgorithm\LinkedList.php';
require_once '..\LinkedListAlgorithm\ListNode.php';
try {
    $test = new BookLinkedList();

    $test->push(1);
    $test->push(2);
    $test->push(3);
    $test->push(4);
    $test->push(5);
    $test->push(6);

    echo $test->pop() . '<br/>';
    echo $test->top();
} catch (Exception $exception) {
    echo $exception->getMessage();
}

function expressionChecker(string $expression)
{
    $valid = TRUE;
    $stack = new \SplStack();
    for ($i = 0; $i < strlen($expression); $i++) {
        $char = substr($expression, $i, 1);
        switch ($char) {
            case '(':
            case '{':
            case '[':
                $stack->push($char);
                break;
            case ')':
            case '}':
            case ']':
                if ($stack->isEmpty()) {
                    $valid = FALSE;
                } else {
                    $last = $stack->pop();
                    if (($char == ")" && $last != "(")
                        || ($char == "}" && $last != "{")
                        || ($char == "]" && $last != "[")) {
                        $valid = FALSE;
                    }
                }
                break;
        }
        if (!$valid)
            break;
    }
    if (!$stack->isEmpty()) {
        $valid = FALSE;
    }
    return $valid;
}

$expression = [];
$expression[] = "8 * (9 -2) + { (4 * 5) / ( 2 * 2) }";
$expressions[] = "5 * 8 * 9 / ( 3 * 2 ) )";
$expressions[] = "[{ (2 * 7) + ( 15 - 3) ]";

foreach ($expressions as $expression) {
    $valid = expressionChecker($expression);
    if ($valid) {
        echo "<br/> Expression is valid <br/>";
    } else {
        echo "Expression is not valid <br/>";
    }
}