<?php 
            
            include ("includes/conn.php");
            
            if(isset($_GET['did'])){
            $id=$_GET['did'];
            $sdele=mysqli_query($con,"DELETE FROM `transfer` WHERE `tr_no`='$id'");
            
            
            //header('location: custemerTable.php');
            header("location: transferTable.php");
            ob_end_flush();
            
            
            }
            ?>
