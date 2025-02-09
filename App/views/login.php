<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login - Youdemy</title>
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
          <li><a href="/LigneYoudemy-mvc-/">Home</a></li>
          <li><a href="/LigneYoudemy-mvc-/login" class="active">Login</a></li>
          <li><a href="/LigneYoudemy-mvc-/register">Register</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main" style="display: flex; justify-content: center; margin-top: 10%;">
    <div class="form-container">
      <h2>Login</h2>
      <form method="post" action="/LigneYoudemy-mvc-/login" id="loginForm">
        <div class="form-group">
          <label for="loginEmail">Email</label>
          <span style="color:#EA001E;">
            <?php
            if (isset($_GET['msge'])) {
              echo htmlspecialchars($_GET['msge']);
            }
            ?>
          </span>
          <input type="email" id="loginEmail" name="email" required>
        </div>
        <div class="form-group">
          <label for="loginPassword">Password</label>
          <span style="color:#EA001E;">
            <?php
            if (isset($_GET['msgp'])) {
              echo htmlspecialchars($_GET['msgp']);
            }
            ?>
          </span>
          <input type="password" id="loginPassword" name="password" required>
        </div>
        <button type="submit" name="submit">Login</button>
      </form>
      <a href="/LigneYoudemy-mvc-/register" class="toggle-link">Don't have an account? Register</a>
    </div>
  </main>
  <script src="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/aos/aos.js"></script>
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/swiper/swiper-bundle.min.js"></script>


    <script src="/LigneYoudemy-mvc-/public/assets/js/main.js"></script>
</body>
</html>