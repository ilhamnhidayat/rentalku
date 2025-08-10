<?php
session_start();
include '../config/config.php';

// Proses simpan data jika form disubmit
if (isset($_POST['submit'])) {
    $brand = $_POST['brand'];
    $tipe = $_POST['tipe'];
    $desk = $_POST['desk'];
    $plat = $_POST['plat'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "uploads/";

    if (empty($brand) || empty($tipe) || empty($plat) || empty($harga) || empty($status) || empty($gambar)) {
        echo "<script>Swal.fire('Gagal', 'Semua field harus diisi!', 'error');</script>";
    } else {
        // Validasi ekstensi file gambar
        $allowed_ext = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed_ext)) {
            echo "<script>Swal.fire('Gagal', 'File harus berupa gambar (jpg, jpeg, png, webp)', 'error');</script>";
        } else {
            $namafile = time() . '-' . basename($gambar);
            move_uploaded_file($tmp, $folder . $namafile);
            mysqli_query($conn, "INSERT INTO tbmobil (gambarpath, brand_mobil, nama_mobil, isi_desk, platmobil, harga, statusmobil)
                VALUES ('$namafile', '$brand', '$tipe', '$desk', '$plat', '$harga', '$status')");
            echo "<script>Swal.fire('Berhasil', 'Data berhasil ditambahkan!', 'success');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Data Mobil</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="brand" class="form-label">Brand Mobil</label>
            <input type="text" class="form-control" id="brand" name="brand">
        </div>
        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe Mobil</label>
            <input type="text" class="form-control" id="tipe" name="tipe">
        </div>
        <div class="mb-3">
            <label for="desk" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="desk" name="desk"></textarea>
        </div>
        <div class="mb-3">
            <label for="plat" class="form-label">Plat Nomor</label>
            <input type="text" class="form-control" id="plat" name="plat">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga Sewa</label>
            <input type="number" class="form-control" id="harga" name="harga">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Tersedia">Tersedia</option>
                <option value="Disewa">Disewa</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script>
    CKEDITOR.replace('desk');
</script>
</body>
</html>
