<?php


namespace Tree;


class TreeNode
{

    /**
     * @var mixed | null as default
     */
    public $data = null;

    /**
     * @var array
     */
    public $children = [];

    /**
     * TreeNode constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @param TreeNode $node
     * @return void
     */
    public function addChildren(TreeNode $node)
    {
        $this->children [] = $node;
    }

}