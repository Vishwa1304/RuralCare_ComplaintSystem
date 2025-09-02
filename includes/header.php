<?php
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: logout.php");
    exit();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php">RuralCare</a>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="submit_complaint.php">Submit Complaint</a></li>
        <li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link btn btn-danger btn-sm text-white ms-2" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
