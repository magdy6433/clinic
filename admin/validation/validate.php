<?php


function val_name($name): ?string 
{

    $error = null;

    if(empty($name)) {
        $error = "name is required";
    }elseif(!is_string($name) || is_numeric($name)) {
        $error = "Name must be text";
    }elseif (strlen($name) > 255) {
        $error = "Name must not exceed 255 characters";
     }
     return $error;
}


function val_email($email): ?string 
{

    $error = null;

    if(empty($email)) {
        $error = "email is required";
    }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = "email is a valid email address";
    }elseif (strlen($name) > 255) {
        $error = "email must not exceed 255 characters";
     }
     return $error;
}


function val_phone($phone): ?string 
{

    $error = null;

    if(empty($phone)) {
        $error = "phone is required";
    }elseif(strlen($phone) != 11) {
        $error = "Phone number must be 11 digits long.";
    }
     return $error;
}



function val_password($password): ?string 
{

    $error = null;
    $passwordLength = strlen($password);
    if(empty($password)) {
        $error = "password is required";
    }elseif(!is_string($name) || is_numeric($name)) {
        $error = "Password must be a combination of letters and numbers";
    }elseif ($passwordLength < 5 || $passwordLength > 255) {
        $error = "Password must be between 5 and 255 characters";
     }
     return $error;
}

function val_city($city): ?string 
{
    $error = null;

    if (empty($city)) {
        $error = "City name is required";
    } elseif (!is_string($city)) {
        // $error = "City name must be text";
    } elseif (strlen($city) > 255) {
        $error = "City name must not exceed 255 characters";
    }
    
    return $error;
}

// function val_image(array $image): ?string 
// {
//     $error = null;
//     $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
//     $typeError = explode("/", $image['type']);
//     $typeFirst = $typeError[0];
//     $sizeBytes = $image['size'];
//     $sizeMb = $sizeBytes / (1024 * 1024);
    
//     if ($image['error'] !== 0) {
//         $error = "Image upload error";
//     } elseif (! in_array($image['type'], $allowedTypes)) {
//         $error = "Unsupported image type";
//     } elseif ($sizeMb > 1) {
//         $error = "Image size must be 1MB or less";
//     }
    
//     return $error;
// }
function val_image(array $image): ?string 
{
    $error = null;
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
    if ($image['error'] !== 0) {
        $error = "Image upload error";
    } else {
        $typeError = explode("/", $image['type']);
        $typeFirst = $typeError[0];
        $sizeBytes = $image['size'];
        $sizeMb = $sizeBytes / (1024 * 1024);
        
        if (!in_array($image['type'], $allowedTypes)) {
            $error = "Unsupported image type";
        } elseif ($sizeMb > 1) {
            $error = "Image size must be 1MB or less";
        }
    }
    
    return $error;
}