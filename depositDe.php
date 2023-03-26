<?php 
            
            include ("includes/conn.php");
            
            if(isset($_GET['did'])){
            $id=$_GET['did'];
            $sdele=mysqli_query($con,"DELETE FROM `deposit` WHERE `dep_no`='$id'");
            
            ob_start();
            header("location: depositTable.php");
            
            }
            ?>
