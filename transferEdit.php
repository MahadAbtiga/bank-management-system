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
  $sql = mysqli_query($con,"SELECT * FROM `transfer` WHERE `tr_no`='$id'");
  
  $row=mysqli_fetch_assoc($sql);
}
?>



    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">

                    <form action="" method="post">
                        <label for="">from_acc_no</label>
                            <?php 
                                $s=mysqli_query($con,"SELECT * FROM `accounts`");
                            ?>
                            <select name="from_acc_no" id="" class="form-select ">
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               <option value="<?php echo $r['acc_no'];?>"> <?php echo $r['acc_no'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>
                            <label for="">to_acc_no</label>
                            <?php 
                                $s=mysqli_query($con,"SELECT * FROM `accounts`");
                            ?>
                            <select name="to_acc_no" id="" class="form-select ">
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               <option value="<?php echo $r['acc_no'];?>"> <?php echo $r['acc_no'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>
                            <label for="">tr_amount</label>
                            <input type="text" name="tr_amount" id="" class="form-control" value="<?php echo $row['tr_amount'];?>">
                            <label for="">tr_date</label>
                            <input type="date" name="tr_date" id="" class="form-control" value="<?php echo $row['tr_date'];?>">
                            <label for="">description</label>
                            <input type="text" name="description" id="" class="form-control" value="<?php echo $row['description'];?>">
                            <button type="submit" name="edit" class="btn btn-info w-50 m-4">UPDATE</button>
                        </form>


                        
                    </div>
                </div>
            </div>
        </div>

    </div>






    <?php 
        if(isset($_POST['edit'])){
            include("includes/conn.php");
            $id=$_GET['Eid'];
            $fac=$_POST['from_acc_no'];
            $tac=$_POST['to_acc_no'];
            $amo=$_POST['tr_amount'];
            $dat=date('y-m-d',strtotime($_POST['tr_date']));
            $des=$_POST['description'];

            $update="UPDATE `transfer` SET `from_acc_no`='$fac',`to_acc_no`='$tac',`tr_amount`='$amo',`tr_date`='$dat',`description`='$des' WHERE `tr_no`='$id'";
            $sql=mysqli_query($con,$update);
            
            header("location: transferTable.php");
            }
    ?>   
    









<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


