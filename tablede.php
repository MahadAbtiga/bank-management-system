<?php
include ("includes/conn.php");
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $del = mysqli_query($con, "DELETE FROM `address` WHERE `add_no`='$id'");
    if($del){
        echo "data waas delete";
        header("location: tables.php");
    }else{
        echo "data waas not delete"; 
    }
    
}
