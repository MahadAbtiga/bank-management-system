<?php
 include ("includes/conn.php");
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    $sqld = mysqli_query($con, "DELETE FROM `accounts` WHERE `acc_no`='$id'");
    header("location: accountsTable.php");
}
