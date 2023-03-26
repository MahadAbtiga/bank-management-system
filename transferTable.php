<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include("includes/conn.php");

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Transfer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">




    <?php 
    include ("includes/conn.php");
    if(isset($_POST['saveData'])){
    include ("includes/conn.php");
    $fac=$_POST['from_acc_no'];
    $tac=$_POST['to_acc_no'];

    $amo=$_POST['tr_amount'];
    $dat=date('y-m-d',strtotime($_POST['tr_date']));
    $des=$_POST['description'];
   
    if($fac == $tac){
        
        echo "<script>alert('same acc_no not make transfer !!!');</script>";

    }else{
    $sql="INSERT INTO `transfer`(`tr_no`, `from_acc_no`, `to_acc_no`, `tr_amount`, `tr_date`, `description`) VALUES (null,'$fac','$tac','$amo','$dat','$des')";
    $sql=mysqli_query($con,$sql);
    
    
    header("location: transferTable.php");
    }
    }
    ?>






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
                            <input type="text" name="tr_amount" id="" class="form-control" placeholder="tr_amount">
                            <label for="">tr_date</label>
                            <input type="date" name="tr_date" id="" class="form-control" required placeholder="tr_date">
                            <label for="">description</label>
                            <input type="text" name="description" id="" class="form-control" required placeholder="description">
                            

                            <button type="submit" name="saveData" class="btn btn-info w-50 mt-2">save</button>
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
            <h6 class="m-0 font-weight-bold text-primary">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add new
                </button>

            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>tr_no</th>
                            <th >from_acc_no</th>
                            <th >to_acc_no</th>                  
                            <th >tr_amount</th>
                            <th>tr_date</th>
                            <th >description</th>
                            <th >Action</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>tr_no</th>
                            <th >from_acc_no</th>
                            <th >to_acc_no</th>                  
                            <th >tr_amount</th>
                            <th>tr_date</th>
                            <th >description</th>
                            <th >Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT  * FROM `transfer`");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>


                            <tr>

                                <td><?php echo $row['tr_no']; ?></td>
                                <td><?php echo $row['from_acc_no']; ?></td>
                                <td><?php echo $row['to_acc_no']; ?></td>
                                <td><?php echo $row['tr_amount']; ?></td>
                                <td><?php echo $row['tr_date']; ?></td>
                                <td><?php echo $row['description']; ?></td>

                                <td>
                                    <a href="transferDe.php?did=<?php echo $row['tr_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                                    <a href="transferEdit.php?Eid=<?php echo $row['tr_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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