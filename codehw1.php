<!DOCTYPE html>
<html>
    <head>
        <body>
            <?php

function give_change($cents) {
    $dollars = floor($cents / 100);
    $cents = $cents % 100;
    $quarters = floor($cents / 25);
    $cents = $cents % 25;
    $dimes = floor($cents / 10);
    $cents = $cents % 10;
    $nickels = floor($cents / 5);
    $cents = $cents % 5;

    return array($dollars, $quarters, $dimes, $nickels, $cents);
}

$centamount = 298;

echo "<h1>Challenge: Correct Change</h1>";

echo "You are due a total of $centamount cents.";


list($dollars, $quarters, $dimes, $nickels, $cents) = give_change($centamount);

echo "You are due $dollars dollar(s), $quarters quarter(s), $dimes dime(s), $nickels nickel(s) and $cents cent(s).";

echo "<h1>Challenge: 99 Bottles of Beer</h1>";

$bottles = 99;
        for($i=$bottles; $i>=1; $i--)
        {
            $j = $i-1;
            echo "$i bottles of beer on the wall, $i bottles of beer.<br> Take one down, pass it around, $j bottles of beer on the wall.<br>";

        }

?>

        </body>
    </head>
</html>