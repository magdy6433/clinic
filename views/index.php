<?php
include "../lib/database.php"; // Include the database connection code
$sql_major = 'SELECT * FROM `major`';
$data_major = getAll($sql_major);


$sql_doctor = 'SELECT doctors.*, major.title AS major_title
               FROM doctors
               INNER JOIN major ON doctors.major_id = major.id';

$data_doctor = getAll($sql_doctor);
?>

<?php include "../inc/header.php" ?>
<?php include "../inc/nav.php" ?>
        <div class="container-fluid bg-blue text-white pt-3">
            <div class="container pb-5">
                <div class="row gap-2">
                    <div class="col-sm order-sm-2">
                        <img src="../design/front/assets/images/banner.jpg" class="img-fluid banner-img banner-img" alt="banner-image"
                            height="200">
                    </div>
                    <div class="col-sm order-sm-1">
                        <h1 class="h1">Have a Medical Question?</h1>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                            laborum
                            saepe
                            enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis
                            consequatur
                            cum
                            iure
                            quod facere.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 class="h1 fw-bold text-center my-4">majors</h2>
            <div class="d-flex flex-wrap gap-4 justify-content-center">
        

            <?php foreach($data_major as $value): ?>
            <div class="col-md-4 mb-4">
                <div class="card p-2" style="width: 18rem;">
                    <img src="../design/front/assets/images/<?php echo $value['image']; ?>" class="card-img-top rounded-circle card-image-circle"
                        alt="<?php echo $value['title']; ?>">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?php echo $value['title']; ?></h4>
                        <a href="doctors/index.php" class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
              
            </div>
            <h2 class="h1 fw-bold text-center my-4">doctors</h2>
            <section class="splide home__slider__doctors mb-5">
                <div class="splide__track ">
                    <ul class="splide__list">
                    <?php foreach($data_doctor as $value): ?>
    <li class="splide__slide">
        <div class="card p-2" style="width: 18rem;">
            <img src="../admin/controller/doctors/<?php echo $value['image']; ?>" alt="image" class="card-img-top rounded-circle card-image-circle"
                alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center"><?php echo $value['name']; ?></h4>
                <h6 class="card-title fw-bold text-center"><?php echo $value['major_title']; ?></h6>
                <a href="doctors/doctor.php" class="btn btn-outline-primary card-button">Book an appointment</a>
            </div>
        </div>
    </li>
<?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </div>
        <div class="banner container d-block d-lg-grid d-md-block d-sm-block">
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                        alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                        alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                        alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="info">
                <div class="info__details">
                    <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                        alt="" width="50" height="50">
                    <h4 class="title m-0">
                        everything you need is found at VCare.
                    </h4>
                    <p class="content">
                        search for a doctor and book an appointment in a hospital, clinic, home visit or even by phone,
                        you
                        can also order medicine or book a surgery.
                    </p>
                </div>
            </div>
            <div class="bottom--left bottom--content bg-blue text-white">
                <h4 class="title">download the application now</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus facere eveniet in id, quod
                    explicabo minus ut, sint possimus, fuga voluptas. Eius molestias eveniet labore ullam magnam sequi
                    possimus quaerat!</p>
                <div class="app-group">
                    <div class="app"><img
                            src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg"
                            alt="">Google Play</div>
                    <div class="app"><img
                            src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg"
                            alt="">App Store</div>
                </div>
            </div>
            <div class="bottom--right bg-blue text-white">
                <img src="../design/front/assets/images/banner.jpg" class="img-fluid banner-img">
            </div>
        </div>
   
      
            <?php include "../inc/footer.php" ?>