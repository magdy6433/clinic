
<?php

include "../lib/database.php";

$sql_doctor = 'SELECT * FROM `doctors`';
$data_doctor = getAll($sql_doctor);
$sql_major = 'SELECT id,title FROM `major`';
$data_major = getAll($sql_major);


?>

<?php include "inc/header.php" ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>All Doctors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">doctors Page</li>
            </ol>
          </div>
        </div>
        <a href="create_doctor.php" class="btn btn-primary">create New Doctor</a>
        <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>city</th>
                      <th>image</th>
                      <th>major</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data_doctor as $doctor): ?>
                    <tr>
                      <td><?php echo $doctor['id']; ?></td>
                      <td><?php echo $doctor['name']; ?></td>
                      <td><?php echo $doctor['city']; ?></td>
                      <td>
                        <img src="<?='controller/doctors/'.$doctor["image"];?>" width=100 height=80 alt="">
                      </td>
                    <td>
                      <?php 
                      $doctorMajorId = $doctor['major_id'];
                      foreach($data_major as $major) {
                        if ($major["id"] === $doctorMajorId) {
                          echo $major['title'];
                          break;
                        }
                      }

                      ?>
                      </td>
                      
                      <td>
                      <a href="update_doctor.php?id=<?php echo $doctor['id']; ?>" class="btn btn-warning">Edit</a>
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


