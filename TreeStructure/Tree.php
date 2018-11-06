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
     * Tree constructor.
     * @param TreeNode $node
     */
    public function __construct(TreeNode $node)
    {
        $this->root = $node;
    }


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
