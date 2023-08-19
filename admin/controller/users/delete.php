<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    
    if (empty($error['id'])){
        $id = $_GET['id'];
        require_once("../../../lib/database.php");
        $sql = "SELECT id FROM users WHERE `id` = '$id'";
        $check_result = mysqli_query($conn, $sql);

        if ($check_result !== false && mysqli_num_rows($check_result) > 0) {
     
            $delete_sql = "DELETE FROM users WHERE `id` = '$id'";

            if (mysqli_query($conn, $delete_sql)) {
                $_SESSION['success_message'] = "users deleted successfully";
                header('location: ../../users.php');
            } else {
                $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
                header("LOCATION: ../../users.php");
            }
        } else {
            $_SESSION['error_message'] = "user not found";
            header("LOCATION: ../../users.php");
        }

    }

        $_SESSION['success_message'] = "user deleted successfully";

        header("LOCATION: ../../users.php");


}else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION:../../users.php");
}




