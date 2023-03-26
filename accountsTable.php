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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

        <?php 
            if(isset($_POST['saveData'])){
            include ("includes/conn.php");
            $acc_t=$_POST['acc_type'];   
            $cus_n=$_POST['cus_no'];
            $reg=$_POST['register_date'];
            $bal=$_POST['balance'];
            $pict=$_POST['picture'];
            $_SESSION['bal']=$bal;
            $imp="INSERT INTO `accounts`(`acc_no`, `acc_type_no`, `cus_no`, `register_date`, `balnce`, `picture`) VALUES (null,'$acc_t','$cus_n','$reg','$bal','$pict')";
            $sql=mysqli_query($con,$imp);
            //header("location: addressTable.php");
            }
       ?>







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
                    <input type="date" name="register_date" id="" class="form-control" placeholder="register date">
                    <label for="">balance</label>
                    <input type="text" name="balance" id="" class="form-control" placeholder="balance">
                   

                    <button type="submit" class="btn btn-info w-50 mt-2" name="saveData">save</button>
                </form>

            </div>

        </div>
    </div>
</div>







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
                            

                            <th >acc_no</th>
                            <th >acc_type_no</th>
                            <th>cus_no</th>  
                            <th>balance</th>                
                            <th >register_date</th>
                           
                            <th >Action</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          

                            <th >acc_no</th>
                            <th >acc_type_no</th>
                            <th>cus_no</th>  
                            <th>balance</th>                
                            <th >register_date</th>
                           
                            <th >Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT * FROM `accounts`");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>


                            <tr>


                            

                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['acc_type_no']; ?></td>
                                <td><?php echo $row['cus_no']; ?></td>
                                <td><?php echo $row['balnce']; ?></td>
                                <td><?php echo $row['register_date']; ?></td>
                              

                                <td>
                                    <a href="accountsDe.php?did=<?php echo $row['acc_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                                    <a href="accountsEdit.php?Eid=<?php echo $row['acc_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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
//include("includes/footer.php");
?>