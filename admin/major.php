
<?php

include "../lib/database.php";
$sql_major = 'SELECT * FROM `major`';
$data_major = getAll($sql_major);



?>

<?php include "inc/header.php" ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>major Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">major Page</li>
            </ol>
          </div>
        </div>
        <a href="create_major.php" class="btn btn-primary">create New Major</a>
        <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data_major as $major): ?>
                    <tr>
                      <td><?php echo $major['id']; ?></td>
                      <td><?php echo $major['title']; ?></td>
                      <td>
                      <a href="update_major.php?id=<?php echo $major['id']; ?>" class="btn btn-warning">Edit</a>
                      <a href="controller/majors/delete.php?id=<?php echo $major['id']; ?>" class="btn btn-danger">Delete</a>
                      </td>
                    
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

      </div><!-- /.container-fluid -->
    </section>




<?php include "inc/footer.php" ?>


