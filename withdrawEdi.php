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
  $sql = mysqli_query($con,"SELECT * FROM `withdraw` WHERE `wd_no`='$id'");
  
  $row=mysqli_fetch_assoc($sql);
}
?>

    


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">

                    <form action="" method="post">
                        <label for="">add_no</label>
                            <?php 
                                $s=mysqli_query($con,"SELECT * FROM `accounts`");
                            ?>
                            <select name="acc" id="" class="form-select ">
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               
                               <option value="<?php echo $r['acc_no'];?>"> <?php echo $r['acc_no'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>
                            <label for="">wd_amount</label>
                            <input type="text" name="amount"  value="<?php echo $row['wd_amount'];?>" id="" class="form-control " placeholder="amount" min="1">
                            <label for="">wd_date</label>
                            <input type="date" name="data"  value="<?php echo $row['wd_date'];?>" id="" class="form-control " placeholder="date">
                            <label for="">description</label>
                            <input type="text" name="desc"  value="<?php echo $row['description'];?>" id="" class="form-control  " placeholder="description">
                            
                            
                            <button type="submit" name="edit" class="btn btn-info w-50 mt-2 mt-3">UPDATE</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>








 

<?php 
        if(isset($_POST['edit'])){
            include ("includes/conn.php");
            $id=$_GET['Eid'];
            $acc=$_POST['acc'];
            $amount=$_POST['amount'];
            $data=$_POST['data'];
            $desc=$_POST['desc'];
            
            $sq="UPDATE `withdraw` SET  `acc_no`='$acc',`wd_amount`='$amount',`wd_date`='$data',`description`='$desc' WHERE `wd_no`='$id'";
            $sql=mysqli_query($con,$sq);
            header("location: withdrawTable.php");
            }
    ?>









<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


