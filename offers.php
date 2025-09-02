<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - Offers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .navbar-custom { background-color: #00796b; }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link { color: #fff; }
        .navbar-custom .nav-link:hover { color: #b2dfdb; }
        footer { background-color: #004d40; color: #fff; text-align:center; padding:15px 0; }
        footer a { color: #b2dfdb; margin:0 10px; text-decoration:none; }
        footer a:hover { text-decoration:underline; }
        .content { padding:50px 15px; text-align:center; }
        .offer-card { background:#ffffff; border-radius:10px; padding:30px; margin-bottom:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1); text-align:left; }
        .offer-card h4 { color:#004d40; }
        .offer-card p { color:#00695c; font-size:1rem; }
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


    <div class="content container">
        <h2 class="mb-4">Our Support & Offers</h2>

        <div class="offer-card">
            <h4>Village Infrastructure Support</h4>
            <p>We provide assistance and track complaints related to water supply, road maintenance, electricity issues, and sanitation in rural areas.</p>
        </div>

        <div class="offer-card">
            <h4>Priority Complaint Handling</h4>
            <p>Complaints submitted via RuralCare are prioritized to ensure quick action by local authorities and service providers.</p>
        </div>

        <div class="offer-card">
            <h4>How it Helps</h4>
            <p>This platform ensures that villagers’ issues are recorded, tracked, and resolved effectively, improving transparency and service delivery in rural communities.</p>
        </div>
    </div>

   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
