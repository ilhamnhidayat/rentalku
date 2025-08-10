<?php
include 'config/config.php'; 
$queryMobil = mysqli_query($conn, "SELECT * FROM tbmobil WHERE statusmobil='Tersedia'");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rentalku - Sewa Mobil Terpercaya</title>
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!--Chatbot -->
    <script src="https://cdn.botpress.cloud/webchat/v3.2/inject.js" defer></script>
    <script src="https://files.bpcontent.cloud/2025/07/04/18/20250704182755-Y04MC24J.js" defer></script>

    <!-- Template Stylesheet -->
    <link rel="stylesheet" href="css/style.css">



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
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="cars.php" class="nav-item nav-link">Katalog</a>
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

    <!-- Carousel Start -->
    <div class="header-carousel">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="First slide" />
                    <div class="carousel-caption">
                        <div class="container py-4">
                            <div class="row g-5">
                                <div class="col-lg-6 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="bg-secondary rounded p-5">
                                        <h4 class="text-white mb-4">Segera Pesan Sekarang Sebelum Kehabisan!</h4>
                                        <form method="post" action="proses_sewa.php">
                                            <div class="row g-3">
                                                <div class="col-12">

                                                    <select id="mobil" name="idmobil" class="form-select" required>
                                                        <option disabled selected>-- Pilih Mobil --</option>
                                                        <?php while ($row = mysqli_fetch_assoc($queryMobil)) : ?>
                                                            <option value="<?= $row['idmobil']; ?>" data-harga="<?= $row['harga']; ?>">
                                                                <?= $row['brand_mobil'] . ' - ' . $row['nama_mobil']; ?>
                                                            </option>

                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <input class="form-control" type="text" id="harga" placeholder="Harga per Hari" readonly>
                                                </div>

                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <input class="form-control" name="nama_cust" type="text" placeholder="Nama Lengkap" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <input class="form-control" name="email" type="email" placeholder="Email Anda" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                            <span class="fas fa-calendar-alt"></span><span class="ms-1">Pick Up</span>
                                                        </div>
                                                        <input class="form-control" name="rental_start" type="date">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="input-group">
                                                        <div class="d-flex align-items-center bg-light text-body rounded-start p-2">
                                                            <span class="fas fa-calendar-alt"></span><span class="ms-1">Drop off</span>
                                                        </div>
                                                        <input class="form-control" name="rental_end" type="date">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-light w-100 py-2">Pesan Sekarang</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-lg-flex fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start">
                                        <h1 class="display-5 text-white">Liburan atau urusan kerja? Semua lancar bareng Rentalku!</h1>
                                        <p>Rentalku bukan hanya sekadar layanan, tapi partner perjalanan Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="First slide" />
                    <div class="carousel-caption">
                        <div class="container py-4">
                            <div class="row g-5">
                                <div class="col-lg-6 fadeInLeft animated" data-animation="fadeInLeft" data-delay="1s" style="animation-delay: 1s;">
                                </div>
                                <div class="col-lg-6 d-none d-lg-flex fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="text-start">
                                        <h1 class="display-5 text-white">Jalan-jalan, kerja, atau acara spesial? Semua bisa.</h1>
                                        <p>Setiap perjalanan punya cerita — dan Rentalku jadi bagian penting dalam ceritamu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Features Start -->
    <div class="container-fluid feature py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Kenapa harus <span class="text-primary">Rentalku</span> ? </h1>
                <p class="mb-0">Rentalku merupakan sebuah tempat sewa mobil terpercaya yang sudah melayani banyak konsumen selama lebih dari 5 tahun di Indonesia.
                    Kami memiliki banyak pilihan mobil yang lengkap dan terjamin kualitasnya. Kami juga menawarkan layanan customer service yang profesional dan ramah.
                    Kami siap membantu Anda dalam mencari mobil yang sesuai dengan keinginan anda.
                </p>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-xl-4">
                    <div class="row gy-4 gx-0">
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-trophy fa-2x"></span>
                                </div>
                                <div class="ms-4">
                                    <h5 class="mb-3">Pelayanan Terbaik</h5>
                                    <p class="mb-0">Kami melayani anda sepenuh hati, dan juga layanan customer service kami buka selama 24 jam</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <span class="fa fa-road fa-2x"></span>
                                </div>
                                <div class="ms-4">
                                    <h5 class="mb-3">Bantuan Memandu Perjalanan</h5>
                                    <p class="mb-0">Kami akan senantiasa memandu perjalanan anda jika dibutuhkan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                    <img src="img/features-img.png" class="img-fluid w-100" style="object-fit: cover;" alt="Img">
                </div>
                <div class="col-xl-4">
                    <div class="row gy-4 gx-0">
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="feature-item justify-content-end">
                                <div class="text-end me-4">
                                    <h5 class="mb-3">Kualitas Terjamin</h5>
                                    <p class="mb-0">Mobil yang kami sediakan selalu dalam kondisi terawat dan siap digunakan</p>
                                </div>
                                <div class="feature-icon">
                                    <span class="fa-solid fa-clipboard-check fa-2x"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="feature-item justify-content-end">
                                <div class="text-end me-4">
                                    <h5 class="mb-3">Gratis Antar - Jemput</h5>
                                    <p class="mb-0">Tim kami siap mengantar dan menjemput mobil anda di tempat yang anda inginkan</p>
                                </div>
                                <div class="feature-icon">
                                    <span class="fa fa-map-pin fa-2x"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Proses Sewa Start -->
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
                        <p class="mb-0">Setelah dapat konfirmasi, segera datang ke lokasi dealer untuk penjemputan dan pengembalian mobilnya</p>
                        <div class="setps-number">03.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Proses Sewa End -->
    <br>
    <!-- Testimonial Start -->
    <div class="container-fluid testimonial pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Ulasan terkait<span class="text-primary"> Rentalku</span></h1>
                <p class="mb-0">Apa aja sih kata mereka setelah menggunakan jasa rental mobil di rentalku? Berikut ini merupakan review terakhir yang diterima:
                </p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item">
                    <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="testimonial-inner p-4">
                        <img src="img/testimonial-1.jpg" class="img-fluid" alt="">
                        <div class="ms-4">
                            <h4>Mega Rosmayanti</h4>
                            <p>Guru SMA</p>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top rounded-bottom p-4">
                        <p class="mb-0">Harga sewa mobilnya murce parah sayy, apalagi interior mobilnya ga bau hehehe.</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="testimonial-inner p-4">
                        <img src="img/testimonial-3.jpg" class="img-fluid" alt="">
                        <div class="ms-4">
                            <h4>Kevin Jonathan Lim</h4>
                            <p>General Manager PT. Bank Wakanda</p>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top rounded-bottom p-4">
                        <p class="mb-0">Pelayanannya sangat baik, mobil dalam kondisi terawat dan bersih. Overall Saya sangat puas dengan pelayanan yang diberikan.</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="testimonial-inner p-4">
                        <img src="img/testimonial-2.jpg" class="img-fluid" alt="">
                        <div class="ms-4">
                            <h4>Zara Regina Indira</h4>
                            <p>Digital Marketing</p>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top rounded-bottom p-4">
                        <p class="mb-0">Koleksi mobilnya sedikit, saya pikir perlu ditambahkan lagi unit mobilnya. Tapi saya sangat puas dengan kualitas mobil yang disewakannya.</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="testimonial-inner p-4">
                        <img src="img/ahmad.png" class="img-fluid" alt="">
                        <div class="ms-4">
                            <h4>Ahmad Mujidin</h4>
                            <p>Wirausaha</p>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top rounded-bottom p-4">
                        <p class="mb-0">Mantap mobilnya, dipake sebulan buat mudik ke pelosok ga ada masalah. Top markotop euy </p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="testimonial-inner p-4">
                        <img src="img/simbolon.jpg" class="img-fluid" alt="">
                        <div class="ms-4">
                            <h4>Jeremi Simbolon</h4>
                            <p>Buruh</p>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-body"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top rounded-bottom p-4">
                        <p class="mb-0">Kualitas mobil tahan banting kali nih, dipake semingguan irit bensin</p>
                    </div>
                </div>

                <div class="testimonial-item">
                    <div class="testimonial-quote"><i class="fa fa-quote-right fa-2x"></i>
                    </div>
                    <div class="testimonial-inner p-4">
                        <img src="img/ewing.jpg" class="img-fluid" alt="">
                        <div class="ms-4">
                            <h4>Hujwiriawan Ewing</h4>
                            <p>Youtuber</p>
                            <div class="d-flex text-primary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div class="border-top rounded-bottom p-4">
                        <p class="mb-0">Mobilnya kece banget, sayangnya ga ada partner yang nemenin nyetir sih.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- About Start -->
    <div class="container-fluid overflow-hidden about py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <div class="about-item">
                        <div class="pb-5">
                            <h1 class="display-5 text-capitalize">Apa itu - <span class="text-primary">Rentalku</span> ?</h1>
                            <p class="mb-0">Rentalku adalah solusi sewa mobil terpercaya untuk berbagai kebutuhan Anda — mulai dari perjalanan keluarga, liburan bersama teman, hingga keperluan formal dan profesional.
                                Kami memahami pentingnya kenyamanan dan ketepatan waktu dalam setiap perjalanan. Karena itu, Rentalku hadir dengan layanan yang mudah diakses, transparan, dan fleksibel. Melalui platform web kami, Anda bisa memesan mobil kapan saja dengan pilihan armada yang beragam dan terawat.
                                Dengan dukungan tim profesional dan sistem pemesanan yang user-friendly, kami berkomitmen memberikan pengalaman sewa mobil yang praktis, aman, dan memuaskan.
                                Rentalku bukan sekadar layanan, tapi partner perjalanan Anda.
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="about-item-inner border p-4">
                                    <div class="about-icon mb-4">
                                        <img src="img/visionlamp.png" class="img-fluid w-50 h-50" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">Visi Kita:</h5>
                                    <p class="mb-0">Kami ingin menjadi partner perjalanan anda.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-item-inner border p-4">
                                    <div class="about-icon mb-4">
                                        <img src="img/about-icon-2.png" class="img-fluid h-50 w-50" alt="Icon">
                                    </div>
                                    <h5 class="mb-3">Misi Kita:</h5>
                                    <p class="mb-0">Kami ingin memberikan pengalaman sewa mobil yang memuaskan.</p>
                                </div>
                            </div>
                        </div>
                        <p class="text-item my-4">Rentalku bukan hanya sekedar layanan, tapi partner perjalanan Anda.</p>
                        </p>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="text-center rounded bg-secondary p-4">
                                    <h1 class="display-6 text-white">5</h1>
                                    <h5 class="text-light mb-0">Tahun Beroperasi</h5>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="rounded">
                                    <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Layanan Customer Service 24 Jam</p>
                                    <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Lokasi yang strategis dan mudah dijangkau</p>
                                    <p class="mb-2"><i class="fa fa-check-circle text-primary me-1"></i> Kondisi mobil terawat dan siap pakai</p>
                                    <p class="mb-0"><i class="fa fa-check-circle text-primary me-1"></i> Siap membantu Anda dalam setiap kebutuhan</p>
                                </div>
                            </div>
                            <div class="col-lg-5 d-flex align-items-center">
                                <a href="about.php" class="btn btn-primary rounded py-3 px-5">Lihat lebih lanjut</a>
                            </div>
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center">
                                    <img src="img/fotofounder.jpg" class="img-fluid rounded-circle border border-4 border-secondary" style="width: 100px; height: 100px;" alt="Image">
                                    <div class="ms-4">
                                        <h4>Ilham Noor Hidayat</h4>
                                        <p class="mb-0">Pemilik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="about-img">
                        <div class="img-1">
                            <img src="img/about-img.jpg" class="img-fluid rounded h-100 w-100" alt="">
                        </div>
                        <div class="img-2">
                            <img src="img/about-img-1.jpg" class="img-fluid rounded w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Counter -->
    <div class="container-fluid counter bg-secondary py-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-thumbs-up fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">500</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Happy Clients</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-car-alt fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold" data-toggle="counter-up">10</span>
                            <span class="h1 fw-bold text-white">+</span>
                        </div>
                        <h4 class="text-white mb-0">Pilihan Mobil</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-building fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="text-white fs-2 fw-bold">Pusat kota</span>
                        </div>
                        <h4 class="text-white mb-0">Lokasi Rental Strategis</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="counter-item text-center">
                        <div class="counter-item-icon mx-auto">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <div class="counter-counting my-3">
                            <span class="h1 fw-bold text-white" data-toggle="counter-up">24 </span>
                            <span class="text-white fs-2 fw-bold"> Jam</span>
                        </div>
                        <h4 class="text-white mb-0">Pelayanan </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Counter -->

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
            <div class="text-center mt-4 wow fadeInUp" data-wow-delay="0.7s">
                <a href="syarat.php" class="btn btn-danger px-4 py-2 rounded-pill">
                    Lihat Syarat dan Kebijakan
                </a>
            </div>
        </div>
    </div>
    <!-- Syarat Pendaftaran End -->


    <!-- Car categories Start -->
    <div class="container-fluid categories pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 800px;">
                <h1 class="display-5 text-capitalize mb-3">Kategori <span class="text-primary">Mobil</span> :</h1>
                <p class="mb-0">Kami menyediakan berbagai pilihan mobil untuk keperluan Anda, mulai dari perjalanan keluarga hingga kegiatan bisnis. Rentalku menghadirkan mobil tipe SUV, MPV, dan Sedan yang nyaman, bersih, dan terawat.
                    Cocok untuk perjalanan jarak jauh, antar kota, atau sekadar mobilitas harian di dalam kota. Dengan layanan yang mudah, harga terjangkau, dan pilihan kendaraan berkualitas.
                    Rentalku siap menjadi solusi transportasi terbaik Anda.
                </p>
            </div>
            <div class="container-fluid py-5 wow zoomIn" data-wow-delay="0.2s">
                <div class="container">
                    <div class="bg-light rounded p-5">
                        <div class="row align-items-center g-4">
                            <!-- Text -->
                            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.3s">
                                <h4 class="text-primary">Temukan Mobil Impianmu</h4>
                                <h2 class="mb-3">Mobil Nyaman, Perjalanan Aman</h2>
                                <p class="mb-4">Pilih mobil terbaik dari koleksi kami. Kami hadir untuk memenuhi kebutuhan perjalananmu, dari mobil ternyaman hingga mobil listrik mewah.</p>
                                <a href="cars.php" class="btn btn-primary rounded-pill px-4 py-2">Lihat Katalog Mobil</a>
                                <a href="recom.php" class="btn btn-primary rounded-pill px-4 py-2">Lihat rekomendasi mobil kami</a>
                            </div>
                            <!-- Image -->
                            <div class="col-lg-6 text-center wow fadeInRight" data-wow-delay="0.5s">
                                <img src="uploads\bannershowroom.jpg" class="img-fluid rounded" alt="Mobil Unggulan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Car categories End -->



        <br>

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
                            <a href="index.php" class="btn btn-secondary rounded-pill py-3 px-4 px-md-5 me-2">Pesan Sekarang</a>
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
                            <a href="ilhamnoorhidayat29@gmail.com"><i class="fas fa-envelope me-2"></i> ilhamnoorhidayat29@gmail.com</a>
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

        <script>
            const mobilSelect = document.getElementById('mobil');
            const hargaInput = document.getElementById('harga');

            mobilSelect.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const harga = selected.dataset.harga;
                hargaInput.value = 'Rp ' + parseInt(harga).toLocaleString('id-ID');
            });
        </script>

        <?php
        if (isset($_GET['status']) && $_GET['status'] == 'sukses') {
            echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Pemesanan berhasil dilakukan!',
            showConfirmButton: false,
            timer: 2000
        });
    </script>";
        } elseif (isset($_GET['status']) && $_GET['status'] == 'gagal') {
            echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: 'Terjadi kesalahan saat memproses pesanan.',
            showConfirmButton: false,
            timer: 2000
        });
    </script>";
        }
        ?>


</body>

</html>