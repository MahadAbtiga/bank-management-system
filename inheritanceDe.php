<?php 
            include ("includes/conn.php");
            if(isset($_GET['did'])){
            $id=$_GET['did'];
            $sdele=mysqli_query($con,"DELETE FROM `inheritance` WHERE `inh_no`='$id'");
            
            header("location: inheritanceTable.php");
            ob_end_flush();
            
            
            }
            ?>