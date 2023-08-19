<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(htmlspecialchars(html_entity_decode($_POST['name'])));
    $email = trim(htmlspecialchars(html_entity_decode($_POST['email'])));
    $phone = trim(htmlspecialchars(html_entity_decode($_POST['phone'])));

    $errors = array(
        'name' => validateName($name),
        'email' => validateEmail($email),
        'phone' => validatePhone($phone)
    );

    if (empty(array_filter($errors))) {
        require_once("../../../lib/database.php");
        $sql = "INSERT INTO booking (name, email, phone) VALUES ('$name', '$email', '$phone')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "Booking created successfully";
            header('location: ../../doctors/doctor.php');
        } else {
            $_SESSION['error_message'] = "Error: " . mysqli_error($conn);
            header("LOCATION: booking.php");
        }
    } else {
        $_SESSION['validation_errors'] = $errors;
        header("LOCATION: booking.php");
    }
} else {
    $_SESSION['method_error'] = "Invalid method";
    header("LOCATION: ../../booking.php");
}

function validateEmail($email): ?string
{
    if (empty($email)) {
        return "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    } elseif (strlen($email) > 255) {
        return "Email must not exceed 255 characters";
    }
    return null;
}

function validatePhone($phone): ?string
{
    if (empty($phone)) {
        return "Phone is required";
    } elseif (strlen($phone) != 11) {
        return "Phone number must be 11 digits long";
    }
    return null;
}

function validateName($name): ?string
{
    if (empty($name)) {
        return "Name is required";
    } elseif (!is_string($name) || is_numeric($name)) {
        return "Name must be text";
    } elseif (strlen($name) > 255) {
        return "Name must not exceed 255 characters";
    }
    return null;
}
?>
