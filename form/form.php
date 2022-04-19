<?php

if( !empty($_GET['name']) and !empty($_GET['age']) ) {
    echo "Hello " . $_GET['name'] . ". You are " . $_GET['age'] . " years old. <br>";
} else {
    echo "Form not Valid. <br>";
}
echo "<a href='./'><input type='button' value='Back'></a>";

?>