<?php


/**
 * | Kahn's Algorithm has The following steps find the topological ordering from a DAG
 *
 * 1- Calculate the indegree (incoming edges) for each of the vertex and put all vertices in a queue
 * where the indegree is 0. Also, initialize the count for the visited node to 0
 *
 * 2- Remove a vertex from the queue and perform the following steps:-
 *      a- Increment the visited node by 1
 *      b- Reduce indegree for all adjacent vertices by 1.
 *      c- if the indegree of the adjacent vertices become 0, add it to the queue.
 *
 * 3- Repeat step 2 until the queue is empty
 *
 * 4- if the count of the visited node is not the same as the count of nodes, then topological sorting
 * is not possible for the given DAG
 *
 *
 * @param array $matrix
 * @return SplQueue
 */
function topologicalSort(array $matrix): SplQueue
{
    $order = new SplQueue();    // sorted array to be returned
    $queue = new SplQueue();    // queue of vertexes which incoming = 0
    $size = count($matrix);    // size of the array to be sorted

    // initialize incoming array of each vertex
    $incoming = array_fill(0, $size, 0);

    //  finding the indegree for vertices
    for ($i = 0; $i < $size; $i++) {
        for ($j = 0; $j < $size; $i++) {
            if ($matrix[$i][$j]) {
                $incoming[$i]++;
            }
        }
        // putting the 0 indegree vertices in a queue
        if ($incoming[$i] == 0) {
            $queue->enqueue($i);
        }
    }

    // we checked each node of the queue
    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();

        for ($i = 0; $i < $size; $i++) {
            if ($matrix[$node][$i] == 1) {
                $matrix[$node][$i] = 0;
                $incoming[$i]--;    //reduced the indegree of the neighbor vertices

                // add any neighbor with 0 indegrees to the queue
                if ($incoming[$i] == 0) {
                    $queue->enqueue($i);
                }
            }
        }
        $order->enqueue($node);
    }

    if ($order->count() != $size) // cycle detected
        return new SplQueue; // return empty queue

    return $order;

}

