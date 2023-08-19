
<?php

include "../lib/database.php";
$sql_user = 'SELECT * FROM `users`';
$data_user = getAll($sql_user);



?>

<?php include "inc/header.php" ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>users Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">users Page</li>
            </ol>
          </div>
        </div>
       
        <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data_user as $user): ?>
                    <tr>
                      <td><?php echo $user['id']; ?></td>
                      <td><?php echo $user['name']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td><?php echo $user['phone']; ?></td>
                      <td>
                      <a href="update_user.php?id=<?php echo $user['id']; ?>" class="btn btn-warning">Edit</a>
                      <a href="controller/users/delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                      </td>
                    
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

      </div><!-- /.container-fluid -->
    </section>




<?php include "inc/footer.php" ?>


