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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Inheriritance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <?php 
                           include("includes/conn.php");
                           if(isset($_POST['saveDate'])){
                           include "conn.php";
                           $ac=$_POST['ac_n'];
                           $cu=$_POST['cu_no'];
                           $inh_na=$_POST['inh_name'];
                           $re=$_POST['relation'];

                           $insertD="INSERT INTO `inheritance`(`inh_no`, `inheriter_Name`, `acc_no`, `cus_no`, `relation`) VALUES (null,'$inh_na','$ac','$cu','$re')";

                           $sql=mysqli_query($con,$insertD); 
                           echo "<script>alert('date was inserted');</script>";
                           //header("location: inheritanceTable.php");                  
                           
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
                            
                            <label for="">inheriter_Name</label>
                            <input type="text" name="inh_name" id="" class="form-control " placeholder="inh_name">
                            <label for="">relation</label>
                            <input type="text" name="relation" id="" class="form-control  " placeholder="relation">
                            
                            <button type="submit" name="saveDate" class="btn btn-info w-50 mt-2 mt-3">save</button>

                        </form>
                
            </div>

        </div>
    </div>
</div>



<!-- ######333333333333333333333333333333333333333333333333333333333333333333333333######### -->

<!-- edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"> edit Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_POST['saveData'])) {

                    $adn = $_POST['addname'];
                    $city = $_POST['cityname'];
                    $distr = $_POST['District'];
                    $add_in = "INSERT INTO `address`(`add_no`, `Add_Name`, `city_name`, `district`) VALUES (null,'$adn','$city','$distr')";
                    $sql = mysqli_query($con, $add_in);
                }
                ?>

                <form action="" method="post">
                    <label for="">Add_name</label>
                    <input type="text" name="addname" id="" class="form-control " placeholder="address name" required>
                    <label for="">City name</label>
                    <input type="text" name="cityname" id="" class="form-control" placeholder="city name" required>
                    <label for="">District</label>
                    <input type="text" name="District" id="" class="form-control" placeholder="city name" required>
                    <button type="submit" class="btn btn-info w-50 mt-2" name="saveData">save</button>
                </form>

            </div>

        </div>
    </div>
</div>

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
                         
                            

                            

                            <th>inh_no</th>
                            <th>inheriter_Name</th>
                            <th>acc_no</th>                  
                            <th>cus_no</th>
                            <th>relation</th>
                            <th>Action</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                          

                            <th>inh_no</th>
                            <th>inheriter_Name</th>
                            <th>acc_no</th>                  
                            <th>cus_no</th>
                            <th>relation</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include("includes/conn.php");
                        //$sql = mysqli_query($con, "SELECT  * FROM `inheritance`");
                        $sql = mysqli_query($con,"SELECT * FROM customerView");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>


                            <tr>

                                <td><?php echo $row['inh_no']; ?></td>
                                <td><?php echo $row['inheriter_Name']; ?></td>
                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['cus_name']; ?></td>
                                <td><?php echo $row['relation']; ?></td>

                                <td>
                                    <a href="inheritanceDe.php?did=<?php echo $row['inh_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                                    <a href="inheritanceEdi.php?Eid=<?php echo $row['inh_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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