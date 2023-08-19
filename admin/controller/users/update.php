<?php


require_once("../../validation/validate.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = trim(htmlspecialchars(html_entity_decode($_POST['name'])));
    $email = trim(htmlspecialchars(html_entity_decode($_POST['email'])));
    $phone = trim(htmlspecialchars(html_entity_decode($_POST['phone'])));


    $error = [];
    $error['name'] = val_name($name);

    if(empty($error['name'])) {
        require_once("../../../lib/database.php");
        $sql = "UPDATE users SET `name` = '$name', `email` = '$email',`phone` = '$phone' WHERE `id` = '$id' ";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "user updated successfully";
            header('location: ../../users.php?id=' . $id);
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
            header("LOCATION: ../../update_user.php?id=" . $id);
        }

    } else {
        $_SESSION['validation_error'] = $error;
        header("LOCATION: ../../update_user.php?id=" . $id);
    }

}else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION:../../update_user.php");
}
