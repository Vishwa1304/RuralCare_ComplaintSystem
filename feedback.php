<?php
session_start();
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .navbar-custom { background-color: #00796b; }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link { color: #fff; font-weight: 600; }
        .navbar-custom .nav-link:hover { color: #b2dfdb; }
        .main-container { min-height: calc(100vh - 112px); display: flex; align-items: center; justify-content: center; }
        .content { padding:50px 30px; max-width:650px; width:100%; background:#fff; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.15); }
        h3 { color:#004d40; margin-bottom:30px; text-align:center; }
        .form-label { font-weight:500; }
        .btn-primary { border-radius:50px; background-color:#004d40; border:none; transition:0.3s; }
        .btn-primary:hover { background-color:#00796b; }
        footer { background-color: #004d40; color: #fff; text-align:center; padding:15px 0; position:absolute; width:100%; bottom:0; }
        footer a { color: #b2dfdb; margin:0 10px; text-decoration:none; }
        footer a:hover { text-decoration:underline; }
        .alert { text-align:center; }
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


    <!-- Fullscreen Feedback Form -->
    <div class="main-container">
        <div class="content">

            <h3>Give Us Your Feedback</h3>

            <!-- Success Message -->
            <?php
            if(isset($_SESSION['feedback_success'])){
                echo '<div class="alert alert-success">'.$_SESSION['feedback_success'].'</div>';
                unset($_SESSION['feedback_success']);
            }
            ?>

            <form action="feedback_submit.php" method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Issue Category</label>
                    <select class="form-select" name="category" required>
                        <option value="">Select Issue Type</option>
                        <option value="Water">Water Supply</option>
                        <option value="Road">Road Maintenance</option>
                        <option value="Electricity">Electricity</option>
                        <option value="Sanitation">Sanitation</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="message" rows="4" placeholder="Describe your issue or feedback" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit Feedback</button>
            </form>

        </div>
    </div>

   

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
