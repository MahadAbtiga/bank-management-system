<?php 
include("includes/header.php");
include("includes/navbar.php");
include("includes//topbar.php");
?>


<div class="cantainer">
    <h1 class="text-center text-primary">Report with account table</h1>
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
                        
                        <button type="submit" class="btn btn-primary btn-user">Filter</button>
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
                         
                            

                            <th >acc_no</th>
                            <th >acc_type_no</th>
                            <th>cus_no</th>  
                            <th>balance</th>                
                            <th >register_date</th>
                           
                           



                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if(isset($_GET['from_date']) && isset($_GET['to_date'])){

                            $from_date= $_GET['from_date'];
                            $to_date= $_GET['to_date'];
                        
                        include("includes/conn.php");
                        $sql = mysqli_query($con, "SELECT a.acc_no,ac.type_name,c.cus_name,a.balnce,a.register_date FROM `accounts` a INNER JOIN customer c ON c.cus_no=a.cus_no
                        INNER JOIN account_types ac ON ac.acc_type_no=a.acc_type_no WHERE `register_date` BETWEEN '$from_date' AND '$to_date'  ");
                        while ($row = mysqli_fetch_array($sql)) {
                        
                        ?>


                            <tr>




                                
                                <td><?php echo $row['acc_no']; ?></td>
                                <td><?php echo $row['type_name']; ?></td>
                                <td><?php echo $row['cus_name']; ?></td>
                                <td><?php echo $row['balnce']; ?></td>
                                <td><?php echo $row['register_date']; ?></td>

                            

                               

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