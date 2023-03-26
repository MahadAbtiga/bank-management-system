<?php 
            include ("includes/conn.php");
            if(isset($_GET['did'])){
            $id=$_GET['did'];
            $sdele=mysqli_query($con,"DELETE FROM `withdraw` WHERE `wd_no`='$id'");
            header("location: withdrawTable.php");
            }
            ?>
