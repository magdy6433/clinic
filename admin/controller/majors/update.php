<?php


require_once("../../validation/validate.php");
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = trim(htmlspecialchars(html_entity_decode($_POST['id'])));
    $name = trim(htmlspecialchars(html_entity_decode($_POST['name'])));

    $error = [];
    $error['name'] = val_name($name);

    if(empty($error['name'])) {
        require_once("../../../lib/database.php");
        $sql = "UPDATE major SET `title` = '$name' WHERE `id` = '$id' ";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "Major updated successfully";
            header('location: ../../major.php?id=' . $id);
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
            header("LOCATION: ../../update_major.php?id=" . $id);
        }

    } else {
        $_SESSION['validation_error'] = $error;
        header("LOCATION: ../../update_major.php?id=" . $id);
    }

}else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION:../../update_major.php");
}
