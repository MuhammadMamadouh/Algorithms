<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 29/12/2018
 * Time: 04:00 م
 */


/**
 * @param array $graph
 */
function primMST(array $graph)
{
    $parent = [];   // Array to store the MST.
    $key = [];      // used to pick minimum weight edges.
    $visited = [];  // set of vertices not yet included in MST.
    $len = count($graph);

    // Initialize All keys as MAX
    for ($i = 0; $i < $len; $i++) {
        $key[$i] = PHP_INT_MAX;
        $visited[$i] = false;
    }

    $key[0] = 0;
    $parent[0] = -1;

    // The MST will have V Vertices
    for ($count = 0; $count < $len - 1; $count++) {
        //Pick the minimum key vertex
        $minValue = PHP_INT_MAX;
        $minIndex = -1;

        foreach (array_keys($graph) as $v) {
            if ($visited[$v] == false && $key[$v] < $minValue) {
                $minIndex = $v;
                $minValue = $key[$v];
            }
        }
        $u = $minIndex;
    }
}