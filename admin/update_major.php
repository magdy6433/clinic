
<?php

session_start();
include "../lib/database.php";
if(isset($_GET['id'])) {
  $id = $_GET["id"];

  $sql_major = "SELECT * FROM major WHERE id = $id";
  if ($result1=mysqli_query($conn,  $sql_major)){
    $majorData = mysqli_fetch_assoc($result1);
  }
}

?>

<?php include "inc/header.php" ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit major Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit major Page</li>
            </ol>
          </div>
        </div>
        
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="controller/majors/update.php">
                <div class="card-body">
                  <form class="form-group">
                    <label>Name </label>
                    <input type="text" name="name"  class="form-control" value="<?php echo isset($majorData['title']) ? $majorData['title'] : ''; ?>"  placeholder="Enter name">
                  
                    <input type="hidden" name="id"  class="form-control" value="<?php echo  $majorData['id']; ?>"  placeholder="Enter name">

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


