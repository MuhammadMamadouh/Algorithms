<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 19/10/2018
 * Time: 05:05 م
 */

namespace Queue;

interface Queue
{

    /**
     * Append an item to the queue.
     *
     * @param $item
     * @return mixed
     */
    public function enqueue($item);

    /**
     * Remove item of the stack and return it
     *
     * @return void
     */
    public function dequeue();

    /**
     * Returns the top item of the queue.
     *
     * @return mixed
     */
    public function peak();

    /**
     * Checks whether the queue is empty or not.
     *
     * @return bool
     */
    public function isEmpty();
}