<?php
include 'config/config.php';
$queryMobil = mysqli_query($conn, "SELECT * FROM tbmobil");

$where = ""; // inisialisasi kosong

if (isset($_GET['brand']) && $_GET['brand'] != '') {
    $brand = mysqli_real_escape_string($conn, $_GET['brand']);
    $where = "WHERE brand_mobil = '$brand'";
}

$queryMobil = mysqli_query($conn, "SELECT * FROM tbmobil $where ORDER BY idmobil DESC");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Katalog Mobil</title>
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
                        <a href="cars.php" class="nav-item nav-link active">Katalog</a>
                        <a href="about.php" class="nav-item nav-link">Tentang Kami</a>


                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Halaman Lainnya</a>
                            <div class="dropdown-menu m-0">
                                <a href="recom.php" class="dropdown-item">Rekomendasi Mobil</a>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Katalog</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Halaman Lainnya</a></li>
                <li class="breadcrumb-item text-primary">Katalog</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <br>

    <!-- Car Steps Start -->
    <div class="container-fluid steps py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize text-white mb-3">Proses Sewa<span class="text-primary"> Rentalku</span></h1>
                <p class="mb-0 text-white">3 langkah yang memudahkan anda dalam melakukan sewa mobil di rentalku:
                </p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="steps-item p-4 mb-4">
                        <h4>Pilih mobilnya di web kami</h4>
                        <p class="mb-0">Pilih mobil yang diinginkan, lalu segera booking mobilnya dengan mengisi form yang disediakan pada website.</p>
                        <div class="setps-number">01.</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="steps-item p-4 mb-4">
                        <h4>Tunggu Konfirmasi..</h4>
                        <p class="mb-0">Setelah melakukan pemesanan via web, tunggu balasan konfirmasi dari admin melalui email dan lakukan pembayaran.</p>
                        <div class="setps-number">02.</div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="steps-item p-4 mb-4">
                        <h4>Nikmati Mobilnya!</h4>
                        <p class="mb-0">Setelah dapat konfirmasi, segera datang ke lokasi dealer untuk penjemputan dan pengembalian mobilnya.</p>
                        <div class="setps-number">03.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Car Steps End -->

    <!-- Car categories Start -->
    <div class="container-fluid categories py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Katalog <span class="text-primary">Mobil</span></h1>
                <p class="mb-0">Kami menyediakan rental mobil dari berbagai merek dan model, dengan harga yang kompetitif dan pelayanan yang memuaskan.
                    Mobil yang kami sewakan adalah mobil High-class, dengan kondisi yang prima dan sudah melalui proses perawatan dan disertai dengan kelengkapan surat yang sah.
                </p>
            </div>
            <form method="GET" class="mb-4 text-center">
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-2">
                        <select name="brand" class="form-select">
                            <option value="">-- Tampilkan  --</option>
                            <?php
                            $brandQuery = mysqli_query($conn, "SELECT DISTINCT brand_mobil FROM tbmobil");
                            while ($b = mysqli_fetch_assoc($brandQuery)) {
                                $selected = (isset($_GET['brand']) && $_GET['brand'] === $b['brand_mobil']) ? 'selected' : '';
                                echo "<option value='{$b['brand_mobil']}' $selected>{$b['brand_mobil']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2 mb-2">
                        <button type="submit" class="btn btn-primary w-100">Terapkan</button>
                    </div>
                </div>
            </form>

            <?php while ($row = mysqli_fetch_assoc($queryMobil)) : ?>
                <div class="categories-item p-4">
                    <div class="categories-item-inner">
                        <div class="categories-img rounded-top">
                            <img src="uploads/<?= $row['gambarpath'] ?>" class="img-fluid w-100 rounded-top" alt="<?= $row['nama_mobil'] ?>">
                        </div>
                        <div class="categories-content rounded-bottom p-4">
                            <h4><?= $row['brand_mobil'] ?> <?= $row['nama_mobil'] ?></h4>
                            <div class="categories-review mb-4">
                                <div class="me-3">4.5 Review</div>
                                <div class="d-flex justify-content-center text-secondary">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i><i class="fas fa-star-half-alt text-body"></i>
                                </div>
                            </div>
                            <div class="mb-4">
                                <h4 class="bg-white text-primary rounded-pill py-2 px-4 mb-0">Rp. <?= number_format($row['harga']) ?>/Hari</h4>
                            </div>
                            <div class="mb-3">
                                <p class="text-muted mb-0"><?= $row['isidesk']; ?></p>
                            </div>

                            <a href="index.php#booking" class="btn btn-primary rounded-pill d-flex justify-content-center py-3">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    </div>
    <!-- Car categories End -->

    <!-- Banner Start -->
    <div class="container-fluid banner pb-5 wow zoomInDown" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="banner-item rounded">
                <img src="img/banner-1.jpg" class="img-fluid rounded w-100" alt="">
                <div class="banner-content">
                    <h2 class="text-primary">Segera nikmati mobilnya</h2>
                    <h1 class="text-white">Tertarik untuk menyewa?</h1>
                    <p class="text-white">Jangan ragu, segera pesan mobilnya.</p>
                    <div class="banner-btn">
                        <a href="index.php#booking" class="btn btn-secondary rounded-pill py-3 px-4 px-md-5 me-2">Pesan Sekarang</a>
                        <a href="contact.php" class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2">Kontak Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

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