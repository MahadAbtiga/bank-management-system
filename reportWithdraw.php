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

                <div class="col-4">
                    <div class="from-group">
                        <label> Click to Filter </label> <br>
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <!-- <input type="date" name="to_date" class="form-control"> -->
                    </div>
                </div>

                <div class="col-4">
                    <div class="from-group">
                        <label> </label> <br>
                        <button type="submit" name="all" class="btn btn-primary">Select All</button>
                        <!-- <input type="date" name="to_date" class="form-control"> -->
                    </div>
                </div>

                <div class="col-4">
                    <div class="from-group">
                        <label> account </label>
                        <input type="text" name="id" class="form-control" value="<?php if (
                            isset($_GET['id'])
                        ) {
                            echo $_GET['id'];
                        } ?>">
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

                        if(isset($_GET['all'])){
                            
                        }

                        if(isset($_GET['from_date']) && isset($_GET['to_date']) || isset($_GET['id'])){

                            $from_date= $_GET['from_date'];
                            $to_date= $_GET['to_date'];
                            $id=$_GET['id'];
                            $sel='SELECT * FROM `withdraw';
                        
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT  * FROM `withdraw` where wd_date between ' $from_date' and '$to_date' or
                        acc_no='$id' ");
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

include("includes/footer.php")
?>

<!-- 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html> -->