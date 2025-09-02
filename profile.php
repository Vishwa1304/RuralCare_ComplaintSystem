<?php
include 'config.php';
include 'includes/header.php';

$stmt = $conn->prepare("SELECT name,email FROM users WHERE id=?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Profile - RuralCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .container { max-width: 600px; margin-top: 60px; }
        .card {
            padding: 30px; 
            border-radius: 15px; 
            box-shadow: 0 6px 20px rgba(0,0,0,0.1); 
            background: #fff; 
        }
        h2 { color: #004d40; text-align: center; margin-bottom: 30px; }
        p { font-size: 1.1rem; color: #004d40; margin-bottom: 15px; }
        .btn-logout {
            width: 100%; 
            border-radius: 50px; 
            background-color: #c62828; 
            color: #fff; 
            border: none; 
            padding: 12px; 
            font-weight: 600; 
            transition: 0.3s;
        }
        .btn-logout:hover { background-color: #e53935; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>My Profile</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <a href="logout.php" class="btn btn-logout">Logout</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
