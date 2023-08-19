<?php
session_start();
require_once("../../../lib/database.php");

$id = $_POST['id'];
$name = trim(htmlspecialchars(html_entity_decode($_POST['name'])));
$city = trim(htmlspecialchars(html_entity_decode($_POST['city'])));
$image = $_FILES['image'];
$major_id = $_POST['major_id'];

// Validate and handle image upload here
$imagePath = "images/".$image['name'];
        move_uploaded_file($image['tmp_name'], $imagePath);
if (updateDoctor($id, $name, $city, $major_id, $imagePath)) {
    $_SESSION['success_message'] = "Doctor updated successfully";
    header('location: ../../doctors.php');
} else {
    $_SESSION['error_message'] = "Error updating doctor: " . mysqli_error($conn);
    header("LOCATION: ../../edit_doctor.php?id=$id");
}
?>
