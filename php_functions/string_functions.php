<?php

$sentence = 'This is a sentence.';

$needle = 'a';

$search = strpos($sentence, $needle);

if($search == FALSE) {
    echo "No match <br>"; 
}
echo "$search <br>";

?>