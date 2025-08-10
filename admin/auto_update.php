<?php
// auto_update.php

include '../config/config.php'; // pastikan path sesuai

// Ambil tanggal hari ini
$tanggal_sekarang = date('Y-m-d');

// Update status sewa otomatis
$query = "UPDATE tbsewa 
          SET statussewa = 'Selesai'
          WHERE tanggal_selesai < '$tanggal_sekarang' 
          AND statussewa = 'Disewa'";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "Status sewa berhasil diperbarui ke 'Selesai'.";
} else {
    echo "Gagal memperbarui status sewa: " . mysqli_error($conn);
}
?>
