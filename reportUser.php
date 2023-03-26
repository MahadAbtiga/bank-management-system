<?php 
session_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");



?>

<div class="cantainer">
    <h1 class="text-center text-primary">Report with withdraw table</h1>
</div>




    <div class="container pd-5 mt-5">
        <form action="" method="GET">
            <div class="row">
                <div class="col-4">
                    <div class="from-group">
                        <label> From Date </label>
                        <input type="date" name="from_date" class="form-control" value="<?php if (
                            isset($_GET['from_date'])
                        ) {
                            echo $_GET['from_date'];
                        } ?>">
                    </div>
                </div>

                <div class="col-4">
                    <div class="from-group">
                        <label> To Date </label>
                        <input type="date" name="to_date" class="form-control" value="<?php if (
                            isset($_GET['to_date'])
                        ) {
                            echo $_GET['to_date'];
                        } ?>">
                    </div>
                </div>

                <div class="col-3">
                    <div class="from-group">
                        <label> Click to Filter </label> <br>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <!-- <input type="date" name="to_date" class="form-control"> -->
                    </div>
                </div>
                <div class="col-3">
                    <div class="from-group">
                        <label> Click to Filter </label> <br>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <!-- <input type="date" name="to_date" class="form-control"> -->
                    </div>
                </div>

            </div>
        </form>
    </div>

    <div class="card-body mt-4 p-4">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                         
                            

                             <th>wd_no</th>
                            <th>acc_no</th>
                            <th>acc_no</th>                  
                            <th>wd_amount</th>
                            <th>wd_date</th>
                            <th>description</th>



                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_GET['from_date']) && isset($_GET['to_date'])){

                            $from_date= $_GET['from_date'];
                            $to_date= $_GET['to_date'];
                        
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT  * FROM `withdraw` where wd_date between ' $from_date' and '$to_date' ");
                        while ($row = mysqli_fetch_array($sql)) {
                        
                        ?>


                            <tr>


                                <td><?php echo $row['wd_no']; ?></td>
                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['wd_amount']; ?></td>
                                <td><?php echo $row['wd_date']; ?></td>
                                <td><?php echo $row['description']; ?></td>

                               

                            </tr>

                        <?php
                        }
                    }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>


<?php 



include("includes/footer.php");


?>