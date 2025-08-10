<?php
session_start();
include '../config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Hapus Semua Data
if (isset($_POST['hapus_semua'])) {
    // Cek apakah masih ada sewa aktif (Disewa)
    $cekDisewa = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM tbsewa WHERE statussewa = 'Disewa'");
    $hasil = mysqli_fetch_assoc($cekDisewa);

    if ($hasil['jumlah'] > 0) {
        // Gagal hapus karena masih ada yang status 'Disewa'
        $_SESSION['hapus_semua_gagal'] = true;
        header("Location: sewa.php");
        exit;
    }

    // Kalau tidak ada yang 'Disewa', baru hapus semua
    mysqli_query($conn, "DELETE FROM tbsewa");
    mysqli_query($conn, "ALTER TABLE tbsewa AUTO_INCREMENT = 1");
    $_SESSION['hapus_semua_sukses'] = true;
    header("Location: sewa.php");
    exit;
}



// Logika Proses konfirmasi pembayaran (status -> Disewa)
if (isset($_GET['konfirmasi'])) {
    $id = $_GET['konfirmasi'];

    // Ambil data sewa (idmobil, email, nama)
    $q = mysqli_query($conn, "SELECT idmobil, email, nama_cust AS nama FROM tbsewa WHERE idsewa = '$id'");

    if (!$q) {
        die("Query gagal: " . mysqli_error($conn));
    }

    $d = mysqli_fetch_assoc($q);
    $idmobil = $d['idmobil'];
    $email = $d['email'];
    $nama = $d['nama'];

    // Update status sewa & status mobil
    mysqli_query($conn, "UPDATE tbsewa SET statussewa = 'Disewa' WHERE idsewa = '$id'");
    mysqli_query($conn, "UPDATE tbmobil SET statusmobil = 'Tidak Tersedia' WHERE idmobil = '$idmobil'");

    // Kirim email konfirmasi pembayaran
    include 'konfirm.php';

    $_SESSION['konfirmasi'] = true;
    header("Location: sewa.php");
    exit;
}





// Logika button selesai sewa (status -> Selesai, status mobil -> Tersedia)
if (isset($_GET['selesai'])) {
    $id = $_GET['selesai'];

    // Ambil idmobil dari sewa yang selesai
    $q = mysqli_query($conn, "SELECT idmobil FROM tbsewa WHERE idsewa = '$id'");
    $d = mysqli_fetch_assoc($q);
    $idmobil = $d['idmobil'];

    // Update status
    mysqli_query($conn, "UPDATE tbsewa SET statussewa = 'Selesai' WHERE idsewa = '$id'");
    mysqli_query($conn, "UPDATE tbmobil SET statusmobil = 'Tersedia' WHERE idmobil = '$idmobil'");

    $_SESSION['selesai'] = true;
    header("Location: sewa.php");
    exit;
}

// Logika Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $cekStatus = mysqli_query($conn, "SELECT statussewa FROM tbsewa WHERE idsewa = '$id'");
    $dataStatus = mysqli_fetch_assoc($cekStatus);

    if ($dataStatus && $dataStatus['statussewa'] == 'Disewa') {
        $_SESSION['gagal_hapus_sewa'] = true;
        header("Location: sewa.php");
        exit;
    }

    mysqli_query($conn, "DELETE FROM tbsewa WHERE idsewa = '$id'");
    $_SESSION['hapus'] = true;
    header("Location: sewa.php");
    exit;
}





