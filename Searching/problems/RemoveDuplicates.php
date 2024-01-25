<?php



/**
 * Remove duplicates from array
 *
 * Time complexity O(n)
 * Space complexity O(n)
 * @param array $arr
 * @return array
 */
function removeDuplicates(array $arr): array
{
    $result = [];
    $length = count($arr);
    for ($i = 0; $i < $length; $i++) {
        if (!in_array($arr[$i], $result)) {
            $result[] = $arr[$i];
        }
    }
    return $result;
}


function removeDuplicates2(array $arr): array
{
    $result = [];
    $length = count($arr);
    for ($i = 0; $i < $length; $i++) {
        if (!isset($result[$arr[$i]])) {
            $result[$arr[$i]] = $arr[$i];
        }
    }
    return array_values($result);
}


function removeDuplicates3(array $arr): array
{
    $length = count($arr);
    // sort array
    // sort($arr);
    return array_unique($arr);
}


$arr = [1, 2, 3, 4, 5, 1, 2, 3, 4, 5];

print_r(removeDuplicates3($arr));