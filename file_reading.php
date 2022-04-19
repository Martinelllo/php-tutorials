<?php
    $filePath = './sometext.txt';

    // write something in the file
    file_put_contents($filePath, "Das hier ist ein text file,
das von php gelesen wird.");

file_put_contents($filePath, " Append something", FILE_APPEND);








    $text = file_get_contents($filePath);

    // ----------- new line interpreting as plain/text ---------------
    // this header tells the interpreter all text is plaintext and html tags will not be interpreted
    // the benefit of this is new line tags will not longer bi ignored but we don't use that
    // header('Content-Type: text/plain');
    // echo $text;
    // echo  "<br>";
    // echo $text;


    // ----------- new line with for each ---------------
    // $lines = explode("\n", $text);
    // foreach ($lines as $line) {
    //     echo $line . "<br>";
    // }

    // ----------- new line with find and replace the \n tag in the plain/text ---------------
    $textWithTags = str_replace("\n", "<br>" , $text);
    echo $textWithTags
?>