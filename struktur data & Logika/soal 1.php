<?php

function findSecondHighest($arr) 
{
    // mencari nilai maximum dari array
    $max = max($arr);
    // rekondisi array tanpa maximum value
    $array = array_diff($arr, [$max]);

    return max($array);
}


$array = array(1,6,7,8,8,7,9,10);
echo findSecondHighest($array);