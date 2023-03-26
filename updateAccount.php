<?php
session_start();
ob_start();
include 'includes/header.php';
include 'includes/navbar.php';
include 'includes/topbar.php';
include 'includes/conn.php';
?>

<?php
include 'includes/conn.php';
if (isset($_GET['Eid'])) {
    $id = $_GET['Eid'];
    //$sql = mysqli_query($con,"SELECT * FROM `accounts` WHERE `acc_no`='$id'");
    $in = "SELECT * FROM `accounts` 
    WHERE acc_no='$id'";
    $sql = mysqli_query($con, $in);
    $row = mysqli_fetch_assoc($sql);
}
?>




<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">



                    <form action="" method="post">

                        <label for="">acc_type_no</label>
                        <?php
                        include 'includes/conn.php';
                        $s = mysqli_query($con, 'SELECT * FROM `account_types`');
                        ?>
                        <select name="acc_type_no" id="" class="form-select ">
                            <?php while ($r = mysqli_fetch_array($s)) { ?>

                                <option value="<?php echo $r['acc_type_no']; ?>"> <?php echo $r['type_name']; ?> </option>

                            <?php } ?>
                        </select>



                        <label for="">cus_no</label>
                        <?php
                        include 'includes/conn.php';
                        $s = mysqli_query($con, 'SELECT * FROM customer');
                        ?>
                        <select name="cu_no" id="" class="form-select ">
                             
                            <?php while ($r = mysqli_fetch_array($s)) { ?>

                                <option value="<?php echo $r['cus_no']; ?>"> <?php echo $r['cus_name']; ?> </option>

                            <?php } ?>
                        </select>

                        <label for="">register_date</label>
                        <input type="date" name="reg" value="<?php echo $row['register_date']; ?>" id="" class="form-control mt-3" placeholder="register date">


                        <label for="">balnce</label>
                        <input type="text" name="bal" value="<?php echo $row['balnce']; ?>" id="" class="form-control mt-3" placeholder="balance">

                        <button type="submit" name="save" class="btn btn-info w-50 mt-2 mt-3">update</button>

                    </form>




                </div>
            </div>
        </div>
    </div>

</div>










<?php if (isset($_POST['save'])) {
    include 'includes/conn.php';
    $id = $_GET['Eid'];

    $acc = $_POST['acc'];
    $amount = $_POST['amount'];
    $data = $_POST['data'];
    $desc = $_POST['desc'];

    $acc = $_POST['acc_type_no'];
    $cu = $_POST['cu_no'];
    $reg = $_POST['reg'];
    $ba = $_POST['bal'];

    $sq = "UPDATE `accounts` SET `acc_type_no`='$acc',`cus_no`='$cu',`register_date`=' $reg',`balnce`='$ba' WHERE `acc_no`='$id'";
    $sql = mysqli_query($con, $sq);
    header('location: tableAcount.php');
} ?>









<?php
include 'includes/script.php';
include 'includes/footer.php';
ob_end_flush();
?>