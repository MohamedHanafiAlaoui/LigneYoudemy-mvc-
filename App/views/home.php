<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();  
}
var_dump ($_SESSION['user']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home - Youdemy</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="/LigneYoudemy-mvc-/public/assets/img/favicon.png" rel="icon">
    <link href="/LigneYoudemy-mvc-/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/LigneYoudemy-mvc-/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/LigneYoudemy-mvc-/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/LigneYoudemy-mvc-/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="/LigneYoudemy-mvc-/public/assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="/LigneYoudemy-mvc-/" class="logo d-flex align-items-center me-auto">
            <h1 class="sitename">Youdemy</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/LigneYoudemy-mvc-/" class="active">Home</a></li>
                <li><a href="/LigneYoudemy-mvc-/about">About</a></li>
                <li><a href="/LigneYoudemy-mvc-/courses">Courses</a></li>
                <li><a href="/LigneYoudemy-mvc-/trainers">Trainers</a></li>
                <li><a href="/LigneYoudemy-mvc-/contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <?php if (isset($_SESSION['user'])): ?>
            <a href="#" class="btn-get-started">
                <?php
                if (isset($_SESSION['user']['name'])) {
                    echo $_SESSION['user']['name'];
                } else {
                    echo "Welcome, Guest!";
                }
                ?>
            </a>
            <a href="/LigneYoudemy-mvc-/logout" class="btn-get-started">Logout</a>
        <?php else: ?>
            <a href="/LigneYoudemy-mvc-/login" class="btn-get-started">Login</a>
        <?php endif; ?>
    </div>
</header>



    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="/LigneYoudemy-mvc-/public/assets/img/hero-bg.jpg" alt="" data-aos="fade-in">
            <div class="container">
                <h2 data-aos="fade-up" data-aos-delay="100">Welcome to Youdemy</h2>
                <p data-aos="fade-up" data-aos-delay="200">Your gateway to online learning and skill development.</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="/LigneYoudemy-mvc-/courses" class="btn-get-started">Explore Courses</a>
                </div>
            </div>
        </section>

        <!-- Other sections can go here -->
    </main>

    <footer id="footer" class="footer position-relative light-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="/LigneYoudemy-mvc-/" class="logo d-flex align-items-center">
                        <span class="sitename">Youdemy</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@youdemy.com</span></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="/LigneYoudemy-mvc-/">Home</a></li>
                        <li><a href="/LigneYoudemy-mvc-/about">About us</a></li>
                        <li><a href="/LigneYoudemy-mvc-/courses">Courses</a></li>
                        <li><a href="/LigneYoudemy-mvc-/contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Youdemy</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>

    <!-- Vendor JS Files -->
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/aos/aos.js"></script>
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/LigneYoudemy-mvc-/public/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="/LigneYoudemy-mvc-/public/assets/js/main.js"></script>
</body>
</html>
