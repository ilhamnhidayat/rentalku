<?php
include 'config/config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = $_POST['nama_cust'];
    $email    = $_POST['email'];
    $idmobil  = $_POST['idmobil'];
    $start    = $_POST['rental_start'];
    $end      = $_POST['rental_end'];

    // Ambil harga dari tbmobil
    $q = mysqli_query($conn, "SELECT harga FROM tbmobil WHERE idmobil = '$idmobil'");
    $dataMobil = mysqli_fetch_assoc($q);
    if (!$dataMobil) {
        die("Mobil tidak ditemukan di database.");
    }
    $harga_per_hari = (int)$dataMobil['harga'];

    // Hitung selisih hari sewa
    $start_date = new DateTime($start);
    $end_date = new DateTime($end);
    $selisih = $start_date->diff($end_date)->days;
    if ($selisih < 1) $selisih = 1; // Minimal 1 hari

    $total = $selisih * $harga_per_hari;

    $cekBentrok = mysqli_query($conn, "
        SELECT * FROM tbsewa
        WHERE idmobil = '$idmobil'
            AND statussewa = 'Disewa'
            AND (
                ('$start' BETWEEN rental_start AND rental_end) OR
                ('$end' BETWEEN rental_start AND rental_end) OR
                (rental_start BETWEEN '$start' AND '$end')
            )
    ");

    $status = (mysqli_num_rows($cekBentrok) > 0) ? : "Menunggu";

    $insert = mysqli_query($conn, "INSERT INTO tbsewa 
    (nama_cust, email, idmobil, rental_start, rental_end, statussewa, harga_total)
    VALUES ('$nama', '$email', '$idmobil', '$start', '$end', '$status', '$total')");


    if ($insert) {
        header("Location: index.php?status=sukses");
    } else {
        header("Location: index.php?status=gagal");
    }
    exit;
}
