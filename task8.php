<?php

function printOddNumbers($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        if ($i % 2 != 0) {
            echo $i . " ";
        }
    }
}


printOddNumbers(10, 100);
?>
