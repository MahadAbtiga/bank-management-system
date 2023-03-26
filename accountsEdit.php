<?php
session_start();
ob_start();
include("includes/header.php");
include("includes/navbar.php");
include ("includes/conn.php");


?>

<?php 
include ("includes/conn.php");
if(isset($_GET['Eid'])){
  $id=$_GET['Eid'];
  $sql = mysqli_query($con,"SELECT * FROM `accounts` WHERE `acc_no`='$id'");
  
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
                                $s=mysqli_query($con,"SELECT * FROM accounts");
                            ?>
                            <select name="ac_n" id="" class="form-select ">
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               <option value="<?php echo $r['acc_no'];?>"> <?php echo $r['acc_no'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>
                            <label for="">cus_no</label>    
                            <?php 
                                $s=mysqli_query($con,"SELECT * FROM customer");
                            ?>
                            <select name="cu_no" id="" class="form-select ">
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               <option value="<?php echo $r['cus_no'];?>"> <?php echo $r['cus_name'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>
                    <label for="">register_date</label>
                    <input type="date" name="register_date" id="" value="<?php echo $row['register_date'];?>"  class="form-control" placeholder="register date">
                    <label for="">balance</label>
                    <input type="text" name="balance" id="" value="<?php echo $row['balnce'];?>" class="form-control" placeholder="balance">
                    

                    <button type="submit" class="btn btn-info w-50 mt-2" name="saveData">save</button>
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

    $acc_t=$_POST['acc_type'];   
    $cus_n=$_POST['cus_no'];

    $reg=$_POST['register_date'];
    $bal=$_POST['balance'];
   
    $upd="UPDATE `accounts` SET `acc_type_no`='$acc_t',`cus_no`='$cus_n',`register_date`='$reg',`balnce`='$bal' WHERE `acc_no`='$id'";
    $sql=mysqli_query($con,$upd);
    header("location: accountsTable.php");
    }
    ?>

<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


