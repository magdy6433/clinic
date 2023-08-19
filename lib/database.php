<?php

$conn = mysqli_connect("localhost","root","","clinic");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }

  function getAll($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    $data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row; // Append each row to the $data array
    }
    
    return $data;
}
//read

// function getAll($sql)

//insert

function insertData($table,$data) {
  global $conn;

  $columns = implode(', ', array_keys($data));
  $placeholder = implode(', ', array_fill(0,count($data), '?'));

  $sql = "INSERT INTO $table ($columns) VALUES ($placeholder)";
  $stmt = mysqli_prepare($conn,$$sql);

  if($stmt) {
    
  }



}

function updateDoctor($id, $name, $city, $major_id, $imagePath = null) {
  global $conn;
  
  $name = mysqli_real_escape_string($conn, $name);
  $city = mysqli_real_escape_string($conn, $city);
  $major_id = intval($major_id); // Assuming major_id is an integer
  
  $sql = "UPDATE doctors SET `name` = '$name', `city` = '$city', `major_id` = '$major_id'";
  
  if ($imagePath !== null) {
      $imagePath = mysqli_real_escape_string($conn, $imagePath);
      $sql .= ", `image` = '$imagePath'";
  }
  
  $sql .= " WHERE `id` = '$id' ";
  
  if (mysqli_query($conn, $sql)) {
      return true;
  } else {
      return false;
  }
}
//delete
//update


