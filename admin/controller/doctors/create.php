<?php
require_once("../../validation/validate.php");
session_start();


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(htmlspecialchars(html_entity_decode($_POST['name'])));
    $city = trim(htmlspecialchars(html_entity_decode($_POST['city'])));
    $image = $_FILES['image'];
    $major_id = $_POST['major_id'];

    $error['name'] = val_name($name);
    $error['city'] = val_city($city);
    $error['image'] = val_image($image);

    if(empty(array_filter($error))) {
        require_once("../../../lib/database.php");

        $imagePath = "images/".$image['name'];
        move_uploaded_file($image['tmp_name'], $imagePath);


        $sql = "INSERT INTO `doctors` (`name`,`city`,`image`,`major_id`) VALUES ('$name','$city','$imagePath','$major_id')";
     

        if ( mysqli_query($conn, $sql )) {
            $_SESSION['success_message'] = "Doctor created successfully";
            header('location: ../../doctors.php');
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
           
            header("LOCATION:../../create_doctor.php");
        }

    } else {
        $_SESSION['error'] = $error;
        print_r($_SESSION['error_message']);
        header("LOCATION:../../create_doctor.php");
    }

    

}else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION:../../create_doctor.php");
}




