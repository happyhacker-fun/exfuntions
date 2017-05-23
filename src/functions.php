<?php
/**
 * Created by PhpStorm.
 * User: Frost Wong <frostwong@gmail.com>
 * Date: 22/05/2017
 * Time: 22:08
 */

namespace ExtendedFunctions;

/**
 * Return all the values of a multi-dimensional array with specified key
 *
 * If $array is associated, an array of values with key $key will be returned.
 * If $array is non-associated, [$array[$key]] will be returned.
 *
 * @param array $array
 * @param $key
 * @return array | mixed
 */
function array_values_recursive(array $array, $key)
{
    if (empty($array)) {
        return [];
    }
    $val = [];
    array_walk_recursive($array, function ($v, $k) use ($key, &$val) {
        if ($k === $key) {
            array_push($val, $v);
        }
    });
    return $val;
}