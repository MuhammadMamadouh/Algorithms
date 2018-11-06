<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 19/10/2018
 * Time: 05:05 م
 */

namespace Stack;

interface Stack
{

    /**
     *  add an item at the top of the stack.
     * @param $item
     * @return mixed
     */
    public function push($item);

    /**
     * remove the top item of the stack and return it
     * @return mixed
     */
    public function pop();

    /**
     * returns the top item of the stack.
     *
     * @return mixed
     */
    public function top();

    /**
     * checks whether the stack is empty or not.
     * @return mixed
     */
    public function isEmpty();
}