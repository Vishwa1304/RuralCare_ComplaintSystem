<?php
include '../config.php';
include 'header.php';

// Fetch admin details
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id=?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile - RuralCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .profile-card { 
            background: #fff; 
            padding: 40px 30px; 
            border-radius: 15px; 
            box-shadow: 0 8px 20px rgba(0,0,0,0.2); 
            max-width: 500px; 
            margin: 80px auto 40px; 
            text-align: center; 
        }
        h2 { color: #004d40; margin-bottom: 30px; }
        p { font-size: 1.1rem; color: #004d40; margin-bottom: 15px; }
        .btn-danger { border-radius: 50px; padding: 10px 25px; transition: 0.3s; }
        .btn-danger:hover { background-color: #b71c1c; }
    </style>
</head>
<body>

<div class="profile-card">
    <h2>Admin Profile</h2>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <a href="../logout.php" class="btn btn-danger">Logout</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
