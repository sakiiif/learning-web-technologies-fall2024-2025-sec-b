<?php

$amount= 200;
$vat= 15;

$total_amount = $amount * ($vat/100.0);

echo "amount: " . $amount . " units<br>";
echo "vat (%): " . $vat . " units<br>";
echo "VAT over the amount: " . $total_amount . " units<br>";

?>