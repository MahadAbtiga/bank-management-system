
        <?php
        include ("includes/conn.php");
        if (isset($_GET['did'])) {
            $id = $_GET['did'];
            $sdel = mysqli_query(
                $con,
                "DELETE FROM account_types WHERE acc_type_no='$id'"
            );
            
            header('location: account_type_table.php');
            ob_end_flush();
        }


?>
