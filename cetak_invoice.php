<?php
include 'config/config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT s.*, m.nama_mobil, m.brand_mobil FROM tbsewa s JOIN tbmobil m ON s.idmobil = m.idmobil WHERE s.idsewa = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Invoice #<?= $data['idsewa'] ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-box {
            border: 1px solid #ccc;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        td, th {
            padding: 10px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        .footer {
            margin-top: 30px;
        }

        .noprint {
            margin-top: 20px;
        }

        @media print {
            .noprint {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <h2>INVOICE PEMESANAN RENTALKU</h2>

    <table>
        <tr><th>ID Sewa</th><td><?= $data['idsewa'] ?></td></tr>
        <tr><th>Nama Customer</th><td><?= $data['nama_cust'] ?></td></tr>
        <tr><th>Email</th><td><?= $data['email'] ?></td></tr>
        <tr><th>Nama Mobil</th><td><?= $data['brand_mobil'] . ' ' . $data['nama_mobil'] ?></td></tr>
        <tr><th>Tanggal Sewa</th><td><?= $data['rental_start'] ?> s/d <?= $data['rental_end'] ?></td></tr>
        <tr><th>Total Harga</th><td>Rp <?= number_format($data['harga_total'], 0, ',', '.') ?></td></tr>
        <tr><th>Status</th><td><?= $data['statussewa'] ?></td></tr>
    </table>

    <div class="footer">
        <p>Mohon lakukan pembayaran maksimal 1x24 jam setelah invoice diterima ke:</p>
        <p><strong>Rekening Mandiri 1550011881227 a.n Ilham Noor Hidayat</strong></p>
        <p>Hubungi WhatsApp kami untuk konfirmasi: <a href="https://wa.me/6281295842998">0812-9584-2998</a></p>
        <p>Terima kasih telah menggunakan layanan Rentalku.</p>
    </div>
</div>

<div class="noprint">
    <button onclick="window.print()">🖨️ Cetak Invoice</button>
</div>

</body>
</html>
