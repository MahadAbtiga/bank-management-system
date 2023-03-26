<?php 
session_start();
?>

<?php 

include("includes/conn.php");
if(isset($_POST['save'])){   
 $user=$_POST['username'];
 $pass=$_POST['password'];

    $sql=mysqli_query($con,"SELECT * FROM `users` WHERE `user_name`='$user' AND `password`='$pass'");
    $num=mysqli_num_rows($sql);
    if($num == 1){
        $_SESSION['username']=$user;
        header("location: custemerTable.php");
    }else{
        header("location: loog.php");
    }

    

}
?>