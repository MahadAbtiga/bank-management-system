<?php
session_start();
ob_start();
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Inheriritance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">





<?php 

include("includes/conn.php");
if(isset($_POST['save'])){

    $acc=$_POST['acc_type_no'];
    $cu=$_POST['cu_no'];
    $reg=$_POST['reg'];
    $ba=$_POST['bal'];
    if($ba!=0){
        
        echo "<script>alert('blance must be 0  !!!');</script>";
    }else{
        $sql=mysqli_query($con,"INSERT INTO `accounts`(`acc_no`, `acc_type_no`, `cus_no`, `register_date`, `balnce`) VALUES (null,'$acc',' $cu','$reg','$ba')");
        header("location: tableAcount.php");
    }
    

    

}



?>






<form action="" method="post">

<label for="">acc_type_no</label>
    <?php 
        include("includes/conn.php");
        $s=mysqli_query($con,"SELECT * FROM `account_types`");
    ?>
    <select name="acc_type_no" id="" class="form-select ">
       <?php 
            while($r = mysqli_fetch_array($s)){                                 
       ?> 

       <option value="<?php echo $r['acc_type_no'];?>"> <?php echo $r['type_name'];?> </option>
       
       <?php 
            }
       ?>
    </select>



<label for="">cus_no</label>    
    <?php 
        include("includes/conn.php");
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
    <input type="date" name="reg" id="" class="form-control mt-3" placeholder="" required>


    <label for="">balnce</label>
    <input type="text" name="bal" id="" class="form-control mt-3" placeholder="" min=0 max=0 required>
    
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
                         
                            

                            

                        

                            <th> acc_no</th>
                            <th > acc_type_no</th>
                            <th >cus_no</th>
                            <th > register_date</th>  
                            <th >balnce</th>
                            <th >Action</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                         
                            <th> acc_no</th>
                            <th > acc_type_no</th>
                            <th >cus_no</th>
                            <th > register_date</th>  
                            <th >balnce</th>
                            <th >Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT *FROM accounview");
                        
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>


                            <tr>

                     

                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['type_name']; ?></td>
                                <td><?php echo $row['cus_name']; ?></td>
                                <td><?php echo $row['register_date']; ?></td>
                                <td><?php echo $row['balnce']; ?></td>

                                <td>
                                    <a href="deleteAcount.php?did=<?php echo $row['acc_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                                    <a href="updateAccount.php?Eid=<?php echo $row['acc_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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