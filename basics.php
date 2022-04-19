<?php

/* comments example */
// comments example

// print something
echo "Hello world";

// new line
echo "<br>";

$name = "Martin"; 
$age = 30;

// print variables
echo $name;

// combined printout
echo "$name <br>";

// Bold printout
echo "<b>Bold</b>";

// combine all
echo "<a href='http://www.google.de'> $name <br>";

// use single quotation marks and add strings together
echo '<a href="http://www.google.de">' . $age . '</a> <br>';

// use a backslash to ignore control character like quotation marks
echo 'it\'s a example \\\\ <br>';

// Math functions
$numA = 10;
$numB = 5;

// basic arithmetic
echo  $numA + $numB . '<br>';
echo  $numA - $numB . '<br>';
echo  $numA * $numB . '<br>';
echo  $numA / $numB . '<br>';

// increase (increment)
$numA++;

// decrease (decrement)
$numB--;

echo  "$numA $numB <br>";

?>