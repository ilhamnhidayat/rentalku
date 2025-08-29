<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dompdf\Dompdf;
use Dompdf\Options;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';
require '../vendor/autoload.php'; // Dompdf autoload
include '../config/config.php'; 
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = mysqli_query($conn, "SELECT s.*, m.nama_mobil FROM tbsewa s JOIN tbmobil m ON s.idmobil = m.idmobil WHERE idsewa = '$id'");
    $d = mysqli_fetch_assoc($q);

    if ($d) {
        // Buat HTML invoice untuk Dompdf
        ob_start();
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; }
                h2 { text-align: center; }
                table { width: 100%; border-collapse: collapse; margin-top: 20px; }
                td, th { border: 1px solid #ccc; padding: 8px; text-align: left; }
            </style>
        </head>
        <body>
            <h2>INVOICE PEMBAYARAN Rentalku</h2>
            <table>
                <tr><th>Nama Customer</th><td><?= $d['nama_cust'] ?></td></tr>
                <tr><th>Email</th><td><?= $d['email'] ?></td></tr>
                <tr><th>Nama Mobil</th><td><?= $d['nama_mobil'] ?></td></tr>
                <tr><th>Tanggal Sewa</th><td><?= $d['rental_start'] ?> s/d <?= $d['rental_end'] ?></td></tr>
                <tr><th>Total Harga</th><td>Rp <?= number_format($d['harga_total'], 0, ',', '.') ?></td></tr>
                <tr><th>Status</th><td>Menunggu Pembayaran</td></tr>
            </table>
            <p style="margin-top:20px;">Silakan lakukan pembayaran ke:<br>
            <b>Bank Mandiri 1550011881227 a.n Ilham Noor Hidayat</b><br>
            Maksimal 1x24 jam setelah email diterima.</p>
        </body>
        </html>
        <?php
        $html = ob_get_clean();

        // Generate PDF dengan Dompdf
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Simpan ke file sementara
        $pdfOutput = $dompdf->output();
        $filePath = '../temp_invoice/invoice_pembayaran' . $id . '.pdf';
        file_put_contents($filePath, $pdfOutput);

        // Kirim email dengan lampiran PDF
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
            $mail->addAddress($d['email'], $d['nama_cust']);

            $mail->isHTML(true);
            $mail->Subject = "Invoice Pemesanan Mobil Rentalku";
            $mail->Body = "
                <h3>Halo {$d['nama_cust']},</h3>
                <p>Terima kasih telah memesan jasa RentalKu. Invoice pemesanan mobil Anda kami lampirkan dalam bentuk PDF.</p>
                <p>Mohon lakukan pembayaran dalam waktu 1x24 jam ke rekening:</p>
                <b>Mandiri 1550011881227 a.n Ilham Noor Hidayat</b><br>
                <p>Untuk komunikasi selama sewa mobil berlangsung, hubungi WhatsApp:</p>
                <p><a href='https://wa.me/6281295842998'>0812-9584-2998</a></p>
                <p>Terima kasih telah menggunakan jasa Rentalku.</p>
            ";

            $mail->addAttachment($filePath); // Lampirkan PDF invoice
            $mail->send();

            // Update status di database
            mysqli_query($conn, "UPDATE tbsewa SET statussewa = 'Menunggu Pembayaran' WHERE idsewa = '$id'");
            $_SESSION['email_terkirim'] = true;

            // Hapus file PDF setelah terkirim (opsional)
            unlink($filePath);

        } catch (Exception $e) {
            $_SESSION['email_gagal'] = $mail->ErrorInfo;
        }

    } else {
        $_SESSION['email_gagal'] = "Data penyewaan tidak ditemukan.";
    }

    header("Location: sewa.php");
    exit;
}
