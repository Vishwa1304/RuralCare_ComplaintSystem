<?php
//session_start();
include 'config.php';

// Check if user is logged in
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .navbar-custom { background-color: #00796b; }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link { color: #fff; font-weight: 600; }
        .navbar-custom .nav-link:hover { color: #b2dfdb; }
        .content { padding:50px 15px; max-width:1100px; margin:auto; background:#fff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); }
        h2 { color:#004d40; margin-bottom:20px; }
        table th { background-color:#004d40; color:#fff; }
        table td, table th { text-align:center; vertical-align:middle; }
        .btn-primary { border-radius:50px; background-color:#004d40; border:none; transition:0.3s; }
        .btn-primary:hover { background-color:#00796b; }
        footer { background-color: #004d40; color: #fff; text-align:center; padding:15px 0; margin-top:50px; }
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="submit_complaint.php">Submit Complaint</a></li>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="content mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
        <p>This is your dashboard. You can submit complaints and track their status here.</p>

        <h4 class="mt-4">Your Complaints</h4>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->prepare("SELECT c.*, cat.name as category_name FROM complaints c JOIN categories cat ON c.category_id = cat.id WHERE user_id=? ORDER BY c.created_at DESC");
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                            <td>".htmlspecialchars($row['title'])."</td>
                            <td>".htmlspecialchars($row['category_name'])."</td>
                            <td>".htmlspecialchars($row['status'])."</td>
                            <td>".htmlspecialchars($row['created_at'])."</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No complaints submitted yet.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
