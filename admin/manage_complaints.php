<?php
include '../config.php';
include 'header.php';

// Update status
if(isset($_POST['update_status'])){
    $stmt = $conn->prepare("UPDATE complaints SET status=? WHERE id=?");
    $stmt->bind_param("si", $_POST['status'], $_POST['complaint_id']);
    $stmt->execute();
}

// Fetch complaints
$complaints = $conn->query("SELECT c.*, u.name as user_name, cat.name as category_name 
                            FROM complaints c 
                            JOIN users u ON c.user_id=u.id 
                            JOIN categories cat ON c.category_id=cat.id
                            ORDER BY c.created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Complaints - RuralCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .container { margin-top: 60px; }
        h2 { color: #004d40; margin-bottom: 30px; text-align: center; }
        table { background: #fff; border-radius: 10px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); }
        th { background-color: #00796b; color: #fff; text-align: center; }
        td { vertical-align: middle; }
        .btn-primary { border-radius: 8px; }
        select.form-select { width: auto; display: inline-block; }
        @media (max-width: 768px) {
            table { font-size: 0.9rem; }
            select.form-select { width: 100%; margin-bottom: 5px; }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Manage Complaints</h2>
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Category</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if($complaints->num_rows > 0): ?>
                    <?php while($c = $complaints->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($c['user_name']); ?></td>
                        <td><?php echo htmlspecialchars($c['category_name']); ?></td>
                        <td><?php echo htmlspecialchars($c['title']); ?></td>
                        <td>
                            <?php 
                            $badge = 'secondary';
                            if($c['status']=='Open') $badge='primary';
                            elseif($c['status']=='In Progress') $badge='warning';
                            elseif($c['status']=='Resolved') $badge='success';
                            ?>
                            <span class="badge bg-<?php echo $badge; ?>"><?php echo $c['status']; ?></span>
                        </td>
                        <td>
                            <form method="post" class="d-flex flex-column align-items-center">
                                <input type="hidden" name="complaint_id" value="<?php echo $c['id']; ?>">
                                <select name="status" class="form-select mb-1">
                                    <option <?php if($c['status']=='Open') echo 'selected'; ?>>Open</option>
                                    <option <?php if($c['status']=='In Progress') echo 'selected'; ?>>In Progress</option>
                                    <option <?php if($c['status']=='Resolved') echo 'selected'; ?>>Resolved</option>
                                </select>
                                <button class="btn btn-sm btn-primary" name="update_status">Update</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="5">No complaints found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
