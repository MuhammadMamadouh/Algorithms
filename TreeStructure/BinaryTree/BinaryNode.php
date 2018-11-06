<?php


namespace Tree\BinaryTree;


class BinaryNode
{

    /**
     * @var mixed | null as default
     */
    public $data = null;


    public $parent = null;

    /**
     * Left child of node
     *
     * @var mixed
     */
    public $left;

    /**
     * Right child of node
     *
     * @var mixed
     */
    public $right;


    /**
     * TreeNode constructor.
     *
     * @param $data
     * @param BinaryNode|null $parent
     */
    public function __construct($data, BinaryNode $parent = null)
    {
        $this->data = $data;
        $this->parent = $parent;
        $this->right = null;
        $this->left = null;

    }

    /**
     * Min of Tree
     *
     * @return mixed|null|BinaryNode
     */
    public function min()
    {
        $node = $this;

        while ($node->left) {
            $node = $node->left;
        }
        return $node;
    }

    /**
     * Max of tree
     *
     * @return mixed|null|BinaryNode
     */
    public function max()
    {
        $node = $this;

        while ($node->right) {
            $node = $node->right;
        }
        return $node;
    }

    /**
     * @return null
     */
    public function predecessor()
    {
        $node = $this;

        if ($node->right) {
            return $node->right->min();
        } else {
            return null;
        }

    }

    public function delete()
    {
        $node = $this;

        // check if the node is a leaf
        if (!$node->left && !$node->right) {

            if ($node->parent->left === $node) {
                $node->parent->left = null;
            } else {
                $node->parent->right = null;
            }

            // node has Children (left and right)
        } elseif ($node->left && $node->right) {
            $successor = $node->successor();
            $node->data = $successor->data;
            $successor->delete();

            // check if the node has only left child
        } elseif ($node->left) {

            if ($node->parent->left === $node) {
                $node->parent->left = $node->left;
                $node->left->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->right;
                $node->right->parent = $node->parent->right;
            }
            $node->left = null;

            // check if the node has only right child

        } elseif ($node->right) {
            if ($node->parent->left == $node) {
                $node->parent->left = $node->right;
                $node->right->parent = $node->parent->left;
            } else {
                $node->parent->right = $node->left;
                $node->left->parent = $node->parent->right;
            }
            $node->right = null;
        }
    }

    /**
     * @return null
     */
    public function successor()
    {
        $node = $this;

        if ($node->right) {
            return $node->right->min();
        } else {
            return null;
        }

    }

    /**
     * @param BinaryNode $left
     * @param BinaryNode $right
     * @return void
     */
    public
    function addChildren(BinaryNode $left, BinaryNode $right)
    {
        $this->left = $left;
        $this->right = $right;
    }

}