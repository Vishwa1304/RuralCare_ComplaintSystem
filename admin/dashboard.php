<?php
include '../config.php';
include 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - RuralCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .container { margin-top: 60px; }
        h2 { color: #004d40; margin-bottom: 30px; text-align: center; }
        .card {
            border-radius: 15px; 
            box-shadow: 0 6px 20px rgba(0,0,0,0.1); 
            padding: 20px; 
            text-align: center; 
            color: #fff;
        }
        .card h5 { font-size: 1.2rem; margin-bottom: 10px; }
        .card h2 { font-size: 2.5rem; font-weight: bold; }
        @media (max-width: 768px) {
            .card { margin-bottom: 20px; }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> (Admin)</h2>

    <!-- Complaint stats -->
    <div class="row mt-4">
        <?php
        $statuses = ['Open'=>'primary','In Progress'=>'warning','Resolved'=>'success'];
        foreach($statuses as $status => $color){
            $res = $conn->query("SELECT COUNT(*) as total FROM complaints WHERE status='$status'");
            $data = $res->fetch_assoc();
            echo '<div class="col-md-4 col-sm-6 mb-3">
                    <div class="card bg-'.$color.'">
                        <h5>'.$status.'</h5>
                        <h2>'.$data['total'].'</h2>
                    </div>
                </div>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
