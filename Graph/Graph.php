<?php


/**
 * @param array $graph
 * @param int $start
 * @return SplQueue
 */
function BFS(array &$graph, int $start): \SplQueue
{
    $queue = new SplQueue();
    $path = new SplQueue();

    $queue->enqueue($start);

    $visited[$start] = 1;

    while (!$queue->isEmpty()) {
        $node = $queue->dequeue();
        $path->enqueue($node);
        foreach ($graph[$node] as $key => $vertex) {
            if (!$visited[$key] && $vertex == 1) {
                $visited[$key] = 1;
                $queue->enqueue($key);
            }
        }
    }
    return $path;
}


function DFS(array &$graph, int $start): \SplQueue
{

}


function topologicalSort(array $matrix): SplQueue
{

}

$graph = [];
$visited = [];
$vertexCount = 6;
for ($i = 1; $i <= $vertexCount; $i++) {
    $graph[$i] = array_fill(1, $vertexCount, 0);
    $visited[$i] = 0;
}

$graph[1][2] = $graph[2][1] = 1;
$graph[1][5] = $graph[5][1] = 1;
$graph[5][2] = $graph[2][5] = 1;
$graph[5][4] = $graph[4][5] = 1;
$graph[4][3] = $graph[3][4] = 1;
$graph[3][2] = $graph[2][3] = 1;
$graph[6][4] = $graph[4][6] = 1;

$path = BFS($graph, 5);

while (!$path->isEmpty()) {
    echo $path->dequeue() . ', ';
}
$path2 = DFS($graph, 5);

while (!$path2->isEmpty()) {
    echo $path2->dequeue() . ', ';
}

$graph2 = [];
$totalSize = 5;
for ($i = 0; $i < $totalSize; $i++) {
    for ($j = 0; $j < $totalSize; $j++) {
        $graph2[$i][$j] = $i == $j ? 0 : PHP_INT_MAX;
    }
}

$graph2[0][1] = $graph2[1][0] = 10;
$graph2[2][1] = $graph2[1][2] = 5;
$graph2[0][3] = $graph2[3][0] = 5;
$graph2[3][1] = $graph2[1][3] = 5;
$graph2[4][1] = $graph2[1][4] = 10;
$graph2[3][4] = $graph2[4][3] = 20;


function floydWarshall(array $graph): array
{
    $dist = $graph;
    $size = count($dist);

    for ($k = 0; $k < $size; $k++)
        for ($i = 0; $i < $size; $i++)
            for ($j = 0; $j < $size; $j++)
                $dist[$i][$j] = min($dist[$i][$j], $dist[$i][$k] + $dist[$k][$j]);

    return $dist;
}

$distance = floydWarshall($graph2);

echo '<pre>';
print_r($distance);
echo '</pre>';