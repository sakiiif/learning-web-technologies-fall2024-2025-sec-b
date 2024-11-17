<?php

function searchElement($array, $element) {
    if (in_array($element, $array)) {
        return "$element is found in the array.";
    } else {
        return "$element is not found in the array.";
    }
}

$array = [10, 20, 30, 40, 50];
$element = 30;

echo "array elements: ";
for ($i = 0; $i <5; $i++) {
    echo $array[ $i ]. " ";
}

echo "<br>";

echo searchElement($array, $element);
echo "<br>";
echo searchElement($array, 65);
?>
