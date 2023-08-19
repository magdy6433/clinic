
<?php

include "../lib/database.php";
$sql_booking = 'SELECT * FROM `booking`';
$data_booking = getAll($sql_booking);



?>

<?php include "inc/header.php" ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Booking Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Booking Page</li>
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
                      <th>name Doctor</th>
                      <th>Actions</th>
                      
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($data_booking as $booking): ?>
                    <tr>
                      <td><?php echo $booking['id']; ?></td>
                      <td><?php echo $booking['name']; ?></td>
                      <td><?php echo $booking['email']; ?></td>
                      <td><?php echo $booking['phone']; ?></td>
                      <td><?php echo $booking['name']; ?></td>
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


