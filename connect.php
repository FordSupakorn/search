<?php
    $conn = new mysqli("localhost","root","123456789","jdshop");
    if($conn->connect_errno){
        die("Connection failed:".$conn->connect_error);
    }
?>