<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (empty($error['id'])){
        $id = $_GET['id'];
        require_once("../../../lib/database.php");
        $sql = "SELECT id FROM major WHERE `id` = '$id'";
        $check_result = mysqli_query($conn, $sql);

        if ($check_result !== false && mysqli_num_rows($check_result) > 0) {
     
            $delete_sql = "DELETE FROM major WHERE `id` = '$id'";

            if (mysqli_query($conn, $delete_sql)) {
                $_SESSION['success_message'] = "Major deleted successfully";
                header('location: ../../major.php');
            } else {
                $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
                header("LOCATION: ../../major.php");
            }
        } else {
            $_SESSION['error_message'] = "Major not found";
            header("LOCATION: ../../major.php");
        }

    }

        $_SESSION['success_message'] = "Major deleted successfully";

        header("LOCATION: ../../major.php");


}else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION:../../major.php");
}




