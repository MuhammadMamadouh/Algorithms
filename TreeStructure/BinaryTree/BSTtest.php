<?php

namespace Tree\BinaryTree;
require_once 'BST.php';

$tree = new BST(12);

$tree->insert(6);
$tree->insert(18);
$tree->insert(36);
$tree->insert(76);
$tree->insert(8);
$tree->insert(5);
$tree->insert(13);
$tree->insert(24);

$tree->traverse($tree->root);
echo '<br/>';
$tree->traverse($tree->root, 'post-order');
echo '<br/>';
$tree->traverse($tree->root, 'pre-order');
echo '<br/>';
echo $tree->search(15) ? 'Found' : 'Not Found';
echo '<br/>';

$tree->remove(13);

$tree->traverse($tree->root);

echo '<pre>';
print_r($tree);
echo '</pre>';



