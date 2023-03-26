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
    if (isset($_GET['Eid'])) {
        $id = $_GET['Eid'];
        $sql = mysqli_query($con, "SELECT * FROM `account_types` WHERE `acc_type_no`='$id'");
        $row = mysqli_fetch_assoc($sql);
        
    }
    ?>

    


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <form action="" method="post">
                            <label for="">acc_type</label>
                            <input type="text" value="<?php echo $row['type_name'];?>" name="name" id="" class="form-control mt-3" placeholder="address name">
                            <label for="">Description</label>
                            <input type="text" value="<?php echo $row['description'];?>" name="desc" id="" class="form-control mt-3" placeholder="city name">
                            <button type="submit" name="saveData" class="btn btn-info w-50 mt-2 mt-3">UPDATE</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>








<?php
        if(isset($_POST['saveData'])){
            include("includes/conn.php");
            $id=$_GET['Eid'];
            $n=$_POST['name'];
            $p=$_POST['desc'];
            $sq="UPDATE `account_types` SET `type_name`='$n',`description`='$p' WHERE `acc_type_no`='$id'";
            $sql=mysqli_query($con,$sq);
            
            header("location: account_type_table.php");
            
            }
    ?>










<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


