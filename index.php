<?php 
    include 'admin/inc/koneksi.php';

    // get type
    $queryT = mysqli_query($conn, "SELECT * FROM types 
        ORDER BY type_name ASC");

    $rowsT = mysqli_fetch_all($queryT, MYSQLI_ASSOC);

    // get skill
    $queryS = mysqli_query($conn, "SELECT * FROM skills 
        ORDER BY skill_name ASC");

    $rowsS = mysqli_fetch_all($queryS, MYSQLI_ASSOC);

    // get Service
    $querySe = mysqli_query($conn, "SELECT * FROM services 
            ORDER BY service_name ASC");
    $rowsSe = mysqli_fetch_all($querySe, MYSQLI_ASSOC);

    // get Portfolio
    $queryP = mysqli_query($conn, "SELECT p.*, t.type_name  FROM projects p LEFT JOIN types t ON p.id_type = t.id
            ORDER BY project_name ASC");
    $rowsP = mysqli_fetch_all($queryP, MYSQLI_ASSOC);

    // get Experience
    $queryEx = mysqli_query($conn, "SELECT * FROM experiences 
            ORDER BY experience_name ASC");
    $rowsEx = mysqli_fetch_all($queryEx, MYSQLI_ASSOC);

    // get Education
    $queryEd = mysqli_query($conn, "SELECT * FROM educations 
            ORDER BY education_name ASC");
    $rowsEd = mysqli_fetch_all($queryEd, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Resume Fachran Sandi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Resume Website Template Free Download" name="keywords">
    <meta content="Resume Website Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
    .mapouter {
        position: relative;
        text-align: right;
        width: 100%;
        height: 500px;
    }

    .gmap_canvas {
        overflow: hidden;
        background: none !important;
        width: 100%;
        height: 500px;
    }

    .gmap_canvas iframe {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .mapouter {
            height: 300px;
        }
        .gmap_canvas {
            height: 300px;
        }
    }
</style>


</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <div class="wrapper">
        <?php include 'inc/sidebar.php'; ?>
        <div class="content">
            <!-- Header Start -->
            <div class="header" id="header">
                <div class="content-inner">
                    <p>Hi,</p>
                    <h1>Fachran Sandi</h1>
                    <h2></h2>
                    <div class="typed-text">Web Designer, Web Developer, FrontEnd Developer, BackEnd Developer</div>
                </div>
            </div>
            <!-- Header End -->

            <!-- Large Button Start -->
            <div class="large-btn">
                <div class="content-inner">
                    <!-- <a class="btn" href="#"><i class="fa fa-download"></i>Resume</a>
                    <a class="btn" href="#"><i class="fa fa-hands-helping"></i>Hire Me</a> -->
                </div>
            </div>
            <!-- Large Button End -->

            <!-- About Start -->
            <div class="about" id="about">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Tentang Saya</h2>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 col-lg-5">
                            <img src="img/about.jpg" alt="Image">
                        </div>
                        <div class="col-md-6 col-lg-7">
                            <p>
                            Pengembangan Aplikasi Web fullstack, frontend, & backend. Saya selalu tertarik pada tantangan baru dan menikmati bekerja dalam tim untuk menciptakan solusi yang inovatif.
                            </p>
                            <a class="btn" href="#">Hire Me</a>
                        </div>
                    </div>
                    <div class="row"> 
                        <?php foreach ($rowsS as $rowS) : ?>
                            <div class="col-md-6">
                                <div class="skills">
                                    <div class="skill-name">
                                        <p>
                                            <?php echo $rowS['skill_name'] ?>
                                        </p>
                                        <p>
                                            <?php echo $rowS['level'] ?>%
                                        </p>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $rowS['level'] ?>" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- About End -->

            <!-- Education Start -->
            <div class="education" id="education">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Pendidikan</h2>
                    </div>
                    <div class="row align-items-center">
                        <?php foreach ($rowsEd as $rowEd) : ?>
                            <div class="col-md-6">
                                <div class="edu-col">
                                    <span>
                                        <?php echo date("d-M-Y", strtotime($rowEd['start_date'])) ?>
                                        <i>to</i> 
                                        <?php echo date("d-M-Y", strtotime($rowEd['finish_date'])) ?>
                                    </span>
                                    <h3><?php echo $rowEd['education_name'] ?></h3>
                                    <p><?php echo $rowEd['content'] ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- Education Start -->

            <!-- Experience Start -->
            <div class="experience" id="experience">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Pengalaman</h2>
                    </div>
                    <div class="row align-items-center">
                        <?php foreach ($rowsEx as $rowEx) : ?>
                            <div class="col-md-6">
                                <div class="exp-col">
                                    <span>
                                        <?php echo date("d-M-Y", strtotime($rowEx['start_date'])) ?>
                                        <i>to</i> 
                                        <?php echo date("d-M-Y", strtotime($rowEx['finish_date'])) ?>
                                    </span>
                                    <h3><?= $rowEx['experience_name'] ?></h3>
                                    <h4><?= $rowEx['position'] ?></h4>
                                    <h5><?= $rowEx['location'] ?></h5>
                                    <p><?= $rowEx['content'] ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- Experience Start -->

            <!-- Service Start -->
            <div class="service" id="service">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Servis</h2>
                    </div>
                    <div class="row align-items-center">
                        <?php foreach ($rowsSe as $rowSe) : ?>
                            <div class="col-md-6">
                                <div class="srv-col">
                                    <i class="fa <?= $rowSe['icon'] ?>"></i>
                                    <h3><?= $rowSe['service_name'] ?></h3>
                                    <p><?= $rowSe['description'] ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
            <!-- Service Start -->

            <!-- Portfolio Start -->
            <div class="portfolio" id="portfolio">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Portfolio</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">All</li>
                                <?php foreach ($rowsT as $rowT) : ?>
                                    <li data-filter=".<?= $rowT['id'] ?>"><?= $rowT['type_name'] ?></li>
                                <?php endforeach ?>                           
                            </ul>
                        </div>
                    </div>
                    <div class="row portfolio-container">
                        <?php foreach ($rowsP as $rowP) : ?>
                            <div class="col-lg-4 col-md-6 portfolio-item <?= $rowP['id_type'] ?>">
                                <div class="portfolio-wrap">
                                    <figure>
                                        <img src="admin/assets/uploads/<?= $rowP['photo'] ?>" class="img-fluid" alt="">
                                        <a href="admin/assets/uploads/<?= $rowP['photo'] ?>" class="link-preview" data-lightbox="portfolio"
                                            data-title="<?= $rowP['project_name'] ?>" title="Preview"><i class="fa fa-eye"></i></a>
                                        <a href="<?= $rowP['link_repository'] ?>" class="link-details" title="More Details" target="_blank" rel="noopener noreferrer"><i class="fa fa-link"></i></a>
                                        <a class="portfolio-title" href="#"><?= $rowP['project_name'] ?> <span><?= $rowP['type_name'] ?></span></a>
                                    </figure>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
            <!-- Portfolio Start -->

            <!-- Review Start -->
            <!-- <div class="review" id="review">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Ulasan</h2>
                    </div>
                    <div class="row align-items-center review-slider">
                        <div class="col-md-12">
                            <div class="review-slider-item">
                                <div class="review-text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci.
                                        Donec molestie velit id libero blandit, quis suscipit urna suscipit. Donec
                                        aliquet erat eu lacinia iaculis. Ut tempor tellus eu sem pharetra feugiat.
                                    </p>
                                </div>
                                <div class="review-img">
                                    <img src="img/review-1.jpg" alt="Image">
                                    <div class="review-name">
                                        <h3>Client Name</h3>
                                        <p>Profession</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="review-slider-item">
                                <div class="review-text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci.
                                        Donec molestie velit id libero blandit, quis suscipit urna suscipit. Donec
                                        aliquet erat eu lacinia iaculis. Ut tempor tellus eu sem pharetra feugiat.
                                    </p>
                                </div>
                                <div class="review-img">
                                    <img src="img/review-2.jpg" alt="Image">
                                    <div class="review-name">
                                        <h3>Client Name</h3>
                                        <p>Profession</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="review-slider-item">
                                <div class="review-text">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci.
                                        Donec molestie velit id libero blandit, quis suscipit urna suscipit. Donec
                                        aliquet erat eu lacinia iaculis. Ut tempor tellus eu sem pharetra feugiat.
                                    </p>
                                </div>
                                <div class="review-img">
                                    <img src="img/review-3.jpg" alt="Image">
                                    <div class="review-name">
                                        <h3>Client Name</h3>
                                        <p>Profession</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Review End -->

            <!-- Contact Start -->
            <div class="contact" id="contact">
                <div class="content-inner">
                    <div class="content-header">
                        <h2>Kontak</h2>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="contact-info">
                                <p><i class="fa fa-user"></i>Fachran Sandi</p>
                                <p><i class="fa fa-tag"></i>Web Designer & Developer</p>
                                <p><i class="fa fa-envelope"></i><a href="mailto:fachransandi@gmail.com">fachransandi@gmail.com</a>
                                </p>
                                <p><i class="fa fa-phone"></i><a href="tel:+6281398688964">+62-813-9868-8964</a></p>
                                <p><i class="fa fa-map-marker"></i>56 Basuki, Cipayung, Jakarta, Indonesia</p>
                                <div class="social">
                                    <a class="btn" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn" href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a class="btn" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn" href=""><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- <div class="form">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" placeholder="Your Name" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" class="form-control" placeholder="Your Email" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject" />
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="5" placeholder="Message"></textarea>
                                    </div>
                                    <div><button class="btn" type="submit">Send Message</button></div>
                                </form>
                            </div> -->
                            <!-- google maps -->
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="600" height="500" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=Cilangkap,%20Jakarta&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->

            <!-- Footer Start -->
            <div class="footer">
                <div class="content-inner">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p>&copy; Copyright <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                        </div>
                        <div class="col-md-6">
                            <p>Powered by <a href="https://htmlcodex.com">HTML Codex</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Start -->
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>
    <script src="lib/typed/typed.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>