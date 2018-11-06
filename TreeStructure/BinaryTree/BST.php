<?php


namespace Tree\BinaryTree;

require_once 'BinaryNode.php';


class BST
{

    /**
     * @var null|BinaryNode
     */
    public $root = null;

    /**
     * BST constructor.
     * @param int $data
     */
    public function __construct(int $data)
    {
        $this->root = new BinaryNode($data);
    }

    /**
     * Insert Data into tree
     *
     * @param $data
     * @return mixed|null|BinaryNode
     */
    public function insert($data)
    {
        //check if tree is empty
        if ($this->isEmpty()) {

            $node = new BinaryNode($data);
            $this->root = $node;
            return $node;
        }

        // tree is not empty
        $node = $this->root;

        while ($node) {

            if ($data > $node->data) { // go to the right node

                if ($node->right) {     // Node has right node
                    $node = $node->right;
                } else {

                    $node->right = new BinaryNode($data, $node);
                    $node = $node->right;
                    break;
                }
            } elseif ($data < $node->data) { // go to the left node

                if ($node->left) {      // Node has left node
                    $node = $node->left;

                } else {
                    $node->left = new BinaryNode($data, $node);
                    $node = $node->left;
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }

    /**
     * Check if tree is empty
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->root === null;
    }

    /**
     * Remove data from tree
     *
     * @param $data
     * @return void
     */
    public function remove($data)
    {
        $node = $this->search($data);

        if ($node) {
            $node->delete();
            echo $data . ' is deleted <br/>';
        } else {
            echo $data . ' is not found <br/>';
        }
    }

    /**
     * Search about specific data
     *
     * @param $data
     * @return bool|mixed|null|BinaryNode
     */
    public function search($data)
    {
        if ($this->isEmpty()) {
            return false;
        }

        $node = $this->root;

        while ($node) {

            if ($data > $node->data) {
                $node = $node->right;
            } elseif ($data < $node->data) {
                $node = $node->left;
            } else {
                break;
            }
        }
        return $node;
    }


//    /**
//     * Display each node in the tree
//     *
//     * @param BinaryNode $node
//     * @return void
//     */
//    public function traverse(BinaryNode $node)
//    {
//        if ($node) {
//            if ($node->left) {
//                $this->traverse($node->left);
//            }
//            echo $node->data . '<br/>';
//
//            if ($node->right) {
//                $this->traverse($node->right);
//            }
//        }
//    }
//

    /**
     * Visit all tree nodes by specific order
     *
     * @param BinaryNode $node
     * @param string $type
     *
     * @return void;
     */
    public function traverse(BinaryNode $node, string $type = "in-order")
    {
        switch ($type) {
            case 'in-order':
                $this->inOrder($node);
                break;

            case 'pre-order':
                $this->preOrder($node);
                break;

            case 'post-order':
                $this->postOrder($node);
                break;
        }
    }

    /**
     * Visit all BST Nodes in in-order mode
     *
     * @param BinaryNode $node
     * @return void
     */
    private function inOrder(BinaryNode $node)
    {
        if ($node) {

            if ($node->left) $this->traverse($node->left);

            echo $node->data . ' ';

            if ($node->right) $this->traverse($node->right);
        }
    }

    /**
     * visit all BST Nodes in pre-order mode
     * @param BinaryNode $node
     */
    private function preOrder(BinaryNode $node)
    {
        if ($node) {
            echo $node->data . ' ';

            if ($node->left) $this->traverse($node->left);

            if ($node->right) $this->traverse($node->right);

        }
    }


    /**
     * visit all BST Nodes in pre-order mode
     * @param BinaryNode $node
     */
    private function postOrder(BinaryNode $node)
    {
        if ($node) {

            if ($node->left) $this->traverse($node->left);

            if ($node->right) $this->traverse($node->right);

            echo $node->data . ' ';
        }
    }
}