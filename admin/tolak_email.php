<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';
include '../config/config.php';

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data penyewa dan status sewa
    $result = mysqli_query($conn, "SELECT s.*, m.nama_mobil FROM tbsewa s 
                                   JOIN tbmobil m ON s.idmobil = m.idmobil 
                                   WHERE s.idsewa = '$id'");
    $data = mysqli_fetch_assoc($result);

    $email = $data['email'];
    $nama = $data['nama_cust'];
    $status = $data['statussewa'];

    // Inisialisasi PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'mail.rental-ku.my.id';
        $mail->SMTPAuth = true;
        $mail->Username = 'noreply@rental-ku.my.id';
        $mail->Password = 'Jampang29';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('noreply@rental-ku.my.id', 'Rentalku');
        $mail->addAddress($email, $nama);
        $mail->isHTML(true);
        $mail->Subject = 'Pemberitahuan Penolakan Sewa';

        // Cek statussewa dan sesuaikan isi email
        if ($status == 'Menunggu') {
            $mail->Body = "
                <h3>Halo $nama,</h3>
                <p>Kami mohon maaf, terkait permintaan penyewaan mobil <b>{$data['nama_mobil']}</b> 
                untuk tanggal <b>{$data['rental_start']} sampai dengan {$data['rental_end']}</b> 
                kami batalkan. Karena mobil yang anda pilih telah disewa oleh orang lain. 
                Silahkan lakukan pemesanan ulang di website kami dengan memilih mobil lainnya.</p>
                <p>Jika ada pertanyaan atau informasi lebih lanjut, silahkan hubungi admin kami di <a href='https://wa.me/6281295842998'>0812-9584-2998</a></p>
                <p>Terima kasih atas pengertiannya.</p>
            ";
        } elseif ($status == 'Menunggu Pembayaran') {
            $mail->Body = "
                <h3>Halo $nama,</h3>
                <p>Kami mohon maaf, terkait permintaan penyewaan mobil <b>{$data['nama_mobil']}</b> 
                untuk tanggal <b>{$data['rental_start']} sampai dengan {$data['rental_end']}</b> 
                tidak dapat kami proses karena melewati batas akhir pembayaran. Silakan hubungi admin kami melalui WhatsApp di 
                <a href='https://wa.me/6281295842998'>0812-9584-2998</a> untuk informasi lebih lanjut atau anda juga dapat melakukan 
                pemesanan ulang kembali di Website Rentalku.</p>
                <p>Terima kasih atas pengertiannya.</p>

            ";
        } else {
            $mail->Body = "
                <h3>Halo $nama,</h3>
                <p>Mohon maaf terkait permintaan sewa Anda tidak dapat kami proses. Mohon lakukan pemesanan kembali via website kami.</p>
                <p>Terima kasih</p>
            ";
        }

        $mail->send();

        // Update status jadi Ditolak
        mysqli_query($conn, "UPDATE tbsewa SET statussewa = 'Ditolak' WHERE idsewa = '$id'");
        $_SESSION['ditolak'] = true;
        header("Location: sewa.php");
        exit;
    } catch (Exception $e) {
        $_SESSION['email_error'] = "Email gagal dikirim: {$mail->ErrorInfo}";
        header("Location: sewa.php");
        exit;
    }
} else {
    header("Location: sewa.php");
    exit;
}
