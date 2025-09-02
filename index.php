<?php
session_start();
if(isset($_SESSION['user_id'])){
    if($_SESSION['role'] == 'admin'){
        header("Location: admin/dashboard.php");
    } else {
        header("Location: dashboard.php");
    }
    exit();
}
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - Village Support Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; font-family: 'Segoe UI', sans-serif; }
        body { background: linear-gradient(135deg, #e0f2f1, #ffffff); }
        .container-full { height: 100%; display: flex; flex-direction: column; }
        .navbar-custom { background-color: #00796b; }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link { color: #fff; font-weight: 600; }
        .navbar-custom .nav-link:hover { color: #b2dfdb; }
        .hero { flex: 1; display: flex; align-items: center; justify-content: space-between; padding: 20px; }
        .hero-text h1 { font-size: 3rem; font-weight: 700; margin-bottom: 20px; color: #004d40; }
        .hero-text p { font-size: 1.2rem; margin-bottom: 30px; color: #00695c; }
        .btn-primary { border-radius: 50px; padding: 12px 35px; font-weight: 500; background-color: #004d40; border: none; transition: 0.3s; }
        .btn-primary:hover { background-color: #00796b; transform: translateY(-3px); }
        .hero-image img { max-height: 300px; }
        footer { background-color: #004d40; color: #fff; text-align: center; padding: 15px 0; }
        footer a { color: #b2dfdb; margin: 0 10px; text-decoration: none; }
        footer a:hover { text-decoration: underline; }
        @media(max-width: 992px){ .hero { flex-direction: column-reverse; text-align: center; } .hero-image img { margin-bottom: 20px; } }
    </style>
</head>
<body>

<div class="container-full d-flex flex-column">

    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="https://cdn-icons-png.flaticon.com/512/6040/6040422.png" width="40" class="me-2"> RuralCare
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link <?php if($current_page=='index.php'){echo 'active';} ?>" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?php if($current_page=='offers.php'){echo 'active';} ?>" href="offers.php">Offers</a></li>
                <li class="nav-item"><a class="nav-link <?php if($current_page=='feedback.php'){echo 'active';} ?>" href="feedback.php">Feedback</a></li>
                <li class="nav-item"><a class="nav-link <?php if($current_page=='contact.php'){echo 'active';} ?>" href="contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>


    <!-- Hero Section -->
    <div class="hero container">
        <div class="hero-text col-lg-6 col-md-12">
            <h1>RuralCare</h1>
            <p>Village complaint & support portal. Submit issues, track progress, and help improve community services efficiently.</p>
            <a href="register.php" class="btn btn-primary btn-lg">Sign Up</a>
        </div>
        <div class="hero-image col-lg-6 col-md-12 d-flex justify-content-center align-items-center">
            <img src="https://cdn-icons-png.flaticon.com/512/4757/4757493.png" alt="Village Support" class="img-fluid" style="max-height:300px;">
        </div>
    </div>

    

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
