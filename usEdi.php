<?php
session_start();
ob_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include ("includes/conn.php");


?>

<?php 
include ("includes/conn.php");
if(isset($_GET['Eid'])){
  $id=$_GET['Eid'];
  $sql = mysqli_query($con,"SELECT * FROM `users` WHERE `user_id`='$id'");
  
  $row=mysqli_fetch_assoc($sql);
}
?>


    


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">




                   
                <form action="" method="post">
                    <label for="">user_name</label>
                    <input type="text" name="username" value="<?php echo $row['user_name'];?>" id="" class="form-control mt-3" placeholder="">
                    <label for="">password</label>
                    <input type="text" name="password" value="<?php echo $row['password'];?>" id="" class="form-control mt-3" placeholder="">
                    <label for="">Email</label>
                    <input type="text" name="gmail" value="<?php echo $row['Gmail'];?>" id="" class="form-control mt-3" placeholder="">

                    <button type="submit" name="edit" class="btn btn-info w-50 mt-2 mt-3">save</button>

                </form>



                    </div>
                </div>
            </div>
        </div>

    </div>








 


<?php 
include("includes/conn.php");
if(isset($_POST['edit'])){

    $user=$_POST['username'];
    $pass=$_POST['password'];
    $gmail=$_POST['gmail'];

    $sql=mysqli_query($con,"UPDATE `users` SET `user_name`='$user',`password`=' $pass',`Gmail`='$gmail' WHERE `user_id`='$id'"); 
    header("location: usTable.php");

}
?>









<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


