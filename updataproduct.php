<?php
    session_start();
    include("connect.php");
    $pid = $_POST['hdnProductID'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unitInstock = $_POST['txtStock'];
    $picture= $_POST['hdnProductPic'];

    $sql = "UPDATE product SET name='$name', description='$description', price=$price,
    unitInStock=$unitInstock, picture='$picture' WHERE id = $pid";

    echo $sql;

    $result=$conn->query($sql);
    if(!$result){
        echo "Error:" . $conn->error;
    }
    else{
        header("Location:index.php"); 
    }

?>