<?php
session_start();
ob_start();
include("includes/header.php");
include("includes/navbar.php");
include("includes/topbar.php");
include ("includes/conn.php");


?>
    <?php
    include ("includes/conn.php");
    if (isset($_GET['Eid'])) {
        $id = $_GET['Eid'];
        $sql = mysqli_query($con, "SELECT * FROM `deposit` WHERE `dep_no`='$id'");
        $row = mysqli_fetch_assoc($sql);
        
    }
    ?>

    


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
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
                            <input type="text" value="<?php echo $row['dep_amount'];?>" name="dep_amount" id="" class="form-control " placeholder="city name" min="1">
                            <label for="">dep_date</label>
                            <input type="date" value="<?php echo $row['dep_date'];?>" name="dep_date" id="" class="form-control  " placeholder="">
                            <label for="">description</label>
                            <input type="text" value="<?php echo $row['description'];?>" name="description" id="" class="form-control">
                            <button type="submit" name="edit" class="btn btn-info w-50 mt-2 mt-3">UPDATE</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>








    <?php 
        if(isset($_POST['edit'])){
            include ("includes/conn.php");

            $id=$_GET['Eid'];           
            $a=$_POST['ac_n'];
            $dep=$_POST['dep_amount']; 
            $d=$_POST['dep_date'];
            $des=$_POST['description'];

            
            $su="UPDATE `deposit` SET `acc_no`='$a',`dep_amount`='$dep',`dep_date`='$d',`description`='$des' WHERE `dep_no`='$id'";
            $sql=mysqli_query($con,$su);    
        
            header("location: depositTable.php");
            }
    ?>










<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


