<?php

namespace Tree\BinaryTree;

require_once 'BinaryNode.php';

class BinaryTree
{


    /**
     * array of nodes in tree
     * @var array
     */
    public $nodes = [];
    /**
     * Root of Tree
     *
     * @var mixed |null
     */
    public $root = null;

    /**
     * Tree constructor.
     * @param BinaryNode $node
     */
    public function __construct(BinaryNode $node)
    {
        $this->root = $node;
    }


    public function traverse(BinaryNode $node, int $level = 0)
    {
        if ($node) {
            echo str_repeat("-", $level);
            echo $node->data . '<br/>';
        }

        if ($node->left) {
            $this->traverse($node->left, $level + 1);
        }

        if ($node->right) {
            $this->traverse($node->right, $level + 1);
        }


    }
}

$final = new BinaryNode('Final');

$tree = new BinaryTree($final);

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
