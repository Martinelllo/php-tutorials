<?php

$numA = 11;
$numB = 4;

if($numA > 12) {
    echo  '$numA is bigger or equal 12 <br>';
} elseif($numA == 11) {
    echo  '$numA is 11 <br>';
} else {
    echo  '$numA is smaller then 11 <br>';
}

$operate = 'Multiplication';

// switch case
switch($operate) {
    case 'Multiplication';
        echo "answerer = " . $numA * $numB . '<br>';
        break;
    case 'Add';
        echo "answerer = " . $numA + $numB . '<br>';
        break;
}

if($numA == 11 or $numA == 12 and $numA != 2) {echo '$numA is 11 or 12 and not 2 <br>';}

?>