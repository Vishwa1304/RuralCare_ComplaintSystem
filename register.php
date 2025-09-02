<?php
include 'config.php';
$error = $success = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    if($stmt->get_result()->num_rows > 0){
        $error = "Email already exists";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name,email,password,role) VALUES (?,?,?,?)");
        $role = 'user';
        $stmt->bind_param("ssss",$name,$email,$password,$role);
        if($stmt->execute()){
            $success = "Registration successful! You can now login.";
        } else {
            $error = "Error during registration";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>RuralCare - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body { height: 100%; margin: 0; font-family: 'Segoe UI', sans-serif; background: #e0f2f1; }
        .main-container { height: 100%; display: flex; justify-content: center; align-items: center; }
        .register-card { background:#fff; padding:40px 30px; border-radius:15px; box-shadow:0 8px 20px rgba(0,0,0,0.2); width:100%; max-width:400px; text-align:center; }
        h2 { color:#004d40; margin-bottom:30px; }
        .form-label { font-weight:500; }
        .btn-primary { width:100%; border-radius:50px; background-color:#004d40; border:none; transition:0.3s; }
        .btn-primary:hover { background-color:#00796b; }
        .login-link { margin-top:15px; display:block; color:#00796b; text-decoration:none; }
        .login-link:hover { text-decoration:underline; }
        .alert { text-align:center; }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="register-card">
            <h2>Create Account</h2>
            <?php if($error) echo '<div class="alert alert-danger">'.$error.'</div>'; ?>
            <?php if($success) echo '<div class="alert alert-success">'.$success.'</div>'; ?>
            <form method="post">
                <div class="mb-3 text-start">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                </div>
                <button class="btn btn-primary mb-2">Register</button>
                <a href="login.php" class="login-link">Already have an account? Login here</a>
            </form>
        </div>
    </div>

</body>
</html>
