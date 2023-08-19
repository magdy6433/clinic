<?php
session_start();
include "../lib/database.php";
$sql_major = 'SELECT id, title FROM `major`';
$data_major = getAll($sql_major);

$doctorData = array(); // Initialize an empty array for doctorData

if (isset($_GET['id'])) {
    $id = $_GET["id"];

    $sql_doctor = "SELECT * FROM doctors WHERE id = $id";
    $result1 = mysqli_query($conn, $sql_doctor);
    if ($result1) {
        $doctorData = mysqli_fetch_assoc($result1);
    }
}

include "inc/header.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- Content header content here -->
    </section>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Doctor</h3>
        </div>

        <form method="POST" action="controller/doctors/update.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Doctor Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="<?php echo isset($doctorData['name']) ? $doctorData['name'] : ''; ?>" placeholder="Enter name">
                    <?php if (!empty($_SESSION['error']['name'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['error']['name']; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" class="form-control" id="city" value="<?php echo isset($doctorData['city']) ? $doctorData['city'] : ''; ?>" placeholder="Enter city">
                    <?php if (!empty($_SESSION['error']['city'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['error']['city']; ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="form-group">
                    <label for="imageInput">Image</label>
                    <input type="file" name="image" class="form-control">
                    <?php if (!empty($_SESSION['error']['image'])): ?>
                        <p class="text-danger"><?php echo $_SESSION['error']['image']; ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- Hidden field to store the current image filename -->
                <input type="hidden" name="current_image" value="<?php echo isset($doctorData['image']) ? $doctorData['image'] : ''; ?>">
                
                <div class="form-group">
                    <label for="major_id">Major</label>
                    <select class="custom-select" name="major_id">
                        <?php foreach ($data_major as $major): ?>
                            <option value="<?php echo $major['id']; ?>" <?php echo (isset($doctorData['major_id']) && $doctorData['major_id'] == $major['id']) ? 'selected' : ''; ?>>
                                <?php echo $major['title']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>

<?php
// Clear error messages after displaying them
unset($_SESSION['error']);
include "inc/footer.php";
?>
