<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | Rentalku</title>
  <link rel="stylesheet" href="../assets/styleadmin.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  <div class="login-container">
    <div class="login-box">
      <div class="logo">Rentalku</div>
      <h2>Welcome Min! 👋</h2>
      <form method="POST" action="ceklogin.php">
        <label for="username">EMAIL OR USERNAME</label>
        <div class="input-group">
          <input type="text" id="username" name="username" placeholder="Enter your email or username" required />
        </div>

        <label for="password">PASSWORD</label>
        <div class="input-group">
          <input type="password" id="password" name="password" placeholder="********" required />
        </div>

        <button type="submit">Sign in</button>
        <a href="../index.php" class="back-link">Kembali ke Beranda</a>
      </form>
    </div>
  </div>

  <?php if (isset($_SESSION['login_failed'])): ?>
    <script>
      document.body.classList.add('modal-open');
      Swal.fire({
        icon: 'error',
        title: 'Login Gagal!',
        text: 'Username atau password salah!',
        didClose: () => {
          document.body.classList.remove('modal-open');
        }
      });
    </script>
    <?php unset($_SESSION['login_failed']); ?>
  <?php endif; ?>

</body>
</html>
