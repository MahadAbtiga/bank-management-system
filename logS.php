<?php 
session_start();
include("includes/conn.php");



if(isset($_POST['save'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    // if(empty($user)){
    //     $_SESSION['user']="Enter your username";
    // }elseif(strlen($user)){
    //     $_SESSION['userl']="user name should be al list 5 character";
    // }
    
    
    $sql="SELECT * FROM `users` WHERE `user_name`='$user' AND `password`='$pass'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if($num > 0){
        $_SESSION['username'] = $user;
        //$_SESSION['username']=$row['id'];
        //header("location: dashboard.php");
        header("location: dashboard.php");

       
    
    }else{
        $_SESSION['msg'] = "username and password invalid";
        header("location: log.php");
    }
    
   

}


