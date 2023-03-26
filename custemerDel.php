<?php 
            
            include ("includes/conn.php");
            
            if(isset($_GET['did'])){
            $id=$_GET['did'];
            $sdele=mysqli_query($con,"DELETE FROM `customer` WHERE `cus_no`='$id'");
            
            
            //header('location: custemerTable.php');
            header("location: custemerTable.php");
            ob_end_flush();
            
            
            }
            ?>
