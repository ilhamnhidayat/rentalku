<?php
session_start();
include '../config/config.php';

// Tambah Mobil
if (isset($_POST['tambah'])) {
  $brand = $_POST['brand'];
  $tipe = $_POST['tipe'];
  $desk = $_POST['desk'];
  $plat = $_POST['plat'];
  $harga = $_POST['harga'];
  $status = $_POST['status'];

  $gambar = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];
  $folder = "uploads/";
  move_uploaded_file($tmp, $folder . $gambar);

  mysqli_query($conn, "INSERT INTO tbmobil (gambarpath, brand_mobil, nama_mobil, isidesk, platmobil, harga, statusmobil)
                         VALUES ('$gambar', '$brand', '$tipe', '$desk', '$plat', '$harga', '$status')");
  $_SESSION['sukses_tambah'] = true;
  header("Location: admin.php");
  exit;
}

// Hapus Mobil
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];

  // Cek apakah mobil sedang disewa
  $cekSewa = mysqli_query($conn, "SELECT * FROM tbsewa WHERE idmobil = '$id' AND statussewa = 'Disewa'");
  if (mysqli_num_rows($cekSewa) > 0) {
    $_SESSION['gagal_hapus_mobil'] = true;
    header("Location: admin.php");
    exit;
  }

  // Hapus jika tidak sedang disewa
  if (mysqli_query($conn, "DELETE FROM tbmobil WHERE idmobil = '$id'")) {
    $_SESSION['sukses_hapus_mobil'] = true;
    header("Location: admin.php");
    exit;
  } else {
    error_log("Error deleting record: " . mysqli_error($conn));
  }
}




// Edit Mobil
if (isset($_POST['edit'])) {
  $id = $_POST['id'];
  $brand = $_POST['brand'];
  $tipe = $_POST['tipe'];
  $desk = $_POST['desk'];
  $plat = $_POST['plat'];
  $harga = $_POST['harga'];
  $status = $_POST['status'];

  if (!empty($_FILES['gambar']['name'])) {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    move_uploaded_file($tmp, "uploads/" . $gambar);
    mysqli_query($conn, "UPDATE tbmobil SET gambarpath='$gambar', brand_mobil='$brand', nama_mobil='$tipe', isidesk='$desk', platmobil='$plat', harga='$harga', statusmobil='$status' WHERE idmobil='$id'");
  } else {
    mysqli_query($conn, "UPDATE tbmobil SET brand_mobil='$brand', nama_mobil='$tipe', isidesk='$desk', platmobil='$plat', harga='$harga', statusmobil='$status' WHERE idmobil='$id'");
  }
  $_SESSION['sukses_edit'] = true;
  header("Location: admin.php");
  exit;
}

