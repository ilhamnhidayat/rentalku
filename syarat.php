<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rentalku - Terms of Service</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--Chatbot -->
    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js" defer></script>
    <script src="https://files.bpcontent.cloud/2025/07/04/18/20250704182755-Y04MC24J.js" defer></script>


    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .ketentuan-container {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 16px;
            padding: 20px;
            max-height: calc(2 * 160px);
            /* maksimal 2 baris */
            overflow: hidden;
            animation: fadeIn 1s ease-in-out both;
        }

        .ketentuan-card {
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #ddd;
            padding: 16px;
            height: 140px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            cursor: pointer;
            opacity: 0;
            animation: fadeInCard 0.8s ease forwards;
        }

        .ketentuan-card:nth-child(1) {
            animation-delay: 0.1s;
        }

        .ketentuan-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .ketentuan-card:nth-child(3) {
            animation-delay: 0.3s;
        }

        .ketentuan-card:nth-child(4) {
            animation-delay: 0.4s;
        }

        .ketentuan-card:nth-child(5) {
            animation-delay: 0.5s;
        }

        .ketentuan-card:nth-child(6) {
            animation-delay: 0.6s;
        }

        .ketentuan-card:nth-child(7) {
            animation-delay: 0.7s;
        }

        .ketentuan-card:nth-child(8) {
            animation-delay: 0.8s;
        }

        .ketentuan-card:nth-child(9) {
            animation-delay: 0.9s;
        }

        .ketentuan-card:nth-child(10) {
            animation-delay: 1s;
        }

        .ketentuan-card:nth-child(11) {
            animation-delay: 1.1s;
        }

        .ketentuan-card:nth-child(12) {
            animation-delay: 1.2s;
        }

        .ketentuan-card:nth-child(13) {
            animation-delay: 1.3s;
        }

        .ketentuan-card:nth-child(14) {
            animation-delay: 1.4s;
        }

        .ketentuan-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
            background-color: #f8f9fa;
        }

        .ketentuan-card h6 {
            font-size: 14px;
            font-weight: 500;
            margin: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInCard {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 1200px) {
            .ketentuan-container {
                grid-template-columns: repeat(4, 1fr);
                max-height: none;
            }
        }

        @media (max-width: 768px) {
            .ketentuan-container {
                grid-template-columns: 1fr;
                max-height: none;
            }
        }
    </style>
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
                <a href="" class="navbar-brand p-0">
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
                                <a href="recom.php" class="dropdown-item">Rekomendasi Mobil</a>
                                <a href="contact.php" class="dropdown-item">Kontak</a>
                                <a href="syarat.php" class="dropdown-item active">Syarat & Ketentuan</a>
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
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Syarat & Ketentuan</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Halaman Lainnya</a></li>
                <li class="breadcrumb-item active text-primary">Syarat dan Ketentuan</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Syarat Pendaftaran Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Syarat Menyewa di <span class="text-primary">Rentalku</span></h1>
                <p class="mb-0">Untuk dapat menyewa mobil, yuk pastikan Anda memenuhi syarat berikut sebelum menyewa mobil di Rentalku:</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-user-check fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Usia Minimal 20 Tahun</h5>
                        <p class="mb-0">Penyewa wajib berusia setidaknya 20 tahun saat melakukan pendaftaran.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-id-card fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Identitas Diri</h5>
                        <p class="mb-0">Wajib menyertakan identitas resmi seperti KTP, SIM, atau NPWP yang masih berlaku.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-ban fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Larangan Penggunaan</h5>
                        <p class="mb-0">Mobil tidak boleh digunakan untuk balapan liar, tindak kriminal, atau kegiatan politik.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-file-signature fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Tujuan Penggunaan</h5>
                        <p class="mb-0">Harus menyepakati tujuan penggunaan mobil sejak awal masa sewa.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-clock fa-2x"></i>
                        </div>
                        <h5 class="mb-3">Batas Pembayaran</h5>
                        <p class="mb-0">Pembayaran dilakukan paling lambat 1x24 jam setelah pemesanan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item p-4">
                        <div class="service-icon mb-4">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <h5 class="mb-3">Kontak WA Aktif</h5>
                        <p class="mb-0">Penyewa wajib memberikan nomor WhatsApp aktif untuk komunikasi selama sewa berlangsung.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Syarat Pendaftaran End -->
    <br>

    <!--KTT New -->
    <div class="container-fluid team py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Ketentuan Menyewa Di <span class="text-primary">Rentalku</span></h1>
                <p class="mb-0">Kalau Anda sudah memenuhi syarat sewa diatas, sekarang pastikan Anda juga memenuhi beberapa ketentuan berikut sebelum menyewa mobil di Rentalku ya:</p>
            </div>
            <div class="row g-4">

                <!-- Card 1 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt1.avif" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Identitas Penyewa</h5>
                            <p>Penyewa wajib membawa dan menitipkan KTP / KK / STNK pada saat jadwal sewa berlangsung</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt2.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Biaya Sewa Supir</h5>
                            <p>Jika ingin menyewa dengan supir, akan dikenakan biaya tambahan sebesar Rp. 200.000</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt3.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Biaya Akomodasi Supir</h5>
                            <p>Makan dan akomodasi supir ditanggung penyewa jika bepergian ke luar kota</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt4.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Denda Refund </h5>
                            <p>Pembatalan sepihak dalam waktu &lt;24jam akan dikenakan biaya 50% dari total sewa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt5.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Kembalikan Mobil Tepat Waktu</h5>
                            <p>Kelebihan waktu pengembalian mobil akan dikenakan charge overtime 20% per hari</p>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt6.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Patuhi Kesepakatan sewa</h5>
                            <p>Melanggar kesepakatan sewa bisa berakibat penarikan kendaraan secara sepihak</p>
                        </div>
                    </div>
                </div>

                <!-- Card 7 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt7.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Dilarang membawa mobil keluar pulau</h5>
                            <p>Rentalku hanya memperbolehkan penggunaan sewa mobil di area pulau Jawa saja.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 8 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt8.jpeg" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Dilarang Merusak Mobil Yang Disewa</h5>
                            <p>Penyew dilarang merusak fasilitas interior dan eksterior mobil yang disewa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 9 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt9.jpeg" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Dilarang berpolitik</h5>
                            <p>Dilarang menggunakan mobil sebagai alat kegiatan politik</p>
                        </div>
                    </div>
                </div>

                <!-- Card 10 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt10.jpg" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Dilarang Menggadai Mobil</h5>
                            <p>Dilarang menggadaikan mobil sewa kepada pihak ketiga</p>
                        </div>
                    </div>
                </div>

                <!-- Card 11 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt11.jpg" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Pengembalian Max 3 Jam</h5>
                            <p>Mengembalikan mobil paling lambat 3 jam setelah waktu sewa habis</p>
                        </div>
                    </div>
                </div>

                <!-- Card 12 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt12.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Kembalikan Mobil Dengan Baik</h5>
                            <p>Wajib mengembalikan mobil dalam keadaan tidak rusak</p>
                        </div>
                    </div>
                </div>

                <!-- Card 13 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt13.png" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Ganti Rugi Kerusakan Yang Terjadi</h5>
                            <p>Kerusakan akibat kelalaian ditanggung oleh penyewa</p>
                        </div>
                    </div>
                </div>

                <!-- Card 14 -->
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item p-4 pt-0">
                        <div class="team-img">
                            <img src="img/ktt14.jpeg" class="img-fluid rounded w-100" alt="Image">
                        </div>
                        <div class="team-content pt-4 text-center">
                            <h5>Gunakan Mobil Dengan Bijak</h5>
                            <p>Penyalahgunaan kendaraan akan diproses secara hukum</p>
                        </div>
                    </div>
                </div>

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

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>