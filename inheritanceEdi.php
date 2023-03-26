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
  //$sql = mysqli_query($con,"SELECT * FROM `inheritance` WHERE `inh_no`='$id'");

  $sql = mysqli_query($con,"SELECT * FROM `inheritance` INNER JOIN customer ON customer.cus_no = inheritance.inh_no WHERE `inh_no`='$id'");
  
  

  $row=mysqli_fetch_assoc($sql);
}
?>



    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">

                    <form action="" method="post">
                            <label for="">acc_no</label>
                            <?php
                            include("includes/conn.php");
                            $s = mysqli_query($con, "SELECT * FROM accounts");
                            ?>
                            <select name="ac_n" id="" class="form-select ">
                                 <option value="<?php echo $row['acc_no']; ?>"> <?php echo $row['acc_no']; ?> </option>
                                <?php
                                while ($r = mysqli_fetch_array($s)) {
                                ?>

                                    <option value="<?php echo $r['acc_no']; ?>"> <?php echo $r['acc_no']; ?> </option>

                                <?php
                                }
                                ?>

                            </select>
                            <label for="">cus_no</label>
                            <?php
                            include("includes/conn.php");
                            $s = mysqli_query($con, "SELECT * FROM customer");
                            ?>
                            <select name="cu_no" id="" class="form-select ">
                                 <option value="<?php echo $row['cus_no']; ?>"> <?php echo $row['cus_name']; ?> </option>
                                <?php
                                include("includes/conn.php"); 
                                while ($r = mysqli_fetch_array($s)) {
                                ?>

                                    <option value="<?php echo $r['cus_no']; ?>"> <?php echo $r['cus_name']; ?> </option>

                                <?php
                                }
                                ?>
                            </select>

                            <label for="">inheriter_Name</label>
                            <input type="text" value="<?php echo $row['inheriter_Name']; ?>" name="inh_name" id="" class="form-control " placeholder="city name">
                            <label for="">relation</label>
                            <input type="text" value="<?php echo $row['relation']; ?>" name="relation" id="" class="form-control  " placeholder="">

                            <button type="submit" name="edit" class="btn btn-info w-50 mt-2 mt-3">UPDATE</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>






<?php

    if (isset($_POST['edit'])) {
        include ("includes/conn.php");
        $id = $_GET['Eid'];
        $a = $_POST['ac_n'];

        $c = $_POST['cu_no'];

        $d = $_POST['inh_name'];
        $r = $_POST['relation'];
        $upd = "UPDATE `inheritance` SET `inheriter_Name`=' $d',`acc_no`='$a',`cus_no`=' $c',`relation`='$r' WHERE `inh_no`='$id'";
        //$sq="UPDATE `account_types` SET `type_name`='$a',`description`='$c' WHERE `acc_type_no`='$id'";
        $sql = mysqli_query($con, $upd);
        
        header("location: inheritanceTable.php");
        
    }
    ?>










<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