// Hapus Semua
if (isset($_POST['hapus_semua'])) {
  // Cek apakah ada data sewa yang statusnya masih 'Disewa'
  $cekSewa = mysqli_query($conn, "SELECT * FROM tbsewa WHERE statussewa = 'Disewa'");
  if (mysqli_num_rows($cekSewa) > 0) {
    $_SESSION['gagal_hapus_semua'] = true;
    header("Location: admin.php");
    exit;
  } else {
    mysqli_query($conn, "DELETE FROM tbmobil");
    $_SESSION['sukses_hapus_semua'] = true;
    header("Location: admin.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    .nav-link.active {
      background-color: #0d6efd;
      color: #fff !important;
      font-weight: bold;
      border-radius: 0.375rem;
    }

    .nav-link:hover {
      background-color: #e7f1ff;
      color: #0d6efd !important;
      border-radius: 0.375rem;
    }
  </style>
</head>

<body>
  <!-- Header Navbar -->
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
      <!-- Sidebar -->
      <!-- Sidebar -->
      <nav class="col-md-2 d-md-block bg-light sidebar collapse show">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="admin.php">
                <i class="fas fa-car me-2"></i>Stock Mobil
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sewa.php">
                <i class="fas fa-list me-2"></i>Data Sewa
              </a>
            </li>
          </ul>
        </div>
      </nav>


      <!-- Content -->
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
        <?php if (isset($_GET['edit'])):
          $id_edit = $_GET['edit'];
          $mobil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbmobil WHERE idmobil = '$id_edit'"));
        ?>
          <!-- Modal atau Form Edit -->
          <div class="modal fade show" style="display:block; background-color: rgba(0,0,0,0.5);" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <form method="post" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Mobil</h5>
                    <a href="admin.php" class="btn-close"></a>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $mobil['idmobil'] ?>">
                    <input type="text" name="brand" class="form-control mb-2" value="<?= $mobil['brand_mobil'] ?>" required>
                    <input type="text" name="tipe" class="form-control mb-2" value="<?= $mobil['nama_mobil'] ?>" required>
                    <textarea name="desk" class="form-control mb-2"><?= $mobil['isidesk'] ?></textarea>
                    <input type="text" name="plat" class="form-control mb-2" value="<?= $mobil['platmobil'] ?>" required>
                    <input type="number" name="harga" class="form-control mb-2" value="<?= $mobil['harga'] ?>" required>
                    <select name="status" class="form-control mb-2">
                      <option value="Tersedia" <?= $mobil['statusmobil'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                      <option value="Disewa" <?= $mobil['statusmobil'] == 'Disewa' ? 'selected' : '' ?>>Disewa</option>
                    </select>
                    <label>Gambar Baru (opsional):</label>
                    <input type="file" name="gambar" class="form-control mb-2">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="admin.php" class="btn btn-secondary">Batal</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        <?php endif; ?>

        <h2 class="mt-4">Stock Mobil</h2>
        <form method="post" class="mb-3">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambahkan Data</button>
          <button type="button" id="btnHapusSemua" class="btn btn-danger">Hapus Semua Data</button>
        </form>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Brand Mobil</th>
                <th>Tipe Mobil</th>
                <th>Deskripsi</th>
                <th>Plat Nomor</th>
                <th>Harga Sewa</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $query = mysqli_query($conn, "SELECT * FROM tbmobil");
              while ($data = mysqli_fetch_assoc($query)) {
                echo "<tr>";
                echo "<td>$no</td>";
                echo "<td><img src='../uploads/{$data['gambarpath']}' alt='Gambar Mobil' width='150'></td>";
                echo "<td>{$data['brand_mobil']}</td>";
                echo "<td>{$data['nama_mobil']}</td>";
                echo "<td>{$data['isidesk']}</td>";
                echo "<td>{$data['platmobil']}</td>";
                echo "<td>Rp. {$data['harga']}</td>";
                echo "<td>{$data['statusmobil']}</td>";
                echo "<td>
                            <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#modalEdit{$data['idmobil']}'>Edit</button>
                            <a href='#' class='btn btn-danger btn-sm' onclick=\"konfirmasiHapus('{$data['idmobil']}')\">Delete</a>
                          </td>";
                echo "</tr>";
                $no++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Tambah -->
  <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTambahLabel">Tambah Mobil</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="text" name="brand" class="form-control mb-2" placeholder="Brand Mobil" required>
            <input type="text" name="tipe" class="form-control mb-2" placeholder="Tipe Mobil" required>
            <textarea name="desk" class="form-control mb-2" placeholder="Deskripsi Mobil"></textarea>
            <input type="text" name="plat" class="form-control mb-2" placeholder="Plat Nomor" required>
            <input type="number" name="harga" class="form-control mb-2" placeholder="Harga Sewa" required>
            <select name="status" class="form-control mb-2">
              <option value="Tersedia">Tersedia</option>
              <option value="Disewa">Disewa</option>
            </select>
            <input type="file" name="gambar" class="form-control mb-2" required>
          </div>
          <div class="modal-footer">
            <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  $queryModal = mysqli_query($conn, "SELECT * FROM tbmobil");
  while ($dataModal = mysqli_fetch_assoc($queryModal)):
  ?>
    <!-- Modal Edit -->
    <div class="modal fade" id="modalEdit<?= $dataModal['idmobil'] ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $dataModal['idmobil'] ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditLabel<?= $dataModal['idmobil'] ?>">Edit Mobil</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id" value="<?= $dataModal['idmobil'] ?>">
              <input type="text" name="brand" class="form-control mb-2" value="<?= $dataModal['brand_mobil'] ?>" required>
              <input type="text" name="tipe" class="form-control mb-2" value="<?= $dataModal['nama_mobil'] ?>" required>
              <textarea name="desk" class="form-control mb-2"><?= $dataModal['isidesk'] ?></textarea>
              <input type="text" name="plat" class="form-control mb-2" value="<?= $dataModal['platmobil'] ?>" required>
              <input type="number" name="harga" class="form-control mb-2" value="<?= $dataModal['harga'] ?>" required>
              <select name="status" class="form-control mb-2">
                <option value="Tersedia" <?= $dataModal['statusmobil'] == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
                <option value="Disewa" <?= $dataModal['statusmobil'] == 'Disewa' ? 'selected' : '' ?>>Disewa</option>
              </select>
              <label>Upload Gambar Baru (opsional):</label>
              <input type="file" name="gambar" class="form-control mb-2">
            </div>
            <div class="modal-footer">
              <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endwhile; ?>

  <footer class="bg-light text-center text-lg-start mt-4 border-top">
    <div class="container py-3 d-flex justify-content-between flex-wrap">
      <span class="text-muted">&copy; <?= date("Y"); ?> Rentalku Admin Panel</span>
      <span class="text-muted">Rentalku - Stock Mobil</span>
    </div>
  </footer>

  <!-- Notif SweetAlert Tambah -->
  <?php if (isset($_SESSION['sukses_tambah'])): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data berhasil ditambahkan.',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
  <?php unset($_SESSION['sukses_tambah']);
  endif; ?>

  <!-- Notif SweetAlert Hapus -->
  <script>
    function konfirmasiHapus(id) {
      console.log("ID to delete: " + id); // Log ID untuk debugging
      Swal.fire({
        title: 'Yakin mau hapus?',
        text: 'Data tidak bisa dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '?hapus=' + id;
        }
      });
    }
  </script>

  <!-- Notif Gagal Hapus saat masih disewa -->
  <?php if (isset($_SESSION['gagal_hapus_mobil'])): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal Menghapus!',
        text: 'Mobil sedang disewa dan tidak bisa dihapus.',
        confirmButtonText: 'Oke'
      });
    </script>
  <?php unset($_SESSION['gagal_hapus_mobil']);
  endif; ?>

  <!-- Notif Berhasil Hapus  -->
  <?php if (isset($_SESSION['sukses_hapus_mobil'])): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data mobil berhasil dihapus.',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
  <?php unset($_SESSION['sukses_hapus_mobil']);
  endif; ?>


  <script>
    document.getElementById('btnHapusSemua').addEventListener('click', function() {
      Swal.fire({
        title: 'Yakin ingin menghapus semua data?',
        text: "Semua data mobil akan dihapus dan tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus semua!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Buat form tersembunyi untuk submit POST hapus_semua
          const form = document.createElement('form');
          form.method = 'POST';
          form.style.display = 'none';

          const input = document.createElement('input');
          input.type = 'hidden';
          input.name = 'hapus_semua';
          input.value = '1';

          form.appendChild(input);
          document.body.appendChild(form);
          form.submit();
        }
      });
    });
  </script>

  <!-- Notif Gagal Hapus Semua -->
  <?php if (isset($_SESSION['gagal_hapus_semua'])): ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal Menghapus!',
        text: 'Tidak bisa menghapus semua data karena ada mobil yang masih disewa.',
        confirmButtonText: 'Oke'
      });
    </script>
  <?php unset($_SESSION['gagal_hapus_semua']);
  endif; ?>

  <!-- Notif Sukses Hapus Semua -->
  <?php if (isset($_SESSION['sukses_hapus_semua'])): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Semua data mobil berhasil dihapus.',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
  <?php unset($_SESSION['sukses_hapus_semua']);
  endif; ?>


  <!-- Notif SweetAlert Edit -->
  <?php if (isset($_SESSION['sukses_edit'])): ?>
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: 'Data berhasil diubah.',
        showConfirmButton: false,
        timer: 2000
      });
    </script>
  <?php unset($_SESSION['sukses_edit']);
  endif; ?>

</body>

</html>