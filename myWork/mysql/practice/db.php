<?php
        $connection = mysqli_connect('localhost', 'root', '', 'loginapp');
        if(!$connection) {
            die('DATABASE connection failed');
        }
?>