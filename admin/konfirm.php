<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';
require '../vendor/autoload.php';
include '../config/config.php';

// Jangan ambil dari $_GET lagi
// Langsung pakai $id, $email, $nama yang dikirim dari sewa.php

$query = mysqli_query($conn, "SELECT 
    tbsewa.*, 
    tbmobil.nama_mobil 
    FROM tbsewa 
    JOIN tbmobil ON tbsewa.idmobil = tbmobil.idmobil 
    WHERE tbsewa.idsewa = '$id'");

$data = mysqli_fetch_assoc($query);



// ==========================
// 1. BUAT HTML UNTUK INVOICE
// ==========================
$invoiceHTML = "
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        .footer { margin-top: 20px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <h2>INVOICE PENYEWAAN MOBIL Rentalku</h2>
    <table>
        <tr>
            <th>Nama Customer</th>
            <td>{$data['nama_cust']}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{$data['email']}</td>
        </tr>
        <tr>
            <th>Nama Mobil</th>
            <td>{$data['nama_mobil']}</td>
        </tr>
        <tr>
            <th>Tanggal Rental</th>
            <td>{$data['rental_start']} s/d {$data['rental_end']}</td>
        </tr>
        <tr>
            <th>Total Bayar</th>
            <td>Rp " . number_format($data['harga_total'], 0, ',', '.') . "</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>Disewa</td>
        </tr>
    </table>
    <div class='footer'>
        <p>Terima kasih telah menggunakan layanan Rentalku</p>
    </div>
</body>
</html>
";

// ==========================
// 2. GENERATE PDF PAKAI DOMPDF
// ==========================
$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($invoiceHTML);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Simpan file PDF sementara
$pdfOutput = $dompdf->output();
$pdfPath = "../temp_invoice/invoice_lunas{$data['idsewa']}.pdf";
file_put_contents($pdfPath, $pdfOutput);

// ==========================
// 3. KIRIM EMAIL DENGAN LAMPIRAN PDF
// ==========================
$mail = new PHPMailer(true);

try {
    // Konfigurasi SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ilhamnoorhidayat29@gmail.com';
    $mail->Password = 'ttuu zxto vzux kzyg'; // App Password Gmail
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Pengirim & Penerima
    $mail->setFrom('ilhamnoorhidayat29@gmail.com', 'Rentalku');
    $mail->addAddress($email, $nama);

    // Lampirkan PDF invoice
    $mail->addAttachment($pdfPath);

    // Konten email
    $mail->isHTML(true);
    $mail->Subject = 'Konfirmasi Pembayaran Diterima';
    $mail->Body = "
        <h3>Halo $nama,</h3>
        <p>Pembayaran Anda telah kami terima. Status penyewaan mobil <b>{$data['nama_mobil']}</b> 
            untuk tanggal <b>{$data['rental_start']}</b> sampai dengan <b>{$data['rental_end']}</b> kini menjadi <strong>Disewa</strong>.</p>
        <p>Invoice penyewaan Anda terlampir pada email ini.</p>
        <p>Terima kasih telah menggunakan layanan Rentalku. Jika ada pertanyaan, silakan hubungi 
            <a href='https://wa.me/6281295842998'>0812-9584-2998</a>.</p>
        <br>
        <small>Email ini dikirim otomatis oleh sistem.</small>
    ";


    // proses kirim email
    $mail->send();
} catch (Exception $e) {
    error_log("Email gagal dikirim: {$mail->ErrorInfo}");
} finally {
    if (file_exists($pdfPath)) {
        unlink($pdfPath);
    }
}
