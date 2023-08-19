<?php

session_start();
include "../lib/database.php";

// Initialize the error array
$error = array();

if (isset($_GET['id'])) {
  $id = $_GET["id"];

  $sql_user = "SELECT * FROM users WHERE id = $id";
  if ($result1 = mysqli_query($conn,  $sql_user)) {
    $userData = mysqli_fetch_assoc($result1);
  }
}

?>

<?php include "inc/header.php"; ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit User Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit User Page</li>
          </ol>
        </div>
      </div>
      
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="controller/users/update.php">
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" value="<?php echo isset($userData['name']) ? $userData['name'] : ''; ?>" placeholder="Enter name">

              <?php if (isset($error['name'])): ?>
                <p class="text-danger"><?php echo $error['name']; ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" value="<?php echo isset($userData['email']) ? $userData['email'] : ''; ?>" placeholder="Enter email">

              <?php if (isset($error['email'])): ?>
                <p class="text-danger"><?php echo $error['email']; ?></p>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" name="phone" class="form-control" value="<?php echo isset($userData['phone']) ? $userData['phone'] : ''; ?>" placeholder="Enter phone">

              <?php if (isset($error['phone'])): ?>
                <p class="text-danger"><?php echo $error['phone']; ?></p>
              <?php endif; ?>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
        </form>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<?php include "inc/footer.php"; ?>
