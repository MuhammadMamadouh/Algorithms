<?php
/**
 * Created by PhpStorm.
 * User: Mohamed Mamdouh
 * Date: 15/12/2018
 * Time: 01:41 ص
 */

$totalVertices = 5; //Total Number of vertices

$graph = []; //Graph that we need to sort

for ($i = 0; $i < $totalVertices; $i++) {
    for ($j = 0; $j < $totalVertices; $j++) {

        /**
         *  initialized all the edges to the maximum value of the PHP
         * integer. The reason for doing this is to ensure that a value of 0 for non-edges
         * does not impact the algorithm logic, as we are searching for the minimum value
         */
        $graph[$i][$j] = $i == $j ? 0 : PHP_INT_MAX;
    }
}

/**
 * Vertex 0 for A, 1 for B, 2 for C, 3 for D, 4 for G
 */
$graph[0][1] = $graph[1][0] = 10;
$graph[2][1] = $graph[1][2] = 5;
$graph[0][3] = $graph[3][0] = 5;
$graph[3][1] = $graph[1][3] = 5;
$graph[4][1] = $graph[1][4] = 10;
$graph[3][4] = $graph[4][3] = 20;

//    echo '<pre>';
//    print_r($graph);
//    echo '</pre>';


/**
 * ALGORITHM:--
 *
 * First, we copied each of our weights to a cost or distance matrix.
 * Then, we ran through each vertex and figured out the cost or distance of visiting
 * from vertex i to vertex j through vertex k. If the distance or cost
 * is less than a direct path between vertex i and vertex j,
 * we choose the path i to k to j instead of the direct path of i to j
 *
 *
 * @param array $graph
 * @return array
 */
function floydWarshall(array $graph): array
{
    $dist = $graph;

    $size = count($dist);

    for ($k = 0; $k < $size; $k++) {
        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size; $j++) {
                $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$k] + $dist[$k][$j]);
            }
        }
    }
    return $dist;
}

$distance = floydWarshall($graph);

echo "Shortest distance between A to E is: " . $distance[0][4] . "<br>";
echo "Shortest distance between D to C is: " . $distance[3][2] . "<br> ";



