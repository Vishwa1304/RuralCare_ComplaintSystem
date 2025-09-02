<?php
// Start session if needed
session_start();

// Database connection
$host = "localhost";
$user = "root";       // change if needed
$password = "";       // change if needed
$dbname = "ruralcare_db"; // your database name

$conn = new mysqli($host, $user, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Check form submission
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $category = $conn->real_escape_string($_POST['category']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO feedback (name, email, category, message) VALUES ('$name', '$email', '$category', '$message')";
    
    if($conn->query($sql)){
        // Success, redirect with message
        $_SESSION['feedback_success'] = "Thank you! Your feedback has been submitted.";
        header("Location: feedback.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
