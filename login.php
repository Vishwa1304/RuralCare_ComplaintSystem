<?php
//session_start();
include 'config.php';

$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();
        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];

            // Redirect based on role
            if($user['role'] == 'admin'){
                header("Location: admin/dashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "No account found with this email";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .main-container { height: 100%; display: flex; justify-content: center; align-items: center; }
        .login-card { background:#fff; padding:40px 30px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.2); width:100%; max-width:400px; text-align:center; }
        h2 { color:#004d40; margin-bottom:30px; }
        .form-label { font-weight:500; }
        .btn-primary { width:100%; border-radius:50px; background-color:#004d40; border:none; transition:0.3s; }
        .btn-primary:hover { background-color:#00796b; }
        .register-link { margin-top:15px; display:block; color:#00796b; text-decoration:none; }
        .register-link:hover { text-decoration:underline; }
        .alert { text-align:center; }
    </style>
</head>
<body>

<div class="main-container">
    <div class="login-card">
        <h2>Login to RuralCare</h2>
        <?php if($error) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
        <form method="post">
            <div class="mb-3 text-start">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <button class="btn btn-primary mb-2">Login</button>
            <a href="register.php" class="register-link">Don't have an account? Register now</a>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
