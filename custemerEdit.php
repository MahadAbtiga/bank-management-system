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
if(isset($_GET['Eid'])){
  $id=$_GET['Eid'];
  $sql = mysqli_query($con,"SELECT * FROM `customer`
inner join address on address.add_no = customer.add_no
WHERE `cus_no`='$id'");


  
  $row=mysqli_fetch_array($sql);
}
?>

    


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <form action="" method="post">
                            <label for="">cus_name</label>
                            <input type="text" value="<?php echo $row['cus_name'];?>"  name="cus_name" id="" class="form-control " placeholder="address name">
                            <label for="">Tell</label>
                            <input type="text" value="<?php echo $row['tell'];?>" name="tell" id="" class="form-control " placeholder="city name">
                            <label for="">sex</label>
                            <select name="sex"   id="" class="form-select ">
                                
                            <option><?php echo $row['sex'];?></option>
                                <option>female</option>
                                <option>male</option>
                            </select>
                            
                            <label for="">add_no</label>
                            <?php 
                                $s=mysqli_query($con,"SELECT * FROM address");
                            ?>
                            <select name="add_no" id="" class="form-select ">
                                <option value="<?php echo  $row['add_no'] ?>"> <?php echo  $row['Add_Name'] ?>  </option>
                               <?php 
                                    while($r = mysqli_fetch_array($s)){                                 
                               ?> 
                        
                               <option value="<?php echo $r['add_no'];?>"> <?php echo $r['Add_Name'];?> </option>
                               
                               <?php 
                                    }
                               ?>
                            </select>

                            <label for="">birthday</label>
                            <input type="date" value="<?php echo $row['Birth_date'];?>" name="Birth_date" id="" class="form-control">
                            <label for="">passport</label>
                            <input type="text" value="<?php echo $row['passport'];?>" name="passport" id="" class="form-control">
                            <label for="">email</label>
                            <input type="text" value="<?php echo $row['email'];?>" name="email" id="" class="form-control">
                            <button type="submit" name="saveData" class="btn btn-info w-50">UPDATE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>








    <?php 
        if(isset($_POST['saveData'])){
            include ("includes/conn.php");

            $id=$_GET['Eid'];
            
            $s=$_POST['sex'];
            $ad=$_POST['add_no'];

            $c=$_POST['cus_name'];
            $t=$_POST['tell'];


            $d=$_POST['Birth_date'];
            $p=$_POST['passport'];
            $e=$_POST['email'];
            //$sq="UPDATE `account_types` SET `type_name`='$n',`description`='$p' WHERE `acc_type_no`='$id'";
            $su="UPDATE `customer` SET `cus_name`='$c',`tell`='$t',`sex`='$s',`Birth_date`='$d',`passport`='$p',`add_no`='$ad',`email`='$e' WHERE `cus_no`='$id'";
            $sql=mysqli_query($con,$su);
            header("location: custemerTable.php");
            }
    ?>










<?php
include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


