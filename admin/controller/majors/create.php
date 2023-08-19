<?php
require_once("../../validation/validate.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(htmlspecialchars(html_entity_decode($_POST['name'])));
    

    $error['name'] = val_name($name);

    if(empty($error['name'])) {
        require_once("../../../lib/database.php");
        $sql = "INSERT INTO major (`title`) VALUES ('$name')";

        if(mysqli_query($conn,$sql)){
            $_SESSION['sussess_message'] = "major created successfully";
            header('location: ../../major.php');
        }else{
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
            header("LOCATION:../../create_major.php");
        }

    }

}else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION:../../create_major.php");
}




