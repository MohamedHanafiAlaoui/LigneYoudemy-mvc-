<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Register - Youdemy</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="/LigneYoudemy-mvc-/public/assets/img/favicon.png" rel="icon">
  <link href="/LigneYoudemy-mvc-/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/LigneYoudemy-mvc-/public/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/LigneYoudemy-mvc-/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/LigneYoudemy-mvc-/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="/LigneYoudemy-mvc-/public/assets/css/main.css" rel="stylesheet">
  <link href="/LigneYoudemy-mvc-/public/assets/css/lgin.css" rel="stylesheet">
</head>

<body class="events-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
      <a href="/LigneYoudemy-mvc-/" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Youdemy</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/LigneYoudemy-mvc-/public">Home</a></li>
          <li><a href="/LigneYoudemy-mvc-/login">Login</a></li>
          <li><a href="/LigneYoudemy-mvc-/register" class="active">Register</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main" style="display: flex; justify-content: center; margin-top: 10%;">
    <div class="form-container">
      <h2>Register</h2>
      <form method="post" action="/LigneYoudemy-mvc-/register" id="registerForm">
        <div class="form-group">
          <label for="fullName">Full Name</label>
          <span style="color:#EA001E;">
            <?php
            if (isset($_GET['msg'])) {
              echo htmlspecialchars($_GET['msg']);
            }
            ?>
          </span>
          <input type="text" id="fullName" name="full_name" required>
        </div>

        <div class="form-group">
          <label for="registerEmail">Email</label>
          <span style="color:#EA001E;">
            <?php
            if (isset($_GET['msge'])) {
              echo htmlspecialchars($_GET['msge']);
            }
            ?>
          </span>
          <input type="email" id="registerEmail" name="email" required>
        </div>

        <div class="form-group">
          <label for="registerPassword">Password</label>
          <span style="color:#EA001E;">
            <?php
            if (isset($_GET['msgp'])) {
              echo htmlspecialchars($_GET['msgp']);
            }
            ?>
          </span>
          <input type="password" id="registerPassword" name="password" required>
        </div>

        <div class="form-group">
          <label for="id_role">Role</label>
          <select name="id_role" required>
            <option value="3">Étudiant</option>
            <option value="2">Enseignant</option>
          </select>
        </div>

        <button type="submit" name="submit">Register</button>
      </form>
      <a href="/LigneYoudemy-mvc-/login" class="toggle-link">Already have an account? Login</a>
    </div>
  </main>

  <!-- Vendor JS Files -->
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/php-email-form/validate.js"></script>
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/aos/aos.js"></script>
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="/LigneYoudemy-mvc-/public/assets/js/main.js"></script>
</body>

</html>