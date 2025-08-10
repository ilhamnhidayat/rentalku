<?php
include 'config/config.php';

$query = "SELECT * FROM tbmobil WHERE harga BETWEEN 100000 AND 1000000 ORDER BY harga ASC LIMIT 4";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rentalku - Recommendation</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--Chatbot -->
    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js" defer></script>
    <script src="https://files.bpcontent.cloud/2025/07/04/18/20250704182755-Y04MC24J.js" defer></script>

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid topbar bg-secondary d-none d-xl-block w-100">
        <div class="container">
            <div class="row gx-0 align-items-center" style="height: 45px;">
                <div class="col-lg-6 text-center text-lg-start mb-lg-0">
                    <div class="d-flex flex-wrap">
                        <a href="#" class="text-muted me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                        <a href="https://wa.me/6281295842998" class="text-muted me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+6281295842998</a>
                        <a href="mailto:ilhamnoorhidayat29@gmail.com" class="text-muted me-0"><i class="fas fa-envelope text-primary me-2"></i>ilhamnoorhidayat29@gmail.com</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-end">
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="btn btn-light btn-sm-square rounded-circle me-0"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar sticky-top px-0 px-lg-4 py-2 py-lg-0">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="display-6 text-primary"><i class="fas fa-car-alt me-3"></i></i>Rentalku</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="cars.php" class="nav-item nav-link">Katalog</a>
                        <a href="about.php" class="nav-item nav-link">Tentang Kami</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Halaman Lainnya</a>
                            <div class="dropdown-menu m-0">
                                <a href="recom.php" class="dropdown-item active">Rekomendasi Mobil</a>
                                <a href="contact.php" class="dropdown-item">Kontak</a>
                                <a href="syarat.php" class="dropdown-item">Syarat & Ketentuan</a>
                            </div>
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-primary rounded-pill py-2 px-4">Sewa Mobil</a>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Rekomendasi Mobil</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Halaman Lainnya</a></li>
                <li class="breadcrumb-item active text-primary">Rekomendasi Mobil</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <br>
    
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Rekomendasi mobil di<span class="text-primary"> Rentalku</span> :</h1>
                <p class="mb-0">Jika anda punya dana berkisar dibawah 1 juta, kami memiliki rekomendasi mobil yang cocok untuk anda. Berikut ini merupakan pilihan yang tepat:
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="testimonial-item">
                        <div class="testimonial-quote">
                            <i class="fa fa-quote-right fa-2x"></i>
                        </div>
                        <div class="testimonial-inner p-4">
                            <img src="uploads/<?= $row['gambarpath'] ?>" class="img-fluid" style="max-height:150px; object-fit:cover;" alt="mobil <?= $row['nama_mobil']; ?>">
                            <div class="ms-4">
                                <h4><?= htmlspecialchars($row['brand_mobil']); ?></h4>
                                <p><?= htmlspecialchars($row['nama_mobil']); ?></p>

                                <!-- Bagian harga sewa mobil -->
                                <p class="fw-bold text-primary mb-0">
                                    Rp <?= number_format($row['harga'], 0, ',', '.'); ?> / hari
                                </p>
                            </div>
                        </div>

                        <!-- Bagian deskripsi mobil -->
                        <div class="border-top rounded-bottom p-4">
                            <p class="mb-2">Deskripsi:</p>
                            <p class="mb-0"><?= htmlspecialchars($row['isidesk']); ?></p>
                            <a href="index.php" class="btn btn-outline-primary mt-3 btn-sm">Sewa Sekarang</a>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <div class="footer-item">
                            <h4 class="text-white mb-4">Tentang Kami:</h4>
                            <p class="mb-3">Rentalku adalah solusi sewa mobil terpercaya untuk berbagai kebutuhan Anda — mulai dari perjalanan keluarga, liburan bersama teman, hingga keperluan formal dan profesional.</p>
                        </div>
                        <div class="position-relative">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                            <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">Subscribe</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Akses Cepat:</h4>
                        <a href="cars.php"><i class="fas fa-angle-right me-2"></i> Katalog Mobil</a>
                        <a href="about.php"><i class="fas fa-angle-right me-2"></i> Tentang Kami</a>
                        <a href="recom.php"><i class="fas fa-angle-right me-2"></i> Rekomendasi Mobil</a>
                        <a href="contact.php"><i class="fas fa-angle-right me-2"></i> Kontak</a>
                        <a href="syarat.php"><i class="fas fa-angle-right me-2"></i> Syarat & Ketentuan</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Jadwal Pelayanan Sewa Mobil:</h4>
                        <div class="mb-3">
                            <h6 class="text-muted mb-0">Senin - Minggu:</h6>
                            <p class="text-white mb-0">09.00 sampai 19.00</p>
                        </div>
                        <div class="mb-3">
                            <h6 class="text-muted mb-0">Libur:</h6>
                            <p class="text-white mb-0">Tanggal merah atau hari libur nasional</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="footer-item d-flex flex-column">
                        <h4 class="text-white mb-4">Kontak Kami:</h4>
                        <a href="#"><i class="fa fa-map-marker-alt me-2"></i> Jalan BSD Grand Boulevard, No 345, Tangerang Selatan</a>
                        <a href="mailto:ilhamnoorhidayat29@gmail.com"><i class="fas fa-envelope me-2"></i> ilhamnoorhidayat29@gmail.com</a>
                        <a href="https://wa.me/6281295842998"><i class="fas fa-phone me-2"></i> +6281295842998</a>
                        <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                        <div class="d-flex">
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-facebook-f text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-twitter text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-3" href=""><i class="fab fa-instagram text-white"></i></a>
                            <a class="btn btn-secondary btn-md-square rounded-circle me-0" href=""><i class="fab fa-linkedin-in text-white"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-md-6 text-center text-md-start mb-md-0">
                    <span class="text-body"><a href="#" class="border-bottom text-white"><i class="fas fa-copyright text-light me-2"></i>Rentalku</a>, All right reserved.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>
    <script>
        window.onscroll = function() {
            var backToTopBtn = document.querySelector('.back-to-top');
            if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
                backToTopBtn.style.display = "block";
            } else {
                backToTopBtn.style.display = "none";
            }
        };
        document.querySelector('.back-to-top').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>