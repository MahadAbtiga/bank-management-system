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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Deposit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <?php 
                           include ("includes/conn.php");
                           if(isset($_POST['saveDate'])){
                           include ("includes/conn.php");
                           $ac=$_POST['ac_n'];
                           $de_am=$_POST['dep_amount'];
                           $d_da=date('y-m-d',strtotime($_POST['dep_date']));
                           $de=$_POST['description'];
                           $insertD="INSERT INTO `deposit`(`dep_no`, `acc_no`, `dep_amount`, `dep_date`, `description`) VALUES (null,'$ac','$de_am','$d_da','$de')";
                           $sql=mysqli_query($con,$insertD);
                           //header("location: depositTable.php");                   
                           
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
                
                            <label for="">dep_amount</label>
                            <input type="text" name="dep_amount" id="" class="form-control " placeholder="dep_amount" min="1" required>
                            <label for="">dep_date</label>
                            <input type="date" name="dep_date" id="" class="form-control  " placeholder="dep_date" required>
                            <label for="">description</label>
                            <input type="text" name="description" id="" class="form-control" placeholder="description" required>
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
                    <input type="text" name="addname" id="" class="form-control " placeholder="address name">
                    <label for="">City name</label>
                    <input type="text" name="cityname" id="" class="form-control" placeholder="city name">
                    <label for="">District</label>
                    <input type="text" name="District" id="" class="form-control" placeholder="city name">
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
                         
                            

                            <th>dep_no</th>
                            <th>acc_no</th>
                            <th>dep_amount</th>                  
                            <th>dep_date</th>
                            <th>description</th>
                            <th>Action</th>



                        </tr>
                    </thead>
                    <tfoot>
                        <tr>

                            <th>dep_no</th>
                            <th>acc_no</th>
                            <th>dep_amount</th>                  
                            <th>dep_date</th>
                            <th>description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT  * FROM `deposit`");
                        while ($row = mysqli_fetch_array($sql)) {
                        ?>


                            <tr>




                                <td><?php echo $row['dep_no']; ?></td>
                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['dep_amount']; ?></td>
                                <td><?php echo $row['dep_date']; ?></td>
                                <td><?php echo $row['description']; ?></td>

                                <td>
                                    <a href="depositDe.php?did=<?php echo $row['dep_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                                    <a href="depositEd.php?Eid=<?php echo $row['dep_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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