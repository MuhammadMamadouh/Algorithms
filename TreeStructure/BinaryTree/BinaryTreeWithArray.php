<?php

namespace Tree\BinaryTree;

require_once 'BinaryNode.php';

class BinaryTreeWithArray
{


    /**
     * array of nodes in tree
     * @var array
     */
    public $nodes = [];

    /**
     * Tree constructor.
     * @param array $nodes
     */
    public function __construct(Array $nodes)
    {
        $this->nodes = $nodes;
    }


    public function traverse(int $num, int $level = 0)
    {
        if ($num) {
            echo str_repeat("-", $level);
            echo $this->nodes[$num] . '<br/>';
        }

        $this->traverse(2 * $num + 1, $level + 1);
        $this->traverse(2 * ($num + 1), $level + 1);
    }
}

$final = new BinaryNode('Final');

$tree = new BinaryTreeWithArray($final);

$semiFinal1 = new BinaryNode('semi Final 1');
$semiFinal2 = new BinaryNode('semi Final 2');

$quarterFinal1 = new BinaryNode('quarter Final 1');
$quarterFinal2 = new BinaryNode('quarter Final 2');
$quarterFinal3 = new BinaryNode('quarter Final 3');
$quarterFinal4 = new BinaryNode('quarter Final 4');

$final->addChildren($semiFinal1, $semiFinal2);

$semiFinal1->addChildren($quarterFinal1, $quarterFinal2);

$semiFinal2->addChildren($quarterFinal3, $quarterFinal4);

$tree->traverse($tree->root);

echo '<pre>';
print_r($tree);
echo '</pre>';
