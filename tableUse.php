<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include ("includes/conn.php");

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

<?php 
include("includes/conn.php");
if(isset($_POST['save'])){

    $user=$_POST['username'];
    $pass=$_POST['password'];
    $gmail=$_POST['gmail'];

    $sql=mysqli_query($con,"INSERT INTO `users`(`user_id`, `user_name`, `password`, `Gmail`) VALUES (null,'$user','$pass','$gmail')");

    header("location: tableUse.php");

}
?>


                    <form action="insetUser.php" method="post">
                            <label for="">user_name</label>
                            <input type="password" name="username" id="" class="form-control mt-3" placeholder="username" required>
                            <label for="">password</label>
                            <input type="text" name="password" id="" class="form-control mt-3" placeholder="password" required>
                            <label for="">Email</label>
                            <input type="email" name="gmail" id="" class="form-control mt-3" placeholder="gmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                            
                            <button type="submit" name="save" class="btn btn-info w-50 mt-2 mt-3">save</button>

                        </form>



            </div>
            
        </div>
    </div>
</div>



<!-- ######333333333333333333333333333333333333333333333333333333333333333333333333######### -->



<!-- ############################################################ -->




<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-2">
        <div class="card-header py-1">
            <h5 class="m-0 font-weight-bold text-primary">
                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new
                </button>

            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            

                            <th>user_id</th>
                            <th>user_name</th>
                            <th>password</th>
                            <th>Gmail</th>  
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                         

                        <th>user_id</th>
                        <th>user_name</th>
                        <th>password</th>
                        <th>Gmail</th>
                        <th>Action</th>   

                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                include ("includes/conn.php");
                $sql = mysqli_query($con, "SELECT * FROM `users`");
                while ($row = mysqli_fetch_array($sql)) {
                ?>


                    <tr>
                        <td><?php echo $row['user_id']; ?></td>
                        <td><?php echo $row['user_name']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['Gmail']; ?></td>
                        
                        
                        <td>
                            <a href="tableAcount.php?did=<?php echo $row['user_id'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                            <a href="updateAcouts.php?Eid=<?php echo $row['user_id'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>


                        <?php
                }
                ?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<?php


include("includes/script.php");
include("includes/footer.php");
?>