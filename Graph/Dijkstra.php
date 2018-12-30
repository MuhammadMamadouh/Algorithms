<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Mamdouh
 * Date: 15/12/2018
 * Time: 01:41 ص
 */

$graph = [
    'A' => ['B' => 3, 'C' => 5, 'D' => 9],
    'B' => ['A' => 3, 'C' => 3, 'D' => 4, 'E' => 7],
    'C' => ['A' => 5, 'B' => 3, 'D' => 2, 'E' => 6, 'F' => 3],
    'D' => ['A' => 9, 'B' => 4, 'C' => 2, 'E' => 2, 'F' => 2], 'E' => ['B' => 7, 'C' => 6, 'D' => 2, 'F' => 5],
    'F' => ['C' => 3, 'D' => 2, 'E' => 5],
];

//    echo '<pre>';
//    print_r($graph);
//    echo '</pre>';


/**
 * ALGORITHM:--
 *
 * First, we copied each of our weights to a cost or distance matrix.
 * Then, we ran through each vertex and figured out the cost or distance of visiting
 * from vertex i to vertex j through vertex k.
 * If the distance or cost is less than a direct path between vertex i and vertex j,
 * we choose the path i to k to j instead of the direct path of i to j
 *
 *
 * @param array $graph
 * @return array
 */
function Dijkstra(array $graph, string $source, string $target): array
{
    $dist = [];
    $pred = [];
    $queue = new SplPriorityQueue();

    // initialize disatance and pred vertex
    foreach ($graph as $v => $adj) {
        $dist[$v] = PHP_INT_MAX;
        $pred[$v] = null;
        $queue->insert($v, min($adj));
    }

    $dist[$source] = 0;         // set the source node distance as 0

    // check  each node in the queue
    while (!$queue->isEmpty()) {
        $u = $queue->extract();

        if (!empty($graph[$u])) {
            foreach ($graph[$u] as $v => $cost) {

                if ($dist[$u] + $cost < $dist[$v]) {
                    $dist[$v] = $dist[$u] + $cost;
                    $pred[$v] = $u;
                }
            }
        }
    }


    $s = new SplStack();
    $u = $target;
    $distance = 0;

    while (isset($pred[$u]) && $pred[$u]) {
        $s->push($u);
        $distance += $graph[$u][$pred[$u]];
        $u = $pred[$u];
    }

    if ($s->isEmpty()) {
        return ["distance" => 0, "path" => $s];
    } else {
        $s->push($source);
        return ["distance" => $distance, "path" => $s];
    }


}

