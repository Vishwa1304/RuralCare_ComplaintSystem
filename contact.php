<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .navbar-custom { background-color: #00796b; }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link { color: #fff; font-weight: 600; }
        .navbar-custom .nav-link:hover { color: #b2dfdb; }
        .main-container { min-height: calc(100vh - 112px); display: flex; align-items: center; justify-content: center; }
        .content { padding:50px 30px; max-width:700px; width:100%; background:#fff; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.15); text-align:center; }
        h3 { color:#004d40; margin-bottom:30px; }
        .contact-info { margin-top:30px; text-align:left; }
        .contact-info i { color:#00796b; margin-right:10px; }
        .contact-info p { font-size:1.2rem; margin-bottom:20px; color:#004d40; }
        footer { background-color: #004d40; color: #fff; text-align:center; padding:15px 0; }
        footer a { color: #b2dfdb; margin:0 10px; text-decoration:none; }
        footer a:hover { text-decoration:underline; }
    </style>
</head>
<body>

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


    <!-- Fullscreen Contact Content -->
    <div class="main-container">
        <div class="content">
            <h3>Contact Us</h3>
            <p>If you have any questions, complaints, or suggestions, feel free to reach out to us. We are here to help!</p>

            <div class="contact-info mt-4">
                <p><i class="fas fa-map-marker-alt"></i> Bhavnagar, Gujarat, India</p>
                <p><i class="fas fa-phone"></i> +91 99041 11423</p>
                <p><i class="fas fa-envelope"></i> support@villagecare.com</p>
            </div>
        </div>
    </div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
