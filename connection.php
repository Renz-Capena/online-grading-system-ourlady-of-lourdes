<?php
    function connect(){
        $localhost = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'ollc-online-grading';

        $sql = new mysqli($localhost,$user,$pass,$db);
        return $sql;
    }

?>