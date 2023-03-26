<?php
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include ("includes/conn.php");

?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Address</h1>
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
                    <input type="text" name="addname" id="" class="form-control " placeholder="add name">
                    <label for="">City name</label>
                    <input type="text" name="cityname" id="" class="form-control" placeholder="city name">
                    <label for="">District</label>
                    <input type="text" name="District" id="" class="form-control" placeholder="District">
                    <button type="submit" class="btn btn-info w-50 mt-2" name="saveData">save</button>
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
            <h5 class="m-0 font-weight-bold text-primary">
                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add new
                </button>

            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>add_no</th>
                            <th>Add_Name</th>
                            <th>city_name</th>
                            <th>district</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>add_no</th>
                            <th>Add_Name</th>
                            <th>city_name</th>
                            <th>district</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php
                include ("includes/conn.php");
                $sql = mysqli_query($con, "SELECT * FROM address");
                while ($row = mysqli_fetch_array($sql)) {
                ?>


                        <tr>
                            <td><?php echo $row['add_no']; ?></td>
                            <td><?php echo $row['Add_Name']; ?></td>
                            <td><?php echo $row['city_name']; ?></td>
                            <td><?php echo $row['district']; ?></td>
                    
                            <td>
                            <a href="tablede.php?did=<?php echo $row['add_no'] ?>" class="btn btn-danger"><i class="bi bi-person-x"></i></a>
                            <a href="tableedit.php?Eid=<?php echo $row['add_no'] ?>" class="btn btn-success editbtn"><i class="bi bi-pencil-square"></i></a>
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