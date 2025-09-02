<?php
include 'config.php';
include 'includes/header.php';

$error = $success = "";

// Fetch categories
$categories = $conn->query("SELECT * FROM categories");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO complaints (user_id, category_id, title, description) VALUES (?,?,?,?)");
    $stmt->bind_param("iiss", $_SESSION['user_id'], $category_id, $title, $description);
    if($stmt->execute()){
        $success = "Complaint submitted successfully!";
    } else {
        $error = "Error submitting complaint.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint - RuralCare</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .container { max-width: 700px; margin-top: 50px; }
        h2 { color: #004d40; text-align: center; margin-bottom: 30px; }
        .form-control, .form-select { border-radius: 8px; }
        .btn-primary { 
            width: 100%; 
            border-radius: 50px; 
            background: #004d40; 
            border: none; 
            padding: 12px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-primary:hover { background: #00796b; }
        .alert { text-align: center; border-radius: 8px; }
        .card { 
            padding: 30px; 
            border-radius: 15px; 
            box-shadow: 0 6px 20px rgba(0,0,0,0.1); 
            background: #fff; 
            margin-bottom: 30px;
        }
        label { font-weight: 500; }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Submit a Complaint</h2>
        <?php if($error) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
        <?php if($success) echo '<div class="alert alert-success">'.$success.'</div>'; ?>

        <form method="post">
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-select" required>
                    <option value="">-- Select Issue Type --</option>
                    <?php while($cat = $categories->fetch_assoc()): ?>
                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter a short title" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="5" placeholder="Describe your issue in detail" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Complaint</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
