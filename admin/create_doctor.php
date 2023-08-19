
<?php
session_start();
include "../lib/database.php";
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
            <h1>Doctor Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Doctor</li>
            </ol>
          </div>
        </div>
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Doctor</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/doctors/create.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">name Doctor</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                    <?php 
                    if(!empty($_SESSION['error']['name'])):?>
                    <p class="text-danger"><?php echo $_SESSION['error']['name']; ?></p>
                    <?php
               
                  endif; ?>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">city Doctor</label>
                    <input type="text" name="city" class="form-control" id="exampleInputEmail1" placeholder="Enter city">
                 <?php
                    if(!empty($_SESSION['error']['city'])):?>
                    <p class="text-danger"><?php echo $_SESSION['error']['city']; ?></p>
                    <?php endif; ?>
                  </div>
                  
                  <div class="form-group">
    <label for="imageInput">Image doctor</label>
    <input type="file" name="image" class="form-control">
    <?php if (!empty($_SESSION['error']['image'])): ?>
        <p class="text-danger"><?php echo $_SESSION['error']['image']; ?></p>
    <?php endif; ?>
</div>
                      </div>

                        <div class="form-group">
                        <label>major Doctors</label>
                        <select class="custom-select" name="major_id">
                          <?php 
                          
                          foreach($data_major as $major):?>
<option value="<?php echo $major['id']; ?>"><?php echo $major['title']; ?></option>

                        <?php endforeach; ?>
                        </select>
                      </div>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

    </div>
    </section>




<?php
unset($_SESSION['error']);

include "inc/footer.php" ?>


