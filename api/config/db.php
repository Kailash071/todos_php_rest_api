<?php
    function connectDB(){
        $db_host = 'localhost';
        $db_user = 'root';
        $db_pass = '';
        $db_name = 'rest-api';

        $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name);

        if(!$conn){
            die('Could not connect :'. mysqli_connect_error($conn));
        }
               
        return $conn;
    }
?>