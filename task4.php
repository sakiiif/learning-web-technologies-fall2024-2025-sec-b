<?php

function findLargest($num1, $num2, $num3) {
    if ($num1 >= $num2 && $num1 >= $num3) {
        return $num1;
    } elseif ($num2 >= $num1 && $num2 >= $num3) {
        return $num2;
    } else {
        return $num3;
    }
}

$num1 = 15;
$num2 = 42;
$num3 = 27;

echo "The largest number among $num1, $num2, and $num3 is: " . findLargest($num1, $num2, $num3);
?>
