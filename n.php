<?php
include("includes/header.php");
include("includes/navbar.php");
include ("includes/conn.php");
ob_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
</head>
<body class="m-auto">
    
    <div class="container">
    <?php
    include ("includes/conn.php");
    if (isset($_GET['Eid'])) {
        $id = $_GET['Eid'];
        $sql = mysqli_query($con, "SELECT * FROM address WHERE add_no=$id");
        $row = mysqli_fetch_assoc($sql);
        //print($row);
    }
    ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                    <form action="" method="post">
                    <label for="">Add_name</label>
                    <input type="text" name="addname"  value="<?php echo $row['Add_Name'];?>" id="" class="form-control " placeholder="address name">
                    <label for="">City name</label>
                    <input type="text" name="cityname"  value="<?php echo $row['city_name'];?>" id="" class="form-control" placeholder="city name">
                    <label for="">District</label>
                    <input type="text" name="District"  value="<?php echo $row['district'];?>" id="" class="form-control" placeholder="city name">
                    <button type="submit" class="btn btn-info w-50 mt-2" name="edit">save</button>
                </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>
</html>






<?php 
        if(isset($_POST['edit'])){
            include("includes/conn.php");
            $id=$_GET['Eid'];
            $a=$_POST['addname'];
            $c=$_POST['cityname'];
            $d=$_POST['District'];
            $upd="UPDATE `address` SET `Add_Name`='$a',`city_name`='$c',`district`='$d' WHERE `add_no`='$id'";
            //$sq="UPDATE `account_types` SET `type_name`='$a',`description`='$c' WHERE `acc_type_no`='$id'";
            $sql=mysqli_query($con,$upd);

            if($sql){
                ob_start();
                header("location: tables.php");
                echo "data is update";
            }else{
                echo "data is not update";
            }
    
        }     

            

            
    ?>



<?php


include("includes/script.php");
include("includes/footer.php");
ob_end_flush();
?>


