<?php 
    $file = 'example.txt';
    $handle = fopen($file, 'w');
    if($handle) {
        fwrite($handle, 'I love php and my job');
        fclose($handle);
    }  else {
        echo 'the file could not be written';
    }


?> 