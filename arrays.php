<?php

$names = array('martin', 'matthi');
$ages = array('martin'=>30 , 'matthi'=>40);

echo $names[1] . '<br>';
echo $ages['matthi'] . '<br>';

// print out human readable info about variables
print_r($names);

echo '<br>';

// multidimensional Arrays
$array2D = array($names , $ages);

echo $array2D[0][1] . $array2D[1]['matthi'] . '<br>';

print_r($array2D)

?>