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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Customer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <?php 
    include ("includes/conn.php");
    if(isset($_POST['saveData'])){
    include "conn.php";
    $cus=$_POST['cus_name'];
    $te=$_POST['tell'];
    $se=$_POST['sex'];
    $Birth=date('y-m-d',strtotime($_POST['Birth_date']));
    $pass=$_POST['passport'];
    $add=$_POST['add_no'];
    $ema=$_POST['email'];

    $ind="INSERT INTO customer(`cus_no`, `cus_name`, `tell`, `sex`, `Birth_date`, `passport`, `add_no`, `email`) VALUES (null,'$cus','$te','$se','$Birth','$pass','$add','$ema')";
    $sql=mysqli_query($con,$ind);
    echo "<script>alert('Insert was insert');</script>";
    //header("location: custemerTable.php");
    header("location: custemerTable.php");
    ob_start();
    }

    ?>

<form action="" method="post">
                            <label for="">cus_name</label>
                            <input type="text" name="cus_name" id="" class="form-control " placeholder="address name">
                            <label for="">Tell</label>
                            <input type="text" name="tell" id="" class="form-control " placeholder="city name">
                            <label for="">sex</label>
                            <select name="sex" id="" class="form-select ">
                                <option>female</option>
                                <option>male</option>
                            </select>
                            
                            <label for="">add_no</label>
                            <?php 
                                $s=mysqli_query($con,"SELECT * FROM address");
                            ?>
                            <select name="add_no" id="" class="form-select ">
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               <option value="<?php echo $r['add_no'];?>"> <?php echo $r['Add_Name'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>

                            <label for="">birthday</label>
                            <input type="date" name="Birth_date" id="" class="form-control" required>
                            <label for="">passport</label>
                            <input type="text" name="passport" id="" class="form-control" required>
                            <label for="">email</label>
                            <input type="text" name="email" id="" class="form-control" required>
                            <button type="submit" name="saveData" class="btn btn-info w-50">save</button>
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
                         
                            <th >cus_no</th>
                            <th>cus_name</th>
                            <th>tell</th>                  
                            <th>sex</th>
                            <th>Birth_date</th>
                            <th>passport</th>
                            <th>add_no</th>
                            <th>email</th>
                            <th>Action</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          
                            <th >cus_no</th>
                            <th>cus_name</th>
                            <th>tell</th>                  
                            <th>sex</th>
                            <th>Birth_date</th>
                            <th>passport</th>
                            <th>add_no</th>
                            <th>email</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include("includes/conn.php");
                        //$sql = mysqli_query($con, "SELECT  * FROM `customer`");
                        $sql=mysqli_query($con,"SELECT * FROM `customer`
                        inner join address on address.add_no = customer.add_no");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>


                            <tr>


                                <td><?php echo $row['cus_no']; ?></td>
                                <td><?php echo $row['cus_name']; ?></td>
                                <td><?php echo $row['tell']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['Birth_date']; ?></td>
                                <td><?php echo $row['passport']; ?></td>
                                <td><?php echo $row['Add_Name']; ?></td>
                                <td><?php echo $row['email']; ?></td>

                                <td>
                                    <a href="custemerDel.php?did=<?php echo $row['cus_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                                    <a href="custemerEdit.php?Eid=<?php echo $row['cus_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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