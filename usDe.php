<?php 
            //session_start();
            include ("includes/conn.php");
            
            if(isset($_GET['did'])){
            $id=$_GET['did'];
            $sdele=mysqli_query($con,"DELETE FROM `users` WHERE `user_id`='$id'");

            if(isset($_SESSION['username']) == $sdele){
                 
                header("location: usTable.php");
                
                
            }else{
                echo '<script type="text/javascript">alert(" user was delete'.$sdele.'")</script>';
                header("location: log.php");
            }
        }

            // if($sdele){
               
            //     header("location: usTable.php");
            // }
            // <?php
                        
            // // include("includes/conn.php");
            
            //  if(isset($_SESSION['username'])){
            //      echo $_SESSION['username'];
            //  } ?>
            
            // //header('location: custemerTable.php');
            
            
            // //
            // ob_end_flush();
            
            
            // }
            // ?>
