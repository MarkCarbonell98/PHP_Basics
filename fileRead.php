<?php 
    $file = 'example.txt';
    $bytes = 21;
    $wholeFile = filesize($file);
    $handle = fopen($file, 'r');
    if($handle) {
        $content =  fread($handle, $wholeFile); //each byte is a character
        echo $content;
        fclose($handle);
    }  else {
        echo 'the file could not be written';
    }


?> 