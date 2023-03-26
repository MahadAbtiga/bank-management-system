
<?php
session_start();
include("includes/conn.php");
if(isset($_POST['save'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    if(empty($user)){
        $_SESSION['user']="please fill empty";
    }elseif(strlen($user)<5){
        $_SESSION['user']="user name should be at list 5 character";
    }

    $sq= "INSERT INTO `users`(`user_id`, `user_name`, `password`, `Gmail`) VALUES (null,'$user','$pass','$email')";
  
    $sql=mysqli_query($con,$sq);
    if($sql){
        $_SESSION['msf']="registred data";
        header("location: reg.php");
    }else{
        echo "register valid";
    }
}
?>