// Proses Edit
if (isset($_POST['simpan_edit'])) {
    $id = $_POST['idsewa'];
    $nama = $_POST['nama_cust'];
    $email = $_POST['email'];
    $start = $_POST['rental_start'];
    $end = $_POST['rental_end'];
    $status = $_POST['statussewa'];

    $getHarga = mysqli_query($conn, "SELECT harga FROM tbmobil m JOIN tbsewa s ON s.idmobil = m.idmobil WHERE s.idsewa = '$id'");
    $h = mysqli_fetch_assoc($getHarga);
    $selisih = (new DateTime($start))->diff(new DateTime($end))->days;
    if ($selisih < 1) $selisih = 1;
    $total = $selisih * (int)$h['harga'];

    mysqli_query($conn, "UPDATE tbsewa SET 
        nama_cust='$nama',
        email='$email',
        rental_start='$start',
        rental_end='$end',
        statussewa='$status',
        harga_total='$total'
        WHERE idsewa='$id'
    ");
    $_SESSION['edit'] = true;
    header("Location: sewa.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sewa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Sidebar highlight + hover */
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff !important;
            font-weight: bold;
            border-radius: 0.375rem;
        }

        .sidebar .nav-link:hover {
            background-color: #e7f1ff;
            color: #0d6efd !important;
            border-radius: 0.375rem;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold text-primary" href="admin.php">Admin Rentalku</a>
            <div class="dropdown ms-auto">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../files/profile.png" alt="Admin" width="32" height="32" class="rounded-circle me-2">
                    <span class="d-none d-sm-inline">Admin</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-small" aria-labelledby="adminDropdown">
                    <li><span class="dropdown-item-text">ADMIN 01</span></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-md-block bg-light sidebar collapse show">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Stock Mobil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="sewa.php">Data Sewa</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
                <h2 class="mt-4">Data Sewa</h2>
                <?php
                $bulan = $_GET['bulan'] ?? '';
                $tahun = $_GET['tahun'] ?? '';
                ?>
                <form method="GET" class="row g-2 mb-3">
                    <div class="col-md-2">
                        <select name="bulan" class="form-select">
                            <option value="">-- Bulan --</option>
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                $selected = ($bulan == $i) ? 'selected' : '';
                                echo "<option value='$i' $selected>" . date('F', mktime(0, 0, 0, $i, 1)) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="tahun" class="form-select">
                            <option value="">-- Tahun --</option>
                            <?php
                            for ($y = 2022; $y <= date('Y'); $y++) {
                                $selected = ($tahun == $y) ? 'selected' : '';
                                echo "<option value='$y' $selected>$y</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>

                <form id="form-hapus-semua" method="POST">
                    <input type="hidden" name="hapus_semua" value="1">
                    <div class="text-end mb-3">
                        <button type="button" id="btnHapusSemua" class="btn btn-danger">Hapus Semua Data</button>
                    </div>
                </form>



                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Customer</th>
                                <th>Email</th>
                                <th>Mobil Disewa</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir</th>
                                <th>Status Sewa</th>
                                <th>Harga Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ini adalah logika untuk menampilkan data sewa berdasarkan tahun atau bulan tertentu
                            $no = 1;
                            $where = "1"; // default true

                            if ($bulan && $tahun) {
                                $where .= " AND MONTH(s.rental_start) = '$bulan' AND YEAR(s.rental_start) = '$tahun'";
                            } elseif ($bulan && !$tahun) {
                                $where .= " AND MONTH(s.rental_start) = '$bulan'";
                            } elseif (!$bulan && $tahun) {
                                $where .= " AND YEAR(s.rental_start) = '$tahun'";
                            }


                            $query = mysqli_query($conn, "
                                SELECT s.*, m.nama_mobil, m.brand_mobil 
                                FROM tbsewa s
                                JOIN tbmobil m ON s.idmobil = m.idmobil
                                WHERE $where
                            ");

                            while ($data = mysqli_fetch_assoc($query)) :
                            ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data['nama_cust'] ?></td>
                                    <td><?= $data['email'] ?></td>
                                    <td><?= $data['brand_mobil'] ?> - <?= $data['nama_mobil'] ?></td>
                                    <td><?= date('d M Y', strtotime($data['rental_start'])) ?></td>
                                    <td><?= date('d M Y', strtotime($data['rental_end'])) ?></td>
                                    <td><?= $data['statussewa'] ?></td>
                                    <td>Rp. <?= $data['harga_total'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['idsewa'] ?>">Edit</button>

                                        <a href="#" class="btn btn-danger btn-sm" onclick="konfirmasiHapus('<?= $data['idsewa'] ?>')">Hapus</a>

                                        <?php if (
                                            $data['statussewa'] == 'Menunggu' ||
                                            $data['statussewa'] == 'Menunggu Pembayaran'
                                        ): ?>
                                            <a href="kirim_email.php?id=<?= $data['idsewa'] ?>" class="btn btn-info btn-sm">Kirim Email</a>
                                            <a href="tolak_email.php?id=<?= $data['idsewa'] ?>" class="btn btn-dark btn-sm btn-tolak">Tolak</a>
                                        <?php endif; ?>

                                        <?php if (
                                            $data['statussewa'] == 'Menunggu Pembayaran'
                                        ): ?>
                                            <a href="sewa.php?konfirmasi=<?= $data['idsewa'] ?>" class="btn btn-success btn-sm">Konfirmasi</a>


                                        <?php endif; ?>

                                        <?php if ($data['statussewa'] === 'Disewa') : ?>
                                            <a href="sewa.php?selesai=<?= $data['idsewa']; ?>" class="btn btn-primary btn-sm btn-selesai" data-id="<?= $data['idsewa']; ?>">Selesai</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endwhile;
                            ?>
                        </tbody>
                        <tfoot>
                            <!-- Logika ini digunakan untuk menampilkan total profit dari data sewa yang telah dipilih. -->
                            <tr>
                                <th colspan="7" class="text-end">Total Profit</th>
                                <th colspan="2">
                                    <?php
                                    $whereProfit = "WHERE statussewa IN ('Disewa', 'Selesai')";

                                    if ($bulan && $tahun) {
                                        $whereProfit .= " AND MONTH(rental_start) = '$bulan' AND YEAR(rental_start) = '$tahun'";
                                    } elseif ($bulan && !$tahun) {
                                        $whereProfit .= " AND MONTH(rental_start) = '$bulan'";
                                    } elseif (!$bulan && $tahun) {
                                        $whereProfit .= " AND YEAR(rental_start) = '$tahun'";
                                    }

                                    $queryProfit = mysqli_query($conn, "SELECT SUM(harga_total) AS total_profit FROM tbsewa $whereProfit");
                                    $profitData = mysqli_fetch_assoc($queryProfit);
                                    $totalProfit = $profitData['total_profit'] ?? 0;
                                    echo 'Rp. ' . number_format($totalProfit, 0, ',', '.');
                                    ?>

                                </th>
                            </tr>
                        </tfoot>
                    </table>

                    </tbody>
                    </table>
                </div>
                <!-- Modal Edit -->
                <?php
                $query2 = mysqli_query($conn, "
                    SELECT s.*, m.nama_mobil, m.brand_mobil 
                    FROM tbsewa s
                    JOIN tbmobil m ON s.idmobil = m.idmobil
                    WHERE $where
                ");

                while ($row = mysqli_fetch_assoc($query2)):
                ?>
                    <div class="modal fade" id="editModal<?= $row['idsewa'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $row['idsewa'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="POST" action="sewa.php">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Sewa - <?= $row['nama_cust'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="idsewa" value="<?= $row['idsewa'] ?>">
                                        <label>Nama</label>
                                        <input type="text" name="nama_cust" class="form-control mb-2" value="<?= $row['nama_cust'] ?>" required>
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control mb-2" value="<?= $row['email'] ?>" required>
                                        <label>Tanggal Mulai</label>
                                        <input type="date" name="rental_start" class="form-control mb-2" value="<?= $row['rental_start'] ?>" required>
                                        <label>Tanggal Selesai</label>
                                        <input type="date" name="rental_end" class="form-control mb-2" value="<?= $row['rental_end'] ?>" required>
                                        <label>Status</label>
                                        <select name="statussewa" class="form-control">
                                            <option <?= $row['statussewa'] == 'Menunggu' ? 'selected' : '' ?>>Menunggu</option>
                                            <option <?= $row['statussewa'] == 'Menunggu Pembayaran' ? 'selected' : '' ?>>Menunggu Pembayaran</option>
                                            <option <?= $row['statussewa'] == 'Disewa' ? 'selected' : '' ?>>Disewa</option>
                                            <option <?= $row['statussewa'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                            <option <?= $row['statussewa'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="modal-footer">
                                            <button type="submit" name="simpan_edit" class="btn btn-primary">Simpan</button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>

            </main>
        </div>
    </div>
    <footer class="bg-light text-center text-lg-start mt-4 border-top">
        <div class="container py-3 d-flex justify-content-between flex-wrap">
            <span class="text-muted">&copy; <?= date("Y"); ?> Rentalku Admin Panel</span>
            <span class="text-muted">Rentalku - Data Sewa</span>
        </div>
    </footer>


    <!-- Sweetalert data berhasil diubah -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php if (isset($_SESSION['edit'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil diubah.',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php unset($_SESSION['edit']);
    endif; ?>

    <!-- Sweetalert konfirmasi hapus data perbaris -->
    <script>
        function konfirmasiHapus(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'sewa.php?hapus=' + id;
                }
            });
        }
    </script>

    <!-- Sweetalert data berhasil dihapus perbaris -->
    <?php if (isset($_SESSION['hapus'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Terhapus!',
                text: 'Data berhasil dihapus.',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php unset($_SESSION['hapus']);
    endif; ?>



    <!-- Sweetalert gagal hapus data sewa perbaris -->
    <?php if (isset($_SESSION['gagal_hapus_sewa'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menghapus!',
                text: 'Data tidak bisa dihapus karena status masih "Disewa".',
                confirmButtonText: 'Oke'
            });
        </script>
    <?php unset($_SESSION['gagal_hapus_sewa']);
    endif; ?>

    <!-- Sweetalert berhasil konfirmasi status pembayaran -->
    <?php if (isset($_SESSION['konfirmasi_bayar'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Dikonfirmasi!',
                text: 'Status telah diubah menjadi Disewa.',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php unset($_SESSION['konfirmasi_bayar']);
    endif; ?>

    <!-- Sweetalert notifikasi Konfirmasi Pembayaran Berhasil -->
    <?php if (isset($_SESSION['konfirmasi'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pembayaran Dikonfirmasi!',
                text: 'Status sewa telah diperbarui ke "Disewa".',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        <?php unset($_SESSION['konfirmasi']); ?>
    <?php endif; ?>

    <!--Sweetalert email Pesanan ditolak terkirim-->
    <?php if (isset($_SESSION['ditolak'])): ?>
        <script>
            Swal.fire('Pesanan Ditolak', 'Pemesanan telah ditolak & email sudah dikirim.', 'success');
        </script>
        <?php unset($_SESSION['ditolak']); ?>
    <?php elseif (isset($_SESSION['gagal'])): ?>
        <script>
            Swal.fire('Gagal Mengirim Email', '<?= $_SESSION['gagal'] ?>', 'error');
        </script>
        <?php unset($_SESSION['gagal']); ?>
    <?php endif; ?>


    <!-- Sweet alert konfirmasi tolak pesanan -->
    <script>
        document.querySelectorAll('.btn-tolak').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                Swal.fire({
                    title: 'Yakin tolak pesanan ini?',
                    text: 'Tindakan ini tidak dapat dibatalkan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, tolak',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = href;
                    }
                });
            });
        });
    </script>

    <!-- Sweetalert tolak pesanan-->
    <?php if (isset($_SESSION['ditolak'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Pesanan berhasil ditolak',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php unset($_SESSION['ditolak']);
    endif; ?>

    <!-- Sweetalert notifikasi email berhasil dikirim -->
    <?php if (isset($_SESSION['email_terkirim'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Email Terkirim!',
                text: 'Invoice berhasil dikirim ke email customer.',
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    <?php unset($_SESSION['email_terkirim']);
    endif; ?>
    <!-- Sweetalert notifikasi email gagal dikirim -->
    <?php if (isset($_SESSION['email_gagal'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Mengirim Email!',
                text: '<?php echo $_SESSION['email_gagal']; ?>',
                showConfirmButton: true
            });
        </script>
    <?php unset($_SESSION['email_gagal']);
    endif; ?>

    <!-- Sweetalert notifikasi Konfirmasi Sewa selesai? -->
    <script>
        document.querySelectorAll('.btn-selesai').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Tandai sebagai selesai?',
                    text: "Status mobil akan tersedia kembali.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, selesai!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'sewa.php?selesai=' + id;
                    }
                });
            });
        });
    </script>

    <!-- Sweetalert notifikasi Sewa Telah selesai -->
    <?php if (isset($_SESSION['selesai'])) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sewa selesai!',
                text: 'Status mobil telah tersedia kembali.',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    <?php unset($_SESSION['selesai']);
    endif; ?>

    <!-- Sweetalert konfirmasi hapus semua data -->
    <script>
        document.getElementById('btnHapusSemua').addEventListener('click', function() {
            Swal.fire({
                title: 'Yakin hapus semua data sewa?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus semua!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('form-hapus-semua').submit();
                }
            });
        });
    </script>

    <!-- Sweetalert sukses hapus semua data -->
    <?php if (isset($_SESSION['hapus_semua_sukses'])): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Data berhasil dihapus',
                text: 'Seluruh data penyewaan telah dihapus!',
                timer: 3000,
                showConfirmButton: false
            });
        </script>
    <?php unset($_SESSION['hapus_semua_sukses']);
    endif; ?>

    <!-- Sweetalert gagal hapus semua data -->
    <?php if (isset($_SESSION['hapus_semua_gagal'])): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal Menghapus!',
                text: 'Masih ada data penyewaan dengan status "Disewa".',
                confirmButtonText: 'Oke'
            });
        </script>
    <?php unset($_SESSION['hapus_semua_gagal']);
    endif; ?>


</body>

</html>