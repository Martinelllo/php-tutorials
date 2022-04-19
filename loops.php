<?php

// while loop
$num = 0;
while ($num < 10) {
    echo "$num, ";
    $num++;
}

echo "<br>";

// for loop
for ($i = 0; $i < 10; $i++) {
    echo "$i, ";
}

echo "<br>";

// foreach loop
$names = array('martin', 'matthi', 'emir');
foreach ($names as $name) {
    echo "$name, ";
}

?>