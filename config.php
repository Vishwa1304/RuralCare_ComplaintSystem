<?php
session_start(); // start session here so all pages can access

$conn = new mysqli("localhost", "root", "", "ruralcare_db");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
