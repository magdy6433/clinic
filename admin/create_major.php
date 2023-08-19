
<?php

// include "../lib/database.php";
// $sql_major = 'SELECT * FROM `major`';
// $data_major = getAll($sql_major);



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
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/majors/create.php">
                <div class="card-body">
                  <form class="form-group">
                    <label for="exampleInputEmail1">Name </label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                  
                  
                    <?php if(isset($error['name'])): ?>

                      <p class="text-danger"> <?php echo $error['name']; ?> </p>

                      <?php endif ?>

                  </div>
           
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>

      </div><!-- /.container-fluid -->
    </section>




<?php include "inc/footer.php" ?>


