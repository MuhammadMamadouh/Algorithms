<?php

namespace Tree;

require_once 'TreeNode.php';

class Tree
{

    /**
     * Root of Tree
     *
     * @var mixed |null
     */
    public $root = null;

    /**
     * @var \SplQueue
     */
    public $visited;

    /**
     * Tree constructor.
     * @param TreeNode $node
     */
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
        $this->visited = new \SplQueue();
    }

    /**
     * visit all nodes in the tree
     * @param TreeNode $node
     * @param int $level
     */
    public function traverse(TreeNode $node, int $level = 0)
    {
        if ($node) {
            echo str_repeat("-", $level);
            echo $node->data . '<br/>';
        }

        foreach ($node->children as $child) {
            $this->traverse($child, $level + 1);
        }
    }

    /**
     * Searching at tree using Breadth first Algorithm
     * @param TreeNode $node
     * @return \SplQueue
     */
    public function BFS(TreeNode $node): \SplQueue
    {
        $queue = new \SplQueue();
        $visited = new \SplQueue();

        $queue->enqueue($node);

        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $visited->enqueue($current);

            foreach ($current->children as $child) {
                $queue->enqueue($child);
            }
        }
        return $visited;
    }


    public function DFS(TreeNode $node)
    {

        $this->visited->enqueue($node);

        if ($node->children) {
            foreach ($node->children as $child) {
                $this->DFS($child);
            }
        }
    }
}

$ceo = new TreeNode('CEO');

$tree = new Tree($ceo);

$cto = new TreeNode('1');
$cfo = new TreeNode('2');
$cdo = new TreeNode('3');
$cpo = new TreeNode('4');

$ceo->addChildren($cto);
$ceo->addChildren($cfo);
$ceo->addChildren($cdo);
$ceo->addChildren($cpo);

$seniorArchitect = new TreeNode("Senior Architect");
$softwareEngineer = new TreeNode("Software Engineer");
$userInterfaceDesigner = new TreeNode("User Interface Designer");
$qualityAssuranceEngineer = new TreeNode("Quality Assurance Engineer");

$cto->addChildren($seniorArchitect);
$seniorArchitect->addChildren($softwareEngineer);
$tree->traverse($tree->root);
echo '<pre>';
print_r($tree);
echo '</pre>';
