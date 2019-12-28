<?php
    session_start();
    include("connect.php");
    $pid = $_POST['hdnProductID'];
    $name = $_POST['txtName'];
    $description = $_POST['txtDescription'];
    $price = $_POST['txtPrice'];
    $unitInstock = $_POST['txtStock'];
    //updata picture
    $picture= $_POST['hdnProductPic'];
    if($_FILES["filePic"]["name"]!=""){
        $picture = $_FILES["filePic"]["name"];

        move_uploaded_file($_FILES["filePic"]["tmp_name"],"pig/".$_FILES["filePic"]["name"]);
    }

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